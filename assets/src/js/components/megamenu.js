const btn = document.getElementById("btnMegamenu");
const megaMenu = document.getElementById("megamenu");
const svgOpenAnim = document.getElementById("animate_open");
const svgCloseAnim = document.getElementById("animate_close");
const menuItems = [...megaMenu.querySelectorAll(".content-megamenu ul li")];
const topHeader = document.getElementById("banner-top");

let justOpened = false;
let isAnimating = false;

function showItems() {
  const delayBase = 80;
  const count = menuItems.length;

  menuItems.forEach((item, index) => {
    const delay = (count - 1 - index) * delayBase;
    item.style.transitionDelay = `${delay}ms`;
    item.style.opacity = "1";
    item.style.transform = "translateX(0)";
  });
}

function hideItems() {
  const delayBase = 50;

  menuItems.forEach((item, index) => {
    const delay = index * delayBase;
    item.style.transitionDelay = `${delay}ms`;
    item.style.opacity = "0";
    item.style.transform = "translateX(-100%)";
  });
}

btn.addEventListener("click", () => {
  if (isAnimating) return;
  isAnimating = true;

  const isOpen = megaMenu.classList.contains("active");

  if (!isOpen) {
    // Ouverture
    megaMenu.classList.add("active");
    topHeader.style.zIndex = "1";

    document.getElementById("main-header").classList.add("megamenu-open");

    svgOpenAnim.beginElement();
    justOpened = true;

    setTimeout(() => {
      justOpened = false;
    }, 50);

    setTimeout(() => {
      showItems();
      isAnimating = false;
    }, 300);
  } else {
    // Fermeture
    hideItems();
    svgCloseAnim.beginElement();
    topHeader.style.zIndex = "5";

    setTimeout(() => {
      megaMenu.classList.remove("active");
      document.getElementById("main-header").classList.remove("megamenu-open");

      isAnimating = false;
    }, 500);
  }
});

document.addEventListener("click", function (e) {
  if (justOpened || !megaMenu.classList.contains("active")) return;

  if (megaMenu.contains(e.target) || btn.contains(e.target)) return;

  if (!isAnimating) {
    isAnimating = true;
    hideItems();
    svgCloseAnim.beginElement();
    topHeader.style.zIndex = "5";

    setTimeout(() => {
      megaMenu.classList.remove("active");
      document.getElementById("main-header").classList.remove("megamenu-open");
      isAnimating = false;
    }, 500);
  }
});
