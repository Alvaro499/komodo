"use strict";
import Shopping_Cart_view from "./shopping_cart.js";

let cart_galerry = new Shopping_Cart_view();
cart_galerry.sendToCart();
cart_galerry.deleteFromCart();
cart_galerry.readFromLocalStorageGallery();