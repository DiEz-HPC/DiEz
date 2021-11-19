export function imageUrl(imageName) {
    try {
        return require(`../images/${imageName}`)
    } catch (err) {
        return '';
    }
}
export function imageUploadUrl(imageName) {
    try {

        return window.location.origin + `/uploads/images/${imageName}`;

    } catch (err) {
        return '';
    }
}