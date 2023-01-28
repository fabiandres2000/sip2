<template>
    <div>
        <div class="kt-portlet" style="margin-top: -4%;">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        <span class="kt-widget20__number kt-font-danger"
                            >GESTIÓN DE ENTES</span
                        >
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="kt-section">
                    <div class="kt-section__content">
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="kt-section">
                                    <div class="kt-section__content">
                                        <a
                                            href="javascript:;"
                                            class="btn btn-outline-primary btn-icon"
                                            data-skin="dark"
                                            data-toggle="kt-tooltip"
                                            data-placement="top"
                                            title="Nuevo Usuario"
                                            @click="abrirModal"
                                        >
                                            <i
                                                class="la la-file-text-o"
                                            ></i> </a
                                        >&nbsp;
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <form class="kt-form">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input
                                                type="text"
                                                class="form-control"
                                                placeholder="Busqueda"
                                                v-model="txtbusqueda"
                                            />
                                            <div class="input-group-append">
                                                <button
                                                    type="button"
                                                    class="btn btn-primary btn-icon"
                                                    @click.prevent="
                                                        consultar(1)
                                                    "
                                                >
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-sm table-hover">
                                        <thead class>
                                            <tr class="kt-bg-fill-brand">
                                                <th>No.</th>
                                                <th>Nombre</th>
                                                <th>Alias</th>
                                                <th>Sigla</th>
                                                <th class="text-right">
                                                    Población
                                                </th>
                                                <th class="text-right">
                                                    Viviendas
                                                </th>
                                                <td class="text-center">
                                                    Estado
                                                </td>
                                                <td class="text-center">
                                                    Opciones
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr
                                                v-for="(item, index) in entes"
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
                                                    {{ item.nombre }}
                                                </td>
                                                <td
                                                    style="font-weight: normal;vertical-align: middle;text-align: left;"
                                                >
                                                    {{ item.alias }}
                                                </td>
                                                <td
                                                    style="font-weight: normal;vertical-align: middle;text-align: left;"
                                                >
                                                    {{ item.sigla }}
                                                </td>
                                                <td
                                                    style="font-weight: normal;vertical-align: middle;text-align: right;"
                                                >
                                                    {{ item.poblacion }}
                                                </td>
                                                <td
                                                    style="font-weight: normal;vertical-align: middle;text-align: right;"
                                                >
                                                    {{ item.viviendas }}
                                                </td>
                                                <td
                                                    style="font-weight: normal;vertical-align: middle;text-align: center;"
                                                >
                                                    <span
                                                        class="kt-badge kt-badge--inline text-align: center;"
                                                        :class="
                                                            item.estado ==
                                                            'Activo'
                                                                ? 'kt-badge--success'
                                                                : 'kt-badge--danger'
                                                        "
                                                        >{{ item.estado }}</span
                                                    >
                                                </td>
                                                <td
                                                    style="text-align:center;vertical-align: middle;text-align: center;"
                                                >
                                                    <button
                                                        type="button"
                                                        class="btn btn-outline-info btn-icon btn-sm"
                                                        title="Editar"
                                                        @click="editar(item)"
                                                    >
                                                        <i
                                                            class="fa fa-edit"
                                                        ></i>
                                                    </button>
                                                    <button
                                                        class="btn btn-icon btn-sm"
                                                        :class="
                                                            item.estado ==
                                                            'Activo'
                                                                ? 'btn-outline-danger'
                                                                : 'btn-outline-success'
                                                        "
                                                        type="button"
                                                        :title="
                                                            item.estado ==
                                                            'Activo'
                                                                ? 'Anular'
                                                                : 'Activar'
                                                        "
                                                        @click="eliminar(item)"
                                                    >
                                                        <i
                                                            class="fa"
                                                            :class="
                                                                item.estado ==
                                                                'Activo'
                                                                    ? 'fa-trash'
                                                                    : 'fa-check'
                                                            "
                                                        ></i>
                                                    </button>
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
                                                        paginacion.pagina_actual >
                                                            1
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
                                        <!--end: Pagination-->
                                    </div>
                                    <!--end: Section-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--begin::Modal-->
            <b-modal
                ref="modalEntes"
                hide-footer
                title="Gestión de Entes"
                size="xl"
                centered
                header-bg-variant="danger"
                header-text-variant="light"
                :no-close-on-backdrop="true"
            >
                <div class="d-block">
                    <div class="row">
                        <div class="col-lg-12">
                            <transition :duration="1000" name="fade">
                                <div
                                    class="alert alert-warning fade show"
                                    role="alert"
                                    v-if="entrarPorError"
                                >
                                    <div class="alert-icon">
                                        <i class="flaticon-warning"></i>
                                    </div>
                                    <div class="alert-text">
                                        Por favor, corrija el(los) siguiente(s)
                                        error(es):
                                        <hr />
                                        <ul>
                                            <li
                                                v-for="(error,
                                                index) in errorDevuelto"
                                                :key="index"
                                            >
                                                {{ error }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="alert-close">
                                        <button
                                            type="button"
                                            class="close"
                                            data-dismiss="alert"
                                            aria-label="Close"
                                        >
                                            <span aria-hidden="true">
                                                <i class="la la-close"></i>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </transition>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <transition :duration="1000" name="fade">
                                <div
                                    class="alert alert-warning fade show"
                                    role="alert"
                                    v-if="errores.length"
                                >
                                    <div class="alert-icon">
                                        <i class="flaticon-warning"></i>
                                    </div>
                                    <div class="alert-text">
                                        Por favor, corrija el(los) siguiente(s)
                                        error(es):
                                        <hr />
                                        <ul>
                                            <li
                                                v-for="(error,
                                                index) in errores"
                                                :key="index"
                                            >
                                                {{ error }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="alert-close">
                                        <button
                                            type="button"
                                            class="close"
                                            data-dismiss="alert"
                                            aria-label="Close"
                                        >
                                            <span aria-hidden="true">
                                                <i class="la la-close"></i>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </transition>
                        </div>
                    </div>

                    <form>
                        <div class="form-group row">
                            <label class="col-lg-1 col-form-label"
                                >Departamento:</label
                            >
                            <div class="col-lg-4">
                                <b-form-select
                                    v-model.trim="entesData.id_dpto"
                                    :class="
                                        entesData.id_dpto == ''
                                            ? 'is-invalid'
                                            : 'is-valid'
                                    "
                                    @change="cambiarCombo('dpto')"
                                    ref="id_dpto"
                                >
                                    <option value selected>Seleccione</option>
                                    <option
                                        v-for="item in dpto_options"
                                        :value="item.value"
                                        :key="item.value"
                                        >{{ item.texto }}</option
                                    >
                                </b-form-select>
                            </div>
                            <label class="col-lg-1 col-form-label"
                                >Municipio:</label
                            >
                            <div class="col-lg-4">
                                <b-form-select
                                    v-model.trim="entesData.id_mun"
                                    :class="
                                        entesData.id_mun == ''
                                            ? 'is-invalid'
                                            : 'is-valid'
                                    "
                                    ref="id_mun"
                                >
                                    <option value selected>Seleccione</option>
                                    <option
                                        v-for="item in muni_options[
                                            entesData.id_dpto
                                        ]"
                                        :value="item.value"
                                        :key="item.value"
                                        >{{ item.texto }}</option
                                    >
                                </b-form-select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-1 col-form-label"
                                >Nombre:</label
                            >
                            <div class="col-lg-6">
                                <input
                                    type="text"
                                    class="form-control text-capitalize"
                                    placeholder="Nombre"
                                    v-model="entesData.nombre"
                                    :class="
                                        entesData.nombre == ''
                                            ? 'is-invalid'
                                            : 'is-valid'
                                    "
                                />
                            </div>
                            <label class="col-lg-1 col-form-label"
                                >Alias:</label
                            >
                            <div class="col-lg-4">
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Alias"
                                    v-model="entesData.alias"
                                    :class="
                                        entesData.alias == ''
                                            ? 'is-invalid'
                                            : 'is-valid'
                                    "
                                    @change="formato('alias')"
                                />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-1 col-form-label"
                                >Sigla:</label
                            >
                            <div class="col-lg-3">
                                <input
                                    type="text"
                                    class="form-control text-capitalize"
                                    placeholder="Sigla"
                                    v-model="entesData.sigla"
                                    :class="
                                        entesData.sigla == ''
                                            ? 'is-invalid'
                                            : 'is-valid'
                                    "
                                    @change="formato('sigla')"
                                />
                            </div>
                            <label class="col-lg-1 col-form-label"
                                >Población:</label
                            >
                            <div class="col-lg-3">
                                <input
                                    type="text"
                                    class="form-control text-capitalize"
                                    placeholder="Población"
                                    v-model="entesData.poblacion"
                                    :class="
                                        entesData.poblacion == ''
                                            ? 'is-invalid'
                                            : 'is-valid'
                                    "
                                    @change="formato('poblacion')"
                                />
                            </div>
                            <label class="col-lg-1 col-form-label"
                                >Viviendas:</label
                            >
                            <div class="col-lg-3">
                                <input
                                    type="text"
                                    class="form-control text-capitalize"
                                    placeholder="Viviendas"
                                    v-model="entesData.viviendas"
                                    :class="
                                        entesData.viviendas == ''
                                            ? 'is-invalid'
                                            : 'is-valid'
                                    "
                                    @change="formato('viviendas')"
                                />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-1 col-form-label"
                                >Latitud:</label
                            >
                            <div class="col-lg-3">
                                <input
                                    type="text"
                                    class="form-control text-capitalize"
                                    placeholder="Latitud"
                                    v-model="entesData.lat"
                                    :class="
                                        entesData.lat == ''
                                            ? 'is-invalid'
                                            : 'is-valid'
                                    "
                                />
                            </div>
                            <label class="col-lg-1 col-form-label"
                                >Longitud:</label
                            >
                            <div class="col-lg-3">
                                <input
                                    type="text"
                                    class="form-control text-capitalize"
                                    placeholder="Longitud"
                                    v-model="entesData.lng"
                                    :class="
                                        entesData.lng == ''
                                            ? 'is-invalid'
                                            : 'is-valid'
                                    "
                                />
                            </div>
                        </div>
                        <hr />
                        <div class="text-right">
                            <button
                                type="button"
                                class="btn btn-success"
                                @click="guardar"
                                :disabled="!valG"
                                :class="spinG"
                            >
                                <i class="fa fa-edit"></i> Guardar
                            </button>
                            <button
                                type="button"
                                class="btn btn-warning"
                                @click="cerrarModal"
                            >
                                <i class="fa fa-window-close"></i> Cancelar
                            </button>
                        </div>
                    </form>
                </div>
            </b-modal>
        </div>
    </div>
</template>
<script>
"use strict";
import * as entesServicios from "../../Servicios/entes_servicios";
export default {
    mounted() {
        this.consultar(1);
    },
    name: "entes",
    data() {
        return {
            errores: [],
            entes: [],
            errorDevuelto: [],
            entrarPorError: false,
            txtbusqueda: "",
            dpto_options: [],
            muni_options: {},
            entesData: {
                id: 0,
                nombre: "",
                alias: "",
                sigla: "",
                poblacion: "",
                viviendas: "",
                estado: "Activo",
                id_dpto: "",
                id_mun: "",
                lat: "",
                lng: ""
            },
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
            headerTextVariant: "light",
            mostrar: true,
            paginacion: {
                total: 0,
                pagina_actual: 0,
                por_pagina: 0,
                ultima_pagina: 0,
                desde: 0,
                hasta: 0
            },
            offset: 4,
            valG: true,
            actual: 0
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
        spinG() {
            if (this.valG) {
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
        formato(caja) {
            if (caja == "poblacion") {
                this.entesData.poblacion = this.entesData.poblacion
                    .replace(/[^.\d]/g, "")
                    .trim();
                if (this.entesData.poblacion == "NaN") {
                    this.entesData.poblacion = "";
                }
                if (this.entesData.poblacion == "0") {
                    this.entesData.poblacion = "";
                }
            }
            if (caja == "viviendas") {
                this.entesData.viviendas = this.entesData.viviendas
                    .replace(/[^.\d]/g, "")
                    .trim();
                if (this.entesData.viviendas == "NaN") {
                    this.entesData.viviendas = "";
                }
                if (this.entesData.viviendas == "0") {
                    this.entesData.viviendas = "";
                }
            }
            if (caja == "alias") {
                this.entesData.alias = this.entesData.alias
                    .replace(/\s+/g, "")
                    .trim()
                    .toLowerCase();
            }
            if (caja == "sigla") {
                this.entesData.sigla = this.entesData.sigla
                    .replace(/\s+/g, "")
                    .trim()
                    .toUpperCase();
            }
        },
        guardar: async function() {
            
            if (!this.checkForm()) {
                this.entrarPorError = false;
                // this.errores = [];
                console.log("clo")

            } else {
                this.errores = [];
                let opcion = "";
                if (this.entesData.id == 0) {
                    opcion = "GUARDAR";
                } else {
                    opcion = "MODIFICAR";
                }
                const parametros = {
                    _token: this.csrf,
                    entes: this.entesData,
                    opcion: opcion
                };
                try {
                    await entesServicios
                        .guardar(parametros)
                        .then(respuesta => {
                            if (this.entesData.id == 0) {
                                this.entes.unshift(respuesta.data.entes);
                            } else {
                                this.consultar(1);
                            }
                            this.cerrarModal();
                            this.limpiar();
                            this.$swal(
                                "Guardar...!",
                                "Datos Guardados Exitosamente!",
                                "success"
                            );
                        })
                        .catch(error => {
                            this.errorDevuelto = error.response.data.errors;
                            this.entrarPorError = true;
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
        },
        consultar: async function(pagina) {
            let fecha = new Date();
            this.actual = fecha.getFullYear();
            const parametros = {
                txtbusqueda: this.txtbusqueda.trim(),
                _token: this.csrf,
                page: pagina
            };
            try {
                await entesServicios.listar(parametros).then(respuesta => {
                    this.entes = respuesta.data.entes.data;
                    this.paginacion = respuesta.data.paginacion;
                    this.dpto_options = respuesta.data.arrayDpto;
                    this.muni_options = respuesta.data.arrayMuni;
                });
            } catch (error) {
                switch (error.response.status) {
                    case 419:
                        this.$swal("Error...!", "Ocurrio un error!", "error");
                        break;
                    case 422:
                        this.$swal("Error...!", "Ocurrio un error!", "error");
                        break;
                    default:
                        this.$swal("Error...!", "Ocurrio un error!", "error");
                        break;
                }
            }
        },
        abrirModal() {
            this.errores = [];
            this.entrarPorError = false;
            this.$refs.modalEntes.show();
        },
        cerrarModal() {
            this.limpiar();
            this.$refs.modalEntes.hide();
        },
        checkForm(e) {
            this.errores = [];
            if (!this.entesData.id_dpto) {
                this.errores.push("EL departamento es obligatorio.");
            }
            if (!this.entesData.id_mun) {
                this.errores.push("EL municipio es obligatorio.");
            }
            if (!this.entesData.nombre) {
                this.errores.push("EL nombre es obligatorio.");
            }
            if (!this.entesData.alias) {
                this.errores.push("El alias es obligatorio.");
            }
            if (!this.entesData.sigla) {
                this.errores.push("La sigla es obligatoria.");
            }
            if (!this.entesData.poblacion) {
                this.errores.push("La población es obligatoria.");
            }
            if (!this.entesData.viviendas) {
                this.errores.push("El numero de viviendas es obligatoria.");
            }
            if (!this.entesData.lat) {
                this.errores.push("La latitud es obligatoria.");
            }
            if (!this.entesData.lng) {
                this.errores.push("La longitud es obligatoria.");
            }                        
            if (!this.errores.length) {
                return true;
            } else {
                return false;
            }
            e.preventDefault();
        },
        eliminar: async function(usu) {
            var title = "";
            var titulo = "";
            if (usu.estado == "Activo") {
                title = "¿Desea anular el ente " + usu.nombre + "?";
                titulo = "Ente " + usu.nombre + " anulado de manera exitosa";
            } else {
                title = "¿Desea activar el ente " + usu.nombre + "?";
                titulo = "Ente " + usu.nombre + " activado de manera exitosa";
            }
            this.$swal({
                title: title,
                text: "",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Aceptar",
                cancelButtonText: "Cancelar"
            }).then(result => {
                if (result.value) {
                    const parametros = {
                        _token: this.csrf,
                        id: usu.id,
                        estado: usu.estado
                    };

                    try {
                        entesServicios
                            .eliminar(parametros)
                            .then(respuesta => {
                                this.consultar(1);
                                this.$swal({
                                    position: "top-end",
                                    icon: "success",
                                    title: titulo,
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                            })
                            .catch(error => {
                                this.$swal(
                                    "Error...!",
                                    "Ocurrio un error!",
                                    "error"
                                );
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
            });
        },
        editar: function(usu) {
            this.entesData = { ...usu };
            this.$refs.modalEntes.show();
        },
        cambiarPaginas: function(pagina) {
            this.paginacion.pagina_actual = pagina;
            this.consultar(pagina);
        },
        limpiar() {
            this.entesData.id = 0;
            this.entesData.id_dpto = "";
            this.entesData.id_mun = "";
            this.entesData.nombre = "";
            this.entesData.alias = "";
            this.entesData.sigla = "";
            this.entesData.poblacion = "";
            this.entesData.viviendas = "";
            this.entesData.lat = "";
            this.entesData.lng = "";
            this.entrarPorError = false;
            this.errores = [];
        },
        cambiarCombo: async function(caja) {
            if (caja === "dpto") {
                this.entesData.id_mun = "";
            }
        }
    }
};
</script>
<style>
.modal-backdrop {
    background-color: rgba(0, 0, 0, 0.5) !important;
}
.modal-title {
    color: #f8f9fa !important;
}
.close {
    display: none;
}
</style>
