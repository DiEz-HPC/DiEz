export function themeVariables() {
    fetch(
        `/api/v2/themes/active`,
        {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                accept: 'application/json',
            },
        }
    )
        .then(response => response.json())
        .then(data => {
            const {primaryColor, secondaryColor, darkColor, lightColor} = data;
            let root = document.documentElement;
            root.style.setProperty('--primaryColor', primaryColor);
            root.style.setProperty('--secondaryColor', secondaryColor);
            root.style.setProperty('--darkColor', darkColor);
            root.style.setProperty('--lightColor', lightColor);
        });
}


