<html>
    <head>
        <meta charset="utf-8" />
        <title>
            Caracterizacion vivienda - {{$idCasa}}
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

        
          .kt-badge--warning {
            color: rgb(0, 0, 0);
            background: #ffb822;
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
      <h1 style="color: #5578eb; margin: 2px">
        {{$ente}}
      </h1>
      <h2 style="color: #5578eb; margin: 2px">Informe de riesgos de salud y ambientales, por vivienda</h2>
      <br>
      <h2>Cabezas de Hogar</h2>
      <hr>
      <div class="row">
        <div class=" col-sm-12">
          <table class="table" style="width: 100%; font-size: 13px">
            <thead>
              <tr>
                <th>
                  Identificación
                </th>
                <th>
                  Nombre
                </th>
                <th>
                  Departamento
                </th>
                <th>
                  Municipio
                </th>
                <th>
                  Corregimiento
                </th>
                <th>
                  Direccion
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach($caracterizaciones as $caracterizacion)
                <tr>
                  <td>
                    {{ $caracterizacion->IDENTIFICACION }}
                  </td>
                  <td>
                    {{$caracterizacion->USUARIO}}
                  </td>
                  <td>
                    {{$caracterizacion->DPTO}}
                  </td>
                  <td>
                    {{$caracterizacion->MUNI}}
                  </td>
                  <td>
                    {{$caracterizacion->CORREGIMIENTO}}
                  </td>
                  <td>
                    {{$caracterizacion->DIRECCION}}
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <br>
      <h2>Integrantes del Hogar</h2>
      <hr>
        <div class="row">
          <div class=" col-sm-12">
            <table class="table" style="width: 100%; font-size: 13px">
              <thead>
                <tr>
                  <th style="width: 30px">
                    No
                  </th>
                  <th style="width: 170px">
                    Identificación
                  </th>
                  <th style="width: 159px">
                    Integrante
                  </th>
                  <th style="width: 159px">
                    Jefe
                  </th>
                  <th>
                    Sexo
                  </th>
                  <th style="width: 50px">
                    Edad
                  </th>
                  <th>
                      Parentesco
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach($integrantes as $viv)
                <tr>
                    <td>
                      {{$loop->iteration}}
                    </td>
                    <td>
                      {{$viv->tipo_id}} - {{$viv->identificacion}}
                    </td>
                    <td>
                      {{$viv->INTEGRANTE}}
                    </td>
                    <td>
                      {{$viv->JEFE}}
                    </td>
                    <td>
                      {{$viv->sexo}}
                    </td>
                    <td>
                      {{$viv->edad}}
                    </td>
                    <td>
                      {{$viv->PARENT}}
                    </td>
                </tr>
                @endforeach
              </tbody>
          </table>
        </div>
          <div style="page-break-after:always;"></div>
          <div class="col-md-12">
              <div class="text-center">
                <h2>
                  <span class="kt-font-boldest text">Riesgos Ambientales</span>
                </h2>
              </div>
              <div>
                <table style="width: 100%; font-size: 13px">
                  <thead>
                    <tr>
                      <th style="width: 60%">Riesgo Inherente</th>                          
                      <th style="vertical-align: middle;text-align: center;">Puntuación</th>
                      <th style="vertical-align: middle;text-align: center;">Riesgo Residual</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>                          
                      <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">Riesgos de Acceso a Agua</td>                          
                      <td style="font-weight: bold;vertical-align: middle;text-align: center;text-transform:capitalize">
                        <p style="padding: 10px; margin: 0px" class="{{$RieAmbInh->color_riesgos_acceso_agua}}">{{ $RieAmbInh->riesgos_acceso_agua }} / 10</p>
                      </td>                          
                      <td style="font-weight: bold;vertical-align: middle;text-align: center;text-transform:capitalize;">
                        <p style="padding: 10px; margin: 0px" class="@if ($RieAmbInh->control_riesgos_acceso_agua === '0') kt-badge--success @else {{$RieAmbInh->color_residual_riesgos_acceso_agua}} @endif">{{ $RieAmbInh->control_riesgos_acceso_agua }} - @if ($RieAmbInh->control_riesgos_acceso_agua === "0") Bajo @else {{$RieAmbInh->val_residual_riesgos_acceso_agua}} @endif</p>
                      </td>                                                  
                    </tr>
                    <tr>                          
                      <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">Riesgos Atmosfericos</td>                          
                      <td style="font-weight: bold;vertical-align: middle;text-align: center;text-transform:capitalize">
                        <p style="padding: 10px; margin: 0px" class="{{$RieAmbInh->color_riesgos_atmosferico}}">{{ $RieAmbInh->riesgos_atmosferico }} / 10</p>
                      </td>                          
                      <td style="font-weight: bold;vertical-align: middle;text-align: center;text-transform:capitalize;">
                        <p style="padding: 10px; margin: 0px" class="@if ($RieAmbInh->control_riesgos_atmosferico === '0') kt-badge--success @else {{$RieAmbInh->color_residual_riesgos_atmosferico}} @endif">{{ $RieAmbInh->control_riesgos_atmosferico }} - @if ($RieAmbInh->control_riesgos_atmosferico === "0") Bajo @else {{$RieAmbInh->val_residual_riesgos_atmosferico}} @endif</p>
                      </td>                                                  
                    </tr>
                    <tr>                          
                      <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">Riesgos Auditivos</td>                          
                      <td style="font-weight: bold;vertical-align: middle;text-align: center;text-transform:capitalize">
                        <p style="padding: 10px; margin: 0px" class="{{$RieAmbInh->color_riesgos_auditivo}}">{{ $RieAmbInh->riesgos_auditivo }} / 5</p>
                      </td>                          
                      <td style="font-weight: bold;vertical-align: middle;text-align: center;text-transform:capitalize;">
                        <p style="padding: 10px; margin: 0px" class="@if ($RieAmbInh->control_riesgos_auditivo === '0') kt-badge--success @else {{$RieAmbInh->color_residual_riesgos_auditivo}} @endif">{{ $RieAmbInh->control_riesgos_auditivo }} - @if ($RieAmbInh->control_riesgos_auditivo === "0") Bajo @else {{$RieAmbInh->val_residual_riesgos_auditivo}} @endif</p>
                      </td>                                                  
                    </tr>
                    <tr>                          
                      <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">Riesgos de  Derrumbes</td>                          
                      <td style="font-weight: bold;vertical-align: middle;text-align: center;text-transform:capitalize">
                        <p style="padding: 10px; margin: 0px" class="{{$RieAmbInh->color_riesgos_derrumbes}}">{{ $RieAmbInh->riesgos_derrumbes }} / 10</p>
                      </td>                          
                      <td style="font-weight: bold;vertical-align: middle;text-align: center;text-transform:capitalize;">
                        <p style="padding: 10px; margin: 0px" class="@if ($RieAmbInh->control_riesgos_derrumbes === '0') kt-badge--success @else {{$RieAmbInh->color_residual_riesgos_derrumbes}} @endif">{{ $RieAmbInh->control_riesgos_derrumbes }} - @if ($RieAmbInh->control_riesgos_derrumbes === "0") Bajo @else {{$RieAmbInh->val_residual_riesgos_derrumbes}} @endif</p>
                      </td>                                                  
                    </tr>
                    <tr>                          
                      <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">Riesgos de  Insalubridad</td>                          
                      <td style="font-weight: bold;vertical-align: middle;text-align: center;text-transform:capitalize">
                        <p style="padding: 10px; margin: 0px" class="{{$RieAmbInh->color_riesgos_insalubridad}}">{{ $RieAmbInh->riesgos_insalubridad }} / 25</p>
                      </td>                          
                      <td style="font-weight: bold;vertical-align: middle;text-align: center;text-transform:capitalize;">
                        <p style="padding: 10px; margin: 0px" class="@if ($RieAmbInh->control_riesgos_insalubridad === '0') kt-badge--success @else {{$RieAmbInh->color_residual_riesgos_insalubridad}} @endif">{{ $RieAmbInh->control_riesgos_insalubridad }} - @if ($RieAmbInh->control_riesgos_insalubridad === "0") Bajo @else {{$RieAmbInh->val_residual_riesgos_insalubridad}} @endif</p>
                      </td>                                                  
                    </tr>
                    <tr>                          
                      <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">Riesgos de  Inundación</td>                          
                      <td style="font-weight: bold;vertical-align: middle;text-align: center;text-transform:capitalize">
                        <p style="padding: 10px; margin: 0px" class="{{$RieAmbInh->color_riesgos_inundacion}}">{{ $RieAmbInh->riesgos_inundacion }} / 10</p>
                      </td>                          
                      <td style="font-weight: bold;vertical-align: middle;text-align: center;text-transform:capitalize;">
                        <p style="padding: 10px; margin: 0px" class="@if ($RieAmbInh->control_riesgos_inundacion === '0') kt-badge--success @else {{$RieAmbInh->color_residual_riesgos_inundacion}} @endif">{{ $RieAmbInh->control_riesgos_inundacion }} - @if ($RieAmbInh->control_riesgos_inundacion === "0") Bajo @else {{$RieAmbInh->val_residual_riesgos_inundacion}} @endif</p>
                      </td>                                                  
                    </tr>
                    <tr>                          
                      <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">Riesgos Riesgo Por Quemas O Incendio</td>                          
                      <td style="font-weight: bold;vertical-align: middle;text-align: center;text-transform:capitalize">
                        <p style="padding: 10px; margin: 0px" class="{{$RieAmbInh->color_riesgos_quema}}">{{ $RieAmbInh->riesgos_quema }} / 10</p>
                      </td>                          
                      <td style="font-weight: bold;vertical-align: middle;text-align: center;text-transform:capitalize;">
                        <p style="padding: 10px; margin: 0px" class="@if ($RieAmbInh->control_riesgos_quema === '0') kt-badge--success @else {{$RieAmbInh->color_residual_riesgos_quema}} @endif">{{ $RieAmbInh->control_riesgos_quema }} - @if ($RieAmbInh->control_riesgos_quema === "0") Bajo @else {{$RieAmbInh->val_residual_riesgos_quema}} @endif</p>
                      </td>                                                  
                    </tr>
                    <tr>                          
                      <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">Riesgo Recurso Hídrico</td>                          
                      <td style="font-weight: bold;vertical-align: middle;text-align: center;text-transform:capitalize">
                        <p style="padding: 10px; margin: 0px" class="{{$RieAmbInh->color_riesgos_recurso_hidrico}}">{{ $RieAmbInh->riesgos_recurso_hidrico }} / 10</p>
                      </td>                          
                      <td style="font-weight: bold;vertical-align: middle;text-align: center;text-transform:capitalize;">
                        <p style="padding: 10px; margin: 0px" class="@if ($RieAmbInh->control_riesgos_recurso_hidrico === '0') kt-badge--success @else {{$RieAmbInh->color_residual_riesgos_recurso_hidrico}} @endif">{{ $RieAmbInh->control_riesgos_recurso_hidrico }} - @if ($RieAmbInh->control_riesgos_recurso_hidrico === "0") Bajo @else {{$RieAmbInh->val_residual_riesgos_recurso_hidrico}} @endif</p>
                      </td>                                                  
                    </tr>
                    <tr>                          
                      <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">Riesgos Recurso Suelo</td>                          
                      <td style="font-weight: bold;vertical-align: middle;text-align: center;text-transform:capitalize">
                        <p style="padding: 10px; margin: 0px" class="{{$RieAmbInh->color_riesgos_recurso_suelo}}">{{ $RieAmbInh->riesgos_recurso_suelo }} / 10</p>
                      </td>                          
                      <td style="font-weight: bold;vertical-align: middle;text-align: center;text-transform:capitalize;">
                        <p style="padding: 10px; margin: 0px" class="@if ($RieAmbInh->control_riesgos_recurso_suelo === '0') kt-badge--success @else {{$RieAmbInh->color_residual_riesgos_recurso_suelo}} @endif">{{ $RieAmbInh->control_riesgos_recurso_suelo }} - @if ($RieAmbInh->control_riesgos_recurso_suelo === "0") Bajo @else {{$RieAmbInh->val_residual_riesgos_recurso_suelo}} @endif</p>
                      </td>                                                  
                    </tr>
                  </tbody> 
              </table> 
          </div>
        </div>
        <div class="col-md-12">
          @if(count($riesgos_salud_men1a) > 0)
          <div style="page-break-after:always;"></div>
          <div class="text-center">
            <h2 style="margin: 2px !important">
              <span class="kt-font-boldest text">Riesgos de Salud</span>
            </h2>
            <h3 style="margin: 2px !important">
              PRIMERA INFANCIA NIÑOS(AS) MENORES DE UN AÑO
            </h3>
          </div>
          @endif
          @foreach($riesgos_salud_men1a as $inte)
          <div style="margin-bottom: 20px">
            <h3><u>{{$inte->pnom}} {{$inte->snom}} {{$inte->pape}} {{$inte->sape}}</u> </h3>
            <table class="table table-sm table-hover" style="width: 100%; font-size: 13px">
              <thead>
                <tr class="kt-bg-fill-brand">
                  <th style="vertical-align: middle;text-align: left; width: 60%">Riesgo</th>
                  <th style="vertical-align: middle;text-align: center;">Valorización I.</th>
                  <th style="vertical-align: middle;text-align: center;">Valorización R.</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Trastornos Degenerativos, Neuropatías Y Enfermedades Autoinmunes
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_transtornos_degenartivos_I}}">{{ $inte->transtornos_degenartivos_I }} - {{ $inte->v_transtornos_degenartivos_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_transtornos_degenartivos_R}}">{{ $inte->transtornos_degenartivos_R }} - {{ $inte->v_transtornos_degenartivos_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Riesgo De Muerte Por Desnutrición
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_riesgo_muerte_I}}">{{ $inte->riesgo_muerte_I }} - {{ $inte->v_riesgo_muerte_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_riesgo_muerte_R}}">{{ $inte->riesgo_muerte_R }} - {{ $inte->v_riesgo_muerte_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Riesgo Sobrepeso
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_riesgo_sobrepeso_I}}">{{ $inte->riesgo_sobrepeso_I }} - {{ $inte->v_riesgo_sobrepeso_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_riesgo_sobrepeso_R}}">{{ $inte->riesgo_sobrepeso_R }} - {{ $inte->v_riesgo_sobrepeso_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Enfermedades Infeccisosas
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedades_infecciosas_I}}">{{ $inte->enfermedades_infecciosas_I }} - {{ $inte->v_enfermedades_infecciosas_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedades_infecciosas_R}}">{{ $inte->enfermedades_infecciosas_R }} - {{ $inte->v_enfermedades_infecciosas_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Cancer
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_cancer_I}}">{{ $inte->cancer_I }} - {{ $inte->v_cancer_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_cancer_R}}">{{ $inte->cancer_R }} - {{ $inte->v_cancer_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Enfermedades Zoonoticas
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedades_zoonoticas_I}}">{{ $inte->enfermedades_zoonoticas_I }} - {{ $inte->v_enfermedades_zoonoticas_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedades_zoonoticas_R}}">{{ $inte->enfermedades_zoonoticas_R }} - {{ $inte->v_enfermedades_zoonoticas_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Consumo De SPA
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_consumo_spa_I}}">{{ $inte->consumo_spa_I }} - {{ $inte->v_consumo_spa_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_consumo_spa_R}}">{{ $inte->consumo_spa_R }} - {{ $inte->v_consumo_spa_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Riesgo Desnutrición Global
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_riesgos_desnutricion_global_I}}">{{ $inte->riesgos_desnutricion_global_I }} - {{ $inte->v_riesgos_desnutricion_global_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_riesgos_desnutricion_global_R}}">{{ $inte->riesgos_desnutricion_global_R }} - {{ $inte->v_riesgos_desnutricion_global_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Riesgo De Talla Baja
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_riesgo_talla_baja_I}}">{{ $inte->riesgo_talla_baja_I }} - {{ $inte->v_riesgo_talla_baja_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_riesgo_talla_baja_R}}">{{ $inte->riesgo_talla_baja_R }} - {{ $inte->v_riesgo_talla_baja_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Trastornos Asociados Al Uso De SPA
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_transtornos_asociados_spa_I}}">{{ $inte->transtornos_asociados_spa_I }} - {{ $inte->v_transtornos_asociados_spa_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_transtornos_asociados_spa_R}}">{{ $inte->transtornos_asociados_spa_R }} - {{ $inte->v_transtornos_asociados_spa_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Enfermedad Cardiovascular Aterogénica
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedad_cardiovascular_I}}">{{ $inte->enfermedad_cardiovascular_I }} - {{ $inte->v_enfermedad_cardiovascular_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedad_cardiovascular_R}}">{{ $inte->enfermedad_cardiovascular_R }} - {{ $inte->v_enfermedad_cardiovascular_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Alteraciones Y Transtornos Visuales
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_alteraciones_transtornos_visuales_I}}">{{ $inte->alteraciones_transtornos_visuales_I }} - {{ $inte->v_alteraciones_transtornos_visuales_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_alteraciones_transtornos_visuales_R}}">{{ $inte->alteraciones_transtornos_visuales_R }} - {{ $inte->v_alteraciones_transtornos_visuales_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Alteraciones Y Transtornos De La Audición Y Comunicación
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_alteraciones_transtornos_audicion_I}}">{{ $inte->alteraciones_transtornos_audicion_I }} - {{ $inte->v_alteraciones_transtornos_audicion_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_alteraciones_transtornos_audicion_R}}">{{ $inte->alteraciones_transtornos_audicion_R }} - {{ $inte->v_alteraciones_transtornos_audicion_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Salud Bucal
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_salud_bucal_I}}">{{ $inte->salud_bucal_I }} - {{ $inte->v_salud_bucal_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_salud_bucal_R}}">{{ $inte->salud_bucal_R }} - {{ $inte->v_salud_bucal_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Problemas En Salud Mental
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_problemas_salud_mental_I}}">{{ $inte->problemas_salud_mental_I }} - {{ $inte->v_problemas_salud_mental_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_problemas_salud_mental_R}}">{{ $inte->problemas_salud_mental_R }} - {{ $inte->v_problemas_salud_mental_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Violencias
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_violencias_I}}">{{ $inte->violencias_I }} - {{ $inte->v_violencias_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_violencias_R}}">{{ $inte->violencias_R }} - {{ $inte->v_violencias_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Enfermedades Respiratorias Crónicas
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedades_respiratorias_I}}">{{ $inte->enfermedades_respiratorias_I }} - {{ $inte->v_enfermedades_respiratorias_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedades_respiratorias_R}}">{{ $inte->enfermedades_respiratorias_R }} - {{ $inte->v_enfermedades_respiratorias_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Riesgo Desnutrición Aguda
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_riesgos_desnutricion_aguda_I}}">{{ $inte->riesgos_desnutricion_aguda_I }} - {{ $inte->v_riesgos_desnutricion_aguda_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_riesgos_desnutricion_aguda_R}}">{{ $inte->riesgos_desnutricion_aguda_R }} - {{ $inte->v_riesgos_desnutricion_aguda_R }}</p>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          @if (!$loop->last)
            <div style="page-break-after:always;"></div>
          @endif
          @endforeach
          @if(count($riesgos_salud_de1a5) > 0)
          <div style="page-break-after:always;"></div>
          <div class="text-center">
            <h2 style="margin: 2px !important">
              <span class="kt-font-boldest text">Riesgos de Salud</span>
            </h2>
            <h3 style="margin: 2px !important;">
              PRIMERA INFANCIA NIÑOS(AS) DE 1 A 5 AÑOS (12 a 60 Meses)
            </h3>
          </div>
          @endif
          @foreach($riesgos_salud_de1a5 as $inte)
          <div style="margin-bottom: 20px">
            <h3><u>{{$inte->pnom}} {{$inte->snom}} {{$inte->pape}} {{$inte->sape}}</u> </h3>
            <table class="table table-sm table-hover" style="width: 100%; font-size: 13px">
              <thead>
                <tr class="kt-bg-fill-brand">
                  <th style="vertical-align: middle;text-align: left; width: 60%">Riesgo</th>
                  <th style="vertical-align: middle;text-align: center;">Valorización I.</th>
                  <th style="vertical-align: middle;text-align: center;">Valorización R.</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Trastornos Degenerativos, Neuropatías Y Enfermedades Autoinmunes
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_transtornos_degenartivos_I}}">{{ $inte->transtornos_degenartivos_I }} - {{ $inte->v_transtornos_degenartivos_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_transtornos_degenartivos_R}}">{{ $inte->transtornos_degenartivos_R }} - {{ $inte->v_transtornos_degenartivos_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Riesgo De Muerte Por Desnutrición
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_riesgo_muerte_I}}">{{ $inte->riesgo_muerte_I }} - {{ $inte->v_riesgo_muerte_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_riesgo_muerte_R}}">{{ $inte->riesgo_muerte_R }} - {{ $inte->v_riesgo_muerte_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Riesgo Sobrepeso
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_riesgo_sobrepeso_I}}">{{ $inte->riesgo_sobrepeso_I }} - {{ $inte->v_riesgo_sobrepeso_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_riesgo_sobrepeso_R}}">{{ $inte->riesgo_sobrepeso_R }} - {{ $inte->v_riesgo_sobrepeso_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Enfermedades Infeccisosas
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedades_infecciosas_I}}">{{ $inte->enfermedades_infecciosas_I }} - {{ $inte->v_enfermedades_infecciosas_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedades_infecciosas_R}}">{{ $inte->enfermedades_infecciosas_R }} - {{ $inte->v_enfermedades_infecciosas_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Cancer
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_cancer_I}}">{{ $inte->cancer_I }} - {{ $inte->v_cancer_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_cancer_R}}">{{ $inte->cancer_R }} - {{ $inte->v_cancer_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Enfermedades Zoonoticas
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedades_zoonoticas_I}}">{{ $inte->enfermedades_zoonoticas_I }} - {{ $inte->v_enfermedades_zoonoticas_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedades_zoonoticas_R}}">{{ $inte->enfermedades_zoonoticas_R }} - {{ $inte->v_enfermedades_zoonoticas_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Consumo De SPA
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_consumo_spa_I}}">{{ $inte->consumo_spa_I }} - {{ $inte->v_consumo_spa_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_consumo_spa_R}}">{{ $inte->consumo_spa_R }} - {{ $inte->v_consumo_spa_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Riesgo Desnutrición Global
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_riesgos_desnutricion_global_I}}">{{ $inte->riesgos_desnutricion_global_I }} - {{ $inte->v_riesgos_desnutricion_global_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_riesgos_desnutricion_global_R}}">{{ $inte->riesgos_desnutricion_global_R }} - {{ $inte->v_riesgos_desnutricion_global_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Riesgo De Talla Baja
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_riesgo_talla_baja_I}}">{{ $inte->riesgo_talla_baja_I }} - {{ $inte->v_riesgo_talla_baja_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_riesgo_talla_baja_R}}">{{ $inte->riesgo_talla_baja_R }} - {{ $inte->v_riesgo_talla_baja_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Trastornos Asociados Al Uso De SPA
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_transtornos_asociados_spa_I}}">{{ $inte->transtornos_asociados_spa_I }} - {{ $inte->v_transtornos_asociados_spa_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_transtornos_asociados_spa_R}}">{{ $inte->transtornos_asociados_spa_R }} - {{ $inte->v_transtornos_asociados_spa_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Enfermedad Cardiovascular Aterogénica
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedad_cardiovascular_I}}">{{ $inte->enfermedad_cardiovascular_I }} - {{ $inte->v_enfermedad_cardiovascular_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedad_cardiovascular_R}}">{{ $inte->enfermedad_cardiovascular_R }} - {{ $inte->v_enfermedad_cardiovascular_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Alteraciones Y Transtornos Visuales
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_alteraciones_transtornos_visuales_I}}">{{ $inte->alteraciones_transtornos_visuales_I }} - {{ $inte->v_alteraciones_transtornos_visuales_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_alteraciones_transtornos_visuales_R}}">{{ $inte->alteraciones_transtornos_visuales_R }} - {{ $inte->v_alteraciones_transtornos_visuales_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Alteraciones Y Transtornos De La Audición Y Comunicación
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_alteraciones_transtornos_audicion_I}}">{{ $inte->alteraciones_transtornos_audicion_I }} - {{ $inte->v_alteraciones_transtornos_audicion_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_alteraciones_transtornos_audicion_R}}">{{ $inte->alteraciones_transtornos_audicion_R }} - {{ $inte->v_alteraciones_transtornos_audicion_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Salud Bucal
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_salud_bucal_I}}">{{ $inte->salud_bucal_I }} - {{ $inte->v_salud_bucal_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_salud_bucal_R}}">{{ $inte->salud_bucal_R }} - {{ $inte->v_salud_bucal_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Problemas En Salud Mental
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_problemas_salud_mental_I}}">{{ $inte->problemas_salud_mental_I }} - {{ $inte->v_problemas_salud_mental_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_problemas_salud_mental_R}}">{{ $inte->problemas_salud_mental_R }} - {{ $inte->v_problemas_salud_mental_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Violencias
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_violencias_I}}">{{ $inte->violencias_I }} - {{ $inte->v_violencias_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_violencias_R}}">{{ $inte->violencias_R }} - {{ $inte->v_violencias_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Enfermedades Respiratorias Crónicas
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedades_respiratorias_I}}">{{ $inte->enfermedades_respiratorias_I }} - {{ $inte->v_enfermedades_respiratorias_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedades_respiratorias_R}}">{{ $inte->enfermedades_respiratorias_R }} - {{ $inte->v_enfermedades_respiratorias_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Riesgo Desnutrición Aguda
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_riesgos_desnutricion_aguda_I}}">{{ $inte->riesgos_desnutricion_aguda_I }} - {{ $inte->v_riesgos_desnutricion_aguda_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_riesgos_desnutricion_aguda_R}}">{{ $inte->riesgos_desnutricion_aguda_R }} - {{ $inte->v_riesgos_desnutricion_aguda_R }}</p>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          @if (!$loop->last)
            <div style="page-break-after:always;"></div>
          @endif
          @endforeach
          @if(count($riesgos_salud_de6a11) > 0)
          <div style="page-break-after:always;"></div>
          <div class="text-center">
            <h2 style="margin: 2px !important">
              <span class="kt-font-boldest text">Riesgos de Salud</span>
            </h2>
            <h3 style="margin: 2px !important;">
              INFANCIA NIÑOS(AS) DE 6 A 11 AÑOS
            </h3>
          </div>
          @endif
          @foreach($riesgos_salud_de6a11 as $inte)
          <div style="margin-bottom: 20px">
            <h3><u>{{$inte->pnom}} {{$inte->snom}} {{$inte->pape}} {{$inte->sape}}</u> </h3>
            <table class="table table-sm table-hover" style="width: 100%; font-size: 13px">
              <thead>
                <tr class="kt-bg-fill-brand">
                  <th style="vertical-align: middle;text-align: left; width: 60%">Riesgo</th>
                  <th style="vertical-align: middle;text-align: center;">Valorización I.</th>
                  <th style="vertical-align: middle;text-align: center;">Valorización R.</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Trastornos Degenerativos, Neuropatías Y Enfermedades Autoinmunes
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_transtornos_degenartivos_I}}">{{ $inte->transtornos_degenartivos_I }} - {{ $inte->v_transtornos_degenartivos_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_transtornos_degenartivos_R}}">{{ $inte->transtornos_degenartivos_R }} - {{ $inte->v_transtornos_degenartivos_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Riesgo De Delgadez
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_riesgo_delgadez_I}}">{{ $inte->riesgo_delgadez_I }} - {{ $inte->v_riesgo_delgadez_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_riesgo_delgadez_R}}">{{ $inte->riesgo_delgadez_R }} - {{ $inte->v_riesgo_delgadez_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Enfermedades Infeccisosas
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedades_infecciosas_I}}">{{ $inte->enfermedades_infecciosas_I }} - {{ $inte->v_enfermedades_infecciosas_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedades_infecciosas_R}}">{{ $inte->enfermedades_infecciosas_R }} - {{ $inte->v_enfermedades_infecciosas_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Cancer
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_cancer_I}}">{{ $inte->cancer_I }} - {{ $inte->v_cancer_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_cancer_R}}">{{ $inte->cancer_R }} - {{ $inte->v_cancer_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Enfermedades Zoonoticas
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedades_zoonoticas_I}}">{{ $inte->enfermedades_zoonoticas_I }} - {{ $inte->v_enfermedades_zoonoticas_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedades_zoonoticas_R}}">{{ $inte->enfermedades_zoonoticas_R }} - {{ $inte->v_enfermedades_zoonoticas_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Consumo De SPA
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_consumo_spa_I}}">{{ $inte->consumo_spa_I }} - {{ $inte->v_consumo_spa_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_consumo_spa_R}}">{{ $inte->consumo_spa_R }} - {{ $inte->v_consumo_spa_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Riesgo De Retraso En Talla
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_riesgo_talla_baja_I}}">{{ $inte->riesgo_talla_baja_I }} - {{ $inte->v_riesgo_talla_baja_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_riesgo_talla_baja_R}}">{{ $inte->riesgo_talla_baja_R }} - {{ $inte->v_riesgo_talla_baja_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Trastornos Asociados Al Uso De SPA
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_transtornos_asociados_spa_I}}">{{ $inte->transtornos_asociados_spa_I }} - {{ $inte->v_transtornos_asociados_spa_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_transtornos_asociados_spa_R}}">{{ $inte->transtornos_asociados_spa_R }} - {{ $inte->v_transtornos_asociados_spa_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Enfermedad Cardiovascular Aterogénica
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedad_cardiovascular_I}}">{{ $inte->enfermedad_cardiovascular_I }} - {{ $inte->v_enfermedad_cardiovascular_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedad_cardiovascular_R}}">{{ $inte->enfermedad_cardiovascular_R }} - {{ $inte->v_enfermedad_cardiovascular_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Alteraciones Y Transtornos Visuales
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_alteraciones_transtornos_visuales_I}}">{{ $inte->alteraciones_transtornos_visuales_I }} - {{ $inte->v_alteraciones_transtornos_visuales_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_alteraciones_transtornos_visuales_R}}">{{ $inte->alteraciones_transtornos_visuales_R }} - {{ $inte->v_alteraciones_transtornos_visuales_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Alteraciones Y Transtornos De La Audición Y Comunicación
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_alteraciones_transtornos_audicion_I}}">{{ $inte->alteraciones_transtornos_audicion_I }} - {{ $inte->v_alteraciones_transtornos_audicion_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_alteraciones_transtornos_audicion_R}}">{{ $inte->alteraciones_transtornos_audicion_R }} - {{ $inte->v_alteraciones_transtornos_audicion_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Salud Bucal
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_salud_bucal_I}}">{{ $inte->salud_bucal_I }} - {{ $inte->v_salud_bucal_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_salud_bucal_R}}">{{ $inte->salud_bucal_R }} - {{ $inte->v_salud_bucal_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Problemas En Salud Mental
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_problemas_salud_mental_I}}">{{ $inte->problemas_salud_mental_I }} - {{ $inte->v_problemas_salud_mental_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_problemas_salud_mental_R}}">{{ $inte->problemas_salud_mental_R }} - {{ $inte->v_problemas_salud_mental_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Violencias
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_violencias_I}}">{{ $inte->violencias_I }} - {{ $inte->v_violencias_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_violencias_R}}">{{ $inte->violencias_R }} - {{ $inte->v_violencias_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Enfermedades Respiratorias Crónicas
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedades_respiratorias_I}}">{{ $inte->enfermedades_respiratorias_I }} - {{ $inte->v_enfermedades_respiratorias_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedades_respiratorias_R}}">{{ $inte->enfermedades_respiratorias_R }} - {{ $inte->v_enfermedades_respiratorias_R }}</p>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          @if (!$loop->last)
            <div style="page-break-after:always;"></div>
          @endif
          @endforeach
          @if(count($riesgos_salud_de12a17) > 0)
          <div style="page-break-after:always;"></div>
          <div class="text-center">
            <h2 style="margin: 2px !important">
              <span class="kt-font-boldest text">Riesgos de Salud</span>
            </h2>
            <h3 style="margin: 2px !important;">
              ADOLESCENTES DE 12 A 17 AÑOS
            </h3>
          </div>
          @endif
          @foreach($riesgos_salud_de12a17 as $inte)
          <div style="margin-bottom: 20px">
            <h3><u>{{$inte->pnom}} {{$inte->snom}} {{$inte->pape}} {{$inte->sape}}</u> </h3>
            <table class="table table-sm table-hover" style="width: 100%; font-size: 13px">
              <thead>
                <tr class="kt-bg-fill-brand">
                  <th style="vertical-align: middle;text-align: left; width: 60%">Riesgo</th>
                  <th style="vertical-align: middle;text-align: center;">Valorización I.</th>
                  <th style="vertical-align: middle;text-align: center;">Valorización R.</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Trastornos Degenerativos, Neuropatías Y Enfermedades Autoinmunes
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_transtornos_degenartivos_I}}">{{ $inte->transtornos_degenartivos_I }} - {{ $inte->v_transtornos_degenartivos_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_transtornos_degenartivos_R}}">{{ $inte->transtornos_degenartivos_R }} - {{ $inte->v_transtornos_degenartivos_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Enfermedades Infeccisosas
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedades_infecciosas_I}}">{{ $inte->enfermedades_infecciosas_I }} - {{ $inte->v_enfermedades_infecciosas_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedades_infecciosas_R}}">{{ $inte->enfermedades_infecciosas_R }} - {{ $inte->v_enfermedades_infecciosas_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Cancer
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_cancer_I}}">{{ $inte->cancer_I }} - {{ $inte->v_cancer_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_cancer_R}}">{{ $inte->cancer_R }} - {{ $inte->v_cancer_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Enfermedades Zoonoticas
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedades_zoonoticas_I}}">{{ $inte->enfermedades_zoonoticas_I }} - {{ $inte->v_enfermedades_zoonoticas_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedades_zoonoticas_R}}">{{ $inte->enfermedades_zoonoticas_R }} - {{ $inte->v_enfermedades_zoonoticas_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Consumo De SPA
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_consumo_spa_I}}">{{ $inte->consumo_spa_I }} - {{ $inte->v_consumo_spa_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_consumo_spa_R}}">{{ $inte->consumo_spa_R }} - {{ $inte->v_consumo_spa_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Riesgo De Retraso En Talla
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_riesgo_talla_baja_I}}">{{ $inte->riesgo_talla_baja_I }} - {{ $inte->v_riesgo_talla_baja_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_riesgo_talla_baja_R}}">{{ $inte->riesgo_talla_baja_R }} - {{ $inte->v_riesgo_talla_baja_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Trastornos Asociados Al Uso De SPA
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_transtornos_asociados_spa_I}}">{{ $inte->transtornos_asociados_spa_I }} - {{ $inte->v_transtornos_asociados_spa_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_transtornos_asociados_spa_R}}">{{ $inte->transtornos_asociados_spa_R }} - {{ $inte->v_transtornos_asociados_spa_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Enfermedad Cardiovascular Aterogénica
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedad_cardiovascular_I}}">{{ $inte->enfermedad_cardiovascular_I }} - {{ $inte->v_enfermedad_cardiovascular_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedad_cardiovascular_R}}">{{ $inte->enfermedad_cardiovascular_R }} - {{ $inte->v_enfermedad_cardiovascular_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Alteraciones Y Transtornos Visuales
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_alteraciones_transtornos_visuales_I}}">{{ $inte->alteraciones_transtornos_visuales_I }} - {{ $inte->v_alteraciones_transtornos_visuales_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_alteraciones_transtornos_visuales_R}}">{{ $inte->alteraciones_transtornos_visuales_R }} - {{ $inte->v_alteraciones_transtornos_visuales_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Alteraciones Y Transtornos De La Audición Y Comunicación
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_alteraciones_transtornos_audicion_I}}">{{ $inte->alteraciones_transtornos_audicion_I }} - {{ $inte->v_alteraciones_transtornos_audicion_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_alteraciones_transtornos_audicion_R}}">{{ $inte->alteraciones_transtornos_audicion_R }} - {{ $inte->v_alteraciones_transtornos_audicion_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Salud Bucal
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_salud_bucal_I}}">{{ $inte->salud_bucal_I }} - {{ $inte->v_salud_bucal_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_salud_bucal_R}}">{{ $inte->salud_bucal_R }} - {{ $inte->v_salud_bucal_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Problemas En Salud Mental
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_problemas_salud_mental_I}}">{{ $inte->problemas_salud_mental_I }} - {{ $inte->v_problemas_salud_mental_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_problemas_salud_mental_R}}">{{ $inte->problemas_salud_mental_R }} - {{ $inte->v_problemas_salud_mental_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Violencias
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_violencias_I}}">{{ $inte->violencias_I }} - {{ $inte->v_violencias_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_violencias_R}}">{{ $inte->violencias_R }} - {{ $inte->v_violencias_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Enfermedades Respiratorias Crónicas
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedades_respiratorias_I}}">{{ $inte->enfermedades_respiratorias_I }} - {{ $inte->v_enfermedades_respiratorias_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedades_respiratorias_R}}">{{ $inte->enfermedades_respiratorias_R }} - {{ $inte->v_enfermedades_respiratorias_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Riesgo De Delgadez
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_riesgo_delgadez_I}}">{{ $inte->riesgo_delgadez_I }} - {{ $inte->v_riesgo_delgadez_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_riesgo_delgadez_R}}">{{ $inte->riesgo_delgadez_R }} - {{ $inte->v_riesgo_delgadez_R }}</p>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          @if (!$loop->last)
            <div style="page-break-after:always;"></div>
          @endif
          @endforeach
          @if(count($riesgos_salud_de18a28) > 0)
          <div style="page-break-after:always;"></div>
          <div class="text-center">
            <h2 style="margin: 2px !important">
              <span class="kt-font-boldest text">Riesgos de Salud</span>
            </h2>
            <h3 style="margin: 2px !important;">
              JUVENTUD, JOVENES DE 18 A 28 AÑOS
            </h3>
          </div>
          @endif
          @foreach($riesgos_salud_de18a28 as $inte)
          <div style="margin-bottom: 20px">
            <h3><u>{{$inte->pnom}} {{$inte->snom}} {{$inte->pape}} {{$inte->sape}}</u> </h3>
            <table class="table table-sm table-hover" style="width: 100%; font-size: 13px">
              <thead>
                <tr class="kt-bg-fill-brand">
                  <th style="vertical-align: middle;text-align: left; width: 60%">Riesgo</th>
                  <th style="vertical-align: middle;text-align: center;">Valorización I.</th>
                  <th style="vertical-align: middle;text-align: center;">Valorización R.</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Trastornos Degenerativos, Neuropatías Y Enfermedades Autoinmunes
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_transtornos_degenartivos_I}}">{{ $inte->transtornos_degenartivos_I }} - {{ $inte->v_transtornos_degenartivos_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_transtornos_degenartivos_R}}">{{ $inte->transtornos_degenartivos_R }} - {{ $inte->v_transtornos_degenartivos_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Enfermedades Infeccisosas
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedades_infecciosas_I}}">{{ $inte->enfermedades_infecciosas_I }} - {{ $inte->v_enfermedades_infecciosas_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedades_infecciosas_R}}">{{ $inte->enfermedades_infecciosas_R }} - {{ $inte->v_enfermedades_infecciosas_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Cancer
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_cancer_I}}">{{ $inte->cancer_I }} - {{ $inte->v_cancer_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_cancer_R}}">{{ $inte->cancer_R }} - {{ $inte->v_cancer_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Enfermedades Zoonoticas
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedades_zoonoticas_I}}">{{ $inte->enfermedades_zoonoticas_I }} - {{ $inte->v_enfermedades_zoonoticas_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedades_zoonoticas_R}}">{{ $inte->enfermedades_zoonoticas_R }} - {{ $inte->v_enfermedades_zoonoticas_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Consumo De SPA
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_consumo_spa_I}}">{{ $inte->consumo_spa_I }} - {{ $inte->v_consumo_spa_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_consumo_spa_R}}">{{ $inte->consumo_spa_R }} - {{ $inte->v_consumo_spa_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Trastornos Asociados Al Uso De SPA
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_transtornos_asociados_spa_I}}">{{ $inte->transtornos_asociados_spa_I }} - {{ $inte->v_transtornos_asociados_spa_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_transtornos_asociados_spa_R}}">{{ $inte->transtornos_asociados_spa_R }} - {{ $inte->v_transtornos_asociados_spa_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Enfermedad Cardiovascular Aterogénica
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedad_cardiovascular_I}}">{{ $inte->enfermedad_cardiovascular_I }} - {{ $inte->v_enfermedad_cardiovascular_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedad_cardiovascular_R}}">{{ $inte->enfermedad_cardiovascular_R }} - {{ $inte->v_enfermedad_cardiovascular_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Alteraciones Y Transtornos Visuales
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_alteraciones_transtornos_visuales_I}}">{{ $inte->alteraciones_transtornos_visuales_I }} - {{ $inte->v_alteraciones_transtornos_visuales_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_alteraciones_transtornos_visuales_R}}">{{ $inte->alteraciones_transtornos_visuales_R }} - {{ $inte->v_alteraciones_transtornos_visuales_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Alteraciones Y Transtornos De La Audición Y Comunicación
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_alteraciones_transtornos_audicion_I}}">{{ $inte->alteraciones_transtornos_audicion_I }} - {{ $inte->v_alteraciones_transtornos_audicion_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_alteraciones_transtornos_audicion_R}}">{{ $inte->alteraciones_transtornos_audicion_R }} - {{ $inte->v_alteraciones_transtornos_audicion_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Salud Bucal
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_salud_bucal_I}}">{{ $inte->salud_bucal_I }} - {{ $inte->v_salud_bucal_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_salud_bucal_R}}">{{ $inte->salud_bucal_R }} - {{ $inte->v_salud_bucal_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Problemas En Salud Mental
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_problemas_salud_mental_I}}">{{ $inte->problemas_salud_mental_I }} - {{ $inte->v_problemas_salud_mental_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_problemas_salud_mental_R}}">{{ $inte->problemas_salud_mental_R }} - {{ $inte->v_problemas_salud_mental_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Violencias
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_violencias_I}}">{{ $inte->violencias_I }} - {{ $inte->v_violencias_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_violencias_R}}">{{ $inte->violencias_R }} - {{ $inte->v_violencias_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Enfermedades Respiratorias Crónicas
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedades_respiratorias_I}}">{{ $inte->enfermedades_respiratorias_I }} - {{ $inte->v_enfermedades_respiratorias_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedades_respiratorias_R}}">{{ $inte->enfermedades_respiratorias_R }} - {{ $inte->v_enfermedades_respiratorias_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Riesgo De Delgadez
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_riesgo_delgadez_I}}">{{ $inte->riesgo_delgadez_I }} - {{ $inte->v_riesgo_delgadez_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_riesgo_delgadez_R}}">{{ $inte->riesgo_delgadez_R }} - {{ $inte->v_riesgo_delgadez_R }}</p>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          @if (!$loop->last)
            <div style="page-break-after:always;"></div>
          @endif
          @endforeach
          @if(count($riesgos_salud_de29a59) > 0)
          <div style="page-break-after:always;"></div>
          <div class="text-center">
            <h2 style="margin: 2px !important">
              <span class="kt-font-boldest text">Riesgos de Salud</span>
            </h2>
            <h3 style="margin: 2px !important;">
              HOMBRES Y MUJERES DE 29 AÑOS A 59 AÑOS
            </h3>
          </div>
          @endif
          @foreach($riesgos_salud_de29a59 as $inte)
          <div style="margin-bottom: 20px">
            <h3><u>{{$inte->pnom}} {{$inte->snom}} {{$inte->pape}} {{$inte->sape}}</u> </h3>
            <table class="table table-sm table-hover" style="width: 100%; font-size: 13px">
              <thead>
                <tr class="kt-bg-fill-brand">
                  <th style="vertical-align: middle;text-align: left; width: 60%">Riesgo</th>
                  <th style="vertical-align: middle;text-align: center;">Valorización I.</th>
                  <th style="vertical-align: middle;text-align: center;">Valorización R.</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Trastornos Degenerativos, Neuropatías Y Enfermedades Autoinmunes
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_transtornos_degenartivos_I}}">{{ $inte->transtornos_degenartivos_I }} - {{ $inte->v_transtornos_degenartivos_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_transtornos_degenartivos_R}}">{{ $inte->transtornos_degenartivos_R }} - {{ $inte->v_transtornos_degenartivos_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Enfermedades Infeccisosas
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedades_infecciosas_I}}">{{ $inte->enfermedades_infecciosas_I }} - {{ $inte->v_enfermedades_infecciosas_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedades_infecciosas_R}}">{{ $inte->enfermedades_infecciosas_R }} - {{ $inte->v_enfermedades_infecciosas_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Cancer
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_cancer_I}}">{{ $inte->cancer_I }} - {{ $inte->v_cancer_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_cancer_R}}">{{ $inte->cancer_R }} - {{ $inte->v_cancer_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Enfermedades Zoonoticas
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedades_zoonoticas_I}}">{{ $inte->enfermedades_zoonoticas_I }} - {{ $inte->v_enfermedades_zoonoticas_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedades_zoonoticas_R}}">{{ $inte->enfermedades_zoonoticas_R }} - {{ $inte->v_enfermedades_zoonoticas_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Consumo De SPA
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_consumo_spa_I}}">{{ $inte->consumo_spa_I }} - {{ $inte->v_consumo_spa_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_consumo_spa_R}}">{{ $inte->consumo_spa_R }} - {{ $inte->v_consumo_spa_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Trastornos Asociados Al Uso De SPA
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_transtornos_asociados_spa_I}}">{{ $inte->transtornos_asociados_spa_I }} - {{ $inte->v_transtornos_asociados_spa_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_transtornos_asociados_spa_R}}">{{ $inte->transtornos_asociados_spa_R }} - {{ $inte->v_transtornos_asociados_spa_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Enfermedad Cardiovascular Aterogénica
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedad_cardiovascular_I}}">{{ $inte->enfermedad_cardiovascular_I }} - {{ $inte->v_enfermedad_cardiovascular_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedad_cardiovascular_R}}">{{ $inte->enfermedad_cardiovascular_R }} - {{ $inte->v_enfermedad_cardiovascular_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Alteraciones Y Transtornos Visuales
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_alteraciones_transtornos_visuales_I}}">{{ $inte->alteraciones_transtornos_visuales_I }} - {{ $inte->v_alteraciones_transtornos_visuales_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_alteraciones_transtornos_visuales_R}}">{{ $inte->alteraciones_transtornos_visuales_R }} - {{ $inte->v_alteraciones_transtornos_visuales_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Alteraciones Y Transtornos De La Audición Y Comunicación
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_alteraciones_transtornos_audicion_I}}">{{ $inte->alteraciones_transtornos_audicion_I }} - {{ $inte->v_alteraciones_transtornos_audicion_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_alteraciones_transtornos_audicion_R}}">{{ $inte->alteraciones_transtornos_audicion_R }} - {{ $inte->v_alteraciones_transtornos_audicion_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Salud Bucal
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_salud_bucal_I}}">{{ $inte->salud_bucal_I }} - {{ $inte->v_salud_bucal_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_salud_bucal_R}}">{{ $inte->salud_bucal_R }} - {{ $inte->v_salud_bucal_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Problemas En Salud Mental
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_problemas_salud_mental_I}}">{{ $inte->problemas_salud_mental_I }} - {{ $inte->v_problemas_salud_mental_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_problemas_salud_mental_R}}">{{ $inte->problemas_salud_mental_R }} - {{ $inte->v_problemas_salud_mental_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Violencias
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_violencias_I}}">{{ $inte->violencias_I }} - {{ $inte->v_violencias_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_violencias_R}}">{{ $inte->violencias_R }} - {{ $inte->v_violencias_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Enfermedades Respiratorias Crónicas
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedades_respiratorias_I}}">{{ $inte->enfermedades_respiratorias_I }} - {{ $inte->v_enfermedades_respiratorias_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedades_respiratorias_R}}">{{ $inte->enfermedades_respiratorias_R }} - {{ $inte->v_enfermedades_respiratorias_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Riesgo De Delgadez
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_riesgo_delgadez_I}}">{{ $inte->riesgo_delgadez_I }} - {{ $inte->v_riesgo_delgadez_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_riesgo_delgadez_R}}">{{ $inte->riesgo_delgadez_R }} - {{ $inte->v_riesgo_delgadez_R }}</p>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          @if (!$loop->last)
            <div style="page-break-after:always;"></div>
          @endif
          @endforeach
          @if(count($riesgos_salud_de60) > 0)
          <div style="page-break-after:always;"></div>
          <div class="text-center">
            <h2 style="margin: 2px !important">
              <span class="kt-font-boldest text">Riesgos de Salud</span>
            </h2>
            <h3 style="margin: 2px !important;">
              ADULTO MAYOR
            </h3>
          </div>
          @endif
          @foreach($riesgos_salud_de60 as $inte)
          <div style="margin-bottom: 20px">
            <h3><u>{{$inte->pnom}} {{$inte->snom}} {{$inte->pape}} {{$inte->sape}}</u> </h3>
            <table class="table table-sm table-hover" style="width: 100%; font-size: 13px">
              <thead>
                <tr class="kt-bg-fill-brand">
                  <th style="vertical-align: middle;text-align: left; width: 60%">Riesgo</th>
                  <th style="vertical-align: middle;text-align: center;">Valorización I.</th>
                  <th style="vertical-align: middle;text-align: center;">Valorización R.</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Trastornos Degenerativos, Neuropatías Y Enfermedades Autoinmunes
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_transtornos_degenartivos_I}}">{{ $inte->transtornos_degenartivos_I }} - {{ $inte->v_transtornos_degenartivos_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_transtornos_degenartivos_R}}">{{ $inte->transtornos_degenartivos_R }} - {{ $inte->v_transtornos_degenartivos_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Enfermedades Infeccisosas
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedades_infecciosas_I}}">{{ $inte->enfermedades_infecciosas_I }} - {{ $inte->v_enfermedades_infecciosas_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedades_infecciosas_R}}">{{ $inte->enfermedades_infecciosas_R }} - {{ $inte->v_enfermedades_infecciosas_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Cancer
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_cancer_I}}">{{ $inte->cancer_I }} - {{ $inte->v_cancer_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_cancer_R}}">{{ $inte->cancer_R }} - {{ $inte->v_cancer_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Enfermedades Zoonoticas
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedades_zoonoticas_I}}">{{ $inte->enfermedades_zoonoticas_I }} - {{ $inte->v_enfermedades_zoonoticas_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedades_zoonoticas_R}}">{{ $inte->enfermedades_zoonoticas_R }} - {{ $inte->v_enfermedades_zoonoticas_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Consumo De SPA
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_consumo_spa_I}}">{{ $inte->consumo_spa_I }} - {{ $inte->v_consumo_spa_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_consumo_spa_R}}">{{ $inte->consumo_spa_R }} - {{ $inte->v_consumo_spa_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Trastornos Asociados Al Uso De SPA
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_transtornos_asociados_spa_I}}">{{ $inte->transtornos_asociados_spa_I }} - {{ $inte->v_transtornos_asociados_spa_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_transtornos_asociados_spa_R}}">{{ $inte->transtornos_asociados_spa_R }} - {{ $inte->v_transtornos_asociados_spa_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Enfermedad Cardiovascular Aterogénica
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedad_cardiovascular_I}}">{{ $inte->enfermedad_cardiovascular_I }} - {{ $inte->v_enfermedad_cardiovascular_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedad_cardiovascular_R}}">{{ $inte->enfermedad_cardiovascular_R }} - {{ $inte->v_enfermedad_cardiovascular_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Alteraciones Y Transtornos Visuales
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_alteraciones_transtornos_visuales_I}}">{{ $inte->alteraciones_transtornos_visuales_I }} - {{ $inte->v_alteraciones_transtornos_visuales_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_alteraciones_transtornos_visuales_R}}">{{ $inte->alteraciones_transtornos_visuales_R }} - {{ $inte->v_alteraciones_transtornos_visuales_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Alteraciones Y Transtornos De La Audición Y Comunicación
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_alteraciones_transtornos_audicion_I}}">{{ $inte->alteraciones_transtornos_audicion_I }} - {{ $inte->v_alteraciones_transtornos_audicion_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_alteraciones_transtornos_audicion_R}}">{{ $inte->alteraciones_transtornos_audicion_R }} - {{ $inte->v_alteraciones_transtornos_audicion_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Salud Bucal
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_salud_bucal_I}}">{{ $inte->salud_bucal_I }} - {{ $inte->v_salud_bucal_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_salud_bucal_R}}">{{ $inte->salud_bucal_R }} - {{ $inte->v_salud_bucal_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Problemas En Salud Mental
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_problemas_salud_mental_I}}">{{ $inte->problemas_salud_mental_I }} - {{ $inte->v_problemas_salud_mental_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_problemas_salud_mental_R}}">{{ $inte->problemas_salud_mental_R }} - {{ $inte->v_problemas_salud_mental_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Violencias
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_violencias_I}}">{{ $inte->violencias_I }} - {{ $inte->v_violencias_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_violencias_R}}">{{ $inte->violencias_R }} - {{ $inte->v_violencias_R }}</p>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;">
                    Enfermedades Respiratorias Crónicas
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedades_respiratorias_I}}">{{ $inte->enfermedades_respiratorias_I }} - {{ $inte->v_enfermedades_respiratorias_I }}</p>
                  </td>
                  <td style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;">
                    <p style="padding: 10px; margin: 0px" class="{{$inte->c_enfermedades_respiratorias_R}}">{{ $inte->enfermedades_respiratorias_R }} - {{ $inte->v_enfermedades_respiratorias_R }}</p>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          @if (!$loop->last)
            <div style="page-break-after:always;"></div>
          @endif
          @endforeach
        </div>
      </main>
    </body>
</html>