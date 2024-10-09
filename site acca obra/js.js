// Mostrar ou esconder o botão de voltar ao topo
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    let backToTopButton = document.querySelector(".back-to-top");
    if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
        backToTopButton.style.display = "flex";
    } else {
        backToTopButton.style.display = "none";
    }
}

// Voltar ao topo quando o botão for clicado
document.querySelector(".back-to-top").addEventListener("click", function(e) {
    e.preventDefault();
    window.scrollTo({ top: 0, behavior: 'smooth' });
});