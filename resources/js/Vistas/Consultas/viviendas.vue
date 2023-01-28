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
                >CONSULTA DE VIVIENDAS</span
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
              <b-form-select v-model="id_zona" >
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
              >Vivienda</span
            >
          </p>

          <div class="form-group row">
            <div class="col-lg-4">
              <label>Tenencia de Vivienda:</label>
              <b-form-select
                v-model.trim="tenencia_vivienda"
                ref="tenencia_vivienda"
              >
                <option value selected>Seleccione</option>
                <option value="PROPIETARIO">PROPIETARIO(A)</option>
                <option value="ARRENDADO">ARRENDADO(A)</option>
                <option value="FAMILIAR">FAMILIAR</option>
                <option value="CUIDADOR">CUIDADOR(A)</option>
              </b-form-select>
            </div>
            <div class="col-lg-4">
              <label>Tipo de Vivienda:</label>
              <b-form-select v-model.trim="tipo_vivienda">
                <option value selected>Seleccione</option>
                <option value="1">No Aplica</option>
                <option value="2">Casa</option>
                <option value="3">Apartamento</option>
                <option value="4">Finca</option>
                <option value="5">Vivienda Indigena</option>
                <option value="6">Improvisada - Lote</option>
              </b-form-select>
            </div>
            <div class="col-lg-4">
              <label>Materia Predominante Piso:</label>
              <b-form-select v-model.trim="material_predominante">
                <option value selected>Seleccione</option>
                <option value="NA">No Aplica</option>
                <option value="1">Marmol ó Madera Pulida</option>
                <option value="2">Cerámica ó Tablón</option>
                <option value="3">Cemento</option>
                <option value="4">Madera</option>
                <option value="5">Tierra</option>
                <option value="6">Bolsa ó Vinilo</option>
                <option value="6">Otros</option>
              </b-form-select>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-4">
              <label>Población Especial:</label>
              <b-form-select
                v-model.trim="poblacion_especial"
                ref="poblacion_especial"
              >
                <option value selected>Seleccione</option>
                <option value="0">NO APLICA</option>
                <option value="1">DESPLAZADO</option>
                <option value="3">VICTIMA DEL CONFLICTO ARMADO</option>
                <option value="4">MADRE COMUNITARIA</option>
              </b-form-select>
            </div>
            <div class="col-lg-4">
              <label>Promedio de Ingresos Mensuales:</label>
              <b-form-select v-model.trim="promedio_ingresos">
                <option value selected>Seleccione</option>
                <option value="NA">No Aplica</option>
                <option value="1">
                  Menos de un salario minimo legal vigente
                </option>
                <option value="2">Un salario minimo legal vigente</option>
                <option value="3">Entre 1 y 3 salarios mínimos</option>
                <option value="4">Entre 3 y 5 salarios mínimos</option>
                <option value="5">Más de 5 salarios mínimos</option>
              </b-form-select>
            </div>
          </div>
          <p>
            <span class="kt-font-boldest" style="font-size: 18px"
              >Acceso a servicios públicos</span
            >
          </p>
          <div class="form-group row">
                <div class="col-lg-3">
                  <label>Energia Electrica:</label>
                  <b-form-select
                    v-model.trim="energia_electrica"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                </div>
                <div class="col-lg-3">
                  <label>Gas Natural:</label>
                  <b-form-select
                    v-model.trim="gas_natural"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="PI">SI PIPETA DE GAS</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                </div>
                <div class="col-lg-3">
                  <label>Acueducto:</label>
                  <b-form-select
                    v-model.trim="acueducto"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                </div>
                <div class="col-lg-3">
                  <label>Alcantarillado:</label>
                  <b-form-select
                    v-model.trim="alcantarillado"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-lg-3">
                  <label>Aseo:</label>
                  <b-form-select
                    v-model.trim="aseo"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                </div>
                <div class="col-lg-4">
                  <label>El Servicio Sanitario Es:</label>
                  <b-form-select
                    v-model.trim="servicio_sanitario"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="1">De Uso Exclusivo de las Personas de la Familia</option>
                    <option value="2">Compartida con Personas de Otras Familias</option>
                    <option value="3">Sin servicio sanitario</option>
                  </b-form-select>
                </div>
                <div class="col-lg-5">
                  <label>¿Se presenta en tu barrio problemáticas de aguas negras?:</label>
                  <b-form-select
                    v-model.trim="aguas_negras"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="FRECUENTE">FRECUENTE</option>
                    <option value="NUNCA">NUNCA</option>
                    <option value="OCASIONAL">OCASIONAL</option>
                  </b-form-select>
                </div>
              </div>  

              <p>
            <span class="kt-font-boldest" style="font-size: 18px"
              >Otros</span
            >
            </p>
            <div class="form-group row">
                <div class="col-lg-6">
                  <label>¿Cuál es el tipo de combustible utilizado en su casa para cocinar?:</label>
                  <b-form-select
                    v-model.trim="tipo_combustible"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="1">Luz eléctrica</option>
                    <option value="2">Gasolina</option>
                    <option value="3">Leña</option>
                    <option value="4">Carbón</option>
                    <option value="5">Gas natural</option>
                  </b-form-select>
                </div>
              </div>  
          
        </div>
      </div>
    </div>
  </div>
</template>
<script>
"use strict";

import * as consultas from "../../Servicios/consultas";
import * as barriosServicios from "../../Servicios/barrios_servicios";

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
      id_dpto: "",
      id_mun: "",
      id_corre: "",
      id_vereda: "",
      id_zona: "",
      id_barrio: "",
      tenencia_vivienda: "",
      tipo_vivienda: "",
      poblacion_especial: "",
      material_predominante: "",
      promedio_ingresos: "",
      energia_electrica: "",
      gas_natural: "",
      acueducto: "",
      alcantarillado: "",
      aseo: "",
      servicio_sanitario: "",
      aguas_negras: "",
      tipo_combustible: "",
    };
  },
  methods: {
    volver() {},

    buscar() {
      this.$router.push({
        name: "ConsultaVivienda",
        params: {
          id_dpto: this.id_dpto,
          id_mun: this.id_mun,
          id_corre: this.id_corre,
          id_vereda: this.id_vereda,
          id_zona: this.id_zona,
          id_barrio: this.id_barrio,
          tenencia_vivienda: this.tenencia_vivienda,
          tipo_vivienda: this.tipo_vivienda,
          poblacion_especial: this.poblacion_especial,
          material_predominante: this.material_predominante,
          promedio_ingresos: this.promedio_ingresos,
          energia_electrica: this.energia_electrica,
          gas_natural: this.gas_natural,
          acueducto: this.acueducto,
          alcantarillado: this.alcantarillado,
          aseo: this.aseo,
          servicio_sanitario: this.servicio_sanitario,
          aguas_negras: this.aguas_negras,
          tipo_combustible: this.tipo_combustible,
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
          //console.log(respuesta);
          this.dpto_options = respuesta.data.arrayDpto;
          this.muni_options = respuesta.data.arrayMuni;
          this.corregi_options = respuesta.data.arrayCorregi;
          this.vereda_options = respuesta.data.arrayVeredas;
        });
      } catch (e) {}
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