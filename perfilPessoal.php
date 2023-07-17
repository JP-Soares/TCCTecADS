<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HelpOlder||Perfil</title>

        <?php
            include_once("assets/php/conexao.php");
            session_start();

            if($_SESSION["situacaoLogin"] != true){
                exit();
            }

            if(isset($_SESSION["usuario"]) == "cuidador"){
                $idComand =  "id_cuidador";
            }else if(isset($_SESSION["usuario"]) == "responsavel"){
                $idComand =  "id_responsavel";
            }

            $sqlVerify = mysqli_query($con,"SELECT * FROM ". $_SESSION["usuario"]." WHERE ".$idComand."='".$_SESSION["id_cuidador"]."'");
            echo$_SESSION["id_cuidador"];

            while($dadosUsuario = mysqli_fetch_assoc($sqlVerify)){
                $nome = $dadosUsuario["nome"];
                $dtNasc = $dadosUsuario["dtNasc"];
                $descricao = $dadosUsuario["descricao"];

            }
        ?>

    </head>
    <body>
        <div>
            <?php echo"".$nome."<br><br>".$dtNasc."<br><br>".$descricao.""; ?>

            <p><a href="updatePerfil.php">Editar Dados do Perfil</a></p>
        </div>
    </body>
</html>