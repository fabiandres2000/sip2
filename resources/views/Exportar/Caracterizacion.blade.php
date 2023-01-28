<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Caracterización</title>
    <style>
        .estilo table {
            width: 100%;
            font-family: Arial;
            /* border: 2px solid #000; */
            /* border-collapse: collapse; */
            font-size: 15px;
        }

        .estilo th,
        .estilo td {
            /* border: 1px solid #000; */
            /* padding: 5px; */
            text-align: center;
        }

        .estilo th {
            background-color: #594887;
            color: #fff;
        }

        .estilo tr:nth-child(2) {
            /* border-bottom: 3px solid #000; */
        }
    </style>
</head>

<body>
    <div style="border: 3px #000 double;padding: 5px;border-radius: 3px;">
        <table width="100%">
            <tbody>
                <tr>
                    <td style="width: 100%">
                        <table style="width: 100%">
                            <tr>
                                <td colspan="5" style="width: 100%">
                                    <p
                                        style="font-weight: bold;text-align: center;font-size: 14px;margin: 0;text-transform: uppercase">
                                        SISTEMA DE INTEGRACION POBLACIONAL</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5" style="width: 100%">
                                    <p
                                        style="font-weight: bold;text-align: center;font-size: 14px;margin: 0;text-transform: uppercase">
                                        SIP
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        <hr>
        <h3>Listado de Usuarios Caracterizados</h3>
        <hr>

        <table width="100%" class="estilo">
            <tbody>
                <tr>
                    <th widtd="5%">No.</th>
                    <th widtd="25%">Departamento</th>
                    <th widtd="5%">Municipio</th>
                    <th widtd="5%">Corregimiento</th>
                    <th widtd="25%">Identificación</th>
                    <th widtd="25%">Usuario</th>
                </tr>
            </tbody>
            <tbody id="detalle">
                @foreach($caracterizacion as $usu)
                <tr class="table_row">
                    <td style='font-size:9;px;font-weight: normal;vertical-align: middle;'>{{ $loop->iteration }}</td>
                    <td style='font-size:9;font-weight: normal;vertical-align: middle;text-transform: capitalize;'>
                        {{strtoupper($usu->DPTO)}}</td>
                    <td style='font-size:9;font-weight: normal;vertical-align: middle;text-transform: capitalize;'>
                        {{strtoupper($usu->MUNI)}}</td>
                    <td style='font-size:9;font-weight: normal;vertical-align: middle;text-transform: capitalize;'>
                        {{strtoupper($usu->CORREGIMIENTO)}}</td>
                    <td style='font-size:9;font-weight: normal;vertical-align: middle;text-transform: capitalize;'>
                        {{strtoupper($usu->IDENTIFICACION)}}</td>
                    <td style='font-size:9;font-weight: normal;vertical-align: middle;text-transform: capitalize;'>
                        {{strtoupper($usu->USUARIO)}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>