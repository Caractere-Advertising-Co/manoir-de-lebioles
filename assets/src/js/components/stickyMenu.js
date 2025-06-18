document.addEventListener("DOMContentLoaded", function () {
  const header = document.getElementById("main-header");
  const trigger = document.getElementById("sticky-trigger");

  const observer = new IntersectionObserver(
    ([entry]) => {
      if (!entry.isIntersecting) {
        header.classList.add("sticky");
      } else {
        header.classList.remove("sticky");
      }
    },
    {
      rootMargin: "0px",
      threshold: 0,
    }
  );

  observer.observe(trigger);
});
