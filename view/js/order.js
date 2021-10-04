// "use strict";

import Alerts from "./alerts.js";
import {sendOrder} from "./order_validation.js";

let alerts = Alerts();
// class Order_view{

    let form = document.querySelector("#form");

    form.addEventListener("submit", function(e){

        e.preventDefault();

        let data = new FormData(form);
        if(sendOrder()){

            fetch("../../controller/order.php",{method: "POST",body: data})
            .then(function(response){
                console.log(res);
                return response.json();

            })
            .then(function(data){
                console.log(data);

            })
            .catch(function(err){
                console.log(err);
            })

        }else{
            alerts.error("No se puede confirmar el pedido", "Por favor llene todos los campos del formulario para llevar a cabo su pedido");
        }
    })
// }
// export default Order_view