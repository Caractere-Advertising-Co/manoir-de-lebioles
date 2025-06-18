import { initSkyParallax, initFullParallax } from "./components/parallax.js";
import { scrollChefZoom } from "./components/scaleScroll.js";

initSkyParallax();
initFullParallax();

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

import "./components/animate.js";
import "./components/swiper.js";
import "./components/stickyMenu.js";
