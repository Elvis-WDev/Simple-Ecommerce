


window.onload = function () { 

    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"), 
        results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }

    var registerByUrl = getParameterByName("registro");

    if(registerByUrl == 1){
        var section_login = document.getElementById("login_section");
        section_login.style.cssText = "display: none !important;";
        var register_section = document.getElementById("register_section");
        register_section.style.cssText = "display: flex !important;";
    }else{
        var section_login = document.getElementById("login_section");
        section_login.style.cssText = "display: flex !important;";
        var register_section = document.getElementById("register_section");
        register_section.style.cssText = "display: none !important;";
    }
    ;

};



