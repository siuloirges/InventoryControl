@extends('crudbooster::admin_template')
@section('content')

<html>

<head>
{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">--}}
</head>
<title>Detalle</title>


<style>





    /* Contador 3d */

    .contador3d{
        display: flex;
        transform-style: preserve-3d;
        gap: 15px;
        transform: rotateY(10deg) rotate(3deg);
        /*perspective: 1000px;*/

    }

    .contador3d .text
    {
        position: relative;
        width: 100px;
        height: 100px;
        transform-style: preserve-3d;
        transition: .5s ease-in-out;
        transition-delay: calc(0.25s * var(--j));
        transform: rotateX(calc( 180deg ));
        /*border-radius: 100px;*/

    }
    .contador3d .text:last-child{

        transition: .5s ease-in-out;
        transition-delay: 5s calc(0.25s * var(--j));
        transform: rotateX(calc( -180deg ));

    }

    .contador3d:hover .text
    {
        transform: rotateX( -180deg );

    }

    .contador3d:hover .text:last-child
    {
        transform: rotateX(180deg);
    }

    .contador3d .text::before
    {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        background: #E5E9ED;
        transform-origin: left;
        transform: rotateY(90deg) translateX(-50px);
    }

    .contador3d .text::after
    {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        background: #E5E9ED;
        transform-origin: right;
        transform: rotateY(90deg) translateX(50px);

    }

    .contador3d .text:last-child:before{
        background: #4793B8;
        color: white;
    }

    .contador3d .text:last-child:after{
        background: #4793B8;
        color: #69336B;
    }

    .contador3d .text span
    {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(#FFFFFF,#E5E9ED);
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 4em;
        color: #575A58;
        transform-style: preserve-3d;
        transform: rotateX(calc(90deg * var(--i))) translateZ(50px);
    }

    .contador3d .text:last-child span
    {
        background: linear-gradient(#62BAEA,#4793B8);
        color: white;
    }

    .contador3d
    {

        transform: scale(.4);
    }
    /* Fin Contador 3d */




    /* Desplegable */
    .desplegable{
        margin: 25px;
        margin-right: 10px;
        margin-left: 10px;
        position: relative;
        width: 250px;
        height: 320px;
        background-color: #fff;
        transform-style: preserve-3d;
        /* perspective: 900px; */
        transform: perspective(1500px);
        transition: .4s;

        box-shadow: inset 300px 0 59px rgba(0, 0, 0, .1),0 2px 2px rgba(0, 0, 0, .1);
        border-radius: 3px 3px 3px 3px;

    }

    .desplegable:hover{
        transform: perspective(1500px)  scale(1.05) translateY(-7%);
        box-shadow: inset 20px 0 59px rgba(0, 0, 0, .1),0 20px 20px rgba(0, 0, 0, .1);

    }

    .desplegable:hover :last-child{

        transition: .6s ease-in-out;
        filter: blur(0px);

    }


    .desplegable .cover {
        position: relative;
        width: 100%;
        height: 100%;
        background: #fff;
        z-index: 2;
        display: flex;
        justify-content: center;
        align-items: center;
        transform-style: preserve-3d;
        overflow: hidden;
        transition: .4s ease-in-out;
        transform-origin: left;
        border-radius: 3px 3px 3px 3px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .desplegable .cover::before{
        content: '';
        position: absolute;
        left: 0;
        height: 100%;
        width: 15px;
        /*gra*/
        background: #62BAEA;
    }





    .desplegable .cover img {
        max-width: 100%;
        z-index: 2;
    }


    .desplegable:hover .cover {
        transform: rotateY(-95deg);
    }

    .desplegable:hover .cover b {
        opacity: 0.0;
        transition: 0.4s ease-in-out;
        /*background: red;*/
    }

    .desplegable:hover .cover img {
        opacity: 0.0;
        transition: 0.4s ease-in-out;
        /*background: red;*/
    }

    .desplegable:hover .cover h2 {
        opacity: 0.0;
        transition: 0.4s ease-in-out;
    }

    .desplegable:hover .cover h3 {
        opacity: 0.0;
        transition: 0.4s ease-in-out;
    }


    .desplegable .details img{
        width: 159px;
        height: 214px;

    }

    .desplegable .details p{
        text-transform: uppercase;
        font-weight: 200;
        letter-spacing: 0.3em;

    }

    .desplegable .details{
        position: absolute;
        top: 0;
        left: 0;
        padding: 40px;
        width: 100%;
        height: 100%;
        filter: blur(2px);
        display: block;
        /*text-align: center;*/
        overflow: hidden;
        justify-content: left;
        /*text-align: center;*/
        z-index: 1;

    }

    /*.desplegable .details:hover {*/
    /*   transition: .25s ease-in-out;*/
    /*   filter: blur(0px);*/
    /*}*/

    .desplegable .details h3{
        font-weight: 500;
        margin: 5px 0;
    }

    .desplegable .details h2{

        font-size: 1.5em;
        color: #e82a5b;
        font-weight: 600;
    }

    .desplegable .details a{
        display: inline-block;
        padding: 8px 20px;
        background: #47bfce;
        color: #fff;
        margin-top: 5px;
        letter-spacing: 1px;
        border-radius: 25px;
        text-decoration: none;
    }
    /* Fin Desplegable */




    /* card */
    *{
        font-family: 'Poppins', sans-serif;
        transition: 0.1s ease-in-out;
    }

    .card_product{
        /*display: flex;*/
        margin: 25px;
        position: relative;
        width: 250px;
        height: auto;
        background: #fff;
        border-radius: 20px;
        box-shadow: 300px 0 59px rgba(0, 0, 0, 0.5),0 2px 2px,rgba(0, 0, 0, 0.5);
        /*box-shadow:  rgba(0, 0, 0, .1),0 2px 2px rgba(0, 0, 0, .1);*/
        justify-content: center;
        align-items: center ;

    }

    .card_product span {
        position: absolute;
        top: -10px;
        left: -10px;
        width: 150px;
        height: 150px;
        background: rgba(0,0, 0,0);
        display: flex;
        justify-content: center;
        align-items: center ;
        overflow: hidden;

    }

    .card_product span::before {

        content: '';
        position: absolute;
        width: 250px;
        height: 40px;
        background: #62baea;
        transform: rotate(-45deg) translateY(-20px);
        display: flex;
        justify-content: center;
        align-items: center ;
        text-transform: uppercase;
        font-weight: 400;
        color: #fff;
        letter-spacing: 0.1em;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.05);
        z-index: 2;


    }

    #span-combo::before {
        content: 'Combo';
    }

    #span-producto::before {
        content: 'Producto';
    }

    .card_product span::after{
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 10px;
        height: 10px;
        background: #4a98bf;
        z-index: 1;
        box-shadow: 140px -140px #4a98bf;
    }

    .content{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;

    }

    .content img{

        display: block;
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 100px;
        margin-bottom: 10px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.07);


    }

    .card_product:hover{

        box-shadow: 0 25px 50px rgba(0,0, 0,0.08);
        transform: scale(1.05);
        cursor: pointer;
        /*background: black;*/
    }

    .content p{


    }
    /* Fin card */




    /* Tiket */

    .tiket{
        justify-content: center;
        text-align: center;
        display: flex;
        position: relative;
        /*width: -;*/
        height: auto;
        padding: 30px;
        padding-top: 90px;
        padding-bottom: 90px;
        background: rgba(43, 43, 43,0.04);

    }

    .tiket p{

        text-transform: uppercase;
        display: block;
        position: absolute;
        left: 50px;
        bottom: 35px;
        font-weight: 200;
        letter-spacing: 0.3em;
        color: grey;

    }

    .tiket h4{

        text-transform: uppercase;
        display: block;
        position: absolute;
        left: 50px;
        top: 35px;
        font-weight: 200;
        letter-spacing: 0.3em;
        color: grey;

    }

    .tiket::before{
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 24px;
        background:

            linear-gradient(-135deg ,#ECF0F5 12px, transparent 0% ),
            linear-gradient(135deg ,#ECF0F5 12px, transparent 0% );

        background-size: 24px;
    }

    .tiket::after{
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 24px;
        background:

            linear-gradient(-45deg ,#ECF0F5  12px, transparent 0% ),
            linear-gradient(45deg ,#ECF0F5  12px, transparent 0% );

        background-size: 24px;
    }
    /* Fin tiket */

</style>


<body>

        <h1  style="font-weight: 300; margin: 0px!important;" >Pedido Realizado</h1>




        <div class="contador3d" style="margin: 0px!important;padding: 0px!important;">

            @foreach ($ordeNumber as $i => $dado)

                <div class="text" style="--j:{{$i}};">
                    <span style="--i:0">-</span>
                    <span style="--i:1">2</span>
                    <span style="--i:2">{{$dado}}</span>
                    <span style="--i:3">4</span>
                </div>

            @endforeach


        </div>


    <div class="row" style="display: table-cell;horiz-align: center;">

        @foreach ($finalPendingOrderDetails as $dato)

            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 vcenter" style="min-width: 320px; horiz-align: center;" >
                <div class="card_product" onclick='window.location.replace("/admin/products/detail/{{$dato['Id']}}");'>

                    @if ($dato['Combo'])
                        <span id="span-combo"></span>
                    @else
                        <span id="span-producto"></span>

                    @endif


                    <div class="content">
                        <img style="margin: 10px!important; width: 150px; height: 150px;" src="{{ $dato['Imagen'] }}" alt="">
                        {{--                      <br>--}}

                            <h2 class="Nombre" style="font-weight: 310;font-size: 20px;text-align: center" >{{ $dato['Nombre'] }}</h2>

                        <b class="Precio_de_venta" style="font-weight: 100">Cuesta: ${{ number_format($dato['Precio']) }} </b>
                        <b class="Precio" style="font-weight: 100">Descuento: {{ round($dato['Descuento']) }}% </b>
{{--                        <b class="Descuento">{{ round($dato['Descuento']) }}% descuento</b>--}}
                        <b class="Cantidad" style="font-weight: 100">Pidió: {{ $dato['Cantidad'] }}</b>
                    </div>
                </div>
            </div>

        @endforeach

    </div>




<br>
<br>
<br>


<h1 style="font-weight: 300; margin: 20px;">Detalles</h1>

<div class="tiket" style="justify-content: center !important;align-items: center !important;">
    <h4>#Número De Orden: {{$dataOrder->order_number}} </h4>

    <div class="row" style="justify-content: center !important;align-items: center !important; ">

        @foreach ($finalOrderDetailDetails as $item)


                <div class="col-xs-8 col-sm-5 col-md-4 col-lg-4" style="min-width: 320px; justify-content: center !important;align-items: center !important;">


                <div class="desplegable">

                    <div class="cover">

                        <img src="{{$item['Imagen']}}" alt="" style="margin: 10px!important; width: 40px; height: 40px;">
                        <br>
                        <h2 class="Nombre" style="font-weight: 300;font-size: 20px;margin: 20px"> {{ $item['Nombre'] }}</h2>
                        <b class="Precio_de_venta" style="font-weight: 100">vendido por: ${{ number_format($item['Precio_de_venta']) }}<br> Con {{ round($item['Descuento']) }}% de descuento.</b>
                        {{--                      <b class="Precio">${{ number_format($item['Precio']) }}</b>--}}
                        {{--                        <b class="Cantidad">{{ round($item['Descuento']) }}% descuento</b>--}}
                        <h3 class="Cantidad">{{ $item['cantidad_tomada'] }}/{{ $item['Cantidad_neta'] }}</h3>

                    </div>
                    <div class="details" style="overflow-y: auto;">


                        {{--                        <p>Inventario</p>--}}
                        <div style="font-weight: 200;letter-spacing: .2em;font-size: 16px">Inventario</div>
                        <hr class="dashed" style="margin: 8px !important;padding: 2px !important;">
                        @foreach ($item['Inventory'] as $i => $item2)

                            {{--                            <h4> </h4>--}}
                            @if ($item2['imei'])
                                <div style="display: block !important; justify-content: left;">
                                    IMEI: {{$item2['imei']}}<br>
                                </div>
                            @endif

                            @if ($item2['reference'])
                                <div style="display: block !important; justify-content: left;">
                                    REF: {{$item2['reference']}}
                                </div>
                            @endif

                            <hr class="dashed" style="margin: 5px !important;padding: 5px !important;">
                        @endforeach

                    </div>

                </div>

            </div>

        @endforeach

    </div>

    <p>#Generada: {{$dataOrder->created_at}} - Estado: {{$dataOrder->status}}</p>

</div>

</body>

<script>

    document.addEventListener("DOMContentLoaded", () => {

          let list = document.getElementsByClassName('contador3d')[0].childNodes;


          for (let i=0,length = list.length;i<=length;i++){

             if(list[i].className == "text"){

                 if(i == list.length-2){
                    list[i].style.transform += 'rotateX( 180deg )';
                 }else{
                    list[i].style.transform += 'rotateX( -180deg )';
                 }


             }


          }

    })


</script>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Comfortaa&display=swap');
    *{
        font-family: 'Comfortaa', cursivex;
        font-weight: 500;
    }

    .user-panel{
        margin: 10px;
        padding: 10px;
        /*margin-bottom: 10px;*/
    }

    .img-circle{
        object-fit: cover !important;
        width: 40px !important;
        height: 40px !important;
        box-shadow: 0 5px 15px #a0a0a066;

    }
</style>





</html>

@endsection
