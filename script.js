// let boutonBurger = document.getElementById('burger');
// let liensNav = document.getElementById('ulNav');

// boutonBurger.addEventListener('click', () => {
//   liensNav.classList.toggle("openNav");

//   if (liensNav.classList.contains("openNav")) {
//     boutonBurger.src = "img/x-solid.svg"; // Chemin correct de l'image de croix
//     boutonBurger.classList.toggle("rotationLeft");
//     boutonBurger.classList.toggle("rotationRight");
//   } else {
//     boutonBurger.classList.toggle("rotationLeft");
//     boutonBurger.classList.toggle("rotationRight");
//     boutonBurger.src = "img/burger-solid.svg"; // Chemin correct de l'image de burger
//   }
// });


// Fonction pour afficher/masquer le menu déroulant
// function toggleMenu() {
//     var menu = document.getElementById("dropdownMenu");
//     if (menu.style.display === "block") {
//         menu.style.display = "none";
//     } else {
//         menu.style.display = "block";
//     }
// }

// // Fermer le menu si on clique en dehors
// window.onclick = function(event) {
//     if (!event.target.matches('.mainmenubtn')) {
//         var dropdowns = document.getElementsByClassName("dropdown-child");
//         for (var i = 0; i < dropdowns.length; i++) {
//             var openDropdown = dropdowns[i];
//             if (openDropdown.style.display === "block") {
//                 openDropdown.style.display = "none";
//             }
//         }
//     }
// }

/*------------------script Navigation Header ----------------------------0*/

let boutonBurger = document.getElementById('burger');
let boutonCroix = document.getElementById('xButton');
let liensNav = document.getElementById('ulNav');

boutonBurger.addEventListener('click', () => {
  liensNav.classList.toggle("openNav");
  boutonBurger.classList.toggle("rotationLeft");
  boutonBurger.classList.toggle("rotationRight");

  if
    (liensNav.classList.contains("openNav")) {
    boutonBurger.src = "blogCuisine-main-main/img\cookie-bite-solid.svg";


  } else {
    boutonBurger.src = "img/cookie-solid(1).svg";

  }
})
