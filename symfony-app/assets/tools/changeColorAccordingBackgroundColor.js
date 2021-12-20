function changeColorAccordingBackgroundColor(
  elementChange,
  body,
  colorsForChange = {},
  notElements = []
) {
  let color = "rgb(255, 255, 255)";
  const allElements = [...document.getElementById(body).querySelectorAll("*")];
  const positionElement = elementChange.getBoundingClientRect();
  let colors = [];

  // On filtre les éléments
  allElements.filter(
      (element) =>
      // On vérifie que l'élément actuel n'est pas l'élément a changer.
        element !== elementChange &&
        // On vérifie que l'élément actuel n'est pas dans la liste des éléments à ne pas changer.
        !notElements.includes(element) &&
        // On vérifie que l'élément actuel est dans la zone de l'élément à changer.
        positionElement.top >= element.getBoundingClientRect().top &&
        positionElement.top <=
          element.getBoundingClientRect().top +
            element.getBoundingClientRect().height &&
        positionElement.width >= element.getBoundingClientRect().left &&
        positionElement.width <=
          element.getBoundingClientRect().left + 
            element.getBoundingClientRect().width
    )
    .map((element) => {
      colors.push(window.getComputedStyle(element).backgroundColor);
      for (let i = colors.length - 1; i >= 0; i--) {
        if (
          colors[i] !== "rgba(0, 0, 0, 0)" &&
          colors[i] !== "rgb(255, 255, 255)"
        ) {
          color = colors[i];
          break;
        }
      }
    });
  color =
    color === "rgb(255, 255, 255)"
      ? colorsForChange.dark
      : colorsForChange.light;
  return color;
}

export function initChangeColor(
  element,
  style = {},
  notElements = [],
  parent = "root",
  dark = "rgb(0, 0, 0)",
  light = "rgb(255, 255, 255)",
  transition = "0.2s"
) {
  const transitionStyle = "color " + transition;
  const elements = [...element.querySelectorAll("*")];
  elements.map((element) => {
    const color = changeColorAccordingBackgroundColor(
      element,
      parent,
      {
        dark: dark,
        light: light,
      },
      notElements
    );
    for (let property in style) {
      if (color !== element.style[property])
      element.style[property] = color;
    }
    if (element.style.transition !== transitionStyle) {
      element.style.transition = transitionStyle;
    }
  });
}
