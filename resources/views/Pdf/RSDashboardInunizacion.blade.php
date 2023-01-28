<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reporte Riesgos de Salud - Inmunizacion</title>
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
            text-align: left;
            background-color: #fff;
            color: #646c9a;
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
            color: black;
            text-align: right;
            line-height: 35px;
            font-style: italic;
        }
    </style>
</head>
<body>
    <footer>
        {{$ente}} - Fecha de reporte: <?php echo date("d/m/Y H:i:s");?> 
    </footer>
    <main>
        @if ($tipo == "men1a")
            <h1 style="color: #5578eb; margin: 2px">{{$ente}}</h1>  
            <h2 style="color: #5578eb; margin: 2px">Reporte Riesgos de Salud - Inmunizacion</h2> 
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
                <h3><b>Grupo de Edad: </b>{{$filtro2["grupo"]}}</h3>
            </div>
            <hr>
            <div style="padding-top: 10px">
                <img src="{{$graficos['fila1']}}" alt="grafico 1" style="width: 100%;height: auto;max-width: 100%;">
            </div>
            <div style="padding-top: 10px">
                <img src="{{$graficos['fila2']}}" style="width: 360px; height: 250px; float: left">
                <img src="{{$graficos['fila3']}}" style="width: 360px; height: 250px; float: left">
                <div style="float: left; text-align: center; width: 380px; height: 240px">
                    <h4>Niños en riesgos de desnutrición <br> con esquema de vacunación incompleto</h4>
                    <img src="{{$graficos['fila4']}}" style="width: 400px; height: 220px">
                </div>
            </div>
            <div style="page-break-after:always;"></div>
            <div>
                <h3 style="color: #5578eb; margin: 2px">({{$ente}})</h3>  
                <h4>Niños menores de 1 años sin vacuna BGC</h4>
                <br>  
                <table class="table" style="width: 100%; font-size: 11px;">
                    <thead>
                        <tr>
                            <th>Identificacion</th>
                            <th>Nombre</th>
                            <th>Edad (Meses)</th>
                            <th>Corregimeinto / Vereda</th>
                            <th>Barrio</th>
                            <th>Direccion</th>
                            <th style="text-align: center">BCG	</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data["sin_bcg_array"] as $item)
                        <tr>
                            <td>
                                {{$item["tipo_id"]}}: {{$item["identificacion"]}}
                            </td>
                            <td>
                                {{$item["nombre"]}}
                            </td>
                            <td>
                                {{$item["edad"]}}
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
                                {{$item["bcg"]}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table> 
            </div>
            <div style="page-break-after:always;"></div>
            <div>
                <h3 style="color: #5578eb; margin: 2px">({{$ente}})</h3>  
                <h4>Niños menores de 1 años sin vacuna de polio</h4>
                <br>  
                <table class="table" style="width: 100%; font-size: 11px;">
                    <thead>
                        <tr>
                            <th>Identificacion</th>
                            <th>Nombre</th>
                            <th>Edad (Meses)</th>
                            <th>Corregimeinto / Vereda</th>
                            <th>Barrio</th>
                            <th>Direccion</th>
                            <th style="text-align: center">Polio</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data["sin_polio_array"] as $item)
                        <tr>
                            <td>
                                {{$item["tipo_id"]}}: {{$item["identificacion"]}}
                            </td>
                            <td>
                                {{$item["nombre"]}}
                            </td>
                            <td>
                                {{$item["edad"]}}
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
                                {{$item["polio"]}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table> 
            </div>
            <div style="page-break-after:always;"></div>
            <div>
                <h3 style="color: #5578eb; margin: 2px">({{$ente}})</h3>  
                <h4>Niños menores de 1 años con esquema completo de pentavalente</h4>
                <br>  
                <table class="table" style="width: 100%; font-size: 11px;">
                    <thead>
                        <tr>
                            <th>Identificacion</th>
                            <th>Nombre</th>
                            <th>Edad (Meses)</th>
                            <th>Corregimeinto / Vereda</th>
                            <th>Barrio</th>
                            <th>Direccion</th>
                            <th style="text-align: center">Pentavalente	</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data["esquema_completo_pentavalente_array"] as $item)
                        <tr>
                            <td>
                                {{$item["tipo_id"]}}: {{$item["identificacion"]}}
                            </td>
                            <td>
                                {{$item["nombre"]}}
                            </td>
                            <td>
                                {{$item["edad"]}}
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
                                {{$item["pentavalente"]}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table> 
            </div>
            <div style="page-break-after:always;"></div>
            <div>
                <h3 style="color: #5578eb; margin: 2px">({{$ente}})</h3>  
                <h4>Niños menores de 1 años con esquema incompleto de pentavalente</h4>
                <br>  
                <table class="table" style="width: 100%; font-size: 11px;">
                    <thead>
                        <tr>
                            <th>Identificacion</th>
                            <th>Nombre</th>
                            <th>Edad (Meses)</th>
                            <th>Corregimeinto / Vereda</th>
                            <th>Barrio</th>
                            <th>Direccion</th>
                            <th style="text-align: center">Pentavalente	</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data["esquema_icompleto_pentavalente_array"] as $item)
                        <tr>
                            <td>
                                {{$item["tipo_id"]}}: {{$item["identificacion"]}}
                            </td>
                            <td>
                                {{$item["nombre"]}}
                            </td>
                            <td>
                                {{$item["edad"]}}
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
                                {{$item["pentavalente"]}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table> 
            </div>
            <div style="page-break-after:always;"></div>
            <div>
                <h3 style="color: #5578eb; margin: 2px">({{$ente}})</h3>  
                <h4>Niños menores de 1 años con esquema completo de polio</h4>
                <br>  
                <table class="table" style="width: 100%; font-size: 11px;">
                    <thead>
                        <tr>
                            <th>Identificacion</th>
                            <th>Nombre</th>
                            <th>Edad (Meses)</th>
                            <th>Corregimeinto / Vereda</th>
                            <th>Barrio</th>
                            <th>Direccion</th>
                            <th style="text-align: center">Polio</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data["esquema_completo_polio_array"] as $item)
                        <tr>
                            <td>
                                {{$item["tipo_id"]}}: {{$item["identificacion"]}}
                            </td>
                            <td>
                                {{$item["nombre"]}}
                            </td>
                            <td>
                                {{$item["edad"]}}
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
                                {{$item["polio"]}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table> 
            </div>
            <div style="page-break-after:always;"></div>
            <br>
            <div>
                <h3 style="color: #5578eb; margin: 2px">({{$ente}})</h3>  
                <h4>Niños en riesgos de desnutrición con esquema de vacunación incompleto</h4>
                <br>  
                <table class="table" style="width: 100%; font-size: 11px;">
                    <thead>
                        <tr>
                            <th>Identificacion</th>
                            <th>Nombre</th>
                            <th>Edad (Meses)</th>
                            <th>Corregimeinto / Vereda</th>
                            <th>Barrio</th>
                            <th>Direccion</th>
                            <th style="text-align: center">Desnutrición Aguda</th>
                            <th style="text-align: center">Desnutrición Global</th>
                            <th style="text-align: center">Carnet Desactualizado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data["desnutricion_carnet_desac_array"] as $item)
                        <tr>
                            <td>
                                {{$item["tipo_id"]}}: {{$item["identificacion"]}}
                            </td>
                            <td>
                                {{$item["nombre"]}}
                            </td>
                            <td>
                                {{$item["edad"]}}
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
                                {{($item['riesgos_desnutricion_aguda_R'] == '0' || $item['riesgos_desnutricion_aguda_R']  == '1') ? 'BAJO' : (($item['riesgos_desnutricion_aguda_R']  == '2' || $item['riesgos_desnutricion_aguda_R']  == '3') ? 'MODERADO': 'ALTO' )}}
                            </td>
                            <td style="text-align: center">
                                {{($item['riesgos_desnutricion_global_R'] == '0' || $item['riesgos_desnutricion_global_R']  == '1') ? 'BAJO' : (($item['riesgos_desnutricion_global_R']  == '2' || $item['riesgos_desnutricion_global_R']  == '3') ? 'MODERADO': 'ALTO' )}}
                            </td>
                            <td style="text-align: center">
                                Desactualizado
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table> 
            </div>
        @endif 
        @if ($tipo == "de1a5")
            <h1 style="color: #5578eb; margin: 2px">{{$ente}}</h1>  
            <h2 style="color: #5578eb; margin: 2px">Reporte Riesgos de Salud - Inmunizacion</h2> 
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
                <h3><b>Grupo de Edad: </b>{{$filtro2["grupo"]}}</h3>
            </div>
            <hr>
            <div style="padding-top: 10px">
                <img src="{{$graficos['fila1']}}" alt="grafico 1" style="width: 100%;height: auto;max-width: 100%;">
            </div>
            <br>
            <div style="padding-top: 10px">
                <div style="float: left; text-align: center; width: 360px; height: 240px">
                    <h4>Niños de 1 a 5 años <br> Vacuna de Polio</h4>
                    <img src="{{$graficos['fila2']}}" style="width: 380px; height: 210px">
                </div>
                <div style="float: left; text-align: center; width: 360px; height: 240px">
                    <h4>Niños de 1 a 5 años <br> Vacuna de Pentavalente</h4>
                    <img src="{{$graficos['fila3']}}" style="width: 380px; height: 210px">
                </div>
                <div style="float: left; text-align: center; width: 360px; height: 240px">
                    <h4>Niños en riesgos de desnutrición con  <br> esquema de vacunación incompleto</h4>
                    <img src="{{$graficos['fila3']}}" style="width: 380px; height: 210px">
                </div>
            </div>
            <div style="page-break-after:always;"></div>
            <div>
                <h2 style="color: #5578eb; margin: 2px">{{$ente}}</h2>  
                <h3>Niños 1 a 5 años con esquema de vacunación incompleto</h3>
                <br>  
                <table class="table" style="width: 100%; font-size: 11px;">
                    <thead>
                        <tr>
                            <th>Identificacion</th>
                            <th>Nombre</th>
                            <th>Edad (Meses)</th>
                            <th>Corregimeinto / Vereda</th>
                            <th>Barrio</th>
                            <th>Direccion</th>
                            <th style="text-align: center">Carnet</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data["personas"] as $item)
                            @if ($item["carnet"] == "DESAC")
                            <tr>
                                    <td>
                                        {{$item["tipo_id"]}}: {{$item["identificacion"]}}
                                    </td>
                                    <td>
                                        {{$item["nombre"]}}
                                    </td>
                                    <td>
                                        {{$item["edad"]}}
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
                                        Desactualizado
                                    </td>
                                </tr> 
                            @endif 
                        @endforeach
                    </tbody>
                </table> 
            </div>
            <div style="page-break-after:always;"></div>
            <div>
                <h2 style="color: #5578eb; margin: 2px">{{$ente}}</h2>  
                <h3>Niños 1 a 5 años con esquema de (sarampión, Rubeola, Papera) completo</h3>
                <br>  
                <table class="table" style="width: 100%; font-size: 11px;">
                    <thead>
                        <tr>
                            <th>Identificacion</th>
                            <th>Nombre</th>
                            <th>Edad (Meses)</th>
                            <th>Corregimeinto / Vereda</th>
                            <th>Barrio</th>
                            <th>Direccion</th>
                            <th style="text-align: center">SRP</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data["personas"] as $item)
                            @if ($item["tripleviral"] == "1R")
                            <tr>
                                    <td>
                                        {{$item["tipo_id"]}}: {{$item["identificacion"]}}
                                    </td>
                                    <td>
                                        {{$item["nombre"]}}
                                    </td>
                                    <td>
                                        {{$item["edad"]}}
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
                                        {{$item["tripleviral"]}}
                                    </td>
                                </tr> 
                            @endif 
                        @endforeach
                    </tbody>
                </table> 
            </div>
            <div style="page-break-after:always;"></div>
            <div>
                <h2 style="color: #5578eb; margin: 2px">{{$ente}}</h2>  
                <h3>Niños de 1 año con esquema de neumococo completo</h3>
                <br>  
                <table class="table" style="width: 100%; font-size: 11px;">
                    <thead>
                        <tr>
                            <th>Identificacion</th>
                            <th>Nombre</th>
                            <th>Edad (Meses)</th>
                            <th>Corregimeinto / Vereda</th>
                            <th>Barrio</th>
                            <th>Direccion</th>
                            <th style="text-align: center">Neumococo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data["personas_1_anio"] as $item)
                            @if ($item["neumococo"] == "R1")
                            <tr>
                                    <td>
                                        {{$item["tipo_id"]}}: {{$item["identificacion"]}}
                                    </td>
                                    <td>
                                        {{$item["nombre"]}}
                                    </td>
                                    <td>
                                        {{$item["edad"]}}
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
                                        {{$item["neumococo"]}}
                                    </td>
                                </tr> 
                            @endif 
                        @endforeach
                    </tbody>
                </table> 
            </div>
            <div style="page-break-after:always;"></div>
            <div>
                <h2 style="color: #5578eb; margin: 2px">{{$ente}}</h2>  
                <h3>Niños 1 a 5 años (Vacuna de Polio)</h3>
                <br>  
                <table class="table" style="width: 100%; font-size: 11px;">
                    <thead>
                        <tr>
                            <th>Identificacion</th>
                            <th>Nombre</th>
                            <th>Edad (Meses)</th>
                            <th>Corregimeinto / Vereda</th>
                            <th>Barrio</th>
                            <th>Direccion</th>
                            <th style="text-align: center">Polio (Dosis)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data["personas"] as $item)
                            <tr>
                                <td>
                                    {{$item["tipo_id"]}}: {{$item["identificacion"]}}
                                </td>
                                <td>
                                    {{$item["nombre"]}}
                                </td>
                                <td>
                                    {{$item["edad"]}}
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
                                    {{$item["polio"]}}
                                </td>
                            </tr> 
                        @endforeach
                    </tbody>
                </table> 
            </div>
            <div style="page-break-after:always;"></div>
            <div>
                <h2 style="color: #5578eb; margin: 2px">{{$ente}}</h2>  
                <h3>Niños 1 a 5 años (Vacuna de Pentavalente)</h3>
                <br>  
                <table class="table" style="width: 100%; font-size: 11px;">
                    <thead>
                        <tr>
                            <th>Identificacion</th>
                            <th>Nombre</th>
                            <th>Edad (Meses)</th>
                            <th>Corregimeinto / Vereda</th>
                            <th>Barrio</th>
                            <th>Direccion</th>
                            <th style="text-align: center">Pentavalente (Dosis)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data["personas"] as $item)
                            <tr>
                                <td>
                                    {{$item["tipo_id"]}}: {{$item["identificacion"]}}
                                </td>
                                <td>
                                    {{$item["nombre"]}}
                                </td>
                                <td>
                                    {{$item["edad"]}}
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
                                    {{$item["pentavalente"]}}
                                </td>
                            </tr> 
                        @endforeach
                    </tbody>
                </table> 
            </div>
            <div style="page-break-after:always;"></div>
            <div>
                <h2 style="color: #5578eb; margin: 2px">{{$ente}}</h2>  
                <h3>Niños en riesgos de desnutrición con esquema de vacunación incompleto</h3>
                <br>  
                <table class="table" style="width: 100%; font-size: 11px;">
                    <thead>
                        <tr>
                            <th>Identificacion</th>
                            <th>Nombre</th>
                            <th>Edad (Meses)</th>
                            <th>Corregimeinto / Vereda</th>
                            <th>Barrio</th>
                            <th>Direccion</th>
                            <th style="text-align: center">Desnutrición Aguda</th>
                            <th style="text-align: center">Desnutrición Global</th>
                            <th style="text-align: center">Carnet Desactualizado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data["personas"] as $item)
                            @if ($item["carnet"] == "DESAC" && (($item["riesgos_desnutricion_aguda_R"] =="4" || $item["riesgos_desnutricion_aguda_R"] =="5") || ($item["riesgos_desnutricion_global_R"] =="4" || $item["riesgos_desnutricion_global_R"] =="5")))
                                <tr>
                                    <td>
                                        {{$item["tipo_id"]}}: {{$item["identificacion"]}}
                                    </td>
                                    <td>
                                        {{$item["nombre"]}}
                                    </td>
                                    <td>
                                        {{$item["edad"]}}
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
                                        {{($item['riesgos_desnutricion_aguda_R'] == '0' || $item['riesgos_desnutricion_aguda_R']  == '1') ? 'BAJO' : (($item['riesgos_desnutricion_aguda_R']  == '2' || $item['riesgos_desnutricion_aguda_R']  == '3') ? 'MODERADO': 'ALTO' )}}
                                    </td>
                                    <td style="text-align: center">
                                        {{($item['riesgos_desnutricion_global_R'] == '0' || $item['riesgos_desnutricion_global_R']  == '1') ? 'BAJO' : (($item['riesgos_desnutricion_global_R']  == '2' || $item['riesgos_desnutricion_global_R']  == '3') ? 'MODERADO': 'ALTO' )}}
                                    </td>
                                    <td style="text-align: center">
                                        Desactualizado
                                    </td>
                                </tr> 
                            @endif
                        @endforeach
                    </tbody>
                </table> 
            </div>
        @endif  
    </main>
</body>
</html>