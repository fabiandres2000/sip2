<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mercado Laboral</title>
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
        <h2 style="color: #5578eb; margin: 2px">Mercado Laboral</h2>  
        <div style="margin-top: 200px">
            <img src="{{$porcentajes}}" alt="grafico 1" style="width: 100%;height: auto;max-width: 100%;">
        </div>
        <div style="page-break-after:always;"></div>
        <div style="text-align: center">
            <h2>Tasa de Ocupación</h2>
            <h4>(Por Tipo de Empleo)</h4>
            <img src="{{$torta1}}" alt="grafico 1" style="width: 50%;height: auto;max-width: 50%;">
        </div>
        <div style="padding: 10px">
            <h2>Tasa de Ocupación (Por Corregimiento)</h2>
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
                            # Personas Ocupadas
                        </th>
                        <th>
                            # Personas ET	
                        </th>
                        <th>
                            Tasa Ocupación
                        </th>
                    </tr>
                </thead>
                <tbody>
                @foreach($topc as $item)
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
                            {{ round($item["tasa_ocupacion"], 2) }} %
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>    
        </div>    
        <div style="page-break-after:always;"></div>
        <div style="text-align: center">
            <h2>Porcentaje de Población</h2>
            <h4>(Por Tipo de Empleo)</h4>
            <img src="{{$torta2}}" alt="grafico 1" style="width: 50%;height: auto;max-width: 50%;">
        </div>
        <br>
        <div>
            <h2>Numero de Personas (Por Tipo de Empleo)</h2>
            <br>  
            <table class="table" style="width: 100%; font-size: 13px">
                <thead>
                    <tr>
                        <th>Tipo de empleo</th>
                        <th># Personas Ocupadas</th>
                    </tr>
                </thead>
                <tbody>  
                    <tr>
                        <td>Empleo Formal</td>
                        <td>{{$tasaOcupacion["personasEmpleoFormal"]}}</td>
                    </tr>
                    <tr>
                        <td>Empleo Informal</td>
                        <td>{{$tasaOcupacion["personasEmpleoInformal"]}}</td>
                    </tr>
                    <tr>
                        <td>Independiente</td>
                        <td>{{$tasaOcupacion["personasEmpleoIndependiente"]}}</td>
                    </tr>   
                    <tr>
                        <td>Sin Empleo</td>
                        <td>{{$tasaOcupacion["personasSinEmpleo"]}}</td>
                    </tr>
                    <tr>
                        <td>NA</td>
                        <td>{{$tasaOcupacion["personasNA"]}}</td>
                    </tr>
                </tbody>
            </table>    
        </div>
        <div style="page-break-after:always;"></div>
        <div style="text-align: center">
            <h2>Poblacion Economicamente Activa</h2>
            <img src="{{$torta3}}" alt="grafico 1" style="width: 50%;height: auto;max-width: 50%;">
        </div>
        <br>
        <div style="padding: 10px">
            <h2>Poblacion Economicamente Activa</h2>
            <h4>(Por Corregimiento)</h4>
            <br>  
            <table class="table" style="width: 100%; font-size: 13px">
                <thead>  
                    <tr>
                        <th>N0</th>
                        <th>Corregimiento</th>
                        <th>#Personas</th>
                    </tr>  
                </thead>
                <tbody>
                @foreach($PAE["porCorregimeinto"] as $item)
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
                    </tr>
                @endforeach
                </tbody>
            </table>    
        </div>
        <div style="page-break-after:always;"></div>
        <div style="text-align: center">
            <h2>Poblacion en Edad para Trabajar</h2>
            <img src="{{$torta4}}" alt="grafico 1" style="width: 50%;height: auto;max-width: 50%;">
        </div>
        <br>
        <div style="padding: 10px">
            <h2>Poblacion en Edad para Trabajar</h2>
            <h4>(Por Corregimiento)</h4>
            <br>  
            <table class="table" style="width: 100%; font-size: 13px">
                <thead>  
                    <tr>
                        <th>N0</th>
                        <th>Corregimiento</th>
                        <th>#Personas</th>
                    </tr>  
                </thead>
                <tbody>
                @foreach($PET["porCorregimeinto"] as $item)
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
                    </tr>
                @endforeach
                </tbody>
            </table>    
        </div>
    </main>
</body>
</html>