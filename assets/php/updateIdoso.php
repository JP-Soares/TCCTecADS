<?php

session_start();

include_once("conexao.php");

$idIdoso = $_GET["idIdoso"];

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



$enfermidadesString = implode(", ",$enfermidades);

if(isset($_FILES['fotoPerfil'])){//caso inserido foto no campo de foto
    $nomeArquivo = $_FILES['fotoPerfil']['name'];
    $caminhoAtualArquivo = $_FILES['fotoPerfil']['tmp_name'];
    $caminhoSalvar = 'assets/uploadImg/'.$nomeArquivo;
    move_uploaded_file($caminhoAtualArquivo, $caminhoSalvar);
    $pasta = "../uploadImg";
    $diretorio = dir($pasta);
    
    $queryUpdateIdoso = mysqli_query($con, "UPDATE idoso SET nome='$nome', cpf='$cpf', sexo='$sexo', dtNasc='$dtNasc', descricao='$descricao',
    telefone='$telefone', estado='$estado', cidade='$cidade', bairro='$bairro', rua='$rua', numero='$numero',
    complemento='$complemento', enfermidades='$enfermidadesString', foto='$caminhoSalvar' WHERE id_idoso=".$idIdoso);

    // $resultUpdate = mysqli_query($con, $queryUpdateIdoso);

    // if ($resultUpdate) {
    //     echo "Atualização realizada com sucesso!";
    // } else {
    //     echo "Erro na atualização: " . mysqli_error($con);
    // }

    header('Location: ../../idosos.php');
}else{//caso não tenha inserido foto no campo de foto
    $queryUpdateIdoso = mysqli_query($con, "UPDATE idoso SET nome='$nome', cpf='$cpf', sexo='$sexo', dtNasc='$dtNasc', descricao='$descricao',
    telefone='$telefone', estado='$estado', cidade='$cidade', bairro='$bairro', rua='$rua', numero='$numero',
    complemento='$complemento', enfermidades='$enfermidadesString' WHERE id_idoso=".$idIdoso);

    $resultUpdate = mysqli_query($con, $queryUpdateIdoso);

    // if ($resultUpdate) {
    //     echo "Atualização realizada com sucesso!";
    // } else {
    //     echo "Erro na atualização: " . mysqli_error($con);
    // }

    header('Location: ../../idosos.php');
}

?>