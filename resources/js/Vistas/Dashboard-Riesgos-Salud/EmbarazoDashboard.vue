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
                            <button @click="exportarEmbarazo()" class="btn btn-danger"><i class="fa fa-file" aria-hidden="true"></i> Exportar PDF</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row" style="padding-left: 29px">
            <div class="col-lg-6" style="padding-top: 30px" ref="imagen1">
                <div class="row">
                    <div class="col-lg-12"> 
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <h4>Numero de Mujeres en estado <br> de Gestación</h4>
                                        <p style="font-size: 37px; font-weight: 400; margin-bottom: -1rem;">{{embarazo_data.numero_embarazadas}}</p>
                                        <hr>
                                        <h4>Numero de Mujeres Lactantes</h4>
                                        <p style="font-size: 37px; font-weight: 400; margin-bottom: -1rem;">{{lactantes_data.numero_lactantes}}</p>
                                    </div>
                                    <div class="col-6" style="text-align: center; padding-top: 20px">
                                        <img style="opacity: 0.6; width: 123px; height: 175px;" :src="mujerEmbarazo">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-6"> 
                        <div class="card">
                            <div class="card-body">
                                <div class="row" style="cursor: pointer">
                                    <div class="col-12 justify-content-center align-self-center">
                                        <h4>Mujeres Embarazadas sin Atención Prenatal</h4>
                                        <p style="font-size: 37px; font-weight: 400; margin: 0px;">{{embarazo_data.sin_atencion}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6"> 
                        <div class="card">
                            <div class="card-body">
                                <div   class="row" style="cursor: pointer">
                                    <div class="col-12 justify-content-center align-self-center">
                                        <h4>Mujeres Embarazadas con Atención Prenatal</h4>
                                        <p style="font-size: 37px; font-weight: 400; margin: 0px;">{{embarazo_data.con_atencion}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <h2>Atención Prenatal</h2>
                <div id="chartdiv_ap" style="width: 100%; height: 370px"></div>
            </div>
        </div>
        <br>
        <div class="row" ref="graficos">
            <div class="col-lg-4 text-center">
                <br >
                <h4>Mujeres en embarazo con VIH</h4>
                <circle-progress
                    stroke-bg-color = "#e3e2e1"
                    :r="80" 
                    :stroke-width="12"  
                    :stroke-color="embarazo_data.porcen_embarazadas_vih < 20 ? '#1abf03': embarazo_data.porcen_embarazadas_vih >= 20  && embarazo_data.porcen_embarazadas_vih < 60 ? '#f2ce1a' : '#f2451a'"
                    :percentage="Math.floor(embarazo_data.porcen_embarazadas_vih* 10) / 10"> 
                </circle-progress>
                <br>
                <h4>{{embarazo_data.embarazadas_vih}} / {{embarazo_data.numero_embarazadas}}</h4> 
            </div>
            <div class="col-lg-4 text-center">
                <br >
                <h4>Adolescentes en embarazo</h4>
                <circle-progress
                    stroke-bg-color = "#e3e2e1"
                    :r="80" 
                    :stroke-width="12"  
                    :stroke-color="embarazo_data.porcen_adolescentes_embarazo < 20 ? '#1abf03': embarazo_data.porcen_adolescentes_embarazo >= 20  && embarazo_data.porcen_adolescentes_embarazo < 60 ? '#f2ce1a' : '#f2451a'"
                    :percentage="Math.floor(embarazo_data.porcen_adolescentes_embarazo* 10) / 10"> 
                </circle-progress>
                <br>
                <h4>{{embarazo_data.adolescentes_embarazo}} / {{embarazo_data.numero_embarazadas}}</h4> 
            </div>
            <div class="col-lg-4 text-center">
                <br >
                <h4>Adolescentes desescolarizadas en embarazo</h4>
                <circle-progress
                    stroke-bg-color = "#e3e2e1"
                    :r="80" 
                    :stroke-width="12"  
                    :stroke-color="embarazo_data.porcen_adolescentes_embarazadas_descolarizadas < 20 ? '#1abf03': embarazo_data.porcen_adolescentes_embarazadas_descolarizadas >= 20  && embarazo_data.porcen_adolescentes_embarazadas_descolarizadas < 60 ? '#f2ce1a' : '#f2451a'"
                    :percentage="Math.floor(embarazo_data.porcen_adolescentes_embarazadas_descolarizadas* 10) / 10"> 
                </circle-progress>
                <br>
                <h4>{{embarazo_data.adolescentes_embarazadas_descolarizadas}} / {{embarazo_data.adolescentes_embarazo}}</h4> 
            </div>
        </div>

        <b-modal
            ref="modaldetallesembarazo"
            hide-footer
            title="Detalles Mujeres en estado de Gestación"
            size="xl"
            centered
            header-bg-variant="danger"
            header-text-variant="light"
            :no-close-on-backdrop="true"
        >
            <br>
            <div style="max-height: 400px; overflow-y: auto">
                <table style="width: 100%;" class="table_data" id="tabla_detalles_embarazo_dashboard">
                    <thead>
                        <tr>
                            <th>Identificacion</th>
                            <th>Nombre</th>
                            <th>Corregimiento</th> 
                            <th>Barrio</th>
                            <th>Direccion</th>
                            <th>Atención Prenatal</th>
                            <th>Edad</th>
                            <th style="text-align: center;">VIH</th>
                            <th>Desescolarización</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in embarazo_data.embarazadas">
                            <td>{{item.tipo_id}}: {{item.identificacion}}</td>
                            <td>{{item.nombre}}</td>
                            <td>{{item.des_corr != "" ? item.des_corr : "CASCO URBANO"}}</td>
                            <td>{{item.des_barrio}}</td>
                            <td>{{item.des_direc}}</td>
                            <td>{{item.control_prenatal}}</td>
                            <td>{{item.edad}} Años</td>
                            <td>{{item.vih}}</td>
                            <td style="text-align: center;">{{item.descolarizada}}</td>
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
            title="Reporte Riesgo de salud - Embarazo"
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
        this.embarazo();
        this.listarBarrios();
        this.listarCorregimientos();
        this.listarVeredas();
        this.imagen();
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
            embarazo_data: [],
            mujerEmbarazo: "",
            lactantes_data: [],
        }
    },
    methods: {
        imagen(){
            this.mujerEmbarazo = `${store.state.serverPath}assets/media/icons/embarazo.png`; 
        },
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
        async embarazo() {
            this.isLoading = true;
            await DashboardServiceRS.embarazo(this.tipo, this.id_combo).then(respuesta => {
                this.embarazo_data = respuesta.data.embarazo;
                this.lactantes_data = respuesta.data.lactantes;
                this.grafica_torta_atencion();
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
                this.embarazo();
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

            this.embarazo();
        },
        crearDataTable() {
            $("#tabla_detalles_embarazo_dashboard").dataTable().fnDestroy();
            setTimeout(() => {
                $('#tabla_detalles_embarazo_dashboard').DataTable({
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
        async exportarEmbarazo(){ 
            this.isLoading = true;

            const options = {
                type: 'dataURL',
                useCORS: true,
            }
            
            let imagen1 = await this.$html2canvas(this.$refs.imagen1, options);
            let grafico1 = await this.chart_ap.exporting.getImage("png");
            let graficos = await this.$html2canvas(this.$refs.graficos, options);
            let embarazadas = this.embarazo_data.embarazadas;
            let lactantes = this.lactantes_data.lactantes;

            let filtro = {
                bcm:  this.barrios.filter( item => { return item.value ==  this.comboBarrio}),
                bc:  this.barriosCorregimiento.filter( item => { return item.value == this.comboBarrio2 }),
                v:  this.veredas.filter( item => { return item.id == this.comboVereda }),
                c:  this.corregimientos.filter( item => { return item.id == this.comboCorregimiento }),
            };

            const parametros = {
                _token: this.csrf,
                filtro: filtro,
                imagen1: imagen1,
                grafico1: grafico1,
                graficos: graficos,
                embarazadas: embarazadas,
                lactantes: lactantes
            };
            try {
                await DashboardServiceRS.exportarEmbarazo(parametros).then(respuesta => {
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
            this.$refs.modaldetallesembarazo.hide();
        },
        async grafica_torta_atencion() {
            if(this.chart_ap != null){
                this.chart_ap.dispose();
            }
            var chart = am4core.create("chartdiv_ap", am4charts.PieChart3D);
            this.chart_ap = chart;
            chart.data = [
                {
                    category: "Sin Atención",
                    first: this.embarazo_data.sin_atencion,
                },
                {
                    category: "Con Atención",
                    first: this.embarazo_data.con_atencion,
                }, 
            ];
            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "first";
            series.dataFields.category = "category";
        },
        async verDetalle() {
            this.crearDataTable();
            this.$refs.modaldetallesembarazo.show();
        }
    }
}
</script>