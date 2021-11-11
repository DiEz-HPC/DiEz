function changeColorAccordingBackgroundColor(body, elementChange, colorsForChange = {}, notElements = []) {
    let color = 'rgb(255, 255, 255)';
    const allElements = [...document.getElementById(body).children[0].children];
    const positionElement = elementChange.getBoundingClientRect();
    let colors = [];
    allElements
        .filter(element =>
            element !== elementChange &&
            !notElements.includes(elementChange) &&
            positionElement.top >= element.getBoundingClientRect().top &&
            positionElement.top <= (element.getBoundingClientRect().top + element.getBoundingClientRect().height)
        )
        .map(element => {
            const selectors = [...element.querySelectorAll('*')];
            colors.push(window.getComputedStyle(element).backgroundColor);
            selectors
                .filter(selector =>
                    positionElement.top >= selector.getBoundingClientRect().top &&
                    positionElement.top <= (selector.getBoundingClientRect().top + selector.getBoundingClientRect().height) &&
                    positionElement.width >= selector.getBoundingClientRect().left &&
                    positionElement.width <= (selector.getBoundingClientRect().left + selector.getBoundingClientRect().width)
                )
                .map(selector => {
                    colors.push(window.getComputedStyle(selector).backgroundColor);

                    console.log(positionElement.left, element.getBoundingClientRect().left, selector.getBoundingClientRect().left);
                })

            for (let i = colors.length - 1; i >= 0; i--) {
                if (colors[i] !== 'rgba(0, 0, 0, 0)' && colors[i] !== 'rgb(255, 255, 255)') {
                    color = colors[i];
                    break;
                }
            }
        })
    color = color === 'rgb(255, 255, 255)' ? colorsForChange.light : colorsForChange.dark;
    return color;
}


window.onload = () => {
    window.onscroll = () => {
        const elements = [...document.getElementById('social').children];
        elements.map(element => {
            const color = changeColorAccordingBackgroundColor(
                'root',
                element,
                {
                    dark: 'rgb(0, 0, 0)',
                    light: '#56C6FF'
                },
            );

            if (element.tagName === 'A') {
                element.style.setProperty('background-color', color);
            }
            element.style.transition = 'color .4s'
            element.style.color = color;

        })
    };
};