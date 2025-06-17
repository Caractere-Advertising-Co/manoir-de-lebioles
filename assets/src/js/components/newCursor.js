
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