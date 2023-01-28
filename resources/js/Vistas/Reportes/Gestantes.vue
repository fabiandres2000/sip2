<template>
    <div>
        <div class="kt-portlet" style="margin-top: -4%;">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        <span class="kt-widget20__number kt-font-danger"
                            >REPORTE DE GESTANTES</span
                        >
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-section">
                        <div class="kt-section__content">
                            <br />
                            <button
                                type="button"
                                class=" btn btn-brand"
                                data-skin="dark"
                                data-toggle="kt-tooltip"
                                data-placement="top"
                                title="Filtrar"
                                @click="filtrar"
                            >
                                <i class="fa fa-search"></i>Filtrar
                            </button>
                            <button
                                type="button"
                                class=" btn btn-danger"
                                data-skin="dark"
                                data-toggle="kt-tooltip"
                                data-placement="top"
                                title="Exportar Pdf"
                                @click="generarPDF()"
                                :disabled="!valPdf"
                                :class="spinPdf"
                            >
                                <i class="fa fa-file-pdf"></i>Exportar a Pdf
                            </button>

                            <!-- <button
                                type="button"
                                class=" btn btn-success"
                                data-skin="dark"
                                data-toggle="kt-tooltip"
                                data-placement="top"
                                title="Exportar Excel"
                            >
                                <i class="fa fa-file-excel-o"></i>Exportar a
                                Excel
                            </button> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="kt-section">
                    <div class="kt-section__content">
                        <div class="row">
                            <div class="col-md-2 col-lg-2">
                                <div class="form-group">
                                    <label>Grupo de edades:</label>
                                    <b-form-select v-model="rango">
                                        <option value="Todos">Todos</option>
                                        <option value="0-"
                                            >Menores de 1 año</option
                                        >
                                        <option value="r1-5"
                                            >De 1 a 5 años</option
                                        >
                                        <option value="r6-11"
                                            >De 6 a 11 años</option
                                        >
                                        <option value="r12-17"
                                            >De 12 a 17 años</option
                                        >
                                        <option value="r18-28"
                                            >De 18 a 28 años</option
                                        >
                                        <option value="r29-59"
                                            >De 29 a 59 años</option
                                        >
                                        <option value="r60+"
                                            >Mayores de 60 años</option
                                        >
                                    </b-form-select>
                                </div>
                            </div>  
                            <div class="col-md-10 col-lg-10">
                                <h5>Total de mujeres gestantes: {{ paginacion.total }} - {{ Math.round(porceMujeres * 100)/100 }}% población en edad fertil</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table
                                    class="table table-sm table-hover"
                                    id="tablaDatos"
                                >
                                    <thead class>
                                        <tr class="kt-bg-fill-brand">
                                            <th class="text-left">No.</th>
                                            <th class="text-left">
                                                Identificación
                                            </th>
                                            <th class="text-left">
                                                Nombre
                                            </th>
                                            <th class="text-left">
                                                Ubicación
                                            </th>
                                            <th class="text-center">
                                                Edad
                                            </th>
                                            <th class="text-left">
                                                Control P.
                                            </th>
                                            <th class="text-left">
                                                Escolaridad
                                            </th>
                                            <th class="text-left">
                                                Diag. Nutriconal
                                            </th>
                                            <th class="text-left">
                                                Enfermedad
                                            </th>
                                            <th class="text-left">
                                                Eps
                                            </th>
                                            <th class="text-left">
                                                Embarazon Multiple
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody v-if="gestantes.length > 0">
                                        <tr
                                            v-for="(item, index) in gestantes"
                                            :key="index"
                                        >
                                            <td
                                                style="font-weight: normal;vertical-align: middle;"
                                            >
                                                {{ index + 1 }}
                                            </td>
                                            <td
                                                style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                                            >
                                                {{ item.identificacion }}
                                            </td>
                                            <td
                                                style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                                            >
                                                {{ item.nombres }}
                                            </td>
                                            <td
                                                style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                                            >
                                                {{ item.localizacion }}
                                            </td>
                                            <td
                                                style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                                            >
                                                {{ item.edad }}
                                            </td>
                                            <td
                                                style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                                            >
                                                2021-02-03
                                            </td>
                                            <td
                                                style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                                            >
                                                {{ item.textoNivel }}
                                            </td>
                                            <td
                                                style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                                            ></td>
                                            <td
                                                style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                                            ></td>

                                            <td
                                                style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                                            >
                                                {{ item.textoEps }}
                                            </td>
                                            <td
                                                style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                                            >
                                                {{ item.embarazo_multiple }}
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tbody v-else>
                                        <tr>
                                            <td
                                                colspan="11"
                                                style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;font-size: 20px;"
                                            >
                                                No existen datos
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div
                                    class="kt-separator kt-separator--border-dashed"
                                ></div>
                                <!--begin: Section-->
                                <div class="kt-section">
                                    <!--begin: Pagination-->
                                    <div
                                        class="kt-pagination kt-pagination--danger"
                                    >
                                        <ul class="kt-pagination__links">
                                            <li
                                                class="kt-pagination__link--first"
                                                v-if="
                                                    paginacion.pagina_actual > 1
                                                "
                                            >
                                                <a
                                                    href="javascript:;"
                                                    @click.prevent="
                                                        cambiarPaginas(1)
                                                    "
                                                >
                                                    <i
                                                        class="fa fa-angle-double-left kt-font-danger"
                                                    ></i>
                                                </a>
                                            </li>
                                            <li
                                                class="kt-pagination__link--next"
                                                v-if="
                                                    paginacion.pagina_actual > 1
                                                "
                                            >
                                                <a
                                                    href="javascript:;"
                                                    @click.prevent="
                                                        cambiarPaginas(
                                                            paginacion.pagina_actual -
                                                                1
                                                        )
                                                    "
                                                >
                                                    <i
                                                        class="fa fa-angle-left kt-font-danger"
                                                    ></i>
                                                </a>
                                            </li>
                                            <li
                                                :class="[
                                                    pagina == esActivo
                                                        ? 'kt-pagination__link--active'
                                                        : ''
                                                ]"
                                                v-for="(pagina,
                                                index) in numeroDePaginas"
                                                :key="index"
                                            >
                                                <a
                                                    href="javascript:;"
                                                    @click.prevent="
                                                        cambiarPaginas(pagina)
                                                    "
                                                    >{{ pagina }}</a
                                                >
                                            </li>
                                            <li
                                                class="kt-pagination__link--prev"
                                                v-if="
                                                    paginacion.pagina_actual <
                                                        paginacion.ultima_pagina
                                                "
                                            >
                                                <a
                                                    href="javascript:;"
                                                    @click.prevent="
                                                        cambiarPaginas(
                                                            paginacion.pagina_actual +
                                                                1
                                                        )
                                                    "
                                                >
                                                    <i
                                                        class="fa fa-angle-right kt-font-danger"
                                                    ></i>
                                                </a>
                                            </li>
                                            <li
                                                class="kt-pagination__link--last"
                                                v-if="
                                                    paginacion.pagina_actual <
                                                        paginacion.ultima_pagina
                                                "
                                            >
                                                <a
                                                    href="javascript:;"
                                                    @click.prevent="
                                                        cambiarPaginas(
                                                            paginacion.ultima_pagina
                                                        )
                                                    "
                                                >
                                                    <i
                                                        class="fa fa-angle-double-right kt-font-danger"
                                                    ></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!--end: Pagination-->
                                </div>
                                <!--end: Section-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <b-modal
                ref="modalpdf"
                hide-footer
                title="Reporte de Gestantes"
                size="xl"
                centered
                header-bg-variant="danger"
                header-text-variant="light"
                :no-close-on-backdrop="true"
            >
                <embed
                    id="divPdf"
                    :src="ruta"
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
    </div>
</template>
<script>
"use strict";
import * as reporteServicios from "../../Servicios/reportes";
import store from "../../store";

export default {
    mounted() {
        this.consultar(1);
    },
    name: "gestan",
    data() {
        return {
            gestantes: [],
            paginacion: {
                total: 0,
                pagina_actual: 0,
                por_pagina: 0,
                ultima_pagina: 0,
                desde: 0,
                hasta: 0
            },
            ruta: "",
            offset: 4,
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
            rango: "Todos",
            valPdf: true,
            porceMujeres: 0,
            total_mujeres: 0,
        };
    },
    computed: {
        esActivo: function() {
            return this.paginacion.pagina_actual;
        },
        numeroDePaginas: function() {
            if (!this.paginacion.hasta) {
                return [];
            }
            var desde = this.paginacion.pagina_actual - this.offset; // TODO offset
            if (desde < 1) {
                desde = 1;
            }
            var aux = this.offset * 2;
            var hasta = desde + aux;
            if (hasta >= this.paginacion.ultima_pagina) {
                hasta = this.paginacion.ultima_pagina;
            }
            var paginasArray = [];
            while (desde <= hasta) {
                paginasArray.push(desde);
                desde++;
            }
            return paginasArray;
        },
        spinPdf() {
            if (this.valPdf) {
                return {};
            } else {
                return [
                    "kt-spinner",
                    "kt-spinner--right",
                    "kt-spinner--sm",
                    "kt-spinner--light"
                ];
            }
        }
    },
    methods: {
        consultar: async function(pagina) {
            this.gestantes = [];
            const parametros = {
                rango: this.rango,
                _token: this.csrf,
                page: pagina,
                tipo: "paginate"
            };
            try {
                await reporteServicios.gestantes(parametros).then(respuesta => {
                    this.gestantes = respuesta.data.gestantes.data;
                    this.paginacion = respuesta.data.paginacion;
                    this.total_mujeres = respuesta.data.total_mujeres;
                    this.porceMujeres = (this.paginacion.total * 100) / this.total_mujeres;
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
        filtrar() {
            this.consultar(1);
        },
        cambiarPaginas: function(pagina) {
            this.paginacion.pagina_actual = pagina;
            this.consultar(pagina);
        },
        async generarPDF() {
            this.valPdf = false;
            const parametros = {
                rango: this.rango,
                _token: this.csrf,
                page: 1,
                tipo: "Todos"
            };
            try {
                await reporteServicios
                    .exportarGestantes(parametros)
                    .then(respuesta => {
                        this.valPdf = true;
                        this.ruta = store.state.apiURL + respuesta.data.nombre;
                        this.$refs.modalpdf.show();
                    });
            } catch (e) {}
        },
        cerrarModal() {
            this.$refs.modalpdf.hide();
        },        
    }
};
</script>
