<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="view/assets/fonts_awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="view/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="view/css/index.css">
    <link rel="stylesheet" type="text/css" href="view/css/shared_styles/footer_bridge.css">

</head>
<body>
    <div class="container">
      <header class="header_top_nav">

            <div class="logo">
                <img src="view/assets/logo/logo.png" alt="Logo de la pagina" class="loco">
            </div>

            <nav class="top_nav">
                <button class="btn btn_menu"><i class="fas fa-bars"></i>Menú</button>

                <ul class="menu">
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="view/ui/gallery.php">Catálogo</a></li>
                    <li><a href="view/ui/order.php">Pedidos</a></li>
                    <li><a href="view/ui/contact.php">Contacto</a></li>
                </ul>
            </nav>
      </header>

        <section class="banner">
            <svg id="Capa_1" class="banner1" data-name="Capa 1" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 325.4 200"><defs><style>.cls-1{fill:none;}.cls-2{fill:url(#Degradado_sin_nombre_49);}.cls-3{fill:url(#Degradado_sin_nombre_49-2);}</style><linearGradient id="Degradado_sin_nombre_49" x1="2.22" y1="183.76" x2="327.39" y2="183.76" gradientTransform="matrix(1, 0, 0, -1, -2, 215.26)" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#f5821b"/><stop offset="1" stop-color="#f51b6c"/></linearGradient><linearGradient id="Degradado_sin_nombre_49-2" x1="0.2" y1="127.51" x2="325.52" y2="127.51" gradientTransform="translate(325.72 260.65) rotate(180) scale(1 1.07)" xlink:href="#Degradado_sin_nombre_49"/></defs><title>banner1</title><rect class="cls-1" y="0.17" width="325.4" height="153.6"/><path class="cls-2" d="M325.39,9l-18.06,1.49c-18.07,1.6-54.2,4.41-90.33,12S144.74,41.9,108.61,39,36.35,18,18.29,9L.22,0V63H325.39Z" transform="translate(-0.2)"/><rect class="cls-3" x="0.2" y="49.35" width="325.32" height="150.65" transform="translate(325.52 249.35) rotate(180)"/></svg>
            
            
            <h1>"Lleva el estilo a todos lados"</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam a soluta quisquam et deleniti qui rerum, debitis commodi laudantium. Ea amet cumque autem, doloremque reprehenderit dolorem temporibus quaerat</p>
        </section>

        
        <h2 class="slider_title">Algunos de nuestros productos</h2>
        
        <div class="slider_cont">
            <div class="slider">
 
                <?php

                    include "controller/slider_product.php";
                    // var_dump($result);
                    foreach ($result as $value) {
                    ?>

                    <div class="slider_img">
                        <img src="view/assets/img/gallery/<?php echo $value['url'] ;?>" alt="<?php echo $value['name'] ;?>">
                        <div class="slider_info">
                            <?php echo $value['name'] ;?>
                        </div>
                    </div>

                <?php }; ?>
                
            </div>

            <button class="btn_slider right"><i class="fas fa-arrow-right"></i></button>
            <button class="btn_slider left"><i class="fas fa-arrow-right"></i></button>
        </div>

        <section class="btn_info_product">
            <!-- <button class="btn btn_info catalogue"><a href="view/ui/gallery.php">Ver Catálogo</a></button>
            <button class="btn btn_info order"><a href="view/ui/order.php">Realizar pedido</a></button> -->

            <a href="view/ui/gallery.php" class="btn btn_info catalogue" rol="button">Ver Catálogo</a>
            <a href="view/ui/order.php" class="btn btn_info order" rol="button">Realizar pedido</a>
        </section>

        <!-- INFO CARDS -->

        <section class="info_cards">
            <h2>Nuestros productos destacan por:</h2>
            <div class="card_container">
                <div class="card_father">
                    <div class="cards">
                        <div class="card_img">
                            <img src="view/assets/flaticon/thread.svg" alt="Ilustración de hilo encerado" class="icon_cards">
                        </div>
                        
                        <h3>Hilo Encerado</h3>
                        <p>Hechas con hilo encerado, el cual es sumamente resistente, además de ser impermeable, lo que da como resultado un producto de calidad</p>
                    </div>
                </div>
                <div class="card_father">
                    <div class="cards">
                        <div class="card_img">
                            <img src="view/assets/flaticon/all-inclusive.svg" alt="" class="icon_cards">
                        </div>
                        <h3>Para cualquier persona</h3>
                        <p>Las pulseras son de correa ajustable, lo que les permite adapatarse a cualquier tamano de muñeca</p>
                    </div>
                </div>
                <div class="card_father">
                    <div class="cards">
                        <div class="card_img">
                            <img src="view/assets/flaticon/bracelet.svg" alt="" class="icon_cards">
                        </div>
                        <h3>Piedras Naturales</h3>
                        <p>Adornadas con piedras naturales de diferentes tipos, como: Ojo de Tigre, Mate-Negro, Agathas, entre muchas más</p>
                    </div>
                </div>
                <div class="card_father">
                    <div class="cards">
                        <div class="card_img">
                            <img src="view/assets/flaticon/variety.svg" alt="" class="icon_cards">
                        </div>
                        <h3>Variedad</h3>
                        <p>Gran variedad de estilos, colores y tamaños entre los cuales elegir</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- SEGUNDO BANNER (CALIDAD GARANTIZADA) -->
        <section class="banner_2">
            <div class="banner_2_content">
                <h2>Calidad Garantizada</h2>
                <p>Nuestro catalogo siempre esta actualizado, por lo que podras ver cuales pulseras estan disponibles y cuales por el momento no</p>
                <button class="btn btn_banner_2"><a href="view/ui/order.php">Ver Catálogo</a></button>
            </div>
            <!-- <img src="assets/img/banner2_model.png" alt="Hombre Posando con pulsera" class="img_banner_2"> -->
            
        </section>

        <!-- FOOTER -->
        <footer>

            <header class="nav_footer">

                <!-- ICONOS DE REDES SOCIALES -->
                
                <section class="social">
                    <h3>Redes Sociales:</h3>
                    <ul class="">

                        <li><a href="https://www.facebook.com/diego.silesquesada.5" class="">
                            <i class="fab fa-facebook-square"></i>
                            <span>Sigueme en Facebook</span>
                        </a></li>

                        <li><a href="https://www.instagram.com/komodostone/" class="">
                            <i class="fab fa-instagram"></i>
                            <span>Y también en Instagram</span>
                        </a></li>
                    </ul>
                </section>

                <!-- ICONOS DE CONTACTO -->

                <section class="contact">
                    <h3>Contactos:</h3>
                    <ul class="">
                        <li><a href="tel:+50689654491" class="">
                            <i class="fab fa-whatsapp"></i>
                            <span>8965-4491</span>
                        </a></li>
                        <li><a href="mailto:komodocr21@gmail.com" class="">
                            <i class="fas fa-envelope-square"></i>
                            <span>komodocr21@gmail.com</span>
                        </a></li>
                    </ul>
                </section>
            </header>

            
        </footer>

        <!-- CREDITOS DE LOS ICONOS -->

        <section class="credits">
            <div class="accordion">
                <h4 role="button">Agradecimientos y créditos:</h3>
                <i class="fas fa-arrow-down"></i>
            </div>
            
            <div id="credits_info" class="credits_info">

                <!-- <p>Se agradace a la pagina flaticon y sus disenadores la oportunidad de usar sus iconos en nuestro sitio web. A continuacion brindamos los respectivos creditos:</p> -->
                <p>Esta página usa íconos de <a href="https://www.flaticon.es/">Flaticon</a>, por lo que los mismos no nos pertencen. A continuación se muestran los respectivos créditos de los diseñadores:</p>

                <div class="div_author">

                    <div>Icons made by <a href="https://www.flaticon.com/authors/geotatah" title="geotatah">geotatah</a> from: <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>
                    <div>Icons made by <a href="https://www.flaticon.com/authors/nhor-phai" title="Nhor Phai">Nhor Phai</a> from: <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>
                    <div>Icons made by <a href="https://www.freepik.com" title="Freepik">Freepik</a> from: <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>
                    <div>Icons made by <a href="https://www.freepik.com" title="Freepik">Freepik</a> from: <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>

                </div>

            </div>
            <p class="all_rights_reserved">2020 © Komodo. Todos los derechos reservados</p>
        </section>

        
    </div>

    <script type="text/javascript" src="view/js/responsive_menu.js"></script>
    <script type="text/javascript" src="view/js/index_slider.js"></script>
    <script type="text/javascript">

        let accordion = document.querySelector(".accordion");
        let credits_row = document.querySelector(".fa-arrow-down");
        let credits = document.querySelector(".credits_info");

        accordion.addEventListener("click", function(event){
            
            if(credits.classList.toggle("credits_info_on")){

                credits_row.style.transform = "rotate(180deg)";
            }else{
                credits_row.style.transform = "rotate(0)";
            }
            
        });
    </script>
    
</body>
</html