let modal_cont = document.querySelector(".modal_cont");
let modal = document.querySelector(".modal");
let close = document.querySelector(".close");
let photos = document.querySelectorAll(".photos");
let name_img = document.querySelector(".bracelet_name > span");
let price = document.querySelector(".bracelet_price > span");
let stock = document.querySelector(".bracelet_stock > span");
let id = document.querySelector(".bracelet_id");
let download_btn = document.querySelector(".download_img");

//BOTON DE DESCARGA

    function downloadImage(url_img, img, name_img){

        if (url_img !== null || url_img !== "") {
            try {
                let canvas = document.createElement("canvas");
                document.body.appendChild(canvas);
                canvas.width = img.width * 2;
                canvas.height = img.height * 2;
                canvas.getContext("2d").drawImage(img,0,0, canvas.width, canvas.height);

                let pushButton = function(){

                    //Soporte pata IE y EDGE (metodo obsoleto)
                    if(window.navigator.msSaveBlob){
                        window.navigator.msSaveBlob(canvas.msToBlob(), "pulsera_img.png")
                        canvas.remove();
                        // Soporte para resto de navegadores
                    }else{
                        let download_a = document.querySelector(".download_img > a")
                        download_a.crossOrigin = "anonymous";
                        download_a.href = canvas.toDataURL("image/jpeg");
                        download_a.download = name_img;
                        canvas.remove();
                    }
                }

                download_btn.addEventListener("click", pushButton)
            } catch (err) {
                console.log(err); 
            }
        }else{  
        }      
    }
    
    photos.forEach((element,index) => {

        photos[index].addEventListener("click", function(e){
            let url_img = photos[index].children[0].attributes[0].nodeValue;
            //Se obtiene la URL de la img seleccionada por el usuario
            let img_modal = document.querySelector(".img_modal");
            img_modal.src = url_img;

            name_img.textContent = photos[index].children[1].textContent; //nombre product
            price.textContent = photos[index].children[2].textContent; //precio product
            stock.textContent= photos[index].children[3].textContent; //stock del producto
            id.textContent= photos[index].children[4].textContent; //id del producto
            let name_img_text = photos[index].children[1].textContent;

            
            downloadImage(url_img,img_modal,name_img_text);

            if(modal_cont.classList.contains("modal_cont_on") === false){
    
                modal_cont.classList.add("modal_cont_on");
                modal_cont.classList.remove("modal_cont");
                document.querySelector("body").style.overflow = "hidden";
               

            }else{
                modal_cont.classList.remove("modal_cont_on");
                modal_cont.classList.add("modal_cont");
                document.querySelector("body").style.overflow = "visible";
            }
        })
    })

    close.addEventListener("click", e =>{

        if(modal_cont.classList.contains("modal_cont_on"))
            modal_cont.classList.remove("modal_cont_on");
            modal_cont.classList.add("modal_cont");
            document.querySelector("body").style.overflow = "visible";
            document.querySelector("canvas").remove();
        })