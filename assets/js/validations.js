const expresiones = {
    // usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
    name: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
    lastname: /^[a-zA-ZÀ-ÿ\s]{1,40}$/,
    password: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,20}/, // 4 a 12 digitos.
    mail: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    mail_complement: /^[a-zA-Z0-9_.+-]{4,20}$/,
    // telefono: /^\d{7,14}$/ // 7 a 14 numeros.
    // mail:/^[\w]+@{1}[\w]+\.[a-z]{2,3}$/
}

const expresions_valid_login = {
    mail: false,
    password: false
}


const expresions_valid_register = {
    name: false,
    lastname: false,
    mail: false,
    password: false,
    confirmpassword: false
}

// Valido los parametros del login, que no estén vacios.
let inputs_login = document.querySelectorAll('#form_login input');
inputs_login.forEach((input) => {
    input.addEventListener('keyup', correct_info_login);
    input.addEventListener('blur', correct_info_login);
});

function correct_info_login(e) {
    switch (e.target.name) {
        case "txt_login_user":
            var txt_login_user = document.getElementById("txt_login_user");
            var check_login_user = document.getElementById("check_login_mail");
            var text_warning_login = document.getElementById("article_info_text");
            var text_replace_login = document.getElementById("text_replace_login");
            if (expresiones.mail.test(e.target.value)) {
                txt_login_user.style.cssText = "border-bottom: 2px solid #0eff36 !important;";
                check_login_user.classList.remove("fa-times-circle");
                check_login_user.classList.add("fa-check-circle");
                check_login_user.classList.add("unit_check_correct");
                check_login_user.classList.remove("unit_check_wrong");
                text_warning_login.style.cssText = "opacity: 0 !important;";
                expresions_valid_login['mail'] = true;
            } else {
                txt_login_user.style.cssText = "border-bottom: 2px solid #ff0e0e !important;";
                check_login_user.classList.remove("fa-check-circle");
                check_login_user.classList.remove("unit_check_correct");
                check_login_user.classList.add("fa-times-circle");
                check_login_user.classList.add("unit_check_wrong");
                text_warning_login.style.cssText = "opacity: 1 !important;";
                text_replace_login.innerHTML = '<i class="fas fa-exclamation-circle warnnig_icon"></i> El correo debe terminar con @example.com y la contraseña debe tener mínimo 8 caractéres, primera letra en mayúscula, números, y algún símbolo.';
                expresions_valid_login['mail'] = false;
            }
            break;

        case "txt_login_password":
            var txt_login_password = document.getElementById("txt_login_password");
            var check_login_password = document.getElementById("check_login_password");
            var text_warning_login = document.getElementById("article_info_text");
            if (expresiones.password.test(e.target.value)) {
                txt_login_password.style.cssText = "border-bottom: 2px solid #0eff36 !important;";
                check_login_password.classList.remove("fa-times-circle");
                check_login_password.classList.add("fa-check-circle");
                check_login_password.classList.add("unit_check_correct");
                check_login_password.classList.remove("unit_check_wrong");
                text_warning_login.style.cssText = "opacity: 0 !important;";
                expresions_valid_login['password'] = true;
            } else {
                txt_login_password.style.cssText = "border-bottom: 2px solid #ff0e0e !important;";
                check_login_password.classList.remove("fa-check-circle");
                check_login_password.classList.remove("unit_check_correct");
                check_login_password.classList.add("fa-times-circle");
                check_login_password.classList.add("unit_check_wrong");
                text_warning_login.style.cssText = "opacity: 1 !important;";
                expresions_valid_login['password'] = false;
            }
            break;
        //   background-color: #1e1e1e;color:#b5b5b5;
    }


}

//  Fin validaciones de login

let inputs_register = document.querySelectorAll('#form_register input');
inputs_register.forEach((input) => {
    input.addEventListener('keyup', correct_info_register);
    input.addEventListener('blur', correct_info_register);
});

function icons_fields_targets_correct(value_text, value_icon) {
    value_text.style.cssText = "display: none;";
    value_icon.classList.remove("fa-times-circle");
    value_icon.classList.remove("unit_check_wrong");
    value_icon.classList.add("unit_check_correct");
    value_icon.classList.add("fa-check-circle");
};

function icons_fields_targets_wrong(value_text, value_icon) {
    value_text.style.cssText = "display: flex !important;";
    value_icon.classList.remove("fa-check-circle");
    value_icon.classList.add("unit_check_wrong");
    value_icon.classList.remove("unit_check_correct");
    value_icon.classList.add("fa-times-circle");
};

function correct_info_register(e) {
    switch (e.target.name) {
        case "txt_register_name":
            var register_name_info = document.getElementById("register_name_info");
            var register_name_icon = document.getElementById("register_name_icon");
            if (expresiones.name.test(e.target.value)) {
                e.target.style.cssText = "border-bottom: 1px solid #0eff36;";
                // Reutilizo código mediante una función
                icons_fields_targets_correct(register_name_info, register_name_icon);
                expresions_valid_register['name'] = true;
                date_valid(0);
            } else {
                e.target.style.cssText = "border-bottom: 1px solid #ff0e0e;";
                // Reutilizo código mediante una función
                icons_fields_targets_wrong(register_name_info, register_name_icon);
                expresions_valid_register['name'] = false;
            }
            break;

        case "txt_register_lastname":
            var register_lastname_info = document.getElementById("register_lastname_info");
            var register_lastsname_icon = document.getElementById("register_lastname_icon");
            if (expresiones.lastname.test(e.target.value)) {
                e.target.style.cssText = "border-bottom: 1px solid #0eff36;";
                // Reutilizo código mediante una función
                icons_fields_targets_correct(register_lastname_info, register_lastsname_icon);
                expresions_valid_register['lastname'] = true;
                date_valid(0);
            } else {
                e.target.style.cssText = "border-bottom: 1px solid #ff0e0e;";
                // Reutilizo código mediante una función
                icons_fields_targets_wrong(register_lastname_info, register_lastsname_icon);
                expresions_valid_register['lastname'] = false;
            }
            break;

        case "txt_register_mail":
            var register_mail_info = document.getElementById("register_mail_info");
            var register_mail_icon = document.getElementById("register_mail_icon");
            if (expresiones.mail_complement.test(e.target.value)) {
                e.target.style.cssText = "border-bottom: 1px solid #0eff36;";
                // Reutilizo código mediante una función
                icons_fields_targets_correct(register_mail_info, register_mail_icon);
                expresions_valid_register['mail'] = true;
                date_valid(0);
            } else {
                e.target.style.cssText = "border-bottom: 1px solid #ff0e0e;";
                // Reutilizo código mediante una función
                icons_fields_targets_wrong(register_mail_info, register_mail_icon);
                expresions_valid_register['mail'] = false;
            }
            break;

        case "txt_register_password":
            var register_password_info = document.getElementById("register_password_info");
            var register_password_icon = document.getElementById("register_password_icon");
            if (expresiones.password.test(e.target.value)) {
                e.target.style.cssText = "border-bottom: 1px solid #0eff36;";
                // Reutilizo código mediante una función
                icons_fields_targets_correct(register_password_info, register_password_icon);
                expresions_valid_register['password'] = true;
                date_valid(0);
            } else {
                e.target.style.cssText = "border-bottom: 1px solid #ff0e0e;";
                // Reutilizo código mediante una función
                icons_fields_targets_wrong(register_password_info, register_password_icon);
                expresions_valid_register['password'] = false;
            }
            break;

        case "txt_register_passwordconfirm":
            var register_passwordconfirm_info = document.getElementById("register_passwordconfirm_info");
            var register_passwordconfirm_icon = document.getElementById("register_passwordconfirm_icon");
            var password_input = document.getElementById("txt_register_password").value;
            if (password_input == e.target.value) {
                e.target.style.cssText = "border-bottom: 1px solid #0eff36;";
                // Reutilizo código mediante una función
                icons_fields_targets_correct(register_passwordconfirm_info, register_passwordconfirm_icon);
                expresions_valid_register['confirmpassword'] = true;
                date_valid(0);
            } else {
                e.target.style.cssText = "border-bottom: 1px solid #ff0e0e;";
                // Reutilizo código mediante una función
                icons_fields_targets_wrong(register_passwordconfirm_info, register_passwordconfirm_icon);
                expresions_valid_register['confirmpassword'] = false;
            }
            break;
    }

}

// LLamo al form_login y valido si todo está correcto antes de enviarlo.
var form = document.getElementById('form_login');
form.addEventListener('submit', validar_login);


function validar_login(event) {
    if (expresions_valid_login.mail && expresions_valid_login.password) {
        this.submit();
    } else {
        var text_replace_login = document.getElementById("text_replace_login");
        var article_info_text = document.getElementById("article_info_text");
        article_info_text.style.cssText = "opacity: 1;";
        text_replace_login.innerHTML = '<i class="fas fa-exclamation-circle warnnig_icon"></i> Debes rellenar los campos correctamente antes...';
        event.preventDefault();
    };

};
function date_valid(value_defi) {
    var text_info_register = document.getElementById("text_info_register");
    switch (value_defi) {

        case 1:
            text_info_register.style.cssText = "display: contents;";
            break;

        case 0:
            text_info_register.style.cssText = "display: none;";
            break;
    }
};
// llamo al form register y valido si está correcto anter de enviarlo.
var form = document.getElementById('form_register');
form.addEventListener('submit', validar_register);

function validar_register(event) {

    if (expresions_valid_register.name && expresions_valid_register.lastname && expresions_valid_register.mail
        && expresions_valid_register.password && expresions_valid_register.confirmpassword) {
        this.submit();
    } else {
        event.preventDefault();
        date_valid(1);
    };

};


// Valido si se pudo registrar correctamente:

var txt_valid_register = document.getElementById("txt_valid_register").value;
var message_user_register = document.getElementById("message_user_register");
if (txt_valid_register == 1) {
    message_user_register.innerHTML = '<p><i class="fas fa-check"></i> Usuario registrado correctamente</p>';
    message_user_register.style.cssText = "display: flex;background-color: #3bda56a6;";
    setTimeout(function () {
        message_user_register.style.cssText = "display: none;";
    }, 10000);
};
if (txt_valid_register == 2) {
    message_user_register.innerHTML = '<i class="fas fa-times"></i> Ha ocurrido un error al intentar registrar el usuario.';
    message_user_register.style.cssText = "display: flex;background-color: #da3b3ba6;";
    setTimeout(function () {
        message_user_register.style.cssText = "display: none;";
    }, 10000);
};
if (txt_valid_register == 3) {
    message_user_register.innerHTML = '<i class="fas fa-exclamation-triangle"></i> Este correo ya está registrado.';
    message_user_register.style.cssText = "display: flex;background-color: #da3b3ba6;";
    setTimeout(function () {
        message_user_register.style.cssText = "display: none;";
    }, 15000);
};
if (txt_valid_register == 4) {
    var txt_valid_login = document.getElementById("txt_valid_login");
    txt_valid_login.style.cssText = "display: block;";
    setTimeout(function () {
        txt_valid_login.style.cssText = "display: none;";
    }, 15000);
};
