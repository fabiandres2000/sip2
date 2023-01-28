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
            <div class="col-lg-3" style="padding-top: 3%; text-align: right;">
                <div ref="boton1" style="padding: 10px 10px 10px 20px;">
                    <button @click="exportToPDFPOB()" class="btn btn-danger"><i class="fa fa-file" aria-hidden="true"></i> Exportar PDF</button>
                </div>  
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-5" style="padding-top: 30px" ref="imagenes">
                <div class="row">
                    <div class="col-lg-12"> 
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <h2>Personas caracterizadas</h2>
                                        <p style="font-size: 57px; font-weight: 400; margin-bottom: -1rem;">{{poblacion_array.personas_caracterizadas}}</p>
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
                <div class="row">
                    <div class="col-lg-6"> 
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3">
                                        <img style="opacity: 0.6" :src="imgWMen" width="120%" height="100%">
                                    </div>
                                    <div class="col-5 justify-content-center align-self-center">
                                        <h5>Hombres</h5>
                                    </div>
                                    <div class="col-4  justify-content-center align-self-center">
                                        <p style="font-size: 27px; font-weight: 400; margin: 0px;">{{poblacion_array.hombres}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-3">
                                        <img style="opacity: 0.6" :src="imgNinios" width="120%" height="100%">
                                    </div>
                                    <div class="col-5  justify-content-center align-self-center">
                                        <h5>Niños</h5>
                                    </div>
                                    <div class="col-4  justify-content-center align-self-center">
                                        <p style="font-size: 27px; font-weight: 400; margin: 0px;">{{poblacion_array.ninios}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6"> 
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3">
                                        <img style="opacity: 0.6" :src="imgWomen" width="120%" height="100%">
                                    </div>
                                    <div class="col-5 justify-content-center align-self-center">
                                        <h5>Mujeres</h5>
                                    </div>
                                    <div class="col-4  justify-content-center align-self-center">
                                        <p style="font-size: 27px; font-weight: 400; margin: 0px;">{{poblacion_array.mujeres}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-3">
                                        <img style="opacity: 0.6" :src="imgNinias" width="120%" height="100%">
                                    </div>
                                    <div class="col-5  justify-content-center align-self-center">
                                        <h5>Niñas</h5>
                                    </div>
                                    <div class="col-4  justify-content-center align-self-center">
                                        <p style="font-size: 27px; font-weight: 400; margin: 0px;">{{poblacion_array.ninias}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 text-center">
                <h2>Personas caracterizadas</h2>
                <h3>(Por Sexo)</h3>
                <div id="chartdiv_sexo" style="width: 100%; height: 370px"></div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-6 text-center">
                <h2>Personas caracterizadas</h2>
                <h3>(Por Grupo de Edad y Sexo)</h3>
                <div id="chartdiv_edad" style="width: 100%; height: 370px"></div>
                <div class="row" ref="hmp">
                    <div class="col-3"></div>
                    <div class="col-3"><p><span style="background-color: #67b7dc">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Hombres</p></div>
                    <div class="col-2"></div>
                    <div class="col-3"><p><span style="background-color: #6794dc">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Mujeres</p></div>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <h2>Personas caracterizadas</h2>
                <h3>(Por Grupo de Edad)</h3>
                <div id="chartdiv_edades_torta" style="width: 100%; height: 370px"></div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-6 text-center">
                <h2>Mujeres Embarzadas</h2>
                <h3>(Por Grupo de Edad)</h3>
                <div id="chartdiv_embarazadas" style="width: 100%; height: 370px"></div>
            </div>
            <div class="col-lg-6 text-center">
                <h2>Personas caracterizadas</h2>
                <h3>Migrantes Vs No Migrantes</h3>
                <div id="chartdiv_migrantes" style="width: 100%; height: 370px"></div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Personas caracterizadas</h2>
                <h3>(Por Nivel de Escolaridad)</h3>
                <div id="chartdiv_escolaridad" style="width: 100%; height: 370px"></div>
            </div>
        </div>

        <b-modal
            ref="modalpdf"
            hide-footer
            title="Reporte Población"
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
import * as BarriosService from "../../Servicios/barrios_servicios.js";
import * as CorregimientoService from "../../Servicios/corregimientos_servicios.js";
import * as VeredasService from "../../Servicios/veredas_servicios.js";
import * as usuarioServicios from "../../Servicios/usuarios_servicios";
import * as DashboardService from "../../Servicios/dashboard";
import * as am4core from "@amcharts/amcharts4/core";
import * as am4charts from "@amcharts/amcharts4/charts";
import am4themes_animated from "@amcharts/amcharts4/themes/animated";
am4core.useTheme(am4themes_animated);
import store from "../../store";

export default {
    components: { CircleProgress, Loading },
    mounted() {
        this.imagen();
        this.coordenadas();
        this.iniciar();
        this.poblacion();
        this.listarBarrios();
        this.listarCorregimientos();
        this.listarVeredas();
    },
    props: [],
    data() {
        return {
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
            ente: "",
            tipo: "todos",
            id_combo: 1,
            poblacion_array: [],
            isLoading: false,
            rutaPdf: "",
            comboBarrio: "",
            barrios: [],
            barriosCorregimiento: [],
            comboBarrio2: "",
            comboCorregimiento: "",
            corregimientos: [],
            comboVereda: "",
            veredas: [],
            tipoCombo: "todos",
            imgWomen: null,
            imgWMen: null,
            imgNinios: null,
            imgNinias: null,
            imgPoblacion: null,
            chart_sexo: null,
            chart_edades: null,
            serie_edades: [],
            chart_torta_edades: null,
            chart_escolaridad: null,
            chart_migrantes: null,
            chart_embarazadas: null,
            rutaPdf: ""
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
                this.center.lat = this.latitud;
                this.center.lng = this.longitud;
            })
            .catch(err => {
                console.log(err);
            });
        },
        async poblacion() {
            this.isLoading = true;
            await DashboardServiceSocioeconomico.poblacion(this.tipo, this.id_combo).then(respuesta => {
                this.poblacion_array = respuesta.data["poblacion"]; 
                this.grafica_torta_sexo(this.poblacion_array);
                this.crearSerieEdades(this.poblacion_array.edades);
                this.grafica_torta_edades(this.poblacion_array.edades);
                this.grafica_torta_escolaridad(this.poblacion_array.porEscolaridad);
                this.grafica_torta_migrantes(this.poblacion_array.migrantes);
                this.grafica_torta_embarazadas(this.poblacion_array.mujeres_embarazadas);
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
                this.poblacion();
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

            this.poblacion();
        },
        async grafica_torta_sexo(array) {
            if(this.chart_sexo != null){
                this.chart_sexo.dispose();
            }
            var chart = am4core.create("chartdiv_sexo", am4charts.PieChart3D);
            this.chart_sexo = chart;
            chart.data = [
                {
                    category: "Masculino",
                    first: array.masculino,
                },
                {
                    category: "Femenino",
                    first: array.femenino,
                },  
            ];
            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "first";
            series.dataFields.category = "category";
        },
        crearSerieEdades(array){
            this.serie_edades = [
                {
                    age: "0-1",
                    male: Number(array.personas0_1[0] * -1),
                    female: Number(array.personas0_1[1])
                },
                {
                    age: "1-5",
                    male: Number(array.personas1_5[0] * -1),
                    female: Number(array.personas1_5[1])
                },
                {
                    age: "6-11",
                    male: Number(array.personas6_11[0] * -1),
                    female: Number(array.personas6_11[1])
                },
                {
                    age: "12-17",
                    male: Number(array.personas12_17[0] * -1),
                    female: Number(array.personas12_17[1])
                },
                {
                    age: "18-28",
                    male: Number(array.personas18_28[0] * -1),
                    female: Number(array.personas18_28[1])
                },
                {
                    age: "29-59",
                    male: Number(array.personas29_59[0] * -1),
                    female: Number(array.personas29_59[1])
                },
                {
                    age: "60+",
                    male: Number(array.personas60[0] * -1),
                    female: Number(array.personas60[1])
                }
            ];
            this.grafica_edades();
        },
        grafica_edades() {
            // Themes begin
            am4core.useTheme(am4themes_animated);
            // Themes end

            // Create chart instance
            if(this.chart_edades != null){
                this.chart_edades.dispose();
            }
            var chart = am4core.create("chartdiv_edad", am4charts.XYChart);
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
        async grafica_torta_edades(array) {
            if(this.chart_torta_edades != null){
                this.chart_torta_edades.dispose();
            }
            var chart = am4core.create("chartdiv_edades_torta", am4charts.PieChart3D);
            this.chart_torta_edades = chart;
            chart.data = [
                {
                    category: "-1 Años",
                    first: array.personas0_1[0] + array.personas0_1[1],
                },
                {
                    category: "1-5 Años",
                    first: array.personas1_5[0] + array.personas1_5[1],
                }, 
                {
                    category: "6-11 Años",
                    first: array.personas6_11[0] + array.personas6_11[1],
                },
                {
                    category: "12-17 Años",
                    first: array.personas12_17[0] + array.personas12_17[1],
                },
                {
                    category: "18-28 Años",
                    first: array.personas18_28[0] + array.personas18_28[1],
                }, 
                {
                    category: "29-59 Años",
                    first: array.personas29_59[0] + array.personas29_59[1],
                },
                {
                    category: "+60 Años",
                    first: array.personas60[0] + array.personas60[1],
                },
            ];
            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "first";
            series.dataFields.category = "category";
        },
        async grafica_torta_escolaridad(array) {
            if(this.chart_escolaridad != null){
                this.chart_escolaridad.dispose();
            }
            var chart = am4core.create("chartdiv_escolaridad", am4charts.PieChart3D);
            this.chart_escolaridad = chart;
            chart.data = [];

            array.forEach(element => {
                chart.data.push({
                    category: element.escolaridad_nombre,
                    first: element.numero_personas,
                })
            });
            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "first";
            series.dataFields.category = "category";
        },
        async grafica_torta_migrantes(array) {
            if(this.chart_migrantes != null){
                this.chart_migrantes.dispose();
            }
            var chart = am4core.create("chartdiv_migrantes", am4charts.PieChart3D);
            this.chart_migrantes = chart;
            chart.data = [
                {
                    category: "Migrantes",
                    first: array.numero_migrantes,
                },
                {
                    category: "No Migrantes",
                    first: array.numero_no_migrantes,
                }, 
            ];
            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "first";
            series.dataFields.category = "category";
        },
        async grafica_torta_embarazadas(array) {
            if(this.chart_embarazadas != null){
                this.chart_embarazadas.dispose();
            }
            var chart = am4core.create("chartdiv_embarazadas", am4charts.PieChart3D);
            this.chart_embarazadas = chart;
            chart.data = [
                {
                    category: "6-11",
                    first: array.me6_11,
                },
                {
                    category: "12-17",
                    first: array.me12_17,
                },
                {
                    category: "18-28",
                    first: array.me17_28,
                },
                {
                    category: "29-59",
                    first: array.me29_59,
                },
            ];
            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "first";
            series.dataFields.category = "category";
        },
        async exportToPDFPOB(){ 
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

            let imagenes = await this.$html2canvas(this.$refs.imagenes, options);
            let grafico1 = await this.chart_sexo.exporting.getImage("png");
            let grafico2 = await this.chart_edades.exporting.getImage("png");
            let hmp = await this.$html2canvas(this.$refs.hmp, options);
            let grafico3 = await this.chart_torta_edades.exporting.getImage("png");
            let grafico4 = await this.chart_embarazadas.exporting.getImage("png");
            let grafico5 = await this.chart_migrantes.exporting.getImage("png");
            let grafico6 = await this.chart_escolaridad.exporting.getImage("png");

            const parametros = {
                _token: this.csrf,
                filtro: filtro,
                imagenes: imagenes,
                grafico1: grafico1,
                grafico2: grafico2,
                hmp: hmp,
                grafico3: grafico3,
                grafico4: grafico4,
                grafico5: grafico5,
                grafico6: grafico6,
            };
            try {
                await DashboardServiceSocioeconomico.exportarPoblacion(parametros).then(respuesta => {
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