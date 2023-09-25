document.addEventListener('DOMContentLoaded', function () {
    var mySwiper = new Swiper('.swiper-container', {
        loop: true, // Ativar loop infinito
        autoplay: {
            delay: 3000, // Tempo de cada slide em milissegundos (3 segundos)
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true, // Permitir clicar nos pontos para navegar
        },
    });
});
