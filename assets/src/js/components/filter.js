import Isotope from "isotope-layout";
import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

document.addEventListener("DOMContentLoaded", function () {
  // Init Isotope en mode vertical
  var grid = document.querySelector(".listing-faqs");
  var iso = new Isotope(grid, {
    itemSelector: ".faq-item",
    layoutMode: "vertical",
  });

  // Fonction accordéon
  function initAccordions() {
    var acc = document.getElementsByClassName("accordion");
    for (var i = 0; i < acc.length; i++) {
      acc[i].onclick = function () {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;

        if (panel.style.maxHeight) {
          panel.style.maxHeight = null;
        } else {
          panel.style.maxHeight = panel.scrollHeight + "px";
        }

        // attendre la fin d'une éventuelle transition CSS
        panel.addEventListener(
          "transitionend",
          () => {
            ScrollTrigger.refresh();
          },
          { once: true }
        );

        // si pas de transition CSS => fallback direct
        if (getComputedStyle(panel).transitionDuration === "0s") {
          ScrollTrigger.refresh();
        }
      };
    }
  }

  // Init accordéon au chargement
  initAccordions();

  // Filtres
  var filters = document.querySelectorAll(".filter-item");
  filters.forEach(function (filter) {
    filter.addEventListener("click", function () {
      var filterValue = this.getAttribute("data-filter");
      iso.arrange({ filter: filterValue });

      filters.forEach((f) => f.classList.remove("active"));
      this.classList.add("active");

      // Réinitialiser les accordéons (tout fermer au changement de filtre)
      var panels = document.querySelectorAll(".panel");
      var accs = document.querySelectorAll(".accordion");
      panels.forEach((p) => (p.style.maxHeight = null));
      accs.forEach((a) => a.classList.remove("active"));

      // après réarrangement Isotope, recalcul ScrollTrigger
      iso.on("arrangeComplete", function () {
        ScrollTrigger.refresh();
      });
    });
  });
});
