<?php
include_once("../../conecction/bd_connect.php");
?>

<?php

class crud_category
{
    public $id_category;
    public $name_category;

    function select_category()
    {
        $connect = new bd_connect();
        $consult = $connect->prepare("SELECT * FROM category");
        $consult->execute();
        $listCategory = $consult->fetchall(PDO::FETCH_ASSOC);
        return $listCategory;
    }
}

?>
