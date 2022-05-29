<?php
include_once(__DIR__ . "../../conecction/bd_connect.php");
?>

<?php

class crud_clients
{
    public $id_client;
    public $ip_address;

    function save_client_ip()
    {
        $connect = new bd_connect();
        $consult = $connect->prepare("INSERT INTO clients(ip_address, dateOfRegister) VALUES(:ip_address, now())");
        $consult->bindparam(":ip_address", $this->ip_address, PDO::PARAM_STR);
        return $consult->execute();
    }
    function select_ip()
    {
        $connect = new bd_connect();
        $consult = $connect->prepare("SELECT * FROM clients WHERE ip_address = :ip_address ORDER BY id_client desc");
        $consult->bindparam(":ip_address", $this->ip_address, PDO::PARAM_STR);
        $consult->execute();
        $count_client_ip = $consult->rowCount();
        return $count_client_ip;
    }

    function select_ip_data()
    {
        $connect = new bd_connect();
        $consult = $connect->prepare("SELECT * FROM clients WHERE ip_address = :ip_address ORDER BY id_client desc");
        $consult->bindparam(":ip_address", $this->ip_address, PDO::PARAM_STR);
        $consult->execute();
        $data_client_ip = $consult->fetch(PDO::FETCH_ASSOC);
        return $data_client_ip;
    }

    function select_count_visits()
    {
        $connect = new bd_connect();
        $consult = $connect->prepare("SELECT * FROM clients");
        $consult->execute();
        $count_visits = $consult->rowCount();
        return $count_visits;
    }
}

?>