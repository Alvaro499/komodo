"use strict";

let user_name = document.querySelector("#name");
let surnames = document.querySelector("#surnames");
let cel = document.querySelector("#cel");
let email = document.querySelector("#email");
let province = document.querySelector("#province");
let canton = document.querySelector("#canton");
let district = document.querySelector("#district");
let postal_code = document.querySelector("#postal_code");
let direction = document.querySelector("#direction");
let input_error = document.querySelectorAll(".input_error");

var regex_name = new RegExp('^[a-zA-ZÀ-ÿ]+$', 'i', 'g');
var regex_cel = new RegExp('^[0-9]+$');
const regex_email = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

input_error.forEach(element => {
    element.style.display = "none";
    element.style.color = "#E40017";
});

export function sendOrder(){
    let cont_error = 0;

    if (user_name.value == null || user_name.value == "" || !regex_name.test(user_name.value)) {

        user_name.style.border = "3px solid #E40017";
        user_name.nextElementSibling.style.display = "block";
        cont_error++;
    }else{
        user_name.nextElementSibling.style.display = "none";
        user_name.style.border = "3px solid #54E346";
    }

    if (surnames.value == null || surnames.value == "" || !regex_name.test(surnames.value)) {

        surnames.style.border = "3px solid #E40017";
        surnames.nextElementSibling.style.display = "block";
        cont_error++;
    }else{
        surnames.nextElementSibling.style.display = "none";
        surnames.style.border = "3px solid #54E346";
    }

    if (cel.value == null || cel.value == "" || !regex_cel.test(cel.value)) {

        cel.style.border = "3px solid #E40017";
        cel.nextElementSibling.style.display = "block";
        cont_error++;
    }else{
        cel.nextElementSibling.style.display = "none";
        cel.style.border = "3px solid #54E346";
    }

    if (email.value == null || email.value == "" || !regex_email.test(email.value)) {

        email.style.border = "3px solid #E40017";
        email.nextElementSibling.style.display = "block";
        cont_error++;
    }else{
        email.nextElementSibling.style.display = "none";
        email.style.border = "3px solid #54E346";
    }

    if (province.value == null || province.value == "") {

        province.style.border = "3px solid #E40017";
        province.nextElementSibling.style.display = "block";
        cont_error++;
    }else{
        province.nextElementSibling.style.display = "none";
        province.style.border = "3px solid #54E346";
    }

    if (canton.value == null || canton.value == "") {

        canton.style.border = "3px solid #E40017";
        canton.nextElementSibling.style.display = "block";
        cont_error++;
    }else{
        canton.nextElementSibling.style.display = "none";
        canton.style.border = "3px solid #54E346";
    }

    if (district.value == null || district.value == "") {

        district.style.border = "3px solid #E40017";
        district.nextElementSibling.style.display = "block";
        cont_error++;
    }else{
        district.nextElementSibling.style.display = "none";
        district.style.border = "3px solid #54E346";
    }

    if (postal_code.value == null || postal_code.value == "" || !regex_cel.test(postal_code.value)) {

        postal_code.style.border = "3px solid #E40017";
        postal_code.nextElementSibling.style.display = "block";
        cont_error++;
    }else{
        postal_code.nextElementSibling.style.display = "none";
        postal_code.style.border = "3px solid #54E346";
    }

    if (direction.value == null || direction.value == "") {

        direction.style.border = "3px solid #E40017";
        direction.nextElementSibling.style.display = "block";
        cont_error++;
    }else{
        direction.nextElementSibling.style.display = "none";
        direction.style.border = "3px solid #54E346";
    }

    if (cont_error == 0) {

        return true;
        //no hay errores
    }else{
        return false;
        //hay al menos un error en el form
    }
}