"use strict";

//VARIABLES
let form_color = document.querySelector("#color_form");
let color_option = document.querySelectorAll("button[name=color]");

let form_search = document.querySelector("#searcher");
let anchor = document.querySelector("#anchor");

let color_value = "";


//FUNCIONES
color_option.forEach(element => {
    element.addEventListener("click",getValueColor.bind(null));
    element.addEventListener("keypress",getValueColor2.bind(null));
});

function getValueColor(e){

    color_value = e.currentTarget.value;
    sendColorOption();
}
function getValueColor2(e){

    if (e.key === "Enter") {
        color_value = e.currentTarget.value;
        sendColorOption();
    }
}

function sendColorOption(){
    form_color.addEventListener("submit",function(e){
        let parameter = new URLSearchParams({"color": color_value});
        let url = `../../controller/search_for.php?${parameter.toString()}`;
    
        fetch(url)
        .then(function(res){
        })
        .catch(function(err){
            console.log(err);
        })
    })
}

// function deleteURL(){

//     let actual_url = location.href;
//     if ( actual_url.indexOf("?") != -1) {
//         let position = actual_url.indexOf("?");
//         let new_url = actual_url.slice(0,position);
//         history.replaceState(null, "", new_url);
        
//     }else{
//         history.replaceState(null, "", actual_url);
//     }
// }
// deleteURL();


function sendKeywordOption(){
    form_search.addEventListener("submit",function(e){
        // e.preventDefault();
        let input_search = document.querySelector("#input_search").value;
        let data = new FormData(form_search);
        saveKeyword(input_search);

        fetch("../../controller/search_for.php")
        .then(function(res){
        })
        .catch(function(err){
            console.log(err);
        })
    })
}
sendKeywordOption();

function saveKeyword(keyword){
    sessionStorage.setItem("my_keywords", keyword);
}

(function(){
    let input_search = document.querySelector("#input_search");
    if (sessionStorage.getItem("my_keywords") == null) {        
        input_search.value = "";
    }else{
        input_search.value = sessionStorage.getItem("my_keywords");
    }
})()

function savePagePosition(){
    let galery_photos = document.querySelector(".galery_photos");
    let html = document.querySelector("html");
    if (sessionStorage.getItem("page_position") == null) {

        sessionStorage.setItem("page_position","on");
        
    }else{
        let galery_position = galery_photos.getBoundingClientRect();
        html.scrollTop = galery_position.top - 75;
    }
}
savePagePosition();