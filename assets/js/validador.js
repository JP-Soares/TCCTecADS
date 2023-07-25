let valida = [];

console.log(valida[0], valida[1], valida[2]);

const form = document.getElementById("form");

function validarSenha(){
    const senha = document.getElementById("txtSenha");
    const spSenha = document.getElementById("spSenha");

    let senhaLength = senha.value.length;

    if(senhaLength < 8){
        spSenha.style.display = "block";
        valida[0] = false;
    }else if(senhaLength == 8){
        spSenha.style.display = "none";
        valida[0] = true
    }

    
}

function confirmarSenha(){
    const senha = document.getElementById("txtSenha");
    const confirmaSenha = document.getElementById("txtConfirmaSenha");
    const spConfirmaSenha = document.getElementById("spConfirmaSenha");

    if(senha.value != confirmaSenha.value){
        spConfirmaSenha.style.display = "block";
        valida[1] = false;
    }else{
        spConfirmaSenha.style.display = "none";
        valida[1] = true
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
        valida[2] = true;
    }else{
        spDtNasc.style.display = "block";
        valida[2] = false;
    }
}

form.addEventListener('submit', (event)=>{
    event.preventDefault();
    validarSenha();
    confirmarSenha();
    validarDtNasc();

    if(valida[0] == true && valida[1] == true && valida[2] == true){
        form.submit();
    }
});