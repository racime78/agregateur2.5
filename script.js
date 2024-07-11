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

  // Pour ma navbar
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

  // Pour mon slider
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

  // Initialisation de Select2 pour la sélection des villes
  $('#ville').select2({
      placeholder: 'Sélectionner une ville',
      minimumInputLength: 3,
      ajax: {
        url: 'search_villes.php',
        dataType: 'json',
        delay: 250,
        data: function(params) {
          return {
            q: params.term
          };
        },
        processResults: function(data) {
          return {
            results: data
          };
        },
        cache: true
      }
  });

  // Initialisation de Select2 pour la sélection des régions
  $('#region').select2({
      placeholder: 'Sélectionner une région',
      minimumInputLength: 3,
      ajax: {
        url: 'search_regions.php',
        dataType: 'json',
        delay: 250,
        data: function(params) {
          return {
            q: params.term
          };
        },
        processResults: function(data) {
          return {
            results: data
          };
        },
        cache: true
      }
  });

  // Gestion des cartes d'offre
  const offerCards = document.querySelectorAll('.offer-card');
  offerCards.forEach(card => {
      card.addEventListener('click', function () {
          const titre = this.getAttribute('data-titre');
          const description = this.getAttribute('data-description');

          document.getElementById('offer-title').textContent = titre;
          document.getElementById('offer-description').textContent = description;
      });
  });
});

function onlyOne(checkbox) {
  const checkboxes = document.querySelectorAll('input[name="periode[]"]');
  checkboxes.forEach((item) => {
      if (item !== checkbox) item.checked = false;
  });
}

function checkFilters() {
  const ville = document.getElementById('ville').value;
  const region = document.getElementById('region').value;
  const type_contrat = document.getElementById('type_contrat').value;
  const periodes = document.querySelectorAll('input[name="periode[]"]:checked');
  
  if (ville === "" && region === "" && type_contrat === "" && periodes.length === 0) {
      window.location.href = "http://localhost/agregateur2/postuler.php";
      return false;
  }
  return true;
}
