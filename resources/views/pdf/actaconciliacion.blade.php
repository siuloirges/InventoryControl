@extends('pdf.layout')

@section('conten')


    @php
        use Luecano\NumeroALetras\NumeroALetras;
        $formatter = new NumeroALetras;
    @endphp



    @if(! $reporte->is_finished || ! $reporte->employee_approval )
        <h4>// **Borrador** //</h4>
        <div style="background: url({{ asset('img/borrador.jpg') }}) ;"></div>
    @endif
    <body>

    <p colspan="4" class=" t2 nb"> Cartagena {{  $reporte->created_at->format("Y-M-d") }}</p>


    <p colspan="12" class="t2 nb">ACTA DE CONCILIACION {{ strtoupper($reporte->created_at->format("M")) }}
    </p>

    <p class="t2 center nb" colspan="12">Entre las partes, Conexión Services S.A.S con NIT 901329900-6 y {{ $usuario->name }}
        con C.C #: {{ $usuario->identification_number }}, se realiza la presente acta de conciliación de
        servicios de ventas, durante el periodo comprendido
        del {{ $fecha->modify('first day of this month')->format('d') }} al
        {{ $fecha->modify('last day of this month')->format('d') }}
        de {{ $fecha->modify('last day of this month')->format('M') }}.
    </p>


    <div>
        <br>
        <p> {{count($data['orders_completed']??0)}} Ordenes realizadas </p>
    </div>

    <table class="table table-striped">

        <thead>
        <tr>
            <th scope="col">ORDEN #</th>

            <th scope="col">CLIENTE</th>
            <th scope="col">NUMERO DE GUIA</th>
            <th scope="col">Municipio</th>
            <th scope="col">TOTAL</th>
            <th scope="col">COMISION</th>
        </tr>
        </thead>


        @foreach ($data['orders_completed'] as $dato)

            <tbody>
            <tr>
                <td>
                    {{ $dato->order_number }}
                </td>
                <td>
                    {{ $dato->name_client }}
                </td>
                <td>
                    {{ $dato->guide_number }}
                </td>
                <td>
                    {{ $dato->name_municipaly }}
                </td>
                <td>
                    $ {{ number_format($dato->total) }}
                </td>
                <td>
                    $ {{ number_format($dato->commission) }}
                </td>
            </tr>

            </tbody>

        @endforeach


    </table>


    <p>Tipo: {{$reporte->type_reports}}</p>
    @php
        $grandTotal= 0;
    @endphp
    @if($reporte->type_reports == 'Comision')
        @php
            $grandTotal= number_format( (doubleval( str_replace(',','',$data['money']??0)  ) + doubleval(  str_replace(',','', $reporte->bonus??0) )) - doubleval(  str_replace(',','', $reporte->discount??0) ??0));

        @endphp
        <p>Total Comisiones: ${{$data['money']}}</p>
        <p>Bono: ${{number_format($reporte->bonus)}}</p>
        <p>Descuento: ${{number_format($reporte->discount??0)}}</p>
        <h4>Total: ${{$grandTotal}}</h4>
        <p>

        @if($grandTotal > 0)
        <p colspan="12" class="center t2 nb">LA SUMA DE:
            <br> {{ $formatter->toWords(  str_replace(',','',$grandTotal??0) ) }} PESOS MCT ({{$grandTotal??0}})</p>
        </p>
        @else
            <p colspan="12" class="center t2 nb">LA SUMA DE:
                Cero (0)
            </p>
        @endif


    @else

        @php
            $grandTotal= number_format( (doubleval($reporte->employee_commission??0) + doubleval($reporte->bonus??0)) - doubleval($reporte->discount??0));
        @endphp

        <p>Salario: ${{$reporte->employee_commission}}</p>
        <p>Bono: ${{number_format($reporte->bonus)}}</p>
        <p>Descuento: ${{number_format($reporte->discount??0)}}</p>
        <h4>Total: ${{$grandTotal}}</h4>
        <p>

        @if($grandTotal > 0)
            <p colspan="12" class="center t2 nb">LA SUMA DE:
                <br> {{ $formatter->toWords( str_replace(',','',$grandTotal??0) ) }} PESOS MCT ({{$grandTotal??0}})</p>
            </p>
        @else
            <p colspan="12" class="center t2 nb">LA SUMA DE:
                Cero (0)
            </p>
        @endif

    @endif

    <table class="table table-striped">

        @include('pdf.footer')

        @include('pdf.format')

    </table>

    </body>



@endsection
