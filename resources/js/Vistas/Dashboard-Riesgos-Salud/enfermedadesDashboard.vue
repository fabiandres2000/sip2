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
                            <button @click="exportToPDFE()" class="btn btn-danger"><i class="fa fa-file" aria-hidden="true"></i> Exportar PDF</button>
                        </div>
                    </div>
                </div>
            </div> 
            <br>
            <div class="row" ref="filtro2">
                <div class="col-sm-3 col-lg-3 text-left" style="padding: 10px 10px 10px 20px;">
                    <h4>Seleccione un grupo de edad: </h4>
                    <br/>
                    <select class="form-control" @change="enfermedades()" v-model="tipoComboGrupoEdad" id="grupoEdad">
                        <option value = "men1a">Menores de 1 Año</option>
                        <option value = "de1a5">1 a 5 Años</option>
                        <option value = "de6a11">6 a 11 Años</option>
                        <option value = "de12a17">12 a 17 Años</option>
                        <option value = "de18a28">18 a 28 Años</option>
                        <option value = "de29a59">29 a 59 Años</option>
                        <option value = "de60">Mayores de 60 Años</option>
                    </select>
                </div>
                <div class="col-sm-3 col-lg-3 text-left" style="padding: 10px 10px 10px 20px;">
                    <h4>Seleccione tipo de enfermedad: </h4>
                    <br/>
                    <select class="form-control" @change="enfermedades()" v-model="tipoComboEnfermedad" id="tipoEnfermedad">
                        <option value = "Cronica">Cronica</option>
                        <option value = "Infecciosa">Infecciosa</option>
                    </select>
                </div>
            </div> 
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-5" style="padding-top: 30px" ref="imagenes_rs_e">
                <div class="row">
                    <div class="col-lg-12"> 
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <h2>Personas caracterizadas en este grupo de edad</h2>
                                        <p style="font-size: 57px; font-weight: 400; margin-bottom: -1rem;">{{enfermedades_por_edad.numero_personas}}</p>
                                    </div>
                                    <div class="col-4">
                                        <img style="opacity: 0.6" :src="imgPoblacion" width="100%" height="100%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <h5>Personas Con Enfermedades {{tipoComboEnfermedad}}s (por sexo)</h5>
                <div class="row">
                    <div class="col-lg-6"> 
                        <div class="card">
                            <div class="card-body">
                                <div @click="mostrarDetalle('MASCULINO')" class="row" v-if="tipoComboGrupoEdad == 'de18a28' || tipoComboGrupoEdad == 'de29a59' || tipoComboGrupoEdad == 'de60'" style="cursor: pointer">
                                    <div class="col-3">
                                        <img style="opacity: 0.6" :src="imgWMen" width="120%" height="100%">
                                    </div>
                                    <div class="col-5 justify-content-center align-self-center">
                                        <h5>Hombres</h5>
                                    </div>
                                    <div class="col-4  justify-content-center align-self-center">
                                        <p style="font-size: 27px; font-weight: 400; margin: 0px;">{{enfermedades_por_edad.personas_enfermedad_m}}</p>
                                    </div>
                                </div>
                                <div  @click="mostrarDetalle('MASCULINO')" class="row" v-if="tipoComboGrupoEdad == 'men1a' || tipoComboGrupoEdad == 'de1a5' || tipoComboGrupoEdad == 'de6a11' || tipoComboGrupoEdad == 'de12a17'" style="cursor: pointer">
                                    <div class="col-3">
                                        <img style="opacity: 0.6" :src="imgNinios" width="120%" height="100%">
                                    </div>
                                    <div class="col-5  justify-content-center align-self-center">
                                        <h5>Niños</h5>
                                    </div>
                                    <div class="col-4  justify-content-center align-self-center">
                                        <p style="font-size: 27px; font-weight: 400; margin: 0px;">{{enfermedades_por_edad.personas_enfermedad_m}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6"> 
                        <div class="card">
                            <div class="card-body">
                                <div  @click="mostrarDetalle('FEMENINO')" class="row" v-if="tipoComboGrupoEdad == 'de18a28' || tipoComboGrupoEdad == 'de29a59' || tipoComboGrupoEdad == 'de60'" style="cursor: pointer">
                                    <div class="col-3">
                                        <img style="opacity: 0.6" :src="imgWomen" width="120%" height="100%">
                                    </div>
                                    <div class="col-5 justify-content-center align-self-center">
                                        <h5>Mujeres</h5>
                                    </div>
                                    <div class="col-4  justify-content-center align-self-center">
                                        <p style="font-size: 27px; font-weight: 400; margin: 0px;">{{enfermedades_por_edad.personas_enfermedad_f}}</p>
                                    </div>
                                </div>
                                <div @click="mostrarDetalle('FEMENINO')" class="row" v-if="tipoComboGrupoEdad == 'men1a' || tipoComboGrupoEdad == 'de1a5' || tipoComboGrupoEdad == 'de6a11' || tipoComboGrupoEdad == 'de12a17'" style="cursor: pointer">
                                    <div class="col-3">
                                        <img style="opacity: 0.6" :src="imgNinias" width="120%" height="100%">
                                    </div>
                                    <div class="col-5  justify-content-center align-self-center">
                                        <h5>Niñas</h5>
                                    </div>
                                    <div class="col-4  justify-content-center align-self-center">
                                        <p style="font-size: 27px; font-weight: 400; margin: 0px;">{{enfermedades_por_edad.personas_enfermedad_f}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 text-center">
                <h2>Personas Con Enfermedades {{tipoComboEnfermedad}}s</h2>
                <h3>(Por Sexo)</h3>
                <div id="chartdiv_sexo_enfermedad" style="width: 100%; height: 370px"></div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-6 text-center">
                <h3>Comparativa de Personas Con Enfermedades {{tipoComboEnfermedad}}s</h3>
                <h3>(Numero de personas por enfermedad)</h3>
                <div id="chartdiv_enfermedad" style="width: 100%; height: 370px"></div>
            </div>
            <div class="col-lg-6 text-center">
                <h3>Comparativa de Personas Con Enfermedades {{tipoComboEnfermedad}}s</h3>
                <h3>(Por Grupo de Edad y Sexo)</h3>
                <div id="chartdiv_edad_rs" style="width: 100%; height: 370px"></div>
                <div class="row" ref="hmp">
                    <div class="col-3"></div>
                    <div class="col-3"><p><span style="background-color: #67b7dc">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Hombres</p></div>
                    <div class="col-2"></div>
                    <div class="col-3"><p><span style="background-color: #6794dc">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Mujeres</p></div>
                </div>
            </div>
        </div>
        <b-modal
            ref="modalpdf_rs_e"
            hide-footer
            title="Reporte Riesgos de Salud Hogares"
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
        <b-modal
            ref="detalle_rs_e"
            hide-footer
            title="DETALLE RIESGO DE SALUD"
            size="xl"
            centered
            header-bg-variant="danger"
            header-text-variant="light"
            :no-close-on-backdrop="true"
        >
            <br>
            <h3>Personas Con Enfermedades {{tipoComboEnfermedad}}s</h3>
            <h4>sexo ({{sexo_modal}})</h4>
            <br>
            <table style="width: 100%;" class="table_data" id="tabla_riesgos">
                <thead>
                    <tr>
                        <th>Identificacion</th>
                        <th>Nombre</th>
                        <th>Corregimiento</th> 
                        <th>Barrio</th>
                        <th>Direccion</th>
                        <th style="text-align: center">Enfermedades</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in data_filtrada_rs">
                        <td>{{item.tipo_id}}: {{item.identificacion}}</td>
                        <td>{{item.nombre}}</td>
                        <td>{{item.des_corr != "" ? item.des_corr : "CASCO URBANO"}}</td>
                        <td>{{item.des_barrio}}</td>
                        <td>{{item.des_direc}}</td>
                        <td>
                            <ul>
                                <li v-for="item2 in item.enfermedades">{{item2.descripcion}}</li>
                            </ul>
                        </td>
                    </tr>
                </tbody>
            </table>
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
        this.imagen();
        this.coordenadas();
        this.iniciar();
        this.enfermedades();
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
            tipoComboGrupoEdad: "men1a",
            tipoComboEnfermedad: "Cronica",
            enfermedades_por_edad: [],
            imgWomen: null,
            imgWMen: null,
            imgNinios: null,
            imgNinias: null,
            imgPoblacion: null,
            chart_sexo: null,
            data_filtrada_rs: [],
            sexo_modal: "",
            comparativa: [],
            serie_edades: [],
            chart_edades: null,
            graf_barra2: null
        }
    },
    methods: {
        imagen(){
            this.imgWomen = `${store.state.serverPath}assets/media/icons/women.png`; 
            this.imgWMen = `${store.state.serverPath}assets/media/icons/men.png`;
            this.imgPoblacion = `${store.state.serverPath}assets/media/icons/poblacion.png`; 
            this.imgNinios = `${store.state.serverPath}assets/media/icons/ninios.png`; 
            this.imgNinias = `${store.state.serverPath}assets/media/icons/ninias.png`;
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
        async enfermedades() {
            this.isLoading = true;
            await DashboardServiceRS.enfermedades(this.tipo, this.id_combo, this.tipoComboGrupoEdad, this.tipoComboEnfermedad).then(respuesta => {
                this.enfermedades_por_edad = respuesta.data.enfermedades_por_edad;
                this.comparativa = respuesta.data.comparativa;
                this.grafica_torta_sexo(this.enfermedades_por_edad);
                this.crearSerieEdadesRS();
                this.agrupar_por_tipo_enfermedad();
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
                this.enfermedades();
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

            this.enfermedades();
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
        async exportToPDFE(){ 
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

            let filtro2 = {
                grupo: $("#grupoEdad option:selected").text(),
                tipo: $("#tipoEnfermedad option:selected").text(),
            };

            let imagenes = await this.$html2canvas(this.$refs.imagenes_rs_e, options);
            let grafico1 = await this.chart_sexo.exporting.getImage("png");
            let grafico2 = await this.chart_edades.exporting.getImage("png");
            let grafico3 = await this.graf_barra2.exporting.getImage("png");
            let hmp = await this.$html2canvas(this.$refs.hmp, options);

            const parametros = {
                _token: this.csrf,
                filtro: filtro,
                filtro2: filtro2,
                imagenes: imagenes,
                grafico1: grafico1,
                grafico2: grafico2,
                grafico3: grafico3,
                data: this.enfermedades_por_edad.array_personas_enfermedad,
                hmp: hmp,
                tipo_enfermedad: this.tipoComboEnfermedad
            };

            try {
                await DashboardServiceRS.exportarPestanaEnfermedad(parametros).then(respuesta => {
                    this.rutaPdf = store.state.apiURL + respuesta.data.nombre;
                    this.isLoading = false;
                    this.$refs.modalpdf_rs_e.show();
                });
            } catch (error) { 
                this.$swal("Error...!", "Ocurrio un error!", "error");    
                this.isLoading = false;
            }
        },
        cerrarModal() {
            this.$refs.modalpdf_rs_e.hide();
            this.$refs.detalle_rs_e.hide();
        },
        async grafica_torta_sexo(array) {
            if(this.chart_sexo != null){
                this.chart_sexo.dispose();
            }
            var chart = am4core.create("chartdiv_sexo_enfermedad", am4charts.PieChart3D);
            this.chart_sexo = chart;
            chart.data = [
                {
                    category: "Masculino",
                    first: array.personas_enfermedad_m,
                },
                {
                    category: "Femenino",
                    first: array.personas_enfermedad_f,
                }, 
            ];
            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "first";
            series.dataFields.category = "category";
        },
        async mostrarDetalle(sexo){
            this.sexo_modal = sexo;
            this.data_filtrada_rs = await this.filtrarDatos(sexo);
            this.$refs.detalle_rs_e.show();
        },
        async filtrarDatos(sexo){
            let data = [];
            this.enfermedades_por_edad.array_personas_enfermedad.forEach(element => {
                if(element.sexo == sexo){
                    data.push(element);
                }
            });
            return data;
        },
        crearSerieEdadesRS(){
            this.serie_edades = [
                {
                    age: "0-1",
                    male: Number(this.comparativa.men1a.personas_enfermedad_m * -1),
                    female: Number(this.comparativa.men1a.personas_enfermedad_f)
                },
                {
                    age: "1-5",
                    male: Number(this.comparativa.de1a5.personas_enfermedad_m * -1),
                    female: Number(this.comparativa.de1a5.personas_enfermedad_f)
                },
                {
                    age: "6-11",
                    male: Number(this.comparativa.de6a11.personas_enfermedad_m * -1),
                    female: Number(this.comparativa.de6a11.personas_enfermedad_f)
                },
                {
                    age: "12-17",
                    male: Number(this.comparativa.de12a17.personas_enfermedad_m * -1),
                    female: Number(this.comparativa.de12a17.personas_enfermedad_f)
                },
                {
                    age: "18-28",
                    male: Number(this.comparativa.de18a28.personas_enfermedad_m * -1),
                    female: Number(this.comparativa.de18a28.personas_enfermedad_f)
                },
                {
                    age: "29-59",
                    male: Number(this.comparativa.de29a59.personas_enfermedad_m * -1),
                    female: Number(this.comparativa.de29a59.personas_enfermedad_f)
                },
                {
                    age: "60+",
                    male: Number(this.comparativa.de60.personas_enfermedad_m * -1),
                    female: Number(this.comparativa.de60.personas_enfermedad_f)
                }
            ];
            this.grafica_edades_rs();
        },
        grafica_edades_rs() {
            // Themes begin
            am4core.useTheme(am4themes_animated);
            // Themes end

            // Create chart instance
            if(this.chart_edades != null){
                this.chart_edades.dispose();
            }
            var chart = am4core.create("chartdiv_edad_rs", am4charts.XYChart);
            this.chart_edades = chart;
            // Add data
            chart.data = this.serie_edades;
            // Use only absolute numbers
            chart.numberFormatter.numberFormat = "#.#s";

            // Create axes
            var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "age";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.inversed = true;

            var valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
            valueAxis.extraMin = 0.1;
            valueAxis.extraMax = 0.1;
            valueAxis.renderer.minGridDistance = 40;
            valueAxis.renderer.ticks.template.length = 5;
            valueAxis.renderer.ticks.template.disabled = false;
            valueAxis.renderer.ticks.template.strokeOpacity = 0.4;
            valueAxis.renderer.labels.template.adapter.add("text", function(text) {
                return text == "Male" || text == "Female" ? text : text;
            });

            // Create series
            var male = chart.series.push(new am4charts.ColumnSeries());
            male.dataFields.valueX = "male";
            male.dataFields.categoryY = "age";
            male.clustered = false;

            var maleLabel = male.bullets.push(new am4charts.LabelBullet());
            maleLabel.label.text = "{valueX}";
            maleLabel.label.hideOversized = false;
            maleLabel.label.truncate = false;
            maleLabel.label.horizontalCenter = "right";
            maleLabel.label.dx = -10;

            var female = chart.series.push(new am4charts.ColumnSeries());
            female.dataFields.valueX = "female";
            female.dataFields.categoryY = "age";
            female.clustered = false;

            var femaleLabel = female.bullets.push(new am4charts.LabelBullet());
            femaleLabel.label.text = "{valueX}";
            femaleLabel.label.hideOversized = false;
            femaleLabel.label.truncate = false;
            femaleLabel.label.horizontalCenter = "left";
            femaleLabel.label.dx = 10;

            this.loading = false;
        },
        agrupar_por_tipo_enfermedad() {
            let por_tipo = [];
            this.enfermedades_por_edad.array_personas_enfermedad.forEach(element => {
                let encontrado = false;
                element.enfermedades.forEach(enfermedad => {
                    por_tipo.forEach(element2 => {
                        if(element2.nombre == enfermedad.descripcion){
                            encontrado = true;
                            element2.cantidad += 1;
                        }
                    });

                    if(encontrado == false){
                        por_tipo.push({
                            'nombre': enfermedad.descripcion,
                            'cantidad': 1
                        });
                    }
                });
            });

            am4core.useTheme(am4themes_animated);
            if(this.graf_barra2 != null){
                this.graf_barra2.dispose();
            }
            var chart = am4core.create("chartdiv_enfermedad", am4charts.XYChart3D);
            this.graf_barra2 = chart;
            chart.paddingBottom = 50;

            chart.cursor = new am4charts.XYCursor();
        
            var xAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            xAxis.dataFields.category = "category";
            xAxis.renderer.minGridDistance = 30;

            var yAxis = chart.yAxes.push(new am4charts.ValueAxis());
            yAxis.min = 0;

            var axisLabels = xAxis.renderer.labels.template;
            axisLabels.fontSize = 13;

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

            chart.data = [];

            por_tipo.forEach(element => {
                chart.data.push({
                    category: element.nombre,
                    first: element.cantidad,
                });
            });
            createSeries("first", "Enfermedad");
        }
    }
}
</script>
<style>
    .nav-pills, .nav-tabs {
        margin: 0 0 -10px 0 !important;
    }
</style>