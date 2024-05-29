document.addEventListener('DOMContentLoaded', function () {
    // Initialisation du Swiper
    var swiper = new Swiper(".slide-content", {
        slidesPerView: 2,
        spaceBetween: 60,
        loop: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
    });
});


//Pour ma navbar
const toggleMenuBtn = document.querySelector("#menu-btn");
const toggleMenuBtnImg = document.querySelector("#menu-btn img");
const toggledMenu = document.querySelector("#toggled-menu");
const menuLinks = document.querySelectorAll("#main-nav ul a");

toggleMenuBtn.addEventListener("click", toggleNav);

function toggleNav(){
    
    toggledMenu.classList.toggle("-translate-y-full");

    if(toggledMenu.classList.contains("-translate-y-full")){
        toggleMenuBtnImg.setAttribute("src", "images/menu.svg");
        toggleMenuBtn.setAttribute("aria-expanded", "false");
    }
    else{
        toggleMenuBtnImg.setAttribute("src", "images/cross.svg");
        toggleMenuBtn.setAttribute("aria-expanded", "true");
    }
}

//Pour mon slider
var swiper = new Swiper(".slide-content", {
    slidesPerView: 2,
    spaceBetween: 30,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });