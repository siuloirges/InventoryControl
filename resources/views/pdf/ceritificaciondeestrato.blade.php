<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificacion de Estrato </title>
</head>
<style>
    th {
        text-align: center;
        font-weight: bold;
    }

    span{
        text-decoration: underline;
    }

    .fw {
        width: 100%;
    }

    .taj {
        text-align: justify;
    }

    .cont {
        margin: 100px 10%;
    }
</style>

<body class="cont">

    <table class="fw">
        <thead>
            <tr>
                <th colspan="12">CERTIFICACIÓN DE</th>
            </tr>
            <tr>
                <th colspan="12">ESTRATO SOCIOECONÓMICO</th>
            </tr>
        </thead>
        <tbody>
            <tr><td colspan="12"></td></tr>
            <tr><td colspan="12"></td></tr>
            <tr><td colspan="12"></td></tr>
            <tr><td colspan="12"></td></tr>
            <tr>
                <td colspan="12" class="taj">Yo (nombre): {{ $oportunidad->nombres }} {{ $oportunidad->apellidos }} identificado (a) con número de
                    documento: {{ $oportunidad->numero_cedula }}
                    CERTIFICO la siguiente información sobre la vivienda en la cual los servicios de HughesNet serán
                    instalados.</td>
            </tr>
            <tr><td colspan="12"></td></tr>
            <tr><td colspan="12"></td></tr>
            <tr><td colspan="12"></td></tr>
            <tr><td colspan="12"></td></tr>
            <tr><td colspan="12"></td></tr>
            <tr>
                <td colspan="2"></td>
                <td colspan="8">• Dirección / Indicaciones (incluir vereda si aplica): <br> &nbsp; &nbsp; {{ $oportunidad->direccion }} <br><br></td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td colspan="8">• Ciudad/Municipio, Departamento: <br> &nbsp; &nbsp; {{ $oportunidad->municipio->municipio }} - {{ $oportunidad->departamento->departamento }} <br><br></td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td colspan="8">• Estrato Socioeconómico (1-6): {{ $oportunidad->producto->estrato }}</td>
                <td colspan="2"></td>

            </tr>
            <tr><td colspan="12"></td></tr>
            <tr><td colspan="12"></td></tr>
            <tr><td colspan="12"></td></tr>
            <tr><td colspan="12"></td></tr>
            <tr><td colspan="12"></td></tr>
            <tr><td colspan="12"></td></tr>
            <tr><td colspan="12"></td></tr>
            <tr>
                
                <td colspan="12">FIRMA: <span>{{ $oportunidad->nombres }} {{ $oportunidad->apellidos }}</span></td>
                

            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="1"></td>
                <td colspan="1"></td>
                <td colspan="1"></td>
                <td colspan="1"></td>
                <td colspan="1"></td>
                <td colspan="1"></td>
                <td colspan="1"></td>
                <td colspan="1"></td>
                <td colspan="1"></td>
                <td colspan="1"></td>
                <td colspan="1"></td>
                <td colspan="1"></td>

            </tr>

        </tfoot>
    </table>
</body>

</html>