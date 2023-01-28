<template>
    <div class="row">
        <div class="col-12">
            <div
                class="kt-portlet kt-portlet--height-fluid kt-portlet--mobile"
                style="margin-top: -4%"
            >
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            <span class="kt-widget20__number kt-font-danger"
                                >POBLACION MIGRANTE</span
                            >
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-section">
                            <div class="kt-section__content">
                                <br />
                                <button
                                    type="button"
                                    class="btn btn-brand"
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
                                    class="btn btn-danger"
                                    data-skin="dark"
                                    data-toggle="kt-tooltip"
                                    data-placement="top"
                                    title="Exportar Pdf"
                                    @click="generarPDF"
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
                                <div class="col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label>Grupo de edades:</label>
                                        <b-form-select
                                            v-model="datos.rangoEdad"
                                        >
                                            <option value="Todos">Todos</option>
                                            <option value="0-"
                                                >Menores de 1</option
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
                                                >De 29 a 59</option
                                            >
                                            <option value="r60+"
                                                >Mayores de 60</option
                                            >
                                        </b-form-select>
                                    </div>
                                </div>
                                <!-- <div class="col-md-3 col-lg-3">
                  <div class="form-group">
                    <label>Enfermedades:</label>
                    <b-form-select v-model="datos.enfermedad">
                      <option value="Todas">Todas</option>
                      <option  v-for="(item, index) in enfermedades" :key="index" :value="item.id">{{item.descripcion}}</option>
                    </b-form-select>
                  </div>
                </div> -->
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table
                                            class="table table-sm table-hover"
                                        >
                                            <thead class>
                                                <tr class="kt-bg-fill-brand">
                                                    <th>No.</th>
                                                    <th>Nombres completos</th>
                                                    <th>Identificacion</th>
                                                    <th>Localización</th>
                                                    <th>Edad</th>
                                                    <th>Genero</th>
                                                    <th>Pais</th>
                                                    <th>Eps</th>
                                                    <th>Ocupación</th>
                                                    <td
                                                        class="text-center"
                                                    ></td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr
                                                    v-for="(item,
                                                    index) in integrantes"
                                                    :key="index"
                                                >
                                                    <td
                                                        style="font-weight: normal; vertical-align: middle"
                                                    >
                                                        {{ index + 1 }}
                                                    </td>
                                                    <td
                                                        style="
                              font-weight: normal;
                              vertical-align: middle;
                              text-align: left;
                              text-transform: capitalize;
                            "
                                                    >
                                                        {{ item.nombres }}
                                                    </td>
                                                    <td
                                                        style="
                              font-weight: normal;
                              vertical-align: middle;
                              text-align: left;
                              text-transform: capitalize;
                            "
                                                    >
                                                        {{
                                                            item.identificacion
                                                        }}
                                                    </td>
                                                    <td
                                                        style="
                              font-weight: normal;
                              vertical-align: middle;
                              text-align: left;
                              text-transform: capitalize;
                            "
                                                    >
                                                        {{ item.localizacion }}
                                                    </td>

                                                    <td
                                                        style="
                              font-weight: normal;
                              vertical-align: middle;
                              text-align: left;
                              text-transform: capitalize;
                            "
                                                    >
                                                        {{ item.edad }}
                                                    </td>
                                                    <td
                                                        style="
                              font-weight: normal;
                              vertical-align: middle;
                              text-align: left;
                              text-transform: capitalize;
                            "
                                                    >
                                                        {{ item.genero }}
                                                    </td>

                                                    <td
                                                        style="
                              font-weight: normal;
                              vertical-align: middle;
                              text-align: left;
                              text-transform: capitalize;
                            "
                                                    >
                                                        {{ item.pais }}
                                                    </td>

                                                    <td
                                                        style="
                              font-weight: normal;
                              vertical-align: middle;
                              text-align: left;
                              text-transform: capitalize;
                            "
                                                    >
                                                        {{ item.eps }}
                                                    </td>

                                                    <td
                                                        style="
                              font-weight: normal;
                              vertical-align: middle;
                              text-align: left;
                              text-transform: capitalize;
                            "
                                                    >
                                                        {{ item.ocupacion }}
                                                    </td>

                                                    <!-- <td
                        style="
                          text-align: center;
                          vertical-align: middle;
                          text-align: center;
                        "
                      >
                        <button
                          type="button"
                          class="btn btn-outline-info btn-icon btn-sm"
                          title="Detalles"
                          @click="detalles(item)"
                        >
                          <i class="fa fa-list"></i>
                        </button>
                      </td> -->
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div
                                            class="kt-separator kt-separator--border-dashed"
                                        ></div>

                                        <div class="kt-section">
                                            <div
                                                class="kt-pagination kt-pagination--danger"
                                            >
                                                <ul
                                                    class="kt-pagination__links"
                                                >
                                                    <li
                                                        class="kt-pagination__link--first"
                                                        v-if="
                                                            paginacion.pagina_actual >
                                                                1
                                                        "
                                                    >
                                                        <a
                                                            href="javascript:;"
                                                            @click.prevent="
                                                                cambiarPaginas(
                                                                    1
                                                                )
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
                                                            paginacion.pagina_actual >
                                                                1
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
                                                                cambiarPaginas(
                                                                    pagina
                                                                )
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
                                            <br />
                                            <br />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <b-modal
            ref="modalpdf"
            hide-footer
            title="Enfermedades crónicas"
            size="xl"
            centered
            header-bg-variant="danger"
            header-text-variant="light"
            :no-close-on-backdrop="false"
        >
            <embed
                id="divPdf"
                :src="ruta"
                type="application/pdf"
                width="100%"
                height="650px"
            />

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
import * as reportes from "../../Servicios/reportes";
import store from "../../store";

export default {
    mounted() {
        this.iniciales(1);
    },
    data() {
        return {
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
            ruta: "",
            datos: {
                rangoEdad: "Todos"
            },
            integrantes: {
                id: 0,
                nombres: "",
                identificacion: "",
                localizacion: "",
                edad: "",
                genero: "",
                pais: "",
                eps: "",
                ocupacion: ""
            },
            paginacion: {
                total: 0,
                pagina_actual: 0,
                por_pagina: 0,
                ultima_pagina: 0,
                desde: 0,
                hasta: 0
            },
            offset: 4,
            fila: {}
        };
    },
    methods: {
        async iniciales(pagina) {
            const parametros = {
                _token: this.csrf,
                datos: this.datos,
                page: pagina,
                tipo: "paginate"
            };
            try {
                await reportes
                    .inicialesMigrantes(parametros)
                    .then(respuesta => {
                        this.integrantes = respuesta.data.integrantes.data;
                        this.paginacion = respuesta.data.paginacion;
                    });
            } catch (e) {}
        },
        Buscar() {},
        cambiarPaginas: function(pagina) {
            this.paginacion.pagina_actual = pagina;
            this.iniciales(pagina);
        },
        filtrar() {
            this.iniciales(1);
        },
        async generarPDF() {
            const parametros = {
                _token: this.csrf,
                datos: this.datos,
                tipo: "Todos"
            };
            try {
                await reportes.migrantesPDF(parametros).then(respuesta => {
                    // this.ruta = "http://127.0.0.1:8000/archivomigrantes.pdf";
                    this.ruta = store.state.apiURL + respuesta.data.nombre;
                    console.log(this.ruta);
                    this.$refs.modalpdf.show();
                });
            } catch (e) {}
        },
        cerrarModal() {
            this.$refs.modalpdf.hide();
        }
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
        }
    }
};
</script>
