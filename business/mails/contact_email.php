<?php
    require("email.php");

    $send_email = new B_ContactEmail();

    $name = $_POST["user_name"];
    $last_name = $_POST["last_name"];
    $cel = $_POST["cel"];
    $user_email = $_POST["email"];
    $comment = $_POST["comment"];

    $sended_email = $send_email->sendContactEmail($name,$last_name,$cel,$user_email,$comment);

    if($sended_email) {
        echo 0;
    }else{
        echo 1;
    }