<?php
include("../../models/crud_users.php");
session_start();
?>


<?php

$txt_user_name = (isset($_POST['txt_register_name'])) ? $_POST['txt_register_name'] : "";
$txt_user_lastname = (isset($_POST['txt_register_lastname'])) ? $_POST['txt_register_lastname'] : "";
$user_mail = (isset($_POST['txt_register_mail'])) ? $_POST['txt_register_mail'] : "";
$select_mail = (isset($_POST['select'])) ? $_POST['select'] : "select";
$txt_mail_user = $user_mail . $select_mail;
$txt_user_password = (isset($_POST['txt_register_password'])) ? $_POST['txt_register_password'] : "";
$txt_user_date = (isset($_POST['txt_register_date'])) ? $_POST['txt_register_date'] : "";
$txt_user_sex = (isset($_POST['select_2'])) ? $_POST['select_2'] : "";
$buttons = (isset($_POST['action'])) ? $_POST['action'] : "";
$txt_valid_inputregister = 0;
if ($buttons == "Registrar") {
    $crud_users = new crud_users();
    $crud_users->mail_user = trim($txt_mail_user);
    $crud_users->password_user = trim($txt_user_password);

    $temp = $crud_users->select_user_noregister();

    if ($temp == null) {
        $crud_users->name_user = trim($txt_user_name);
        $crud_users->lastname_user = trim($txt_user_lastname);
        $crud_users->mail_user = trim($txt_mail_user);
        $crud_users->password_user = trim($txt_user_password);
        $crud_users->date_user = trim($txt_user_date);
        $crud_users->sex_user = trim($txt_user_sex);

        $request = $crud_users->save();
        if ($request == true) {
            $txt_valid_inputregister = 1;
        } else {
            $txt_valid_inputregister = 2;
        };
    } else {
        $txt_valid_inputregister = 3;
    };
};
if ($buttons == "Ingresar") {
    $txt_login_user = (isset($_POST['txt_login_user'])) ? $_POST['txt_login_user'] : "";
    $txt_login_password = (isset($_POST['txt_login_password'])) ? $_POST['txt_login_password'] : "";

    $crud_users = new crud_users();
    $crud_users->mail_user = trim($txt_login_user);
    $crud_users->password_user = trim($txt_login_password);

    $temp = $crud_users->select_user_register();
    if ($temp != null) {
        $_SESSION['username'] = $temp['name_user'] . ' ' . $temp['lastname_user'];
        header("Location:admin_panel.php");
    } else {
        $txt_valid_inputregister = 4;
    };
};

?>

<?php



?>