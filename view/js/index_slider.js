"use strict";
const left = document.querySelector(".left");

const right = document.querySelector(".right");

let slider = document.querySelector(".slider");

//Todas las imagenes o secciones del slider
let imgs = document.querySelectorAll(".slider_img");


//ESTILOS CSS DEL SLIDER
	//Establecer el tamano del contenedor de las imagenes segun la cantidad de estas

	let count_img = imgs.length;

	function SliderStye(amount){
		return amount * 0.333 * 100;
	}
	slider.style.width = SliderStye(count_img) + "%";





//La ultima img o seccion del slider
let last_img = imgs[imgs.length - 1];
let first_img = imgs[0];
let array_coord = [];

// Funciones de Avanzar y retroceder
slider.insertAdjacentElement("afterbegin", last_img);
//Queda afuera porque sino al momento de realizar Next a la izquierda de la imagen por default no habra nada


function Next(){
	let new_last_image = document.querySelectorAll(".slider_img")[0];
	//Obteniendo al nuevo arreglo despues de ser modificado por el "slider.insertAdjacentElement("afterbegin", last_img);" que esta fuera de esta funcion
	slider.style.marginLeft = "-66.6%";
	slider.style.transition = "margin 0.4s";
	
	setTimeout(function(){

		slider.style.transition = "none";
		slider.insertAdjacentElement("beforeend", new_last_image);
		slider.style.marginLeft = "-33.3%";
		
		document.querySelectorAll(".slider_img")[2].style.transform = "scale(1.2)";
		document.querySelectorAll(".slider_img")[2].style.zIndex = "25";
		document.querySelectorAll(".slider_img")[2].style.transition = "all 0.5s";
		

		for (let i = 0; i < document.querySelectorAll(".slider_img").length; i++) {
			if ( i === 2) continue;

			document.querySelectorAll(".slider_img")[i].style.zIndex = "initial";
			document.querySelectorAll(".slider_img")[i].style.transform = "initial";
			document.querySelectorAll(".slider_img")[i].style.transform = "scale(0.8)";
			document.querySelectorAll(".slider_img")[i].style.transition = "all 0.4s";
		}
	}, 400)
}

function Prev(){
	let new_image = document.querySelectorAll(".slider_img");
	let new_first_image = new_image[new_image.length - 1];
	
	slider.style.marginLeft = "0";
	slider.style.transition = "margin 0.4s";

	setTimeout(function(){

		slider.style.transition = "none";
		slider.insertAdjacentElement("afterbegin", new_first_image);
		slider.style.marginLeft = "-33.3%";
		
		document.querySelectorAll(".slider_img")[2].style.transform = "scale(1.2)";
		document.querySelectorAll(".slider_img")[2].style.zIndex = "25";
		document.querySelectorAll(".slider_img")[2].style.transition = "all 0.4s";
		

		for (let i = 0; i < document.querySelectorAll(".slider_img").length; i++) {
			if ( i === 2) continue;

			document.querySelectorAll(".slider_img")[i].style.zIndex = "initial";
			document.querySelectorAll(".slider_img")[i].style.transform = "initial";
			document.querySelectorAll(".slider_img")[i].style.transform = "scale(0.8)";
			document.querySelectorAll(".slider_img")[i].style.transition = "all 0.4s";
		}
	}, 400)
	
}

//EJECUCION DE FUNCIONES

right.addEventListener("click", Next);
left.addEventListener("click", Prev);