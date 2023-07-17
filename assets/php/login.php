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
            if($_SESSION["usuario"] == "cuidador"){
                $id = $dadosUsuario["id_cuidador"];
            }else if($_SESSION["usuario"] == "responsavel"){
                $id = $dadosUsuario["id_responsavel"];
            }
        }
        session_start();
        $_SESSION["situacaoLogin"] = true;
        $_SESSION["id"] = $id;
        
        header('Location: ../../index.php');
    }
?>