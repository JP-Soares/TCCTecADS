<?php

session_start();

include_once("conexao.php");

$nome = mysqli_real_escape_string($con, trim($_POST['nome']));
$cpf = mysqli_real_escape_string($con, trim($_POST['cpf']));
$registroProfissional = mysqli_real_escape_string($con, trim($_POST['registroProfissional']));
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

$email = mysqli_real_escape_string($con, trim($_POST['email']));
$senhaConfirma = mysqli_real_escape_string($con, trim($_POST['confirmaSenha']));

$verificar = mysqli_query($con, "SELECT * from cuidador where email='$email' OR cpf='$cpf'");

if(mysqli_num_rows($verificar) == 1){
        
    if(isset($_FILES['fotoPerfil'])){
        $nomeArquivo = $_FILES['fotoPerfil']['name'];
        $caminhoAtualArquivo = $_FILES['fotoPerfil']['tmp_name'];
        $caminhoSalvar = '../uploadImg/'.$nomeArquivo;
        move_uploaded_file($caminhoAtualArquivo, $caminhoSalvar);
        $pasta = "../uploadImg";
        $diretorio = dir($pasta);
        
        $sql = mysqli_query($con, "UPDATE cuidador SET nome='$nome', cpf='$cpf', foto='$caminhoSalvar', registroProfissional='$registroProfissional', sexo='$sexo', dtNasc='$dtNasc', 
        descricao='$descricao', telefone='$telefone', email='$email', senha='$senhaConfirma', estado='$estado', cidade='$cidade', bairro='$bairro', rua='$rua', numero='$numero', 
        complemento='$complemento' WHERE id_cuidador=".$_SESSION["id_cuidador"]);

        header('Location: ../../perfilPessoal.php');
    }else{
        $sql = mysqli_query($con, "UPDATE cuidador SET nome='$nome', cpf='$cpf', registroProfissional='$registroProfissional', sexo='$sexo', dtNasc='$dtNasc', 
        descricao='$descricao', telefone='$telefone', email='$email', senha='$senhaConfirma', estado='$estado', cidade='$cidade', bairro='$bairro', rua='$rua', numero='$numero', 
        complemento='$complemento' WHERE id_cuidador=".$_SESSION["id_cuidador"]);

        header('Location: ../../perfilPessoal.php');
    }
}

?>