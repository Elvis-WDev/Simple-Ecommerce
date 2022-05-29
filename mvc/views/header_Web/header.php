<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../assets/css/general/style_home.css">
  <link rel="stylesheet" href="../../assets/css/font_icons/all.min.css">
  <link rel="stylesheet" href="../../assets/css/fields_design/style_fields_design.css">
  <link rel="stylesheet" href="../../assets/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="../../assets/css/media_querys/responsive_home_page.css">
  <!-- Design visual Items selected -->
  <link rel="stylesheet" href="../../assets/css/general/style_item_visual.css">
  <!-- Nosotros Page Link -->
  <link rel="stylesheet" href="../../assets/css/general/styles_nosotros.css">
  <!-- Favicon -->
  <link rel="icon" href="../../assets/img/favicon.png" type="image/x-icon" sizes="32x32" />
  <title>Shop SR</title>
</head>

<body>

  <header class="header">

    <div class="header_logo">
      <h1>
        <a href="home"><img src="../../assets/img/icon_header_logo.png" width="70px" alt="">Santa Rosa Shop</a>
      </h1>
    </div>
    <div class="header_options">
      <ul>
        <li>
          <a href="home">Home</a>
        </li>
        <li>
          <a class="link_header_button" data-value='1' href="javascript:void(0)">Catálogo</a>
        </li>
        <li>
          <a class="link_header_button" class="link_header_button" data-value='1' href="javascript:void(0)">Contacto</a>
        </li>
        <li>
          <a href="nosotros">Nosotros</a>
        </li>
        <li>
          <a class="link_header_button" class="link_header_button" data-value='1' href="javascript:void(0)">Ubicación</a>
        </li>
        <li>
          <form id="form_to_search" action="" method="POST">
            <input id="txt_search_home" type="search" name="txt_search_field_home" placeholder="Nombre, Precio, Color, etc.." class="input_search_item_home">
            <button class="btn_search_item" type="submit" name="action"><i class="fas fa-search icon_search_home"></i></button>
          </form>
        </li>
        <li class="div_user_container">
          <div class="user_div"><span>Elvis</span><i class="far fa-user"></i></div>
        </li>
      </ul>

    </div>
  </header>