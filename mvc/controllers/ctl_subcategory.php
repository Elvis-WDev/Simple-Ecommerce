<?php
include_once(__DIR__ . "../../models/crud_subcategory.php");
$obj_crud_subcategory = new crud_subcategory();
?>
<!-- LLenado de Combox -->
<?php
$id_category_post = (isset($_POST['id_category'])) ? $_POST['id_category'] : "";
if ($id_category_post) {
    $obj_crud_subcategory->id_category = $id_category_post;
    $valid_execute_sql = $obj_crud_subcategory->select_subcategory();
    $html = "<option value='0'>--seleccionar--</option>";
    foreach ($valid_execute_sql as $items_subcategory_filter) {
        $html = $html . "<option value=" . $items_subcategory_filter['id_subcategory'] . ">" . $items_subcategory_filter['name_subcategory'] . "</option>";
    }
    echo $html;
}

if ($id_category_post == 0) {
    $html = "<option value='0'>--seleccionar--</option>";
    echo $html;
}


?>
<!-- Fin LLenado de Combox -->