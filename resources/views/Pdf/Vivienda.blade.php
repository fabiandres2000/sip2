<html>
    <head>
        <meta charset="utf-8" />
        <title>
           Socioeconomico - Vivienda
        </title>
        <meta name="description" content="Latest updates and statistic charts">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
                font-size: 12px;
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
            .kt-badge--success {
                color: #fff;
                background: #28a745;
            }

            .kt-badge--danger {
                color: #fff;
                background: #dc3545;
            }
            footer {
                position: fixed; 
                bottom: -20px; 
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
        <br>
        <h2 style="color: #5578eb; margin: 2px">{{$ente}}</h2>
        <h2 style="color: #5578eb; margin: 2px">Socioeconomico - Viviendas</h2>
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
        <div>
            <div style="float: left; text-align: center; width: 550px !important; height: 300px">
                <h2>Viviendas Caracterizadas</h2>
                <h3>(Por Nivel Socioeconomico)</h3>
                <img src="{{$torta2}}" style="width: 550px; height: 300px">
            </div>
            <div style="float: left; text-align: center; width: 550px !important; height: 300px">
                <h2>Viviendas Caracterizadas</h2>
                <h3>(Por Tipo de Hacinamientod)</h3>
                <img src="{{$torta3}}" style="width: 550px; height: 300px">
            </div>
        </div>
        <div style="page-break-after:always;"></div>
        <div style="padding-top: 160px">
            <div style="float: left; text-align: center; width: 500px !important; height: 350px">
                <br>
                <br>
                <img src="{{$porcentaje}}" style="width: 500px; height: 350px">
            </div>
            <div style="float: left; text-align: center; width: 600px !important; height: 300px">
                <h2>Indicadores NBI</h2>
                <h3>(Numero de Viviendas por Indicador)</h3>
                <img src="{{$torta1}}" style="width: 600px; height: 300px">
            </div>
        </div>
        <div style="page-break-after:always;"></div>
        <div class="col-lg-12">
            <h2>Viviendas Caracterizadas</h2>
            <table id="tabla_viviendas" class="table" style="width: 100% important">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Corregimiento</th>
                        <th>Direccion</th>
                        <th style="text-align: center">Vivienda Inadecuada</th>
                        <th style="text-align: center">Hacinamiento crítico</th>
                        <th style="text-align: center">Servicios inadecuados</th>
                        <th style="text-align: center">Alta dependencia económica</th>
                        <th style="text-align: center">Niños en edad escolar que no asisten a la escuela</th>
                        <th style="text-align: center">INB</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item["des_corre"] == "" ? '  CASCO URBANO' : $item["des_corre"]}}</td>
                        <td>{{$item["des_dire"]}}</td>
                        <td style="text-align: center"><p class={{$item["vivienda_inadecuada"] == 'NO' ? 'kt-badge--success': 'kt-badge--danger'}}>{{$item["vivienda_inadecuada"]}}</p></td>
                        <td style="text-align: center"><p class={{$item["hacinamiento_critico"] == 'NO' ? 'kt-badge--success': 'kt-badge--danger'}}>{{$item["hacinamiento_critico"]}}</p></td>
                        <td style="text-align: center"><p class={{$item["servicios_inadecuados"] == 'NO' ? 'kt-badge--success': 'kt-badge--danger'}}>{{$item["servicios_inadecuados"]}}</p></td>
                        <td style="text-align: center"><p class={{$item["dependencia_economica"] == 'NO' ? 'kt-badge--success': 'kt-badge--danger'}}>{{$item["dependencia_economica"]}}</p></td>
                        <td style="text-align: center"><p class={{$item["ninios_descolarizados"] == 'NO' ? 'kt-badge--success': 'kt-badge--danger'}}>{{$item["ninios_descolarizados"]}}</p></td>
                        <td style="text-align: center"><p class={{$item["inb"] == 'NO' ? 'kt-badge--success': 'kt-badge--danger'}}>{{$item["inb"]}}</p></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
      </main>
    </body>
</html>