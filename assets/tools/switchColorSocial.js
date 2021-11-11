window.onload = () => {
    console.log(document.getElementsByClassName('background-blue'))
    const backElements = document.getElementsByClassName('background-blue');
    const arrayBackElements = [ ...backElements]

    window.onscroll = () => {
        const social = document.getElementById('social');
        const socialPositionTop = social.offsetTop;
        
        arrayBackElements.map(element => {
            let elementPositionTop =  element.offsetTop;
            let elementPositionBottom = element.offsetTop + element.offsetHeight;
            // Dans un element bleu
            if(socialPositionTop > elementPositionTop && socialPositionTop < elementPositionBottom){ 
               const bgElement = window.getComputedStyle(element).backgroundColor;
                social.style.setProperty('color', bgElement)  
                social.style.setProperty('mix-blend-mode', 'difference') 
            }else{// Dans un element blanc
                social.style.setProperty('color', '#0000')
            }
        })
    }
        











/*
    
    let elements = document.getElementById('root').children;
    elements = [...elements[0].children];
    const testSocial = document.getElementById('testSocial');
    const social = document.getElementById('social');
    const menu = document.getElementById('menu');
    window.onscroll = () => {
        const socialPosition = social.off;
        console.log(socialPosition);
        elements
            .filter(element => element !== testSocial && element !== social && element !== menu)
            .map(element => {
                
            })
    }
    */
}
