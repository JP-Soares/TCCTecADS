<?php

session_start();

include_once("conexao.php");

$nome = mysqli_real_escape_string($con, trim($_POST['nome']));
$cpf = mysqli_real_escape_string($con, trim($_POST['cpf']));

$sexo = mysqli_real_escape_string($con, trim($_POST['sexo']));
$dtNasc = mysqli_real_escape_string($con, trim($_POST['dtNasc']));
$telefone = mysqli_real_escape_string($con, trim($_POST['telefone']));
$descricao = mysqli_real_escape_string($con, trim($_POST['descricao']));


$estado = mysqli_real_escape_string($con, trim($_POST['estado']));
$cidade = mysqli_real_escape_string($con, trim($_POST['cidade']));
$bairro = mysqli_real_escape_string($con, trim($_POST['bairro']));
$rua = mysqli_real_escape_string($con, trim($_POST['rua']));
$numero = mysqli_real_escape_string($con, trim($_POST['numero']));
$complemento = mysqli_real_escape_string($con, trim($_POST['complemento']));
$enfermidades = $_POST["enfermidades"];


//Verifica se o idoso a ser cadastrado já foi cadastrado no Banco de Dados
$verificar = mysqli_query($con, "SELECT * FROM idoso WHERE cpf='$cpf'");

if(mysqli_num_rows($verificar) == 0){
    $enfermidadesString = implode(", ",$enfermidades);
    if(isset($_FILES['fotoPerfil'])){//caso inserido foto no campo de foto
        $nomeArquivo = $_FILES['fotoPerfil']['name'];
        $caminhoAtualArquivo = $_FILES['fotoPerfil']['tmp_name'];
        $caminhoSalvar = 'assets/uploadImg/'.$nomeArquivo;
        move_uploaded_file($caminhoAtualArquivo, $caminhoSalvar);
        $pasta = "../uploadImg";
        $diretorio = dir($pasta);
    
        $sql = "INSERT INTO idoso (id_responsavel, nome, cpf, foto, sexo, dtNasc, descricao, telefone, estado, cidade, bairro, rua, numero, complemento, enfermidades) 
        VALUES ('".$_SESSION["id"]."', '$nome', '$cpf', '$caminhoSalvar', '$sexo', '$dtNasc', '$descricao', '$telefone', '$estado', '$cidade', '$bairro', '$rua', 
        '$numero', '$complemento', '$enfermidadesString')";
    }else{//caso não tenha inserido foto no campo de foto
        $sql = "INSERT INTO idoso (id_responsavel, nome, cpf, sexo, dtNasc, descricao, telefone, estado, cidade, bairro, rua, numero, complemento, enfermidades) 
        VALUES ('".$_SESSION["id"]."', '$nome', '$cpf', '$sexo', '$dtNasc', '$descricao', '$telefone', '$estado', '$cidade', '$bairro', '$rua', 
        '$numero', '$complemento', '$enfermidadesString')";
    }

    if($con->query($sql) == true){
        header('Location: ../../idosos.php');
    }

}else{
    $_SESSION['msgErro'] = "Idoso já cadastrado!";
    header('Location: ../../idosos.php');
}

?>