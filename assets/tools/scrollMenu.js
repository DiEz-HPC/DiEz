let prevScrollpos = window.pageYOffset;

export function scrollMenu(){
  const header = document.getElementById("header");
  let currentScrollPos = window.pageYOffset;
// Si la position actuelle est dans la premiere vue (100vh)
  if (currentScrollPos <= window.innerHeight) {
    // Si la position actuelle est differente du point d'origine (Haut de page)
    if (currentScrollPos > 0) {
     
      if (!header.classList.contains("header-dark")) {
        header.classList.add("header-dark");
      }
      // Si on revien au point d'origne
    } else {
      if (header.classList.contains("header-dark")) {
        header.classList.remove("header-dark");
      }
      header.style.setProperty("top", "0");
    }
    // Si scroll up en dehors de la premiere vue
  } else {
    // Si scroll up
    if (prevScrollpos > currentScrollPos) {
      if (!header.classList.contains("header-dark")) {
        header.classList.add("header-dark");
      }
    // Si scroll down
    } else {
      header.classList.remove("header-dark");
      header.style.setProperty("top", "-150px");
    }
  }
  prevScrollpos = currentScrollPos;
}

