function validarSenha(){
    const senha = document.getElementById("txtSenha");
    const spSenha = document.getElementById("spSenha");

    let senhaLength = senha.value.length;

    if(senhaLength < 8){
        spSenha.style.display = "block";
    }else if(senhaLength == 8){
        spSenha.style.display = "none";
    }
}

function confirmarSenha(){
    const senha = document.getElementById("txtSenha");
    const confirmaSenha = document.getElementById("txtConfirmaSenha");
    const spConfirmaSenha = document.getElementById("spConfirmaSenha");

    if(senha.value != confirmaSenha.value){
        spConfirmaSenha.style.display = "block";
    }else{
        spConfirmaSenha.style.display = "none";
    }
}

function validarDtNasc(){
    
    const campoData = document.getElementById("txtDtNasc");
    const spDtNasc = document.getElementById("spDtNasc");
    let dataNascimento = new Date(campoData.value);
    let dataAtual = new Date();
    
    // Adiciona 18 anos à data de nascimento
    dataNascimento.setFullYear(dataNascimento.getFullYear() + 18);
    
    if (dataNascimento <= dataAtual){
        spDtNasc.style.display = "none";
    }else{
        spDtNasc.style.display = "block";
    }   
}