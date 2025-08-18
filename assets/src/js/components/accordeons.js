// import { ScrollTrigger } from "gsap/ScrollTrigger";
// import gsap from "gsap";

// gsap.registerPlugin(ScrollTrigger);

// var acc = document.getElementsByClassName("accordion");

// for (let i = 0; i < acc.length; i++) {
//   acc[i].addEventListener("click", function () {
//     this.classList.toggle("active");
//     var panel = this.nextElementSibling;

//     if (panel.style.maxHeight) {
//       panel.style.maxHeight = null;
//     } else {
//       panel.style.maxHeight = panel.scrollHeight + "px";
//     }

//     // quand le panneau termine sa transition, recalcul des triggers
//     panel.addEventListener(
//       "transitionend",
//       () => {
//         ScrollTrigger.refresh();
//       },
//       { once: true } // évite d’empiler des listeners
//     );
//   });
// }
