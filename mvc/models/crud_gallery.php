<?php
include_once(__DIR__ . "../../conecction/bd_connect.php");
?>

<?php

class crud_gallery
{
    public $id_gallery;
    public $name_product;
    public $link_name_img;
    public $dir_name;

    function save_img()
    {
        $connect = new bd_connect();
        $consult = $connect->prepare("INSERT INTO gallery(name_product, link_name_img, dir_name) VALUES(:name_prod, :link_name_img, :dir_name)");
        $consult->bindparam(":name_prod", $this->name_product, PDO::PARAM_STR);
        $consult->bindparam(":link_name_img", $this->link_name_img, PDO::PARAM_STR);
        $consult->bindparam(":dir_name", $this->dir_name, PDO::PARAM_STR);
        return $consult->execute();
    }
    function select_img()
    {
        $connect = new bd_connect();
        $consult = $connect->prepare("SELECT * FROM gallery WHERE name_product = ':name_prod'");
        $consult->bindparam(":name_prod", $this->name_product, PDO::PARAM_STR);
        $consult->execute();
        $listImg = $consult->fetchall(PDO::FETCH_ASSOC);
        return $listImg;
    }
    function delete_gallery()
    {
        $connect = new bd_connect();
        $consult = $connect->prepare('DELETE FROM gallery WHERE dir_name=:dirname_gallery;');
        $consult->bindparam(":dirname_gallery", $this->dir_name, PDO::PARAM_STR);
        return $consult->execute();
    }
}

?>
