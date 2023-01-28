<!DOCTYPE html>
<html lang="en">
<head>
    <title>Riesgo Salud - Enfermedades</title>
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
        <h2 style="color: #5578eb; margin: 2px">Reporte Riesgos de Salud - Gestantes</h2> 
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
        <div style="padding-top: 60px">
            <img src="{{$imagen1}}" style="width: 600px; height: 400px; float: left">
            <div style="float: left; text-align: center; width: 550px; height: 300px; padding-top: 40px">
                <h2>Atención Prenatal</h2>
                <img src="{{$grafico1}}" style="width: 550px; height: 300px">
            </div>
        </div>
        <div style="page-break-after:always;"></div>
        <div style="padding-top: 30px">
            <img src="{{$graficos}}" alt="grafico 1" style="width: 100%;height: auto;max-width: 100%;">
            <hr>
            <div>
                <h2 style="color: #5578eb; margin: 2px">{{$ente}}</h2>  
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
                <h2>Listado de Mujeres Embarazadas</h2>
                <br>
                <table class="table" style="width: 100%; font-size: 11px;">
                    <thead>
                        <tr>
                            <th>Identificacion</th>
                            <th>Nombre</th>
                            <th>Corregimeinto / Vereda</th>
                            <th>Barrio</th>
                            <th>Direccion</th>
                            <th>Atención Prenatal</th>
                            <th>Edad</th>
                            <th style="text-align: center;">VIH</th>
                            <th>Desescolarización</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($embarazadas as $item)
                        <tr>
                            <td>
                                {{$item["tipo_id"]}}: {{$item["identificacion"]}}
                            </td>
                            <td>
                                {{$item["nombre"]}}
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
                                {{$item["control_prenatal"]}}
                            </td>
                            <td>
                                {{$item["edad"]}} Años
                            </td>
                            <td>
                                {{$item["vih"]}}
                            </td>
                            <td>
                                {{$item["descolarizada"]}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table> 
            </div>
        </div>
        <div style="page-break-after:always;"></div>
        <div style="padding-top: 30px">
            <div>
                <h2 style="color: #5578eb; margin: 2px">{{$ente}}</h2>  
                <div>
                    @if (count($filtro["bcm"]) > 0)
                        <h3><b>Barrio - Cabecera Municipal: </b>{{$filtro["bcm"][0]["texto"]}}</h3>
                    @endif
                    @if (count($filtro["bc"]) > 0)
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
                <h2>Listado de Mujeres Lactantes</h2>
                <br>  
                <table class="table" style="width: 100%; font-size: 11px;">
                    <thead>
                        <tr>
                            <th>Identificacion</th>
                            <th>Nombre</th>
                            <th>Corregimeinto / Vereda</th>
                            <th>Barrio</th>
                            <th>Direccion</th>
                            <th>Lactante</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($lactantes as $item)
                        <tr>
                            <td>
                                {{$item["tipo_id"]}}: {{$item["identificacion"]}}
                            </td>
                            <td>
                                {{$item["nombre"]}}
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
                                {{$item["lactante"]}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table> 
            </div>
        </div>
    </main>
</body>
</html>