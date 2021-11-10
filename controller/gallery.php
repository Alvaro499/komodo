<?php
// echo __DIR__;
//Devuelve la ruta completa del script actual
//C:\xampp\htdocs\komodo_page\controller

// echo "<br>";

// echo $_SERVER['DOCUMENT_ROOT'];
//Devuelve la ruta donde se ubica la carpeta del proyecto:
//C:/xampp/htdocs

// echo "<br>";

// echo get_include_path();
//Devuelve la ruta donde se ubica la extension PEAR de php
//C:\xampp\php\PEAR

// echo"<br>";

// echo realpath($_SERVER["DOCUMENT_ROOT"]);

// echo"<br>";

// echo dirname(__FILE__);
//Devuelve la ruta completa del script actual
//C:\xampp\htdocs\komodo_page\controller

// echo"<br>";

//En PHP se recomienda usar mas __DIR__ ya que devuelve la ruta real (actualizada sin importar el dominion) con enlaces simbólicos resueltos.



include __DIR__ . "../../require.php";

$array_products = $products_controller->getProduct();
// var_dump($array_products);