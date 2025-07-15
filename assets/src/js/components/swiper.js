// index.js

import Swiper from "swiper";
import { Navigation, Pagination, Autoplay } from "swiper/modules";

import "swiper/css"; // utile si tu utilises les styles par défaut
import "swiper/css/navigation"; // styles pour les flèches, optionnel
import "swiper/css/pagination"; // styles pour les flèches, optionnel

import "fslightbox";

window.addEventListener("load", () => {
  // Swiper init
  const swiper = new Swiper(".swiper-chambre", {
    modules: [Navigation, Autoplay],

    slidesPerView: 3,
    spaceBetween: 30,
    loop: true,
    autoplay: {
      delay: 5000, // 5000 ms = 5 secondes par slide
      disableOnInteraction: false, // pour que l'autoplay continue après un swipe manuel
    },
    navigation: {
      nextEl: ".chambre-button-next",
      prevEl: ".chambre-button-prev",
    },
    breakpoints: {
      // when window width is >= 320px
      320: {
        slidesPerView: 1,
        spaceBetween: 20,
      },
      // when window width is >= 480px
      480: {
        slidesPerView: 2,
        spaceBetween: 30,
      },
      // when window width is >= 640px
      640: {
        slidesPerView: 3,
        spaceBetween: 30,
      },
    },
  });

  const swiperHero = new Swiper(".swiper-hero", {
    modules: [Navigation, Pagination, Autoplay],

    slidesPerView: 1,
    spaceBetween: 0,
    loop: true,
    autoplay: {
      delay: 5000, // 5000 ms = 5 secondes par slide
      disableOnInteraction: false, // pour que l'autoplay continue après un swipe manuel
    },
    speed: 800, // durée de transition entre les slides (en ms)
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });

  const swiperEvents = new Swiper(".swiper-events", {
    modules: [Navigation],
    slidesPerView: 1,
    spaceBetween: 0,
    loop: true,
    navigation: {
      nextEl: ".btnNextEvents",
      prevEl: ".btnPrevEvents",
    },
  });

  const swiperPresta = new Swiper(".swiper-prestation", {
    slidesPerView: "auto",
    spaceBetween: 10,
    modules: [Navigation],
  });

  const swiperChambre = new Swiper(".swiper-galerie-chambre", {
    modules: [Navigation],
    slidesPerView: 3,
    spaceBetween: 15,
    loop: true,
    navigation: {
      nextEl: ".btnNextGalChambre",
      prevEl: ".btnPrevGalChambre",
    },
  });

  const swiperBuilder = new Swiper(".swiper-galerie-builder", {
    modules: [Navigation],
    slidesPerView: 3,
    spaceBetween: 15,
    loop: true,
    navigation: {
      nextEl: ".btnNextGalBuilder",
      prevEl: ".btnPrevGalBuilder",
    },
  });

  const discoverRooms = new Swiper(".swiper-discover", {
    modules: [Navigation],
    slidesPerView: 2.7,
    spaceBetween: 10,
    loop: true,
    navigation: {
      nextEl: ".discoverBtnNext",
      prevEl: ".discoverBtnPrev",
    },
  });

  // Click listener une fois que tout est chargé
  const container = document.getElementById("lightbox-container");

  document.querySelectorAll(".swiper-slide").forEach((slide) => {
    slide.addEventListener("click", async () => {
      const postId = slide.dataset.id;

      try {
        const response = await fetch(`/wp-json/manoir/v1/galerie/${postId}`);
        const gallery = await response.json();

        // Vider et remplir le container fslightbox
        container.innerHTML = "";
        gallery.forEach((img) => {
          const a = document.createElement("a");
          a.href = img.url;
          a.dataset.fslightbox = "chambre-gallery";
          a.style.display = "none";
          container.appendChild(a);
        });

        refreshFsLightbox();
        document.querySelector('[data-fslightbox="chambre-gallery"]').click();
      } catch (err) {
        console.error("Erreur de chargement galerie :", err);
      }
    });
  });
});
