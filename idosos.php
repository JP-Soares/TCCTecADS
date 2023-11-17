<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HelpOlder||Gerenciar Idosos</title>
        <link rel="icon" href="assets/img/icon.png" type="image/x-icon">

        <link rel="stylesheet" href="assets/style/styleIdosos.css" />
        <link rel="stylesheet" href="assets/style/btnVoltar.css" />

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Agdasima&family=M+PLUS+Rounded+1c:wght@900&family=Mitr:wght@300&display=swap" rel="stylesheet">
        <script src="assets/js/btnVoltar.js"></script>

        <?php
            include_once('assets/php/conexao.php');

            session_start();
        ?>

    </head>
    <body>
        <a class="btnVoltar" onclick="goBack();"><img class="imgBtnVoltar" src="assets/img/voltar.png" /></a>

        <h1>Idosos cadastrados!</h1>

        <?php
            $sqlVerify = mysqli_query($con,"SELECT * FROM idoso WHERE id_responsavel = ".$_SESSION["id"]);

            while($dadosIdoso = mysqli_fetch_assoc($sqlVerify)){
                $idIdoso = $dadosIdoso["id_idoso"];
                $nome = $dadosIdoso["nome"];
                $idade = $dadosIdoso["dtNasc"];
                $descricao = $dadosIdoso["descricao"];
                $foto = $dadosIdoso["foto"];

                ?>
                <div class="profile-card">
                    <div class="profile-image">
                        <img src="<?php echo$foto; ?>" alt="Imagem de perfil">
                    </div>
                    <div class="profile-data">
                        <p><span>Nome:</span> <?php echo$nome ?></p>
                        <p><span>Idade:</span> <?php echo$idade ?></p>
                        <p><span>Descrição:</span> <?php echo$descricao ?></p>

                        <div class="tag">
                            <a href="dadosIdoso.php?idIdoso=<?php echo$idIdoso; ?>">Verificar Dados!</a>
                        </div>
                    </div>
                </div>
           <?php }
        ?>

        <a href="cadastroIdoso.php">Cadastrar idoso</a>
    </body>
</html>