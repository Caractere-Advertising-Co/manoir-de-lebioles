// index.js

import Swiper from "swiper";
import "swiper/css"; // utile si tu utilises les styles par défaut

import "fslightbox";
window.addEventListener("load", () => {
  // Swiper init
  const swiper = new Swiper(".swiper-chambre", {
    slidesPerView: 3,
    spaceBetween: 10,
    loop: true,
    navigation: {
      nextEl: ".chambre-button-next",
      prevEl: ".chambre-button-prev",
    },
  });

  const swiperPresta = new Swiper(".swiper-prestation", {
    slidesPerView: "auto",
    spaceBetween: 10,
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
