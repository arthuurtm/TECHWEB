console.log("Script carregado!");

const sections = document.querySelectorAll("section");

const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add("visible");
    }
  });
}, {
  threshold: 0.1
});

// Ativa o observer em todas as seções
sections.forEach(section => observer.observe(section));
