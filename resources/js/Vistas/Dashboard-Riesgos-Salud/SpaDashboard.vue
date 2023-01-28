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
                            <button @click="verDetalle()" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i> Ver Detalles</button>
                            <button @click="exportToPDFSPA()" class="btn btn-danger"><i class="fa fa-file" aria-hidden="true"></i> Exportar PDF</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-6 text-center">
                <br>
                <h2>Población que consume SPA</h2>
                <h3>(Por tipo de consumo)</h3>
                <br>
                <div id="chartdiv_barras_consumo" style="width: 100%; height: 350px"></div>
            </div>
            <div class="col-lg-6 text-center">
                <br>
                <h2>Población que consume SPA</h2>
                <h3>(Por grupo de edad)</h3>
                <br>
                <div id="chartdiv_barras_edades" style="width: 100%; height: 350px"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 text-center">
                <br>
                <h2>Población que consume SPA</h2>
                <h3>(Por tipo de consumo)</h3>
                <h3>(Poblaciónde 6 a 59 años)</h3>
                <br>
                <div id="chartdiv_tipo_consumo" style="width: 100%; height: 350px"></div>
            </div>
            <div class="col-lg-6 text-center" ref="imagen1">
                <br>
                <br>
                <br>
                <br>
                <br>
                <h2>Gestantes consumidores</h2>
                <br>
                <br>
                <circle-progress
                    stroke-bg-color = "#e3e2e1"
                    :r="120" 
                    :stroke-width="20"  
                    stroke-color="#1abf03" 
                    :percentage="Math.floor(embarazo_spa.porcen  * 10) / 10"> 
                </circle-progress>
                <br>
                <h4>{{embarazo_spa.mujeres_spa}} / {{embarazo_spa.gestantes}}</h4> 
            </div>
        </div>
        <b-modal
            ref="modaldetalles"
            hide-footer
            title="Detalles Consumo de SPA"
            size="xl"
            centered
            header-bg-variant="danger"
            header-text-variant="light"
            :no-close-on-backdrop="true"
        >
            <h3>Personas que Consumen SPA</h3>
            <h4>Seleccione un Rango de Edad</h4>
            <br/>
            <select class="form-control" v-model="mostrarDetalleR" style="width: 50%">
                <option value = "1">6 a 11 Años</option>
                <option value = "2">12 a 17 Años</option>
                <option value = "3">18 a 28 Años</option>
                <option value = "4">29 a 59 Años</option>
                <option value = "5">+ 60 Años</option>
            </select>
            <br>
            <div style="max-height: 400px; overflow-y: auto">
                <table style="width: 100%;" class="table_data" id="tabla_riesgos">
                    <thead>
                        <tr>
                            <th>Identificacion</th>
                            <th>Nombre</th>
                            <th>Corregimiento</th> 
                            <th>Barrio</th>
                            <th>Direccion</th>
                            <th style="text-align: center">Tipo Consumo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-if="mostrarDetalleR == '1'" v-for="item in array_de6a11">
                            <td>{{item.tipo_id}}: {{item.identificacion}}</td>
                            <td>{{item.nombre}}</td>
                            <td>{{item.des_corr != "" ? item.des_corr : "CASCO URBANO"}}</td>
                            <td>{{item.des_barrio}}</td>
                            <td>{{item.des_direc}}</td>
                            <td>
                                <ul>
                                    <li v-if="item.sustanciaspsico != 'NO' && item.sustanciaspsico != 'NA'">{{item.sustanciaspsico}}</li>
                                </ul>       
                            </td>
                        </tr>
                        <tr  v-if="mostrarDetalleR == '2'" v-for="item in array_de12a17">
                            <td>{{item.tipo_id}}: {{item.identificacion}}</td>
                            <td>{{item.nombre}}</td>
                            <td>{{item.des_corr != "" ? item.des_corr : "CASCO URBANO"}}</td>
                            <td>{{item.des_barrio}}</td>
                            <td>{{item.des_direc}}</td>
                            <td>
                                <ul>
                                    <li v-if="item.spa != 'NO' && item.spa != 'NA'">{{item.spa}}</li>
                                    <li v-if="item.consume_a != undefined">{{item.consume_a}}</li>
                                    <li v-if="item.consume_t != undefined">{{item.consume_t}}</li>
                                </ul>       
                            </td>
                        </tr>
                        <tr  v-if="mostrarDetalleR == '3'" v-for="item in array_de18a28">
                            <td>{{item.tipo_id}}: {{item.identificacion}}</td>
                            <td>{{item.nombre}}</td>
                            <td>{{item.des_corr != "" ? item.des_corr : "CASCO URBANO"}}</td>
                            <td>{{item.des_barrio}}</td>
                            <td>{{item.des_direc}}</td>
                            <td>
                                <ul>
                                    <li v-if="item.spa != 'NO' && item.spa != 'NA'">{{item.spa}}</li>
                                    <li v-if="item.consume_a != undefined">{{item.consume_a}}</li>
                                    <li v-if="item.consume_t != undefined">{{item.consume_t}}</li>
                                </ul>       
                            </td>
                        </tr>
                        <tr  v-if="mostrarDetalleR == '4'" v-for="item in array_de29a59">
                            <td>{{item.tipo_id}}: {{item.identificacion}}</td>
                            <td>{{item.nombre}}</td>
                            <td>{{item.des_corr != "" ? item.des_corr : "CASCO URBANO"}}</td>
                            <td>{{item.des_barrio}}</td>
                            <td>{{item.des_direc}}</td>
                            <td>
                                <ul>
                                    <li v-if="item.spa != 'NO' && item.spa != 'NA'">{{item.spa}}</li>
                                    <li v-if="item.consume_a != undefined">{{item.consume_a}}</li>
                                    <li v-if="item.consume_t != undefined">{{item.consume_t}}</li>
                                </ul>       
                            </td>
                        </tr>
                        <tr  v-if="mostrarDetalleR == '5'" v-for="item in array_de60">
                            <td>{{item.tipo_id}}: {{item.identificacion}}</td>
                            <td>{{item.nombre}}</td>
                            <td>{{item.des_corr != "" ? item.des_corr : "CASCO URBANO"}}</td>
                            <td>{{item.des_barrio}}</td>
                            <td>{{item.des_direc}}</td>
                            <td>
                                <ul>
                                    <li v-if="item.glicemia != null">Consume SPA</li>
                                    <li v-if="item.consume_a != undefined">{{item.consume_a}}</li>
                                    <li v-if="item.consume_t != undefined">{{item.consume_t}}</li>
                                </ul>       
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>  
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
        <b-modal
            ref="modalpdf"
            hide-footer
            title="Reporte Mercado Laboral"
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

import * as DashboardServiceRS from "../../Servicios/dashboard_riesgos_salud";
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
        this.spa();
        this.listarBarrios();
        this.listarCorregimientos();
        this.listarVeredas();
    },
    props: [],
    data() {
        return {
            inb: null,
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
            data_por_tipo: [],
            consumidores_spa: 0,
            consumidores_alcohol: 0,
            consumidores_tabaco: 0,
            graf_barra: null,
            graf_barra2: null,
            de6a11: 0,
            de12a17: 0,
            de18a28: 0,
            de29a59: 0,
            de60: 0,
            tipo_spa: [],
            chart_tipo_consumo: null,
            embarazo_spa: 0,
            array_de6a11: [],
            array_de12a17: [],
            array_de18a28: [],
            array_de29a59: [],
            array_de60: [],
            mostrarDetalleR: "1"
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
        async spa() {
            this.isLoading = true;
            await DashboardServiceRS.spa(this.tipo, this.id_combo).then(respuesta => {
                this.data_por_tipo = respuesta.data.data_por_tipo;

                this.array_de6a11 = respuesta.data.data_por_tipo.de6a11.array_personas_consumen;
                this.array_de12a17 = respuesta.data.data_por_tipo.de12a17.array_personas_consumen;
                this.array_de18a28 = respuesta.data.data_por_tipo.de18a28.array_personas_consumen;
                this.array_de29a59 = respuesta.data.data_por_tipo.de29a59.array_personas_consumen;
                this.array_de60 = respuesta.data.data_por_tipo.de60.array_personas_consumen;

                this.embarazo_spa = respuesta.data.data_por_tipo.gestantes_consumidores;
                this.calcular_totales();
                this.agrupar_tipo_consumo();
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
                this.spa();
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

            this.spa();
        },
        crearDataTable() {
            $("#tabla_tasa_ocupacion").dataTable().fnDestroy();
            setTimeout(() => {
                $('#tabla_tasa_ocupacion').DataTable({
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
        async exportToPDFSPA(){ 
            this.isLoading = true;

            // convertir a imagen todos los graficos
            const options = {
                type: 'dataURL',
                useCORS: true,
            }
           
            // convertir a imagen todos los graficos
            let filtro = {
                bcm:  this.barrios.filter( item => { return item.value ==  this.comboBarrio}),
                bc:  this.barriosCorregimiento.filter( item => { return item.value == this.comboBarrio2 }),
                v:  this.veredas.filter( item => { return item.id == this.comboVereda }),
                c:  this.corregimientos.filter( item => { return item.id == this.comboCorregimiento }),
            };
            
            let grafico1 = await this.graf_barra.exporting.getImage("png");
            let grafico2 = await this.graf_barra2.exporting.getImage("png");
            let grafico3 = await this.chart_tipo_consumo.exporting.getImage("png");
            let imagen1 = await this.$html2canvas(this.$refs.imagen1, options);

            const parametros = {
                _token: this.csrf,
                filtro: filtro,
                grafico1: grafico1,
                grafico2: grafico2,
                grafico3:grafico3,
                imagen1: imagen1,
                data: {
                    array_de6a11: this.array_de6a11 ,
                    array_de12a17: this.array_de12a17,
                    array_de18a28: this.array_de18a28,
                    array_de29a59: this.array_de29a59,
                    array_de60: this.array_de60 
                }
            };
            try {
                await DashboardServiceRS.exportarRSSPA(parametros).then(respuesta => {
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
            this.$refs.modaldetalles.hide();
            this.$refs.modalpdf.hide();
        },
        async calcular_totales(){
            this.consumidores_alcohol = 0;
            this.consumidores_spa = 0;
            this.consumidores_tabaco = 0;
            
            this.consumidores_alcohol +=  this.data_por_tipo.de6a11.personas_consumen_alcohol;
            this.consumidores_alcohol +=  this.data_por_tipo.de12a17.personas_consumen_alcohol;
            this.consumidores_alcohol +=  this.data_por_tipo.de18a28.personas_consumen_alcohol;   
            this.consumidores_alcohol +=  this.data_por_tipo.de29a59.personas_consumen_alcohol;
            this.consumidores_alcohol +=  this.data_por_tipo.de60.personas_consumen_alcohol;

            this.consumidores_spa +=  this.data_por_tipo.de6a11.personas_consumen_spa;
            this.consumidores_spa +=  this.data_por_tipo.de12a17.personas_consumen_spa;
            this.consumidores_spa +=  this.data_por_tipo.de18a28.personas_consumen_spa;   
            this.consumidores_spa +=  this.data_por_tipo.de29a59.personas_consumen_spa;
            this.consumidores_spa +=  this.data_por_tipo.de60.personas_consumen_spa;

            this.consumidores_tabaco +=  this.data_por_tipo.de6a11.personas_consumen_tabaco;
            this.consumidores_tabaco +=  this.data_por_tipo.de12a17.personas_consumen_tabaco;
            this.consumidores_tabaco +=  this.data_por_tipo.de18a28.personas_consumen_tabaco;   
            this.consumidores_tabaco +=  this.data_por_tipo.de29a59.personas_consumen_tabaco;
            this.consumidores_tabaco +=  this.data_por_tipo.de60.personas_consumen_tabaco;

            this.de6a11 = this.data_por_tipo.de6a11.numero_personas;
            this.de12a17 = this.data_por_tipo.de12a17.numero_personas;
            this.de18a28 = this.data_por_tipo.de18a28.numero_personas;
            this.de29a59 = this.data_por_tipo.de29a59.numero_personas;
            this.de60 = this.data_por_tipo.de60.numero_personas;

            this.grafica_barras();
            this.grafica_barras_edad();
        },
        async grafica_barras() {
           
           am4core.useTheme(am4themes_animated);
           if(this.graf_barra != null){
               this.graf_barra.dispose();
           }
           var chart = am4core.create("chartdiv_barras_consumo", am4charts.XYChart3D);
           this.graf_barra = chart;
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
               bullet.dy = -25;
               bullet.label.text = "{valueY}";
               bullet.label.fill = am4core.color("#646c9a");
               bullet.label.fontWeight = "bold";

               series.columns.template.adapter.add("fill", function(fill, target) {
                    if (target.dataItem && (target.dataItem.categoryX == "SPA")) {
                        return am4core.color("#43ad8e");
                    }
                    if (target.dataItem && (target.dataItem.categoryX == "Alcohol")) {
                        return am4core.color("#0abb87");
                    }
                    if (target.dataItem && (target.dataItem.categoryX == "Tabaco")) {
                        return am4core.color("#ffb822");
                    }
                });

               return series;
           }

           chart.data = [
                {
                    category: "SPA",
                    first: this.consumidores_spa,
                },
                {
                    category: "Alcohol",
                    first: this.consumidores_alcohol,
                },
                {
                    category: "Tabaco",
                    first: this.consumidores_tabaco,
                },
            ];
            createSeries("first", "Tipo de Consumo");
        },
        async grafica_barras_edad() {
           
           am4core.useTheme(am4themes_animated);
           if(this.graf_barra2 != null){
               this.graf_barra2.dispose();
           }
           var chart = am4core.create("chartdiv_barras_edades", am4charts.XYChart3D);
           this.graf_barra2 = chart;
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
                bullet.dy = 30;
                bullet.label.text = "{valueY}";
                bullet.label.fill = am4core.color("#ffffff");
                return series;
            }

           chart.data = [
                {
                    category: "6 - 11 Años",
                    first: this.de6a11,
                },
                {
                    category: "12 - 17 Años",
                    first: this.de12a17,
                },
                {
                    category: "18 - 28 Años",
                    first: this.de18a28,
                },
                {
                    category: "29 - 59 Años",
                    first: this.de29a59,
                },
                {
                    category: "+60 Años",
                    first: this.de60,
                }
            ];
            createSeries("first", "Tipo de Consumo");
        },
        async agrupar_tipo_consumo(){
            this.tipo_spa = [];
            this.embarazo = 0;

            this.data_por_tipo.de6a11.array_personas_consumen.forEach(element => {
                let encontrado = false;
                this.tipo_spa.forEach(element2 => {
                    if(element2.tipo == element.sustanciaspsico){
                        element2.cantidad += 1;
                        encontrado = true;
                    }
                });
                if(encontrado == false && (element.sustanciaspsico != "NO" && element.sustanciaspsico != "NA")){
                    this.tipo_spa.push({
                        tipo: element.sustanciaspsico,
                        cantidad: 1
                    });
                }
            });

            this.data_por_tipo.de12a17.array_personas_consumen.forEach(element => {
                let encontrado = false;
                this.tipo_spa.forEach(element2 => {
                    if(element2.tipo == element.spa){
                        element2.cantidad += 1;
                        encontrado = true;
                    }
                });
                if(encontrado == false && (element.spa != "NO" && element.spa != "NA")){
                    this.tipo_spa.push({
                        tipo: element.spa,
                        cantidad: 1
                    });
                }
            });

            this.data_por_tipo.de18a28.array_personas_consumen.forEach(element => {
                let encontrado = false;
                this.tipo_spa.forEach(element2 => {
                    if(element2.tipo == element.spa){
                        element2.cantidad += 1;
                        encontrado = true;
                    }
                });
                if(encontrado == false && (element.spa != "NO" && element.spa != "NA")){
                    this.tipo_spa.push({
                        tipo: element.spa,
                        cantidad: 1
                    });
                }
            });

            this.data_por_tipo.de29a59.array_personas_consumen.forEach(element => {
                let encontrado = false;
                this.tipo_spa.forEach(element2 => {
                    if(element2.tipo == element.spa){
                        element2.cantidad += 1;
                        encontrado = true;
                    }
                });
                if(encontrado == false && (element.spa != "NO" && element.spa != "NA")){
                    this.tipo_spa.push({
                        tipo: element.spa,
                        cantidad: 1
                    });
                }
            });
            this.grafica_torta_tipo_consumo();
        },
        async grafica_torta_tipo_consumo() {
            if(this.chart_tipo_consumo != null){
                this.chart_tipo_consumo.dispose();
            }
            var chart = am4core.create("chartdiv_tipo_consumo", am4charts.PieChart3D);
            this.chart_tipo_consumo = chart;
            chart.data = [];

            this.tipo_spa.forEach(element => {
                chart.data.push(
                    {
                        category: element.tipo,
                        first: element.cantidad,
                    }
                );
            });

            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "first";
            series.dataFields.category = "category";
        },
        async verDetalle() {
            this.$refs.modaldetalles.show();
        }
    },
}
</script>
<style>
    .percent-text{
        font-size: 32px !important;
    }

    .nav-pills, .nav-tabs {
        margin: 0 0 -10px 0 !important;
    }

</style>