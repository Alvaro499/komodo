<?php
    require("../model/email.php");

    $send_email = new ContactEmail_model();

    $name = $_POST["user_name"];
    $last_name = $_POST["last_name"];
    $cel = $_POST["cel"];
    $user_email = $_POST["email"];
    $comment = $_POST["comment"];
    $file = $_FILES["file"]["name"];
    $path = $_FILES["file"]["tmp_name"];

    $sended_email = $send_email->sendContactEmail($name,$last_name,$cel,$user_email,$file,$path,$comment);

    if($sended_email) {
        echo 0;
        //Exito al enviar correo
    }else{
        echo 1;
        //Error al enviar correo
    }