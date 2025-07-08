import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

export function scrollChefZoom(section, img, text) {
  const tl = gsap.timeline({ ease: "none" });

  tl.from(img, {
    scale: 0.6,
    duration: 1,
    transformOrigin: "center center",
  }).to({}, { duration: 2 });

  ScrollTrigger.create({
    trigger: section,
    start: "top top",
    end: "bottom center",
    //pin: true,
    animation: tl,
    scrub: 0.78,
    //pinSpacing: false,
    onUpdate: (self) => {
      if (self.progress > 0.2) {
        text?.classList.add("show");
      }
    },
  });
}
