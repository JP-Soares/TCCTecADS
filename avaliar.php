<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HelpOlder||Avaliar</title>

        <link rel="icon" href="assets/img/icon.png" type="image/x-icon">

        <link rel="stylesheet" href="assets/style/styleLogin.css">
        <link rel="stylesheet" href="assets/style/btnVoltar.css">

        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Agdasima&family=M+PLUS+Rounded+1c:wght@900&family=Mitr:wght@300&display=swap" rel="stylesheet">

        <script src="assets/js/btnVoltar.js"></script>
    </head>
    <body>

        <a class="btnVoltar" onclick="goBack();"><img class="imgBtnVoltar" src="assets/img/voltar.png" /></a>

        <h1>Avalie o Cuidador!</h1>
        <div id="box-avaliacao">
            
            <form action="assets/php/cadastrarAvaliacao.php?id_cuidador=<?php echo$_GET["id_cuidador"]; ?>&id_responsavel=<?php echo$_GET["id_responsavel"]; ?>" method="post" name="">
                    <div class="comment-box">
                    <label for="comment">Comentário:</label>
                    <textarea id="comment" name="comment" rows="4" cols="50"></textarea>
                </div>

                <div class="star-rating">
                    <!-- Ordem crescente da esquerda para a direita -->
                    <input type="radio" id="star1" name="rating" value="5" />
                    <label for="star1"></label>

                    <input type="radio" id="star2" name="rating" value="4" />
                    <label for="star2"></label>

                    <input type="radio" id="star3" name="rating" value="3" />
                    <label for="star3"></label>

                    <input type="radio" id="star4" name="rating" value="2" />
                    <label for="star4"></label>

                    <input type="radio" id="star5" name="rating" value="1" checked />
                    <label for="star5"></label>
    
                </div><br><br>

                <input type="submit" value="Enviar Avaliação!" />
            </form>
        </div>

    <style>
        #box-avaliacao{
            text-align: center;
            background-color: rgba(82, 113, 255);
            padding: 20px; 
            border: 1px solid #dee2e6; 
            width: 100%; 
            max-width: 600px; 
            margin: 20px auto;
            border-radius: 10px;
        }

        form{
            text-align: center;
        }

        .star-rating {
            font-size: 0;
            display: inline-block;
            margin-bottom: 10px;
        }

        .star-rating input {
            display: none;
        }

        .star-rating label {
            display: inline-block;
            cursor: pointer;
            font-size: 24px;
        }

        .star-rating label:before {
            content: '\2605'; /* Código Unicode para uma estrela vazia */
            margin: 5px;
            color: #ddd;
        }

        .star-rating input:checked ~ label:before {
            color: #ffcc00; /* Cor para estrela preenchida */
        }

        .comment-box {
            margin-top: 10px;
        }

        /* Estilo para desativar o redimensionamento e definir um tamanho fixo para a caixa de texto */
        textarea {
            resize: none;
            width: 100%;
            max-width: 400px;
            height: 200px;
            padding: 10px;
            box-sizing: border-box;
            border-radius: 5px;
            font-size: 16px;
        }
    </style>
    </body>
</html>