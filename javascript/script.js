document.querySelectorAll('.navbar a').forEach(link => {
  if (link.href === window.location.href) link.classList.add('active');
});
console.log("Welcome to Folusho Morafa’s personal website!");
