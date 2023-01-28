<template lang="">
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
                <div class="col-lg-3 text-right" style="padding-top: 4%">
                    <button @click="exportToEXCELDESEM()" class="btn btn-success" ><i class="fa fa-table" aria-hidden="true"></i> Exportar Excel </button>
                    <button @click="exportToPDFD()" class="btn btn-danger"><i class="fa fa-file" aria-hidden="true"></i> Exportar PDF</button>
                </div>
            </div>
            <hr>
            <div class="row"  ref="porcentajes">
                <div class="col-lg-4 text-center">
                    <br >
                    <h4>Tasa de desempleo</h4>
                    <h5>(General)</h5>
                    <circle-progress
                        stroke-bg-color = "#e3e2e1"
                        :r="80" 
                        :stroke-width="12"  
                        :stroke-color="tasaDesempleo['TD'] < 20 ? '#1abf03': tasaDesempleo['TD'] >= 20  && tasaDesempleo['TD'] < 60 ? '#f2ce1a' : '#f2451a'"  
                        :percentage="Math.floor(tasaDesempleo['TD'] * 10) / 10"> 
                    </circle-progress>
                    <br>
                    <h4>{{tasaDesempleo['D']}} / {{tasaDesempleo['FT']}}</h4> 
                </div> 
                <div class="col-lg-4 text-center">
                    <br >
                    <h4>Tasa de desempleo</h4>
                    <h5>(Femenino)</h5>
                    <circle-progress
                        stroke-bg-color = "#e3e2e1"
                        :r="80" 
                        :stroke-width="12"  
                        :stroke-color="tasaDesempleo['porcenfemeninoTD'] < 20 ? '#1abf03': tasaDesempleo['porcenfemeninoTD'] >= 20  && tasaDesempleo['porcenfemeninoTD'] < 60 ? '#f2ce1a' : '#f2451a'"  
                        :percentage="Math.floor(tasaDesempleo['porcenfemeninoTD'] * 10) / 10"> 
                    </circle-progress>
                    <br>
                    <h4>{{tasaDesempleo['femeninoTD']}} / {{tasaDesempleo['D']}}</h4> 
                </div>  
                <div class="col-lg-4 text-center">
                    <br >
                    <h4>Tasa de desempleo</h4>
                    <h5>(Masculino)</h5>
                    <circle-progress
                        stroke-bg-color = "#e3e2e1"
                        :r="80" 
                        :stroke-width="12"  
                        :stroke-color="tasaDesempleo['porcenmasculinoTD'] < 20 ? '#1abf03': tasaDesempleo['porcenmasculinoTD'] >= 20  && tasaDesempleo['porcenmasculinoTD'] < 60 ? '#f2ce1a' : '#f2451a'"  
                        :percentage="Math.floor(tasaDesempleo['porcenmasculinoTD'] * 10) / 10"> 
                    </circle-progress>
                    <br>
                    <h4>{{tasaDesempleo['masculinoTD']}} / {{tasaDesempleo['D']}}</h4> 
                </div>  
            </div>
            <br>
            <br>
            <div class="row">
                <div class="col-lg-6" v-if="tipoCombo == 'todos'">
                    <h2>Top 5 corregimientos con mayor tasa de desempleo</h2>
                    <div id="chartdiv_desempleo" style="width: 100%; height: 410px"></div>
                </div>
                <div :class="tipoCombo == 'todos' ? 'col-lg-6': 'col-lg-12'" style="text-align: center">
                    <h2>Porcentaje de Desempleados</h2>
                    <h3>(Por grupo de edad)</h3>
                    <div id="chartdiv_desempleo_2" style="width: 100%; height: 370px"></div>
                </div>
            </div>
            <br>
            <div class="row">
                <div v-if="tipoCombo == 'todos'" class="col-lg-12" ref="dataTable">
                    <h2>Tasa de desempleo por corregimiento</h2>
                    <table id="tabla-desempleados" class="table_data" style="width: 100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Corregimiento</th>
                                <th># Personas Desempleadas</th>
                                <th># Personas FT</th>
                                <th>Tasa de Desempleo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, index) in tasaDesempleo.porCorregimeinto">
                                <td>{{ index+1 }}</td>
                                <td>{{item.localizacion==""?'CASCO URBANO':item.localizacion}}</td>
                                <td>{{item.numero_personas}}</td>
                                <td>{{item.personas_edad_trabajo}}</td>
                                <td>{{Math.floor(item.tasa_odesempleo * 10) / 10}} %</td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                </div>
            </div>
            <b-modal
                ref="modalpdf"
                hide-footer
                title="Reporte de Desempleo"
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
    </div>
</template>
<script>

import * as DashboardServiceSocioeconomico from "../../Servicios/dashboard_socioeconomico_servicios";
import CircleProgress from 'vue-pithy-progress/lib/circle-progress.umd.min.js';
import Loading from "vue-loading-overlay";
import * as BarriosService from "../../Servicios/barrios_servicios.js";
import * as CorregimientoService from "../../Servicios/corregimientos_servicios.js";
import * as VeredasService from "../../Servicios/veredas_servicios.js";
import * as usuarioServicios from "../../Servicios/usuarios_servicios";
import * as DashboardService from "../../Servicios/dashboard";
import $ from "jquery";
import * as am4core from "@amcharts/amcharts4/core";
import * as am4charts from "@amcharts/amcharts4/charts";
import am4themes_animated from "@amcharts/amcharts4/themes/animated";
am4core.useTheme(am4themes_animated);
import store from "../../store";

export default {
    components: { CircleProgress, Loading },
    mounted() {
        this.coordenadas();
        this.iniciar();
        this.desempleo();
        this.listarBarrios();
        this.listarCorregimientos();
        this.listarVeredas();
    },
    props: [],
    data() {
        return {
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
            center: { lat: 0, lng: 0 },
            latitud: 0.0,
            longitud: 0.0,
            ente: "",
            tipo: "todos",
            id_combo: 1,
            tasaDesempleo: [],
            colorspinnner: "#ffff",
            analfabetasHombres: [],
            analfabetasMujeres: [],
            points: [],
            columns: [
                {
                    label: "ID",
                    field: "id",
                },
                {
                    label: "PRIMER NOMBRE",
                    field: "pnom",
                },
                {
                    label: "SEGUNDO NOMBRE",
                    field: "pnom",
                },
                {
                    label: "PRIMER APELLIDO",
                    field: "pape",
                },
                {
                    label: "SEGUNDO APELLIDO",
                    field: "sape",
                },
                {
                    label: "SEXO",
                    field: "sexo",
                },
                {
                    label: "EDAD (Años)",
                    field: "edad",
                },
                {
                    label: "CORREGIMIENTO",
                    field: "des_corr",
                },
                {
                    label: "DIRECCION",
                    field: "des_direc",
                }
            ],
            dataExcel: [],
            comboBarrio: "",
            barrios: [],
            barriosCorregimiento: [],
            comboBarrio2: "",
            comboCorregimiento: "",
            corregimientos: [],
            comboVereda: "",
            veredas: [],
            tipoCombo: "todos",
            loading: false,
            torta1: null,
            torta2: null,
            isLoading: false,
            rutaPdf: ""
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
                this.center.lat = this.latitud;
                this.center.lng = this.longitud;
            })
            .catch(err => {
                console.log(err);
            });
        },
        async desempleo() {
            this.loading = true;
            this.points.splice(0);
            this.dataExcel.splice(0);
            await DashboardServiceSocioeconomico.desempleo(this.tipo, this.id_combo).then(respuesta => {
                this.tasaDesempleo = respuesta.data["tasaDesempleo"]; 
                this.loading = false;
                this.puntosMapa(this.tasaDesempleo.listaD);
                if(this.tipo == "todos"){
                    this.tasaDesempleo.porCorregimeinto.sort(function(a, b){
                        return a.tasa_odesempleo - b.tasa_odesempleo;
                    });
                    this.crearDataTable();
                    this.grafica_barras(this.tasaDesempleo.porCorregimeinto);
                } 
                this.grafica_torta(this.tasaDesempleo.porEdad);
            })
            .catch(err => {
                console.log(err);
            });
        },
        puntosMapa(array){
            array.forEach(element => {
                this.points.push({ lat:  element.lat, lng:  element.lng });
                this.dataExcel.push(element);
            });
        },
        crearDataTable() {
            $("#tabla-desempleados").dataTable().fnDestroy();
            setTimeout(() => {
                $('#tabla-desempleados').DataTable({
                    "ordering": false,
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
                this.desempleo();
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

            this.desempleo();
        },
        async grafica_barras(array) {
           
            am4core.useTheme(am4themes_animated);
            if(this.torta1 != null){
                this.torta1.dispose();
            }
            var chart = am4core.create("chartdiv_desempleo", am4charts.XYChart3D);
            this.torta1 = chart;
            chart.paddingBottom = 50;

            chart.cursor = new am4charts.XYCursor();

            var xAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            xAxis.dataFields.category = "category";
            xAxis.renderer.minGridDistance = 30;

            var yAxis = chart.yAxes.push(new am4charts.ValueAxis());
            yAxis.min = 0;

            var axisLabels = xAxis.renderer.labels.template;
            axisLabels.fontSize = 10;

            function createSeries(value, name) {
                var series = chart.series.push(new am4charts.ColumnSeries3D());
                series.dataFields.valueY = value;
                series.dataFields.categoryX = "category";
                series.name = name;

                var bullet = series.bullets.push(new am4charts.LabelBullet());
                bullet.interactionsEnabled = false;
                bullet.dy = -20;
                bullet.label.text = "{valueY}";
                bullet.label.fill = am4core.color("#646c9a");
                bullet.label.fontWeight = "bold";
                return series;
            }

            chart.data = [];
            if(array.length <= 5){
                for (let index = 0; index < array.length; index++) {
                    chart.data.push({
                        category: array[index].localizacion==""?'CASCO URBANO':array[index].localizacion,
                        first: array[index].numero_personas,
                    });     
                }
            }else{
                for (let index = 0; index < 5; index++) {
                    chart.data.push({
                        category: array[index].localizacion==""?'CASCO URBANO':array[index].localizacion,
                        first: array[index].numero_personas,
                    });     
                }
           }
           createSeries("first", "Hombres");
        },
        async grafica_torta(array) {
            if(this.torta2 != null){
                this.torta2.dispose();
            }
            var chart = am4core.create("chartdiv_desempleo_2", am4charts.PieChart3D);
            this.torta2 = chart;
            chart.data = [
                {
                    category: "15 - 17 Años",
                    first: array.d15_17,
                },
                {
                    category: "18 - 28 Años",
                    first: array.d18_28,
                },
                {
                    category: "29 - 59 Años",
                    first: array.d29_59,
                },
                {
                    category: "+60 Años",
                    first: array.d60,
                },
            ];
            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "first";
            series.dataFields.category = "category";
        },
        async exportToPDFD(){ 
            this.isLoading = true;

            // convertir a imagen todos los graficos
            const options = {
                type: 'dataURL',
                useCORS: true,
            }

            let filtro = {
                bcm:  this.barrios.filter( item => { return item.value ==  this.comboBarrio}),
                bc:  this.barriosCorregimiento.filter( item => { return item.value == this.comboBarrio2 }),
                v:  this.veredas.filter( item => { return item.id == this.comboVereda }),
                c:  this.corregimientos.filter( item => { return item.id == this.comboCorregimiento }),
            };  
            
            let porcentajes = await this.$html2canvas(this.$refs.porcentajes, options);
            let torta1 = await this.torta1.exporting.getImage("png");
            let torta2 = await this.torta2.exporting.getImage("png");
            // convertir a imagen todos los graficos
            let parametros = "";
            if(this.tipoCombo == "todos"){
                parametros = {
                    _token: this.csrf,
                    torta1: torta1,
                    torta2: torta2,
                    porcentajes: porcentajes,
                    filtro: filtro,
                    data: this.tasaDesempleo.porCorregimeinto,
                    tipo: 1
                };
            }else{
                parametros = {
                    _token: this.csrf,
                    torta1: "",
                    torta2: torta2,
                    porcentajes: porcentajes,
                    filtro: filtro,
                    data: [],
                    tipo: 2
                };
            }
            
            try {
                await DashboardServiceSocioeconomico.exportarDesempleo(parametros).then(respuesta => {
                    this.rutaPdf = store.state.apiURL + respuesta.data.nombre;
                    this.isLoading = false;
                    this.$refs.modalpdf.show();
                });
            } catch (error) {
                console.log(error)
                switch (error.response.status) {
                    case 422:
                    this.$swal("Error...!", "Ocurrio un error!", "error");
                    break;
                    default:
                    this.$swal("Error...!", "Ocurrio un error!", "error");
                    break;
                }
                this.isLoading = false;
            }
        },
        async exportToEXCELDESEM(){
            this.isLoading = true;

            const parametros = {
                ente: this.ente,
                datos: this.dataExcel,
                titulo: "Lista Desempleados"
            };
            try {
                await DashboardServiceSocioeconomico.exportarDesempleadosExcel(parametros).then(respuesta => {
                    let href = store.state.apiURL + respuesta.data.nombre;
                    this.isLoading = false;
                    this.downloadItem(href);
                });
            } catch (error) {
                switch (error.response.status) {
                    case 422:
                    this.$swal("Error...!", "Ocurrio un error!", "error");
                    break;
                    default:
                    this.$swal("Error...!", "Ocurrio un error!", "error");
                    break;
                }
                this.isLoading = false;
            }
        },
        downloadItem (url) {      
            const link = document.createElement('a')
            link.href = url
            link.download = "Lista Desempleados.xlsx"
            link.click()
            URL.revokeObjectURL(link.href);
        },
        cerrarModal() {
            this.$refs.modalpdf.hide();
        }
    }
}
</script>
<style>
.redondo {
    border-radius: 0px 0px 25px 25px;
}

.redondo-2 {
    border-radius: 25px 25px 0px 0px;
}

.deabjohaciaarriba {
    writing-mode: vertical-rl;
    text-orientation: use-glyph-orientation;
    transform: rotate(0.5turn);
}

.borderbottomright {
    border-top-left-radius: 20px;
    border-bottom-left-radius: 20px;
    border-bottom-right-radius: 20px;
}  

.modal-backdrop {
    background-color: rgba(0, 0, 0, 0.5) !important;
  }
.modal-title {
    color: #f8f9fa !important;
}
.close {
    display: none;
}
.color-datepicker {
    background: #f2f2f2;
    border: 1px solid #ddd;
    padding: 0em 1em 1em;
    margin-bottom: 2em;
}

</style>