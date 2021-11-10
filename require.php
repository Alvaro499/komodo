<?php
require_once __DIR__ . "/mc_assets/PHPMailer-master/src/PHPMailer.php";
require_once __DIR__ . "/mc_assets/PHPMailer-master/src/SMTP.php";
require_once __DIR__ . "/model/db.php";
require_once __DIR__ . "/model/get_products.php";
$obj_conection = new Conexion_model();
$products_controller = new Products_model();