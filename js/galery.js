let photos = document.querySelectorAll(".photos");
let info = document.querySelector(".bracelet_name");
let img_modal = document.querySelector(".img_modal");
let modal = document.querySelector(".modal_cont");
let close = document.querySelector(".close");
let download_img = document.querySelector(".download_img > a");

    photos.forEach((element,index) => {

        photos[index].addEventListener("click", function(e){
            let image = photos[index].children[0].attributes[0].nodeValue;
            let url = photos[index].children[0].attributes[0].baseURI;
            console.log(url);
            img_modal.src = image;
            
                if(modal.classList.contains("modal_cont_on") === false){
        
                    modal.classList.add("modal_cont_on");
                    modal.classList.remove("modal_cont");
                    document.querySelector("body").style.overflow = "hidden";
                    download_img.href = image;

                }else{
                    modal.classList.remove("modal_cont_on");
                    modal.classList.add("modal_cont");
                    document.querySelector("body").style.overflow = "initial";
                }
        }) 

        close.addEventListener("click", e =>{

            if(modal.classList.contains("modal_cont_on"))
                modal.classList.remove("modal_cont_on");
                modal.classList.add("modal_cont");
                document.querySelector("body").style.overflow = "initial"; 
            })
    });