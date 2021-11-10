<?php

define('SITE_ROOT', __DIR__);
echo constant("SITE_ROOT");
//Ques es define()
    // Es un constante predefinida de php, que lo que hace es devolver el directorio donde se encuentra el script por ejemplo imagina de en tu maquina tienes un script de php en la ruta /var/www/html/index.php, si en es fichero utilizas la constante predefinida DIR te estaría devolviendo /var/www/html/.



//__DIR__

    /*Los enlaces de Internet están formados por una serie de rutas (también conocidos con el término inglés ‘path’), donde se le indica la dirección a la que tiene que ir el navegador cuando pulsamos sobre ese link. Nos podemos encontrar dos tipos de rutas distintas:

    - Ruta absoluta: Incluye el nombre del dominio.

    Ejemplo: ‘https://www.hostalia.com/contratacion/openxchange/’

    -Ruta relativa: Sólo indica el orden de directorios.

    Ejemplo: ‘/contratacion/openxchange/’
*/


echo __DIR__;
//Devuelve la ruta completa del script actual
//C:\xampp\htdocs\komodo_page\controller

echo "<br>";

echo $_SERVER['DOCUMENT_ROOT'];
//Devuelve la ruta donde se ubica la carpeta del proyecto:
//C:/xampp/htdocs

echo "<br>";

echo get_include_path();
//Devuelve la ruta donde se ubica la extension PEAR de php
//C:\xampp\php\PEAR

echo"<br>";

echo realpath($_SERVER["DOCUMENT_ROOT"]);

echo"<br>";

echo dirname(__FILE__);
//Devuelve la ruta completa del script actual
//C:\xampp\htdocs\komodo_page\controller

echo"<br>";

//En PHP se recomienda usar mas __DIR__ ya que devuelve la ruta real (actualizada sin importar el dominion) con enlaces simbólicos resueltos.
