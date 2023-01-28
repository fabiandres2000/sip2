<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        INFORME GENERAL SITUACIÓN EN SALUD POBLACIONAL
    </title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8">
    <style>
        @page { margin: 20px; }
        body { margin: 20px; }

        @font-face {
            font-family: 'Poppins', sans-serif;
            src: url('{{ public_path('fonts/Poppins/Poppins-Medium.tff') }}');
        }
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #646c9a;
            text-align: left;
            background-color: #fff;
        }

        table {
            width: 100%;
            font-size: 11px;
            border-collapse: collapse;
        }

        thead {
            padding: 0.3em;
            color: #fff;
            background: #5578eb;
        }

        th,
        td {
            width: 25%;
            text-align: left;
            vertical-align: top;
            padding: 0.3em;
            caption-side: bottom;
        }

        th.last,
        td.last {
            border-right: 0;
        }

        th:lastchild,
        td:lastchild {
            border-right: 0;
        }

        tbody tr:nth-child(odd) {
            background-color: #fff;
        }

        tbody tr:nth-child(even) {
            background-color: #f1f1f1;
        }
        h3, h2, h1, h4, h5, p {
            margin: 4px !important;
        }

        footer {
            position: fixed; 
            bottom: -25px; 
            left: 0px; 
            right: 0px;
            height: 50px; 
            font-size: 10px;
            /** Extra personal styles **/
            color: black;
            text-align: right;
            line-height: 35px;
            font-style: italic;
        }
    </style>
</head>
<body>
    <footer>
        {{$ente}} - Fecha de informe: <?php echo date("d/m/Y H:i:s");?> 
    </footer>
    <main>
        <div class="row">
            <div class="col-sm-12">
                <h4>INFORME GENERAL SITUACIÓN EN SALUD POBLACIONAL</h4>
            </div>
        </div>
        <h4 style="color: #fd397a ">Caracterización</h4>
        <div class="row" style="padding: 10px">
            <div class="col-lg-12" style="padding-bottom: 10px;">
                <strong>1. Población por ciclo de vida</strong>
                <p> De acuerdo con la información recolectada, la poblacion caracterizada se compone de la siguiente manera por ciclo de vida:</p>
            </div>
            <div>
                <div style="float: left; text-align: left; width: 300px !important;">
                    <ul>
                        <li class="li_li"><strong>Menores de un año: </strong> {{$poblacion_array["edades"]["personas0_1"][0]+$poblacion_array["edades"]["personas0_1"][1]}} Personas</li>
                        <li class="li_li"><strong>De 1 a 5 Años: </strong> {{$poblacion_array["edades"]["personas1_5"][0]+$poblacion_array["edades"]["personas1_5"][1]}} Personas</li>
                        <li class="li_li"><strong>De 6 a 11 Años: </strong> {{$poblacion_array["edades"]["personas6_11"][0]+$poblacion_array["edades"]["personas6_11"][1]}} Personas</li>
                        <li class="li_li"><strong>De 12 a 17 Años: </strong> {{$poblacion_array["edades"]["personas12_17"][0]+$poblacion_array["edades"]["personas12_17"][1]}} Personas</li>
                        <li class="li_li"><strong>De 18 a 28 Años: </strong> {{$poblacion_array["edades"]["personas18_28"][0]+$poblacion_array["edades"]["personas18_28"][1]}} Personas</li>
                        <li class="li_li"><strong>De 29 a 59 Años: </strong> {{$poblacion_array["edades"]["personas29_59"][0]+$poblacion_array["edades"]["personas29_59"][1]}} Personas</li>
                        <li class="li_li"><strong>Mayores de 60 Años </strong> {{$poblacion_array["edades"]["personas60"][0]+$poblacion_array["edades"]["personas60"][1]}} Personas</li>
                    </ul>
                </div>
                <div style="float: left; text-align: center; width: 530px !important;">
                    <img src="{{$chart_torta_edades}}" style="width: 90%;height: auto;max-width: 100%;">
                </div>
            </div>
        </div>
        <div>
            <div>
                <br><br>
                <strong>2. Población menor de 5 años no asegurada</strong> 
                <p>
                    Dentro de este grupo de edad se tiene una cantidad de <strong>{{ $poblacion_no_asegurada["no_asegurado_menor_5"]["cantidad_personas"] }} personas</strong>, de las cuales <strong>{{ $poblacion_no_asegurada["no_asegurado_menor_5"]["rural"] + $poblacion_no_asegurada["no_asegurado_menor_5"]["urbano"] }} personas</strong>, se encuentran en la situación de población menor de 5 años no asegurada, de lo cual se puede obtener que <strong>{{ $poblacion_no_asegurada["no_asegurado_menor_5"]["rural"] }} personas</strong> se encuentran en zona rural, y <strong>{{ $poblacion_no_asegurada["no_asegurado_menor_5"]["urbano"] }} personas</strong>  en zona urbana.
                </p>
                <br>
                <div style="text-align: center; width: 100%">
                    <img src="{{$chart_no_asegurado_1}}" style="width: 80%;height: auto;">
                </div> 
            </div>
        </div>
        <div style="padding: 10px">
            <div >
                <strong>3. Población adulto mayor no asegurada </strong> 
                <p>
                    Dentro de este grupo de edad se tiene una cantidad de <strong>{{ $poblacion_no_asegurada["no_asegurado_mayor_60"]["cantidad_personas"] }} personas</strong>, de las cuales <strong>{{ $poblacion_no_asegurada["no_asegurado_mayor_60"]["rural"] + $poblacion_no_asegurada["no_asegurado_mayor_60"]["urbano"] }} personas</strong>, se encuentran en la situación de población adulto mayor no asegurada, de lo cual se puede obtener que <strong>{{ $poblacion_no_asegurada["no_asegurado_mayor_60"]["rural"] }} personas</strong> se encuentran en zona rural, y <strong>{{ $poblacion_no_asegurada["no_asegurado_mayor_60"]["urbano"] }} personas</strong>  en zona urbana.
                </p>
                <br>
                <div style="text-align: center; width: 100%">
                    <img src="{{$chart_no_asegurado_2}}" style="width: 80%;height: auto;">
                </div>
            </div>
        </div>
        <div style="page-break-after:always;"></div> 
        <br>
        <h4 style="color: #fd397a ">Determinante social de la salud</h4>
        <br>
        <div>
            <strong>1. Población en pobreza </strong>
            <p >De acuerdo a la informacion recolectada, se tiene que <strong>{{ $determinante_salud_array["pobreza"]["poblacion_pobreza"] }} personas</strong> se encuentran en situación de pobreza, esto representa un <strong>{{ round($determinante_salud_array["pobreza"]["porcentaje_poblacion_pobreza"], 2) }}%</strong> de la población total.</p>
            <ul>
                <li>
                    Población en pobreza (Rural): <strong>{{ $determinante_salud_array["pobreza"]["poblacion_pobreza_rural"] }}</strong>
                </li>
                <li>
                    Población en pobreza (Urbano): <strong>{{ $determinante_salud_array["pobreza"]["poblacion_pobreza_urbano"] }}</strong>
                </li>
            </ul>
            <br>
            <div style="text-align: center; width: 100%">
                <img src="{{$chart_poblacion_pobreza}}" style="width: 70%;height: auto;">
            </div>
        </div>
        <br>
        <div>
            <strong>2. Población por nivel de escolaridad </strong>
            <p >Con una población total de <strong>{{ $determinante_salud_array["pobreza"]["poblacion"] }} personas</strong> se tiene que: </p>
            <br>
            <div style="float: left; text-align: center; width: 250px !important;">
                <table class="table"  style="width: 100%">
                    <thead>
                        <tr>
                            <th>Nivel de escolaridad</th>
                            <th>#de personas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($determinante_salud_array["escolaridad"] as $item)
                            <tr>
                                <td>{{ $item["escolaridad_nombre"] }}</td>
                                <td>{{ $item["numero_personas"] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div style="float: left; text-align: center; width: 500px !important;">
                <h4>Grafica de porcentaje de personas <br> por nivel de escolaridad</h4>
                <br>
                <img src="{{$chart_escolaridad}}" style="width: 120%;height: auto;max-width: 100%;">
            </div>
        </div> 
        <div style="page-break-after:always;"></div> 
        <br>
        <div class="row" style="padding: 10px">
            <div class="col-lg-12">
                <strong>3. Desempleo y tipos de empleo  </strong>
                <p >La tasa de desempleo del total municipal es de <strong>{{ round($determinante_salud_array["desempleo"]["TD"], 2) }}% </strong>, lo cual quiere decir que <strong>{{ $determinante_salud_array["desempleo"]["D"] }} personas </strong>  de <strong>{{ $determinante_salud_array["desempleo"]["FT"] }} personas </strong> que componen la (fuerza laboral), estan en busca de empleo. </p>
                <br>
                <ul >
                    <li>Personas de genero masculino desempleados: <strong>{{ $determinante_salud_array["desempleo"]["masculinoTD"] }}</strong></li>
                    <li>Personas de genero femenino desempleados: <strong>{{ $determinante_salud_array["desempleo"]["femeninoTD"] }}</strong></li>
                </ul>
                <br>
                <div style="text-align: center; width: 100%">
                    <img src="{{$chart_desempleo}}" style="width: 90%;height: auto;">
                </div>
            </div>
        </div>
        <br>
        <div class="row" style="padding: 10px">
            <strong>4. Acceso a acueducto y alcantarillado</strong>
            <p >Se tiene que <strong>{{ $determinante_salud_array["alcantarillado_agua"]["viendasSinAguaPotable"] }} Viviendas </strong> se encuentran sin el servicio de agua potable y <strong>{{ $determinante_salud_array["alcantarillado_agua"]["viendasSinalcantarillado"] }} Viviendas </strong> sin el servicio de alcantarillado, lo que corresponde a un <strong>{{ round($determinante_salud_array["alcantarillado_agua"]["porcentajeviendasSinAguaPotable"], 2) }}% </strong> y <strong>{{ round($determinante_salud_array["alcantarillado_agua"]["porcentajeviendasSinalcantarillado"], 2) }}% </strong> respectivamente del total de viviendas caracterizadas <strong>({{ $determinante_salud_array["alcantarillado_agua"]["totalViviendas"] }})</strong> .</p>
            <br>
            <div style="float: left; text-align: center; width: 380px !important; padding-top: 70px">
                <h5>Viviendas sin Acceso a Acueducto <br> (Por zona) </h5>
                <img src="{{$chart_acueducto}}" style="width: 150%;height: auto;">
            </div>
            <div style="float: left; text-align: center; width: 380px !important; padding-top: 70px">
                <h5>Viviendas sin Acceso a Alcantarillado <br> (Por zona)</h5>
                <img src="{{$chart_alcantarillado}}" style="width: 150%;height: auto;">
            </div>
        </div>
        <div style="page-break-after:always;"></div> 
        <br>
        <h4 style="color: #fd397a ">Condiciones de salud</h4>
        <br>
        <div class="row" style="padding: 10px">
            <strong>1. Población con enfermedades crónicas</strong>
            <p>Se tiene que el <strong>{{ round($condiciones_salud_array["enfermedades_cronicas"]["porcentaje_personas_con_enfermedades"], 2) }}%</strong> de la población padece al menos una enfermedad cronica, esto quiere decir que <strong>{{ $condiciones_salud_array["enfermedades_cronicas"]["personas_con_enfermedades"] }} Personas</strong> de <strong>{{ $condiciones_salud_array["enfermedades_cronicas"]["numero_personas"] }}</strong> padecen enfermedades cronicas, las cuales estan divididas de la siguiente manera: </p>
            <br>
            <div>
                <div style="text-align: center; width: 100%">
                    <h5>Personas con enfermedades cronicas <br> (Por tipo de enfermedad)</h5>
                    <br>
                    <img src="{{$chart_cronica}}" style="width: 100%;height: auto;">
                </div>
            </div>
        </div>
        <br>
        <div class="row" style="padding: 10px">
            <strong>1. Población con enfermedades Infecciosas</strong>
            <p>Se tiene que el <strong>{{ round($condiciones_salud_array["enfermedades_infecciosas"]["porcentaje_personas_con_enfermedades"], 2) }}%</strong> de la población padece al menos una enfermedad infecciosa, esto quiere decir que <strong>{{ $condiciones_salud_array["enfermedades_infecciosas"]["personas_con_enfermedades"] }} Personas</strong> de <strong>{{ $condiciones_salud_array["enfermedades_cronicas"]["numero_personas"] }}</strong> padecen enfermedades infecciosas, las cuales estan divididas de la siguiente manera: </p>
            <br>
            <div>
                <div style="text-align: center; width: 100%">
                    <h5>Personas con enfermedades Infecciosas <br> (Por tipo de enfermedad)</h5>
                    <br>
                    <img src="{{$chart_infecciosa}}" style="width: 100%;height: auto;">
                </div>
            </div>
        </div>
        <div style="page-break-after:always;"></div> 
        <br>
        <div class="row" style="padding: 10px">
            <strong>3. Población con discapacidad</strong>
            <p>El <strong>{{ round($condiciones_salud_array["personas_discapacidad"]["porcentaje_personas_con_discapacidad"], 2) }}%</strong> de la población es discapacitada, esto quiere decir que <strong>{{ $condiciones_salud_array["personas_discapacidad"]["personas_con_discapacidad"] }}</strong> de <strong>{{ $condiciones_salud_array["personas_discapacidad"]["numero_personas"] }} Personas</strong> padecen algún tipo de discapacidad, ya sea: fisica, auditiva, entre otras. </p>
            <br>
            <div style="text-align: center; width: 100%">
                <h5>Personas con Discapacidad <br> (Por tipo de discapacidad)</h5>
                <br>
                <img src="{{$chart_discapacidad}}" style="width: 100%;height: auto;">
            </div>
        </div>
        <br>
        <div class="row" style="padding: 10px">
            <strong>4. Adolescentes en estado de gestación</strong>
            <p>Se tiene que, de <strong>{{ $condiciones_salud_array["adolescentes_embarazo"]["embarazadas"] }} mujeres </strong> en estado de gestación <strong>{{ $condiciones_salud_array["adolescentes_embarazo"]["adolescentes_embarazo"] }} son adolescentes, </strong>lo cual representa un <strong>{{ round($condiciones_salud_array["adolescentes_embarazo"]["porcentaje_adolescentes_embarazadas"],2) }}%</strong> de las mujeres embarazadas.</p>
            <br>
            <div style="text-align: center; width: 100%">
                <h5>Adolescentes en Embarazo <br> (Por tipo de Zona)</h5>
                <br>
                <img src="{{$chart_embarazo}}" style="width: 100%;height: auto;">
            </div>
        </div>
        <div style="page-break-after:always;"></div> 
        <br>
        <div class="row" style="padding: 10px">
            <strong>5. Inmunización </strong>
            <p><strong>{{ round($condiciones_salud_array["inmunizacion"]["porcentaje_carnet_desac"], 2) }}% </strong> de los niños de 0 a 5 años no estan completamente inmunizados, esto quiere decir que <strong>{{ $condiciones_salud_array["inmunizacion"]["carnet_desac"] }} </strong> de <strong>{{ $condiciones_salud_array["inmunizacion"]["numero_integrantes"] }} niños</strong> estan sin esquema de vacunación o tienen el esquema incompleto. </p>
            <br>
            <div style="text-align: center; width: 100%">
                <h5>Niños no Inmunizados <br> (Por Grupo de Edad)</h5>
                <br>
                <img src="{{$chart_inmunizacion}}" style="width: 100%;height: auto;">
            </div>
        </div>
        <br>
        <div>
            <strong>6. Situación nutricional </strong><br>
            <strong style="color: #fd397a">6.1 Niños y niñas menores de 5 años de edad (de 0 a 59 meses)</strong><br>
            <p>De un total de <strong>{{ $condiciones_salud_array["nutricion"]["nutricion_0_5"]["cantidad_ninios"] }} Niños</strong>, se tiene la siguiente información.</p>
            <br>
            <strong>6.1.1 Peso para la talla</strong> 
            <ul>
                <li>Desnutrición Aguda Moderada: <strong>{{ $condiciones_salud_array["nutricion"]["nutricion_0_5"]["peso_talla"]["desnutricion_aguda_moderada"] }} Niños</strong></li>
                <li>Peso Adecuado: <strong>{{ $condiciones_salud_array["nutricion"]["nutricion_0_5"]["peso_talla"]["peso_adecuado"] }} Niños</strong></li>
                <li>Desnutrición Aguda Severa: <strong>{{ $condiciones_salud_array["nutricion"]["nutricion_0_5"]["peso_talla"]["desnutricion_aguda_severa"] }} Niños</strong></li>
                <li>Riesgo de Desnutrición Aguda: <strong>{{ $condiciones_salud_array["nutricion"]["nutricion_0_5"]["peso_talla"]["riesgo_desnutricion_aguda"] }} Niños</strong></li>
            </ul> 
        </div>
        <br>
        <div style="text-align: center; width: 100%">
            <h5>GRAFICA DE PESO PARA LA TALLA</h5>
            <br>
            <img src="{{$chart_peso_para_talla}}" style="width: 100%;height: auto;">
        </div>
        <div style="page-break-after:always;"></div> 
        <br>
        <div class="col-lg-12"  v-if="condiciones_salud_array != null">
            <br>
            <strong>6.1.2 Talla para la edad</strong><br>
            <ul>
                <li>Talla Adecuada para la Edad: <strong>{{ $condiciones_salud_array["nutricion"]["nutricion_0_5"]["talla_edad"]["talla_adecuada"] }} Niños</strong></li>
                <li>Riesgo de Talla Baja: <strong>{{ $condiciones_salud_array["nutricion"]["nutricion_0_5"]["talla_edad"]["riesgo_talla_baja"] }} Niños</strong></li>
                <li>Talla Baja para la Edad o Retraso en Talla: <strong>{{ $condiciones_salud_array["nutricion"]["nutricion_0_5"]["talla_edad"]["retraso_talla"] }} Niños</strong></li>
            </ul> 
        </div>
        <div style="text-align: center; width: 100%">
            <h5>GRAFICA DE TALLA PARA LA EDAD</h5>
            <br>
            <img src="{{$chart_talla_para_edad}}" style="width: 100%;height: auto;">
        </div>
        <br>
        <div class="col-lg-12"  v-if="condiciones_salud_array != null">
            <br>
            <strong>6.1.3 Indice de Masa Corporal (IMC)</strong><br><br>
            <ul>
                <li>Obesidad: <strong>{{ $condiciones_salud_array["nutricion"]["nutricion_0_5"]["imc"]["obesidad"] }} Niños</strong></li>
                <li>Sobrepeso: <strong>{{ $condiciones_salud_array["nutricion"]["nutricion_0_5"]["imc"]["sobrepeso"] }} Niños</strong></li>
                <li>Riesgo de Sobrepeso: <strong>{{ $condiciones_salud_array["nutricion"]["nutricion_0_5"]["imc"]["riesgo_sobrepeso"] }} Niños</strong></li>
                <li>Peso Normal: <strong>{{ $condiciones_salud_array["nutricion"]["nutricion_0_5"]["imc"]["peso_normal"] }} Niños</strong></li>
            </ul> 
        </div>
        <div style="text-align: center; width: 100%">
            <h5>GRAFICA IMC</h5>
            <br>
            <img src="{{$chart_imc}}" style="width: 100%;height: auto;">
        </div>
        <div style="page-break-after:always;"></div> 
        <br>
        <div class="col-lg-12"  v-if="condiciones_salud_array != null">
            <br>
            <strong style="color: #fd397a">6.2 Niñas, niños y adolescentes de 5 a 17 años</strong><br>
            <p>De un total de <strong>{{ $condiciones_salud_array["nutricion"]["nutricion_5_17"]["cantidad_personas"] }} personas</strong>, se tiene la siguiente información.</p>
            <strong>6.2.1 Indice de Masa Corporal</strong>
            <br>
            <ul>
                <li>Obesidad: <strong>{{ $condiciones_salud_array["nutricion"]["nutricion_5_17"]["imc"]["obesidad"] }} Personas</strong></li>
                <li>Sobrepeso: <strong>{{ $condiciones_salud_array["nutricion"]["nutricion_5_17"]["imc"]["sobrepeso"] }} Personas</strong></li>
                <li>IMC Adecuado para la Edad: <strong>{{ $condiciones_salud_array["nutricion"]["nutricion_5_17"]["imc"]["imc_adecuado"] }} Personas</strong></li>
                <li>Riesgo de Delgadez: <strong>{{ $condiciones_salud_array["nutricion"]["nutricion_5_17"]["imc"]["riesgo_delgadez"] }} Personas</strong></li>
                <li>Delgadez: <strong>{{ $condiciones_salud_array["nutricion"]["nutricion_5_17"]["imc"]["delgadez"] }} Personas</strong></li>
            </ul> 
        </div>
        <div style="text-align: center; width: 100%">
            <h5>GRAFICA IMC</h5>
            <br>
            <img src="{{$chart_imc_5_17}}" style="width: 100%;height: auto;">
        </div>
        <br>
        <div>
            <strong>6.2.2 Indice de Masa Corporal (Mujeres Embarazadas - 5 a 17 Años)</strong>
            <br>
            <ul>
                <li>Obesidad para la edad gestacional: <strong>{{ $condiciones_salud_array["nutricion"]["nutricion_5_17"]["imc_embarazadas"]["obesidad_gestacional"] }} Personas</strong></li>
                <li>Sobrepeso para la edad gestacional: <strong>{{ $condiciones_salud_array["nutricion"]["nutricion_5_17"]["imc_embarazadas"]["sobrepeso_gestacional"] }} Personas</strong></li>
                <li>IMC adecuado para la edad gestacional: <strong>{{ $condiciones_salud_array["nutricion"]["nutricion_5_17"]["imc_embarazadas"]["adecuado_gestacional"] }} Personas</strong></li>
                <li>Bajo peso para la edad gestacional: <strong>{{ $condiciones_salud_array["nutricion"]["nutricion_5_17"]["imc_embarazadas"]["bajo_peso_gestacional"] }} Personas</strong></li>
            </ul> 
        </div>
        <div style="text-align: center; width: 100%">
            <h5>GRAFICA IMC <br> (Mujeres Embarazadas - 5 a 17 Años)</h5>
            <br>
            <img src="{{$chart_imc_5_17_e}}" style="width: 100%;height: auto;">
        </div>
        <div style="page-break-after:always;"></div> 
        <br>
        <div class="col-lg-12"  v-if="condiciones_salud_array != null">
            <strong style="color: #fd397a">6.3 Adultos  mayores de 18 años.</strong>
            <p>De un total de <strong>{{ $condiciones_salud_array["nutricion"]["nutricion_18_60"]["cantidad_personas"] }} personas</strong>, se tiene la siguiente información.</p>
            <strong>6.3.1 Indice de Masa Corporal</strong>
            <br>
            <ul>
                <li>Obesidad: <strong>{{ $condiciones_salud_array["nutricion"]["nutricion_18_60"]["imc"]["obesidad"] }} Personas</strong></li>
                <li>Sobrepeso: <strong>{{ $condiciones_salud_array["nutricion"]["nutricion_18_60"]["imc"]["sobrepeso"] }} Personas</strong></li>
                <li>Normal: <strong>{{ $condiciones_salud_array["nutricion"]["nutricion_18_60"]["imc"]["normal"] }} Personas</strong></li>
                <li>Delgadez: <strong>{{ $condiciones_salud_array["nutricion"]["nutricion_18_60"]["imc"]["delgadez"] }} Personas</strong></li>
            </ul> 
        </div>
        <div style="text-align: center; width: 100%">
            <h5>GRAFICA IMC </h5>
            <br>
            <img src="{{$chart_imc_18_60}}" style="width: 100%;height: auto;">
        </div>
        <br>
        <div>
            <br>
            <strong>6.3.2 Indice de Masa Corporal (Mujeres Embarazadas - Mayores de 18 años)</strong><br>
            <br>
            <ul>
                <li>Obesidad para la edad gestacional: <strong>{{ $condiciones_salud_array["nutricion"]["nutricion_18_60"]["imc_embarazadas"]["obesidad_gestacional"] }} Personas</strong></li>
                <li>Sobrepeso para la edad gestacional: <strong>{{ $condiciones_salud_array["nutricion"]["nutricion_18_60"]["imc_embarazadas"]["sobrepeso_gestacional"] }} Personas</strong></li>
                <li>IMC adecuado para la edad gestacional: <strong>{{ $condiciones_salud_array["nutricion"]["nutricion_18_60"]["imc_embarazadas"]["adecuado_gestacional"] }} Personas</strong></li>
                <li>Bajo peso para la edad gestacional: <strong>{{ $condiciones_salud_array["nutricion"]["nutricion_18_60"]["imc_embarazadas"]["bajo_peso_gestacional"] }} Personas</strong></li>
            </ul> 
        </div>
        <div style="text-align: center; width: 100%">
            <h5>GRAFICA IMC <br> (Mujeres Embarazadas - Mayores de 18 años) </h5>
            <br>
            <img src="{{$chart_imc_18_60_e}}" style="width: 100%;height: auto;">
        </div>
    </main>
</body>
</html>