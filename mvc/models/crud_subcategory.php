<?php
include_once(__DIR__ . "../../conecction/bd_connect.php");
?>

<?php

class crud_subcategory
{
    public $id_subcategory;
    public $id_category;
    public $name_subcategory;

    function select_subcategory()
    {
        $connect = new bd_connect();
        $consult = $connect->prepare("SELECT * FROM subcategory WHERE id_category=:id_category");
        $consult->bindparam(":id_category", $this->id_category, PDO::PARAM_STR);
        $consult->execute();
        $listSubcategory = $consult->fetchall(PDO::FETCH_ASSOC);
        return $listSubcategory;
    }
    function select_one_subcategory()
    {
        $connect = new bd_connect();
        $consult = $connect->prepare("SELECT * FROM subcategory WHERE id_subcategory=:id_subcategory");
        $consult->bindparam(":id_subcategory", $this->id_subcategory, PDO::PARAM_STR);
        $consult->execute();
        $oneSubcategory = $consult->fetch(PDO::FETCH_ASSOC);
        return $oneSubcategory;
    }
}

?>
