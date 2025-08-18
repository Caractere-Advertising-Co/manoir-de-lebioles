for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function () {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }

    // Après l'animation (ou direct si instantané) rafraîchir les triggers
    setTimeout(() => {
      ScrollTrigger.refresh();
    }, 300); // petit délai si tu veux laisser la transition CSS/JS s’appliquer
  });
}
