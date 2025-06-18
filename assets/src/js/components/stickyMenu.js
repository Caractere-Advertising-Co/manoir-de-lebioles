document.addEventListener("DOMContentLoaded", function () {
  const menu = document.getElementById("main-header");

  let menuPosition = menu.offsetTop;

  console.log(window.scrollY);
  console.log(menuPosition);

  window.addEventListener("resize", () => {
    menuPosition = menu.offsetTop;
  });

  window.addEventListener("scroll", () => {
    if (window.scrollY >= menuPosition) {
      menu.classList.add("sticky");
    } else {
      menu.classList.remove("sticky");
    }
  });
});
