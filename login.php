<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HelpOlder||Login</title>

        <?php
            session_start();

            $_SESSION["usuario"] = $_GET['usuario'];

            if($_SESSION["usuario"] == "cuidador"){
                $enviaForm = "assets/php/loginCuidador.php";
            }else if($_SESSION["usuario"] == "responsavel"){
                $enviaForm = "assets/php/loginResponsavel.php";
            }else{
                exit();
            }

            if($_SESSION["situacaoLogin"]){
                header('Loation: index.php');
                exit();
            }
        ?>

    </head>
    <body>
        <h1>LOGIN</h1>

        <div>
            <form name="" method="POST" action="<?php echo$enviaForm; ?>">
                <label>E-mail:</label>
                <input type="email" name="email" placeholder="Digite o e-mail de login" required /><br><br>
                <label>Senha:</label>
                <input type="password" name="senha" placeholder="Digite a senha" required /><br><br>

                <input type="submit" value="Entrar!" />
            </form>
        </div>
    </body>
</html>