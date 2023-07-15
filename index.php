<!DOCTYPE html>
<html lang="en">
    <head>

        <?php
            session_start();
            $_SESSION["situacaoLogin"] = false;
        ?>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HelpOlder||Home</title> 
    </head>
    <body>
        <?php
            if($_SESSION["situacaoLogin"]){
                ?><p><a href="#">Perfil</a></p><?php
            }else{
                ?>
                <p><a href="opUsuario.php?tipo=login">Login</a></p>
                <p><a href="opUsuario.php?tipo=cadastro">Cadastro</a></p>
                <?php
            }
        ?>
        <p><a href="pesquisa.php">Pesquisa</a></p>
        <p><a href="#">Ajuda</a></p>

    </body>
</html>