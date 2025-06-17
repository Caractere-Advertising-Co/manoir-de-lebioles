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

const cursor = document.querySelector(".circle-cursor");
let mouseX = 0;
let mouseY = 0;
let circleX = 0;
let circleY = 0;
let speed = 0.9; // Adjust for desired smoothness

// Function to update cursor position
function updateCursor() {
  // Calculate the distance between the circle and the mouse
  const distX = mouseX - circleX;
  const distY = mouseY - circleY;

  // Move the circle towards the mouse position
  circleX = circleX + distX * speed;
  circleY = circleY + distY * speed;

  // Apply the new position to the circle
  cursor.style.left = circleX + "px";
  cursor.style.top = circleY + "px";

  // Make the circle visible
  cursor.style.display = "block";

  // Request the next animation frame
  requestAnimationFrame(updateCursor);
}

// Event listener for mouse movement
document.addEventListener("mousemove", (e) => {
  mouseX = e.clientX;
  mouseY = e.clientY;
});

// Start the animation loop
requestAnimationFrame(updateCursor);

// Hide the default cursor
document.body.style.cursor = "none";
