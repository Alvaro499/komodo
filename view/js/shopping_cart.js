"use strict";

import Alerts from "./alerts.js";
class Shopping_Cart_view{

    constructor(){
        // GALLERY.html
        this.product_list = document.querySelector(".products_list");
        this.btn_cart = document.querySelector(".order");
        this.cart_open = document.querySelector(".cart_open");

        // ORDER.html
        this.cart_content = document.querySelector(".cart_content");
        this.cart_select_cont = document.querySelector(".cart_select_cont");
        this.cart_options_cont = document.querySelector(".cart_options_cont");
        this.btn_delete = document.querySelector(".btn_delete");
        this.input_products = document.querySelector(".input_products");
        this.products = document.querySelector(".products")

        this.form = document.getElementById("form");

        // Hora y Fecha del pedido
        this.order_date = document.querySelector("#order_date");
        this.order_hour = document.querySelector("#order_hour");

        // ALERTS
        this.alerts = new Alerts();
    }

    sendToCart(){
        this.btn_cart.addEventListener("click",this.saveProduct.bind(this));
        // Enlazo los metodos a la clase original, ya que al ser llamada 2 veces, se pierde el enlazamiento
    }

    deleteFromCart(){

        this.cart_open.addEventListener("click",this.deleteProduct.bind(this));
        
    }

     saveProduct(){
        let img = document.querySelector(".img_modal").src;
        let product_name = document.querySelector(".bracelet_name span").textContent;
        let price = document.querySelector(".bracelet_price span").textContent;
        let id = document.querySelector(".bracelet_id").textContent;

        let products = {
            img : img,
            product_name: product_name,
            price : parseInt(price),
            id : parseInt(id)
        }
        this.readProduct(products);
        this.setProductLocalStorage(products);
    }

    readProduct(object_products){
        this.product_list.innerHTML +=
            `<div class="product">
                <img src="${object_products.img}" alt="${object_products.product_name}">
                <div class="product_info">
                    <p>${object_products.product_name}</p>
                    <p style="margin-top: 10px">₡ ${object_products.price}</p>
                </div>
                <p class="id" hidden aria-hidden="true">${object_products.id}</p>
                <button class="btn delete_product"><i class="fas fa-trash-alt"></i></button>
            </div>`;
        this.alerts.success("Éxito al agregar producto", "Has agregado este producto a tu carrito",3500);
    }


    deleteProduct(){
        let delete_product = document.querySelectorAll(".delete_product"); //button
        let method_delete = this.deleteProductLocalStorage.bind(this);
        //Enlazo el metodo al objeto Shopping_Cart_view ya que no puede ser usado dentro del addEventListener por el choque en el valor de this

        delete_product.forEach((element,index) => {
            element.addEventListener("click",function(e){
                setTimeout(() => {
                    if (e.target.localName == "button") {
                        
                        e.target.parentNode.remove();
                        
                    }else{
                        e.target.parentNode.parentNode.remove();
                    }
                    // e.currentTarget.parentNode.remove();
                    method_delete(index);
                }, 500);
            })
        });
    }




    // LOCAL-STORAGE Methods
    setProductLocalStorage(new_product){
        
        let add_new_product = this.getProductLocalStorage();
        add_new_product.push(new_product);
        localStorage.setItem("my_products", JSON.stringify(add_new_product));
    }

    getProductLocalStorage(){
        let products_from_ls = "";
        if (localStorage.getItem("my_products") == null) {
        
            products_from_ls = [];
        
        }else{
            products_from_ls = JSON.parse(localStorage.getItem("my_products"));
        }
        return products_from_ls;
    }

    deleteProductLocalStorage(index){

        let products_to_delete = JSON.parse(localStorage.getItem("my_products"));
        products_to_delete.splice(index,1)
        // if (index == 0) {

        //     products_to_delete.shift()
        
        // }else if (index == products_to_delete[products_to_delete.length - 1]) {
        //     products_to_delete.pop();

        // }else{
        //     products_to_delete.splice(index-1,1)
        // }
        localStorage.setItem("my_products", JSON.stringify(products_to_delete));
    }

    readFromLocalStorageGallery(){

        if (localStorage.getItem("my_products") == null || localStorage.getItem("my_products").length == 0) {
        
            this.product_list.innerHTML = "<strong>Aún no has agregado nada al carrito</strong>";
        
        }else{
            let products_from_ls = JSON.parse(localStorage.getItem("my_products"));
            for (let i = 0; i < products_from_ls.length; i++) {
                
                this.product_list.innerHTML +=
                `<div class="product">
                    <img src="${products_from_ls[i].img}" alt="${products_from_ls[i].product_name}">
                    <div class="product_info">
                        <p>${products_from_ls[i].product_name}</p>
                        <p>${products_from_ls[i].price}</p>
                    </div>
                    <p class="id" hidden aria-hidden="true">${products_from_ls[i].id}</p>
                    <button class="btn delete_product"><i class="fas fa-trash-alt"></i></button>
                </div>`;
            }
        }
    }





















    activateMetohdsOrder(){
        this.btn_delete.addEventListener("click",this.readFromLocalStorageOrder.bind(this));
        this.btn_delete.addEventListener("click",this.changeCartOption);
        this.btn_delete.addEventListener("click",this.deleteSelectedProductOrder.bind(this));
    }

    readFromLocalStorageOrder(){
        let cart_options_cont = document.querySelector(".cart_options_cont");
        let products_from_ls = this.getProductLocalStorage.call(this);
        
        cart_options_cont.innerHTML = "";
        for (let i = 0; i < products_from_ls.length; i++) {
                
            cart_options_cont.innerHTML +=
            `<div class="cart_options">
                <img src="${products_from_ls[i].img}" alt="${products_from_ls[i].product_name}" class="other_products">
                <p class="name" aria-hidden="true" hidden>${products_from_ls[i].product_name}</p>
                <p class="price" aria-hidden="true" hidden>${products_from_ls[i].price}</p>
                <p class="id" aria-hidden="true" hidden>${products_from_ls[i].id}</p>
            </div>`;
        }
        // this.readActualProduct();
        // this.changeCartOption();
        // this.createInputProducts();
    }

    changeCartOption(){
        let other_products = document.querySelectorAll(".other_products");
        other_products.forEach(element => {
            element.addEventListener("click",changeProduct);
        });
        function changeProduct(e){

            let cart_select_info = e.target.parentNode.children;
            //Obtener los hijos de los div class="cart_options"

            let cart_select_cont = document.querySelector(".cart_select_cont");
            cart_select_cont.innerHTML = 
            `<div class="cart_select">
                <img src="${cart_select_info[0].src}" alt="Producto seleccionado: ${cart_select_info[1].textContent}">
                <p><strong>Nombre: <span>${cart_select_info[1].textContent}</span></strong></p>
                <p><strong>Precio: <span>${cart_select_info[2].textContent}</strong></p>
                <p hidden aria-hidden="true"><span>${cart_select_info[3].textContent}</span></p>
            </div>`;
        }
    }

    readActualProduct(){
        let cart_options_cont = document.querySelector(".cart_options_cont");
        let cart_select_cont = document.querySelector(".cart_select_cont");
        if (cart_options_cont.firstElementChild) {
    
            let cart_options_cont = document.querySelector(".cart_options_cont").firstElementChild.children;
            // this.cart_select_cont.innerHTML =
            cart_select_cont.innerHTML =
            `<div class="cart_select">
                <img src="${cart_options_cont[0].src}" alt="Producto seleccionado: ${cart_options_cont[1].textContent}">
                <p style="margin: 10px 0;"><strong>Nombre: <span>${cart_options_cont[1].textContent}</span></strong></p>
                <p><strong>Precio: ₡<span>${cart_options_cont[2].textContent}</strong></p>
                <p hidden aria-hidden="true"><span>${cart_options_cont[3].textContent}</span></p>
            </div>`;
        }else{
            cart_select_cont.innerHTML =
            `<div class="cart_select">
                <strong>Aún no has agregado nada en tu carrito. <br> Recuerda visitar nuestra <a href="gallery.php">galería de productos</a></strong>
            </div>`;
        }
    }

    deleteSelectedProductOrder(){
        
        let other_products = document.querySelectorAll(".other_products");
        let product_to_delete = JSON.parse(localStorage.getItem("my_products"));
        let btn_delete = document.querySelector(".btn_delete");

        let readActualProduct = this.readActualProduct;

        let key_attr;
        let product_cont;

        other_products.forEach((element,index) => {
            element.addEventListener("click",get_selected_product.bind(null,index));
        });

        function get_selected_product(index,e){
            key_attr = "";
            product_cont = "";
            key_attr = index;
            product_cont = e.currentTarget.parentNode;
        }

        btn_delete.addEventListener("click",deleteProductKey);
            
        function deleteProductKey(e){
            console.log(key_attr);
            // console.log(product_cont);
            product_cont.remove();
            product_to_delete.splice(key_attr,1);
            // if (key_attr == 0) {

            //     product_to_delete.shift();
            
            // }else if (key_attr == product_to_delete[product_to_delete.length-1]) {
            //     product_to_delete.pop();
    
            // }else{
            //     product_to_delete.splice(key_attr,1);
            // }
            localStorage.setItem("my_products", JSON.stringify(product_to_delete));
            readActualProduct();
        }

    }

    createInputProducts(){
        let products = this.getProductLocalStorage();
        let input_products = document.querySelector(".input_products");
        input_products.innerHTML = "";
        for (let i = 0; i < products.length; i++) {

            input_products.innerHTML += 
            `<div class="products">
                <p class="products_name">${products[i].product_name}</p>
                <p class="product_price">${products[i].price}</p>
                <p class="products_id">${products[i].id}</p>
            </div>`;    
        }
        return input_products.children;
    }

    verifyMyProducts(){
        let my_products = this.createInputProducts();
        if (my_products.length != 0) {
            return 1;
            //Si existen productos en el carrito
        }else{
            return 0;
            //No hay productos
        }
    }

    dateAndHour(){
        let date = new Date();
        this.order_hour.value = date.toLocaleTimeString();
        this.order_date.value = date.toLocaleDateString();;
    }
}

export default Shopping_Cart_view;