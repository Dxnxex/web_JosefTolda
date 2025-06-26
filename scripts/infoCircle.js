function startCounters() {
    const numbers = [
        { current: 17, max: new Date().getFullYear() - 1995,   interval: 1 , add:"" },
        { current: 70, max: 100,                                                interval: 3 , add:"+" },
        { current: 750, max: 1000,                                            interval: 27 , add:"+" }
    ];

    const counterElements = document.querySelectorAll(".counter");

    function incrementNumbers() {
        numbers.forEach((num, index) => {
            const intervalId = setInterval(() => {
                if (num.current < num.max) {
                    num.current += num.interval;
                    counterElements[index].textContent = num.current;
                } else {
                    clearInterval(intervalId);
                    counterElements[index].textContent = num.max + num.add;
                }
            }, 100);
        });
    }

    const observer = new IntersectionObserver((entries) => {
        if (entries[0].isIntersecting) {
            incrementNumbers();
            observer.unobserve(counterElements[0]);
        }
    }, { threshold: 0.5 });

    if (counterElements.length > 0) {
        observer.observe(counterElements[0]);
    }
}

startCounters();