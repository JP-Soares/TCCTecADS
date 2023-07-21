<?php
    include_once('conexao.php');

    session_start();

    $email = mysqli_real_escape_string($con, trim($_POST['email']));
    $senha = mysqli_real_escape_string($con, trim($_POST['senha']));
    
    $sqlVerify = mysqli_query($con,"SELECT * FROM ". $_SESSION["usuario"]." WHERE email='$email' AND senha='$senha'");

    if(mysqli_num_rows($sqlVerify) == 0){
        echo"ERROR (NÃO CADASTRADO)";
    }else{
        echo"EXISTE";

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
?>