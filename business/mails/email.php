<?php

    require("../../assets/PHPMAILER/src/PHPMAILER.php");

    require("../../assets/PHPMAILER/src/SMTP.php");

    class B_ContactEmail{

        private function sendContactEmail($name,$last_name,$cel,$user_email,$comment){

            $email = new PHPmailer();
            try {

                // $email->SMTPdEBUG = 0;
                $email->SMTPdEBUG = SMTP::DEBUG_SERVER;

                $email->isSMTP();

                $email->Host = "smtp.gmail.com";

                $email->SMTPAuth = true;

                $email->Username = "aldasi2000@hotmail.com";
                $email->Password = "Sanluis8";


                $email->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

                $email->Port = 587;

                $email->setFrom("aldasi2000@hotmail.com", $name . " " . $last_name);

                $email->addAddress("aldasi2000@hotmail.com");

                $email->Charset = "UTF-8";

                $email->isHTML(true);

                $email->Subject = utf8_decode("Consulta de Cliente";

                $email->Body = utf8_decode('Nombre del cliente: ' . $name . " " . $last_name . '<br>
                
                    Número de teléfono:' . $cel . '<br>
                    
                    Dirección de correo: ' . $user_email . '<br>
                    
                    Consulta: ' . $comment)

                $email->send();

               return true;

            } catch (Exception $e) {
                return false
            }

        }

    }