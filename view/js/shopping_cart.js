"use strict";

import {Alerts} from "/alerts.js"
class Shopping_Cart_view{

    constructor(){
        this.product_list = document.querySelector(".products_list");
        this.btn_cart = document.querySelector(".order");

        // Alerts
        this.alerts = new Alerts();
    }

    sendToCart(){
        console.log(this);
        product_list.innerHTML = `<strong>En este momento no tienes productos agregados al carrtio</strong>`;
        this.btn_cart.addEventListener("click",this.saveProduct.bind(this));
        // Enlazo los metodos a la clase original, ya que al ser llamada 2 veces, se pierde el enlazamiento

    }
     saveProduct(){
        let img = document.querySelector(".img_modal").src;
        let product_name = document.querySelector(".bracelet_name span").textContent;
        let price = document.querySelector(".bracelet_price span").textContent;
        let id = document.querySelector(".bracelet_id").textContent;

        let products = {
            img : img,
            product_name: product_name,
            price : price,
            id : id
        }
        
        if (this.readProduct(products)) {
            this.alerts.success("Producto agregado al carrito",2500);   
        }else{
            this.alerts.success("Error al agregar producto","Ha ocurrido un error al agregar el producto a su carrito, por favor inténtelo más",5000);   
        }
        
         
    }

    readProduct(object_products){
        this.product_list.innerHTML = "";
        this.product_list.innerHTML +=
            `<div class="product">
                <p class="id"></p>
                <div>
                    <img src="${object_products.img}" alt="${object_products.product_name}">
                </div>
                <p>${object_products.product_name}</p>
                <p>${object_products.price}</p>
                <p class="id" hidden aria-hidden="true">${object_products.id}</p>
                <button class="btn delete_product"><i class="fas fa-trash-alt"></i></button>
            </div>`;
    }
}

let cart = new Shopping_Cart_view();
cart.sendToCart();