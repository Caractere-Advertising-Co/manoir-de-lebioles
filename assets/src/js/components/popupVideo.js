document.addEventListener("DOMContentLoaded", function () {
  const video = document.getElementById("popup-video");
  const trigger = document.getElementById("triggerVideo");
  const closeVideo = document.getElementById("hideVideo");

  if (video) {
    trigger.addEventListener("click", function () {
      video.classList.add("show");
      console.warn("video is launch");
    });

    closeVideo.addEventListener("click", function () {
      video.classList.remove("show");
    });
  }
});
