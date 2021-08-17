let btn_menu = document.querySelector(".btn_menu");
let menu = document.querySelector(".top_nav > ul");

//Active/Desactive Menu
btn_menu.addEventListener("click", function(event){
    if(menu.classList.contains("ul_menu_on") == false){
        menu.classList.add("ul_menu_on");
        btn_menu.classList.add("btn_menu_on");
        document.querySelector("body").style.overflow = "hidden";


    }else if(menu.classList.contains("ul_menu_on") == true){
        menu.classList.remove("ul_menu_on");
        btn_menu.classList.remove("btn_menu_on");
        document.querySelector("body").style.overflow = "initial";

    }
});

//Responsive Active/Desactive Menu

