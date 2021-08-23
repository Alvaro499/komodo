"use strict";

// let xy = document.querySelector(".xy");
// 		function getPosition(){
// 			let xy = document.querySelector(".xy");
// 			let position = xy.getBoundingClientRect();
// 			xy.innerHTML = "Top: " + position.top + ", Right: " + position.right + ", Bottom: " + position.bottom + ", Left: " + position.left + "<br><br>" + "Y sobre la alutra y la medida son: " + ", Width: " + position.width + ", Height: " + position.height;
// 		}
// 		xy.addEventListener("click", getPosition)

		
		// VARIABLES

		const left = document.querySelector(".left");

		const right = document.querySelector(".right");

		let slider = document.querySelector(".slider");

		//Todas las imagenes o secciones del slider
		let imgs = document.querySelectorAll(".slider_img");
		

		//La ultima img o seccion del slider
		let last_img = imgs[imgs.length - 1];

		let first_img = imgs[0];

			//Caluclar coordenadas para el incremento de los elementos

			// let position = xy.getBoundingClientRect();
			// let position_top = position.top; //cuadro rojo
			// let position_right = position.right;
			// let position_bottom = position.bottom;
			// let position_left = position.left;
			// console.log(position_left)



		let array_coord = [];


		//Escala de la imagen central
		// for (let i = 0; i < imgs.length; i++) {
			
		// 	array_coord.push(imgs[i].getBoundingClientRect());
		// }

		// let realRight = imgs[i].position.right - position.width

		//Restar el position.right entre el width

		// for (let i = 0; i < imgs.length; i++) {
			
		// 	if ( (array_coord[i].left <= position_left && (array_coord[i].right <= position_right - position.width) ) && (array_coord[i].top == position_top && array_coord[i].bottom == position_bottom) ) {

		// 		imgs[i].style.transform = "scale(1.2)";
		// 		imgs[i].style.transition = "all 0.4s";
				
		// 	}else{
		// 		imgs[i].style.transform = "initial";
		// 	}
		// }


		// Funciones de Avanzar y retroceder
		slider.insertAdjacentElement("afterbegin", last_img);
		//Queda afuera porque sino al momento de realizar Next a la izquierda de la imagen por default no habra nada


		function Next(){
			let new_last_image = document.querySelectorAll(".slider_img")[0];
			//Aqui estamos obteniendo al nuevo arreglo despues de ser modificado por el "slider.insertAdjacentElement("afterbegin", last_img);" que esta fuera de esta funcion

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