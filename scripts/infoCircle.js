let numbers = [
    { current: 17, max: 28, interval: 1 , add:""},
    { current: 70, max: 100, interval: 3 , add:"+"},
    { current: 750, max: 1000, interval: 27 , add:"+"}
];


const counterElements = document.querySelectorAll(".counter");

//FUNKCE PRO ZVYŠOVÁNÍ VŠECH KRUHŮ
function incrementNumbers() {
    numbers.forEach((num, index) => {
        const intervalId = setInterval(() => {
            if (num.current < num.max) {
                num.current += num.interval; 
                counterElements[index].textContent = num.current; 
            } else {
                clearInterval(intervalId); counterElements[index].textContent = num.max+num.add; 
            }
        }, 100 );
    });
}



//FUNKCE PRO ZJIŠTĚNÍ POZICE UŽIVATELE
const observer = new IntersectionObserver((entries) => {
    if (entries[0].isIntersecting) {
        incrementNumbers();
        observer.unobserve(counterElements[0]); 
    }
}, { threshold: 0.5 }); 

observer.observe(counterElements[0]); 

