document.addEventListener('DOMContentLoaded', function () {
    var menuToggle = document.querySelector('.site-nav button');
    var menuClose = document.querySelector('.menu-close');
    var mobileMenu = document.querySelector('.menu__mobile');

    // Abre el menú móvil
    if (menuToggle && mobileMenu) {
        menuToggle.addEventListener('click', function () {
            mobileMenu.classList.add('open');
        });
    }

    // Cierra el menú móvil
    if (menuClose) {
        menuClose.addEventListener('click', function () {
            mobileMenu.classList.remove('open');
        });
    }
    
    // Cierra el menú móvil si se hace clic fuera de él
    document.addEventListener('click', function (event) {
        if (!mobileMenu.contains(event.target) && !menuToggle.contains(event.target) && mobileMenu.classList.contains('open')) {
            mobileMenu.classList.remove('open');
        }
    });
});

