<?php
include_once("../../conecction/bd_connect.php");
?>

<?php

class crud_users
{
    public $id_user;
    public $name_user;
    public $lastname_user;
    public $mail_user;
    public $password_user;
    public $date_user;
    public $sex_user;

    function save()
    {

        $connect = new bd_connect();
        $consult = $connect->prepare("INSERT INTO users(name_user, lastname_user, mail_user, password_user, date_user, sex_user)VALUES(:name_u, :lastname_u, :mail_u, :password_u, :date_u, :sex_u);");
        $consult->bindparam(":name_u", $this->name_user, PDO::PARAM_STR);
        $consult->bindparam(":lastname_u", $this->lastname_user, PDO::PARAM_STR);
        $consult->bindparam(":mail_u", $this->mail_user, PDO::PARAM_STR);
        $consult->bindparam(":password_u", $this->password_user, PDO::PARAM_STR);
        $consult->bindparam(":date_u", $this->date_user, PDO::PARAM_STR);
        $consult->bindparam(":sex_u", $this->sex_user, PDO::PARAM_STR);

        return $consult->execute();
    }

    function select_user_noregister()
    {
        $connect = new bd_connect();
        $consult = $connect->prepare("SELECT * FROM users WHERE mail_user = :mail_u");
        $consult->bindparam(":mail_u", $this->mail_user, PDO::PARAM_STR);
        $consult->execute();
        $user_one = $consult->fetch(PDO::FETCH_ASSOC);
        return $user_one;
    }

    function select_user_register()
    {
        $connect = new bd_connect();
        $consult = $connect->prepare("SELECT * FROM users WHERE mail_user = :mail_u AND password_user = :password_u");
        $consult->bindparam(":mail_u", $this->mail_user, PDO::PARAM_STR);
        $consult->bindparam(":password_u", $this->password_user, PDO::PARAM_STR);
        $consult->execute();
        $user_one = $consult->fetch(PDO::FETCH_ASSOC);
        return $user_one;
    }
}

?>
