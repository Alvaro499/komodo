<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería</title>
    <link rel="stylesheet" href="../assets/fonts_awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../css/normalize.css">
    <link rel="stylesheet" type="text/css" href="../css/galery.css">
    <link rel="stylesheet" type="text/css" href="../css/shared_styles/footer_bridge.css">
    <link rel="stylesheet" type="text/css" href="../css/shared_styles/alerts.css">
    <link rel="stylesheet" type="text/css" href="../css/shared_styles/shopping_cart.css">
</head>
<body>

    <div class="container">

        <!-- MODAL IMG INFO -->

        <div class="modal_cont">
            <div class="modal">
                <div class="top_options">
                    <button class="info_btn btn">Más información<i class="fas fa-question"></i></button>
                    <button class="close btn"><i class="fas fa-times"></i></button>
                </div>
                <div class="img_container">
                    <!-- <div class="img_sub_container"> -->
                    <img id="my_image" class="img_modal" alt="Pulsera seleccionada">
                    <!-- </div> -->
                </div>
                <div class="modal_info">
                    <ul>
                        <li class="bracelet_name"><strong>Nombre: </strong><span></span></li>
                        <li class="bracelet_price"><strong>Precio:  ₡</strong><span></span></li>
                        <li class="bracelet_stock"><strong>Disponibles: </strong><span></span></li>
                        <li class="bracelet_id" aria-hidden="true" hidden></li>
                    </ul>
                    <div class="btn_modal">
                        <button class="btn download_img"><a>Descargar Imagen</a></button>
                        <button class="btn order">Agregar al carrito</button>
                    </div>
                </div>

            </div>
        </div>

        
        <!-- SHOPPING CART -->

        <div class="shopping_cart_container" key="0">
            <div class="shopping_cart" key="0">
                <div class="cart_title_btn">
                    <h4><i class="fas fa-shopping-cart"></i>Tu Carrito:</h4>
                    <button class="btn close_cart" title="Cerrar carrito"><i class="fas fa-times"></i></button>
                </div>
                <div class="products_list">
                </div>
            </div>
        </div>

        <!-- BOTON ABRIR CARRITO -->
        <div class="cart_open_cont">
            <button class="btn cart_open" title="Abrir mi carrito"><i class="fas fa-shopping-cart"></i></button>
        </div>



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

            
        </header>

        
        <section class="banner">
            <h1>¡Explora nuestro catálogo!</h1>    
            <form class="searcher"  id="searcher" rol="search">
                <label for="search" hidden>Busca algo más especifico en la galería...</label>
                <input type="search" id="input_search" class="search" name="keyword" placeholder="Busca algo más especifico...">
                
                <label for="search_for" title="Iniciar búsqueda"><i class="fas fa-search"></i></label>
                
                <input type="submit" id="search_for" name="search_for" aria-hidden="true" hidden>
            </form>
                
        </section>

        <!-- KEYWORDS -->
        <section class="keywords">
            <form id="color_form" class="cont_filter">
                <button class="btn btn_filter btn_margin"></button>

                <button class="btn btn_filter" value="reset" name="color" type="submit">Mostrar todas</button>
                <button class="btn btn_filter" value="rojo" name="color" type="submit">Rojas</button>
                <button class="btn btn_filter" value="azul" name="color" type="submit">Azules</button>
                <button class="btn btn_filter" value="celeste" name="color" type="submit">Celestes</button>
                <button class="btn btn_filter" value="morado" name="color" type="submit">Moradas</button>
                <button class="btn btn_filter" value="verde" name="color" type="submit">Verdes</button>
                <button class="btn btn_filter" value="naranja" name="color" type="submit">Naranaja</button>
                <button class="btn btn_filter" value="amarillo" name="color" type="submit">Amarillas</button>
                <button class="btn btn_filter" value="cafe" name="color" type="submit">Cafés</button>
                <button class="btn btn_filter" value="negro" name="color" type="submit">Negras</button>
                <button class="btn btn_filter" value="blanco" name="color" type="submit">Blancas</button>
                <button class="btn btn_filter" value="multicolor" name="color" type="submit">Multicolor</button>
                <button class="btn btn_filter" value="reset" name="color" type="submit">Mostrar todas</button>

                <button class="btn btn_filter btn_margin"></button>
            </form>
            

            <button class="btn btn_slider left" title="Retroceder"><i class="fas fa-arrow-left"></i></button>
            <button class="btn btn_slider right" title="Avanzar"><i class="fas fa-arrow-right"></i></button>
        </section>


        <!-- GALERY -->
        <section class="galery_container">
            <div class="galery">
                <a id="anchor" aria-hidden="true" hidden></a>   
                <div class="galery_photos">
                    

                    <?php
                        include "../../controller/search_for.php";
                        foreach ($result as $value) 
                        {
                    ?>
                        <div class="photos" title="Click para más información">
                            <img src="../assets/img/gallery/<?php echo $value['url']; ?>" alt="<?php echo $value["name"]; ?>">
                            <p class="info"><?php echo $value["name"]; ?></p>
                            <p class="price" aria-hidden="true" hidden><?php echo $value["cost"]; ?></p>
                            <p class="stock" aria-hidden="true" hidden><?php echo $value["stock"]; ?></p>
                            <p class="id_product" aria-hidden="true" hidden><?php echo $value["id_product"]; ?></p>
                        </div>

                    <?php
                        };
                    ?>

                </div>
                <strong class="info_alert"><?php echo $cont; ?></strong>
            </div>
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
    <script type="text/javascript" src="../js/galery.js"></script>
    <script type="text/javascript">
        // <!-- SCROLL SIMPLE DE LOS FILTROS -->
        let left = document.querySelector(".left");
        let right = document.querySelector(".right");
        let cont_filter = document.querySelector(".cont_filter")

        function moveLeft(){
            cont_filter.scrollLeft += -200;
        }

        function moveRight(){
            cont_filter.scrollLeft += 200;
        }

        left.addEventListener("click", moveLeft);
        right.addEventListener("click", moveRight);

        // TITULO DEL BUSCADOR
        

        window.addEventListener("scroll",function(e){
            let title = document.querySelector(".banner h1");
            let keywords = document.querySelector(".keywords");
            keywords_position = keywords.getBoundingClientRect().top;
            screen_size = window.innerHeight;

            if (keywords_position < screen_size / 3.5) {

                title.style.display = "none";
                
            }else{

                title.style.display = "block";

            }

        })
        // BOTONES DE ABRIR/CERRAR CARRITO

        let cart_close = document.querySelector(".close_cart");
        let cart_open = document.querySelector(".cart_open");
        let cart_father = document.querySelector(".shopping_cart_container");
        let cart_modal = document.querySelector(".shopping_cart");

        cart_open.addEventListener("click",cartOpen);
        cart_close.addEventListener("click",cartClose);

        function cartOpen(){
            if (cart_father.getAttribute("key") == 0 && cart_modal.getAttribute("key") == 0) {

                cart_father.style.visibility = "visible";
                cart_father.setAttribute("key",1);
                cart_modal.style.transform = "scale(1)";
                cart_modal.setAttribute("key",1);
                document.querySelector("body").style.overflow = "hidden";
            }
        }
        function cartClose(){
            if (cart_father.getAttribute("key") == 1 && cart_modal.getAttribute("key") == 1) {
                document.querySelector("body").style.overflow = "initial";
                cart_modal.style.transform = "scale(0)";
                cart_modal.setAttribute("key",0);
                setTimeout(() => {
                    cart_father.style.visibility = "hidden";
                    cart_father.setAttribute("key",0);
                    
                }, 100);
            }
        }
    </script>
    <script type="module" src="../js/shopping_cart.js"></script>
    <script type="module" src="../js/gallery_controller.js"></script>
    <script type="module" src="../js/search_for.js"></script>

</body>
</html>