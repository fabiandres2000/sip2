<template lang="">
    <div>
        <br>
        <loading
            :active.sync="isLoading"
            :can-cancel="true"
            :on-cancel="onCancel"
            loader="dots"
            :height=128
            :width=128
            color="#007bff"
            :is-full-page="true"
        />
        <div class="row justify-content-center">
            <div class="col-md-12 ">
                <div class="card redondo">
                    <div class="card-body"style="padding-top:0; padding-bottom:0; margin:0; padding-left:7px;">
                        <div id="app" ref="document">
                            <div ref="title" class="row" hidden>
                                <div class="col-sm-12 col-lg-12 text-left" style="padding: 1px 1px 1px 15px;">
                                    <h2>Riesgos Ambientales por Hogares ({{ente}})</h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2 col-lg-2 text-left" style="padding: 10px 10px 10px 20px;">
                                    <h4>Aplicar filtro por:</h4>
                                    <br/>
                                    <select class="form-control" @change="cambiaraTodos()" v-model="tipoCombo">
                                        <option value = "todos">Seleccione...</option>
                                        <option value = "barrio">Barrio - Cabecera Municipal</option>
                                        <option value = "barrio2">Barrio - Corregimiento</option>
                                        <option value = "corregimiento">Corregimiento</option>
                                        <option value = "vereda">Vereda</option>
                                    </select>
                                </div>
                                <div v-if="tipoCombo == 'todos'" class="col-sm-6 col-lg-6 text-left" style="padding: 10px 10px 10px 20px;"></div>
                                <div v-if="tipoCombo == 'barrio'" class="col-sm-4 col-lg-4 text-left" style="padding: 10px 10px 10px 20px;">
                                    <h4>Seleccione un Barrio</h4>
                                    <br/>
                                    <select class="form-control" @change="filtrar('barrio')" v-model="comboBarrio">
                                        <option value = "">Seleccione...</option>
                                        <option v-for="item in barrios" :value="item.value">{{item.texto}}</option>
                                    </select>
                                </div>
                                <div v-if="tipoCombo == 'corregimiento' || tipoCombo == 'barrio2'" class="col-sm-3 col-lg-3 text-left" style="padding: 10px 10px 10px 20px;">
                                    <h4>Seleccione un Corregimiento</h4>
                                    <br/>
                                    <select class="form-control" @change="filtrar('corregimiento')" v-model="comboCorregimiento">
                                        <option value = "">Seleccione...</option>
                                        <option v-for="item in corregimientos" :value="item.id">{{item.descripcion}}</option>
                                    </select>
                                </div>
                                 <div v-if="tipoCombo == 'barrio2'" class="col-sm-3 col-lg-3 text-left" style="padding: 10px 10px 10px 20px;">
                                    <h4>Seleccione un Barrio</h4>
                                    <br/>
                                    <select class="form-control" @change="filtrar('barrio2')" v-model="comboBarrio2">
                                        <option value = "">Seleccione...</option>
                                        <option v-for="item in barriosCorregimiento" :value="item.value">{{item.texto}}</option>
                                    </select>
                                </div>
                                <div v-if="tipoCombo == 'vereda'" class="col-sm-4 col-lg-4 text-left" style="padding: 10px 10px 10px 20px;">
                                    <h4>Seleccione una Vereda</h4>
                                    <br/>
                                    <select class="form-control" @change="filtrar('vereda')" v-model="comboVereda">
                                        <option value = "">Seleccione...</option>
                                        <option v-for="item in veredas" :value="item.id">{{item.descripcion}}</option>
                                    </select>
                                </div>
                                <div v-if="tipoCombo == 'corregimiento'" class="col-sm-1 col-lg-1 text-left" style="padding: 10px 10px 10px 20px;"></div>
                                <div v-if="tipoCombo != 'todos' && tipoCombo != 'barrio2'" class="col-sm-2 col-lg-2 text-left" style="padding: 10px 10px 10px 20px;"></div>
                                <div ref="boton1" class="col-sm-2 col-lg-2 text-right" style="padding: 10px 10px 10px 20px;">
                                    <button style="position: absolute;top: 55%;left: 35%;"  @click="exportToPDF()" class="btn btn-danger"><i class="fa fa-file" aria-hidden="true"></i> Exportar PDF</button>
                                </div>
                                <div ref="boton2" class="col-sm-2 col-lg-2 text-right" style="padding: 10px 10px 10px 20px;">
                                    <button style="position: absolute;top: 55%;left: 10%;" @click="verComparativaF()" :class="(verComparativa ? 'btn btn-primary':'btn btn-secondary')"><i class="fa fa-balance-scale" aria-hidden="true"></i> Comparar riesgos</button>
                                </div>
                            </div>
                            <hr>
                            <div class="row" v-if="!verComparativa">
                                <div class="col-sm-4 col-lg-4 borderbottomright" style="padding: 20px; height: 300px">
                                    <div>
                                        <apexchart width="380" type="donut" :options="optionsDerrumbe" :series="seriesRDerrumbe"></apexchart>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-lg-4 borderbottomright" style="padding: 20px; height: 300px">
                                    <div>
                                        <apexchart width="380" type="donut" :options="optionsInundacion" :series="seriesRInundacion"></apexchart>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-lg-4 borderbottomright" style="padding: 20px; height: 300px">
                                    <div>
                                        <apexchart width="380" type="donut" :options="optionsInsalubridad" :series="seriesRInsalubridad"></apexchart>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-lg-4 borderbottomright" style="padding: 20px; height: 300px">
                                    <div>
                                        <apexchart width="380" type="donut" :options="optionsAtmosferico" :series="seriesRAtmosferico"></apexchart>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-lg-4 borderbottomright" style="padding: 20px; height: 300px">
                                    <div>
                                        <apexchart width="380" type="donut" :options="optionsRecursoSuelo" :series="seriesRRecursoSuelo"></apexchart>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-lg-4 borderbottomright" style="padding: 20px; height: 300px">
                                    <div>
                                        <apexchart width="380" type="donut" :options="optionsQuemaIncendio" :series="seriesRQuemaIncendio"></apexchart>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-lg-4 borderbottomright" style="padding: 20px; height: 300px">
                                    <div>
                                        <apexchart width="380" type="donut" :options="optionsAuditivo" :series="seriesRAuditivo"></apexchart>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-lg-4 borderbottomright" style="padding: 20px; height: 300px">
                                    <div>
                                        <apexchart width="380" type="donut" :options="optionsRecursoHidrico" :series="seriesRRecursoHidrico"></apexchart>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-lg-4 borderbottomright" style="padding: 20px; height: 300px">
                                    <div>
                                        <apexchart width="380" type="donut" :options="optionsAccesoAgua" :series="seriesRAccesoAgua"></apexchart>
                                    </div>
                                </div>
                            </div>
                            <div class="row" v-if="verComparativa">
                                <div class="col-sm-4 col-lg-12 borderbottomright" style="padding: 20px; height: 600px">
                                    <div>
                                        <apexchart type="bar" height="550" :options="chartOptionsComparativa" :series="seriesComparativa"></apexchart>
                                    </div>
                                </div>
                            </div>
                            <div class="html2pdf__page-break"></div>
                            <div class="row" ref="tablaData">
                                <div ref="title2" class="row" hidden>
                                    <div class="col-sm-12 col-lg-12 text-left" style="padding: 1px 1px 1px 25px;">
                                        <h2>Riesgos Ambientales por Hogares ({{ente}})</h2><br>
                                        <h3>{{titulo2}}</h3>
                                    </div>
                                </div>
                                <div class="col-sm-12" style="padding-left: 20px; padding-top: 20px">
                                    <h2> Numero de hogares por nivel de riesgo</h2>
                                </div>
                                <div class="col-sm-12 col-lg-12 borderbottomright" style="padding: 20px; height: 400px">
                                    <table class="table_data" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th>Riesgo</th> 
                                                <th>Alto</th> 
                                                <th>Medio</th> 
                                                <th>Bajo</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Riesgos de Derrumbes</td>
                                                <td>{{seriesRDerrumbe[0]}} - Hogares</td>
                                                <td>{{seriesRDerrumbe[1]}} - Hogares</td>
                                                <td>{{seriesRDerrumbe[2]}} - Hogares</td>
                                            </tr>
                                            <tr>
                                                <td>Riesgos de Inundación </td>
                                                <td>{{seriesRInundacion[0]}} - Hogares</td>
                                                <td>{{seriesRInundacion[1]}} - Hogares</td>
                                                <td>{{seriesRInundacion[2]}} - Hogares</td>
                                            </tr>
                                            <tr>
                                                <td>Riesgos de Insalubridad </td>
                                                <td>{{seriesRInsalubridad[0]}} - Hogares</td>
                                                <td>{{seriesRInsalubridad[1]}} - Hogares</td>
                                                <td>{{seriesRInsalubridad[2]}} - Hogares</td>
                                            </tr>
                                            <tr>
                                                <td>Riesgo Atmosferico </td>
                                                <td>{{seriesRAtmosferico[0]}} - Hogares</td>
                                                <td>{{seriesRAtmosferico[1]}} - Hogares</td>
                                                <td>{{seriesRAtmosferico[2]}} - Hogares</td>
                                            </tr>
                                            <tr>
                                                <td>Riesgo Recurso suelo </td>
                                                <td>{{seriesRRecursoSuelo[0]}} - Hogares</td>
                                                <td>{{seriesRRecursoSuelo[1]}} - Hogares</td>
                                                <td>{{seriesRRecursoSuelo[2]}} - Hogares</td>
                                            </tr>
                                            <tr>
                                                <td>Riesgo por quemas o incendio</td>
                                                <td>{{seriesRQuemaIncendio[0]}} - Hogares</td>
                                                <td>{{seriesRQuemaIncendio[1]}} - Hogares</td>
                                                <td>{{seriesRQuemaIncendio[2]}} - Hogares</td>
                                            </tr>
                                            <tr>
                                                <td>Riesgo Auditivo</td>
                                                <td>{{seriesRAuditivo[0]}} - Hogares</td>
                                                <td>{{seriesRAuditivo[1]}} - Hogares</td>
                                                <td>{{seriesRAuditivo[2]}} - Hogares</td>
                                            </tr>
                                            <tr>
                                                <td>Riesgo Recurso Hidrico</td>
                                                <td>{{seriesRRecursoHidrico[0]}} - Hogares</td>
                                                <td>{{seriesRRecursoHidrico[1]}} - Hogares</td>
                                                <td>{{seriesRRecursoHidrico[2]}} - Hogares</td>
                                            </tr>
                                            <tr>
                                                <td>Acceso a Agua Segura</td>
                                                <td>{{seriesRAccesoAgua[0]}} - Hogares</td>
                                                <td>{{seriesRAccesoAgua[1]}} - Hogares</td>
                                                <td>{{seriesRAccesoAgua[2]}} - Hogares</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <b-modal
          ref="modalDetalles"
          hide-footer
          :title=tituloModal
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
                <div class="col-md-6 col-lg-6"></div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <div class="table-responsive" style="height: 350px;">
                    <div class="container">
                        <h3 class="p-3 text-center">Detalle de los hogares</h3>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Idenfificacion</th>
                                    <th>Jefe Hogar</th>
                                    <th>Direccion</th>
                                    <th>Riesgo I</th>
                                    <th>Riesgo R</th>
                                    <th>Opción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in datosFiltrados" :key="item.identificacion">
                                    <td>{{item.identificacion}}</td>
                                    <td>{{item.jefehogar}}</td>
                                    <td>{{item.direccion}}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-6 col-lg-6">
                                                {{item.riesgoI}} / {{item.valorM}} 
                                            </div>
                                            <div class="col-md-6 col-lg-6">
                                                <span :class=item.colorI> {{item.valoracionI}} </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col-2">
                                                {{item.riesgoC}}
                                            </div>
                                            <div class="col-2">
                                               - 
                                            </div>
                                            <div class="col-2">
                                                <span :class=item.colorR> {{item.valoracionR}} </span>
                                            </div>
                                            <div class="col-6"></div>
                                        </div>
                                    </td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        <div v-if="item.valoracionI != 'Bajo'">
                                            <button @click="buscarValoresRiesgos(item.id_hogar)" type="button" title="Controles" class="btn btn-icon btn-sm btn-success">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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

        <!--begin::Modal DETALLES AMBIENTALES-->
        <b-modal
          ref="modalDetAmb"
          hide-footer
          title="Detalles de los riesgos ambientales"
          size="xl"
          centered
          header-bg-variant="danger"
          header-text-variant="light"
          :no-close-on-backdrop="true"
        >
          <div class="d-block">
            <div class="form-group row">
              <div class="col-md-12">
                  <center>
                    <p>
                      <span class="kt-font-boldest text" style="font-size: 18px;">{{textoDetalleAmbiental}}</span>
                    </p>
                  </center>                
              </div>
            </div>
            <div class="">
              <div class="form-group row">
                <div class="col-md-2">
                  <div class="table-responsive">
                    <table class="table table-sm table-hover">
                        <thead>
                          <tr class="kt-bg-fill-brand">
                              <th style="vertical-align: middle; text-align: center;">R. Inherente</th>
                          </tr>
                        </thead> 
                        <tbody>
                          <tr>                                      
                            <td style="font-weight: bold;vertical-align: middle;text-align: center;">
                              <table class="table table-sm table-hover">
                                <tr>                                  
                                  <td>
                                    <b-button
                                      style='border: none;'
                                      title="Valorización"
                                      id="popover-1"
                                    >                                      
                                      <span style="font-weight: bold;vertical-align: middle;text-align: center;color: red;font-size: 22px;">
                                        {{ datosControlesAmbientales.riesgo_inherente }}
                                      </span>
                                    </b-button>
                                    <b-popover target="popover-1" triggers="hover focus" v-if="datosControlesAmbientales.opci_AM_DE_CON==1">
                                      <template #title>Valorización del Riesgo</template>
                                      <table class="table table-sm table-hover">
                                          <tr>
                                              <td style="font-weight: bold;vertical-align: middle;text-align: center;border: 1px #000 solid;">1 - 3</td>
                                              <td style="font-weight: bold;vertical-align: middle;text-align: center;border: 1px #000 solid;color: red;"> 1</td>
                                          </tr>
                                          <tr>
                                              <td style="font-weight: bold;vertical-align: middle;text-align: center;border: 1px #000 solid;">3 >= 7 </td>
                                              <td style="font-weight: bold;vertical-align: middle;text-align: center;border: 1px #000 solid;color: red;"> 2</td>
                                          </tr>
                                          <tr>
                                              <td style="font-weight: bold;vertical-align: middle;text-align: center;border: 1px #000 solid;">7 >= 10</td>
                                              <td style="font-weight: bold;vertical-align: middle;text-align: center;border: 1px #000 solid;color: red;"> 3</td>
                                          </tr>                
                                      </table>
                                    </b-popover>
                                    <b-popover target="popover-1" triggers="hover focus" v-else>
                                      <template #title>Valorización del Riesgo</template>
                                      <table class="table table-sm table-hover">
                                          <tr>
                                              <td style="font-weight: bold;vertical-align: middle;text-align: center;border: 1px #000 solid;">1 - 5 </td>
                                              <td style="font-weight: bold;vertical-align: middle;text-align: center;border: 1px #000 solid;color: red;"> 1</td>
                                          </tr>
                                          <tr>
                                              <td style="font-weight: bold;vertical-align: middle;text-align: center;border: 1px #000 solid;">5 >= 15 </td>
                                              <td style="font-weight: bold;vertical-align: middle;text-align: center;border: 1px #000 solid;color: red;"> 2</td>
                                          </tr>
                                          <tr>
                                              <td style="font-weight: bold;vertical-align: middle;text-align: center;border: 1px #000 solid;">15 >= 25</td>
                                              <td style="font-weight: bold;vertical-align: middle;text-align: center;border: 1px #000 solid;color: red;"> 3</td>
                                          </tr>                
                                      </table>
                                    </b-popover>                                                                    
                                  </td>
                                </tr>
                                <tr>
                                  <td style="font-weight: bold;vertical-align: middle;text-align: center;text-transform:capitalize;">
                                    <span class="kt-badge kt-badge--inline text-white" :class="datosControlesAmbientales.color_riesgo_inherente">{{ datosControlesAmbientales.valorizacion_riesgo_inherente }}</span>
                                  </td>
                                </tr>                                                      
                              </table>              
                            </td>
                          </tr>      
                        </tbody>
                    </table>
                  </div>                    
                </div>
                <div class="col-md-10">
                  <div class="table-responsive">
                    <table class="table table-sm table-hover" >
                      <thead class>
                        <tr class="kt-bg-fill-brand">
                          <th>Controles</th>
                          <th style="vertical-align: middle;text-align: center;">Tipo</th>
                          <th style="vertical-align: middle;text-align: center;">Peridiocidad</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="item in RI_AM_DE_CON" :value="item.value" :key="item.value">
                          <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">{{ item.controles }}</td>
                          <td style="font-weight: normal;vertical-align: middle;text-align: center;">{{ item.tipo }}</td>
                          <td style="font-weight: normal;vertical-align: middle;text-align: center;">{{ item.peridiocidad }}</td>
                        </tr>
                        <tr>
                          <td style="font-weight: bold;vertical-align: middle;text-align: right;text-transform:capitalize;" colspan="1"></td>
                          <td style="font-weight: bold;vertical-align: middle;text-align: center;text-transform:capitalize;" colspan="1">Prom.</td>
                          <td style="font-weight: bold;vertical-align: middle;text-align: center;color: red;" colspan="1">
                            <b-button
                              style='border: none;'
                              title="Valorización"
                              id="popover-2"
                            >                                      
                              <span style="font-weight: bold;vertical-align: middle;text-align: center;color: red;font-size: 22px;">
                                {{ Math.floor(datosControlesAmbientales.mediaRiesgos * 10)/10 }}
                              </span>
                            </b-button>                            
                            <b-popover target="popover-2" triggers="hover focus">
                              <template #title>Valores</template>
                              <table class="table table-sm table-hover">
                                  <tr>
                                      <td style="font-weight: bold;vertical-align: middle;text-align: center;border: 1px #000 solid;"></td>
                                      <td style="font-weight: bold;vertical-align: middle;text-align: center;border: 1px #000 solid;">Suma</td>
                                      <td style="font-weight: bold;vertical-align: middle;text-align: center;border: 1px #000 solid;">Media</td>
                                  </tr>                                
                                  <tr>
                                      <td style="font-weight: bold;vertical-align: middle;text-align: center;border: 1px #000 solid;">Media del Tipo de Control</td>
                                      <td style="font-weight: bold;vertical-align: middle;text-align: center;border: 1px #000 solid;color: red;">{{ datosControlesAmbientales.sumaTipo }}</td>
                                      <td style="font-weight: bold;vertical-align: middle;text-align: center;border: 1px #000 solid;color: red;">{{ datosControlesAmbientales.mediaTipo }}</td>
                                  </tr>
                                  <tr>
                                      <td style="font-weight: bold;vertical-align: middle;text-align: center;border: 1px #000 solid;">Media de la Peridiocidad del Control</td>
                                      <td style="font-weight: bold;vertical-align: middle;text-align: center;border: 1px #000 solid;color: red;">{{ Math.floor(datosControlesAmbientales.sumaPerid * 10)/10 }}</td>
                                      <td style="font-weight: bold;vertical-align: middle;text-align: center;border: 1px #000 solid;color: red;">{{ Math.floor(datosControlesAmbientales.mediaPerid * 10)/10 }}</td>
                                  </tr>               
                              </table>
                            </b-popover>                            
                          </td>                            
                        </tr>                      
                      </tbody>                     
                    </table>  
                  </div>  
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <div class="table-responsive">
                    <table class="table table-sm table-hover">
                        <thead>
                            <tr class="kt-bg-fill-brand">
                                <th colspan='2' style="vertical-align: middle; text-align: center;">Eficacia del Control</th>
                            </tr>
                        </thead> 
                        <tbody>
                          <tr>
                            <td style="font-weight: bold;vertical-align: middle;text-align: center;">
                              <table class="table table-sm table-hover">
                                <tr>
                                  <td style="font-weight: bold;vertical-align: middle;text-align: center;border: 1px #000 solid;">Inexistente</td>
                                  <td style="font-weight: bold;vertical-align: middle;text-align: center;border: 1px #000 solid;"> 0 </td>
                                </tr>
                                <tr>
                                  <td style="font-weight: bold;vertical-align: middle;text-align: center;border: 1px #000 solid;">Baja</td>
                                  <td style="font-weight: bold;vertical-align: middle;text-align: center;border: 1px #000 solid;"> 3 > 4 </td>
                                </tr>
                                <tr>
                                  <td style="font-weight: bold;vertical-align: middle;text-align: center;border: 1px #000 solid;">Media</td>
                                  <td style="font-weight: bold;vertical-align: middle;text-align: center;border: 1px #000 solid;"> 4 > 9 </td>
                                </tr>
                                <tr>
                                  <td style="font-weight: bold;vertical-align: middle;text-align: center;border: 1px #000 solid;">Alta</td>
                                  <td style="font-weight: bold;vertical-align: middle;text-align: center;border: 1px #000 solid;"> 9 > </td>
                                </tr>                                              
                              </table>              
                            </td>                                    
                            <td style="font-weight: bold;vertical-align: middle;text-align: center;">
                                <table class="table table-sm table-hover">
                                    <tr>
                                        <td style="font-weight: bold;vertical-align: middle;text-align: center;color: red;font-size: 22px;">{{ Math.floor(datosControlesAmbientales.mediaRiesgos * 10)/10 }}</td>
                                    </tr>
                                    <tr>
                                      <td style="font-weight: bold;vertical-align: middle;text-align: center;text-transform:capitalize;">
                                        <span class="kt-badge kt-badge--inline text-white" :class="datosControlesAmbientales.c_eficaciaControl">{{ datosControlesAmbientales.eficaciaControl }}</span>
                                      </td>
                                    </tr>                                                      
                                </table>              
                            </td>
                          </tr>      
                        </tbody>
                    </table>
                  </div>                    
                </div>

                <div class="col-md-4">
                  <div class="table-responsive">
                    <table class="table table-sm table-hover">
                        <thead>
                            <tr class="kt-bg-fill-brand">
                                <th colspan='2' style="vertical-align: middle; text-align: center;">Valorización del Control</th>
                            </tr>
                        </thead> 
                        <tbody>
                          <tr>
                            <td style="font-weight: bold;vertical-align: middle;text-align: center;">
                              <table class="table table-sm table-hover">
                                <tr>
                                  <td style="font-weight: bold;vertical-align: middle;text-align: center;border: 1px #000 solid;">Inexistente</td>
                                  <td style="font-weight: bold;vertical-align: middle;text-align: center;border: 1px #000 solid;"> 0 </td>
                                </tr>
                                <tr>
                                  <td style="font-weight: bold;vertical-align: middle;text-align: center;border: 1px #000 solid;">Baja</td>
                                  <td style="font-weight: bold;vertical-align: middle;text-align: center;border: 1px #000 solid;"> 1 </td>
                                </tr>
                                <tr>
                                  <td style="font-weight: bold;vertical-align: middle;text-align: center;border: 1px #000 solid;">Media</td>
                                  <td style="font-weight: bold;vertical-align: middle;text-align: center;border: 1px #000 solid;"> 2 </td>
                                </tr>
                                <tr>
                                  <td style="font-weight: bold;vertical-align: middle;text-align: center;border: 1px #000 solid;">Alta</td>
                                  <td style="font-weight: bold;vertical-align: middle;text-align: center;border: 1px #000 solid;"> 3 </td>
                                </tr>                                              
                              </table>              
                            </td>                                    
                            <td style="font-weight: bold;vertical-align: middle;text-align: center;">
                                <table class="table table-sm table-hover">
                                    <tr>
                                        <td style="font-weight: bold;vertical-align: middle;text-align: center;color: red;font-size: 22px;">{{ datosControlesAmbientales.v_valorizacionControl }}</td>
                                    </tr>
                                    <tr>
                                      <td style="font-weight: bold;vertical-align: middle;text-align: center;text-transform:capitalize;">
                                        <span class="kt-badge kt-badge--inline text-white" :class="datosControlesAmbientales.c_eficaciaControl">{{ datosControlesAmbientales.eficaciaControl }}</span>
                                      </td>
                                    </tr>                                                      
                                </table>              
                            </td>
                          </tr>      
                        </tbody>
                    </table>
                  </div>                    
                </div>

                <div class="col-md-4">
                  <div class="table-responsive">
                    <table class="table table-sm table-hover">
                        <thead>
                            <tr class="kt-bg-fill-brand">
                                <th colspan='2' style="vertical-align: middle; text-align: center;">Riesgo Residual</th>
                            </tr>
                        </thead> 
                        <tbody>
                          <tr>
                            <td style="font-weight: bold;vertical-align: middle;text-align: center;">
                              <table class="table table-sm table-hover">

                                <tr>
                                  <td style="font-weight: bold;vertical-align: middle;text-align: center;border: 1px #000 solid;">Baja</td>
                                  <td style="font-weight: bold;vertical-align: middle;text-align: center;border: 1px #000 solid;"> 0 - 1 </td>
                                </tr>
                                <tr>
                                  <td style="font-weight: bold;vertical-align: middle;text-align: center;border: 1px #000 solid;">Media</td>
                                  <td style="font-weight: bold;vertical-align: middle;text-align: center;border: 1px #000 solid;"> 1 >= 2 </td>
                                </tr>
                                <tr>
                                  <td style="font-weight: bold;vertical-align: middle;text-align: center;border: 1px #000 solid;">Alta</td>
                                  <td style="font-weight: bold;vertical-align: middle;text-align: center;border: 1px #000 solid;"> 2 >= 3 </td>
                                </tr>                                              
                              </table>              
                            </td>                                    
                            <td style="font-weight: bold;vertical-align: middle;text-align: center;">
                                <table class="table table-sm table-hover">
                                    <tr>
                                        <td style="font-weight: bold;vertical-align: middle;text-align: center;color: red;font-size: 22px;">
                                        <b-button
                                          style='border: none;'
                                          title="Valorización"
                                          id="popover-3"
                                        >                                      
                                          <span style="font-weight: bold;vertical-align: middle;text-align: center;color: red;font-size: 22px;">
                                            {{ datosControlesAmbientales.riesgoResidual }}
                                          </span>
                                        </b-button>
                                        <b-popover target="popover-3" triggers="hover focus">
                                          <template #title>Riesgo Residual</template>
                                          <table class="table table-sm table-hover">
                                              <tr>
                                                  <td style="font-weight: bold;vertical-align: middle;text-align: center;border: 1px #000 solid;">Valorización del Riesgo Inherente</td>
                                                  <td style="font-weight: bold;vertical-align: middle;text-align: center;border: 1px #000 solid;color: red;"> {{ datosControlesAmbientales.valoracion_riesgo_inherente }}</td>
                                              </tr>
                                              <tr>
                                                  <td colspan='2' style="font-weight: bold;vertical-align: middle;text-align: center;border: 1px #000 solid;color: red;">÷</td>
                                              </tr>                                              
                                              <tr>
                                                  <td style="font-weight: bold;vertical-align: middle;text-align: center;border: 1px #000 solid;">Valorización del Control </td>
                                                  <td style="font-weight: bold;vertical-align: middle;text-align: center;border: 1px #000 solid;color: red;"> {{ datosControlesAmbientales.v_valorizacionControl }}</td>
                                              </tr>
                                              <tr>
                                                  <td colspan='2' style="font-weight: bold;vertical-align: middle;text-align: center;border: 1px #000 solid;color: red;"> = </td>
                                              </tr>                                              
                                              <tr>
                                                  <td style="font-weight: bold;vertical-align: middle;text-align: center;border: 1px #000 solid;">Riesgo Residual</td>
                                                  <td style="font-weight: bold;vertical-align: middle;text-align: center;border: 1px #000 solid;color: red;"> {{ datosControlesAmbientales.riesgoResidual }}</td>
                                              </tr>                
                                          </table>
                                        </b-popover>                                          
                                        </td>
                                    </tr>
                                    <tr>
                                      <td style="font-weight: bold;vertical-align: middle;text-align: center;text-transform:capitalize;">
                                        <span class="kt-badge kt-badge--inline text-white" :class="datosControlesAmbientales.colorOpcionValorizacion">{{ datosControlesAmbientales.opcionValorizacion }}</span>
                                      </td>
                                    </tr>                                                      
                                </table>              
                            </td>
                          </tr>      
                        </tbody>
                    </table>
                  </div>                    
                </div>                                              
              </div>  
            </div>  
            <div class="text-right">
              <button type="button" class="btn btn-warning" @click="cerrarModalDetAmb">
                <i class="fa fa-window-close"></i> Cerrar
              </button>               
            </div>                         
          </div>     
        </b-modal>        
        <!--begin::Modal DETALLES AMBIENTALES--> 
    </div>
</template>
<script>
"use strict";
import * as DashboardRiesgosAmbientalesService from "../../Servicios/dashboard_riesgos_ambientales.js";
import * as BarriosService from "../../Servicios/barrios_servicios.js";
import * as CorregimientoService from "../../Servicios/corregimientos_servicios.js";
import * as VeredasService from "../../Servicios/veredas_servicios.js";
import * as caracterizacionServicios from "../../Servicios/caracterizacion_servicios";
import html2pdf from "./html2pdf.js";
import * as usuarioServicios from "../../Servicios/usuarios_servicios";
import Loading from "vue-loading-overlay";
import "vue-loading-overlay/dist/vue-loading.css";


export default {
    mounted() {
        this.listarEstadistica();
        this.listarBarrios();
        this.listarCorregimientos();
        this.listarVeredas();
        this.iniciar();
    },
    components: {
        Loading
    },
    props: [],
    data() {
        return {
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute("content"), 
            titulo2: "",
            ente: "", 
            tipoCombo: "todos",
            verComparativa: false,
            opcion: "",
            RieAmbInh: {
                id_hogar: 0,
                riesgos_derrumbes: 0,
                riesgos_inundacion: 0,
                riesgos_insalubridad: 0,
                riesgos_atmosferico: 0,
                riesgos_recurso_suelo: 0,
                riesgos_quema: 0,
                riesgos_auditivo: 0,
                riesgos_recurso_hidrico: 0,
                riesgos_acceso_agua: 0,
                estado: "",
                id_compania: 0,
                va_riesgos_derrumbes: "",
                va_riesgos_inundacion: "",
                va_riesgos_insalubridad: "",
                va_riesgos_atmosferico: "",
                va_riesgos_recurso_suelo: "",
                va_riesgos_quema: "",
                va_riesgos_auditivo: "",
                va_riesgos_recurso_hidrico: "",
                va_riesgos_acceso_agua: "",

                color_riesgos_derrumbes: "",
                color_riesgos_inundacion: "",
                color_riesgos_insalubridad: "",
                color_riesgos_atmosferico: "",
                color_riesgos_recurso_suelo: "",
                color_riesgos_quema: "",
                color_riesgos_auditivo: "",
                color_riesgos_recurso_hidrico: "",
                color_riesgos_acceso_agua: "",

                control_riesgos_derrumbes: 0,
                control_riesgos_inundacion: 0,
                control_riesgos_insalubridad: 0,
                control_riesgos_atmosferico: 0,
                control_riesgos_recurso_suelo: 0,
                control_riesgos_quema: 0,
                control_riesgos_auditivo: 0,
                control_riesgos_recurso_hidrico: 0,
                control_riesgos_acceso_agua: 0,
                
                color_residual_riesgos_derrumbes: "",
                color_residual_riesgos_inundacion: "",
                color_residual_riesgos_insalubridad: "",
                color_residual_riesgos_atmosferico: "",
                color_riesgos_recurso_suelo: "",
                color_residual_riesgos_quema: "",
                color_residual_riesgos_auditivo: "",
                color_residual_riesgos_recurso_hidrico: "",
                color_residual_riesgos_acceso_agua: "",

                val_residual_riesgos_derrumbes: "",
                val_residual_riesgos_inundacion: "",
                val_residual_riesgos_insalubridad: "",
                val_residual_riesgos_atmosferico: "",
                val_riesgos_recurso_suelo: "",
                val_residual_riesgos_auditivo: "",
                val_residual_riesgos_quema: "",
                val_residual_riesgos_recurso_hidrico: "",
                val_residual_riesgos_acceso_agua: "",
            },
            datosRA: {
                // Riesgos de  Derrumbes
                control_entes_RD: "",
                obras_ingenieria_RD: "",
                proteccion_RD: "",
                zona_vivienda_RD: "",
                cual_RD: "",
                tipo_RD: "",
                // Riesgos de  Derrumbes

                // Riesgos de inundación 
                control_entes_RI: "",
                gaviones_RI: "",
                dragado_RI: "",
                barreras_RI: "",
                zona_vivienda_RI: "",
                cual_RI: "",
                tipo_RI: "",
                // Riesgos de inundación 

                // Riesgos de insalubridad 
                sistema_recoleccion_RIN: "",
                control_entes_RIN: "",
                control_plagas_RIN: "",
                limpieza_RIN: "",
                tipo_tratamiento_RIN: "",
                clasificacion_residuos_RIN: "",
                cual_RIN: "",
                tipo_RIN: "",
                // Riesgos de insalubridad

                // Riesgo atmosferico
                control_entes_RA: "",
                humectacion_RA: "",
                sistema_RA: "",
                concientizacion_RA: "",
                cual_RA: "",
                tipo_RA: "",
                // Riesgo atmosferico

                // Riesgos Recurso suelo
                control_entes_RRS: "",
                concientizacion_RRS: "",
                mantenimiento_RRS: "",
                mantenimiento_solicitado_RRS: "",
                fertilizantes_RRS: "",
                clasificacion_RRS: "",
                cual_RRS: "",
                tipo_RRS: "",
                // Riesgos Recurso suelo

                // Riesgo por quemas o incendio
                control_entes_RQ: "",
                concientizacion_RQ: "",
                bomberos_RQ: "",
                servicio_programado_RQ: "",
                servicio_solicitud_RQ: "",
                aprovechamiento_RQ: "",
                cual_RQ: "",
                tipo_RQ: "",
                // Riesgo por quemas o incendio

                // Riesgo Auditivo
                control_entes_RAU: "",
                regulacion_RAU: "",
                mediciones_RAU: "",
                zona_RAU: "",
                decibeles_RAU: "",
                cual_RAU: "",
                tipo_RAU: "",
                // Riesgo Auditivo

                // Riesgo recurso Hidrico
                control_entes_RRH: "",
                concientizacion_RRH: "",
                manejo_aguas_RRH: "",
                programa_RRH: "",
                control_industrias_RRH: "",
                mantenimiento_RRH: "",
                mantenimiento_captacion_RRH: "",
                cual_RRH: "",
                tipo_RRH: "",
                // Riesgo recurso Hidrico

                // Riesgo Acceso a Agua Segura
                control_entes_RAA: "",
                tratamiento_RAA: "",
                concientizacion_RAA: "",
                sistema_RAA: "",
                programa_RAA: "",
                cual_RRA: "",
                tipo_RRA: "",
                // Riesgo Acceso a Agua Segura
            },
            RI_AM_DE_CON: [],
            datosControlesAmbientales: {
                riesgoResidual: 0,
                opcionValorizacion: "",
                colorOpcionValorizacion: "",
                riesgo_inherente: 0,
                opci_AM_DE_CON: 0,
                valorizacion_riesgo_inherente: "",
                color_riesgo_inherente: "",
                mediaRiesgos: 0,
                eficaciaControl: "",
                c_eficaciaControl: "",
                v_valorizacionControl: 0,
                mediaTipo: 0,
                mediaPerid: 0,
                valoracion_riesgo_inherente: 0
            },
            textoDetalleAmbiental: "",
            tituloModal: "",
            comboBarrio: "",
            barrios: [],
            barriosCorregimiento: [],
            comboBarrio2: "",
            comboCorregimiento: "",
            corregimientos: [],
            comboVereda: "",
            veredas: [],
            datos: {
                estadisticas: [],    
            },
            datosFiltrados: [],
            seriesRDerrumbe: [],
            optionsDerrumbe: {
                chart: {
                    width: 380,
                    type: 'pie',
                    events: {
                        dataPointSelection: (event, chartContext, config) => {
                            this.mostrarModal("Riesgos de Derrumbes", "control_riesgos_derrumbes", "riesgos_derrumbes", "RD")
                        },
                        dataPointMouseEnter: function(event) {
                            event.path[0].style.cursor = "pointer";
                        }
                    }
                },
                title: {
                    text: 'Riesgos de Derrumbes',
                    align: 'left',
                    style: {
                        fontSize:  '20px',
                        fontWeight:  'bold',
                        margin: 10,
                        fontFamily:  'Poppins',
                        color:  '#646c9a'
                    },
                },
                labels: ['Alto', 'Medio', 'Bajo'],
                colors: ["#fd397a", "#ffb822","#0abb87"],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 300
                        },
                        legend: {
                            show: true,
                            showForSingleSeries: true,
                            position: 'bottom',
                        }
                    }
                }]
            },
            seriesRInundacion: [],
            optionsInundacion: {
                chart: {
                    width: 380,
                    type: 'pie',
                    events: {
                        dataPointSelection: (event, chartContext, config) => {
                            this.mostrarModal("Riesgos de Inundación", "control_riesgos_inundacion", "riesgos_inundacion", "RI")
                        },
                        dataPointMouseEnter: function(event) {
                            event.path[0].style.cursor = "pointer";
                        }
                    }
                },
                title: {
                    text: 'Riesgos de Inundación ',
                    align: 'left',
                    style: {
                        fontSize:  '20px',
                        fontWeight:  'bold',
                        margin: 10,
                        fontFamily:  'Poppins',
                        color:  '#646c9a'
                    },
                },
                labels: ['Alto', 'Medio', 'Bajo'],
                colors: ["#fd397a", "#ffb822","#0abb87"],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 300
                        },
                        legend: {
                            show: true,
                            showForSingleSeries: true,
                            position: 'bottom',
                        }
                    }
                }]
            },
            seriesRInsalubridad: [],
            optionsInsalubridad: {
                chart: {
                    width: 380,
                    type: 'pie',
                    events: {
                        dataPointSelection: (event, chartContext, config) => {
                            this.mostrarModal("Riesgos de Insalubridad", "control_riesgos_insalubridad", "riesgos_insalubridad", "RIN")
                        },
                        dataPointMouseEnter: function(event) {
                            event.path[0].style.cursor = "pointer";
                        }
                    }
                },
                title: {
                    text: 'Riesgos de Insalubridad ',
                    align: 'left',
                    style: {
                        fontSize:  '20px',
                        fontWeight:  'bold',
                        margin: 10,
                        fontFamily:  'Poppins',
                        color:  '#646c9a'
                    },
                },
                labels: ['Alto', 'Medio', 'Bajo'],
                colors: ["#fd397a", "#ffb822","#0abb87"],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 300
                        },
                        legend: {
                            show: true,
                            showForSingleSeries: true,
                            position: 'bottom',
                        }
                    }
                }]
            },
            seriesRAtmosferico: [],
            optionsAtmosferico: {
                chart: {
                    width: 380,
                    type: 'pie',
                    events: {
                        dataPointSelection: (event, chartContext, config) => {
                            this.mostrarModal("Riesgo Atmosferico", "control_riesgos_atmosferico", "riesgos_atmosferico", "RA")
                        },
                        dataPointMouseEnter: function(event) {
                            event.path[0].style.cursor = "pointer";
                        }
                    }
                },
                title: {
                    text: 'Riesgo Atmosferico ',
                    align: 'left',
                    style: {
                        fontSize:  '20px',
                        fontWeight:  'bold',
                        margin: 10,
                        fontFamily:  'Poppins',
                        color:  '#646c9a'
                    },
                },
                labels: ['Alto', 'Medio', 'Bajo'],
                colors: ["#fd397a", "#ffb822","#0abb87"],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 300
                        },
                        legend: {
                            show: true,
                            showForSingleSeries: true,
                            position: 'bottom',
                        }
                    }
                }]
            },
            seriesRRecursoSuelo: [],
            optionsRecursoSuelo: {
                chart: {
                    width: 380,
                    type: 'pie',
                    events: {
                        dataPointSelection: (event, chartContext, config) => {
                            this.mostrarModal("Riesgo Recurso suelo", "control_riesgos_recurso_suelo", "riesgos_recurso_suelo", "RRS")
                        },
                        dataPointMouseEnter: function(event) {
                            event.path[0].style.cursor = "pointer";
                        }
                    }
                },
                title: {
                    text: 'Riesgo Recurso suelo ',
                    align: 'left',
                    style: {
                        fontSize:  '20px',
                        fontWeight:  'bold',
                        margin: 10,
                        fontFamily:  'Poppins',
                        color:  '#646c9a'
                    },
                },
                labels: ['Alto', 'Medio', 'Bajo'],
                colors: ["#fd397a", "#ffb822","#0abb87"],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 300
                        },
                        legend: {
                            show: true,
                            showForSingleSeries: true,
                            position: 'bottom',
                        }
                    }
                }]
            },
            seriesRQuemaIncendio: [],
            optionsQuemaIncendio: {
                chart: {
                    width: 380,
                    type: 'pie',
                    events: {
                        dataPointSelection: (event, chartContext, config) => {
                            this.mostrarModal("Riesgo por quemas o incendio", "control_riesgos_quema", "riesgos_quema", "RQ")
                        },
                        dataPointMouseEnter: function(event) {
                            event.path[0].style.cursor = "pointer";
                        }
                    }
                },
                title: {
                    text: 'Riesgo por quemas o incendio',
                    align: 'left',
                    style: {
                        fontSize:  '20px',
                        fontWeight:  'bold',
                        margin: 10,
                        fontFamily:  'Poppins',
                        color:  '#646c9a'
                    },
                },
                labels: ['Alto', 'Medio', 'Bajo'],
                colors: ["#fd397a", "#ffb822","#0abb87"],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 300
                        },
                        legend: {
                            show: true,
                            showForSingleSeries: true,
                            position: 'bottom',
                        }
                    }
                }]
            },
            seriesRAuditivo: [],
            optionsAuditivo: {
                chart: {
                    width: 380,
                    type: 'pie',
                    events: {
                        dataPointSelection: (event, chartContext, config) => {
                            this.mostrarModal("Riesgo Auditivo", "control_riesgos_auditivo", "riesgos_auditivo", "RAU")
                        },
                        dataPointMouseEnter: function(event) {
                            event.path[0].style.cursor = "pointer";
                        }
                    }
                },
                title: {
                    text: 'Riesgo Auditivo',
                    align: 'left',
                    style: {
                        fontSize:  '20px',
                        fontWeight:  'bold',
                        margin: 10,
                        fontFamily:  'Poppins',
                        color:  '#646c9a'
                    },
                },
                labels: ['Alto', 'Medio', 'Bajo'],
                colors: ["#fd397a", "#ffb822","#0abb87"],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 300
                        },
                        legend: {
                            show: true,
                            showForSingleSeries: true,
                            position: 'bottom',
                        }
                    }
                }]
            },
            seriesRRecursoHidrico: [],
            optionsRecursoHidrico: {
                chart: {
                    width: 380,
                    type: 'pie',
                    events: {
                        dataPointSelection: (event, chartContext, config) => {
                            this.mostrarModal("Riesgo Recurso Hidrico", "control_riesgos_recurso_hidrico","riesgos_recurso_hidrico", "RRH")
                        },
                        dataPointMouseEnter: function(event) {
                            event.path[0].style.cursor = "pointer";
                        }
                    }
                },
                title: {
                    text: 'Riesgo Recurso Hidrico',
                    align: 'left',
                    style: {
                        fontSize:  '20px',
                        fontWeight:  'bold',
                        margin: 10,
                        fontFamily:  'Poppins',
                        color:  '#646c9a'
                    },
                },
                labels: ['Alto', 'Medio', 'Bajo'],
                colors: ["#fd397a", "#ffb822","#0abb87"],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 300
                        },
                        legend: {
                            show: true,
                            showForSingleSeries: true,
                            position: 'bottom',
                        }
                    }
                }]
            },
            seriesRAccesoAgua: [],
            optionsAccesoAgua: {
                chart: {
                    width: 380,
                    type: 'pie',
                    events: {
                        dataPointSelection: (event, chartContext, config) => {
                            this.mostrarModal("Acceso a Agua Segura", "control_riesgos_acceso_agua", "riesgos_acceso_agua", "RAA")
                        },
                        dataPointMouseEnter: function(event) {
                            event.path[0].style.cursor = "pointer";
                        }
                    }
                },
                title: {
                    text: 'Acceso a Agua Segura',
                    align: 'left',
                    style: {
                        fontSize:  '20px',
                        fontWeight:  'bold',
                        margin: 10,
                        fontFamily:  'Poppins',
                        color:  '#646c9a'
                    },
                },
                labels: ['Alto', 'Medio', 'Bajo'],
                colors: ["#fd397a", "#ffb822","#0abb87"],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 300
                        },
                        legend: {
                            show: true,
                            showForSingleSeries: true,
                            position: 'bottom',
                        }
                    }
                }]
            },
            seriesComparativa: [],
            chartOptionsComparativa: {
                colors: ["#fd397a", "#ffb822","#0abb87"],
                chart: {
                    type: 'bar',
                    height: 550,
                    stacked: true,
                    stackType: '100%'
                },
                plotOptions: {
                    bar: {
                        horizontal: true,
                    },
                },
                stroke: {
                    width: 1,
                    colors: ['#fff']
                },
                title: {
                    text: 'Comparativa de los diferentes tipos de riesgo',
                    align: 'left',
                    style: {
                        fontSize:  '20px',
                        fontWeight:  'bold',
                        margin: 10,
                        fontFamily:  'Poppins',
                        color:  '#646c9a'
                    },
                },
                xaxis: {
                    categories: ["Riesgos de Derrumbes", "Riesgos de Inundación", "Riesgos de Insalubridad", "Riesgo Atmosferico", "Riesgo Recurso suelo", "Riesgo por quemas o incendio", "Riesgo Auditivo", "Riesgo Recurso Hidrico", "Acceso a Agua Segura"],
                    labels: {
                        formatter: function (val) {
                            return val + "%"
                        },
                        style: {
                            fontSize:  '15px',
                            fontWeight:  'bold',
                            fontFamily:  'Poppins',
                            color:  '#646c9a'
                        },
                    }
                },
                yaxis: {
                    title: {
                        text: undefined
                    },
                    labels: {
                        maxWidth: 350,
                        style: {
                            fontSize:  '15px',
                            fontWeight:  'bold',
                            fontFamily:  'Poppins',
                            color:  '#646c9a'
                        },
                    }
                },
                tooltip: {
                    y: {
                        formatter: function (val) {
                        return val + " Hogares"
                        }
                    }
                },
                fill: {
                opacity: 1
                },
                legend: {
                    position: 'top',
                    horizontalAlign: 'right',
                    offsetX: 40,
                    fontSize:  '15px',
                    fontWeight:  'bold',
                    fontFamily:  'Poppins',
                }
            },
            isLoading: false,
            fullPage: true
        }
    },
    methods: {
        async listarEstadistica() {
            let tipo = "Todos";
            await DashboardRiesgosAmbientalesService.listarEstadistica(tipo, '')
            .then(respuesta => {
                this.seriesRDerrumbe.splice(0);
                this.seriesRInundacion.splice(0);
                this.seriesRInsalubridad.splice(0);
                this.seriesRAtmosferico.splice(0);
                this.seriesRRecursoSuelo.splice(0);
                this.seriesRQuemaIncendio.splice(0);
                this.seriesRAuditivo.splice(0);
                this.seriesRRecursoHidrico.splice(0);
                this.seriesRAccesoAgua.splice(0);

                this.datos = respuesta.data["estadisticas"];  
                this.mapearRiesgos(this.datos, "control_riesgos_derrumbes"); 
                this.mapearRiesgos(this.datos, "control_riesgos_inundacion"); 
                this.mapearRiesgos(this.datos, "control_riesgos_insalubridad"); 
                this.mapearRiesgos(this.datos, "control_riesgos_atmosferico");
                this.mapearRiesgos(this.datos, "control_riesgos_recurso_suelo");
                this.mapearRiesgos(this.datos, "control_riesgos_quema");  
                this.mapearRiesgos(this.datos, "control_riesgos_auditivo"); 
                this.mapearRiesgos(this.datos, "control_riesgos_recurso_hidrico");
                this.mapearRiesgos(this.datos, "control_riesgos_acceso_agua");       
            })
            .catch(err => {
                console.log(err);
            });

            await this.armarSeriesComparativa();
        },
        async mapearRiesgos(array, index) {
            var alto = 0;
            var medio = 0;
            var bajo = 0;
            array.forEach(element => {
                if(element[index] == 0 || element[index] == 1 ){
                    bajo += 1;
                }else{
                    if(element[index] == 2){
                        medio += 1;
                    }else{
                        alto += 1;
                    }
                }
            });

            if(index == "control_riesgos_derrumbes"){
                this.seriesRDerrumbe.push(alto);
                this.seriesRDerrumbe.push(medio);
                this.seriesRDerrumbe.push(bajo);
            } 
            if(index == "control_riesgos_inundacion"){
                this.seriesRInundacion.push(alto);
                this.seriesRInundacion.push(medio);
                this.seriesRInundacion.push(bajo);
            }  
            if(index == "control_riesgos_insalubridad"){
                this.seriesRInsalubridad.push(alto);
                this.seriesRInsalubridad.push(medio);
                this.seriesRInsalubridad.push(bajo);
            } 
            if(index == "control_riesgos_atmosferico"){
                this.seriesRAtmosferico.push(alto);
                this.seriesRAtmosferico.push(medio);
                this.seriesRAtmosferico.push(bajo);
            }
            if(index == "control_riesgos_recurso_suelo"){
                this.seriesRRecursoSuelo.push(alto);
                this.seriesRRecursoSuelo.push(medio);
                this.seriesRRecursoSuelo.push(bajo);
            }
            if(index == "control_riesgos_quema"){
                this.seriesRQuemaIncendio.push(alto);
                this.seriesRQuemaIncendio.push(medio);
                this.seriesRQuemaIncendio.push(bajo);
            }
            if(index == "control_riesgos_auditivo"){
                this.seriesRAuditivo.push(alto);
                this.seriesRAuditivo.push(medio);
                this.seriesRAuditivo.push(bajo);
            }
            if(index == "control_riesgos_recurso_hidrico"){
                this.seriesRRecursoHidrico.push(alto);
                this.seriesRRecursoHidrico.push(medio);
                this.seriesRRecursoHidrico.push(bajo);
            }
            if(index == "control_riesgos_acceso_agua"){
                this.seriesRAccesoAgua.push(alto);
                this.seriesRAccesoAgua.push(medio);
                this.seriesRAccesoAgua.push(bajo);
            }
        },
        async listarBarrios(){
            const parametros = {
                _token: this.csrf,
                id: null,
                opcion: "MUN"
            };
            
            await BarriosService.comboBarrios(parametros).then(respuesta => {
                this.barrios = respuesta.data.arrayBarrios;
            });
            
        },
        async listarBarriosCorregimiento(){
            const parametros = {
                _token: this.csrf,
                id: this.comboCorregimiento,
                opcion: "CORRE"
            };
            
            await BarriosService.comboBarrios(parametros).then(respuesta => {
                this.barriosCorregimiento = respuesta.data.arrayBarrios;
            });
            
        },
        async listarCorregimientos(){
            const parametros = {
                _token: this.csrf,
            };
            
            await CorregimientoService.comboCorregimientos(parametros).then(respuesta => {
                this.corregimientos = respuesta.data.corregimientos;
            });
            
        },
        async listarVeredas(){
            const parametros = {
                _token: this.csrf,
            };
            
            await VeredasService.comboVeredas(parametros).then(respuesta => {
                this.veredas = respuesta.data.veredas;
            });
            
        },
        async mostrarModal(titulo ,riesgoC, riesgoI, opcion){ 
            this.opcion = opcion;
            await this.mapearDatosModal(riesgoC, riesgoI, titulo);
            this.tituloModal = titulo;
            this.$refs.modalDetalles.show();
        },
        async mapearDatosModal(riesgoC, riesgoI, titulo){
            this.datosFiltrados.splice(0);
            this.datos.forEach(element => {
                this.datosFiltrados.push({
                    'id_hogar': element.id_hogar,
                    'identificacion': element.identificacion,
                    'jefehogar': element.pnom+" "+element.pape,
                    'direccion': element.direccion,
                    'riesgoI': element[riesgoI],
                    'riesgoC': element[riesgoC],
                    'valorM': titulo == "Riesgo Auditivo" ? 5 : titulo == "Riesgos de Insalubridad" ? 25 : 10,
                    'valoracionI': this.valoracionI(titulo, parseInt(element[riesgoI]))[0],
                    'colorI':  this.valoracionI(titulo, parseInt(element[riesgoI]))[1],
                    'valoracionR': this.valoracionR(parseInt(element[riesgoC]))[0],
                    'colorR':  this.valoracionR(parseInt(element[riesgoC]))[1],
                });
            });
        },
        valoracionI(titulo, valor){
            var clase = "";
            var valorizacion = "";
            if (titulo == "Riesgos de Insalubridad") {
                if (valor < 5) {
                    valorizacion = "Bajo";
                    clase = "kt-badge kt-badge--inline text-white kt-badge--success";
                } else if (valor >= 5 && valor < 15) {
                    valorizacion = "Medio";
                    clase = "kt-badge kt-badge--inline text-white kt-badge--warning";
                } else {
                    valorizacion = "Alto";
                    clase = "kt-badge kt-badge--inline text-white kt-badge--danger";
                }
               
            } else {
                if (titulo == "Riesgo Auditivo") {
                    if (valor < 1.6) {
                        valorizacion = "Bajo";
                        clase = "kt-badge kt-badge--inline text-white kt-badge--success";
                    } else if (valor >= 1.6 && valor < 3.2) {
                        valorizacion = "Medio";
                        clase = "kt-badge kt-badge--inline text-white kt-badge--warning";
                    } else {
                        valorizacion = "Alto";
                        clase = "kt-badge kt-badge--inline text-white kt-badge--danger";
                    }
                } else {
                    if (valor < 3) {
                        valorizacion = "Bajo";
                        clase = "kt-badge kt-badge--inline text-white kt-badge--success";
                    } else if (valor >= 3 && valor < 7) {
                        valorizacion = "Medio";
                        clase = "kt-badge kt-badge--inline text-white kt-badge--warning";
                    } else {
                        valorizacion = "Alto";
                        clase = "kt-badge kt-badge--inline text-white kt-badge--danger";
                    }
                }
            }
            return  [valorizacion, clase];
        },
        valoracionR(valor){
            var valorizacion = "";
            var clase = "";
            if(valor == 0 || valor == 1){
                valorizacion = "Bajo";
                clase = "kt-badge kt-badge--inline text-white kt-badge--success";
            }
            if(valor == 2){
                valorizacion = "Moderado";
                 clase = "kt-badge kt-badge--inline text-white kt-badge--warning";
            }
            if(valor == 3){
                valorizacion = "Alto";
                clase = "kt-badge kt-badge--inline text-white kt-badge--danger";
            }
            return  [valorizacion, clase];
        },
        async filtrar(tipo) {
            var id ;
            if(tipo == "barrio"){          
                this.comboCorregimiento = "";
                this.comboVereda = "";
                this.comboBarrio2 = "";
                id = this.comboBarrio;
            }
            if(tipo == "corregimiento"){           
                this.comboBarrio = "";
                this.comboVereda = "";
                this.comboBarrio2 = "";
                id = this.comboCorregimiento;
                this.listarBarriosCorregimiento();
            }
            if(tipo == "vereda"){   
                this.comboCorregimiento = "";
                this.comboBarrio = "";
                this.comboBarrio2 = "";
                id = this.comboVereda;
            }
            if(tipo == "barrio2"){       
                tipo = "barrio";
                this.comboVereda = "";
                this.comboBarrio = "";
                id = this.comboBarrio2;

                if(this.comboBarrio2 == ""){
                    tipo = "corregimiento";
                    id = this.comboCorregimiento;
                }
            }
            
            if(this.comboVereda == "" && this.comboBarrio == "" && this.comboCorregimiento == "" && this.comboBarrio2 == ""){
                tipo = "Todos";
            }
            await DashboardRiesgosAmbientalesService.listarEstadistica(tipo, id)
            .then(respuesta => {
                //limpiar arrays de donas
                this.seriesRDerrumbe.splice(0);
                this.seriesRInundacion.splice(0);
                this.seriesRInsalubridad.splice(0);
                this.seriesRAtmosferico.splice(0);
                this.seriesRRecursoSuelo.splice(0);
                this.seriesRQuemaIncendio.splice(0);
                this.seriesRAuditivo.splice(0);
                this.seriesRRecursoHidrico.splice(0);
                this.seriesRAccesoAgua.splice(0);

                this.datos = respuesta.data["estadisticas"];  
                this.mapearRiesgos(this.datos, "control_riesgos_derrumbes"); 
                this.mapearRiesgos(this.datos, "control_riesgos_inundacion"); 
                this.mapearRiesgos(this.datos, "control_riesgos_insalubridad"); 
                this.mapearRiesgos(this.datos, "control_riesgos_atmosferico");
                this.mapearRiesgos(this.datos, "control_riesgos_recurso_suelo");
                this.mapearRiesgos(this.datos, "control_riesgos_quema");  
                this.mapearRiesgos(this.datos, "control_riesgos_auditivo"); 
                this.mapearRiesgos(this.datos, "control_riesgos_recurso_hidrico");
                this.mapearRiesgos(this.datos, "control_riesgos_acceso_agua");       
            })
            .catch(err => {
                console.log(err);
            });

            await this.armarSeriesComparativa();
        },
        cerrarModal() {
            this.$refs.modalDetalles.hide();       
        },
        async buscarValoresRiesgos(idHogar){      
            await DashboardRiesgosAmbientalesService.listarValoresRiesgo(idHogar).then(respuesta => {
                this.RieAmbInh = respuesta.data.riesgos_ambientales;
                if(respuesta.data.ValoresRiesgosAmbientales !== null){
                    this.datosRA = respuesta.data.ValoresRiesgosAmbientales;
                }
               this.detalleControlAmbiental(idHogar);
            });
            
        },
        async detalleControlAmbiental(idHogar) {
            switch (this.opcion) {
            case 'RD':
                this.textoDetalleAmbiental = "Detalle Residual Riesgos de Derrumbes";
                if(this.datosRA.control_entes_RD == ""){
                this.$swal("Error...!","No se ha ejecutado el control","error");
                return;              
                }
                break;
            case 'RI':
                this.textoDetalleAmbiental = "Detalle Residual Riesgos de inundación";
                if(this.datosRA.control_entes_RI == ""){
                this.$swal("Error...!","No se ha ejecutado el control","error");
                return;              
                }            
                break;
            case 'RIN':
                this.textoDetalleAmbiental = "Detalle Residual Riesgos de insalubridad";
                if(this.datosRA.control_entes_RIN == ""){
                this.$swal("Error...!","No se ha ejecutado el control","error");
                return;              
                }             
                break;
            case 'RA':
                this.textoDetalleAmbiental = "Detalle Residual Riesgos atmosfericos";
                if(this.datosRA.control_entes_RA == ""){
                this.$swal("Error...!","No se ha ejecutado el control","error");
                return;              
                }            
                break;
            case 'RRS':
                this.textoDetalleAmbiental = "Detalle Residual Riesgos Recurso suelo";
                if(this.datosRA.control_entes_RRS == ""){
                this.$swal("Error...!","No se ha ejecutado el control","error");
                return;              
                }            
                break;
            case 'RQ':
                this.textoDetalleAmbiental = "Detalle Residual Riesgo por Quemas ó Incendio";
                if(this.datosRA.control_entes_RQ == ""){
                this.$swal("Error...!","No se ha ejecutado el control","error");
                return;              
                }            
                break;
            case 'RAU':
                this.textoDetalleAmbiental = "Detalle Residual Riesgos Auditivos";

                if(this.datosRA.control_entes_RAU == ""){
                this.$swal("Error...!","No se ha ejecutado el control","error");
                return;              
                }            
                break;
            case 'RRH':
                this.textoDetalleAmbiental = "Detalle Residual  Riesgos recursos Hidricos";

                if(this.datosRA.control_entes_RRH == ""){
                this.$swal("Error...!","No se ha ejecutado el control","error");
                return;              
                }            
                break;
            case 'RAA':
                this.textoDetalleAmbiental = "Detalle Residual Riesgos Acceso a Agua Segura ";

                if(this.datosRA.control_entes_RAA == ""){
                this.$swal("Error...!","No se ha ejecutado el control","error");
                return;              
                }            
                break;                                        
            }        
            const parametros = {
                _token: this.csrf,
                datosRA: this.datosRA,
                RieAmbInh: this.RieAmbInh,
                opcion: this.opcion,
                IDHOGAR: idHogar
            };
            
            await caracterizacionServicios
            .DetallesControlAmbiental(parametros)
            .then(respuesta => {
                console.log(respuesta);
                this.RI_AM_DE_CON = respuesta.data.RI_AM_DE_CON;
                this.datosControlesAmbientales = respuesta.data.datos;  
            })
            .catch(error => {
                this.errorDevuelto = error.response.data.errors;
                this.entrarPorError = true;
                this.$swal(
                    "Error...!",
                    "No se pudo acceder a la información",
                    "error"
                );
                return;
            }); 
            
            this.$refs.modalDetAmb.show();
        },
        cerrarModalDetAmb(){
            this.$refs.modalDetAmb.hide();
        },
        cambiaraTodos() {
            if(this.tipoCombo == "todos"){
                this.comboBarrio = "";
                this.comboVereda = "";
                this.comboCorregimiento = "";
                this.comboBarrio2 = "";
                this.listarEstadistica();
            }
        },
        async armarSeriesComparativa(){
            this.seriesComparativa.splice(0);
            this.seriesComparativa.push(
                {
                    name: 'Alto',
                    data: [this.seriesRDerrumbe[0], this.seriesRInundacion[0], this.seriesRInsalubridad[0], this.seriesRAtmosferico[0], this.seriesRRecursoSuelo[0], this.seriesRQuemaIncendio[0], this.seriesRAuditivo[0], this.seriesRRecursoHidrico[0], this.seriesRAccesoAgua[0]]
                },
            );
            this.seriesComparativa.push(
                {
                    name: 'Medio',
                    data: [this.seriesRDerrumbe[1], this.seriesRInundacion[1], this.seriesRInsalubridad[1], this.seriesRAtmosferico[1], this.seriesRRecursoSuelo[1], this.seriesRQuemaIncendio[1], this.seriesRAuditivo[1], this.seriesRRecursoHidrico[1], this.seriesRAccesoAgua[1]]
                },
            );
            this.seriesComparativa.push(
                {
                    name: 'Bajo',
                    data: [this.seriesRDerrumbe[2], this.seriesRInundacion[2], this.seriesRInsalubridad[2], this.seriesRAtmosferico[2], this.seriesRRecursoSuelo[2], this.seriesRQuemaIncendio[2], this.seriesRAuditivo[2], this.seriesRRecursoHidrico[2], this.seriesRAccesoAgua[2]]
                },
            )
        },
        verComparativaF(){
            if(this.verComparativa){
                this.verComparativa = false;
            }else{
                this.verComparativa = true;
            }
        },
        async exportToPDF() {
            this.isLoading = true;
            await this.buscarTitulo2();
            let data = Object.assign({}, this.$refs);
            data.boton1.setAttribute("hidden", "hidden");
            data.boton2.setAttribute("hidden", "hidden");
           
            data.title.removeAttribute("hidden");
            data.title2.removeAttribute("hidden");

           
            html2pdf(data.document, {
                margin: 0.25,
                filename: "document.pdf",
                image: {
                    type: "jpeg",
                    quality: 0.98
                },
                html2canvas: {
                    dpi: 400,
                    letterRendering: true
                },
                jsPDF: {
                    unit: "in",
                    format: "a3",
                    orientation: "landscape"
                }
            })
            
            
            data.title.setAttribute("hidden", "hidden");
            data.title2.setAttribute("hidden", "hidden");
            data.boton1.removeAttribute("hidden");
            data.boton2.removeAttribute("hidden");
            this.isLoading = false;
            
        },
        async iniciar() {
            const parametros = {
                _token: this.csrf
            };
            try {
                await usuarioServicios
                    .iniciar(parametros)
                    .then(respuesta => {
                        this.ente = respuesta.data.ente;    
                    })
                    .catch(error => {});
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
        async buscarTitulo2(){
            if(this.tipoCombo == "todos"){
                this.titulo2 = "Todos los Hogares";
            }
            if(this.tipoCombo == "barrio"){
                this.barrios.forEach(element => {
                    if(element.value == this.comboBarrio){
                        this.titulo2 = "Barrio ("+element.texto+")";
                    }
                });
            }
            if(this.tipoCombo == "corregimiento"){
                this.corregimientos.forEach(element => {
                    if(element.id == this.comboCorregimiento){
                        this.titulo2 = "Corregimiento ("+element.descripcion+")";
                    }
                });
            }
            if(this.tipoCombo == "vereda"){
                this.veredas.forEach(element => {
                    if(element.id == this.comboVereda){
                        this.titulo2 = "Vereda ("+element.descripcion+")";
                    }
                });
            }
            if(this.tipoCombo == "barrio2"){
                this.corregimientos.forEach(element => {
                    if(element.id == this.comboCorregimiento){
                        this.titulo2 = "Corregimiento ("+element.descripcion+")";
                    }
                });
                this.barriosCorregimiento.forEach(element => {
                    if(element.value == this.comboBarrio2){
                        this.titulo2 += " - Barrio ("+element.texto+")";
                    }
                });
            }
        },
        onCancel () {

        }
    },
    beforeDestroy() {}
}
</script>

<style>
.redondo {
    border-radius: 0px 0px 25px 25px;
}

.redondo-2 {
    border-radius: 25px 25px 0px 0px;
}

.deabjohaciaarriba {
    writing-mode: vertical-rl;
    text-orientation: use-glyph-orientation;
    transform: rotate(0.5turn);
}

.borderbottomright {
    border-top-left-radius: 20px;
    border-bottom-left-radius: 20px;
    border-bottom-right-radius: 20px;
}  

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

.table_data {
    width: 100%;
    font-size: 17px;
    border-collapse: collapse;
}

.table_data thead {
    padding: 0.3em;
    color: #fff;
    background: #5578eb;
}

.table_data thead tr th, .table_data tbody tr td {
    text-align: left;
    vertical-align: top;
    padding: 0.3em;
    caption-side: bottom;
}


.table_data tbody tr:nth-child(odd) {
    background-color: #fff;
}

.table_data tbody tr:nth-child(even) {
    background-color: #f1f1f1;
}

</style>