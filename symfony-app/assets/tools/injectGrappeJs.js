export default function handleStyleSheet() {
    const actualLink = document.querySelectorAll('link');
    // On trie pour récupérer uniquement les liens vers les css
    const cssLink = [];
    actualLink.forEach((link) => {
        if (link.href.includes('.css')) {
            cssLink.push(link.href);
        }
    });

    const actualScripts = document.querySelectorAll('script');
    const jsLink = [];
    actualScripts.forEach((script) => {
        if (script.src.includes('.js')) {
            jsLink.push(script.src);
        }
    });
    // On inject le script de grapesJs
    const grapesJs = document.createElement('script');
    grapesJs.src = 'https://unpkg.com/grapesjs@0.20.3/dist/grapes.min.js';
    document.body.appendChild(grapesJs);

    // On inject le script du plugin de block de base
    const grapesJsBlockPlugin = document.createElement('script');
    grapesJsBlockPlugin.src =
        'https://unpkg.com/grapesjs-blocks-basic@1.0.1/dist/index.js';
    document.body.appendChild(grapesJsBlockPlugin);

    // On inject le script du plugin d'export
    const exportPlugin = document.createElement('script');
    exportPlugin.src =
        'https://unpkg.com/grapesjs-plugin-export@1.0.11/dist/index.js';
    document.body.appendChild(exportPlugin);

    // On inject le style de grapesJs
    const grapesJsStyle = document.createElement('link');
    grapesJsStyle.rel = 'stylesheet';
    grapesJsStyle.href =
        'https://unpkg.com/grapesjs@0.20.3/dist/css/grapes.min.css';
    document.head.appendChild(grapesJsStyle);

    grapesJs.onload = () => {
        const editor = grapesjs.init({
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
            plugins: ['gjs-blocks-basic', 'grapesjs-plugin-export'],
            pluginsOpts: {
                'grapesjs-plugin-export': {
                    addExportBtn: true,
                    btnLabel: 'Export',
                },
            },
            canvas: {
                styles: cssLink,
                scripts: jsLink,
            },
        });
        editor.Panels.addButton('options', [
            {
                id: 'save',
                className: 'fa fa-floppy-o icon-blank',
                command: function () {
                    editor.runCommand('gjs-export-zip')
                },
                attributes: { title: 'Exporter template' },
            },
        ]);
    };
}
