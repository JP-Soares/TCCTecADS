<?php
    include_once('conexao.php');

    $email = mysqli_real_escape_string($con, trim($_POST['email']));
    $senha = mysqli_real_escape_string($con, trim($_POST['senha']));
    
    $sqlVerify = mysqli_query($con,"SELECT * FROM cuidador WHERE email='$email' AND senha='$senha'");

    if(mysqli_num_rows($sqlVerify) == 0){
        echo"ERROR (NÃO CADASTRADO)";
    }else{
        echo"EXISTE";

        while($dadosUsuario = mysqli_fetch_assoc($sqlVerify)){
            $id_cuidador = $dadosUsuario["id_cuidador"];
        }
        session_start();
        $_SESSION["situacaoLogin"] = true;
        $_SESSION["id_cuidador"] = $id_cuidador;
        
        header('Location: ../../index.php');
    }
?>