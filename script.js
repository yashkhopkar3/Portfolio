// ===== Typed.js setup =====
var typed = new Typed('#element', {
  strings: ['Software Developer', 'Data Analyst'],
  typeSpeed: 80,
  backSpeed: 50,
  loop: true,
});

// ===== Mobile Menu Toggle =====
const menuBtn = document.querySelector(".menu-btn");
const navLinks = document.querySelector(".nav-links");

menuBtn.addEventListener("click", () => {
  navLinks.classList.toggle("show");
  menuBtn.classList.toggle("active");

  // Change icon between bars & close
  const icon = menuBtn.querySelector("i");
  if (menuBtn.classList.contains("active")) {
    icon.classList.remove("fa-bars");
    icon.classList.add("fa-times");
  } else {
    icon.classList.remove("fa-times");
    icon.classList.add("fa-bars");
  }
});
