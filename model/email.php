<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require "../mc_assets/PHPMailer-master/src/Exception.php";
    require "../mc_assets/PHPMailer-master/src/PHPMailer.php";
    require "../mc_assets/PHPMailer-master/src/SMTP.php";

    class ContactEmail_model{

        function __construct(){
            // $this->email = new PHPMailer\PHPMailer\PHPMailer();
            $this->email = new PHPMailer();
        }
        function sendContactEmail($name,$last_name,$cel,$user_email,$comment){
            try {

                $this->email->SMTPDebug = SMTP::DEBUG_SERVER;

                $this->email->isSMTP();

                $this->email->Host = "smtp.gmail.com";

                $this->email->SMTPAuth = true;

                $this->email->Username = "aldasi2000@hotmail.com";
                $this->email->Password = "Sanluis8";


                $this->email->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

                $this->email->Port = 587;

                $this->email->setFrom("aldasi2000@hotmail.com", $name . " " . $last_name);

                $this->email->addAddress("aldasi2000@hotmail.com");

                $this->email->Charset = "UTF-8";

                $this->email->isHTML(true);

                $this->email->Subject = utf8_decode("Consulta de Cliente");

                $this->email->Body = utf8_decode('Nombre del cliente: ' . $name . " " . $last_name . '<br>
                
                    Número de teléfono:' . $cel . '<br>
                    
                    Dirección de correo: ' . $user_email . '<br>
                    
                    Consulta: ' . $comment);

                $this->email->send();

               return true;

            } catch (Exception $e) {
                echo $e . "Error al enviar el correo";
                return false;
                
            }

        }

    }