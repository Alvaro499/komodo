<?php

require("view/ui/assets/PHPMailer-master/src/PHPMailer.php");
require("view/ui/assets/PHPMailer-master/src/SMTP.php");
require("model/db.php");
require("model/get_productos.php");
require("");

$conexion_model new Conexion_model();
$products_controller = new Products_controller();

