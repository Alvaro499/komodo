<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
    <link rel="stylesheet" href="../assets/fonts_awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../css/normalize.css">
    <link rel="stylesheet" type="text/css" href="../css/order.css">
    <link rel="stylesheet" type="text/css" href="../css/shared_styles/footer_bridge.css">
    <link rel="stylesheet" type="text/css" href="../css/shared_styles/alerts.css">
</head>
<body>
    <div class="container">

        <!-- ALERTAS -->
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



        <!-- CABECERA -->
        <header class="header_top_nav">

            <section class="menu_logo">

                <div class="box_logo">
                    <img src="../assets/logo/logo.svg" alt="Logo de la pagina" class="logo">
                </div>
    
                <nav class="top_nav">
                    <button class="btn btn_menu"><i class="fas fa-bars"></i>Menú</button>
    
                    <ul class="menu">
                        <li><a href="index.php">Inicio</a></li>
                        <li><a href="gallery.php">Catálogo</a></li>
                        <li><a href="order.php">Pedidos</a></li>
                        <li><a href="contact.php">Contacto</a></li>
                    </ul>
                </nav>

            </section>

            <section class="banner">
                <h1>Realizar un pedido</h1>
                <p><strong>En esta sección podrás realizar un pedido de alguno de nuestros productos. Solo llena el formulario a continuación con lo que se te solicita</strong></p>
            <section>

        </header>


        <!-- SECTION INFO -->

        <section class="instructions">

            <div class="more_info">
                <button class="btn btn_info">Ver más información<i class="fas fa-arrow-circle-right"></i></button>
            </div>
            <div class="father_cards">

                <div class="info_cards">
                    <h3>Llenar el formulario</h3>
                    <p>Llena el formulario con la información que se solicita. La información debe ser correcta ya que la entrega de tu pedido será por medio de correos</p>
                    <div class="number">1</div>
                </div>
                <div class="info_cards">
                    <h3>Mis productos</h3>
                    <p>En la sección de <strong>"Productos"</strong> se mostrarán los productos que guardaste en tu carrito desde la pagina de Galería. Podrás eliminar aquellos que ya no desees comprar</p>
                    <div class="number">2</div>
                </div>

                <div class="info_cards">
                    <h3>Métodos de pago</h3>
                    <p>Los método de pago se podrán elegir en el mismo formulario, entre los cuales son por medio de Depósito Bancario o SYMPE</p>
                    <div class="number">3</div>
                </div>

                <div class="info_cards">
                    <h3>Envío del formulario de pedido</h3>
                    <p>Al enviar el formulario con la información personal y del producto. Nos comunicaremos con usted en las próximas 12-24 horas para realizar la confirmación del pedido y el método de pago.</p>
                    <div class="number">4</div>
                </div>
                <div class="info_cards">
                    <h3>Entrega del pedido</h3>
                    <p>El proceso de envío se realizará por medio de Correos Costa Rica, por esta misma razón recuerde completar sus datos personales correctamente</p>
                    <div class="number">5</div>
                </div>

            </div>
        </section>


        <!-- FORMULARIO DE PEDIDO -->
        <section class="order_confirm">
            
            <article class="order_cart">

                <h3>Tus productos:</h3>
                <p>Aquí podrás ver los productos que has agregado al carrito desde la página de <strong>Galería</strong>. Si desea eliminar alguno de su pedido solo seleccione dicha imagen y luego presione en el ícono de <span><i class="fas fa-trash-alt"></i></span>. También puedes eliminar los productos desde la pagina de Galería.</p>
                <br>
                <p>Recuerda que al enviar el formulario de compra, estos productos serán los que se agreguen a tu orden.</p>

                <div class="cart_content">
                    <div class="cart_select_cont">
                        <!-- <div class="cart_select">
                            <img src="../assets/img/galery/pulsera5.jpeg" alt="Producto seleccionado: ">
                            <p><strong>Nombre: <span>Agatha-Ojo de Tigre</span></strong></p>
                            <p><strong>Precio: <span>3500.00</span></strong></p>
                            <p hidden aria-hidden="true"><span></span></p>
                        </div> -->
                    </div>
                    <div class="cart_options_cont">
                        <!-- <div class="cart_options">
                            <img src="../assets/img/galery/pulsera2.jpeg" alt="" class="other_products">
                            <p class="name" aria-hidden="true" hidden></p>
                            <p class="price" aria-hidden="true" hidden></p>
                            <p class="id" aria-hidden="true" hidden></p>
                        </div> -->
                    </div>
                    <button class="btn btn_delete" title="Eliminar producto seleccionado" title="Eliminar producto"><i class="fas fa-trash-alt"></i></button>
                </div>
            </article>
            <article class="order_form">

                <form id="form">
                    <h3>Formulario de pedido</h3>

                    <label for="name">Nombre:</label>
                    <input type="text" name="name" id="name">
                    <div class="input_error error_name">*Escriba su nombre, sin espacios en blanco al final o al inicio</div>

                    <label for="surname_1">Primer Apellido:</label>
                    <input type="text" name="surname_1" id="surname_1">
                    <div class="input_error error_surname_1">*Escriba su primer apellido, sin espacios en blanco al final o al inicio</div>

                    <label for="surname_2">Segundo Apellido:</label>
                    <input type="text" name="surname_2" id="surname_2">
                    <div class="input_error error_surname_2">*Escriba su segundo apellido, sin espacios al final o al inicio</div>

                    <label for="cel">Número de Celular:</label>
                    <input type="tel" name="cel" id="cel">
                    <div class="input_error error_cel">*Escriba su número de celular, sin guiones</div>

                    <label for="email">Correo Electrónico:</label>
                    <input type="email" name="email" id="email">
                    <div class="input_error error_email">*Escriba su correo electrónico</div>

                    <label for="province">Provincia</label>
                    <select name="province" id="province">
                        <option value="" selected id="select_province">Selecciona tu provincia:</option>
                    </select>
                    <div class="input_error error_province">*Seleccione su provincia</div>

                    <label for="canton">Selecciona tu Cantón:</label>
                    <select name="canton" id="canton"></select>
                    <div class="input_error error_canton">*Escriba su cantón</div>

                    <label for="district">Selecciona tu Distrito</label>
                    <select name="district" id="district"></select>
                    <div class="input_error error_district">*Seleccione su distrito</div>
                    

                    <label for="postal_code">Código Postal:</label>
                    <input type="number" name="postal_code" id="postal_code">
                    <div class="input_error error_postal">*Escriba el codigo postal correspondiente a donde usted viva</div>

                    <label for="direction">Dirección (calle):</label>
                    <textarea name="direction" id="direction" cols="30" rows="10"></textarea>
                    <div class="input_error error_postal">*Escriba su dirrección. Recuerde que esta información es para <strong>Correos Costa Rica</strong>ya que la entrega la realizan ellos</div>

                    <input aria-hidden="true" hidden type="text" name="order_date" id="order_date">
                    <input aria-hidden="true" hidden type="text" name="order_hour" id="order_hour">

                    <input type="submit" value="Confirmar pedido" class="btn order_btn" name="send_order">
                </form>
                <div class="input_products" aria-hidden="true" hidden>
                </div>

            </article>    
                
        </section>
        


         <!-- FOOTER -->
        <footer>

            <header class="nav_footer">

                <!-- ICONOS DE REDES SOCIALES -->
                
                <section class="social">
                    <h3>Redes Sociales:</h3>
                    <ul class="">

                        <li><a href="https://www.facebook.com/alvaro.siles.716/" class="">
                            <i class="fab fa-facebook-square"></i>
                            <span>Sigueme en Facebook</span>
                        </a></li>

                        <li><a href="" class="">
                            <i class="fab fa-instagram"></i>
                            <span>Y también en Instagram</span>
                        </a></li>
                    </ul>
                </section>

                <!-- ICONOS DE CONTACTO -->

                <section class="contact">
                    <h3>Contactos:</h3>
                    <ul class="">
                        <li><a href="tel:+50662889872" class="">
                            <i class="fab fa-whatsapp"></i>
                            <span>6288-9872</span>
                        </a></li>
                        <li><a href="mailto:alvarisiles499@gmail.com" class="">
                            <i class="fas fa-envelope-square"></i>
                            <span>komodocr@gmail.com</span>
                        </a></li>
                    </ul>
                </section>
            </header>

            <p class="all_rights_reserved">2020 © Komodo. Todos los derechos reservados</p>
        </footer>
    </div>

    <script type="text/javascript" src="../js/responsive_menu.js"></script>
    <script type="text/javascript">

        "use strict";

        //BOTON VER MAS INFORMACION
        let btn_info = document.querySelector(".more_info .btn");
        let father_card = document.querySelector(".father_cards");

        function moreInfo(){
            if (!father_card.classList.toggle("father_cards_on")){

                btn_info.children[0].style.transform = "rotate(0deg)";
                btn_info.children[0].style.transition = "all 0.7s";
                
            }else{
                btn_info.children[0].style.transform = "rotate(90deg)";
            }
        }
        btn_info.addEventListener("click",moreInfo);
    </script>

    <script type="text/javascript" src="../js/regions_cr.js"></script>
    <script type="module" src="../js/shopping_cart.js"></script>
    <script type="module" src="../js/order_controller.js"></script>
    <script type="module" src="../js/order_validation.js"></script>
    <script type="module" src="../js/order.js"></script>
</body>

</html>