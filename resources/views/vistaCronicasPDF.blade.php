<html>
<head>
    <meta charset="utf-8" />
    <title>
        Listado de integrantes con enfermedades crónicas
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
                <h2>Listado de integrantes con enfermedades crónicas</h2>
            </div>
        </div>
        <table style="width:100%;">
            <tr>
                <td style="width:20%;"><b>Grupo de edades:</b> {{$grupo}}</td>
                <td><b>Enfermedad:</b> {{$enfermedad}}</td>
            </tr>
        </table>
        <br>
        <br>
        <div class="row">
            <div class=" col-sm-12">
                <table class="table" style="width: 100%; font-size: 12px;">
                    <thead>
                        <tr>
                            <th style="width: 7%; text-align: center;">
                                No
                            </th>
                            <th style="width: 17%; text-align: center;">
                                Nombres completos
                            </th>
                            <th style="width: 7%; text-align: center;">
                                Identificacion
                            </th>
                            <th style="width: 10%; text-align: center;">
                                Localización
                            </th>
                            <th style="width: 5%; text-align: center;">
                                Edad
                            </th>
                            <th style="width: 5%; text-align: center;">
                                Genero
                            </th>
                            <th style="width: 10%; text-align: center;">
                                Enfermedad
                            </th>
                            <th style="width: 5%; text-align: center;">
                                Tiempo
                            </th>
                            <th style="width: 5%; text-align: center;">
                                Atendido
                            </th>
                            <th style="width: 10%;text-align: center;">
                                Eps
                            </th>
                            <th style="width: 10%;text-align: center;">
                                Ocupación
                            </th>
                        </tr>
        
                    </thead>
                    <tbody>
                        @foreach($integrantes as $viv)
                        <tr>
                            <td style="text-align: center;">
                                {{$loop->iteration}}
                            </td>
                            <td style="text-align: center;">
                                {{$viv->nombres}}
                            </td>
                            <td style="text-align: center;">
                                {{$viv->identificacion}}
                            </td>
                            <td style="text-align: center;">
                                {{$viv->localizacion}}
                            </td>
                            <td style="text-align: center;">
                                {{$viv->edad}}
                            </td>
                            <td style="text-align: center;">
                                {{$viv->genero}}
                            </td>
                            <td style="text-align: center;">
                                {{$viv->enfermedad}}
                            </td>
                            <td style="text-align: center;">
                                {{$viv->tiempo}}
                            </td>
                            <td style="text-align: center;">
                                {{$viv->atendido}}
                            </td>
                            <td style="text-align: center;">
                                {{$viv->eps}}
                            </td>
                            <td style="text-align: center;">
                                {{$viv->ocupacion}}
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