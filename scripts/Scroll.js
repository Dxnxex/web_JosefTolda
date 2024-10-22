//LOGO
window.addEventListener('scroll', function() {
let scrollTop = window.scrollY || document.documentElement.scrollTop;
let viewportHeight = window.innerHeight / 5;
let background = document.querySelector('.backgroundLogo');

//Nekliknutí v případě, že je schovaný
if (scrollTop > viewportHeight) {
    background.style.opacity = '0'; 
    background.style.pointerEvents = 'none'; // Zakázat kliknutí
} else {
    background.style.opacity = '1'; 
    background.style.pointerEvents = 'auto'; // Povolit kliknutí
}
});




window.addEventListener('scroll', function() {
    let scrollTop = window.scrollY || document.documentElement.scrollTop;
    let viewportHeight = window.innerHeight/100;
    let navigace = document.querySelector('.navbar');
    if (scrollTop > viewportHeight) {navigace.style.opacity = '0';  } else {navigace.style.opacity = '1'; }
});