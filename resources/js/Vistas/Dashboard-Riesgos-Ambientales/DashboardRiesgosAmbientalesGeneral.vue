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
            <div class="row">
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
                <div ref="boton1" class="col-sm-3 col-lg-3 text-right" style="padding: 10px 10px 10px 20px;">
                    <button style="position: absolute;top: 55%;left: 48%;"  @click="exportToPDF()" class="btn btn-danger"><i class="fa fa-file" aria-hidden="true"></i> Exportar PDF</button>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-4 text-center">
                    <br >
                    <h4>Viviendas sin acceso a agua potable</h4>
                    <circle-progress
                        stroke-bg-color = "#e3e2e1"
                        :r="80" 
                        :stroke-width="12"  
                        :stroke-color="colorspinnner" 
                        :percentage="Math.floor(porcentajeviendasSinAguaPotable * 10) / 10"> 
                    </circle-progress>
                    <br>
                    <h4>{{viendasSinAguaPotable}} / {{totalViviendas}}</h4> 
                </div>
                <div class="col-lg-4 text-center">
                    <br >
                    <h4>Hogares sin acceso a agua potable</h4>
                    <circle-progress
                        stroke-bg-color = "#e3e2e1"
                        :r="80" 
                        :stroke-width="12"  
                        :stroke-color="colorspinnner2" 
                        :percentage="Math.floor(porcentajehogaresSinAguaPotable * 10) / 10"> 
                    </circle-progress>
                    <br>
                    <h4>{{hogaresSinAguaPotable}} / {{totalHogares}}</h4> 
                </div>
                <div class="col-lg-4 text-center">
                    <br >
                    <h4>población sin acceso a agua potable</h4>
                    <circle-progress
                        stroke-bg-color = "#e3e2e1"
                        :r="80" 
                        :stroke-width="12"  
                        :stroke-color="colorspinnner3" 
                        :percentage="Math.floor(porcentajepoblacionSinAguaPotable * 10) / 10"> 
                    </circle-progress>
                    <br>
                    <h4>{{poblacionSinAguaPotable}} / {{totalPoblacion}}</h4> 
                </div>
                <div class="col-lg-4 text-center">
                    <br >
                    <h4>Viviendas sin alcantarillado</h4>
                    <circle-progress
                        stroke-bg-color = "#e3e2e1"
                        :r="80" 
                        :stroke-width="12"  
                        :stroke-color="colorspinnner4" 
                        :percentage="Math.floor(porcentajeviendasSinalcantarillado * 10) / 10"> 
                    </circle-progress>
                    <br>
                    <h4>{{viendasSinalcantarillado}} / {{totalViviendas}}</h4> 
                </div>
                <div class="col-lg-4 text-center">
                    <br >
                    <h4>Hogares sin alcantarillado</h4>
                    <circle-progress
                        stroke-bg-color = "#e3e2e1"
                        :r="80" 
                        :stroke-width="12"  
                        :stroke-color="colorspinnner5" 
                        :percentage="Math.floor(porcentajehogaresSinalcantarillado * 10) / 10"> 
                    </circle-progress>
                    <br>
                    <h4>{{hogaresSinalcantarillado}} / {{totalHogares}}</h4> 
                </div>
                <div class="col-lg-4 text-center">
                    <br >
                    <h4>población sin alcantarillado</h4>
                     <circle-progress
                        stroke-bg-color = "#e3e2e1"
                        :r="80" 
                        :stroke-width="12"  
                        :stroke-color="colorspinnner6" 
                        :percentage="Math.floor(porcentajepoblacionSinalcantarillado * 10) / 10"> 
                    </circle-progress>
                    <br>
                    <h4>{{poblacionSinalcantarillado}} / {{totalPoblacion}}</h4> 
                </div>
            </div>
            <br>
            <br>
            <div class="row" style="padding: 10px 10px 10px 20px;">
                <div class="col-lg-12">
                    <h2>{{ente}}</h2>
                    <h3>{{titulo2}}</h3>
                    <select style="width: 50%" class="form-control" @change="cambiarTipoVivienda()" v-model="tipoComboVivienda">
                        <option value = "">Seleccione...</option>
                        <option value = "type1">Viviendas sin Acceso a Agua Potable </option>
                        <option value = "type2">Viviendas sin Acceso a Alcantarillado </option>
                    </select>
                </div>
                <div :class="claseT">
                    <br>
                    <div v-if="points.length" ref="exportMapa">
                        <vue-google-heatmap
                            :points="points"
                            :width = "widthMap"
                            :height="heightMap"
                            map-type="roadmap"
                            :initial-zoom="14.6"
                            :lat="latitud"
                            :lng="longitud"
                        />
                    </div>
                    <div style="height: 400px; padding-top: 10%" class="col-md-12 text-center" v-if="loading">
                        <img  src="https://upload.wikimedia.org/wikipedia/commons/c/c7/Loading_2.gif?20170503175831" alt="cargando">
                    </div>
                    <br><br>
                    <div style="height: 550px; width: 1400px; overflow: hidden" ref="imagenMapa" hidden>
                        <img style="height: 700px; width: 1400px" :src="output"></img>
                    </div>
                </div>
                <div :class="claseT" style="padding: 20px 45px 10px;" ref="dataTable">
                    <table id="tabla-t" class="table_data" style="width: 100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Direccion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in dataTableF" :key="item.id">
                                <td>{{item.id_hogar}}</td>
                                <td>{{item.direccion}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <vue-excel-xlsx
                        :data="dataExcel"
                        :columns="columns"
                        :file-name="filename"
                        :file-type="'xlsx'"
                        :sheet-name="'sheetname'"
                        style = "background-color: green; color: white; border: 0px; padding: 5px; border-radius: 10px"
                        >
                        Exportar a excel <i class="fa fa-table" aria-hidden="true"></i>
                    </vue-excel-xlsx>
                </div>
                <div class="col-lg-12" style="padding: 30px 10px 10px 10px;" ref="dataTable2" hidden>
                   <table id="tabla-t" class="table_data" style="width: 100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Direccion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in dataTableF" :key="item.id">
                                <td>{{item.id_hogar}}</td>
                                <td>{{item.direccion}}</td>
                            </tr>
                        </tbody>
                   </table>
                </div>
            </div>
        </div> 
    </div>
</template>
<script>
import * as DashboardRiesgosAmbientalesService from "../../Servicios/dashboard_riesgos_ambientales.js";
import * as BarriosService from "../../Servicios/barrios_servicios.js";
import * as CorregimientoService from "../../Servicios/corregimientos_servicios.js";
import * as VeredasService from "../../Servicios/veredas_servicios.js";
import * as usuarioServicios from "../../Servicios/usuarios_servicios";
import * as DashboardService from "../../Servicios/dashboard";
import html2pdf from "./html2pdf.js";
import CircleProgress from 'vue-pithy-progress/lib/circle-progress.umd.min.js';
import 'vue-pithy-progress/lib/circle-progress.css';
import $ from "jquery";
import DataTable from "datatables.net";
import Loading from "vue-loading-overlay";

export default {
    components: { CircleProgress, Loading },
    mounted() {
        this.coordenadas();
        this.PorcentajesGeneral();
        this.listarBarrios();
        this.listarCorregimientos();
        this.listarVeredas();
        this.iniciar();
    },
    props: [],
    data() {
        return {
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
            center: { lat: 0, lng: 0 },
            latitud: 0.0,
            longitud: 0.0,
            points: [],
            markers: [],
            markers2: [],
            ente: "",
            porcentajes: [],
            colorspinnner: "#ffff",
            colorspinnner2: "#ffff",
            colorspinnner3: "#ffff",
            colorspinnner4: "#ffff",
            colorspinnner5: "#ffff",
            colorspinnner6: "#ffff",
            porcentajeviendasSinAguaPotable: 0,
            porcentajehogaresSinAguaPotable: 0,
            porcentajepoblacionSinAguaPotable: 0,
            porcentajeviendasSinalcantarillado: 0,
            porcentajehogaresSinalcantarillado: 0,
            porcentajepoblacionSinalcantarillado: 0,
            totalViviendas: 0,
            totalHogares: 0,
            totalPoblacion: 0,
            viendasSinAguaPotable: 0,
            hogaresSinAguaPotable: 0,
            poblacionSinAguaPotable: 0,
            viendasSinalcantarillado: 0,
            hogaresSinalcantarillado: 0,
            poblacionSinalcantarillado: 0,
            comboBarrio: "",
            barrios: [],
            barriosCorregimiento: [],
            comboBarrio2: "",
            comboCorregimiento: "",
            corregimientos: [],
            comboVereda: "",
            veredas: [],
            tipoCombo: "todos",
            viendasSAP: [],
            viendasSA: [],
            titulo2: "",
            tipoComboVivienda: "type1",
            loading: false,
            output: "",
            heightMap: 500,
            widthMap: 700,
            dataTableF: [],
            claseT: "col-lg-6",
            isLoading: false,
            columns: [
                {
                    label: "ID",
                    field: "id",
                },
                {
                    label: "DIRECCION",
                    field: "direccion",
                }
            ],
            dataExcel: [],
            filename:""
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
        async PorcentajesGeneral() {
            await DashboardRiesgosAmbientalesService.PorcentajesGeneral("todos", null).then(respuesta => {
                this.porcentajes = respuesta.data["porcentajes"];   

                this.porcentajeviendasSinAguaPotable = this.porcentajes["porcentajeviendasSinAguaPotable"];
                this.porcentajehogaresSinAguaPotable = this.porcentajes["porcentajehogaresSinAguaPotable"];
                this.porcentajepoblacionSinAguaPotable = this.porcentajes["porcentajepoblacionSinAguaPotable"];
                this.porcentajeviendasSinalcantarillado = this.porcentajes["porcentajeviendasSinalcantarillado"];
                this.porcentajehogaresSinalcantarillado = this.porcentajes["porcentajehogaresSinalcantarillado"];
                this.porcentajepoblacionSinalcantarillado = this.porcentajes["porcentajepoblacionSinalcantarillado"];
                this.totalViviendas = this.porcentajes["totalViviendas"];
                this.totalHogares = this.porcentajes["totalHogares"];
                this.totalPoblacion = this.porcentajes["totalPoblacion"];
                this.viendasSinAguaPotable = this.porcentajes["viendasSinAguaPotable"];
                this.hogaresSinAguaPotable = this.porcentajes["hogaresSinAguaPotable"];
                this.poblacionSinAguaPotable = this.porcentajes["poblacionSinAguaPotable"];
                this.viendasSinalcantarillado = this.porcentajes["viendasSinalcantarillado"];
                this.hogaresSinalcantarillado = this.porcentajes["hogaresSinalcantarillado"];
                this.poblacionSinalcantarillado = this.porcentajes["poblacionSinalcantarillado"];
                this.viendasSAP = this.porcentajes["viendasSAP"];
                this.viendasSA = this.porcentajes["viendasSA"];
                this.calcularColores();   
                this.buscarTitulo2(); 

                this.markers.splice(0);
                this.markers2.splice(0);

                this.viendasSAP.forEach(element => {
                    this.markers.push(
                        { lat: element.lat, lng: element.lng },
                    );
                }); 

                this.viendasSA.forEach(element => {
                    this.markers2.push(
                        { lat: element.lat, lng: element.lng },
                    );
                }); 

                this.dataTableF = [];
                this.dataTableF = this.viendasSAP;

                this.cambiarTipoVivienda();
            })
            .catch(err => {
                console.log(err);
            });
        },
        calcularColores(){
            if (this.porcentajeviendasSinAguaPotable < 20) {
                this.colorspinnner = "#1abf03";
            } else if (this.porcentajeviendasSinAguaPotable >= 20 && this.porcentajeviendasSinAguaPotable < 60) {
                this.colorspinnner = "#f2ce1a";
            } else {
                this.colorspinnner = "#f2451a";
            }

            if (this.porcentajehogaresSinAguaPotable < 20) {
                    this.colorspinnner2 = "#1abf03";
            } else if (this.porcentajehogaresSinAguaPotable >= 20 && this.porcentajehogaresSinAguaPotable < 60) {
                this.colorspinnner2 = "#f2ce1a";
            } else {
                this.colorspinnner2 = "#f2451a";
            }

            if (this.porcentajepoblacionSinAguaPotable < 20) {
                    this.colorspinnner3 = "#1abf03";
            } else if (this.porcentajepoblacionSinAguaPotable >= 20 && this.porcentajepoblacionSinAguaPotable < 60) {
                this.colorspinnner3 = "#f2ce1a";
            } else {
                this.colorspinnner3 = "#f2451a";
            }

            if (this.porcentajeviendasSinalcantarillado < 20) {
                    this.colorspinnner4 = "#1abf03";
            } else if (this.porcentajeviendasSinalcantarillado >= 20 && this.porcentajeviendasSinalcantarillado < 60) {
                this.colorspinnner4 = "#f2ce1a";
            } else {
                this.colorspinnner4 = "#f2451a";
            }

            if (this.porcentajehogaresSinalcantarillado < 20) {
                    this.colorspinnner5 = "#1abf03";
            } else if (this.porcentajehogaresSinalcantarillado >= 20 && this.porcentajehogaresSinalcantarillado < 60) {
                this.colorspinnner5 = "#f2ce1a";
            } else {
                this.colorspinnner5 = "#f2451a";
            }

            if (this.porcentajepoblacionSinalcantarillado < 20) {
                    this.colorspinnner6 = "#1abf03";
            } else if (this.porcentajepoblacionSinalcantarillado >= 20 && this.porcentajepoblacionSinalcantarillado < 60) {
                this.colorspinnner6 = "#f2ce1a";
            } else {
                this.colorspinnner6 = "#f2451a";
            }
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
                this.comboBarrio = "";
                this.comboVereda = "";
                this.comboCorregimiento = "";
                this.comboBarrio2 = "";
                this.PorcentajesGeneral();
            }
        },
        async filtrar(tipo){
            var id ;
            if(tipo == "barrio"){
                tipo = "barrio";
                this.comboCorregimiento = "";
                this.comboVereda = "";
                this.comboBarrio2 = "";
                id = this.comboBarrio;
            }
            if(tipo == "corregimiento"){
                tipo = "corre";
                this.comboBarrio = "";
                this.comboVereda = "";
                this.comboBarrio2 = "";
                id = this.comboCorregimiento;
                this.listarBarriosCorregimiento();
            }
            if(tipo == "vereda"){
                tipo = "vereda"
                this.comboCorregimiento = "";
                this.comboBarrio = "";
                this.comboBarrio2 = "";
                id = this.comboVereda;
            }
            if(tipo == "barrio2"){
                tipo = "barrio";
                this.comboVereda = "";
                this.comboBarrio = "";
                id = this.comboBarrio2;

                if(this.comboBarrio2 == ""){
                    tipo = "corre";
                    id = this.comboCorregimiento;
                }
            }
            
            if(this.comboVereda == "" && this.comboBarrio == "" && this.comboCorregimiento == "" && this.comboBarrio2 == ""){
                tipo = "Todos";
            }

            await DashboardRiesgosAmbientalesService.PorcentajesGeneral(tipo, id).then(respuesta => {
                this.porcentajes = respuesta.data["porcentajes"];   

                this.porcentajeviendasSinAguaPotable = this.porcentajes["porcentajeviendasSinAguaPotable"];
                this.porcentajehogaresSinAguaPotable = this.porcentajes["porcentajehogaresSinAguaPotable"];
                this.porcentajepoblacionSinAguaPotable = this.porcentajes["porcentajepoblacionSinAguaPotable"];
                this.porcentajeviendasSinalcantarillado = this.porcentajes["porcentajeviendasSinalcantarillado"];
                this.porcentajehogaresSinalcantarillado = this.porcentajes["porcentajehogaresSinalcantarillado"];
                this.porcentajepoblacionSinalcantarillado = this.porcentajes["porcentajepoblacionSinalcantarillado"];
                this.totalViviendas = this.porcentajes["totalViviendas"];
                this.totalHogares = this.porcentajes["totalHogares"];
                this.totalPoblacion = this.porcentajes["totalPoblacion"];
                this.viendasSinAguaPotable = this.porcentajes["viendasSinAguaPotable"];
                this.hogaresSinAguaPotable = this.porcentajes["hogaresSinAguaPotable"];
                this.poblacionSinAguaPotable = this.porcentajes["poblacionSinAguaPotable"];
                this.viendasSinalcantarillado = this.porcentajes["viendasSinalcantarillado"];
                this.hogaresSinalcantarillado = this.porcentajes["hogaresSinalcantarillado"];
                this.poblacionSinalcantarillado = this.porcentajes["poblacionSinalcantarillado"];
                this.viendasSAP = this.porcentajes["viendasSAP"];
                this.viendasSA = this.porcentajes["viendasSA"];
                this.calcularColores();
                this.buscarTitulo2();   

                this.markers.splice(0);
                this.markers2.splice(0);

                this.viendasSAP.forEach(element => {
                    this.markers.push(
                        { lat: element.lat, lng: element.lng },
                    );
                }); 

                this.viendasSA.forEach(element => {
                    this.markers2.push(
                        { lat: element.lat, lng: element.lng },
                    );
                }); 

                this.dataTableF = [];
                this.dataTableF = this.viendasSAP;

                this.cambiarTipoVivienda();
            })
            .catch(err => {
                console.log(err);
            });
        },
        async exportToPDF(){ 
            this.isLoading = true;
            this.claseT = "col-lg-12";
            this.heightMap = 800;
            this.widthMap = 1150;
            const el = this.$refs.exportMapa;
            const options = {
                type: 'dataURL',
                useCORS: true,
            }
            this.output = await this.$html2canvas(el, options);
            
            setTimeout(() => {
                let data = Object.assign({}, this.$refs);
                data.boton1.setAttribute("hidden", "hidden");
                data.exportMapa.setAttribute("hidden", "hidden");
                data.imagenMapa.removeAttribute("hidden");
                data.dataTable.setAttribute("hidden", "hidden");
                data.dataTable2.removeAttribute("hidden");
                html2pdf(data.document, {
                    margin: 0.25,
                    filename: "document.pdf",
                    image: {
                        type: "png",
                        quality: 1
                    },
                    html2canvas: {
                        dpi: 192,
                        scale:3,
                        letterRendering: true
                    },
                    jsPDF: {
                        unit: "in",
                        format: "a4",
                        orientation: "landscape"
                    }
                });
                data.boton1.removeAttribute("hidden"); 
                data.exportMapa.removeAttribute("hidden");  
                data.imagenMapa.setAttribute("hidden", "hidden"); 
                data.dataTable2.setAttribute("hidden", "hidden");
                data.dataTable.removeAttribute("hidden");
                this.heightMap = 500;
                this.widthMap = 700;
                this.claseT = "col-lg-6";
                this.isLoading = false;
            }, 2000)
              
        },
        async buscarTitulo2(){
            if(this.tipoCombo == "todos"){
                this.titulo2 = "En todo el municipio";
            }
            if(this.tipoCombo == "barrio"){
                this.barrios.forEach(element => {
                    if(element.value == this.comboBarrio){
                        this.titulo2 = "Barrio ("+element.texto+")";
                    }
                });
            }
            if(this.tipoCombo == "corregimiento"){
                this.corregimientos.forEach(element => {
                    if(element.id == this.comboCorregimiento){
                        this.titulo2 = "Corregimiento ("+element.descripcion+")";
                    }
                });
            }
            if(this.tipoCombo == "vereda"){
                this.veredas.forEach(element => {
                    if(element.id == this.comboVereda){
                        this.titulo2 = "Vereda ("+element.descripcion+")";
                    }
                });
            }
            if(this.tipoCombo == "barrio2"){
                this.corregimientos.forEach(element => {
                    if(element.id == this.comboCorregimiento){
                        this.titulo2 = "Corregimiento ("+element.descripcion+")";
                    }
                });
                this.barriosCorregimiento.forEach(element => {
                    if(element.value == this.comboBarrio2){
                        this.titulo2 += " - Barrio ("+element.texto+")";
                    }
                });
            }
        },
        cambiarTipoVivienda(){
            this.loading = true;
            this.points = [];
            this.dataTableF = [];
            $('#tabla-t').DataTable().clear().draw();
            $('#tabla-t').DataTable().destroy();
            setTimeout(() => {
                if(this.tipoComboVivienda == "type1"){
                    this.points = this.markers;
                    this.dataTableF = this.viendasSAP;
                    this.dataExcel = this.viendasSAP;
                    this.filename = "Viviendas sin Acceso a Agua Potable"
                }else{
                    this.points = this.markers2;
                    this.dataTableF = this.viendasSA;
                    this.dataExcel = this.viendasSA;
                    this.filename = "Viviendas sin Acceso a Alcantarillado"
                }
                this.loading = false;
                this.crearDataTable();
            },1000);
        },
        crearDataTable() {
            setTimeout(() => {
                $('#tabla-t').DataTable({
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
        }
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