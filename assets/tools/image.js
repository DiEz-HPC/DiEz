export function imageUrl(imageName) {
    try {
        return require(`../images/${imageName}`)
    } catch (err) {
        return '';
    }
}