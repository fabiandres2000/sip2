<template>
    <div>
        <loading
            :active.sync="isLoading"
            :can-cancel="true"
            loader="dots"
            :height=128
            :width=128
            color="#007bff"
            :is-full-page="true"
        />
        <div ref="document">
            <div class="row">
                <div class="col-lg-12" style="padding: 10px 10px 0px 20px;">
                    <h2>{{ente}}</h2>
                </div>
            </div>
            <div class="row" ref="filtro">
                <div class="col-sm-3 col-lg-3 text-left" style="padding: 10px 10px 10px 20px;">
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
                <div class="col-lg-3">
                    <div class="row" style="padding-top: 14%">
                        <div ref="boton1" class="col-lg-12 text-right" style="padding: 10px 10px 10px 20px;">
                            <button @click="exportToPDFINM()" class="btn btn-danger"><i class="fa fa-file" aria-hidden="true"></i> Exportar PDF</button>
                            <button @click="exportToPDFINMEXCEL()" class="btn btn-success"><i class="fa fa-table" aria-hidden="true"></i> Exportar EXCEL</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" ref="filtro2">
                <div class="col-sm-3 col-lg-3 text-left" style="padding: 10px 10px 10px 20px;">
                    <h4>Seleccione un grupo de edad: </h4>
                    <br/>
                    <select class="form-control" @change="inmunizacion()" v-model="tipoComboGrupoEdad" id="grupoEdad">
                        <option value = "men1a">Menores de 1 Año</option>
                        <option value = "de1a5">1 a 5 Años</option>
                        <option value = "general">General</option>
                    </select>
                </div>
            </div> 
        </div>
        <hr>
        <div v-if="tipoComboGrupoEdad == 'men1a'">
            <div class="row" ref="fila_1_men_1">
                <div class="col-lg-4 text-center">
                    <br>
                    <h4>Niños menores de 1 años <br> sin vacuna BGC</h4>
                    <br>
                    <circle-progress
                        stroke-bg-color = "#e3e2e1"
                        :r="80" 
                        :stroke-width="12"  
                        :stroke-color="inmunizacion_data.sin_bcg_porcentaje < 20 ? '#1abf03': inmunizacion_data.sin_bcg_porcentaje >= 20  && inmunizacion_data.sin_bcg_porcentaje < 60 ? '#f2ce1a' : '#f2451a'"
                        :percentage="Math.floor(inmunizacion_data.sin_bcg_porcentaje* 10) / 10"> 
                    </circle-progress>
                    <br>
                    <h4>{{inmunizacion_data.sin_bcg_numero}} / {{inmunizacion_data.numero_personas}}</h4> 
                    <a v-if="exportando == false" href="#" @click="ver_detalle_inmunizacion(inmunizacion_data.sin_bcg_array, 'Niños menores de 1 años sin vacuna BGC', 1)">Ver Detalles</a>
                </div>
                <div class="col-lg-4 text-center">
                    <br>
                    <h4>Niños menores de 1 años <br> sin vacuna de polio</h4>
                    <br>
                    <circle-progress
                        stroke-bg-color = "#e3e2e1"
                        :r="80" 
                        :stroke-width="12"  
                        :stroke-color="inmunizacion_data.sin_polio_porcentaje < 20 ? '#1abf03': inmunizacion_data.sin_polio_porcentaje >= 20  && inmunizacion_data.sin_polio_porcentaje < 60 ? '#f2ce1a' : '#f2451a'"
                        :percentage="Math.floor(inmunizacion_data.sin_polio_porcentaje* 10) / 10"> 
                    </circle-progress>
                    <br>
                    <h4>{{inmunizacion_data.sin_polio_numero}} / {{inmunizacion_data.numero_personas}}</h4> 
                    <a v-if="exportando == false"  href="#" @click="ver_detalle_inmunizacion(inmunizacion_data.sin_polio_array, 'Niños menores de 1 años sin vacuna de Polio', 2)">Ver Detalles</a>
                </div>
                <div class="col-lg-4 text-center">
                    <br>
                    <h4>Niños menores de 1 años <br> con esquema completo de pentavalente</h4>
                    <br>
                    <circle-progress
                        stroke-bg-color = "#e3e2e1"
                        :r="80" 
                        :stroke-width="12"  
                        :stroke-color="inmunizacion_data.esquema_completo_pentavalente_porcentaje < 20 ? '#1abf03': inmunizacion_data.esquema_completo_pentavalente_porcentaje >= 20  && inmunizacion_data.esquema_completo_pentavalente_porcentaje < 60 ? '#f2ce1a' : '#f2451a'"
                        :percentage="Math.floor(inmunizacion_data.esquema_completo_pentavalente_porcentaje* 10) / 10"> 
                    </circle-progress>
                    <br>
                    <h4>{{inmunizacion_data.esquema_completo_pentavalente_numero}} / {{inmunizacion_data.numero_personas}}</h4> 
                    <a v-if="exportando == false"  href="#" @click="ver_detalle_inmunizacion(inmunizacion_data.esquema_completo_pentavalente_array, 'Niños menores de 1 años con esquema completo de pentavalente', 3)">Ver Detalles</a>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-4 text-center"  ref="fila_2_men_1">
                    <br>
                    <h4>Niños menores de 1 años <br> con esquema incompleto de pentavalente</h4>
                    <br>
                    <circle-progress
                        stroke-bg-color = "#e3e2e1"
                        :r="80" 
                        :stroke-width="12"  
                        :stroke-color="inmunizacion_data.esquema_icompleto_pentavalente_porcentaje < 20 ? '#1abf03': inmunizacion_data.esquema_icompleto_pentavalente_porcentaje >= 20  && inmunizacion_data.esquema_icompleto_pentavalente_porcentaje < 60 ? '#f2ce1a' : '#f2451a'"
                        :percentage="Math.floor(inmunizacion_data.esquema_icompleto_pentavalente_porcentaje* 10) / 10"> 
                    </circle-progress>
                    <br>
                    <h4>{{inmunizacion_data.esquema_icompleto_pentavalente_numero}} / {{inmunizacion_data.numero_personas}}</h4> 
                    <a v-if="exportando == false"  href="#" @click="ver_detalle_inmunizacion(inmunizacion_data.esquema_icompleto_pentavalente_array, 'Niños menores de 1 años con esquema incompleto de pentavalente', 4)">Ver Detalles</a>
                </div>
                <div class="col-lg-4 text-center"  ref="fila_3_men_1">
                    <br>
                    <h4>Niños menores de 1 años <br> con esquema completo de polio</h4>
                    <br>
                    <circle-progress
                        stroke-bg-color = "#e3e2e1"
                        :r="80" 
                        :stroke-width="12"  
                        :stroke-color="inmunizacion_data.esquema_completo_polio_porcentaje < 20 ? '#1abf03': inmunizacion_data.esquema_completo_polio_porcentaje >= 20  && inmunizacion_data.esquema_completo_polio_porcentaje < 60 ? '#f2ce1a' : '#f2451a'"
                        :percentage="Math.floor(inmunizacion_data.esquema_completo_polio_porcentaje* 10) / 10"> 
                    </circle-progress>
                    <br>
                    <h4>{{inmunizacion_data.esquema_completo_polio_numero}} / {{inmunizacion_data.numero_personas}}</h4> 
                    <a v-if="exportando == false"  href="#" @click="ver_detalle_inmunizacion(inmunizacion_data.esquema_completo_polio_array, 'Niños menores de 1 años con esquema completo de polio', 5)">Ver Detalles</a>
                </div>
                <div class="col-lg-4 text-center">
                    <br>
                    <h4>Niños en riesgos de desnutrición con esquema de vacunación incompleto</h4>
                    <div id="chartdiv_desnutricion_incompleto" style="width: 100%; height: 250px"></div>
                    <a v-if="exportando == false"  href="#" @click="ver_detalle_inmunizacion(inmunizacion_data.desnutricion_carnet_desac_array, 'Niños menores de 1 años en riesgos de desnutrición con esquema de vacunación incompleto', 6)">Ver Detalles</a>
                </div>
            </div>
        </div>

        <div v-if="tipoComboGrupoEdad == 'de1a5'">
            <div class="row"  ref="fila1_1a5">
                <div class="col-lg-4 text-center">
                    <br>
                    <h4>Niños de 1 a 5 años <br> con esquema de vacunación incompleto</h4>
                    <br>
                    <circle-progress
                        stroke-bg-color = "#e3e2e1"
                        :r="80" 
                        :stroke-width="12"  
                        :stroke-color="inmunizacion_data.esquema_incompleto_porcentaje < 20 ? '#1abf03': inmunizacion_data.esquema_incompleto_porcentaje >= 20  && inmunizacion_data.esquema_incompleto_porcentaje < 60 ? '#f2ce1a' : '#f2451a'"
                        :percentage="Math.floor(inmunizacion_data.esquema_incompleto_porcentaje* 10) / 10"> 
                    </circle-progress>
                    <br>
                    <h4>{{inmunizacion_data.esquema_incompleto_numero}} / {{inmunizacion_data.numero_personas}}</h4> 
                    <a v-if="exportando == false"  href="#" @click="ver_detalle_inmunizacion_1a5('Niños 1 a 5 años con esquema de vacunación incompleto', 1)">Ver Detalles</a>
                </div>
                <div class="col-lg-4 text-center">
                    <br>
                    <h5>Niños de 1 a 5 años <br> con esquema de (sarampión, Rubeola, Papera) completo</h5>
                    <br>
                    <circle-progress
                        stroke-bg-color = "#e3e2e1"
                        :r="80" 
                        :stroke-width="12"  
                        :stroke-color="inmunizacion_data.esquema_completo_triple_porcentaje < 20 ? '#1abf03': inmunizacion_data.esquema_completo_triple_porcentaje >= 20  && inmunizacion_data.esquema_completo_triple_porcentaje < 60 ? '#f2ce1a' : '#f2451a'"
                        :percentage="Math.floor(inmunizacion_data.esquema_completo_triple_porcentaje* 10) / 10"> 
                    </circle-progress>
                    <br>
                    <h4>{{inmunizacion_data.esquema_completo_triple_numero}} / {{inmunizacion_data.numero_personas}}</h4> 
                    <a v-if="exportando == false"  href="#" @click="ver_detalle_inmunizacion_1a5('Niños 1 a 5 años con esquema de (sarampión - Rubeola - Papera) completo', 2)">Ver Detalles</a>
                </div>
                <div class="col-lg-4 text-center">
                    <br>
                    <h4>Niños de 1 año <br> con esquema de neumococo completo</h4>
                    <br>
                    <circle-progress
                        stroke-bg-color = "#e3e2e1"
                        :r="80" 
                        :stroke-width="12"  
                        :stroke-color="inmunizacion_data.esquema_incompleto_neumococo_porcentaje < 20 ? '#1abf03': inmunizacion_data.esquema_incompleto_neumococo_porcentaje >= 20  && inmunizacion_data.esquema_incompleto_neumococo_porcentaje < 60 ? '#f2ce1a' : '#f2451a'"
                        :percentage="Math.floor(inmunizacion_data.esquema_incompleto_neumococo_porcentaje* 10) / 10"> 
                    </circle-progress>
                    <br>
                    <h4>{{inmunizacion_data.esquema_incompleto_neumococo_numero}} / {{inmunizacion_data.numero_personas_1_anio}}</h4> 
                    <a v-if="exportando == false"  href="#" @click="ver_detalle_inmunizacion_1a5('Niños 1 año con esquema de neumococo completo', 3)">Ver Detalles</a>
                </div>
            </div>
            <br>
            <div class="row"> 
                <div class="col-lg-4 text-center">
                    <br>
                    <h4>Niños de 1 a 5 años <br> Vacuna de Polio</h4>
                    <br>
                    <div id="chartdiv_polio" style="width: 100%; height: 250px"></div>
                    <a v-if="exportando == false" href="#" @click="ver_detalle_inmunizacion_1a5('Niños de 1 a 5 años - Vacuna de Polio', 4)">Ver Detalles</a>
                </div>
                <div class="col-lg-4 text-center">
                    <br>
                    <h4>Niños de 1 a 5 años <br> Vacuna de Pentavalente</h4>
                    <br>
                    <div id="chartdiv_pentavalente" style="width: 100%; height: 250px"></div>
                    <a v-if="exportando == false" href="#" @click="ver_detalle_inmunizacion_1a5('Niños de 1 a 5 años - Vacuna de Pentavalente', 5)">Ver Detalles</a>
                </div>
                <div class="col-lg-4 text-center">
                    <br>
                    <h4>Niños en riesgos de desnutrición con esquema de vacunación incompleto</h4>
                    <br>
                    <div id="chartdiv_desnutricion_incompleto" style="width: 100%; height: 250px"></div>
                    <a v-if="exportando == false"  href="#" @click="ver_detalle_inmunizacion_1a5('Niños de 1 a 5 años en riesgos de desnutrición con esquema de vacunación incompleto', 6)">Ver Detalles</a>
                </div>
            </div>
        </div>

        <b-modal
            ref="modalpdf"
            hide-footer
            title="Reporte Riesgos de Salud - Inmunizacion"
            size="xl"
            centered
            header-bg-variant="danger"
            header-text-variant="light"
            :no-close-on-backdrop="true"
        >
            <embed
                id="divPdf"
                :src="rutaPdf"
                type="application/pdf"
                width="100%"
                height="650px"
            />
            <hr />
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

        <b-modal
            ref="detalle_inmunizacion"
            hide-footer
            :title="titulo_detalle"
            size="xl"
            centered
            header-bg-variant="danger"
            header-text-variant="light"
            :no-close-on-backdrop="true"
        >
            <table style="width: 100%;" class="table_data" id="tabla_detalle_1">
                <thead>
                    <tr>
                        <th>Identificacionn</th>
                        <th>Nombre</th>
                        <th>Edad (Meses)</th>
                        <th>Corregimiento</th> 
                        <th>Barrio</th>
                        <th>Direccion</th>
                        <th v-if="tipo_detalle_men_1 != 6">BCG</th>
                        <th v-if="tipo_detalle_men_1 != 6">Carnet</th>
                        <th v-if="tipo_detalle_men_1 != 6">Pentavalente</th>
                        <th v-if="tipo_detalle_men_1 != 6">Polio</th>
                        <th v-if="tipo_detalle_men_1 == 6">Desnutrición Aguda</th>
                        <th v-if="tipo_detalle_men_1 == 6">Desnutrición Global</th>
                        <th v-if="tipo_detalle_men_1 == 6">Carnet Desactualizado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in data_detalle" v-if="tipo_detalle_men_1 != 6">
                        <td>{{item.tipo_id}}: {{item.identificacion}}</td>
                        <td>{{item.nombre}}</td>
                        <td>{{item.edad}}</td>
                        <td><span>{{item.des_corr != "" ? item.des_corr : "CASCO URBANO"}}</span></td>
                        <td><span>{{item.des_barrio}}</span></td>
                        <td><span>{{item.des_direc}}</span></td>
                        <td><span>{{item.bcg}}</span></td>
                        <td><span>{{item.carnet}}</span></td>
                        <td><span>{{item.pentavalente}}</span></td>
                        <td><span>{{item.polio}}</span></td>
                    </tr>
                    <tr v-for="item in data_detalle" v-if="tipo_detalle_men_1 == 6">
                        <td>{{item.tipo_id}}: {{item.identificacion}}</td>
                        <td>{{item.nombre}}</td>
                        <td>{{item.edad}}</td>
                        <td><span>{{item.des_corr != "" ? item.des_corr : "CASCO URBANO"}}</span></td>
                        <td><span>{{item.des_barrio}}</span></td>
                        <td><span>{{item.des_direc}}</span></td>
                        <td><span>{{item.riesgos_desnutricion_aguda_R == 0 || item.riesgos_desnutricion_aguda_R == 1 ? 'BAJO' : item.riesgos_desnutricion_aguda_R == 2 || item.riesgos_desnutricion_aguda_R == 3 ? 'MODERADO': 'ALTO'}}</span></td>
                        <td><span>{{item.riesgos_desnutricion_global_R == 0 || item.riesgos_desnutricion_global_R == 1 ? 'BAJO' : item.riesgos_desnutricion_global_R == 2 || item.riesgos_desnutricion_global_R == 3 ? 'MODERADO': 'ALTO'}}</span></td>
                        <td><span>Desactualizado</span></td>
                    </tr>
                </tbody>
            </table>
            <hr />
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

        <b-modal
            ref="detalle_inmunizacion_2"
            hide-footer
            :title="titulo_detalle2"
            size="xl"
            centered
            header-bg-variant="danger"
            header-text-variant="light"
            :no-close-on-backdrop="true"
        >
            <table style="width: 100%;" class="table_data" id="tabla_detalle_2">
                <thead>
                    <tr>
                        <th>Identificacionn</th>
                        <th>Nombre</th>
                        <th>Edad (Años)</th>
                        <th>Corregimiento</th> 
                        <th>Barrio</th>
                        <th>Direccion</th>
                        <th v-if="tipo_detalle_1a5 == 1">Carnet</th>
                        <th v-if="tipo_detalle_1a5 == 2">SRP</th>
                        <th v-if="tipo_detalle_1a5 == 3">Neumococo</th>
                        <th v-if="tipo_detalle_1a5 == 4">Polio</th>
                        <th v-if="tipo_detalle_1a5 == 5">Pentavalente</th>
                        <th v-if="tipo_detalle_1a5 == 6">Desnutrición Aguda</th>
                        <th v-if="tipo_detalle_1a5 == 6">Desnutrición Global</th>
                        <th v-if="tipo_detalle_1a5 == 6">Carnet Desactualizado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in array_filtrado">
                        <td>{{item.tipo_id}}: {{item.identificacion}}</td>
                        <td>{{item.nombre}}</td>
                        <td>{{item.edad}}</td>
                        <td><span>{{item.des_corr != "" ? item.des_corr : "CASCO URBANO"}}</span></td>
                        <td><span>{{item.des_barrio}}</span></td>
                        <td><span>{{item.des_direc}}</span></td>
                        <td v-if="tipo_detalle_1a5 == 1"><span>{{item.carnet}}</span></td>
                        <td v-if="tipo_detalle_1a5 == 2"><span>{{item.tripleviral}}</span></td>
                        <td v-if="tipo_detalle_1a5 == 3"><span>{{item.neumococo}}</span></td>
                        <td v-if="tipo_detalle_1a5 == 4"><span>{{item.polio}}</span></td>
                        <td v-if="tipo_detalle_1a5 == 5"><span>{{item.pentavalente}}</span></td>
                        <td v-if="tipo_detalle_1a5 == 6"><span>{{item.riesgos_desnutricion_aguda_R == 0 || item.riesgos_desnutricion_aguda_R == 1 ? 'BAJO' : item.riesgos_desnutricion_aguda_R == 2 || item.riesgos_desnutricion_aguda_R == 3 ? 'MODERADO': 'ALTO'}}</span></td>
                        <td v-if="tipo_detalle_1a5 == 6"><span>{{item.riesgos_desnutricion_global_R == 0 || item.riesgos_desnutricion_global_R == 1 ? 'BAJO' : item.riesgos_desnutricion_global_R == 2 || item.riesgos_desnutricion_global_R == 3 ? 'MODERADO': 'ALTO'}}</span></td>
                        <td v-if="tipo_detalle_1a5 == 6"><span>Desactualizado</span></td>
                    </tr>
                </tbody>
            </table>
            <hr />
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
    </div>
</template>
<script>

import * as DashboardServiceRS from "../../Servicios/dashboard_riesgos_salud";
import CircleProgress from 'vue-pithy-progress/lib/circle-progress.umd.min.js';
import Loading from "vue-loading-overlay";
import * as usuarioServicios from "../../Servicios/usuarios_servicios";
import * as DashboardService from "../../Servicios/dashboard";
import $ from "jquery";
import * as am4core from "@amcharts/amcharts4/core";
import * as am4charts from "@amcharts/amcharts4/charts";
import am4themes_animated from "@amcharts/amcharts4/themes/animated";
import * as BarriosService from "../../Servicios/barrios_servicios.js";
import * as CorregimientoService from "../../Servicios/corregimientos_servicios.js";
import * as VeredasService from "../../Servicios/veredas_servicios.js";

am4core.useTheme(am4themes_animated);
import store from "../../store";

export default {
    components: { CircleProgress, Loading },
    mounted() {
        this.coordenadas();
        this.iniciar();
        this.inmunizacion();
        this.listarBarrios();
        this.listarCorregimientos();
        this.listarVeredas();
    },
    props: [],
    data() {
        return {
            inb: null,
            finalizado: false,
            isLoading: false,
            rutaPdf: "",
            latitud: 0,
            longitud: 0,
            comboBarrio: "",
            barrios: [],
            barriosCorregimiento: [],
            comboBarrio2: "",
            comboCorregimiento: "",
            corregimientos: [],
            comboVereda: "",
            veredas: [],
            tipoCombo: "todos",
            tipo: "todos",
            id_combo: 1,
            ente: "",
            inmunizacion_data: [],
            tipoComboGrupoEdad: "men1a",
            chart_1_men_1: null,
            data_detalle: [],
            titulo_detalle: "", 
            tipo_detalle_men_1: 0,
            exportando: false,
            chart_polio: null,
            chart_pentavalente: null,
            titulo_detalle2: "",
            array_filtrado: [],
            tipo_detalle_1a5: 0
        }
    },
    methods: {
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
        async coordenadas() {
            let data = {
                _token: this.csrf
            };

            await DashboardService.coordenadas(data)
            .then(respuesta => {
                this.latitud = Number(respuesta.data["latitud"]);
                this.longitud = Number(respuesta.data["longitud"]);
            })
            .catch(err => {
                console.log(err);
            });
        },
        async inmunizacion() {
            this.isLoading = true;
            await DashboardServiceRS.inmunizacion(this.tipo, this.id_combo, this.tipoComboGrupoEdad).then(respuesta => {
                this.inmunizacion_data = respuesta.data.inmunizacion_data;
                if(this.tipoComboGrupoEdad == "men1a"){
                    this.grafica_torta_desnutricion_incompleto();
                }else{
                    if(this.tipoComboGrupoEdad == "de1a5"){
                        this.grafica_torta_polio();
                        this.grafica_torta_pentavalente();
                        this.grafica_torta_desnutricion_incompleto();

                    }
                }
                this.isLoading = false;
            })
            .catch(err => {
                console.log(err);
            });
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
        cambiaraTodos() {
            if(this.tipoCombo == "todos"){
                this.tipo = this.tipoCombo;
                this.comboBarrio = "";
                this.comboVereda = "";
                this.comboCorregimiento = "";
                this.comboBarrio2 = "";
                this.inmunizacion();
            }
        },
        async filtrar(tipo_p){
            if(tipo_p == "barrio"){
                this.tipo = "barrio";
                this.comboCorregimiento = "";
                this.comboVereda = "";
                this.comboBarrio2 = "";
                this.id_combo = this.comboBarrio;
            }
            if(tipo_p == "corregimiento"){
                this.tipo = "corre";
                this.comboBarrio = "";
                this.comboVereda = "";
                this.comboBarrio2 = "";
                this.id_combo = this.comboCorregimiento;
                this.listarBarriosCorregimiento();
            }
            if(tipo_p == "vereda"){
                this.tipo = "vereda"
                this.comboCorregimiento = "";
                this.comboBarrio = "";
                this.comboBarrio2 = "";
                this.id_combo = this.comboVereda;
            }
            if(tipo_p == "barrio2"){
                this.tipo = "barrio";
                this.comboVereda = "";
                this.comboBarrio = "";
                this.id_combo = this.comboBarrio2;

                if(this.comboBarrio2 == ""){
                    this.tipo = "corre";
                    this.id_combo = this.comboCorregimiento;
                }
            }
            
            if(this.comboVereda == "" && this.comboBarrio == "" && this.comboCorregimiento == "" && this.comboBarrio2 == ""){
                this.tipo = "todos";
            }

            this.inmunizacion();
        },
        crearDataTable() {
            $("#tabla_tasa_ocupacion").dataTable().fnDestroy();
            setTimeout(() => {
                $('#tabla_tasa_ocupacion').DataTable({
                    "lengthChange": false,
                    "ordering": false,
                    pageLength : 5,
                    language: {
                        "decimal": "",
                        "emptyTable": "No hay información",
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Registros",
                        "infoEmpty": "Mostrando 0 to 0 of 0 Registros",
                        "infoFiltered": "(Filtrado de _MAX_ total Registros)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "lengthMenu": "Mostrar _MENU_ Registros",
                        "loadingRecords": "Cargando...",
                        "processing": "Procesando...",
                        "search": "Buscar:",
                        "zeroRecords": "Sin resultados encontrados",
                        "paginate": {
                            "first": "Primero",
                            "last": "Ultimo",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        }
                    }
                });
            }, 500);
        },
        async exportToPDFINM(){ 
            this.isLoading = true;
            this.exportando = true;

            const options = {
                type: 'dataURL',
                useCORS: true,
            }

            let filtro = {
                bcm:  this.barrios.filter( item => { return item.value ==  this.comboBarrio}),
                bc:  this.barriosCorregimiento.filter( item => { return item.value == this.comboBarrio2 }),
                v:  this.veredas.filter( item => { return item.id == this.comboVereda }),
                c:  this.corregimientos.filter( item => { return item.id == this.comboCorregimiento }),
            };

            let filtro2;

            switch (this.tipoComboGrupoEdad) {
                case "men1a":
                    filtro2= {
                        grupo: "Menores de 1 Año"
                    };
                break;
                case "de1a5":
                    filtro2= {
                        grupo: "De 1 a 5 Años"
                    };
                break;
                default:
                filtro2= {
                        grupo: "Reporte - General"
                    };
                break;
            }

            let graficos;
            let data;

            if(this.tipoComboGrupoEdad == "men1a"){
                graficos = {
                    fila1: await this.$html2canvas(this.$refs.fila_1_men_1, options),
                    fila2: await this.$html2canvas(this.$refs.fila_2_men_1, options),
                    fila3: await this.$html2canvas(this.$refs.fila_3_men_1, options),
                    fila4: await this.chart_1_men_1.exporting.getImage("png")
                }

                data = {
                    sin_bcg_array : this.inmunizacion_data.sin_bcg_array,
                    sin_polio_array : this.inmunizacion_data.sin_polio_array,
                    esquema_completo_polio_array : this.inmunizacion_data.esquema_completo_polio_array,
                    desnutricion_carnet_desac_array : this.inmunizacion_data.desnutricion_carnet_desac_array,
                    esquema_completo_pentavalente_array : this.inmunizacion_data.esquema_completo_pentavalente_array,
                    esquema_icompleto_pentavalente_array : this.inmunizacion_data.esquema_icompleto_pentavalente_array,
                }
            }else{
                if(this.tipoComboGrupoEdad == "de1a5"){
                    graficos = {
                        fila1: await this.$html2canvas(this.$refs.fila1_1a5, options),
                        fila2: await this.chart_polio.exporting.getImage("png"),
                        fila3: await this.chart_pentavalente.exporting.getImage("png"),
                        fila4: await this.chart_1_men_1.exporting.getImage("png")
                    }

                    data = {
                        personas : this.inmunizacion_data.personas,
                        personas_1_anio : this.inmunizacion_data.personas_1_anio,
                    } 
                }
            }

            const parametros = {
                _token: this.csrf,
                filtro: filtro,
                filtro2: filtro2,
                graficos: graficos,
                data: data,
                tipo: this.tipoComboGrupoEdad
            };

            try {
                await DashboardServiceRS.exportToPDFINM(parametros).then(respuesta => {
                    this.rutaPdf = store.state.apiURL + respuesta.data.nombre;
                    this.isLoading = false;
                    this.$refs.modalpdf.show();
                    this.exportando = false;
                });
            } catch (error) { 
                this.$swal("Error...!", "Ocurrio un error!", "error");    
                this.isLoading = false;
            }
            
        },
        async exportToPDFINMEXCEL(){
            this.isLoading = true;
            this.exportando = true;

            const options = {
                type: 'dataURL',
                useCORS: true,
            }

            let filtro = {
                bcm:  this.barrios.filter( item => { return item.value ==  this.comboBarrio}),
                bc:  this.barriosCorregimiento.filter( item => { return item.value == this.comboBarrio2 }),
                v:  this.veredas.filter( item => { return item.id == this.comboVereda }),
                c:  this.corregimientos.filter( item => { return item.id == this.comboCorregimiento }),
            };

            let filtro2;

            switch (this.tipoComboGrupoEdad) {
                case "men1a":
                    filtro2= {
                        grupo: "Menores de 1 Año"
                    };
                break;
                case "de1a5":
                    filtro2= {
                        grupo: "De 1 a 5 Años"
                    };
                break;
                default:
                    filtro2= {
                        grupo: "Reporte - General"
                    };
                break;
            }

            let graficos;
            let data;

            if(this.tipoComboGrupoEdad == "men1a"){
                data = {
                    sin_bcg_array : this.inmunizacion_data.sin_bcg_array,
                    sin_polio_array : this.inmunizacion_data.sin_polio_array,
                    esquema_completo_polio_array : this.inmunizacion_data.esquema_completo_polio_array,
                    desnutricion_carnet_desac_array : this.inmunizacion_data.desnutricion_carnet_desac_array,
                    esquema_completo_pentavalente_array : this.inmunizacion_data.esquema_completo_pentavalente_array,
                    esquema_icompleto_pentavalente_array : this.inmunizacion_data.esquema_icompleto_pentavalente_array,
                }
            }else{
                if(this.tipoComboGrupoEdad == "de1a5"){   
                    var vacunacion_incompleto_array = []
                    this.inmunizacion_data.personas.forEach(element => {
                        if(element.carnet == "DESAC"){
                            vacunacion_incompleto_array.push(element);
                        }
                    });
                    
                    var srp_completo_array = [];
                    this.inmunizacion_data.personas.forEach(element => {
                        if(element.tripleviral == "1R"){
                            srp_completo_array.push(element);
                        }
                    });
                   
                    var neumococo_completo_array = [];
                    this.inmunizacion_data.personas_1_anio.forEach(element => {
                        if(element.neumococo == "R1"){
                            neumococo_completo_array.push(element);
                        }
                    });
                    
                
                    var desn_incompleo_array = [];
                    this.inmunizacion_data.personas.forEach(element => {
                        if(element.carnet == "DESAC" && ((element.riesgos_desnutricion_aguda_R =="4" || element.riesgos_desnutricion_aguda_R =="5") || (element.riesgos_desnutricion_global_R =="4" || element.riesgos_desnutricion_global_R =="5"))){
                            desn_incompleo_array.push(element);
                        }
                    });
                    

                    data = {
                        personas : this.inmunizacion_data.personas,
                        vacunacion_incompleto_array: vacunacion_incompleto_array,
                        srp_completo_array: srp_completo_array,
                        neumococo_completo_array: neumococo_completo_array,
                        desn_incompleo_array: desn_incompleo_array
                    } 
                }
            }

            const parametros = {
                _token: this.csrf,
                filtro: filtro,
                filtro2: filtro2,
                graficos: graficos,
                data: data,
                tipo: this.tipoComboGrupoEdad
            };

            try {
                await DashboardServiceRS.exportToPDFINMEXCEL(parametros).then(respuesta => {
                    let href = store.state.apiURL + respuesta.data.nombre;
                    this.isLoading = false;
                    this.exportando = false;
                    this.downloadItem(href);
                });
            } catch (error) { 
                this.$swal("Error...!", "Ocurrio un error!", "error");    
                this.isLoading = false;
            }
            
        },
        downloadItem (url) {      
            const link = document.createElement('a')
            link.href = url
            link.download = "Riesgo-Salud-Inunizacion.xlsx"
            link.click()
            URL.revokeObjectURL(link.href);
        },
        cerrarModal() {
            this.$refs.detalle_inmunizacion.hide();
            this.$refs.modalpdf.hide();
            this.$refs.detalle_inmunizacion_2.hide();
        },
        async grafica_torta_desnutricion_incompleto() {
            if(this.chart_1_men_1 != null){
                this.chart_1_men_1.dispose();
            }
            var chart = am4core.create("chartdiv_desnutricion_incompleto", am4charts.PieChart3D);
            this.chart_1_men_1 = chart;
            chart.data = [
                {
                    category: "Desnutrición Aguda",
                    first: this.inmunizacion_data.desnutricion_aguda_carnet_desac_numero,
                },
                {
                    category: "Desnutrición Global",
                    first: this.inmunizacion_data.desnutricion_global_carnet_desac_numero,
                }, 
            ];
            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "first";
            series.dataFields.category = "category";

            series.labels.template.fontSize = 12;
            series.labels.template.maxWidth = 100;
            series.labels.template.wrap = true;
        },
        ver_detalle_inmunizacion(array, titulo, tipo){
            this.titulo_detalle = titulo;
            this.data_detalle = array;
            this.tipo_detalle_men_1 = tipo;
            this.$refs.detalle_inmunizacion.show();

            $("#tabla_detalle_1").dataTable().fnDestroy();
            setTimeout(() => {
                $('#tabla_detalle_1').DataTable({
                    "lengthChange": false,
                    "ordering": false,
                    pageLength : 10,
                    language: {
                        "decimal": "",
                        "emptyTable": "No hay información",
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Registros",
                        "infoEmpty": "Mostrando 0 to 0 of 0 Registros",
                        "infoFiltered": "(Filtrado de _MAX_ total Registros)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "lengthMenu": "Mostrar _MENU_ Registros",
                        "loadingRecords": "Cargando...",
                        "processing": "Procesando...",
                        "search": "Buscar:",
                        "zeroRecords": "Sin resultados encontrados",
                        "paginate": {
                            "first": "Primero",
                            "last": "Ultimo",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        }
                    }
                });
            }, 500);
        },
        async grafica_torta_polio(){
            if(this.chart_polio != null){
                this.chart_polio.dispose();
            }
            var chart = am4core.create("chartdiv_polio", am4charts.PieChart3D);
            this.chart_polio = chart;

            chart.data = [
                {
                    category: "Esquema Completo",
                    first: this.inmunizacion_data.esquema_completo_polio_numero,
                },
                {
                    category: "Esquema Incompleto",
                    first: this.inmunizacion_data.esquema_icompleto_polio_numero,
                }, 
            ];
            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "first";
            series.dataFields.category = "category";

            series.labels.template.fontSize = 12;
            series.labels.template.maxWidth = 100;
            series.labels.template.wrap = true;
        },
        async grafica_torta_pentavalente(){
            if(this.chart_pentavalente != null){
                this.chart_pentavalente.dispose();
            }
            var chart = am4core.create("chartdiv_pentavalente", am4charts.PieChart3D);
            this.chart_pentavalente = chart;

            chart.data = [
                {
                    category: "Esquema Completo",
                    first: this.inmunizacion_data.esquema_completo_pentavalente_numero,
                },
                {
                    category: "Esquema Incompleto",
                    first: this.inmunizacion_data.esquema_incompleto_pentavalente_numero,
                }, 
            ];
            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "first";
            series.dataFields.category = "category";

            series.labels.template.fontSize = 12;
            series.labels.template.maxWidth = 100;
            series.labels.template.wrap = true;
        },
        async ver_detalle_inmunizacion_1a5(titulo, tipo){
            this.$refs.detalle_inmunizacion_2.show();
            this.titulo_detalle2 = titulo;
            this.tipo_detalle_1a5 = tipo;
            this.array_filtrado = [];

            if(tipo == 1){
                this.inmunizacion_data.personas.forEach(element => {
                    if(element.carnet == "DESAC"){
                        this.array_filtrado.push(element);
                    }
                });
            }

            if(tipo == 2){
                this.inmunizacion_data.personas.forEach(element => {
                    if(element.tripleviral == "1R"){
                        this.array_filtrado.push(element);
                    }
                });
            }

            if(tipo == 3){
                this.inmunizacion_data.personas_1_anio.forEach(element => {
                    if(element.neumococo == "R1"){
                        this.array_filtrado.push(element);
                    }
                });
            }

            if(tipo == 4 || tipo == 5){
                this.array_filtrado = this.inmunizacion_data.personas;
            }

            if(tipo == 6){
                this.inmunizacion_data.personas.forEach(element => {
                    if(element.carnet == "DESAC" && ((element.riesgos_desnutricion_aguda_R =="4" || element.riesgos_desnutricion_aguda_R =="5") || (element.riesgos_desnutricion_global_R =="4" || element.riesgos_desnutricion_global_R =="5"))){
                        this.array_filtrado.push(element);
                    }
                });
            }

            $("#tabla_detalle_2").dataTable().fnDestroy();
            setTimeout(() => {
                $('#tabla_detalle_2').DataTable({
                    "lengthChange": false,
                    "ordering": false,
                    pageLength : 10,
                    language: {
                        "decimal": "",
                        "emptyTable": "No hay información",
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Registros",
                        "infoEmpty": "Mostrando 0 to 0 of 0 Registros",
                        "infoFiltered": "(Filtrado de _MAX_ total Registros)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "lengthMenu": "Mostrar _MENU_ Registros",
                        "loadingRecords": "Cargando...",
                        "processing": "Procesando...",
                        "search": "Buscar:",
                        "zeroRecords": "Sin resultados encontrados",
                        "paginate": {
                            "first": "Primero",
                            "last": "Ultimo",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        }
                    }
                });
            }, 500);
        }
    }
}
</script>
<style>

.progress-content {
    position: absolute;
    top: 38%;
    font-size: 20px;
    font-weight: bold;
}

</style>