<template>
    <div>
        <br />
        <div class="row justify-content-center">
            <div class="col-md-12 ">
                <div class="card redondo">
                    <div
                        class="card-body"
                        style="padding-top:0; padding-bottom:0; margin:0; padding-left:7px;"
                    >
                        <div class="row">
                            <div
                                class="col-sm-4 borderbottomright"
                                style="background-color: #FE7900"
                            >
                                <div
                                    class="row"
                                    style="padding-top: 10px; padding-botton: 10px;"
                                >
                                    <div class="col-sm-2">
                                        <span
                                            class="text-white deabjohaciaarriba text-center"
                                            style="font-weight: 600; font-size: 18px;"
                                            >Avance caracterización</span
                                        >
                                    </div>
                                    <div class="col-md-9 text-center">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <span
                                                    class="text-white"
                                                    style="font-weight: 600; font-size: 18px;"
                                                    >Número Total de Personas</span
                                                >
                                                <h1
                                                    style="padding-top: 10px;font-size: 18px;"
                                                    class="text-white"
                                                >
                                                    {{ datos.personas_globales.poblacion }}
                                                </h1>
                                            </div>
                                        </div>                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                                <span
                                                    class="text-white"
                                                    style="font-weight: 600; font-size: 18px;"
                                                    >Personas
                                                    caracterizadas</span
                                                >
                                                <h1
                                                    style="padding-top: 10px;font-size: 18px;"
                                                    class="text-white"
                                                >
                                                    {{ datos.numero_personas }}
                                                </h1>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <span
                                                    class="text-white"
                                                    style="font-weight: 600; font-size: 18px;"
                                                    >Número Total de Hogares</span
                                                >
                                                <h1
                                                    style="padding-top: 10px;font-size: 18px;"
                                                    class="text-white"
                                                >
                                                    {{ datos.personas_globales.viviendas }}
                                                </h1>
                                            </div>
                                        </div>                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                                <span
                                                    class="text-white"
                                                    style="font-weight: 600; font-size: 18px;"
                                                    >Viviendas
                                                    caracterizadas</span
                                                >
                                                <h1
                                                    style="padding-top: 10px;font-size: 18px;"
                                                    class="text-white"
                                                >
                                                    {{ datos.numero_hogares }}
                                                </h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 text-center">
                                <br />
                                <h4>Porcentaje de avance</h4>
                                <vue-ellipse-progress
                                    :progress="Math.floor(porcentaje * 10) / 10"
                                    :size="220"
                                    :angle="-90"
                                    :gap="10"
                                    :legend="true"
                                    :legendValue="180"
                                    :thickness="10"
                                    emptyThickness="2%"
                                    dash="60 0.9"
                                    :color="colorspinnner"
                                    :noData="false"
                                    :loading="false"
                                    fontColor="white"
                                    :half="false"
                                    dot="2 blue"
                                    line-mode="out 2"
                                >
                                    <p
                                        slot="legend-caption"
                                        style="font-size: 20px; font-weight: bold;"
                                    >
                                        {{ Math.floor(porcentaje * 10) / 10 }}%
                                    </p>
                                </vue-ellipse-progress>
                            </div>
                            <div class="col-md-4" style="text-align: center; padding-top: 25px;">
                                <h4>Número Total de Personas (Por Sexo)</h4>
                                <apexchart
                                    type="bar"
                                    height="200"
                                    :options="chartOptions_bar"
                                    :series="series_bar"
                                ></apexchart>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <div class="row justify-content-center">
            <div class="col-lg-8" style="overflow: auto; ">
                <div
                    class="card redondo"
                    style="margin-top: 0px;height: 450px; padding-top: 70px;"
                >
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <br />
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <vue-ellipse-progress
                                            :progress="Math.floor(datos.hacinamientos * 100 / datos.personas_globales.viviendas)"
                                            :size="220"
                                            :angle="-90"
                                            :gap="10"
                                            :legend="true"
                                            :legendValue="180"
                                            :thickness="10"
                                            emptyThickness="2%"
                                            dash="60 0.9"
                                            color="#FE7900"
                                            :noData="false"
                                            :loading="false"
                                            fontColor="white"
                                            :half="false"
                                            line-mode="out 2"
                                        >
                                            <p
                                                slot="legend-caption"
                                                style="font-size: 20px; font-weight: bold;"
                                            >
                                                {{ datos.hacinamientos}}
                                            </p>
                                        </vue-ellipse-progress>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <span style="font-weight: 400;"
                                            >Viviendas en hacinamiento</span
                                        >
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <br />
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <vue-ellipse-progress
                                            :progress="Math.floor(datos.total_migrantes * 100 / datos.numero_personas)"
                                            :size="220"
                                            :angle="-90"
                                            :gap="10"
                                            :legend="true"
                                            :legendValue="180"
                                            :thickness="10"
                                            emptyThickness="2%"
                                            dash="60 0.9"
                                            color="#1D4A7E"
                                            :noData="false"
                                            :loading="false"
                                            fontColor="white"
                                            :half="false"
                                            line-mode="out 2"
                                        >
                                            <p
                                                slot="legend-caption"
                                                style="font-size: 20px; font-weight: bold;"
                                            >
                                                {{ datos.total_migrantes }}
                                            </p>
                                        </vue-ellipse-progress>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <span style="font-weight: 400;"
                                            >Número de migrantes</span
                                        >
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <br />
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <vue-ellipse-progress
                                            :progress="Math.floor(datos.total_desempleados * 100 / datos.numero_personas)"
                                            :size="220"
                                            :angle="-90"
                                            :gap="10"
                                            :legend="true"
                                            :legendValue="180"
                                            :thickness="10"
                                            emptyThickness="2%"
                                            dash="60 0.9"
                                            color="#32BEA2"
                                            :noData="false"
                                            :loading="false"
                                            fontColor="white"
                                            :half="false"
                                            line-mode="out 2"
                                        >
                                            <p
                                                slot="legend-caption"
                                                style="font-size: 20px; font-weight: bold;"
                                            >
                                                {{ datos.total_desempleados}}
                                            </p>
                                        </vue-ellipse-progress>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <span style="font-weight: 400;"
                                            >Número de desempleados</span
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div
                    class="card redondo"
                    style="margin-top: 0px;height: 450px;"
                >
                    <div class="card-body">
                        <GoogleMap></GoogleMap>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script
    async
    defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZ_FNKVfd7vx76ykD4XbVjATqK5sVp8AQ&sensor=false&libraries=visualization&callback"
></script>
<script>
"use strict";
import * as DashboardService from "../../Servicios/dashboard";
import VueApexCharts from "vue-apexcharts";
import GoogleMap from "./Maps";

export default {
    mounted() {
        // console.log(Math.round(1.005*100)/100);
        // console.log(Math.round10(1.005, -2));
        this.consultar();
        this.grafica_sexo();
    },
    props: ["numero_personas"],
    data() {
        return {
            mensage: "Hola mundo",
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
            datos: {
                numero_personas: 0,
                numero_hogares: 0,
                personas_desempleadas: 0,
                indice_hacinamiento: 0,
                personas_globales: [],
                hacinamientos: 0,
                total_migrantes: 0,
                total_desempleados: 0
            },
            porcentaje: 0,
            colorspinnner: "#fff",
            series: [
                {
                    name: "Males",
                    data: [4.3, 4.1, 4.2, 4.5, 3.9, 3.5, 3]
                },
                {
                    name: "Females",
                    data: [-4.4, -4.1, -4, -4.1, -3.4, -3.1, -2.8]
                }
            ],
            chartOptions: {
                chart: {
                    type: "bar",
                    height: 300,
                    stacked: true
                },
                colors: ["#008FFB", "#FF4560"],
                plotOptions: {
                    bar: {
                        horizontal: true,
                        barHeight: "50%"
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    width: 1,
                    colors: ["#fff"]
                },

                grid: {
                    xaxis: {
                        lines: {
                            show: false
                        }
                    }
                },
                yaxis: {
                    min: -5,
                    max: 5,
                    title: {
                        // text: 'Age',
                    }
                },
                tooltip: {
                    shared: false,
                    x: {
                        formatter: function(val) {
                            return val;
                        }
                    },
                    y: {
                        formatter: function(val) {
                            return Math.abs(val) + "%";
                        }
                    }
                },
                title: {
                    text: ""
                },
                xaxis: {
                    categories: [
                        "60+",
                        "29-59",
                        "18-28",
                        "12-17",
                        "6-11",
                        "1-5",
                        "0-1"
                    ],
                    title: {
                        text: "Percent"
                    },
                    labels: {
                        formatter: function(val) {
                            return Math.abs(Math.round(val)) + "%";
                        }
                    }
                }
            },

            series_bar: [],
            chartOptions_bar: {
                chart: {
                    type: "bar",
                    height: 300
                },
                colors: ["#1D4A7E", "#1D4A7E"],
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: "25%",
                        endingShape: "rounded"
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 1,
                    colors: ["transparent"]
                },
                xaxis: {
                    categories: ["Hombres", "Mujeres"]
                },
                yaxis: {
                    title: {
                        text: "No personas"
                    }
                },
                fill: {
                    opacity: 1
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return " " + val + " personas";
                        }
                    }
                }
            }
        };
    },
    components: {
        GoogleMap
    },
    methods: {
        async consultar() {
            let data = {
                _token: this.csrf
            };

            await DashboardService.listar(data)
                .then(respuesta => {
                    // console.log(respuesta.data);
                    this.datos = respuesta.data["cantidades"];
                    this.porcentaje =
                        (this.datos.numero_personas /
                            this.datos.personas_globales.poblacion) *
                        100;
                    if (this.porcentaje < 20) {
                        this.colorspinnner = "#f2451a";
                    } else if (this.porcentaje < 60) {
                        this.colorspinnner = "#f2ce1a";
                    } else {
                        this.colorspinnner = "#1abf03";
                    }


                    this.series_bar.push({
                        name: "Nro de personas",
                        data: [this.datos.total_hombres, this.datos.total_mujeres]
                    });               
                })
                .catch(err => {
                    console.log(err);
                });
        },

        grafica_sexo() {}
    },
    beforeDestroy() {}
};
</script>

<style>
.redondo {
    border-radius: 25px;
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
</style>
