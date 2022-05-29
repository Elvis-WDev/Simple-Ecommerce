<?php
include("../models/crud_clients.php");
$obj_crud_clients = new crud_clients();
date_default_timezone_set('America/Guayaquil');

$ip_actually = $_SERVER['REMOTE_ADDR'];

$obj_crud_clients->ip_address = $ip_actually;
$numRows = $obj_crud_clients->select_ip();

if ($numRows == 0) {
    $obj_crud_clients->ip_address = $ip_actually;
    $numRows = $obj_crud_clients->save_client_ip();
} else {

    $obj_crud_clients->ip_address = $ip_actually;
    $numRows = $obj_crud_clients->select_ip_data();
    $registeredDate = $numRows['dateOfRegister'];
    $actuallyDate = date('Y-m-d H:i:s');
    $actuallyDate = strtotime($actuallyDate . '- 1 hour');
    $actuallyDate = date('Y-m-d H:i:s', $actuallyDate);
    $NewDate = strtotime($registeredDate . '+ 10 minutes');
    $NewDate = date('Y-m-d H:i:s', $NewDate);
   
    if ($actuallyDate >= $NewDate) {
        
        $obj_crud_clients->ip_address = $ip_actually;
        $numRows = $obj_crud_clients->save_client_ip();
    } else {
        
    }
}
