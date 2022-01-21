@extends('crudbooster::admin_template')
@section('content')

    <style>
        /* The switch - the box around the slider */
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        /* Hide default HTML checkbox */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>

    <div style="width: auto; height:100vh">
        <div    >
           <center>
               <h1>SISTEMA DE TURNOS CRM</h1>
           </center>

        </div><br><br>

        <form method="get" action="{{ asset('TURNERO-SAVE') }}">
            {{ csrf_field() }}

            <table class="table">
                <tr>


                    <td colspan="2" class="text-center" style="vertical-align:middle;">
                        <strong>MODO DE ASIGNACION</strong>
                        <br>

                        LINEAL
                        <label class="switch">
                            <input type="hidden" name="modo" value="off">
                            <input type="checkbox" name="modo" value="on" {{ $modo->content=='carga' ? 'checked':'' }}>
                            <span class="slider round"></span>
                        </label>
                        POR CARGA
                    </td>
                    <td colspan="2" class="text-center" style="vertical-align:middle;">
                        <strong>ACTIVAR ASIGNACION AUTOMATICA</strong>
                        <br><label class="switch">
                            <input type="hidden" name="estado" value="off">
                            <input type="checkbox" name="estado" value="on" {{ $estado->content==1 ? 'checked':'' }}>
                            <span class="slider round"></span>
                        </label>
                    </td>
                </tr>
            </table>


            <table class="table table-striped">

                <thead>
                <tr>
                    <th scope="col">NOMBRE DEL ASESOR</th>
                    <th scope="col">DISPONIBLE?</th>
                    <th scope="col">CÓDIGO</th>
                    <th scope="col">CORREO ELECTRONICO</th>
                </tr>
                </thead>

                @foreach ($asesores as $asesor)

                    <tbody>

                    <tr>
                        <td>
                            <label for="{{ $asesor->id }}">{{ $asesor->name }}</label>
                        </td>
                        <td>
                            <input type="hidden" name="{{ $asesor->id }}" value="off">
                            <input type="checkbox" name="{{ $asesor->id }}" value="on" {{ $asesor->available==1 ? 'checked':'' }}>
                        </td>
                        <td>
                            {{ $asesor->code }}
                        </td>
                        <td>
                            {{ $asesor->email }}
                        </td>
                    </tr>

                    </tbody>

                @endforeach

            </table>






            <center>
            <td colspan="1" class="text-center" style="vertical-align:middle;">
                <input type="submit" value="GUARDAR CAMBIOS" class="btn btn-success">
            </td>
            </center>

        </form>
    </div>

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

        .btn{
            border-radius: 15px;
            margin: 2px;
            box-shadow: 0 5px 10px #a0a0a033;
            /*padding: 2px;*/
        }
    </style>

@endsection
