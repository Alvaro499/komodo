<?php
session_start();
    var_dump($_SESSION["order_products"]);

    echo "<br>";
    
    require_once("../model/email.php");
    echo "Proando probando";
    $order_email_model = new OrderEmail_model();

    try {        
        $name = $_POST["name"];
        $surname_1 = $_POST["surname_1"];
        $surname_2 = $_POST["surname_2"];
        $cel = $_POST["cel"];
        $email = $_POST["email"];
        $province = $_REQUEST["province"];
        $canton = $_REQUEST["canton"];
        $district = $_REQUEST["district"];
        $postal_code = $_POST["postal_code"];
        $direction = $_POST["direction"];
        $order_date = $_POST["order_date"];
        $order_hour = $_POST["order_hour"];

        echo $order_hour;
        echo "<br>" . $order_date;

        $all_products = $_SESSION["order_products"];

        if( (empty($name) || empty($surname_1) || empty($surname_2) || empty($cel)) || empty($email) || empty($province) || empty($canton) || empty($district) || empty($postal_code) || empty($direction) ){
            
            echo "Error al enviar solictud para pedido";
        }else{

            if ($order_email_model->sendOrderEmail($name,$surname_1,$surname_2,$cel,$email,$province,$canton,$district,$postal_code,$direction,$all_products) && $order_email_model->sendOrderEmailToKomodo($name,$surname_1,$surname_2,$cel,$email,$province,$canton,$district,$postal_code,$direction,$order_date,$order_hour,$all_products)) {
                
                echo "El pedido ha sido enviado con exito";
                $_SESSION["order_products"] = "";
                //Cuando se realice el pedido, reiniciar la sesion para que cuando sea creada la nueva en new)order.php este disponible ya actualizada aqui
            }else{
                echo "Error al enviar pedidod";
            }
        }
    } catch (Exception $e) {
        echo $e;
    }