"use strict";
import Alerts from "./alerts.js";
import {sendOrder} from "./order_validation.js";
import Shopping_Cart_view from "./shopping_cart.js";

let date = new Date();



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
            if (res.ok) {

                fetch("../../controller/order.php",{method: "POST",body: data});
                
            }else{
                alerts.error("No se puede enviar el pedido", "Ha ocurrido un error al enviar el pedido, por favor inténtelo más tarde" + err,6000);
            }
        })
        .then(function(res){
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