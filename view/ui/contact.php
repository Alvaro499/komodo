<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Contacto</title>
    <link rel="stylesheet" href="../assets/fonts_awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../css/normalize.css">
    <link rel="stylesheet" type="text/css" href="../css/contact.css">
    <link rel="stylesheet" type="text/css" href="../css/shared_styles/alerts.css">
</head>
<body>

    <div class="container">

        <div class="container_alert">
            <div class="alert alert_error">
                <div class="title_icon">
                    <i class="fas fa-exclamation-circle"></i>
                    <span class="title_alert"></span>
                </div>
                <span class="alert_info"></span>
                <button class="close_alert btn"><i class="fas fa-times"></i></button>
            </div>

            <div class="alert alert_success">
                <div class="title_icon">
                    <i class="fas fa-check"></i>
                    <span class="title_alert"></span>
                </div>
                <span class="alert_info"></span>
                <button class="close_alert btn"><i class="fas fa-times"></i></button>
            </div>
        </div>

        <header class="header_top_nav">

            <section class="menu_logo">

                <div class="box_logo">
                    <img src="../assets/logo/logo.png" alt="Logo de la pagina" class="logo">
                </div>
    
                <nav class="top_nav">
                    <button class="btn btn_menu"><i class="fas fa-bars"></i>Menú</button>
    
                    <ul class="menu">
                        <li><a href="../../index.php">Inicio</a></li>
                        <li><a href="gallery.php">Catálogo</a></li>
                        <li><a href="order.php">Pedidos</a></li>
                        <li><a href="contact.php">Contacto</a></li>
                    </ul>
                </nav>

            </section>

            <section class="banner">
                <h1>Formulario de contacto</h1>
                <p><strong>En komodo nos preocupamos por atender todas las dudas o consultas de nuestros. Por lo que mantener el contacto es nuestra prioridad</strong></p>
            </section>
        </header>


        <!-- FORMULARIO DE CONTACTO -->

        <div class="form_container">

            <div class="form_social_contact">

                <!-- action="business/mails/contact_email.php" method="POST" -->
                <form id="contact_form" >

                    <h3>Realiza cualquier consulta</h3>
                    
                    <label for="user_name">Nombre:</label>
                    <input type="text" id="user_name" name="user_name">
                    <div class="input_error name_error">*Escriba su nombre</div>
        
                    <label for="last_name">Apellidos:</label>
                    <input type="text" id="last_name" name="last_name">
                    <div class="input_error last_error">*Escriba ambos apellidos</div>
        
                    <label for="cel">Celular:</label>
                    <input type="tel" id="cel" name="cel">
                    <div class="input_error cel_error">*Indique su número de celular</div>

                    <label for="email">Correo electrónico:</label>
                    <input type="email" id="email" name="email">
                    <div class="input_error email_error">*Escriba su correo electrónico</div>

                    <label for="image">Selecciona al menos una imagen:</label>
                    <input type="file" id="image" name="file[]" multiple="true">
                    <div class="input_error img_error">*Solo se permiten enviar 4 imágenes como máximo, estas deben ser en formato PNG o JPG y menores a 15MB</div>

        
                    <label for="comment">Comentario:</label>
                    <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
                    <div class="input_error comment_error">*Escriba su consulta</div>
    
                    <input type="submit" name="submit" value="Enviar">
        
                </form>
                
                <!-- <hr> -->

                <section class="social_contact">

                    <div class="social contact">

                        <h4>Sígueme en redes sociales:</h4>
                        <ul>
                            <li><a href="https://www.facebook.com/alvaro.siles.716/" class="">
                                <i class="fab fa-facebook-square"></i>
                            </a></li>
    
                            <li><a href="" class="">
                                <i class="fab fa-instagram"></i>
                            </a></li>
                        </ul>
    
                    </div>
    
                    <div class="email contact">
                        <h4>Correo de contacto:</h4>
                        <ul>
                            <li><a href="mailto:alvarisiles499@gmail.com" class="">
                                <i class="fas fa-envelope-square"></i>
                                <span>komodocr@gmail.com</span>
                            </a></li>
                        </ul>
                    </div>

                    <div class="cel contact">
                        <h4>Teléfono de contacto:</h4>
                        <ul>
                            <li><a href="tel:+50662889872" class="">
                                <i class="fab fa-whatsapp"></i>
                                <span>6288-9872</span>
                            </a></li>
                        </ul>
                    </div>
    
                </section>

            </div>

        </div>

        <!-- FOOTER -->
        <footer>

            <p>2020 © Komodo. Todos los derechos reservados</p>

        </footer>

    </div>
    <script type="text/javascript" src="../js/responsive_menu.js"></script>
    <script type="module" src="../js/alerts.js"></script>
    <script type="module" src="../js/contact_validation.js"></script>
    <script type="module" src="../js/contact.js" ></script>
</body>
</html>