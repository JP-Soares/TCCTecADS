function formatCpf(){

    const cpf = document.getElementById("txtCpf");

    let cpfLength = cpf.value.length;
    if(cpfLength == 3 || cpfLength == 7){
        cpf.value += ".";
    }else if(cpfLength === 11){
        cpf.value += "-";
    }
}

function formatTel(){
    const telefone = document.getElementById("txtTel");

    let telefoneLength = telefone.value.length;
    
    if(telefoneLength === 0){
        telefone.value += "(";
    }else if(telefoneLength === 3){
        telefone.value += ")";
    }else if(telefoneLength === 8){
        telefone.value += "-";
    }
}