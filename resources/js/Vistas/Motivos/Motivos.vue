<template>
  <div>
    <div class="kt-portlet" style="margin-top: -4%;">
      <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
          <h3 class="kt-portlet__head-title">
            <span class="kt-widget20__number kt-font-danger">GESTIÓN DE MOTIVOS PARA NO PLANIFICAR</span>
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
                      title="Nuevo Motivo Para No Planificar"
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
                  <table class="table table-sm table-hover responsive  no-wrap">
                    <thead class>
                      <tr class="kt-bg-fill-brand">
                        <th>No.</th>
                        <th>Motivo</th>
                        <th>Observación</th>
                        <td class="text-center">Estado</td>
                        <td class="text-center">Opciones</td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(item, index) in motivos" :key="index">
                        <td style="font-weight: normal;vertical-align: middle;">{{ (index+1) }}</td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >{{item.descripcion}}</td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >{{item.observacion}}</td>
                        <td style="font-weight: normal;vertical-align: middle;text-align: center;">
                          <span
                            class="kt-badge kt-badge--inline"
                            :class="item.estado=='Activo'?'kt-badge--success':'kt-badge--danger'"
                          >{{item.estado}}</span>
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
                            :class="(item.estado=='Activo'?'btn-outline-danger':'btn-outline-success')"
                            type="button"
                            :title="(item.estado=='Activo')?'Anular':'Activar'"
                            @click="eliminar(item)"
                          >
                            <i class="fa" :class="(item.estado=='Activo')?'fa-trash':'fa-check'"></i>
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
        ref="modalMotivo"
        hide-footer
        title="Gestion de Motivos Para no Planificar"
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
              <div class="col-lg-6">
                <label>Motivo Para No Planificar:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Descripción"
                  v-model="motivosData.descripcion"
                  :class="motivosClases"
                />
                <div class="invalid-feedback" v-if="motivosError">{{ motivosError }}</div>
              </div>
              <div class="col-lg-6">
                <label>Observación:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Observación"
                  v-model="motivosData.observacion"
                />
              </div>
            </div>
            <hr />
            <div class="text-right">
              <button type="button" class="btn btn-success"
               @click="guardar"
                :disabled="!valG"
                :class="spinG"               
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
  import * as motivosServicios from "../../Servicios/motivos_servicios";
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
        motivos: [],
        motivosData: {
          descripcion: "",
          observacion: "",
          id: 0
        },
        csrf: document
          .querySelector('meta[name="csrf-token"]')
          .getAttribute("content"),
        paginacion: {
          total: 0,
          pagina_actual: 0,
          por_pagina: 0,
          ultima_pagina: 0,
          desde: 0,
          hasta: 0
        },
        offset: 4,
        valG: true
      };
    },
    computed: {
      // CLASES Y ERRORES DE CAMPO IDENTIFICACION
      motivosError() {
        var valor = this.motivosData.descripcion.trim();
        if (valor == "") {
          return "El campo es obligatorio";
        }
      },
      motivosClases() {
        return [
          {
            "is-invalid": this.motivosError,
            "is-valid": !this.motivosError
          }
        ];
      },
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
          await motivosServicios.listar(parametros).then(respuesta => {
            this.motivos = respuesta.data.motivos.data;
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
        this.motivosData.descripcion = "";
        this.motivosData.observacion = "";
        this.motivosData.id = 0;
        this.errores = [];
        this.entrarPorError = false;        
        this.$refs.modalMotivo.show();
      },
      cerrarModal() {
        this.$refs.modalMotivo.hide();
      },
      guardar: async function() {
        if (!this.checkForm()) {
          this.entrarPorError = false;
        } else {
          this.errores = [];
          const parametros = {
            _token: this.csrf,
            descripcion: this.motivosData.descripcion,
            observacion: this.motivosData.observacion,
            id: this.motivosData.id
          };
          this.valG = false;
          try {
            await motivosServicios
              .guardar(parametros)
              .then(respuesta => {
                this.consultar(1);
                this.motivosData.descripcion = "";
                this.motivosData.observacion = "";
                this.motivosData.id = 0;
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
        if (!this.motivosData.descripcion) {
          this.errores.push("La descripción es obligatoria.");
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
        if (usu.estado == "Activo") {
          title = "¿Desea anular el motivo para no planificar " + usu.descripcion + "?";
          titulo = "Motivo para no planificar " + usu.descripcion + " anulado de manera exitosa";
        } else {
          title = "¿Desea activar el motivo para no planificar " + usu.descripcion + "?";
          titulo =
            "Motivo para no planificar " + usu.descripcion + " activado de manera exitosa";
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
              motivosServicios
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
      editar: async function(item) {
        this.motivosData.descripcion = item.descripcion;
        this.motivosData.observacion = item.observacion;
        this.motivosData.id = item.id;
        this.$refs.modalMotivo.show();
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