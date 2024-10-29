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
loadFragment('fragments/navigace.html', 'navigace', initializeColorSwitcher);
loadFragment('fragments/footer.html', 'footer');
loadFragment('fragments/head.html', 'head');

    //Index
    loadFragment('fragments/index/logo.html', 'logo');
    loadFragment('fragments/index/signature.html', 'signature');
    loadFragment('fragments/index/indexSluzby.html', 'indexSluzby');

