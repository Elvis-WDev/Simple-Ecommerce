<?php

include("header_Web/header.php");
include("../models/crud_products.php");
$obj_products_crud = new crud_products();
$id_product_selected_from_home = trim((isset($_POST['id_product_selected_from_home'])) ? $_POST['id_product_selected_from_home'] : "");
?>
<!-- AnimationDiv -->
<div class="container_animation">
  <div>
    <div>
      <img class="img_animation_item_page" src="../../assets/img/animate_img_4.png" alt="">
    </div>
    <div>
    </div>
    <div>
    </div>
    <div>
      <img class="img_animation_item_page" src="../../assets/img/animate_img_2.png" alt="">
    </div>
  </div>
</div>
<!-- SectionPage -->
<?php
if ($id_product_selected_from_home) {
  $obj_products_crud->id_product = $id_product_selected_from_home;
  $product_selected = $obj_products_crud->select_filter_to_productsedit();
}
?>
<form action="visual_item.php" method="POST">
  <section class="section_item_selected">
    <div class="container_item_global">
      <div class="box_carousel">
        <!-- Carousel-bootstrap -->
        <div id="carouselExampleIndicators" class="carousel slide div_container_corousel" data-ride="carousel">
          <ol class="carousel-indicators">
            <?php
            $aux_cont = 0; //Creo un contador para que en la 1° iteración se imprima el active.
            if ($id_product_selected_from_home) {
              $dir_name = $product_selected['dir_name'];
              $dir_selected = opendir("../gallery/" . $dir_name);
              while ($element_file = readdir($dir_selected)) {
                if ($element_file != "." && $element_file != "..") {
                  $aux_cont = $aux_cont + 1;
                  if ($aux_cont == 1) {
            ?>
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <?php
                  } else {
                  ?>
                    <li data-target="#carouselExampleIndicators" data-slide-to="<?= $aux_cont ?>"></li>
            <?php
                  }
                }
              }
            }
            ?>
          </ol>
          <div class="carousel-inner">
            <?php
            $aux_cont = 0; //Creo un contador para que en la 1° iteración se imprima el active.
            if ($id_product_selected_from_home) {
              $dir_name = $product_selected['dir_name'];
              $dir_selected = opendir("../gallery/" . $dir_name);
              while ($element_file = readdir($dir_selected)) {
                if ($element_file != "." && $element_file != "..") {
                  $aux_cont = $aux_cont + 1;
                  if ($aux_cont == 1) {
            ?>
                    <div class="carousel-item active">
                      <img width="100%" class="d-block w-100" src='../gallery/<?= $dir_name ?>/<?= $element_file  ?>' alt="Item.png">
                    </div>
                  <?php
                  } else {
                  ?>
                    <div class="carousel-item">
                      <img width="100%" class="d-block w-100" src='../gallery/<?= $dir_name ?>/<?= $element_file  ?>' alt="Item.png">
                    </div>
            <?php
                  }
                }
              }
            }
            ?>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <!-- Carousel Fin -->
      </div>
      <div class="box_info_item">
        <article>
          <span><?php
                if ($id_product_selected_from_home) {
                  echo $product_selected['name_status'] . ' | ' . $product_selected['name_category'];
                }
                ?></span>
        </article>
        <article>
          <h3><?php
              if ($id_product_selected_from_home) {
                echo strtoupper($product_selected['name_product'] . '.');
              }
              ?></h3>
          <hr>
        </article>
        <article>
          <p><?php
              if ($id_product_selected_from_home) {
                echo 'USD $' . $product_selected['price_product'];
              }
              ?></p>
        </article>
        <article>
          <span>
            <strong>
              Colores:
            </strong>
            <?php
            if ($id_product_selected_from_home) {
              echo $product_selected['colours_product'];
            }
            ?>
          </span>
        </article>
        <article>
          <span>
            <strong>
              Tallas:
            </strong>
            <?php
            if ($id_product_selected_from_home) {
              echo $product_selected['size_stock_product'];
            }
            ?>
          </span>
        </article>
        <article>
          <span>
            <strong>
              Disponible:
            </strong>
            <?php
            if ($id_product_selected_from_home) {
              echo $product_selected['quantity_product'] . ' Unidades.';
            }
            ?>
          </span>
        </article>
        <article>
          <span>
            <strong>
              Precio Envío:
            </strong>
            <?php
            if ($id_product_selected_from_home) {
              echo '$' . $product_selected['price_send_product'];
            }
            ?>
          </span>
        </article>
        <article>
          <span><i class="far fa-comment-dots"></i> Entrega a acordar con el vendedor.</span><br>
          <i class="fas fa-location-arrow"></i> Santa Rosa, El Oro.
        </article>
        <article>
          <?php
          $api_message_shop = '';
          if ($id_product_selected_from_home) {
            $aux_name = $product_selected["name_product"];
            $api_message_shop = 'Hola, me gustó un producto de tu sitio web llamado: "' . $aux_name . '" con el código: ' . $id_product_selected_from_home . '.';
          }
          ?>
          <a class="btn_item_selected" target="_blank" href='https://api.whatsapp.com/send/?phone=593983987321&text=<?php echo $api_message_shop; ?>&app_absent=0'><i class="fas fa-shopping-cart"></i> COMPRAR AHORA</a>
        </article>
      </div>
    </div>
    <div class="container_items_options">
      <h2>Prendas similares<br>
        <hr>
      </h2>
      <div class="container_items">
        <!-- Itemcard -->
        <!-- <div class="card_item">
        <div class="float_quantity_stock_conatiner">
          <p><strong>99</strong></p>
        </div>
        <a href="visual_item.php" class="link_card_container">
          <div>
            <img src="../../assets/img/img_test.jpeg" alt="" width="100%">
          </div>
          <div>
            <h2>Hombre</h4>
              <p>Lorem ipsum dolor sit amet HOla a todos.</p>
              <span>$20.00</span>
          </div>
        </a>
      </div> -->
        <?php
        if ($id_product_selected_from_home) {
          $obj_products_crud->id_category = $product_selected['id_category'];
          $obj_products_crud->id_subcategory = $product_selected['id_subcategory'];
          $listprod_recommended = $obj_products_crud->select_filter_products_recommended();
        ?>
          <?php
          foreach ($listprod_recommended as $items_products) :
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
        }
        ?>
      </div>
    </div>
  </section>
</form>
<?php

include("footer_Web/footer.php");

?>