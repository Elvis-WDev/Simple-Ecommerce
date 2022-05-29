


    var aside_drowable = document.getElementById("aside_drowable");

    aside_drowable.addEventListener("click",function(){
        var aux_var = 0;
        if(aside_drowable.classList.contains("notactive")){
            aux_var = 1;
        };
        
        if(aside_drowable.classList.contains("active")){
            aux_var = 2;
        };
        valid_drow(aux_var);
    });

  function valid_drow(ux_var){
    var aside_display = document.getElementById("aside_left");
    var section_page = document.getElementById("section_page");
        switch(ux_var){
            case 1:
                aside_drowable.classList.remove("notactive");
                aside_drowable.classList.add("active");
                aside_display.style.cssText = "display: none;";
                section_page.style.cssText = "width: 100%;";
            break;
            case 2:
                aside_drowable.classList.remove("active");
                aside_drowable.classList.add("notactive");
                aside_display.style.cssText = "display: flex;";
                section_page.style.cssText = "width: 85%;";
            break;
        };
  };



//   Validations

//   function input_category_valid(){
//     var combox_category = document.getElementById("combox_category");
//     var category_selected = combox_category.options[combox_category.selectedIndex].value;
//     console.log(category_selected);
//     var aux_var_category=0;

//     if(category_selected == 1){
//         aux_var_category  = 1;
//     };
    
//     if(category_selected == 2){
//         aux_var_category  = 2;
//     };

//     if(category_selected == "seleccionar"){
//         aux_var_category  = 3;
//     };
//     output_category_valid(aux_var_category);
//   };

//   function output_category_valid(aux_var_cat){
//       var cont_female_sub = document.getElementById("container_sub_female");
//       var cont_male_sub = document.getElementById("container_sub_male");
//     switch(aux_var_cat){
//         case 1:
//             cont_male_sub.style.cssText = "display:flex;";
//             cont_female_sub.style.cssText = "display:none;";
//         break;
//         case 2:
//             cont_male_sub.style.cssText = "display:none;";
//             cont_female_sub.style.cssText = "display:flex;";
//         break;
//         case 3:
//             cont_male_sub.style.cssText = "display:none;";
//             cont_female_sub.style.cssText = "display:none;";
//         break;
//     }
//   };