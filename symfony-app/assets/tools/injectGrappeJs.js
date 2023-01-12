export default function injectGrappeJs() {
    const grapesJs = document.createElement('script');
    grapesJs.src = 'https://unpkg.com/grapesjs@0.20.3/dist/grapes.min.js';
    document.body.appendChild(grapesJs);
    // On inject le style de grapesJs
    const grapesJsStyle = document.createElement('link');
    grapesJsStyle.rel = 'stylesheet';
    grapesJsStyle.href = 'https://unpkg.com/grapesjs@0.20.3/dist/css/grapes.min.css';
    document.head.appendChild(grapesJsStyle);

    grapesJs.onload = () => {
        
            grapesjs.init({
                // Indicate where to init the editor. You can also pass an HTMLElement
                container: '#gjs',
                // Get the content for the canvas directly from the element
                // As an alternative we could use: `components: '<h1>Hello World Component!</h1>'`,
                fromElement: true,
                // Size of the editor
                height: '100vh',
                width: '100vw',
                // Disable the storage manager for the moment
                storageManager: false,
                // Avoid any default panel
                //  panels: { defaults: [] },
                // load css file from /public/uploads/templates/unziped/
                                
            });
       
    };
}