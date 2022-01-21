@extends('pdf.layout')

@section('conten')
<table class="page-break">
    <thead>
    </thead>
    <tbody>
        <tr>
            <th colspan="12" class="no-border-top center bold t1"> {{$datos->transportadora->encabezado}} </th>
        </tr>
        <tr>
            <th colspan="4">{{-- <imgclass='logos'src="asset($datos->transportadora->logo_mintransporte)"> --}}</th>
            <th colspan="4">{{-- <imgclass='logos'src="asset($datos->transportadora->logo_iso)"> --}}</th>
            <th colspan="4">{{-- <imgclass='logos'src="asset($datos->transportadora->logo)"> --}}</th>
        </tr>
    
    
        <tr>
            <th colspan="12" class="t3">FORMAO UNICO DEL CONTRATO UNICO DEL SERVICIO PUBLICO DE TRANSPORTE TERRESTRE
                AUTOMOTOR ESPECIAL</th>
        </tr>

        <tr>
            <td class="center" colspan="12">FECHA DE EXPEDICION: <strong> {{$datos->fecha_expedicion}} </strong></td>
        </tr>

        <tr>
            <th colspan="12" class="t2">No {{$datos->transportadora->codigo_direccion_territorial.
            $datos->transportadora->numero_resolucion.
            $datos->transportadora->año_habilitacion.
            substr($datos->fecha_expedicion,0,4).
            str_pad($datos->contrato_id, 4, "0", STR_PAD_LEFT).
            $datos->consecutivo
            }}</th>
        </tr>

        <tr>
            <td colspan="3" class='bold'>RAZON SOCIAL: </td>
            <td colspan="5" class=""> {{$datos->transportadora->razon_social}}</td>
            <td colspan="4" class=""> <strong>NIT:</strong> {{$datos->transportadora->nit."-".$datos->transportadora->digito_verificacion}}</td>
        </tr>



        <tr>
            <td colspan="12" class="bold">CONTRATO N°: {{  str_pad($datos->contrato_id, 4, "0", STR_PAD_LEFT) }}</td>
        </tr>

        <tr>
            <td colspan="3" class='bold'>CONTRATANTE: </td>
            <td colspan="5" class=""> {{$datos->contratante->razon_social}}</td>
            <td colspan="4" class=""> <strong>NIT/CC:</strong> {{$datos->contratante->nit}}</td>
        </tr>

        <tr>
            <td colspan="2"class="bold"> OBJETO CONTRATO: </td>
            <td colspan="10" > {{$datos->objetoContrato->nombre}} </td>
        </tr>

        <tr>
            <td colspan="3" class="bold">ORIGEN: </td>
            <td colspan="3"> {{$datos->origen}} </td>
            <td colspan="3" class="bold">DESTINO: </td>
            <td colspan="3">{{$datos->destino}}</td>

        </tr>

        {{-- <tr>
            <td colspan="2" class='bold'>RECORRIDO: </td>
            <td colspan="10" class=""> {{$datos['recorrido']}} </td>
        </tr> --}}

        @if ($datos->vehiculo->convenio <> null)
        <tr>
            <td colspan="12" class="center"><strong>CONVENIO / CONSORCIO / U.TEMPORAL:</strong> {{$datos->vehiculo->convenio}}</td>
            
        </tr>
        @endif

        <tr>
            <th colspan="12">VIGENCIA DEL CONTRATO</th>
        </tr>

        <tr>
            <td colspan="3"class="bold">FECHA INICIAL:</td>
            <td colspan="9" > {{$datos['fecha_inicio']}} </td>
        </tr>

        <tr>
            <td colspan="3"class="bold">FECHA FINAL:</td>
            <td colspan="9" > {{$datos['fecha_fin']}} </td>
        </tr>

        <tr>
            <th colspan="12" class="t3">CARACTERISTICAS DEL VEHICULO</th>
        </tr>

        <tr>
            <td colspan="3" class="center bold">PLACA</td>
            <td colspan="3" class="center bold">MODELO</td>
            <td colspan="3" class="center bold">MARCA</td>
            <td colspan="3" class="center bold">CLASE</td>
        </tr>

        <tr>
            <td colspan="3" class="center "> {{$datos->vehiculo['placa']}} </td>
            <td colspan="3" class="center "> {{$datos->vehiculo['modelo']}} </td>
            <td colspan="3" class="center "> {{$datos->vehiculo['marca']}} </td>
            <td colspan="3" class="center "> {{$datos->vehiculo['clase']}} </td>
        </tr>

        

        <tr>
            <td colspan="6" class="center bold">NUMERO INTERNO</td>
            <td colspan="6" class="center bold">NUMERO TARJETA DE OPERACION</td>
        </tr>

        <tr>
            <td colspan="6" class="center "> {{$datos->vehiculo['numero_interno']}} </td>
            <td colspan="6" class="center "> {{$datos->vehiculo['tarjeta_operacion']}} </td>
        </tr>

        <tr>
            <td colspan="12" class="center bold">CONDUCTORES</td>
        </tr>

        <tr>
            <td colspan="3" class="center bold">NOMBRES Y APELLIDOS</td>
            <td colspan="3" class="center bold">N° CEDULA</td>
            <td colspan="3" class="center bold">N° LICENCIA CONDUCCION</td>
            <td colspan="3" class="center bold">VIGENCIA</td>
        </tr>

        
        {{-- @foreach ($conductores as $conductor) --}}
        <tr>
            <td colspan="3" class="">{{$conductor->nombres." ".$conductor->apellidos}}</td>
            <td colspan="3" class="">{{$conductor->cedula}}</td>
            <td colspan="3" class="">{{$conductor->licencia}}</td>
            <td colspan="3" class="">{{$conductor->vigencia_licencia}}</td>

        </tr>


        {{-- @if ($loop->iteration==5)
        @include('pdf.footer')

        <tr>
            <td colspan="12" class="no-border-bottom corte"> //corte </td>
        </tr>
        <tr>
            <td colspan="12" class="center">CONDUCTORES</td>
        </tr>
        <tr>
            <td colspan="3" class="center">NOMBRES Y APELLIDOS</td>
            <td colspan="3" class="center">N° CEDULA</td>
            <td colspan="3" class="center">N° LICENCIA CONDUCCION</td>
            <td colspan="3" class="center">VIGENCIA</td>
        </tr>
        @endif--}}

        {{-- @endforeach  --}}



        <tr>
            <td colspan="12" class="center">RESPONSABLE DEL CONTRATO</td>
        </tr>

        <tr>
            <td colspan="3" class="center bold">NOMBRES Y APELLIDOS</td>
            <td colspan="3" class="center bold">N° CEDULA</td>
            <td colspan="3" class="center bold">TELEFONO</td>
            <td colspan="3" class="center bold">DIRECCION</td>
        </tr>

        <tr>

 <td colspan="3" class="">{{$datos->contratante->responsable->nombres." ".$datos->contratante->responsable->apellidos}}</td>
            <td colspan="3" class="">{{$datos->contratante->responsable->cedula}}</td>
            <td colspan="3" class="">{{$datos->contratante->responsable->telefono}}</td>
            <td colspan="3" class="">{{$datos->contratante->responsable->direccion}}</td>
        </tr>

    </tbody>
    @include('pdf.footer')

    @include('pdf.format')
</table>



@endsection