@extends('crudbooster::admin_template')
@section('content')


    @php
        $safe = $_SERVER['HTTPS']?'https':'http';
        $host = $safe.'://'.$_SERVER['HTTP_HOST'].'/';
    @endphp
    <html>

    <head>


    </head>

    <body id="body">
    <div class="head">

        <i class="fa fa-question-circle" aria-hidden="true" id="fa-question-circle"></i>
        <h1 class="Titulo-P">Preguntas</h1>

    </div>



    <div class="padre">
        <section class="cabezera">

        </section>

        <section class="body-content">

            @foreach ($recursos as $item)


                <h3 class="TituloProduct">{{$item->name.' - '.$item->type }}</h3>
                @foreach ($item->recursosQuestion as $item2)


                    <div class="items">
                        @if ($item2->picture != null)
                            <img src="{{$host.$item2->picture}}" alt="" class="imgContent">
                        @endif

                        <p class="titulo">{{$item2->Asunto}}</p>
                        <p class="sub-titulo">{{$item2->Descripcion}}</p>

                        @if ($item2->file != null)
                            <form>
                                <buttom id="dowloadBuscar">
                                    <p>
                                        <a href="{{$host.$item2->file}}" class="button"><i class="fa fa-download"></i>Download CV</a>
                                    </p>
                                </buttom>
                            </form>
                        @endif
                        <hr class="rounded">
                    </div>


                @endforeach

            @endforeach

        </section>

    </div>


    </body>

    <style>


        .head{
            /*background: black;*/
            display: flex;
            flex-flow: row nowrap;
        }
        #fa-question-circle{
            font-size: 40px;
            padding: 20px;
        }

        .Titulo-P{

            padding: 0px 0px 25px 0px;
            font-weight: bold;
        }

        .body-content{
            /*background: black;*/
            flex: 2 1 auto;
            display: flex;
            flex-flow: row wrap;
            padding: 0 100px 100px 100px;


        }
        .column{
            display: flex;
            flex-flow: column;
            font-weight: bold;
            /*-ms-flex-align: center;*/
            /*align-items: center; */
        }
        .TituloProduct{
            font-weight: bold;
            /*background: #E5E5E5;*/
            padding: 30px;
        }
        .row{
            display: flex;
            flex-flow: row nowrap;
            -ms-flex-align: center;
            align-items: center;
            flex: 1 1 auto;
            padding: 10px 80px 10px 80px;
        }
        .plase-older{
            padding: 10px 80px 10px 80px;
        }

        .inputBuscar
        {
            border-radius: 20px;
            flex: 5;
            padding: 10px;
            /*height: 45px;*/
        }
        #botonBuscar{
            display: flex;
            flex-flow: row nowrap;
            -ms-flex-align: center;
            border-radius: 100px;
            flex: 1;
            padding: 5px;
            width: 30px;
            height: 40px;
            background: #3C8DBC;
            /*height: 45px;*/
        }

        .textButom{
            color: white;

        }

        #fa-search{
            font-size: 15px;
            color: white;
        }


        .space{

            padding: 5px;

        }



        .items{
            /*border-radius: 20px;*/
            padding: 50px;
            background: #E5E5E5;
            flex: 1 1 auto;
        }
        .imgContent{
            object-fit:cover;
            width: 400px;
            height: 150px;
            border-radius: 0;
        }
        #dowloadBuscar{
            color: white;
            border-radius: 0;
            width: 200px;
            height: 35px;
            padding: 5px;
        }
        .titulo{
            /*background: gray;*/
            font-size: 25px;
            font-weight: bold;
            padding: 20px 0 20px 0;
        }
        .sub-titulo{
            padding:10px;
        }


    </style>

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
