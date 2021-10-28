<?php
    require "../mc_assets/PHPMailer-master/src/PHPMailer.php";
    require "../mc_assets/PHPMailer-master/src/SMTP.php";
    require "../mc_assets/PHPMailer-master/src/Exception.php";

    use PHPMailer \ PHPMailer \ PHPMailer;
    use PHPMailer \ PHPMailer \ SMTP;
    use PHPMailer \ PHPMailer \ Exception;
    
    class ContactEmail_model{

        function __construct(){
            $this->email = new PHPMailer(true);
        }
        function sendContactEmail($name,$last_name,$cel,$user_email,$file,$path,$comment){
            try {

                $this->email->SMTPDebug = SMTP::DEBUG_SERVER;

                $this->email->isSMTP();

                // $this->email->Host = "smtp.gmail.com";
                $this->email->Host = "smtp.live.com";

                $this->email->SMTPAuth = true;

                $this->email->Username = "aldasi2000@hotmail.com";
                $this->email->Password = "Sanluis8";

                // $this->email->Username = "alvarosiles499@gmail.com";
                // $this->email->Password = "2552LuisSan";


                $this->email->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

                $this->email->Port = 587;

                $this->email->setFrom("aldasi2000@hotmail.com", $name . " " . $last_name);

                $this->email->addAddress("aldasi2000@hotmail.com");

                $this->email->AddEmbeddedImage("../view/assets/logo/logo.png", "logo", "../view/assets/logo/logo.png");
                
                $name;
                $last_name;
                $cel;
                $user_email;
                $file;
                $path;
                $comment;

                $email_obj = $this->email;

                function EmailConfig($email_obj,$name,$last_name,$cel,$user_email,$comment){
                    $email_obj->Charset = "UTF-8";

                    $email_obj->isHTML(true);

                    $email_obj->Subject = utf8_decode("Consulta de Cliente, Komodo");

                    $email_obj->Body = utf8_decode('
                    <body>
                        <div style="width:100%; padding: 25px 0">
                            <div style="width: 100%; text-align: center;">
                                <img style="width: 15%; object-fit: contain;" src="../assets/logo/logo.svg" alt="Logo">
                            </div>
                    
                            <table  width="100%" style="position: relative; margin-top: 25px;">
                                <tr><td style="position: absolute; z-index: 0; background: #E94A26; width: 100%; height: 75px;"></td></tr>
                                <tr>
                                    <td>
                                        <table width="90%" style="position: relative; z-index: 1; top: 50px; left: 50%; transform: translate(-50%,0); background: #ffffff; height: auto; box-shadow: 6px  10px 8px #000000; padding: 25px 2%;">
                                            <tbody>
                                                
                                                <tr>
                                                    <th colspan="2" style="position: relative; text-align: left; padding: 0 0 0 15px; border-bottom: 2px solid #000000;">
                                                        <h1>Detalles de la consulta...</h1>
                                                    </th>
                                                </tr>
                            
                                                <tr>
                                                    <td width="35%" style="font-size: 1.2rem; text-align: center; padding: 25px 0 15px 0;"><strong>Nombre del cliente:</strong></td>
                                                    <td width="65%" style="font-size: 1.2rem; text-align: center; padding: 25px 0 15px 0;">' . $name . " " . $last_name . '</td>
                                                </tr>
                            
                                                <tr>
                                                    <td width="35%" style="font-size: 1.2rem; text-align: center; padding: 15px 0"><strong>Dirección de correo electrónico:</strong></td>
                                                    <td width="65%" style="font-size: 1.2rem; text-align: center;" title="Haz click 3 veces rápidamente para responder este correo"><a style="cursor: cell; color:#0078D4; list-style:none;">' . $user_email . '</a></td>
                                                </tr>
                            
                                                <tr>
                                                    <td width="35%" style="font-size: 1.2rem; padding: 15px 0; text-align: center"><strong>Numero de telefono:</strong></td>
                                                    <td width="65%" style="font-size: 1.2rem; text-align: center;">' . $cel . '</td>
                                                </tr>
                            
                                                <tr>
                                                    <td width="35%" style="font-size: 1.2rem; text-align: center; padding: 15px 0 0 0"><strong>Consulta:</strong></td>
                                                    <td width="65%" style="font-size: 1.2rem; padding: 20px 0 25px 0; text-align: justify;">'. $comment . '</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr><td style="position: absolute; z-index: 0; background: #E94A26; width: 100%; height: 75px;"></td></tr>
                                
                            </table>
                        </div>
                    </body>');

                    $email_obj->send();
                    $email_obj->ClearAllRecipients();
                    return true;
                }
            
                if ( strlen($file[0]) == 0 ) {
                    EmailConfig($email_obj,$name,$last_name,$cel,$user_email,$comment);
                }else if( strlen($file[0]) != 0 ){
                    $count = 0;
                    foreach ($path as $paths) {
                        $this->email->AddAttachment($paths,$file[0]);
                        ++$count;
                    }
                    EmailConfig($email_obj,$name,$last_name,$cel,$user_email,$comment);
                }
                

            } catch (Exception $e) {
                echo $e . "Error al enviar el correo";
                return false;   
            }
        }
    }

    class OrderEmail_model{

        function __construct(){
            $this->email = new PHPMailer(true);
        }

        function sendOrderEmail($name,$surname_1,$surname_2,$cel,$email,$province,$canton,$district,$postal_code,$direction,$all_products){

            try {
                
                $this->email->SMTPDebug = 2;

                $this->email->isSMTP();

                // $this->email->Host = "smtp.gmail.com";
                $this->email->Host = "smtp.live.com";

                $this->email->SMTPAuth = true;

                $this->email->Username = "aldasi2000@hotmail.com";

                $this->email->Password = "Sanluis8";

                $this->email->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

                //RECORDAR CAMBIAR EL PUERTO CUANDO SE SUBA A UN SERVIDOR
                $this->email->Port = 587;

                $this->email->setFrom("aldasi2000@hotmail.com", "KOMODO");

                $this->email->addAddress($email);

                $this->email->Charset = "UTF-8";

                $this->email->isHTML(true);

                $this->email->AddEmbeddedImage("../view/assets/logo/logo.png", "logo", "../view/assets/logo/logo.png");

                //En el caso de ser traida por URL (almacenada en servidor), usar:
                    //->addStringAttachment(file_get_contents("url"), "filename");

                $this->email->Subject = utf8_decode("Solicitud de compra en Komodo.com:");

                $total_price = "";
                for ($i=0; $i <count($all_products) ; $i++) { 
                    $total_price += $all_products[0]->price;
                };

                //https://content-myemma-com.translate.goog/blog/css-in-html-emails-what-you-need-to-know-to-get-started?_x_tr_sl=en&_x_tr_tl=es&_x_tr_hl=es&_x_tr_pto=nui%2Csc
                

                $this->email->Body = utf8_decode('
                <body style="width: 100%;height: auto; padding: 0;margin: 0;">

                    <header style="width: auto; margin: 50px 2% 50px 2%; text-align: center; position: relative;">

                        <img src="cid:logo" alt="Logo" style="margin-bottom: 50px; width: 100%;height: 100px; object-fit: contain;">
        
                        <div style="width: 100%; text-align: center;">

                            <button
                            style="width: 50%; background: #E84A26; color: #ffffff;font-size: 1.2rem; padding: 0.8em 0.8em; outline: none;border: none;cursor: pointer;"
                            ><i class="fas fa-door-open" style="margin-right: 5px;"></i><a href="http://localhost/komodo_page/view/ui/" style="text-decoration: none;color: #ffffff;">Ir a la página</a></button>

                        </div>
        
                    </header>
                    
                    <section style="background: #EDEFF1; margin: 50px 10% 0 10%; padding: 25px 2%;">
                        <h1 style="text-align: center;font-size: 1.2rem; margin-bottom: 50px;">Solicitud de pedido</h1>
                        <strong>Estimado cliente:</strong>

                        <div style="text-align: justify;">
                            <p>Le agradacemos por su solicitud de compra en Komodo.com</p>
                            <p>A continuación encontrará el historial de su carrito de compras con todos los pedidos realizados. Recuerde guardar este correo en el caso de que sea necesario, como por ejemplo cancelar su solicitud de pedido.</p>
                            <br>
                            <strong>*NOTA IMPORTANTE: Recuerde que aún no se realizado la compra, nuestro personal debe ponerse en contacto para realizar el pago de sus productos</strong>
                        </div>
    
                    </section>
                
                    <table width="100%" style="margin: 50px 0; padding: 0 10%;">

                        <tbody style="text-align: center">

                            <tr>
                                <td colspan="2" style="background: #000000;color: #ffffff;font-size: 1rem;padding: 1em 0.5em; text-align: center;">Datos del cliente:</td>
                            </tr>
                            
                    
                            <tr style="text-align: center;">
                                <tr>
                                    <td style="padding: 2% 0;">Id de la solicitud:</td>
                                    <td style="padding: 2% 0;">3242323</td>
                                </tr>

                                <td colspan="2"><hr></td>
                    
                                <tr>
                                    <td style="padding: 2% 0;">Nombre completo del cliente:</td>
                                    <td style="padding: 2% 0;">' . $name . " " . $surname_1 . " " . $surname_2 . '</td>
                                </tr>

                                <td colspan="2"><hr></td>
                    
                                <tr>
                                    <td style="padding: 2% 0;">Número de celular:</td>
                                    <td style="padding: 2% 0;">' . $cel . '</td>
                                </tr>

                                <td colspan="2"><hr></td>
                    
                                <tr>
                                    <td style="padding: 2% 0;">Correo electrónico:</td>
                                    <td style="word-break: break-all; padding: 2% 0;">' . $email . '</td>
                                </tr>

                                <td colspan="2"><hr></td>
                    
                                <tr>
                                    <td style="padding: 2% 0;">Zona de residencia:</td>
                                    <td style="padding: 2% 0;">Provincia: ' . $province . ' - Canton: ' . $canton . ' - Distrito: ' . $district . '</td>
                                </tr>

                                <td colspan="2"><hr></td>
                    
                                <tr>
                                    <td style="padding: 2% 0;">Método de pago:</td>
                                    <td style="padding: 2% 0;">SYMPE</td>
                                </tr>
                            </tr>
                            
                        </tbody>
        
                    </table>


                    <table width="100%" style="margin: 50px 0; padding: 0 12%;">

                        <tbody style="text-align: center">

                            <tr width="100%">
                                <td width="75%" style="background: #000000;color: #ffffff;font-size: 1rem;padding: 1em 0.5em;">Detalles del pedido:</td>
                                <td width="25%" style="background: #000000;color: #ffffff;font-size: 1rem;padding: 1em 0.5em;">Precio:</td>
                            </tr>

                            <tr>');

                                for ($i=0; $i <count($all_products); $i++) { 
                                    $this->email->Body.=utf8_decode('

                                    <tr>
                                        <td style="padding: 2% 0;"><strong>ID del producto: </strong>' . $all_products[$i]->id . ' <br><br><strong>Nombre producto: </strong>' . $all_products[$i]->product_name . '</td>
                                        <td style="padding: 2% 0;">' . $all_products[$i]->price . '</td>
                                    </tr>

                                    <tr><td colspan="2"><hr></td></tr>');
                                }
                                $this->email->Body.=utf8_decode('
                            </tr>

                            <tr>
                                <td width="75%" style="background: #000000;color: #ffffff; font-size: 1rem; padding: 1em 0.5em;">Total del pedido:</td>
                                <td width="25%"><strong>' . $total_price . '</strong></td>
                            </tr>

                        </tbody>

                    </table>
                
                    <section style="width: auto; background: #EDEFF1; margin:50px 10% 0 10%; padding: 1% 5%;">
                        <p style="text-align:justify">Si tiene alguna consulta o duda, por favor comunicarse por cualquiera de los siguiente medios:</p>
                        <ul style="list-style: none; cursor: pointer; padding: 0; text-align: center;">
                            <li style="margin-bottom: 20px;"><a href="tel:+50662889872">Número de celular: 6288-9872</a></li>
                            <li><a href="mailto:alvarosiles499@gmail.com">Correo electrónico: komodocr@gmail.com</a></li>
                        </ul>

                        <p style="text-align:justify">Por favor no responda a este correo ya que es generado automáticamente desde un sistema de envíos. Si desea comunicarse con nosotros, por favor utilice alguno de los medios indicados arriba.</p>
                        <p style="text-align: right;"><strong>¡Agradecemos su preferencia!</strong></strong></p>
                    </section>

                </body>');

                $this->email->send();
                $this->email->ClearAllRecipients();
                //Elimina asuntos, el correo de destino, cc, bc

                // $this->email->ClearAddresses();
                //Elimina solamente los correos de destino

               return true;

            } catch (Exception $e) {
                echo $e . "Error al enviar el correo";
                return false;
            }
        }





        function sendOrderEmailToKomodo($name,$surname_1,$surname_2,$cel,$email,$province,$canton,$district,$postal_code,$direction,$order_date,$order_hour,$all_products){

            try {
                
                $this->email->SMTPDebug = 2;

                $this->email->isSMTP();

                // $this->email->Host = "smtp.gmail.com";
                $this->email->Host = "smtp.live.com";

                $this->email->SMTPAuth = true;

                $this->email->Username = "aldasi2000@hotmail.com";

                $this->email->Password = "Sanluis8";

                $this->email->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

                //RECORDAR CAMBIAR EL PUERTO CUANDO SE SUBA A UN SERVIDOR
                $this->email->Port = 587;

                $this->email->setFrom("aldasi2000@hotmail.com", "KOMODO: Solicitud de pedido");

                $this->email->addAddress("aldasi2000@hotmail.com");

                $this->email->Charset = "UTF-8";

                $this->email->isHTML(true);

                $this->email->AddEmbeddedImage("../view/assets/logo/logo.png", "logo", "../view/assets/logo/logo.png");

                //En el caso de ser traida por URL (almacenada en servidor), usar:
                    //->addStringAttachment(file_get_contents("url"), "filename");

                $this->email->Subject = utf8_decode("Solicitud de compra en Komodo.com:");

                $total_price = "";
                for ($i=0; $i <count($all_products) ; $i++) { 
                    $total_price += $all_products[0]->price;
                };

                //https://content-myemma-com.translate.goog/blog/css-in-html-emails-what-you-need-to-know-to-get-started?_x_tr_sl=en&_x_tr_tl=es&_x_tr_hl=es&_x_tr_pto=nui%2Csc
                

                $this->email->Body = utf8_decode('
                <body style="width: 100%;height: 100%; padding: 0;margin: 0;">

                    <header style="width: auto; margin: 50px 5% 50px 5%; text-align: center; position: relative;">

                        <img src="cid:logo" alt="Logo" style="margin-bottom: 50px; width: 100%;height: 100px; object-fit: contain;">
        
                        <div style="width: 100%; text-align: center;">

                            <button
                            style="width: 55%; background: #E84A26; color: #ffffff;font-size: 1.2rem; padding: 1em 1em; outline: none;border: none;cursor: pointer;"
                            ><i class="fas fa-door-open" style="margin-right: 5px;"></i><a href="http://localhost/komodo_page/view/ui/" style="text-decoration: none;color: #ffffff;">Ir a la página</a></button>

                        </div>
        
                    </header>
                    
                    <section style="background: #EDEFF1; margin: 50px 10% 0 10%; padding: 25px 5%;">
                        <h1 style="text-align: center;font-size: 1.2rem; margin-bottom: 50px;">Solicitud de pedido</h1>
                        Detalles de pedido realizada por ' . $name . " " . $surname_1 . " " . $surname_2 . '
                    </section>
                
                    <table width="100%" style="margin: 50px 0; padding: 0 8%;">

                        <tbody style="text-align: center">

                            <tr>
                                <td colspan="2" style="background: #000000;color: #ffffff;font-size: 1rem;padding: 1em 0.5em; text-align: center;">Datos del cliente:</td>
                            </tr>
                            
                    
                            <tr style="text-align: center;">
                                <tr>
                                    <td style="padding: 2% 0;">Id de la solicitud:</td>
                                    <td style="padding: 2% 0;">3242323</td>
                                </tr>

                                <td colspan="2"><hr></td>
                    
                                <tr>
                                    <td style="padding: 2% 0;">Nombre completo del cliente:</td>
                                    <td style="padding: 2% 0;">' . $name . " " . $surname_1 . " " . $surname_2 . '</td>
                                </tr>

                                <td colspan="2"><hr></td>
                    
                                <tr>
                                    <td style="padding: 2% 0;">Número de celular:</td>
                                    <td style="padding: 2% 0;">' . $cel . '</td>
                                </tr>

                                <td colspan="2"><hr></td>
                    
                                <tr>
                                    <td style="padding: 2% 0;">Correo electrónico:</td>
                                    <td style="word-break: break-all; padding: 2% 0;">' . $email . '</td>
                                </tr>

                                <td colspan="2"><hr></td>

                                <tr>
                                    <td style="padding: 2% 0;">Zona de residencia:</td>
                                    <td style="word-break: break-all; padding: 2% 0;">Provincia: ' . $province . ' - Canton: ' . $canton . ' - Distrito: ' . $district . '</td>
                                </tr>

                                <td colspan="2"><hr></td>

                                <tr>
                                    <td style="padding: 2% 0;">Dirección para la entrega:</td>
                                    <td style="padding: 2% 0;">' . $direction . '</td>
                                </tr>

                                <td colspan="2"><hr></td>

                                <tr>
                                    <td style="padding: 2% 0;">Código postal:</td>
                                    <td style="padding: 2% 0;">' . $postal_code . '</td>
                                </tr>

                                <td colspan="2"><hr></td>

                                <tr>
                                    <td style="padding: 2% 0;">Método de pago:</td>
                                    <td style="padding: 2% 0;">SYMPE</td>
                                </tr>

                                <td colspan="2"><hr></td
                    
                            </tr>
                            
                        </tbody>
        
                    </table>


                    <table width="100%" style="margin: 50px 0; padding: 0 12%;">

                        <tbody style="text-align: center">

                            <tr width="100%">
                                <td width="75%" style="background: #000000;color: #ffffff;font-size: 1rem;padding: 1em 0.5em;">Detalles del pedido:</td>
                                <td width="25%" style="background: #000000;color: #ffffff;font-size: 1rem;padding: 1em 0.5em;">Precio:</td>
                            </tr>

                            <tr>');

                                for ($i=0; $i <count($all_products); $i++) { 
                                    $this->email->Body.=utf8_decode('

                                    <tr>
                                        <td style="padding: 2% 0;"><strong>ID del producto: </strong>' . $all_products[$i]->id . ' <br><br><strong>Nombre producto: </strong>' . $all_products[$i]->product_name . '</td>
                                        <td style="padding: 2% 0;">' . $all_products[$i]->price . '</td>
                                    </tr>

                                    <tr><td colspan="2"><hr></td></tr>');
                                }
                                $this->email->Body.=utf8_decode('
                            </tr>

                            <tr>
                                <td width="75%" style="background: #000000;color: #ffffff; font-size: 1rem; padding: 1em 0.5em;">Total del pedido:</td>
                                <td width="25%"><strong>' . $total_price . '</strong></td>
                            </tr>

                        </tbody>

                    </table>


                    <section style="background: #EDEFF1; margin: 50px 10% 0 10%; padding: 25px 5%;">
                        <h2>Fecha y hora de la solicitud:</h2>

                        <div style="text-align: justify;">
                            <p>La solicitud del pedido se realizó en la fecha <strong>' . $order_date . '</strong> a las <strong>' . $order_hour .'</strong></p>
                            
                            <br>
                            <strong>*La fecha y hora son basadas en el horario estandar central GMT-0600</strong>
                        </div>
    
                    </section>
                </body>');

                $this->email->send();

               return true;

            } catch (Exception $e) {
                echo $e . "Error al enviar el correo";
                return false;
            }

        }
    }