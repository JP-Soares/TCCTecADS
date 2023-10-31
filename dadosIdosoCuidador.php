<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HelpOlder||DadosIdoso</title>

        <link rel="icon" href="assets/img/icon.png" type="image/x-icon">

        <link rel="stylesheet" href="assets/style/stylePerfilBusca.css" />
        <link rel="stylesheet" href="assets/style/btnVoltar.css" />

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Agdasima&family=M+PLUS+Rounded+1c:wght@900&family=Mitr:wght@300&display=swap" rel="stylesheet">
        <script src="assets/js/btnVoltar.js"></script>

        <?php
            include_once("assets/php/conexao.php");

            $idIdoso = $_GET["idIdoso"];

            $buscaIdoso = mysqli_query($con, "SELECT * FROM idoso WHERE id_idoso=".$idIdoso);
            while($dadosIdoso = mysqli_fetch_assoc($buscaIdoso)){
                $nome = $dadosIdoso["nome"];
                $cpf = $dadosIdoso["cpf"];
                $sexo = $dadosIdoso["sexo"];
                $dtNasc = $dadosIdoso["dtNasc"];
                $descricao = $dadosIdoso["descricao"];
                $telefone = $dadosIdoso["telefone"];
                $estado = $dadosIdoso["estado"];
                $cidade = $dadosIdoso["cidade"];
                $bairro = $dadosIdoso["bairro"];
                $rua = $dadosIdoso["rua"];
                $numero = $dadosIdoso["numero"];
                $complemento = $dadosIdoso["complemento"];
                $enfermidades = $dadosIdoso["enfermidades"];
                
                $idade = $dtNasc;
                $dataAtual = new DateTime();
                $idade = new DateTime($idade);
                $idade = $dataAtual->diff($idade)->y;

                switch ($estado) {
                    case "AC":
                        $estado = "Acre";
                        break;
                    case "AL":
                        $estado = "Alagoas";
                        break;
                    case "AP":
                        $estado = "Amapá";
                        break;
                    case "AM":
                        $estado = "Amazonas";
                        break;
                    case "BA":
                        $estado = "Bahia";
                        break;
                    case "CE":
                        $estado = "Ceará";
                        break;
                    case "DF":
                        $estado = "Distrito Federal";
                        break;
                    case "ES":
                        $estado = "Espírito Santo";
                        break;
                    case "GO":
                        $estado = "Goiás";
                        break;
                    case "MA":
                        $estado = "Maranhão";
                        break;
                    case "MT":
                        $estado = "Mato Grosso";
                        break;
                    case "MS":
                        $estado = "Mato Grosso do Sul";
                        break;
                    case "MG":
                        $estado = "Minas Gerais";
                        break;
                    case "PA":
                        $estado = "Pará";
                        break;
                    case "PB":
                        $estado = "Paraíba";
                        break;
                    case "PR":
                        $estado = "Paraná";
                        break;
                    case "PE":
                        $estado = "Pernambuco";
                        break;
                    case "PI":
                        $estado = "Piauí";
                        break;
                    case "RJ":
                        $estado = "Rio de Janeiro";
                        break;
                    case "RN":
                        $estado = "Rio Grande do Norte";
                        break;
                    case "RS":
                        $estado = "Rio Grande do Sul";
                        break;
                    case "RO":
                        $estado = "Rondônia";
                        break;
                    case "RR":
                        $estado = "Roraima";
                        break;
                    case "SC":
                        $estado = "Santa Catarina";
                        break;
                    case "SP":
                        $estado = "São Paulo";
                        break;
                    case "SE":
                        $estado = "Sergipe";
                        break;
                    case "TO":
                        $estado = "Tocantins";
                        break;
                    default:
                        $estado = "Estado não encontrado";
                        break;
                }
            }
        ?>

    </head>

    <body>
        <a class="btnVoltar" onclick="goBack();"><img class="imgBtnVoltar" src="assets/img/voltar.png" /></a>

        <h1>Perfil do Idoso</h1>

        <div class="profile-card">
            <div class="profile-image">
                <img src="<?php echo$foto; ?>" alt="Imagem de perfil">
            </div>
            <div class="profile-data">
                <p><span>Nome Completo:</span> <?php echo$nome ?></p>
                <p><span>Idade:</span> <?php echo$idade; ?></p>
                <p><span>Endereço:</span> <?php echo$rua.", ".$numero.", ".$complemento.", ".$bairro.", ".$cidade.", ".$estado; ?></p>
                <p><span>Enfermidades:</span> <?php echo$enfermidades ?></p>
                <p><span>Descrição:</span> <?php echo$descricao ?></p>

            </div>
        </div>
    </body>

</html>