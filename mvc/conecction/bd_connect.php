<?php
class bd_connect extends PDO
{
   private $base_type = 'mysql';
   private $host = 'localhost';
   private $bd_name = 'simple-ecomerce';
   private $user = 'elvis';
   private $password = 'minecraft7';
   // private $host = 'sql208.epizy.com';
   // private $bd_name = 'epiz_30905542_app_shop_web	';
   // private $user = 'epiz_30905542';
   // private $password = 'GahXNZmBBPMNd';
   public function __construct()
   {
      //Sobreescribo el metodo constructor de la clase PDO.
      try {
         parent::__construct("{$this->base_type}:dbname={$this->bd_name};host={$this->host};", $this->user, $this->password);
      } catch (PDOException $e) {
         echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
         exit;
      }
   }
}
