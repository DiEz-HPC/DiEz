import $ from 'jquery';


/**
 *  README
 * 
 * 
 * CookieConsent utilise l'extension matomo : Ajax Opt Out
 * 
 * Pour le faire fonctionner : 
 *  - Ajouter le template twig ' __cookieConsent.html.twig ' dans le base.html.twig
 *  - Importer la fonction cookieConsentButton() dans app.js et initialisez le fonction
 *  - Modifier la constante piwikServerUrl vers votre serveur matomo
 *  - Importer le ficher cookieConsent.scss dans app.scss
 *  
 */

 const piwikServerUrl = 'https://www.matomo.deviteasy.fr/';
 var piwikAjaxOptOutIsTracked = true;

export default function cookieConsentButton() {
    var cookieConsent = document.getElementById('cookieConsent');
    var cookieConsentAccept = document.getElementById(
        'cookieConsentButtonAccept'
    );
    var cookieConsentMore = document.getElementById('cookieConsentButtonMore');
    var cookieConsentDeny = document.getElementById('cookieConsentButtonDeny');
    if (getWithExpiry('cookieConsent') === null ) {
        cookieConsent.style.display = 'block';
        cookieConsentAccept.addEventListener('click', () => {
            cookieConsent.style.display = 'none';
           setWithExpiry('cookieConsent', true, 6.048e+8) // On sauvegarde pour une semaine
        });
        cookieConsentMore.addEventListener('click', () => {
            window.location.href = '/mentions-legales';
        });
        cookieConsentDeny.addEventListener('click', () => {
            var cookieOption = document.getElementById('cookieOption');
            var cookieOptionStyle = cookieOption.style;
            if (cookieOptionStyle.display === 'none') {
                cookieOptionStyle.display = 'block';
            }
           setWithExpiry('cookieConsent', false, 6.048e+8) // On sauvegarde pour une semaine
            userCookieOptions();
        });
    }
}


function userCookieOptions() {
    var matomoSwitch = document.getElementById('matomoSwitch');
    var saveChoise = document.getElementById('cookieSaveChoise');

    getInitialStatus();

    saveChoise.addEventListener('click', () => {
        document.getElementById('cookieConsent').style.display = 'none';
        if (matomoSwitch.checked) {
            piwikAjaxOptOutTrack();
        } else {
            piwikAjaxOptOutUntrack();
        }
    });
}

/**
 *  Save in localStorage
 */
 function setWithExpiry(key, value, ttl) {
    const now = new Date()

    // `item` is an object which contains the original value
    // as well as the time when it's supposed to expire
    const item = {
        value: value,
        expiry: now.getTime() + ttl,
    }
    localStorage.setItem(key, JSON.stringify(item))
}

/**
 * Load from local storage 
 */
function getWithExpiry(key) {
    const itemStr = localStorage.getItem(key)

    // if the item doesn't exist, return null
    if (!itemStr) {
        return null
    }

    const item = JSON.parse(itemStr)
    const now = new Date()

    // compare the expiry time of the item with the current time
    if (now.getTime() > item.expiry) {
        // If the item is expired, delete the item from storage
        // and return null
        localStorage.removeItem(key)
        return null
    }
    return item.value
}

/**
 * Activate tracking for the user.
 */
function piwikAjaxOptOutTrack() {
    $.ajax({
        url:
            piwikServerUrl +
            'index.php?module=API&method=AjaxOptOut.doTrack&format=json',
        jsonp: 'callback',
        dataType: 'jsonp',
        success: function (d) {
            piwikAjaxOptOutIsTracked = true;
            updateText();
        },
    });
}

/**
 * Deactivate tracking for the user.
 */
function piwikAjaxOptOutUntrack() {
    $.ajax({
        url:
            piwikServerUrl +
            'index.php?module=API&method=AjaxOptOut.doIgnore&format=json',
        jsonp: 'callback',
        dataType: 'jsonp',
        success: function (d) {
            piwikAjaxOptOutIsTracked = false;
            updateText();
        },
    });
}
/**
 * Get the inital status from matomo
 */
function getInitialStatus() {
    $.ajax({
        url:
            piwikServerUrl +
            'index.php?module=API&method=AjaxOptOut.isTracked&format=json',
        jsonp: 'callback',
        dataType: 'jsonp',
        success: function (d) {
            piwikAjaxOptOutIsTracked = d.value;
            updateText();
        },
    });
}

/**
 * Update status text by tracking status.
 */
function updateText() {
    if (piwikAjaxOptOutIsTracked === true) {
        $('#status span').hide();
        $('#matomoSwitch').prop('checked', true)
    } else {
        $('#status span').show();
        $('#matomoSwitch').prop('checked', false)
    }
}

