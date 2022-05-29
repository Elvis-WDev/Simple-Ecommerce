<?php
include_once(__DIR__. "../../models/crud_products.php");
include_once(__DIR__ . "../../models/crud_gallery.php");
$obj_crud_products = new crud_products();
$obj_crud_gallery = new crud_gallery();
// Funcion para crear un UUID Unico
function uuid_v4()
{
    return sprintf(
        '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',

        // 32 bits for "time_low"
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),

        // 16 bits for "time_mid"
        mt_rand(0, 0xffff),

        // 16 bits for "time_hi_and_version",
        // four most significant bits holds version number 4
        mt_rand(0, 0x0fff) | 0x4000,

        // 16 bits, 8 bits for "clk_seq_hi_res",
        // 8 bits for "clk_seq_low",
        // two most significant bits holds zero and one for variant DCE1.1
        mt_rand(0, 0x3fff) | 0x8000,

        // 48 bits for "node"
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff)
    );
}
?>

<?php
try {
    // Variables de uso complementario.
    $txt_id_product = trim((isset($_POST['txt_id_product'])) ? $_POST['txt_id_product'] : "");
    $txt_edit_dirname = trim((isset($_POST['txt_edit_dirname'])) ? $_POST['txt_edit_dirname'] : "");
    // Variables de uso global
    $combox_select = trim((isset($_POST['select'])) ? $_POST['select'] : "");
    $combox_category = trim((isset($_POST['select_category'])) ? $_POST['select_category'] : "");
    $combox_subcategory = trim((isset($_POST['select_subcategory'])) ? $_POST['select_subcategory'] : "");
    $txt_name_product = trim((isset($_POST['txt_name_product'])) ? $_POST['txt_name_product'] : "");
    $txt_price_product = trim((isset($_POST['txt_price_product'])) ? $_POST['txt_price_product'] : "");
    $txt_colours_product = trim((isset($_POST['txt_colours_product'])) ? $_POST['txt_colours_product'] : "");
    $txt_quantity_product = trim((isset($_POST['txt_quantity_product'])) ? $_POST['txt_quantity_product'] : "");
    $txt_pricesend_product = trim((isset($_POST['txt_pricesend_product'])) ? $_POST['txt_pricesend_product'] : "");
    $txt_tallastock_product = trim((isset($_POST['txt_tallastock_product'])) ? $_POST['txt_tallastock_product'] : "");
    $buttons = (isset($_POST['action'])) ? $_POST['action'] : "";
    $valid_massage_action = 0;

    switch ($buttons) {
            // <!-- Guardo el producto en la BD y almacena las imagenes que llegan. -->
        case "Registrar":

            $obj_crud_products->name_product = $txt_name_product;
            $select_valid = $obj_crud_products->select_product();
            if ($select_valid != null) {
                $valid_massage_action = 1; // 1 = "Ya existe este registro en la base de datos".
            } else {
                // Envío cada variable para empezar a realizar cualquier petición con la BD.
                $obj_crud_products->status_product = $combox_select;
                $obj_crud_products->id_category = $combox_category;
                $obj_crud_products->id_subcategory = $combox_subcategory;
                $obj_crud_products->name_product = $txt_name_product;
                $obj_crud_products->price_product = $txt_price_product;
                $obj_crud_products->colours_product = $txt_colours_product;
                $obj_crud_products->quantity_product = $txt_quantity_product;
                $obj_crud_products->price_send_product = $txt_pricesend_product;
                $obj_crud_products->size_stock_product = $txt_tallastock_product;
                $obj_crud_products->contact_num_product = "0983987321";


                // VALIDO Imagens antes de guardar
                if (trim(isset($_FILES['txt_img_product']))) {
                    $cant_files = count($_FILES['txt_img_product']['tmp_name']); // Cuento la cantidad de imagenes 
                    $allow_files = array("image/png", "image/jpg", "image/jpeg"); //Variable con array de extensiones permitidas.
                    $date = new DateTime(); //Obtengo fecha con ayuda de un objeto.
                    $name_dir_uuid = uuid_v4();
                    $dir_name = $date->getTimestamp() . "-" . $name_dir_uuid; //le agrego una fecha seguido del nombre del producto.
                    $valid_type_boolean = false; //Variable que me ayudará a gestionar cada una de las situaciones.
                    for ($y = 0; $y < $cant_files; $y++) { //Recorro desde 0 hasta la cantidad de archivos que llegan.
                        if (in_array($_FILES['txt_img_product']['type'][$y], $allow_files)) { //valido si cada archivo que llega cumple con las extensiones requeridas con ayuda de mi array antes declarado.
                        } else {
                            $valid_type_boolean = true; //Este valor determina que algun archivo no tiene la extensión requerida.
                        }
                    }
                    if ($valid_type_boolean == false) { //si los archivos cumplen con las extensiones establecidas continua la ejecución.

                        mkdir('../../gallery/' . $dir_name, 0775); //Creo un nuevo directorio con el nuevo nombre que llega.
                        if (is_dir('../../gallery/' . $dir_name)) {

                            for ($i = 0; $i < $cant_files; $i++) { // Itero hasta N cantidad de ficheros.

                                $file_name = ($_FILES['txt_img_product']['name'][$i] != "") ? $_FILES["txt_img_product"]["name"][$i] : "unknow_img.jpg"; //Dentro del iterador capturo el nombre de la N imagen.
                                $url_Img = $_FILES["txt_img_product"]["tmp_name"][$i]; //Obtengo la ruta temporal de la copia IMG.

                                if ($url_Img != "") { //Si la copia está cargada procedo a almacenarla en los ficheros.
                                    move_uploaded_file($url_Img, "../../gallery/" . $dir_name . "/" . $file_name); //Subo la copia del servidor hacia mis archivos locales de la N imagen.
                                }
                                if (file_exists("../../gallery/" . $dir_name . "/" . $file_name)) { //Si la imagen se subio correctamente a los archivos locales procedo a guardar en BD.
                                    $obj_crud_gallery->name_product = $txt_name_product; //Le asigno parametros a mi OBJ.
                                    $obj_crud_gallery->link_name_img =  $_FILES['txt_img_product']['name'][$i]; //Guardo la ruta exacta de mi archivo.
                                    $obj_crud_gallery->dir_name = $dir_name; //Almaceno el nombre del directorio donde se encuentra mi archivo guardado.
                                    $save_img_execute = $obj_crud_gallery->save_img(); //Envío petición a mi BD mediante una Función.

                                    if ($save_img_execute) { //Si se guardó correctamente me devuelve True.
                                        $valid_massage_action = 2; // "Los datos se han guardado correctamente";
                                    } else {
                                        $valid_massage_action = 3; // "Ha ocurrido un error al guardar los datos";
                                    };
                                } else {
                                    $valid_massage_action = 5; // "Ha ocurrido un error al guardar los archivos";
                                }
                            }
                            if ($valid_massage_action == 2) { //Si los Ficheros se guardaron correctamente guardo los datos del Porducto en mi BD.
                                $save_valid = $obj_crud_products->save(); //Envío la petición para guardar los datos.

                                if ($save_valid) { // Si se guardó corrctamente devuelve True. 
                                    $valid_massage_action = 2; // "Los datos se han guardado correctamente";
                                } else {
                                    $valid_massage_action = 3; // "Ha ocurrido un error al intentar guardar los datos.";
                                };
                            }
                        }
                    } else {
                        $valid_massage_action = 6; //Los archivos no cumplen con las extensiuones requeridas.
                    }
                }
            }
            break;
            // <!--FIN:------ Guardo el producto en la BD y almacena las imagenes que llegan.FIN:------ -->
            //***************************************************************************************************************************************
            //***************************************************************************************************************************************
            //***************************************************************************************************************************************
            //***************************************************************************************************************************************
            //***************************************************************************************************************************************
            // <!--Edito el producto en la BD y las imagenes que llegan.-->
        case "Modificar":
            $obj_crud_products->id_product = $txt_id_product;
            $obj_crud_products->status_product = $combox_select;
            $obj_crud_products->id_category = $combox_category;
            $obj_crud_products->id_subcategory = $combox_subcategory;
            $obj_crud_products->name_product = $txt_name_product;
            $obj_crud_products->price_product = $txt_price_product;
            $obj_crud_products->colours_product = $txt_colours_product;
            $obj_crud_products->quantity_product = $txt_quantity_product;
            $obj_crud_products->price_send_product = $txt_pricesend_product;
            $obj_crud_products->size_stock_product = $txt_tallastock_product;


            // VALIDO Imagens antes de guardar
            if (trim(isset($_FILES['txt_img_product']))) {
                $cant_files = count($_FILES['txt_img_product']['tmp_name']); // Cuento la cantidad de imagenes 
                $allow_files = array("image/png", "image/jpg", "image/jpeg"); //Variable con array de extensiones permitidas.
                $date = new DateTime(); //Obtengo fecha con ayuda de un objeto.
                $name_dir_uuid = uuid_v4(); // Obtengo un id único para mis directorios.
                $dir_name = $date->getTimestamp() . "-" . $name_dir_uuid; //le agrego una fecha seguido del nombre del producto.
                $valid_type_boolean = false; //Variable que me ayudará a gestionar cada una de las situaciones.
                for ($y = 0; $y < $cant_files; $y++) { //Recorro desde 0 hasta la cantidad de archivos que llegan.
                    if (in_array($_FILES['txt_img_product']['type'][$y], $allow_files)) { //valido si cada archivo que llega cumple con las extensiones requeridas con ayuda de mi array antes declarado.
                    } else {
                        $valid_type_boolean = true; //Este valor determina que algun archivo no tiene la extensión requerida.
                    }
                }
                if ($valid_type_boolean == false) { //si los archivos cumplen con las extensiones establecidas continua la ejecución.
                    $dir_todelete = '../../gallery/' . $txt_edit_dirname; //Variable que contiene la ruta del dira eliminar antes de crear uno nuevo.
                    $files = glob($dir_todelete . '/*'); //obtenemos todos los nombres de los ficheros
                    foreach ($files as $file) { //Recorro todos los archivos que están dentro de mi dir.
                        if (is_file($file)) // Pregunto si es un fichero.
                            unlink($file); //elimino el fichero.
                    }
                    rmdir($dir_todelete); //Después de eliminar todos los archivos de mi dir lo elimino.
                    // Elimino mi registro de los ficheros en mi BD.
                    $obj_crud_gallery->dir_name = $txt_edit_dirname;
                    $request_delete_gallery_edit = $obj_crud_gallery->delete_gallery();
                    if ($request_delete_gallery_edit) {
                        mkdir("../../gallery/" . $dir_name, 0775); //Teniendo los archivos ya listos procedo a crear un directorio que los contendrá.
                        for ($i = 0; $i < $cant_files; $i++) { // Itero hasta N cantidad de Imagenes

                            $file_name = ($_FILES['txt_img_product']['name'][$i] != "") ? $_FILES["txt_img_product"]["name"][$i] : "unknow_img.jpg"; //Dentro del iterador capturo el nombre de la N imagen.
                            $url_Img = $_FILES["txt_img_product"]["tmp_name"][$i]; //Obtengo la ruta temporal de la copia IMG.

                            if ($url_Img != "") { //Si la copia está cargada procedo a almacenarla en los ficheros.
                                move_uploaded_file($url_Img, "../../gallery/" . $dir_name . "/" . $file_name); //Subo la copia del servidor hacia mis archivos locales de la N imagen.
                            }
                            if (file_exists("../../gallery/" . $dir_name . "/" . $file_name)) { //Si la imagen se subio correctamente a los archivos locales procedo a guardar en BD.
                                $obj_crud_gallery->name_product = $txt_name_product; //Le asigno parametros a mi OBJ.
                                $obj_crud_gallery->link_name_img =  $_FILES['txt_img_product']['name'][$i]; //Guardo la ruta exacta de mi archivo.
                                $obj_crud_gallery->dir_name = $dir_name; //Almaceno el nombre del directorio donde se encuentra mi archivo guardado.
                                $save_img_execute = $obj_crud_gallery->save_img(); //Envío petición a mi BD mediante una Función.

                                if ($save_img_execute) { //Si se guardó correctamente me devuelve True.
                                    $valid_massage_action = 7; // "Los datos se han guardado correctamente";
                                } else {
                                    $valid_massage_action = 8; // "Ha ocurrido un error al guardar los datos";
                                };
                            } else {
                                $valid_massage_action = 9; // "Ha ocurrido un error al guardar los archivos";
                            }
                        }
                        if ($valid_massage_action == 7) { //Si los Ficheros se guardaron correctamente, modifico los datos del Porducto en mi BD.
                            $edit_valid = $obj_crud_products->edit(); //Envío la petición para modificar los datos.

                            if ($edit_valid) { // Si se modificó corrctamente devuelve True.
                                $valid_massage_action = 7; // "Los datos se han modificado correctamente";
                            } else {
                                $valid_massage_action = 8; // "Ha ocurrido un error al intentar modificar los datos.";
                            };
                        }
                    } else {
                        $valid_massage_action = 8; //Error al intentar editar: No se pudo editar los registros en la bd.;
                    }
                } else {
                    $valid_massage_action = 6; //Los archivos no cumplen con las extensiuones requeridas.
                }
            }
            break;
            // <!--FIN:------ Edito el producto en la BD y las imagenes que llegan.FIN:------ -->
            //***************************************************************************************************************************************
            //***************************************************************************************************************************************
            //***************************************************************************************************************************************
            //***************************************************************************************************************************************
            //***************************************************************************************************************************************
            // Código para eliminar algún registro.
        case "Eliminar":
            $id_prod_to_delete = trim((isset($_POST['id_prod_to_delete'])) ? $_POST['id_prod_to_delete'] : "");
            $dirname_prod_to_delete = trim((isset($_POST['txt_dirname_to_delete'])) ? $_POST['txt_dirname_to_delete'] : "");

            if ($id_prod_to_delete && $dirname_prod_to_delete) {
                $obj_crud_products->id_product = $id_prod_to_delete;
                $request_todelete = $obj_crud_products->delete_product();
                if ($request_todelete) {
                    $obj_crud_gallery->dir_name = $dirname_prod_to_delete;
                    $finalrequest = $obj_crud_gallery->delete_gallery();
                    if ($finalrequest) {
                        $dirtodelete = '../gallery/' . $dirname_prod_to_delete;
                        $files = glob($dirtodelete . '/*'); //obtenemos todos los nombres de los ficheros
                        foreach ($files as $file) {
                            if (is_file($file))
                                unlink($file); //elimino el fichero
                        }
                        rmdir($dirtodelete);
                        echo "Registro Eliminado";
                        header("Location:../views/admin/catalogo.php");
                    }
                } else {
                    echo "Error al eliminar";
                };
            }

            break;
    }




?>

<!-- Funcion para llevar datos hacia campos para editar el productos -->
<?php

    $id_product_to_newitem = trim((isset($_POST['id_product_from_table'])) ? $_POST['id_product_from_table'] : "");

    if ($id_product_to_newitem) {

        function data_edit_product($specific_data)
        {
            $obj_crud_products = new crud_products();
            $obj_crud_products->id_product = $_POST["id_product_from_table"];
            $items = $obj_crud_products->select_filter_to_productsedit();

            switch ($specific_data) {
                case "name":
                    return $items["name_product"];
                    break;
                case "id_status":
                    return $items["id_status"];
                    break;
                case "id_category":
                    return $items["id_category"];
                    break;
                case "id_subcategory":
                    return $items["id_subcategory"];
                    break;
                case "colour":
                    return $items["colours_product"];
                    break;
                case "price":
                    return $items["price_product"];
                    break;
                case "quantity":
                    return $items["quantity_product"];
                    break;
                case "price_send":
                    return $items["price_send_product"];
                    break;
                case "size_stock":
                    return $items["size_stock_product"];
                    break;
                case "dir_name":
                    return $items["dir_name"];
                    break;
            }
        }
    }
} catch (Exception $error) {
    echo 'Ha ocurrido un error interno: ' . $error;
}
?>