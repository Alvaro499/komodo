"use strict";
import Alerts from "./alerts.js";

let alerts = new Alerts();
let form = document.getElementById("contact_form");
let result = sendImage();

form.addEventListener("submit", e => {
    
    e.preventDefault();

    if (result == 0 && sendConsult()) {
   
        let data = new FormData(form);

        fetch("business/mails/contact_email.php", {method: "POST", body: data }).

        then(function(response){

            return response.json();
        }).then(function(data){

            alerts.success("Éxito al enviar correo","El correo ha sido enviado exitosamente", 100000)
        }).
        catch(function(er){
            alerts.error("Error al enviar correo","Ha ocurrido un error al enviar el correo, por favor inténtelo más tarde", 5000)
        })

    }
})