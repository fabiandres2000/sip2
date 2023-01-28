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
                            <button @click="exportToPDFV()" class="btn btn-danger"><i class="fa fa-file" aria-hidden="true"></i> Exportar PDF</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-4 text-center" ref="porcen1">
                <br>
                <h4>HOGARES CON ALTO RIESGOS EN SALUD</h4>
                <br>
                <h6 style="padding: 5px">Hogares con más de 50% de sus de sus integrantes presentan riesgos altos en salud</h6>
                <circle-progress
                    stroke-bg-color = "#e3e2e1"
                    :r="80" 
                    :stroke-width="12"  
                    :stroke-color="porcen_hogares_alto_riesgo_salud < 20 ? '#1abf03': porcen_hogares_alto_riesgo_salud>= 20  && porcen_hogares_alto_riesgo_salud < 60 ? '#f2ce1a' : '#f2451a'" 
                    :percentage="Math.floor(porcen_hogares_alto_riesgo_salud * 10) / 10"> 
                </circle-progress>
                <br>
                <h4>{{hogares_alto_riesgo_salud}} / {{NumeroHogares}}</h4> 
                <h6><a href="#" @click="verDetalles(1)">Ver detalles</a></h6>
            </div>
            <div class="col-lg-4 text-center" ref="porcen2">
                <br>
                <h4>RIESGO INFANTIL DE DESNUTRICIÓN</h4>
                <br>
                <h6 style="padding: 5px">Hogares que poseen integrantes menores de 12 años con riesgos altos de desnutrición</h6>
                <circle-progress
                    stroke-bg-color = "#e3e2e1"
                    :r="80" 
                    :stroke-width="12"  
                    :stroke-color="riesgos_infantil_desnutricion.porcen_hogares_alto_riesgo_salud_d < 20 ? '#1abf03': riesgos_infantil_desnutricion.porcen_hogares_alto_riesgo_salud_d >= 20  && riesgos_infantil_desnutricion.porcen_hogares_alto_riesgo_salud_d  < 60 ? '#f2ce1a' : '#f2451a'" 
                    :percentage="Math.floor(riesgos_infantil_desnutricion.porcen_hogares_alto_riesgo_salud_d  * 10) / 10"> 
                </circle-progress>
                <br>
                <h4>{{riesgos_infantil_desnutricion.hogares_alto_riesgo_salud_d}} / {{riesgos_infantil_desnutricion.NumeroHogares_d}}</h4> 
                <h6><a href="#" @click="verDetalles(2)">Ver detalles</a></h6>
            </div>
            <div class="col-lg-4 text-center" ref="porcen3">
                <br>
                <h4>RIESGO DE DESNUTRICIÓN EN ADULTOS MAYORES</h4>
                <h6 style="padding: 5px">Son los hogares que poseen integrantes menores de 59 años con riesgos altos de desnutrición</h6>
                <circle-progress
                    stroke-bg-color = "#e3e2e1"
                    :r="80" 
                    :stroke-width="12"  
                    :stroke-color="riesgos_adulto_desnutricion.porcen_hogares_alto_riesgo_salud_d < 20 ? '#1abf03': riesgos_adulto_desnutricion.porcen_hogares_alto_riesgo_salud_d >= 20  && riesgos_adulto_desnutricion.porcen_hogares_alto_riesgo_salud_d  < 60 ? '#f2ce1a' : '#f2451a'" 
                    :percentage="Math.floor(riesgos_adulto_desnutricion.porcen_hogares_alto_riesgo_salud_d  * 10) / 10"> 
                </circle-progress>
                <br>
                <h4>{{riesgos_adulto_desnutricion.hogares_alto_riesgo_salud_d}} / {{riesgos_adulto_desnutricion.NumeroHogares_d}}</h4> 
                <h6><a href="#" @click="verDetalles(3)">Ver detalles</a></h6>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 text-center" ref="porcen4">
                <br>
                <h4>HOGARES CON RIESGOS DE CONSUMO DE SPA</h4>
                <br>
                <circle-progress
                    stroke-bg-color = "#e3e2e1"
                    :r="80" 
                    :stroke-width="12"  
                    :stroke-color="consumo_spa.porcen_hogares_alto_riesgo < 20 ? '#1abf03': consumo_spa.porcen_hogares_alto_riesgo >= 20  && consumo_spa.porcen_hogares_alto_riesgo  < 60 ? '#f2ce1a' : '#f2451a'" 
                    :percentage="Math.floor(consumo_spa.porcen_hogares_alto_riesgo  * 10) / 10"> 
                </circle-progress>
                <br>
                <h4>{{consumo_spa.cantidad_hogares_alto}} / {{consumo_spa.numero_hogares}}</h4> 
                <h6><a href="#" @click="verDetalles(4)">Ver detalles</a></h6>
            </div>
            <div class="col-lg-4 text-center" ref="porcen5">
                <br>
                <h4>HOGARES CON RIESGOS DE VIOLENCIA</h4>
                <br>
                <circle-progress
                    stroke-bg-color = "#e3e2e1"
                    :r="80" 
                    :stroke-width="12"  
                    :stroke-color="riesgos_violencia.porcen_hogares_alto_riesgo < 20 ? '#1abf03': riesgos_violencia.porcen_hogares_alto_riesgo >= 20  && riesgos_violencia.porcen_hogares_alto_riesgo  < 60 ? '#f2ce1a' : '#f2451a'" 
                    :percentage="Math.floor(riesgos_violencia.porcen_hogares_alto_riesgo  * 10) / 10"> 
                </circle-progress>
                <br>
                <h4>{{riesgos_violencia.cantidad_hogares_alto}} / {{riesgos_violencia.numero_hogares}}</h4> 
                <h6><a href="#" @click="verDetalles(5)">Ver detalles</a></h6>
            </div>
            <div class="col-lg-4 text-center" ref="porcen6">
                <br>
                <h4>HOGARES CON NIÑOS EN OBESIDAD Y SOBREPESO</h4>
                <circle-progress
                    stroke-bg-color = "#e3e2e1"
                    :r="80" 
                    :stroke-width="12"  
                    :stroke-color="ninios_obesidad.porcen_hogares_alto_riesgo < 20 ? '#1abf03': ninios_obesidad.porcen_hogares_alto_riesgo >= 20  && ninios_obesidad.porcen_hogares_alto_riesgo  < 60 ? '#f2ce1a' : '#f2451a'" 
                    :percentage="Math.floor(ninios_obesidad.porcen_hogares_alto_riesgo  * 10) / 10"> 
                </circle-progress>
                <br>
                <h4>{{ninios_obesidad.cantidad_hogares_alto}} / {{ninios_obesidad.numero_hogares}}</h4> 
                <h6><a href="#" @click="verDetalles(6)">Ver detalles</a></h6>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 text-center" ref="porcen7">
                <br>
                <h4>HOGARES CON  INTEGRANTES MAYORES DE 12 AÑOS EN OBESIDAD Y SOBREPESO</h4>
                <circle-progress
                    stroke-bg-color = "#e3e2e1"
                    :r="80" 
                    :stroke-width="12"  
                    :stroke-color="mayores_obesidad.porcen_hogares_alto_riesgo < 20 ? '#1abf03': mayores_obesidad.porcen_hogares_alto_riesgo >= 20  && mayores_obesidad.porcen_hogares_alto_riesgo  < 60 ? '#f2ce1a' : '#f2451a'" 
                    :percentage="Math.floor(mayores_obesidad.porcen_hogares_alto_riesgo  * 10) / 10"> 
                </circle-progress>
                <br>
                <h4>{{mayores_obesidad.cantidad_hogares_alto}} / {{mayores_obesidad.numero_hogares}}</h4> 
                <h6><a href="#" @click="verDetalles(7)">Ver detalles</a></h6>
            </div>
        </div>
        <b-modal
            ref="detalles1"
            hide-footer
            :title="titulo_detalles"
            size="xl"
            centered
            header-bg-variant="danger"
            header-text-variant="light"
            :no-close-on-backdrop="true"
        >
            <br>
            <div style="height: 400px;width: 100%;overflow-y: auto;">
                <div v-if="tipo_data == 1">
                    <table style="width: 100%;" class="table_data">
                        <thead>
                            <tr>
                                <th>Jefe</th>
                                <th>Corregimiento / Vereda</th>
                                <th>Barrio</th>
                                <th>Direccion</th>
                                <th style="text-align: center"># Integrantes</th>
                                <th style="text-align: center">Integrantes (Riesgo - ALto)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in hogares_Alto">
                                <td>{{item.tipo_id}}: {{item.identificacion}} - {{item.pnom}} {{item.snom}} {{item.pape}} {{item.sape}}</td>
                                <td><span>{{item.des_corr != "" ? item.des_corr : "CASCO URBANO"}}</span></td>
                                <td><span>{{item.des_barrio}}</span></td>
                                <td><span>{{item.des_direc}}</span></td>
                                <td style="text-align: center"><span>{{item.cantidad_personas}}</span></td>
                                <td>
                                    <ul>
                                        <li v-for="item2 in item.riesgos_salud_men1.riesgosSaludAlto">{{item2.tipo_id}}: {{item2.identificacion}} - {{item2.pnom}} {{item2.snom}} {{item2.pape}} {{item2.sape}}</li>
                                        <li v-for="item2 in item.riesgos_salud_de1a5.riesgosSaludAlto">{{item2.tipo_id}}: {{item2.identificacion}} - {{item2.pnom}} {{item2.snom}} {{item2.pape}} {{item2.sape}}</li>
                                        <li v-for="item2 in item.riesgos_salud_de6a11.riesgosSaludAlto">{{item2.tipo_id}}: {{item2.identificacion}} - {{item2.pnom}} {{item2.snom}} {{item2.pape}} {{item2.sape}}</li>
                                        <li v-for="item2 in item.riesgos_salud_de12a17.riesgosSaludAlto">{{item2.tipo_id}}: {{item2.identificacion}} - {{item2.pnom}} {{item2.snom}} {{item2.pape}} {{item2.sape}}</li>
                                        <li v-for="item2 in item.riesgos_salud_de18a28.riesgosSaludAlto">{{item2.tipo_id}}: {{item2.identificacion}} - {{item2.pnom}} {{item2.snom}} {{item2.pape}} {{item2.sape}}</li>
                                        <li v-for="item2 in item.riesgos_salud_de29a59.riesgosSaludAlto">{{item2.tipo_id}}: {{item2.identificacion}} - {{item2.pnom}} {{item2.snom}} {{item2.pape}} {{item2.sape}}</li>
                                        <li v-for="item2 in item.riesgos_salud_de60.riesgosSaludAlto">{{item2.tipo_id}}: {{item2.identificacion}} - {{item2.pnom}} {{item2.snom}} {{item2.pape}} {{item2.sape}}</li>
                                    </ul> 
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div> 
                
                <div v-if="tipo_data == 2">
                    <table style="width: 100%;" class="table_data">
                        <thead>
                            <tr>
                                <th>Jefe</th>
                                <th>Corregimiento / Vereda</th>
                                <th>Barrio</th>
                                <th>Direccion</th>
                                <th style="text-align: center">Integrantes (Riesgo - ALto)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in riesgos_infantil_desnutricion.hogares_Alto_d">
                                <td>{{item.tipo_id}}: {{item.identificacion}} - {{item.pnom}} {{item.snom}} {{item.pape}} {{item.sape}}</td>
                                <td><span>{{item.des_corr != "" ? item.des_corr : "CASCO URBANO"}}</span></td>
                                <td><span>{{item.des_barrio}}</span></td>
                                <td><span>{{item.des_direc}}</span></td>
                                <td>
                                    <ul>
                                        <li v-for="item2 in item.riesgo_men1.riesgosSaludAlto">{{item2.tipo_id}}: {{item2.identificacion}} - {{item2.pnom}} {{item2.snom}} {{item2.pape}} {{item2.sape}}</li>
                                        <li v-for="item2 in item.riesgo_de1a5.riesgosSaludAlto">{{item2.tipo_id}}: {{item2.identificacion}} - {{item2.pnom}} {{item2.snom}} {{item2.pape}} {{item2.sape}}</li>
                                        <li v-for="item2 in item.riesgo_de6a11.riesgosSaludAlto">{{item2.tipo_id}}: {{item2.identificacion}} - {{item2.pnom}} {{item2.snom}} {{item2.pape}} {{item2.sape}}</li>
                                    </ul> 
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>  
                
                <div v-if="tipo_data == 3">
                    <table style="width: 100%;" class="table_data">
                        <thead>
                            <tr>
                                <th>Jefe</th>
                                <th>Corregimiento / Vereda</th>
                                <th>Barrio</th>
                                <th>Direccion</th>
                                <th style="text-align: center">Integrantes (Riesgo - ALto)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in riesgos_adulto_desnutricion.hogares_Alto_d">
                                <td>{{item.tipo_id}}: {{item.identificacion}} - {{item.pnom}} {{item.snom}} {{item.pape}} {{item.sape}}</td>
                                <td><span>{{item.des_corr != "" ? item.des_corr : "CASCO URBANO"}}</span></td>
                                <td><span>{{item.des_barrio}}</span></td>
                                <td><span>{{item.des_direc}}</span></td>
                                <td>
                                    <ul>
                                        <li v-for="item2 in item.riesgo_de12a17.riesgosSaludAlto">{{item2.tipo_id}}: {{item2.identificacion}} - {{item2.pnom}} {{item2.snom}} {{item2.pape}} {{item2.sape}}</li>
                                        <li v-for="item2 in item.riesgo_de18a28.riesgosSaludAlto">{{item2.tipo_id}}: {{item2.identificacion}} - {{item2.pnom}} {{item2.snom}} {{item2.pape}} {{item2.sape}}</li>
                                        <li v-for="item2 in item.riesgo_de29a59.riesgosSaludAlto">{{item2.tipo_id}}: {{item2.identificacion}} - {{item2.pnom}} {{item2.snom}} {{item2.pape}} {{item2.sape}}</li>
                                    </ul> 
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>  

                <div v-if="tipo_data == 4">
                    <table style="width: 100%;" class="table_data">
                        <thead>
                            <tr>
                                <th>Jefe</th>
                                <th>Corregimiento / Vereda</th>
                                <th>Barrio</th>
                                <th>Direccion</th>
                                <th style="text-align: center">Integrantes (Riesgo - ALto)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in consumo_spa.array_hogares_alto">
                                <td>{{item.tipo_id}}: {{item.identificacion}} - {{item.pnom}} {{item.snom}} {{item.pape}} {{item.sape}}</td>
                                <td><span>{{item.des_corr != "" ? item.des_corr : "CASCO URBANO"}}</span></td>
                                <td><span>{{item.des_barrio}}</span></td>
                                <td><span>{{item.des_direc}}</span></td>
                                <td>
                                    <ul>
                                        <li v-for="item2 in item.riesgos_salud_men1.personas_riesgos_alto">{{item2.tipo_id}}: {{item2.identificacion}} - {{item2.pnom}} {{item2.snom}} {{item2.pape}} {{item2.sape}}</li>
                                        <li v-for="item2 in item.riesgos_salud_de1a5.personas_riesgos_alto">{{item2.tipo_id}}: {{item2.identificacion}} - {{item2.pnom}} {{item2.snom}} {{item2.pape}} {{item2.sape}}</li>
                                        <li v-for="item2 in item.riesgos_salud_de6a11.personas_riesgos_alto">{{item2.tipo_id}}: {{item2.identificacion}} - {{item2.pnom}} {{item2.snom}} {{item2.pape}} {{item2.sape}}</li>
                                        <li v-for="item2 in item.riesgos_salud_de12a17.personas_riesgos_alto">{{item2.tipo_id}}: {{item2.identificacion}} - {{item2.pnom}} {{item2.snom}} {{item2.pape}} {{item2.sape}}</li>
                                        <li v-for="item2 in item.riesgos_salud_de18a28.personas_riesgos_alto">{{item2.tipo_id}}: {{item2.identificacion}} - {{item2.pnom}} {{item2.snom}} {{item2.pape}} {{item2.sape}}</li>
                                        <li v-for="item2 in item.riesgos_salud_de29a59.personas_riesgos_alto">{{item2.tipo_id}}: {{item2.identificacion}} - {{item2.pnom}} {{item2.snom}} {{item2.pape}} {{item2.sape}}</li>
                                        <li v-for="item2 in item.riesgos_salud_de60.personas_riesgos_alto">{{item2.tipo_id}}: {{item2.identificacion}} - {{item2.pnom}} {{item2.snom}} {{item2.pape}} {{item2.sape}}</li>
                                    </ul> 
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>  

                <div v-if="tipo_data == 5">
                    <table style="width: 100%;" class="table_data">
                        <thead>
                            <tr>
                                <th>Jefe</th>
                                <th>Corregimiento / Vereda</th>
                                <th>Barrio</th>
                                <th>Direccion</th>
                                <th style="text-align: center">Integrantes (Riesgo - ALto)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in riesgos_violencia.array_hogares_alto">
                                <td>{{item.tipo_id}}: {{item.identificacion}} - {{item.pnom}} {{item.snom}} {{item.pape}} {{item.sape}}</td>
                                <td><span>{{item.des_corr != "" ? item.des_corr : "CASCO URBANO"}}</span></td>
                                <td><span>{{item.des_barrio}}</span></td>
                                <td><span>{{item.des_direc}}</span></td>
                                <td>
                                    <ul>
                                        <li v-for="item2 in item.riesgos_salud_men1.personas_riesgos_alto">{{item2.tipo_id}}: {{item2.identificacion}} - {{item2.pnom}} {{item2.snom}} {{item2.pape}} {{item2.sape}}</li>
                                        <li v-for="item2 in item.riesgos_salud_de1a5.personas_riesgos_alto">{{item2.tipo_id}}: {{item2.identificacion}} - {{item2.pnom}} {{item2.snom}} {{item2.pape}} {{item2.sape}}</li>
                                        <li v-for="item2 in item.riesgos_salud_de6a11.personas_riesgos_alto">{{item2.tipo_id}}: {{item2.identificacion}} - {{item2.pnom}} {{item2.snom}} {{item2.pape}} {{item2.sape}}</li>
                                        <li v-for="item2 in item.riesgos_salud_de12a17.personas_riesgos_alto">{{item2.tipo_id}}: {{item2.identificacion}} - {{item2.pnom}} {{item2.snom}} {{item2.pape}} {{item2.sape}}</li>
                                        <li v-for="item2 in item.riesgos_salud_de18a28.personas_riesgos_alto">{{item2.tipo_id}}: {{item2.identificacion}} - {{item2.pnom}} {{item2.snom}} {{item2.pape}} {{item2.sape}}</li>
                                        <li v-for="item2 in item.riesgos_salud_de29a59.personas_riesgos_alto">{{item2.tipo_id}}: {{item2.identificacion}} - {{item2.pnom}} {{item2.snom}} {{item2.pape}} {{item2.sape}}</li>
                                        <li v-for="item2 in item.riesgos_salud_de60.personas_riesgos_alto">{{item2.tipo_id}}: {{item2.identificacion}} - {{item2.pnom}} {{item2.snom}} {{item2.pape}} {{item2.sape}}</li>
                                    </ul> 
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div> 
                
                <div v-if="tipo_data == 6">
                    <table style="width: 100%;" class="table_data">
                        <thead>
                            <tr>
                                <th>Jefe</th>
                                <th>Corregimiento / Vereda</th>
                                <th>Barrio</th>
                                <th>Direccion</th>
                                <th style="text-align: center">Integrantes con Obesidad o Sobrepeso</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in ninios_obesidad.array_hogares_alto">
                                <td>{{item.tipo_id}}: {{item.identificacion}} - {{item.pnom}} {{item.snom}} {{item.pape}} {{item.sape}}</td>
                                <td><span>{{item.des_corr != "" ? item.des_corr : "CASCO URBANO"}}</span></td>
                                <td><span>{{item.des_barrio}}</span></td>
                                <td><span>{{item.des_direc}}</span></td>
                                <td>
                                    <ul>
                                        <li v-for="item2 in item.men1a.personas_obesidad">{{item2.tipo_id}}: {{item2.identificacion}} - {{item2.pnom}} {{item2.snom}} {{item2.pape}} {{item2.sape}} - Obesidad</li>
                                        <li v-for="item2 in item.de1a5.personas_obesidad">{{item2.tipo_id}}: {{item2.identificacion}} - {{item2.pnom}} {{item2.snom}} {{item2.pape}} {{item2.sape}} - Obesidad</li>
                                        <li v-for="item2 in item.de6a11.personas_obesidad">{{item2.tipo_id}}: {{item2.identificacion}} - {{item2.pnom}} {{item2.snom}} {{item2.pape}} {{item2.sape}} - Obesidad</li>
                                        <li v-for="item2 in item.men1a.personas_sobrepeso">{{item2.tipo_id}}: {{item2.identificacion}} - {{item2.pnom}} {{item2.snom}} {{item2.pape}} {{item2.sape}} - Sobrepeso</li>
                                        <li v-for="item2 in item.de1a5.personas_sobrepeso">{{item2.tipo_id}}: {{item2.identificacion}} - {{item2.pnom}} {{item2.snom}} {{item2.pape}} {{item2.sape}} - Sobrepeso</li>
                                        <li v-for="item2 in item.de6a11.personas_sobrepeso">{{item2.tipo_id}}: {{item2.identificacion}} - {{item2.pnom}} {{item2.snom}} {{item2.pape}} {{item2.sape}} - Sobrepeso</li>
                                    </ul> 
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>  
                <div v-if="tipo_data == 7">
                    <table style="width: 100%;" class="table_data">
                        <thead>
                            <tr>
                                <th>Jefe</th>
                                <th>Corregimiento / Vereda</th>
                                <th>Barrio</th>
                                <th>Direccion</th>
                                <th style="text-align: center">Integrantes con Obesidad o Sobrepeso</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in mayores_obesidad.array_hogares_alto">
                                <td>{{item.tipo_id}}: {{item.identificacion}} - {{item.pnom}} {{item.snom}} {{item.pape}} {{item.sape}}</td>
                                <td><span>{{item.des_corr != "" ? item.des_corr : "CASCO URBANO"}}</span></td>
                                <td><span>{{item.des_barrio}}</span></td>
                                <td><span>{{item.des_direc}}</span></td>
                                <td>
                                    <ul>
                                        <li v-for="item2 in item.de12a17.personas_obesidad">{{item2.tipo_id}}: {{item2.identificacion}} - {{item2.pnom}} {{item2.snom}} {{item2.pape}} {{item2.sape}} - Obesidad</li>
                                        <li v-for="item2 in item.de18a28.personas_obesidad">{{item2.tipo_id}}: {{item2.identificacion}} - {{item2.pnom}} {{item2.snom}} {{item2.pape}} {{item2.sape}} - Obesidad</li>
                                        <li v-for="item2 in item.de29a59.personas_obesidad">{{item2.tipo_id}}: {{item2.identificacion}} - {{item2.pnom}} {{item2.snom}} {{item2.pape}} {{item2.sape}} - Obesidad</li>
                                        <li v-for="item2 in item.de60.personas_obesidad">{{item2.tipo_id}}: {{item2.identificacion}} - {{item2.pnom}} {{item2.snom}} {{item2.pape}} {{item2.sape}} - Obesidad</li>
                                        <li v-for="item2 in item.de12a17.personas_sobrepeso">{{item2.tipo_id}}: {{item2.identificacion}} - {{item2.pnom}} {{item2.snom}} {{item2.pape}} {{item2.sape}} - Sobrepeso</li>
                                        <li v-for="item2 in item.de18a28.personas_sobrepeso">{{item2.tipo_id}}: {{item2.identificacion}} - {{item2.pnom}} {{item2.snom}} {{item2.pape}} {{item2.sape}} - Sobrepeso</li>
                                        <li v-for="item2 in item.de29a59.personas_sobrepeso">{{item2.tipo_id}}: {{item2.identificacion}} - {{item2.pnom}} {{item2.snom}} {{item2.pape}} {{item2.sape}} - Sobrepeso</li>
                                        <li v-for="item2 in item.de60.personas_sobrepeso">{{item2.tipo_id}}: {{item2.identificacion}} - {{item2.pnom}} {{item2.snom}} {{item2.pape}} {{item2.sape}} - Sobrepeso</li>
                                    </ul> 
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>  
            </div>
            <hr>
            <div class="text-right">
                <button @click="exportToPDFHRS()" class="btn btn-danger"><i class="fa fa-file" aria-hidden="true"></i> Exportar PDF</button>
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
            ref="modalpdf"
            hide-footer
            title="Reporte Mercado Laboral"
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
    </div>
</template>
<script>

import * as DashboardServiceSocioeconomico from "../../Servicios/dashboard_socioeconomico_servicios";
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
import * as DashboardServiceRS from "../../Servicios/dashboard_riesgos_salud";


am4core.useTheme(am4themes_animated);
import store from "../../store";

export default {
    components: { CircleProgress, Loading },
    mounted() {
        this.coordenadas();
        this.iniciar();
        this.riesgos_salud_hogares();
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
            hogares_Alto: [],
            NumeroHogares: 0,
            hogares_alto_riesgo_salud: 0,
            porcen_hogares_alto_riesgo_salud: 0,
            hogares: [],
            tipo_data: 0,
            titulo_detalles: "",
            riesgos_infantil_desnutricion: [],
            riesgos_adulto_desnutricion: [],
            consumo_spa: [],
            riesgos_violencia: [],
            ninios_obesidad: [],
            mayores_obesidad: []
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
        async riesgos_salud_hogares() {
            this.isLoading = true;
            await DashboardServiceRS.hogares(this.tipo, this.id_combo).then(respuesta => {
                this.hogares_Alto = respuesta.data.hogares.hogares_Alto; 
                this.NumeroHogares = respuesta.data.hogares.NumeroHogares;
                this.hogares_alto_riesgo_salud = respuesta.data.hogares.hogares_alto_riesgo_salud;
                this.porcen_hogares_alto_riesgo_salud = respuesta.data.hogares.porcen_hogares_alto_riesgo_salud;
                this.hogares = respuesta.data.hogares.hogares;
                this.riesgos_infantil_desnutricion = respuesta.data.riesgos_infantil_desnutricion; 
                this.riesgos_adulto_desnutricion = respuesta.data.riesgos_adulto_desnutricion; 
                this.consumo_spa = respuesta.data.consumo_spa; 
                this.riesgos_violencia = respuesta.data.violencias; 
                this.ninios_obesidad = respuesta.data.obesidad_ninios; 
                this.mayores_obesidad = respuesta.data.obesidad_adultos; 
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
                this.riesgos_salud_hogares();
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

            this.riesgos_salud_hogares();
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
        async exportToPDFHRS(){
            this.isLoading = true;
            // convertir a imagen todos los graficos
            const options = {
                type: 'dataURL',
                useCORS: true,
            }

            // convertir a imagen todos los graficos
            let torta = "";
            let data = [];
            let filtro = {
                bcm:  this.barrios.filter( item => { return item.value ==  this.comboBarrio}),
                bc:  this.barriosCorregimiento.filter( item => { return item.value == this.comboBarrio2 }),
                v:  this.veredas.filter( item => { return item.id == this.comboVereda }),
                c:  this.corregimientos.filter( item => { return item.id == this.comboCorregimiento }),
            };

            if(this.tipo_data == 1){
                torta =  await this.$html2canvas(this.$refs.porcen1, options);
                data = this.hogares_Alto;
            }
            if(this.tipo_data == 2){
                torta =  await this.$html2canvas(this.$refs.porcen2, options);
                data = this.riesgos_infantil_desnutricion.hogares_Alto_d;
            }
            if(this.tipo_data == 3){
                torta =  await this.$html2canvas(this.$refs.porcen3, options);
                data = this.riesgos_adulto_desnutricion.hogares_Alto_d;
            }
            if(this.tipo_data == 4){
                torta =  await this.$html2canvas(this.$refs.porcen4, options);
                data =  this.consumo_spa.array_hogares_alto;
            }
            if(this.tipo_data == 5){
                torta =  await this.$html2canvas(this.$refs.porcen5, options);
                data =  this.riesgos_violencia.array_hogares_alto;
            }
            if(this.tipo_data == 6){
                torta =  await this.$html2canvas(this.$refs.porcen6, options);
                data =  this.ninios_obesidad.array_hogares_alto;
            }
            if(this.tipo_data == 7){
                torta =  await this.$html2canvas(this.$refs.porcen7, options);
                data =  this.mayores_obesidad.array_hogares_alto;
            }

            const parametros = {
                _token: this.csrf,
                data: data,
                grafica: torta,
                filtro: filtro,
                tipo_data: this.tipo_data
            };

            try {
                await DashboardServiceRS.exportarHogares(parametros).then(respuesta => {
                    this.rutaPdf = store.state.apiURL + respuesta.data.nombre;
                    this.isLoading = false;
                    this.$refs.modalpdf.show();
                });
            } catch (error) { 
                this.$swal("Error...!", "Ocurrio un error!", "error");    
                this.isLoading = false;
            }
        },
        verDetalles(tipo){
            this.tipo_data = tipo;
            this.$refs.detalles1.show();
            if(tipo == 1){
                this.titulo_detalles = "HOGARES CON ALTO RIESGOS EN SALUD";
            }
            if(tipo == 2){
                this.titulo_detalles = "HOGARES CON RIESGO INFANTIL DE DESNUTRICIÓN";
            }
            if(tipo == 3){
                this.titulo_detalles = "HOGARES CON RIESGO DE DESNUTRICIÓN EN ADULTOS MAYORES";
            }
            if(tipo == 4){
                this.titulo_detalles = "HOGARES CON RIESGOS DE CONSUMO DE SPA";
            }
            if(tipo == 5){
                this.titulo_detalles = "HOGARES CON RIESGOS DE VIOLENCIA";
            }
            if(tipo == 6){
                this.titulo_detalles = "HOGARES CON NIÑOS EN OBESIDAD Y SOBREPESO";
            }
            if(tipo == 7){
                this.titulo_detalles = "HOGARES CON  INTEGRANTES MAYORES DE 12 AÑOS EN OBESIDAD Y SOBREPESO";
            }
        },
        cerrarModal() {
            this.$refs.modalpdf.hide();
            this.$refs.detalles1.hide();
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

    .table_data {
        width: 100%;
        font-size: 13px;
        border-collapse: collapse;
    }

    .table_data thead {
        padding: 0.3em;
        color: #fff !important;
        background: #5578eb;
    }

    .table_data thead tr th, .table_data tbody tr td {
        text-align: left;
        vertical-align : middle !important;
        padding: 0.3em;
        caption-side: bottom;
    }


    .table_data tbody tr:nth-child(odd) {
        background-color: #fff;
    }

    .table_data tbody tr:nth-child(even) {
        background-color: #f1f1f1;
    }

    .dataTable th {
        color: #ffffff !important;
    }

    .dataTables_paginate span {
        padding-left: 10px;
        padding-right: 10px;
        color: #ffff !important;
    }

    .dataTables_paginate span  a{
        color: #ffff !important;
    }

    .dataTables_filter label input {
        margin-left: 20px
    } 

    .nav-pills, .nav-tabs {
        margin: 0 0 -10px 0 !important;
    }
</style>