
const expresions = {
    name: /^[a-zA-ZÀ-ÿ\s0-9()]{4,65}$/,
    price: /^[.,0-9]{1,5}$/,
    large_name: /^[a-zA-ZÀ-ÿ\s0-9_.+-.()]{2,215}$/,
    quantity: /^[0-9]{1,3}$/,
	// usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
    //name: /^[a-zA-ZÀ-ÿ\s]{4,70}$/, // Letras y espacios, pueden llevar acentos.
    //lastname:/^[a-zA-ZÀ-ÿ\s]{1,40}$/,
	//password: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,20}/, // 4 a 12 digitos.
	//mail: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    //mail_complement:/^[a-zA-Z0-9_.+-]{4,20}$/,
	// telefono: /^\d{7,14}$/ // 7 a 14 numeros.
    // mail:/^[\w]+@{1}[\w]+\.[a-z]{2,3}$/
}
const focus_expresions = {
    name: false,
    price: false,
    price_send: false,
    clours_name: false,
    sizes_name: false,
    quantity: false
}
// Valido las cajas de texto e numbers. Para que no se envie nulls.
var form_admin_panel_newitem = document.querySelectorAll("#form_admin_panel_newitem input");
var id_product = document.getElementById("txt_id_product").value;
form_admin_panel_newitem.forEach((input) => {
    if(id_product != ""){
        focus_expresions["name"] = true;
        focus_expresions["price"] = true;
        focus_expresions["price_send"] = true;
        focus_expresions["clours_name"] = true;
        focus_expresions["sizes_name"] = true;
        focus_expresions["quantity"] = true;
    }else{
        focus_expresions["name"] = false;
        focus_expresions["price"] = false;
        focus_expresions["price_send"] = false;
        focus_expresions["clours_name"] = false;
        focus_expresions["sizes_name"] = false;
        focus_expresions["quantity"] = false;
    }
    input.addEventListener('keyup', correct_info_admin_panel);
    input.addEventListener('blur', correct_info_admin_panel);
});


function correct_info_admin_panel(e){
    switch(e.target.name){
        case "txt_name_product":
            if(expresions.name.test(e.target.value)){
                e.target.style.cssText = "border: 1px solid #3BFF59;";
                focus_expresions["name"] = true;
            }else{
                e.target.style.cssText = "border: 1px solid #FF3B3B;";
                focus_expresions["name"] = false;
            };
        break;
        case "txt_price_product":
            if(expresions.price.test(e.target.value)){
                e.target.style.cssText = "border: 1px solid #3BFF59;";
                focus_expresions["price"] = true;
            }else{
                e.target.style.cssText = "border: 1px solid #FF3B3B;";
                focus_expresions["price"] = false;
            };
        break;
        case "txt_colours_product":
            if(expresions.large_name.test(e.target.value)){
                e.target.style.cssText = "border: 1px solid #3BFF59;";
                focus_expresions["clours_name"] = true;
            }else{
                e.target.style.cssText = "border: 1px solid #FF3B3B;";
                focus_expresions["clours_name"] = false;
            };
        break;
        case "txt_quantity_product":
            if(expresions.quantity.test(e.target.value)){
                e.target.style.cssText = "border: 1px solid #3BFF59;";
                focus_expresions["quantity"] = true;
            }else{
                e.target.style.cssText = "border: 1px solid #FF3B3B;";
                focus_expresions["quantity"] = false;
            };
        break;
        case "txt_pricesend_product":
            if(expresions.price.test(e.target.value)){
                e.target.style.cssText = "border: 1px solid #3BFF59;";
                focus_expresions["price_send"] = true;
            }else{
                e.target.style.cssText = "border: 1px solid #FF3B3B;";
                focus_expresions["price_send"] = false;
            };
        break;
        case "txt_tallastock_product":
            if(expresions.large_name.test(e.target.value)){
                e.target.style.cssText = "border: 1px solid #3BFF59;";
                focus_expresions["sizes_name"] = true;
            }else{
                e.target.style.cssText = "border: 1px solid #FF3B3B;";
                focus_expresions["sizes_name"] = false;
            };
    };
};

// Modal Call
var modal_reveal = document.getElementById("modal_reveal");
// Valido el botton "ok" del modal
var button_ok_modal = document.getElementById("button_ok_modal");
button_ok_modal.addEventListener("click",function(){
    modal_reveal.style.cssText = "display: none;";
});

// Variable que capturar el valor de un id_product.

var form_admin_panel_newitem = document.getElementById("form_admin_panel_newitem");
    form_admin_panel_newitem.addEventListener('submit', function(event){
        var combox_category = document.getElementById("combox_category");
        var combox_subcategory = document.getElementById("combox_subcategory");
        var combox_status = document.getElementById("combox_status");
        if(focus_expresions.name && focus_expresions.price
             && focus_expresions.quantity && focus_expresions.price_send
              && focus_expresions.sizes_name && focus_expresions.clours_name
               && combox_category.value != "seleccionar" && combox_subcategory.value != "seleccionar" 
               && combox_status.value != "seleccionar"){
                
                this.submit();
                
        }else{
            modal_reveal.style.cssText = "display: contents;";
            event.preventDefault();
        };
});


// Valido los mensajes de acciones del usuario según parametros que me otorga PHP

var txt_valid_action = document.getElementById("txt_valid_action").value;
var message_new_item = document.getElementById("message_new_item");
    if(txt_valid_action == 1){
        message_new_item.innerHTML = '<i style="margin-right: 10px;" class="fas fa-exclamation-triangle"></i> Ya existe este registro en la base de datos.';    
        message_new_item.style.cssText = "display: flex !important;background-color: #F56425;";
        document.getElementById('message_new_item').scrollIntoView();
        setTimeout(function(){
            message_new_item.style.cssText = "display: none;";
        }, 15000);
    }
    if(txt_valid_action == 2){
        message_new_item.innerHTML = '<i style="margin-right: 10px;" class="fas fa-check"></i> Los datos se han guardado correctamente.';    
        message_new_item.style.cssText = "display: flex !important;background-color: #56F328;";
        document.getElementById('message_new_item').scrollIntoView();
        setTimeout(function(){
            message_new_item.style.cssText = "display: none;";
        }, 15000);
    }
    if(txt_valid_action == 3){
        message_new_item.innerHTML = '<i style="margin-right: 10px;" class="fas fa-times-circle"></i> Ha ocurrido un error al intentar guardar los datos.';    
        message_new_item.style.cssText = "display: flex !important;background-color: #EF3225;";
        document.getElementById('message_new_item').scrollIntoView();
        setTimeout(function(){
            message_new_item.style.cssText = "display: none;";
        }, 15000);
    }
    if(txt_valid_action == 4){
        message_new_item.innerHTML = '<i style="margin-right: 10px;" class="fas fa-exclamation-triangle"></i> Este producto ya existe en los ficheros.';    
        message_new_item.style.cssText = "display: flex !important;background-color: #F56425;";
        document.getElementById('message_new_item').scrollIntoView();
        setTimeout(function(){
            message_new_item.style.cssText = "display: none;";
        }, 15000);
    }
    if(txt_valid_action == 5){
        message_new_item.innerHTML = '<i style="margin-right: 10px;" class="fas fa-times-circle"></i> Ha ocurrido un error al guardar los archivos.';    
        message_new_item.style.cssText = "display: flex !important;background-color: #EF3225;";
        document.getElementById('message_new_item').scrollIntoView();
        setTimeout(function(){
            message_new_item.style.cssText = "display: none;";
        }, 15000);
    }

    if(txt_valid_action == 6){
        var message_modal = document.getElementById("message_modal");
        var modal_reveal = document.getElementById("modal_reveal");
        message_modal.innerHTML = "Tipo de archivo no soportado. Asegúrese de subir archivos con extensión('.png', '.jpg', '.jpeg')";
        modal_reveal.style.cssText = "display: contents;";
    }


    if(txt_valid_action == 7){
        message_new_item.innerHTML = '<i style="margin-right: 10px;" class="fas fa-check"></i> Los datos se han modificado correctamente.';    
        message_new_item.style.cssText = "display: flex !important;background-color: #56F328;";
        document.getElementById('message_new_item').scrollIntoView();
        setTimeout(function(){
            message_new_item.style.cssText = "display: none;";
        }, 15000);
    }
    if(txt_valid_action == 8){
        message_new_item.innerHTML = '<i style="margin-right: 10px;" class="fas fa-times-circle"></i> Ha ocurrido un error al intentar modificar los datos.';    
        message_new_item.style.cssText = "display: flex !important;background-color: #EF3225;";
        document.getElementById('message_new_item').scrollIntoView();
        setTimeout(function(){
            message_new_item.style.cssText = "display: none;";
        }, 15000);
    }
    if(txt_valid_action == 9){
        message_new_item.innerHTML = '<i style="margin-right: 10px;" class="fas fa-times-circle"></i> Ha ocurrido un error al modificar los archivos.';    
        message_new_item.style.cssText = "display: flex !important;background-color: #EF3225;";
        document.getElementById('message_new_item').scrollIntoView();
        setTimeout(function(){
            message_new_item.style.cssText = "display: none;";
        }, 15000);
    }

