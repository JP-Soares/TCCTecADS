<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HelpOlder||Gerenciar Idosos</title>

        <?php
            include_once('assets/php/conexao.php');

            session_start();
        ?>

    </head>
    <body>
        <h1>Aqui aparecem os idosos cadastrados!</h1>

        <?php
            $sqlVerify = mysqli_query($con,"SELECT * FROM idoso WHERE id_responsavel = ".$_SESSION["id"]);

            while($dadosIdoso = mysqli_fetch_assoc($sqlVerify)){
                $idIdoso = $dadosIdoso["id_idoso"];
                $nome = $dadosIdoso["nome"];

                ?>
                <div id="container-dados-idoso">
                    <p><?php echo$idIdoso; ?></p>
                    <p><?php echo$nome; ?></p>
                    <p><a href="dadosIdoso.php?idIdoso=<?php echo$idIdoso; ?>">Editar</a></p>
                    <p><a href="assets/php/deletaridoso.php?idIdoso=<?php echo$idIdoso; ?>">Romover</a></p>
                </div>
           <?php }
        ?>

        <a href="cadastroIdoso.php">Cadastrar idoso</a>
    </body>
</html>