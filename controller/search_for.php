<?php
include __DIR__ . "../../require.php";

$result;
$cont;
if ( isset($_GET["color"]) ) {

    $keyword = $_GET["color"];
    
    if ($keyword == "reset") {
        $result = $products_controller->getProduct();

    }else{
        $result = $products_controller->getProductByBtn($keyword);
    }
    
}else if (isset($_GET["keyword"])) {
    
    $keyword = $_GET["keyword"];
    $result = $products_controller->getProductBySearch($keyword);
}else{
    $result = $products_controller->getProduct();
}

$cont = count($result);
$cont = $cont == 0 ? $cont = "Lo sentimos, por el momento no disponemos de pulseras con estas características o similares." : $cont = "Has llegado hasta el final, pero pronto tendremos nuevos modelos...";
// https://stackoverflow.com/questions/35969974/foreach-is-not-a-function-error-with-javascript-array
//https://stackoverflow.com/questions/23740548/how-do-i-pass-variables-and-data-from-php-to-javascript
//https://stackoverflow.com/questions/12783737/how-to-use-setinterval-in-php
