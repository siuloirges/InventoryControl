<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ACTA DE CONCILIACION {{ strtoupper($reporte->created_at->format("M")) }}</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('uploads/2019-11/8457bf7794e8309af3c84d3250fcae97.png') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/pdf.css') }}" media="screen,projection" />
</head>

<body>

@yield('conten')

</body>

</html>
