document.addEventListener("DOMContentLoaded", function() {
    // Agrega un retraso de 3 segundos antes de inicializar el Swiper
    setTimeout(function() {
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 1,
            spaceBetween: 10,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            loop: true,
            speed: 1000,
            autoplay: {
                delay: 1000,
                disableOnInteraction: false,
            },
            effect: 'coverflow',
            coverflowEffect: {
                rotate: 30,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: true,
            },
        });
    }, 3000); // 3000 milisegundos (3 segundos)
});
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

function mostrarLista() {
    const collapseElement = document.getElementById('collapseWidthExample');
    const isCollapsed = !collapseElement.classList.contains('show');

    if (isCollapsed) {
        collapseElement.classList.add('show');
    } else {
        collapseElement.classList.remove('show');
    }
}

function showTooltip(button) {
    const tooltip = button.querySelector('.tooltip-text');
    tooltip.style.visibility = 'visible';
    tooltip.style.opacity = '1';
}

function hideTooltip(button) {
    const tooltip = button.querySelector('.tooltip-text');
    tooltip.style.visibility = 'hidden';
    tooltip.style.opacity = '0';
}
