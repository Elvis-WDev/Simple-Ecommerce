<?php
include("../../controllers/ctl_users.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/css/general/style.css">
    <link rel="stylesheet" href="../../../assets/css/fields_design/style_fields_design.css">
    <link rel="stylesheet" href="../../../assets/css/font_icons/all.min.css">
    <link rel="stylesheet" href="../../../assets/css/media_querys/style_responsive.css">
    <link rel="stylesheet" href="../../../assets/css/animations/style_animations.css">
    <link rel="icon" href="../../../assets/img/login_favicon.png" type="image/x-icon" sizes="32x32" />
    <title>Inicio de Sesión</title>

</head>

<body>
    <input type="hidden" value="<?php echo $txt_valid_inputregister; ?>" name="txt_valid_register" id="txt_valid_register">
    <section class="container" id="login_section">
        <article class="container_login">
            <div class="img_login animation_up">

            </div>
            <div class="container_form animation_up">
                <form action="" method="POST" id="form_login">
                    <article class="text_warnnig" id="article_info_text">
                        <p id="text_replace_login">
                            <i class="fas fa-exclamation-circle warnnig_icon"></i>El correo debe terminar con @example.com y la contraseña debe tener mínimo 8 caractéres, primera letra en mayúscula, números, y algún símbolo.
                        </p>
                    </article>
                    <div class="tittle_login">
                        <h1>Inicio de sesión</h1>
                    </div>
                    <div>
                        <i class="fas fa-user"></i><input class="txt_login_user" type="mail" name="txt_login_user" id="txt_login_user" placeholder="Correo electrónico..."><i id="check_login_mail" class="far fa-check-circle check_correct"></i>
                    </div>
                    <div>
                        <i class="fas fa-key"></i><input class="txt_login_password" type="password" name="txt_login_password" id="txt_login_password" placeholder="Contraseña de usuario..."><i id="check_login_password" class="far fa-check-circle check_correct"></i>
                    </div>
                    <div>
                        <a class="links_login" target="_blank" href="../home.php">Visualizar Tienda</a><a class="links_login" href="login.php?registro=1">No tengo una cuenta</a>
                    </div>
                    <div>
                        <input class="button_login" type="submit" name="action" value="Ingresar">
                    </div>
                    <div id="txt_valid_login">
                        <p>Usuario o contraseña incorrectos. Vuelve a intentarlo.</p>
                    </div>
                </form>
            </div>
        </article>
    </section>

    <section class="container_2" id="register_section">
        <article class="container_register">
            <div class="img_register animation_down">

            </div>
            <div class="container_form animation_down">
                <form action="" method="POST" id="form_register">
                    <div class="tittle_login">
                        <h1>Registro de usuario</h1>
                    </div>
                    <div>
                        <div class="mg_div">
                            <i class="fas fa-user"></i><input class="txt_register_name" type="text" name="txt_register_name" id="txt_register_name" placeholder="Nombre"><i class="far fa-check-circle check_correct_register" id="register_name_icon"></i>
                            <br>
                            <p class="info_fields" id="register_name_info"><i class="fas fa-exclamation-circle warnnig_icon"></i>Ingresar un Nombre válido.
                                Recuerda que un nombre no debe llevar números y la primera letra es en mayúscula.</p>
                        </div>
                        <div>
                            <i class="far fa-user"></i><input class="txt_register_lastname" type="text" name="txt_register_lastname" id="txt_register_lastname" placeholder="Apellido"><i class="far fa-check-circle check_correct_register" id="register_lastname_icon"></i>
                            <br>
                            <p class="info_fields" id="register_lastname_info"><i class="fas fa-exclamation-circle warnnig_icon"></i>Ingresar un Apellido válido.
                                Recuerda que un apellido no debe llevar números y la primera letra es en mayúscula.</p>
                        </div>
                        <!-- fa-times-circle = wrong check -->
                    </div>
                    <div>
                        <div class="mg_div">
                            <i class="fas fa-envelope"></i><input class="txt_register_mail" type="text" name="txt_register_mail" id="txt_register_mail" placeholder="Correo"><i class="far fa-check-circle check_correct_register" id="register_mail_icon"></i>
                            <br>
                            <p class="info_fields" id="register_mail_info"><i class="fas fa-exclamation-circle warnnig_icon"></i>Ingresar un correo válido.
                                Recuerda que un correo debe tener de 4-20 caractéres, no debe contener símbolos como: "%", "$", "#", etc.</p>
                        </div>
                        <div>
                            <i class="fas fa-at arroba_icon"></i>
                            <select name="select" class="combox_mail">
                                <option value="@gmail.com">@gmail.com</option>
                                <option value="@hotmail.com">@hotmail.com</option>
                                <option value="@outlook.com">@outlook.com</option>
                            </select><br>
                            <br>
                            <p class="info_fields"><i class="fas fa-exclamation-circle warnnig_icon"></i>Este campo es necesario.</p>
                        </div>
                        <!-- fa-times-circle = wrong check -->
                    </div>
                    <div>
                        <div class="mg_div">
                            <i class="fas fa-lock"></i></i><input class="txt_register_password" type="password" name="txt_register_password" id="txt_register_password" placeholder="Contraseña"><i class="far fa-check-circle check_correct_register" id="register_password_icon"></i>
                            <br>
                            <p class="info_fields" id="register_password_info"><i class="fas fa-exclamation-circle warnnig_icon"></i>Ingresar una contraseña válida.
                                Recuerda que una contraseña debe tener, primera letra mayúscula, de 8 - 20 caracteres, incluidos números y símbolos.</p>
                        </div>
                        <div>
                            <i class="fas fa-unlock"></i><input class="txt_register_passwordconfirm" type="password" name="txt_register_passwordconfirm" id="txt_register_passwordconfirm" placeholder="Confirmar contraseña"><i class="far fa-check-circle check_correct_register" id="register_passwordconfirm_icon"></i>
                            <br>
                            <p class="info_fields" id="register_passwordconfirm_info"><i class="fas fa-exclamation-circle warnnig_icon"></i>Recuerda que la contraseñas deben coincidir y deben tener exactamente el mismo formato.</p>
                        </div>
                        <!-- fa-times-circle = wrong check -->
                    </div>
                    <div>
                        <div class="mg_div">
                            <i class="far fa-calendar-alt"></i><input class="txt_register_date" type="date" name="txt_register_date" id="txt_register_date" value="2000-01-01" min="1930-01-01" max="2021-12-31"><i class="far fa-check-circle check_correct_register"></i>
                            <br>
                            <p class="info_fields"><i class="fas fa-exclamation-circle warnnig_icon"></i>Debes introducir una fecha de nacimiento válida, recuerda que debes ser mayor de edad.</p>
                        </div>
                        <div>
                            <i class="fas fa-venus-mars"></i>
                            <select name="select_2" class="combox_date">
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                                <option value="Otro">Otro</option>

                            </select><br>
                            <br>
                            <p class="info_fields"><i class="fas fa-exclamation-circle warnnig_icon"></i>Este campo es necesario.</p>
                        </div>
                        <!-- fa-times-circle = wrong check -->
                    </div>
                    <div>
                        <div>
                            <input type="submit" class="btn_register" name="action" value="Registrar">
                        </div>
                        <div class="link_conatiner_reg">
                            <a class="links_register" href="login.php?registro=0">Ya tengo una cuenta</a>
                        </div>

                    </div>
                    <div id="text_info_register">
                        <p><i class="fas fa-exclamation-circle warnnig_icon"></i> Rellene los datos correctamente, recuerde agregar su fecha de nacimiento.</p>
                    </div>
                    <div id="message_user_register">

                    </div>
                </form>
            </div>
        </article>
    </section>
    <!-- Scripts -->
    <script src="../../../assets/js/animations.js"></script>
    <script src="../../../assets/js/validations.js"></script>
</body>
<!-- rrhh.santarosa@cbvision.net.ec -->

</html>