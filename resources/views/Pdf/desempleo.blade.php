<!DOCTYPE html>
<html lang="en">
<head>
    <title>Desempleo</title>
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
    </style>
</head>
<body>
    <footer>
        {{$ente}} - Fecha de reporte: <?php echo date("d/m/Y H:i:s");?> 
    </footer>
    <main>
        <h1 style="color: #5578eb; margin: 2px">{{$ente}}</h1>  
        <h2 style="color: #5578eb; margin: 2px">Reporte de Desempleo</h2>  
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
        <div style="margin-top: 200px">
            <img src="{{$porcentajes}}" alt="grafico 1" style="width: 100%;height: auto;max-width: 100%;">
        </div>
        <div style="page-break-after:always;"></div>
        @if ($tipo == 1)
            <div style="text-align: center">
                <h2>Top 5 corregimientos con mayor tasa de desempleo</h2>
                <img src="{{$torta1}}" alt="grafico 1" style="width: 50%;height: auto;max-width: 50%;">
            </div>
        @endif
        @if ($tipo == 1)
            <div style="text-align: center;">
                <h2>Porcentaje de Desempleados</h2>
                <h4>(Por grupo de edad)</h4>
                <img src="{{$torta2}}" alt="grafico 1" style="width: 50%;height: auto;max-width: 50%;">
            </div>
        @else
            <div style="text-align: center; padding-top: 200px">
                <h2>Porcentaje de Desempleados</h2>
                <h4>(Por grupo de edad)</h4>
                <img src="{{$torta2}}" alt="grafico 1" style="width: 100%;height: auto;max-width: 100%;">
            </div>
        @endif
        @if ($tipo == 1)
        <div style="page-break-after:always;"></div>
            <div style="padding: 10px">
                <h2>Tasa de desempleo por corregimiento</h2>
                <br>  
                <table class="table" style="width: 100%; font-size: 13px">
                    <thead>
                        <tr>
                            <th>
                                No
                            </th>
                            <th>
                                Corregimiento
                            </th>
                            <th>
                                # Personas Desempleadas
                            </th>
                            <th>
                                # Personas FT
                            </th>
                            <th>
                                Tasa de Desempleo
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $item)
                        <tr>
                            <td>
                                {{$loop->iteration}}
                            </td>
                            <td>
                                {{$item["localizacion"]==""?'CASCO URBANO':$item["localizacion"]}}
                            </td>
                            <td>
                                {{$item["numero_personas"]}}
                            </td>
                            <td>
                                {{$item["personas_edad_trabajo"]}}
                            </td>
                            <td>
                                {{ round($item["tasa_odesempleo"], 2) }} %
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>    
            </div>   
        @endif 
    </main>
</body>
</html>