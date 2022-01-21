

$(function() {

    let sede = document.getElementById('stores_id').value;
    $('#inventariostores_id').val(sede);

    let cantidad = 0;
    let cantidadActual = 0;

    function validar() {
        cantidadActual = document.getElementById('table-inventario').childNodes[3].childNodes.length -2 ?? 0 ;


        if( cantidad != cantidadActual ){

            document.getElementsByClassName('btn btn-success')[0].style.display = 'none';
            document.getElementsByClassName('btn btn-success')[1].style.display = 'none';

        }else{
            document.getElementsByClassName('btn btn-success')[0].style.display = null;
            document.getElementsByClassName('btn btn-success')[1].style.display = null;
        }

        child = $('#001p')[0].remove();

        element = document.createElement('p');
        element.innerHTML = 'Añadidos '+ cantidadActual + ' de ' + cantidad;
        element.setAttribute('id','001p');
        document.getElementsByClassName('panel-heading')[3].append(element);

    }

    element = document.createElement('p');
    element.innerHTML = 'Añadidos '+ cantidadActual + ' de ' + cantidad;
    element.setAttribute('id','001p');
    document.getElementsByClassName('panel-heading')[3].append(element);

    $( '#stock' ).change(function() {
        cantidad = parseInt($(this).val())
        $('#stock_in').val(cantidad);
        $('#stock_out').val(0);


        validar();



    });

    $('#btn-add-table-inventario').click(function() {

        validar();

        $('#inventariostores_id').val(sede);

    });


    $('#btn-reset-form-inventario').click(function() {

        $('#inventariostores_id').val(sede);

    });



    $('.btn btn-danger btn-xs').click(function() {

        validar();

    });


});

