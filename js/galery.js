let photos = document.querySelectorAll(".photos");
let info = document.querySelector(".bracelet_name");
let img_modal = document.querySelector(".img_modal");
console.log(photos);

// function getImage(){

    photos.forEach((element,index) => {

        photos[index].addEventListener("click", function(e){
            console.log(photos[index].firstElementChild);
            let image = photos[index].children[0].attributes[0].nodeValue;
            info.innerHTML = image;
            img_modal.src = image;
        })
        
    });

// }

// photos.addEventListener("click", function)



// MODAL INFO