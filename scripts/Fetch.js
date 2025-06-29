// fetch.js
function loadFragment(url, targetId, callback) {
    fetch(url)
        .then(response => {
            if (!response.ok) throw new Error(`Error loading fragment: ${url}`);
            return response.text();
        })
        .then(html => {
            document.getElementById(targetId).innerHTML = html;
            if (callback) callback();
        })
        .catch(error => console.error(error));
}

//Fragmenty
loadFragment('fragments/head.html', 'head');
loadFragment('fragments/navigace.html', 'navigace', initializeColorSwitcher);
loadFragment('fragments/footer.html', 'footer');

    //Index
    loadFragment('fragments/logo.html', 'logo');
    loadFragment('fragments/signature.html', 'signature');
    loadFragment('fragments/sluzby.html', 'sluzby');
    loadFragment('fragments/reference.html', 'reference');
    loadFragment('fragments/kontakt.html', 'kontakt');
    loadFragment('fragments/partneri.html', 'partneri');
    loadFragment('fragments/infoKruhy.html', 'infoKruhy', startCounters);