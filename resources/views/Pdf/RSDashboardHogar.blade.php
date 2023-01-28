<!DOCTYPE html>
<html lang="en">
<head>
    <title>Riesgo Salud</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="UTF-8">
    <style>
        @page { margin: 10px; }
        body { margin: 10px; }

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
            font-size: 20px;
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

        .kt-badge--warning {
            color: rgb(0, 0, 0);
            background: #ffb822;
        }

        .kt-badge--success {
            color: #fff;
            background: #28a745;
        }

        .kt-badge--danger {
            color: #fff;
            background: #dc3545;
        }

    </style>
</head>
<body>
    <footer>
        {{$ente}} - Fecha de reporte: <?php echo date("d/m/Y H:i:s");?> 
    </footer>
    <main>
        <h1 style="color: #5578eb; margin: 2px">{{$ente}}</h1>  
        <h2 style="color: #5578eb; margin: 2px">Reporte Riesgos de Salud - Hogares</h2> 
        <div>
            @if (count($filtro["bcm"]) > 0)
                <h3><b>Barrio - Cabecera Municipal: </b>{{$filtro["bcm"][0]["texto"]}}</h3>
            @endif
            @if (count($filtro["c"]) > 0)
                <h3><b>Corregimiento: </b>{{$filtro["c"][0]["descripcion"]}}</h3>
            @endif
            @if (count($filtro["bc"]) > 0)
                <h3><b>Barrio: </b>{{$filtro["bc"][0]["texto"]}}</h3>
            @endif
            @if (count($filtro["v"]) > 0)
                <h3><b>Vereda: </b>{{$filtro["v"][0]["descripcion"]}}</h3>
            @endif
            <br>
        </div>
        <hr>
        @if ($tipo_data == 1)
            <h4>HOGARES CON ALTO RIESGOS EN SALUD</h4>
        @endif
        @if ($tipo_data == 2)
            <h4>HOGARES CON RIESGO INFANTIL DE DESNUTRICIÓN</h4>
        @endif
        @if ($tipo_data == 3)
            <h4>HOGARES CON RIESGO DE DESNUTRICIÓN EN ADULTOS MAYORES</h4>  
        @endif
        @if ($tipo_data == 4)
            <h4>HOGARES CON RIESGOS DE CONSUMO DE SPA</h4>
        @endif
        @if ($tipo_data == 5)
            <h4>HOGARES CON RIESGOS DE VIOLENCIA</h4>
        @endif  
        @if ($tipo_data == 6)
            <h4>HOGARES CON NIÑOS EN OBESIDAD Y SOBREPESO</h4>
        @endif
        @if ($tipo_data == 7)
            <h4>HOGARES CON  INTEGRANTES MAYORES DE 12 AÑOS EN OBESIDAD Y SOBREPESO</h4>
        @endif 
       <br>
        <div style="text-align: center; padding-top: 100px">
            <img src="{{$grafica}}" alt="grafico 1" style="width: 50%;height: auto;max-width: 50%;">
        </div> 
        <div style="page-break-after:always;"></div>
        <div>
            <h1 style="color: #5578eb; margin: 2px">{{$ente}}</h1>  
            <h2 style="color: #5578eb; margin: 2px">Reporte Riesgos de Salud - Hogares</h2> 
            <div>
                @if (count($filtro["bcm"]) > 0)
                    <h3><b>Barrio - Cabecera Municipal: </b>{{$filtro["bcm"][0]["texto"]}}</h3>
                @endif
                @if (count($filtro["c"]) > 0)
                    <h3><b>Corregimiento: </b>{{$filtro["c"][0]["descripcion"]}}</h3>
                @endif
                @if (count($filtro["bc"]) > 0)
                    <h3><b>Barrio: </b>{{$filtro["bc"][0]["texto"]}}</h3>
                @endif
                @if (count($filtro["v"]) > 0)
                    <h3><b>Vereda: </b>{{$filtro["v"][0]["descripcion"]}}</h3>
                @endif
                <br>
            </div>
            <hr>  
            @if ($tipo_data == 1)
                <h4>HOGARES CON ALTO RIESGOS EN SALUD</h4>
                <br>  
                <table class="table" style="width: 100%; font-size: 11px;">
                    <thead>
                        <tr>
                            <th>Jefe</th>
                            <th>Corregimiento / Vereda</th>
                            <th>Barrio</th>
                            <th>Direccion</th>
                            <th># Integrantes</th>
                            <th style="text-align: center">Integrantes (Riesgo - ALto)</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $item)
                        <tr>
                            <td>
                                {{$item["tipo_id"]}}: {{$item["identificacion"]}} - {{$item["pnom"]}} {{$item["snom"]}} {{$item["pape"]}} {{$item["sape"]}}
                            </td>
                            <td>
                                {{$item["des_corr"] != "" ? $item["des_corr"] : "CASCO URBANO" }}
                            </td>
                            <td>
                                {{$item["des_barrio"]}}
                            </td>
                            <td>
                                {{$item["des_direc"]}}
                            </td>
                            <td>
                                {{$item["cantidad_personas"]}}
                            </td>
                            <td style="text-align: center">
                                <ul>
                                    @foreach ($item["riesgos_salud_men1"]["riesgosSaludAlto"] as $item2)
                                        <li>{{$item2["tipo_id"]}}: {{$item2["identificacion"]}} - {{$item2["pnom"]}} {{$item2["snom"]}} {{$item2["pape"]}} {{$item2["sape"]}}</li>
                                    @endforeach
                                    @foreach ($item["riesgos_salud_de1a5"]["riesgosSaludAlto"] as $item2)
                                        <li>{{$item2["tipo_id"]}}: {{$item2["identificacion"]}} - {{$item2["pnom"]}} {{$item2["snom"]}} {{$item2["pape"]}} {{$item2["sape"]}}</li>
                                    @endforeach
                                    @foreach ($item["riesgos_salud_de6a11"]["riesgosSaludAlto"] as $item2)
                                        <li>{{$item2["tipo_id"]}}: {{$item2["identificacion"]}} - {{$item2["pnom"]}} {{$item2["snom"]}} {{$item2["pape"]}} {{$item2["sape"]}}</li>
                                    @endforeach
                                    @foreach ($item["riesgos_salud_de12a17"]["riesgosSaludAlto"] as $item2)
                                        <li>{{$item2["tipo_id"]}}: {{$item2["identificacion"]}} - {{$item2["pnom"]}} {{$item2["snom"]}} {{$item2["pape"]}} {{$item2["sape"]}}</li>
                                    @endforeach
                                    @foreach ($item["riesgos_salud_de18a28"]["riesgosSaludAlto"] as $item2)
                                        <li>{{$item2["tipo_id"]}}: {{$item2["identificacion"]}} - {{$item2["pnom"]}} {{$item2["snom"]}} {{$item2["pape"]}} {{$item2["sape"]}}</li>
                                    @endforeach
                                    @foreach ($item["riesgos_salud_de29a59"]["riesgosSaludAlto"] as $item2)
                                        <li>{{$item2["tipo_id"]}}: {{$item2["identificacion"]}} - {{$item2["pnom"]}} {{$item2["snom"]}} {{$item2["pape"]}} {{$item2["sape"]}}</li>
                                    @endforeach
                                    @foreach ($item["riesgos_salud_de60"]["riesgosSaludAlto"] as $item2)
                                        <li>{{$item2["tipo_id"]}}: {{$item2["identificacion"]}} - {{$item2["pnom"]}} {{$item2["snom"]}} {{$item2["pape"]}} {{$item2["sape"]}}</li>
                                    @endforeach
                                </ul> 
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table> 
            @endif
            @if ($tipo_data == 2)
                <h4>HOGARES CON RIESGO INFANTIL DE DESNUTRICIÓN</h4>
                <br>  
                <table class="table" style="width: 100%; font-size: 11px;">
                    <thead>
                        <tr>
                            <th>Jefe</th>
                            <th>Corregimiento / Vereda</th>
                            <th>Barrio</th>
                            <th>Direccion</th>
                            <th># Integrantes</th>
                            <th style="text-align: center">Integrantes (Riesgo - ALto)</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $item)
                        <tr>
                            <td>
                                {{$item["tipo_id"]}}: {{$item["identificacion"]}} - {{$item["pnom"]}} {{$item["snom"]}} {{$item["pape"]}} {{$item["sape"]}}
                            </td>
                            <td>
                                {{$item["des_corr"] != "" ? $item["des_corr"] : "CASCO URBANO" }}
                            </td>
                            <td>
                                {{$item["des_barrio"]}}
                            </td>
                            <td>
                                {{$item["des_direc"]}}
                            </td>
                            <td>
                                {{$item["cantidad_personas"]}}
                            </td>
                            <td style="text-align: center">
                                <ul>
                                    @foreach ($item["riesgo_men1"]["riesgosSaludAlto"] as $item2)
                                        <li>{{$item2["tipo_id"]}}: {{$item2["identificacion"]}} - {{$item2["pnom"]}} {{$item2["snom"]}} {{$item2["pape"]}} {{$item2["sape"]}}</li>
                                    @endforeach
                                    @foreach ($item["riesgo_de1a5"]["riesgosSaludAlto"] as $item2)
                                        <li>{{$item2["tipo_id"]}}: {{$item2["identificacion"]}} - {{$item2["pnom"]}} {{$item2["snom"]}} {{$item2["pape"]}} {{$item2["sape"]}}</li>
                                    @endforeach
                                    @foreach ($item["riesgo_de6a11"]["riesgosSaludAlto"] as $item2)
                                        <li>{{$item2["tipo_id"]}}: {{$item2["identificacion"]}} - {{$item2["pnom"]}} {{$item2["snom"]}} {{$item2["pape"]}} {{$item2["sape"]}}</li>
                                    @endforeach
                                </ul> 
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table> 
            @endif
            @if ($tipo_data == 3)
                <h4>HOGARES CON RIESGO DE DESNUTRICIÓN EN ADULTOS MAYORES</h4>
                <br>
                <table class="table" style="width: 100%; font-size: 11px;">
                    <thead>
                        <tr>
                            <th>Jefe</th>
                            <th>Corregimiento / Vereda</th>
                            <th>Barrio</th>
                            <th>Direccion</th>
                            <th># Integrantes</th>
                            <th style="text-align: center">Integrantes (Riesgo - ALto)</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $item)
                        <tr>
                            <td>
                                {{$item["tipo_id"]}}: {{$item["identificacion"]}} - {{$item["pnom"]}} {{$item["snom"]}} {{$item["pape"]}} {{$item["sape"]}}
                            </td>
                            <td>
                                {{$item["des_corr"] != "" ? $item["des_corr"] : "CASCO URBANO" }}
                            </td>
                            <td>
                                {{$item["des_barrio"]}}
                            </td>
                            <td>
                                {{$item["des_direc"]}}
                            </td>
                            <td>
                                {{$item["cantidad_personas"]}}
                            </td>
                            <td style="text-align: center">
                                <ul>
                                    @foreach ($item["riesgo_de12a17"]["riesgosSaludAlto"] as $item2)
                                        <li>{{$item2["tipo_id"]}}: {{$item2["identificacion"]}} - {{$item2["pnom"]}} {{$item2["snom"]}} {{$item2["pape"]}} {{$item2["sape"]}}</li>
                                    @endforeach
                                    @foreach ($item["riesgo_de18a28"]["riesgosSaludAlto"] as $item2)
                                        <li>{{$item2["tipo_id"]}}: {{$item2["identificacion"]}} - {{$item2["pnom"]}} {{$item2["snom"]}} {{$item2["pape"]}} {{$item2["sape"]}}</li>
                                    @endforeach
                                    @foreach ($item["riesgo_de29a59"]["riesgosSaludAlto"] as $item2)
                                        <li>{{$item2["tipo_id"]}}: {{$item2["identificacion"]}} - {{$item2["pnom"]}} {{$item2["snom"]}} {{$item2["pape"]}} {{$item2["sape"]}}</li>
                                    @endforeach
                                </ul> 
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table> 
            @endif
            @if ($tipo_data == 4)
                <h4>HOGARES CON RIESGOS DE CONSUMO DE SPA</h4>
            @endif
            @if ($tipo_data == 5)
                <h4>HOGARES CON RIESGOS DE VIOLENCIA</h4>
            @endif
            @if ($tipo_data == 4 || $tipo_data == 5)
                <br>
                <table class="table" style="width: 100%; font-size: 11px;">
                    <thead>
                        <tr>
                            <th>Jefe</th>
                            <th>Corregimiento / Vereda</th>
                            <th>Barrio</th>
                            <th>Direccion</th>
                            <th># Integrantes</th>
                            <th style="text-align: center">Integrantes (Riesgo - ALto)</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $item)
                        <tr>
                            <td>
                                {{$item["tipo_id"]}}: {{$item["identificacion"]}} - {{$item["pnom"]}} {{$item["snom"]}} {{$item["pape"]}} {{$item["sape"]}}
                            </td>
                            <td>
                                {{$item["des_corr"] != "" ? $item["des_corr"] : "CASCO URBANO" }}
                            </td>
                            <td>
                                {{$item["des_barrio"]}}
                            </td>
                            <td>
                                {{$item["des_direc"]}}
                            </td>
                            <td>
                                {{$item["cantidad_personas"]}}
                            </td>
                            <td style="text-align: center">
                                <ul>
                                    @foreach ($item["riesgos_salud_men1"]["personas_riesgos_alto"] as $item2)
                                        <li>{{$item2["tipo_id"]}}: {{$item2["identificacion"]}} - {{$item2["pnom"]}} {{$item2["snom"]}} {{$item2["pape"]}} {{$item2["sape"]}}</li>
                                    @endforeach
                                    @foreach ($item["riesgos_salud_de1a5"]["personas_riesgos_alto"] as $item2)
                                        <li>{{$item2["tipo_id"]}}: {{$item2["identificacion"]}} - {{$item2["pnom"]}} {{$item2["snom"]}} {{$item2["pape"]}} {{$item2["sape"]}}</li>
                                    @endforeach
                                    @foreach ($item["riesgos_salud_de6a11"]["personas_riesgos_alto"] as $item2)
                                        <li>{{$item2["tipo_id"]}}: {{$item2["identificacion"]}} - {{$item2["pnom"]}} {{$item2["snom"]}} {{$item2["pape"]}} {{$item2["sape"]}}</li>
                                    @endforeach
                                    @foreach ($item["riesgos_salud_de12a17"]["personas_riesgos_alto"] as $item2)
                                        <li>{{$item2["tipo_id"]}}: {{$item2["identificacion"]}} - {{$item2["pnom"]}} {{$item2["snom"]}} {{$item2["pape"]}} {{$item2["sape"]}}</li>
                                    @endforeach
                                    @foreach ($item["riesgos_salud_de18a28"]["personas_riesgos_alto"] as $item2)
                                        <li>{{$item2["tipo_id"]}}: {{$item2["identificacion"]}} - {{$item2["pnom"]}} {{$item2["snom"]}} {{$item2["pape"]}} {{$item2["sape"]}}</li>
                                    @endforeach
                                    @foreach ($item["riesgos_salud_de29a59"]["personas_riesgos_alto"] as $item2)
                                        <li>{{$item2["tipo_id"]}}: {{$item2["identificacion"]}} - {{$item2["pnom"]}} {{$item2["snom"]}} {{$item2["pape"]}} {{$item2["sape"]}}</li>
                                    @endforeach
                                    @foreach ($item["riesgos_salud_de60"]["personas_riesgos_alto"] as $item2)
                                        <li>{{$item2["tipo_id"]}}: {{$item2["identificacion"]}} - {{$item2["pnom"]}} {{$item2["snom"]}} {{$item2["pape"]}} {{$item2["sape"]}}</li>
                                    @endforeach
                                </ul> 
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table> 
            @endif 
            @if ($tipo_data == 6)
                <h4>HOGARES CON NIÑOS EN OBESIDAD Y SOBREPESO</h4>
                <br>
                <table class="table" style="width: 100%; font-size: 11px;">
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
                    @foreach($data as $item)
                        <tr>
                            <td>
                                {{$item["tipo_id"]}}: {{$item["identificacion"]}} - {{$item["pnom"]}} {{$item["snom"]}} {{$item["pape"]}} {{$item["sape"]}}
                            </td>
                            <td>
                                {{$item["des_corr"] != "" ? $item["des_corr"] : "CASCO URBANO" }}
                            </td>
                            <td>
                                {{$item["des_barrio"]}}
                            </td>
                            <td>
                                {{$item["des_direc"]}}
                            </td>
                            <td style="text-align: center">
                                <ul>
                                    @foreach ($item["men1a"]["personas_obesidad"] as $item2)
                                        <li>{{$item2["tipo_id"]}}: {{$item2["identificacion"]}} - {{$item2["pnom"]}} {{$item2["snom"]}} {{$item2["pape"]}} {{$item2["sape"]}}</li>
                                    @endforeach
                                    @foreach ($item["de1a5"]["personas_obesidad"] as $item2)
                                        <li>{{$item2["tipo_id"]}}: {{$item2["identificacion"]}} - {{$item2["pnom"]}} {{$item2["snom"]}} {{$item2["pape"]}} {{$item2["sape"]}}</li>
                                    @endforeach
                                    @foreach ($item["de6a11"]["personas_obesidad"] as $item2)
                                        <li>{{$item2["tipo_id"]}}: {{$item2["identificacion"]}} - {{$item2["pnom"]}} {{$item2["snom"]}} {{$item2["pape"]}} {{$item2["sape"]}}</li>
                                    @endforeach
                                    @foreach ($item["men1a"]["personas_sobrepeso"] as $item2)
                                        <li>{{$item2["tipo_id"]}}: {{$item2["identificacion"]}} - {{$item2["pnom"]}} {{$item2["snom"]}} {{$item2["pape"]}} {{$item2["sape"]}}</li>
                                    @endforeach
                                    @foreach ($item["de1a5"]["personas_sobrepeso"] as $item2)
                                        <li>{{$item2["tipo_id"]}}: {{$item2["identificacion"]}} - {{$item2["pnom"]}} {{$item2["snom"]}} {{$item2["pape"]}} {{$item2["sape"]}}</li>
                                    @endforeach
                                    @foreach ($item["de6a11"]["personas_sobrepeso"] as $item2)
                                        <li>{{$item2["tipo_id"]}}: {{$item2["identificacion"]}} - {{$item2["pnom"]}} {{$item2["snom"]}} {{$item2["pape"]}} {{$item2["sape"]}}</li>
                                    @endforeach
                                </ul> 
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
            @if ($tipo_data == 7)
                <h4>HOGARES CON  INTEGRANTES MAYORES DE 12 AÑOS EN OBESIDAD Y SOBREPESO</h4>
                <br>
                <table class="table" style="width: 100%; font-size: 11px;">
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
                    @foreach($data as $item)
                        <tr>
                            <td>
                                {{$item["tipo_id"]}}: {{$item["identificacion"]}} - {{$item["pnom"]}} {{$item["snom"]}} {{$item["pape"]}} {{$item["sape"]}}
                            </td>
                            <td>
                                {{$item["des_corr"] != "" ? $item["des_corr"] : "CASCO URBANO" }}
                            </td>
                            <td>
                                {{$item["des_barrio"]}}
                            </td>
                            <td>
                                {{$item["des_direc"]}}
                            </td>
                            <td style="text-align: center">
                                <ul>
                                    @foreach ($item["de12a17"]["personas_obesidad"] as $item2)
                                        <li>{{$item2["tipo_id"]}}: {{$item2["identificacion"]}} - {{$item2["pnom"]}} {{$item2["snom"]}} {{$item2["pape"]}} {{$item2["sape"]}}</li>
                                    @endforeach
                                    @foreach ($item["de18a28"]["personas_obesidad"] as $item2)
                                        <li>{{$item2["tipo_id"]}}: {{$item2["identificacion"]}} - {{$item2["pnom"]}} {{$item2["snom"]}} {{$item2["pape"]}} {{$item2["sape"]}}</li>
                                    @endforeach
                                    @foreach ($item["de29a59"]["personas_obesidad"] as $item2)
                                        <li>{{$item2["tipo_id"]}}: {{$item2["identificacion"]}} - {{$item2["pnom"]}} {{$item2["snom"]}} {{$item2["pape"]}} {{$item2["sape"]}}</li>
                                    @endforeach
                                    @foreach ($item["de60"]["personas_obesidad"] as $item2)
                                        <li>{{$item2["tipo_id"]}}: {{$item2["identificacion"]}} - {{$item2["pnom"]}} {{$item2["snom"]}} {{$item2["pape"]}} {{$item2["sape"]}}</li>
                                    @endforeach
                                    @foreach ($item["de12a17"]["personas_sobrepeso"] as $item2)
                                        <li>{{$item2["tipo_id"]}}: {{$item2["identificacion"]}} - {{$item2["pnom"]}} {{$item2["snom"]}} {{$item2["pape"]}} {{$item2["sape"]}}</li>
                                    @endforeach
                                    @foreach ($item["de18a28"]["personas_sobrepeso"] as $item2)
                                        <li>{{$item2["tipo_id"]}}: {{$item2["identificacion"]}} - {{$item2["pnom"]}} {{$item2["snom"]}} {{$item2["pape"]}} {{$item2["sape"]}}</li>
                                    @endforeach
                                    @foreach ($item["de29a59"]["personas_sobrepeso"] as $item2)
                                        <li>{{$item2["tipo_id"]}}: {{$item2["identificacion"]}} - {{$item2["pnom"]}} {{$item2["snom"]}} {{$item2["pape"]}} {{$item2["sape"]}}</li>
                                    @endforeach
                                    @foreach ($item["de60"]["personas_sobrepeso"] as $item2)
                                        <li>{{$item2["tipo_id"]}}: {{$item2["identificacion"]}} - {{$item2["pnom"]}} {{$item2["snom"]}} {{$item2["pape"]}} {{$item2["sape"]}}</li>
                                    @endforeach
                                </ul> 
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>   
    </main> 
</body>
</html>