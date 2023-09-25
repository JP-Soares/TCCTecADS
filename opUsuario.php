<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HelpOlder||OpçãoUsuário</title>
        <link rel="icon" href="assets/img/icon.png" type="image/x-icon">

        <link rel="stylesheet" href="assets/style/StyleOpUsuario.css">
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Agdasima&family=M+PLUS+Rounded+1c:wght@900&family=Mitr:wght@300&display=swap" rel="stylesheet">
    </head>
    <body>

        <?php
            session_start();

            $_SESSION["tipo"]=$_GET['tipo'];

            if($_SESSION["tipo"] == "login"){
                $endereco = "login.php";
                $text = "Login";
            }else if($_SESSION["tipo"] == "cadastro"){
                $endereco = "cadastro.php";
                $text = "Cadastro";
            }else{
                exit();
            }
        ?>

        <h1><?php echo$text; ?></h1>

        <div>
            <a href="<?php echo $endereco ?>?usuario=cuidador"><img src="assets/img/healthcare.png" alt="Cuidador"><h3>Cuidador</h3></a>
        </div>

        <div>
            <a href="<?php echo $endereco ?>?usuario=responsavel"><img src="assets/img/responsabilidade.png" alt="Responsável"><h3>Responsável</h3></a>
        </div>
    </body>
</html>