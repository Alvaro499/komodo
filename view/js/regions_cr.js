"use strict";
        
    let select_district = document.getElementById("district");
    let select_canton = document.getElementById("canton");
    let select_province = document.getElementById("province");

    //Texto por defecto antes de la informacion del cliente
    canton.innerHTML = '<option value="">Selecciona tu cantón:</option>';
    select_district.innerHTML = '<option value="">Selecciona tu cantón:</option>';

    function getProvince(e){

        fetch("https://ubicaciones.paginasweb.cr/provincias.json")
        .then(function(res){
            return res.json();
        })
        .then(function(data){
            let provinces = data;
            for (const key in provinces) {

                let new_option = document.createElement("option");
                new_option.value = provinces[key];
                new_option.textContent = provinces[key];
                new_option.setAttribute("key",key);
                select_province.appendChild(new_option);
            }
        })
        .catch(function(err){
            console.log("Error al otener las provincias" + err);
        })
    }
    getProvince();

    function changeProvince(e){
        let values = this.children;
        let actual_value = this.value;
        let id_province = "";
        let canton = document.getElementById("canton");
        
        for (const key in values) {
            if(values[key].value === actual_value) id_province = values[key].getAttribute("key");
        }

        function getCanton(){

            fetch("https://ubicaciones.paginasweb.cr/provincia/" + id_province + "/cantones.json")
            .then(function(res){
                
                return res.json();
            })
            .then(function(data){
                
                select_canton.innerHTML = " ";
                let cantones = data;
                select_canton.innerHTML = '<option value="">Selecciona tu cantón:</option>';
                for (const key in cantones) {
                    select_canton.innerHTML += `<option value="${cantones[key]}" key="${key}">${cantones[key]}</option>`;
                    }
            })
            .catch(function(err){
                console.log("Error al otener las provincias" + err);
            })
        }
        getCanton();

        function changeCanton(e){
            let values = this.children;
            let actual_value = this.value;
            let id_canton = "";

            for (const key in values) {
                if(values[key].value === actual_value) id_canton = values[key].getAttribute("key");
            }

            function getDistrict(){

                fetch("https://ubicaciones.paginasweb.cr/provincia/"+ id_province + "/canton/" + id_canton + "/distritos.json")
                .then(function(res){
                    return res.json();
                })
                .then(function(data){
                    select_district.innerHTML = " ";
                    let districts = data;
                    select_district.innerHTML = '<option value="">Selecciona tu distrito:</option>';
                    for (const key in districts) {
                        select_district.innerHTML += `<option value="${districts[key]}" key="${key}">${districts[key]}</option>`;
                    }    
                })
                .catch(function(err){
                    console.log(err);
                });
            }
            getDistrict();
        }
        canton.addEventListener("change", changeCanton);
    }
    province.addEventListener("change",changeProvince);