document.addEventListener("DOMContentLoaded", function () {
  const video = document.getElementById("popup-video");
  const trigger = document.getElementById("triggerVideo");

  trigger.addEventListener("click", function () {
    video.classList.add("show");
    console.warn("video is launch");
  });
});
