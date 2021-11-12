let prevScrollpos = window.pageYOffset;

export function scrollMenu() {
    const header = document.getElementById("header");
    const menu = document.getElementById("menu");
    let currentScrollPos = window.pageYOffset;
// Si la position actuelle est dans la premiere vue (100vh)
    if (!menu.classList.contains('open'))
    {
        if (currentScrollPos <= window.innerHeight) {
            // Si la position actuelle est differente du point d'origine (Haut de page)
            if (currentScrollPos > 0) {
                if (!header.classList.contains("header-dark")) {
                    header.classList.add("header-dark");
                }
                if (header.classList.contains("header-hidden")){
                    header.classList.remove("header-hidden");
                }
                // Si on revien au point d'origne
            } else {
                if (header.classList.contains("header-dark")) {
                    header.classList.remove("header-dark");
                }
                if (header.classList.contains("header-hidden")){
                    header.classList.remove("header-hidden");
                }
            }
            // Si scroll up en dehors de la premiere vue
        } else {
            // Si scroll up
            if (prevScrollpos > currentScrollPos) {
                if (!header.classList.contains("header-dark")) {
                    header.classList.add("header-dark");
                }
                if (header.classList.contains("header-hidden")){
                    header.classList.remove("header-hidden");
                }
                // Si scroll down
            } else if (prevScrollpos !== 0 && prevScrollpos !== currentScrollPos) {
                header.classList.remove("header-dark");
                header.classList.add("header-hidden");
            } else {
                if (!header.classList.contains("header-dark")) {
                    header.classList.add("header-dark");
                }
            }
        }
        prevScrollpos = currentScrollPos;
    }
}

