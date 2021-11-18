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
  allElements
    .filter(
      (element) =>
        element !== elementChange &&
        !notElements.includes(element) &&
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
