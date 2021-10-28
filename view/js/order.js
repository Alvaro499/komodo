"use strict";
import Alerts from "./alerts.js";
import {sendOrder} from "./order_validation.js";
import Shopping_Cart_view from "./shopping_cart.js";

let date = new Date();

/*Los dias de las semana son un arreglo, empieza desde domingo y la posicion 0: 
[0 - 1 - 2 - 3 - 4 - 5 - 6]
[Dom - Lun - Mart - Mier - Juev - Vier - Sab]*/
console.log(date.getDay());

/*Los meses tambien son un arreglo y empieza en la posicion 0: 
[0 - 1 - 2 - 3 - 4 - 5 - 6]
[Dom - Lun - Mart - Mier - Juev - Vier - Sab]*/
console.log(date.getMonth());

//Obtener el ano especifico actual
console.log(date.getFullYear());

//Las horas se manejan en formato de 0 a 23 horas, no existe am ni pm
console.log(date.getHours());

//Los metodos anteriores eran formas para obtener las fechas de un modo mas mecanizado y enfocado para operaciones en programas; ahora si queremos obtener las fechas de formas entendibles para las personas, Date() tambien tiene metodos para eso

//Obtenemos la fecha completa pero en ingles
console.log(date.toString());
//R: Mon Oct 25 2021 21:19:40 GMT-0600 (hora estándar central)

//*NOTA: el GMT-0600 indica la diferencia o distancia en horas a las que se encuentra nuestra region de la zona horaria 0:00

//Obtenemos la fecha pero sin la hora detallada
console.log(date.toDateString());
//R: Mon Oct 25 2021

//Obtenemos la fecha y la hora pero mas resumida y sin un idioma predeterminado
console.log(date.toLocaleString());
//R: 25/10/2021 21:22:17

//Obtenemos la fecha de igual forma resumida y sin idioma predeterminado pero sin la hora
console.log(date.toLocaleDateString());
//R: 25/10/2021

//Obtenemos solamente la hora, igual de forma resumida
console.log(date.toLocaleTimeString());
//R: 21:28:04

//Obtenemos los MINUTOS a los que se encuentra nuestra zona con respecto a la hora 0:00 (ubicada en Londres)
console.log(date.getTimezoneOffset());
//R: 360



//FECHA en el UTC -> Basada en la hora 0 desde Greenwich
/*Sabemos que no todos los paises tienen la misma hora, por ejemplo aqui en Costa Rica pueden ser las 6pm y en otro pais pueden ser 4am, la diferencia en horas se basa en la hora 0:00 dada por el meridiano de Greenwich, ya que a partir de ella se dividen las zonas horarias

Para conocer nuestra diferencia o distancia respecto a la hora 0:00 podemos usar*/

Date.toString();
//El cual nos dara la fecha completa y un codigo asi
    //Fecha
        //Mon Oct 25 2021 21:19:40 
    //Codigo
        //GMT-0600 (hora estándar central)

    /*Este codigo no es mas que la diferencia de hora entre nuestra region y la zona 0:00 (Londres). En el codigo quien indica eso es el "0600" que en realidad significa 6 horas, por lo que Costa Rica tiene 6 horas de diferencia con Londres o sea la hora 0.
    
    Esto es empleado por muchas aplicaciones donde se realizan operaciones matematicas simples para calcular la diferencia entre la zona del usuario y la zona 0; y luego mostrarla en la zona de otros usuarios, como Facebook por ejmplo; si una persona publica algo a las 4am otra persona vera que fue publicado a las 10am desde su region*/

//PoR dicha JS en su constructor Date() posee metodos para obtener datos especificos del UTC o la fehca 0:00

console.log("Metodos para la fecha 0:00 (UTC");
console.log(date.getUTCDate());

let alerts = new Alerts();
let shopping_cart = new Shopping_Cart_view();
setInterval(() => {
    shopping_cart.dateAndHour();    
}, 1000);


let form = document.querySelector("#form");

form.addEventListener("submit", function(e){

    e.preventDefault();

    //Verificar la existencia de productos en pedido
    let verify = shopping_cart.verifyMyProducts();
    let data = new FormData(form);

    let list_products = shopping_cart.getProductLocalStorage();
    let products_json = JSON.stringify(list_products);

    //El FormData guarda los datos como string por eso debemos usar stringify para guardar datos
    let products_form = new FormData();
    products_form.append("arr_products",products_json);

    if(sendOrder() && verify != 0){

        fetch("../../controller/new_order.php",{method: "POST",body: products_form})
        .then(function(res){
            console.log(res);
            if (res.ok) {

                fetch("../../controller/order.php",{method: "POST",body: data});
                
            }else{
                alerts.error("No se puede enviar el pedido", "Ha ocurrido un error al enviar el pedido, por favor inténtelo más tarde" + err,6000);
            }
        })
        .then(function(res){
            console.log(res);
            setTimeout(() => {
                alerts.success("Éxito al enviar su pedido", "Su pedido ha sido enviado con éxito, pronto estaremos en contacto con usted",7000);    
            }, 4500);
        })
        .catch(function(err){
            console.log(err);
            alerts.error("No se puede enviar el pedido", "Ha ocurrido un error al enviar el pedido, por favor inténtelo más tarde" + err,6000);
        })
    }else{
        alerts.error("No se puede confirmar el pedido", "Por favor llene todos los campos del formulario y asegúrese que en su carrito haya al menos un producto seleccionado esto para llevar a cabo su pedido",7000);
    }
})
// https://stackoverflow.com/questions/65290485/js-fetch-post-works-but-php-is-empty
// https://stackoverflow-com.translate.goog/questions/10809937/undefined-index-with-post?_x_tr_sl=en&_x_tr_tl=es&_x_tr_hl=es&_x_tr_pto=nui,sc
// https://es.stackoverflow.com/questions/245950/recibir-datos-mediante-post-en-php-utilizando-fetch-javascript
// https://stackoverflow-com.translate.goog/questions/65290485/js-fetch-post-works-but-php-is-empty?_x_tr_sl=en&_x_tr_tl=es&_x_tr_hl=es&_x_tr_pto=nui,sc
// https://es.stackoverflow.com/questions/294029/para-que-sirve-file-get-contentsphp-input
// https://stackoverflow.com/questions/33439030/how-to-grab-data-using-fetch-api-post-method-in-php
// https://codepen-io.translate.goog/dericksozo/post/fetch-api-json-php?_x_tr_sl=en&_x_tr_tl=es&_x_tr_hl=es&_x_tr_pto=nui,sc