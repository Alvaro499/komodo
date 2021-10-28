class Alerts{

    constructor(){  

        this.alert_container = document.querySelector(".container_alert");
        
        this.alert_error = document.querySelector(".alert_error");
        this.alert_success = document.querySelector(".alert_success");

        //Error
        this.error_info = document.querySelector(".alert_error .alert_info");
        this.error_title = document.querySelector(".alert_error .title_alert");
        
        //Success
        this.success_info = document.querySelector(".alert_success .alert_info");
        this.success_title = document.querySelector(".alert_success .title_alert");

        //Close button
        this.close_alert = document.querySelectorAll(".close_alert");

    }

    success(title,info,time){

        
        this.alert_container.style.visibility = "visible";
        this.alert_success.style.display = "block";
        this.success_title.innerHTML = title;
        this.success_info.innerHTML = info;
        //Tiempo para que se desvanezcan solas las alertas
        this.duration(time, this.alert_success);
        this.closeAlert();
    }

    error(title,info,time){

        this.alert_container.style.visibility = "visible";
        this.alert_error.style.display = "block";
        this.error_title.innerHTML = title;
        this.error_info.innerHTML = info;

        //Tiempo para que se desvanezcan solas las alertas
        this.duration(time, this.alert_error);
        this.closeAlert();
    }

    duration(time,type_of_alert){

        setTimeout(() => {
            this.alert_container.style.visibility = "hidden";
            type_of_alert.style.display = "none";
            
        }, time);
        
    }

    closeAlert(){
        this.close_alert.forEach(element => {

            element.addEventListener("click", function(e){
                e.currentTarget.parentNode.style.display = "none";
                e.currentTarget.parentNode.parentNode.style.visibility = "hidden";
            })
        });        
    }
}
export default Alerts;