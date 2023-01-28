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
                <div ref="boton1" class="col-sm-3 col-lg-3 text-right" style="padding: 10px 10px 10px 20px;">
                    <button style="position: absolute;top: 55%;left: 61%;"  @click="exportToPDFAM15()" class="btn btn-danger"><i class="fa fa-file" aria-hidden="true"></i> Exportar PDF</button>
                </div>
            </div>
            <hr>
            <div class="row" ref="grafico1">
                <div class="col-lg-4 text-center">
                    <br >
                    <h4>Tasa de Analfabetismo</h4>
                    <circle-progress
                        stroke-bg-color = "#e3e2e1"
                        :r="80" 
                        :stroke-width="12"  
                        :stroke-color="colorspinnner" 
                        :percentage="Math.floor(datos['porcentajeAnalfabetas'] * 10) / 10"> 
                    </circle-progress>
                    <br>
                    <h4>{{datos["totalAnalfabetas"]}} / {{datos["totalPersonas"]}}</h4> 
                </div>
                <div class="col-lg-4 text-center">
                    <br >
                    <h4>Tasa de Analfabetismo (Masculino)</h4>
                    <circle-progress
                        stroke-bg-color = "#e3e2e1"
                        :r="80" 
                        :stroke-width="12"  
                        :stroke-color="datos['porcentajeAnalfabetasM'] < 20 ? '#1abf03': datos['porcentajeAnalfabetasM'] >= 20  && datos['porcentajeAnalfabetasM'] < 60 ? '#f2ce1a' : '#f2451a'" 
                        :percentage="Math.floor(datos['porcentajeAnalfabetasM'] * 10) / 10"> 
                    </circle-progress>
                    <br>
                    <h4>{{datos["totalMasculinosAnalfabetas"]}} / {{datos["totalAnalfabetas"]}}</h4> 
                </div>
                <div class="col-lg-4 text-center">
                    <br >
                    <h4>Tasa de Analfabetismo (Femenino)</h4>
                    <circle-progress
                        stroke-bg-color = "#e3e2e1"
                        :r="80" 
                        :stroke-width="12"  
                        :stroke-color="datos['porcentajeAnalfabetasF'] < 20 ? '#1abf03': datos['porcentajeAnalfabetasF'] >= 20  && datos['porcentajeAnalfabetasF'] < 60 ? '#f2ce1a' : '#f2451a'" 
                        :percentage="Math.floor(datos['porcentajeAnalfabetasF'] * 10) / 10"> 
                    </circle-progress>
                    <br>
                    <h4>{{datos["totalFemeninosAnalfabetas"]}} / {{datos["totalAnalfabetas"]}}</h4> 
                </div>
            </div>
            <br>
            <br>
            <div class="row">
                <div class="col-lg-6">
                    <h2>Población analfabeta por grupo de edades</h2>
                    <br/>
                    <div id="grafica_tas_ana_1" style="width: 100%; height: 400px"></div>
                    <div class="row" ref="hm">
                        <div class="col-3"></div>
                        <div class="col-3"><p><span style="background-color: #67b7dc">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Hombres</p></div>
                        <div class="col-2"></div>
                        <div class="col-3"><p><span style="background-color: #6794dc">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Mujeres</p></div>
                    </div>
                </div>
                <div class="col-lg-6" v-if="!loading">
                    <h2>Mapa de calor poblacion analfabeta</h2>
                    <div v-if="points.length">
                        <vue-google-heatmap
                            :points="points"
                            style="width: 100%;"
                            :height="385"
                            map-type="roadmap"
                            :initial-zoom="14"
                            :lat="latitud"
                            :lng="longitud"
                        />
                    </div>
                </div>
                <div style="height: 385px; padding-top: 10%" class="col-lg-6 text-center" v-if="loading">
                    <img  src="https://upload.wikimedia.org/wikipedia/commons/c/c7/Loading_2.gif?20170503175831" alt="cargando">
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <h2>Listado de personas analfabetas</h2>
            </div>
            <div class="col-lg-12" ref="dataTable">
                <table id="tabla-ana" class="table_data" style="width: 100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Localizacion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in datos.jefesAnalfabetas">
                            <td>{{item.tipo_id}} - {{item.identificacion}}</td>
                            <td>{{item.pnom}} {{item.snom}} {{item.pape}} {{item.sape}}</td>
                            <td>{{item.localizacion}}</td>
                        </tr>
                        <tr v-for="item in datos.integrantesAnalfabetas">
                            <td>{{item.tipo_id}} - {{item.identificacion}}</td>
                            <td>{{item.pnom}} {{item.snom}} {{item.pape}} {{item.sape}}</td>
                            <td>{{item.localizacion}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-12 text-right">
                <button @click="exportToEXCELAM15()" class="btn btn-success">Exportar a excel <i class="fa fa-table" aria-hidden="true"></i></button>
            </div>
        </div>
        <b-modal
            ref="modalpdf"
            hide-footer
            title="Reporte de Analfabetismo"
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
        this.estadisticas();
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
            datos: [],
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
                    label: "EDAD (Años)",
                    field: "edad",
                },
                {
                    label: "SEXO",
                    field: "sexo",
                },
                {
                    label: "LOCALIZACION",
                    field: "localizacion",
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
            isLoading: false,
            chartP: null,
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
        async estadisticas() {
            this.loading = true;
            this.points.splice(0);
            this.dataExcel.splice(0);
            await DashboardServiceSocioeconomico.listarEstadisticaPersonas(this.tipo, this.id_combo).then(respuesta => {
                this.datos = respuesta.data["analfabetismo"]; 
                this.calcularColoreSpinner(this.datos); 
                this.crearDataTable();
                this.puntosMapa(this.datos.integrantesAnalfabetas);
                this.puntosMapa(this.datos.jefesAnalfabetas);
                this.crearSerie(this.datos);
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
        calcularColoreSpinner(datos){
            if (datos["porcentajeAnalfabetas"] < 20) {
                this.colorspinnner = "#1abf03";
            } else if (datos["porcentajeAnalfabetas"] >= 20  && datos["porcentajeAnalfabetas"] < 60) {
                this.colorspinnner = "#f2ce1a";
            } else {
                this.colorspinnner = "#f2451a";
            }
        },
        crearSerie(array){
            this.serie = [
                {
                    age: "15-17",
                    male: Number(((array.analfabetas12_17[0]/(array.analfabetas12_17[0]+array.analfabetas12_17[1]))*100)*-1),
                    female: Number((array.analfabetas12_17[1]/(array.analfabetas12_17[0]+array.analfabetas12_17[1]))*100)
                },
                {
                    age: "18-28",
                    male: Number(((array.analfabetas18_28[0]/(array.analfabetas18_28[0]+array.analfabetas18_28[1]))*100)*-1),
                    female: Number((array.analfabetas18_28[1]/(array.analfabetas18_28[0]+array.analfabetas18_28[1]))*100)
                },
                {
                    age: "29-59",
                    male: Number(((array.analfabetas29_59[0]/(array.analfabetas29_59[0]+array.analfabetas29_59[1]))*100)*-1),
                    female: Number((array.analfabetas29_59[1]/(array.analfabetas29_59[0]+array.analfabetas29_59[1]))*100)
                },
                {
                    age: "60+",
                    male: Number(((array.analfabetas60[0]/(array.analfabetas60[0]+array.analfabetas60[1]))*100)*-1),
                    female: Number((array.analfabetas60[1]/(array.analfabetas60[0]+array.analfabetas60[1]))*100)
                }
            ];
            this.grafica_stacked();
        },
        crearDataTable() {
            $("#tabla-ana").dataTable().fnDestroy();
            setTimeout(() => {
                $('#tabla-ana').DataTable({
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
        grafica_stacked() {
            // Themes begin
            am4core.useTheme(am4themes_animated);
            // Themes end

            // Create chart instance
            if(this.chartP != null){
                this.chartP.dispose();
            }
            var chart = am4core.create("grafica_tas_ana_1", am4charts.XYChart);
            this.chartP = chart;
            // Add data
            chart.data = this.serie;
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
                return text == "Male" || text == "Female" ? text : text + "%";
            });

            // Create series
            var male = chart.series.push(new am4charts.ColumnSeries());
            male.dataFields.valueX = "male";
            male.dataFields.categoryY = "age";
            male.clustered = false;

            var maleLabel = male.bullets.push(new am4charts.LabelBullet());
            maleLabel.label.text = "{valueX}%";
            maleLabel.label.hideOversized = false;
            maleLabel.label.truncate = false;
            maleLabel.label.horizontalCenter = "right";
            maleLabel.label.dx = -10;

            var female = chart.series.push(new am4charts.ColumnSeries());
            female.dataFields.valueX = "female";
            female.dataFields.categoryY = "age";
            female.clustered = false;

            var femaleLabel = female.bullets.push(new am4charts.LabelBullet());
            femaleLabel.label.text = "{valueX}%";
            femaleLabel.label.hideOversized = false;
            femaleLabel.label.truncate = false;
            femaleLabel.label.horizontalCenter = "left";
            femaleLabel.label.dx = 10;

            this.loading = false;
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
                this.estadisticas();
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

            this.estadisticas();
        },
        async exportToPDFAM15(){ 
            this.isLoading = true;

            // convertir a imagen todos los graficos
            const options = {
                type: 'dataURL',
                useCORS: true,
            }
            let imgData = await this.chartP.exporting.getImage("png");
            let grafico1 = await this.$html2canvas(this.$refs.grafico1, options);
            let filtro = {
                bcm:  this.barrios.filter( item => { return item.value ==  this.comboBarrio}),
                bc:  this.barriosCorregimiento.filter( item => { return item.value == this.comboBarrio2 }),
                v:  this.veredas.filter( item => { return item.id == this.comboVereda }),
                c:  this.corregimientos.filter( item => { return item.id == this.comboCorregimiento }),
            };
            let hm = await this.$html2canvas(this.$refs.hm, options);
            // convertir a imagen todos los graficos

            const parametros = {
                tipo: 1,
                _token: this.csrf,
                torta: imgData,
                datos: this.datos,
                grafico1: grafico1,
                filtro: filtro,
                hm: hm
            };
            try {
                await DashboardServiceSocioeconomico.exportarAnalfabetas(parametros).then(respuesta => {
                    this.rutaPdf = store.state.apiURL + respuesta.data.nombre;
                    this.isLoading = false;
                    this.$refs.modalpdf.show();
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
        async exportToEXCELAM15(){
            this.isLoading = true;

            const parametros = {
                ente: this.ente,
                datos: this.dataExcel,
                titulo: "Analfabetismo (Mayores de 15 años)"
            };
            try {
                await DashboardServiceSocioeconomico.exportarAnalfabetasExel(parametros).then(respuesta => {
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
            link.download = "Analfabetismo (Mayores de 15 años).xlsx"
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