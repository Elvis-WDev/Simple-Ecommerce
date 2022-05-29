<?php
include_once(__DIR__ . "../../models/crud_products.php");
$obj_crud_products = new crud_products();
?>

<?php
// Filtrado de items Catalogo
$id_category_post_subfilter = trim((isset($_POST['id_category_sub_post'])) ? $_POST['id_category_sub_post'] : "");
$id_subcategory_subfilter_post = trim((isset($_POST['id_subcategory_sub_post'])) ? $_POST['id_subcategory_sub_post'] : "");

if ($id_category_post_subfilter == 0 || $id_subcategory_subfilter_post == 0) {
} else {
    $obj_crud_products->id_category = $id_category_post_subfilter;
    $obj_crud_products->id_subcategory = $id_subcategory_subfilter_post;
    $list_prodcuts = $obj_crud_products->select_filter_products();
    if ($list_prodcuts) {
        foreach ($list_prodcuts as $items_products) {
?>
            <!-- From resp -->
            <tr class="table_items">
                <td><?= $items_products['id_product'] ?></td>
                <td><?= $items_products['name_status'] ?></td>
                <td><?= $items_products['name_category'] ?></td>
                <td><?= $items_products['name_subcategory'] ?></td>
                <td><?= $items_products['name_product'] ?></td>
                <td><?= $items_products['price_product'] ?></td>
                <td><?= $items_products['colours_product'] ?></td>
                <td><?= $items_products['quantity_product'] ?></td>
                <td><?= $items_products['price_send_product'] ?></td>
                <td><?= $items_products['size_stock_product'] ?></td>
                <td><img src="../../gallery/<?= $items_products['dir_name'] ?>/<?= $items_products['link_name_img'] ?>" alt="" width="100px"></td>
                <td class="td_container_butons">
                    <button type="submit" value="<?= $items_products['id_product'] ?>" name="id_product_from_table" class="button_lis_edit"><i class="fas fa-edit"></i> Editar</button>
                    <button type="button" data-nameprod='<?= $items_products['name_product'] ?>' data-idprod='<?= $items_products['id_product'] ?>' data-dirname='<?= $items_products['dir_name'] ?>' data-toggle="modal" data-target="#exampleModal" value="" name="id_product_eliminar" class="button_lis_delete"><i class="far fa-trash-alt"></i> Borrar</button>
                </td>
            </tr>
<?php
        }
    }
}
?>

<?php
$aux_id_cat = 0;
$aux_id_subcat = 0;
$value_tofilter_home = trim((isset($_POST['value_tofilter_home'])) ? $_POST['value_tofilter_home'] : "");

if ($value_tofilter_home) {
    switch ($value_tofilter_home) {
        case 'mujer';
            $aux_id_cat = 2;
            break;
        case 'vestidos';
            $aux_id_cat = 2;
            $aux_id_subcat = 6;
            break;
        case 'blusas';
            $aux_id_cat = 2;
            $aux_id_subcat = 7;
            break;
        case 'faldas';
            $aux_id_cat = 2;
            $aux_id_subcat = 8;
            break;
        case 'mpantalones';
            $aux_id_cat = 2;
            $aux_id_subcat = 9;
            break;
        case 'mcalzado';
            $aux_id_cat = 2;
            $aux_id_subcat = 10;
            break;
        case 'hombre';
            $aux_id_cat = 1;
            break;
        case 'camisas';
            $aux_id_cat = 1;
            $aux_id_subcat = 1;
            break;
        case 'camisetas';
            $aux_id_cat = 1;
            $aux_id_subcat = 2;
            break;
        case 'hpantalones';
            $aux_id_cat = 1;
            $aux_id_subcat = 3;
            break;
        case 'bermudas';
            $aux_id_cat = 1;
            $aux_id_subcat = 4;
            break;
        case 'hcalzado';
            $aux_id_cat = 1;
            $aux_id_subcat = 5;
            break;
    }
    consult_function($aux_id_cat, $aux_id_subcat);
}
?>
<?php
// Recibe el id y subid para realizar mi consulta con la bd a partir de estos datos.
function consult_function($idcat, $idsubcat)
{
    $obj_crud_products = new crud_products();
    if ($idsubcat != 0) {
        $obj_crud_products->id_category = $idcat;
        $obj_crud_products->id_subcategory = $idsubcat;
        $list_prodcuts = $obj_crud_products->select_filter_products();
    } else {
        $obj_crud_products->id_category = $idcat;
        $list_prodcuts = $obj_crud_products->select_filter_products_category();
    }


    if ($list_prodcuts) {
        foreach ($list_prodcuts as $items_products) {
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
        }
    }
}
?>


<?php
$value_tosearch_product = trim((isset($_POST['value_tosearch_product'])) ? $_POST['value_tosearch_product'] : "");
if ($value_tosearch_product) {
    $list_products_tohome = $obj_crud_products->search_product($value_tosearch_product);
    if ($list_products_tohome) {
        foreach ($list_products_tohome as $items_products) {

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

        }
    } else {
        echo '<div class="message_filter_search">No se ha encontrado productos similares a "' . $value_tosearch_product . '". <a href="home"> Volver</a></div>';
    }
}
?>