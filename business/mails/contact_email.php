<?php

    require("email.php");

    $send_email = new B_ContactEmail();

    $name = $POST["user_name"];
    $last_name = $POST["last_name"];
    $cel = $POST["cel"];
    $user_email = $POST["email"];
    $comment = $POST["comment"];

    $sended_email = $send_email -> sendContactEmail($name,$last_name,$cel,$user_email,$comment)

    if ($sended_email == true) {
        echo 0
    }else{
        echo 1
    }