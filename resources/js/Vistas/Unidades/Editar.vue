<template>
  <div>
    <div class="kt-portlet" style="margin-top: -4%;">
      <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
          <h3 class="kt-portlet__head-title">
            <span class="kt-widget20__number kt-font-danger">GESTIÓN DE UNIDADES PRODUCTIVAS</span>
          </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
          <a href="#" class="btn btn-danger kt-margin-r-10" @click.prevent="volver">
            <i class="la la-arrow-left"></i>
            <span class="kt-hidden-mobile">Volver</span>
          </a>
          <div class="btn-group">
            <button
              type="button"
              class="btn btn-brand"
              @click.prevent="guardar"
              :disabled="!valG"
              :class="spinG"
            >
              <i class="la la-edit"></i>
              <span class="kt-hidden-mobile">Guardar</span>
            </button>
          </div>
        </div>
      </div>
      <div class="kt-portlet__body">
        <div class="kt-section">
          <div class="kt-section__content">
            <div class="form-group row">
              <div class="col-lg-4">
                <label>Departamento (*):</label>
                <b-form-select
                  v-model.trim="datos.id_dpto"
                  :class="datos.id_dpto==''?'is-invalid':'is-valid'"
                  @change="cambiarCombo('dpto')"
                  ref="id_dpto"
                >
                  <option value selected>Seleccione</option>
                  <option
                    v-for="item in dpto_options"
                    :value="item.value"
                    :key="item.value"
                  >{{item.texto}}</option>
                </b-form-select>
                <div class="valid-feedback" v-if="datos.id_dpto!=''">Departamento Valido</div>
                <div class="invalid-feedback">
                  <span v-if="datos.id_dpto==''">El departamento es obligatorio</span>
                </div>
              </div>
              <div class="col-lg-4">
                <label>Municipio (*):</label>
                <b-form-select
                  v-model.trim="datos.id_mun"
                  :class="datos.id_mun==''?'is-invalid':'is-valid'"
                  @change="cambiarCombo('muni')"
                  ref="id_mun"
                >
                  <option value selected>Seleccione</option>
                  <option
                    v-for="item in muni_options[datos.id_dpto]"
                    :value="item.value"
                    :key="item.value"
                  >{{item.texto}}</option>
                </b-form-select>
                <div class="valid-feedback" v-if="datos.id_mun!=''">Municipio Valido</div>
                <div class="invalid-feedback">
                  <span v-if="datos.id_mun==''">El municipio es obligatorio</span>
                </div>
              </div>
              <div class="col-lg-4">
                <label>Corregimiento:</label>
                <b-form-select
                  v-model="datos.id_corre"
                  @change="cambiarCombo('corregi')"
                  :class="datos.id_corre==''?'is-invalid':'is-valid'"
                  ref="id_corre"
                >
                  <option value selected>Seleccione</option>
                  <option value="0">No Aplica</option>
                  <option
                    v-for="item in corregi_options[datos.id_mun]"
                    :value="item.value"
                    :key="item.value"
                  >{{item.texto}}</option>
                </b-form-select>
                <div class="valid-feedback" v-if="datos.id_corre!=''">Corregimiento Valido</div>
                <div class="invalid-feedback">
                  <span v-if="datos.id_corre==''">El corregimiento es obligatorio</span>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4">
                <label>Vereda:</label>
                <b-form-select
                  v-model="datos.id_vereda"
                  :class="datos.id_vereda==''?'is-invalid':'is-valid'"
                  @change="cambiarCombo('vereda')"
                  ref="id_vereda"
                >
                  <option value selected>Seleccione</option>
                  <option value="0">No Aplica</option>
                  <option
                    v-for="item in vereda_options[datos.id_corre]"
                    :value="item.value"
                    :key="item.value"
                  >{{item.texto}}</option>
                </b-form-select>
                <div class="valid-feedback" v-if="datos.id_vereda!=''">Vereda Valida</div>
              </div>
              <div class="col-lg-4">
                <label>Barrio:</label>
                <b-form-select
                  v-model="datos.id_barrio"
                  :class="datos.id_barrio==''?'is-invalid':'is-valid'"
                  ref="id_barrio"
                >
                  <option value selected>Seleccione</option>
                  <option value="0">No Aplica</option>
                  <option
                    v-for="item in barrio_options"
                    :value="item.value"
                    :key="item.value"
                  >{{item.texto}}</option>
                </b-form-select>
                <div class="valid-feedback" v-if="datos.id_barrio!=''">Barrio Valido</div>
              </div>
            </div>
            <div class="form-group row" style="display: none;">
              <div class="col-lg-12">
                <label>Dirección:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Dirección"
                  v-model.trim="datos.direccion"
                  :class="datos.direccion==''?'is-invalid':'is-valid'"
                  ref="direccion"
                />
                <div class="valid-feedback" v-if="datos.direccion!=''">La Dirección es Valida</div>
                <div class="invalid-feedback">
                  <span v-if="datos.direccion==''">La dirección es obligatoria</span>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4">
                <label>Tipo de Documento (*):</label>
                <b-form-select
                  v-model.trim="datos.tipo_id"
                  :class="datos.tipo_id==''?'is-invalid':'is-valid'"
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
                <div class="valid-feedback" v-if="datos.tipo_id!=''">Tipo de Documento es Valido</div>
                <div class="invalid-feedback">
                  <span v-if="datos.tipo_id==''">Tipo de Documento es obligatorio</span>
                </div>
              </div>
              <div class="col-lg-4">
                <label>Documento (*):</label>
                <input
                  type="text"
                  ref="identificacion"
                  class="form-control text-capitalize"
                  placeholder="Documento"
                  @change="formato('id1')"
                  v-model.trim="datos.identificacion"
                  :class="datos.identificacion==''?'is-invalid':'is-valid'"
                />
                <div class="valid-feedback" v-if="datos.identificacion!=''">Documento es Valido</div>
                <div class="invalid-feedback">
                  <span v-if="datos.identificacion==''">Documento es obligatorio</span>
                </div>
              </div>
              <div class="col-lg-4">
                <label>Nivel Educativo:</label>
                <b-form-select
                  v-model="datos.nivel_educativo"
                  :class="datos.nivel_educativo==''?'is-invalid':'is-valid'"
                >
                  <option value selected>Seleccione</option>
                  <option
                    v-for="item in escolaridad_options"
                    :value="item.value"
                    :key="item.value"
                  >{{item.texto}}</option>
                </b-form-select>
                <div
                  class="valid-feedback"
                  v-if="datos.nivel_educativo!=''"
                >Nivel Educativo es Valido</div>
                <div class="invalid-feedback">
                  <span v-if="datos.nivel_educativo==''">Nivel Educativo es obligatorio</span>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-12">
                <label>Productor:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Productor"
                  v-model.trim="datos.nom_productor"
                  :class="datos.nom_productor==''?'is-invalid':'is-valid'"
                  ref="nom_productor"
                />
                <div class="valid-feedback" v-if="datos.nom_productor!=''">Productor es Valido</div>
                <div class="invalid-feedback">
                  <span v-if="datos.nom_productor==''">Productor es obligatorio</span>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-10">
                <label>Nombre de la Finca:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Nombre de la Finca"
                  v-model.trim="datos.nom_finca"
                  :class="datos.nom_finca==''?'is-invalid':'is-valid'"
                  ref="nom_finca"
                />
                <div class="valid-feedback" v-if="datos.nom_finca!=''">Nombre de la Finca es Valida</div>
                <div class="invalid-feedback">
                  <span v-if="datos.nom_finca==''">Nombre de la Finca es obligatoria</span>
                </div>
              </div>
              <div class="col-lg-2">
                <label>Hogares en la Finca:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Hogares en la Finca"
                  v-model.trim="datos.hogares_finca"
                  :class="datos.hogares_finca==''?'':'is-valid'"
                  ref="hogares_finca"
                  @change="formato('hogares_finca')"
                />
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-12">
                <label>Línea productiva:</label>
                <multiselect
                  v-model="datos.linea_productiva"
                  :options="lineas"
                  :multiple="true"
                  :close-on-select="false"
                  :clear-on-select="false"
                  :preserve-search="true"
                  placeholder="Seleccione una linea productiva"
                  label="texto"
                  track-by="texto"
                  :class="datos.linea_productiva==''?'':'is-valid'"
                ></multiselect>
                <!-- <pre class="language-json"><code>{{ datos.linea_productiva }}</code></pre> -->
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-3">
                <label>Area de la Finca:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Area de la Finca"
                  v-model.trim="datos.area_total_finca"
                  :class="datos.area_total_finca==''?'':'is-valid'"
                  ref="area_total_finca"
                  @change="formato('area_total_finca')"
                />
              </div>
              <div class="col-lg-3">
                <label>Unidad de Medida:</label>
                <b-form-select
                  v-model="datos.unidad_area"
                  :class="datos.unidad_area==''?'':'is-valid'"
                  ref="unidad_area"
                >
                  <option value selected>Seleccione</option>
                  <option value="1">Kilómetro cuadrado.</option>
                  <option value="2">Metro cuadrado.</option>
                  <option value="3">Milla cuadrada.</option>
                  <option value="4">Yarda cuadrada.</option>
                  <option value="5">Pie cuadrado.</option>
                  <option value="6">Pulgada cuadrada.</option>
                  <option value="7">Hectárea.</option>
                  <option value="8">Acre.</option>
                </b-form-select>
              </div>
              <div class="col-lg-3">
                <label>Distancia de la Finca:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Distancia de la Finca"
                  v-model.trim="datos.distancia_finca"
                  :class="datos.distancia_finca==''?'':'is-valid'"
                  ref="distancia_finca"
                  @change="formato('distancia_finca')"
                />
              </div>
              <div class="col-lg-3">
                <label>Unidad de Medida:</label>
                <b-form-select
                  v-model="datos.unidad_distancia"
                  :class="datos.unidad_distancia==''?'':'is-valid'"
                  ref="unidad_distancia"
                >
                  <option value selected>Seleccione</option>
                  <option value="1">Kilómetros.</option>
                  <option value="2">Metros.</option>
                </b-form-select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-3">
                <label>Tenencia de la Propiedad:</label>
                <b-form-select
                  v-model="datos.tenencia_propiedad"
                  :class="datos.tenencia_propiedad==''?'':'is-valid'"
                  ref="tenencia_propiedad"
                >
                  <option value selected>Seleccione</option>
                  <option value="1">Arrendamiento.</option>
                  <option value="2">Propio.</option>
                  <option value="3">Aparecería.</option>
                  <option value="4">Comodato.</option>
                  <option value="5">Usufructo.</option>
                  <option value="6">Propietario sin título.</option>
                  <option value="7">Propietarios con Titulo.</option>
                  <option value="8">Anticresis.</option>
                  <option value="9">Tenedor.</option>
                  <option value="10">Adjudicaría o común.</option>
                  <option value="11">Empeño.</option>
                  <option value="12">Ocupación de hecho.</option>
                  <option value="13">Posesión.</option>
                  <option value="14">Propiedad Colectiva.</option>
                </b-form-select>
              </div>
              <div class="col-lg-3">
                <label>Quien Atiende la Entrevista:</label>
                <b-form-select
                  v-model="datos.atiende_entrevista"
                  :class="datos.atiende_entrevista==''?'':'is-valid'"
                  ref="atiende_entrevista"
                >
                  <option value selected>Seleccione</option>
                  <option value="1">Pariente.</option>
                  <option value="2">Productor.</option>
                  <option value="3">Trabajador.</option>
                </b-form-select>
              </div>
              <div class="col-lg-3">
                <label>¿Posee crédito de producción?:</label>
                <b-form-select
                  v-model="datos.credito_produccion"
                  :class="datos.credito_produccion==''?'':'is-valid'"
                  ref="credito_produccion"
                  @change="mostrarOtro('CP')"
                >
                  <option value selected>Seleccione</option>
                  <option value="SI">SI.</option>
                  <option value="NO">NO.</option>
                </b-form-select>
              </div>
              <div class="col-lg-3" v-show="mOCP">
                <label>Fuentes del préstamo:</label>
                <b-form-select
                  v-model="datos.fuentes_prestamo"
                  :class="datos.fuentes_prestamo==''?'':'is-valid'"
                  ref="fuentes_prestamo"
                  @change="mostrarOtro('FP')"
                >
                  <option value selected>Seleccione</option>
                  <option value="1">Bancos</option>
                  <option value="2">Entidades Estatales</option>
                  <option value="3">Familiares</option>
                  <option value="4">Agremiaciones</option>
                  <option value="5">Prestamistas</option>
                  <option value="6">Empresas de insumos</option>
                  <option value="7">Otra</option>
                  <option value="NA">No Aplica</option>
                </b-form-select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4" v-show="mOFP">
                <label>Otra fuente de préstamo:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Otra fuente de préstamo"
                  v-model="datos.cual_fuente"
                />
              </div>
              <div class="col-lg-4">
                <label>¿El predio dispone de Vías de acceso?:</label>
                <b-form-select
                  v-model="datos.vias_acceso"
                  :class="datos.vias_acceso==''?'':'is-valid'"
                  ref="vias_acceso"
                >
                  <option value selected>Seleccione</option>
                  <option value="SI">SI</option>
                  <option value="NO">NO</option>
                </b-form-select>
              </div>
              <div class="col-lg-4">
                <label>Tipo de vías de acceso:</label>
                <b-form-select
                  v-model="datos.tipos_vias_acceso"
                  :class="datos.tipos_vias_acceso==''?'':'is-valid'"
                  ref="tipos_vias_acceso"
                >
                  <option value selected>Seleccione</option>
                  <option value="1">Pavimentadas.</option>
                  <option value="2">No pavimentadas.</option>
                  <option value="3">Fluviales.</option>
                  <option value="4">Aéreas.</option>
                </b-form-select>
              </div>
            </div>
            <p style="text-align: center;">
              <span class="kt-font-boldest" style="font-size: 20px;">MAQUINARIA Y EQUIPOS</span>
            </p>
            <p>
              <span class="kt-font-boldest" style="font-size: 18px;">Herramientas de la Producción</span>
            </p>
            <div class="form-group row">
              <div class="col-lg-4">
                <label>Herramienta:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Herramienta"
                  v-model="herramienta1"
                  v-show="herramienta=='Otras'"
                />
                <b-form-select
                  v-model="herramienta"
                  ref="herramienta"
                  v-show="herramienta!='Otras'"
                >
                  <option value selected>Seleccione</option>
                  <option value="Ahoyador">Ahoyador</option>
                  <option value="Carretilla">Carretilla</option>
                  <option value="Hacha">Hacha</option>
                  <option value="Palas">Palas</option>
                  <option value="Picas">Picas</option>
                  <option value="Trinche">Trinche</option>
                  <option value="Azadone">Azadone</option>
                  <option value="Guadañadora">Guadañadora</option>
                  <option value="Machete">Machete</option>
                  <option value="Palín">Palín</option>
                  <option value="Rastrillo">Rastrillo</option>
                  <option value="Otras">Otras</option>
                </b-form-select>
              </div>
              <div class="col-lg-2">
                <label>Cuantas:</label>
                <input
                  type="number"
                  min="1"
                  class="form-control text-capitalize"
                  placeholder="Cuantas"
                  v-model="cuantasHerramienta"
                />
              </div>
              <div class="col-lg-1">
                <br />
                <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <a
                  href="javascript:;"
                  class="btn btn-outline-info btn-icon"
                  data-skin="dark"
                  data-toggle="kt-tooltip"
                  data-placement="top"
                  title="Agregar"
                  @click.prevent="agregarHerramienta"
                >
                  <i class="fa fa-plus"></i>
                </a>&nbsp;
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                  <table class="table table-sm table-hover">
                    <thead class>
                      <tr class="kt-bg-fill-brand">
                        <th>No.</th>
                        <th>Herramientas</th>
                        <th>Cuantas</th>
                        <td class="text-center">Opciones</td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr
                        v-for="(item,index) in herramientasData"
                        :key="index"
                        v-show="item.estado=='Activo'"
                      >
                        <td style="font-weight: normal;vertical-align: middle;">{{ (index+1) }}</td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <span class="text-capitalize">{{item.herramienta}}</span>
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <span class="text-capitalize">{{item.cuantos}}</span>
                        </td>
                        <td style="text-align:center;vertical-align: middle;text-align: center;">
                          <button
                            class="btn btn-icon btn-sm btn-outline-danger"
                            type="button"
                            title="Eliminar"
                            @click="eliminarItemHerramientas(item, index)"
                          >
                            <i class="fa fa-trash"></i>
                          </button>
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

            <p>
              <span class="kt-font-boldest" style="font-size: 18px;">Utensilios de la Producción</span>
            </p>
            <div class="form-group row">
              <div class="col-lg-4">
                <label>Utensilio:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Utensilio"
                  v-model="utensilio1"
                  v-show="utensilio=='Otras'"
                />
                <b-form-select v-model="utensilio" ref="utensilio" v-show="utensilio!='Otras'">
                  <option value selected>Seleccione</option>
                  <option value="Arado">Arado</option>
                  <option value="Aspersores">Aspersores</option>
                  <option value="Fumigadora">Fumigadora</option>
                  <option value="Motosierra">Motosierra</option>
                  <option value="Otras">Otros</option>
                </b-form-select>
              </div>
              <div class="col-lg-2">
                <label>Cuantos:</label>
                <input
                  type="number"
                  min="1"
                  class="form-control text-capitalize"
                  placeholder="Cuantos"
                  v-model="cuantasUtensilio"
                />
              </div>
              <div class="col-lg-1">
                <br />
                <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <a
                  href="javascript:;"
                  class="btn btn-outline-info btn-icon"
                  data-skin="dark"
                  data-toggle="kt-tooltip"
                  data-placement="top"
                  title="Agregar"
                  @click.prevent="agregarUtensilio"
                >
                  <i class="fa fa-plus"></i>
                </a>&nbsp;
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                  <table class="table table-sm table-hover">
                    <thead class>
                      <tr class="kt-bg-fill-brand">
                        <th>No.</th>
                        <th>Utensilios</th>
                        <th>Cuantos</th>
                        <td class="text-center">Opciones</td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr
                        v-for="(item,index) in utensiliosData"
                        :key="index"
                        v-show="item.estado=='Activo'"
                      >
                        <td style="font-weight: normal;vertical-align: middle;">{{ (index+1) }}</td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <span class="text-capitalize">{{item.utensilio}}</span>
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <span class="text-capitalize">{{item.cuantos}}</span>
                        </td>
                        <td style="text-align:center;vertical-align: middle;text-align: center;">
                          <button
                            class="btn btn-icon btn-sm btn-outline-danger"
                            type="button"
                            title="Eliminar"
                            @click="eliminarItemUtensilios(item, index)"
                          >
                            <i class="fa fa-trash"></i>
                          </button>
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

            <p>
              <span class="kt-font-boldest" style="font-size: 18px;">Maquinaria de la Producción</span>
            </p>
            <div class="form-group row">
              <div class="col-lg-4">
                <label>Maquina:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Maquina"
                  v-model="maquina1"
                  v-show="maquina=='Otras'"
                />
                <b-form-select v-model="maquina" ref="maquina" v-show="maquina!='Otras'">
                  <option value selected>Seleccione</option>
                  <option value="Compresor">Compresor</option>
                  <option value="Picapasto">Picapasto</option>
                  <option value="Planta Eléctrica">Planta Eléctrica</option>
                  <option value="Taladro">Taladro</option>
                  <option value="Combinada">Combinada</option>
                  <option value="Tractor">Tractor</option>
                  <option value="Otras">Otros</option>
                </b-form-select>
              </div>
              <div class="col-lg-2">
                <label>Cuantas:</label>
                <input
                  type="number"
                  min="1"
                  class="form-control text-capitalize"
                  placeholder="Cuantas"
                  v-model="cuantasMaquina"
                />
              </div>
              <div class="col-lg-1">
                <br />
                <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <a
                  href="javascript:;"
                  class="btn btn-outline-info btn-icon"
                  data-skin="dark"
                  data-toggle="kt-tooltip"
                  data-placement="top"
                  title="Agregar"
                  @click.prevent="agregarMaquina"
                >
                  <i class="fa fa-plus"></i>
                </a>&nbsp;
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                  <table class="table table-sm table-hover">
                    <thead class>
                      <tr class="kt-bg-fill-brand">
                        <th>No.</th>
                        <th>Maquinas</th>
                        <th>Cuantas</th>
                        <td class="text-center">Opciones</td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr
                        v-for="(item,index) in maquinasData"
                        :key="index"
                        v-show="item.estado=='Activo'"
                      >
                        <td style="font-weight: normal;vertical-align: middle;">{{ (index+1) }}</td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <span class="text-capitalize">{{item.maquina}}</span>
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <span class="text-capitalize">{{item.cuantos}}</span>
                        </td>
                        <td style="text-align:center;vertical-align: middle;text-align: center;">
                          <button
                            class="btn btn-icon btn-sm btn-outline-danger"
                            type="button"
                            title="Eliminar"
                            @click="eliminarItemMaquinas(item, index)"
                          >
                            <i class="fa fa-trash"></i>
                          </button>
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
            <div class="kt-separator kt-separator--border-dashed"></div>
            <p style="text-align: center;">
              <span class="kt-font-boldest" style="font-size: 20px;">INSTALACIONES</span>
            </p>
            <p>
              <span class="kt-font-boldest" style="font-size: 18px;">Instalaciones del Predio</span>
            </p>
            <div class="form-group row">
              <div class="col-lg-4">
                <label>Instalación:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Instalación"
                  v-model="instalacion1"
                  v-show="instalacion=='Otras'"
                />
                <b-form-select
                  v-model="instalacion"
                  ref="instalacion"
                  v-show="instalacion!='Otras'"
                >
                  <option value selected>Seleccione</option>
                  <option value="Corrales">Corrales</option>
                  <option value="Galpones">Galpones</option>
                  <option value="Porquerizas">Porquerizas</option>
                  <option value="Establos">Establos</option>
                  <option value="Invernaderos">Invernaderos</option>
                  <option value="Trapiche">Trapiche</option>
                  <option value="Vivienda">Vivienda</option>
                  <option value="Bodega">Bodega</option>
                  <option value="Otras">Otros</option>
                </b-form-select>
              </div>
              <div class="col-lg-2">
                <label>Cuantas:</label>
                <input
                  type="number"
                  min="1"
                  class="form-control text-capitalize"
                  placeholder="Cuantas"
                  v-model="cuantasInstalacion"
                />
              </div>
              <div class="col-lg-1">
                <br />
                <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <a
                  href="javascript:;"
                  class="btn btn-outline-info btn-icon"
                  data-skin="dark"
                  data-toggle="kt-tooltip"
                  data-placement="top"
                  title="Agregar"
                  @click.prevent="agregarInstalacion"
                >
                  <i class="fa fa-plus"></i>
                </a>&nbsp;
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                  <table class="table table-sm table-hover">
                    <thead class>
                      <tr class="kt-bg-fill-brand">
                        <th>No.</th>
                        <th>Instalaciones</th>
                        <th>Cuantas</th>
                        <td class="text-center">Opciones</td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr
                        v-for="(item,index) in instalacionesData"
                        :key="index"
                        v-show="item.estado=='Activo'"
                      >
                        <td style="font-weight: normal;vertical-align: middle;">{{ (index+1) }}</td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <span class="text-capitalize">{{item.instalacion}}</span>
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <span class="text-capitalize">{{item.cuantos}}</span>
                        </td>
                        <td style="text-align:center;vertical-align: middle;text-align: center;">
                          <button
                            class="btn btn-icon btn-sm btn-outline-danger"
                            type="button"
                            title="Eliminar"
                            @click="eliminarItemInstalacion(item, index)"
                          >
                            <i class="fa fa-trash"></i>
                          </button>
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

            <div class="kt-separator kt-separator--border-dashed"></div>
            <p>
              <span
                class="kt-font-boldest"
                style="font-size: 18px;"
              >Medios de transporte con los que el productor se moviliza y/o transporta sus productos e insumos</span>
            </p>
            <div class="form-group row">
              <div class="col-lg-4">
                <label>Medio de Transporte:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Medio de Transporte"
                  v-model="medio1"
                  v-show="medio=='Otras'"
                />
                <b-form-select v-model="medio" ref="medio" v-show="medio!='Otras'">
                  <option value selected>Seleccione</option>
                  <option value="Tracción animal">Tracción animal</option>
                  <option value="Animal">Animal</option>
                  <option value="Vehiculo">Vehiculo</option>
                  <option value="Bicicleta">Bicicleta</option>
                  <option value="Caminata">Caminata</option>
                  <option value="Camión">Camión</option>

                  <option value="Motocicleta">Motocicleta</option>
                  <option value="Tractor">Tractor</option>
                  <option value="Barco">Barco</option>
                  <option value="Canoa">Canoa</option>
                  <option value="Kayak y/o Planchón">Kayak y/o Planchón</option>
                  <option value="Avión">Avión</option>
                  <option value="Avioneta">Avioneta</option>
                  <option value="Helicóptero">Helicóptero</option>
                  <option value="Planeador">Planeador</option>
                  <option value="Otras">Otros</option>
                </b-form-select>
              </div>
              <div class="col-lg-2">
                <label>Cuantos:</label>
                <input
                  type="number"
                  min="1"
                  class="form-control text-capitalize"
                  placeholder="Cuantos"
                  v-model="cuantasMedio"
                />
              </div>
              <div class="col-lg-1">
                <br />
                <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <a
                  href="javascript:;"
                  class="btn btn-outline-info btn-icon"
                  data-skin="dark"
                  data-toggle="kt-tooltip"
                  data-placement="top"
                  title="Agregar"
                  @click.prevent="agregarMedio"
                >
                  <i class="fa fa-plus"></i>
                </a>&nbsp;
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                  <table class="table table-sm table-hover">
                    <thead class>
                      <tr class="kt-bg-fill-brand">
                        <th>No.</th>
                        <th>Medio</th>
                        <th>Cuantos</th>
                        <td class="text-center">Opciones</td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr
                        v-for="(item,index) in mediosData"
                        :key="index"
                        v-show="item.estado=='Activo'"
                      >
                        <td style="font-weight: normal;vertical-align: middle;">{{ (index+1) }}</td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <span class="text-capitalize">{{item.medio}}</span>
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <span class="text-capitalize">{{item.cuantos}}</span>
                        </td>
                        <td style="text-align:center;vertical-align: middle;text-align: center;">
                          <button
                            class="btn btn-icon btn-sm btn-outline-danger"
                            type="button"
                            title="Eliminar"
                            @click="eliminarItemMedio(item, index)"
                          >
                            <i class="fa fa-trash"></i>
                          </button>
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
            <div class="kt-separator kt-separator--border-dashed"></div>
            <p style="text-align: center;">
              <span class="kt-font-boldest" style="font-size: 20px;">CULTIVOS AGRÍCOLAS.</span>
            </p>

            <div class="form-group row">
              <div class="col-lg-4">
                <label>Importancia del 1 al 10:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Importancia del 1 al 10"
                  v-model.trim="datosCulAgri.importancias_agricolas"
                  :class="datosCulAgri.importancias_agricolas==''?'':'is-valid'"
                  ref="importancias_agricolas"
                  @change="formato('importancias_agricolas')"
                />
              </div>
              <div class="col-lg-4">
                <label>Area de Producción:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Area de Producción"
                  v-model.trim="datosCulAgri.area_produccion"
                  :class="datosCulAgri.area_produccion==''?'':'is-valid'"
                  ref="area_produccion"
                  @change="formato('area_produccion')"
                />
              </div>
              <div class="col-lg-4">
                <label>Unidad de Medida:</label>
                <b-form-select
                  v-model="datosCulAgri.unidad_area_produccion"
                  :class="datosCulAgri.unidad_area_produccion==''?'':'is-valid'"
                  ref="unidad_area_produccion"
                >
                  <option value selected>Seleccione</option>
                  <option
                    v-for="item in unidades1"
                    :value="item.value"
                    :key="item.value"
                  >{{item.texto}}</option>
                </b-form-select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-6">
                <label>Tipo de Cultivo:</label>
                <b-form-select
                  v-model="datosCulAgri.producto"
                  :class="datosCulAgri.producto==''?'':'is-valid'"
                  ref="producto"
                >
                  <option value selected>Seleccione</option>
                  <option
                    v-for="item in tipocultivo"
                    :value="item.value"
                    :key="item.value"
                  >{{item.texto}}</option>
                </b-form-select>
              </div>
              <div class="col-lg-6">
                <label>Especie:</label>
                <b-form-select
                  v-model="datosCulAgri.variedad"
                  :class="datosCulAgri.variedad==''?'':'is-valid'"
                  ref="variedad"
                >
                  <option value selected>Seleccione</option>
                  <option
                    v-for="item in especie2[datosCulAgri.producto]"
                    :value="item.value"
                    :key="item.value"
                  >{{item.texto}}</option>
                </b-form-select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4">
                <label>Semilla:</label>
                <b-form-select
                  v-model="datosCulAgri.semilla"
                  :class="datosCulAgri.semilla==''?'':'is-valid'"
                  ref="semilla"
                >
                  <option value selected>Seleccione</option>
                  <option value="Certificada">Certificada.</option>
                  <option value="No Certificada">No Certificada.</option>
                </b-form-select>
              </div>
              <div class="col-lg-4">
                <label>¿Pertenece a alguna organización? :</label>
                <b-form-select
                  v-model="datosCulAgri.pertenece"
                  :class="datosCulAgri.pertenece==''?'':'is-valid'"
                  ref="pertenece"
                  @change="mostrarOtro('P')"
                >
                  <option value selected>Seleccione</option>
                  <option value="Asociaciones">Asociaciones.</option>
                  <option value="Cooperativas">Cooperativas.</option>
                  <option value="Agremiaciones">Agremiaciones.</option>
                  <option value="NO">NO</option>
                </b-form-select>
              </div>
              <div class="col-lg-4" v-show="mOP">
                <label>¿De qué tipo? :</label>
                <b-form-select
                  v-model="datosCulAgri.tipo_pertenece"
                  :class="datosCulAgri.tipo_pertenece==''?'':'is-valid'"
                  ref="tipo_pertenece"
                >
                  <option value selected>Seleccione</option>
                  <option value="Politico">Político.</option>
                  <option value="Social">Social.</option>
                  <option value="Tecnologico">Tecnológico.</option>
                  <option value="Asistencial">Asistencial.</option>
                  <option value="Salud">Salud.</option>
                  <option value="Comercial">Comercial.</option>
                  <option value="Etnia">Etnia.</option>
                  <option value="Cultural">Cultural.</option>
                  <option value="Deportiva">Deportiva.</option>
                  <option value="NA">No Aplica.</option>
                </b-form-select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-8" v-show="mOP">
                <label>Nombre de la organización:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Nombre de la organización"
                  v-model.trim="datosCulAgri.nombre_organizacion"
                  :class="datosCulAgri.nombre_organizacion==''?'':'is-valid'"
                  ref="nombre_organizacion"
                />
              </div>
              <div class="col-lg-5" v-show="mOP==false">
                <label>Razón por la cual no pertenece a ninguna organización:</label>
                <b-form-select
                  v-model="datosCulAgri.no_pertenece"
                  :class="datosCulAgri.no_pertenece==''?'':'is-valid'"
                  ref="no_pertenece"
                >
                  <option value selected>Seleccione</option>
                  <option
                    v-for="item in razon1"
                    :value="item.value"
                    :key="item.value"
                  >{{item.texto}}</option>
                </b-form-select>
              </div>
              <div class="col-lg-4">
                <label>Beneficios :</label>
                <b-form-select
                  v-model="datosCulAgri.beneficios"
                  :class="datosCulAgri.beneficios==''?'':'is-valid'"
                  ref="beneficios"
                >
                  <option value selected>Seleccione</option>
                  <option
                    v-for="item in beneficios"
                    :value="item.value"
                    :key="item.value"
                  >{{item.texto}}</option>
                </b-form-select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-6">
                <label>Trabaja en asociación para realizar las actividades productivas :</label>
                <b-form-select
                  v-model="datosCulAgri.trabaja_asociacion"
                  :class="datosCulAgri.trabaja_asociacion==''?'':'is-valid'"
                  ref="trabaja_asociacion"
                >
                  <option value selected>Seleccione</option>
                  <option value="SI">SI</option>
                  <option value="NO">NO</option>
                </b-form-select>
              </div>
              <div class="col-lg-6">
                <label>Para cada uno de los productos que tan frecuente se hace la cosecha :</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Para cada uno de los productos que tan frecuente se hace la cosecha"
                  v-model.trim="datosCulAgri.frecuente_cosecha"
                  :class="datosCulAgri.frecuente_cosecha==''?'':'is-valid'"
                  ref="frecuente_cosecha"
                />
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-2">
                <label>Unidad de Medida:</label>
                <b-form-select
                  v-model="datosCulAgri.unidad_frecuencia_cosecha"
                  :class="datosCulAgri.unidad_frecuencia_cosecha==''?'':'is-valid'"
                  ref="unidad_frecuencia_cosecha"
                >
                  <option value selected>Seleccione</option>
                  <option
                    v-for="item in unidades2"
                    :value="item.value"
                    :key="item.value"
                  >{{item.texto}}</option>
                </b-form-select>
              </div>
              <div class="col-lg-4">
                <label>Área de Cosecha de cada uno de los productos:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Área de Cosecha de cada uno de los productos"
                  v-model.trim="datosCulAgri.area_cosecha"
                  :class="datosCulAgri.area_cosecha==''?'':'is-valid'"
                  ref="area_cosecha"
                  @change="formato('area_cosecha')"
                />
              </div>
              <div class="col-lg-2">
                <label>Unidad de Medida:</label>
                <b-form-select
                  v-model="datosCulAgri.unidad_area_cosecha"
                  :class="datosCulAgri.unidad_area_cosecha==''?'':'is-valid'"
                  ref="unidad_area_cosecha"
                >
                  <option value selected>Seleccione</option>
                  <option
                    v-for="item in unidades1"
                    :value="item.value"
                    :key="item.value"
                  >{{item.texto}}</option>
                </b-form-select>
              </div>
              <div class="col-lg-4">
                <label>Costo total de la producción en pesos.:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Costo total de la producción en pesos."
                  v-model.trim="datosCulAgri.costo_produccion"
                  :class="datosCulAgri.costo_produccion==''?'':'is-valid'"
                  ref="costo_produccion"
                  @change="formato('costo_produccion')"
                />
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-6">
                <label>Costo de establecimiento de la producción:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Costo de establecimiento de la producción"
                  v-model.trim="datosCulAgri.costo_establecimiento"
                  :class="datosCulAgri.costo_establecimiento==''?'':'is-valid'"
                  ref="costo_establecimiento"
                  @change="formato('costo_establecimiento')"
                />
              </div>
              <div class="col-lg-6">
                <label>Costo de sostenimiento:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Costo de sostenimiento"
                  v-model.trim="datosCulAgri.costo_sostenimiento"
                  :class="datosCulAgri.costo_sostenimiento==''?'':'is-valid'"
                  ref="costo_sostenimiento"
                  @change="formato('costo_sostenimiento')"
                />
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-10">
                <label>Producción destinada al mercado:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Producción destinada al mercado"
                  v-model.trim="datosCulAgri.produccion_destinada"
                  :class="datosCulAgri.produccion_destinada==''?'':'is-valid'"
                  ref="produccion_destinada"
                />
              </div>
              <div class="col-lg-2">
                <label>Unidad de Medida:</label>
                <b-form-select
                  v-model="datosCulAgri.unidad_producion_destinada"
                  :class="datosCulAgri.unidad_producion_destinada==''?'':'is-valid'"
                  ref="unidad_producion_destinada"
                >
                  <option value selected>Seleccione</option>
                  <option
                    v-for="item in unidades3"
                    :value="item.value"
                    :key="item.value"
                  >{{item.texto}}</option>
                </b-form-select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4">
                <label>Tipo de problema que enfrenta en su producción:</label>
                <b-form-select
                  v-model="datosCulAgri.tipo_problema"
                  :class="datosCulAgri.tipo_problema==''?'':'is-valid'"
                  ref="tipo_problema"
                  @change="mostrarOtro('TPP')"
                >
                  <option value selected>Seleccione</option>
                  <option value="Sanitario">Sanitario.</option>
                  <option value="Rendimiento">Rendimiento.</option>
                  <option value="Comercialización">Comercialización.</option>
                  <option value="Ambiental">Ambiental.</option>
                  <option value="Otras">Otras.</option>
                </b-form-select>
              </div>
              <div class="col-lg-8" v-show="mOTPP">
                <label>Otros tipos de problemas:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Otros tipos de problemas"
                  v-model.trim="datosCulAgri.otro_tipo_problema"
                  :class="datosCulAgri.otro_tipo_problema==''?'':'is-valid'"
                  ref="otro_tipo_problema"
                />
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4">
                <label>Compradores:</label>
                <b-form-select
                  v-model="datosCulAgri.compradores"
                  :class="datosCulAgri.compradores==''?'':'is-valid'"
                  ref="compradores"
                >
                  <option value selected>Seleccione</option>
                  <option value="Acopiador">Acopiador.</option>
                  <option value="Transportador">Transportador.</option>
                  <option value="Detallista">Detallista.</option>
                  <option value="Transformador">Transformador.</option>
                  <option value="Cooperativa">Cooperativa.</option>
                  <option value="Consumidor final">Consumidor final.</option>
                </b-form-select>
              </div>
              <div class="col-lg-4" style="display: none;">
                <label>Precio promedio de venta kg:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Precio promedio de venta kg"
                  v-model.trim="datosCulAgri.precio_promedio_venta"
                  :class="datosCulAgri.precio_promedio_venta==''?'':'is-valid'"
                  ref="precio_promedio_venta"
                  @change="formato('precio_promedio_venta')"
                />
              </div>
              <div class="col-lg-4">
                <label>Método de pago.:</label>
                <b-form-select
                  v-model="datosCulAgri.metodo_pago"
                  :class="datosCulAgri.metodo_pago==''?'':'is-valid'"
                  ref="metodo_pago"
                >
                  <option value selected>Seleccione</option>
                  <option value="Efectivo">Efectivo.</option>
                  <option value="Trasferencia">Trasferencia.</option>
                  <option value="Cheque">Cheque.</option>
                  <option value="Trueque">Trueque.</option>
                </b-form-select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4">
                <label>Precio promedio de venta kg:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Precio promedio de venta kg"
                  v-model.trim="datosCulAgri.precio_promedio_venta_kg"
                  :class="datosCulAgri.precio_promedio_venta_kg==''?'':'is-valid'"
                  ref="precio_promedio_venta_kg"
                  @change="formato('precio_promedio_venta_kg')"
                />
              </div>
              <div class="col-lg-8">
                <label>Subproductos de la producción:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Subproductos de la producción"
                  v-model.trim="datosCulAgri.subproductos_produccion"
                  :class="datosCulAgri.subproductos_produccion==''?'':'is-valid'"
                  ref="subproductos_produccion"
                />
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4">
                <label>Pertenencia a Programas de Asistencia Técnica:</label>
                <b-form-select
                  v-model="datosCulAgri.programa_asistencia_tecnica"
                  :class="datosCulAgri.programa_asistencia_tecnica==''?'':'is-valid'"
                  ref="programa_asistencia_tecnica"
                  @change="mostrarOtro('PAT')"
                >
                  <option value selected>Seleccione</option>
                  <option value="SI">SI</option>
                  <option value="NO">NO</option>
                </b-form-select>
              </div>
              <div class="col-lg-4" v-show="mOPAT">
                <label>Nombre del programa:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Nombre del programa"
                  v-model.trim="datosCulAgri.nombre_programa"
                  :class="datosCulAgri.nombre_programa==''?'':'is-valid'"
                  ref="nombre_programa"
                />
              </div>
              <div class="col-lg-4" v-show="mOPAT">
                <label>Entidad:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Entidad"
                  v-model.trim="datosCulAgri.entidad"
                  :class="datosCulAgri.entidad==''?'':'is-valid'"
                  ref="entidad"
                />
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-7">
                <label>¿Durante el último año, ha realizado usted cambios en su producción en temas de innovación?:</label>
                <b-form-select
                  v-model="datosCulAgri.cambios_produccion_anio"
                  :class="datosCulAgri.cambios_produccion_anio==''?'':'is-valid'"
                  ref="cambios_produccion_anio"
                  @change="mostrarOtro('CTI')"
                >
                  <option value selected>Seleccione</option>
                  <option value="SI">SI</option>
                  <option value="NO">NO</option>
                </b-form-select>
              </div>
              <div class="col-lg-3" v-show="mOCTI">
                <label>¿En qué actividad realizó el cambio?:</label>
                <b-form-select
                  v-model="datosCulAgri.actividad_cambio"
                  :class="datosCulAgri.actividad_cambio==''?'':'is-valid'"
                  ref="actividad_cambio"
                >
                  <option value selected>Seleccione</option>
                  <option value="Produccion">Producción</option>
                  <option value="Transformacion">Transformación</option>
                  <option value="Comercializacion">Comercialización</option>
                  <option value="Organizacional">Organizacional</option>
                </b-form-select>
              </div>
              <div class="col-lg-1" v-if="bandeGuaEdiCA==true">
                <br />
                <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <a
                  href="javascript:;"
                  class="btn btn-outline-info btn-icon"
                  data-skin="dark"
                  data-toggle="kt-tooltip"
                  data-placement="top"
                  title="Agregar"
                  @click.prevent="agregarCA"
                >
                  <i class="fa fa-plus"></i>
                </a>&nbsp;
              </div>
              <div class="col-lg-1" v-if="bandeGuaEdiCA==false">
                <br />
                <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <a
                  href="javascript:;"
                  class="btn btn-outline-info btn-icon"
                  data-skin="dark"
                  data-toggle="kt-tooltip"
                  data-placement="top"
                  title="Editar"
                  @click.prevent="editarCA"
                >
                  <i class="fa fa-edit"></i>
                </a>&nbsp;
              </div>
              <div class="col-lg-1" v-if="bandeGuaEdiCA==false">
                <br />
                <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <a
                  href="javascript:;"
                  class="btn btn-outline-danger btn-icon"
                  data-skin="dark"
                  data-toggle="kt-tooltip"
                  data-placement="top"
                  title="Cancelar"
                  @click.prevent="CancelarEditarCA"
                >
                  <i class="fa fa-external-link-alt"></i>
                </a>&nbsp;
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                  <table class="table table-sm table-hover">
                    <thead class>
                      <tr class="kt-bg-fill-brand">
                        <th class="text-center">No.</th>
                        <th class="text-center">Importancia del 1 al 10</th>
                        <th class="text-center">Area de Producción</th>
                        <th class="text-center">Unidad de Medida</th>
                        <th class="text-center">Producto</th>
                        <th class="text-center">Variedad</th>
                        <th class="text-center">Semilla</th>
                        <th class="text-center">Organización</th>
                        <th class="text-center">De qué tipo</th>
                        <th class="text-center">Nombre de la organización</th>
                        <th class="text-center">Beneficios</th>
                        <th
                          class="text-center"
                        >Razón por la cual no pertenece a ninguna organización</th>
                        <th
                          class="text-center"
                        >Trabaja en asociación para realizar las actividades productivas</th>
                        <th
                          class="text-center"
                        >Para cada uno de los productos que tan frecuente se hace la cosecha</th>
                        <th class="text-center">Unidad de Medida</th>
                        <th class="text-center">Área de Cosecha de cada uno de los productos</th>
                        <th class="text-center">Unidad de Medida</th>
                        <th class="text-center">Costo total de la producción en pesos</th>
                        <th class="text-center">Costo de establecimiento de la producción</th>
                        <th class="text-center">Costo de sostenimiento</th>
                        <th class="text-center">Producción destinada al mercado</th>
                        <th class="text-center">Unidad de Medida</th>
                        <th class="text-center">Tipo de problema que enfrenta en su producción</th>
                        <th class="text-center">Otros tipos de problemas</th>
                        <th class="text-center">Compradores</th>
                        <th class="text-center">Método de pago</th>
                        <th class="text-center">Precio promedio de venta kg</th>
                        <th class="text-center">Subproductos de la producción</th>
                        <th class="text-center">Pertenencia a Programas de Asistencia Técnica</th>
                        <th class="text-center">Nombre del programa</th>
                        <th class="text-center">Entidad</th>
                        <th
                          class="text-center"
                        >Durante el último año, ha realizado usted cambios en su producción en temas de innovación</th>
                        <th class="text-center">En qué actividad realizó el cambio</th>
                        <td class="text-center">Opciones</td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr
                        v-for="(item,index) in cultivos_agricolas"
                        :key="index"
                        v-show="item.estado=='Activo'"
                      >
                        <td style="font-weight: normal;vertical-align: middle;">{{ (index+1) }}</td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.importancias_agricolas"
                            :class="item.importancias_agricolas==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.area_produccion"
                            :class="item.area_produccion==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.texto_unidad_area_produccion"
                            :class="item.texto_unidad_area_produccion==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.texto_producto"
                            :class="item.texto_producto==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.texto_variedad"
                            :class="item.texto_variedad==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.semilla"
                            :class="item.semilla==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.pertenece"
                            :class="item.pertenece==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.tipo_pertenece"
                            :class="item.tipo_pertenece==''?'':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.nombre_organizacion"
                            :class="item.nombre_organizacion==''?'':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.texto_beneficios"
                            :class="item.texto_beneficios==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.texto_no_pertenece"
                            :class="item.texto_no_pertenece==''?'':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.trabaja_asociacion"
                            :class="item.trabaja_asociacion==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.frecuente_cosecha"
                            :class="item.frecuente_cosecha==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.texto_unidad_frecuencia_cosecha"
                            :class="item.texto_unidad_frecuencia_cosecha==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.area_cosecha"
                            :class="item.area_cosecha==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.texto_unidad_area_cosecha"
                            :class="item.texto_unidad_area_cosecha==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.costo_produccion"
                            :class="item.costo_produccion==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.costo_establecimiento"
                            :class="item.costo_establecimiento==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.costo_sostenimiento"
                            :class="item.costo_sostenimiento==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.produccion_destinada"
                            :class="item.produccion_destinada==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.texto_unidad_producion_destinada"
                            :class="item.texto_unidad_producion_destinada==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>

                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.tipo_problema"
                            :class="item.tipo_problema==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.otro_tipo_problema"
                            :class="item.otro_tipo_problema==''?'':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.compradores"
                            :class="item.compradores==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.metodo_pago"
                            :class="item.metodo_pago==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.precio_promedio_venta_kg"
                            :class="item.precio_promedio_venta_kg==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.subproductos_produccion"
                            :class="item.subproductos_produccion==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.programa_asistencia_tecnica"
                            :class="item.programa_asistencia_tecnica==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.nombre_programa"
                            :class="item.nombre_programa==''?'':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.entidad"
                            :class="item.entidad==''?'':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.cambios_produccion_anio"
                            :class="item.cambios_produccion_anio==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.actividad_cambio"
                            :class="item.actividad_cambio==''?'':'is-valid'"
                            readonly
                          />
                        </td>
                        <td style="text-align:center;vertical-align: middle;text-align: center;">
                          <div style="width:70px;">
                            <button
                              class="btn btn-icon btn-sm btn-outline-danger"
                              type="button"
                              title="Eliminar"
                              @click="eliminarItemCA(item, index)"
                            >
                              <i class="fa fa-trash"></i>
                            </button>
                            <button
                              class="btn btn-icon btn-sm btn-outline-warning"
                              type="button"
                              title="Editar"
                              @click="editarItemCA(index,item)"
                            >
                              <i class="fa fa-edit"></i>
                            </button>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="kt-separator kt-separator--border-dashed"></div>
                </div>
              </div>
            </div>
            <div class="kt-separator kt-separator--border-dashed"></div>
            <p style="text-align: center;">
              <span
                class="kt-font-boldest"
                style="font-size: 20px;"
              >EXPLOTACIONES PECUARIAS - ESPECIE ANIMAL CON PERSPECTIVA COMERCIAL</span>
            </p>
            <div class="form-group row">
              <div class="col-lg-3">
                <label>Importancia del 1 al 10:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Importancia del 1 al 10"
                  v-model.trim="datosExpPec.importancia_comercial"
                  :class="datosExpPec.importancia_comercial==''?'':'is-valid'"
                  ref="importancia_comercial"
                  @change="formato('importancia_comercial')"
                />
              </div>
              <div class="col-lg-6">
                <label>Producto:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Producto"
                  v-model.trim="datosExpPec.producto_comercial"
                  :class="datosExpPec.producto_comercial==''?'':'is-valid'"
                  ref="producto_comercial"
                />
              </div>
              <div class="col-lg-3">
                <label>Raza ó Tipo:</label>
                <b-form-select
                  v-model="datosExpPec.raza"
                  :class="datosExpPec.raza==''?'':'is-valid'"
                  ref="raza"
                >
                  <option value selected>Seleccione</option>
                  <option v-for="item in raza" :value="item.value" :key="item.value">{{item.texto}}</option>
                </b-form-select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4">
                <label>Costo Total:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Costo total"
                  v-model.trim="datosExpPec.costo_total"
                  :class="datosExpPec.costo_total==''?'':'is-valid'"
                  ref="costo_total"
                  @change="formato('costo_total')"
                />
              </div>
              <div class="col-lg-4">
                <label>Costo de Establecer:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Costo de Establecer"
                  v-model.trim="datosExpPec.costo_establecer"
                  :class="datosExpPec.costo_establecer==''?'':'is-valid'"
                  ref="costo_establecer"
                  @change="formato('costo_establecer')"
                />
              </div>
              <div class="col-lg-4">
                <label>Costo Sostenimiento Explotación Pecuaria:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Costo Sostenimiento Explotación Pecuaria"
                  v-model.trim="datosExpPec.costo_pecuaria"
                  :class="datosExpPec.costo_pecuaria==''?'':'is-valid'"
                  ref="costo_pecuaria"
                  @change="formato('costo_pecuaria')"
                />
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-5">
                <label>Problemática de los productos con perspectiva comercial:</label>
                <b-form-select
                  v-model="datosExpPec.problematica_productos"
                  :class="datosExpPec.problematica_productos==''?'':'is-valid'"
                  ref="problematica_productos"
                  @change="mostrarOtro('PPP')"
                >
                  <option value selected>Seleccione</option>
                  <option value="Sanitario">Sanitario</option>
                  <option value="Rendimiento">Rendimiento</option>
                  <option value="Comercialización">Comercialización</option>
                  <option value="Ambiental">Ambiental</option>
                  <option value="Ninguna">Ninguna</option>
                  <option value="Otras">Otras</option>
                </b-form-select>
              </div>
              <div class="col-lg-7" v-show="mOPPP">
                <label>Otra Problematica de los productos con perspectiva comercial:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Otra Problematica de los productos con perspectiva comercial"
                  v-model.trim="datosExpPec.otra_problematica"
                  :class="datosExpPec.otra_problematica==''?'':'is-valid'"
                  ref="otra_problematica"
                />
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-12">
                <label>Producción:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Producción"
                  v-model.trim="datosExpPec.produccion"
                  :class="datosExpPec.produccion==''?'':'is-valid'"
                  ref="produccion"
                />
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-10">
                <label>Producción destinada al mercado:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Producción destinada al mercado"
                  v-model.trim="datosExpPec.produccion_destinada_pecuaria"
                  :class="datosExpPec.produccion_destinada_pecuaria==''?'':'is-valid'"
                  ref="produccion_destinada_pecuaria"
                />
              </div>
              <div class="col-lg-2">
                <label>Unidad de Medida:</label>
                <b-form-select
                  v-model="datosExpPec.unidad_producion_destinada_pecuaria"
                  :class="datosExpPec.unidad_producion_destinada_pecuaria==''?'':'is-valid'"
                  ref="unidad_producion_destinada_pecuaria"
                >
                  <option value selected>Seleccione</option>
                  <option
                    v-for="item in unidades3"
                    :value="item.value"
                    :key="item.value"
                  >{{item.texto}}</option>
                </b-form-select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4">
                <label>Número de animales:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Número de animales"
                  v-model.trim="datosExpPec.numero_animales"
                  :class="datosExpPec.numero_animales==''?'':'is-valid'"
                  ref="numero_animales"
                  @change="formato('numero_animales')"
                />
              </div>
              <div class="col-lg-4">
                <label>Área destinada a esta producción:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Área destinada a esta producción"
                  v-model.trim="datosExpPec.area_destinada_produccion"
                  :class="datosExpPec.area_destinada_produccion==''?'':'is-valid'"
                  ref="area_destinada_produccion"
                  @change="formato('area_destinada_produccion')"
                />
              </div>
              <div class="col-lg-2">
                <label>Unidad de Medida:</label>
                <b-form-select
                  v-model="datosExpPec.unidad_area_destinada"
                  :class="datosExpPec.unidad_area_destinada==''?'':'is-valid'"
                  ref="unidad_area_destinada"
                >
                  <option value selected>Seleccione</option>
                  <option
                    v-for="item in unidades1"
                    :value="item.value"
                    :key="item.value"
                  >{{item.texto}}</option>
                </b-form-select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4">
                <label>Compradores:</label>
                <b-form-select
                  v-model="datosExpPec.compradores_pecuaria"
                  :class="datosExpPec.compradores_pecuaria==''?'':'is-valid'"
                  ref="compradores_pecuaria"
                >
                  <option value selected>Seleccione</option>
                  <option value="Acopiador">Acopiador.</option>
                  <option value="Transportador">Transportador.</option>
                  <option value="Detallista">Detallista.</option>
                  <option value="Transformador">Transformador.</option>
                  <option value="Cooperativa">Cooperativa.</option>
                  <option value="Consumidor final">Consumidor final.</option>
                </b-form-select>
              </div>
              <div class="col-lg-4">
                <label>Precio promedio de venta kg:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Precio promedio de venta kg"
                  v-model.trim="datosExpPec.precio_promedio_venta_pecuaria"
                  :class="datosExpPec.precio_promedio_venta_pecuaria==''?'':'is-valid'"
                  ref="precio_promedio_venta_pecuaria"
                  @change="formato('precio_promedio_venta_pecuaria')"
                />
              </div>
              <div class="col-lg-4">
                <label>Método de pago.:</label>
                <b-form-select
                  v-model="datosExpPec.metodo_pago_pecuaria"
                  :class="datosExpPec.metodo_pago_pecuaria==''?'':'is-valid'"
                  ref="metodo_pago_pecuaria"
                >
                  <option value selected>Seleccione</option>
                  <option value="Efectivo">Efectivo.</option>
                  <option value="Trasferencia">Trasferencia.</option>
                  <option value="Cheque">Cheque.</option>
                  <option value="Trueque">Trueque.</option>
                </b-form-select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-8">
                <label>Subproductos de la producción:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Subproductos de la producción"
                  v-model.trim="datosExpPec.subproductos_produccion_pecuaria"
                  :class="datosExpPec.subproductos_produccion_pecuaria==''?'':'is-valid'"
                  ref="subproductos_produccion_pecuaria"
                />
              </div>
              <div class="col-lg-4">
                <label>Pertenencia a Programas de Asistencia Técnica:</label>
                <b-form-select
                  v-model="datosExpPec.pertenece_pecuaria"
                  :class="datosExpPec.pertenece_pecuaria==''?'':'is-valid'"
                  ref="pertenece_pecuaria"
                  @change="mostrarOtro('PATP')"
                >
                  <option value selected>Seleccione</option>
                  <option value="SI">SI</option>
                  <option value="NO">NO</option>
                </b-form-select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4" v-show="mOPATP">
                <label>Nombre del programa:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Nombre del programa"
                  v-model.trim="datosExpPec.nombre_programa_pecuaria"
                  :class="datosExpPec.nombre_programa_pecuaria==''?'':'is-valid'"
                  ref="nombre_programa_pecuaria"
                />
              </div>
              <div class="col-lg-4" v-show="mOPATP">
                <label>Entidad:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Entidad"
                  v-model.trim="datosExpPec.entidad_pecuaria"
                  :class="datosExpPec.entidad_pecuaria==''?'':'is-valid'"
                  ref="entidad_pecuaria"
                />
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-3">
                <label>¿Pertenece a alguna organización? :</label>
                <b-form-select
                  v-model="datosExpPec.pertenece_organizacion_pecuaria"
                  :class="datosExpPec.pertenece_organizacion_pecuaria==''?'':'is-valid'"
                  ref="pertenece_organizacion_pecuaria"
                  @change="mostrarOtro('POPECU')"
                >
                  <option value selected>Seleccione</option>
                  <option value="Asociaciones">Asociaciones.</option>
                  <option value="Cooperativas">Cooperativas.</option>
                  <option value="Agremiaciones">Agremiaciones.</option>
                  <option value="NO">NO</option>
                </b-form-select>
              </div>
              <div class="col-lg-2" v-show="mOPECU">
                <label>¿De qué tipo? :</label>
                <b-form-select
                  v-model="datosExpPec.tipo_organizacion_pecuaria"
                  :class="datosExpPec.tipo_organizacion_pecuaria==''?'':'is-valid'"
                  ref="tipo_organizacion_pecuaria"
                >
                  <option value selected>Seleccione</option>
                  <option value="Politico">Político.</option>
                  <option value="Social">Social.</option>
                  <option value="Tecnologico">Tecnológico.</option>
                  <option value="Asistencial">Asistencial.</option>
                  <option value="Salud">Salud.</option>
                  <option value="Comercial">Comercial.</option>
                  <option value="Etnia">Etnia.</option>
                  <option value="Cultural">Cultural.</option>
                  <option value="Deportiva">Deportiva.</option>
                  <option value="NA">No Aplica.</option>
                </b-form-select>
              </div>
              <div class="col-lg-7" v-show="mOPECU">
                <label>Nombre de la organización:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Nombre de la organización"
                  v-model.trim="datosExpPec.nombre_organizacion_pecuaria"
                  :class="datosExpPec.nombre_organizacion_pecuaria==''?'':'is-valid'"
                  ref="nombre_organizacion_pecuaria"
                />
              </div>
              <div class="col-lg-4" v-show="mOPECU==false">
                <label>Razón por la cual no pertenece a ninguna organización:</label>
                <b-form-select
                  v-model="datosExpPec.no_pertenece_pecuaria"
                  :class="datosExpPec.no_pertenece_pecuaria==''?'':'is-valid'"
                  ref="no_pertenece_pecuaria"
                >
                  <option value selected>Seleccione</option>
                  <option
                    v-for="item in razon1"
                    :value="item.value"
                    :key="item.value"
                  >{{item.texto}}</option>
                </b-form-select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-2">
                <label>Beneficios :</label>
                <b-form-select
                  v-model="datosExpPec.beneficios_pecuaria"
                  :class="datosExpPec.beneficios_pecuaria==''?'':'is-valid'"
                  ref="beneficios_pecuaria"
                >
                  <option value selected>Seleccione</option>
                  <option
                    v-for="item in beneficios"
                    :value="item.value"
                    :key="item.value"
                  >{{item.texto}}</option>
                </b-form-select>
              </div>
              <div class="col-lg-6">
                <label>Trabaja en asociación para realizar las actividades productivas :</label>
                <b-form-select
                  v-model="datosExpPec.trabaja_asociacion_pecuaria"
                  :class="datosExpPec.trabaja_asociacion_pecuaria==''?'':'is-valid'"
                  ref="trabaja_asociacion_pecuaria"
                >
                  <option value selected>Seleccione</option>
                  <option value="SI">SI</option>
                  <option value="NO">NO</option>
                </b-form-select>
              </div>
              <div class="col-lg-1" v-if="bandeGuaEdiEP==true">
                <br />
                <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <a
                  href="javascript:;"
                  class="btn btn-outline-info btn-icon"
                  data-skin="dark"
                  data-toggle="kt-tooltip"
                  data-placement="top"
                  title="Agregar"
                  @click.prevent="agregarEP"
                >
                  <i class="fa fa-plus"></i>
                </a>&nbsp;
              </div>
              <div class="col-lg-1" v-if="bandeGuaEdiEP==false">
                <br />
                <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <a
                  href="javascript:;"
                  class="btn btn-outline-info btn-icon"
                  data-skin="dark"
                  data-toggle="kt-tooltip"
                  data-placement="top"
                  title="Editar"
                  @click.prevent="editarEP"
                >
                  <i class="fa fa-edit"></i>
                </a>&nbsp;
              </div>
              <div class="col-lg-1" v-if="bandeGuaEdiEP==false">
                <br />
                <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <a
                  href="javascript:;"
                  class="btn btn-outline-danger btn-icon"
                  data-skin="dark"
                  data-toggle="kt-tooltip"
                  data-placement="top"
                  title="Cancelar"
                  @click.prevent="CancelarEditarEP"
                >
                  <i class="fa fa-external-link-alt"></i>
                </a>&nbsp;
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                  <table class="table table-sm table-hover">
                    <thead class>
                      <tr class="kt-bg-fill-brand">
                        <th class="text-center">No.</th>
                        <th class="text-center">Importancia del 1 al 10</th>
                        <th class="text-center">Producto</th>
                        <th class="text-center">Raza ó Tipo</th>
                        <th class="text-center">Costo Total</th>
                        <th class="text-center">Costo de Establecer</th>
                        <th class="text-center">Costo Sostenimiento Explotación Pecuaria</th>
                        <th
                          class="text-center"
                        >Problemática de los productos con perspectiva comercial</th>
                        <th
                          class="text-center"
                        >Otra Problematica de los productos con perspectiva comercial</th>
                        <th class="text-center">Producción</th>
                        <th class="text-center">Producción destinada al mercado</th>
                        <th class="text-center">Unidad de Medida</th>
                        <th class="text-center">Número de animales</th>
                        <th class="text-center">Área destinada a esta producción</th>
                        <th class="text-center">Unidad de Medida</th>
                        <th class="text-center">Compradores</th>
                        <th class="text-center">Precio promedio de venta kg</th>
                        <th class="text-center">Método de pago</th>
                        <th class="text-center">Subproductos de la producción</th>
                        <th class="text-center">Pertenencia a Programas de Asistencia Técnica</th>
                        <th class="text-center">Nombre del programa</th>
                        <th class="text-center">Entidad</th>
                        <th class="text-center">¿Pertenece a alguna organización?</th>
                        <th class="text-center">¿De qué tipo?</th>
                        <th class="text-center">Nombre de la organización</th>
                        <th
                          class="text-center"
                        >Razón por la cual no pertenece a ninguna organización</th>
                        <th class="text-center">Beneficios</th>
                        <th
                          class="text-center"
                        >Trabaja en asociación para realizar las actividades productivas</th>
                        <td class="text-center">Opciones</td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr
                        v-for="(item,index) in explotaciones_pecuarias"
                        :key="index"
                        v-show="item.estado=='Activo'"
                      >
                        <td style="font-weight: normal;vertical-align: middle;">{{ (index+1) }}</td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.importancia_comercial"
                            :class="item.importancia_comercial==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.producto_comercial"
                            :class="item.producto_comercial==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.texto_raza"
                            :class="item.texto_raza==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.costo_total"
                            :class="item.costo_total==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.costo_establecer"
                            :class="item.costo_establecer==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.costo_pecuaria"
                            :class="item.costo_pecuaria==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.problematica_productos"
                            :class="item.problematica_productos==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:250px;"
                            class="form-control text-capitalize"
                            v-model="item.otra_problematica"
                            :class="item.otra_problematica==''?'':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:250px;"
                            class="form-control text-capitalize"
                            v-model="item.produccion"
                            :class="item.produccion==''?'':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:250px;"
                            class="form-control text-capitalize"
                            v-model="item.produccion_destinada_pecuaria"
                            :class="item.produccion_destinada_pecuaria==''?'':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.texto_unidad_producion_destinada_pecuaria"
                            :class="item.texto_unidad_producion_destinada_pecuaria==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.numero_animales"
                            :class="item.numero_animales==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.area_destinada_produccion"
                            :class="item.area_destinada_produccion==''?'':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.texto_unidad_area_destinada"
                            :class="item.texto_unidad_area_destinada==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.compradores_pecuaria"
                            :class="item.compradores_pecuaria==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.precio_promedio_venta_pecuaria"
                            :class="item.precio_promedio_venta_pecuaria==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.metodo_pago_pecuaria"
                            :class="item.metodo_pago_pecuaria==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:250px;"
                            class="form-control text-capitalize"
                            v-model="item.subproductos_produccion_pecuaria"
                            :class="item.subproductos_produccion_pecuaria==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.pertenece_pecuaria"
                            :class="item.pertenece_pecuaria==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.nombre_programa_pecuaria"
                            :class="item.nombre_programa_pecuaria==''?'':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.entidad_pecuaria"
                            :class="item.entidad_pecuaria==''?'':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.pertenece_organizacion_pecuaria"
                            :class="item.pertenece_organizacion_pecuaria==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.tipo_organizacion_pecuaria"
                            :class="item.tipo_organizacion_pecuaria==''?'':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.nombre_organizacion_pecuaria"
                            :class="item.nombre_organizacion_pecuaria==''?'':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.texto_no_pertenece_pecuaria"
                            :class="item.texto_no_pertenece_pecuaria==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.texto_beneficios_pecuaria"
                            :class="item.texto_beneficios_pecuaria==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.trabaja_asociacion_pecuaria"
                            :class="item.trabaja_asociacion_pecuaria==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>

                        <td style="text-align:center;vertical-align: middle;text-align: center;">
                          <div style="width:70px;">
                            <button
                              class="btn btn-icon btn-sm btn-outline-danger"
                              type="button"
                              title="Eliminar"
                              @click="eliminarItemEP(item, index)"
                            >
                              <i class="fa fa-trash"></i>
                            </button>
                            <button
                              class="btn btn-icon btn-sm btn-outline-warning"
                              type="button"
                              title="Editar"
                              @click="editarItemEP(index,item)"
                            >
                              <i class="fa fa-edit"></i>
                            </button>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="kt-separator kt-separator--border-dashed"></div>
                </div>
              </div>
            </div>
            <div class="kt-separator kt-separator--border-dashed"></div>
            <p style="text-align: center;">
              <span
                class="kt-font-boldest"
                style="font-size: 20px;"
              >CULTIVOS FORESTALES CON PERSPECTIVA COMERCIAL</span>
            </p>
            <div class="form-group row">
              <div class="col-lg-3">
                <label>Importancia del 1 al 10:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Importancia del 1 al 10"
                  v-model.trim="datosCulFor.importancia_forestales"
                  :class="datosCulFor.importancia_forestales==''?'':'is-valid'"
                  ref="importancia_forestales"
                  @change="formato('importancia_forestales')"
                />
              </div>
              <div class="col-lg-5">
                <label>Producto:</label>
                <b-form-select
                  v-model="datosCulFor.producto_forestales"
                  :class="datosCulFor.producto_forestales==''?'':'is-valid'"
                  ref="producto_forestales"
                >
                  <option value selected>Seleccione</option>
                  <option value="Maderables">Maderables</option>
                </b-form-select>
              </div>
              <div class="col-lg-4">
                <label>Especie:</label>
                <b-form-select
                  v-model="datosCulFor.variedad_forestales"
                  :class="datosCulFor.variedad_forestales==''?'':'is-valid'"
                  ref="variedad_forestales"
                >
                  <option value selected>Seleccione</option>
                  <option
                    v-for="item in especie1"
                    :value="item.value"
                    :key="item.value"
                  >{{item.texto}}</option>
                </b-form-select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4">
                <label>Edad de la plantación:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Edad de la plantación"
                  v-model.trim="datosCulFor.edad_plantacion"
                  :class="datosCulFor.edad_plantacion==''?'':'is-valid'"
                  ref="edad_plantacion"
                  @change="formato('edad_plantacion')"
                />
              </div>
              <div class="col-lg-2">
                <label>Unidad de Medida :</label>
                <b-form-select
                  v-model="datosCulFor.tipo_edad"
                  :class="datosCulFor.tipo_edad==''?'':'is-valid'"
                  ref="tipo_edad"
                >
                  <option value selected>Seleccione</option>
                  <option value="Años">Años.</option>
                  <option value="Meses">Meses</option>
                </b-form-select>
              </div>
              <div class="col-lg-4">
                <label>Área sembrada:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Área sembrada"
                  v-model.trim="datosCulFor.area_sembrada_forestales"
                  :class="datosCulFor.area_sembrada_forestales==''?'':'is-valid'"
                  ref="area_sembrada_forestales"
                  @change="formato('area_sembrada_forestales')"
                />
              </div>
              <div class="col-lg-2">
                <label>Unidad de Medida:</label>
                <b-form-select
                  v-model="datosCulFor.unidad_area_forestales"
                  :class="datosCulFor.unidad_area_forestales==''?'':'is-valid'"
                  ref="unidad_area_forestales"
                >
                  <option value selected>Seleccione</option>
                  <option
                    v-for="item in unidades1"
                    :value="item.value"
                    :key="item.value"
                  >{{item.texto}}</option>
                </b-form-select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-3">
                <label>Rendimiento por árbol en m3:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Rendimiento por árbol en m3"
                  v-model.trim="datosCulFor.rendimiento_arbol"
                  :class="datosCulFor.rendimiento_arbol==''?'':'is-valid'"
                  ref="rendimiento_arbol"
                  @change="formato('rendimiento_arbol')"
                />
              </div>
              <div class="col-lg-3">
                <label>Costo Total:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Costo total"
                  v-model.trim="datosCulFor.costo_total_forestales"
                  :class="datosCulFor.costo_total_forestales==''?'':'is-valid'"
                  ref="costo_total_forestales"
                  @change="formato('costo_total_forestales')"
                />
              </div>
              <div class="col-lg-3">
                <label>Costo de Establecimiento:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Costo de Establecimiento"
                  v-model.trim="datosCulFor.costo_establecimiento_forestales"
                  :class="datosCulFor.costo_establecimiento_forestales==''?'':'is-valid'"
                  ref="costo_establecimiento_forestales"
                  @change="formato('costo_establecimiento_forestales')"
                />
              </div>
              <div class="col-lg-3">
                <label>Costo Sostenimiento:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Costo Sostenimiento"
                  v-model.trim="datosCulFor.costo_sostenimiento_forestales"
                  :class="datosCulFor.costo_sostenimiento_forestales==''?'':'is-valid'"
                  ref="costo_sostenimiento_forestales"
                  @change="formato('costo_sostenimiento_forestales')"
                />
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-5">
                <label>Problemática de los productos con perspectiva comercial:</label>
                <b-form-select
                  v-model="datosCulFor.problematica_productos_forestales"
                  :class="datosCulFor.problematica_productos_forestales==''?'':'is-valid'"
                  ref="problematica_productos_forestales"
                  @change="mostrarOtro('PPPF')"
                >
                  <option value selected>Seleccione</option>
                  <option value="Sanitario">Sanitario</option>
                  <option value="Rendimiento">Rendimiento</option>
                  <option value="Comercializacion">Comercialización</option>
                  <option value="Ambiental">Ambiental</option>
                  <option value="Ninguna">Ninguna</option>
                  <option value="Otras">Otras</option>
                </b-form-select>
              </div>
              <div class="col-lg-7" v-show="mOPPPF">
                <label>Otra Problematica de los productos con perspectiva comercial:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Otra Problematica de los productos con perspectiva comercial"
                  v-model.trim="datosCulFor.otros_problematica_productos_forestales"
                  :class="datosCulFor.otros_problematica_productos_forestales==''?'':'is-valid'"
                  ref="otros_problematica_productos_forestales"
                />
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-10">
                <label>Producción destinada al mercado:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Producción destinada al mercado"
                  v-model.trim="datosCulFor.produccion_destinada_forestales"
                  :class="datosCulFor.produccion_destinada_forestales==''?'':'is-valid'"
                  ref="produccion_destinada_forestales"
                />
              </div>
              <div class="col-lg-2">
                <label>Unidad de Medida:</label>
                <b-form-select
                  v-model="datosCulFor.unidad_producion_destinada_forestales"
                  :class="datosCulFor.unidad_producion_destinada_forestales==''?'':'is-valid'"
                  ref="unidad_producion_destinada_forestales"
                >
                  <option value selected>Seleccione</option>
                  <option
                    v-for="item in unidades3"
                    :value="item.value"
                    :key="item.value"
                  >{{item.texto}}</option>
                </b-form-select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-3">
                <label>Número de Arboles:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Número de Arboles"
                  v-model.trim="datosCulFor.numero_arboles"
                  :class="datosCulFor.numero_arboles==''?'':'is-valid'"
                  ref="numero_arboles"
                  @change="formato('numero_arboles')"
                />
              </div>
              <div class="col-lg-3">
                <label>Compradores:</label>
                <b-form-select
                  v-model="datosCulFor.compradores_forestales"
                  :class="datosCulFor.compradores_forestales==''?'':'is-valid'"
                  ref="compradores_forestales"
                >
                  <option value selected>Seleccione</option>
                  <option value="Acopiador">Acopiador.</option>
                  <option value="Transportador">Transportador.</option>
                  <option value="Detallista">Detallista.</option>
                  <option value="Transformador">Transformador.</option>
                  <option value="Cooperativa">Cooperativa.</option>
                  <option value="Consumidor final">Consumidor final.</option>
                </b-form-select>
              </div>
              <div class="col-lg-3">
                <label>Precio promedio de venta kg:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Precio promedio de venta kg"
                  v-model.trim="datosCulFor.precio_promedio_venta_forestales"
                  :class="datosCulFor.precio_promedio_venta_forestales==''?'':'is-valid'"
                  ref="precio_promedio_venta_forestales"
                  @change="formato('precio_promedio_venta_forestales')"
                />
              </div>
              <div class="col-lg-3">
                <label>Método de pago.:</label>
                <b-form-select
                  v-model="datosCulFor.metodo_pago_forestales"
                  :class="datosCulFor.metodo_pago_forestales==''?'':'is-valid'"
                  ref="metodo_pago_forestales"
                >
                  <option value selected>Seleccione</option>
                  <option value="Efectivo">Efectivo.</option>
                  <option value="Trasferencia">Trasferencia.</option>
                  <option value="Cheque">Cheque.</option>
                  <option value="Trueque">Trueque.</option>
                </b-form-select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-8">
                <label>Subproductos de la producción:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Subproductos de la producción"
                  v-model.trim="datosCulFor.subproductos_produccion_forestales"
                  :class="datosCulFor.subproductos_produccion_forestales==''?'':'is-valid'"
                  ref="subproductos_produccion_forestales"
                />
              </div>
              <div class="col-lg-4">
                <label>Pertenencia a Programas de Asistencia Técnica:</label>
                <b-form-select
                  v-model="datosCulFor.pertenece_forestales"
                  :class="datosCulFor.pertenece_forestales==''?'':'is-valid'"
                  ref="pertenece_forestales"
                  @change="mostrarOtro('PATF')"
                >
                  <option value selected>Seleccione</option>
                  <option value="SI">SI</option>
                  <option value="NO">NO</option>
                </b-form-select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4" v-show="mOPATF">
                <label>Nombre del programa:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Nombre del programa"
                  v-model.trim="datosCulFor.nombre_programa_forestales"
                  :class="datosCulFor.nombre_programa_forestales==''?'':'is-valid'"
                  ref="nombre_programa_forestales"
                />
              </div>
              <div class="col-lg-4" v-show="mOPATF">
                <label>Entidad:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Entidad"
                  v-model.trim="datosCulFor.entidad_forestales"
                  :class="datosCulFor.entidad_forestales==''?'':'is-valid'"
                  ref="entidad_forestales"
                />
              </div>
              <div class="col-lg-4">
                <label>¿Pertenece a alguna organización? :</label>
                <b-form-select
                  v-model="datosCulFor.pertenece_organizacion_forestales"
                  :class="datosCulFor.pertenece_organizacion_forestales==''?'':'is-valid'"
                  ref="pertenece_organizacion_forestales"
                  @change="mostrarOtro('PF')"
                >
                  <option value selected>Seleccione</option>
                  <option value="Asociaciones">Asociaciones.</option>
                  <option value="Cooperativas">Cooperativas.</option>
                  <option value="Agremiaciones">Agremiaciones.</option>
                  <option value="NO">NO.</option>
                </b-form-select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4" v-show="mOPF">
                <label>¿De qué tipo? :</label>
                <b-form-select
                  v-model="datosCulFor.tipo_pertenece_forestales"
                  :class="datosCulFor.tipo_pertenece_forestales==''?'':'is-valid'"
                  ref="tipo_pertenece_forestales"
                >
                  <option value selected>Seleccione</option>
                  <option value="Politico">Político.</option>
                  <option value="Social">Social.</option>
                  <option value="Tecnologico">Tecnológico.</option>
                  <option value="Asistencial">Asistencial.</option>
                  <option value="Salud">Salud.</option>
                  <option value="Comercial">Comercial.</option>
                  <option value="Etnia">Etnia.</option>
                  <option value="Cultural">Cultural.</option>
                  <option value="Deportiva">Deportiva.</option>
                  <option value="NA">No Aplica.</option>
                </b-form-select>
              </div>
              <div class="col-lg-8" v-show="mOPF">
                <label>Nombre de la organización:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Nombre de la organización"
                  v-model.trim="datosCulFor.nombre_organizacion_forestales"
                  :class="datosCulFor.nombre_organizacion_forestales==''?'':'is-valid'"
                  ref="nombre_organizacion_forestales"
                />
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-5" v-show="mOPF==false">
                <label>Razón por la cual no pertenece a ninguna organización:</label>
                <b-form-select
                  v-model="datosCulFor.no_pertenece_forestales"
                  :class="datosCulFor.no_pertenece_forestales==''?'':'is-valid'"
                  ref="no_pertenece_forestales"
                >
                  <option value selected>Seleccione</option>
                  <option
                    v-for="item in razon1"
                    :value="item.value"
                    :key="item.value"
                  >{{item.texto}}</option>
                </b-form-select>
              </div>
              <div class="col-lg-4">
                <label>Beneficios :</label>
                <b-form-select
                  v-model="datosCulFor.beneficios_forestales"
                  :class="datosCulFor.beneficios_forestales==''?'':'is-valid'"
                  ref="beneficios_forestales"
                >
                  <option value selected>Seleccione</option>
                  <option
                    v-for="item in beneficios"
                    :value="item.value"
                    :key="item.value"
                  >{{item.texto}}</option>
                </b-form-select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-6">
                <label>Trabaja en asociación para realizar las actividades productivas :</label>
                <b-form-select
                  v-model="datosCulFor.trabaja_asociacion_forestales"
                  :class="datosCulFor.trabaja_asociacion_forestales==''?'':'is-valid'"
                  ref="trabaja_asociacion_forestales"
                >
                  <option value selected>Seleccione</option>
                  <option value="SI">SI</option>
                  <option value="NO">NO</option>
                </b-form-select>
              </div>
              <div class="col-lg-1" v-if="bandeGuaEdiCF==true">
                <br />
                <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <a
                  href="javascript:;"
                  class="btn btn-outline-info btn-icon"
                  data-skin="dark"
                  data-toggle="kt-tooltip"
                  data-placement="top"
                  title="Agregar"
                  @click.prevent="agregarCF"
                >
                  <i class="fa fa-plus"></i>
                </a>&nbsp;
              </div>
              <div class="col-lg-1" v-if="bandeGuaEdiCF==false">
                <br />
                <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <a
                  href="javascript:;"
                  class="btn btn-outline-info btn-icon"
                  data-skin="dark"
                  data-toggle="kt-tooltip"
                  data-placement="top"
                  title="Editar"
                  @click.prevent="editarCF"
                >
                  <i class="fa fa-edit"></i>
                </a>&nbsp;
              </div>
              <div class="col-lg-1" v-if="bandeGuaEdiCF==false">
                <br />
                <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <a
                  href="javascript:;"
                  class="btn btn-outline-danger btn-icon"
                  data-skin="dark"
                  data-toggle="kt-tooltip"
                  data-placement="top"
                  title="Cancelar"
                  @click.prevent="CancelarEditarCF"
                >
                  <i class="fa fa-external-link-alt"></i>
                </a>&nbsp;
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                  <table class="table table-sm table-hover">
                    <thead class>
                      <tr class="kt-bg-fill-brand">
                        <th class="text-center">No.</th>
                        <th class="text-center">Importancia del 1 al 10</th>
                        <th class="text-center">Producto</th>
                        <th class="text-center">Variedad</th>
                        <th class="text-center">Edad de la plantación</th>
                        <th class="text-center">Unidad de Medida</th>
                        <th class="text-center">Área sembrada</th>
                        <th class="text-center">Unidad de Medida</th>
                        <th class="text-center">Rendimiento por árbol en m3</th>
                        <th class="text-center">Costo Total</th>
                        <th class="text-center">Costo de Establecimiento</th>
                        <th class="text-center">Costo Sostenimiento</th>
                        <th
                          class="text-center"
                        >Problemática de los productos con perspectiva comercial</th>
                        <th
                          class="text-center"
                        >Otra Problematica de los productos con perspectiva comercial</th>
                        <th class="text-center">Producción destinada al mercado</th>
                        <th class="text-center">Unidad de Medida</th>
                        <th class="text-center">Número de Arboles</th>
                        <th class="text-center">Compradores</th>
                        <th class="text-center">Precio promedio de venta kg</th>
                        <th class="text-center">Método de pago</th>
                        <th class="text-center">Subproductos de la producción</th>
                        <th class="text-center">Pertenencia a Programas de Asistencia Técnica</th>
                        <th class="text-center">Nombre del programa</th>
                        <th class="text-center">Entidad</th>
                        <th class="text-center">¿Pertenece a alguna organización?</th>
                        <th class="text-center">¿De qué tipo?</th>
                        <th class="text-center">Nombre de la organización</th>
                        <th
                          class="text-center"
                        >Razón por la cual no pertenece a ninguna organización</th>
                        <th class="text-center">Beneficios</th>
                        <th
                          class="text-center"
                        >Trabaja en asociación para realizar las actividades productivas</th>
                        <td class="text-center">Opciones</td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr
                        v-for="(item,index) in cultivos_forestales"
                        :key="index"
                        v-show="item.estado=='Activo'"
                      >
                        <td style="font-weight: normal;vertical-align: middle;">{{ (index+1) }}</td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.importancia_forestales"
                            :class="item.importancia_forestales==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.producto_forestales"
                            :class="item.producto_forestales==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.texto_variedad_forestales"
                            :class="item.texto_variedad_forestales==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.edad_plantacion"
                            :class="item.edad_plantacion==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.tipo_edad"
                            :class="item.tipo_edad==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.area_sembrada_forestales"
                            :class="item.area_sembrada_forestales==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.texto_unidad_area_forestales"
                            :class="item.texto_unidad_area_forestales==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:250px;"
                            class="form-control text-capitalize"
                            v-model="item.rendimiento_arbol"
                            :class="item.rendimiento_arbol==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:250px;"
                            class="form-control text-capitalize"
                            v-model="item.costo_total_forestales"
                            :class="item.costo_total_forestales==''?'':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:250px;"
                            class="form-control text-capitalize"
                            v-model="item.costo_establecimiento_forestales"
                            :class="item.costo_establecimiento_forestales==''?'':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.costo_sostenimiento_forestales"
                            :class="item.costo_sostenimiento_forestales==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.problematica_productos_forestales"
                            :class="item.problematica_productos_forestales==''?'':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.otros_problematica_productos_forestales"
                            :class="item.otros_problematica_productos_forestales==''?'':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.produccion_destinada_forestales"
                            :class="item.produccion_destinada_forestales==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.texto_unidad_producion_destinada_forestales"
                            :class="item.texto_unidad_producion_destinada_forestales==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.numero_arboles"
                            :class="item.numero_arboles==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.compradores_forestales"
                            :class="item.compradores_forestales==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.metodo_pago_forestales"
                            :class="item.metodo_pago_forestales==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:250px;"
                            class="form-control text-capitalize"
                            v-model="item.precio_promedio_venta_forestales"
                            :class="item.precio_promedio_venta_forestales==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.subproductos_produccion_forestales"
                            :class="item.subproductos_produccion_forestales==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.pertenece_forestales"
                            :class="item.pertenece_forestales==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.nombre_programa_forestales"
                            :class="item.nombre_programa_forestales==''?'':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.entidad_forestales"
                            :class="item.entidad_forestales==''?'':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.pertenece_organizacion_forestales"
                            :class="item.pertenece_organizacion_forestales==''?'':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.tipo_pertenece_forestales"
                            :class="item.tipo_pertenece_forestales==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.nombre_organizacion_forestales"
                            :class="item.nombre_organizacion_forestales==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.texto_no_pertenece_forestales"
                            :class="item.texto_no_pertenece_forestales==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.texto_beneficios_forestales"
                            :class="item.texto_beneficios_forestales==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <input
                            type="text"
                            style="width:200px;"
                            class="form-control text-capitalize"
                            v-model="item.trabaja_asociacion_forestales"
                            :class="item.trabaja_asociacion_forestales==''?'is-invalid':'is-valid'"
                            readonly
                          />
                        </td>
                        <td style="text-align:center;vertical-align: middle;text-align: center;">
                          <div style="width:70px;">
                            <button
                              class="btn btn-icon btn-sm btn-outline-danger"
                              type="button"
                              title="Eliminar"
                              @click="eliminarItemCF(item, index)"
                            >
                              <i class="fa fa-trash"></i>
                            </button>
                            <button
                              class="btn btn-icon btn-sm btn-outline-warning"
                              type="button"
                              title="Editar"
                              @click="editarItemCF(index,item)"
                            >
                              <i class="fa fa-edit"></i>
                            </button>
                          </div>
                        </td>
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
</template>
<script>
  "use strict";
  import * as unidadesServicios from "../../Servicios/unidades_servicios";
  import * as barriosServicios from "../../Servicios/barrios_servicios";
  import Multiselect from "vue-multiselect";

  // Import component
  import Loading from "vue-loading-overlay";
  // Import stylesheet
  import "vue-loading-overlay/dist/vue-loading.css";
  export default {
    components: {
      Loading,
      Multiselect
    },
    mounted() {
      this.hoy = moment();
      this.IDHOGAR = this.$route.params.IDHOGAR;
      this.IDUNIDAD = this.$route.params.id;
      this.datos.id_hogar = this.IDHOGAR;
      if (this.IDHOGAR == null) {
        this.$router.push("/gestion");
      } else {
        this.nuevo(this.IDHOGAR, this.IDUNIDAD);
      }
    },
    data() {
      return {
        IDHOGAR: 0,
        IDUNIDAD: 0,
        dpto_options: [],
        muni_options: {},
        corregi_options: {},
        barrio_options: {},
        vereda_options: {},
        escolaridad_options: {},
        hoy: "",
        datos: {
          id: 0,

          id_hogar: 0,
          nom_productor: "",
          nivel_educativo: "",
          tipo_id: "",
          identificacion: "",
          nom_finca: "",
          hogares_finca: "",
          linea_productiva: [],
          area_total_finca: "",
          distancia_finca: "",

          tenencia_propiedad: "",
          atiende_entrevista: "",
          credito_produccion: "",
          fuentes_prestamo: "",
          cual_fuente: "",
          vias_acceso: "",
          tipos_vias_acceso: "",
          fecha: "",
          usuario_crear: "",
          fecha_editar: "",

          usuario_editar: "",
          estado: "Activo",
          id_compania: 1,
          id_dpto: "",
          id_mun: "",
          id_corre: "",
          id_vereda: "",
          id_barrio: "",
          direccion: "SIN DIRECCION",
          unidad_area: "",

          unidad_distancia: ""
        },
        datosCulAgri: {
          id: 0,

          id_unidad: 0,
          importancias_agricolas: "",
          area_produccion: "",
          unidad_area_produccion: "",
          producto: "",
          variedad: "",
          semilla: "",
          pertenece: "",
          tipo_pertenece: "",
          nombre_organizacion: "",

          beneficios: "",
          no_pertenece: "",
          trabaja_asociacion: "",
          frecuente_cosecha: "",
          unidad_frecuencia_cosecha: "",
          area_cosecha: "",
          unidad_area_cosecha: "",
          costo_produccion: "",
          costo_establecimiento: "",
          costo_sostenimiento: "",
          produccion_destinada: "",

          tipo_problema: "",
          compradores: "",
          precio_promedio_venta: "",
          metodo_pago: "",
          precio_promedio_venta_kg: "",
          subproductos_produccion: "",
          programa_asistencia_tecnica: "",
          nombre_programa: "",
          entidad: "",
          cambios_produccion_anio: "",

          actividad_cambio: "",
          estado: "Activo",
          id_compania: 1,
          otro_tipo_problema: "",
          unidad_producion_destinada: ""
        },
        cultivos_agricolas: [],
        cuag: [],
        bandeGuaEdiCA: true,
        datosExpPec: {
          id: 0,

          id_unidad: 0,
          importancia_comercial: "",
          raza: "",
          costo_total: "",
          costo_establecer: "",
          costo_pecuaria: "",
          problematica_productos: "",
          otra_problematica: "",
          produccion: "",
          numero_animales: "",

          area_destinada_produccion: "",
          unidad_area_destinada: "",
          compradores_pecuaria: "",
          precio_promedio_venta_pecuaria: "",
          metodo_pago_pecuaria: "",
          subproductos_produccion_pecuaria: "",
          pertenece_pecuaria: "",
          nombre_programa_pecuaria: "",
          entidad_pecuaria: "",
          pertenece_organizacion_pecuaria: "",

          tipo_organizacion_pecuaria: "",
          nombre_organizacion_pecuaria: "",
          beneficios_pecuaria: "",
          no_pertenece_pecuaria: "",
          trabaja_asociacion_pecuaria: "",
          estado: "Activo",
          id_compania: 1,
          producto_comercial: "",
          produccion_destinada_pecuaria: "",
          unidad_producion_destinada_pecuaria: ""
        },
        explotaciones_pecuarias: [],
        bandeGuaEdiEP: true,
        datosCulFor: {
          id: 0,

          id_unidad: 0,
          importancia_forestales: "",
          producto_forestales: "",
          variedad_forestales: "",
          edad_plantacion: "",
          tipo_edad: "",
          area_sembrada_forestales: "",
          unidad_area_forestales: "",
          rendimiento_arbol: "",
          costo_total_forestales: "",

          costo_establecimiento_forestales: "",
          costo_sostenimiento_forestales: "",
          problematica_productos_forestales: "",
          produccion_destinada_forestales: "",
          unidad_producion_destinada_forestales: "",
          numero_arboles: "",
          compradores_forestales: "",
          metodo_pago_forestales: "",
          precio_promedio_venta_forestales: "",
          subproductos_produccion_forestales: "",
          pertenece_forestales: "",

          nombre_programa_forestales: "",
          entidad_forestales: "",
          pertenece_organizacion_forestales: "",
          tipo_pertenece_forestales: "",
          nombre_organizacion_forestales: "",
          beneficios_forestales: "",
          no_pertenece_forestales: "",
          trabaja_asociacion_forestales: "",
          estado: "Activo",
          id_compania: 1,
          otros_problematica_productos_forestales: ""
        },
        cultivos_forestales: [],
        bandeGuaEdiCF: true,

        herramienta: "",
        herramienta1: "",
        cuantasHerramienta: "",
        herramientasData: [],
        utensilio: "",
        utensilio1: "",
        cuantasUtensilio: "",
        utensiliosData: [],
        maquina: "",
        maquina1: "",
        cuantasMaquina: "",
        maquinasData: [],
        instalacion: "",
        instalacion1: "",
        cuantasInstalacion: "",
        instalacionesData: [],

        medio: "",
        medio1: "",
        cuantasMedio: "",
        mediosData: [],
        mOCP: false,
        mOP: false,
        mOTPP: false,
        mOPAT: false,
        mOCTI: false,
        mOPPP: false,
        mOPATP: false,
        mOPECU: false,
        mOPPPF: false,
        mOPATF: false,
        mOPF: false,
        mOFP: false,
        valG: true,
        CODIGOGENE: "",

        unidades1: [
          { value: 1, texto: "Kilómetro cuadrado" },
          { value: 2, texto: "Metro cuadrado" },
          { value: 3, texto: "Milla cuadrada" },
          { value: 4, texto: "Yarda cuadrada" },
          { value: 5, texto: "Pie cuadrado" },
          { value: 6, texto: "Pulgada cuadrada" },
          { value: 7, texto: "Hectárea" },
          { value: 8, texto: "Acre" }
        ],
        razon1: [
          { value: 1, texto: "Desconocimiento" },
          { value: 2, texto: "Falta de interés" },
          { value: 3, texto: "Falta de tiempo" },
          { value: 4, texto: "Falta de oportunidad" },
          { value: "NA", texto: "No Aplica" }
        ],
        beneficios: [
          { value: 1, texto: "Económico" },
          { value: 2, texto: "En especies" },
          { value: 3, texto: "Capacitación" },
          { value: 4, texto: "Recreación y deporte" },
          { value: 5, texto: "Reconocimiento de la comunidad" },
          { value: 6, texto: "Participación en la toma de decisiones" },
          { value: "NA", texto: "No Aplica" }
        ],
        raza: [
          { value: 1, texto: "Ganado vacuno o bovino" },
          { value: 2, texto: "Ganado ovino" },
          { value: 3, texto: "Ganado porcino" },
          { value: 4, texto: "Ganado caprino" },
          { value: 5, texto: "Ganado equino" },
          { value: 6, texto: "Avicultura" },
          { value: 7, texto: "Apicultura" },
          { value: 8, texto: "Acuicultura" },
          { value: 9, texto: "Helicicultura" },
          { value: 10, texto: "Cunicultura" },
          { value: 11, texto: "Sericicultura" },
          { value: 12, texto: "Otros" }
        ],
        especie1: [
          { value: 1, texto: "Chiche" },
          { value: 2, texto: "Palo Maria" },
          { value: 3, texto: "Guayabo Volador" },
          { value: 4, texto: "Roble" },
          { value: 5, texto: "Caoba" },
          { value: 6, texto: "Pino" },
          { value: 7, texto: "Cedro" },
          { value: 8, texto: "Árbol de Caucho" },
          { value: 9, texto: "Álamo" },
          { value: 10, texto: "Primavera" },
          { value: 11, texto: "Hormiguillo colorado" },
          { value: 12, texto: "Palo mulato" },
          { value: 13, texto: "Bambú" },
          { value: 14, texto: "Eucalipto" },
          { value: 15, texto: "Canela" },
          { value: 16, texto: "Neem" },
          { value: 17, texto: "Ciprés" },
          { value: 18, texto: "Paulownia" },
          { value: 19, texto: "Ceiba" },
          { value: 20, texto: "Guariuba" },
          { value: 21, texto: "Figueira" },
          { value: 22, texto: "Pashaco" },
          { value: 23, texto: "Chicalá" },
          { value: 24, texto: "Nogal" },
          { value: 25, texto: "Abarco" },
          { value: 26, texto: "Palo rosa" },
          { value: 27, texto: "Campanos" },
          { value: 28, texto: "Melina" },
          { value: 29, texto: "Igua" },
          { value: 30, texto: "Caracolí" },
          { value: 31, texto: "Chanul" },
          { value: 32, texto: "Dinde" }
        ],
        tipocultivo: [
          { value: 1, texto: "Cereales" },
          { value: 2, texto: "Leguminosas" },
          { value: 3, texto: "Oleaginosas" },
          { value: 4, texto: "Hortalizas" },
          { value: 5, texto: "Frutales" },
          { value: 6, texto: "Raíces y tubérculos" },
          { value: 7, texto: "Ornamentales" },
          { value: 8, texto: "Cultivos para bebidas medicinales y aromáticas" },
          { value: 9, texto: "Otros cultivos tradicionles" }
        ],
        especie2: {
          "": [{ value: "", texto: "Seleccione" }],
          "1": [
            { value: 1, texto: "Maíz" },
            { value: 2, texto: "Trigo" },
            { value: 3, texto: "Arroz" },
            { value: 4, texto: "Cebada" },
            { value: 5, texto: "Centeno" },
            { value: 6, texto: "Alpiste" },
            { value: 7, texto: "Sorgo" },
            { value: 8, texto: "Mijo" },
            { value: 9, texto: "Avena" },
            { value: 10, texto: "Trigo Espelta" },
            { value: 11, texto: "Trigo kamut" }
          ],
          "2": [
            { value: 1, texto: "Frijoles rojo" },
            { value: 2, texto: "Frijol negro" },
            { value: 3, texto: "Frijol cabecita negra" },
            { value: 4, texto: "Frijol" },
            { value: 5, texto: "Arvejas" },
            { value: 6, texto: "Habas" },
            { value: 7, texto: "Lenteja" },
            { value: 8, texto: "Garbanzo" },
            { value: 9, texto: "Gandul" },
            { value: 10, texto: "Alfalfa" },
            { value: 11, texto: "Almorta" }
          ],
          "3": [
            { value: 1, texto: "Soya" },
            { value: 2, texto: "Canola" },
            { value: 3, texto: "Girasol" },
            { value: 4, texto: "Olivo" },
            { value: 5, texto: "Maíz" },
            { value: 6, texto: "Ajonjolí" },
            { value: 7, texto: "Palma de aceite" }
          ],
          "4": [
            { value: 1, texto: "Acelga" },
            { value: 2, texto: "Ajo" },
            { value: 3, texto: "Albahaca" },
            { value: 4, texto: "Apio" },
            { value: 5, texto: "Alcachofa" },
            { value: 6, texto: "Berenjena" },
            { value: 7, texto: "Brócoli" },
            { value: 8, texto: "Calabacín" },
            { value: 9, texto: "Calabaza" },
            { value: 10, texto: "Cebolla" },
            { value: 11, texto: "Col" },
            { value: 12, texto: "Coliflor" },
            { value: 13, texto: "Espinacas" },
            { value: 14, texto: "Pepino" },
            { value: 15, texto: "Perejil" },
            { value: 16, texto: "Pimiento" },
            { value: 17, texto: "Puerro" },
            { value: 18, texto: "Rábano" },
            { value: 19, texto: "Remolacha" },
            { value: 20, texto: "Tomate" },
            { value: 21, texto: "Zanahoria" },
            { value: 22, texto: "Auyama" }
          ],
          "5": [
            { value: 1, texto: "Plátano" },
            { value: 2, texto: "Cana" },
            { value: 3, texto: "Coco" },
            { value: 4, texto: "Aguacate" },
            { value: 5, texto: "Naranja" },
            { value: 6, texto: "Mango" },
            { value: 7, texto: "Limón" },
            { value: 8, texto: "Banano" },
            { value: 9, texto: "Mandarina" },
            { value: 10, texto: "Sandia" },
            { value: 11, texto: "Papaya" },
            { value: 12, texto: "Marañón" },
            { value: 13, texto: "Guanábana" },
            { value: 14, texto: "Guayaba" },
            { value: 15, texto: "Piña" },
            { value: 16, texto: "Lulo" },
            { value: 17, texto: "Maracuyá" },
            { value: 18, texto: "Granadilla" },
            { value: 19, texto: "Curuba" },
            { value: 20, texto: "Níspero" },
            { value: 21, texto: "Borojó" },
            { value: 22, texto: "Zapote" },
            { value: 23, texto: "Carambola" },
            { value: 24, texto: "Tomate de árbol" },
            { value: 25, texto: "Melón" },
            { value: 26, texto: "Nueces" }
          ],
          "6": [
            { value: 1, texto: "Arracacha" },
            { value: 2, texto: "Papa amarilla" },
            { value: 3, texto: "Batata" },
            { value: 4, texto: "Yuca" },
            { value: 5, texto: "Papa criolla" },
            { value: 6, texto: "Ñame" },
            { value: 7, texto: "Papa sabanera" },
            { value: 8, texto: "Papa" },
            { value: 9, texto: "Jengibre" },
            { value: 10, texto: "Malanga" },
            { value: 11, texto: "Yacón" },
            { value: 12, texto: "Otro" }
          ],
          "7": [
            { value: 1, texto: "Ornamentales de exteriores" },
            { value: 2, texto: "Ornamentales de Interiores" },
            { value: 3, texto: "Otros floricultivos" },
            { value: 4, texto: "Rosas" },
            { value: 5, texto: "Girasoles" },
            { value: 6, texto: "Crisantemo" },
            { value: 7, texto: "Tulipan" },
            { value: 8, texto: "Clavel" },
            { value: 9, texto: "Gerbera" },
            { value: 10, texto: "Gladiolo" },
            { value: 11, texto: "Acroclinio" },
            { value: 12, texto: "Aster" },
            { value: 13, texto: "Caléndula" }
          ],
          "8": [
            { value: 1, texto: "Lavanda" },
            { value: 2, texto: "Aloe vera" },
            { value: 3, texto: "Romero" },
            { value: 4, texto: "Manzanilla" },
            { value: 5, texto: "Menta" },
            { value: 6, texto: "Calendula" },
            { value: 7, texto: "Diente de leon" },
            { value: 8, texto: "Albahaca" },
            { value: 9, texto: "Algarrobo" },
            { value: 10, texto: "Boldo" },
            { value: 11, texto: "Acacia" },
            { value: 12, texto: "Toronjil" },
            { value: 13, texto: "Paja limón" },
            { value: 14, texto: "Cidrón" },
            { value: 15, texto: "Achiote" },
            { value: 16, texto: "Arnica" },
            { value: 17, texto: "Canela" },
            { value: 18, texto: "Tomillo" },
            { value: 19, texto: "Otro" }
          ],
          "9": [
            { value: 1, texto: "Caña de azucar" },
            { value: 2, texto: "Tabaco" },
            { value: 3, texto: "Pasto" },
            { value: 4, texto: "Café" },
            { value: 5, texto: "Cacao" }
          ]
        },
        unidades2: [
          { value: 1, texto: "Meses" },
          { value: 2, texto: "Bimestres" },
          { value: 3, texto: "Trimestres" },
          { value: 4, texto: "Semestres" },
          { value: 5, texto: "Años" }
        ],
        unidades3: [
          { value: 1, texto: "kilogramos" },
          { value: 2, texto: "Toneladas" },
          { value: 3, texto: "Unidades" }
        ],
        indiceEditarCA: null,
        indiceEditarEP: null,
        indiceEditarCF: null,
        lineas: [
          { value: 1, texto: "Cultivos agrícolas" },
          {
            value: 2,
            texto: "Pecuarias - especie animal con perspectiva comercial"
          },
          { value: 3, texto: "Cultivos forestales con perspectiva comercial" }
        ]
      };
    },
    computed: {
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
    filters: {
      moneda(val) {
        var number = +val.replace(/[^\d.]/g, "");
        return isNaN(number) ? 0 : number;
      },
      moment: function(date) {
        return moment(date).format("YYYY-MM-DD");
      }
    },
    methods: {
      nuevo: async function(id_hogar, id) {
        const parametros = {
          _token: this.csrf,
          id_hogar: id_hogar,
          id: id
        };
        try {
          await unidadesServicios.editar(parametros).then(respuesta => {
            this.dpto_options = respuesta.data.arrayDpto;
            this.muni_options = respuesta.data.arrayMuni;
            this.corregi_options = respuesta.data.arrayCorregi;
            this.vereda_options = respuesta.data.arrayVeredas;
            this.escolaridad_options = respuesta.data.arrayEscolaridad;
            this.CODIGOGENE = respuesta.data.codigo;

            this.datos.id_dpto = respuesta.data.unidades.id_dpto;
            this.datos.id_mun = respuesta.data.unidades.id_mun.padStart(3, 0);
            this.cambiarCombo("muni");
            this.datos.id_corre = "" + respuesta.data.unidades.id_corre;
            if (this.datos.id_corre !== "0") {
              this.cambiarCombo("corregi");
            }
            this.datos.id_vereda = "" + respuesta.data.unidades.id_vereda;
            this.datos.id_barrio = "" + respuesta.data.unidades.id_barrio;

            this.datos.id = "" + respuesta.data.unidades.id;
            this.datos.id_hogar = "" + respuesta.data.unidades.id_hogar;
            this.datos.direccion = "SIN DIRECCION";
            this.datos.estado = "" + respuesta.data.unidades.estado;
            this.datos.id_compania = "" + respuesta.data.unidades.id_compania;
            this.datos.fecha = "" + respuesta.data.unidades.fecha;
            this.datos.usuario_crear = "" + respuesta.data.unidades.usuario_crear;
            this.datos.fecha_editar = "" + respuesta.data.unidades.fecha_editar;
            this.datos.usuario_editar =
              "" + respuesta.data.unidades.usuario_editar;

            this.datos.nom_productor = "" + respuesta.data.unidades.nom_productor;
            this.datos.nivel_educativo =
              "" + respuesta.data.unidades.nivel_educativo;
            this.datos.tipo_id = "" + respuesta.data.unidades.tipo_id;
            this.datos.identificacion =
              "" + respuesta.data.unidades.identificacion;
            this.datos.nom_finca = "" + respuesta.data.unidades.nom_finca;
            this.datos.hogares_finca = "" + respuesta.data.unidades.hogares_finca;
            this.datos.linea_productiva = JSON.parse(
              respuesta.data.unidades.linea_productiva
            );
            this.datos.area_total_finca =
              "" + respuesta.data.unidades.area_total_finca;
            this.datos.distancia_finca =
              "" + respuesta.data.unidades.distancia_finca;
            this.datos.tenencia_propiedad =
              "" + respuesta.data.unidades.tenencia_propiedad;

            this.datos.atiende_entrevista =
              "" + respuesta.data.unidades.atiende_entrevista;
            this.datos.credito_produccion =
              "" + respuesta.data.unidades.credito_produccion;
            this.mostrarOtro("CP");

            this.datos.fuentes_prestamo =
              "" + respuesta.data.unidades.fuentes_prestamo;
            this.datos.cual_fuente = "" + respuesta.data.unidades.cual_fuente;

            this.datos.vias_acceso =
              respuesta.data.unidades.vias_acceso == null
                ? ""
                : respuesta.data.unidades.vias_acceso;
            this.datos.tipos_vias_acceso =
              respuesta.data.unidades.tipos_vias_acceso == null
                ? ""
                : respuesta.data.unidades.tipos_vias_acceso;

            this.datos.unidad_area = "" + respuesta.data.unidades.unidad_area;
            this.datos.unidad_distancia =
              "" + respuesta.data.unidades.unidad_distancia;

            this.herramientasData = respuesta.data.herramientas;
            this.utensiliosData = respuesta.data.utensilios;
            this.maquinasData = respuesta.data.maquinas;
            this.instalacionesData = respuesta.data.instalaciones;
            this.mediosData = respuesta.data.medios;

            this.cultivos_agricolas = respuesta.data.cultivos_agricolas;
            this.cultivos_forestales = respuesta.data.cultivos_forestales;
            this.explotaciones_pecuarias = respuesta.data.explotaciones_pecuarias;
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
      cambiarCombo: async function(caja) {
        if (caja === "dpto") {
          this.datos.id_mun = "";
          this.datos.id_corre = "";
          this.datos.id_vereda = "";
          this.datos.id_barrio = "";
        }
        if (caja === "muni") {
          this.datos.id_corre = "";
          this.datos.id_vereda = "";
          this.datos.id_barrio = "";
          const parametros = {
            _token: this.csrf,
            id: this.datos.id_mun,
            opcion: "MUN"
          };
          try {
            await barriosServicios.comboBarrios(parametros).then(respuesta => {
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
          this.datos.id_vereda = "";
          this.datos.id_barrio = "";

          if (this.datos.id_corre !== "0" && this.datos.id_corre !== "") {
            const parametros = {
              _token: this.csrf,
              id: this.datos.id_corre,
              opcion: "CORRE"
            };
            try {
              await barriosServicios.comboBarrios(parametros).then(respuesta => {
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
            if (this.datos.id_corre === "0") {
              this.cambiarCombo("muni");
              this.datos.id_corre = "0";
            } else {
              this.cambiarCombo("muni");
            }
          }
        }
        if (caja === "vereda") {
          this.datos.id_barrio = "0";
          const parametros = {
            _token: this.csrf,
            id: this.datos.id_corre,
            opcion: "VERE"
          };
          try {
            await barriosServicios.comboBarrios(parametros).then(respuesta => {
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
          let vere = "";
          if (this.datos.id_vereda === "" || this.datos.id_vereda === "0") {
            vere = this.datos.id_vereda;
            this.cambiarCombo("corregi");
            if (vere === "0") {
              this.datos.id_vereda = "0";
            }
          }
        }
      },
      volver() {
        this.$router.push("/gestion");
      },
      mostrarOtro(tipo) {
        if (tipo === "CP") {
          if (this.datos.credito_produccion === "SI") {
            this.mOCP = true;
            this.datos.fuentes_prestamo = "";
          } else {
            this.mOCP = false;
            this.mOFP = false;
            this.datos.fuentes_prestamo = "NA";
          }
        }
        if (tipo === "P") {
          if (this.datosCulAgri.pertenece === "NO") {
            this.mOP = false;
            this.datosCulAgri.tipo_pertenece = "NA";
            this.datosCulAgri.nombre_organizacion = "NA";
            this.datosCulAgri.no_pertenece = "NA";
            this.datosCulAgri.beneficios = "NA";
          } else {
            if (this.datosCulAgri.pertenece === "") {
              this.mOP = false;
              this.datosCulAgri.tipo_pertenece = "";
              this.datosCulAgri.nombre_organizacion = "";
              this.datosCulAgri.no_pertenece = "";
              this.datosCulAgri.beneficios = "";
            } else {
              this.mOP = true;
              this.datosCulAgri.tipo_pertenece = "";
              this.datosCulAgri.nombre_organizacion = "";
              this.datosCulAgri.no_pertenece = "NA";
              this.datosCulAgri.beneficios = "";
            }
          }
        }
        if (tipo === "TPP") {
          if (this.datosCulAgri.tipo_problema === "Otras") {
            this.mOTPP = true;
          } else {
            this.mOTPP = false;
          }
          this.datosCulAgri.otro_tipo_problema = "";
        }
        if (tipo === "PAT") {
          if (this.datosCulAgri.programa_asistencia_tecnica === "SI") {
            this.mOPAT = true;
          } else {
            this.mOPAT = false;
          }
          this.datosCulAgri.nombre_programa = "";
          this.datosCulAgri.entidad = "";
        }
        if (tipo === "CTI") {
          if (this.datosCulAgri.cambios_produccion_anio === "SI") {
            this.mOCTI = true;
          } else {
            this.mOCTI = false;
          }
          this.datosCulAgri.actividad_cambio = "";
        }
        if (tipo === "PPP") {
          if (this.datosExpPec.problematica_productos === "Otras") {
            this.mOPPP = true;
          } else {
            this.mOPPP = false;
          }
          this.datosExpPec.otra_problematica = "";
        }
        if (tipo === "PATP") {
          if (this.datosExpPec.pertenece_pecuaria === "SI") {
            this.mOPATP = true;
          } else {
            this.mOPATP = false;
          }
          this.datosExpPec.nombre_programa_pecuaria = "";
          this.datosExpPec.entidad_pecuaria = "";
        }
        if (tipo === "POPECU") {
          if (this.datosExpPec.pertenece_organizacion_pecuaria === "NO") {
            this.mOPECU = false;
            this.datosExpPec.tipo_organizacion_pecuaria = "NA";
            this.datosExpPec.nombre_organizacion_pecuaria = "NA";
            this.datosExpPec.no_pertenece_pecuaria = "NA";
            this.datosExpPec.beneficios_pecuaria = "NA";
          } else {
            if (this.datosExpPec.pertenece_organizacion_pecuaria === "") {
              this.mOPECU = false;
              this.datosExpPec.tipo_organizacion_pecuaria = "";
              this.datosExpPec.nombre_organizacion_pecuaria = "";
              this.datosExpPec.no_pertenece_pecuaria = "";
              this.datosExpPec.beneficios_pecuaria = "";
            } else {
              this.mOPECU = true;
              this.datosExpPec.tipo_organizacion_pecuaria = "";
              this.datosExpPec.nombre_organizacion_pecuaria = "";
              this.datosExpPec.no_pertenece_pecuaria = "NA";
              this.datosExpPec.beneficios_pecuaria = "";
            }
          }
        }
        if (tipo === "PPPF") {
          if (this.datosCulFor.problematica_productos_forestales === "Otras") {
            this.mOPPPF = true;
          } else {
            this.mOPPPF = false;
          }
          this.datosCulFor.otros_problematica_productos_forestales = "";
        }
        if (tipo === "PATF") {
          if (this.datosCulFor.pertenece_forestales === "SI") {
            this.mOPATF = true;
          } else {
            this.mOPATF = false;
          }
          this.datosCulFor.nombre_programa_forestales = "";
          this.datosCulFor.entidad_forestales = "";
        }
        if (tipo === "PF") {
          if (this.datosCulFor.pertenece_organizacion_forestales === "NO") {
            this.mOPF = false;
            this.datosCulFor.tipo_pertenece_forestales = "NA";
            this.datosCulFor.nombre_organizacion_forestales = "NA";
            this.datosCulFor.no_pertenece = "NA";
            this.datosCulFor.beneficios_forestales = "NA";
          } else {
            if (this.datosCulFor.pertenece_organizacion_forestales === "") {
              this.mOPF = false;
              this.datosCulFor.tipo_pertenece_forestales = "";
              this.datosCulFor.nombre_organizacion_forestales = "";
              this.datosCulFor.no_pertenece_forestales = "";
              this.datosCulFor.beneficios_forestales = "";
            } else {
              this.mOPF = true;
              this.datosCulFor.tipo_pertenece_forestales = "";
              this.datosCulFor.nombre_organizacion_forestales = "";
              this.datosCulFor.no_pertenece_forestales = "NA";
              this.datosCulFor.beneficios_forestales = "";
            }
          }
        }
        if (tipo === "FP") {
          this.datosCulFor.cual_fuente = "";
          if (this.datosCulFor.fuentes_prestamo === "7") {
            this.mOFP = true;
          } else {
            this.mOFP = false;
          }
        }
      },
      guardar: async function() {
        if (!this.checkForm()) {
        } else {
          const parametros = {
            _token: this.csrf,
            datos: this.datos,
            herramientas: this.herramientasData,
            utensilios: this.utensiliosData,
            maquinas: this.maquinasData,
            instalaciones: this.instalacionesData,
            medios: this.mediosData,
            cultivos_agricolas: this.cultivos_agricolas,
            explotaciones_pecuarias: this.explotaciones_pecuarias,
            cultivos_forestales: this.cultivos_forestales,
            opcion: "editar",
            id: this.IDUNIDAD
          };
          this.valG = false;
          try {
            await unidadesServicios
              .guardar(parametros)
              .then(respuesta => {
                if (respuesta.data.OPC == "SI") {
                  this.$swal(
                    "Guardar...!",
                    "Datos Guardados Exitosamente!",
                    "success"
                  );
                  this.volver();
                } else {
                  this.$swal("Guardar...!", "Ocurrio un problema!", "warning");
                }
                this.valG = true;
              })
              .catch(error => {});
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
          this.valG = true;
        }
      },
      checkForm(e) {
        let bande = true;
        if (this.datos.id_dpto === "") {
          this.$refs.id_dpto.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione la opción departamento!",
            "error"
          );
          return;
        }
        if (this.datos.id_mun === "") {
          this.$refs.id_mun.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione la opción municipio!",
            "error"
          );
          return;
        }
        if (this.datos.direccion === "") {
          this.$refs.direccion.focus();
          bande = false;
          this.$swal("Error...!", "Por favor digite la direccion!", "error");
          return;
        }
        if (this.datos.tipo_id === "") {
          this.$refs.tipo_id.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione el tipo de identificación!",
            "error"
          );
          return;
        }
        if (this.datos.identificacion === "") {
          this.$refs.identificacion.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor digite el numero de identificación!",
            "error"
          );
          return;
        }
        if (this.datos.nom_productor === "") {
          this.$refs.nom_productor.focus();
          bande = false;
          this.$swal("Error...!", "Por favor digite el productor!", "error");
          return;
        }
        if (this.datos.nivel_educativo === "") {
          this.$refs.nivel_educativo.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione el nivel educativo!",
            "error"
          );
          return;
        }
        if (this.datos.nom_finca === "") {
          this.$refs.nom_finca.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor digite el nombre de la finca!",
            "error"
          );
          return;
        }
        if (this.datos.hogares_finca === "") {
          this.$refs.hogares_finca.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor digite el numero de hogares en la finca!",
            "error"
          );
          return;
        }
        if (this.datos.linea_productiva.length <= 0) {
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione la linea productiva!",
            "error"
          );
          return;
        }
        if (this.datos.area_total_finca === "") {
          this.$refs.area_total_finca.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor digite el area total de la finca!",
            "error"
          );
          return;
        }
        if (this.datos.unidad_area === "") {
          this.$refs.unidad_area.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione la unidad de medida!",
            "error"
          );
          return;
        }
        if (this.datos.distancia_finca === "") {
          this.$refs.distancia_finca.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor digite la distancia de la finca!",
            "error"
          );
          return;
        }
        if (this.datos.unidad_distancia === "") {
          this.$refs.unidad_distancia.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione la unidad de medida de la distancia de la finca!",
            "error"
          );
          return;
        }
        if (this.datos.tenencia_propiedad === "") {
          this.$refs.tenencia_propiedad.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione la tenencia de la propiedad!",
            "error"
          );
          return;
        }
        if (this.datos.atiende_entrevista === "") {
          this.$refs.atiende_entrevista.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione quien atiende la entrevista!",
            "error"
          );
          return;
        }
        if (this.datos.credito_produccion === "") {
          this.$refs.credito_produccion.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione si posee credito de producción!",
            "error"
          );
          return;
        }
        return bande;
        e.preventDefault();
      },
      formato(caja) {
        if (caja == "id1") {
          if (this.datos.tipo_id == "CC") {
            this.datos.identificacion = this.datos.identificacion.replace(
              /[.*+\-?^${}()|[\]\\]/g,
              ""
            );
            let val = (this.datos.identificacion / 1)
              .toFixed(0)
              .replace(".", ",");
            this.datos.identificacion = val
              .toString()
              .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            if (this.datos.identificacion == "NaN") {
              this.datos.identificacion = "";
            }
            if (this.datos.identificacion == "0") {
              this.datos.identificacion = "";
            }
          }
        }
        if (caja == "tipoid") {
          this.datos.identificacion = "";
          if (this.datos.tipo_id != "CC") {
            if (this.datos.tipo_id === "ASI" || this.datos.tipo_id === "MSI") {
              this.datos.identificacion =
                this.CODIGOGENE + Math.floor(Math.random() * 100 + 1);
            } else {
              this.datos.identificacion = this.datos.identificacion.replace(
                /[.*+\-?^${}()|[\]\\]/g,
                ""
              );
            }
          } else {
            if (this.datos.tipo_id == "CC") {
              this.datos.identificacion = this.datos.identificacion.replace(
                /[.*+\-?^${}()|[\]\\]/g,
                ""
              );
              let val = (this.datos.identificacion / 1)
                .toFixed(0)
                .replace(".", ",");
              this.datos.identificacion = val
                .toString()
                .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
              if (this.datos.identificacion == "NaN") {
                this.datos.identificacion = "";
              }
              if (this.datos.identificacion == "0") {
                this.datos.identificacion = "";
              }
            }
          }
        }
        if (caja === "anio") {
          this.datos.anio = this.datos.anio.replace(/[^.\d]/g, "").trim();
          if (this.datos.anio == "NaN") {
            this.datos.anio = "";
          }
          if (this.datos.anio == "0") {
            this.datos.anio = "";
          }
        }
        if (caja === "hogares_finca") {
          this.datos.hogares_finca = this.datos.hogares_finca
            .replace(/[^.\d]/g, "")
            .trim();
          if (this.datos.hogares_finca == "NaN") {
            this.datos.hogares_finca = "";
          }
          if (this.datos.hogares_finca == "0") {
            this.datos.hogares_finca = "";
          }
        }
        if (caja == "area_total_finca") {
          this.datos.area_total_finca = this.datos.area_total_finca
            .replace(/[^.\d]/g, "")
            .trim();
          if (this.datos.area_total_finca == "NaN") {
            this.datos.area_total_finca = "";
          }
          if (this.datos.area_total_finca == "0") {
            this.datos.area_total_finca = "";
          }
        }
        if (caja == "distancia_finca") {
          this.datos.distancia_finca = this.datos.distancia_finca
            .replace(/[^.\d]/g, "")
            .trim();
          if (this.datos.distancia_finca == "NaN") {
            this.datos.distancia_finca = "";
          }
          if (this.datos.distancia_finca == "0") {
            this.datos.distancia_finca = "";
          }
        }
        if (caja == "importancias_agricolas") {
          this.datosCulAgri.importancias_agricolas = this.datosCulAgri.importancias_agricolas
            .replace(/[^.\d]/g, "")
            .trim();
          if (this.datosCulAgri.importancias_agricolas == "NaN") {
            this.datosCulAgri.importancias_agricolas = "";
          }
          if (this.datosCulAgri.importancias_agricolas == "0") {
            this.datosCulAgri.importancias_agricolas = "";
          }

          if (
            Number(this.datosCulAgri.importancias_agricolas) < 1 ||
            Number(this.datosCulAgri.importancias_agricolas) > 10
          ) {
            this.datosCulAgri.importancias_agricolas = "";
          }
        }
        if (caja == "area_produccion") {
          this.datosCulAgri.area_produccion = this.datosCulAgri.area_produccion
            .replace(/[^.\d]/g, "")
            .trim();
          if (this.datosCulAgri.area_produccion == "NaN") {
            this.datosCulAgri.area_produccion = "";
          }
          if (this.datosCulAgri.area_produccion == "0") {
            this.datosCulAgri.area_produccion = "";
          }
        }
        if (caja == "area_cosecha") {
          this.datosCulAgri.area_cosecha = this.datosCulAgri.area_cosecha
            .replace(/[^.\d]/g, "")
            .trim();
          if (this.datosCulAgri.area_cosecha == "NaN") {
            this.datosCulAgri.area_cosecha = "";
          }
          if (this.datosCulAgri.area_cosecha == "0") {
            this.datosCulAgri.area_cosecha = "";
          }
        }
        if (caja == "costo_produccion") {
          this.datosCulAgri.costo_produccion = this.datosCulAgri.costo_produccion.replace(
            /[.*+\-?^${}()|[\]\\]/g,
            ""
          );
          let val = (this.datosCulAgri.costo_produccion / 1)
            .toFixed(0)
            .replace(".", ",");
          this.datosCulAgri.costo_produccion = val
            .toString()
            .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
          if (this.datosCulAgri.costo_produccion == "NaN") {
            this.datosCulAgri.costo_produccion = "";
          }
          if (this.datosCulAgri.costo_produccion == "0") {
            this.datosCulAgri.costo_produccion = "";
          }
        }
        if (caja == "costo_establecimiento") {
          this.datosCulAgri.costo_establecimiento = this.datosCulAgri.costo_establecimiento.replace(
            /[.*+\-?^${}()|[\]\\]/g,
            ""
          );
          let val = (this.datosCulAgri.costo_establecimiento / 1)
            .toFixed(0)
            .replace(".", ",");
          this.datosCulAgri.costo_establecimiento = val
            .toString()
            .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
          if (this.datosCulAgri.costo_establecimiento == "NaN") {
            this.datosCulAgri.costo_establecimiento = "";
          }
          if (this.datosCulAgri.costo_establecimiento == "0") {
            this.datosCulAgri.costo_establecimiento = "";
          }
        }
        if (caja == "costo_sostenimiento") {
          this.datosCulAgri.costo_sostenimiento = this.datosCulAgri.costo_sostenimiento.replace(
            /[.*+\-?^${}()|[\]\\]/g,
            ""
          );
          let val = (this.datosCulAgri.costo_sostenimiento / 1)
            .toFixed(0)
            .replace(".", ",");
          this.datosCulAgri.costo_sostenimiento = val
            .toString()
            .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
          if (this.datosCulAgri.costo_sostenimiento == "NaN") {
            this.datosCulAgri.costo_sostenimiento = "";
          }
          if (this.datosCulAgri.costo_sostenimiento == "0") {
            this.datosCulAgri.costo_sostenimiento = "";
          }
        }
        if (caja == "precio_promedio_venta") {
          this.datosCulAgri.precio_promedio_venta = this.datosCulAgri.precio_promedio_venta.replace(
            /[.*+\-?^${}()|[\]\\]/g,
            ""
          );
          let val = (this.datosCulAgri.precio_promedio_venta / 1)
            .toFixed(0)
            .replace(".", ",");
          this.datosCulAgri.precio_promedio_venta = val
            .toString()
            .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
          if (this.datosCulAgri.precio_promedio_venta == "NaN") {
            this.datosCulAgri.precio_promedio_venta = "";
          }
          if (this.datosCulAgri.precio_promedio_venta == "0") {
            this.datosCulAgri.precio_promedio_venta = "";
          }
        }
        if (caja == "precio_promedio_venta_kg") {
          this.datosCulAgri.precio_promedio_venta_kg = this.datosCulAgri.precio_promedio_venta_kg.replace(
            /[.*+\-?^${}()|[\]\\]/g,
            ""
          );
          let val = (this.datosCulAgri.precio_promedio_venta_kg / 1)
            .toFixed(0)
            .replace(".", ",");
          this.datosCulAgri.precio_promedio_venta_kg = val
            .toString()
            .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
          if (this.datosCulAgri.precio_promedio_venta_kg == "NaN") {
            this.datosCulAgri.precio_promedio_venta_kg = "";
          }
          if (this.datosCulAgri.precio_promedio_venta_kg == "0") {
            this.datosCulAgri.precio_promedio_venta_kg = "";
          }
        }
        if (caja == "importancia_comercial") {
          this.datosExpPec.importancia_comercial = this.datosExpPec.importancia_comercial
            .replace(/[^.\d]/g, "")
            .trim();
          if (this.datosExpPec.importancia_comercial == "NaN") {
            this.datosExpPec.importancia_comercial = "";
          }
          if (this.datosExpPec.importancia_comercial == "0") {
            this.datosExpPec.importancia_comercial = "";
          }

          if (
            Number(this.datosExpPec.importancia_comercial) < 1 ||
            Number(this.datosExpPec.importancia_comercial) > 10
          ) {
            this.datosExpPec.importancia_comercial = "";
          }
        }
        if (caja == "numero_animales") {
          this.datosExpPec.numero_animales = this.datosExpPec.numero_animales
            .replace(/[^.\d]/g, "")
            .trim();
          if (this.datosExpPec.numero_animales == "NaN") {
            this.datosExpPec.numero_animales = "";
          }
          if (this.datosExpPec.numero_animales == "0") {
            this.datosExpPec.numero_animales = "";
          }
        }
        if (caja == "area_destinada_produccion") {
          this.datosExpPec.area_destinada_produccion = this.datosExpPec.area_destinada_produccion
            .replace(/[^.\d]/g, "")
            .trim();
          if (this.datosExpPec.area_destinada_produccion == "NaN") {
            this.datosExpPec.area_destinada_produccion = "";
          }
          if (this.datosExpPec.area_destinada_produccion == "0") {
            this.datosExpPec.area_destinada_produccion = "";
          }
        }
        if (caja == "precio_promedio_venta_pecuaria") {
          this.datosExpPec.precio_promedio_venta_pecuaria = this.datosExpPec.precio_promedio_venta_pecuaria.replace(
            /[.*+\-?^${}()|[\]\\]/g,
            ""
          );
          let val = (this.datosExpPec.precio_promedio_venta_pecuaria / 1)
            .toFixed(0)
            .replace(".", ",");
          this.datosExpPec.precio_promedio_venta_pecuaria = val
            .toString()
            .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
          if (this.datosExpPec.precio_promedio_venta_pecuaria == "NaN") {
            this.datosExpPec.precio_promedio_venta_pecuaria = "";
          }
          if (this.datosExpPec.precio_promedio_venta_pecuaria == "0") {
            this.datosExpPec.precio_promedio_venta_pecuaria = "";
          }
        }
        if (caja == "importancia_forestales") {
          this.datosCulFor.importancia_forestales = this.datosCulFor.importancia_forestales
            .replace(/[^.\d]/g, "")
            .trim();
          if (this.datosCulFor.importancia_forestales == "NaN") {
            this.datosCulFor.importancia_forestales = "";
          }
          if (this.datosCulFor.importancia_forestales == "0") {
            this.datosCulFor.importancia_forestales = "";
          }

          if (
            Number(this.datosCulFor.importancia_forestales) < 1 ||
            Number(this.datosCulFor.importancia_forestales) > 10
          ) {
            this.datosCulFor.importancia_forestales = "";
          }
        }
        if (caja == "area_sembrada_forestales") {
          this.datosCulFor.area_sembrada_forestales = this.datosCulFor.area_sembrada_forestales
            .replace(/[^.\d]/g, "")
            .trim();
          if (this.datosCulFor.area_sembrada_forestales == "NaN") {
            this.datosCulFor.area_sembrada_forestales = "";
          }
          if (this.datosCulFor.area_sembrada_forestales == "0") {
            this.datosCulFor.area_sembrada_forestales = "";
          }
        }
        if (caja == "edad_plantacion") {
          this.datosCulFor.edad_plantacion = this.datosCulFor.edad_plantacion
            .replace(/[^.\d]/g, "")
            .trim();
          if (this.datosCulFor.edad_plantacion == "NaN") {
            this.datosCulFor.edad_plantacion = "";
          }
          if (this.datosCulFor.edad_plantacion == "0") {
            this.datosCulFor.edad_plantacion = "";
          }
        }
        if (caja == "rendimiento_arbol") {
          this.datosCulFor.rendimiento_arbol = this.datosCulFor.rendimiento_arbol
            .replace(/[^.\d]/g, "")
            .trim();
          if (this.datosCulFor.rendimiento_arbol == "NaN") {
            this.datosCulFor.rendimiento_arbol = "";
          }
          if (this.datosCulFor.rendimiento_arbol == "0") {
            this.datosCulFor.rendimiento_arbol = "";
          }
        }
        if (caja == "costo_total_forestales") {
          this.datosCulFor.costo_total_forestales = this.datosCulFor.costo_total_forestales.replace(
            /[.*+\-?^${}()|[\]\\]/g,
            ""
          );
          let val = (this.datosCulFor.costo_total_forestales / 1)
            .toFixed(0)
            .replace(".", ",");
          this.datosCulFor.costo_total_forestales = val
            .toString()
            .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
          if (this.datosCulFor.costo_total_forestales == "NaN") {
            this.datosCulFor.costo_total_forestales = "";
          }
          if (this.datosCulFor.costo_total_forestales == "0") {
            this.datosCulFor.costo_total_forestales = "";
          }
        }
        if (caja == "costo_establecimiento_forestales") {
          this.datosCulFor.costo_establecimiento_forestales = this.datosCulFor.costo_establecimiento_forestales.replace(
            /[.*+\-?^${}()|[\]\\]/g,
            ""
          );
          let val = (this.datosCulFor.costo_establecimiento_forestales / 1)
            .toFixed(0)
            .replace(".", ",");
          this.datosCulFor.costo_establecimiento_forestales = val
            .toString()
            .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
          if (this.datosCulFor.costo_establecimiento_forestales == "NaN") {
            this.datosCulFor.costo_establecimiento_forestales = "";
          }
          if (this.datosCulFor.costo_establecimiento_forestales == "0") {
            this.datosCulFor.costo_establecimiento_forestales = "";
          }
        }
        if (caja == "costo_sostenimiento_forestales") {
          this.datosCulFor.costo_sostenimiento_forestales = this.datosCulFor.costo_sostenimiento_forestales.replace(
            /[.*+\-?^${}()|[\]\\]/g,
            ""
          );
          let val = (this.datosCulFor.costo_sostenimiento_forestales / 1)
            .toFixed(0)
            .replace(".", ",");
          this.datosCulFor.costo_sostenimiento_forestales = val
            .toString()
            .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
          if (this.datosCulFor.costo_sostenimiento_forestales == "NaN") {
            this.datosCulFor.costo_sostenimiento_forestales = "";
          }
          if (this.datosCulFor.costo_sostenimiento_forestales == "0") {
            this.datosCulFor.costo_sostenimiento_forestales = "";
          }
        }
        if (caja == "numero_arboles") {
          this.datosCulFor.numero_arboles = this.datosCulFor.numero_arboles
            .replace(/[^.\d]/g, "")
            .trim();
          if (this.datosCulFor.numero_arboles == "NaN") {
            this.datosCulFor.numero_arboles = "";
          }
          if (this.datosCulFor.numero_arboles == "0") {
            this.datosCulFor.numero_arboles = "";
          }
        }
        if (caja == "precio_promedio_venta_forestales") {
          this.datosCulFor.precio_promedio_venta_forestales = this.datosCulFor.precio_promedio_venta_forestales.replace(
            /[.*+\-?^${}()|[\]\\]/g,
            ""
          );
          let val = (this.datosCulFor.precio_promedio_venta_forestales / 1)
            .toFixed(0)
            .replace(".", ",");
          this.datosCulFor.precio_promedio_venta_forestales = val
            .toString()
            .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
          if (this.datosCulFor.precio_promedio_venta_forestales == "NaN") {
            this.datosCulFor.precio_promedio_venta_forestales = "";
          }
          if (this.datosCulFor.precio_promedio_venta_forestales == "0") {
            this.datosCulFor.precio_promedio_venta_forestales = "";
          }
        }
      },
      eliminarItemHerramientas: function(item, index) {
        if (item.id !== 0) {
          this.herramientasData[index].estado = "Inactivo";
          this.herramientasData.splice(index, 1, this.herramientasData[index]);
        } else {
          this.herramientasData.splice(index, 1);
        }
      },
      agregarHerramienta: function() {
        if (this.herramienta === "") {
          this.$swal("Error...!", "Por favor Digite Una Herramienta!", "error");
          return;
        }
        if (this.cuantasHerramienta === "") {
          this.$swal(
            "Error...!",
            "Por favor Digite cuantas Herramientas Tiene!",
            "error"
          );
          return;
        }
        if (this.herramienta === "Otras") {
          if (this.herramienta1 === "") {
            this.$swal("Error...!", "Por favor Digite Una Herramienta!", "error");
            return;
          } else {
            this.herramienta = this.herramienta1;
          }
        }
        if (!this.isNumeric(this.cuantasHerramienta)) {
          this.$swal(
            "Error...!",
            "Por favor Digite cuantas Herramientas Tiene!",
            "error"
          );
          return;
        }
        var i=0;
        while(i<this.herramientasData.length){
          if(this.herramientasData[i].herramienta.toUpperCase() === this.herramienta.toUpperCase()){
            this.$swal("Validando...!", "la herramienta ya se encuentra agregada!", "warning");
            return;              
          }            
          i++;
        }        
        this.herramientasData.push({
          id: 0,
          herramienta: this.herramienta,
          cuantos: this.cuantasHerramienta,
          estado: "Activo"
        });
        this.herramienta = "";
        this.herramienta1 = "";
        this.cuantasHerramienta = "";
      },
      eliminarItemUtensilios: function(item, index) {
        if (item.id !== 0) {
          this.utensiliosData[index].estado = "Inactivo";
          this.utensiliosData.splice(index, 1, this.utensiliosData[index]);
        } else {
          this.utensiliosData.splice(index, 1);
        }
      },
      agregarUtensilio: function() {
        if (this.utensilio === "") {
          this.$swal("Error...!", "Por favor Digite Un Utensilio!", "error");
          return;
        }
        if (this.cuantasUtensilio === "") {
          this.$swal(
            "Error...!",
            "Por favor Digite cuantos Utensilios Tiene!",
            "error"
          );
          return;
        }
        if (this.utensilio === "Otras") {
          if (this.utensilio1 === "") {
            this.$swal("Error...!", "Por favor Digite Un Utensilio!", "error");
            return;
          } else {
            this.utensilio = this.utensilio1;
          }
        }
        if (!this.isNumeric(this.cuantasUtensilio)) {
          this.$swal(
            "Error...!",
            "Por favor Digite cuantos Utensilios Tiene!",
            "error"
          );
          return;
        }
        var i=0;
        while(i<this.utensiliosData.length){
          if(this.utensiliosData[i].utensilio.toUpperCase() === this.utensilio.toUpperCase()){
            this.$swal("Validando...!", "El utensilio ya se encuentra agregado!", "warning");
            return;              
          }            
          i++;
        }        
        this.utensiliosData.push({
          id: 0,
          utensilio: this.utensilio,
          cuantos: this.cuantasUtensilio,
          estado: "Activo"
        });
        this.utensilio = "";
        this.utensilio1 = "";
        this.cuantasUtensilio = "";
      },
      isNumeric: function(n) {
        return !isNaN(parseFloat(n)) && isFinite(n);
      },
      eliminarItemMaquinas: function(item, index) {
        if (item.id !== 0) {
          this.maquinasData[index].estado = "Inactivo";
          this.maquinasData.splice(index, 1, this.maquinasData[index]);
        } else {
          this.maquinasData.splice(index, 1);
        }
      },
      agregarMaquina: function() {
        if (this.maquina === "") {
          this.$swal("Error...!", "Por favor Digite Una Maquina!", "error");
          return;
        }
        if (this.cuantasMaquina === "") {
          this.$swal(
            "Error...!",
            "Por favor Digite cuantas Maquinas Tiene!",
            "error"
          );
          return;
        }
        if (this.maquina === "Otras") {
          if (this.maquina1 === "") {
            this.$swal("Error...!", "Por favor Digite Una Maquina!", "error");
            return;
          } else {
            this.maquina = this.maquina1;
          }
        }
        if (!this.isNumeric(this.cuantasMaquina)) {
          this.$swal(
            "Error...!",
            "Por favor Digite cuantas Maquinas Tiene!",
            "error"
          );
          return;
        }
        var i=0;
        while(i<this.maquinasData.length){
          if(this.maquinasData[i].maquina.toUpperCase() === this.maquina.toUpperCase()){
            this.$swal("Validando...!", "La maquina ya se encuentra agregada!", "warning");
            return;              
          }            
          i++;
        }        
        this.maquinasData.push({
          id: 0,
          maquina: this.maquina,
          cuantos: this.cuantasMaquina,
          estado: "Activo"
        });
        this.maquina = "";
        this.maquina1 = "";
        this.cuantasMaquina = "";
      },
      eliminarItemInstalacion: function(item, index) {
        if (item.id !== 0) {
          this.instalacionesData[index].estado = "Inactivo";
          this.instalacionesData.splice(index, 1, this.instalacionesData[index]);
        } else {
          this.instalacionesData.splice(index, 1);
        }
      },
      agregarInstalacion: function() {
        if (this.instalacion === "") {
          this.$swal("Error...!", "Por favor Digite Una Instalación!", "error");
          return;
        }
        if (this.cuantasInstalacion === "") {
          this.$swal(
            "Error...!",
            "Por favor Digite cuantas Instalaciones Tiene el Predio!",
            "error"
          );
          return;
        }
        if (this.instalacion === "Otras") {
          if (this.instalacion1 === "") {
            this.$swal("Error...!", "Por favor Digite Una Instalación!", "error");
            return;
          } else {
            this.instalacion = this.instalacion1;
          }
        }
        if (!this.isNumeric(this.cuantasInstalacion)) {
          this.$swal(
            "Error...!",
            "Por favor Digite cuantas Instalaciones Tiene el Predio!",
            "error"
          );
          return;
        }
        var i=0;
        while(i<this.instalacionesData.length){
          if(this.instalacionesData[i].instalacion.toUpperCase() === this.instalacion.toUpperCase()){
            this.$swal("Validando...!", "La instalacion ya se encuentra agregada!", "warning");
            return;              
          }            
          i++;
        }        
        this.instalacionesData.push({
          id: 0,
          instalacion: this.instalacion,
          cuantos: this.cuantasInstalacion,
          estado: "Activo"
        });
        this.instalacion = "";
        this.instalacion1 = "";
        this.cuantasInstalacion = "";
      },
      eliminarItemMedio: function(item, index) {
        if (item.id !== 0) {
          this.mediosData[index].estado = "Inactivo";
          this.mediosData.splice(index, 1, this.mediosData[index]);
        } else {
          this.mediosData.splice(index, 1);
        }
      },
      agregarMedio: function() {
        if (this.medio === "") {
          this.$swal(
            "Error...!",
            "Por favor Digite Un Medio de Transporte!",
            "error"
          );
          return;
        }
        if (this.cuantasMedio === "") {
          this.$swal(
            "Error...!",
            "Por favor Digite cuantos Medios de Transporte tiene!",
            "error"
          );
          return;
        }
        if (this.medio === "Otras") {
          if (this.medio1 === "") {
            this.$swal(
              "Error...!",
              "Por favor Digite Un Medio de Transporte!",
              "error"
            );
            return;
          } else {
            this.medio = this.medio1;
          }
        }
        if (!this.isNumeric(this.cuantasMedio)) {
          this.$swal(
            "Error...!",
            "Por favor Digite cuantos Medios de Transporte tiene!",
            "error"
          );
          return;
        }
        var i=0;
        while(i<this.mediosData.length){
          if(this.mediosData[i].medio.toUpperCase() === this.medio.toUpperCase()){
            this.$swal("Validando...!", "El medio ya se encuentra agregado!", "warning");
            return;              
          }            
          i++;
        }        
        this.mediosData.push({
          id: 0,
          medio: this.medio,
          cuantos: this.cuantasMedio,
          estado: "Activo"
        });
        this.medio = "";
        this.medio1 = "";
        this.cuantasMedio = "";
      },

      agregarCA: function() {
        if (this.datosCulAgri.importancias_agricolas === "") {
          this.$refs.importancias_agricolas.focus();
          this.$swal(
            "Error...!",
            "Por favor digite la importancia del 1 al 10 de los cultivos agrícolas",
            "error"
          );
          return;
        }
        if (this.datosCulAgri.area_produccion === "") {
          this.$refs.area_produccion.focus();
          this.$swal(
            "Error...!",
            "Por favor digite el area de producción de los cultivos agrícolas",
            "error"
          );
          return;
        }
        if (this.datosCulAgri.unidad_area_produccion === "") {
          this.$refs.unidad_area_produccion.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione la unidad de medida del area de producción de los cultivos agrícolas",
            "error"
          );
          return;
        }
        if (this.datosCulAgri.producto === "") {
          this.$refs.producto.focus();
          this.$swal(
            "Error...!",
            "Por favor digite el tipo de cultivo de los cultivos agrícolas",
            "error"
          );
          return;
        }
        if (this.datosCulAgri.variedad === "") {
          this.$refs.variedad.focus();
          this.$swal(
            "Error...!",
            "Por favor digite la especie de los cultivos agrícolas",
            "error"
          );
          return;
        }
        if (this.datosCulAgri.semilla === "") {
          this.$refs.semilla.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione la semilla de los cultivos agrícolas",
            "error"
          );
          return;
        }
        if (this.datosCulAgri.pertenece === "") {
          this.$refs.pertenece.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione si pertenece a alguna organización de los cultivos agrícolas",
            "error"
          );
          return;
        }
        if (
          this.datosCulAgri.pertenece !== "" &&
          this.datosCulAgri.pertenece !== "NA"
        ) {
          if (this.datosCulAgri.tipo_pertenece === "") {
            this.$refs.tipo_pertenece.focus();
            this.$swal(
              "Error...!",
              "Por favor seleccione de qué tipo es la  organización de los cultivos agrícolas",
              "error"
            );
            return;
          }
          if (this.datosCulAgri.nombre_organizacion === "") {
            this.$refs.nombre_organizacion.focus();
            this.$swal(
              "Error...!",
              "Por favor digite el nombre de la organización de los cultivos agrícolas",
              "error"
            );
            return;
          }
        }
        if (this.datosCulAgri.pertenece === "NA") {
          if (this.datosCulAgri.no_pertenece === "") {
            this.$refs.no_pertenece.focus();
            this.$swal(
              "Error...!",
              "Por favor seleccione la razón por la cual no pertenece a ninguna organización de los cultivos agrícolas",
              "error"
            );
            return;
          }
        }
        if (this.datosCulAgri.beneficios === "") {
          this.$refs.beneficios.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione los beneficios de los cultivos agrícolas",
            "error"
          );
          return;
        }
        if (this.datosCulAgri.trabaja_asociacion === "") {
          this.$refs.trabaja_asociacion.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione si trabaja en asociación para realizar las actividades productivas de los cultivos agrícolas",
            "error"
          );
          return;
        }
        if (this.datosCulAgri.frecuente_cosecha === "") {
          this.$refs.frecuente_cosecha.focus();
          this.$swal(
            "Error...!",
            "Por favor digite para cada uno de los productos que tan frecuente se hace la cosecha de los cultivos agrícolas",
            "error"
          );
          return;
        }
        if (this.datosCulAgri.unidad_frecuencia_cosecha === "") {
          this.$refs.unidad_frecuencia_cosecha.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione una unidad de medida para frecuencia de la cosecha de los cultivos agrícolas",
            "error"
          );
          return;
        }
        if (this.datosCulAgri.area_cosecha === "") {
          this.$refs.area_cosecha.focus();
          this.$swal(
            "Error...!",
            "Por favor digite el área de cosecha de cada uno de los productos de los cultivos agrícolas",
            "error"
          );
          return;
        }
        if (this.datosCulAgri.unidad_area_cosecha === "") {
          this.$refs.unidad_area_cosecha.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione la unidad de medida del área de cosecha de cada uno de los productos de los cultivos agrícolas",
            "error"
          );
          return;
        }
        if (this.datosCulAgri.costo_produccion === "") {
          this.$refs.costo_produccion.focus();
          this.$swal(
            "Error...!",
            "Por favor digite el costo total de la producción en pesos de los cultivos agrícolas",
            "error"
          );
          return;
        }
        if (this.datosCulAgri.costo_establecimiento === "") {
          this.$refs.costo_establecimiento.focus();
          this.$swal(
            "Error...!",
            "Por favor digite el costo de establecimiento de la producción de los cultivos agrícolas",
            "error"
          );
          return;
        }
        if (this.datosCulAgri.costo_sostenimiento === "") {
          this.$refs.costo_sostenimiento.focus();
          this.$swal(
            "Error...!",
            "Por favor digite el costo de sostenimiento de los cultivos agrícolas",
            "error"
          );
          return;
        }
        if (this.datosCulAgri.produccion_destinada === "") {
          this.$refs.produccion_destinada.focus();
          this.$swal(
            "Error...!",
            "Por favor digite la producción destinada al mercado de los cultivos agrícolas",
            "error"
          );
          return;
        }
        if (this.datosCulAgri.unidad_producion_destinada === "") {
          this.$refs.unidad_producion_destinada.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione la unidad de medida de la producción destinada al mercado de los cultivos agrícolas",
            "error"
          );
          return;
        }
        if (this.datosCulAgri.tipo_problema === "") {
          this.$refs.tipo_problema.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione el tipo de problema que enfrenta en su producción de los cultivos agrícolas",
            "error"
          );
          return;
        }
        if (this.datosCulAgri.tipo_problema === "5") {
          if (this.datosCulAgri.otro_tipo_problema === "") {
            this.$refs.otro_tipo_problema.focus();
            this.$swal(
              "Error...!",
              "Por favor digite otros tipos de problemas de los cultivos agrícolas",
              "error"
            );
            return;
          }
        }
        if (this.datosCulAgri.compradores === "") {
          this.$refs.compradores.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione los compradores de los cultivos agrícolas",
            "error"
          );
          return;
        }
        if (this.datosCulAgri.metodo_pago === "") {
          this.$refs.metodo_pago.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione el método de pago de los cultivos agrícolas",
            "error"
          );
          return;
        }
        if (this.datosCulAgri.precio_promedio_venta_kg === "") {
          this.$refs.precio_promedio_venta_kg.focus();
          this.$swal(
            "Error...!",
            "Por favor digite el precio promedio de venta kg de los cultivos agrícolas",
            "error"
          );
          return;
        }
        if (this.datosCulAgri.programa_asistencia_tecnica === "") {
          this.$refs.programa_asistencia_tecnica.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione si pertenence a programas de asistencia técnica de los cultivos agrícolas",
            "error"
          );
          return;
        }
        if (this.datosCulAgri.programa_asistencia_tecnica === "SI") {
          if (this.datosCulAgri.nombre_programa === "") {
            this.$refs.nombre_programa.focus();
            this.$swal(
              "Error...!",
              "Por favor digite el nombre del programa de asistencia técnica de los cultivos agrícolas",
              "error"
            );
            return;
          }
          if (this.datosCulAgri.entidad === "") {
            this.$refs.entidad.focus();
            this.$swal(
              "Error...!",
              "Por favor digite el nombre de la entidad de asistencia técnica de los cultivos agrícolas",
              "error"
            );
            return;
          }
        }
        if (this.datosCulAgri.cambios_produccion_anio === "") {
          this.$refs.cambios_produccion_anio.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione si durante el último año, ha realizado usted cambios en su producción en temas de innovación de los cultivos agrícolas",
            "error"
          );
          return;
        }
        if (this.datosCulAgri.cambios_produccion_anio === "SI") {
          if (this.datosCulAgri.actividad_cambio === "") {
            this.$refs.actividad_cambio.focus();
            this.$swal(
              "Error...!",
              "Por favor seleccione en qué actividad realizó el cambio de los cultivos agrícolas",
              "error"
            );
            return;
          }
        }
        this.cultivos_agricolas.push({
          id: 0,
          id_unidad: 0,
          importancias_agricolas: this.datosCulAgri.importancias_agricolas,
          unidad_area_produccion: this.datosCulAgri.unidad_area_produccion,
          texto_unidad_area_produccion: this.showText(
            this.datosCulAgri.unidad_area_produccion,
            this.unidades1
          ),
          producto: this.datosCulAgri.producto,
          texto_producto: this.showText(
            this.datosCulAgri.producto,
            this.tipocultivo
          ),
          variedad: this.datosCulAgri.variedad,
          texto_variedad: this.showText2(
            this.datosCulAgri.variedad,
            this.especie2,
            this.datosCulAgri.producto
          ),
          semilla: this.datosCulAgri.semilla,
          pertenece: this.datosCulAgri.pertenece,
          tipo_pertenece: this.datosCulAgri.tipo_pertenece,
          nombre_organizacion: this.datosCulAgri.nombre_organizacion,
          area_produccion: this.datosCulAgri.area_produccion,

          beneficios: this.datosCulAgri.beneficios,
          texto_beneficios: this.showText(
            this.datosCulAgri.beneficios,
            this.beneficios
          ),
          no_pertenece: this.datosCulAgri.no_pertenece,
          texto_no_pertenece: this.showText(
            this.datosCulAgri.no_pertenece,
            this.razon1
          ),
          trabaja_asociacion: this.datosCulAgri.trabaja_asociacion,
          frecuente_cosecha: this.datosCulAgri.frecuente_cosecha,

          texto_unidad_frecuencia_cosecha: this.showText(
            this.datosCulAgri.unidad_frecuencia_cosecha,
            this.unidades2
          ),
          unidad_frecuencia_cosecha: this.datosCulAgri.unidad_frecuencia_cosecha,

          area_cosecha: this.datosCulAgri.area_cosecha,
          unidad_area_cosecha: this.datosCulAgri.unidad_area_cosecha,
          texto_unidad_area_cosecha: this.showText(
            this.datosCulAgri.unidad_area_cosecha,
            this.unidades1
          ),
          costo_produccion: this.datosCulAgri.costo_produccion,
          costo_establecimiento: this.datosCulAgri.costo_establecimiento,
          costo_sostenimiento: this.datosCulAgri.costo_sostenimiento,
          produccion_destinada: this.datosCulAgri.produccion_destinada,

          unidad_producion_destinada: this.datosCulAgri
            .unidad_producion_destinada,
          texto_unidad_producion_destinada: this.showText(
            this.datosCulAgri.unidad_producion_destinada,
            this.unidades3
          ),

          tipo_problema: this.datosCulAgri.tipo_problema,
          compradores: this.datosCulAgri.compradores,
          precio_promedio_venta: this.datosCulAgri.precio_promedio_venta,
          metodo_pago: this.datosCulAgri.metodo_pago,
          precio_promedio_venta_kg: this.datosCulAgri.precio_promedio_venta_kg,
          subproductos_produccion: this.datosCulAgri.subproductos_produccion,
          programa_asistencia_tecnica: this.datosCulAgri
            .programa_asistencia_tecnica,
          nombre_programa: this.datosCulAgri.nombre_programa,
          entidad: this.datosCulAgri.entidad,
          cambios_produccion_anio: this.datosCulAgri.cambios_produccion_anio,

          actividad_cambio: this.datosCulAgri.actividad_cambio,
          estado: "Activo",
          id_compania: 1,
          otro_tipo_problema: this.datosCulAgri.otro_tipo_problema
        });

        this.datosCulAgri.importancias_agricolas = "";
        this.datosCulAgri.unidad_area_produccion = "";
        this.datosCulAgri.producto = "";
        this.datosCulAgri.variedad = "";
        this.datosCulAgri.semilla = "";
        this.datosCulAgri.pertenece = "";
        this.datosCulAgri.tipo_pertenece = "";
        this.datosCulAgri.nombre_organizacion = "";
        this.datosCulAgri.area_produccion = "";

        this.datosCulAgri.beneficios = "";
        this.datosCulAgri.no_pertenece = "";
        this.datosCulAgri.trabaja_asociacion = "";
        this.datosCulAgri.frecuente_cosecha = "";
        this.datosCulAgri.unidad_frecuencia_cosecha = "";
        this.datosCulAgri.area_cosecha = "";
        this.datosCulAgri.unidad_area_cosecha = "";
        this.datosCulAgri.costo_produccion = "";
        this.datosCulAgri.costo_establecimiento = "";
        this.datosCulAgri.costo_sostenimiento = "";
        this.datosCulAgri.produccion_destinada = "";

        this.datosCulAgri.unidad_producion_destinada = "";

        this.datosCulAgri.tipo_problema = "";
        this.datosCulAgri.compradores = "";
        this.datosCulAgri.precio_promedio_venta = "";
        this.datosCulAgri.metodo_pago = "";
        this.datosCulAgri.precio_promedio_venta_kg = "";
        this.datosCulAgri.subproductos_produccion = "";
        this.datosCulAgri.programa_asistencia_tecnica = "";
        this.datosCulAgri.nombre_programa = "";
        this.datosCulAgri.entidad = "";
        this.datosCulAgri.cambios_produccion_anio = "";

        this.datosCulAgri.actividad_cambio = "";
        this.datosCulAgri.otro_tipo_problema = "";

        this.mOPAT = false;
        this.mOTPP = false;
        this.mOP = false;
        this.mOCTI = false;
      },
      eliminarItemCA: function(item, index) {
        if (item.id !== 0) {
          this.cultivos_agricolas[index].estado = "Inactivo";
          this.cultivos_agricolas.splice(
            index,
            1,
            this.cultivos_agricolas[index]
          );
        } else {
          this.cultivos_agricolas.splice(index, 1);
        }
      },
      editarItemCA: function(index, item) {
        this.indiceEditarCA = index;
        this.bandeGuaEdiCA = false;
        this.datosCulAgri.id = item.id;

        this.datosCulAgri.id_unidad = item.id_unidad;
        this.datosCulAgri.importancias_agricolas = item.importancias_agricolas;
        this.datosCulAgri.area_produccion = item.area_produccion;
        this.datosCulAgri.unidad_area_produccion = item.unidad_area_produccion;
        this.datosCulAgri.producto = item.producto;
        this.datosCulAgri.variedad = item.variedad;
        this.datosCulAgri.semilla = item.semilla;
        this.datosCulAgri.pertenece = item.pertenece;
        this.datosCulAgri.tipo_pertenece = item.tipo_pertenece;
        this.datosCulAgri.nombre_organizacion = item.nombre_organizacion;

        this.datosCulAgri.beneficios = item.beneficios;
        this.datosCulAgri.no_pertenece = item.no_pertenece;
        this.datosCulAgri.trabaja_asociacion = item.trabaja_asociacion;
        this.datosCulAgri.frecuente_cosecha = item.frecuente_cosecha;
        this.datosCulAgri.unidad_frecuencia_cosecha =
          item.unidad_frecuencia_cosecha;
        this.datosCulAgri.area_cosecha = item.area_cosecha;
        this.datosCulAgri.unidad_area_cosecha = item.unidad_area_cosecha;
        this.datosCulAgri.costo_produccion = item.costo_produccion;
        this.datosCulAgri.costo_establecimiento = item.costo_establecimiento;
        this.datosCulAgri.costo_sostenimiento = item.costo_sostenimiento;
        this.datosCulAgri.produccion_destinada = item.produccion_destinada;

        this.datosCulAgri.unidad_producion_destinada =
          item.unidad_producion_destinada;

        this.datosCulAgri.tipo_problema = item.tipo_problema;
        this.datosCulAgri.compradores = item.compradores;
        this.datosCulAgri.precio_promedio_venta = item.precio_promedio_venta;
        this.datosCulAgri.metodo_pago = item.metodo_pago;
        this.datosCulAgri.precio_promedio_venta_kg =
          item.precio_promedio_venta_kg;
        this.datosCulAgri.subproductos_produccion = item.subproductos_produccion;
        this.datosCulAgri.programa_asistencia_tecnica =
          item.programa_asistencia_tecnica;
        this.datosCulAgri.nombre_programa = item.nombre_programa;
        this.datosCulAgri.entidad = item.entidad;
        this.datosCulAgri.cambios_produccion_anio = item.cambios_produccion_anio;

        this.datosCulAgri.actividad_cambio = item.actividad_cambio;
        this.datosCulAgri.estado = item.estado;
        this.datosCulAgri.id_compania = item.id_compania;
        this.datosCulAgri.otro_tipo_problema = item.otro_tipo_problema;

        if (this.datosCulAgri.pertenece === "NA") {
          this.mOP = false;
        } else {
          if (this.datosCulAgri.pertenece === "") {
            this.mOP = false;
          } else {
            this.mOP = true;
          }
        }
        if (this.datosCulAgri.tipo_problema === "Otras") {
          this.mOTPP = true;
        } else {
          this.mOTPP = false;
        }
        if (this.datosCulAgri.programa_asistencia_tecnica === "SI") {
          this.mOPAT = true;
        } else {
          this.mOPAT = false;
        }
        if (this.datosCulAgri.cambios_produccion_anio === "SI") {
          this.mOCTI = true;
        } else {
          this.mOCTI = false;
        }
        // this.cultivos_agricolas.splice(index, 1);

        //INACTIVAR LA FILA
        this.cultivos_agricolas[this.indiceEditarCA].estado = "Inactivo";
        this.cultivos_agricolas.splice(
          this.indiceEditarCA,
          1,
          this.cultivos_agricolas[this.indiceEditarCA]
        );
        //INACTIVAR LA FILA
      },
      editarCA: function() {
        if (this.datosCulAgri.importancias_agricolas === "") {
          this.$refs.importancias_agricolas.focus();
          this.$swal(
            "Error...!",
            "Por favor digite la importancia del 1 al 10 de los cultivos agrícolas",
            "error"
          );
          return;
        }
        if (this.datosCulAgri.area_produccion === "") {
          this.$refs.area_produccion.focus();
          this.$swal(
            "Error...!",
            "Por favor digite el area de producción de los cultivos agrícolas",
            "error"
          );
          return;
        }
        if (this.datosCulAgri.unidad_area_produccion === "") {
          this.$refs.unidad_area_produccion.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione la unidad de medida del area de producción de los cultivos agrícolas",
            "error"
          );
          return;
        }
        if (this.datosCulAgri.producto === "") {
          this.$refs.producto.focus();
          this.$swal(
            "Error...!",
            "Por favor digite el tipo de cultivo de los cultivos agrícolas",
            "error"
          );
          return;
        }
        if (this.datosCulAgri.variedad === "") {
          this.$refs.variedad.focus();
          this.$swal(
            "Error...!",
            "Por favor digite la especie de los cultivos agrícolas",
            "error"
          );
          return;
        }
        if (this.datosCulAgri.semilla === "") {
          this.$refs.semilla.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione la semilla de los cultivos agrícolas",
            "error"
          );
          return;
        }
        if (this.datosCulAgri.pertenece === "") {
          this.$refs.pertenece.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione si pertenece a alguna organización de los cultivos agrícolas",
            "error"
          );
          return;
        }
        if (
          this.datosCulAgri.pertenece !== "" &&
          this.datosCulAgri.pertenece !== "NA"
        ) {
          if (this.datosCulAgri.tipo_pertenece === "") {
            this.$refs.tipo_pertenece.focus();
            this.$swal(
              "Error...!",
              "Por favor seleccione de qué tipo es la  organización de los cultivos agrícolas",
              "error"
            );
            return;
          }
          if (this.datosCulAgri.nombre_organizacion === "") {
            this.$refs.nombre_organizacion.focus();
            this.$swal(
              "Error...!",
              "Por favor digite el nombre de la organización de los cultivos agrícolas",
              "error"
            );
            return;
          }
        }
        if (this.datosCulAgri.pertenece === "NA") {
          if (this.datosCulAgri.no_pertenece === "") {
            this.$refs.no_pertenece.focus();
            this.$swal(
              "Error...!",
              "Por favor seleccione la razón por la cual no pertenece a ninguna organización de los cultivos agrícolas",
              "error"
            );
            return;
          }
        }
        if (this.datosCulAgri.beneficios === "") {
          this.$refs.beneficios.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione los beneficios de los cultivos agrícolas",
            "error"
          );
          return;
        }
        if (this.datosCulAgri.trabaja_asociacion === "") {
          this.$refs.trabaja_asociacion.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione si trabaja en asociación para realizar las actividades productivas de los cultivos agrícolas",
            "error"
          );
          return;
        }
        if (this.datosCulAgri.frecuente_cosecha === "") {
          this.$refs.frecuente_cosecha.focus();
          this.$swal(
            "Error...!",
            "Por favor digite para cada uno de los productos que tan frecuente se hace la cosecha de los cultivos agrícolas",
            "error"
          );
          return;
        }
        if (this.datosCulAgri.unidad_frecuencia_cosecha === "") {
          this.$refs.unidad_frecuencia_cosecha.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione una unidad de medida para frecuencia de la cosecha de los cultivos agrícolas",
            "error"
          );
          return;
        }
        if (this.datosCulAgri.area_cosecha === "") {
          this.$refs.area_cosecha.focus();
          this.$swal(
            "Error...!",
            "Por favor digite el área de cosecha de cada uno de los productos de los cultivos agrícolas",
            "error"
          );
          return;
        }
        if (this.datosCulAgri.unidad_area_cosecha === "") {
          this.$refs.unidad_area_cosecha.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione la unidad de medida del área de cosecha de cada uno de los productos de los cultivos agrícolas",
            "error"
          );
          return;
        }
        if (this.datosCulAgri.costo_produccion === "") {
          this.$refs.costo_produccion.focus();
          this.$swal(
            "Error...!",
            "Por favor digite el costo total de la producción en pesos de los cultivos agrícolas",
            "error"
          );
          return;
        }
        if (this.datosCulAgri.costo_establecimiento === "") {
          this.$refs.costo_establecimiento.focus();
          this.$swal(
            "Error...!",
            "Por favor digite el costo de establecimiento de la producción de los cultivos agrícolas",
            "error"
          );
          return;
        }
        if (this.datosCulAgri.costo_sostenimiento === "") {
          this.$refs.costo_sostenimiento.focus();
          this.$swal(
            "Error...!",
            "Por favor digite el costo de sostenimiento de los cultivos agrícolas",
            "error"
          );
          return;
        }
        if (this.datosCulAgri.produccion_destinada === "") {
          this.$refs.produccion_destinada.focus();
          this.$swal(
            "Error...!",
            "Por favor digite la producción destinada al mercado de los cultivos agrícolas",
            "error"
          );
          return;
        }
        if (this.datosCulAgri.unidad_producion_destinada === "") {
          this.$refs.unidad_producion_destinada.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione la unidad de medida de la producción destinada al mercado de los cultivos agrícolas",
            "error"
          );
          return;
        }
        if (this.datosCulAgri.tipo_problema === "") {
          this.$refs.tipo_problema.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione el tipo de problema que enfrenta en su producción de los cultivos agrícolas",
            "error"
          );
          return;
        }
        if (this.datosCulAgri.tipo_problema === "5") {
          if (this.datosCulAgri.otro_tipo_problema === "") {
            this.$refs.otro_tipo_problema.focus();
            this.$swal(
              "Error...!",
              "Por favor digite otros tipos de problemas de los cultivos agrícolas",
              "error"
            );
            return;
          }
        }
        if (this.datosCulAgri.compradores === "") {
          this.$refs.compradores.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione los compradores de los cultivos agrícolas",
            "error"
          );
          return;
        }
        if (this.datosCulAgri.metodo_pago === "") {
          this.$refs.metodo_pago.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione el método de pago de los cultivos agrícolas",
            "error"
          );
          return;
        }
        if (this.datosCulAgri.precio_promedio_venta_kg === "") {
          this.$refs.precio_promedio_venta_kg.focus();
          this.$swal(
            "Error...!",
            "Por favor digite el precio promedio de venta kg de los cultivos agrícolas",
            "error"
          );
          return;
        }
        if (this.datosCulAgri.programa_asistencia_tecnica === "") {
          this.$refs.programa_asistencia_tecnica.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione si pertenence a programas de asistencia técnica de los cultivos agrícolas",
            "error"
          );
          return;
        }
        if (this.datosCulAgri.programa_asistencia_tecnica === "SI") {
          if (this.datosCulAgri.nombre_programa === "") {
            this.$refs.nombre_programa.focus();
            this.$swal(
              "Error...!",
              "Por favor digite el nombre del programa de asistencia técnica de los cultivos agrícolas",
              "error"
            );
            return;
          }
          if (this.datosCulAgri.entidad === "") {
            this.$refs.entidad.focus();
            this.$swal(
              "Error...!",
              "Por favor digite el nombre de la entidad de asistencia técnica de los cultivos agrícolas",
              "error"
            );
            return;
          }
        }
        if (this.datosCulAgri.cambios_produccion_anio === "") {
          this.$refs.cambios_produccion_anio.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione si durante el último año, ha realizado usted cambios en su producción en temas de innovación de los cultivos agrícolas",
            "error"
          );
          return;
        }
        if (this.datosCulAgri.cambios_produccion_anio === "SI") {
          if (this.datosCulAgri.actividad_cambio === "") {
            this.$refs.actividad_cambio.focus();
            this.$swal(
              "Error...!",
              "Por favor seleccione en qué actividad realizó el cambio de los cultivos agrícolas",
              "error"
            );
            return;
          }
        }
        // AGREGAR LOS DATOS
        this.cultivos_agricolas[this.indiceEditarCA].id = this.datosCulAgri.id;
        this.cultivos_agricolas[
          this.indiceEditarCA
        ].id_unidad = this.datosCulAgri.id_unidad;
        this.cultivos_agricolas[
          this.indiceEditarCA
        ].importancias_agricolas = this.datosCulAgri.importancias_agricolas;
        this.cultivos_agricolas[
          this.indiceEditarCA
        ].unidad_area_produccion = this.datosCulAgri.unidad_area_produccion;
        this.cultivos_agricolas[
          this.indiceEditarCA
        ].texto_unidad_area_produccion = this.showText(
          Number(this.datosCulAgri.unidad_area_produccion),
          this.unidades1
        );
        this.cultivos_agricolas[
          this.indiceEditarCA
        ].producto = this.datosCulAgri.producto;
        this.cultivos_agricolas[
          this.indiceEditarCA
        ].texto_producto = this.showText(
          Number(this.datosCulAgri.producto),
          this.tipocultivo
        );
        this.cultivos_agricolas[
          this.indiceEditarCA
        ].variedad = this.datosCulAgri.variedad;
        this.cultivos_agricolas[
          this.indiceEditarCA
        ].texto_variedad = this.showText2(
          Number(this.datosCulAgri.variedad),
          this.especie2,
          this.datosCulAgri.producto
        );
        this.cultivos_agricolas[
          this.indiceEditarCA
        ].semilla = this.datosCulAgri.semilla;
        this.cultivos_agricolas[
          this.indiceEditarCA
        ].pertenece = this.datosCulAgri.pertenece;
        this.cultivos_agricolas[
          this.indiceEditarCA
        ].tipo_pertenece = this.datosCulAgri.tipo_pertenece;
        this.cultivos_agricolas[
          this.indiceEditarCA
        ].nombre_organizacion = this.datosCulAgri.nombre_organizacion;
        this.cultivos_agricolas[
          this.indiceEditarCA
        ].area_produccion = this.datosCulAgri.area_produccion;
        this.cultivos_agricolas[
          this.indiceEditarCA
        ].beneficios = this.datosCulAgri.beneficios;
        this.cultivos_agricolas[
          this.indiceEditarCA
        ].texto_beneficios = this.showText(
          this.datosCulAgri.beneficios,
          this.beneficios
        );
        this.cultivos_agricolas[
          this.indiceEditarCA
        ].no_pertenece = this.datosCulAgri.no_pertenece;
        this.cultivos_agricolas[
          this.indiceEditarCA
        ].texto_no_pertenece = this.showText(
          Number(this.datosCulAgri.no_pertenece),
          this.razon1
        );
        this.cultivos_agricolas[
          this.indiceEditarCA
        ].trabaja_asociacion = this.datosCulAgri.trabaja_asociacion;
        this.cultivos_agricolas[
          this.indiceEditarCA
        ].frecuente_cosecha = this.datosCulAgri.frecuente_cosecha;
        this.cultivos_agricolas[
          this.indiceEditarCA
        ].unidad_frecuencia_cosecha = this.datosCulAgri.unidad_frecuencia_cosecha;
        this.cultivos_agricolas[
          this.indiceEditarCA
        ].texto_unidad_frecuencia_cosecha = this.showText(
          Number(this.datosCulAgri.unidad_frecuencia_cosecha),
          this.unidades2
        );
        this.cultivos_agricolas[
          this.indiceEditarCA
        ].area_cosecha = this.datosCulAgri.area_cosecha;
        this.cultivos_agricolas[
          this.indiceEditarCA
        ].unidad_area_cosecha = this.datosCulAgri.unidad_area_cosecha;
        this.cultivos_agricolas[
          this.indiceEditarCA
        ].texto_unidad_area_cosecha = this.showText(
          Number(this.datosCulAgri.unidad_area_cosecha),
          this.unidades1
        );
        this.cultivos_agricolas[
          this.indiceEditarCA
        ].costo_produccion = this.datosCulAgri.costo_produccion;
        this.cultivos_agricolas[
          this.indiceEditarCA
        ].costo_establecimiento = this.datosCulAgri.costo_establecimiento;
        this.cultivos_agricolas[
          this.indiceEditarCA
        ].costo_sostenimiento = this.datosCulAgri.costo_sostenimiento;
        this.cultivos_agricolas[
          this.indiceEditarCA
        ].produccion_destinada = this.datosCulAgri.produccion_destinada;

        this.cultivos_agricolas[
          this.indiceEditarCA
        ].unidad_producion_destinada = this.datosCulAgri.unidad_producion_destinada;
        this.cultivos_agricolas[
          this.indiceEditarCA
        ].texto_unidad_producion_destinada = this.showText(
          Number(this.datosCulAgri.unidad_producion_destinada),
          this.unidades3
        );

        this.cultivos_agricolas[
          this.indiceEditarCA
        ].tipo_problema = this.datosCulAgri.tipo_problema;
        this.cultivos_agricolas[
          this.indiceEditarCA
        ].compradores = this.datosCulAgri.compradores;
        this.cultivos_agricolas[
          this.indiceEditarCA
        ].precio_promedio_venta = this.datosCulAgri.precio_promedio_venta;
        this.cultivos_agricolas[
          this.indiceEditarCA
        ].metodo_pago = this.datosCulAgri.metodo_pago;
        this.cultivos_agricolas[
          this.indiceEditarCA
        ].precio_promedio_venta_kg = this.datosCulAgri.precio_promedio_venta_kg;
        this.cultivos_agricolas[
          this.indiceEditarCA
        ].subproductos_produccion = this.datosCulAgri.subproductos_produccion;
        this.cultivos_agricolas[
          this.indiceEditarCA
        ].programa_asistencia_tecnica = this.datosCulAgri.programa_asistencia_tecnica;
        this.cultivos_agricolas[
          this.indiceEditarCA
        ].nombre_programa = this.datosCulAgri.nombre_programa;
        this.cultivos_agricolas[
          this.indiceEditarCA
        ].entidad = this.datosCulAgri.entidad;
        this.cultivos_agricolas[
          this.indiceEditarCA
        ].cambios_produccion_anio = this.datosCulAgri.cambios_produccion_anio;
        this.cultivos_agricolas[
          this.indiceEditarCA
        ].actividad_cambio = this.datosCulAgri.actividad_cambio;
        this.cultivos_agricolas[
          this.indiceEditarCA
        ].estado = this.datosCulAgri.estado;
        this.cultivos_agricolas[
          this.indiceEditarCA
        ].id_compania = this.datosCulAgri.id_compania;
        this.cultivos_agricolas[
          this.indiceEditarCA
        ].otro_tipo_problema = this.datosCulAgri.otro_tipo_problema;

        this.cultivos_agricolas.splice(
          this.indiceEditarCA,
          1,
          this.cultivos_agricolas[this.indiceEditarCA]
        );

        this.datosCulAgri.importancias_agricolas = "";
        this.datosCulAgri.unidad_area_produccion = "";
        this.datosCulAgri.producto = "";
        this.datosCulAgri.variedad = "";
        this.datosCulAgri.semilla = "";
        this.datosCulAgri.pertenece = "";
        this.datosCulAgri.tipo_pertenece = "";
        this.datosCulAgri.nombre_organizacion = "";
        this.datosCulAgri.area_produccion = "";

        this.datosCulAgri.beneficios = "";
        this.datosCulAgri.no_pertenece = "";
        this.datosCulAgri.trabaja_asociacion = "";
        this.datosCulAgri.frecuente_cosecha = "";
        this.datosCulAgri.unidad_frecuencia_cosecha = "";
        this.datosCulAgri.area_cosecha = "";
        this.datosCulAgri.unidad_area_cosecha = "";
        this.datosCulAgri.costo_produccion = "";
        this.datosCulAgri.costo_establecimiento = "";
        this.datosCulAgri.costo_sostenimiento = "";
        this.datosCulAgri.produccion_destinada = "";

        this.datosCulAgri.tipo_problema = "";
        this.datosCulAgri.compradores = "";
        this.datosCulAgri.precio_promedio_venta = "";
        this.datosCulAgri.metodo_pago = "";
        this.datosCulAgri.precio_promedio_venta_kg = "";
        this.datosCulAgri.subproductos_produccion = "";
        this.datosCulAgri.programa_asistencia_tecnica = "";
        this.datosCulAgri.nombre_programa = "";
        this.datosCulAgri.entidad = "";
        this.datosCulAgri.cambios_produccion_anio = "";

        this.datosCulAgri.actividad_cambio = "";
        this.datosCulAgri.otro_tipo_problema = "";

        this.mOPAT = false;
        this.mOTPP = false;
        this.mOP = false;
        this.mOCTI = false;
        this.bandeGuaEdiCA = true;
        // AGREGAR LOS DATOS
      },
      CancelarEditarCA() {
        // AGREGAR LOS DATOS
        this.cultivos_agricolas[this.indiceEditarCA].estado = "Activo";
        this.cultivos_agricolas.splice(
          this.indiceEditarCA,
          1,
          this.cultivos_agricolas[this.indiceEditarCA]
        );
        this.datosCulAgri.importancias_agricolas = "";
        this.datosCulAgri.unidad_area_produccion = "";
        this.datosCulAgri.producto = "";
        this.datosCulAgri.variedad = "";
        this.datosCulAgri.semilla = "";
        this.datosCulAgri.pertenece = "";
        this.datosCulAgri.tipo_pertenece = "";
        this.datosCulAgri.nombre_organizacion = "";
        this.datosCulAgri.area_produccion = "";

        this.datosCulAgri.beneficios = "";
        this.datosCulAgri.no_pertenece = "";
        this.datosCulAgri.trabaja_asociacion = "";
        this.datosCulAgri.frecuente_cosecha = "";
        this.datosCulAgri.unidad_frecuencia_cosecha = "";
        this.datosCulAgri.area_cosecha = "";
        this.datosCulAgri.unidad_area_cosecha = "";
        this.datosCulAgri.costo_produccion = "";
        this.datosCulAgri.costo_establecimiento = "";
        this.datosCulAgri.costo_sostenimiento = "";
        this.datosCulAgri.produccion_destinada = "";

        this.datosCulAgri.unidad_producion_destinada = "";

        this.datosCulAgri.tipo_problema = "";
        this.datosCulAgri.compradores = "";
        this.datosCulAgri.precio_promedio_venta = "";
        this.datosCulAgri.metodo_pago = "";
        this.datosCulAgri.precio_promedio_venta_kg = "";
        this.datosCulAgri.subproductos_produccion = "";
        this.datosCulAgri.programa_asistencia_tecnica = "";
        this.datosCulAgri.nombre_programa = "";
        this.datosCulAgri.entidad = "";
        this.datosCulAgri.cambios_produccion_anio = "";

        this.datosCulAgri.actividad_cambio = "";
        this.datosCulAgri.otro_tipo_problema = "";

        this.mOPAT = false;
        this.mOTPP = false;
        this.mOP = false;
        this.mOCTI = false;
        this.bandeGuaEdiCA = true;
        // AGREGAR LOS DATOS
      },

      agregarEP: function() {
        if (this.datosExpPec.importancia_comercial === "") {
          this.$refs.importancia_comercial.focus();
          this.$swal(
            "Error...!",
            "Por favor digite la importancia del 1 al 10 de las explotaciones pecuarias",
            "error"
          );
          return;
        }
        if (this.datosExpPec.producto_comercial === "") {
          this.$refs.producto_comercial.focus();
          this.$swal(
            "Error...!",
            "Por favor digite el producto de las explotaciones pecuarias",
            "error"
          );
          return;
        }
        if (this.datosExpPec.raza === "") {
          this.$refs.raza.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione la raza ó tipo de las explotaciones pecuarias",
            "error"
          );
          return;
        }
        if (this.datosExpPec.costo_total === "") {
          this.$refs.costo_total.focus();
          this.$swal(
            "Error...!",
            "Por favor digite el costo total de las explotaciones pecuarias",
            "error"
          );
          return;
        }
        if (this.datosExpPec.costo_establecer === "") {
          this.$refs.costo_establecer.focus();
          this.$swal(
            "Error...!",
            "Por favor digite el costo de establecer de las explotaciones pecuarias",
            "error"
          );
          return;
        }
        if (this.datosExpPec.costo_pecuaria === "") {
          this.$refs.costo_pecuaria.focus();
          this.$swal(
            "Error...!",
            "Por favor digite el costo sostenimiento de las explotaciones pecuarias",
            "error"
          );
          return;
        }
        if (this.datosExpPec.problematica_productos === "") {
          this.$refs.problematica_productos.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione la problemática de los productos con perspectiva comercial de las explotaciones pecuarias",
            "error"
          );
          return;
        }
        if (this.datosExpPec.problematica_productos === "Otras") {
          if (this.datosExpPec.otra_problematica === "") {
            this.$refs.otra_problematica.focus();
            this.$swal(
              "Error...!",
              "Por favor digite otra problematica de los productos con perspectiva comercial de las explotaciones pecuarias",
              "error"
            );
            return;
          }
        }
        if (this.datosExpPec.produccion === "") {
          this.$refs.produccion.focus();
          this.$swal(
            "Error...!",
            "Por favor digite la producción de las explotaciones pecuarias",
            "error"
          );
          return;
        }
        if (this.datosExpPec.produccion_destinada_pecuaria === "") {
          this.$refs.produccion_destinada_pecuaria.focus();
          this.$swal(
            "Error...!",
            "Por favor digite la producción destinada al mercado de las explotaciones pecuarias",
            "error"
          );
          return;
        }
        if (this.datosExpPec.unidad_producion_destinada_pecuaria === "") {
          this.$refs.unidad_producion_destinada_pecuaria.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione la unidad de medidad de la producción destinada al mercado de las explotaciones pecuarias",
            "error"
          );
          return;
        }
        if (this.datosExpPec.numero_animales === "") {
          this.$refs.numero_animales.focus();
          this.$swal(
            "Error...!",
            "Por favor digite el número de animales de las explotaciones pecuarias",
            "error"
          );
          return;
        }
        if (this.datosExpPec.area_destinada_produccion === "") {
          this.$refs.area_destinada_produccion.focus();
          this.$swal(
            "Error...!",
            "Por favor digite el área destinada a esta producción de animales de las explotaciones pecuarias",
            "error"
          );
          return;
        }
        if (this.datosExpPec.unidad_area_destinada === "") {
          this.$refs.unidad_area_destinada.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione la unidad de medida del area destinada a esta producciṕon de las explotaciones pecuarias",
            "error"
          );
          return;
        }
        if (this.datosExpPec.compradores_pecuaria === "") {
          this.$refs.compradores_pecuaria.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione los compradores de las explotaciones pecuarias",
            "error"
          );
          return;
        }
        if (this.datosExpPec.precio_promedio_venta_pecuaria === "") {
          this.$refs.precio_promedio_venta_pecuaria.focus();
          this.$swal(
            "Error...!",
            "Por favor digite el precio promedio de venta de las explotaciones pecuarias",
            "error"
          );
          return;
        }
        if (this.datosExpPec.metodo_pago_pecuaria === "") {
          this.$refs.metodo_pago_pecuaria.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione el método de pago de las explotaciones pecuarias",
            "error"
          );
          return;
        }
        if (this.datosExpPec.subproductos_produccion_pecuaria === "") {
          this.$refs.subproductos_produccion_pecuaria.focus();
          this.$swal(
            "Error...!",
            "Por favor digite el subproductos de la producción de las explotaciones pecuarias",
            "error"
          );
          return;
        }
        if (this.datosExpPec.pertenece_pecuaria === "") {
          this.$refs.pertenece_pecuaria.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione pertenencia a programas de asistencia técnica de las explotaciones pecuarias",
            "error"
          );
          return;
        }
        if (this.datosCulAgri.pertenece_pecuaria === "SI") {
          if (this.datosCulAgri.nombre_programa_pecuaria === "") {
            this.$refs.nombre_programa_pecuaria.focus();
            this.$swal(
              "Error...!",
              "Por favor digite el nombre del programa de las explotaciones pecuarias",
              "error"
            );
            return;
          }
          if (this.datosCulAgri.entidad_pecuaria === "") {
            this.$refs.entidad_pecuaria.focus();
            this.$swal(
              "Error...!",
              "Por favor digite la entidad de las explotaciones pecuarias",
              "error"
            );
            return;
          }
        }
        if (this.datosExpPec.pertenece_organizacion_pecuaria === "") {
          this.$refs.pertenece_organizacion_pecuaria.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione si ¿pertenece a alguna organización? de las explotaciones pecuarias",
            "error"
          );
          return;
        }
        if (
          this.datosCulAgri.pertenece_organizacion_pecuaria !== "" &&
          this.datosCulAgri.pertenece_organizacion_pecuaria !== "NA"
        ) {
          if (this.datosCulAgri.tipo_organizacion_pecuaria === "") {
            this.$refs.tipo_organizacion_pecuaria.focus();
            this.$swal(
              "Error...!",
              "Por favor seleccione ¿De qué tipo? es la organización de las explotaciones pecuarias",
              "error"
            );
            return;
          }
          if (this.datosCulAgri.nombre_organizacion_pecuaria === "") {
            this.$refs.nombre_organizacion_pecuaria.focus();
            this.$swal(
              "Error...!",
              "Por favor se el nombre de la organización de las explotaciones pecuarias",
              "error"
            );
            return;
          }
        }
        if (this.datosCulAgri.pertenece_organizacion_pecuaria === "NA") {
          if (this.datosCulAgri.no_pertenece_pecuaria === "") {
            this.$refs.no_pertenece_pecuaria.focus();
            this.$swal(
              "Error...!",
              "Por favor seleccione la razón por la cual no pertenece a ninguna organización de las explotaciones pecuarias",
              "error"
            );
            return;
          }
        }
        if (this.datosExpPec.beneficios_pecuaria === "") {
          this.$refs.beneficios_pecuaria.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione los beneficios de las explotaciones pecuarias",
            "error"
          );
          return;
        }
        if (this.datosExpPec.trabaja_asociacion_pecuaria === "") {
          this.$refs.trabaja_asociacion_pecuaria.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione si trabaja en asociación para realizar las actividades productivas de las explotaciones pecuarias",
            "error"
          );
          return;
        }
        this.explotaciones_pecuarias.push({
          id: 0,
          id_unidad: 0,
          importancia_comercial: this.datosExpPec.importancia_comercial,
          raza: this.datosExpPec.raza,
          texto_raza: this.showText(this.datosExpPec.raza, this.raza),
          costo_total: this.datosExpPec.costo_total,
          costo_establecer: this.datosExpPec.costo_establecer,
          costo_pecuaria: this.datosExpPec.costo_pecuaria,
          problematica_productos: this.datosExpPec.problematica_productos,
          otra_problematica: this.datosExpPec.otra_problematica,
          produccion: this.datosExpPec.produccion,
          numero_animales: this.datosExpPec.numero_animales,

          area_destinada_produccion: this.datosExpPec.area_destinada_produccion,
          unidad_area_destinada: this.datosExpPec.unidad_area_destinada,
          texto_unidad_area_destinada: this.showText(
            this.datosExpPec.unidad_area_destinada,
            this.unidades1
          ),
          compradores_pecuaria: this.datosExpPec.compradores_pecuaria,
          precio_promedio_venta_pecuaria: this.datosExpPec
            .precio_promedio_venta_pecuaria,
          metodo_pago_pecuaria: this.datosExpPec.metodo_pago_pecuaria,
          subproductos_produccion_pecuaria: this.datosExpPec
            .subproductos_produccion_pecuaria,
          pertenece_pecuaria: this.datosExpPec.pertenece_pecuaria,
          nombre_programa_pecuaria: this.datosExpPec.nombre_programa_pecuaria,
          entidad_pecuaria: this.datosExpPec.entidad_pecuaria,
          pertenece_organizacion_pecuaria: this.datosExpPec
            .pertenece_organizacion_pecuaria,

          tipo_organizacion_pecuaria: this.datosExpPec.tipo_organizacion_pecuaria,
          nombre_organizacion_pecuaria: this.datosExpPec
            .nombre_organizacion_pecuaria,
          beneficios_pecuaria: this.datosExpPec.beneficios_pecuaria,
          texto_beneficios_pecuaria: this.showText(
            this.datosExpPec.beneficios_pecuaria,
            this.beneficios
          ),
          no_pertenece_pecuaria: this.datosExpPec.no_pertenece_pecuaria,
          texto_no_pertenece_pecuaria: this.showText(
            this.datosExpPec.no_pertenece_pecuaria,
            this.razon1
          ),
          trabaja_asociacion_pecuaria: this.datosExpPec
            .trabaja_asociacion_pecuaria,
          producto_comercial: this.datosExpPec.producto_comercial,
          produccion_destinada_pecuaria: this.datosExpPec
            .produccion_destinada_pecuaria,
          unidad_producion_destinada_pecuaria: this.datosExpPec
            .unidad_producion_destinada_pecuaria,
          texto_unidad_producion_destinada_pecuaria: this.showText(
            this.datosExpPec.unidad_producion_destinada_pecuaria,
            this.unidades3
          ),
          estado: "Activo",
          id_compania: 1
        });

        this.datosExpPec.importancia_comercial = "";
        this.datosExpPec.raza = "";
        this.datosExpPec.costo_total = "";
        this.datosExpPec.costo_establecer = "";
        this.datosExpPec.costo_pecuaria = "";
        this.datosExpPec.problematica_productos = "";
        this.datosExpPec.otra_problematica = "";
        this.datosExpPec.produccion = "";
        this.datosExpPec.numero_animales = "";

        this.datosExpPec.area_destinada_produccion = "";
        this.datosExpPec.unidad_area_destinada = "";
        this.datosExpPec.compradores_pecuaria = "";
        this.datosExpPec.precio_promedio_venta_pecuaria = "";
        this.datosExpPec.metodo_pago_pecuaria = "";
        this.datosExpPec.subproductos_produccion_pecuaria = "";
        this.datosExpPec.pertenece_pecuaria = "";
        this.datosExpPec.nombre_programa_pecuaria = "";
        this.datosExpPec.entidad_pecuaria = "";
        this.datosExpPec.pertenece_organizacion_pecuaria = "";

        this.datosExpPec.tipo_organizacion_pecuaria = "";
        this.datosExpPec.nombre_organizacion_pecuaria = "";
        this.datosExpPec.beneficios_pecuaria = "";
        this.datosExpPec.no_pertenece_pecuaria = "";
        this.datosExpPec.trabaja_asociacion_pecuaria = "";
        this.datosExpPec.producto_comercial = "";
        this.datosExpPec.produccion_destinada_pecuaria = "";

        this.datosExpPec.unidad_producion_destinada_pecuaria = "";

        this.mOPPP = false;
        this.mOPATP = false;
        this.mOPECU = false;
      },
      eliminarItemEP: function(item, index) {
        if (item.id !== 0) {
          this.explotaciones_pecuarias[index].estado = "Inactivo";
          this.explotaciones_pecuarias.splice(
            index,
            1,
            this.explotaciones_pecuarias[index]
          );
        } else {
          this.explotaciones_pecuarias.splice(index, 1);
        }
      },
      editarItemEP: function(index, item) {
        this.indiceEditarEP = index;
        this.bandeGuaEdiEP = false;
        this.datosExpPec.id = item.id;

        this.datosExpPec.id_unidad = item.id_unidad;
        this.datosExpPec.importancia_comercial = item.importancia_comercial;
        this.datosExpPec.raza = item.raza;
        this.datosExpPec.costo_total = item.costo_total;
        this.datosExpPec.costo_establecer = item.costo_establecer;
        this.datosExpPec.costo_pecuaria = item.costo_pecuaria;
        this.datosExpPec.problematica_productos = item.problematica_productos;
        this.datosExpPec.otra_problematica = item.otra_problematica;
        this.datosExpPec.produccion = item.produccion;
        this.datosExpPec.numero_animales = item.numero_animales;

        this.datosExpPec.area_destinada_produccion =
          item.area_destinada_produccion;
        this.datosExpPec.unidad_area_destinada = item.unidad_area_destinada;
        this.datosExpPec.compradores_pecuaria = item.compradores_pecuaria;
        this.datosExpPec.precio_promedio_venta_pecuaria =
          item.precio_promedio_venta_pecuaria;
        this.datosExpPec.metodo_pago_pecuaria = item.metodo_pago_pecuaria;
        this.datosExpPec.subproductos_produccion_pecuaria =
          item.subproductos_produccion_pecuaria;
        this.datosExpPec.pertenece_pecuaria = item.pertenece_pecuaria;
        this.datosExpPec.nombre_programa_pecuaria = item.nombre_programa_pecuaria;
        this.datosExpPec.entidad_pecuaria = item.entidad_pecuaria;
        this.datosExpPec.pertenece_organizacion_pecuaria =
          item.pertenece_organizacion_pecuaria;

        this.datosExpPec.tipo_organizacion_pecuaria =
          item.tipo_organizacion_pecuaria;
        this.datosExpPec.nombre_organizacion_pecuaria =
          item.nombre_organizacion_pecuaria;
        this.datosExpPec.beneficios_pecuaria = item.beneficios_pecuaria;
        this.datosExpPec.no_pertenece_pecuaria = item.no_pertenece_pecuaria;
        this.datosExpPec.trabaja_asociacion_pecuaria =
          item.trabaja_asociacion_pecuaria;
        this.datosExpPec.producto_comercial = item.producto_comercial;
        this.datosExpPec.produccion_destinada_pecuaria =
          item.produccion_destinada_pecuaria;

        this.datosExpPec.unidad_producion_destinada_pecuaria =
          item.unidad_producion_destinada_pecuaria;

        if (this.datosExpPec.problematica_productos === "Otras") {
          this.mOPPP = true;
        } else {
          this.mOPPP = false;
        }

        if (this.datosExpPec.pertenece_pecuaria === "SI") {
          this.mOPATP = true;
        } else {
          this.mOPATP = false;
        }

        if (this.datosExpPec.pertenece_organizacion_pecuaria === "NA") {
          this.mOPECU = false;
        } else {
          if (this.datosExpPec.pertenece_organizacion_pecuaria === "") {
            this.mOPECU = false;
          } else {
            this.mOPECU = true;
          }
        }

        //INACTIVAR LA FILA
        this.explotaciones_pecuarias[this.indiceEditarEP].estado = "Inactivo";
        this.explotaciones_pecuarias.splice(
          this.indiceEditarEP,
          1,
          this.explotaciones_pecuarias[this.indiceEditarEP]
        );
        //INACTIVAR LA FILA
      },
      editarEP: function() {
        if (this.datosExpPec.importancia_comercial === "") {
          this.$refs.importancia_comercial.focus();
          this.$swal(
            "Error...!",
            "Por favor digite la importancia del 1 al 10 de las explotaciones pecuarias",
            "error"
          );
          return;
        }
        if (this.datosExpPec.producto_comercial === "") {
          this.$refs.producto_comercial.focus();
          this.$swal(
            "Error...!",
            "Por favor digite el producto de las explotaciones pecuarias",
            "error"
          );
          return;
        }
        if (this.datosExpPec.raza === "") {
          this.$refs.raza.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione la raza ó tipo de las explotaciones pecuarias",
            "error"
          );
          return;
        }
        if (this.datosExpPec.costo_total === "") {
          this.$refs.costo_total.focus();
          this.$swal(
            "Error...!",
            "Por favor digite el costo total de las explotaciones pecuarias",
            "error"
          );
          return;
        }
        if (this.datosExpPec.costo_establecer === "") {
          this.$refs.costo_establecer.focus();
          this.$swal(
            "Error...!",
            "Por favor digite el costo de establecer de las explotaciones pecuarias",
            "error"
          );
          return;
        }
        if (this.datosExpPec.costo_pecuaria === "") {
          this.$refs.costo_pecuaria.focus();
          this.$swal(
            "Error...!",
            "Por favor digite el costo sostenimiento de las explotaciones pecuarias",
            "error"
          );
          return;
        }
        if (this.datosExpPec.problematica_productos === "") {
          this.$refs.problematica_productos.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione la problemática de los productos con perspectiva comercial de las explotaciones pecuarias",
            "error"
          );
          return;
        }
        if (this.datosExpPec.problematica_productos === "Otras") {
          if (this.datosExpPec.otra_problematica === "") {
            this.$refs.otra_problematica.focus();
            this.$swal(
              "Error...!",
              "Por favor digite otra problematica de los productos con perspectiva comercial de las explotaciones pecuarias",
              "error"
            );
            return;
          }
        }
        if (this.datosExpPec.produccion === "") {
          this.$refs.produccion.focus();
          this.$swal(
            "Error...!",
            "Por favor digite la producción de las explotaciones pecuarias",
            "error"
          );
          return;
        }
        if (this.datosExpPec.produccion_destinada_pecuaria === "") {
          this.$refs.produccion_destinada_pecuaria.focus();
          this.$swal(
            "Error...!",
            "Por favor digite la producción destinada al mercado de las explotaciones pecuarias",
            "error"
          );
          return;
        }
        if (this.datosExpPec.unidad_producion_destinada_pecuaria === "") {
          this.$refs.unidad_producion_destinada_pecuaria.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione la unidad de medidad de la producción destinada al mercado de las explotaciones pecuarias",
            "error"
          );
          return;
        }
        if (this.datosExpPec.numero_animales === "") {
          this.$refs.numero_animales.focus();
          this.$swal(
            "Error...!",
            "Por favor digite el número de animales de las explotaciones pecuarias",
            "error"
          );
          return;
        }
        if (this.datosExpPec.area_destinada_produccion === "") {
          this.$refs.area_destinada_produccion.focus();
          this.$swal(
            "Error...!",
            "Por favor digite el área destinada a esta producción de animales de las explotaciones pecuarias",
            "error"
          );
          return;
        }
        if (this.datosExpPec.unidad_area_destinada === "") {
          this.$refs.unidad_area_destinada.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione la unidad de medida del area destinada a esta producciṕon de las explotaciones pecuarias",
            "error"
          );
          return;
        }
        if (this.datosExpPec.compradores_pecuaria === "") {
          this.$refs.compradores_pecuaria.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione los compradores de las explotaciones pecuarias",
            "error"
          );
          return;
        }
        if (this.datosExpPec.precio_promedio_venta_pecuaria === "") {
          this.$refs.precio_promedio_venta_pecuaria.focus();
          this.$swal(
            "Error...!",
            "Por favor digite el precio promedio de venta de las explotaciones pecuarias",
            "error"
          );
          return;
        }
        if (this.datosExpPec.metodo_pago_pecuaria === "") {
          this.$refs.metodo_pago_pecuaria.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione el método de pago de las explotaciones pecuarias",
            "error"
          );
          return;
        }
        if (this.datosExpPec.subproductos_produccion_pecuaria === "") {
          this.$refs.subproductos_produccion_pecuaria.focus();
          this.$swal(
            "Error...!",
            "Por favor digite el subproductos de la producción de las explotaciones pecuarias",
            "error"
          );
          return;
        }
        if (this.datosExpPec.pertenece_pecuaria === "") {
          this.$refs.pertenece_pecuaria.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione pertenencia a programas de asistencia técnica de las explotaciones pecuarias",
            "error"
          );
          return;
        }
        if (this.datosCulAgri.pertenece_pecuaria === "SI") {
          if (this.datosCulAgri.nombre_programa_pecuaria === "") {
            this.$refs.nombre_programa_pecuaria.focus();
            this.$swal(
              "Error...!",
              "Por favor digite el nombre del programa de las explotaciones pecuarias",
              "error"
            );
            return;
          }
          if (this.datosCulAgri.entidad_pecuaria === "") {
            this.$refs.entidad_pecuaria.focus();
            this.$swal(
              "Error...!",
              "Por favor digite la entidad de las explotaciones pecuarias",
              "error"
            );
            return;
          }
        }
        if (this.datosExpPec.pertenece_organizacion_pecuaria === "") {
          this.$refs.pertenece_organizacion_pecuaria.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione si ¿pertenece a alguna organización? de las explotaciones pecuarias",
            "error"
          );
          return;
        }
        if (
          this.datosCulAgri.pertenece_organizacion_pecuaria !== "" &&
          this.datosCulAgri.pertenece_organizacion_pecuaria !== "NA"
        ) {
          if (this.datosCulAgri.tipo_organizacion_pecuaria === "") {
            this.$refs.tipo_organizacion_pecuaria.focus();
            this.$swal(
              "Error...!",
              "Por favor seleccione ¿De qué tipo? es la organización de las explotaciones pecuarias",
              "error"
            );
            return;
          }
          if (this.datosCulAgri.nombre_organizacion_pecuaria === "") {
            this.$refs.nombre_organizacion_pecuaria.focus();
            this.$swal(
              "Error...!",
              "Por favor se el nombre de la organización de las explotaciones pecuarias",
              "error"
            );
            return;
          }
        }
        if (this.datosCulAgri.pertenece_organizacion_pecuaria === "NA") {
          if (this.datosCulAgri.no_pertenece_pecuaria === "") {
            this.$refs.no_pertenece_pecuaria.focus();
            this.$swal(
              "Error...!",
              "Por favor seleccione la razón por la cual no pertenece a ninguna organización de las explotaciones pecuarias",
              "error"
            );
            return;
          }
        }
        if (this.datosExpPec.beneficios_pecuaria === "") {
          this.$refs.beneficios_pecuaria.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione los beneficios de las explotaciones pecuarias",
            "error"
          );
          return;
        }
        if (this.datosExpPec.trabaja_asociacion_pecuaria === "") {
          this.$refs.trabaja_asociacion_pecuaria.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione si trabaja en asociación para realizar las actividades productivas de las explotaciones pecuarias",
            "error"
          );
          return;
        }
        // AGREGAR LOS DATOS
        this.explotaciones_pecuarias[
          this.indiceEditarEP
        ].id = this.datosExpPec.id;
        this.explotaciones_pecuarias[
          this.indiceEditarEP
        ].id_unidad = this.datosExpPec.id_unidad;

        this.explotaciones_pecuarias[
          this.indiceEditarEP
        ].importancia_comercial = this.datosExpPec.importancia_comercial;
        this.explotaciones_pecuarias[
          this.indiceEditarEP
        ].raza = this.datosExpPec.raza;
        this.explotaciones_pecuarias[
          this.indiceEditarEP
        ].texto_raza = this.showText(Number(this.datosExpPec.raza), this.raza);
        this.explotaciones_pecuarias[
          this.indiceEditarEP
        ].costo_total = this.datosExpPec.costo_total;
        this.explotaciones_pecuarias[
          this.indiceEditarEP
        ].costo_establecer = this.datosExpPec.costo_establecer;
        this.explotaciones_pecuarias[
          this.indiceEditarEP
        ].costo_pecuaria = this.datosExpPec.costo_pecuaria;
        this.explotaciones_pecuarias[
          this.indiceEditarEP
        ].problematica_productos = this.datosExpPec.problematica_productos;
        this.explotaciones_pecuarias[
          this.indiceEditarEP
        ].otra_problematica = this.datosExpPec.otra_problematica;
        this.explotaciones_pecuarias[
          this.indiceEditarEP
        ].produccion = this.datosExpPec.produccion;
        this.explotaciones_pecuarias[
          this.indiceEditarEP
        ].numero_animales = this.datosExpPec.numero_animales;
        this.explotaciones_pecuarias[
          this.indiceEditarEP
        ].area_destinada_produccion = this.datosExpPec.area_destinada_produccion;
        this.explotaciones_pecuarias[
          this.indiceEditarEP
        ].unidad_area_destinada = this.datosExpPec.unidad_area_destinada;
        this.explotaciones_pecuarias[
          this.indiceEditarEP
        ].texto_unidad_area_destinada = this.showText(
          Number(this.datosExpPec.unidad_area_destinada),
          this.unidades1
        );

        this.explotaciones_pecuarias[
          this.indiceEditarEP
        ].compradores_pecuaria = this.datosExpPec.compradores_pecuaria;
        this.explotaciones_pecuarias[
          this.indiceEditarEP
        ].precio_promedio_venta_pecuaria = this.datosExpPec.precio_promedio_venta_pecuaria;
        this.explotaciones_pecuarias[
          this.indiceEditarEP
        ].metodo_pago_pecuaria = this.datosExpPec.metodo_pago_pecuaria;
        this.explotaciones_pecuarias[
          this.indiceEditarEP
        ].subproductos_produccion_pecuaria = this.datosExpPec.subproductos_produccion_pecuaria;
        this.explotaciones_pecuarias[
          this.indiceEditarEP
        ].pertenece_pecuaria = this.datosExpPec.pertenece_pecuaria;
        this.explotaciones_pecuarias[
          this.indiceEditarEP
        ].nombre_programa_pecuaria = this.datosExpPec.nombre_programa_pecuaria;
        this.explotaciones_pecuarias[
          this.indiceEditarEP
        ].entidad_pecuaria = this.datosExpPec.entidad_pecuaria;
        this.explotaciones_pecuarias[
          this.indiceEditarEP
        ].pertenece_organizacion_pecuaria = this.datosExpPec.pertenece_organizacion_pecuaria;
        this.explotaciones_pecuarias[
          this.indiceEditarEP
        ].tipo_organizacion_pecuaria = this.datosExpPec.tipo_organizacion_pecuaria;
        this.explotaciones_pecuarias[
          this.indiceEditarEP
        ].nombre_organizacion_pecuaria = this.datosExpPec.nombre_organizacion_pecuaria;

        this.explotaciones_pecuarias[
          this.indiceEditarEP
        ].beneficios_pecuaria = this.datosExpPec.beneficios_pecuaria;
        this.explotaciones_pecuarias[
          this.indiceEditarEP
        ].texto_beneficios_pecuaria = this.showText(
          this.datosExpPec.beneficios_pecuaria,
          this.beneficios
        );

        this.explotaciones_pecuarias[
          this.indiceEditarEP
        ].no_pertenece_pecuaria = this.datosExpPec.no_pertenece_pecuaria;
        this.explotaciones_pecuarias[
          this.indiceEditarEP
        ].texto_no_pertenece_pecuaria = this.showText(
          this.datosExpPec.no_pertenece_pecuaria,
          this.razon1
        );

        this.explotaciones_pecuarias[
          this.indiceEditarEP
        ].trabaja_asociacion_pecuaria = this.datosExpPec.trabaja_asociacion_pecuaria;
        this.explotaciones_pecuarias[
          this.indiceEditarEP
        ].producto_comercial = this.datosExpPec.producto_comercial;
        this.explotaciones_pecuarias[
          this.indiceEditarEP
        ].produccion_destinada_pecuaria = this.datosExpPec.produccion_destinada_pecuaria;
        this.explotaciones_pecuarias[
          this.indiceEditarEP
        ].estado = this.datosExpPec.estado;
        this.explotaciones_pecuarias[
          this.indiceEditarEP
        ].id_compania = this.datosExpPec.id_compania;

        this.explotaciones_pecuarias[
          this.indiceEditarEP
        ].unidad_producion_destinada_pecuaria = this.datosExpPec.unidad_producion_destinada_pecuaria;
        this.explotaciones_pecuarias[
          this.indiceEditarEP
        ].texto_unidad_producion_destinada_pecuaria = this.showText(
          Number(this.datosExpPec.unidad_producion_destinada_pecuaria),
          this.unidades3
        );

        this.explotaciones_pecuarias.splice(
          this.indiceEditarEP,
          1,
          this.explotaciones_pecuarias[this.indiceEditarEP]
        );

        this.datosExpPec.importancia_comercial = "";
        this.datosExpPec.raza = "";
        this.datosExpPec.costo_total = "";
        this.datosExpPec.costo_establecer = "";
        this.datosExpPec.costo_pecuaria = "";
        this.datosExpPec.problematica_productos = "";
        this.datosExpPec.otra_problematica = "";
        this.datosExpPec.produccion = "";
        this.datosExpPec.numero_animales = "";

        this.datosExpPec.area_destinada_produccion = "";
        this.datosExpPec.unidad_area_destinada = "";
        this.datosExpPec.compradores_pecuaria = "";
        this.datosExpPec.precio_promedio_venta_pecuaria = "";
        this.datosExpPec.metodo_pago_pecuaria = "";
        this.datosExpPec.subproductos_produccion_pecuaria = "";
        this.datosExpPec.pertenece_pecuaria = "";
        this.datosExpPec.nombre_programa_pecuaria = "";
        this.datosExpPec.entidad_pecuaria = "";
        this.datosExpPec.pertenece_organizacion_pecuaria = "";

        this.datosExpPec.tipo_organizacion_pecuaria = "";
        this.datosExpPec.nombre_organizacion_pecuaria = "";
        this.datosExpPec.beneficios_pecuaria = "";
        this.datosExpPec.no_pertenece_pecuaria = "";
        this.datosExpPec.trabaja_asociacion_pecuaria = "";
        this.datosExpPec.producto_comercial = "";
        this.datosExpPec.produccion_destinada_pecuaria = "";

        this.datosExpPec.unidad_producion_destinada_pecuaria = "";

        this.mOPPP = false;
        this.mOPATP = false;
        this.mOPECU = false;
        this.bandeGuaEdiEP = true;
        // AGREGAR LOS DATOS
      },
      CancelarEditarEP() {
        // AGREGAR LOS DATOS
        this.explotaciones_pecuarias[this.indiceEditarEP].estado = "Activo";
        this.explotaciones_pecuarias.splice(
          this.indiceEditarEP,
          1,
          this.explotaciones_pecuarias[this.indiceEditarEP]
        );
        this.datosExpPec.importancia_comercial = "";
        this.datosExpPec.raza = "";
        this.datosExpPec.costo_total = "";
        this.datosExpPec.costo_establecer = "";
        this.datosExpPec.costo_pecuaria = "";
        this.datosExpPec.problematica_productos = "";
        this.datosExpPec.otra_problematica = "";
        this.datosExpPec.produccion = "";
        this.datosExpPec.numero_animales = "";

        this.datosExpPec.area_destinada_produccion = "";
        this.datosExpPec.unidad_area_destinada = "";
        this.datosExpPec.compradores_pecuaria = "";
        this.datosExpPec.precio_promedio_venta_pecuaria = "";
        this.datosExpPec.metodo_pago_pecuaria = "";
        this.datosExpPec.subproductos_produccion_pecuaria = "";
        this.datosExpPec.pertenece_pecuaria = "";
        this.datosExpPec.nombre_programa_pecuaria = "";
        this.datosExpPec.entidad_pecuaria = "";
        this.datosExpPec.pertenece_organizacion_pecuaria = "";

        this.datosExpPec.tipo_organizacion_pecuaria = "";
        this.datosExpPec.nombre_organizacion_pecuaria = "";
        this.datosExpPec.beneficios_pecuaria = "";
        this.datosExpPec.no_pertenece_pecuaria = "";
        this.datosExpPec.trabaja_asociacion_pecuaria = "";
        this.datosExpPec.producto_comercial = "";
        this.datosExpPec.produccion_destinada_pecuaria = "";

        this.datosExpPec.unidad_producion_destinada_pecuaria = "";

        this.mOPPP = false;
        this.mOPATP = false;
        this.mOPECU = false;
        this.bandeGuaEdiEP = true;
        // AGREGAR LOS DATOS
      },

      agregarCF: function() {
        if (this.datosCulFor.importancia_forestales === "") {
          this.$refs.importancia_forestales.focus();
          this.$swal(
            "Error...!",
            "Por favor digite la importancia del 1 al 10 de los cultivos forestales",
            "error"
          );
          return;
        }
        if (this.datosCulFor.producto_forestales === "") {
          this.$refs.producto_forestales.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione el producto de los cultivos forestales",
            "error"
          );
          return;
        }
        if (this.datosCulFor.variedad_forestales === "") {
          this.$refs.variedad_forestales.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione la especie de los cultivos forestales",
            "error"
          );
          return;
        }
        if (this.datosCulFor.edad_plantacion === "") {
          this.$refs.edad_plantacion.focus();
          this.$swal(
            "Error...!",
            "Por favor digite la edad de la plantación de los cultivos forestales",
            "error"
          );
          return;
        }
        if (this.datosCulFor.tipo_edad === "") {
          this.$refs.tipo_edad.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione la unidad de medida de la edad de la plantación de los cultivos forestales",
            "error"
          );
          return;
        }
        if (this.datosCulFor.area_sembrada_forestales === "") {
          this.$refs.area_sembrada_forestales.focus();
          this.$swal(
            "Error...!",
            "Por favor digite el área sembrada de los cultivos forestales",
            "error"
          );
          return;
        }
        if (this.datosCulFor.unidad_area_forestales === "") {
          this.$refs.unidad_area_forestales.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione la unidad de medida del área sembrada de los cultivos forestales",
            "error"
          );
          return;
        }
        if (this.datosCulFor.rendimiento_arbol === "") {
          this.$refs.rendimiento_arbol.focus();
          this.$swal(
            "Error...!",
            "Por favor digite el rendimiento por árbol de los cultivos forestales",
            "error"
          );
          return;
        }
        if (this.datosCulFor.costo_total_forestales === "") {
          this.$refs.costo_total_forestales.focus();
          this.$swal(
            "Error...!",
            "Por favor digite el costo total de los cultivos forestales",
            "error"
          );
          return;
        }
        if (this.datosCulFor.costo_establecimiento_forestales === "") {
          this.$refs.costo_establecimiento_forestales.focus();
          this.$swal(
            "Error...!",
            "Por favor digite el costo de establecimiento de los cultivos forestales",
            "error"
          );
          return;
        }
        if (this.datosCulFor.costo_sostenimiento_forestales === "") {
          this.$refs.costo_sostenimiento_forestales.focus();
          this.$swal(
            "Error...!",
            "Por favor digite el costo de sostenimiento de los cultivos forestales",
            "error"
          );
          return;
        }
        if (this.datosCulFor.problematica_productos_forestales === "") {
          this.$refs.problematica_productos_forestales.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione la problemática de los productos con perspectiva comercial de los cultivos forestales",
            "error"
          );
          return;
        }
        if (this.datosCulFor.problematica_productos_forestales === "Otras") {
          if (this.datosCulFor.otros_problematica_productos_forestales === "") {
            this.$refs.otros_problematica_productos_forestales.focus();
            this.$swal(
              "Error...!",
              "Por favor digite otra problematica de los productos con perspectiva comercial de los cultivos forestales",
              "error"
            );
            return;
          }
        }
        if (this.datosCulFor.produccion_destinada_forestales === "") {
          this.$refs.produccion_destinada_forestales.focus();
          this.$swal(
            "Error...!",
            "Por favor digite la producción destinada al mercado de los cultivos forestales",
            "error"
          );
          return;
        }
        if (this.datosCulFor.unidad_producion_destinada_forestales === "") {
          this.$refs.unidad_producion_destinada_forestales.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione la unidad de medida de la producción destinada al mercado de los cultivos forestales",
            "error"
          );
          return;
        }
        if (this.datosCulFor.numero_arboles === "") {
          this.$refs.numero_arboles.focus();
          this.$swal(
            "Error...!",
            "Por favor digite el número de arboles de los cultivos forestales",
            "error"
          );
          return;
        }
        if (this.datosCulFor.compradores_forestales === "") {
          this.$refs.compradores_forestales.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione los compradores de los cultivos forestales",
            "error"
          );
          return;
        }
        if (this.datosCulFor.precio_promedio_venta_forestales === "") {
          this.$refs.precio_promedio_venta_forestales.focus();
          this.$swal(
            "Error...!",
            "Por favor digite el precio promedio de venta de los cultivos forestales",
            "error"
          );
          return;
        }
        if (this.datosCulFor.metodo_pago_forestales === "") {
          this.$refs.metodo_pago_forestales.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione el metodo de pago de los cultivos forestales",
            "error"
          );
          return;
        }
        if (this.datosCulFor.pertenece_forestales === "") {
          this.$refs.pertenece_forestales.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione pertenencia a programas de asistencia técnica de los cultivos forestales",
            "error"
          );
          return;
        }
        if (this.datosCulFor.pertenece_pecuaria === "SI") {
          if (this.datosCulFor.nombre_programa_forestales === "") {
            this.$refs.nombre_programa_forestales.focus();
            this.$swal(
              "Error...!",
              "Por favor digite el nombre del programa de los cultivos forestales",
              "error"
            );
            return;
          }
          if (this.datosCulFor.entidad_forestales === "") {
            this.$refs.entidad_forestales.focus();
            this.$swal(
              "Error...!",
              "Por favor digite la entidad de los cultivos forestales",
              "error"
            );
            return;
          }
        }
        if (this.datosCulFor.pertenece_organizacion_forestales === "") {
          this.$refs.pertenece_organizacion_forestales.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione ¿Pertenece a alguna organización?  de los cultivos forestales",
            "error"
          );
          return;
        }
        if (
          this.datosCulFor.pertenece_organizacion_forestales !== "" &&
          this.datosCulFor.pertenece_organizacion_forestales !== "NA"
        ) {
          if (this.datosCulFor.tipo_pertenece_forestales === "") {
            this.$refs.tipo_pertenece_forestales.focus();
            this.$swal(
              "Error...!",
              "Por favor seleccione ¿De qué tipo? es la organización de los cultivos forestales",
              "error"
            );
            return;
          }
          if (this.datosCulFor.nombre_organizacion_forestales === "") {
            this.$refs.nombre_organizacion_forestales.focus();
            this.$swal(
              "Error...!",
              "Por favor se el nombre de la organización de los cultivos forestales",
              "error"
            );
            return;
          }
        }
        if (this.datosCulAgri.pertenece_organizacion_forestales === "NA") {
          if (this.datosCulAgri.no_pertenece_forestales === "") {
            this.$refs.no_pertenece_forestales.focus();
            this.$swal(
              "Error...!",
              "Por favor seleccione la razón por la cual no pertenece a ninguna organización de los cultivos forestales",
              "error"
            );
            return;
          }
        }
        if (this.datosCulFor.beneficios_forestales === "") {
          this.$refs.beneficios_forestales.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione los beneficios de los cultivos forestales",
            "error"
          );
          return;
        }
        if (this.datosCulFor.trabaja_asociacion_forestales === "") {
          this.$refs.trabaja_asociacion_forestales.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione trabaja en asociación para realizar las actividades productivas de los cultivos forestales",
            "error"
          );
          return;
        }

        this.cultivos_forestales.push({
          id: 0,
          id_unidad: 0,
          importancia_forestales: this.datosCulFor.importancia_forestales,
          producto_forestales: this.datosCulFor.producto_forestales,
          variedad_forestales: this.datosCulFor.variedad_forestales,
          texto_variedad_forestales: this.showText(
            this.datosCulFor.variedad_forestales,
            this.especie1
          ),
          edad_plantacion: this.datosCulFor.edad_plantacion,
          tipo_edad: this.datosCulFor.tipo_edad,
          area_sembrada_forestales: this.datosCulFor.area_sembrada_forestales,
          unidad_area_forestales: this.datosCulFor.unidad_area_forestales,
          texto_unidad_area_forestales: this.showText(
            this.datosCulFor.unidad_area_forestales,
            this.unidades1
          ),
          rendimiento_arbol: this.datosCulFor.rendimiento_arbol,
          costo_total_forestales: this.datosCulFor.costo_total_forestales,

          costo_establecimiento_forestales: this.datosCulFor
            .costo_establecimiento_forestales,
          costo_sostenimiento_forestales: this.datosCulFor
            .costo_sostenimiento_forestales,
          problematica_productos_forestales: this.datosCulFor
            .problematica_productos_forestales,
          produccion_destinada_forestales: this.datosCulFor
            .produccion_destinada_forestales,
          unidad_producion_destinada_forestales: this.datosCulFor
            .unidad_producion_destinada_forestales,
          texto_unidad_producion_destinada_forestales: this.showText(
            this.datosCulFor.unidad_producion_destinada_forestales,
            this.unidades3
          ),
          numero_arboles: this.datosCulFor.numero_arboles,
          compradores_forestales: this.datosCulFor.compradores_forestales,
          metodo_pago_forestales: this.datosCulFor.metodo_pago_forestales,
          precio_promedio_venta_forestales: this.datosCulFor
            .precio_promedio_venta_forestales,
          subproductos_produccion_forestales: this.datosCulFor
            .subproductos_produccion_forestales,
          pertenece_forestales: this.datosCulFor.pertenece_forestales,

          nombre_programa_forestales: this.datosCulFor.nombre_programa_forestales,
          entidad_forestales: this.datosCulFor.entidad_forestales,
          pertenece_organizacion_forestales: this.datosCulFor
            .pertenece_organizacion_forestales,
          tipo_pertenece_forestales: this.datosCulFor.tipo_pertenece_forestales,
          nombre_organizacion_forestales: this.datosCulFor
            .nombre_organizacion_forestales,
          beneficios_forestales: this.datosCulFor.beneficios_forestales,
          texto_beneficios_forestales: this.showText(
            this.datosCulFor.beneficios_forestales,
            this.beneficios
          ),
          no_pertenece_forestales: this.datosCulFor.no_pertenece_forestales,
          texto_no_pertenece_forestales: this.showText(
            this.datosCulFor.no_pertenece_forestales,
            this.razon1
          ),
          trabaja_asociacion_forestales: this.datosCulFor
            .trabaja_asociacion_forestales,
          otros_problematica_productos_forestales: this.datosCulFor
            .otros_problematica_productos_forestales,
          estado: "Activo",
          id_compania: 1
        });

        this.datosCulFor.importancia_forestales = "";
        this.datosCulFor.producto_forestales = "";
        this.datosCulFor.variedad_forestales = "";
        this.datosCulFor.edad_plantacion = "";
        this.datosCulFor.tipo_edad = "";
        this.datosCulFor.area_sembrada_forestales = "";
        this.datosCulFor.unidad_area_forestales = "";
        this.datosCulFor.rendimiento_arbol = "";
        this.datosCulFor.costo_total_forestales = "";

        this.datosCulFor.costo_establecimiento_forestales = "";
        this.datosCulFor.costo_sostenimiento_forestales = "";
        this.datosCulFor.problematica_productos_forestales = "";
        this.datosCulFor.produccion_destinada_forestales = "";

        this.datosCulFor.unidad_producion_destinada_forestales = "";
        this.datosCulFor.numero_arboles = "";
        this.datosCulFor.compradores_forestales = "";
        this.datosCulFor.metodo_pago_forestales = "";
        this.datosCulFor.precio_promedio_venta_forestales = "";
        this.datosCulFor.subproductos_produccion_forestales = "";
        this.datosCulFor.pertenece_forestales = "";

        this.datosCulFor.nombre_programa_forestales = "";
        this.datosCulFor.entidad_forestales = "";
        this.datosCulFor.pertenece_organizacion_forestales = "";
        this.datosCulFor.tipo_pertenece_forestales = "";
        this.datosCulFor.nombre_organizacion_forestales = "";
        this.datosCulFor.beneficios_forestales = "";
        this.datosCulFor.no_pertenece_forestales = "";
        this.datosCulFor.trabaja_asociacion_forestales = "";
        this.datosCulFor.otros_problematica_productos_forestales = "";

        this.mOPPPF = false;
        this.mOPATF = false;
        this.mOPF = false;
      },
      eliminarItemCF: function(item, index) {
        if (item.id !== 0) {
          this.cultivos_forestales[index].estado = "Inactivo";
          this.cultivos_forestales.splice(
            index,
            1,
            this.cultivos_forestales[index]
          );
        } else {
          this.cultivos_forestales.splice(index, 1);
        }
      },
      editarItemCF: function(index, item) {
        this.indiceEditarCF = index;
        this.bandeGuaEdiCF = false;
        this.datosCulFor.id = item.id;

        this.datosCulFor.id_unidad = item.id_unidad;
        this.datosCulFor.importancia_forestales = item.importancia_forestales;
        this.datosCulFor.producto_forestales = item.producto_forestales;
        this.datosCulFor.variedad_forestales = item.variedad_forestales;
        this.datosCulFor.edad_plantacion = item.edad_plantacion;
        this.datosCulFor.tipo_edad = item.tipo_edad;
        this.datosCulFor.area_sembrada_forestales = item.area_sembrada_forestales;
        this.datosCulFor.unidad_area_forestales = item.unidad_area_forestales;
        this.datosCulFor.rendimiento_arbol = item.rendimiento_arbol;
        this.datosCulFor.costo_total_forestales = item.costo_total_forestales;

        this.datosCulFor.costo_establecimiento_forestales =
          item.costo_establecimiento_forestales;
        this.datosCulFor.costo_sostenimiento_forestales =
          item.costo_sostenimiento_forestales;
        this.datosCulFor.problematica_productos_forestales =
          item.problematica_productos_forestales;
        this.datosCulFor.produccion_destinada_forestales =
          item.produccion_destinada_forestales;
        this.datosCulFor.unidad_producion_destinada_forestales =
          item.unidad_producion_destinada_forestales;
        this.datosCulFor.numero_arboles = item.numero_arboles;
        this.datosCulFor.compradores_forestales = item.compradores_forestales;
        this.datosCulFor.metodo_pago_forestales = item.metodo_pago_forestales;
        this.datosCulFor.precio_promedio_venta_forestales =
          item.precio_promedio_venta_forestales;
        this.datosCulFor.subproductos_produccion_forestales =
          item.subproductos_produccion_forestales;
        this.datosCulFor.pertenece_forestales = item.pertenece_forestales;

        this.datosCulFor.nombre_programa_forestales =
          item.nombre_programa_forestales;
        this.datosCulFor.entidad_forestales = item.entidad_forestales;
        this.datosCulFor.pertenece_organizacion_forestales =
          item.pertenece_organizacion_forestales;
        this.datosCulFor.tipo_pertenece_forestales =
          item.tipo_pertenece_forestales;
        this.datosCulFor.nombre_organizacion_forestales =
          item.nombre_organizacion_forestales;
        this.datosCulFor.beneficios_forestales = item.beneficios_forestales;
        this.datosCulFor.no_pertenece_forestales = item.no_pertenece_forestales;
        this.datosCulFor.trabaja_asociacion_forestales =
          item.trabaja_asociacion_forestales;
        this.datosCulFor.otros_problematica_productos_forestales =
          item.otros_problematica_productos_forestales;

        if (this.datosCulFor.problematica_productos_forestales === "Otras") {
          this.mOPPPF = true;
        } else {
          this.mOPPPF = false;
        }
        if (this.datosCulFor.pertenece_forestales === "SI") {
          this.mOPATF = true;
        } else {
          this.mOPATF = false;
        }
        if (this.datosCulFor.pertenece_organizacion_forestales === "NA") {
          this.mOPF = false;
        } else {
          if (this.datosCulFor.pertenece_organizacion_forestales === "") {
            this.mOPF = false;
          } else {
            this.mOPF = true;
          }
        }
        //INACTIVAR LA FILA
        this.cultivos_forestales[this.indiceEditarCF].estado = "Inactivo";
        this.cultivos_forestales.splice(
          this.indiceEditarCF,
          1,
          this.cultivos_forestales[this.indiceEditarCF]
        );
        //INACTIVAR LA FILA
      },
      editarCF: function() {
        if (this.datosCulFor.importancia_forestales === "") {
          this.$refs.importancia_forestales.focus();
          this.$swal(
            "Error...!",
            "Por favor digite la importancia del 1 al 10 de los cultivos forestales",
            "error"
          );
          return;
        }
        if (this.datosCulFor.producto_forestales === "") {
          this.$refs.producto_forestales.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione el producto de los cultivos forestales",
            "error"
          );
          return;
        }
        if (this.datosCulFor.variedad_forestales === "") {
          this.$refs.variedad_forestales.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione la especie de los cultivos forestales",
            "error"
          );
          return;
        }
        if (this.datosCulFor.edad_plantacion === "") {
          this.$refs.edad_plantacion.focus();
          this.$swal(
            "Error...!",
            "Por favor digite la edad de la plantación de los cultivos forestales",
            "error"
          );
          return;
        }
        if (this.datosCulFor.tipo_edad === "") {
          this.$refs.tipo_edad.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione la unidad de medida de la edad de la plantación de los cultivos forestales",
            "error"
          );
          return;
        }
        if (this.datosCulFor.area_sembrada_forestales === "") {
          this.$refs.area_sembrada_forestales.focus();
          this.$swal(
            "Error...!",
            "Por favor digite el área sembrada de los cultivos forestales",
            "error"
          );
          return;
        }
        if (this.datosCulFor.unidad_area_forestales === "") {
          this.$refs.unidad_area_forestales.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione la unidad de medida del área sembrada de los cultivos forestales",
            "error"
          );
          return;
        }
        if (this.datosCulFor.rendimiento_arbol === "") {
          this.$refs.rendimiento_arbol.focus();
          this.$swal(
            "Error...!",
            "Por favor digite el rendimiento por árbol de los cultivos forestales",
            "error"
          );
          return;
        }
        if (this.datosCulFor.costo_total_forestales === "") {
          this.$refs.costo_total_forestales.focus();
          this.$swal(
            "Error...!",
            "Por favor digite el costo total de los cultivos forestales",
            "error"
          );
          return;
        }
        if (this.datosCulFor.costo_establecimiento_forestales === "") {
          this.$refs.costo_establecimiento_forestales.focus();
          this.$swal(
            "Error...!",
            "Por favor digite el costo de establecimiento de los cultivos forestales",
            "error"
          );
          return;
        }
        if (this.datosCulFor.costo_sostenimiento_forestales === "") {
          this.$refs.costo_sostenimiento_forestales.focus();
          this.$swal(
            "Error...!",
            "Por favor digite el costo de sostenimiento de los cultivos forestales",
            "error"
          );
          return;
        }
        if (this.datosCulFor.problematica_productos_forestales === "") {
          this.$refs.problematica_productos_forestales.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione la problemática de los productos con perspectiva comercial de los cultivos forestales",
            "error"
          );
          return;
        }
        if (this.datosCulFor.problematica_productos_forestales === "Otras") {
          if (this.datosCulFor.otros_problematica_productos_forestales === "") {
            this.$refs.otros_problematica_productos_forestales.focus();
            this.$swal(
              "Error...!",
              "Por favor digite otra problematica de los productos con perspectiva comercial de los cultivos forestales",
              "error"
            );
            return;
          }
        }
        if (this.datosCulFor.produccion_destinada_forestales === "") {
          this.$refs.produccion_destinada_forestales.focus();
          this.$swal(
            "Error...!",
            "Por favor digite la producción destinada al mercado de los cultivos forestales",
            "error"
          );
          return;
        }
        if (this.datosCulFor.unidad_producion_destinada_forestales === "") {
          this.$refs.unidad_producion_destinada_forestales.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione la unidad de medida de la producción destinada al mercado de los cultivos forestales",
            "error"
          );
          return;
        }
        if (this.datosCulFor.numero_arboles === "") {
          this.$refs.numero_arboles.focus();
          this.$swal(
            "Error...!",
            "Por favor digite el número de arboles de los cultivos forestales",
            "error"
          );
          return;
        }
        if (this.datosCulFor.compradores_forestales === "") {
          this.$refs.compradores_forestales.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione los compradores de los cultivos forestales",
            "error"
          );
          return;
        }
        if (this.datosCulFor.precio_promedio_venta_forestales === "") {
          this.$refs.precio_promedio_venta_forestales.focus();
          this.$swal(
            "Error...!",
            "Por favor digite el precio promedio de venta de los cultivos forestales",
            "error"
          );
          return;
        }
        if (this.datosCulFor.metodo_pago_forestales === "") {
          this.$refs.metodo_pago_forestales.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione el metodo de pago de los cultivos forestales",
            "error"
          );
          return;
        }
        if (this.datosCulFor.pertenece_forestales === "") {
          this.$refs.pertenece_forestales.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione pertenencia a programas de asistencia técnica de los cultivos forestales",
            "error"
          );
          return;
        }
        if (this.datosCulFor.pertenece_pecuaria === "SI") {
          if (this.datosCulFor.nombre_programa_forestales === "") {
            this.$refs.nombre_programa_forestales.focus();
            this.$swal(
              "Error...!",
              "Por favor digite el nombre del programa de los cultivos forestales",
              "error"
            );
            return;
          }
          if (this.datosCulFor.entidad_forestales === "") {
            this.$refs.entidad_forestales.focus();
            this.$swal(
              "Error...!",
              "Por favor digite la entidad de los cultivos forestales",
              "error"
            );
            return;
          }
        }
        if (this.datosCulFor.pertenece_organizacion_forestales === "") {
          this.$refs.pertenece_organizacion_forestales.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione ¿Pertenece a alguna organización?  de los cultivos forestales",
            "error"
          );
          return;
        }
        if (
          this.datosCulFor.pertenece_organizacion_forestales !== "" &&
          this.datosCulFor.pertenece_organizacion_forestales !== "NA"
        ) {
          if (this.datosCulFor.tipo_pertenece_forestales === "") {
            this.$refs.tipo_pertenece_forestales.focus();
            this.$swal(
              "Error...!",
              "Por favor seleccione ¿De qué tipo? es la organización de los cultivos forestales",
              "error"
            );
            return;
          }
          if (this.datosCulFor.nombre_organizacion_forestales === "") {
            this.$refs.nombre_organizacion_forestales.focus();
            this.$swal(
              "Error...!",
              "Por favor se el nombre de la organización de los cultivos forestales",
              "error"
            );
            return;
          }
        }
        if (this.datosCulAgri.pertenece_organizacion_forestales === "NA") {
          if (this.datosCulAgri.no_pertenece_forestales === "") {
            this.$refs.no_pertenece_forestales.focus();
            this.$swal(
              "Error...!",
              "Por favor seleccione la razón por la cual no pertenece a ninguna organización de los cultivos forestales",
              "error"
            );
            return;
          }
        }
        if (this.datosCulFor.beneficios_forestales === "") {
          this.$refs.beneficios_forestales.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione los beneficios de los cultivos forestales",
            "error"
          );
          return;
        }
        if (this.datosCulFor.trabaja_asociacion_forestales === "") {
          this.$refs.trabaja_asociacion_forestales.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione trabaja en asociación para realizar las actividades productivas de los cultivos forestales",
            "error"
          );
          return;
        }
        // AGREGAR LOS DATOS
        this.cultivos_forestales[this.indiceEditarCF].id = this.datosCulFor.id;
        this.cultivos_forestales[
          this.indiceEditarCF
        ].id_unidad = this.datosCulFor.id_unidad;
        this.cultivos_forestales[
          this.indiceEditarCF
        ].importancia_forestales = this.datosCulFor.importancia_forestales;
        this.cultivos_forestales[
          this.indiceEditarCF
        ].producto_forestales = this.datosCulFor.producto_forestales;
        this.cultivos_forestales[
          this.indiceEditarCF
        ].variedad_forestales = this.datosCulFor.variedad_forestales;
        this.cultivos_forestales[
          this.indiceEditarCF
        ].texto_variedad_forestales = this.showText(
          Number(this.datosCulFor.variedad_forestales),
          this.especie1
        );

        this.cultivos_forestales[
          this.indiceEditarCF
        ].edad_plantacion = this.datosCulFor.edad_plantacion;
        this.cultivos_forestales[
          this.indiceEditarCF
        ].tipo_edad = this.datosCulFor.tipo_edad;
        this.cultivos_forestales[
          this.indiceEditarCF
        ].area_sembrada_forestales = this.datosCulFor.area_sembrada_forestales;
        this.cultivos_forestales[
          this.indiceEditarCF
        ].unidad_area_forestales = this.datosCulFor.unidad_area_forestales;
        this.cultivos_forestales[
          this.indiceEditarCF
        ].texto_unidad_area_forestales = this.showText(
          Number(this.datosCulFor.unidad_area_forestales),
          this.unidades1
        );

        this.cultivos_forestales[
          this.indiceEditarCF
        ].rendimiento_arbol = this.datosCulFor.rendimiento_arbol;
        this.cultivos_forestales[
          this.indiceEditarCF
        ].costo_total_forestales = this.datosCulFor.costo_total_forestales;
        this.cultivos_forestales[
          this.indiceEditarCF
        ].costo_establecimiento_forestales = this.datosCulFor.costo_establecimiento_forestales;
        this.cultivos_forestales[
          this.indiceEditarCF
        ].costo_sostenimiento_forestales = this.datosCulFor.costo_sostenimiento_forestales;
        this.cultivos_forestales[
          this.indiceEditarCF
        ].problematica_productos_forestales = this.datosCulFor.problematica_productos_forestales;
        this.cultivos_forestales[
          this.indiceEditarCF
        ].produccion_destinada_forestales = this.datosCulFor.produccion_destinada_forestales;

        this.cultivos_forestales[
          this.indiceEditarCF
        ].unidad_producion_destinada_forestales = this.datosCulFor.unidad_producion_destinada_forestales;
        this.cultivos_forestales[
          this.indiceEditarCF
        ].texto_unidad_producion_destinada_forestales = this.showText(
          Number(this.datosCulFor.unidad_producion_destinada_forestales),
          this.unidades3
        );

        this.cultivos_forestales[
          this.indiceEditarCF
        ].numero_arboles = this.datosCulFor.numero_arboles;
        this.cultivos_forestales[
          this.indiceEditarCF
        ].compradores_forestales = this.datosCulFor.compradores_forestales;
        this.cultivos_forestales[
          this.indiceEditarCF
        ].metodo_pago_forestales = this.datosCulFor.metodo_pago_forestales;
        this.cultivos_forestales[
          this.indiceEditarCF
        ].precio_promedio_venta_forestales = this.datosCulFor.precio_promedio_venta_forestales;
        this.cultivos_forestales[
          this.indiceEditarCF
        ].subproductos_produccion_forestales = this.datosCulFor.subproductos_produccion_forestales;
        this.cultivos_forestales[
          this.indiceEditarCF
        ].pertenece_forestales = this.datosCulFor.pertenece_forestales;

        this.cultivos_forestales[
          this.indiceEditarCF
        ].nombre_programa_forestales = this.datosCulFor.nombre_programa_forestales;
        this.cultivos_forestales[
          this.indiceEditarCF
        ].entidad_forestales = this.datosCulFor.entidad_forestales;
        this.cultivos_forestales[
          this.indiceEditarCF
        ].pertenece_organizacion_forestales = this.datosCulFor.pertenece_organizacion_forestales;
        this.cultivos_forestales[
          this.indiceEditarCF
        ].tipo_pertenece_forestales = this.datosCulFor.tipo_pertenece_forestales;
        this.cultivos_forestales[
          this.indiceEditarCF
        ].nombre_organizacion_forestales = this.datosCulFor.nombre_organizacion_forestales;
        this.cultivos_forestales[
          this.indiceEditarCF
        ].beneficios_forestales = this.datosCulFor.beneficios_forestales;
        this.cultivos_forestales[
          this.indiceEditarCF
        ].texto_beneficios_forestales = this.showText(
          this.datosCulFor.beneficios_forestales,
          this.beneficios
        );

        this.cultivos_forestales[
          this.indiceEditarCF
        ].no_pertenece_forestales = this.datosCulFor.no_pertenece_forestales;
        this.cultivos_forestales[
          this.indiceEditarCF
        ].texto_no_pertenece_forestales = this.showText(
          this.datosCulFor.no_pertenece_forestales,
          this.razon1
        );
        this.cultivos_forestales[
          this.indiceEditarCF
        ].trabaja_asociacion_forestales = this.datosCulFor.trabaja_asociacion_forestales;
        this.cultivos_forestales[
          this.indiceEditarCF
        ].otros_problematica_productos_forestales = this.datosCulFor.otros_problematica_productos_forestales;
        this.cultivos_forestales[
          this.indiceEditarCF
        ].estado = this.datosCulFor.estado;
        this.cultivos_forestales[
          this.indiceEditarCF
        ].id_compania = this.datosCulFor.id_compania;

        this.cultivos_forestales.splice(
          this.indiceEditarCF,
          1,
          this.cultivos_forestales[this.indiceEditarCF]
        );
        this.datosCulFor.importancia_forestales = "";
        this.datosCulFor.producto_forestales = "";
        this.datosCulFor.variedad_forestales = "";
        this.datosCulFor.edad_plantacion = "";
        this.datosCulFor.tipo_edad = "";
        this.datosCulFor.area_sembrada_forestales = "";
        this.datosCulFor.unidad_area_forestales = "";
        this.datosCulFor.rendimiento_arbol = "";
        this.datosCulFor.costo_total_forestales = "";

        this.datosCulFor.costo_establecimiento_forestales = "";
        this.datosCulFor.costo_sostenimiento_forestales = "";
        this.datosCulFor.problematica_productos_forestales = "";
        this.datosCulFor.produccion_destinada_forestales = "";
        this.datosCulFor.unidad_producion_destinada_forestales = "";
        this.datosCulFor.numero_arboles = "";
        this.datosCulFor.compradores_forestales = "";
        this.datosCulFor.metodo_pago_forestales = "";
        this.datosCulFor.precio_promedio_venta_forestales = "";
        this.datosCulFor.subproductos_produccion_forestales = "";
        this.datosCulFor.pertenece_forestales = "";

        this.datosCulFor.nombre_programa_forestales = "";
        this.datosCulFor.entidad_forestales = "";
        this.datosCulFor.pertenece_organizacion_forestales = "";
        this.datosCulFor.tipo_pertenece_forestales = "";
        this.datosCulFor.nombre_organizacion_forestales = "";
        this.datosCulFor.beneficios_forestales = "";
        this.datosCulFor.no_pertenece_forestales = "";
        this.datosCulFor.trabaja_asociacion_forestales = "";
        this.datosCulFor.otros_problematica_productos_forestales = "";

        this.mOPPPF = false;
        this.mOPATF = false;
        this.mOPF = false;
        this.bandeGuaEdiCF = true;
        // AGREGAR LOS DATOS
      },
      CancelarEditarCF() {
        // AGREGAR LOS DATOS
        this.cultivos_forestales[this.indiceEditarCF].estado = "Activo";
        this.cultivos_forestales.splice(
          this.indiceEditarCF,
          1,
          this.cultivos_forestales[this.indiceEditarCF]
        );
        this.datosCulFor.importancia_forestales = "";
        this.datosCulFor.producto_forestales = "";
        this.datosCulFor.variedad_forestales = "";
        this.datosCulFor.edad_plantacion = "";
        this.datosCulFor.tipo_edad = "";
        this.datosCulFor.area_sembrada_forestales = "";
        this.datosCulFor.unidad_area_forestales = "";
        this.datosCulFor.rendimiento_arbol = "";
        this.datosCulFor.costo_total_forestales = "";

        this.datosCulFor.costo_establecimiento_forestales = "";
        this.datosCulFor.costo_sostenimiento_forestales = "";
        this.datosCulFor.problematica_productos_forestales = "";
        this.datosCulFor.produccion_destinada_forestales = "";

        this.datosCulFor.unidad_producion_destinada_forestales = "";
        this.datosCulFor.numero_arboles = "";
        this.datosCulFor.compradores_forestales = "";
        this.datosCulFor.metodo_pago_forestales = "";
        this.datosCulFor.precio_promedio_venta_forestales = "";
        this.datosCulFor.subproductos_produccion_forestales = "";
        this.datosCulFor.pertenece_forestales = "";

        this.datosCulFor.nombre_programa_forestales = "";
        this.datosCulFor.entidad_forestales = "";
        this.datosCulFor.pertenece_organizacion_forestales = "";
        this.datosCulFor.tipo_pertenece_forestales = "";
        this.datosCulFor.nombre_organizacion_forestales = "";
        this.datosCulFor.beneficios_forestales = "";
        this.datosCulFor.no_pertenece_forestales = "";
        this.datosCulFor.trabaja_asociacion_forestales = "";
        this.datosCulFor.otros_problematica_productos_forestales = "";

        this.mOPPPF = false;
        this.mOPATF = false;
        this.mOPF = false;
        this.bandeGuaEdiCF = true;
        // AGREGAR LOS DATOS
      },

      showText: function(val, vectorAux) {
        if (val !== "NA") {
          val = Number(val);
        }
        for (var i = 0; i < vectorAux.length; i++) {
          if (vectorAux[i].value === val) {
            return vectorAux[i].texto;
          }
        }
        return "";
      },
      showText2: function(val, vectorAux, id) {
        if (id === "") {
          return "";
        }
        if (val !== "NA") {
          val = Number(val);
        }
        for (var i = 0; i < vectorAux[id].length; i++) {
          if (vectorAux[id][i].value === val) {
            return vectorAux[id][i].texto;
          }
        }
        return "";
      }
    }
  };
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
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