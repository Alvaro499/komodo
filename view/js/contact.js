"use strict";
import Alerts from "./alerts.js";
import {sendImage, sendConsult} from "./contact_validation.js";

let alerts = new Alerts();
let form = document.getElementById("contact_form");
let result = sendImage();

form.addEventListener("submit", e => {
    e.preventDefault();

    if (result == 0 && sendConsult()) {
   
        let data = new FormData(form);

        fetch("../../controller/contact_email.php", {method: "POST", body: data })
        .then(function(res){
            console.log(res);
            if (res.ok) {
                alerts.success("Éxito al enviar correo","El correo ha sido enviado éxitosamente, pronto nos comunicaremos con usted", 5000);    
            }else{
                alerts.error("Error al enviar correo","Ha ocurrido un error al enviar el correo, por favor inténtelo más tarde", 5000);    
            }
            
            // return res;
        }).catch(function(er){
            alerts.error("Error al enviar correo","Ha ocurrido un error al enviar el correo, por favor inténtelo más tarde", 5000);
            console.log(er);
        })

    }else{
        alerts.error("Error al enviar correo","Por favor completar los campos necesarios para que podamos recibir su consulta", 5000);
    }
})