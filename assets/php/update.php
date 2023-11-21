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

if(mysqli_num_rows($verificar) == 1){
        
    if($_SESSION["usuario"] == "cuidador"){//update de cuidador
        if(isset($_FILES['fotoPerfil'])){//caso inserido foto no campo de foto
            $nomeArquivo = $_FILES['fotoPerfil']['name'];
            $caminhoAtualArquivo = $_FILES['fotoPerfil']['tmp_name'];
            $pastaDestino = "../uploadImg/"; // Um nível acima da pasta 'php'
            $caminhoSalvar = $pastaDestino . $nomeArquivo;
            move_uploaded_file($caminhoAtualArquivo, $caminhoSalvar);

            $_SESSION["nome"]                 =  $nome;
            $_SESSION["cpf"]                  =  $cpf;
            $_SESSION["foto"]                 =  "assets/uploadImg/".$nomeArquivo;
            $_SESSION["registroProfissional"] =  $registroProfissional;
            $_SESSION["sexo"]                 =  $sexo;
            $_SESSION["dtNasc"]               =  $dtNasc;
            $_SESSION["descricao"]            =  $descricao;
            $_SESSION["telefone"]             =  $telefone;
            $_SESSION["email"]                =  $email;
            $_SESSION["senha"]                =  $senhaConfirma;
            $_SESSION["estado"]               =  $estado;
            $_SESSION["cidade"]               =  $cidade;
            $_SESSION["bairro"]               =  $bairro;
            $_SESSION["rua"]                  =  $rua;
            $_SESSION["numero"]               =  $numero;
            $_SESSION["complemento"]          =  $complemento;

            
            
            $sql = mysqli_query($con, "UPDATE cuidador SET nome='$nome', cpf='$cpf', registroProfissional='$registroProfissional', foto='$nomeArquivo', sexo='$sexo', dtNasc='$dtNasc', 
            descricao='$descricao', telefone='$telefone', email='$email', senha='$senhaConfirma', estado='$estado', cidade='$cidade', bairro='$bairro', rua='$rua', numero='$numero', 
            complemento='$complemento' WHERE id_cuidador=".$_SESSION["id"]);

            echo"tem foto";
            echo '<img src='.$caminhoSalvar.' />';
            header('Location: ../../perfilPessoal.php');
        }else{//caso não tenha inserido foto no campo de foto
            echo"Legal";

            $_SESSION["nome"]                 =  $nome;
            $_SESSION["cpf"]                  =  $cpf;
            $_SESSION["registroProfissional"] =  $registroProfissional;
            $_SESSION["sexo"]                 =  $sexo;
            $_SESSION["dtNasc"]               =  $dtNasc;
            $_SESSION["descricao"]            =  $descricao;
            $_SESSION["telefone"]             =  $telefone;
            $_SESSION["email"]                =  $email;
            $_SESSION["senha"]                =  $senhaConfirma;
            $_SESSION["estado"]               =  $estado;
            $_SESSION["cidade"]               =  $cidade;
            $_SESSION["bairro"]               =  $bairro;
            $_SESSION["rua"]                  =  $rua;
            $_SESSION["numero"]               =  $numero;
            $_SESSION["complemento"]          =  $complemento;

            $sql = mysqli_query($con, "UPDATE cuidador SET nome='$nome', cpf='$cpf', registroProfissional='$registroProfissional', sexo='$sexo', dtNasc='$dtNasc', 
            descricao='$descricao', telefone='$telefone', email='$email', senha='$senhaConfirma', estado='$estado', cidade='$cidade', bairro='$bairro', rua='$rua', numero='$numero', 
            complemento='$complemento' WHERE id_cuidador=".$_SESSION["id"]);
            header('Location: ../../perfilPessoal.php');
        }
    }

    else if($_SESSION["usuario"] == "responsavel"){//update de responsavel
        if(isset($_FILES['fotoPerfil'])){//caso inserido foto no campo de foto
            $nomeArquivo = $_FILES['fotoPerfil']['name'];
            $caminhoAtualArquivo = $_FILES['fotoPerfil']['tmp_name'];
            $pastaDestino = "../uploadImg/"; // Um nível acima da pasta 'php'
            $caminhoSalvar = $pastaDestino . $nomeArquivo;
            move_uploaded_file($caminhoAtualArquivo, $caminhoSalvar);

            $_SESSION["nome"]                 =  $nome;
            $_SESSION["cpf"]                  =  $cpf;
            $_SESSION["foto"]                 =  "assets/uploadImg/".$nomeArquivo;
            $_SESSION["sexo"]                 =  $sexo;
            $_SESSION["dtNasc"]               =  $dtNasc;
            $_SESSION["telefone"]             =  $telefone;
            $_SESSION["email"]                =  $email;
            $_SESSION["senha"]                =  $senhaConfirma;
            $_SESSION["estado"]               =  $estado;
            $_SESSION["cidade"]               =  $cidade;
            $_SESSION["bairro"]               =  $bairro;
            $_SESSION["rua"]                  =  $rua;
            $_SESSION["numero"]               =  $numero;
            $_SESSION["complemento"]          =  $complemento;

            $sql = mysqli_query($con, "UPDATE responsavel SET nome='$nome', cpf='$cpf', foto='$nomeArquivo', sexo='$sexo', dtNasc='$dtNasc', 
            telefone='$telefone', email='$email', senha='$senhaConfirma', estado='$estado', cidade='$cidade', bairro='$bairro', rua='$rua', numero='$numero', 
            complemento='$complemento' WHERE id_responsavel=".$_SESSION["id"]);
            header('Location: ../../perfilPessoal.php');
            
        }else{//caso não tenha inserido foto no campo de foto

            $_SESSION["nome"]                 =  $nome;
            $_SESSION["cpf"]                  =  $cpf;
            $_SESSION["sexo"]                 =  $sexo;
            $_SESSION["dtNasc"]               =  $dtNasc;
            $_SESSION["telefone"]             =  $telefone;
            $_SESSION["email"]                =  $email;
            $_SESSION["senha"]                =  $senhaConfirma;
            $_SESSION["estado"]               =  $estado;
            $_SESSION["cidade"]               =  $cidade;
            $_SESSION["bairro"]               =  $bairro;
            $_SESSION["rua"]                  =  $rua;
            $_SESSION["numero"]               =  $numero;
            $_SESSION["complemento"]          =  $complemento;

            $sql = mysqli_query($con, "UPDATE responsavel SET nome='$nome', cpf='$cpf', sexo='$sexo', dtNasc='$dtNasc', 
            telefone='$telefone', email='$email', senha='$senhaConfirma', estado='$estado', cidade='$cidade', bairro='$bairro', rua='$rua', numero='$numero', 
            complemento='$complemento' WHERE id_responsavel=".$_SESSION["id"]);
            header('Location: ../../perfilPessoal.php');
        }
    }else{//caso haja um erro e não tenha "usuario" definido
        exit();
        header('Location: ../../cadastro.php');
    }

    
}else{
    $_SESSION['msgErro'] = "E-mail OU CPF já cadastrados!";
    header('Location: ../../cadastro.php');
}

?>