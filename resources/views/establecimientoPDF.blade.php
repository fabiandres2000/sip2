<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
           Listado - establecimientos
        </title>
        <meta name="description" content="Latest updates and statistic charts">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta charset="UTF-8">
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
        <div class="row">
            <div class="col-6">
                <h1 style="color: #5578eb; margin: 2px">{{$ente}}</h1>
                <h2 style="color: #5578eb">INFORMACIÓN DE ESTABLECIMIENTO</h2>
            </div>
        </div>
        <hr>
        <div style="width: 100%">
            <table style="width: 100%; font-size: 14px">
                <tr>
                    <td><p><b>Departamento: </b>{{$establecimiento->DPTO}}</p></td>
                    <td> <p><b>Municipio: </b>{{$establecimiento->MUNI}}</p></td>
                    <td>
                        @if($establecimiento->CORREGIMIENTO != null)
                            <p><b>Corregimiento: </b>{{$establecimiento->CORREGIMIENTO}}</p>
                        @endif
                    </td>
                </tr>     
                <tr>
                    <td><p><b>Dirección: </b>{{$establecimiento->direccion}}</p></td>
                    @if($establecimiento->BARRIO != null)
                        <td><p><b>Barrio: </b>{{$establecimiento->BARRIO}}</p></td>
                    @endif
                    <td><p><b>Nit: </b>{{$establecimiento->nit}}</p></td>   
                </tr>
                <tr>
                <td colspan="3"><p><b>Razón Social: </b>{{$establecimiento->razon}}</p></td> 
                </tr>
                <tr>
                    <td><p><b>Registro Camara de Comercio: </b>{{$establecimiento->registrado}}</p></td>
                    <td colspan="2"> 
                        @if($establecimiento->registrado == "SI")
                            <p><b>Número Matrícula Mercantil: </b>{{$establecimiento->num_matricula}}</p>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td colspan="3"><p><b>Naturaleza Juridica del Establecimiento: </b>{{$establecimiento->naturaleza}}</p></td>
                </tr>
                <tr>
                    <td colspan="3"><p><b>Representante Legal: </b>{{$establecimiento->representante}}</p></td> 
                </tr>
                <tr>
                    <td colspan="3"><p><b>Tipo de Establecimiento Comercial: </b>{{$establecimiento->tipo}}</p></td>
                </tr>
            </table>
            <hr>
            <br>
            <h3 style="color: #5578eb">Actividades Económicas</h3>
            <br>
            <table class="table" style="width: 100%; font-size: 14px">
                <thead>
                    <tr>
                        <th>
                            No.
                        </th>
                        <th>
                            Departamento
                        </th>
                    </tr>
                </thead>
                <tbody>
                @foreach($establecimiento->actividades_economicas as $item)
                    <tr>
                        <td style="width: 30px">
                            {{$loop->iteration}}
                        </td>
                        <td>
                            {{$item->descripcion}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <br>
        <hr>
        <table style="font-size: 14px">
            <tr>
                <td><b>Participación de Capital Extranjero: </b></td>
                <td>{{$establecimiento->capital_extranjero}}</td>
            </tr>
            <tr>
                <td><b>¿Recibe el Permiso de Operar Como?: </b></td>
                <td>{{$establecimiento->permiso}}</td>
            </tr>
            <tr>
                <td><b>Año de Inicio de Operación: </b></td>
                <td>{{$establecimiento->anio}}</td>
            </tr>
            <tr>
                <td><b>Numero de Empleados Directos: </b></td>
                <td>{{$establecimiento->num_empleados}}</td>
            </tr>
            <tr>
                <td><b>Tiempo Sin Operación Debido al Covid 19: </b></td>
                <td>{{$establecimiento->tiempo_sin_operacion}} ({{$establecimiento->tipo_tiempo}})</td>
            </tr>
            <tr>
                <td><b>Fecha de Retorno a Labores: </b></td>
                <td>{{$establecimiento->fecha_retorno}}</td>
            </tr>
            <tr>
                <td><b>Ingresos Anterior a la Contingencia: </b></td>
                <td>$ {{$establecimiento->promedio_ingresos_anterior}}</td>
            </tr>
            <tr>
                <td><b>Ingresos Durante a la Contingencia: </b></td>
                <td>$ {{$establecimiento->promedio_ingresos_durante}}</td>
            </tr>
            <tr>
                <td><b>Ingresos Posterior a la Contingencia: </b></td>
                <td>$ {{$establecimiento->promedio_ingresos_posterior}}</td>
            </tr>
            <tr>
                <td><b>Principal Carga Economica: </b></td>
                <td>{{$establecimiento->carga_economica}}</td>
            </tr>
            <tr>
                <td><b>¿Cuenta Con Protocolos de Seguridad?: </b></td>
                <td>{{$establecimiento->protocolo_bioseguridad}}</td>
            </tr>
            <tr>
                <td><b>¿Recibió Ayuda del Gobierno?: </b></td>
                <td>{{$establecimiento->ayuda}}</td>
            </tr>
            <tr>
                <td><b>¿Cuenta con Servicio de Internet?: </b></td>
                <td>{{$establecimiento->internet}}</td>
            </tr>
            <tr>
                <td><b>¿Dentro de cuanto tiempo, creen que el establecimiento pueda recuperarse económicamente de las afectaciones por la emergencia Covid- 19?: </b></td>
                <td>{{$establecimiento->tiempo_recuperacion}}</td>
            </tr>
            <tr>
                <td><b>¿Cuál cree usted que es el principal problema del sector en el que está ubicado el establecimiento comercial?: </b></td>
                <td>{{$establecimiento->principal_problema}}</td>
            </tr>
        </table>
        <br>
        <hr>
        <br>
        <h3 style="color: #5578eb">Tipo de Afectación del Establecimiento</h3>
        <table  style="font-size: 14px; width: 100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Afectación</th>
                </tr>
            </thead>
            <tbody>
                @foreach($establecimiento->afectaciones as $item)
                <tr>
                    <td style="width: 30px">
                        {{$loop->iteration}}
                    </td>
                    <td>
                        {{$item["texto"]}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </main>
</body>
</html>