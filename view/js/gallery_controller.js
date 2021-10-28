"use strict";
import Shopping_Cart_view from "./shopping_cart.js";

let cart_galerry = new Shopping_Cart_view();
cart_galerry.sendToCart();
cart_galerry.deleteFromCart();
cart_galerry.readFromLocalStorageGallery();

// readActualProduct(){
//     if (document.querySelector(".cart_options_cont") != undefined) {

//         let cart_options_cont = document.querySelector(".cart_options_cont").children[0].children;
//         this.cart_select_cont.innerHTML =
//         `<div class="cart_select">
//             <img src="${cart_options_cont[0].src}" alt="Producto seleccionado: ${cart_options_cont[1].textContent}">
//             <p><strong>Nombre: <span>${cart_options_cont[1].textContent}</span></strong></p>
//             <p><strong>Precio: <span>${cart_options_cont[2].textContent}</strong></p>
//             <p hidden aria-hidden="true"><span>${cart_options_cont[3].textContent}</span></p>
//         </div>`;
//     }else{

//     }
    
// }




// readActualProduct(){
//     let cart_options_cont = document.querySelector(".cart_options_cont");
//     console.log(cart_options_cont.firstElementChild);
//    if (cart_options_cont.firstElementChild) {
       
//        let cart_options_cont = document.querySelector(".cart_options_cont").firstElementChild.children;
//        this.cart_select_cont.innerHTML =
//        `<div class="cart_select">
//            <img src="${cart_options_cont[0].src}" alt="Producto seleccionado: ${cart_options_cont[1].textContent}">
//            <p><strong>Nombre: <span>${cart_options_cont[1].textContent}</span></strong></p>
//            <p><strong>Precio: <span>${cart_options_cont[2].textContent}</strong></p>
//            <p hidden aria-hidden="true"><span>${cart_options_cont[3].textContent}</span></p>
//        </div>`;

//    }else{
//        this.cart_select_cont.innerHTML =
//        `<div class="cart_select">
//            <strong>Aún no has agregado nada en tu carrito. Recuerda visitar nuestra galería de productos</strong>
//        </div>`;
//    }
   
// }






// let products_from_ls = JSON.parse(localStorage.getItem("my_products"));
//                 cart_options_cont.innerHTML = "";
//                 for (let i = 0; i < products_from_ls.length; i++) {
                    
//                     cart_options_cont.innerHTML +=
//                     `<div class="cart_options" key="${i}">
//                         <img src="${products_from_ls[i].img}" alt="${products_from_ls[i].product_name}" class="other_products">
//                         <p class="name" aria-hidden="true" hidden>${products_from_ls[i].product_name}</p>
//                         <p class="price" aria-hidden="true" hidden>${products_from_ls[i].price}</p>
//                         <p class="id" aria-hidden="true" hidden>${products_from_ls[i].id}</p>
//                     </div>`;
//                 }