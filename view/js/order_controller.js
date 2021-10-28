"use strict";
import Shopping_Cart_view from "./shopping_cart.js";

let cart_order = new Shopping_Cart_view();

document.addEventListener("DOMContentLoaded",cart_order.readFromLocalStorageOrder());
cart_order.changeCartOption();
cart_order.readActualProduct();
cart_order.deleteSelectedProductOrder()

cart_order.activateMetohdsOrder();
