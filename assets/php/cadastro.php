<?php

session_start();

include_once("conexao.php");

$nome = mysqli_real_escape_string($con, trim($_POST['nome']));
$cpf = mysqli_real_escape_string($con, trim($_POST['cpf']));

if($_SESSION["usuario"] == "cuidador"){
    $registroProfissional = mysqli_real_escape_string($con, trim($_POST['registroProfissional']));
    $descricao = mysqli_real_escape_string($con, trim($_POST['descricao']));
}


$sexo = mysqli_real_escape_string($con, trim($_POST['sexo']));
$dtNasc = mysqli_real_escape_string($con, trim($_POST['dtNasc']));
$telefone = mysqli_real_escape_string($con, trim($_POST['telefone']));


$estado = mysqli_real_escape_string($con, trim($_POST['estado']));
$cidade = mysqli_real_escape_string($con, trim($_POST['cidade']));
$bairro = mysqli_real_escape_string($con, trim($_POST['bairro']));
$rua = mysqli_real_escape_string($con, trim($_POST['rua']));
$numero = mysqli_real_escape_string($con, trim($_POST['numero']));
$complemento = mysqli_real_escape_string($con, trim($_POST['complemento']));

$email = mysqli_real_escape_string($con, trim($_POST['email']));
$senhaConfirma = mysqli_real_escape_string($con, trim($_POST['confirmaSenha']));

$verificar = mysqli_query($con, "SELECT * FROM ". $_SESSION["usuario"]. " WHERE email='$email' OR cpf='$cpf'");

if(mysqli_num_rows($verificar) == 0){
        
    if($_SESSION["usuario"] == "cuidador"){//cadastro de cuidador
        if(isset($_FILES['fotoPerfil'])){//caso inserido foto no campo de foto
            $nomeArquivo = $_FILES['fotoPerfil']['name'];
            $caminhoAtualArquivo = $_FILES['fotoPerfil']['tmp_name'];
            $caminhoSalvar = '../uploadImg/'.$nomeArquivo;
            move_uploaded_file($caminhoAtualArquivo, $caminhoSalvar);
            $pasta = "../uploadImg";
            $diretorio = dir($pasta);
            
            $sql = "INSERT INTO cuidador (nome, cpf, foto, registroProfissional, sexo, dtNasc, descricao, telefone, email, senha, estado, cidade, bairro, rua, numero, complemento) 
            VALUES ('$nome', '$cpf', '$caminhoSalvar', '$registroProfissional', '$sexo', '$dtNasc', '$descricao', '$telefone', '$email', '$senhaConfirma', '$estado', '$cidade', '$bairro', '$rua', 
            '$numero', '$complemento')";
        }else{//caso não tenha inserido foto no campo de foto
            $sql = "INSERT INTO cuidador (nome, cpf, registroProfissional, sexo, dtNasc, descricao, telefone, email, senha, estado, cidade, bairro, rua, numero, complemento) 
            VALUES ('$nome', '$cpf', '$registroProfissional', '$sexo', '$dtNasc', '$descricao', '$telefone', '$email', '$senhaConfirma', '$estado', '$cidade', '$bairro', '$rua', 
            '$numero', '$complemento')";
        }
    }

    else if($_SESSION["usuario"] == "responsavel"){//cadastro de responsavel
        if(isset($_FILES['fotoPerfil'])){//caso inserido foto no campo de foto
            $nomeArquivo = $_FILES['fotoPerfil']['name'];
            $caminhoAtualArquivo = $_FILES['fotoPerfil']['tmp_name'];
            $caminhoSalvar = '../uploadImg/'.$nomeArquivo;
            move_uploaded_file($caminhoAtualArquivo, $caminhoSalvar);
            $pasta = "../uploadImg";
            $diretorio = dir($pasta);
            
            $sql = "INSERT INTO responsavel (nome, cpf, foto, sexo, dtNasc, telefone, email, senha, estado, cidade, bairro, rua, numero, complemento) 
            VALUES ('$nome', '$cpf', '$caminhoSalvar', '$sexo', '$dtNasc', '$telefone', '$email', '$senhaConfirma', '$estado', '$cidade', '$bairro', '$rua', 
            '$numero', '$complemento')";
        }else{//caso não tenha inserido foto no campo de foto
            echo"Legal";
            $sql = "INSERT INTO responsavel (nome, cpf, sexo, dtNasc, telefone, email, senha, estado, cidade, bairro, rua, numero, complemento) 
            VALUES ('$nome', '$cpf', '$sexo', '$dtNasc', '$telefone', '$email', '$senhaConfirma', '$estado', '$cidade', '$bairro', '$rua', 
            '$numero', '$complemento')";
        }
    }else{//caso haja um erro e não tenha "usuario" definido
        exit();
        header('Location: ../../cadastro.php');
    }

    if($con->query($sql) == true){
        $sqlVerify = mysqli_query($con,"SELECT * FROM ". $_SESSION["usuario"]." WHERE email='$email' AND senha='$senhaConfirma'");

            while($dadosUsuario = mysqli_fetch_assoc($sqlVerify)){
                $_SESSION["nome"] = $dadosUsuario["nome"];
                $_SESSION["cpf"] = $dadosUsuario["cpf"];
                $_SESSION["foto"] = $dadosUsuario["foto"];
                $_SESSION["sexo"] = $dadosUsuario["sexo"];
                $_SESSION["dtNasc"] = $dadosUsuario["dtNasc"];
                $_SESSION["telefone"] = $dadosUsuario["telefone"];
                $_SESSION["email"] = $dadosUsuario["email"];
                $_SESSION["senha"] = $dadosUsuario["senha"];
                $_SESSION["estado"] = $dadosUsuario["estado"];
                $_SESSION["cidade"] = $dadosUsuario["cidade"];
                $_SESSION["bairro"] = $dadosUsuario["bairro"];
                $_SESSION["rua"] = $dadosUsuario["rua"];
                $_SESSION["numero"] = $dadosUsuario["numero"];
                $_SESSION["complemento"] = $dadosUsuario["complemento"];

                if($_SESSION["usuario"] == "cuidador"){
                    $_SESSION["id"] = $dadosUsuario["id_cuidador"];
                    $_SESSION["registroProfissional"] = $dadosUsuario["registroProfissional"];
                    $_SESSION["descricao"] = $dadosUsuario["descricao"];
                }else if($_SESSION["usuario"] == "responsavel"){
                    $_SESSION["id"] = $dadosUsuario["id_responsavel"];
                }
            }

        $_SESSION["situacaoLogin"] = true;

        header('Location: ../../index.php');
    }

    
}else{
    $_SESSION['msgErro'] = "E-mail OU CPF já cadastrados!";
    header('Location: ../../cadastro.php');
}

?>