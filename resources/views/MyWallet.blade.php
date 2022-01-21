@extends('crudbooster::admin_template')
@section('content')

<html>
<title>Wallet</title>
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

    input:checked + .slider {
        background-color: #2196F3;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
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

    #saldo {
        color: green;
        font-weight: bold;
    }
</style>

<div style="width: auto; height:100vh">
    <div>
        <strong><h1>Saldo Actual</h1></strong>
        <h1 id="saldo"> ${{$data['money'] }} </h1>

    </div>

    <div>
        <br>
        <p>{{count($data['orders_completed']??0)}} Ordenes realizadas </p>
    </div>

    <table class="table table-striped">

        <thead>
        <tr>
            <th scope="col">ORDEN #</th>

            <th scope="col">CLIENTE</th>
            <th scope="col">DIRECCION</th>
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
                    {{ $dato->name }}
                </td>
                <td>
                    {{ $dato->adress }}
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
</style>

</html>

@endsection
