<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HelpOlder||Login</title>

        <?php
            session_start();

            if(isset($_GET["usuario"])){
                $_SESSION["usuario"] = $_GET["usuario"];
            }

            if(isset($_SESSION["situacaoLogin"])){
                header('Loation: index.php');
                exit();
            }
        ?>

    </head>
    <body>
        <button onclick="goBack();">Voltar</button>

        <h1>LOGIN</h1>

        <div>
            <form name="" method="POST" action="assets/php/login.php?<?php echo$_SESSION["usuario"]; ?>">
                <label>E-mail:</label>
                <input type="email" name="email" placeholder="Digite o e-mail de login" required /><br><br>
                <label>Senha:</label>
                <input type="password" name="senha" placeholder="Digite a senha" required /><br><br>

                <input type="submit" value="Entrar!" /><br>
                
            </form>

            <span><?php if(isset($_SESSION["msgError"])){ echo$_SESSION["msgError"]; unset($_SESSION["msgError"]); } ?></span><!--Mensagem de erro caso erre algum dado do login-->
        </div>
    </body>


    <script src="assets/js/btnVoltar.js"></script>

</html>