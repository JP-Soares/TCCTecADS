function abrirMenu() {
    document.querySelector(".menu-lateral").style.left = "0";
    document.getElementById("abrir-menu").style.display = "none";
    document.getElementById("fechar-menu").style.display = "block";
    document.getElementById("conteudo").style.marginLeft = "350px";
}

function fecharMenu() {
    document.querySelector(".menu-lateral").style.left = "-350px";
    document.getElementById("abrir-menu").style.display = "block";
    document.getElementById("fechar-menu").style.display = "none";
    document.getElementById("conteudo").style.marginLeft = "0";
}

document.getElementById("abrir-menu").addEventListener("click", abrirMenu);
document.getElementById("fechar-menu").addEventListener("click", fecharMenu);