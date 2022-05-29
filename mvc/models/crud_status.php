<?php
include_once("../../conecction/bd_connect.php");
?>

<?php

class crud_status
{
    public $id_status;
    public $name_status;

    function select_status()
    {
        $connect = new bd_connect();
        $consult = $connect->prepare("SELECT * FROM status");
        $consult->execute();
        $listStatus = $consult->fetchall(PDO::FETCH_ASSOC);
        return $listStatus;
    }
}

?>
