<!DOCTYPE html>
<html lang="en">
    <head>

        <?php
            session_start();
        ?>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HelpOlder||Home</title> 
    </head>
    <body>
        <?php
            if(isset($_SESSION["situacaoLogin"])){
                ?><p><a href="perfilPessoal.php">Perfil</a></p><?php
            }else{
                ?>
                <p><a href="opUsuario.php?tipo=login">Login</a></p>
                <p><a href="opUsuario.php?tipo=cadastro">Cadastro</a></p>
                <?php
            }
        ?>
        <?php
            if(isset($_SESSION["usuario"]) == "responsavel"){
        ?>

        <p><a href="pesquisa.php">Pesquisa</a></p>

        <?php } ?>

        <p><a href="#">Ajuda</a></p>

    </body>
</html>