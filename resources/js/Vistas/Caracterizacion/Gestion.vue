<template>
  <div>
    <div style="margin-top: -4%;">
      <b-card no-body>
        <b-tabs card>
          <b-tab title="CARACTERIZACIÓN" active>
            <!-- CARCARTERIZACION -->
            <div
              class="kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile"
              style="padding: 20px"
            >
              <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                  <h3 class="kt-portlet__head-title">
                    <span class="kt-widget20__number kt-font-danger">GESTIÓN DE CARACTERIZACIÓN</span>
                  </h3>
                </div>
              </div>
              <hr>
              <br>
              <div class="kt-portlet__body">
                <div class="kt-section">
                  <div class="kt-section__content">
                    <div class="row">
                      <div class="col-md-6 col-lg-6">
                        <div class="kt-section">
                          <div class="kt-section__content">
                            <router-link
                              to="/ingreso"
                              class="btn btn-outline-primary btn-icon"
                              title="Nueva Caracterización"
                            >
                              <i class="la la-file-text-o"></i>
                            </router-link>&nbsp;
                            <!-- <a
                              class="btn btn-outline-primary btn-icon"
                              href="javascript:;"
                              title="Nueva Caracterización"
                              @click="abrir"
                            >
                              <i class="la la-file-text-o"></i>
                            </a>-->
                            <a
                              class="btn btn-outline-warning btn-icon"
                              href="javascript:;"
                              title="Exportar a Pdf"
                              @click="abrirModal"
                            >
                              <i class="la la-file-pdf-o"></i>
                            </a>
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
                                <th>Identificación</th>
                                <th>Usuario</th>
                                <td class="text-center">Estado</td>
                                <td class="text-center">Opciones</td>
                              </tr>
                            </thead>
                            <tbody>
                              <tr v-for="(item, index) in caracterizacion" :key="index">
                                <td style="font-weight: normal;vertical-align: middle;">{{ (index+1) }}</td>
                                <td
                                  style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                                >{{item.DPTO.toUpperCase()}}</td>
                                <td
                                  style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                                >{{item.MUNI.toUpperCase()}}</td>
                                <td
                                  v-if="item.CORREGIMIENTO!==null"
                                  style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                                >{{item.CORREGIMIENTO.toUpperCase()}}</td>
                                <td
                                  v-else
                                  style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                                ></td>
                                <td
                                  style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                                >{{item.IDENTIFICACION.toUpperCase()}}</td>
                                <td
                                  style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                                >{{item.USUARIO.toUpperCase()}}</td>
                                <td style="font-weight: normal;vertical-align: middle;text-align: center;">
                                  <span
                                    class="kt-badge kt-badge--inline"
                                    :class="item.ESTADO=='Activo'?'kt-badge--success':'kt-badge--danger'"
                                  >{{item.ESTADO.toUpperCase()}}</span>
                                </td>
                                <td style="text-align:center;vertical-align: middle;text-align: center;">
                                  <button
                                    type="button"
                                    class="btn btn-outline-success btn-icon btn-sm"
                                    title="Imprimir"
                                    @click="abrirModal2(item)"
                                  >
                                    <i class="fa fa-file-pdf"></i>
                                  </button>
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

              <!--begin::Modal Exportar-->
              <b-modal
                ref="modalExportar"
                hide-footer
                title="Listado de Usuarios Caracterizados"
                size="xl"
                centered
                header-bg-variant="danger"
                header-text-variant="light"
                :no-close-on-backdrop="true"
              >
                <div class="d-block">
                  <div ref="content">
                    <div
                      class="kt-portlet kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile"
                    >
                      <div class="kt-portlet__body">
                        <div class="kt-section">
                          <div class="kt-section__content">
                            <div class="row justify-content-center">
                              <div class="col-xl-12">
                                <center>
                                  <span
                                    class="kt-font-boldest"
                                    style="font-size: 22px;"
                                  >SISTEMA INTEGRADO POBLACIONAL</span>
                                </center>
                              </div>
                            </div>
                            <div class="kt-separator kt-separator--border-dashed"></div>
                            <div class="row justify-content-center">
                              <div class="col-xl-12">
                                <div class="table-responsive">
                                  <p>
                                    <span
                                      class="kt-font-boldest"
                                      style="font-size: 18px;"
                                    >Listado de usuarios caracterizados</span>
                                  </p>
                                  <table class="table table-sm table-hover">
                                    <thead class>
                                      <tr class="kt-bg-fill-brand">
                                        <th>No.</th>
                                        <th>Departamento</th>
                                        <th>Municipio</th>
                                        <th>Corregimiento</th>
                                        <th>Identificación</th>
                                        <th>Usuario</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr v-for="(item, index) in caracterizacion2" :key="index">
                                        <td
                                          style="font-weight: normal;vertical-align: middle;"
                                        >{{ (index+1) }}</td>
                                        <td
                                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                                        >{{item.DPTO.toUpperCase()}}</td>
                                        <td
                                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                                        >{{item.MUNI.toUpperCase()}}</td>
                                        <td
                                          v-if="item.CORREGIMIENTO!==null"
                                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                                        >{{item.CORREGIMIENTO.toUpperCase()}}</td>
                                        <td
                                          v-else
                                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                                        ></td>
                                        <td
                                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                                        >{{item.IDENTIFICACION.toUpperCase()}}</td>
                                        <td
                                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                                        >{{item.USUARIO.toUpperCase()}}</td>
                                      </tr>
                                    </tbody>
                                  </table>
                                  <div class="kt-separator kt-separator--border-dashed"></div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr />
                  <div class="text-right">
                    <a download :href="this.nombreCaracterizacion2" type="button" class="btn btn-success"><i class="la la-file-pdf-o"></i> Imprimir</a>
                    <button type="button" class="btn btn-warning" @click="cerrarModal">
                      <i class="fa fa-window-close"></i> Cerrar
                    </button>
                  </div>
                </div>
              </b-modal>
              <!--begin::Modal Exportar-->

              <!--begin::Modal Exportar2-->
              <b-modal
                ref="modalExportar2"
                hide-footer
                title="Detalle de Usuario Caracterizado"
                size="xl"
                centered
                header-bg-variant="danger"
                header-text-variant="light"
                :no-close-on-backdrop="true"
              >
                <embed
                    id="divPdf"
                    :src="pdf_caracterizacion"
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
              <!--begin::Modal Exportar2-->

              <!--begin::Modal Exportar2-->
              <b-modal
                ref="modalAbrir"
                hide-footer
                title="Seleccione una opción"
                size="sm"
                centered
                header-bg-variant="danger"
                header-text-variant="light"
                :no-close-on-backdrop="true"
              >
                <div class="d-block">
                  <div ref="content">
                    <div
                      class="kt-portlet kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile"
                    >
                      <div class="kt-portlet__body">
                        <div class="kt-section">
                          <div class="kt-section__content">
                            <div class="row justify-content-center">
                              <div class="col-md-6">
                                <div
                                  class="kt-portlet kt-portlet--height-fluid"
                                  data-container="body"
                                  data-toggle="kt-popover"
                                  data-placement="left"
                                  data-content
                                  data-html="true"
                                >
                                  <div
                                    class="kt-widget14"
                                    style="cursor:pointer;width: 200px;"
                                    @click="seleccionarOpcion('ingreso')"
                                  >
                                    <div class="kt-widget14__header">
                                      <h3
                                        class="kt-widget14__title text-center font-weight-bold"
                                        style="font-size: 11px;"
                                      >Vivienda</h3>
                                    </div>
                                    <div class="kt-widget14__content">
                                      <div class="kt-widget14__chart text-center">
                                        <img
                                          style="height: 100px; width: 140px; float: right;"
                                          :src="
                                                      `${$store.state.serverPath}assets/iconos/zonas/hogares.png`
                                                  "
                                        />
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div
                                  class="kt-portlet kt-portlet--height-fluid"
                                  data-container="body"
                                  data-toggle="kt-popover"
                                  data-placement="left"
                                  data-content
                                  data-html="true"
                                >
                                  <div
                                    class="kt-widget14"
                                    style="cursor:pointer;width: 200px;"
                                    @click="seleccionarOpcion('establecimiento')"
                                  >
                                    <div class="kt-widget14__header">
                                      <h3
                                        class="kt-widget14__title text-center font-weight-bold"
                                        style="font-size: 11px;"
                                      >Establecimiento</h3>
                                    </div>
                                    <div class="kt-widget14__content">
                                      <div class="kt-widget14__chart text-center">
                                        <img
                                          style="height: 100px; width: 140px; float: right;"
                                          :src="
                                                      `${$store.state.serverPath}assets/iconos/zonas/viviendas.png`
                                                  "
                                        />
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr />
                  <div class="text-right">
                    <button type="button" class="btn btn-warning" @click="cerrarModal">
                      <i class="fa fa-window-close"></i> Cerrar
                    </button>
                  </div>
                </div>
              </b-modal>
              <!--begin::Modal Exportar2-->
            </div>
            <!-- CARCARTERIZACION -->
          </b-tab>
          <b-tab title="ESTABLECIMIENTOS">
            <!-- ESTABLECIMIENTOS -->
            <div
              class="kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile"
              style="padding: 20px"
            >
              <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                  <h3 class="kt-portlet__head-title">
                    <span class="kt-widget20__number kt-font-danger">GESTIÓN DE ESTABLECIMIENTOS</span>
                  </h3>
                </div>
              </div>
              <hr>
              <br>
              <div class="kt-portlet__body">
                <div class="kt-section">
                  <div class="kt-section__content">
                    <div class="row">
                      <div class="col-md-6 col-lg-6">
                        <div class="kt-section">
                          <div class="kt-section__content">
                            <a
                              class="btn btn-outline-primary btn-icon"
                              href="javascript:;"
                              title="Nuevo Establecimiento"
                              @click="abrir"
                            >
                              <i class="la la-file-text-o"></i>
                            </a>
                            <a
                              class="btn btn-outline-warning btn-icon"
                              href="javascript:;"
                              title="Exportar a Pdf"
                              @click="exportarEstablecimientosPDF"
                            >
                              <i class="la la-file-pdf-o"></i>
                            </a>
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
                                v-model="txtbusqueda2"
                              />
                              <div class="input-group-append">
                                <button
                                  type="button"
                                  class="btn btn-primary btn-icon"
                                  @click="consultar2(1)"
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
                      <div class="col-lg-12">
                        <div class="table-responsive">
                          <table class="table table-sm table-hover">
                            <thead class>
                              <tr class="kt-bg-fill-brand">
                                <th>No.</th>
                                <th>Departamento</th>
                                <th>Municipio</th>
                                <th>Corregimiento</th>
                                <th>Razón Social</th>
                                <th>Nit</th>
                                <th>Representante</th>
                                <td class="text-center">Opciones</td>
                              </tr>
                            </thead>
                            <tbody>
                              <tr v-for="(item, index) in establecimientos" :key="index">
                                <td style="font-weight: normal;vertical-align: middle;">{{ (index+1) }}</td>
                                <td
                                  style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                                >{{item.DPTO.toUpperCase()}}</td>
                                <td
                                  style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                                >{{item.MUNI.toUpperCase()}}</td>
                                <td
                                  v-if="item.CORREGIMIENTO!==null"
                                  style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                                >{{item.CORREGIMIENTO.toUpperCase()}}</td>
                                <td
                                  v-else
                                  style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                                ></td>
                                <td
                                  style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                                >{{item.razon.toUpperCase()}}</td>
                                <td
                                  style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                                >{{item.nit.toUpperCase()}}</td>
                                <td
                                  style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                                >{{item.representante.toUpperCase()}}</td>
                                <td style="text-align:center;vertical-align: middle;text-align: center;">
                                  <button
                                    type="button"
                                    class="btn btn-outline-success btn-icon btn-sm"
                                    title="Imprimir"
                                    @click="exportarEstablecimientoPDF(item)"
                                  >
                                    <i class="fa fa-file-pdf"></i>
                                  </button>
                                  <button
                                    type="button"
                                    class="btn btn-outline-info btn-icon btn-sm"
                                    title="Editar"
                                    @click="editar2(item)"
                                  >
                                    <i class="fa fa-edit"></i>
                                  </button>
                                  <button
                                    class="btn btn-icon btn-sm"
                                    :class="(item.ESTADO=='Activo'?'btn-outline-danger':'btn-outline-success')"
                                    type="button"
                                    :title="(item.ESTADO=='Activo')?'Anular':'Activar'"
                                    @click="eliminar2(item)"
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
                                <li class="kt-pagination__link--first" v-if="paginacion2.pagina_actual>1">
                                  <a href="javascript:;" @click.prevent="cambiarPaginas2(1)">
                                    <i class="fa fa-angle-double-left kt-font-danger"></i>
                                  </a>
                                </li>
                                <li class="kt-pagination__link--next" v-if="paginacion2.pagina_actual>1">
                                  <a
                                    href="javascript:;"
                                    @click.prevent="cambiarPaginas2(paginacion2.pagina_actual-1)"
                                  >
                                    <i class="fa fa-angle-left kt-font-danger"></i>
                                  </a>
                                </li>
                                <li
                                  :class="[pagina==esActivo2 ? 'kt-pagination__link--active': '']"
                                  v-for="(pagina,index) in numeroDePaginas2"
                                  :key="index"
                                >
                                  <a href="javascript:;" @click.prevent="cambiarPaginas2(pagina)">{{pagina}}</a>
                                </li>
                                <li
                                  class="kt-pagination__link--prev"
                                  v-if="paginacion2.pagina_actual<paginacion2.ultima_pagina"
                                >
                                  <a
                                    href="javascript:;"
                                    @click.prevent="cambiarPaginas2(paginacion2.pagina_actual+1)"
                                  >
                                    <i class="fa fa-angle-right kt-font-danger"></i>
                                  </a>
                                </li>
                                <li
                                  class="kt-pagination__link--last"
                                  v-if="paginacion2.pagina_actual<paginacion2.ultima_pagina"
                                >
                                  <a
                                    href="javascript:;"
                                    @click.prevent="cambiarPaginas2(paginacion2.ultima_pagina)"
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
            </div>
            <!-- ESTABLECIMIENTOS -->
          </b-tab>
          <b-tab title="UNIDADES PRODUCTIVAS">
            <!-- UNIDADES PRODUCTIVAS -->
            <div
              class="kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile"
              style="padding: 20px"
            >
              <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                  <h3 class="kt-portlet__head-title">
                    <span class="kt-widget20__number kt-font-danger">GESTIÓN DE UNIDADES PRODUCTIVAS</span>
                  </h3>
                </div>
              </div>
              <hr>
              <br>
              <div class="kt-portlet__body">
                <div class="kt-section">
                  <div class="kt-section__content">
                    <div class="row">
                      <div class="col-md-6 col-lg-6">
                        <div class="kt-section">
                          <div class="kt-section__content">
                            <a
                              class="btn btn-outline-primary btn-icon"
                              href="javascript:;"
                              title="Nueva Unidad Productiva"
                              @click="abrir3"
                            >
                              <i class="la la-file-text-o"></i>
                            </a>
                            <a
                              class="btn btn-outline-warning btn-icon"
                              href="javascript:;"
                              title="Exportar a Pdf"
                              @click="exportarUnidades"
                            >
                              <i class="la la-file-pdf-o"></i>
                            </a>
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
                                v-model="txtbusqueda3"
                              />
                              <div class="input-group-append">
                                <button
                                  type="button"
                                  class="btn btn-primary btn-icon"
                                  @click="consultar3(1)"
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
                      <div class="col-lg-12">
                        <div class="table-responsive">
                          <table class="table table-sm table-hover">
                            <thead class>
                              <tr class="kt-bg-fill-brand">
                                <th>No.</th>
                                <th>Departamento</th>
                                <th>Municipio</th>
                                <th>Corregimiento</th>
                                <th>Nombre de la Finca</th>
                                <th>Identificación</th>
                                <th>Productor</th>
                                <td class="text-center">Opciones</td>
                              </tr>
                            </thead>
                            <tbody>
                              <tr v-for="(item, index) in unidades" :key="index">
                                <td style="font-weight: normal;vertical-align: middle;">{{ (index+1) }}</td>
                                <td
                                  style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                                >{{item.DPTO.toUpperCase()}}</td>
                                <td
                                  style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                                >{{item.MUNI.toUpperCase()}}</td>
                                <td
                                  v-if="item.CORREGIMIENTO!==null"
                                  style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                                >{{item.CORREGIMIENTO.toUpperCase()}}</td>
                                <td
                                  v-else
                                  style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                                ></td>
                                <td
                                  style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                                >{{item.nom_finca.toUpperCase()}}</td>
                                <td
                                  style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                                >{{item.identificacion.toUpperCase()}}</td>
                                <td
                                  style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                                >{{item.nom_productor.toUpperCase()}}</td>
                                <td style="text-align:center;vertical-align: middle;text-align: center;">
                                  <button
                                    type="button"
                                    class="btn btn-outline-success btn-icon btn-sm"
                                    title="Imprimir"
                                    @click="exportarUnidad(item)"
                                  >
                                    <i class="fa fa-file-pdf"></i>
                                  </button>
                                  <button
                                    type="button"
                                    class="btn btn-outline-info btn-icon btn-sm"
                                    title="Editar"
                                    @click="editar3(item)"
                                  >
                                    <i class="fa fa-edit"></i>
                                  </button>
                                  <button
                                    class="btn btn-icon btn-sm"
                                    :class="(item.ESTADO=='Activo'?'btn-outline-danger':'btn-outline-success')"
                                    type="button"
                                    :title="(item.ESTADO=='Activo')?'Anular':'Activar'"
                                    @click="eliminar3(item)"
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
                                <li class="kt-pagination__link--first" v-if="paginacion3.pagina_actual>1">
                                  <a href="javascript:;" @click.prevent="cambiarPaginas3(1)">
                                    <i class="fa fa-angle-double-left kt-font-danger"></i>
                                  </a>
                                </li>
                                <li class="kt-pagination__link--next" v-if="paginacion3.pagina_actual>1">
                                  <a
                                    href="javascript:;"
                                    @click.prevent="cambiarPaginas3(paginacion3.pagina_actual-1)"
                                  >
                                    <i class="fa fa-angle-left kt-font-danger"></i>
                                  </a>
                                </li>
                                <li
                                  :class="[pagina==esActivo3 ? 'kt-pagination__link--active': '']"
                                  v-for="(pagina,index) in numeroDePaginas3"
                                  :key="index"
                                >
                                  <a href="javascript:;" @click.prevent="cambiarPaginas3(pagina)">{{pagina}}</a>
                                </li>
                                <li
                                  class="kt-pagination__link--prev"
                                  v-if="paginacion3.pagina_actual<paginacion3.ultima_pagina"
                                >
                                  <a
                                    href="javascript:;"
                                    @click.prevent="cambiarPaginas3(paginacion3.pagina_actual+1)"
                                  >
                                    <i class="fa fa-angle-right kt-font-danger"></i>
                                  </a>
                                </li>
                                <li
                                  class="kt-pagination__link--last"
                                  v-if="paginacion3.pagina_actual<paginacion3.ultima_pagina"
                                >
                                  <a
                                    href="javascript:;"
                                    @click.prevent="cambiarPaginas3(paginacion3.ultima_pagina)"
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
            </div>
            <!-- UNIDADES PRODUCTIVAS -->
          </b-tab>
        </b-tabs>
      </b-card>
    </div>
    
  </div>
</template>

<script>
  "use strict";
  import * as caracterizacionServicios from "../../Servicios/caracterizacion_servicios";
  import * as establecimientosServicios from "../../Servicios/establecimientos_servicios";
  import * as unidadesServicios from "../../Servicios/unidades_servicios";
  import html2canvas from "html2canvas";
  import jsPDF from "jspdf";
  import store from "../../store";
  import Loading from "vue-loading-overlay";

  export default {
    mounted() {
      this.consultar(1);
      this.consultar2(1);
      this.consultar3(1);
    },
    components: {
      Loading
    },
    data() {
      return {
        caracterizacion: [],
        caracterizacion2: [],
        nombreCaracterizacion2: "",
        caracterizacion3: [],
        integrantes: [],
        txtbusqueda: "",
        txtbusqueda2: "",
        txtbusqueda3: "",
        bandera: false,
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
        paginacion2: {
          total: 0,
          pagina_actual: 0,
          por_pagina: 0,
          ultima_pagina: 0,
          desde: 0,
          hasta: 0
        },
        paginacion3: {
          total: 0,
          pagina_actual: 0,
          por_pagina: 0,
          ultima_pagina: 0,
          desde: 0,
          hasta: 0
        },
        offset: 4,
        establecimientos: [],
        unidades: [],
        pdf_caracterizacion: "",
        isLoading: false,
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
      esActivo2: function() {
        return this.paginacion2.pagina_actual;
      },
      numeroDePaginas2: function() {
        if (!this.paginacion2.hasta) {
          return [];
        }
        var desde = this.paginacion2.pagina_actual - this.offset; // TODO offset
        if (desde < 1) {
          desde = 1;
        }
        var aux = this.offset * 2;
        var hasta = desde + aux;
        if (hasta >= this.paginacion2.ultima_pagina) {
          hasta = this.paginacion2.ultima_pagina;
        }
        var paginasArray = [];
        while (desde <= hasta) {
          paginasArray.push(desde);
          desde++;
        }
        return paginasArray;
      },
      esActivo3: function() {
        return this.paginacion3.pagina_actual;
      },
      numeroDePaginas3: function() {
        if (!this.paginacion3.hasta) {
          return [];
        }
        var desde = this.paginacion3.pagina_actual - this.offset; // TODO offset
        if (desde < 1) {
          desde = 1;
        }
        var aux = this.offset * 2;
        var hasta = desde + aux;
        if (hasta >= this.paginacion3.ultima_pagina) {
          hasta = this.paginacion3.ultima_pagina;
        }
        var paginasArray = [];
        while (desde <= hasta) {
          paginasArray.push(desde);
          desde++;
        }
        return paginasArray;
      }
    },
    methods: {
      cambiarPaginas: function(pagina) {
        this.paginacion.pagina_actual = pagina;
        this.consultar(pagina);
      },
      cambiarPaginas2: function(pagina) {
        this.paginacion2.pagina_actual = pagina;
        this.consultar2(pagina);
      },
      cambiarPaginas3: function(pagina) {
        this.paginacion3.pagina_actual = pagina;
        this.consultar3(pagina);
      },
      consultar: async function(pagina) {
        const parametros = {
          txtbusqueda: this.txtbusqueda.trim(),
          _token: this.csrf,
          page: pagina
        };
        try {
          await caracterizacionServicios
            .listarCaracterizacion(parametros)
            .then(respuesta => {
              this.caracterizacion = respuesta.data.caracterizacion.data;
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
      consultar2: async function(pagina) {
        const parametros = {
          txtbusqueda: this.txtbusqueda2.trim(),
          _token: this.csrf,
          page: pagina
        };
        try {
          await establecimientosServicios.listar(parametros).then(respuesta => {
            this.establecimientos = respuesta.data.establecimientos.data;
            this.paginacion2 = respuesta.data.paginacion;
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
      consultar3: async function(pagina) {
        const parametros = {
          txtbusqueda: this.txtbusqueda3.trim(),
          _token: this.csrf,
          page: pagina
        };
        try {
          await unidadesServicios.listar(parametros).then(respuesta => {
            this.unidades = respuesta.data.unidades.data;
            this.paginacion3 = respuesta.data.paginacion;
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
      eliminar: async function(usu) {
        var title = "";
        var titulo = "";
        if (usu.ESTADO == "Activo") {
          title =
            "¿Desea anular la caracterización del usuario " + usu.USUARIO + "?";
          titulo =
            "Caracterización del usuario " +
            usu.USUARIO +
            " anulado de manera exitosa";
        } else {
          title =
            "¿Desea activar la caracterización del usuario " + usu.USUARIO + "?";
          titulo =
            "Caracterización del usuario " +
            usu.USUARIO +
            " activado de manera exitosa";
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
              id_hogar: usu.IDHOGAR,
              id: usu.id,
              estado: usu.ESTADO,
              opcion: "CARACTERIZACION"
            };

            try {
              caracterizacionServicios
                .eliminarCaracterizacion(parametros)
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
      eliminar2: async function(usu) {
        var title = "";
        var titulo = "";
        if (usu.ESTADO == "Activo") {
          title = "¿Desea anular el establecimiento " + usu.razon + "?";
          titulo = "Establecimiento " + usu.razon + " anulado de manera exitosa";
        } else {
          title = "¿Desea activar el establecimiento " + usu.razon + "?";
          titulo = "Establecimiento " + usu.razon + " activado de manera exitosa";
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
              establecimientosServicios
                .eliminar(parametros)
                .then(respuesta => {
                  this.consultar2(1);
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
      eliminar3: async function(usu) {
        var title = "";
        var titulo = "";
        if (usu.ESTADO == "Activo") {
          title = "¿Desea anular la unidad productiva del productor " + usu.nom_productor + "?";
          titulo = "Unidad productiva del productor " + usu.nom_productor + " anulada de manera exitosa";
        } else {
          title = "¿Desea activar la unidad productiva del productor " + usu.nom_productor + "?";
          titulo = "Unidad productiva del productor " + usu.nom_productor + " activada de manera exitosa";
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
              unidadesServicios
                .eliminar(parametros)
                .then(respuesta => {
                  this.consultar3(1);
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
      ExportarTodo: async function() {
        const doc = new jsPDF({
          // orientation: "landscape"
          orientation: "portrait"
        });
        var canvasElement = document.createElement("canvas");
        html2canvas(this.$refs.content, { canvas: canvasElement }).then(function(
          canvas
        ) {
          const img = canvas.toDataURL("image/jpeg");
          // doc.setFontSize(22);
          // doc.text(20, 20, "This is a title");
          doc.addImage(img, "JPEG", 5, 20);
          doc.save("Listado de Usuarios.pdf");
        });
        this.$swal({
          position: "top-end",
          icon: "success",
          title: "Datos exportados a pdf de manera exitosa",
          showConfirmButton: false,
          timer: 2000
        });
      },
      DescargarPdf(response) {
        let newBlob = new Blob([response.data], { type: "application/pdf" });
        const data = window.URL.createObjectURL(newBlob);
        if (window.navigator && window.navigator.msSaveOrOpenBlob) {
          window.navigator.msSaveOrOpenBlob(newBlob);
          return;
        }
        let link = document.createElement("a");
        link.href = data;
        link.download = "Caracterizacion.pdf";
        link.click();
        link.remove();
        setTimeout(function() {
          window: URL.revokeObjectURL(data);
        }, 100);
      },
      cerrarModal() {
        this.$refs.modalExportar.hide();
        this.$refs.modalExportar2.hide();
        this.$refs.modalAbrir.hide();
      },
      abrirModal: async function() {
        const parametros = {
          _token: this.csrf
        };
        try {
          caracterizacionServicios
            .exportarCaracterizacion(parametros)
            .then(respuesta => {
              this.nombreCaracterizacion2 = respuesta.data.nombre 
              this.caracterizacion2 = respuesta.data.caracterizacion;
              this.$refs.modalExportar.show();
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
      },
      abrirModal2: async function(item) {
        this.isLoading = true;
        const parametros = {
          _token: this.csrf,
          id: item.id
        };
        try {
          caracterizacionServicios
            .exportarCaracterizacion2(parametros)
            .then(respuesta => {
              console.log(respuesta.data.integrantes);
              this.caracterizacion3 = respuesta.data.caracterizacion;
              this.integrantes = respuesta.data.integrantes;
              this.pdf_caracterizacion = store.state.apiURL + respuesta.data.nombre;
              this.isLoading = false;
              this.$refs.modalExportar2.show();
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
      },
      exportarEstablecimientosPDF: async function() {
        this.isLoading = true;
        const parametros = {
          _token: this.csrf,
        };
        try {
          establecimientosServicios
            .exportarEstablecimientosPDF(parametros)
            .then(respuesta => {
              this.pdf_caracterizacion = store.state.apiURL + respuesta.data.nombre;
              this.isLoading = false;
              this.$refs.modalExportar2.show();
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
      },
      exportarEstablecimientoPDF: async function(item) {
        this.isLoading = true;
        const parametros = {
          _token: this.csrf,
          id: item.id
        };
        try {
          establecimientosServicios
            .exportarEstablecimientoPDF(parametros)
            .then(respuesta => {
              this.pdf_caracterizacion = store.state.apiURL + respuesta.data.nombre;
              this.isLoading = false;
              this.$refs.modalExportar2.show();
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
      },
      exportarUnidades: async function() {
        this.isLoading = true;
        const parametros = {
          _token: this.csrf,
        };
        try {
          unidadesServicios
            .exportarUnidades(parametros)
            .then(respuesta => {
              this.pdf_caracterizacion = store.state.apiURL + respuesta.data.nombre;
              this.isLoading = false;
              this.$refs.modalExportar2.show();
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
      },
      exportarUnidad: async function(item) {
        this.isLoading = true;
        const parametros = {
          _token: this.csrf,
          id: item.id
        };
        try {
          unidadesServicios
            .exportarUnidad(parametros)
            .then(respuesta => {
              this.pdf_caracterizacion = store.state.apiURL + respuesta.data.nombre;
              this.isLoading = false;
              this.$refs.modalExportar2.show();
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
      },
      abrir() {
        // this.$refs.modalAbrir.show();
        this.$router.push({
          name: "Establecimientos",
          params: {
            IDHOGAR: 0
          }
        });
      },
      seleccionarOpcion(opcion) {
        if (opcion === "ingreso") {
          this.$router.push({
            name: "Ingreso"
          });
        } else {
          this.$router.push({
            name: "Establecimientos",
            params: {
              IDHOGAR: 0
            }
          });
        }
      },
      editar(item) {
        this.$router.push({
          name: "Editar",
          params: {
            IDHOGAR: item.IDHOGAR
          }
        });
      },
      editar2(item) {
        this.$router.push({
          name: "EditarEstablecimientos",
          params: {
            id: item.id,
            IDHOGAR: item.IDHOGAR
          }
        });
      },
      editar3(item) {
        this.$router.push({
          name: "EditarUnidades",
          params: {
            id: item.id,
            IDHOGAR: item.IDHOGAR
          }
        });
      },      
      abrir3() {
        // this.$refs.modalAbrir.show();
        this.$router.push({
          name: "Unidades",
          params: {
            IDHOGAR: 0
          }
        });
      },
      onCancel(){

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
  .modal-sm {
    max-width: 40%;
  }

  .nav-pills, .nav-tabs {
    margin: 0 0 -10px 0 !important;
  }

</style>