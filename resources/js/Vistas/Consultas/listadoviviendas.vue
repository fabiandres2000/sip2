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
                >Listado de viviendas</span
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
                      <th>Id</th>
                      <th>Departamento</th>
                      <th>Municipio</th>
                      <th>Corregimiento</th>
                      <th>Vereda</th>
                      <th>Jefe de hogar</th>
                      <td class="text-center">Opciones</td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(item, index) in viviendas" :key="index">
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
                        {{ item.id }}
                      </td>
                      <td
                        style="
                          font-weight: normal;
                          vertical-align: middle;
                          text-align: left;
                          text-transform: capitalize;
                        "
                      >
                        {{ item.dpto }}
                      </td>
                      <td
                        style="
                          font-weight: normal;
                          vertical-align: middle;
                          text-align: left;
                          text-transform: capitalize;
                        "
                      >
                        {{ item.muni }}
                      </td>
                      <td
                        style="
                          font-weight: normal;
                          vertical-align: middle;
                          text-align: left;
                          text-transform: capitalize;
                        "
                      >
                        {{ item.corre }}
                      </td>
                      <td
                        style="
                          font-weight: normal;
                          vertical-align: middle;
                          text-align: left;
                          text-transform: capitalize;
                        "
                      >
                        {{ item.vereda }}
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
          <span class="kt-font-boldest" style="font-size: 18px"
            >Jefes de hogar</span
          >
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
                        <tr v-for="(item,index) in fila.jefes" :key="index" v-show="item.estado=='Activo'">
                          <td style="font-weight: normal;vertical-align: middle;">{{ (index+1) }}</td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <span class="text-capitalize">{{item.tipo_id}}</span>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <span class="text-capitalize">{{item.identificacion}}</span>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <span class="text-capitalize">{{item.pnom}} {{item.snom}} {{item.pape}} {{item.sape}}</span>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <span class="text-capitalize">{{item.textoEstado}}</span>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <span class="text-capitalize">{{item.edad}}</span>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <span class="text-capitalize">{{item.textoOcupacion}}</span>
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
            >Integrantes</span
          >
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
                        <tr v-for="(item,index) in fila.integrantes" :key="index" v-show="item.estado=='Activo'">
                          <td style="font-weight: normal;vertical-align: middle;">{{ (index+1) }}</td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <span class="text-capitalize">{{item.tipo_id}}</span>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <span class="text-capitalize">{{item.identificacion}}</span>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <span class="text-capitalize">{{item.pnom}} {{item.snom}} {{item.pape}} {{item.sape}}</span>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <span class="text-capitalize">{{item.textoEstado}}</span>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <span class="text-capitalize">{{item.edad}}</span>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <span class="text-capitalize">{{item.textoOcupacion}}</span>
                          </td>
                          
                        </tr>
                      </tbody>
                    </table>
                    <div class="kt-separator kt-separator--border-dashed"></div>
                  </div>
                </div>
              </div>

        <p>
          <span class="kt-font-boldest" style="font-size: 18px">Ubicación</span>
        </p>
        <div class="form-group row">
          <div class="col-lg-3">
            <label style="font-weight: 500">Departamento:</label>
            <div>{{ fila.dpto }}</div>
          </div>
          <div class="col-lg-3">
            <label style="font-weight: 500">Municipio:</label>
            <div>{{ fila.muni }}</div>
          </div>
          <div class="col-lg-3">
            <label style="font-weight: 500">Corregimiento:</label>
            <div>{{ fila.corre }}</div>
          </div>
          <div class="col-lg-3">
            <label style="font-weight: 500">Vereda:</label>
            <div>{{ fila.vereda }}</div>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-lg-3">
            <label style="font-weight: 500">Barrio:</label>
            <div>{{ fila.barrio }}</div>
          </div>
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
            <label style="font-weight: 500">Tenencia de vivienda:</label>
            <div>{{ fila.tenencia_vivienda }}</div>
          </div>
          <div class="col-lg-3">
            <label style="font-weight: 500">Número de hogares:</label>
            <div>{{ fila.numero_hogares }}</div>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-lg-3">
            <label style="font-weight: 500">Población Especial:</label>
            <div>
              {{
                fila.poblacion_especial == 0
                  ? "NO APLICA"
                  : fila.poblacion_especial == 1
                  ? "DESPLAZADO"
                  : fila.poblacion_especial == 3
                  ? "VICTIMA DEL CONFLICTO ARMADO"
                  : fila.poblacion_especial == 4
                  ? "MADRE COMUNITARIA"
                  : ""
              }}
            </div>
          </div>
          <div class="col-lg-4">
            <label style="font-weight: 500"
              >¿La comunidad presenta vías de acceso?:</label
            >
            <div>
              {{
                fila.vias_acceso == 0
                  ? "No Aplica"
                  : fila.vias_acceso == 1
                  ? "Pavimentadas"
                  : fila.vias_acceso == 2
                  ? "Placa huella"
                  : fila.vias_acceso == 3
                  ? "Sin pavimentar"
                  : ""
              }}
            </div>
          </div>
          <div class="col-lg-4">
            <label style="font-weight: 500"
              >¿Presenta acceso fácil a los servicios públicos? :</label
            >
            <div>
              {{
                fila.servicios_publicos == 1
                  ? "Permanente"
                  : fila.servicios_publicos == 2
                  ? "Ocasional"
                  : fila.servicios_publicos == 3
                  ? "Periódico"
                  : fila.servicios_publicos == 4
                  ? "No hay acceso a servicios públicos"
                  : ""
              }}
            </div>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-lg-12">
            <label style="font-weight: 500">Dirección:</label>
            <div>{{ fila.direccion }}</div>
          </div>
        </div>

        <p>
          <span class="kt-font-boldest" style="font-size: 18px">Vivienda</span>
        </p>

        <div class="form-group row">
          <div class="col-lg-3">
            <label style="font-weight: 500">Tipo de Vivienda:</label>
            <div>
              {{
                fila.tipo_vivienda == 1
                  ? "No Aplica"
                  : fila.tipo_vivienda == 2
                  ? "Casa"
                  : fila.tipo_vivienda == 3
                  ? "Apartamento"
                  : fila.tipo_vivienda == 4
                  ? "Finca"
                  : ""
              }}
            </div>
          </div>

          <div class="col-lg-3">
            <label style="font-weight: 500">Tipo de Estructura:</label>
            <div>
              {{
                fila.tipo_estructura == 1
                  ? "No Aplica"
                  : fila.tipo_estructura == 2
                  ? "Concreto"
                  : fila.tipo_estructura == 3
                  ? "Ladrillo ó Bloque"
                  : fila.tipo_estructura == 4
                  ? "Madera"
                  : "Otro"
              }}
            </div>
          </div>

          <div class="col-lg-6" v-if="fila.tipo_estructura == 5">
            <label style="font-weight: 500">Otro Tipo de Estructura:</label>
            <div>{{ fila.otro_tipo_estructura }}</div>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-lg-3">
            <label style="font-weight: 500"># de Habitaciones:</label>
            <div>{{ fila.numero_cuartos }}</div>
          </div>

          <div class="col-lg-3">
            <label style="font-weight: 500">Materia Predominante Piso:</label>
            <div>
              {{
                fila.material_predominante == "NA"
                  ? "No Aplica"
                  : fila.material_predominante == 1
                  ? "Marmol ó Madera Pulida"
                  : fila.material_predominante == 2
                  ? "Cerámica ó Tablón"
                  : fila.material_predominante == 3
                  ? "Cemento"
                  : fila.material_predominante == 4
                  ? "Madera"
                  : fila.material_predominante == 5
                  ? "Tierra"
                  : fila.material_predominante == 6
                  ? "Bolsa ó Vinilo"
                  : "Otro"
              }}
            </div>
          </div>

          <div class="col-lg-3">
            <label style="font-weight: 500">Tipo de Cubierta:</label>
            <div>
              {{
                fila.tipo_cubierta == 1
                  ? "No Aplica"
                  : fila.tipo_cubierta == 2
                  ? "Material de Desecho Plastico - Lona"
                  : fila.tipo_cubierta == 3
                  ? "Zinc"
                  : fila.tipo_cubierta == 4
                  ? "Eternit"
                  : fila.tipo_cubierta == 5
                  ? "Entre Piso"
                  : fila.tipo_cubierta == 6
                  ? "Teja de Barro"
                  : fila.tipo_cubierta == 7
                  ? "Placa Definitiva"
                  : fila.tipo_cubierta == 8
                  ? "Paja ó Palma"
                  : "Otro"
              }}
            </div>
          </div>
          <div class="col-lg-3" v-if="fila.tipo_cubierta == 9">
            <label style="font-weight: 500">Otro Tipo de Cubierta:</label>
            <div>{{ fila.otro_tipo_cubierta }}</div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="table-responsive">
              <table class="table table-sm table-hover">
                <thead>
                  <tr class="kt-bg-fill-brand">
                    <th>No.</th>
                    <th>Actividad</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(item, index) in fila.actividad" :key="index">
                    <td style="font-weight: normal; vertical-align: middle">
                      {{ index }}
                    </td>
                    <td
                      style="
                        font-weight: normal;
                        vertical-align: middle;
                        text-align: left;
                        text-transform: capitalize;
                      "
                    >
                      <span class="text-capitalize">{{ item.actividad }}</span>
                    </td>
                  </tr>
                  <tr v-if="fila.actividad == null">
                    <td
                      colspan="2"
                      style="font-weight: normal; vertical-align: middle"
                    >
                      No hay registros
                    </td>
                  </tr>
                </tbody>
              </table>
              <div class="kt-separator kt-separator--border-dashed"></div>
            </div>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-lg-3">
            <label style="font-weight: 500"
              >Evento que Puede Afectar la Vivienda:</label
            >
            <div>
              {{
                fila.evento_afecta_vivienda == 1
                  ? "No Aplica"
                  : fila.evento_afecta_vivienda == 2
                  ? "Inundación"
                  : fila.evento_afecta_vivienda == 3
                  ? "Arroyo"
                  : fila.evento_afecta_vivienda == 4
                  ? "Oleaje Fuerte"
                  : "Deslizamiento"
              }}
            </div>
          </div>

          <div class="col-lg-3">
            <label style="font-weight: 500"
              >Pertenece a Familias en Acción:</label
            >
            <div>
              {{
                fila.familias_accion == "NA"
                  ? "No Aplica"
                  : fila.familias_accion
              }}
            </div>
          </div>

          <div class="col-lg-4">
            <label style="font-weight: 500"
              >Promedio de Ingresos Mensuales:</label
            >
            <div>
              {{
                fila.promedio_ingresos == "NA"
                  ? "No Aplica"
                  : fila.promedio_ingresos == 1
                  ? "Menos de un salario minimo legal vigente"
                  : fila.promedio_ingresos == 2
                  ? "Un salario minimo legal vigente"
                  : fila.promedio_ingresos == 3
                  ? "Entre 1 y 3 salarios mínimos"
                  : fila.promedio_ingresos == 4
                  ? "Entre 3 y 5 salarios mínimos"
                  : "Más de 5 salarios mínimos"
              }}
            </div>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-lg-3">
            <label style="font-weight: 500">Fuente de Agua para Consumo:</label>
            <div>
              {{
                fila.fuente_agua == "NA"
                  ? "No Aplica"
                  : fila.fuente_agua == 1
                  ? "Acueducto"
                  : fila.fuente_agua == 3
                  ? "Pozo con bomba"
                  : fila.fuente_agua == 4
                  ? "Laguna o jaguey"
                  : fila.fuente_agua == 5
                  ? "Rio quebrada ó manantial"
                  : fila.fuente_agua == 6
                  ? "Aguas lluvias"
                  : fila.fuente_agua == 7
                  ? "Carro tanque"
                  : fila.fuente_agua == 8
                  ? "Agua tratada envasada"
                  : fila.fuente_agua == 9
                  ? "Otro"
                  : ""
              }}
            </div>
          </div>

          <div class="col-lg-5" v-if="fila.tipo_estructura == 9">
            <label style="font-weight: 500">Otra fuente de agua:</label>
            <div>{{ fila.cual_fuente }}</div>
          </div>
        </div>

        <p>
          <span class="kt-font-boldest" style="font-size: 18px"
            >Acceso a servicios públicos</span
          >
        </p>

        <div class="form-group row">
          <div class="col-lg-3">
            <label style="font-weight: 500">Energia Electrica:</label>
            <div>
              {{
                fila.energia_electrica == "NA"
                  ? "No Aplica"
                  : fila.energia_electrica
              }}
            </div>
          </div>

          <div class="col-lg-3">
            <label style="font-weight: 500">Gas Natural:</label>
            <div>
              {{ fila.gas_natural == "NA" ? "No Aplica" : fila.gas_natural }}
            </div>
          </div>

          <div class="col-lg-3">
            <label style="font-weight: 500">Acueducto:</label>
            <div>
              {{ fila.acueducto == "NA" ? "No Aplica" : fila.acueducto }}
            </div>
          </div>

          <div class="col-lg-3">
            <label style="font-weight: 500">Alcantarillado:</label>
            <div>
              {{
                fila.alcantarillado == "NA" ? "No Aplica" : fila.alcantarillado
              }}
            </div>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-lg-3">
            <label style="font-weight: 500">Telefono Fijo:</label>
            <div>
              {{
                fila.telefono_fijo == "NA" ? "No Aplica" : fila.telefono_fijo
              }}
            </div>
          </div>

          <div class="col-lg-3">
            <label style="font-weight: 500">Aseo:</label>
            <div>
              {{ fila.aseo == "NA" ? "No Aplica" : fila.aseo }}
            </div>
          </div>

          <div class="col-lg-3">
            <label style="font-weight: 500">Internet Subsidiado:</label>
            <div>
              {{
                fila.internet_subsidiado == "NA"
                  ? "No Aplica"
                  : fila.internet_subsidiado
              }}
            </div>
          </div>

          <div class="col-lg-3">
            <label style="font-weight: 500">Internet Privado:</label>
            <div>
              {{
                fila.internet_privado == "NA"
                  ? "No Aplica"
                  : fila.internet_privado
              }}
            </div>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-lg-3">
            <label style="font-weight: 500">Donde se Almacena el Agua:</label>
            <div>
              {{
                fila.donde_almacena_agua == "NA"
                  ? "No Aplica"
                  : fila.donde_almacena_agua == 1
                  ? "No almacenan"
                  : fila.donde_almacena_agua == 2
                  ? "Tanque"
                  : fila.donde_almacena_agua == 3
                  ? "Alberca"
                  : fila.donde_almacena_agua == 4
                  ? "Planta acuatica"
                  : fila.donde_almacena_agua == 6
                  ? "Otro"
                  : ""
              }}
            </div>
          </div>

          <div class="col-lg-3" v-if="fila.otro_almacena_agua == 9">
            <label style="font-weight: 500"
              >Otra lugar de almacenamiento del agua:</label
            >
            <div>{{ fila.otro_almacena_agua }}</div>
          </div>

          <div class="col-lg-3">
            <label style="font-weight: 500">Ubicación del Tanque:</label>
            <div>
              {{
                fila.ubicacion_tanque == 5
                  ? "No Aplica"
                  : fila.ubicacion_tanque == 1
                  ? "Interior de la vivienda"
                  : fila.ubicacion_tanque == 2
                  ? "Exterior de la vivienda bajo techo"
                  : fila.ubicacion_tanque == 3
                  ? "Exterior de la vivienda sin techo"
                  : fila.ubicacion_tanque == 4
                  ? "Sobre el techo"
                  : ""
              }}
            </div>
          </div>

          <div class="col-lg-3">
            <label style="font-weight: 500"
              >Tipo de Tratamiento del Agua:</label
            >
            <div>
              {{
                fila.tipo_tratamiento_agua == "NA"
                  ? "No Aplica"
                  : fila.tipo_tratamiento_agua == 1
                  ? "Clorada"
                  : fila.tipo_tratamiento_agua == 2
                  ? "Filtrada"
                  : fila.tipo_tratamiento_agua == 3
                  ? "Hervida"
                  : fila.tipo_tratamiento_agua == 4
                  ? "Consume sin tratamiento"
                  : ""
              }}
            </div>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-lg-6">
            <label style="font-weight: 500">Destino final de la Basura:</label>
            <div>
              {{
                fila.destino_final_basura == "NA"
                  ? "No Aplica"
                  : fila.destino_final_basura == 1
                  ? "Recolección y dispocisión en el aseo municipal"
                  : fila.destino_final_basura == 2
                  ? "Quemada"
                  : fila.destino_final_basura == 3
                  ? "Cielo Abierto"
                  : fila.destino_final_basura == 4
                  ? "Enterrada"
                  : fila.destino_final_basura == 5
                  ? "Otro"
                  : ""
              }}
            </div>
          </div>

          <div class="col-lg-6" v-if="fila.destino_final_basura == 5">
            <label style="font-weight: 500"
              >Otra destino final de la basura:</label
            >
            <div>{{ fila.otro_destino_final_basura }}</div>
          </div>
        </div>

        <p>
          <span class="kt-font-boldest" style="font-size: 18px"
            >Observe si cerca de la vivienda hay</span
          >
        </p>

        <div class="form-group row">
          <div class="col-lg-3">
            <label style="font-weight: 500">Porquerizas:</label>
            <div>
              {{ fila.porquerizas == "NA" ? "No Aplica" : fila.porquerizas }}
            </div>
          </div>

          <div class="col-lg-3">
            <label style="font-weight: 500">Plagas:</label>
            <div>
              {{ fila.plagas == "NA" ? "No Aplica" : fila.plagas }}
            </div>
          </div>

          <div class="col-lg-3">
            <label style="font-weight: 500">Industrias Contaminantes:</label>
            <div>
              {{ fila.industrias == "NA" ? "No Aplica" : fila.industrias }}
            </div>
          </div>

          <div class="col-lg-3">
            <label style="font-weight: 500">Malos Olores:</label>
            <div>
              {{ fila.malos_olores == "NA" ? "No Aplica" : fila.malos_olores }}
            </div>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-lg-3">
            <label style="font-weight: 500">Rellenos Sanitarios:</label>
            <div>
              {{ fila.rellenos == "NA" ? "No Aplica" : fila.rellenos }}
            </div>
          </div>

          <div class="col-lg-3">
            <label style="font-weight: 500">Ruido</label>
            <div>
              {{
                fila.contaminacion_a == "NA"
                  ? "No Aplica"
                  : fila.contaminacion_a
              }}
            </div>
          </div>

          <div class="col-lg-3">
            <label style="font-weight: 500">Cuerpos de agua:</label>
            <div>
              {{ fila.rio == "NA" ? "No Aplica" : fila.rio }}
            </div>
          </div>

          <div class="col-lg-3">
            <label style="font-weight: 500">Avenidas:</label>
            <div>
              {{
                fila.avenidas_transitadas == "NA"
                  ? "No Aplica"
                  : fila.avenidas_transitadas
              }}
            </div>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-lg-3">
            <label style="font-weight: 500">Lotes Abandonados:</label>
            <div>
              {{
                fila.lotes_abandonados == "NA"
                  ? "No Aplica"
                  : fila.lotes_abandonados
              }}
            </div>
          </div>

          <div class="col-lg-3">
            <label style="font-weight: 500">Otro</label>
            <div>
              {{ fila.otro_cerca == "NA" ? "No Aplica" : fila.otro_cerca }}
            </div>
          </div>

          <div class="col-lg-6" v-if="fila.otro_cerca == 'SI'">
            <label style="font-weight: 500">Cual otro:</label>
            <div>
              {{ fila.cual_otro }}
            </div>
          </div>
        </div>

        <p>
          <span class="kt-font-boldest" style="font-size: 18px"
            >Animales dentro de la Vivienda</span
          >
        </p>

        <div class="row">
          <div class="col-md-12">
            <div class="table-responsive">
              <table class="table table-sm table-hover">
                <thead class>
                  <tr class="kt-bg-fill-brand">
                    <th>No.</th>
                    <th>Animal</th>
                    <th>Cuantos</th>
                    <th>Vacunado</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(item, index) in fila.animales" :key="index">
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
                      <span class="text-capitalize">{{ item.animal }}</span>
                    </td>
                    <td
                      style="
                        font-weight: normal;
                        vertical-align: middle;
                        text-align: left;
                        text-transform: capitalize;
                      "
                    >
                      <span class="text-capitalize">{{ item.cuantos }}</span>
                    </td>
                    <td
                      style="
                        font-weight: normal;
                        vertical-align: middle;
                        text-align: left;
                        text-transform: capitalize;
                      "
                    >
                      <span class="text-capitalize">{{ item.vacunados }}</span>
                    </td>
                  </tr>
                </tbody>
              </table>
              <div class="kt-separator kt-separator--border-dashed"></div>
              <!--begin: Section-->

              <!--end: Section-->
            </div>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-lg-4">
            <label style="font-weight: 500">El Servicio Sanitario Es:</label>
            <div>
              {{
                fila.servicio_sanitario == "NA"
                  ? "No Aplica"
                  : fila.servicio_sanitario == 1
                  ? "De Uso Exclusivo de las Personas de la Familia"
                  : fila.servicio_sanitario == 2
                  ? "Compartida con Personas de Otras Familias"
                  : fila.servicio_sanitario == 3
                  ? "Sin servicio sanitario"
                  : ""
              }}
            </div>
          </div>

          <div class="col-lg-4">
            <label style="font-weight: 500"
              >Donde se Encuentra el Sanitario,Inodoro Ó Letrina:</label
            >
            <div>
              {{
                fila.donde_sanitario == 1
                  ? "Fuera de la casa"
                  : fila.donde_sanitario == 2
                  ? "Patio"
                  : fila.donde_sanitario == 3
                  ? "Dentro de la casa"
                  : "No aplica"
              }}
            </div>
          </div>

          <div class="col-lg-6" v-if="fila.otro_cerca == 'SI'">
            <label style="font-weight: 500"
              >Donde se Disponen las Excretas (HECES):</label
            >
            <div>
              {{
                fila.excretas == "NA"
                  ? "No Aplica"
                  : fila.excretas == 1
                  ? "Letrina"
                  : fila.excretas == 3
                  ? "Inodoro conectado a red de alcantarillado"
                  : fila.excretas == 4
                  ? "Cuerpos de aguas"
                  : fila.excretas == 5
                  ? "Inododoro conectado a pozo séptico"
                  : fila.excretas == 6
                  ? "Campo abierto"
                  : fila.excretas == 7
                  ? "Otro"
                  : ""
              }}
            </div>
          </div>
        </div>

        <div class="form-group row" v-if="fila.excretas == 7">
          <div class="col-lg-4">
            <label style="font-weight: 500">En otro lugar:</label>
            <div>
              {{ fila.otro_depositan_excretas }}
            </div>
          </div>
        </div>

        <p>
          <span class="kt-font-boldest" style="font-size: 18px"
            >La vivienda Tiene los Siguientes Ambientes Separados</span
          >
        </p>

        <div class="form-group row">
          <div class="col-lg-3">
            <label style="font-weight: 500">Cocina:</label>
            <div>
              {{ fila.cocina == "NA" ? "No Aplica" : fila.cocina }}
            </div>
          </div>

          <div class="col-lg-3">
            <label style="font-weight: 500">Dormitorios:</label>
            <div>
              {{ fila.dormitorio_a == "NA" ? "No Aplica" : fila.plagas }}
            </div>
          </div>

          <div class="col-lg-3">
            <label style="font-weight: 500">Sala Comedor:</label>
            <div>
              {{ fila.sala == "NA" ? "No Aplica" : fila.sala }}
            </div>
          </div>

          <div class="col-lg-3">
            <label style="font-weight: 500">Sanitario:</label>
            <div>
              {{ fila.sanitario == "NA" ? "No Aplica" : fila.sanitario }}
            </div>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-lg-3">
            <label style="font-weight: 500">Lavadero:</label>
            <div>
              {{ fila.lavadero == "NA" ? "No Aplica" : fila.lavadero }}
            </div>
          </div>
        </div>

        <p>
          <span class="kt-font-boldest" style="font-size: 18px"
            >Almacena Junto A Los Alimentos Y/O Agua De Consumo Alguno De Los
            Siguientes Productos</span
          >
        </p>

        <div class="form-group row">
          <div class="col-lg-3">
            <label style="font-weight: 500">Gasolina:</label>
            <div>
              {{ fila.gasolina == "NA" ? "No Aplica" : fila.gasolina }}
            </div>
          </div>

          <div class="col-lg-3">
            <label style="font-weight: 500">Plaguicidas Agricolas:</label>
            <div>
              {{ fila.plaguicidas == "NA" ? "No Aplica" : fila.plaguicidas }}
            </div>
          </div>

          <div class="col-lg-3">
            <label style="font-weight: 500">Detergentes/Desifectantes:</label>
            <div>
              {{ fila.detergentes == "NA" ? "No Aplica" : fila.detergentes }}
            </div>
          </div>

          <div class="col-lg-3">
            <label style="font-weight: 500">Plaguicidas Para Insectos:</label>
            <div>
              {{
                fila.plaguicidas_insectos == "NA"
                  ? "No Aplica"
                  : fila.plaguicidas_insectos
              }}
            </div>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-lg-6">
            <label style="font-weight: 500"
              >Uso Final Que Le Dan A Los Envases Vacios De Los
              Plaguicidas:</label
            >
            <div>
              {{
                fila.envases_vacios == "1"
                  ? "No Aplica"
                  : fila.envases_vacios == 2
                  ? "Guardar alimentos y agua"
                  : fila.envases_vacios == 3
                  ? "Para varios usos en el hogar"
                  : fila.envases_vacios == 4
                  ? "Los botan a la basura"
                  : fila.envases_vacios == 5
                  ? "Los entierran"
                  : fila.envases_vacios == 6
                  ? "Los queman"
                  : fila.envases_vacios == 7
                  ? "Otro"
                  : ""
              }}
            </div>
          </div>
          <div class="col-lg-6" v-if="fila.envases_vacios == 7">
            <label style="font-weight: 500">Otro uso:</label>
            <div>
              {{ fila.otro_envases_vacios }}
            </div>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-lg-6">
            <label style="font-weight: 500"
              >Con Que Tipo De Elementos Se Protegen Contra
              Animales,Plagas:</label
            >
            <div>
              {{
                fila.elementos_protecion == "1"
                  ? "Toldillos/mosquiteros"
                  : fila.elementos_protecion == 2
                  ? "Anjeos"
                  : fila.elementos_protecion == 3
                  ? "Fumigación con insecticidas/plaguicidas"
                  : fila.elementos_protecion == 4
                  ? "Raticidas"
                  : fila.elementos_protecion == 5
                  ? "Otro"
                  : fila.elementos_protecion == 6
                  ? "Ninguna"
                  : fila.elementos_protecion == 7
                  ? "No aplica"
                  : ""
              }}
            </div>
          </div>
          <div class="col-lg-6" v-if="fila.elementos_protecion == 5">
            <label style="font-weight: 500"
              >Otros elementos de protección:</label
            >
            <div>
              {{ fila.otro_elementos_protecion }}
            </div>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-lg-6">
            <label style="font-weight: 500"
              >Metodo de cocción de los alimentos:</label
            >
            <div>
              {{
                fila.metodos_coccion == "NA"
                  ? "No Aplica"
                  : fila.metodos_coccion == 1
                  ? "Estufa a gas"
                  : fila.metodos_coccion == 2
                  ? "Estufa electrica"
                  : fila.metodos_coccion == 3
                  ? "Estufa a gasolina"
                  : fila.metodos_coccion == 4
                  ? "Leña"
                  : fila.metodos_coccion == 5
                  ? "Carbon"
                  : fila.metodos_coccion == 6
                  ? "Otro"
                  : ""
              }}
            </div>
          </div>
          <div class="col-lg-6" v-if="fila.metodos_coccion == 6">
            <label style="font-weight: 500">Otros Metodos de Cocción:</label>
            <div>
              {{ fila.otro_metodos_coccion }}
            </div>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-lg-6">
            <label style="font-weight: 500"
              >En cual de los siguientes lugares preparan los alimentos:</label
            >
            <div>
              {{
                fila.lugares_preparan_alimentos == "NA"
                  ? "No Aplica"
                  : fila.lugares_preparan_alimentos == 1
                  ? "En un cuarto usado solo para cocinar"
                  : fila.lugares_preparan_alimentos == 2
                  ? "En un cuarto usado tambien para dormir"
                  : fila.lugares_preparan_alimentos == 3
                  ? "En una sala comedor con lavaplatos"
                  : fila.lugares_preparan_alimentos == 4
                  ? "En una sala comedor sin lavaplatos"
                  : fila.lugares_preparan_alimentos == 5
                  ? "En un patio comedor al aire libre"
                  : fila.lugares_preparan_alimentos == 6
                  ? "En ninguna parte(no preparan alimentos)"
                  : ""
              }}
            </div>
          </div>
          <div class="col-lg-6">
            <label style="font-weight: 500"
              >Antes de consumir frutas y verduras las lava:</label
            >
            <div>
              {{ fila.lava_frutas == "NA" ? "No Aplica" : fila.lava_frutas }}
            </div>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-lg-6">
            <label style="font-weight: 500">Como conserva los alimentos:</label>
            <div>
              {{
                fila.lugares_almacenan_alimentos == "NA"
                  ? "No Aplica"
                  : fila.lugares_almacenan_alimentos == 1
                  ? "Refrigerador"
                  : fila.lugares_almacenan_alimentos == 2
                  ? "Recipientes Abiertos"
                  : fila.lugares_almacenan_alimentos == 3
                  ? "Recipientes Cerrados"
                  : fila.lugares_almacenan_alimentos == 4
                  ? "Al aire libre dentro de la casa"
                  : fila.lugares_almacenan_alimentos == 5
                  ? "AL aire libre fuera de la casa"
                  : fila.lugares_almacenan_alimentos == 6
                  ? "Otro"
                  : ""
              }}
            </div>
          </div>
          <div class="col-lg-6" v-if="fila.lugares_almacenan_alimentos == 6">
            <label style="font-weight: 500"
              >Otros Lugares de Almacenamiento:</label
            >
            <div>
              {{ fila.otro_lugares_almacenan_alimentos }}
            </div>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-lg-6">
            <label style="font-weight: 500"
              >¿Qué tipo de explotación se le está dando al suelo?:</label
            >
            <div>
              {{
                fila.tipo_explotacion == "NA"
                  ? "No Aplica"
                  : fila.tipo_explotacion == 1
                  ? "Forestal"
                  : fila.tipo_explotacion == 2
                  ? "Estufa electrica"
                  : fila.tipo_explotacion == 3
                  ? "Estufa a gasolina"
                  : fila.tipo_explotacion == 4
                  ? "Leña"
                  : fila.tipo_explotacion == 5
                  ? "Carbon"
                  : fila.tipo_explotacion == 6
                  ? "Otro"
                  : ""
              }}
            </div>
          </div>
          <div class="col-lg-6" v-if="fila.tipo_explotacion == 6">
            <label style="font-weight: 500">Otros Metodos de Cocción:</label>
            <div>
              {{ fila.otro_tipo_explotacion }}
            </div>
          </div>
        </div>

        <p>
          <span class="kt-font-boldest" style="font-size: 18px"
            >¿Cuáles son los tipos de residuos que se genera en su casa?</span
          >
        </p>
        <div class="form-group row">
          <div class="col-lg-3">
            <label style="font-weight: 500">Residuos Aprovechables:</label>
            <div>
              {{
                fila.residuos_aprovechables == "NA"
                  ? "No Aplica"
                  : fila.residuos_aprovechables
              }}
            </div>
          </div>

          <div class="col-lg-3">
            <label style="font-weight: 500">Residuos Organicos:</label>
            <div>
              {{
                fila.residuos_organicos == "NA"
                  ? "No Aplica"
                  : fila.residuos_organicos
              }}
            </div>
          </div>

          <div class="col-lg-3">
            <label style="font-weight: 500">Residuos No Aprovechables:</label>
            <div>
              {{
                fila.residuos_no_aprovechables == "NA"
                  ? "No Aplica"
                  : fila.residuos_no_aprovechables
              }}
            </div>
          </div>

          <div class="col-lg-3">
            <label style="font-weight: 500">Otros:</label>
            <div>
              {{ fila.otros_genera == "NA" ? "No Aplica" : fila.otros_genera }}
            </div>
          </div>
        </div>

        <div class="form-group row" v-if="fila.otros_genera == 'SI'">
          <div class="col-lg-3">
            <label style="font-weight: 500">Otros residuos:</label>
            <div>
              {{ fila.cual_genera }}
            </div>
          </div>
        </div>
        <div class="kt-separator kt-separator--border-dashed"></div>

        <div class="form-group row">
          <div class="col-lg-6">
            <label style="font-weight: 500"
              >¿Cuál es el tipo de combustible utilizado en su casa para
              cocinar?:</label
            >
            <div>
              {{
                fila.tipo_combustible == "NA"
                  ? "No Aplica"
                  : fila.tipo_combustible == 1
                  ? "Luz eléctrica"
                  : fila.tipo_combustible == 2
                  ? "Gasolina"
                  : fila.tipo_combustible == 3
                  ? "Leña"
                  : fila.tipo_combustible == 4
                  ? "Carbón"
                  : fila.tipo_combustible == 5
                  ? "Gas natural"
                  : ""
              }}
            </div>
          </div>
          <div class="col-lg-6">
            <label style="font-weight: 500"
              >Su vivienda se encuentra en una zona de alto riesgo:</label
            >
            <div>
              {{
                fila.zona_alto_riesgo == 0
                  ? "No Aplica"
                  : fila.zona_alto_riesgo == 1
                  ? "Ladera"
                  : fila.zona_alto_riesgo == 2
                  ? "Cuerpos de agua"
                  : fila.zona_alto_riesgo == 3
                  ? "suelo inestable, derrumbes"
                  : ""
              }}
            </div>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-lg-6">
            <label style="font-weight: 500"
              >¿Existe un lugar apto para el almacenamiento de los residuos
              antes de la recolección?:</label
            >
            <div>
              {{
                fila.almacenamiento_residuos == "NA"
                  ? "No Aplica"
                  : fila.almacenamiento_residuos
              }}
            </div>
          </div>
          <div class="col-lg-6">
            <label style="font-weight: 500"
              >¿Se presenta en tu barrio problemáticas de aguas negras?:</label
            >
            <div>
              {{ fila.aguas_negras }}
            </div>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-lg-6">
            <label style="font-weight: 500"
              >Considera que su comunidad posee adecuadas zonas verdes como
              parques:</label
            >
            <div>
              {{
                fila.zonas_verdes == "NA"
                  ? "No Aplica"
                  : fila.zona_alto_riesgo == 1
                  ? "SI HAY"
                  : fila.zona_alto_riesgo == 2
                  ? "NO HAY"
                  : fila.zona_alto_riesgo == 3
                  ? "SI HAY EN MAL ESTADO"
                  : ""
              }}
            </div>
          </div>
          <div class="col-lg-6">
            <label style="font-weight: 500"
              >Cuantas veces los deslizamientos afectaron su comunidad o su
              vivienda:</label
            >
            <div>
              {{
                fila.desplazamientos == "NA"
                  ? "No Aplica"
                  : fila.desplazamientos == 1
                  ? "Más de 2 veces al año"
                  : fila.desplazamientos == 2
                  ? "Al menos una vez al año"
                  : fila.desplazamientos == 3
                  ? "Una vez cada 2 años"
                  : "Nunca"
              }}
            </div>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-lg-6">
            <label style="font-weight: 500"
              >¿Realiza usted rotación del cultivo? :</label
            >
            <div>
              {{
                fila.rotacion_cultivo == "NA"
                  ? "No Aplica"
                  : fila.rotacion_cultivo == 1
                  ? "Permanentemente"
                  : fila.rotacion_cultivo == 2
                  ? "Nunca"
                  : fila.rotacion_cultivo == 3
                  ? "Ocasional"
                  : fila.rotacion_cultivo == 4
                  ? "Periódicamente"
                  : fila.rotacion_cultivo == 5
                  ? "No Aplica"
                  : ""
              }}
            </div>
          </div>
          <div class="col-lg-6">
            <label style="font-weight: 500"
              >Emplea fertilizantes químicos o plaguicidas en su
              actividad:</label
            >
            <div>
              {{
                fila.emplea_fertilizantes == "NA"
                  ? "No Aplica"
                  : fila.emplea_fertilizantes
              }}
            </div>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-lg-6">
            <label style="font-weight: 500"
              >¿Usted realiza quema de cultivo?:</label
            >
            <div>
              {{
                fila.quema_cultivo == "NA" ? "No Aplica" : fila.quema_cultivo
              }}
            </div>
          </div>
          <div class="col-lg-6">
            <label style="font-weight: 500"
              >¿ha evidenciado usted mantenimiento preventivo a la red de
              alcantarillado en su comunidad?:</label
            >
            <div>
              {{
                fila.rotacion_cultivo == "NA"
                  ? "No Aplica"
                  : fila.rotacion_cultivo == 1
                  ? "Permanentemente"
                  : fila.rotacion_cultivo == 2
                  ? "Nunca"
                  : fila.rotacion_cultivo == 3
                  ? "Ocasional"
                  : fila.rotacion_cultivo == 4
                  ? "Periódicamente"
                  : ""
              }}
            </div>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-lg-6">
            <label style="font-weight: 500"
              >Cuantas veces las inundaciones afectaron su comunidad o su
              vivienda:</label
            >
            <div>
              {{
                fila.veces_inundaciones == "NA"
                  ? "No Aplica"
                  : fila.veces_inundaciones == 1
                  ? "Más de 2 veces al año"
                  : fila.veces_inundaciones == 2
                  ? "Al menos una vez al año"
                  : fila.veces_inundaciones == 3
                  ? "Una vez cada 2 años"
                  : fila.veces_inundaciones == 4
                  ? "Nunca"
                  : ""
              }}
            </div>
          </div>
          <div class="col-lg-6">
            <label style="font-weight: 500">Fachada de la casa:</label>
            <div>
              {{
                fila.fachada == "NA"
                  ? "No Aplica"
                  : fila.fachada == 1
                  ? "Permanentemente"
                  : fila.fachada == 2
                  ? "Nunca"
                  : fila.fachada == 3
                  ? "Ocasional"
                  : fila.fachada == 4
                  ? "Periódicamente"
                  : ""
              }}
            </div>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-lg-3">
            <label style="font-weight: 500"
              >¿Cuantos baños de uso exclusivo tiene?:</label
            >
            <div>
              {{
                fila.cuantos_baños == "NA"
                  ? "No Aplica"
                  : fila.cuantos_baños == 1
                  ? "No posee baño de uso exclusivo"
                  : fila.cuantos_baños == 2
                  ? "1 Baño"
                  : fila.cuantos_baños == 3
                  ? "2 Baños"
                  : fila.cuantos_baños == 4
                  ? "3 Baños ó mas"
                  : ""
              }}
            </div>
          </div>
          <div class="col-lg-3">
            <label style="font-weight: 500"
              >Estado de conservacion de los baños:</label
            >
            <div>
              {{
                fila.estado_conservacion_baños == "NA"
                  ? "No Aplica"
                  : fila.estado_conservacion_baños == 1
                  ? "Malo"
                  : fila.estado_conservacion_baños == 2
                  ? "Nunca"
                  : fila.estado_conservacion_baños == 3
                  ? "Ocasional"
                  : fila.estado_conservacion_baños == 4
                  ? "Periódicamente"
                  : ""
              }}
            </div>
          </div>

          <div class="col-lg-3">
            <label style="font-weight: 500"
              >Estado de conservacion de los baños:</label
            >
            <div>
              {{
                fila.estado_conservacion_baños == "NA"
                  ? "No Aplica"
                  : fila.estado_conservacion_baños == 1
                  ? "Malo"
                  : fila.estado_conservacion_baños == 2
                  ? "Nunca"
                  : fila.estado_conservacion_baños == 3
                  ? "Ocasional"
                  : fila.estado_conservacion_baños == 4
                  ? "Periódicamente"
                  : ""
              }}
            </div>
          </div>

          <div class="col-lg-3">
            <label style="font-weight: 500"
              >Acabados externos de los muros ó paredes:</label
            >
            <div>
              {{
                fila.acabados_externos == "NA"
                  ? "No Aplica"
                  : fila.acabados_externos == 1
                  ? "Sin cubrimiento"
                  : fila.acabados_externos == 2
                  ? "Pañete ó ladrillos presado"
                  : fila.acabados_externos == 3
                  ? "Estuco, Cerámica, Papel de Colgadura"
                  : fila.acabados_externos == 4
                  ? "Madera Piedra Ornamental"
                  : "Marmol, lujoso"
              }}
            </div>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-lg-4">
            <label style="font-weight: 500"
              >Estado de Conservacion de las estructuras de la Vivienda:</label
            >
            <div>
              {{
                fila.estado_conservacion_estructuras == "NA"
                  ? "No Aplica"
                  : fila.estado_conservacion_estructuras == 1
                  ? "Malo"
                  : fila.estado_conservacion_estructuras == 2
                  ? "Regular"
                  : fila.estado_conservacion_estructuras == 3
                  ? "Bueno"
                  : fila.estado_conservacion_estructuras == 4
                  ? "Excelente"
                  : ""
              }}
            </div>
          </div>

          <div class="col-lg-3">
            <label style="font-weight: 500"
              >Mobiliario de la cocina:</label
            >
            <div>
              {{
                fila.mobiliario_cocina == "NA"
                  ? "No Aplica"
                  : fila.mobiliario_cocina == 1
                  ? "Pobre"
                  : fila.mobiliario_cocina == 2
                  ? "Sencillo"
                  : fila.mobiliario_cocina == 3
                  ? "Regular"
                  : fila.mobiliario_cocina == 4
                  ? "Excelente"
                  : ""
              }}
            </div>
          </div>

          <div class="col-lg-4">
            <label style="font-weight: 500"
              >¿Estado de los andenes y bordillo de la vivienda?:</label
            >
            <div>
              {{
                fila.andenes == "NA"
                  ? "No Aplica"
                  : fila.andenes == 1
                  ? "No tiene."
                  : fila.andenes == 2
                  ? "Si tiene, pavimentado"
                  : fila.andenes == 3
                  ? "Si tiene en mal estado"
                  : ""
              }}
            </div>
          </div>
        </div>

        <p>
          <span class="kt-font-boldest" style="font-size: 18px"
            >Estratificación</span
          >
        </p>

        <div class="row">
                <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table table-sm table-hover">
                      <thead class>
                        <tr class="kt-bg-fill-brand">
                          <th>No.</th>
                          <th>¿Cuenta ese Hogar con Internet?</th>
                          <th>¿Tiene computador de Escritorío?</th>
                          <th>¿Tiene Computador Portatil?</th>
                          <th>¿Cuantos celular en uso hay en el Hogar?</th>
                          <th>Tiene Equipo de sonido</th>
                          <th>Cuantos Tv a Color</th>
                          <th>Cuantos Vehiculos de Uso exclusivo tiene el Hogar</th>
                          <th>¿Cual es el nivel de Instrucción del jefe del Hogar?</th>
                          <th>¿Alguien en el Hogar posee afiliación de salud Privada o contribituva, prepagada ?</th>
                          <th>¿Ingresos mensuales por Hogar zona rural?</th>
                          <th>¿Ingresos mensuales por Hogar en Ciudad?</th>
                          <th>Jefe del hogar</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(item,index) in fila.estratificacion" :key="index" v-show="item.estado=='Activo'">
                          <td style="font-weight: normal;vertical-align: middle;">{{ (index+1) }}</td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <span class="text-capitalize">{{item.cuenta_internet}}</span>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <span class="text-capitalize">{{item.tiene_pc_escritorio}}</span>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <span class="text-capitalize">{{item.tiene_pc_portatil}}</span>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <span class="text-capitalize">{{item.texto_cuantos_celulares}}</span>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <span class="text-capitalize">{{item.tiene_equipo_sonido}}</span>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <span class="text-capitalize">{{item.texto_cuantos_tv_color}}</span>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <span class="text-capitalize">{{item.texto_cuantos_vehiculos}}</span>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <span class="text-capitalize">{{item.texto_nivel_instruccion}}</span>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <span class="text-capitalize">{{item.afiliacion_salud_privada}}</span>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <span class="text-capitalize">{{item.texto_ingresos_zona_rural}}</span>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <span class="text-capitalize">{{item.texto_ingresos_ciudad}}</span>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <span class="text-capitalize">{{item.id_jefe}}</span>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <div class="kt-separator kt-separator--border-dashed"></div>
                  </div>
                </div>
              </div>
      </div>
    </b-modal>
  </div>
</template>
<script>

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
        ruta: "",
      datos: {
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
      },
      viviendas: {},
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
        tenencia_vivienda: this.$route.params.tenencia_vivienda,
        tipo_vivienda: this.$route.params.tipo_vivienda,
        poblacion_especial: this.$route.params.poblacion_especial,
        material_predominante: this.$route.params.material_predominante,
        promedio_ingresos: this.$route.params.promedio_ingresos,
        energia_electrica: this.$route.params.energia_electrica,
        gas_natural: this.$route.params.gas_natural,
        acueducto: this.$route.params.acueducto,
        alcantarillado: this.$route.params.alcantarillado,
        aseo: this.$route.params.aseo,
        servicio_sanitario: this.$route.params.servicio_sanitario,
        aguas_negras: this.$route.params.aguas_negras,
        tipo_combustible: this.$route.params.tipo_combustible,
      };

      const parametros = {
        _token: this.csrf,
        datos: this.datos,
        page: pagina,
      };
      try {
        await consultas.viviendas(parametros).then((respuesta) => {
          this.viviendas = respuesta.data.viviendas.data;
          this.paginacion = respuesta.data.paginacion;
          //console.log(respuesta.data.viviendas);
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
        await consultas.viviendaspdf(parametros).then((respuesta) => {
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
