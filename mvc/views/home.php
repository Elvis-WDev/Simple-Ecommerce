<?php

include("header_Web/header.php");
include("../models/crud_products.php");
include("../models/crud_gallery.php");
include("../controllers/ctl_clients.php");
$obj_products_crud = new crud_products();
$obj_gallery_crud = new crud_gallery();
?>
<section class="section_slider">
  <!-- Inicio Slider-bootstrap -->
  <div id="carousel_1" class="carousel slide div_slider" data-ride="carousel">
    <div class="container_slider_intro">
      <div class="container_components">
        <h1>¡No puedes comprar la felicidad, pero puedes comprar ROPA!<i style="margin-left: 10px;color: #000000;" class="fas fa-smile-wink"></i></h1>
        <div class="subtitle">
          <p>Los mejores precios del mercado, con gran variedad de modelos y diseños para todas las tallas.</p>
        </div>
        <div class="btns_slider_containder">
          <a class="btn_slider_catalogo" href="#filter_section_items"><i style="margin-right: 15px;" class="fas fa-stream"></i>Ver catálogo</a>
          <a style="display: none;" class="btn_slider_oferta option_button" data-name="ofertas" href="javascript:void(0)">
            <img src="https://img.icons8.com/external-kiranshastry-solid-kiranshastry/30/000000/external-sales-miscellaneous-kiranshastry-solid-kiranshastry.png" />
            Ofertas
          </a>
        </div>
      </div>
    </div>
    <ol class="carousel-indicators">
      <li style="background-color: #000000;" data-target="#carousel_1" data-slide-to="0" class="active"></li>
      <li style="background-color: #000000;" data-target="#carousel_1" data-slide-to="1"></li>
      <li style="background-color: #000000;" data-target="#carousel_1" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item div_container_img active ">
        <img class="d-block w-100 slider_img" src="../../assets/img/stock_img_clothes.png" alt="First slide">
      </div>
      <div class="carousel-item div_container_img">
        <img class="d-block w-100 slider_img" src="../../assets/img/stock_img_clothes2.png" alt="Second slide">
      </div>
      <div class="carousel-item div_container_img">
        <img class="d-block w-100 slider_img" src="../../assets/img/stock_img_clothes3.png" alt="Third slide">
      </div>
    </div>
    <a style="display: none;" class="carousel-control-prev" href="#carousel_1" role="button" data-slide="prev">
      <span style="background-color: #000000;border-radius: 10px;" class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a style="display: none;" class="carousel-control-next" href="#carousel_1" role="button" data-slide="next">
      <span style="background-color: #000000;border-radius: 10px;" class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <!-- Fin slider Bootstrap -->
</section>
<hr>
<!-- Section de opciones. -->
<section class="section_options_items" id="section_items">
  <ul>
    <li>
      <a class="option_button" data-name="mujer" href="javascript:void(0)">
        <img src="https://img.icons8.com/glyph-neue/28/000000/women-age-group-4.png" />
        Mujeres <i class="fas fa-angle-up"></i>
      </a>
      <ul class="drawable_ul_container">
        <li>
          <a class="option_button" data-name="vestidos" href="javascript:void(0)">
            <img class="icon_drawable_box" src="https://img.icons8.com/material/18/000000/little-black-dress.png" />
            Vestidos
          </a>
        </li>
        <li>
          <a class="option_button" data-name="blusas" href="javascript:void(0)">
            <img class="icon_drawable_box" src="https://img.icons8.com/ios-filled/17/000000/womens-t-shirt.png" />
            Blusas
          </a>
        </li>
        <li>
          <a class="option_button" data-name="faldas" href="javascript:void(0)">
            <img class="icon_drawable_box" src="https://img.icons8.com/material/17/000000/skirt.png" />
            Faldas
          </a>
        </li>
        <li>
          <a class="option_button" data-name="mpantalones" href="javascript:void(0)">
            <img class="icon_drawable_box" src="https://img.icons8.com/ios-filled/17/000000/jeans.png" />
            Pantalones
          </a>
        </li>
        <li>
          <a class="option_button" data-name="mcalzado" href="javascript:void(0)">
            <img class="icon_drawable_box" src="https://img.icons8.com/material/17/000000/women-shoe-side-view.png" />
            Calzado
          </a>
        </li>
      </ul>
    </li>
    <li>
      <a class="option_button" data-name="hombre" href="javascript:void(0)">
        <img src="https://img.icons8.com/glyph-neue/25/000000/men-age-group-4.png" />
        Hombres <i class="fas fa-angle-up"></i>
      </a>
      <ul class="drawable_ul_container">
        <li>
          <a class="option_button" data-name="camisas" href="javascript:void(0)">
            <img class="icon_drawable_box" src="https://img.icons8.com/material/17/000000/t-shirt--v1.png" />
            Camisas
          </a>
        </li>
        <li>
          <a class="option_button" data-name="camisetas" href="javascript:void(0)">
            <img class="icon_drawable_box" src="https://img.icons8.com/external-kiranshastry-solid-kiranshastry/17/000000/external-ironed-cleaning-kiranshastry-solid-kiranshastry.png" />
            Camisetas
          </a>
        </li>
        <li>
          <a class="option_button" data-name="hpantalones" href="javascript:void(0)">
            <img class="icon_drawable_box" src="https://img.icons8.com/glyph-neue/17/000000/trousers.png" />
            Pantalones
          </a>
        </li>
        <li>
          <a class="option_button" data-name="bermudas" href="javascript:void(0)">
            <img class="icon_drawable_box" src="https://img.icons8.com/ios-filled/17/000000/shorts.png" />
            Bermudas
          </a>
        </li>
        <li>
          <a class="option_button" data-name='hcalzado' href="javascript:void(0)">
            <img class="icon_drawable_box" src="https://img.icons8.com/ios-filled/17/000000/sneakers.png" />
            Calzado
          </a>
        </li>
      </ul>
    </li>
  </ul>
</section>
<hr>
<!-- Sections CARDS ******************************************************************************************************************************-->
<form action="visual_item" method="POST">
  <section id='filter_section_items' class="section_items">
    <?php
    foreach ($obj_products_crud->select_all_products() as $items_products) :
    ?>
      <!-- Itemcard -->
      <div class="card_item">
        <div class="float_quantity_stock_conatiner">
          <p><strong><?= $items_products['quantity_product'] ?></strong></p>
        </div>
        <a class="link_card_container">
          <div>
            <img src='../gallery/<?= $items_products['dir_name'] ?>/<?= $items_products['link_name_img'] ?>' alt="Clothes.jpg" width="100%">
          </div>
          <div>
            <h2><?= $items_products['name_category'] ?></h4>
              <p><?= $items_products['name_product'] ?></p>
              <span><?= '$' . $items_products['price_product'] ?></span>
          </div>
          <div class="button_container">
            <button type="submit" name="id_product_selected_from_home" value="<?= $items_products['id_product'] ?>" class="button_home_ver_product">VER</button>
          </div>
        </a>
      </div>
    <?php
    endforeach;
    ?>
  </section>
</form>
<hr>
<section class="section_social">
  <h1 class="txt_title">Redes sociales</h1>
  <ul>
    <li>
      <a href="#"><i class="fab fa-facebook"></i></a>
    </li>
    <li>
      <a href="#"><i class="fab fa-whatsapp"></i></a>
    </li>
    <li>
      <a href="#"><i class="fab fa-instagram"></i></a>
    </li>
  </ul>
</section>
<hr>
<section class="section_comments">
  <h1 class="tittle_comment_section txt_title">Testimonios de Clientes</h1>
  <!-- Slider Comments -->
  <div id="carouselExampleIndicators" class="carousel slide div_container_slider_box" data-ride="carousel">
    <ol class="carousel-indicators">
      <li style="background-color: #000000;" data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li style="background-color: #000000;" data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li style="background-color: #000000;" data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item item_carousel_slide active">
        <div class="container_comment">
          <!-- Tarjeta -->
          <div class="item_card">
            <!-- Cuadro arriba -->
            <div class="box_up">
              <div>
                <!-- Imagen.png HERE -->
              </div>
            </div>
            <!-- Cuadro bajo -->
            <div class="box_down">
              <p>"Excelente servicio!!, muy buenos precios y calidad en<br> las prendas, además de los diferentes diseños.<br> Le doy 5 estrellas."</p>
              <p class="stars_colors">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </p>
              <h5>-Elvis Macas</h5>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item item_carousel_slide">
        <div class="container_comment">
          <!-- Tarjeta -->
          <!-- Tarjeta -->
          <div class="item_card">
            <!-- Cuadro arriba -->
            <div class="box_up">
              <div>
                <!-- Imagen.png HERE -->
              </div>
            </div>
            <!-- Cuadro bajo -->
            <div class="box_down">
              <p>"Es la mejor tienda donde he comprado, el trato es muy <br>agradable, hay de todos los precios, adémas de su amplio<br> catálogo, lo recomiendo al 100%."</p>
              <p class="stars_colors">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </p>
              <h5>-Elvis Macas</h5>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item item_carousel_slide">
        <div class="container_comment">
          <!-- Tarjeta -->
          <div class="item_card">
            <!-- Cuadro arriba -->
            <div class="box_up">
              <div>
                <!-- Imagen.png HERE -->
              </div>
            </div>
            <!-- Cuadro bajo -->
            <div class="box_down">
              <p>"Es de mis tiendas favoritas donde compro las prendas para mí<br> y para mis hijos, el trato es super gentil y además tiene muchos<br> diseños para todas las tallas."</p>
              <p class="stars_colors">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </p>
              <h5>-Elvis Macas</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <a style="display: none;" class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span style="background-color: #000000;border-radius: 5px;" class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a style="display: none;" class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span style="background-color: #000000;border-radius: 5px;" class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <!-- Slider Comments -->
</section>
<hr>
<!-- Section_contact -->
<section class="section_contact" id="section_contact">
  <div>
    <h1 class="txt_title"><i class="fas fa-map-marker-alt"></i>Ubicación</h1>
    <div class="map_">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31860.41633878351!2d-79.98115554878288!3d-3.458462001370222!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x90337182375299d1%3A0x61925fc8f0682977!2sSanta%20Rosa!5e0!3m2!1ses!2sec!4v1638997893856!5m2!1ses!2sec" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
  </div>
  <div>
    <h1 class="txt_title"><i class="fas fa-info-circle"></i>Información</h1>
    <div class="div_info">
      <p><strong>Horario:</strong> Abierto desde: 8.00PM hasta 6.00PM.</p>
      <p><strong>Calle:</strong> Av. Quito entre Sixto Durán y, Edmundo Chiriboga, Santa Rosa.</p>
      <p><strong>Referencia:</strong> Al lado de la farmacia "Mia".</p>
      <p><strong>Contacto:</strong> +593 XX XXX XXXX.</p>
    </div>
  </div>
</section>
<?php

include("footer_Web/footer.php");

?>

<script type="text/javascript">
  $(document).ready(function() {
    $('.option_button').click(function() {
      value = $(this).attr('data-name');
      $.post("../controllers/ctl_filter_products.php", {
        value_tofilter_home: value
      }, function(data) {
        $("#filter_section_items").html(data);
      })
    });
  });
</script>
<script src="../../assets/js/validation_home.js" type="text/javascript"></script>