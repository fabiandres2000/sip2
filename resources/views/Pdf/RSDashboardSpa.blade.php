<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reporte Poblacional</title>
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
        <h1 style="color: #5578eb; margin: 2px">{{$ente}}</h1>  
        <h2 style="color: #5578eb; margin: 2px">Reporte Riesgos de Salud - Consumo de SPA</h2> 
        <div>
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
        </div>
        <hr>
        <div  style="padding-top: 100px">
            <div style="float: left; text-align: center; width: 550px !important; height: 300px">
                <h2>Población que consume SPA</h2>
                <h3>(Por tipo de consumo)</h3>
                <img src="{{$grafico1}}" style="width: 550px; height: 300px">
            </div>
            <div style="float: left; text-align: center; width: 550px !important; height: 300px">
                <h2>Población que consume SPA</h2>
                <h3>(Por Grupo de Edad)</h3>
                <img src="{{$grafico2}}" style="width: 550px; height: 300px">
            </div>
        </div>
        <div style="page-break-after:always;"></div>
        <div  style="padding-top: 150px">
            <div style="float: left; text-align: center; width: 600px !important; height: 300px">
                <h2>Población que consume SPA</h2>
                <h3>(Por tipo de consumo)</h3>
                <h3>(Poblaciónde 6 a 59 años)</h3>
                <img src="{{$grafico3}}" style="width: 600px; height: 300px">
            </div>
            <div style="float: left; text-align: center; width: 600px !important; height: 400px">
                <img src="{{$imagen1}}" style="width: 600px; height: 400px">
            </div>
        </div>
        <br>
        <br>
        <div style="page-break-after:always;"></div>
        <div>
            <div>
                <h1 style="color: #5578eb; margin: 2px">{{$ente}}</h1> 
                <h2 style="color: #5578eb; margin: 2px">Reporte Riesgos de Salud - Consumo de SPA</h2>  
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
                <hr>
            </div>  
            <h3>Personas que Consumen Sustancias Psicoactivas (SPA)</h3>
            <br>  
            <table class="table" style="width: 100%; font-size: 11px;">
                <thead>
                    <tr>
                        <th>Identificacion</th>
                        <th>Nombre</th>
                        <th>Sexo</th>
                        <th>Corregimeinto / Vereda</th>
                        <th>Barrio</th>
                        <th>Direccion</th>
                        <th style="text-align: center">Tipo de Consumo</th>
                        <th style="text-align: center">Grupo de Edad</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($data["array_de6a11"] as $item)
                    <tr>
                        <td>
                            {{$item["tipo_id"]}}: {{$item["identificacion"]}}
                        </td>
                        <td>
                            {{$item["nombre"]}}
                        </td>
                        <td>
                            {{$item["sexo"]}} 
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
                                @if ($item["sustanciaspsico"] != 'NO' && $item["sustanciaspsico"] != 'NA')
                                    <li>{{$item["sustanciaspsico"]}}</li>
                                @endif
                            </ul> 
                        </td>
                        <td style="text-align: center">6 a 11 Años</td>
                    </tr>
                @endforeach
                @foreach($data["array_de12a17"] as $item)
                    <tr>
                        <td>
                            {{$item["tipo_id"]}}: {{$item["identificacion"]}}
                        </td>
                        <td>
                            {{$item["nombre"]}}
                        </td>
                        <td>
                            {{$item["sexo"]}} 
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
                                @if ($item["spa"] != 'NO' && $item["spa"] != 'NA')
                                    <li>{{$item["spa"]}}</li>
                                @endif
                                @if (isset($item["consume_a"]))
                                    <li>{{$item["consume_a"]}}</li>
                                @endif
                                @if (isset($item["consume_t"]))
                                    <li>{{$item["consume_t"]}}</li>
                                @endif
                            </ul> 
                        </td>
                        <td style="text-align: center">12 a 17 Años</td>
                    </tr>
                @endforeach
                @foreach($data["array_de18a28"] as $item)
                    <tr>
                        <td>
                            {{$item["tipo_id"]}}: {{$item["identificacion"]}}
                        </td>
                        <td>
                            {{$item["nombre"]}}
                        </td>
                        <td>
                            {{$item["sexo"]}} 
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
                                @if ($item["spa"] != 'NO' && $item["spa"] != 'NA')
                                    <li>{{$item["spa"]}}</li>
                                @endif
                                @if (isset($item["consume_a"]))
                                    <li>{{$item["consume_a"]}}</li>
                                @endif
                                @if (isset($item["consume_t"]))
                                    <li>{{$item["consume_t"]}}</li>
                                @endif
                            </ul> 
                        </td>
                        <td style="text-align: center">18 a 28 Años</td>
                    </tr>
                @endforeach
                @foreach($data["array_de29a59"] as $item)
                    <tr>
                        <td>
                            {{$item["tipo_id"]}}: {{$item["identificacion"]}}
                        </td>
                        <td>
                            {{$item["nombre"]}}
                        </td>
                        <td>
                            {{$item["sexo"]}} 
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
                                @if ($item["spa"] != 'NO' && $item["spa"] != 'NA')
                                    <li>{{$item["spa"]}}</li>
                                @endif
                                @if (isset($item["consume_a"]))
                                    <li>{{$item["consume_a"]}}</li>
                                @endif
                                @if (isset($item["consume_t"]))
                                    <li>{{$item["consume_t"]}}</li>
                                @endif
                            </ul> 
                        </td>
                        <td style="text-align: center">29 a 59 Años</td>
                    </tr>
                @endforeach
                @foreach($data["array_de60"] as $item)
                    <tr>
                        <td>
                            {{$item["tipo_id"]}}: {{$item["identificacion"]}}
                        </td>
                        <td>
                            {{$item["nombre"]}}
                        </td>
                        <td>
                            {{$item["sexo"]}} 
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
                                @if ($item["glicemia"] != null)
                                    <li>{{$item["glicemia"]}}</li>
                                @endif
                                @if (isset($item["consume_a"]))
                                    <li>{{$item["consume_a"]}}</li>
                                @endif
                                @if (isset($item["consume_t"]))
                                    <li>{{$item["consume_t"]}}</li>
                                @endif
                            </ul> 
                        </td>
                        <td style="text-align: center">+ 60 Años</td>
                    </tr>
                @endforeach
                </tbody>
            </table> 
        </div>
    </main>
</body>
</html>