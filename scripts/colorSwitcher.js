const toggleButton = document.getElementById('toggle-mode');
const body = document.body;
const colorModes = ['colorModeAntracit', 'colorModeBrown',  'colorModeRed'];

let currentModeIndex = 0;

// Funkce pro nastavení režimu
function setColorMode(mode) {

    colorModes.forEach(mode => body.classList.remove(mode));
    body.classList.add(mode);
}

// Režim při načítání stránky
const savedMode = localStorage.getItem('colorMode');
if (savedMode && colorModes.includes(savedMode)) {
    currentModeIndex = colorModes.indexOf(savedMode);
    setColorMode(savedMode);
} else {
    
    setColorMode(colorModes[currentModeIndex]);
}

// Kliknutí a přepnutí
if (toggleButton) {
    toggleButton.addEventListener('click', () => {
        currentModeIndex = (currentModeIndex + 1) % colorModes.length;

        const newMode = colorModes[currentModeIndex];
        setColorMode(newMode);

        localStorage.setItem('colorMode', newMode);

        console.log(`Aktuální režim: ${newMode}`);
    });
}
