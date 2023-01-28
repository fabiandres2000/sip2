<template>
    
    <div>
        <div style="margin-top: -4%;">
            <h4>
                <span class="kt-widget20__number kt-font-primary"
                    >Dashboard</span
                >
            </h4>
            <ul
                style="padding-bottom: 44px;"
                class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-success"
            >
                <li class="nav-item">
                    <a
                        class="nav-link active"
                        data-toggle="tab"
                        href="#tabdashboard"
                        role="tab"
                        >Dashboard</a
                    >
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link"
                        data-toggle="tab"
                        href="#tabsalud"
                        role="tab"
                        >Riesgos salud</a
                    >
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link"
                        data-toggle="tab"
                        href="#tabambientales"
                        role="tab"
                        >Riesgos Ambientales</a
                    >
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link"
                        data-toggle="tab"
                        href="#tabsocio"
                        role="tab"
                        >Socioeconomico</a
                    >
                </li>
                <!--  <li class="nav-item">
                    <a
                        class="nav-link"
                        data-toggle="tab"
                        href="#tabunidades"
                        role="tab"
                        >Unidades productivas</a
                    >
                </li> -->
            </ul>
            <div class="tab-content">
                <!-- Identificación -->
                <div class="tab-pane active" id="tabdashboard" role="tabpanel">
                    <Dashboard></Dashboard>
                </div>

                <div class="tab-pane" id="tabsalud" role="tabpanel">
                    <AdminRiesgosSalud></AdminRiesgosSalud>
                </div>

                <div class="tab-pane" id="tabambientales" role="tabpanel">
                    <DashboardRiesgosAmbientalesAdmin></DashboardRiesgosAmbientalesAdmin>
                </div>

                <div class="tab-pane" id="tabsocio" role="tabpanel">
                    <AdminSocioeconomico></AdminSocioeconomico>
                </div>

                <div class="tab-pane" id="tabunidades" role="tabpanel"></div>
            </div>
        </div>
    </div>
</template>

<script>
"use strict";
import * as administracionServicios from "../Servicios/administracion_servicios";
import Dashboard from "../Vistas/Dashboard/Dashboard";
import DashboardRiesgosAmbientalesAdmin from "../Vistas/Dashboard-Riesgos-Ambientales/DashboardRiesgosAmbientalesAdmin.vue";
import AdminSocioeconomico from "../Vistas/Dashboard-socioeconomico/AdminSocioeconomico.vue"
import AdminRiesgosSalud from "../Vistas/Dashboard-Riesgos-Salud/AdminRiesgosSalud.vue"

export default {
    components: {
        Dashboard,
        DashboardRiesgosAmbientalesAdmin,
        AdminSocioeconomico,
        AdminRiesgosSalud
    },
    mounted() {
        this.nuevo();
    },
    props: ["mensaje"],
    data() {
        return {
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
            numero_personas: 0
        };
    },
    methods: {
        nuevo: async function() {
            const parametros = {
                _token: this.csrf,
                opcion: "Todos"
            };

            try {
                await administracionServicios
                    .listar(parametros)
                    .then(respuesta => {
                        this.pob_entrevistada =
                            respuesta.data.totalEntrevistada;
                        this.viv_visitadas = respuesta.data.viviendasVisitados;
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
            }
        },
        derecha() {
            var imageWidth = 500;
            $("#" + this.barra).animate({ scrollLeft: "+=" + imageWidth }, 500);
        },
        izquierda() {
            var imageWidth = 500;
            $("#" + this.barra).animate({ scrollLeft: "-=" + imageWidth }, 500);
        },
        cambiarTab2(opcion) {
            if (opcion === "tabZonas") {
                this.barra = "baradescroll";
            }
            if (opcion === "tabPoblacion") {
                this.barra = "baradescroll1";
            }
            if (opcion === "tabSalud") {
                this.barra = "baradescroll2";
            }
            if (opcion === "tabAmbiental") {
                this.barra = "baradescroll3";
            }
            $("#" + this.barra).animate({ scrollLeft: "-=" + 0 }, 500);
        },
        abrirModal(opcion) {
            // this.$refs.modalProfesional.show();
            $("#modalProfesional").modal("show");
            this.buscar(opcion);
        },
        cerrarModal() {
            $("#modalProfesional").modal("hide");
        },
        buscar: async function(opcion) {
            //POBLACION ENTREVISTADA
            if (opcion === "PobEnt") {
                const parametros = {
                    _token: this.csrf,
                    opcion: opcion
                };

                try {
                    await administracionServicios
                        .listar(parametros)
                        .then(respuesta => {
                            this.poblacion = Math.floor(
                                (respuesta.data.poblacion /
                                    respuesta.data.poblacion) *
                                    100
                            );
                            this.pob_entrevistadaPor = Math.floor(
                                (respuesta.data.totalEntrevistada /
                                    respuesta.data.poblacion) *
                                    100
                            );
                            this.viviendas = Math.floor(
                                (respuesta.data.viviendas /
                                    respuesta.data.viviendas) *
                                    100
                            );
                            this.viv_visitadasPor = Math.floor(
                                (respuesta.data.viviendasVisitados /
                                    respuesta.data.viviendas) *
                                    100
                            );

                            this.$refs.graficaPobEnt1.length = "";
                            $("#graficaPobEnt1").html("");
                            Morris.Donut({
                                element: "graficaPobEnt1",
                                resize: true,
                                data: [
                                    {
                                        label: "Población Total",
                                        value: respuesta.data.poblacion
                                    },
                                    {
                                        label: "Población Entrevistada",
                                        value: respuesta.data.totalEntrevistada
                                    }
                                ],
                                // formatter: function (value, data) {
                                //     return Math.floor(value/3000*100) + '%';
                                // },
                                colors: ["networking", "#5d78ff", "#5d78ff"]
                            });
                            $("#graficaPobEnt1")
                                .find("tspan")
                                .attr("dy", "5");

                            this.$refs.graficaPorCi.length = "";
                            $("#graficaPorCi").html("");
                            Morris.Donut({
                                element: "graficaPorCi",
                                resize: true,
                                data: [
                                    {
                                        label: "Total Viviendas",
                                        value: respuesta.data.viviendas
                                    },
                                    {
                                        label: "Viviendas Visitadas",
                                        value: respuesta.data.viviendasVisitados
                                    }
                                ],
                                // formatter: function (value, data) {
                                //     return Math.floor(value/3000*100) + '%';
                                // },
                                colors: ["networking", "#dd0b19", "#5d78ff"]
                            });
                            $("#graficaPorCi")
                                .find("tspan")
                                .attr("dy", "5");
                            // console.log(this.totalCiclos);
                        });
                } catch (error) {
                    switch (error.response.status) {
                        case 422:
                            this.$swal(
                                "Error...!",
                                "Ocurrio un error!",
                                "error"
                            );
                            break;
                        default:
                            this.$swal(
                                "Error...!",
                                "Ocurrio un error!",
                                "error"
                            );
                            break;
                    }
                }
            }
            if (opcion === "VivVis") {
                const parametros = {
                    _token: this.csrf,
                    opcion: opcion
                };

                try {
                    await administracionServicios
                        .listar(parametros)
                        .then(respuesta => {
                            this.viviendas = Math.floor(
                                (respuesta.data.viviendas /
                                    respuesta.data.viviendas) *
                                    100
                            );
                            this.viv_visitadasPor = Math.floor(
                                (respuesta.data.viviendasVisitados /
                                    respuesta.data.viviendas) *
                                    100
                            );

                            this.$refs.graficaPorCi2.length = "";
                            $("#graficaPorCi2").html("");
                            Morris.Donut({
                                element: "graficaPorCi2",
                                resize: true,
                                data: [
                                    {
                                        label: "Total Viviendas",
                                        value: respuesta.data.viviendas
                                    },
                                    {
                                        label: "Viviendas Visitadas",
                                        value: respuesta.data.viviendasVisitados
                                    }
                                ],
                                // formatter: function (value, data) {
                                //     return Math.floor(value/3000*100) + '%';
                                // },
                                colors: ["networking", "#dd0b19", "#5d78ff"]
                            });
                            $("#graficaPorCi2")
                                .find("tspan")
                                .attr("dy", "5");
                            // console.log(this.totalCiclos);
                        });
                } catch (error) {
                    switch (error.response.status) {
                        case 422:
                            this.$swal(
                                "Error...!",
                                "Ocurrio un error!",
                                "error"
                            );
                            break;
                        default:
                            this.$swal(
                                "Error...!",
                                "Ocurrio un error!",
                                "error"
                            );
                            break;
                    }
                }
            }
            if (opcion === "HogVis") {
                const parametros = {
                    _token: this.csrf,
                    opcion: opcion
                };

                try {
                    await administracionServicios
                        .listar(parametros)
                        .then(respuesta => {
                            this.viviendas = Math.floor(
                                (respuesta.data.viviendas /
                                    respuesta.data.viviendas) *
                                    100
                            );
                            this.viv_visitadasPor = Math.floor(
                                (respuesta.data.viviendasVisitados /
                                    respuesta.data.viviendas) *
                                    100
                            );
                            this.totalhogares = respuesta.data.totalhogares;
                            this.$refs.graficaHogVis.length = "";
                            $("#graficaHogVis").html("");
                            Morris.Donut({
                                element: "graficaHogVis",
                                resize: true,
                                data: [
                                    {
                                        label: "Total Viviendas",
                                        value: respuesta.data.viviendas
                                    },
                                    {
                                        label: "Hogares Visitados",
                                        value: respuesta.data.totalhogares
                                    }
                                ],
                                // formatter: function (value, data) {
                                //     return Math.floor(value/3000*100) + '%';
                                // },
                                colors: ["networking", "#dd0b19", "#5d78ff"]
                            });
                            $("#graficaHogVis")
                                .find("tspan")
                                .attr("dy", "5");
                            // console.log(this.totalCiclos);
                        });
                } catch (error) {
                    switch (error.response.status) {
                        case 422:
                            this.$swal(
                                "Error...!",
                                "Ocurrio un error!",
                                "error"
                            );
                            break;
                        default:
                            this.$swal(
                                "Error...!",
                                "Ocurrio un error!",
                                "error"
                            );
                            break;
                    }
                }
            }
            if (opcion === "Salud") {
                const parametros = {
                    _token: this.csrf,
                    opcion: opcion
                };

                try {
                    await administracionServicios
                        .listar(parametros)
                        .then(respuesta => {
                            this.poblacion = Math.floor(
                                (respuesta.data.poblacion /
                                    respuesta.data.poblacion) *
                                    100
                            );
                            this.adolescentes = respuesta.data.adolescentes;
                            this.adulCron = respuesta.data.adulCron;
                            this.adulInfec = respuesta.data.adulInfec;
                            this.gestantes = respuesta.data.gestantes;

                            this.$refs.graficaAdoEmb.length = "";
                            $("#graficaAdoEmb").html("");
                            Morris.Donut({
                                element: "graficaAdoEmb",
                                resize: true,
                                data: [
                                    {
                                        label: "Total Población",
                                        value: respuesta.data.poblacion
                                    },
                                    {
                                        label: "Adolescentes Embarazadas",
                                        value: respuesta.data.adolescentes
                                    }
                                ],
                                colors: ["networking", "#dd0b19", "#5d78ff"]
                            });
                            $("#graficaAdoEmb")
                                .find("tspan")
                                .attr("dy", "5");

                            this.$refs.graficaAdulCro.length = "";
                            $("#graficaAdulCro").html("");
                            Morris.Donut({
                                element: "graficaAdulCro",
                                resize: true,
                                data: [
                                    {
                                        label: "Total Población",
                                        value: respuesta.data.poblacion
                                    },
                                    {
                                        label: "Enfermedades Cronicas",
                                        value: respuesta.data.adulCron
                                    }
                                ],
                                colors: ["networking", "#e1b621", "#5d78ff"]
                            });
                            $("#graficaAdulCro")
                                .find("tspan")
                                .attr("dy", "5");

                            this.$refs.graficaAdulInfec.length = "";
                            $("#graficaAdulInfec").html("");
                            Morris.Donut({
                                element: "graficaAdulInfec",
                                resize: true,
                                data: [
                                    {
                                        label: "Total Población",
                                        value: respuesta.data.poblacion
                                    },
                                    {
                                        label: "Enfermedades Infecciosas",
                                        value: respuesta.data.adulInfec
                                    }
                                ],
                                colors: ["networking", "#3c84c5", "#5d78ff"]
                            });
                            $("#graficaAdulInfec")
                                .find("tspan")
                                .attr("dy", "5");

                            this.$refs.graficaGestan.length = "";
                            $("#graficaGestan").html("");
                            Morris.Donut({
                                element: "graficaGestan",
                                resize: true,
                                data: [
                                    {
                                        label: "Total Población",
                                        value: respuesta.data.poblacion
                                    },
                                    {
                                        label: "Gestantes",
                                        value: respuesta.data.gestantes
                                    }
                                ],
                                colors: ["networking", "#de3f41", "#5d78ff"]
                            });
                            $("#graficaGestan")
                                .find("tspan")
                                .attr("dy", "5");
                        });
                } catch (error) {
                    switch (error.response.status) {
                        case 422:
                            this.$swal(
                                "Error...!",
                                "Ocurrio un error!",
                                "error"
                            );
                            break;
                        default:
                            this.$swal(
                                "Error...!",
                                "Ocurrio un error!",
                                "error"
                            );
                            break;
                    }
                }
            }
            if (opcion === "Socio") {
                const parametros = {
                    _token: this.csrf,
                    opcion: opcion
                };

                try {
                    await administracionServicios
                        .listar(parametros)
                        .then(respuesta => {
                            this.poblacion = Math.floor(
                                (respuesta.data.poblacion /
                                    respuesta.data.poblacion) *
                                    100
                            );
                            this.inmigrantes = respuesta.data.inmigrantes;
                            this.desempleados = respuesta.data.desempleados;
                            this.indigenas = respuesta.data.indigenas;
                            this.analfabetas = respuesta.data.analfabetas;

                            this.$refs.graficaPobInm.length = "";
                            $("#graficaPobInm").html("");
                            Morris.Donut({
                                element: "graficaPobInm",
                                resize: true,
                                data: [
                                    {
                                        label: "Total Población",
                                        value: respuesta.data.poblacion
                                    },
                                    {
                                        label: "Población Inmigrante",
                                        value: respuesta.data.inmigrantes
                                    }
                                ],
                                colors: ["networking", "#dd0b19", "#5d78ff"]
                            });
                            $("#graficaPobInm")
                                .find("tspan")
                                .attr("dy", "5");

                            this.$refs.graficaDesem.length = "";
                            $("#graficaDesem").html("");
                            Morris.Donut({
                                element: "graficaDesem",
                                resize: true,
                                data: [
                                    {
                                        label: "Total Población",
                                        value: respuesta.data.poblacion
                                    },
                                    {
                                        label: "Desempleados",
                                        value: respuesta.data.desempleados
                                    }
                                ],
                                colors: ["networking", "#e1b621", "#5d78ff"]
                            });
                            $("#graficaDesem")
                                .find("tspan")
                                .attr("dy", "5");

                            this.$refs.graficaIndi.length = "";
                            $("#graficaIndi").html("");
                            Morris.Donut({
                                element: "graficaIndi",
                                resize: true,
                                data: [
                                    {
                                        label: "Total Población",
                                        value: respuesta.data.poblacion
                                    },
                                    {
                                        label: "Indigenas",
                                        value: respuesta.data.indigenas
                                    }
                                ],
                                colors: ["networking", "#3c84c5", "#5d78ff"]
                            });
                            $("#graficaIndi")
                                .find("tspan")
                                .attr("dy", "5");

                            this.$refs.graficaAnalfa.length = "";
                            $("#graficaAnalfa").html("");
                            Morris.Donut({
                                element: "graficaAnalfa",
                                resize: true,
                                data: [
                                    {
                                        label: "Total Población",
                                        value: respuesta.data.poblacion
                                    },
                                    {
                                        label: "Analfabetas",
                                        value: respuesta.data.analfabetas
                                    }
                                ],
                                colors: ["networking", "#de3f41", "#de3f41"]
                            });
                            $("#graficaAnalfa")
                                .find("tspan")
                                .attr("dy", "5");
                        });
                } catch (error) {
                    switch (error.response.status) {
                        case 422:
                            this.$swal(
                                "Error...!",
                                "Ocurrio un error!",
                                "error"
                            );
                            break;
                        default:
                            this.$swal(
                                "Error...!",
                                "Ocurrio un error!",
                                "error"
                            );
                            break;
                    }
                }
            }
            this.varmodal = opcion;
            //POBLACION ENTREVISTADA
        }
    }
};
</script>

<style>
.kt-bg-wor {
    background-color: #646c9a !important;
}
.modal-lg,
.modal-xl {
    max-width: 90%;
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
/* #baradescroll::-webkit-scrollbar {
    display: none;
} */
#baradescroll,
#baradescroll1,
#baradescroll2,
#baradescroll3 {
    overflow-x: hidden;
}

#baradescroll:hover {
    overflow-x: auto;
}
#baradescroll1:hover {
    overflow-x: auto;
}
#baradescroll2:hover {
    overflow-x: auto;
}
#baradescroll3:hover {
    overflow-x: auto;
}
.kt-widget__item a:hover {
    color: black !important;
}
/* .kt-nav__link-icon:hover{color: black !important;} */
.kt-widget__item:hover {
    background: #c6e3dd  !important;
    color: b#c6e3dd lack !important;
}
.grayclase {
    animation: flip 6s linear infinite;
    transform: rotateX(0deg);
}

@keyframes flip {
    0% {
        transform: rotateX(0deg);
    }
    15% {
        transform: rotateX(360deg);
    }
    100% {
        transform: rotateX(360deg);
    }
}

@keyframes fade {
    0% {
        opacity: 0;
    }
    10% {
        opacity: 1;
    }
    50% {
        opacity: 1;
    }
    60% {
        opacity: 0;
    }
}

.img-contenedor {
    -webkit-transition: all 0.9s ease; /* Safari y Chrome */
    -moz-transition: all 0.9s ease; /* Firefox */
    -o-transition: all 0.9s ease; /* IE 9 */
    -ms-transition: all 0.9s ease; /* Opera */
    width: 100%;
}
.img-contenedor:hover {
    -webkit-transform: scale(1.25);
    -moz-transform: scale(1.25);
    -ms-transform: scale(1.25);
    -o-transform: scale(1.25);
    transform: scale(1.25);
}
</style>
