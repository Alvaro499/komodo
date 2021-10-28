<?php
session_start();
if (isset($_SESSION["order_products"])) {
    echo "La variable de sesion ha sido creada, pero debe ser actualizada";
    $_SESSION["order_products"] = json_decode($_POST["arr_products"]);
}else{
    echo "Sesion no definida";
    $_SESSION["order_products"] = json_decode($_POST["arr_products"]);
}