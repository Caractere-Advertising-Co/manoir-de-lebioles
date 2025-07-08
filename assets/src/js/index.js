import { initSkyParallax, initFullParallax } from "./components/parallax.js";
import { scrollChefZoom } from "./components/scaleScroll.js";
import Rellax from "rellax";

initSkyParallax();
initFullParallax();

require("fslightbox");

/* Rellax Paralax */
var rellax = new Rellax(".rellax", {
  breakpoints: [576, 768, 1201],
});

/* Section Chef */

const section = document.getElementById("backgroundChef");
const bg = document.querySelector("#backgroundChef img");
const txt = document.getElementById("text");

scrollChefZoom(section, bg, txt);

/* Section Piscine */

const sectionPiscine = document.getElementById("backgroundPiscine");
const bgPiscine = document.querySelector("#backgroundPiscine img");
const txtPiscine = document.getElementById("textPiscine");

scrollChefZoom(sectionPiscine, bgPiscine, txtPiscine);

const imgfullScreen = document.getElementById("backgroundFullScreen");

if (imgfullScreen) {
  const bgFullScreen = document.querySelector("#backgroundFullScreen img");
  const txtFullScreen = document.getElementById("textFullscreen");

  scrollChefZoom(imgfullScreen, bgFullScreen, txtFullScreen);
}

document.querySelectorAll(".scale-section").forEach((section) => {
  const bg = section.querySelector(".backgroundScale img");
  const text = section.querySelector(".textScale");

  if (bg && text) {
    scrollChefZoom(section, bg, text);
  }
});

import "./components/animate.js";
import "./components/swiper.js";
import "./components/stickyMenu.js";
import "./components/scrollTop.js";
import "./components/accordeons.js";
import "./components/popupVideo.js";
