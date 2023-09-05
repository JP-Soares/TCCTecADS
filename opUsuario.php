<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HelpOlder||OpçãoUsuário</title>

        <?php
            session_start();

            $_SESSION["tipo"]=$_GET['tipo'];

            if($_SESSION["tipo"] == "login"){
                $endereco = "login.php";
            }else if($_SESSION["tipo"] == "cadastro"){
                $endereco = "cadastro.php";
            }else{
                exit();
            }
        ?>

    </head>
    <body>
        <div>
            <a href="<?php echo$endereco ?>?usuario=cuidador">Cuidador</a>
        </div>

        <div>
            <a href="<?php echo$endereco ?>?usuario=responsavel">Responsável</a>
        </div>

    </body>
</html>