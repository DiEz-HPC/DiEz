export function displayArrow(id) {
    const arrow = document.getElementById(id);
     if(arrow){
        if (window.pageYOffset === 0) {
            arrow.style.visibility = 'visible';
            arrow.style.opacity = '35%'
        } else {
            arrow.style.visibility = 'hidden';
            arrow.style.opacity= '0';
        }
    }
}
