<template>
    <div style="margin-top: 4%" id="divPadre">
        <loading
            :active.sync="isLoading"
            :can-cancel="true"
            loader="dots"
            :height=128
            :width=128
            color="#007bff"
            :is-full-page="true"
        />

        <div class="row" id="divHijo">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-9" style="text-align: left;">
                                <h4>INFORME GENERAL SITUACIÓN EN SALUD POBLACIONAL</h4>
                            </div>
                            <div class="col-sm-3 text-right">
                                <button
                                    type="button"
                                    class="btn btn-danger"
                                    v-on:click="generarPDF"
                                >
                                    <i class="la la-pdf"></i>
                                    <span class="kt-hidden-mobile">Generar PDF</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body" style="text-align: left;">
                        <h4 style="color: #fd397a ">Caracterización</h4>
                        <div class="row" style="padding: 10px">
                            <div v-if="poblacion_array != null" class="col-lg-12" style="padding-bottom: 10px;">
                                <strong>1. Población por ciclo de vida</strong>
                                <p> De acuerdo con la información recolectada, la poblacion caracterizada se compone de la siguiente manera por ciclo de vida:</p>
                            </div>
                            <div v-if="poblacion_array != null" class="col-lg-5">
                                <ul>
                                    <li class="li_li"><strong>Menores de un año: </strong> {{poblacion_array.edades.personas0_1[0]+poblacion_array.edades.personas0_1[1]}} Personas</li>
                                    <li class="li_li"><strong>De 1 a 5 Años: </strong> {{poblacion_array.edades.personas1_5[0]+poblacion_array.edades.personas1_5[1]}} Personas</li>
                                    <li class="li_li"><strong>De 6 a 11 Años: </strong> {{poblacion_array.edades.personas6_11[0]+poblacion_array.edades.personas6_11[1]}} Personas</li>
                                    <li class="li_li"><strong>De 12 a 17 Años: </strong> {{poblacion_array.edades.personas12_17[0]+poblacion_array.edades.personas12_17[1]}} Personas</li>
                                    <li class="li_li"><strong>De 18 a 28 Años: </strong> {{poblacion_array.edades.personas18_28[0]+poblacion_array.edades.personas18_28[1]}} Personas</li>
                                    <li class="li_li"><strong>De 29 a 59 Años: </strong> {{poblacion_array.edades.personas29_59[0]+poblacion_array.edades.personas29_59[1]}} Personas</li>
                                    <li class="li_li"><strong>Mayores de 60 Años </strong> {{poblacion_array.edades.personas60[0]+poblacion_array.edades.personas60[1]}} Personas</li>
                                </ul>
                            </div>
                            <div class="col-lg-7 text-center" style="padding-top: 30px">
                                <div id="chartdiv_edades_torta" style="width: 100%; height: 200px"></div>
                            </div>
                        </div>
                        <div class="row" style="padding: 10px">
                            <div class="col-lg-12">
                                <strong>2. Población menor de 5 años no asegurada</strong> 
                                <p v-if="poblacion_no_asegurada != null">
                                    Dentro de este grupo de edad se tiene una cantidad de <strong>{{ poblacion_no_asegurada.no_asegurado_menor_5.cantidad_personas }} personas</strong>, de las cuales <strong>{{ poblacion_no_asegurada.no_asegurado_menor_5.rural + poblacion_no_asegurada.no_asegurado_menor_5.urbano }} personas</strong>, se encuentran en la situación de población menor de 5 años no asegurada, de lo cual se puede obtener que <strong>{{ poblacion_no_asegurada.no_asegurado_menor_5.rural }} personas</strong> se encuentran en zona rural, y <strong>{{ poblacion_no_asegurada.no_asegurado_menor_5.urbano }} personas</strong>  en zona urbana.
                                </p>
                                <div id="chartdiv_no_asegurado_1" style="width: 100%; height: 270px"></div>
                            </div>
                        </div>
                        <div class="row" style="padding: 10px">
                            <div class="col-lg-12">
                                <strong>3. Población adulto mayor no asegurada </strong> 
                                <p v-if="poblacion_no_asegurada != null">
                                    Dentro de este grupo de edad se tiene una cantidad de <strong>{{ poblacion_no_asegurada.no_asegurado_mayor_60.cantidad_personas }} personas</strong>, de las cuales <strong>{{ poblacion_no_asegurada.no_asegurado_mayor_60.rural + poblacion_no_asegurada.no_asegurado_mayor_60.urbano }} personas</strong>, se encuentran en la situación de población adulto mayor no asegurada, de lo cual se puede obtener que <strong>{{ poblacion_no_asegurada.no_asegurado_mayor_60.rural }} personas</strong> se encuentran en zona rural, y <strong>{{ poblacion_no_asegurada.no_asegurado_mayor_60.urbano }} personas</strong>  en zona urbana.
                                </p>
                                <div id="chartdiv_no_asegurado_2" style="width: 100%; height: 270px"></div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <h4 style="color: #fd397a ">Determinante social de la salud</h4>
                        <div class="row" style="padding: 10px">
                            <div class="col-lg-12">
                                <strong>1. Población en pobreza </strong>
                                <p v-if="determinante_salud_array != null">De acuerdo a la informacion recolectada, se tiene que <strong>{{ determinante_salud_array.pobreza.poblacion_pobreza }} personas</strong> se encuentran en situación de pobreza, esto representa un <strong>{{ determinante_salud_array.pobreza.porcentaje_poblacion_pobreza.toFixed(2) }}%</strong> de la población total.</p>
                                <ul v-if="determinante_salud_array != null">
                                    <li>
                                        Población en pobreza (Rural): <strong>{{ determinante_salud_array.pobreza.poblacion_pobreza_rural }}</strong>
                                    </li>
                                    <li>
                                        Población en pobreza (Urbano): <strong>{{ determinante_salud_array.pobreza.poblacion_pobreza_urbano }}</strong>
                                    </li>
                                </ul>
                                <br>
                                <div id="chartdiv_poblacion_pobreza" style="width: 100%; height: 270px"></div>
                            </div>
                            <div class="col-lg-12">
                                <strong>2. Población por nivel de escolaridad </strong>
                                <p v-if="determinante_salud_array != null">Con una población total de <strong>{{ determinante_salud_array.pobreza.poblacion }} personas</strong> se tiene que: </p>
                                <br>
                                <table class="table_data" v-if="determinante_salud_array != null" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>Nivel de escolaridad</th>
                                            <th>Cantidad de personas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(item, index) in determinante_salud_array.escolaridad" :key="index">
                                            <td>{{ item.escolaridad_nombre }}</td>
                                            <td>{{ item.numero_personas }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <div id="chartdiv_escolaridad" style="width: 100%; height: 300px"></div>
                            </div>    
                        </div>
                        <br>
                        <br>
                        <div class="row" style="padding: 10px">
                            <div class="col-lg-12">
                                <strong>3. Desempleo y tipos de empleo  </strong>
                                <p v-if="determinante_salud_array != null">La tasa de desempleo del total municipal es de <strong>{{ determinante_salud_array.desempleo.TD.toFixed(2) }} %</strong>, lo cual quiere decir que <strong>{{ determinante_salud_array.desempleo.D }} personas </strong>  de <strong>{{ determinante_salud_array.desempleo.FT }} personas </strong> que componen la (fuerza laboral), estan en busca de empleo. </p>
                                <br>
                                <ul v-if="determinante_salud_array != null">
                                    <li>Personas de genero masculino desempleados: <strong>{{ determinante_salud_array.desempleo.masculinoTD }}</strong></li>
                                    <li>Personas de genero femenino desempleados: <strong>{{ determinante_salud_array.desempleo.femeninoTD }}</strong></li>
                                </ul>
                                <br>
                                <p>Tasa de desempleo por sexo:</p>
                                <div id="chartdiv_desempleo" style="width: 100%; height: 270px"></div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row" style="padding: 10px">
                            <strong>4. Acceso a acueducto y alcantarillado</strong>
                            <p v-if="determinante_salud_array != null">Se tiene que <strong>{{ determinante_salud_array.alcantarillado_agua.viendasSinAguaPotable }} Viviendas </strong> se encuentran sin el servicio de agua potable y <strong>{{ determinante_salud_array.alcantarillado_agua.viendasSinalcantarillado }} Viviendas </strong> sin el servicio de alcantarillado, lo que corresponde a un <strong>{{ determinante_salud_array.alcantarillado_agua.porcentajeviendasSinAguaPotable.toFixed(2) }}% </strong> y <strong>{{ determinante_salud_array.alcantarillado_agua.porcentajeviendasSinalcantarillado.toFixed(2) }}% </strong> respectivamente del total de viviendas caracterizadas <strong>({{ determinante_salud_array.alcantarillado_agua.totalViviendas }})</strong> .</p>
                            <br>
                            <div class="col-lg-12 text-center">
                                <h5>Viviendas sin Acceso a Acueducto</h5>
                                <h6>(Por zona)</h6>
                                <div id="chartdiv_acueducto" style="width: 100%; height: 220px"></div>
                            </div>
                            <div class="col-lg-12 text-center">
                                <h5>Viviendas sin Acceso a Alcantarillado</h5>
                                <h6>(Por zona)</h6>
                                <div id="chartdiv_alantarillado" style="width: 100%; height: 220px"></div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <h4 style="color: #fd397a ">Condiciones de salud</h4>
                        <br>
                        <div class="row" style="padding: 10px">
                            <strong>1. Población con enfermedades crónicas</strong>
                            <p v-if="condiciones_salud_array != null">Se tiene que el <strong>{{ condiciones_salud_array.enfermedades_cronicas.porcentaje_personas_con_enfermedades.toFixed(2) }}%</strong> de la población padece al menos una enfermedad cronica, esto quiere decir que <strong>{{ condiciones_salud_array.enfermedades_cronicas.personas_con_enfermedades }} Personas</strong> de <strong>{{ condiciones_salud_array.enfermedades_cronicas.numero_personas }}</strong> padecen enfermedades cronicas, las cuales estan divididas de la siguiente manera: </p>
                            <br>
                            <div class="col-lg-12 text-center">
                                <h5>Personas con enfermedades cronicas</h5>
                                <h6>(Por tipo de enfermedad)</h6>
                                <div id="chartdiv_cronica" style="width: 100%; height: 220px"></div>
                            </div>
                        </div>
                        <div class="row" style="padding: 10px">
                            <strong>2. Población con enfermedades Infecciosas</strong>
                            <p v-if="condiciones_salud_array != null">Se tiene que el <strong>{{ condiciones_salud_array.enfermedades_infecciosas.porcentaje_personas_con_enfermedades.toFixed(2) }}%</strong> de la población padece al menos una enfermedad infecciosa, esto quiere decir que <strong>{{ condiciones_salud_array.enfermedades_infecciosas.personas_con_enfermedades }} Personas</strong> de <strong>{{ condiciones_salud_array.enfermedades_cronicas.numero_personas }}</strong> padecen enfermedades infecciosas, las cuales estan divididas de la siguiente manera: </p>
                            <br>
                            <div class="col-lg-12 text-center">
                                <h5>Personas con enfermedades Infecciosas</h5>
                                <h6>(Por tipo de enfermedad)</h6>
                                <div id="chartdiv_infecciosa" style="width: 100%; height: 220px"></div>
                            </div>
                        </div>
                        <div class="row" style="padding: 10px">
                            <strong>3. Población con discapacidad</strong>
                            <p v-if="condiciones_salud_array != null">El <strong>{{ condiciones_salud_array.personas_discapacidad.porcentaje_personas_con_discapacidad.toFixed(2) }}%</strong> de la población es discapacitada, esto quiere decir que <strong>{{ condiciones_salud_array.personas_discapacidad.personas_con_discapacidad }}</strong> de <strong>{{ condiciones_salud_array.personas_discapacidad.numero_personas }} Personas</strong> padecen algún tipo de discapacidad, ya sea: fisica, auditiva, entre otras. </p>
                            <br>
                            <div class="col-lg-12 text-center">
                                <h5>Personas con Discapacidad</h5>
                                <h6>(Por tipo de discapacidad)</h6>
                                <div id="chartdiv_discapacidad" style="width: 100%; height: 220px"></div>
                            </div>
                        </div>
                        <div class="row" style="padding: 10px">
                            <strong>4. Adolescentes en estado de gestación</strong>
                            <p v-if="condiciones_salud_array != null">Se tiene que, de <strong>{{ condiciones_salud_array.adolescentes_embarazo.embarazadas }} mujeres </strong> en estado de gestación <strong>{{ condiciones_salud_array.adolescentes_embarazo.adolescentes_embarazo }} son adolescentes, </strong>lo cual representa un <strong>{{ condiciones_salud_array.adolescentes_embarazo.porcentaje_adolescentes_embarazadas.toFixed(2) }}%</strong> de las mujeres embarazadas.</p>
                            <br>
                            <div class="col-lg-12 text-center">
                                <h5>Adolescentes en Embarazo</h5>
                                <h6>(Por Zona)</h6>
                                <div id="chartdiv_embarazo" style="width: 100%; height: 220px"></div>
                            </div>
                        </div>
                        <div class="row" style="padding: 10px">
                            <strong>5. Inmunización </strong>
                            <p v-if="condiciones_salud_array != null"><strong>{{ condiciones_salud_array.inmunizacion.porcentaje_carnet_desac.toFixed(2) }}% </strong> de los niños de 0 a 5 años no estan completamente inmunizados, esto quiere decir que <strong>{{ condiciones_salud_array.inmunizacion.carnet_desac }} </strong> de <strong>{{ condiciones_salud_array.inmunizacion.numero_integrantes }} niños</strong> estan sin esquema de vacunación o tienen el esquema incompleto. </p>
                            <br>
                            <div class="col-lg-12 text-center">
                                <h5>Niños no Inmunizados</h5>
                                <h6>(Por Grupo de Edad)</h6>
                                <div id="chartdiv_inmunizacion" style="width: 100%; height: 220px"></div>
                            </div>
                        </div>
                        <div class="row" style="padding: 10px">  
                            <div class="col-lg-12"  v-if="condiciones_salud_array != null">
                                <strong>6. Situación nutricional </strong><br>
                                <strong style="color: #fd397a">6.1 Niños y niñas menores de 5 años de edad (de 0 a 59 meses)</strong><br><br>
                                <p>De un total de <strong>{{ condiciones_salud_array.nutricion.nutricion_0_5.cantidad_ninios }} Niños</strong>, se tiene la siguiente información.</p><br>
                                <strong>6.1.1 Peso para la talla</strong><br>  
                                <ul>
                                    <li>Desnutrición Aguda Moderada: <strong>{{ condiciones_salud_array.nutricion.nutricion_0_5.peso_talla.desnutricion_aguda_moderada }} Niños</strong></li>
                                    <li>Peso Adecuado: <strong>{{ condiciones_salud_array.nutricion.nutricion_0_5.peso_talla.peso_adecuado }} Niños</strong></li>
                                    <li>Desnutrición Aguda Severa: <strong>{{ condiciones_salud_array.nutricion.nutricion_0_5.peso_talla.desnutricion_aguda_severa }} Niños</strong></li>
                                    <li>Riesgo de Desnutrición Aguda: <strong>{{ condiciones_salud_array.nutricion.nutricion_0_5.peso_talla.riesgo_desnutricion_aguda }} Niños</strong></li>
                                </ul> 
                            </div>
                            <br>
                            <br>
                            <div class="col-lg-12 text-center">
                                <h5>GRAFICA DE PESO PARA LA TALLA</h5>
                                <div id="chartdiv_peso_para_talla" style="width: 100%; height: 220px"></div>
                            </div>
                            <br><br>
                            <div class="col-lg-12"  v-if="condiciones_salud_array != null">
                                <br>
                                <strong>6.1.2 Talla para la edad</strong><br><br>
                                <ul>
                                    <li>Talla Adecuada para la Edad: <strong>{{ condiciones_salud_array.nutricion.nutricion_0_5.talla_edad.talla_adecuada }} Niños</strong></li>
                                    <li>Riesgo de Talla Baja: <strong>{{ condiciones_salud_array.nutricion.nutricion_0_5.talla_edad.riesgo_talla_baja }} Niños</strong></li>
                                    <li>Talla Baja para la Edad o Retraso en Talla: <strong>{{ condiciones_salud_array.nutricion.nutricion_0_5.talla_edad.retraso_talla }} Niños</strong></li>
                                </ul> 
                            </div>
                            <div class="col-lg-12 text-center">
                                <h5>GRAFICA DE TALLA PARA LA EDAD</h5>
                                <div id="chartdiv_talla_para_edad" style="width: 100%; height: 220px"></div>
                            </div>
                            <br><br>
                            <div class="col-lg-12"  v-if="condiciones_salud_array != null">
                                <br>
                                <strong>6.1.3 Indice de Masa Corporal (IMC)</strong><br><br>
                                <ul>
                                    <li>Obesidad: <strong>{{ condiciones_salud_array.nutricion.nutricion_0_5.imc.obesidad }} Niños</strong></li>
                                    <li>Sobrepeso: <strong>{{ condiciones_salud_array.nutricion.nutricion_0_5.imc.sobrepeso }} Niños</strong></li>
                                    <li>Riesgo de Sobrepeso: <strong>{{ condiciones_salud_array.nutricion.nutricion_0_5.imc.riesgo_sobrepeso }} Niños</strong></li>
                                    <li>Peso Normal: <strong>{{ condiciones_salud_array.nutricion.nutricion_0_5.imc.peso_normal }} Niños</strong></li>
                                </ul> 
                            </div>
                            <div class="col-lg-12 text-center">
                                <h5>GRAFICA IMC</h5>
                                <div id="chartdiv_imc" style="width: 100%; height: 220px"></div>
                            </div>
                            <div class="col-lg-12"  v-if="condiciones_salud_array != null">
                                <br><br>
                                <strong style="color: #fd397a">6.2 Niñas, niños y adolescentes de 5 a 17 años</strong><br><br>
                                <p>De un total de <strong>{{ condiciones_salud_array.nutricion.nutricion_5_17.cantidad_personas }} personas</strong>, se tiene la siguiente información.</p>
                                <strong>6.2.1 Indice de Masa Corporal</strong><br>
                                <br>
                                <ul>
                                    <li>Obesidad: <strong>{{ condiciones_salud_array.nutricion.nutricion_5_17.imc.obesidad }} Personas</strong></li>
                                    <li>Sobrepeso: <strong>{{ condiciones_salud_array.nutricion.nutricion_5_17.imc.sobrepeso }} Personas</strong></li>
                                    <li>IMC Adecuado para la Edad: <strong>{{ condiciones_salud_array.nutricion.nutricion_5_17.imc.imc_adecuado }} Personas</strong></li>
                                    <li>Riesgo de Delgadez: <strong>{{ condiciones_salud_array.nutricion.nutricion_5_17.imc.riesgo_delgadez }} Personas</strong></li>
                                    <li>Delgadez: <strong>{{ condiciones_salud_array.nutricion.nutricion_5_17.imc.delgadez }} Personas</strong></li>
                                </ul> 
                            </div>
                            <div class="col-lg-12 text-center">
                                <h5>GRAFICA IMC</h5>
                                <div id="chartdiv_imc_5_17" style="width: 100%; height: 220px"></div>
                            </div>
                            <div class="col-lg-12"  v-if="condiciones_salud_array != null">
                                <br><br>
                                <strong>6.2.2 Indice de Masa Corporal (Mujeres Embarazadas - 5 a 17 Años)</strong><br>
                                <br>
                                <ul>
                                    <li>Obesidad para la edad gestacional: <strong>{{ condiciones_salud_array.nutricion.nutricion_5_17.imc_embarazadas.obesidad_gestacional }} Personas</strong></li>
                                    <li>Sobrepeso para la edad gestacional: <strong>{{ condiciones_salud_array.nutricion.nutricion_5_17.imc_embarazadas.sobrepeso_gestacional }} Personas</strong></li>
                                    <li>IMC adecuado para la edad gestacional: <strong>{{ condiciones_salud_array.nutricion.nutricion_5_17.imc_embarazadas.adecuado_gestacional }} Personas</strong></li>
                                    <li>Bajo peso para la edad gestacional: <strong>{{ condiciones_salud_array.nutricion.nutricion_5_17.imc_embarazadas.bajo_peso_gestacional }} Personas</strong></li>
                                </ul> 
                            </div>
                            <div class="col-lg-12 text-center">
                                <h5>GRAFICA IMC</h5>
                                <h6>(Mujeres Embarazadas - 5 a 17 Años)</h6>
                                <div id="chartdiv_imc_5_17_e" style="width: 100%; height: 220px"></div>
                            </div>
                            <div class="col-lg-12"  v-if="condiciones_salud_array != null">
                                <br><br>
                                <strong style="color: #fd397a">6.3 Adultos  mayores de 18 años.</strong><br><br>
                                <p>De un total de <strong>{{ condiciones_salud_array.nutricion.nutricion_18_60.cantidad_personas }} personas</strong>, se tiene la siguiente información.</p>
                                <strong>6.3.1 Indice de Masa Corporal</strong><br>
                                <br>
                                <ul>
                                    <li>Obesidad: <strong>{{ condiciones_salud_array.nutricion.nutricion_18_60.imc.obesidad }} Personas</strong></li>
                                    <li>Sobrepeso: <strong>{{ condiciones_salud_array.nutricion.nutricion_18_60.imc.sobrepeso }} Personas</strong></li>
                                    <li>Normal: <strong>{{ condiciones_salud_array.nutricion.nutricion_18_60.imc.normal }} Personas</strong></li>
                                    <li>Delgadez: <strong>{{ condiciones_salud_array.nutricion.nutricion_18_60.imc.delgadez }} Personas</strong></li>
                                </ul> 
                            </div>
                            <div class="col-lg-12 text-center">
                                <h5>GRAFICA IMC</h5>
                                <div id="chartdiv_imc_18_60" style="width: 100%; height: 220px"></div>
                            </div>
                            <div class="col-lg-12"  v-if="condiciones_salud_array != null">
                                <br><br>
                                <strong>6.3.2 Indice de Masa Corporal (Mujeres Embarazadas - Mayores de 18 años)</strong><br>
                                <br>
                                <ul>
                                    <li>Obesidad para la edad gestacional: <strong>{{ condiciones_salud_array.nutricion.nutricion_18_60.imc_embarazadas.obesidad_gestacional }} Personas</strong></li>
                                    <li>Sobrepeso para la edad gestacional: <strong>{{ condiciones_salud_array.nutricion.nutricion_18_60.imc_embarazadas.sobrepeso_gestacional }} Personas</strong></li>
                                    <li>IMC adecuado para la edad gestacional: <strong>{{ condiciones_salud_array.nutricion.nutricion_18_60.imc_embarazadas.adecuado_gestacional }} Personas</strong></li>
                                    <li>Bajo peso para la edad gestacional: <strong>{{ condiciones_salud_array.nutricion.nutricion_18_60.imc_embarazadas.bajo_peso_gestacional }} Personas</strong></li>
                                </ul> 
                            </div>
                            <div class="col-lg-12 text-center">
                                <h5>GRAFICA IMC</h5>
                                <h6>(Mujeres Embarazadas - Mayores de 18 años)</h6>
                                <div id="chartdiv_imc_18_60_e" style="width: 100%; height: 220px"></div>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
        </div>

        <b-modal
            ref="modalpdf"
            hide-footer
            title="INFORME GENERAL SITUACIÓN EN SALUD POBLACIONAL"
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
    "use strict";
    import VueHtml2pdf from "vue-html2pdf";
    import VueEasyPieChart from "vue-easy-pie-chart";
    import "vue-easy-pie-chart/dist/vue-easy-pie-chart.css";
    import Progress from "easy-circular-progress";
    import VueCircle from "vue2-circle-progress";
    import * as DashboardServiceSocioeconomico from "../../Servicios/dashboard_socioeconomico_servicios";
    import * as informes from "../../Servicios/informes";

    import * as am4core from "@amcharts/amcharts4/core";
    import * as am4charts from "@amcharts/amcharts4/charts";
    import am4themes_animated from "@amcharts/amcharts4/themes/animated";
    am4core.useTheme(am4themes_animated);
    import Loading from "vue-loading-overlay";

    import store from "../../store";

    export default {
        components: {
            VueHtml2pdf,
            VueEasyPieChart,
            Progress,
            VueCircle,
            Loading
        },
        mounted() {
            this.caracterizacion();
            this.poblacion_no_asegurada_f();
            this.determinante_salud();
            this.condiciones_salud();
        },
        data() {
            return {
                poblacion_array: null,
                chart_torta_edades: null,
                chart_no_asegurado_1: null,
                chart_no_asegurado_2: null,
                isLoading: false,
                poblacion_no_asegurada: null,
                determinante_salud_array: null,
                chart_poblacion_pobreza: null,
                chart_escolaridad: null,
                chart_desempleo: null,
                chart_acueducto: null,
                chart_alcantarillado: null,
                condiciones_salud_array: null,
                chart_cronica: null,
                chart_infecciosa: null,
                chart_discapacidad: null,
                chart_embarazo: null,
                chart_inmunizacion: null,
                chart_peso_para_talla: null,
                chart_talla_para_edad: null,
                chart_imc: null,
                chart_imc_5_17: null,
                chart_imc_5_17_e: null,
                chart_imc_18_60: null,
                chart_imc_18_60_e: null,
                rutaPdf: ""
            }
        },
        methods: {
            async caracterizacion() {
                await DashboardServiceSocioeconomico.poblacion("todos", 1).then(respuesta => {
                    this.poblacion_array = respuesta.data["poblacion"]; 
                    this.grafica_torta_edades(this.poblacion_array.edades);
                })
                .catch(err => {
                    console.log(err);
                });
            },
            async grafica_torta_edades(array) {
                if(this.chart_torta_edades != null){
                    this.chart_torta_edades.dispose();
                }
                var chart = am4core.create("chartdiv_edades_torta", am4charts.PieChart3D);
                this.chart_torta_edades = chart;
                chart.data = [
                    {
                        category: "-1 Años",
                        first: array.personas0_1[0] + array.personas0_1[1],
                    },
                    {
                        category: "1-5 Años",
                        first: array.personas1_5[0] + array.personas1_5[1],
                    }, 
                    {
                        category: "6-11 Años",
                        first: array.personas6_11[0] + array.personas6_11[1],
                    },
                    {
                        category: "12-17 Años",
                        first: array.personas12_17[0] + array.personas12_17[1],
                    },
                    {
                        category: "18-28 Años",
                        first: array.personas18_28[0] + array.personas18_28[1],
                    }, 
                    {
                        category: "29-59 Años",
                        first: array.personas29_59[0] + array.personas29_59[1],
                    },
                    {
                        category: "+60 Años",
                        first: array.personas60[0] + array.personas60[1],
                    },
                ];
                var series = chart.series.push(new am4charts.PieSeries3D());
                series.dataFields.value = "first";
                series.dataFields.category = "category";
            },
            async poblacion_no_asegurada_f() {
                await informes.poblacion_no_asegurada().then(respuesta => {
                    this.poblacion_no_asegurada = respuesta.data; 
                    this.grafica_torta_no_asegurada_1(respuesta.data.no_asegurado_menor_5);
                    this.grafica_torta_no_asegurada_2(respuesta.data.no_asegurado_mayor_60);
                })
                .catch(err => {
                    console.log(err);
                });
            },
            async grafica_torta_no_asegurada_1(array) {
                if(this.chart_no_asegurado_1 != null){
                    this.chart_no_asegurado_1.dispose();
                }

                var chart = am4core.create("chartdiv_no_asegurado_1", am4charts.PieChart3D);
                this.chart_no_asegurado_1 = chart;

                chart.data = [
                    {
                        category: "Zona Urbana",
                        first: array.urbano,
                    },
                    {
                        category: "Zona Rural",
                        first: array.rural,
                    }, 
                ];
                var series = chart.series.push(new am4charts.PieSeries3D());
                series.dataFields.value = "first";
                series.dataFields.category = "category";
            },
            async grafica_torta_no_asegurada_2(array) {
                if(this.chart_no_asegurado_2 != null){
                    this.chart_no_asegurado_2.dispose();
                }

                var chart = am4core.create("chartdiv_no_asegurado_2", am4charts.PieChart3D);
                this.chart_no_asegurado_2 = chart;

                chart.data = [
                    {
                        category: "Zona Urbana",
                        first: array.urbano,
                    },
                    {
                        category: "Zona Rural",
                        first: array.rural,
                    }, 
                ];
                var series = chart.series.push(new am4charts.PieSeries3D());
                series.dataFields.value = "first";
                series.dataFields.category = "category";
            },
            async determinante_salud() {
                await informes.determinante_salud().then(respuesta => {
                    this.determinante_salud_array = respuesta.data; 
                    this.grafica_poblacion_pobreza(this.determinante_salud_array.pobreza);
                    this.grafica_torta_escolaridad(this.determinante_salud_array.escolaridad);
                    this.grafica_torta_desempleo_sexo(this.determinante_salud_array.desempleo);
                    this.grafica_viviendas_sin_acueducto(this.determinante_salud_array.alcantarillado_agua.viendasSAP);
                    this.grafica_viviendas_sin_alcantarillado(this.determinante_salud_array.alcantarillado_agua.viendasSA)
                })
                .catch(err => {
                    console.log(err);
                });
            },
            async grafica_poblacion_pobreza(array){
                if(this.chart_poblacion_pobreza != null){
                    this.chart_poblacion_pobreza.dispose();
                }

                var chart = am4core.create("chartdiv_poblacion_pobreza", am4charts.PieChart3D);
                this.chart_poblacion_pobreza = chart;

                chart.data = [
                    {
                        category: "Zona Urbana",
                        first: array.poblacion_pobreza_urbano,
                    },
                    {
                        category: "Zona Rural",
                        first: array.poblacion_pobreza_rural,
                    }, 
                ];
                var series = chart.series.push(new am4charts.PieSeries3D());
                series.dataFields.value = "first";
                series.dataFields.category = "category";
            },
            async grafica_torta_escolaridad(array) {
                if(this.chart_escolaridad != null){
                    this.chart_escolaridad.dispose();
                }
                var chart = am4core.create("chartdiv_escolaridad", am4charts.PieChart3D);
                this.chart_escolaridad = chart;
                chart.data = [];

                array.forEach(element => {
                    chart.data.push({
                        category: element.escolaridad_nombre,
                        first: element.numero_personas,
                    })
                });
                var series = chart.series.push(new am4charts.PieSeries3D());
                series.dataFields.value = "first";
                series.dataFields.category = "category";
            },
            async grafica_torta_desempleo_sexo(array) {
                if(this.chart_desempleo != null){
                    this.chart_desempleo.dispose();
                }
                var chart = am4core.create("chartdiv_desempleo", am4charts.PieChart3D);
                this.chart_desempleo = chart;

                chart.data = [
                    {
                        category: "Femenino",
                        first: array.femeninoTD,
                    },
                    {
                        category: "Masculino",
                        first: array.masculinoTD,
                    }, 
                ];

                var series = chart.series.push(new am4charts.PieSeries3D());
                series.dataFields.value = "first";
                series.dataFields.category = "category";
            },
            async grafica_viviendas_sin_acueducto(array) {

                var zona_rural = 0;
                var zona_urbana = 0;

                array.forEach(element => {
                    if(element.id_zona == 1){
                        zona_urbana += 1;
                    }else{
                        zona_rural += 1;
                    }
                });

                if(this.chart_acueducto != null){
                    this.chart_acueducto.dispose();
                }
                var chart = am4core.create("chartdiv_acueducto", am4charts.PieChart3D);
                this.chart_acueducto = chart;

                chart.data = [
                    {
                        category: "Zona Rural",
                        first: zona_rural,
                    },
                    {
                        category: "Zona Urbana",
                        first: zona_urbana,
                    }, 
                ];

                var series = chart.series.push(new am4charts.PieSeries3D());
                series.dataFields.value = "first";
                series.dataFields.category = "category";
            },
            async grafica_viviendas_sin_alcantarillado(array) {

                var zona_rural = 0;
                var zona_urbana = 0;

                array.forEach(element => {
                    if(element.id_zona == 1){
                        zona_urbana += 1;
                    }else{
                        zona_rural += 1;
                    }
                });

                if(this.chart_alcantarillado != null){
                    this.chart_alcantarillado.dispose();
                }
                var chart = am4core.create("chartdiv_alantarillado", am4charts.PieChart3D);
                this.chart_alcantarillado = chart;

                chart.data = [
                    {
                        category: "Zona Rural",
                        first: zona_rural,
                    },
                    {
                        category: "Zona Urbana",
                        first: zona_urbana,
                    }, 
                ];

                var series = chart.series.push(new am4charts.PieSeries3D());
                series.dataFields.value = "first";
                series.dataFields.category = "category";
            },
            async condiciones_salud() {
                await informes.condiciones_salud().then(respuesta => {
                    this.condiciones_salud_array = respuesta.data; 
                    this.grafica_enfermedades_cronicas(this.condiciones_salud_array.enfermedades_cronicas.por_enfermedad);
                    this.grafica_enfermedades_infecciosas(this.condiciones_salud_array.enfermedades_infecciosas.por_enfermedad);
                    this.grafica_personas_discapacitadas(this.condiciones_salud_array.personas_discapacidad.por_discapacidad);
                    this.grafica_adolescentes_mbarazo(this.condiciones_salud_array.adolescentes_embarazo);
                    this.grafica_inmunizacion(this.condiciones_salud_array.inmunizacion);
                    this.grafica_peso_para_talla(this.condiciones_salud_array.nutricion.nutricion_0_5.peso_talla);
                    this.grafica_talla_para_edad(this.condiciones_salud_array.nutricion.nutricion_0_5.talla_edad);
                    this.grafica_imc(this.condiciones_salud_array.nutricion.nutricion_0_5.imc);
                    this.grafica_imc_5_17(this.condiciones_salud_array.nutricion.nutricion_5_17.imc);
                    this.grafica_imc_5_17_e(this.condiciones_salud_array.nutricion.nutricion_5_17.imc_embarazadas);
                    this.grafica_imc_18_60(this.condiciones_salud_array.nutricion.nutricion_18_60.imc);
                    this.grafica_imc_18_60_e(this.condiciones_salud_array.nutricion.nutricion_18_60.imc_embarazadas);
                })
                .catch(err => {
                    console.log(err);
                });
            },
            async grafica_enfermedades_cronicas(array) {
                if(this.chart_cronica != null){
                    this.chart_cronica.dispose();
                }
                var chart = am4core.create("chartdiv_cronica", am4charts.PieChart3D);
                this.chart_cronica = chart;

                chart.data = [];

                array.forEach(element => {
                    chart.data.push({
                        category: element.enfermedad,
                        first: element.cantidad,
                    })
                });

                var series = chart.series.push(new am4charts.PieSeries3D());
                series.dataFields.value = "first";
                series.dataFields.category = "category";
            },
            async grafica_enfermedades_infecciosas(array) {
                if(this.chart_infecciosa != null){
                    this.chart_infecciosa.dispose();
                }
                var chart = am4core.create("chartdiv_infecciosa", am4charts.PieChart3D);
                this.chart_infecciosa = chart;

                chart.data = [];

                array.forEach(element => {
                    chart.data.push({
                        category: element.enfermedad,
                        first: element.cantidad,
                    })
                });

                var series = chart.series.push(new am4charts.PieSeries3D());
                series.dataFields.value = "first";
                series.dataFields.category = "category";
            },
            async grafica_personas_discapacitadas(array) {
                if(this.chart_discapacidad != null){
                    this.chart_discapacidad.dispose();
                }
                var chart = am4core.create("chartdiv_discapacidad", am4charts.PieChart3D);
                this.chart_discapacidad = chart;

                chart.data = [];

                array.forEach(element => {
                    chart.data.push({
                        category: element.discapacidad,
                        first: element.cantidad,
                    })
                });

                var series = chart.series.push(new am4charts.PieSeries3D());
                series.dataFields.value = "first";
                series.dataFields.category = "category";
            },
            async grafica_adolescentes_mbarazo(array) {
               

                if(this.chart_embarazo != null){
                    this.chart_embarazo.dispose();
                }
                var chart = am4core.create("chartdiv_embarazo", am4charts.PieChart3D);
                this.chart_embarazo = chart;

                chart.data = [
                    {
                        category: "Zona Rural",
                        first: array.adolescentes_embarazo_rural,
                    },
                    {
                        category: "Zona Urbana",
                        first: array.adolescentes_embarazo_urbano,
                    }, 
                ];

                var series = chart.series.push(new am4charts.PieSeries3D());
                series.dataFields.value = "first";
                series.dataFields.category = "category";
            },
            async grafica_inmunizacion(array) {
            
               if(this.chart_inmunizacion != null){
                   this.chart_inmunizacion.dispose();
               }
               var chart = am4core.create("chartdiv_inmunizacion", am4charts.PieChart3D);
               this.chart_inmunizacion = chart;

               chart.data = [
                   {
                       category: "Menores a 1 Año",
                       first: array.integrantes_mn1,
                   },
                   {
                       category: "De 1 a 5 Años",
                       first: array.integrantes_de1a5,
                   }, 
               ];

               var series = chart.series.push(new am4charts.PieSeries3D());
               series.dataFields.value = "first";
               series.dataFields.category = "category";
            },
            async grafica_peso_para_talla(array) {
                if(this.chart_peso_para_talla != null){
                    this.chart_peso_para_talla.dispose();
                }
                var chart = am4core.create("chartdiv_peso_para_talla", am4charts.PieChart3D);
                this.chart_peso_para_talla = chart;

                chart.data = [
                    {
                        category: "Desnutrición Aguda Moderada",
                        first: array.desnutricion_aguda_moderada,
                    },
                    {
                        category: "Desnutrición Aguda Severa",
                        first: array.desnutricion_aguda_severa,
                    }, 
                    {
                        category: "Peso Adecuado",
                        first: array.peso_adecuado,
                    },
                    {
                        category: "Riesgo de Desnutrición Aguda",
                        first: array.riesgo_desnutricion_aguda,
                    }, 
                ];

                var series = chart.series.push(new am4charts.PieSeries3D());
                series.dataFields.value = "first";
                series.dataFields.category = "category";
            },
            async grafica_talla_para_edad(array) {
                if(this.chart_talla_para_edad != null){
                    this.chart_talla_para_edad.dispose();
                }
                var chart = am4core.create("chartdiv_talla_para_edad", am4charts.PieChart3D);
                this.chart_talla_para_edad = chart;

                chart.data = [
                    {
                        category: "Talla Adecuada para la Edad",
                        first: array.retraso_talla,
                    },
                    {
                        category: "Riesgo de Talla Baja",
                        first: array.riesgo_talla_baja,
                    }, 
                    {
                        category: "Talla Baja para la Edad o Retraso en Talla",
                        first: array.retraso_talla,
                    }, 
                ];

                var series = chart.series.push(new am4charts.PieSeries3D());
                series.dataFields.value = "first";
                series.dataFields.category = "category";

                series.labels.template.fontSize = 12;
                series.labels.template.maxWidth = 170;
                series.labels.template.wrap = true;
            },
            async grafica_imc(array) {
                if(this.chart_imc != null){
                    this.chart_imc.dispose();
                }
                var chart = am4core.create("chartdiv_imc", am4charts.PieChart3D);
                this.chart_imc = chart;

                chart.data = [
                    {
                        category: "Obesidad",
                        first: array.obesidad,
                    },
                    {
                        category: "Sobrepeso",
                        first: array.sobrepeso,
                    }, 
                    {
                        category: "Riesgo de Sobrepeso",
                        first: array.riesgo_sobrepeso,
                    }, 
                    {
                        category: "Peso Normal",
                        first: array.peso_normal,
                    },
                ];

                var series = chart.series.push(new am4charts.PieSeries3D());
                series.dataFields.value = "first";
                series.dataFields.category = "category";

                series.labels.template.fontSize = 12;
                series.labels.template.maxWidth = 170;
                series.labels.template.wrap = true;
            }, 
            async grafica_imc_5_17(array) {
                if(this.chart_imc_5_17 != null){
                    this.chart_imc_5_17.dispose();
                }
                var chart = am4core.create("chartdiv_imc_5_17", am4charts.PieChart3D);
                this.chart_imc_5_17 = chart;

                chart.data = [
                    {
                        category: "Obesidad",
                        first: array.obesidad,
                    },
                    {
                        category: "Sobrepeso",
                        first: array.sobrepeso,
                    }, 
                    {
                        category: "IMC Adecuado para la Edad",
                        first: array.imc_adecuado,
                    }, 
                    {
                        category: "Riesgo de Delgadez",
                        first: array.riesgo_delgadez,
                    },
                    {
                        category: "Delgadez",
                        first: array.delgadez,
                    },
                ];

                var series = chart.series.push(new am4charts.PieSeries3D());
                series.dataFields.value = "first";
                series.dataFields.category = "category";

                series.labels.template.fontSize = 12;
                series.labels.template.maxWidth = 200;
                series.labels.template.wrap = true;
            }, 
            async grafica_imc_5_17_e(array) {
                if(this.chart_imc_5_17_e != null){
                    this.chart_imc_5_17_e.dispose();
                }
                var chart = am4core.create("chartdiv_imc_5_17_e", am4charts.PieChart3D);
                this.chart_imc_5_17_e = chart;

                chart.data = [
                    {
                        category: "Obesidad para la edad gestacional",
                        first: array.obesidad_gestacional,
                    },
                    {
                        category: "Sobrepeso para la edad gestacional",
                        first: array.sobrepeso_gestacional,
                    }, 
                    {
                        category: "IMC adecuado para la edad gestacional",
                        first: array.adecuado_gestacional,
                    }, 
                    {
                        category: "Bajo peso para la edad gestacional",
                        first: array.bajo_peso_gestacional,
                    },
                ];

                var series = chart.series.push(new am4charts.PieSeries3D());
                series.dataFields.value = "first";
                series.dataFields.category = "category";

                series.labels.template.fontSize = 12;
                series.labels.template.maxWidth = 240;
                series.labels.template.wrap = true;
            }, 
            async grafica_imc_18_60(array) {
                if(this.chart_imc_18_60 != null){
                    this.chart_imc_18_60.dispose();
                }
                var chart = am4core.create("chartdiv_imc_18_60", am4charts.PieChart3D);
                this.chart_imc_18_60 = chart;

                chart.data = [
                    {
                        category: "Obesidad",
                        first: array.obesidad,
                    },
                    {
                        category: "Sobrepeso",
                        first: array.sobrepeso,
                    }, 
                    {
                        category: "Normal",
                        first: array.normal,
                    }, 
                    {
                        category: "Delgadez",
                        first: array.delgadez,
                    },
                ];

                var series = chart.series.push(new am4charts.PieSeries3D());
                series.dataFields.value = "first";
                series.dataFields.category = "category";

                series.labels.template.fontSize = 12;
                series.labels.template.maxWidth = 200;
                series.labels.template.wrap = true;
            },
            async grafica_imc_18_60_e(array) {
                if(this.chart_imc_18_60_e != null){
                    this.chart_imc_18_60_e.dispose();
                }
                var chart = am4core.create("chartdiv_imc_18_60_e", am4charts.PieChart3D);
                this.chart_imc_18_60_e = chart;

                chart.data = [
                    {
                        category: "Obesidad para la edad gestacional",
                        first: array.obesidad_gestacional,
                    },
                    {
                        category: "Sobrepeso para la edad gestacional",
                        first: array.sobrepeso_gestacional,
                    }, 
                    {
                        category: "IMC adecuado para la edad gestacional",
                        first: array.adecuado_gestacional,
                    }, 
                    {
                        category: "Bajo peso para la edad gestacional",
                        first: array.bajo_peso_gestacional,
                    },
                ];

                var series = chart.series.push(new am4charts.PieSeries3D());
                series.dataFields.value = "first";
                series.dataFields.category = "category";

                series.labels.template.fontSize = 12;
                series.labels.template.maxWidth = 240;
                series.labels.template.wrap = true;
            },
            generarPDF: async function () {
                this.isLoading = true;

                const options = {
                    type: 'dataURL',
                    useCORS: true,
                }
                
                let chart_torta_edades = await this.chart_torta_edades.exporting.getImage("png");
                let chart_no_asegurado_1 = await this.chart_no_asegurado_1.exporting.getImage("png");
                let chart_no_asegurado_2 = await this.chart_no_asegurado_2.exporting.getImage("png");
                let chart_poblacion_pobreza = await this.chart_poblacion_pobreza.exporting.getImage("png");
                let chart_escolaridad = await this.chart_escolaridad.exporting.getImage("png");
                let chart_desempleo = await this.chart_desempleo.exporting.getImage("png");
                let chart_acueducto = await this.chart_acueducto.exporting.getImage("png");
                let chart_alcantarillado = await this.chart_alcantarillado.exporting.getImage("png");
                let chart_cronica = await this.chart_cronica.exporting.getImage("png");
                let chart_infecciosa = await this.chart_infecciosa.exporting.getImage("png");
                let chart_discapacidad = await this.chart_discapacidad.exporting.getImage("png");
                let chart_embarazo = await this.chart_embarazo.exporting.getImage("png");
                let chart_inmunizacion = await this.chart_inmunizacion.exporting.getImage("png");
                let chart_peso_para_talla = await this.chart_peso_para_talla.exporting.getImage("png");
                let chart_talla_para_edad = await this.chart_talla_para_edad.exporting.getImage("png");
                let chart_imc = await this.chart_imc.exporting.getImage("png");
                let chart_imc_5_17 = await this.chart_imc_5_17.exporting.getImage("png");
                let chart_imc_5_17_e = await this.chart_imc_5_17_e.exporting.getImage("png");
                let chart_imc_18_60 = await this.chart_imc_18_60.exporting.getImage("png");
                let chart_imc_18_60_e = await this.chart_imc_18_60_e.exporting.getImage("png");
                
                const parametros = {
                    _token: this.csrf,
                    poblacion_array: this.poblacion_array,
                    poblacion_no_asegurada: this.poblacion_no_asegurada,
                    chart_torta_edades: chart_torta_edades,
                    chart_no_asegurado_1: chart_no_asegurado_1,
                    chart_no_asegurado_2: chart_no_asegurado_2,
                    determinante_salud_array: this.determinante_salud_array,
                    chart_poblacion_pobreza: chart_poblacion_pobreza,
                    chart_escolaridad: chart_escolaridad,
                    chart_desempleo: chart_desempleo,
                    chart_acueducto: chart_acueducto,
                    chart_alcantarillado: chart_alcantarillado,
                    condiciones_salud_array: this.condiciones_salud_array,
                    chart_cronica: chart_cronica,
                    chart_infecciosa: chart_infecciosa,
                    chart_discapacidad: chart_discapacidad,
                    chart_embarazo: chart_embarazo,
                    chart_inmunizacion: chart_inmunizacion,
                    chart_peso_para_talla: chart_peso_para_talla,
                    chart_talla_para_edad: chart_talla_para_edad,
                    chart_imc: chart_imc,
                    chart_imc_5_17: chart_imc_5_17,
                    chart_imc_5_17_e: chart_imc_5_17_e,
                    chart_imc_18_60: chart_imc_18_60,
                    chart_imc_18_60_e: chart_imc_18_60_e
                };

                try {
                    await informes.exportarGeneralSalud(parametros).then(respuesta => {
                        this.rutaPdf = store.state.apiURL + respuesta.data.nombre;
                        this.isLoading = false;
                        this.$refs.modalpdf.show();
                    });
                } catch (error) { 
                    this.$swal("Error...!", "Ocurrio un error!", "error"); 
                }
            }, 
            cerrarModal() {
                this.$refs.modalpdf.hide();
            },
        },
    };
</script>
<style>
    .li_li {
        padding-top: 7px;
        padding-bottom: 7px;
    }

    p{
        line-height: 200%;
    }

    #divPadre {
        text-align:center;
    }
    #divHijo {
        width:25cm;
        margin:0px auto;
    }

    .table_data {
        width: 100%;
        font-size: 13px;
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

    .nav-pills, .nav-tabs {
        margin: 0 0 -10px 0 !important;
    }
</style>