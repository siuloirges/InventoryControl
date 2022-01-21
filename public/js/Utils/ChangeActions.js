
AcomodarPaginate();
let listBotones = document.getElementsByClassName('button_action');

for(let i = 1, length = listBotones.length; i <= length;i++){

    let listBotonesHtml = [];

    for(let i2 = 1, length2 = listBotones[i-1].childNodes.length; i2 <= length2;i2++){

        if( listBotones[i-1].childNodes[0].title ){
            listBotonesHtml.push({

                title: listBotones[i-1].childNodes[0].title,
                url: listBotones[i-1].childNodes[0].href,
                icon: listBotones[i-1].childNodes[0].childNodes[0].className,
                class:  listBotones[i-1].childNodes[0].className,
                onclick:  listBotones[i-1].childNodes[0].onclick,

            });
        }

        listBotones[i-1].childNodes[0].remove();

    }

    let input = document.createElement('input');
    input.type = 'button';
    input.value = 'Ver Acciones';
    input.className = 'btn btn-xs btn-success';
    input.onclick = function (){

        oscureserSeleccionado(listBotones[i-1]);

        Swal.fire({
            title: '¿Que quieres hacer?',
            icon: 'question',
            showConfirmButton: false,
            showCancelButton: true,
            cancelButtonText: 'Atras',
            width: 350,
            showCloseButton: true,
            backdrop:false,
            html: crearAcciones(listBotonesHtml),

        }).then((result) => {
            if (result.isConfirmed) {
                window.location.replace(hrefAux);
            }

            if (!result.isConfirmed) {

            }

            aclararSeleccionado(listBotones[i-1]);
        });

    }

    listBotones[i-1].appendChild(input);

}

function oscureserSeleccionado(ref){
    aclararSeleccionado(ref);
    ref.parentNode.parentNode.setAttribute("style", "background: #20202035;");
}

function aclararSeleccionado(ref){
   let listData = ref.parentNode.parentNode.parentNode.childNodes;

    for(i=0,length = listData.length; i<=length;i++ ){

        if(listData[i]?.tagName === 'TR'){
            listData[i].style.background = null;
        }
    }
}

function crearAcciones(listElement){

    let row = document.createElement('div');
    row.className = 'row';
    row.style.maxWidth = '350px';
    row.style.justifyContent = 'center';
    row.style.textAlign = 'center';
    row.style.borderRadius = '5px';
    row.style.padding = '20px';


    listElement.forEach(function (item){

        let input = null;


        input = document.createElement('a');
        input.className = item.class;
        input.href = item.url;
        input.style.margin = '5px';
        input.innerText = item.title.replace('-!-','')+' - ';
        input.style.padding = '5px';

        if(item.title.includes('-!-')){
            input.href = 'javascript: void(0)';
            input.onclick = function (){
                Swal.fire({
                    title: 'Alerta',
                    text: '¿Seguro Que Quieres Realizar esta Accion?',
                    icon: 'warning',
                    confirmButtonText: 'Si seguro.',
                    showCancelButton: true,
                    cancelButtonText: 'No.',
                    timer: 8000,
                    timerProgressBar: true,

                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.replace(item.url);
                    }


                })

            };
        }else{
            input.onclick = item.onclick;
            input.href = item.url;
        }

        let icon = document.createElement('i');
        icon.className = item.icon;
        input.append(icon);

        row.append(input);

    });


    return row;
}



function AcomodarPaginate(){

   let navigator =  document.querySelectorAll('[role="navigation"]')[1];

    if(navigator){
        navigator.style.marginBottom = '5px';

        navigator.childNodes[1].childNodes[1].className = "btn btn-sm btn-default";
        navigator.childNodes[1].childNodes[1].setAttribute("style", "border-radius: 15px 0px 0px 15px !important; margin:3px; ");

        navigator.childNodes[1].childNodes[3].className = "btn btn-sm btn-default";
        navigator.childNodes[1].childNodes[3].setAttribute("style", "border-radius: 0px 15px 15px 0px !important; margin:3px; ");


        var p = document.createElement('p' );


        if(getParameterByName('page') ){
            p.innerText =  getParameterByName('page');
        }else{
            p.innerText = '1';
        }
        p.className = 'btn btn-sm btn-default';
        p.setAttribute("style", "border-radius: 0 !important; margin-left:5px");

        navigator.childNodes[1].insertBefore(p, navigator.childNodes[1].childNodes[1].nextSibling)

    }

}

function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}
