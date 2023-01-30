<template>
    <div style="margin-top: 4%" id="divPadre">
        <loading
            :active.sync="isLoading"
            :can-cancel="true"
            loader="dots"
            :height=128
            :width=128
            color="#007bff"
            :is-full-page="true"
        />

        <div class="row" id="divHijo">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-9" style="text-align: left;">
                                <h4>INFORME GENERAL RIESGOS DE SALUD</h4>
                            </div>
                            <div class="col-sm-3 text-right">
                                <button
                                    type="button"
                                    class="btn btn-danger"
                                    v-on:click="generarPDF"
                                >
                                    <i class="la la-pdf"></i>
                                    <span class="kt-hidden-mobile">Generar PDF</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body" style="text-align: left;">
                        <div class="row">
                            <h4  style="color: #fd397a">Alteraciones Y Transtornos De La Audición Y Comunicación</h4>
                            <br>
                            <div v-if="poblacion_array != null" class="col-lg-6"  style="padding-top: 30px">
                                <h5>De <strong>{{ poblacion_array.alteraciones_transtornos_audicion.numero_personas }} Personas</strong>, se tiene que: </h5>
                                <br>
                                <ul>
                                    <li class="li_li"><strong>Nivel de Riesgo Alto: </strong> {{poblacion_array.alteraciones_transtornos_audicion.alto}} Personas</li>
                                    <li class="li_li"><strong>Nivel de Riesgo Moderado: </strong> {{poblacion_array.alteraciones_transtornos_audicion.moderado}} Personas</li>
                                    <li class="li_li"><strong>Nivel de Riesgo Bajo: </strong> {{poblacion_array.alteraciones_transtornos_audicion.bajo}} Personas</li>
                                    <li class="li_li"><strong>Nivel de Riesgo nexistente: </strong> {{poblacion_array.alteraciones_transtornos_audicion.inexistente}} Personas</li>
                                </ul>
                            </div>
                            <div class="col-lg-6 text-center"  style="padding-top: 30px">
                                <div id="chartdiv_alteraciones_transtornos_audicion" style="width: 100%; height: 180px"></div>
                            </div>  
                            <div v-if="poblacion_array != null" class="col-lg-12" style="padding-top: 30px">
                                <h5>De esas <strong>{{ poblacion_array.alteraciones_transtornos_audicion.alto }} Personas</strong> que se encuentran en nivel de riesgo <strong>"Alto" </strong>se tiene que: </h5>
                                <p><strong>{{ poblacion_array.alteraciones_transtornos_audicion.porcentaje_femeninos_alto }}%</strong> son de genero Femenino, <strong>{{ poblacion_array.alteraciones_transtornos_audicion.porcentaje_masculinos_alto }}%</strong> son de genero Masculino, ademas el <strong>{{ poblacion_array.alteraciones_transtornos_audicion.porcentaje_zona_urbana }}%</strong> se encuentra en la zona urbana, y el <strong>{{ poblacion_array.alteraciones_transtornos_audicion.porcentaje_zona_rural }}%</strong> se encuentra en zona rural.</p>
                            </div>
                            <div v-if="poblacion_array != null" class="col-lg-6" style="padding-top: 10px">
                                <strong>Personas en nivel de riesgo alto por grupo de edad: </strong>
                                <ul>
                                    <li class="li_li"><strong>Menores de 1 Año: </strong>{{ poblacion_array.alteraciones_transtornos_audicion.de0a1 }} Personas</li>
                                    <li class="li_li"><strong>De 1 a 5 Años: </strong>{{ poblacion_array.alteraciones_transtornos_audicion.de1a5 }} Personas</li>
                                    <li class="li_li"><strong>De 6 a 11 Años: </strong>{{ poblacion_array.alteraciones_transtornos_audicion.de6a11 }} Personas</li>
                                    <li class="li_li"><strong>De 12 a 17 Años: </strong>{{ poblacion_array.alteraciones_transtornos_audicion.de12a17 }} Personas</li>
                                    <li class="li_li"><strong>De 18 a 28 Años: </strong>{{ poblacion_array.alteraciones_transtornos_audicion.de18a28 }} Personas</li>
                                    <li class="li_li"><strong>De 29 a 59 Años: </strong>{{ poblacion_array.alteraciones_transtornos_audicion.de29a59 }} Personas</li>
                                    <li class="li_li"><strong>Mayores de 60 Años: </strong>{{ poblacion_array.alteraciones_transtornos_audicion.mayores60 }} Personas</li>
                                </ul>
                            </div>
                            <div class="col-lg-6 text-center"  style="padding-top: 30px">
                                <div id="chartdiv_alteraciones_transtornos_audicion_edad" style="width: 100%; height: 230px"></div>
                            </div>  
                        </div>
                    </div>
                </div>    
            </div>
        </div>

        <b-modal
            ref="modalpdf"
            hide-footer
            title="INFORME GENERAL RIESGOS DE SALUD"
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
    "use strict";
    import VueHtml2pdf from "vue-html2pdf";
    import VueEasyPieChart from "vue-easy-pie-chart";
    import "vue-easy-pie-chart/dist/vue-easy-pie-chart.css";
    import Progress from "easy-circular-progress";
    import VueCircle from "vue2-circle-progress";
    import * as informes from "../../Servicios/informes";

    import * as am4core from "@amcharts/amcharts4/core";
    import * as am4charts from "@amcharts/amcharts4/charts";
    import am4themes_animated from "@amcharts/amcharts4/themes/animated";
    am4core.useTheme(am4themes_animated);
    import Loading from "vue-loading-overlay";

    import store from "../../store";

    export default {
        components: {
            VueHtml2pdf,
            VueEasyPieChart,
            Progress,
            VueCircle,
            Loading
        },
        mounted() {
            this.riesgos_salud();
        },
        data() {
            return {
                poblacion_array: null,       
                isLoading: false,       
                rutaPdf: "",
                chart_alteraciones_transtornos_audicion: null,
                chart_alteraciones_transtornos_audicion_edad: null
            }
        },
        methods: {
            async riesgos_salud() {
                await informes.riesgos_salud().then(respuesta => {
                    this.poblacion_array = respuesta.data; 
                    this.grafica_riesgo(this.poblacion_array.alteraciones_transtornos_audicion, "chartdiv_alteraciones_transtornos_audicion");
                    this.grafica_riesgo_edad(this.poblacion_array.alteraciones_transtornos_audicion, "chartdiv_alteraciones_transtornos_audicion_edad");
                })
                .catch(err => {
                    console.log(err);
                });
            },
            async grafica_riesgo(array, riesgo) {
                if(riesgo == "chartdiv_alteraciones_transtornos_audicion"){
                    if(this.chart_alteraciones_transtornos_audicion != null){
                        this.chart_alteraciones_transtornos_audicion.dispose();
                    } 
                }

                var chart = am4core.create(riesgo, am4charts.PieChart3D);
                this.chart_alteraciones_transtornos_audicion = chart;

                chart.data = [
                    {
                        category: "Alto",
                        first: array.alto,
                    },
                    {
                        category: "Moderado",
                        first: array.moderado,
                    }, 
                    {
                        category: "Bajo",
                        first: array.bajo,
                    },
                    {
                        category: "Inexistente",
                        first: array.inexistente,
                    }, 
                ];

                var series = chart.series.push(new am4charts.PieSeries3D());
                series.dataFields.value = "first";
                series.dataFields.category = "category";
            },
            async grafica_riesgo_edad(array, riesgo) {

                if(riesgo == "chartdiv_alteraciones_transtornos_audicion"){
                    if(this.chart_alteraciones_transtornos_audicion_edad != null){
                        this.chart_alteraciones_transtornos_audicion_edad.dispose();
                    }
                }

                var chart = am4core.create(riesgo, am4charts.PieChart3D);
                this.chart_alteraciones_transtornos_audicion_edad = chart;

                chart.data = [
                    {
                        category: "-1 Años",
                        first: array.de0a1,
                    },
                    {
                        category: "1-5 Años",
                        first: array.de1a5,
                    }, 
                    {
                        category: "6-11 Años",
                        first: array.de6a11,
                    },
                    {
                        category: "12-17 Años",
                        first: array.de12a17,
                    },
                    {
                        category: "18-28 Años",
                        first: array.de18a28,
                    }, 
                    {
                        category: "29-59 Años",
                        first: array.de29a59,
                    },
                    {
                        category: "+60 Años",
                        first: array.mayores60,
                    },
                ];
                var series = chart.series.push(new am4charts.PieSeries3D());
                series.dataFields.value = "first";
                series.dataFields.category = "category";
            },
            generarPDF: async function () {
                this.isLoading = true;

                const options = {
                    type: 'dataURL',
                    useCORS: true,
                }
                
                let chart_torta_edades = await this.chart_torta_edades.exporting.getImage("png");
                let chart_no_asegurado_1 = await this.chart_no_asegurado_1.exporting.getImage("png");
                let chart_no_asegurado_2 = await this.chart_no_asegurado_2.exporting.getImage("png");
                let chart_poblacion_pobreza = await this.chart_poblacion_pobreza.exporting.getImage("png");
                let chart_escolaridad = await this.chart_escolaridad.exporting.getImage("png");
                let chart_desempleo = await this.chart_desempleo.exporting.getImage("png");
                let chart_acueducto = await this.chart_acueducto.exporting.getImage("png");
                let chart_alcantarillado = await this.chart_alcantarillado.exporting.getImage("png");
                let chart_cronica = await this.chart_cronica.exporting.getImage("png");
                let chart_infecciosa = await this.chart_infecciosa.exporting.getImage("png");
                let chart_discapacidad = await this.chart_discapacidad.exporting.getImage("png");
                let chart_embarazo = await this.chart_embarazo.exporting.getImage("png");
                let chart_inmunizacion = await this.chart_inmunizacion.exporting.getImage("png");
                let chart_peso_para_talla = await this.chart_peso_para_talla.exporting.getImage("png");
                let chart_talla_para_edad = await this.chart_talla_para_edad.exporting.getImage("png");
                let chart_imc = await this.chart_imc.exporting.getImage("png");
                let chart_imc_5_17 = await this.chart_imc_5_17.exporting.getImage("png");
                let chart_imc_5_17_e = await this.chart_imc_5_17_e.exporting.getImage("png");
                let chart_imc_18_60 = await this.chart_imc_18_60.exporting.getImage("png");
                let chart_imc_18_60_e = await this.chart_imc_18_60_e.exporting.getImage("png");
                
                const parametros = {
                    _token: this.csrf,
                    poblacion_array: this.poblacion_array,
                    poblacion_no_asegurada: this.poblacion_no_asegurada,
                    chart_torta_edades: chart_torta_edades,
                    chart_no_asegurado_1: chart_no_asegurado_1,
                    chart_no_asegurado_2: chart_no_asegurado_2,
                    determinante_salud_array: this.determinante_salud_array,
                    chart_poblacion_pobreza: chart_poblacion_pobreza,
                    chart_escolaridad: chart_escolaridad,
                    chart_desempleo: chart_desempleo,
                    chart_acueducto: chart_acueducto,
                    chart_alcantarillado: chart_alcantarillado,
                    condiciones_salud_array: this.condiciones_salud_array,
                    chart_cronica: chart_cronica,
                    chart_infecciosa: chart_infecciosa,
                    chart_discapacidad: chart_discapacidad,
                    chart_embarazo: chart_embarazo,
                    chart_inmunizacion: chart_inmunizacion,
                    chart_peso_para_talla: chart_peso_para_talla,
                    chart_talla_para_edad: chart_talla_para_edad,
                    chart_imc: chart_imc,
                    chart_imc_5_17: chart_imc_5_17,
                    chart_imc_5_17_e: chart_imc_5_17_e,
                    chart_imc_18_60: chart_imc_18_60,
                    chart_imc_18_60_e: chart_imc_18_60_e
                };

                try {
                    await informes.exportarGeneralSalud(parametros).then(respuesta => {
                        this.rutaPdf = store.state.apiURL + respuesta.data.nombre;
                        this.isLoading = false;
                        this.$refs.modalpdf.show();
                    });
                } catch (error) { 
                    this.$swal("Error...!", "Ocurrio un error!", "error"); 
                }
            }, 
            cerrarModal() {
                this.$refs.modalpdf.hide();
            },
        },
    };
</script>
<style>
    .li_li {
        padding-top: 7px;
        padding-bottom: 7px;
    }

    p{
        line-height: 200%;
    }

    #divPadre {
        text-align:center;
    }
    #divHijo {
        width:25cm;
        margin:0px auto;
    }

    .table_data {
        width: 100%;
        font-size: 13px;
        border-collapse: collapse;
    }

    .table_data thead {
        padding: 0.3em;
        color: #fff;
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

    .nav-pills, .nav-tabs {
        margin: 0 0 -10px 0 !important;
    }
</style>