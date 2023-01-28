<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
           Informe - Unidad Productiva
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
                vertical-align: middle !important;
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

            .ca tr td {
                padding: 10px;
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
                <h1 style="color: #5578eb; margin: 2px">
                    {{$ente}}
                </h1>
                <h2 style="color: #5578eb">INFORME DE UNIDAD PRODUCTIVA</h2>
            </div>
        </div>
        <hr>
        <div style="width: 100%">
            <h2>Detalle del predio</h2>
            <table style="width: 100%; font-size: 16px">
                <tr>
                    <td><p><b>Departamento: </b>{{$unidad_productiva->DPTO}}</p></td>
                    <td> <p><b>Municipio: </b>{{$unidad_productiva->MUNI}}</p></td>
                    <td>
                        @if($unidad_productiva->CORREGIMIENTO != null)
                            <p><b>Corregimiento: </b>{{$unidad_productiva->CORREGIMIENTO}}</p>
                        @endif
                    </td>
                </tr>     
                <tr>
                    <td><p><b>Documento: </b>{{$unidad_productiva->tipo_id}}-{{$unidad_productiva->identificacion}}</p></td>
                    <td><p><b>Productor: </b>{{$unidad_productiva->nom_productor}}</p></td>
                    <td><p><b>Nivel Educativo: </b>{{$unidad_productiva->escolaridad->descripcion}}</p></td>
                </tr> 
                <tr>
                    <td><p><b>Nombre de la Finca: </b>{{$unidad_productiva->nom_finca}}</p></td>
                    <td><p><b>Hogares en la Finca: </b>{{$unidad_productiva->hogares_finca}}</p></td>
                    <td><p><b>Línea productiva: </b>{{$unidad_productiva->linea_productiva[0]["texto"]}}</p></td>
                </tr> 
                <tr>
                    <td><p><b>Area de la Finca: </b>{{$unidad_productiva->area_total_finca}} ({{$unidad_productiva->unidad_area}})</p></td>
                    <td><p><b>Distancia de la Finca: </b>{{$unidad_productiva->distancia_finca}} ({{$unidad_productiva->unidad_distancia}})</p></td>
                    <td><p><b>Tenencia de la Propiedad: </b>{{$unidad_productiva->tenencia_propiedad}}</p></td>
                </tr> 
                <tr>
                    <td><p><b>Quien Atiende la Entrevista: </b>{{$unidad_productiva->atiende_entrevista}}</p></td>
                    <td><p><b>¿Posee crédito de producción?: </b>{{$unidad_productiva->credito_produccion}}</p></td>
                    <td><p><b>Fuentes del préstamo: </b>{{$unidad_productiva->fuentes_prestamo}}</p></td>
                </tr> 
                <tr>
                    <td><p><b>¿El predio dispone de Vías de acceso?:</b>{{$unidad_productiva->vias_acceso}}</p></td>
                    <td><p><b>Tipo de vías de acceso:</b>{{$unidad_productiva->tipos_vias_acceso}}</p></td>
                    <td></td>
                </tr>
            </table>
            <div style="page-break-after:always;"></div>
            <h2>MAQUINARIA Y EQUIPOS</h2>
            <br>
            <table style="width: 100%; font-size: 16px">
                <thead>
                    <tr>
                        <th style="text-align: center" rowspan="{{count($unidad_productiva->herramientas)+1}}">
                            Herramientas de la Producción
                        </th>
                        <th>Herramientas</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($unidad_productiva->herramientas as $item)
                       <tr>
                            <td>{{$item->herramienta}}</td>
                            <td>{{$item->cuantos}}</td>
                        </tr> 
                    @endforeach
                </tbody>
            </table>
            <br>
            <table style="width: 100%; font-size: 16px">
                <thead>
                    <tr>
                        <th style="text-align: center" rowspan="{{count($unidad_productiva->utensilios)+1}}">
                            Utensilios de la Producción
                        </th>
                        <th>Utensilios</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($unidad_productiva->utensilios as $item)
                       <tr>
                            <td>{{$item->utensilio}}</td>
                            <td>{{$item->cuantos}}</td>
                        </tr> 
                    @endforeach
                </tbody>
            </table>
            <br>
            <table style="width: 100%; font-size: 16px">
                <thead>
                    <tr>
                        <th style="text-align: center" rowspan="{{count($unidad_productiva->maquinaria)+1}}">
                            Maquinaria de la Producción
                        </th>
                        <th>Maquinaria</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($unidad_productiva->maquinaria as $item)
                       <tr>
                            <td>{{$item->maquina}}</td>
                            <td>{{$item->cuantos}}</td>
                        </tr> 
                    @endforeach     
                </tbody>
            </table>
            <div style="page-break-after:always;"></div>
            <h2>INSTALACIONES</h2>
            <br>
            <table style="width: 100%; font-size: 16px">
                <thead>
                    <tr>
                        <th style="text-align: center" rowspan="{{count($unidad_productiva->instalaciones)+1}}">
                            Instalaciones del Predio
                        </th>
                        <th>Instalacion</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($unidad_productiva->instalaciones as $item)
                       <tr>
                            <td>{{$item->instalacion}}</td>
                            <td>{{$item->cuantos}}</td>
                        </tr> 
                    @endforeach            
                </tbody>
            </table>
            <br>
            <table style="width: 100%; font-size: 16px">
                <thead>
                    <tr>
                        <th style="text-align: center" rowspan="{{count($unidad_productiva->medios_transporte)+1}}">
                            Medios de transporte con los que el productor se moviliza y/o transporta sus productos e insumos
                        </th>
                        <th>Medio</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($unidad_productiva->medios_transporte as $item)
                       <tr>
                            <td>{{$item->medio}}</td>
                            <td>{{$item->cuantos}}</td>
                        </tr> 
                    @endforeach
                </tbody>
            </table>
            @foreach ($unidad_productiva->cultivos_agricolas as $item)
                <div style="page-break-after:always;"></div>
                <h2>CULTIVOS AGRÍCOLAS.</h2>
                <table class="ca" style="width: 100%; font-size: 16px">
                    <tr>
                        <td><b>Importancia del 1 al 10: </b>{{$item->importancias_agricolas}}</td>
                        <td><b>Area de Producción: </b>{{$item->area_cosecha}} ({{$item->unidad_area_produccion}})</td>
                        <td><b>Tipo de Cultivo:</b>{{$item->producto}}</td>
                    </tr>
                    <tr>
                        <td><b>Variedad: </b>{{$item->variedad}}</td>
                        <td><b>Semilla: </b>{{$item->semilla}}</td>
                        <td><b>¿Pertenece a alguna organización?: </b>{{$item->pertenece}}</td>
                    </tr>
                    @if ($item->pertenece != "NO")
                       <tr>
                            <td><b>¿De qué tipo?: </b>{{$item->tipo_pertenece}}</td>
                            <td><b>Nombre de la organización: </b>{{$item->semilla}}</td>
                            <td><b>Beneficios : </b>{{$item->beneficios}}</td>
                        </tr> 
                    @endif
                    <tr>
                        <td colspan="3"><b>Trabaja en asociación para realizar las actividades productivas: </b>{{$item->trabaja_asociacion}}</td>
                    </tr>
                    <tr>
                        <td colspan="3"><b>Para cada uno de los productos que tan frecuente se hace la cosecha: </b>{{$item->frecuente_cosecha}} ({{$item->unidad_frecuencia_cosecha}})</td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>Área de Cosecha de cada uno de los productos: </b>{{$item->area_cosecha}} ({{$item->unidad_area_cosecha}})</td>
                        <td><b>Costo total de la producción: </b>$ {{$item->costo_produccion}}</td>  
                    </tr>
                    <tr>
                        <td colspan="2"><b>Costo de establecimiento de la producción: </b>$ {{$item->costo_establecimiento}}</td>
                        <td><b>Costo de sostenimiento: </b>$ {{$item->costo_sostenimiento}}</td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>Producción destinada al mercado: </b>{{$item->produccion_destinada}} ({{$item->unidad_producion_destinada}})</td>
                        <td><b>Tipo de problema que enfrenta en su producción: </b>{{$item->tipo_problema}}</td>
                    </tr>
                    <tr>
                        <td><b>Compradores: </b>{{$item->compradores}}</td>
                        <td><b>Método de pago: </b>{{$item->metodo_pago}}</td>
                        <td><b>Precio promedio de venta kg: </b>{{$item->precio_promedio_venta_kg}}</td>
                    </tr>
                    <tr>
                        <td colspan="3"><b>Subproductos de la producción: </b>{{$item->subproductos_produccion}}</td>
                    </tr>
                    <tr>
                        <td colspan="3"><b>Pertenencia a Programas de Asistencia Técnica: </b>{{$item->programa_asistencia_tecnica}}</td>
                    </tr>
                    @if ($item->programa_asistencia_tecnica == "SI")
                        <tr>
                            <td colspan="2"><b>Nombre del programa: </b>{{$item->nombre_programa}}</td>
                            <td><b>Entidad: </b>{{$item->entidad}}</td>
                        </tr>
                    @endif
                    <tr>
                        <td colspan="3"><b>¿Durante el último año, ha realizado usted cambios en su producción en temas de innovación?: </b>{{$item->cambios_produccion_anio}}</td>
                    </tr>
                </table>
            @endforeach
            @foreach ($unidad_productiva->explotaciones_pecuarias as $item)
                <div style="page-break-after:always;"></div>
                <h2>EXPLOTACIONES PECUARIAS - ESPECIE ANIMAL CON PERSPECTIVA COMERCIAL</h2>
                <table class="ca" style="width: 100%; font-size: 16px">
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><b>Importancia del 1 al 10: </b>{{$item->importancia_comercial}}</td>
                        <td><b>Producto: </b>{{$item->producto_comercial}}</td>
                        <td><b>Raza ó Tipo:</b>{{$item->raza}}</td>
                    </tr>
                    <tr>
                        <td><b>Costo Total: </b>$ {{$item->costo_total}}</td>
                        <td><b>Costo de Establecer: </b>$ {{$item->costo_establecer}}</td>
                        <td><b>Costo Sostenimiento Explotación Pecuaria: </b>$ {{$item->costo_pecuaria}}</td>
                    </tr>
                    <tr>
                        <td colspan="3"><b>Problemática de los productos con perspectiva comercial: </b>{{$item->problematica_productos}}</td>
                    </tr>
                    <tr>
                        <td colspan="3"><b>Producción: </b>{{$item->produccion}}</td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>Producción destinada al mercado: </b>{{$item->produccion_destinada_pecuaria}} ({{$item->unidad_producion_destinada_pecuaria}})</td>
                        <td><b>Número de animales: </b>{{$item->numero_animales}}</td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>Área destinada a esta producción: </b>{{$item->area_destinada_produccion}} ({{$item->unidad_area_destinada}})</td>
                        <td><b>Compradores: </b>{{$item->compradores_pecuaria}}</td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>Precio promedio de venta kg: </b>$ {{$item->precio_promedio_venta_pecuaria}}</td>
                        <td><b>Método de pago: </b>{{$item->metodo_pago_pecuaria}}</td>
                    </tr>
                    <tr>
                        <td colspan="3"><b>Subproductos de la producción: </b>{{$item->subproductos_produccion_pecuaria}}</td>
                    </tr>
                    <tr>
                        <td colspan="3"><b>Pertenencia a Programas de Asistencia Técnica: </b>{{$item->pertenece_pecuaria}}</td>
                    </tr>
                    @if ($item->pertenece_pecuaria == "SI")
                        <tr>
                            <td colspan="2"><b>Nombre del programa: </b>{{$item->nombre_programa_pecuaria}}</td>
                            <td><b>Entidad: </b>{{$item->entidad_pecuaria}}</td>
                        </tr>
                    @endif
                    <tr>
                        <td><b>¿Pertenece a alguna organización? : </b>{{$item->pertenece_organizacion_pecuaria}}</td>
                        <td><b>¿De qué tipo? : </b>{{$item->tipo_organizacion_pecuaria}}</td>
                        <td><b>Nombre de la organización: </b>{{$item->nombre_organizacion_pecuaria}}</td>
                    </tr>
                    @if ($item->pertenece_organizacion_pecuaria == "NO")
                        <tr>
                            <td colspan="3"><b>Razón por la cual no pertenece a ninguna organización: </b>{{$item->no_pertenece_pecuaria}}</td>
                        </tr>
                    @endif
                    <tr>
                        <td colspan="1"><b>Beneficios : </b>{{$item->beneficios_pecuaria}}</td>
                        <td colspan="2"><b>Trabaja en asociación para realizar las actividades productivas : </b>{{$item->trabaja_asociacion_pecuaria}}</td>
                    </tr>
                </table>
            @endforeach
            @foreach ($unidad_productiva->cultivos_forestales as $item)
                <div style="page-break-after:always;"></div>
                <h2>CULTIVOS FORESTALES CON PERSPECTIVA COMERCIAL</h2>
                <table class="ca" style="width: 100%; font-size: 16px">
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><b>Importancia del 1 al 10: </b>{{$item->importancia_forestales}}</td>
                        <td><b>Producto: </b>{{$item->producto_forestales}}</td>
                        <td><b>Especie:</b>{{$item->variedad_forestales}}</td>
                    </tr>
                    <tr>
                        <td><b>Edad de la plantación: </b>{{$item->edad_plantacion}} ({{$item->tipo_edad}})</td>
                        <td><b>Área sembrada: </b>{{$item->area_sembrada_forestales}} ({{$item->unidad_area_forestales}})</td>
                        <td><b>Rendimiento por árbol en m3: </b>{{$item->rendimiento_arbol}}</td>
                    </tr>
                    <tr>
                        <td><b>Costo Total: </b>${{$item->costo_total_forestales}}</td>
                        <td><b>Costo de Establecimiento: </b>${{$item->costo_establecimiento_forestales}}</td>
                        <td><b>Costo Sostenimiento: </b>${{$item->costo_sostenimiento_forestales}}</td>
                    </tr>
                    <tr>
                        <td colspan="3"><b>Problemática de los productos con perspectiva comercial: </b>{{$item->problematica_productos_forestales}}</td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>Producción destinada al mercado: </b>{{$item->produccion_destinada_forestales}} ({{$item->unidad_producion_destinada_forestales}})</td>
                        <td><b>Número de Arboles: </b>{{$item->numero_arboles}}</td>
                    </tr>
                    <tr>
                        <td><b>Compradores:  </b>{{$item->compradores_forestales}}</td>
                        <td><b>Precio promedio de venta kg: </b>{{$item->precio_promedio_venta_forestales}}</td>
                        <td><b>Método de pago: </b>{{$item->metodo_pago_forestales}}</td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>Subproductos de la producción:  </b>{{$item->subproductos_produccion_forestales}}</td>
                        <td><b>Pertenencia a Programas de Asistencia Técnica: </b>{{$item->pertenece_forestales}}</td>
                    </tr>
                    @if ($item->pertenece_forestales == "SI")
                        <tr>
                            <td colspan="2"><b>Nombre del programa:  </b>{{$item->nombre_programa_forestales}}</td>
                            <td><b>Entidad: </b>{{$item->entidad_forestales}}</td>
                        </tr>
                    @endif
                    <tr>
                        <td colspan="3"><b>¿Pertenece a alguna organización? :  </b>{{$item->pertenece_organizacion_forestales}}</td>
                    </tr>
                    @if ($item->pertenece_organizacion_forestales != "NO")
                        <tr>
                            <td ><b>¿De qué tipo? :  </b>{{$item->tipo_pertenece_forestales}}</td>
                            <td><b>Nombre de la organización: </b>{{$item->nombre_organizacion_forestales}}</td>
                            <td><b>Beneficios: </b>{{$item->beneficios_forestales}}</td>
                        </tr>               
                    @else
                        <tr>
                            <td colspan="2"><b>Razón por la cual no pertenece a ninguna organización:  </b>{{$item->no_pertenece_forestales}}</td>
                            <td><b>Beneficios: </b>{{$item->beneficios_forestales}}</td>
                        </tr>  
                    @endif
                    <tr>
                        <td colspan="3"><b>Trabaja en asociación para realizar las actividades productivas:  </b>{{$item->trabaja_asociacion_forestales}}</td>
                    </tr>
                </table>
            @endforeach
        </div>
    </main>
</body>
</html>