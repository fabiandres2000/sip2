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
                >Listado de jefes de hogar</span
              >
            </h3>
          </div>
          <div class="kt-portlet__head-toolbar">
            <div class="btn-group">
              <a
                href="javascript:void(0);"
                class="btn btn-danger"
                @click="generarPDF()"
              >
                <i class="la la-file-pdf-o"></i>
                <span class="kt-hidden-mobile">Listado PDF</span>
              </a>
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
          <div class="row">
            <div class="col-md-12">
              <div class="table-responsive">
                <table class="table table-sm table-hover">
                  <thead class>
                    <tr class="kt-bg-fill-brand">
                      <th>No.</th>
                      <th>Identificación</th>
                      <th>Departamento</th>
                      <th>Municipio</th>
                      <th>Jefe de hogar</th>
                      <th>Edad</th>
                      <th>Ocupación</th>
                      <th>Tipo</th>
                      <td class="text-center"></td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(item, index) in jefes" :key="index">
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
                        {{ item.identificacion }}
                      </td>
                      <td
                        style="
                          font-weight: normal;
                          vertical-align: middle;
                          text-align: left;
                          text-transform: capitalize;
                        "
                      >
                        {{ item.DPTO }}
                      </td>
                      <td
                        style="
                          font-weight: normal;
                          vertical-align: middle;
                          text-align: left;
                          text-transform: capitalize;
                        "
                      >
                        {{ item.MUNI }}
                      </td>

                      <td
                        style="
                          font-weight: normal;
                          vertical-align: middle;
                          text-align: left;
                          text-transform: capitalize;
                        "
                      >
                        {{ item.pnom }} {{ item.snom }} {{ item.pape }}
                        {{ item.sape }}
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
                        {{ item.textoOcupacion }}
                      </td>

                      <td
                        style="
                          font-weight: normal;
                          vertical-align: middle;
                          text-align: left;
                          text-transform: capitalize;
                        "
                      >
                        {{ item.tipo }}
                      </td>

                      <td
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
                      </td>
                    </tr>
                  </tbody>
                </table>
                <div class="kt-separator kt-separator--border-dashed"></div>

                <div class="kt-section">
                  <div class="kt-pagination kt-pagination--danger">
                    <ul class="kt-pagination__links">
                      <li
                        class="kt-pagination__link--first"
                        v-if="paginacion.pagina_actual > 1"
                      >
                        <a
                          href="javascript:;"
                          @click.prevent="cambiarPaginas(1)"
                        >
                          <i class="fa fa-angle-double-left kt-font-danger"></i>
                        </a>
                      </li>
                      <li
                        class="kt-pagination__link--next"
                        v-if="paginacion.pagina_actual > 1"
                      >
                        <a
                          href="javascript:;"
                          @click.prevent="
                            cambiarPaginas(paginacion.pagina_actual - 1)
                          "
                        >
                          <i class="fa fa-angle-left kt-font-danger"></i>
                        </a>
                      </li>
                      <li
                        :class="[
                          pagina == esActivo
                            ? 'kt-pagination__link--active'
                            : '',
                        ]"
                        v-for="(pagina, index) in numeroDePaginas"
                        :key="index"
                      >
                        <a
                          href="javascript:;"
                          @click.prevent="cambiarPaginas(pagina)"
                          >{{ pagina }}</a
                        >
                      </li>
                      <li
                        class="kt-pagination__link--prev"
                        v-if="
                          paginacion.pagina_actual < paginacion.ultima_pagina
                        "
                      >
                        <a
                          href="javascript:;"
                          @click.prevent="
                            cambiarPaginas(paginacion.pagina_actual + 1)
                          "
                        >
                          <i class="fa fa-angle-right kt-font-danger"></i>
                        </a>
                      </li>
                      <li
                        class="kt-pagination__link--last"
                        v-if="
                          paginacion.pagina_actual < paginacion.ultima_pagina
                        "
                      >
                        <a
                          href="javascript:;"
                          @click.prevent="
                            cambiarPaginas(paginacion.ultima_pagina)
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

    <!--begin::Modal-->
    <b-modal
      ref="modalCorregimiento"
      hide-footer
      title="Detalles de vivienda"
      size="xl"
      centered
      header-bg-variant="danger"
      header-text-variant="light"
      :no-close-on-backdrop="false"
    >
      <div class="d-block">
        <p>
          <span class="kt-font-boldest" style="font-size: 18px">Ubicación</span>
        </p>
        <div class="form-group row">
          <div class="col-lg-3">
            <label style="font-weight: 500">Departamento:</label>
            <div>{{ fila.DPTO }}</div>
          </div>
          <div class="col-lg-3">
            <label style="font-weight: 500">Municipio:</label>
            <div>{{ fila.MUNI }}</div>
          </div>
          <div class="col-lg-3">
            <label style="font-weight: 500">Corregimiento:</label>
            <div>{{ fila.CORREGIMIENTO }}</div>
          </div>
          <div class="col-lg-3">
            <label style="font-weight: 500">Vereda:</label>
            <div>{{ fila.vereda }}</div>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-lg-3">
            <label style="font-weight: 500">Zona:</label>
            <div>
              {{
                fila.id_zona == 0
                  ? "No Aplica"
                  : fila.id_zona == 1
                  ? "Urbano"
                  : fila.id_zona == 2
                  ? "Rural centro poblado"
                  : fila.id_zona == 3
                  ? "Rural disperso"
                  : ""
              }}
            </div>
          </div>
          <div class="col-lg-3">
            <label style="font-weight: 500">Barrio:</label>
            <div>{{ fila.barrio }}</div>
          </div>
          <div class="col-lg-6">
            <label style="font-weight: 500">Direccion:</label>
            <div>{{ fila.DIRECCION }}</div>
          </div>
        </div>

<p>
          <span class="kt-font-boldest" style="font-size: 18px">Integrantes</span>
        </p>
        <div class="row">
          <div class="col-md-12">
            <div class="table-responsive">
              <table class="table table-sm table-hover">
                <thead class>
                  <tr class="kt-bg-fill-brand">
                    <th>No.</th>
                    <th>Tipo Identificación</th>
                    <th>Identificación</th>
                    <th>Nombres</th>
                    <th>Estado civil</th>
                    <th>Edad</th>
                    <th>Ocupación</th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                    v-for="(item, index) in fila.integrantes"
                    :key="index"
                    v-show="item.estado == 'Activo'"
                  >
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
                      <span class="text-capitalize">{{ item.tipo_id }}</span>
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
                        item.identificacion
                      }}</span>
                    </td>
                    <td
                      style="
                        font-weight: normal;
                        vertical-align: middle;
                        text-align: left;
                        text-transform: capitalize;
                      "
                    >
                      <span class="text-capitalize"
                        >{{ item.pnom }} {{ item.snom }} {{ item.pape }}
                        {{ item.sape }}</span
                      >
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
                        item.textoEstado
                      }}</span>
                    </td>
                    <td
                      style="
                        font-weight: normal;
                        vertical-align: middle;
                        text-align: left;
                        text-transform: capitalize;
                      "
                    >
                      <span class="text-capitalize">{{ item.edad }}</span>
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
                        item.textoOcupacion
                      }}</span>
                    </td>
                  </tr>
                </tbody>
              </table>
              <div class="kt-separator kt-separator--border-dashed"></div>
            </div>
          </div>
        </div>
        <p>
          <span class="kt-font-boldest" style="font-size: 18px">Jefes de hogar</span>
        </p>

        <div class="row">
          <div class="col-md-12">
            <div class="table-responsive">
              <table class="table table-sm table-hover">
                <thead class>
                  <tr class="kt-bg-fill-brand">
                    <th>No.</th>
                    <th>Tipo Identificación</th>
                    <th>Identificación</th>
                    <th>Nombres</th>
                    <th>Estado civil</th>
                    <th>Edad</th>
                    <th>Ocupación</th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                    v-for="(item, index) in fila.jefes"
                    :key="index"
                    v-show="item.estado == 'Activo'"
                  >
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
                      <span class="text-capitalize">{{ item.tipo_id }}</span>
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
                        item.identificacion
                      }}</span>
                    </td>
                    <td
                      style="
                        font-weight: normal;
                        vertical-align: middle;
                        text-align: left;
                        text-transform: capitalize;
                      "
                    >
                      <span class="text-capitalize"
                        >{{ item.pnom }} {{ item.snom }} {{ item.pape }}
                        {{ item.sape }}</span
                      >
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
                        item.textoEstado
                      }}</span>
                    </td>
                    <td
                      style="
                        font-weight: normal;
                        vertical-align: middle;
                        text-align: left;
                        text-transform: capitalize;
                      "
                    >
                      <span class="text-capitalize">{{ item.edad }}</span>
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
                        item.textoOcupacion
                      }}</span>
                    </td>
                  </tr>
                </tbody>
              </table>
              <div class="kt-separator kt-separator--border-dashed"></div>
            </div>
          </div>
        </div>
        <p>
          <span class="kt-font-boldest" style="font-size: 18px"
            >Datos del integrante</span
          >
        </p>
        <div class="form-group row">
          <div class="col-lg-3">
            <label style="font-weight: 500">Tipo de Documento:</label>
            <div>{{ fila.tipo_id }}</div>
          </div>
          <div class="col-lg-3">
            <label style="font-weight: 500">Identificación:</label>
            <div>{{ fila.identificacion }}</div>
          </div>
          <div class="col-lg-3">
            <label style="font-weight: 500">Nombres:</label>
            <div>{{ fila.pnom }} {{ fila.snom }} {{ fila.pape }} {{ fila.sape }}</div>
          </div>
          <div class="col-lg-3">
            <label style="font-weight: 500">Edad:</label>
            <div>{{ fila.edad }} </div>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-lg-3">
            <label style="font-weight: 500">Estado civil:</label>
            <div>{{ fila.textoEstado }}</div>
          </div>
          <div class="col-lg-3">
            <label style="font-weight: 500">Parentesco:</label>
            <div>{{ fila.textoParentesco }}</div>
          </div>
          <div class="col-lg-3">
            <label style="font-weight: 500">Escolaridad:</label>
            <div>{{ fila.textoNivel }} </div>
          </div>
          <div class="col-lg-3">
            <label style="font-weight: 500">Etnia:</label>
            <div>{{ fila.textoEtnia }} </div>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-lg-3">
            <label style="font-weight: 500">Clasificación de etnia:</label>
            <div>{{ fila.textoClasificacion }}</div>
          </div>
          <div class="col-lg-6">
            <label style="font-weight: 500">Eps:</label>
            <div>{{ fila.textoEps }}</div>
          </div>
          <div class="col-lg-3">
            <label style="font-weight: 500">Ocupación:</label>
            <div>{{ fila.textoOcupacion }}</div>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-lg-3">
            <label style="font-weight: 500">Salario:</label>
            <div>{{ fila.salario }}</div>
          </div>
        </div>
      </div>
    </b-modal>
    <b-modal
      ref="modalpdf"
      title="Listado de viviendas"
      size="xl"
      centered
      header-bg-variant="danger"
      header-text-variant="light"
      :no-close-on-backdrop="false"
    >
    <template v-slot:modal-header-close>
    <i class="fa fa-close"></i>
  </template>

    <embed  id="divPdf" :src="ruta" type="application/pdf"  width="100%" height="650px" />
    </b-modal>
  </div>
</template>
<script>
import { Store } from 'vuex';
import * as consultas from "../../Servicios/consultas";
import store from '../../store';
export default {
  mounted() {
    this.iniciales(1);
  },
  data() {
    return {
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
      ruta:"",  
      datos: {
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
        ocupacion: "",
        salariominimo: "",
        salariomaximo: "",
      },
      jefes: [],
      paginacion: {
        total: 0,
        pagina_actual: 0,
        por_pagina: 0,
        ultima_pagina: 0,
        desde: 0,
        hasta: 0,
      },
      offset: 4,
      fila: {},
    };
  },
  methods: {
    async iniciales(pagina) {
      this.datos = {
        id_dpto: this.$route.params.id_dpto,
        id_mun: this.$route.params.id_mun,
        id_corre: this.$route.params.id_corre,
        id_vereda: this.$route.params.id_vereda,
        id_zona: this.$route.params.id_zona,
        id_barrio: this.$route.params.id_barrio,
        documento: this.$route.params.documento,
        tipo_id: this.$route.params.tipo_id,
        sexo: this.$route.params.sexo,
        estado_civil: this.$route.params.estado_civil,
        tipo_afiliacion: this.$route.params.tipo_afiliacion,
        afiliacion_entidad: this.$route.params.afiliacion_entidad,
        nivel_escolaridad: this.$route.params.nivel_escolaridad,
        ocupacion: this.$route.params.ocupacion,
        salariominimo: this.$route.params.salariominimo,
        salariomaximo: this.$route.params.salariomaximo,
      };

      const parametros = {
        _token: this.csrf,
        datos: this.datos,
        page: pagina,
      };
      try {
        await consultas.jefe(parametros).then((respuesta) => {
          this.jefes = respuesta.data.jefes.data;
          this.paginacion = respuesta.data.paginacion;
          console.log(this.jefes);
        });
      } catch (e) {}
    },
    Buscar() {},
    cambiarPaginas: function (pagina) {
      this.paginacion.pagina_actual = pagina;
      this.iniciales(pagina);
    },
    async generarPDF() {
      const parametros = {
        _token: this.csrf,
        datos: this.datos,
      };
      try {
        await consultas.jefespdf(parametros).then((respuesta) => {
          this.ruta = store.state.apiURL + respuesta.data.nombre;          
          this.$refs.modalpdf.show();
        });
      } catch (e) {}
    },
    abrirModal() {
      this.$refs.modalCorregimiento.show();
    },
    cerrarModal() {
      this.$refs.modalCorregimiento.hide();
    },
    detalles(item) {
      this.fila = item;
      this.$refs.modalCorregimiento.show();
    },
    consultar() {},
  },
  computed: {
    esActivo: function () {
      return this.paginacion.pagina_actual;
    },
    numeroDePaginas: function () {
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
</style>