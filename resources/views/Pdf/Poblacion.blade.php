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
        <h2 style="color: #5578eb; margin: 2px">Reporte Poblacional</h2> 
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
        <div style="padding-top: 100px">
            <img src="{{$imagenes}}" style="width: 550px; height: 400px; float: left">
            <div style="float: left; text-align: center; width: 600px; height: 300px; padding-top: 40px">
                <h2>Personas caracterizadas</h2>
                <h3>(Por Sexo)</h3>
                <img src="{{$grafico1}}" style="width: 650px; height: 300px">
            </div>
        </div>
        <div style="page-break-after:always;"></div>
        <div  style="padding-top: 160px">
            <div style="float: left; text-align: center; width: 600px !important; height: 300px">
                <h2>Personas caracterizadas</h2>
                <h3>(Por Grupo de Edad y Sexo)</h3>
                <img src="{{$grafico2}}" style="width: 600px; height: 300px">
                <img src="{{$hmp}}" style="width: 600px">
            </div>
            <div style="float: left; text-align: center; width: 550px !important; height: 300px">
                <h2>Personas caracterizadas</h2>
                <h3>(Por Grupo de Edad)</h3>
                <img src="{{$grafico3}}" style="width: 550px; height: 300px">
            </div>
        </div>
        <div style="page-break-after:always;"></div>
        <div  style="padding-top: 170px">
            <div style="float: left; text-align: center; width: 600px !important; height: 300px">
                <h2>Mujeres Embarzadas</h2>
                <h3>(Por Grupo de Edad)</h3>
                <img src="{{$grafico4}}" style="width: 600px; height: 300px">
            </div>
            <div style="float: left; text-align: center; width: 550px !important; height: 300px">
                <h2>Personas caracterizadas</h2>
                <h3>(Migrantes Vs No Migrantes)</h3>
                <img src="{{$grafico5}}" style="width: 550px; height: 300px">
            </div>
        </div>
        <div style="page-break-after:always;"></div>
        <div  style="padding-top: 180px">
            <div style="text-align: center; width: 100% !important; height: auto">
                <h2>Personas caracterizadas</h2>
                <h3>(Por Nivel de Escolaridad)</h3>
                <img src="{{$grafico6}}" style="width: 100%; height: auto">
            </div>
        </div>
    </main>
</body>
</html>