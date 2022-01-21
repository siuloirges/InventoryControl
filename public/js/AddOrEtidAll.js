

document.addEventListener("DOMContentLoaded", ()=>{



    let list = document.getElementsByClassName('select2-selection--single');
    for (let i=0, length=list.length; i <= length; i++){

        if( list[i]?.tagName == "SPAN"){
            list[i].setAttribute("style", "border-radius: 15px 15px 15px 15px !important;");
        }

    }


        setTimeout(
            ()=>{
                acomodar_formulario()
            },0
        )


});

function acomodar_formulario(){

    let menu = document.getElementsByClassName('sidebar-toggle')[0];
    menu.click();

    let panel = document.getElementsByClassName('box-body')[0];
    panel.className = 'row';
    panel.style.display = 'table-cell';
    panel.style.padding = '10px';
    panel.style.paddingBottom = '20px';

    let list = document.getElementById('parent-form-area').childNodes;




    for (let i=0, length=list.length; i <= length; i++){

        if(list[i]?.className){
            if(list[i]?.className == "form-group header-group-0"){
                list[i]?.setAttribute("class", "col-xs-12 col-sm-12 col-md-12 col-lg-12");
                list[i]?.setAttribute("style", "margin:5px;padding:5px");
            }else {


                list[i]?.setAttribute("class", "col-xs-4 col-sm-4 col-md-4 col-lg-4");
                list[i]?.setAttribute("style", "display:grid;max-width: 450px!important;min-width:450px!important;padding:0px;margin: 10px;margin-block-end: auto!important;background:#F5F5F5;border-radius:15px;");

                // list[i].childNodes[1].setAttribute("style", "");
                list[i].childNodes[1].style.width = "fit-content";
                list[i].childNodes[1].style.margin = ".25px";

                // if (i <= 0){
                //     list[i]?.setAttribute("style", "margin:-5px;display:grid;max-width: 450px!important;min-width:450px!important;background:red;padding:0px;");
                // }

            }
        }


    }

}
