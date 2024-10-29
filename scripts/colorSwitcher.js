// colorSwitcher.js

const body = document.body;
const colorModes = ['colorModeAntracit', 'colorModeBrown', 'colorModeRed'];
let currentModeIndex = 0;

function setColorMode(mode) {
    colorModes.forEach(m => body.classList.remove(m));
    body.classList.add(mode);
}

function initializeColorSwitcher() {
    const toggleButton = document.getElementById('toggle-mode');

        //INIT
        const savedMode = localStorage.getItem('colorMode');
        if (savedMode && colorModes.includes(savedMode)) {
            currentModeIndex = colorModes.indexOf(savedMode);
            setColorMode(savedMode);
        } else {
            setColorMode(colorModes[currentModeIndex]);
        }

        //EVENT LISTENER
        if (toggleButton) {
            toggleButton.addEventListener('click', () => {
                currentModeIndex = (currentModeIndex + 1) % colorModes.length;
                const newMode = colorModes[currentModeIndex];
                setColorMode(newMode);
                localStorage.setItem('colorMode', newMode);
                console.log(`Current mode: ${newMode}`);
            })
            ;
        }

    
}
