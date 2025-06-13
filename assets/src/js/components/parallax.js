import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

export function initSkyParallax() {
  const section = document.querySelector("#parallax-sky");
  const bg = section?.querySelector(".parallax-bg");

  if (!section || !bg) return;

  const getRatio = (el) =>
    window.innerHeight / (window.innerHeight + el.offsetHeight);

  gsap.fromTo(
    bg,
    {
      backgroundPosition: `50% ${-window.innerHeight * getRatio(section)}px`,
    },
    {
      backgroundPosition: `50% ${
        window.innerHeight * (1 - getRatio(section))
      }px`,
      ease: "none",
      scrollTrigger: {
        trigger: section,
        start: "top bottom",
        end: "bottom top",
        scrub: true,
        invalidateOnRefresh: true,
      },
    }
  );
}

export function initFullParallax() {
  const section = document.querySelector("#fullwidth-banner");
  const bg = section?.querySelector(".parallax-bg");

  if (!section || !bg) return;

  const getRatio = (el) =>
    window.innerHeight / (window.innerHeight + el.offsetHeight);

  gsap.fromTo(
    bg,
    {
      backgroundPosition: `50% ${-window.innerHeight * getRatio(section)}px`,
    },
    {
      backgroundPosition: `50% ${
        window.innerHeight * (1 - getRatio(section))
      }px`,
      ease: "none",
      scrollTrigger: {
        trigger: section,
        start: "top bottom",
        end: "bottom top",
        scrub: true,
        invalidateOnRefresh: true,
      },
    }
  );
}
