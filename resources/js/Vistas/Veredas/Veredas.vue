<template>
  <div>
    <div class="kt-portlet" style="margin-top: -4%;">
      <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
          <h3 class="kt-portlet__head-title">
            <span class="kt-widget20__number kt-font-danger">GESTIÓN DE VEREDAS</span>
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
                      title="Nueva Vereda"
                      @click="abrirModal"
                    >
                      <i class="la la-file-text-o"></i>
                    </a>&nbsp;
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
                          @click="consultar(1)"
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
                        <th>Departamento</th>
                        <th>Municipio</th>
                        <th>Corregimiento</th>
                        <th>Vereda</th>
                        <td class="text-center">Estado</td>
                        <td class="text-center">Opciones</td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(item, index) in veredas" :key="index">
                        <td style="font-weight: normal;vertical-align: middle;">{{ (index+1) }}</td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >{{item.DEPARTAMENTO}}</td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >{{item.MUNICIPIO}}</td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >{{item.CORREGI}}</td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >{{(item.VEREDA)}}</td>
                        <td style="font-weight: normal;vertical-align: middle;text-align: center;">
                          <span
                            class="kt-badge kt-badge--inline"
                            :class="item.ESTADO=='Activo'?'kt-badge--success':'kt-badge--danger'"
                          >{{item.ESTADO}}</span>
                        </td>
                        <td style="text-align:center;vertical-align: middle;text-align: center;">
                          <button
                            type="button"
                            class="btn btn-outline-info btn-icon btn-sm"
                            title="Editar"
                            @click="editar(item)"
                          >
                            <i class="fa fa-edit"></i>
                          </button>
                          <button
                            class="btn btn-icon btn-sm"
                            :class="(item.ESTADO=='Activo'?'btn-outline-danger':'btn-outline-success')"
                            type="button"
                            :title="(item.ESTADO=='Activo')?'Anular':'Activar'"
                            @click="eliminar(item)"
                          >
                            <i class="fa" :class="(item.ESTADO=='Activo')?'fa-trash':'fa-check'"></i>
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="kt-separator kt-separator--border-dashed"></div>
                  <!--begin: Section-->
                  <div class="kt-section">
                    <!--begin: Pagination-->
                    <div class="kt-pagination kt-pagination--danger">
                      <ul class="kt-pagination__links">
                        <li class="kt-pagination__link--first" v-if="paginacion.pagina_actual>1">
                          <a href="javascript:;" @click.prevent="cambiarPaginas(1)">
                            <i class="fa fa-angle-double-left kt-font-danger"></i>
                          </a>
                        </li>
                        <li class="kt-pagination__link--next" v-if="paginacion.pagina_actual>1">
                          <a
                            href="javascript:;"
                            @click.prevent="cambiarPaginas(paginacion.pagina_actual-1)"
                          >
                            <i class="fa fa-angle-left kt-font-danger"></i>
                          </a>
                        </li>
                        <li
                          :class="[pagina==esActivo ? 'kt-pagination__link--active': '']"
                          v-for="(pagina,index) in numeroDePaginas"
                          :key="index"
                        >
                          <a href="javascript:;" @click.prevent="cambiarPaginas(pagina)">{{pagina}}</a>
                        </li>
                        <li
                          class="kt-pagination__link--prev"
                          v-if="paginacion.pagina_actual<paginacion.ultima_pagina"
                        >
                          <a
                            href="javascript:;"
                            @click.prevent="cambiarPaginas(paginacion.pagina_actual+1)"
                          >
                            <i class="fa fa-angle-right kt-font-danger"></i>
                          </a>
                        </li>
                        <li
                          class="kt-pagination__link--last"
                          v-if="paginacion.pagina_actual<paginacion.ultima_pagina"
                        >
                          <a
                            href="javascript:;"
                            @click.prevent="cambiarPaginas(paginacion.ultima_pagina)"
                          >
                            <i class="fa fa-angle-double-right kt-font-danger"></i>
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
        ref="modalVereda"
        hide-footer
        title="Gestion de Veredas"
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
                <div class="alert alert-warning fade show" role="alert" v-if="entrarPorError">
                  <div class="alert-icon">
                    <i class="flaticon-warning"></i>
                  </div>
                  <div class="alert-text">
                    Por favor, corrija el(los) siguiente(s) error(es):
                    <hr />
                    <ul>
                      <li v-for="(error,index) in errorDevuelto" :key="index">{{ error }}</li>
                    </ul>
                  </div>
                  <div class="alert-close">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
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
                <div class="alert alert-warning fade show" role="alert" v-if="errores.length">
                  <div class="alert-icon">
                    <i class="flaticon-warning"></i>
                  </div>
                  <div class="alert-text">
                    Por favor, corrija el(los) siguiente(s) error(es):
                    <hr />
                    <ul>
                      <li v-for="(error,index) in errores" :key="index">{{ error }}</li>
                    </ul>
                  </div>
                  <div class="alert-close">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
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
              <div class="col-lg-4">
                <label>Departamento:</label>
                <b-form-select v-model="veredasData.dpto">
                  <option value selected>Seleccione</option>
                  <option
                    v-for="item in dpto_options"
                    :value="item.value"
                    :key="item.value"
                  >{{item.texto}}</option>
                </b-form-select>
              </div>
              <div class="col-lg-4">
                <label>Municipio:</label>
                <b-form-select v-model="veredasData.muni" @change="cambio">
                  <option value selected>Seleccione</option>
                  <option
                    v-for="item in muni_options[veredasData.dpto]"
                    :value="item.value"
                    :key="item.value"
                  >{{item.texto}}</option>
                </b-form-select>
              </div>
              <div class="col-lg-4" v-if="bandera">
                <label>Corregimiento:</label>
                <b-form-select v-model="veredasData.corregimiento">
                  <option value="0" selected>Seleccione</option>
                  <option
                    v-for="item in corregi_options[veredasData.muni]"
                    :value="item.value"
                    :key="item.value"
                  >{{item.texto}}</option>
                </b-form-select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-11">
                <label>Vereda:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Barrio"
                  v-model="veredasData.descripcion"
                />
              </div>
              <div class="col-lg-1" v-if="banderaBoton">
                <label>&nbsp;&nbsp;&nbsp;</label>
                <a
                  href="javascript:;"
                  class="btn btn-outline-info btn-icon"
                  data-skin="dark"
                  data-toggle="kt-tooltip"
                  data-placement="top"
                  title="Agregar Vereda"
                  @click.prevent="agregar"
                >
                  <i class="fa fa-plus"></i>
                </a>&nbsp;
              </div>
            </div>
            <div class="form-group row" v-if="banderaBoton">
              <div class="col-md-12">
                <div class="table-responsive">
                  <table class="table table-sm table-hover">
                    <thead class>
                      <tr class="kt-bg-fill-brand">
                        <th>No.</th>
                        <th>Departamento</th>
                        <th>Municipio</th>
                        <th>Corregimiento</th>
                        <th>Vereda</th>
                        <td class="text-center">Opciones</td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(item,index) in datos" :key="index">
                        <td style="font-weight: normal;vertical-align: middle;">{{ (index+1) }}</td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <span class="text-capitalize">{{item.dptoTexto}}</span>
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <span class="text-capitalize">{{item.muniTexto}}</span>
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <span class="text-capitalize">{{item.corregimientoTexto}}</span>
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >{{item.descripcion}}</td>
                        <td style="text-align:center;vertical-align: middle;text-align: center;">
                          <button
                            class="btn btn-icon btn-sm btn-outline-danger"
                            type="button"
                            title="Eliminar"
                            @click="eliminarItem(index)"
                          >
                            <i class="fa fa-trash"></i>
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <hr />
            <div class="text-right">
              <button
                type="button"
                class="btn btn-success"
                @click="guardarVereda"
                v-if="banderaBoton"
                :disabled="!valG"
                :class="spinG"                
              >
                <i class="fa fa-edit"></i> Guardar
              </button>
              <button type="button" class="btn btn-success"
               @click="editarVereda" 
                :disabled="!valG"
                :class="spinG"               
               v-else
               >
                <i class="fa fa-edit"></i> Guardar
              </button>
              <button type="button" class="btn btn-warning" @click="cerrarModal">
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
  import * as veredasServicios from "../../Servicios/veredas_servicios";
  export default {
    mounted() {
      this.consultar(1);
    },
    name: "barri",
    data() {
      return {
        errores: [],
        bandera: false,
        entrarPorError: false,
        txtbusqueda: "",
        veredas: [],
        veredasData: {
          dpto: "",
          muni: "",
          corregimiento: "0",
          descripcion: "",
          id: 0
        },
        dpto_options: [],
        muni_options: {},
        corregi_options: {},
        csrf: document
          .querySelector('meta[name="csrf-token"]')
          .getAttribute("content"),
        datos: [],
        paginacion: {
          total: 0,
          pagina_actual: 0,
          por_pagina: 0,
          ultima_pagina: 0,
          desde: 0,
          hasta: 0
        },
        offset: 4,
        banderaBoton: true,
        valG: true
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
          return ['kt-spinner', 'kt-spinner--right', 'kt-spinner--sm', 'kt-spinner--light'];
          }
      },      
    },
    methods: {
      consultar: async function(pagina) {
        const parametros = {
          txtbusqueda: this.txtbusqueda.trim(),
          _token: this.csrf,
          page: pagina
        };
        try {
          await veredasServicios.listarVeredas(parametros).then(respuesta => {
            this.veredas = respuesta.data.veredas.data;
            this.dpto_options = respuesta.data.arrayDpto;
            this.muni_options = respuesta.data.arrayMuni;
            this.corregi_options = respuesta.data.arrayCorregi;
            this.paginacion = respuesta.data.paginacion;
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
      abrirModal() {
        this.errores = [];
        this.entrarPorError = false;
        this.datos = [];
        this.veredasData.descripcion = "";
        this.veredasData.dpto = "";
        this.veredasData.muni = "";
        this.veredasData.corregimiento = "0";
        this.veredasData.id = 0;
        this.bandera = false;
        this.banderaBoton = true;
        this.$refs.modalVereda.show();
      },
      cerrarModal() {
        this.$refs.modalVereda.hide();
      },
      cambio() {
        this.bandera = false;
        this.corregimiento = "0";
        for (let key in this.corregi_options[this.veredasData.muni]) {
          this.bandera = true;
        }
      },
      agregar: function() {
        if (this.veredasData.dpto == "") {
          this.$swal(
            "Error...!",
            "Por favor seleccione un departamento!",
            "error"
          );
          return;
        }
        if (this.veredasData.muni == "") {
          this.$swal("Error...!", "Por favor seleccione un municipio!", "error");
          return;
        }
        if (this.veredasData.descripcion == "") {
          this.$swal("Error...!", "Por favor digite una vereda!", "error");
          return;
        }
        this.datos.push({
          dpto: this.veredasData.dpto,
          dptoTexto: this.showText(this.veredasData.dpto, this.dpto_options),
          muni: this.veredasData.muni,
          muniTexto: this.showText(
            this.veredasData.muni,
            this.muni_options[this.veredasData.dpto]
          ),
          corregimiento: this.veredasData.corregimiento,
          corregimientoTexto: this.showText(
            this.veredasData.corregimiento,
            this.corregi_options[this.veredasData.muni]
          ),
          descripcion: this.veredasData.descripcion,
          id: 0
        });
        this.veredasData.descripcion = "";
      },
      eliminarItem: function(index) {
        this.datos.splice(index, 1);
      },
      guardarVereda: async function() {
        if (!this.checkForm()) {
          this.entrarPorError = false;
        } else {
          this.errores = [];
          const parametros = {
            _token: this.csrf,
            veredas: this.datos,
            opcion: "GUARDAR"
          };
          this.valG = false;
          try {
            await veredasServicios
              .guardarVeredas(parametros)
              .then(respuesta => {
                this.consultar(1);
                this.datos = [];
                this.veredasData.descripcion = "";
                this.veredasData.dpto = "";
                this.veredasData.muni = "";
                this.veredasData.corregimiento = "0";
                this.veredasData.id = 0;
                this.bandera = false;
                this.cerrarModal();
                this.$swal(
                  "Guardar...!",
                  "Datos Guardados Exitosamente!",
                  "success"
                );
                this.valG = true;
              })
              .catch(error => {
                this.errorDevuelto = error.response.data.errors;
                this.entrarPorError = true;
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
        }
      },
      editarVereda: async function() {
        if (!this.checkForm2()) {
          this.entrarPorError = false;
        } else {
          this.errores = [];
          const parametros = {
            _token: this.csrf,
            veredas: this.veredasData,
            opcion: "EDITAR"
          };
          this.valG = false;
          try {
            await veredasServicios
              .guardarVeredas(parametros)
              .then(respuesta => {
                this.consultar(1);
                this.datos = [];
                this.veredasData.descripcion = "";
                this.veredasData.dpto = "";
                this.veredasData.muni = "";
                this.veredasData.corregimiento = "0";
                this.veredasData.id = 0;
                this.bandera = false;
                this.cerrarModal();
                this.$swal(
                  "Guardar...!",
                  "Datos Guardados Exitosamente!",
                  "success"
                );
                this.valG = true;
              })
              .catch(error => {
                this.errorDevuelto = error.response.data.errors;
                this.entrarPorError = true;
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
        }
      },
      checkForm(e) {
        this.errores = [];
        if (this.datos.length <= 0) {
          this.errores.push("Agregue por lo menos una vereda");
        }

        if (!this.errores.length) {
          return true;
        } else {
          return false;
        }
        e.preventDefault();
      },
      checkForm2(e) {
        this.errores = [];
        if (this.veredasData.dpto == "") {
          this.errores.push("Por favor seleccione el departamento.");
        }
        if (this.veredasData.muni == "") {
          this.errores.push("Por favor seleccione el municipio");
        }
        if (this.veredasData.barrio == "") {
          this.errores.push("Por favor digite el barrio.");
        }
        if (!this.errores.length) {
          return true;
        } else {
          return false;
        }
        e.preventDefault();
      },
      cambiarPaginas: function(pagina) {
        this.paginacion.pagina_actual = pagina;
        this.consultar(pagina);
      },
      eliminar: async function(usu) {
        var title = "";
        var titulo = "";
        if (usu.ESTADO == "Activo") {
          title = "¿Desea anular la vereda " + usu.VEREDA + "?";
          titulo = "Vereda " + usu.VEREDA + " anulada de manera exitosa";
        } else {
          title = "¿Desea activar la vereda " + usu.VEREDA + "?";
          titulo = "Vereda " + usu.VEREDA + " activada de manera exitosa";
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
              estado: usu.ESTADO
            };

            try {
              veredasServicios
                .eliminarVeredas(parametros)
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
                  this.$swal("Error...!", "Ocurrio un error!", "error");
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
          }
        });
      },
      editar: function(item) {
        // this.barriosData = { ...item };
        this.entrarPorError = false;
        this.errores = [];
        this.veredasData.dpto = item.dpto;
        this.veredasData.muni = item.muni;
        this.veredasData.corregimiento = item.corregimiento;
        this.bandera = false;
        if (this.veredasData.corregimiento != null) {
          this.bandera = true;
        } else {
          this.bandera = false;
        }
        this.veredasData.descripcion = item.VEREDA;
        this.veredasData.id = item.id;
        this.banderaBoton = false;
        this.$refs.modalVereda.show();
      },
      showText: function(val, vectorAux) {
        if (vectorAux !== undefined) {
          for (var i = 0; i < vectorAux.length; i++) {
            if (vectorAux[i].value === val) {
              return vectorAux[i].texto;
            }
          }
        }
        return "";
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