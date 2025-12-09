document.querySelectorAll('.navbar a').forEach(link => {
  if (link.href === window.location.href) link.classList.add('active');
});
console.log("Welcome to Folusho Morafa’s personal website!");

document.addEventListener("DOMContentLoaded", () => {
  const filterButtons = document.querySelectorAll(".filter-btn");
  const projects = document.querySelectorAll(".project");

  filterButtons.forEach(button => {
    button.addEventListener("click", () => {
      // Update active button styling
      document.querySelector(".filter-btn.active")?.classList.remove("active");
      button.classList.add("active");

      const category = button.getAttribute("data-category");

      projects.forEach(project => {
        const projectCategory = project.getAttribute("data-category");

        // Show all or match category
        if (category === "all" || projectCategory === category) {
          project.style.display = "block";
        } else {
          project.style.display = "none";
        }
      });
    });
  });
});


// Apply fade-in to main section
document.addEventListener("DOMContentLoaded", () => {
  const main = document.querySelector("main");
  if (main) {
    main.classList.add("fade-in");
  }
});
