<template>
  <div>
    <div class="kt-portlet" style="margin-top: -4%;">
      <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
          <h3 class="kt-portlet__head-title">
            <span class="kt-widget20__number kt-font-danger">GESTIÓN DE ESTABLECIMIENTOS</span>
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
            <div class="form-group row">
              <div class="col-lg-12">
                <label>Razón Social:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Razón Social"
                  v-model.trim="datos.razon"
                  :class="datos.razon==''?'is-invalid':'is-valid'"
                  ref="razon"
                />
                <div class="valid-feedback" v-if="datos.razon!=''">La Razón Social es Valida</div>
                <div class="invalid-feedback">
                  <span v-if="datos.razon==''">La razón social es obligatoria</span>
                </div>
              </div>
            </div>
            <div class="form-group row">
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
                <label>Registro Camara de Comercio:</label>
                <b-form-select
                  v-model="datos.registrado"
                  :class="datos.registrado==''?'':'is-valid'"
                  @change="mostrarOtro('MM')"
                  ref="registrado"
                >
                  <option value selected>Seleccione</option>
                  <option value="SI">SI</option>
                  <option value="NO">NO</option>
                </b-form-select>
              </div>
              <div class="col-lg-4" v-show="mOMM">
                <label>Número Matrícula Mercantil:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Número Matrícula Mercantil"
                  v-model.trim="datos.num_matricula"
                  :class="datos.num_matricula==''?'':'is-valid'"
                  ref="num_matricula"
                />
              </div>
              <div class="col-lg-4">
                <label>Naturaleza Juridica del Establecimiento:</label>
                <b-form-select
                  v-model="datos.naturaleza"
                  :class="datos.naturaleza==''?'':'is-valid'"
                  @change="mostrarOtro('NJ')"
                  ref="naturaleza"
                >
                  <option value selected>Seleccione</option>
                  <option value="1">Persona Natural</option>
                  <option value="2">Sociedad Anónima S.A.</option>
                  <option value="3">Sociedad por acciones simplificadas. S.A.S</option>
                  <option value="4">Sociedad Limitada LTDA.</option>
                  <option value="5">Cooperativa</option>
                  <option value="6">No registra</option>
                  <option value="7">Otra</option>
                </b-form-select>
              </div>
            </div>            
            <div class="form-group row">
              <div class="col-lg-4">
                <label>{{auxNit}}:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  :placeholder="auxNit"
                  v-model.trim="datos.nit"
                  :class="datos.nit==''?'':'is-valid'"
                  ref="nit"
                />
              </div>
              <div class="col-lg-8">
                <label>Representante Legal:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Representante Legal"
                  v-model.trim="datos.representante"
                  :class="datos.representante==''?'':'is-valid'"
                  ref="representante"
                />
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-12" v-show="mONJ">
                <label>Otra Naturaleza Juridica del Establecimiento:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Cual?"
                  v-model.trim="datos.otra_naturaleza"
                  :class="datos.otra_naturaleza==''?'':'is-valid'"
                  ref="otra_naturaleza"
                />
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4">
                <label>Tipo de Establecimiento Comercial:</label>
                <b-form-select
                  v-model="datos.tipo"
                  :class="datos.tipo==''?'':'is-valid'"
                  ref="tipo"
                >
                  <option value selected>Seleccione</option>
                  <option value="1">Tienda de Ropa</option>
                  <option value="2">Almacen</option>
                  <option value="3">Centros de Belleza</option>
                  <option value="4">Restaurantes</option>
                  <option value="5">Talleres mecánicos</option>
                  <option value="6">Café Internet</option>
                  <option value="7">Comidas Rapidas</option>
                  <option value="8">Panaderia/ pasteliría</option>
                  <option value="9">Ferretería</option>
                  <option value="10">Miscelania</option>
                  <option value="11">Papelería  y Librerías</option>
                  <option value="12">Cafetería</option>
                  <option value="13">Frutería</option>
                  <option value="14">Venta de loterías o juegos de azar</option>
                  <option value="15">Carnicería</option>
                  <option value="16">Asaderos</option>
                  <option value="17">Lavaderos de Vehículos</option>
                  <option value="18">Licorería</option>
                  <option value="19">Parqueaderos</option>
                  <option value="20">Colegios o centros de estudios</option>
                  <option value="21">Consultorios medicos</option>
                  <option value="22">Consultorios Juridicos</option>
                  <option value="23">Micelania y Cacharrerias</option>
                  <option value="24">Agencias de Viajes</option>
                  <option value="25">Discotecas y Bares</option>
                  <option value="26">Estaciones de servicios</option>
                  <option value="27">Hoteles</option>
                  <option value="28">Joyerias</option>
                  <option value="29">Puesto de Mercado</option>
                  <option value="30">Sex Shop</option>
                  <option value="31">Supermercados</option>
                  <option value="32">Otras Tienda especializada</option>
                  <option value="33">Otros Establecimiento de servicios</option>
                </b-form-select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-10">
                <label>Actividad Económica:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Actividad Económica"
                  v-model="actividadesAuxiliar"
                  ref="actividad_economica"
                  :class="actividadesAuxiliar==''?'':'is-valid'"
                  @click="abrirModalActividades()"
                  :readonly="true"
                />
              </div>
              <div class="col-lg-1">
                <br />
                <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <a
                  href="javascript:;"
                  class="btn btn-outline-info btn-icon"
                  data-skin="dark"
                  data-toggle="kt-tooltip"
                  data-placement="top"
                  title="Agregar"
                  @click.prevent="AgregarActividad"
                >
                  <i class="fa fa-plus"></i>
                </a>&nbsp;
              </div>
              <div class="col-lg-1">
                <br />
                <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <a
                  href="javascript:;"
                  class="btn btn-outline-danger btn-icon"
                  data-skin="dark"
                  data-toggle="kt-tooltip"
                  data-placement="top"
                  title="Limpiar"
                  @click.prevent="limpiarActividad"
                >
                  <i class="fa fa-trash"></i>
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
                        <th>Actividad</th>
                        <td class="text-center">Opciones</td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr
                        v-for="(item,index) in ActividadData"
                        :key="index"
                        v-show="item.estado=='Activo'"
                      >
                        <td style="font-weight: normal;vertical-align: middle;">{{ (index+1) }}</td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <span class="text-capitalize">{{item.actividad}}</span>
                        </td>
                        <td style="text-align:center;vertical-align: middle;text-align: center;">
                          <button
                            class="btn btn-icon btn-sm btn-outline-danger"
                            type="button"
                            title="Eliminar"
                            @click="eliminarItemActividad(item, index)"
                          >
                            <i class="fa fa-trash"></i>
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="kt-separator kt-separator--border-dashed"></div>
                </div>
              </div>
            </div>            
            <div class="form-group row">
              <div class="col-lg-4">
                <label>Participación de Capital Extranjero:</label>
                <b-form-select
                  v-model="datos.capital_extranjero"
                  :class="datos.capital_extranjero==''?'':'is-valid'"
                  ref="capital_extranjero"
                >
                  <option value selected>Seleccione</option>
                  <option value="SI">SI</option>
                  <option value="NO">NO</option>
                </b-form-select>
              </div>
              <div class="col-lg-4">
                <label>¿Recibe el Permiso de Operar Como?:</label>
                <b-form-select
                  v-model="datos.permiso"
                  :class="datos.permiso==''?'':'is-valid'"
                  @change="mostrarOtro('MP')"
                  ref="permiso"
                >
                  <option value selected>Seleccione</option>
                  <option value="1">Franquicia</option>
                  <option value="2">Concesión</option>
                  <option value="3">Patente</option>
                  <option value="4">Ninguna</option>
                  <option value="5">Otro</option>
                </b-form-select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-8" v-show="mOMP">
                <label>¿Cual?:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="¿Cual?"
                  v-model.trim="datos.otro_permiso"
                  :class="datos.otro_permiso==''?'':'is-valid'"
                  ref="otro_permiso"
                />
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4">
                <label>Año de Inicio de Operación:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Año de Inicio de Operación"
                  v-model.trim="datos.anio"
                  :class="datos.anio==''?'':'is-valid'"
                  ref="anio"
                  @change="formato('anio')"
                />
              </div>
              <div class="col-lg-4">
                <label>Numero de Empleados Directos:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Numero de Empleados Directos"
                  v-model.trim="datos.num_empleados"
                  :class="datos.num_empleados==''?'':'is-valid'"
                  ref="num_empleados"
                  @change="formato('nume')"
                />
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4">
                <label>Tiempo Sin Operación Debido al Covid 19:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Tiempo Sin Operación Debido al Covid 19"
                  v-model.trim="datos.tiempo_sin_operacion"
                  :class="datos.tiempo_sin_operacion==''?'':'is-valid'"
                  ref="tiempo_sin_operacion"
                  @change="formato('tiempo_sin_operacion')"
                />
              </div>
              <div class="col-lg-3">
                <label>Tiempo en:</label>
                <b-form-select
                  v-model="datos.tipo_tiempo"
                  :class="datos.tipo_tiempo==''?'':'is-valid'"
                  ref="tipo_tiempo"
                  :disabled="datos.tiempo_sin_operacion>0? false:true"
                >
                  <option value selected>Seleccione</option>
                  <option value="DIAS">DIAS</option>
                  <option value="MESES">MESES</option>
                  <option value="ANIOS">AÑOS</option>
                </b-form-select>
              </div>
              <div class="col-lg-3">
                <label>Fecha de Retorno a Labores</label>
                <input
                  id="date"
                  type="date"
                  placeholder="Fecha de Retorno a Labores"
                  v-model="datos.fecha_retorno"
                  :class="datos.fecha_retorno==''?'':'is-valid'"
                  class="form-control text-capitalize"
                  ref="fecha_retorno"
                  :max="hoy | moment"
                  :readonly="datos.tiempo_sin_operacion>0? false:true"
                  v-show="datos.tiempo_sin_operacion!=0"
                />
                <input
                  id="date"
                  type="text"
                  placeholder="Fecha de Retorno a Labores"
                  class="form-control text-capitalize"
                  ref="fecha_retorno"
                  :readonly="datos.tiempo_sin_operacion>0? false:true"
                  v-show="datos.tiempo_sin_operacion==0"
                />                
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4">
                <label>Ingresos Anterior a la Contingencia:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Ingresos Anterior a la Contingencia"
                  v-model.trim="datos.promedio_ingresos_anterior"
                  :class="datos.promedio_ingresos_anterior==''?'':'is-valid'"
                  ref="promedio_ingresos_anterior"
                  @change="formato('promedio_ingresos_anterior')"
                />
              </div>
              <div class="col-lg-4">
                <label>Ingresos Durante a la Contingencia:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Ingresos Durante a la Contingencia"
                  v-model.trim="datos.promedio_ingresos_durante"
                  :class="datos.promedio_ingresos_durante==''?'':'is-valid'"
                  ref="promedio_ingresos_durante"
                  @change="formato('promedio_ingresos_durante')"
                />
              </div>
              <div class="col-lg-4">
                <label>Ingresos Posterior a la Contingencia:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Ingresos Posterior a la Contingencia"
                  v-model.trim="datos.promedio_ingresos_posterior"
                  :class="datos.promedio_ingresos_posterior==''?'':'is-valid'"
                  ref="promedio_ingresos_posterior"
                  @change="formato('promedio_ingresos_posterior')"
                />
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4">
                <label>Principal Carga Economica:</label>
                <b-form-select
                  v-model="datos.carga_economica"
                  :class="datos.carga_economica==''?'':'is-valid'"
                  ref="carga_economica"
                >
                  <option value selected>Seleccione</option>
                  <option value="1">Pago de Nóminas.</option>
                  <option value="2">Pago a proveedores.</option>
                  <option value="3">Arrendamiento y servicios públicos.</option>
                </b-form-select>
              </div>
              <div class="col-lg-4">
                <label>¿Cuenta Con Protocolos de Seguridad?:</label>
                <b-form-select
                  v-model="datos.protocolo_bioseguridad"
                  :class="datos.protocolo_bioseguridad==''?'':'is-valid'"
                  ref="protocolo_bioseguridad"
                >
                  <option value selected>Seleccione</option>
                  <option value="SI">SI</option>
                  <option value="NO">NO</option>
                </b-form-select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-12">
                <label>Tipo de Afectación del Establecimiento:</label>
                <multiselect
                  v-model="datos.tipo_afectacion"
                  :options="tipo"
                  :multiple="true"
                  :close-on-select="false"
                  :clear-on-select="false"
                  :preserve-search="true"
                  placeholder="Seleccione un tipo de afectación"
                  label="texto"
                  track-by="value"
                  :class="datos.tipo_afectacion==''?'':'is-valid'"
                ></multiselect>
              </div>              
            </div>
            <div class="form-group row">
              <div class="col-lg-4" v-show="mOTA">
                <label>¿Cual?:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="¿Cual?"
                  v-model.trim="datos.otro_tipo_afectacion"
                  :class="datos.otro_tipo_afectacion==''?'':'is-valid'"
                  ref="otro_tipo_afectacion"
                />
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4">
                <label>¿Recibió Ayuda del Gobierno?:</label>
                <b-form-select
                  v-model="datos.ayuda"
                  :class="datos.ayuda==''?'':'is-valid'"
                  ref="ayuda"
                >
                  <option value selected>Seleccione</option>
                  <option value="SI">SI</option>
                  <option value="NO">NO</option>
                </b-form-select>
              </div>
              <div class="col-lg-4">
                <label>¿Cuenta con Servicio de Internet?:</label>
                <b-form-select
                  v-model="datos.internet"
                  :class="datos.internet==''?'':'is-valid'"
                  ref="internet"
                >
                  <option value selected>Seleccione</option>
                  <option value="SI">SI</option>
                  <option value="NO">NO</option>
                </b-form-select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-12">
                <label>¿Dentro de cuanto tiempo, creen que el establecimiento pueda recuperarse económicamente de las afectaciones por la emergencia Covid- 19?:</label>
                <b-form-select
                  v-model="datos.tiempo_recuperacion"
                  :class="datos.tiempo_recuperacion==''?'':'is-valid'"
                  ref="tiempo_recuperacion"
                >
                  <option value selected>Seleccione</option>
                  <option value="1">En los próximos de 6 meses.</option>
                  <option value="2">Antes de los 6 meses.</option>
                  <option value="3">No se ha estimado.</option>
                  <option value="4">No hay afectación.</option>
                </b-form-select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-12">
                <label>¿Cuál cree usted que es el principal problema del sector en el que está ubicado el establecimiento comercial?:</label>
                <b-form-select
                  v-model="datos.principal_problema"
                  :class="datos.principal_problema==''?'':'is-valid'"
                  ref="principal_problema"
                  @change="mostrarOtro('PP')"
                >
                  <option value selected>Seleccione</option>
                  <option value="1">Inseguridad.</option>
                  <option value="2">Falta de servicios públicos.</option>
                  <option value="3">Vías de acceso.</option>
                  <option value="4">Falta de Alumbrado Público.</option>
                  <option value="5">Otro.</option>
                </b-form-select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4" v-show="mOPP">
                <label>¿Cual?:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="¿Cual?"
                  v-model.trim="datos.otro_principal_problema"
                  :class="datos.otro_principal_problema==''?'':'is-valid'"
                  ref="otro_principal_problema"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--begin::Modal-->
      <b-modal
        ref="modalActividad"
        hide-footer
        title="Actividades Economicas"
        size="xl"
        centered
        header-bg-variant="danger"
        header-text-variant="light"
        :no-close-on-backdrop="true"
      >
        <div class="d-block">
          <form>
            <div class="row">
              <div class="col-md-6 col-lg-6">
                <form class="kt-form">
                  <div class="form-group">
                    <div class="input-group">
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Busqueda"
                        v-model="txtbusquedaAct"
                      />
                      <div class="input-group-append">
                        <button
                          type="button"
                          class="btn btn-primary btn-icon"
                          @click="consultarActividades(1)"
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
                <div class="table-responsive" style="height: 350px;">
                  <table class="table table-sm table-hover">
                    <thead class>
                      <tr class="kt-bg-fill-brand">
                        <th>No.</th>
                        <th>Actividad Economica</th>
                        <td class="text-center">Opciones</td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(item,index) in actividadesVector" :key="index">
                        <td style="font-weight: normal;vertical-align: middle;">{{ (index+1) }}</td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <span class="text-capitalize">{{item.descripcion}}</span>
                        </td>
                        <td style="text-align:center;vertical-align: middle;text-align: center;">
                          <button
                            class="btn btn-icon btn-sm btn-outline-success"
                            type="button"
                            title="Seleccionar"
                            @click="seleccionarActividades(item)"
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
                              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon id="Shape" points="0 0 24 0 24 24 0 24" />
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
    </div>
  </div>
</template>
<script>
  "use strict";
  import * as actividadesServicios from "../../Servicios/actividad_servicios";
  import * as establecimientosServicios from "../../Servicios/establecimientos_servicios";
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
      if (this.IDHOGAR == null) {
        this.$router.push("/gestion");
      } else {
        this.nuevo(this.IDHOGAR);
      }
    },
    data() {
      return {
        IDHOGAR: 0,
        dpto_options: [],
        muni_options: {},
        corregi_options: {},
        barrio_options: {},
        vereda_options: {},
        txtbusquedaAct: "",
        actividadesVector: [],
        actividadesAuxiliar: "",
        actividad_economica: "",
        hoy: "",
        auxNit: "Identificación",
        datos: {
          id: 0,
          id_hogar: 0,
          id_dpto: "",
          id_mun: "",
          id_corre: "",
          id_vereda: "",
          id_barrio: "",
          registrado: "",
          num_matricula: "",
          naturaleza: "",
          otra_naturaleza: "",
          tipo: "",
          // actividad_economica: "",
          capital_extranjero: "",
          permiso: "",
          otro_permiso: "",
          anio: "",
          num_empleados: "",
          tiempo_sin_operacion: "",
          fecha_retorno: "",
          promedio_ingresos_anterior: "",
          promedio_ingresos_durante: "",
          promedio_ingresos_posterior: "",
          carga_economica: "",
          protocolo_bioseguridad: "",
          tipo_afectacion: [],
          otro_tipo_afectacion: "",
          ayuda: "",
          tiempo_recuperacion: "",
          principal_problema: "",
          internet: "",
          estado: "Activo",
          id_compania: 1,
          fecha: "",
          usuario_crear: "",
          fecha_editar: "",
          usuario_editar: "",
          otro_principal_problema: "",
          nit: "",
          representante: "",
          direccion: "",
          razon: "",
          tipo_tiempo: ""
        },
        mOMM: false,
        mONJ: false,
        mOMP: false,
        mOTA: false,
        mOPP: false,
        valG: true,
        tipo: [
          { value: 1, texto: "Reducción de personal" },
          {
            value: 2,
            texto: "Reducción de salarios"
          },
          { value: 3, texto: "Desabastecimiento de insumos y materia prima" },
          { value: 4, texto: "Disminución de demanda" },
          { value: 5, texto: "Ninguna afectación" }
        ],
        ActividadData: []        
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
      nuevo: async function(id_hogar) {
        const parametros = {
          _token: this.csrf,
          id_hogar: id_hogar
        };
        try {
          await establecimientosServicios.nuevo(parametros).then(respuesta => {
            this.dpto_options = respuesta.data.arrayDpto;
            this.muni_options = respuesta.data.arrayMuni;
            this.corregi_options = respuesta.data.arrayCorregi;
            this.vereda_options = respuesta.data.arrayVeredas;
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
            if (this.datos.id_corre === "0"){
              this.cambiarCombo("muni");
              this.datos.id_corre = "0";
            }else{
              this.cambiarCombo("muni");
            }
          }
        }
        if (caja === "vereda"){
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
          let vere ="";          
          if(this.datos.id_vereda === "" || this.datos.id_vereda === "0"){
            vere = this.datos.id_vereda;
            this.cambiarCombo("corregi");
            if(vere==="0"){
              this.datos.id_vereda="0";
            }
          }
        }       
      },
      volver() {
        this.$router.push("/gestion");
      },
      mostrarOtro(tipo) {
        if (tipo === "MM") {
          if (this.datos.registrado === "SI") {
            this.mOMM = true;
            this.auxNit = "Nit";
          } else {
            this.mOMM = false;
            this.auxNit = "Identificación";
          }
          this.datos.num_matricula = "";
        }
        if (tipo === "NJ") {
          if (this.datos.naturaleza === "7") {
            this.mONJ = true;
          } else {
            this.mONJ = false;
          }
          this.datos.otra_naturaleza = "";
        }
        if (tipo === "MP") {
          if (this.datos.permiso === "5") {
            this.mOMP = true;
          } else {
            this.mOMP = false;
          }
          this.datos.otro_permiso = "";
        }
        if (tipo === "TA") {
          if (this.datos.tipo_afectacion === "6") {
            this.mOTA = true;
          } else {
            this.mOTA = false;
          }
          this.datos.otro_tipo_afectacion = "";
        }
        if (tipo === "PP") {
          if (this.datos.principal_problema === "5") {
            this.mOTA = true;
          } else {
            this.mOTA = false;
          }
          this.datos.otro_principal_problema = "";
        }
      },
      cerrarModal() {
        this.$refs.modalActividad.hide();
      },
      abrirModalActividades() {
        this.txtbusquedaAct = "";
        this.consultarActividades(1);
        this.$refs.modalActividad.show();
      },
      async consultarActividades(pagina) {
        const parametros = {
          txtbusqueda: this.txtbusquedaAct.trim(),
          _token: this.csrf,
          page: pagina
        };
        try {
          await actividadesServicios.listar(parametros).then(respuesta => {
            this.actividadesVector = respuesta.data.actividades.data;
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
      seleccionarActividades(item) {
        this.actividad_economica = item.id;
        this.actividadesAuxiliar = item.descripcion;
        this.$refs.modalActividad.hide();
      },
      guardar: async function() {
        if (!this.checkForm()) {
        } else {
          if (this.ActividadData.length <= 0 ) {
            this.$swal(
              "Error...!",
              "Por favor agrege por lo menos una actividad economica!",
              "error"
            );
            return;
          }          
          this.datos.id_hogar = this.IDHOGAR;
          const parametros = {
            _token: this.csrf,
            datos: this.datos,
            actividad_establecimientos: this.ActividadData,
            opcion: "guardar"
          };
          this.valG = false;
          try {
            await establecimientosServicios
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

        if (this.datos.razon === "") {
          this.$refs.razon.focus();
          bande = false;
          this.$swal("Error...!", "Por favor digite la razón social!", "error");
          return;
        }
        if (this.datos.direccion === "") {
          this.$refs.direccion.focus();
          bande = false;
          this.$swal("Error...!", "Por favor digite la direccion!", "error");
          return;
        }
        if (this.datos.nit === "") {
          this.$refs.nit.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor digite el nit del establecimiento!",
            "error"
          );
          return;
        }
        if (this.datos.representante === "") {
          this.$refs.representante.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor digite el representante legal del establecimiento!",
            "error"
          );
          return;
        }
        if (this.datos.registrado === "") {
          this.$refs.registrado.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione la opción registro camara de comercio!",
            "error"
          );
          return;
        }
        if (this.datos.naturaleza === "") {
          this.$refs.naturaleza.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione la opción naturaleza juridica del establecimiento!",
            "error"
          );
          return;
        }
        if (this.datos.tipo === "") {
          this.$refs.tipo.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione la opción tipo de establecimiento comercial!",
            "error"
          );
          return;
        }
        // if (this.datos.actividad_economica === "") {
        //   this.$refs.actividad_economica.focus();
        //   bande = false;
        //   this.$swal(
        //     "Error...!",
        //     "Por favor seleccione la opción actividad economica!",
        //     "error"
        //   );
        //   return;
        // }
        if (this.datos.capital_extranjero === "") {
          this.$refs.capital_extranjero.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione la opción participación de capital extranjero!",
            "error"
          );
          return;
        }
        if (this.datos.permiso === "") {
          this.$refs.permiso.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione la opción recibe el permiso de operar como!",
            "error"
          );
          return;
        }
        if (this.datos.anio === "") {
          this.$refs.anio.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor digite el año de inicio de operación!",
            "error"
          );
          return;
        }
        if (this.datos.num_empleados === "") {
          this.$refs.num_empleados.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor digite el numero de empleados directos!",
            "error"
          );
          return;
        }
        if (this.datos.tiempo_sin_operacion === "") {
          this.$refs.tiempo_sin_operacion.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor digite el tiempo sin operación debido al covid 19!",
            "error"
          );
          return;
        }
        if(this.datos.tiempo_sin_operacion < "0"){
          if (this.datos.tipo_tiempo === "") {
            this.$refs.tipo_tiempo.focus();
            bande = false;
            this.$swal(
              "Error...!",
              "Por favor seleccione la opción tiempo en!",
              "error"
            );
            return;
          }
          if (this.datos.fecha_retorno === "") {
            this.$refs.fecha_retorno.focus();
            bande = false;
            this.$swal(
              "Error...!",
              "Por favor seleccione la fecha de retorno a labores!",
              "error"
            );
            return;
          }
        }
        if (this.datos.promedio_ingresos_anterior === "") {
          this.$refs.promedio_ingresos_anterior.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor digite el promedio de ingresos anterior a la contingencia!",
            "error"
          );
          return;
        }
        if (this.datos.promedio_ingresos_durante === "") {
          this.$refs.promedio_ingresos_durante.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor digite el promedio de ingresos durante la contingencia!",
            "error"
          );
          return;
        }
        if (this.datos.promedio_ingresos_posterior === "") {
          this.$refs.promedio_ingresos_posterior.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor digite el promedio de ingresos posterior a la contingencia!",
            "error"
          );
          return;
        }
        if (this.datos.carga_economica === "") {
          this.$refs.carga_economica.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione la opción principal carga economica!",
            "error"
          );
          return;
        }
        if (this.datos.protocolo_bioseguridad === "") {
          this.$refs.protocolo_bioseguridad.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione la opción cuenta con protocolos de bioseguridad!",
            "error"
          );
          return;
        }
        if (this.datos.tipo_afectacion.length <= 0) {
          this.$refs.tipo_afectacion.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione la opción tipo de afectación del establecimiento!",
            "error"
          );
          return;
        }
        if (this.datos.ayuda === "") {
          this.$refs.ayuda.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione la opción recibió ayuda por parte del gobierno!",
            "error"
          );
          return;
        }
        if (this.datos.internet === "") {
          this.$refs.internet.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione la opción cuenta con servicio de internet!",
            "error"
          );
          return;
        }
        if (this.datos.tiempo_recuperacion === "") {
          this.$refs.tiempo_recuperacion.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione la opción Dentro de cuanto tiempo, creen que el establecimiento pueda recuperarse económicamente de las afectaciones por la emergencia Covid- 19!",
            "error"
          );
          return;
        }
        if (this.datos.principal_problema === "") {
          this.$refs.principal_problema.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione la opción Cuál cree usted que es el principal problema del sector en el que está ubicado el establecimiento comercial!",
            "error"
          );
          return;
        }
        return bande;
        e.preventDefault();
      },
      formato(caja) {
        if (caja === "anio") {
          this.datos.anio = this.datos.anio
            .replace(/[^.\d]/g, "")
            .trim();
          if (this.datos.anio == "NaN") {
            this.datos.anio = "";
          }
          if (this.datos.anio == "0") {
            this.datos.anio = "";
          }
        }        
        if (caja === "nume") {
          this.datos.num_empleados = this.datos.num_empleados
            .replace(/[^.\d]/g, "")
            .trim();
          if (this.datos.num_empleados == "NaN") {
            this.datos.num_empleados = "";
          }
          if (this.datos.num_empleados == "0") {
            this.datos.num_empleados = "";
          }
        }
        if (caja == "tiempo_sin_operacion") {
          this.datos.tiempo_sin_operacion = this.datos.tiempo_sin_operacion
            .replace(/[^.\d]/g, "")
            .trim();
          if (this.datos.tiempo_sin_operacion == "NaN") {
            this.datos.tiempo_sin_operacion = "";
          }
          if (this.datos.tiempo_sin_operacion < "0") {
            this.datos.tiempo_sin_operacion = "";
          }
          if (this.datos.tiempo_sin_operacion === "0") {
            this.datos.tipo_tiempo = "";
            this.datos.fecha_retorno = "";
          }
        }
        if (caja == "promedio_ingresos_anterior") {
          this.datos.promedio_ingresos_anterior = this.datos.promedio_ingresos_anterior.replace(
            /[.*+\-?^${}()|[\]\\]/g,
            ""
          );
          let val = (this.datos.promedio_ingresos_anterior / 1)
            .toFixed(0)
            .replace(".", ",");
          this.datos.promedio_ingresos_anterior = val
            .toString()
            .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
          if (this.datos.promedio_ingresos_anterior == "NaN") {
            this.datos.promedio_ingresos_anterior = "";
          }
          if (this.datos.promedio_ingresos_anterior == "0") {
            this.datos.promedio_ingresos_anterior = "";
          }
        }
        if (caja == "promedio_ingresos_durante") {
          this.datos.promedio_ingresos_durante = this.datos.promedio_ingresos_durante.replace(
            /[.*+\-?^${}()|[\]\\]/g,
            ""
          );
          let val = (this.datos.promedio_ingresos_durante / 1)
            .toFixed(0)
            .replace(".", ",");
          this.datos.promedio_ingresos_durante = val
            .toString()
            .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
          if (this.datos.promedio_ingresos_durante == "NaN") {
            this.datos.promedio_ingresos_durante = "";
          }
          if (this.datos.promedio_ingresos_durante == "0") {
            this.datos.promedio_ingresos_durante = "";
          }
        }
        if (caja == "promedio_ingresos_posterior") {
          this.datos.promedio_ingresos_posterior = this.datos.promedio_ingresos_posterior.replace(
            /[.*+\-?^${}()|[\]\\]/g,
            ""
          );
          let val = (this.datos.promedio_ingresos_posterior / 1)
            .toFixed(0)
            .replace(".", ",");
          this.datos.promedio_ingresos_posterior = val
            .toString()
            .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
          if (this.datos.promedio_ingresos_posterior == "NaN") {
            this.datos.promedio_ingresos_posterior = "";
          }
          if (this.datos.promedio_ingresos_posterior == "0") {
            this.datos.promedio_ingresos_posterior = "";
          }
        }
      },
      AgregarActividad(){
        if (this.actividadesAuxiliar === "") {
          this.$refs.actividadesAuxiliar.focus();
          this.$swal(
            "Error...!",
            "Por favor seleccione una actividad economica!",
            "error"
          );
          return;
        }
        this.ActividadData.push({
          id: 0,
          id_actividad: this.actividad_economica,
          actividad: this.actividadesAuxiliar,
          estado: "Activo"
        });
        this.limpiarActividad();                
      },
      limpiarActividad(){
        this.actividadesAuxiliar = "";
        this.actividad_economica = "";
      },
      eliminarItemActividad: function(item, index) {
        if (item.id !== 0) {
          this.ActividadData[index].estado = "Inactivo";
          this.ActividadData.splice(index, 1, this.ActividadData[index]);
        } else {
          this.ActividadData.splice(index, 1);
        }
      },      
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