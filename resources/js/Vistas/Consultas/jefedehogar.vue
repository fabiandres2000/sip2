<template>
  <div class="row">
    <div class="col-12">
      <div
        class="kt-portlet kt-portlet--height-fluid kt-portlet--mobile"
        style="margin-top: -4%; height: auto;"
      >
        <div
          class="
            kt-portlet__head
            kt-portlet__head--lg
            kt-portlet__head--noborder
            kt-portlet__head--break-sm
          "
        >
          <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
              <span class="kt-widget20__number kt-font-danger"
                >CONSULTA DE JEFES DE HOGAR</span
              >
            </h3>
          </div>
          <div class="kt-portlet__head-toolbar">
            <div class="btn-group">
              <button
                type="button"
                class="btn btn-brand"
                @click.prevent="buscar"
              >
                <i class="la la-search"></i>
                <span class="kt-hidden-mobile">Buscar</span>
              </button>
            </div>
            <!-- <div class="btn-group">
              <button type="button" class="btn btn-brand" @click.prevent="Guardar">
                <i class="la la-check"></i>
                <span class="kt-hidden-mobile">Guardar</span>
              </button>
            </div> -->
          </div>
        </div>
        <div class="kt-portlet__body">
          <p>
            <span class="kt-font-boldest" style="font-size: 18px"
              >Ubicación</span
            >
          </p>
          <div class="form-group row">
            <div class="col-lg-4">
              <label>Departamento:</label>
              <b-form-select
                v-model.trim="id_dpto"
                @change="cambiarCombo('dpto')"
                ref="id_dpto"
              >
                <option value selected>Seleccione</option>
                <option
                  v-for="item in dpto_options"
                  :value="item.value"
                  :key="item.value"
                >
                  {{ item.texto }}
                </option>
              </b-form-select>
            </div>
            <div class="col-lg-4">
              <label>Municipio:</label>
              <b-form-select
                v-model.trim="id_mun"
                @change="cambiarCombo('muni')"
                ref="id_mun"
              >
                <option value selected>Seleccione</option>
                <option
                  v-for="item in muni_options[id_dpto]"
                  :value="item.value"
                  :key="item.value"
                >
                  {{ item.texto }}
                </option>
              </b-form-select>
            </div>
            <div class="col-lg-4">
              <label>Corregimiento:</label>
              <b-form-select
                v-model="id_corre"
                @change="cambiarCombo('corregi')"
              >
                <option value selected>Seleccione</option>
                <option value="0">No Aplica</option>
                <option
                  v-for="item in corregi_options[id_mun]"
                  :value="item.value"
                  :key="item.value"
                >
                  {{ item.texto }}
                </option>
              </b-form-select>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-4">
              <label>Vereda:</label>
              <b-form-select
                v-model="id_vereda"
                @change="cambiarCombo('vereda')"
              >
                <option value selected>Seleccione</option>
                <option value="0">No Aplica</option>
                <option
                  v-for="item in vereda_options[id_corre]"
                  :value="item.value"
                  :key="item.value"
                >
                  {{ item.texto }}
                </option>
              </b-form-select>
            </div>
            <div class="col-lg-4">
              <label>Barrio:</label>
              <b-form-select v-model="id_barrio">
                <option value selected>Seleccione</option>
                <option value="0">No Aplica</option>
                <option
                  v-for="item in barrio_options"
                  :value="item.value"
                  :key="item.value"
                >
                  {{ item.texto }}
                </option>
              </b-form-select>
            </div>
            <div class="col-lg-4">
              <label>Zona:</label>
              <b-form-select v-model="id_zona">
                <option value selected>Seleccione</option>
                <option value="0">No Aplica</option>
                <option value="1">Urbano</option>
                <option value="2">Rural centro poblado</option>
                <option value="3">Rural disperso</option>
              </b-form-select>
            </div>
          </div>
          <p>
            <span class="kt-font-boldest" style="font-size: 18px"
              >Datos del jefe de hogar</span
            >
          </p>
          <div class="form-group row">
            <div class="col-lg-4">
              <label>Tipo de Documento (*):</label>
              <b-form-select
                v-model.trim="tipo_id"
                @change="formato('tipoid')"
                ref="tipo_id"
              >
                <option value selected>Seleccione</option>
                <option value="CC">CEDULA DE CIUDADANIA</option>
                <option value="PA">PASAPORTE</option>
                <option value="RC">REGISTRO CIVIL</option>
                <option value="TI">TARJETA DE IDENTIDAD</option>
                <option value="ASI">ADULTO SIN IDENTIFICACIÓN</option>
                <option value="MSI">MENOR SIN IDENTIFICACIÓN</option>
                <option value="CE">CEDULA DE EXTRANJERIA</option>
              </b-form-select>
            </div>
            <div class="col-lg-4">
              <label>Documento (*):</label>
              <input
                type="text"
                ref="identificacionJefe"
                class="form-control text-capitalize"
                placeholder="Documento"
                @change="formato('id1')"
                v-model.trim="documento"
              />
            </div>
            <div class="col-lg-4">
              <label>Sexo (*):</label>
              <b-form-select v-model.trim="sexo" ref="sexo">
                <option value selected>Seleccione</option>
                <option value="MASCULINO">MASCULINO</option>
                <option value="FEMENINO">FEMENINO</option>
              </b-form-select>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-3">
              <label>Estado Civil (*):</label>
              <b-form-select v-model="estado_civil" ref="estado_civil">
                <option value selected>Seleccione</option>
                <option
                  v-for="item in estado_options"
                  :value="item.value"
                  :key="item.value"
                >
                  {{ item.texto }}
                </option>
              </b-form-select>
            </div>
            <div class="col-lg-6">
              <label>Eps (*):</label>
              <b-form-select
                v-model.trim="afiliacion_entidad"
                :class="afiliacion_entidad == '' ? '' : 'is-valid'"
                ref="afiliacion_entidad"
                @change="mostrarOtro('OEPS1')"
              >
                <option value selected>Seleccione</option>
                <option value="NINGUNA">NINGUNA</option>
                <option value="OTRA">OTRA</option>
                <option
                  v-for="item in admini_options"
                  :value="item.value"
                  :key="item.value"
                >
                  {{ item.texto }}
                </option>
              </b-form-select>
            </div>
            <div class="col-lg-3">
              <label>Tipo Afiliación:</label>
              <b-form-select
                v-model="tipo_afiliacion"
                :class="tipo_afiliacion == '' ? '' : 'is-valid'"
              >
                <option value selected>Seleccione</option>
                <option value="NA">No Aplica</option>
                <option value="SUBSIDIADO">SUBSIDIADO</option>
                <option value="CONTRIBUTIVO">CONTRIBUTIVO</option>
                <option value="ESPECIAL">ESPECIAL</option>
                <option value="PPNA">POBLACIÓN POBRE NO ASEGURADA</option>
                <option value="BENEFICIARIO">BENEFICIARIO</option>
                <option value="ND">NO DECLARA</option>
              </b-form-select>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-3">
              <label>Nivel Educativo:</label>
              <b-form-select v-model="nivel_escolaridad">
                <option value selected>Seleccione</option>
                <option
                  v-for="item in escolaridad_options"
                  :value="item.value"
                  :key="item.value"
                >
                  {{ item.texto }}
                </option>
              </b-form-select>
            </div>
            <div class="col-lg-9">
              <label>Ocupación (*):</label>
              <input
                type="text"
                class="form-control text-capitalize"
                placeholder="Ocupaciones"
                v-model="ocupacionAuxiliar"
                ref="ocupacion"
                @click="abrirModalOcupaciones('jefe')"
                :readonly="true"
              />
            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-3">
                  <label>Salario minimo:</label>
                  <input
                    type="text"
                    class="form-control text-capitalize"
                    placeholder="Salario"
                    v-model.trim="salariominimo"
                    ref="salario"
                    @change="formato('salario1')"
                  />
                </div>
            <div class="col-lg-3">
                  <label>Salario maximo:</label>
                  <input
                    type="text"
                    class="form-control text-capitalize"
                    placeholder="Salario"
                    v-model.trim="salariomaximo"
                    ref="salario"
                    @change="formato('salario2')"
                  />
                </div>    
          </div>  
        </div>
      </div>
    </div>
    <!--begin::Modal-->
    <b-modal
      ref="modalOcupaciones"
      hide-footer
      title="Ocupaciones"
      size="xl"
      centered
      header-bg-variant="danger"
      header-text-variant="light"
      :no-close-on-backdrop="true"
    >
      <div class="d-block">
        <form>
          <div class="row">
            <div class="col-md-6 col-lg-6"></div>
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
                        @click="consultarOcupaciones(1)"
                      >
                        <i class="fa fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-12">
              <div class="table-responsive" style="height: 350px">
                <table class="table table-sm table-hover">
                  <thead class>
                    <tr class="kt-bg-fill-brand">
                      <th>No.</th>
                      <th>Ocupación</th>
                      <td class="text-center">Opciones</td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(item, index) in ocupacionesVector" :key="index">
                      <td style="font-weight: normal; vertical-align: middle">
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
                        <span class="text-capitalize">{{
                          item.descripcion
                        }}</span>
                      </td>
                      <td
                        style="
                          text-align: center;
                          vertical-align: middle;
                          text-align: center;
                        "
                      >
                        <button
                          class="btn btn-icon btn-sm btn-outline-success"
                          type="button"
                          title="Seleccionar"
                          @click="seleccionarOcupaciones(item)"
                        >
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="24px"
                            height="24px"
                            viewBox="0 0 24 24"
                            version="1.1"
                            class="kt-svg-icon"
                          >
                            <g
                              stroke="none"
                              stroke-width="1"
                              fill="none"
                              fill-rule="evenodd"
                            >
                              <polygon
                                id="Shape"
                                points="0 0 24 0 24 24 0 24"
                              />
                              <path
                                d="M6.26193932,17.6476484 C5.90425297,18.0684559 5.27315905,18.1196257 4.85235158,17.7619393 C4.43154411,17.404253 4.38037434,16.773159 4.73806068,16.3523516 L13.2380607,6.35235158 C13.6013618,5.92493855 14.2451015,5.87991302 14.6643638,6.25259068 L19.1643638,10.2525907 C19.5771466,10.6195087 19.6143273,11.2515811 19.2474093,11.6643638 C18.8804913,12.0771466 18.2484189,12.1143273 17.8356362,11.7474093 L14.0997854,8.42665306 L6.26193932,17.6476484 Z"
                                id="Path-94"
                                fill="#000000"
                                fill-rule="nonzero"
                                transform="translate(11.999995, 12.000002) rotate(-180.000000) translate(-11.999995, -12.000002) "
                              />
                            </g>
                          </svg>
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="text-right">
            <button type="button" class="btn btn-warning" @click="cerrarModal">
              <i class="fa fa-window-close"></i> Cerrar
            </button>
          </div>
        </form>
      </div>
    </b-modal>
    <!--end::Modal-->
    <br>
    <br>
  </div>
</template>
<script>
"use strict";

import * as consultas from "../../Servicios/consultas";
import * as barriosServicios from "../../Servicios/barrios_servicios";
import * as ocupacionesServicios from "../../Servicios/ocupaciones_servicios";

export default {
  mounted() {
    this.iniciales();
  },
  data() {
    return {
      hoy: "",
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
      paises_options: [],
      dpto_options: [],
      muni_options: {},
      corregi_options: {},
      barrio_options: {},
      vereda_options: {},
      estado_options: [],
      admini_options: [],
      escolaridad_options: [],
      id_dpto: "",
      id_mun: "",
      id_corre: "",
      id_vereda: "",
      id_zona: "",
      id_barrio: "",
      documento: "",
      tipo_id: "",
      sexo: "",
      estado_civil: "",
      tipo_afiliacion: "",
      afiliacion_entidad: "",
      nivel_escolaridad: "",
      ocupacionAuxiliar: "",
      txtbusqueda: "",
      ocupacionesVector: "",
      paginacionVector: "",
      opcionOcupaciones: "",
      ocupacion: "",
      ocupacionAuxiliar2: "",
      salariominimo: "",
      salariomaximo: "",
    };
  },
  methods: {
    volver() {},

    buscar() {
      this.$router.push({
        name: "ConsultaJefeHogar",
        params: {
          id_dpto: this.id_dpto,
          id_mun: this.id_mun,
          id_corre: this.id_corre,
          id_vereda: this.id_vereda,
          id_zona: this.id_zona,
          id_barrio: this.id_barrio,
          documento: this.documento,
          tipo_id: this.tipo_id,
          sexo: this.sexo,
          estado_civil: this.estado_civil,
          tipo_afiliacion: this.tipo_afiliacion,
          afiliacion_entidad: this.afiliacion_entidad,
          nivel_escolaridad: this.nivel_escolaridad,
          ocupacion: this.ocupacion,
          salariominimo: this.salariominimo,
          salariomaximo: this.salariomaximo,
        },
      });

      //recibir this.$router.params.acueductos
    },
    async iniciales() {
      const parametros = {
        _token: this.csrf,
      };
      try {
        await consultas.iniciales(parametros).then((respuesta) => {
          this.dpto_options = respuesta.data.arrayDpto;
          this.muni_options = respuesta.data.arrayMuni;
          this.corregi_options = respuesta.data.arrayCorregi;
          this.vereda_options = respuesta.data.arrayVeredas;
          this.estado_options = respuesta.data.arrayEstados;
          this.admini_options = respuesta.data.arrayAdmini;
          this.escolaridad_options = respuesta.data.arrayEscolaridad;
        });
      } catch (e) {
        console.log(e);
      }
    },
    cambiarCombo: async function (caja) {
      if (caja === "dpto") {
        this.id_mun = "";
        this.id_corre = "";
        this.id_vereda = "";
        this.id_barrio = "";
      }
      if (caja === "muni") {
        this.id_corre = "";
        this.id_vereda = "";
        this.id_barrio = "";
        const parametros = {
          _token: this.csrf,
          id: this.id_mun,
          opcion: "MUN",
        };
        try {
          await barriosServicios.comboBarrios(parametros).then((respuesta) => {
            this.barrio_options = respuesta.data.arrayBarrios;
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
      if (caja === "corregi") {
        this.id_vereda = "";
        this.id_barrio = "";

        if (this.id_corre !== "0" && this.id_corre !== "") {
          const parametros = {
            _token: this.csrf,
            id: this.id_corre,
            opcion: "CORRE",
          };
          try {
            await barriosServicios
              .comboBarrios(parametros)
              .then((respuesta) => {
                this.barrio_options = respuesta.data.arrayBarrios;
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
        } else {
          if (this.id_corre === "0") {
            this.cambiarCombo("muni");
            this.id_corre = "0";
          } else {
            this.cambiarCombo("muni");
          }
        }
      }
    },
    formato(caja) {
      if (caja == "id1") {
        if (this.tipo_id == "CC") {
          this.documento = this.documento.replace(/[.*+\-?^${}()|[\]\\]/g, "");
          let val = (this.documento / 1).toFixed(0).replace(".", ",");
          this.documento = val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
          if (this.documento == "NaN") {
            this.documento = "";
          }
          if (this.documento == "0") {
            this.documento = "";
          }
        }
      }

      if (caja == "salario1") {
          this.salariominimo = this.salariominimo.replace(/[.*+\-?^${}()|[\]\\]/g, "");
          let val = (this.salariominimo / 1).toFixed(0).replace(".", ",");
          this.salariominimo = val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
          if (this.salariominimo == "NaN") {
            this.salariominimo = "";
          }
          if (this.salariominimo == "0") {
            this.salariominimo = "";
          }
        
      }

      if (caja == "salario2") {
          this.salariomaximo = this.salariomaximo.replace(/[.*+\-?^${}()|[\]\\]/g, "");
          let val = (this.salariomaximo / 1).toFixed(0).replace(".", ",");
          this.salariomaximo = val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
          if (this.salariomaximo == "NaN") {
            this.salariomaximo = "";
          }
          if (this.salariomaximo == "0") {
            this.salariomaximo = "";
          }
        
      }
    },
    abrirModalOcupaciones(opcion) {
      this.opcionOcupaciones = opcion;
      this.txtbusqueda = "";
      this.consultarOcupaciones(1);
      this.$refs.modalOcupaciones.show();
    },
    cerrarModal() {
      this.$refs.modalOcupaciones.hide();
    },
    async consultarOcupaciones(pagina) {
      const parametros = {
        txtbusqueda: this.txtbusqueda.trim(),
        _token: this.csrf,
        page: pagina,
      };
      try {
        await ocupacionesServicios
          .listarOcupaciones(parametros)
          .then((respuesta) => {
            this.ocupacionesVector = respuesta.data.ocupaciones.data;
            this.paginacionVector = respuesta.data.paginacion;
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
    seleccionarOcupaciones(item) {
      if (this.opcionOcupaciones === "jefe") {
        this.ocupacion = item.id;
        this.ocupacionAuxiliar = item.descripcion;
      } else {
        this.CA1.ocupacion = item.id;
        this.ocupacionAuxiliar2 = item.descripcion;
      }
      this.$refs.modalOcupaciones.hide();
    },
  },
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
.color-datepicker {
  background: #f2f2f2;
  border: 1px solid #ddd;
  padding: 0em 1em 1em;
  margin-bottom: 2em;
}
.modal-sm {
  max-width: 60%;
}
</style>