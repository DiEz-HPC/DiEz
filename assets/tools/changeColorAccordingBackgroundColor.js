function changeColorAccordingBackgroundColor(
    elementChange,
    body,
    colorsForChange = {},
    notElements = []
) {
    let color = 'rgb(255, 255, 255)';
    const allElements = [...document.getElementById(body).querySelectorAll('*')];
    const positionElement = elementChange.getBoundingClientRect();
    let colors = [];
    allElements
        .filter(
            (element) =>
                element !== elementChange &&
                !notElements.includes(elementChange) &&
                positionElement.top >= element.getBoundingClientRect().top &&
                positionElement.top <=element.getBoundingClientRect().top + element.getBoundingClientRect().height &&
                positionElement.width >=element.getBoundingClientRect().left &&
                positionElement.width <=element.getBoundingClientRect().left + element.getBoundingClientRect().width
        )
        .map((element) => {
            colors.push(window.getComputedStyle(element).backgroundColor);
            for (let i = colors.length - 1; i >= 0; i--) {
                if (
                    colors[i] !== 'rgba(0, 0, 0, 0)' &&
                    colors[i] !== 'rgb(255, 255, 255)'
                ) {
                    color = colors[i];
                    break;
                }
            }
        });
    color = color === 'rgb(255, 255, 255)' ? colorsForChange.dark : colorsForChange.light;
    return color;
}

function initChangeColor(
    element,
    parent = 'root',
    dark = 'rgb(0, 0, 0)',
    light = 'rgb(255, 255, 255)',
    transition = '0.2s'
) {
    const elements = [...element.querySelectorAll('*')];
    elements.map((element) => {
        const color = changeColorAccordingBackgroundColor(element, parent, {
            dark: dark,
            light: light,
        });
        element.style.transition = 'color ' + transition;
        element.style.color = color;
    });
}

window.onload = () => {
    window.onscroll = () => {
        initChangeColor(document.getElementById('social'));
    };
};
