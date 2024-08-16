document.addEventListener('DOMContentLoaded', function () {
    var menuToggle = document.querySelector('.site-nav button');
    var menuClose = document.querySelector('.menu-close');
    var mobileMenu = document.querySelector('.menu__mobile');
    var menuItems = document.querySelectorAll('.menu__mobile .menu li.menu-item-has-children > a');

    if (menuToggle && mobileMenu) {
        menuToggle.addEventListener('click', function () {
            mobileMenu.classList.add('open');
        });
    }

    if (menuClose) {
        menuClose.addEventListener('click', function () {
            mobileMenu.classList.remove('open');
        });
    }
    
    document.addEventListener('click', function (event) {
        if (!mobileMenu.contains(event.target) && !menuToggle.contains(event.target) && mobileMenu.classList.contains('open')) {
            mobileMenu.classList.remove('open');
        }
    });

    menuItems.forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault(); // Evita que el enlace redirija

            const parentLi = this.parentElement;

            // Alterna la clase 'open'
            parentLi.classList.toggle('open');

            // Cierra otros submenús si no es el actual
            const otherOpenItems = document.querySelectorAll('.menu__mobile .menu li.open');
            otherOpenItems.forEach(openItem => {
                if (openItem !== parentLi) {
                    openItem.classList.remove('open');
                }
            });
        });
    });

});