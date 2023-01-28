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
            <div ref="filtro">
                <div class="row" >
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
                                <button @click="exportToPDFRSP()" class="btn btn-danger"><i class="fa fa-file" aria-hidden="true"></i> Exportar PDF</button>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row" ref="filtro">
                    <div class="col-sm-3 col-lg-3 text-left" style="padding: 10px 10px 10px 20px;">
                        <h4>Seleccione un grupo de edad: </h4>
                        <br/>
                        <select class="form-control" @change="poblacionRS()" v-model="tipoComboGrupoEdad" id="grupoEdad">
                            <option value = "riesgos_salud_men1">Menores de 1 Año</option>
                            <option value = "riesgos_salud_de1a5">1 a 5 Años</option>
                            <option value = "riesgos_salud_de6a11">6 a 11 Años</option>
                            <option value = "riesgos_salud_de12a17">12 a 17 Años</option>
                            <option value = "riesgos_salud_de18a28">18 a 28 Años</option>
                            <option value = "riesgos_salud_de29a59">29 a 59 Años</option>
                            <option value = "riesgos_salud_de60">Mayores de 60 Años</option>
                        </select>
                    </div>
                    <div class="col-sm-4 col-lg-4 text-left" style="padding: 10px 10px 10px 20px;">
                        <h4>Seleccione un riesgo de salud: </h4>
                        <br/>
                        <select id="riesgos_select" class="form-control" @change="data_combo_riesgo()" v-model="combo_riesgo">
                            <option v-for="item in data_select_riesgo " :value = "item.value">{{item.nombre}}</option>
                        </select>
                    </div>
                </div>
            </div>
            <hr>
            <div v-if="bandera_data == true">
                <div class="row">
                    <div class="col-lg-6 text-center">
                        <br>
                        <h2>{{ titulo_grafico }}</h2>
                        <br>
                        <div id="chartdiv_barras" style="width: 100%; height: 350px"></div>
                    </div>
                    <div class="col-lg-6 text-center">
                        <br>
                        <h2>{{ titulo_grafico }}</h2>
                        <br>
                        <div id="graf_torta" style="width: 100%; height: 350px"></div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <br>
                        <h2>{{ titulo_grafico }}</h2>
                        <br>
                        <table style="width: 100%;" class="table_data" id="tabla_riesgos">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th style="text-align: center">Riesgo Inherente</th>
                                    <th style="text-align: center">Riesgo Residual</th>
                                    <th>Corregimiento</th> 
                                    <th>Barrio</th>
                                    <th>Direccion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in data_tabla_riesgos">
                                    <td>{{item.nombre}}</td>
                                    <td style="text-align: center"><span :class="item.cInherente">{{item.Inherente}} - {{item.vInherente}}</span></td>
                                    <td style="text-align: center"><span :class="item.cResidual">{{item.Residual}} - {{item.vResidual}}</span></td>
                                    <td><span>{{item.corregimiento}}</span></td>
                                    <td><span>{{item.barrio}}</span></td>
                                    <td><span>{{item.direccion}}</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div v-if="bandera_data == false" style="text-align: center; padding: 50px">
                <h1>¡Importante!</h1>
                <br>
                <br>
                <h2>Este riesgo no se calcula para el grupo de edad seleccionado.</h2>
                <br>
                <h2>Seleccione otro riesgo...</h2>
            </div>
        </div>
        <b-modal
            ref="modalpdf"
            hide-footer
            title="Reporte Riesgos de Salud"
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
import * as am4core from "@amcharts/amcharts4/core";
import * as am4charts from "@amcharts/amcharts4/charts";
import am4themes_animated from "@amcharts/amcharts4/themes/animated";
import * as BarriosService from "../../Servicios/barrios_servicios.js";
import * as CorregimientoService from "../../Servicios/corregimientos_servicios.js";
import * as VeredasService from "../../Servicios/veredas_servicios.js";
import $ from "jquery";

am4core.useTheme(am4themes_animated);
import store from "../../store";

export default {
    components: { CircleProgress, Loading },
    mounted() {
        this.coordenadas();
        this.iniciar();
        this.listarBarrios();
        this.listarCorregimientos();
        this.listarVeredas();
        this.poblacionRS();
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
            tipoComboGrupoEdad: "riesgos_salud_men1",
            poblacion: [],
            graf_torta: null,
            graf_barra: null,
            combo_riesgo: "alteraciones_transtornos_audicion",
            riesgos_salud_tipo_1:  [
                { value: "alteraciones_transtornos_audicion", nombre: "Alteraciones Y Transtornos De La Audición Y Comunicación " },
                { value: "alteraciones_transtornos_visuales", nombre: "Alteraciones Y Transtornos Visuales" },
                { value: "cancer", nombre: "Cancer" },
                { value: "consumo_spa", nombre: "Consumo De SPA" },
                { value: "enfermedad_cardiovascular", nombre: "Enfermedad Cardiovascular Aterogénica" },
                { value: "enfermedades_infecciosas", nombre: "Enfermedades Infeccisosas" },
                { value: "enfermedades_respiratorias", nombre: "Enfermedades Respiratorias Crónicas " },
                { value: "enfermedades_zoonoticas", nombre: "Enfermedades Zoonoticas " },
                { value: "problemas_salud_mental", nombre: "Problemas En Salud Mental " },
                { value: "riesgo_delgadez", nombre: "Riesgo De Delgadez" },
                { value: "riesgo_muerte", nombre: "Riesgo De Muerte Por Desnutrición " },
                { value: "riesgo_sobrepeso", nombre: "Riesgo Sobrepeso " },
                { value: "riesgo_talla_baja", nombre: "Riesgo De Talla Baja " },
                { value: "riesgos_desnutricion_aguda", nombre: "Riesgo Desnutrición Aguda" },
                { value: "riesgos_desnutricion_global", nombre: "Riesgo Desnutrición Global " },
                { value: "salud_bucal", nombre: "Salud Bucal " },
                { value: "transtornos_asociados_spa", nombre: "Trastornos Asociados Al Uso De SPA" },
                { value: "transtornos_degenartivos", nombre: "Trastornos Degenerativos, Neuropatías Y Enfermedades Autoinmunes" },
                { value: "violencias", nombre: "Violencias" },
            ],
            data_select_riesgo: [],
            titulo_grafico: "",
            data_grafico: [],
            data_tabla_riesgos: [],
            bandera_data: true
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
                this.poblacionRS();
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

            this.poblacionRS();
        },
        async poblacionRS(){
            this.isLoading = true;
            await DashboardServiceRS.poblacion(this.tipo, this.id_combo, this.tipoComboGrupoEdad).then(respuesta => {
                this.poblacion = respuesta.data["poblacion"]; 
                this.data_combo_riesgo();
                this.isLoading = false;
            })
            .catch(err => {
                console.log(err);
            });
        },
        async data_combo_riesgo() {
            this.data_select_riesgo = this.riesgos_salud_tipo_1;
            let tipoRiesgo = this.combo_riesgo;
            this.obtener_data_grafico(tipoRiesgo);
        },
        async obtener_data_grafico(tipoRiesgo){
            this.bandera_data = true;

            this.data_select_riesgo.forEach(element => {
                if(element.value == tipoRiesgo){
                    this.titulo_grafico = element.nombre;
                }
            });

            let  data = [];

            if(this.tipoComboGrupoEdad == "riesgos_salud_men1" || this.tipoComboGrupoEdad == "riesgos_salud_de1a5" ){
                switch (tipoRiesgo) {
                    case "alteraciones_transtornos_audicion":
                        data =  this.poblacion.riesgosCantidad.alteraciones_transtornos_audicion;
                        break;
                    case "alteraciones_transtornos_visuales":
                         data =  this.poblacion.riesgosCantidad.alteraciones_transtornos_visuales;
                        break;
                    case "cancer":
                        data =  this.poblacion.riesgosCantidad.cancer;
                        break;
                    case "consumo_spa":
                        data =  this.poblacion.riesgosCantidad.consumo_spa;
                        break;
                    case "enfermedad_cardiovascular":
                        data =  this.poblacion.riesgosCantidad.enfermedad_cardiovascular;
                        break;
                    case "enfermedades_infecciosas":
                        data =  this.poblacion.riesgosCantidad.enfermedades_infecciosas;
                        break;
                    case "enfermedades_respiratorias":
                        data =  this.poblacion.riesgosCantidad.enfermedades_respiratorias;
                        break;
                    case "enfermedades_zoonoticas":
                        data =  this.poblacion.riesgosCantidad.enfermedades_zoonoticas;
                        break;
                    case "problemas_salud_mental":
                        data =  this.poblacion.riesgosCantidad.problemas_salud_mental;
                        break;
                    case "riesgo_muerte":
                        data =  this.poblacion.riesgosCantidad.riesgo_muerte;
                        break;
                    case "riesgo_sobrepeso":
                        data =  this.poblacion.riesgosCantidad.riesgo_sobrepeso;
                        break;
                    case "riesgo_talla_baja":
                        data =  this.poblacion.riesgosCantidad.riesgo_talla_baja;
                        break;
                    case "riesgos_desnutricion_aguda":
                        data =  this.poblacion.riesgosCantidad.riesgos_desnutricion_aguda;
                        break;
                    case "riesgos_desnutricion_global":
                        data =  this.poblacion.riesgosCantidad.riesgos_desnutricion_global;
                        break;
                    case "salud_bucal":
                        data =  this.poblacion.riesgosCantidad.salud_bucal;
                        break;
                    case "transtornos_asociados_spa":
                        data =  this.poblacion.riesgosCantidad.transtornos_asociados_spa;
                        break;
                    case "transtornos_degenartivos":
                        data =  this.poblacion.riesgosCantidad.transtornos_degenartivos;
                        break;
                    case "violencias":
                        data =  this.poblacion.riesgosCantidad.violencias;
                        break;
                    default:
                        this.$swal("Importante...!", "Este riesgo no se calcula para el grupo de edad seleccionado", "warning");
                        this.bandera_data = false;
                        break;
                }
            }

            if(this.tipoComboGrupoEdad == "riesgos_salud_de6a11" || this.tipoComboGrupoEdad == "riesgos_salud_de12a17" ){
                switch (tipoRiesgo) {
                    case "alteraciones_transtornos_audicion":
                        data =  this.poblacion.riesgosCantidad.alteraciones_transtornos_audicion;
                        break;
                    case "alteraciones_transtornos_visuales":
                         data =  this.poblacion.riesgosCantidad.alteraciones_transtornos_visuales;
                        break;
                    case "cancer":
                        data =  this.poblacion.riesgosCantidad.cancer;
                        break;
                    case "consumo_spa":
                        data =  this.poblacion.riesgosCantidad.consumo_spa;
                        break;
                    case "enfermedad_cardiovascular":
                        data =  this.poblacion.riesgosCantidad.enfermedad_cardiovascular;
                        break;
                    case "enfermedades_infecciosas":
                        data =  this.poblacion.riesgosCantidad.enfermedades_infecciosas;
                        break;
                    case "enfermedades_respiratorias":
                        data =  this.poblacion.riesgosCantidad.enfermedades_respiratorias;
                        break;
                    case "enfermedades_zoonoticas":
                        data =  this.poblacion.riesgosCantidad.enfermedades_zoonoticas;
                        break;
                    case "problemas_salud_mental":
                        data =  this.poblacion.riesgosCantidad.problemas_salud_mental;
                        break;
                    case "riesgo_delgadez":
                        data =  this.poblacion.riesgosCantidad.riesgo_delgadez;
                        break;
                    case "riesgo_talla_baja":
                        data =  this.poblacion.riesgosCantidad.riesgo_talla_baja;
                        break;
                    case "salud_bucal":
                        data =  this.poblacion.riesgosCantidad.salud_bucal;
                        break;
                    case "transtornos_asociados_spa":
                        data =  this.poblacion.riesgosCantidad.transtornos_asociados_spa;
                        break;
                    case "transtornos_degenartivos":
                        data =  this.poblacion.riesgosCantidad.transtornos_degenartivos;
                        break;
                    case "violencias":
                        data =  this.poblacion.riesgosCantidad.violencias;
                        break;
                    default:
                        this.$swal("Importante...!", "Este riesgo no se calcula para el grupo de edad seleccionado", "warning");
                        this.bandera_data = false;
                        break;
                }
            }

            if(this.tipoComboGrupoEdad == "riesgos_salud_de18a28" || this.tipoComboGrupoEdad == "riesgos_salud_de29a59" ){
                switch (tipoRiesgo) {
                    case "alteraciones_transtornos_audicion":
                        data =  this.poblacion.riesgosCantidad.alteraciones_transtornos_audicion;
                        break;
                    case "alteraciones_transtornos_visuales":
                         data =  this.poblacion.riesgosCantidad.alteraciones_transtornos_visuales;
                        break;
                    case "cancer":
                        data =  this.poblacion.riesgosCantidad.cancer;
                        break;
                    case "consumo_spa":
                        data =  this.poblacion.riesgosCantidad.consumo_spa;
                        break;
                    case "enfermedad_cardiovascular":
                        data =  this.poblacion.riesgosCantidad.enfermedad_cardiovascular;
                        break;
                    case "enfermedades_infecciosas":
                        data =  this.poblacion.riesgosCantidad.enfermedades_infecciosas;
                        break;
                    case "enfermedades_respiratorias":
                        data =  this.poblacion.riesgosCantidad.enfermedades_respiratorias;
                        break;
                    case "enfermedades_zoonoticas":
                        data =  this.poblacion.riesgosCantidad.enfermedades_zoonoticas;
                        break;
                    case "problemas_salud_mental":
                        data =  this.poblacion.riesgosCantidad.problemas_salud_mental;
                        break;
                    case "riesgo_delgadez":
                        data =  this.poblacion.riesgosCantidad.riesgo_delgadez;
                        break;
                    case "salud_bucal":
                        data =  this.poblacion.riesgosCantidad.salud_bucal;
                        break;
                    case "transtornos_asociados_spa":
                        data =  this.poblacion.riesgosCantidad.transtornos_asociados_spa;
                        break;
                    case "transtornos_degenartivos":
                        data =  this.poblacion.riesgosCantidad.transtornos_degenartivos;
                        break;
                    case "violencias":
                        data =  this.poblacion.riesgosCantidad.violencias;
                        break;
                    default:
                        this.$swal("Importante...!", "Este riesgo no se calcula para el grupo de edad seleccionado", "warning");
                        this.bandera_data = false;
                        break;
                }
            }

            if(this.tipoComboGrupoEdad == "riesgos_salud_de60"){
                switch (tipoRiesgo) {
                    case "alteraciones_transtornos_audicion":
                        data =  this.poblacion.riesgosCantidad.alteraciones_transtornos_audicion;
                        break;
                    case "alteraciones_transtornos_visuales":
                         data =  this.poblacion.riesgosCantidad.alteraciones_transtornos_visuales;
                        break;
                    case "cancer":
                        data =  this.poblacion.riesgosCantidad.cancer;
                        break;
                    case "consumo_spa":
                        data =  this.poblacion.riesgosCantidad.consumo_spa;
                        break;
                    case "enfermedad_cardiovascular":
                        data =  this.poblacion.riesgosCantidad.enfermedad_cardiovascular;
                        break;
                    case "enfermedades_infecciosas":
                        data =  this.poblacion.riesgosCantidad.enfermedades_infecciosas;
                        break;
                    case "enfermedades_respiratorias":
                        data =  this.poblacion.riesgosCantidad.enfermedades_respiratorias;
                        break;
                    case "enfermedades_zoonoticas":
                        data =  this.poblacion.riesgosCantidad.enfermedades_zoonoticas;
                        break;
                    case "problemas_salud_mental":
                        data =  this.poblacion.riesgosCantidad.problemas_salud_mental;
                        break;
                    case "salud_bucal":
                        data =  this.poblacion.riesgosCantidad.salud_bucal;
                        break;
                    case "transtornos_asociados_spa":
                        data =  this.poblacion.riesgosCantidad.transtornos_asociados_spa;
                        break;
                    case "transtornos_degenartivos":
                        data =  this.poblacion.riesgosCantidad.transtornos_degenartivos;
                        break;
                    case "violencias":
                        data =  this.poblacion.riesgosCantidad.violencias;
                        break;
                    default:
                        this.$swal("Importante...!", "Este riesgo no se calcula para el grupo de edad seleccionado", "warning");
                        this.bandera_data = false;
                        break;
                } 
            }

            setTimeout(() => {
                this.grafico_torta(data);
                this.grafica_barras(data);
            }, 1000);

            if(this.bandera_data){
                this.data_tabla(tipoRiesgo);
            }else{
                this.data_tabla_riesgos = [];
                $("#tabla_riesgos").dataTable().fnDestroy();
            }
            
        },
        async grafico_torta(data) {
            if(this.graf_torta != null){
                this.graf_torta.dispose();
            }
            var chart = am4core.create("graf_torta" , am4charts.PieChart3D);
            this.graf_torta = chart;
            chart.data = [
                {
                    category: "Inexistente",
                    first: data.Inexistente,
                },
                {
                    category: "Bajo",
                    first: data.Bajo,
                },
                {
                    category: "Moderado",
                    first: data.Moderado,
                },
                {
                    category: "Alto",
                    first: data.Alto,
                },
            ];
            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "first";
            series.dataFields.category = "category";

            series.slices.template.events.on("hit", function(ev){
                console.log(ev.target.dataItem)
            });

            series.slices.template.adapter.add("fill", function(fill, target) {
                if (target.dataItem && (target.dataItem.dataContext.category == "Inexistente")) {
                    return am4core.color("#43ad8e");
                }
                if (target.dataItem && (target.dataItem.dataContext.category == "Bajo")) {
                    return am4core.color("#0abb87");
                }
                if (target.dataItem && (target.dataItem.dataContext.category == "Moderado")) {
                    return am4core.color("#ffb822");
                }
                if (target.dataItem && (target.dataItem.dataContext.category == "Alto")) {
                    return am4core.color("#fd397a");
                }
            });
        },
        async grafica_barras(data) {
           
           am4core.useTheme(am4themes_animated);
           if(this.graf_barra != null){
               this.graf_barra.dispose();
           }
           var chart = am4core.create("chartdiv_barras", am4charts.XYChart3D);
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
                    if (target.dataItem && (target.dataItem.categoryX == "Inexistente")) {
                        return am4core.color("#43ad8e");
                    }
                    if (target.dataItem && (target.dataItem.categoryX == "Bajo")) {
                        return am4core.color("#0abb87");
                    }
                    if (target.dataItem && (target.dataItem.categoryX == "Moderado")) {
                        return am4core.color("#ffb822");
                    }
                    if (target.dataItem && (target.dataItem.categoryX == "Alto")) {
                        return am4core.color("#fd397a");
                    }
                });

               return series;
           }

           chart.data = [
                {
                    category: "Inexistente",
                    first: data.Inexistente,
                },
                {
                    category: "Bajo",
                    first: data.Bajo,
                },
                {
                    category: "Moderado",
                    first: data.Moderado,
                },
                {
                    category: "Alto",
                    first: data.Alto,
                },
            ];
            createSeries("first", "Hombres");
        },
        async data_tabla(riesgo){
            let data_table = [];
            for (let index = 0; index < this.poblacion.poblacion.length; index++) {
                var element = this.poblacion.poblacion[index];
                var snom = element["snom"] != null ? element["snom"] : "";
                var corre = element["des_corr"] != "" ? element["des_corr"] : "CASCO URBANO";
                var json = {
                    nombre: element["pnom"]+" "+ snom +" "+element["pape"]+" "+element["sape"],
                    Inherente: element[riesgo+"_I"],
                    Residual: element[riesgo+"_R"],
                    vInherente: this.valoracion(parseInt(element[riesgo+"_I"])),
                    vResidual: this.valoracion(parseInt(element[riesgo+"_R"])),
                    cInherente: this.color(this.valoracion(parseInt(element[riesgo+"_I"]))),
                    cResidual: this.color(this.valoracion(parseInt(element[riesgo+"_R"]))),
                    corregimiento: corre,
                    barrio: element["des_barrio"],
                    direccion: element["des_direc"],
                };
                data_table.push(json);
            }
            this.data_tabla_riesgos = data_table;

            $("#tabla_riesgos").dataTable().fnDestroy();
            setTimeout(() => {
                $('#tabla_riesgos').DataTable({
                    "lengthChange": false,
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
        valoracion(valor){
            var eficacia = "";
            if (valor == 1 || valor == 0) {
                eficacia = "Inexistente";
            } else {
                if (valor == 2) {
                    eficacia = "Bajo";
                } else {
                    if (valor == 3) {
                        eficacia = "Moderado";
                    } else {
                        eficacia = "Alto";
                    }
                }
            }
            return eficacia;
        },
        color(valor){
            var color = "";
            if (valor == "Bajo" || valor == "Inexistente") {
                color = "kt-badge kt-badge--inline kt-badge--success";
            } else {
                if (valor == "Moderado") {
                    color = "kt-badge kt-badge--inline kt-badge--warning";
                } else {
                    color = "kt-badge kt-badge--inline kt-badge--danger";
                }
            }
            return color;
        },
        async exportToPDFRSP(){ 
            this.isLoading = true;

            // convertir a imagen todos los graficos
            const options = {
                type: 'dataURL',
                useCORS: true,
            }
           
            // convertir a imagen todos los graficos
            let filtrop = {
                bcm:  this.barrios.filter( item => { return item.value ==  this.comboBarrio}),
                bc:  this.barriosCorregimiento.filter( item => { return item.value == this.comboBarrio2 }),
                v:  this.veredas.filter( item => { return item.id == this.comboVereda }),
                c:  this.corregimientos.filter( item => { return item.id == this.comboCorregimiento }),
                grupo: $("#grupoEdad option:selected").text(),
                riesgo: $("#riesgos_select option:selected").text()
            };

            let grafico1p = await this.graf_torta.exporting.getImage("png");
            let grafico2p = await this.graf_barra.exporting.getImage("png");

            const parametros = {
                _token: this.csrf,
                filtro: filtrop,
                grafico1: grafico1p,
                grafico2: grafico2p,
                riesgo: this.titulo_grafico,
                data: this.data_tabla_riesgos
            };
            try {
                await DashboardServiceRS.exportarRiesgoSalud(parametros).then(respuesta => {
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
        },
    }
}
</script>
<style>
   .progress-content {
        position: absolute;
        top: 38%;
        font-size: 20px;
        font-weight: bold;
    }

    .table_data {
        width: 100%;
        font-size: 17px;
        border-collapse: collapse;
    }

    .table_data thead {
        padding: 0.3em;
        color: #fff !important;
        background: #5578eb;
    }

    .table_data thead tr th, .table_data tbody tr td {
        text-align: left;
        vertical-align: top;
        padding: 0.3em;
        caption-side: bottom;
    }


    .table_data tbody tr:nth-child(odd) {
        background-color: #fff;
    }

    .table_data tbody tr:nth-child(even) {
        background-color: #f1f1f1;
    }

    .dataTable th {
        color: #ffffff !important;
    }

    .dataTables_paginate span {
        padding-left: 10px;
        padding-right: 10px;
        color: #ffff !important;
    }

    .dataTables_paginate span  a{
        color: #ffff !important;
    }

    .dataTables_filter label input {
        margin-left: 20px
    }
    
    .nav-pills, .nav-tabs {
        margin: 0 0 -10px 0 !important;
    }
</style>