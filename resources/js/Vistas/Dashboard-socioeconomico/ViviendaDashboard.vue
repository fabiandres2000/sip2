<template>
    <div>
        <loading
            :active.sync="isLoading"
            :can-cancel="true"
            loader="dots"
            :height=128
            :width=128
            color="#007bff"
            :is-full-page="true"
        />
        <div ref="document">
            <div class="row">
                <div class="col-lg-12" style="padding: 10px 10px 0px 20px;">
                    <h2>{{ente}}</h2>
                </div>
            </div>
            <div class="row" ref="filtro">
                <div class="col-sm-3 col-lg-3 text-left" style="padding: 10px 10px 10px 20px;">
                    <h4>Aplicar filtro por:</h4>
                    <br/>
                    <select class="form-control" @change="cambiaraTodos()" v-model="tipoCombo">
                        <option value = "todos">Seleccione...</option>
                        <option value = "barrio">Barrio - Cabecera Municipal</option>
                        <option value = "barrio2">Barrio - Corregimiento</option>
                        <option value = "corregimiento">Corregimiento</option>
                        <option value = "vereda">Vereda</option>
                    </select>
                </div>
                <div v-if="tipoCombo == 'todos'" class="col-sm-6 col-lg-6 text-left" style="padding: 10px 10px 10px 20px;"></div>
                <div v-if="tipoCombo == 'barrio'" class="col-sm-4 col-lg-4 text-left" style="padding: 10px 10px 10px 20px;">
                    <h4>Seleccione un Barrio</h4>
                    <br/>
                    <select class="form-control" @change="filtrar('barrio')" v-model="comboBarrio">
                        <option value = "">Seleccione...</option>
                        <option v-for="item in barrios" :value="item.value">{{item.texto}}</option>
                    </select>
                </div>
                <div v-if="tipoCombo == 'corregimiento' || tipoCombo == 'barrio2'" class="col-sm-3 col-lg-3 text-left" style="padding: 10px 10px 10px 20px;">
                    <h4>Seleccione un Corregimiento</h4>
                    <br/>
                    <select class="form-control" @change="filtrar('corregimiento')" v-model="comboCorregimiento">
                        <option value = "">Seleccione...</option>
                        <option v-for="item in corregimientos" :value="item.id">{{item.descripcion}}</option>
                    </select>
                </div>
                    <div v-if="tipoCombo == 'barrio2'" class="col-sm-3 col-lg-3 text-left" style="padding: 10px 10px 10px 20px;">
                    <h4>Seleccione un Barrio</h4>
                    <br/>
                    <select class="form-control" @change="filtrar('barrio2')" v-model="comboBarrio2">
                        <option value = "">Seleccione...</option>
                        <option v-for="item in barriosCorregimiento" :value="item.value">{{item.texto}}</option>
                    </select>
                </div>
                <div v-if="tipoCombo == 'vereda'" class="col-sm-4 col-lg-4 text-left" style="padding: 10px 10px 10px 20px;">
                    <h4>Seleccione una Vereda</h4>
                    <br/>
                    <select class="form-control" @change="filtrar('vereda')" v-model="comboVereda">
                        <option value = "">Seleccione...</option>
                        <option v-for="item in veredas" :value="item.id">{{item.descripcion}}</option>
                    </select>
                </div>
                <div v-if="tipoCombo == 'corregimiento'" class="col-sm-1 col-lg-1 text-left" style="padding: 10px 10px 10px 20px;"></div>
                <div v-if="tipoCombo != 'todos' && tipoCombo != 'barrio2'" class="col-sm-2 col-lg-2 text-left" style="padding: 10px 10px 10px 20px;"></div>
                <div class="col-lg-3">
                    <div class="row" style="padding-top: 14%">
                        <div ref="boton1" class="col-lg-12 text-right" style="padding: 10px 10px 10px 20px;">
                            <button @click="exportToPDFV()" class="btn btn-danger"><i class="fa fa-file" aria-hidden="true"></i> Exportar PDF</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-6 text-center">
                <h2>Viviendas Caracterizadas</h2>
                <h4>(Por Nivel Socioeconomico)</h4>
                <div id="chartdiv_socioeconomico" style="width: 100%; height: 370px"></div>
            </div>
            <div class="col-lg-6 text-center">
                <h2>Viviendas Caracterizadas</h2>
                <h4>(Con algun tipo de Hacinamiento)</h4>
                <div id="chartdiv_hacinamiento" style="width: 100%; height: 370px"></div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-5 text-center" ref="porcentaje">
                <h2>Necesidades Básicas Insatisfechas</h2>
                <h4>(Porcentaje de Viviendas)</h4>
                <br>
                <br>
                <circle-progress
                    stroke-bg-color = "#e3e2e1"
                    :r="100" 
                    :stroke-width="12"  
                    :stroke-color="inb.porcen_inb < 20 ? '#1abf03': inb.porcen_inb >= 20  && inb.porcen_inb < 60 ? '#f2ce1a' : '#f2451a'"  
                    :percentage="Math.floor(inb.porcen_inb * 10) / 10"> 
                </circle-progress>
                <br>
                <h4>{{inb.viviendas_inb}} / {{inb.total_viviendas}}</h4> 
            </div> 
            <div class="col-lg-7" style="text-align: center">
                <h2>Indicadores NBI</h2>
                <h4>(Numero de Viviendas por Indicador)</h4>
                <div id="chartdiv_indicadores_nbi" style="width: 100%; height: 370px"></div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <h2>Viviendas Caracterizadas</h2>
                <br>
                <table id="tabla_viviendas" class="table_data" style="width: 100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Corregimiento</th>
                            <th>Direccion</th>
                            <th style="text-align: center">Vivienda Inadecuada</th>
                            <th style="text-align: center">Hacinamiento crítico</th>
                            <th style="text-align: center">Servicios inadecuados</th>
                            <th style="text-align: center">Alta dependencia económica</th>
                            <th style="text-align: center">Niños en edad escolar que no asisten a la escuela</th>
                            <th>INB</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in inb.viviendas">
                            <td>{{ index+1 }}</td>
                            <td>{{item.des_corre == "" ? '  CASCO URBANO' : item.des_corre}}</td>
                            <td>{{item.des_dire}}</td>
                            <td style="text-align: center"><span :class="item.vivienda_inadecuada == 'NO' ? 'kt-badge kt-badge--inline text-white kt-badge--success': 'kt-badge kt-badge--inline text-white kt-badge--danger'">{{item.vivienda_inadecuada}}</span></td>
                            <td style="text-align: center"><span :class="item.hacinamiento_critico == 'NO' ? 'kt-badge kt-badge--inline text-white kt-badge--success': 'kt-badge kt-badge--inline text-white kt-badge--danger'">{{item.hacinamiento_critico}}</span></td>
                            <td style="text-align: center"><span :class="item.servicios_inadecuados == 'NO' ? 'kt-badge kt-badge--inline text-white kt-badge--success': 'kt-badge kt-badge--inline text-white kt-badge--danger'">{{item.servicios_inadecuados}}</span></td>
                            <td style="text-align: center"><span :class="item.dependencia_economica == 'NO' ? 'kt-badge kt-badge--inline text-white kt-badge--success': 'kt-badge kt-badge--inline text-white kt-badge--danger'">{{item.dependencia_economica}}</span></td>
                            <td style="text-align: center"><span :class="item.ninios_descolarizados == 'NO' ? 'kt-badge kt-badge--inline text-white kt-badge--success': 'kt-badge kt-badge--inline text-white kt-badge--danger'">{{item.ninios_descolarizados}}</span></td>
                            <td style="text-align: center"><span :class="item.inb == 'NO' ? 'kt-badge kt-badge--inline text-white kt-badge--success': 'kt-badge kt-badge--inline text-white kt-badge--danger'">{{item.inb}}</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <b-modal
            ref="modalpdf"
            hide-footer
            title="Reporte Viviendas"
            size="xl"
            centered
            header-bg-variant="danger"
            header-text-variant="light"
            :no-close-on-backdrop="true"
        >
            <embed
                id="divPdf"
                :src="rutaPdf"
                type="application/pdf"
                width="100%"
                height="650px"
            />
            <hr />
            <div class="text-right">
                <button
                    type="button"
                    class="btn btn-warning"
                    @click="cerrarModal"
                >
                    <i class="fa fa-window-close"></i> Cancelar
                </button>
            </div>
        </b-modal>
    </div>
</template>
<script>

import * as DashboardServiceSocioeconomico from "../../Servicios/dashboard_socioeconomico_servicios";
import CircleProgress from 'vue-pithy-progress/lib/circle-progress.umd.min.js';
import Loading from "vue-loading-overlay";
import * as usuarioServicios from "../../Servicios/usuarios_servicios";
import * as DashboardService from "../../Servicios/dashboard";
import $ from "jquery";
import * as am4core from "@amcharts/amcharts4/core";
import * as am4charts from "@amcharts/amcharts4/charts";
import am4themes_animated from "@amcharts/amcharts4/themes/animated";
import * as BarriosService from "../../Servicios/barrios_servicios.js";
import * as CorregimientoService from "../../Servicios/corregimientos_servicios.js";
import * as VeredasService from "../../Servicios/veredas_servicios.js";

am4core.useTheme(am4themes_animated);
import store from "../../store";

export default {
    components: { CircleProgress, Loading },
    mounted() {
        this.coordenadas();
        this.iniciar();
        this.vivienda();
        this.listarBarrios();
        this.listarCorregimientos();
        this.listarVeredas();
    },
    props: [],
    data() {
        return {
            inb: [],
            nso: [],
            haci: [],
            finalizado: false,
            isLoading: false,
            rutaPdf: "",
            latitud: 0,
            longitud: 0,
            comboBarrio: "",
            barrios: [],
            barriosCorregimiento: [],
            comboBarrio2: "",
            comboCorregimiento: "",
            corregimientos: [],
            comboVereda: "",
            veredas: [],
            tipoCombo: "todos",
            tipo: "todos",
            id_combo: 1,
            ente: "",
            torta1: null,
            torta2: null,
            torta3: null
        }
    },
    methods: {
        async iniciar() {
            const parametros = {
                _token: this.csrf
            };
            try {
                await usuarioServicios
                    .iniciar(parametros)
                    .then(respuesta => {
                        this.ente = respuesta.data.ente;    
                    })
                    .catch(error => {});
            } catch (error) {
                switch (error.response.status) {
                    case 422:
                        this.$swal("Error...!", "Ocurrio un error!", "error");
                        break;
                    default:
                        this.$swal("Error...!", "Ocurrio un error!", "error");
                        break;
                }
            }
        },
        async coordenadas() {
            let data = {
                _token: this.csrf
            };

            await DashboardService.coordenadas(data)
            .then(respuesta => {
                this.latitud = Number(respuesta.data["latitud"]);
                this.longitud = Number(respuesta.data["longitud"]);
            })
            .catch(err => {
                console.log(err);
            });
        },
        async vivienda() {
            this.isLoading = true;
            await DashboardServiceSocioeconomico.vivienda(this.tipo, this.id_combo).then(respuesta => {
                this.inb = respuesta.data.inb;
                this.nso = respuesta.data.nso;
                this.haci = respuesta.data.haci;
                this.crearDataTable();
                this.grafica_indicadores_nbi();
                this.grafica_torta_so(this.nso);
                this.grafica_torta_ha(this.haci);
                this.isLoading = false;
            })
            .catch(err => {
                console.log(err);
            });
        },
        async listarBarrios(){
            const parametros = {
                _token: this.csrf,
                id: null,
                opcion: "MUN"
            };
            
            await BarriosService.comboBarrios(parametros).then(respuesta => {
                this.barrios = respuesta.data.arrayBarrios;
            });
            
        },
        async listarBarriosCorregimiento(){
            const parametros = {
                _token: this.csrf,
                id: this.comboCorregimiento,
                opcion: "CORRE"
            };
            
            await BarriosService.comboBarrios(parametros).then(respuesta => {
                this.barriosCorregimiento = respuesta.data.arrayBarrios;
            });
            
        },
        async listarCorregimientos(){
            const parametros = {
                _token: this.csrf,
            };
            
            await CorregimientoService.comboCorregimientos(parametros).then(respuesta => {
                this.corregimientos = respuesta.data.corregimientos;
            });
            
        },
        async listarVeredas(){
            const parametros = {
                _token: this.csrf,
            };
            
            await VeredasService.comboVeredas(parametros).then(respuesta => {
                this.veredas = respuesta.data.veredas;
            });
            
        },
        cambiaraTodos() {
            if(this.tipoCombo == "todos"){
                this.tipo = this.tipoCombo;
                this.comboBarrio = "";
                this.comboVereda = "";
                this.comboCorregimiento = "";
                this.comboBarrio2 = "";
                this.vivienda();
            }
        },
        async filtrar(tipo_p){
            if(tipo_p == "barrio"){
                this.tipo = "barrio";
                this.comboCorregimiento = "";
                this.comboVereda = "";
                this.comboBarrio2 = "";
                this.id_combo = this.comboBarrio;
            }
            if(tipo_p == "corregimiento"){
                this.tipo = "corre";
                this.comboBarrio = "";
                this.comboVereda = "";
                this.comboBarrio2 = "";
                this.id_combo = this.comboCorregimiento;
                this.listarBarriosCorregimiento();
            }
            if(tipo_p == "vereda"){
                this.tipo = "vereda"
                this.comboCorregimiento = "";
                this.comboBarrio = "";
                this.comboBarrio2 = "";
                this.id_combo = this.comboVereda;
            }
            if(tipo_p == "barrio2"){
                this.tipo = "barrio";
                this.comboVereda = "";
                this.comboBarrio = "";
                this.id_combo = this.comboBarrio2;

                if(this.comboBarrio2 == ""){
                    this.tipo = "corre";
                    this.id_combo = this.comboCorregimiento;
                }
            }
            
            if(this.comboVereda == "" && this.comboBarrio == "" && this.comboCorregimiento == "" && this.comboBarrio2 == ""){
                this.tipo = "todos";
            }

            this.vivienda();
        },
        async grafica_indicadores_nbi() {
            if(this.torta1 != null){
                this.torta1.dispose();
            }
            var chart = am4core.create("chartdiv_indicadores_nbi", am4charts.XYChart3D)
            this.torta1 = chart;
            chart.data = [
                {
                    category: "Vivienda Inadecuada",
                    first: this.inb.viviendas_vivienda_inadecuada,
                },
                {
                    category: "Viviendas con hacinamiento crítico",
                    first: this.inb.viviendas_hacinamiento_critico,
                },
                {
                    category: "Viviendas con servicios inadecuadoss",
                    first: this.inb.viviendas_servicios_inadecuados,
                },
                {
                    category: "Viviendas con alta dependencia económica",
                    first: this.inb.viviendas_dependencia_economica,
                },
                {
                    category: "Viviendas con niños en edad escolar que no asisten a la escuela",
                    first: this.inb.viviendas_ninios_descolarizados,
                }
            ];

            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

            // Create axes
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "category";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 30;

            // Configure axis label
            var label = categoryAxis.renderer.labels.template;
            label.wrap = true;
            label.maxWidth = 120;
            label.fontSize = 10;
            label.horizontalCenter = "middle";

            // Create series
            var series = chart.series.push(new am4charts.ColumnSeries3D());
            series.dataFields.valueY = "first";
            series.dataFields.categoryX = "category";

            var bullet = series.bullets.push(new am4charts.LabelBullet());
            bullet.interactionsEnabled = false;
            bullet.dy = 30;
            bullet.label.text = "{valueY}";
            bullet.label.fill = am4core.color("#ffffff");
        },
        async grafica_torta_so(array) {
            if(this.torta2 != null){
                this.torta2.dispose();
            }
            var chart = am4core.create("chartdiv_socioeconomico", am4charts.PieChart3D);
            this.torta2 = chart;
            chart.data = [
                {
                    category: "Bajo - Bajo",
                    first: array.bajoBajo,
                },
                {
                    category: "Bajo",
                    first: array.bajo,
                },
                {
                    category: "Medio - Bajo",
                    first: array.medioBajo,
                },
                {
                    category: "Medio",
                    first: array.medio,
                },
                {
                    category: "Medio - Alto",
                    first: array.medioAlto,
                },
                {
                    category: "Alto",
                    first: array.alto,
                },
            ];
            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "first";
            series.dataFields.category = "category";
        },
        async grafica_torta_ha(array) {
            if(this.torta3 != null){
                this.torta3.dispose();
            }
            var chart = am4core.create("chartdiv_hacinamiento", am4charts.PieChart3D);
            this.torta3 = chart;
            chart.data = [
                {
                    category: "Sin Hacinamiento",
                    first: array.sinHacinamiento,
                },
                {
                    category: "Hacinamiento Medio",
                    first: array.hacinamientoMedio,
                },
                {
                    category: "MHacinamiento Critico",
                    first: array.hacinamientoCritico,
                },
            ];
            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "first";
            series.dataFields.category = "category";
        },
        crearDataTable() {
            $("#tabla_viviendas").dataTable().fnDestroy();
            setTimeout(() => {
                $('#tabla_viviendas').DataTable({
                    "lengthChange": false,
                    "ordering": false,
                    pageLength : 5,
                    language: {
                        "decimal": "",
                        "emptyTable": "No hay información",
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Registros",
                        "infoEmpty": "Mostrando 0 to 0 of 0 Registros",
                        "infoFiltered": "(Filtrado de _MAX_ total Registros)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "lengthMenu": "Mostrar _MENU_ Registros",
                        "loadingRecords": "Cargando...",
                        "processing": "Procesando...",
                        "search": "Buscar:",
                        "zeroRecords": "Sin resultados encontrados",
                        "paginate": {
                            "first": "Primero",
                            "last": "Ultimo",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        }
                    }
                });
            }, 500);
        },
        async exportToPDFV(){ 
            this.isLoading = true;

            // convertir a imagen todos los graficos
            const options = {
                type: 'dataURL',
                useCORS: true,
            }
           
            let torta1 = await this.torta1.exporting.getImage("png");
            let torta2 = await this.torta2.exporting.getImage("png");
            let porcentaje = await this.$html2canvas(this.$refs.porcentaje, options);
            let torta3 = await this.torta3.exporting.getImage("png");
            let filtro = {
                bcm:  this.barrios.filter( item => { return item.value ==  this.comboBarrio}),
                bc:  this.barriosCorregimiento.filter( item => { return item.value == this.comboBarrio2 }),
                v:  this.veredas.filter( item => { return item.id == this.comboVereda }),
                c:  this.corregimientos.filter( item => { return item.id == this.comboCorregimiento }),
            }; 
            // convertir a imagen todos los graficos

            const parametros = {
                _token: this.csrf,
                torta1: torta1,
                torta2: torta2,
                porcentaje: porcentaje,
                torta3: torta3,
                filtro: filtro,
                data: this.inb.viviendas
            };
            try {
                await DashboardServiceSocioeconomico.exportarVivienda(parametros).then(respuesta => {
                    this.rutaPdf = store.state.apiURL + respuesta.data.nombre;
                    this.isLoading = false;
                    this.$refs.modalpdf.show();
                });
            } catch (error) { 
                this.$swal("Error...!", "Ocurrio un error!", "error");    
                this.isLoading = false;
            }
        },
        cerrarModal() {
            this.$refs.modalpdf.hide();
        }
    }
}
</script>