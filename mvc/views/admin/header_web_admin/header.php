<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Admin Panel Link -->
    <link rel="stylesheet" href="../../../assets/css/general/style_admin_page.css">
    <link rel="stylesheet" href="../../../assets/css/fields_design/style_fields_design.css">
    <link rel="stylesheet" href="../../../assets/css/font_icons/all.min.css">
    <!-- Jquery CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../../assets/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- Responsive Web Design -->
    <link rel="stylesheet" href="../../../assets/css/media_querys/responsive_admin_page.css">
    <!-- Favicon -->
    <link rel="icon" href="../../../assets/img/favicon_admin.png" type="image/x-icon" sizes="32x32" />
    <title>Admin Panel</title>
</head>

<body>
    <!-- Inicio Modal -->
    <div id="modal_reveal" class="modal_container_abs">
        <div class="modal_container_flex">
            <div class="modal">
                <div>
                    <h1 id="tittle_modal"><i class="fas fa-exclamation-triangle"></i> Advertencia</h1>
                    <hr>
                    <p id="message_modal">
                        Asegúrate de que todos los campos sean correctos y no estén vacios.
                    </p>
                    <div id="button_ok_modal" class="button">
                        OK
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin modal -->
    <!-- Header -->
    <header class="header">
        <div>
            <h1>Gestión de Tienda</h1>
        </div>
        <ul>
            <li>

                <a href="admin_panel">
                    <i class="fas fa-home "></i>
                    Inicio
                </a>
            </li>
            <li>
                <a href="catalogo">
                    <i class="fas fa-book "></i>
                    Catálogo
                </a>
            </li>
            <li>
                <a href="new_item">
                    <i class="fas fa-plus-circle "></i>
                    Nuevo producto
                </a>
            </li>
            <li>
                <a target="_blank" href="../home">
                    <i class="fas fa-eye "></i>
                    Visualizar Tienda
                </a>
            </li>
            <li>
                <a href="exit_admin">
                    <i class="fas fa-sign-out-alt"></i>
                    Salir
                </a>
            </li>
        </ul>
    </header>
    <!-- Aside panel -->
    <section class="panel_admin">
        <aside id="aside_left" class="aside_left">
            <h3>Gestión de Tienda</h3>

            <ul>
                <li>
                    <a class="" href="admin_panel.php">
                        <i class="fas fa-home icons_admin_options"></i>
                        Inicio
                    </a>
                </li>
                <li>
                    <a class="" href="catalogo">
                        <i class="fas fa-book icons_admin_options"></i>
                        Catálogo
                    </a>
                </li>
                <li>
                    <a class="" href="new_item">
                        <i class="fas fa-plus-circle icons_admin_options"></i>
                        Nuevo Producto
                    </a>
                </li>
                <li>
                    <a class="" target="_blank" href="../home">
                        <i class="fas fa-eye icons_admin_options"></i>
                        Visualizar Tienda
                    </a>
                </li>
                <a class="logout_button" href="exit_admin"><i class="fas fa-sign-out-alt"></i> Salir</a>
            </ul>

        </aside>
        <div id="section_page" class="container_page">
            <div class="header_content">
                <div>
                    <i id="aside_drowable" class="fas fa-align-justify active"></i>
                </div>
                <div>
                    <div>
                        <?php
                        if ($username) {
                            echo $username;
                        } else {
                            echo 'Admin';
                        }
                        ?>
                        <i class="far fa-user"></i>
                    </div>
                </div>
            </div>