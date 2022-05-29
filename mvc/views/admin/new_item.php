<?php
session_start();
$username = $_SESSION['username'];
if ($username) {
    include("../../controllers/ctl_status.php");
    include("../../controllers/ctl_category.php");
    include("../../controllers/ctl_subcategory.php");
    include("../../controllers/ctl_products.php");
    include("header_web_admin/header.php");
    // Objetos necesarios para filtrar datos.
    $obj_category_crud = new crud_category();
    $obj_subcategory_crud = new crud_subcategory();
    $obj_status_crud = new crud_status();
    // Variable para determinar si llegan mis datos desde la tabla para editar un producto
    $id_prod = trim((isset($_POST['id_product_from_table'])) ? $_POST['id_product_from_table'] : "");
?>
    <div style="height: auto; margin-bottom: 10px;" class="content">
        <form method="POST" id="form_admin_panel_newitem" class="new_item_container" enctype="multipart/form-data">
            <div>
                <label for="">Estado:</label>
                <select id="combox_status" name="select" class="combox_status">
                    <option value="seleccionar">--seleccionar--</option>
                    <?php
                    $container_status = $obj_status_crud->select_status();
                    foreach ($container_status as $items_status) {
                    ?>
                        <option value="<?= $items_status['id_status'] ?>" <?php if ($id_prod) {
                                                                                if (data_edit_product('id_status') == $items_status['id_status']) {
                                                                                    echo "selected";
                                                                                }
                                                                            } ?>><?= $items_status['name_status'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div>
                <label for="">Categoría:</label>
                <select id="combox_category" name="select_category" class="combox_category">
                    <option value="seleccionar">--seleccionar--</option>
                    <!-- LLamo a mis categorías de mi BD -->
                    <?php
                    $content_list = $obj_category_crud->select_category();
                    foreach ($content_list as $items_category) {
                    ?>
                        <option value="<?= $items_category['id_category'] ?>" <?php if ($id_prod) {
                                                                                    if (data_edit_product('id_category') == $items_category['id_category']) {
                                                                                        echo "selected";
                                                                                    }
                                                                                } ?>><?= $items_category["name_category"] ?></option>
                    <?php
                    }
                    ?>
                    <!-------------- LLamo a mis categorías de mi BD ------------>
                </select>
            </div>
            <div id="container_subcategory">
                <label for="">Subcategoría:</label>
                <select id="combox_subcategory" name="select_subcategory" class="combox_subcategory">
                    <option value="seleccionar">--seleccionar--</option>
                    <!-- LLamo a mis subcategorías de mi BD -->
                    <!-- Filtro mis subcatgegoría al momento que llegan mis datos para editar. -->
                    <?php if ($id_prod) {
                        $idsubcategory = data_edit_product('id_subcategory');
                        $obj_subcategory_crud->id_subcategory = $idsubcategory;
                        $sub_selected = $obj_subcategory_crud->select_one_subcategory();
                    ?>
                        <option value="<?= $sub_selected['id_subcategory'] ?>" selected><?= $sub_selected['name_subcategory'] ?></option>
                    <?php
                    }
                    ?>
                    <!--------------- LLamo a mis subcategorías de mi BD ------------->
                </select>
            </div>
            <!-- Div para Gestionar acciones de usuarios -->
            <div>
                <!-- Conectado con JS para gestionar las acciones de usuario como guardar o editar registros. -->
                <input id="txt_valid_action" name="txt_valid_action" type="hidden" value="<?php echo  $valid_massage_action ?>">
            </div>
            <!-- --Fin Div para Gestionar acciones de usuarios -->
            <div>
                <!-- Id_product para traer valores y editar registro. -->
                <input id="txt_id_product" name="txt_id_product" type="hidden" value="<?= $id_prod ?>">
            </div>
            <div>
                <label for="">Nombre del Producto:</label>
                <input value="<?php if ($id_prod) {
                                    echo data_edit_product('name');
                                } ?>" class="inpt_admin_newitem" name="txt_name_product" type="text" minlength="4" maxlength="65" placeholder="Ejemplo: Camiseta cuello en V con botones">
            </div>
            <div>
                <label for="">Precio:</label>
                <input value="<?php if ($id_prod) {
                                    echo data_edit_product('price');
                                } ?>" class="inpt_admin_newitem" name="txt_price_product" type="number" min="0" max="999" placeholder="Ejemplo: $10.00">
            </div>
            <div>
                <label for="">Colores Disponibles:</label>
                <input value="<?php if ($id_prod) {
                                    echo data_edit_product('colour');
                                } ?>" class="inpt_admin_newitem" name="txt_colours_product" type="text" placeholder="Ejemplo: Azul, Amarillo, etc.">
            </div>
            <div>
                <label for="">Cantidad Disponible:</label>
                <input value="<?php if ($id_prod) {
                                    echo data_edit_product('quantity');
                                } ?>" class="inpt_admin_newitem" name="txt_quantity_product" type="number" placeholder="Ejemplo: 10" min="0" max="100">
            </div>
            <div>
                <label for="">Precio de envío:</label>
                <input value="<?php if ($id_prod) {
                                    echo data_edit_product('price_send');
                                } ?>" class="inpt_admin_newitem" name="txt_pricesend_product" type="number" placeholder="Ejemplo: 1.00" min="0" max="10">
            </div>
            <div>
                <label for="">Tallas Disponibles:</label>
                <input value="<?php if ($id_prod) {
                                    echo data_edit_product('size_stock');
                                } ?>" class="inpt_admin_newitem" name="txt_tallastock_product" type="text" placeholder="Ejemplo: XL, XXL, 40, etc.">
            </div>
            <div>
                <label for="">Imagenes del producto:</label>
                <input class="inpt_admin_newitem" type="file" name="txt_img_product[]" accept="image/*" multiple required>
                <div>
                    <?php
                    if ($id_prod) {
                        $dir_name = data_edit_product('dir_name');
                    ?>
                        <!-- Genero un inp para enviar el nombre de mi dir -->
                        <input type="hidden" name="txt_edit_dirname" value="<?= $dir_name ?>">
                        <?php echo "<br><h3>Imagenes Seleccionadas:</h3><br>";
                        $dir_selected = opendir("../../gallery/" . $dir_name);
                        while ($element_file = readdir($dir_selected)) {
                            if ($element_file != "." && $element_file != "..") {
                                echo " | " . $element_file . " | ---> ";
                                echo " <img class='img_table' src='../../gallery/" . $dir_name . "/" . $element_file . "' width='80' alt='imagen.jpg' srcset=''> ";
                            }
                        }

                        ?>

                    <?php
                    }
                    ?>
                </div>
            </div>

            <p class="message_new_item" id="message_new_item">

            </p>
            <div>
                <input class="btn_register_adminpanel" type="submit" name="action" value="Registrar" <?php if ($id_prod) {
                                                                                                            echo "disabled" . " style='display: none !important;'";
                                                                                                        } ?>>
                <input class="btn_edit_adminpanel" type="submit" name="action" value="Modificar" <?php if (!$id_prod) {
                                                                                                        echo "disabled" . " style='display: none !important;'";
                                                                                                    } ?>>
                <a href="catalogo" class="btn_backCat_adminpanel"><i class="fas fa-arrow-left"></i> Listar</a>
            </div>

        </form>
    </div>

    <script type="text/javascript" src="../../../assets/js/validation_admin.js"></script>

    <?php
    include("footer_web_admin/footer.php");
    ?>

<?php
} else {
    header('Location:login.php');
}

?>