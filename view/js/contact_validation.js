"use strict";

let user_name = document.getElementById("user_name");
let last_name = document.getElementById("last_name");
let cel = document.getElementById("cel");
let email = document.getElementById("email");
let image_file = document.getElementById("image");
let comment = document.getElementById("comment");
let inputs_error = document.querySelectorAll(".input_error");

// 
var regex_name = new RegExp('^[a-zA-ZÀ-ÿ]+$', 'i', 'g');
var regex_cel = new RegExp('^[0-9]+$');
const regex_correo = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

inputs_error.forEach(element => {
    element.style.display = "none";
    element.style.color = "#E40017";
});

export function sendConsult(){
    let cont_error = 0;

    if (user_name.value == "" || user_name.value == null || !regex_name.test(user_name.value)) {
        // debugger;
        user_name.style.border = "3px solid #E40017";
        user_name.nextElementSibling.style.display = "block";
        cont_error++;
        
    }else{
        user_name.nextElementSibling.style.display = "none";
        user_name.style.border = "3px solid #54E346";
    }

    if (last_name.value == "" || last_name.value == null || !regex_name.test(user_name.value)) {
        // debugger;
        last_name.style.border = "3px solid #E40017";
        last_name.nextElementSibling.style.display = "block";
        cont_error++;
        
    }else{
        last_name.nextElementSibling.style.display = "none";
        last_name.style.border = "3px solid #54E346";
    }

    if (cel.value == "" || cel.value == null || !regex_cel.test(cel.value)) {
        // debugger;
        cel.style.border = "3px solid #E40017";
        cel.nextElementSibling.style.display = "block";
        cont_error++;
        
    }else{
        cel.nextElementSibling.style.display = "none";
        cel.style.border = "3px solid #54E346";
    }

    if (email.value == "" || email.value == null || !regex_correo.test(email.value)) {
        // debugger;
        email.style.border = "3px solid #E40017";
        email.nextElementSibling.style.display = "block";
        cont_error++;
        
    }else{
        email.nextElementSibling.style.display = "none";
        email.style.border = "3px solid #54E346";
    }

    if (comment.value == "" || comment.value == null) {
        // debugger;
        comment.style.border = "3px solid #E40017";
        comment.nextElementSibling.style.display = "block";
        cont_error++;
        
    }else{
        comment.nextElementSibling.style.display = "none";
        comment.style.border = "3px solid #54E346";
    }

    if (cont_error == 0) {
        return true;
    }else{
        return false;
    }
}

export function sendImage(){
    let cont_error_image = 0;

    function loadImage(){

        let actual_image = this.files;
        if (actual_image.length <= 4) {

            image_file.nextElementSibling.style.display = "none";
            image_file.style.border = "3px solid #54E346";

            for (let i = 0; i <= actual_image.length; i++) {
                
                if (actual_image[i].type == "image/jpg" || actual_image[i].type == "image/jpeg" || actual_image[i].type == "image/png"){

                    if (actual_image[i].size >= 1000000) {
                        
                        image_file.style.border = "3px solid #E40017";
                        image_file.nextElementSibling.style.display = "block";
                        this.value = "";
                        cont_error_image++;

                    }else{
                        image_file.nextElementSibling.style.display = "none";
                        image_file.style.border = "3px solid #54E346";
                    }

                }else{
                    image_file.style.border = "3px solid #E40017";
                    image_file.nextElementSibling.style.display = "block";
                    this.value = "";
                    cont_error_image++;
                }   
            } 
        }else{
            image_file.style.border = "3px solid #E40017";
            image_file.nextElementSibling.style.display = "block";
            this.value = "";
            cont_error_image++;
        }
    }
    image_file.addEventListener("change", loadImage)
    return cont_error_image;
}