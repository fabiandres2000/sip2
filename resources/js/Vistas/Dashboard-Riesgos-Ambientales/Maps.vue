<template>
    <div>
        <div class="row">
            <div class="col-lg-6">
                <h3>{{riesgoAlto}}</h3> 
                <h3>Riesgo con mayor numero de viviendas en nivel (ALTO)</h3>
                <h3>Densidad de la población</h3>
            </div>
            <div class="col-lg-6 text-center">
                <br>
                <br>
                <br>
                <br>
                <h4>Numero de viviendas con nivel (alto) por riesgo ambiental</h4>
            </div>
        </div>
        
        <br />
        <div class="row">
            <div class="col-lg-6">
                <div v-if="points.length">
                    <vue-google-heatmap
                        :points="points"
                        style="width: 100%;"
                        :height="350"
                        map-type="satellite"
                        :initial-zoom="14"
                        :lat="latitud"
                        :lng="longitud"
                    />
                </div>
            </div>
            <div class="col-lg-6" style="height: 350px; overflow-y: hidden;">
                <div id="chartdiv" style="width: 100%; height: 410px"></div>
            </div>   
        </div>
    </div>
</template>

<script>
import * as DashboardService from "../../Servicios/dashboard";
import * as DashboardRiesgosAmbientalesService from "../../Servicios/dashboard_riesgos_ambientales.js";
import * as am4core from "@amcharts/amcharts4/core";
import * as am4charts from "@amcharts/amcharts4/charts";
import am4themes_animated from "@amcharts/amcharts4/themes/animated";
am4core.useTheme(am4themes_animated);

export default {
    name: "GoogleMap",
    data() {
        return {
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
            center: { lat: 0, lng: 0 },
            latitud: 0.0,
            longitud: 0.0,
            points: [],
            seriesRDerrumbe: [],
            seriesRInundacion: [],
            seriesRInsalubridad: [],
            seriesRAtmosferico: [],
            seriesRRecursoSuelo: [],
            seriesRQuemaIncendio: [],
            seriesRAuditivo: [],
            seriesRRecursoHidrico: [],
            seriesRAccesoAgua: [],
            datosFiltrados: [],
            riesgoAlto: ""
        };
    },
    mounted() {},
    created() {
        this.coordenadas();
        this.listarEstadistica();
    },
    beforeMount() {},
    methods: {
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
        async listarEstadistica() {
            let tipo = "Todos";
            await DashboardRiesgosAmbientalesService.listarEstadisticaPorVivienda(tipo, '')
            .then(respuesta => {
                this.seriesRDerrumbe.splice(0);
                this.seriesRInundacion.splice(0);
                this.seriesRInsalubridad.splice(0);
                this.seriesRAtmosferico.splice(0);
                this.seriesRRecursoSuelo.splice(0);
                this.seriesRQuemaIncendio.splice(0);
                this.seriesRAuditivo.splice(0);
                this.seriesRRecursoHidrico.splice(0);
                this.seriesRAccesoAgua.splice(0);

                this.datos = respuesta.data["estadisticas"];  
                this.mapearRiesgos(this.datos, "control_riesgos_derrumbes"); 
                this.mapearRiesgos(this.datos, "control_riesgos_inundacion"); 
                this.mapearRiesgos(this.datos, "control_riesgos_insalubridad"); 
                this.mapearRiesgos(this.datos, "control_riesgos_atmosferico");
                this.mapearRiesgos(this.datos, "control_riesgos_recurso_suelo");
                this.mapearRiesgos(this.datos, "control_riesgos_quema");  
                this.mapearRiesgos(this.datos, "control_riesgos_auditivo"); 
                this.mapearRiesgos(this.datos, "control_riesgos_recurso_hidrico");
                this.mapearRiesgos(this.datos, "control_riesgos_acceso_agua");            
            })
            .catch(err => {
                console.log(err);
            });
            await this.riesgoMayor();
        },
        async mapearRiesgos(array, index) {
            var alto = 0;
            var medio = 0;
            var bajo = 0;
            array.forEach(element => {
                if(element[index] == 0 || element[index] == 1 ){
                    bajo += 1;
                }else{
                    if(element[index] == 2){
                        medio += 1;
                    }else{
                        alto += 1;
                    }
                }
            });

            if(index == "control_riesgos_derrumbes"){
                this.seriesRDerrumbe.push(alto);
                this.seriesRDerrumbe.push(medio);
                this.seriesRDerrumbe.push(bajo);
            } 
            if(index == "control_riesgos_inundacion"){
                this.seriesRInundacion.push(alto);
                this.seriesRInundacion.push(medio);
                this.seriesRInundacion.push(bajo);
            }  
            if(index == "control_riesgos_insalubridad"){
                this.seriesRInsalubridad.push(alto);
                this.seriesRInsalubridad.push(medio);
                this.seriesRInsalubridad.push(bajo);
            } 
            if(index == "control_riesgos_atmosferico"){
                this.seriesRAtmosferico.push(alto);
                this.seriesRAtmosferico.push(medio);
                this.seriesRAtmosferico.push(bajo);
            }
            if(index == "control_riesgos_recurso_suelo"){
                this.seriesRRecursoSuelo.push(alto);
                this.seriesRRecursoSuelo.push(medio);
                this.seriesRRecursoSuelo.push(bajo);
            }
            if(index == "control_riesgos_quema"){
                this.seriesRQuemaIncendio.push(alto);
                this.seriesRQuemaIncendio.push(medio);
                this.seriesRQuemaIncendio.push(bajo);
            }
            if(index == "control_riesgos_auditivo"){
                this.seriesRAuditivo.push(alto);
                this.seriesRAuditivo.push(medio);
                this.seriesRAuditivo.push(bajo);
            }
            if(index == "control_riesgos_recurso_hidrico"){
                this.seriesRRecursoHidrico.push(alto);
                this.seriesRRecursoHidrico.push(medio);
                this.seriesRRecursoHidrico.push(bajo);
            }
            if(index == "control_riesgos_acceso_agua"){
                this.seriesRAccesoAgua.push(alto);
                this.seriesRAccesoAgua.push(medio);
                this.seriesRAccesoAgua.push(bajo);
            }
        },
        async filtrarDatos(riesgoC){
            this.datosFiltrados.splice(0);
            this.points.splice(0);
            this.datos.forEach(element => {
                let valoracionR = this.valoracionR(parseInt(element[riesgoC]))[0];
                if(valoracionR == "Alto"){
                    this.datosFiltrados.push({
                        'id_hogar': element.id_hogar,
                        'direccion': element.direccion,
                        'riesgoC': element[riesgoC],                    
                        'valoracionR': valoracionR,
                        'colorR':  this.valoracionR(parseInt(element[riesgoC]))[1],
                        'lat': element.lat,
                        'lng': element.lng
                    });

                    this.points.push({ lat:  element.lat, lng:  element.lng });
                }
            });
        },
        valoracionR(valor){
            var valorizacion = "";
            var clase = "";
            if(valor == 0 || valor == 1){
                valorizacion = "Bajo";
                clase = "kt-badge kt-badge--inline text-white kt-badge--success";
            }
            if(valor == 2){
                valorizacion = "Moderado";
                 clase = "kt-badge kt-badge--inline text-white kt-badge--warning";
            }
            if(valor == 3){
                valorizacion = "Alto";
                clase = "kt-badge kt-badge--inline text-white kt-badge--danger";
            }
            return  [valorizacion, clase];
        },
        async riesgoMayor(){
            var nombres = ['control_riesgos_acceso_agua','control_riesgos_atmosferico','control_riesgos_auditivo','control_riesgos_derrumbes','control_riesgos_insalubridad','control_riesgos_inundacion','control_riesgos_quema','control_riesgos_recurso_hidrico','control_riesgos_recurso_suelo'];
            var nombres2 = ['Riesgo acceso agua','Riesgo Atmosferico','Riesgo Auditivo','Riesgos de Derrumbes','Riesgo de Insalubridad','Riesgo de Inundacion','Riesgo de Quema o Incendios','Riesgo de recurso hidrico','Riesgo de recurso suelo'];
            var array = [this.seriesRAccesoAgua[0], this.seriesRAtmosferico[0],this.seriesRAuditivo[0],this.seriesRDerrumbe[0],this.seriesRInsalubridad[0],this.seriesRInundacion[0],this.seriesRQuemaIncendio[0],this.seriesRRecursoHidrico[0],this.seriesRRecursoSuelo[0]];
            var mayor = 0;
            var nombreMayor = "";
            for (let index = 0; index < array.length; index++) {
                if(array[index] >= mayor){
                    mayor = array[index];
                    nombreMayor = nombres[index];
                    this.riesgoAlto = nombres2[index];
                }
            }
            await this.filtrarDatos(nombreMayor);
            await this.grafica_barras(array);
        },
        async grafica_barras(array) {
           
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv", am4charts.XYChart);
            chart.paddingBottom = 50;

            chart.cursor = new am4charts.XYCursor();
            chart.scrollbarX = new am4core.Scrollbar();
            chart.scrollbarX.end = 1;
            chart.colors.step = 3;

            var xAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            xAxis.dataFields.category = "category";
            xAxis.renderer.minGridDistance = 30;

            var yAxis = chart.yAxes.push(new am4charts.ValueAxis());
            yAxis.min = 0;

            var axisLabels = xAxis.renderer.labels.template;
            axisLabels.fontSize = 10;

            function createSeries(value, name) {
                var series = chart.series.push(new am4charts.ColumnSeries());
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
                    category: "Ag. segura",
                    first: array[0],
                },
                {
                    category: "Atmosferico",
                    first: array[1],
                },
                {
                    category: "Auditivo",
                    first: array[2],
                },
                {
                    category: "Derrumbes",
                    first: array[3],
                },
                {
                    category: "Insalubridad",
                    first: array[4],
                },
                {
                    category: "Inundacion",
                    first: array[5],
                },
                {
                    category: "Quemas",
                    first: array[6],
                },
                {
                    category: "R. Hidrico",
                    first: array[7],
                },
                {
                    category: "R. suelo",
                    first: array[8],
                }, 
            ];
            createSeries("first", "Hombres");
        }
    }
};
</script>
