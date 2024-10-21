
    window.addEventListener('scroll', function() {
        let scrollTop = window.scrollY || document.documentElement.scrollTop;
        let viewportHeight = window.innerHeight/5;
        let background = document.querySelector('.backgroundLogo');
        if (scrollTop > viewportHeight) {background.style.opacity = '0';  } else {background.style.opacity = '1'; }
    });


    window.addEventListener('scroll', function() {
        let scrollTop = window.scrollY || document.documentElement.scrollTop;
        let viewportHeight = window.innerHeight/100;
        let navigace = document.querySelector('.navbar');
        if (scrollTop > viewportHeight) {navigace.style.opacity = '0';  } else {navigace.style.opacity = '1'; }
    });