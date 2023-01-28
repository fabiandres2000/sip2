<html>

<head>
    <meta charset="utf-8" />
    <title>
        Reporte Nutricional
    </title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
        <div class="row">
            <div class="col-sm-12">
                <h1 style="color: #5578eb; margin: 2px">{{$ente}}</h1>
                <h4>Reporte Nutricional</h4>
                <h5><b>Grupo de edades:</b> {{ $grupo }}</h5>
            </div>
        </div>
        <div class="row">
            <div class=" col-sm-12">
                <table class="table" style="width: 100%; font-size: 12px;">
                    <thead>
                        <tr>
                            <th style="text-align: center;">
                                No
                            </th>
                            <th style="text-align: center;">
                                Identificación
                            </th>
                            <th style="text-align: center;">
                                Nombre
                            </th>
                            <th style="text-align: center;">
                                Sexo
                            </th>
                            <th style="text-align: center;">
                                Edad
                            </th>                    
                            <th style="text-align: center;">
                                Localización
                            </th>
                            <th style="text-align: center;">
                                Inst. Educativo
                            </th>
                            <th style="text-align: center;">
                                Enfermedad
                            </th>
                            <th style="text-align: center;">
                                Eps
                            </th>
                        </tr>
        
                    </thead>
                    <tbody>
                        @foreach ($nutricional as $viv)
                            <tr>
                                <td style="text-align: center;font-weight: bold;vertical-align: middle;">
                                    {{ $loop->iteration }}
                                </td>
                                <td
                                    style="text-align: center;font-weight: normal;vertical-align: middle;text-transform: capitalize;">
                                    {{ $viv->identificacion }}
                                </td>
                                <td
                                    style="text-align: center;font-weight: normal;vertical-align: middle;text-transform: capitalize;">
                                    {{ $viv->nombres }}
                                </td>
                                <td
                                    style="text-align: center;font-weight: normal;vertical-align: middle;text-transform: capitalize;">
                                    {{ $viv->sexo }}
                                </td>       
                                <td
                                    style="text-align: center;font-weight: normal;vertical-align: middle;text-transform: capitalize;">
                                    {{ $viv->edad }}
                                </td>                                         
                                <td
                                    style="text-align: center;font-weight: normal;vertical-align: middle;text-transform: capitalize;">
                                    {{ $viv->localizacion }}
                                </td>
                                <td
                                    style="text-align: center;font-weight: normal;vertical-align: middle;text-transform: capitalize;">
                                    {{ $viv->textoColegio }}
                                </td>
                                <td
                                    style="text-align: center;font-weight: normal;vertical-align: middle;text-transform: capitalize;">
                                    @foreach ($viv->enfer_infec as $item)
                                       <p>- {{$item->enfermedad}}</p> 
                                    @endforeach
                                    @foreach ($viv->enfer_cro as $item2)
                                       <p>- {{$item2->enfermedad}}</p> 
                                    @endforeach
                                </td>
                                <td
                                    style="text-align: center;font-weight: normal;vertical-align: middle;text-transform: capitalize;">
                                    {{ $viv->textoEps }}
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
