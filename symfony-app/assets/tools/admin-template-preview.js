import axios from 'axios';
import handleStyleSheet from './injectGrappeJs';

window.addEventListener('DOMContentLoaded', () => {
    const buttons = document.querySelectorAll('.admin-template-preview');
    buttons.forEach((button) => {
        button.addEventListener('click', (event) => handleClick(event, button));
    });
});

const handleClick = async (event, button) => {
    event.preventDefault();
    let tr = getParent(button);
    let dataId = getDataId(tr);
    let indexPath = await requestController(dataId).then((data) => {
        createModal(tr, data);
    });
};

const getParent = (button) => {
    return button.closest('tr');
};
const getDataId = (tr) => {
    return tr.dataset.id;
};

async function requestController(dataId) {
    try {
        const response = await axios.get(
            `/admin/service/templatePreview/${dataId}`
        );
        return response.data;
    } catch (error) {
        console.error(error, 'error');
    }
}

const createModal = (parent, indexPath) => {
    let modal = document.createElement('div');
    modal.classList.add('modal');
    modal.innerHTML = `
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Prévisualisation</h5>
            <button id="editButton" type="button" class="btn btn-success ms-5">ÉDITER</button>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="iframe"></div>
        </div>
      </div>
    </div>  
    `;
    parent.appendChild(modal);
    loadIframe(modal, indexPath);
    modal.style.display = 'block';
    modal.addEventListener('click', (event) => {
        if (event.target.closest('.btn-close')) {
            modal.remove();
        }
    });
};

const loadIframe = (modal, indexPath) => {
    const iframeDiv = modal.querySelector('.iframe');
    iframeDiv.innerHTML = `
        <iframe src="${indexPath}" frameborder="0"></iframe>
    `;
    const iframe = iframeDiv.querySelector('iframe');

    iframe.addEventListener('load', () => {
        const body = iframe.contentWindow.document.querySelector('body');
        body.id = 'gjs';
        modal.querySelector('#editButton').addEventListener('click', () => {
            injectScript(iframe);
        });
    });
};

const injectScript = (iframe) => {
    const handleStyleSheetScript =
        iframe.contentWindow.document.createElement('script');
    const handleStyleSheetScriptContent = handleStyleSheet.toString();
    handleStyleSheetScript.innerHTML = handleStyleSheetScriptContent;
    iframe.contentWindow.document.body.appendChild(handleStyleSheetScript);

    const handleStyleSheetInit =
        iframe.contentWindow.document.createElement('script');
    handleStyleSheetInit.innerHTML = 'handleStyleSheet()';
    iframe.contentWindow.document.body.appendChild(handleStyleSheetInit);
};
