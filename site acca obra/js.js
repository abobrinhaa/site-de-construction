// Mostrar ou esconder o botão de voltar ao topo
window.onscroll = function() {
    scrollFunction();
};

function scrollFunction() {
    let backToTopButton = document.querySelector(".back-to-top");
    if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
        backToTopButton.style.display = "flex";
    } else {
        backToTopButton.style.display = "none";
    }
}

// Voltar ao topo com scroll suave quando o botão for clicado
document.addEventListener("DOMContentLoaded", function () {
    const backToTopButton = document.querySelector(".back-to-top");

    if (backToTopButton) {
        backToTopButton.addEventListener("click", function (e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth' // Scroll suave para o topo da página
            });
        });
    }
});

// Esconde a barra de navegação após a primeira seção
window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.hero-header');
    const heroSection = document.querySelector('.hero');

    const heroBottom = heroSection.getBoundingClientRect().bottom;

    if (heroBottom <= 0) {
        navbar.classList.add('invisivel');
    } else {
        navbar.classList.remove('invisivel');
    }
});

document.addEventListener("DOMContentLoaded", function () {
    // Efeito de rolagem suave nos botões de navegação
    const buttons = document.querySelectorAll(".btn");
    buttons.forEach(button => {
        button.addEventListener("click", function (e) {
            e.preventDefault();
            const targetID = this.getAttribute("href");
            const targetSection = document.querySelector(targetID);
            window.scrollTo({
                top: targetSection.offsetTop - 70,
                behavior: "smooth"
            });
        });
    });

    // Efeito de rolagem nos links do menu
    const links = document.querySelectorAll(".nav-link");
    links.forEach(link => {
        link.addEventListener("click", function (e) {
            e.preventDefault();
            const targetID = this.getAttribute("href");
            const targetSection = document.querySelector(targetID);
            window.scrollTo({
                top: targetSection.offsetTop - 70,
                behavior: "smooth"
            });
        });
    });

    // Sincronização dos carrosseis
    const carousels = document.querySelectorAll('.projeto-carousel');
    if (carousels.length > 0) {
        let currentIndex = 0;
        const totalSlides = carousels[0].querySelectorAll('.carousel-item').length;

        function goToNextSlide() {
            currentIndex = (currentIndex + 1) % totalSlides;
            carousels.forEach(carousel => {
                const bsCarousel = bootstrap.Carousel.getInstance(carousel);
                if (bsCarousel) {
                    bsCarousel.to(currentIndex);
                }
            });
        }

        setInterval(goToNextSlide, 4000);

        carousels.forEach(carousel => {
            carousel.addEventListener('slide.bs.carousel', function (e) {
                currentIndex = e.to;
                carousels.forEach(syncCarousel => {
                    if (syncCarousel !== carousel) {
                        const bsCarousel = bootstrap.Carousel.getInstance(syncCarousel);
                        if (bsCarousel) {
                            bsCarousel.to(currentIndex);
                        }
                    }
                });
            });
        });
    }

    // Botão WhatsApp
    document.querySelector(".contact-form").addEventListener("submit", function(event) {
        event.preventDefault();
        emailjs.sendForm('service_2o3g29v', 'template_id', this)
            .then(function() {
                alert('Mensagem enviada com sucesso!');
            }, function(error) {
                alert('Erro ao enviar mensagem: ' + JSON.stringify(error));
            });
    });

    emailjs.init("A3XA7os2qylu8muCJ");
});

