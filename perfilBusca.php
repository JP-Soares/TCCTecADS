<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HelpOlder||Perfil</title>

        <link rel="icon" href="assets/img/icon.png" type="image/x-icon">

        <link rel="stylesheet" href="assets/style/stylePerfilBusca.css" />
        <link rel="stylesheet" href="assets/style/btnVoltar.css" />

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Agdasima&family=M+PLUS+Rounded+1c:wght@900&family=Mitr:wght@300&display=swap" rel="stylesheet">

        <script src="assets/js/btnVoltar.js"></script>
    </head>
    <body>
        <a class="btnVoltar" onclick="goBack();"><img class="imgBtnVoltar" src="assets/img/voltar.png" /></a>

        <h1>Perfil do Cuidador</h1>

        <?php
            include_once("assets/php/conexao.php");
            session_start();

            $id = $_GET["idCuidador"];

            //pegando os dados pessoais do cuidador
            $sqlDados = mysqli_query($con, "SELECT cuidador.* FROM cuidador WHERE cuidador.id_cuidador");


            while($dados = mysqli_fetch_assoc($sqlDados)){
                $nome = $dados["nome"];
                $foto = $dados["foto"];
                
                //pegando a idade por meio da data de nascimento
                $idade = $dados["dtNasc"];
                $dataAtual = new DateTime();
                $idade = new DateTime($idade);
                $idade = $dataAtual->diff($idade)->y;

                $registroProfissional = $dados["registroProfissional"];
                $estado = $dados["estado"];

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

                $cidade = $dados["cidade"];
                $telefone = $dados["telefone"];
            }

            ?>

            <div class="profile-card">
                <div class="profile-image">
                    <img src="<?php echo$foto; ?>" alt="Imagem de perfil">
                </div>
                <div class="profile-data">
                    <p><span>Nome:</span> <?php echo$nome ?></p>
                    <p><span>Idade:</span> <?php echo$idade; ?></p>
                    <p><span>Estado:</span> <?php echo$estado ?></p>
                    <p><span>Cidade:</span> <?php echo$cidade ?></p>

                    <?php //pegando os dados de agenda do cuidador
                        $sqlAgenda = mysqli_query($con,"SELECT * FROM agenda WHERE id_agenda NOT IN (SELECT id_agenda FROM consulta WHERE id_cuidador = $id)");
                        
                        if(mysqli_num_rows($sqlAgenda) == 0){
                            echo"Este cuidador não possui uma agenda!";
                        }else{
                            ?>
                            <table border="1">
                                <form method="POST" name="" action="assets/php/contratar.php?id_cuidador=<?php echo$id; ?>">
                                <tr>
                                    <td><p class="title-table">Dia da semana:</p></td>
                                    <td><p class="title-table">Turno:</p></td>
                                    <td><p class="title-table">Hora de início:</p></td>
                                    <td><p class="title-table">Hora de saída:</p></td>
                                    <td><p class="title-table">Preço:</p></td>
                                    <td><p class="title-table">Selecione o turno que deseja:</p></td>
                                    <td><p class="title-table">Selecione o idoso:</p></td>
                                </tr>
                            <?php
                            while($dadosAgenda = mysqli_fetch_assoc($sqlAgenda)){
                                $idAgenda = $dadosAgenda["id_agenda"];

                                $horaInicio = $dadosAgenda["hora_inicio"];
                                $horaSaida = $dadosAgenda["hora_saida"];
                                $turno = $dadosAgenda["turno"];
                                $diaSemana = $dadosAgenda["dia_semana"];

                                switch($diaSemana){
                                    case "dom":
                                        $diaSemana = "Domingo";
                                        break;
                                    case "seg":
                                        $diaSemana = "Segunda-feira";
                                        break;
                                    case "ter":
                                        $diaSemana = "Terça-feira";
                                        break;
                                    case "qua":
                                        $diaSemana = "Quarta-feira";
                                        break;
                                    case "qui":
                                        $diaSemana = "Quinta-feira";
                                        break;
                                    case "sex":
                                        $diaSemana = "Sexta-feira";
                                        break;
                                    case "sab":
                                        $diaSemana = "Sábado";
                                        break;
                                }

                                switch($turno){
                                    case "m":
                                        $turno = "Manhã";
                                        break;
                                    case "t":
                                        $turno = "Tarde";
                                        break;
                                    case "n":
                                        $turno = "Noite";
                                        break;
                                }

                                $preco = $dadosAgenda["preco_turno"];


                                ?>

                                    <tr>
                                        <td><p><?php echo$diaSemana; ?></p></td>
                                        <td><p><?php echo$turno; ?></p></td>
                                        <td><p><?php echo$horaInicio; ?></p></td>
                                        <td><p><?php echo$horaSaida; ?></p></td>
                                        <td><p>R$<?php echo$preco; ?></p></td>
                                        <td><input type="checkbox" onclick="turno(this);" class="turnoContrato" name="contratoTurno[]" value="<?php echo$idAgenda; ?>"/></td>

                                        <?php
                                        //Seleciona os dados dos idosos
                                        $sqlIdosos = mysqli_query($con, "SELECT * FROM idoso WHERE id_responsavel =".$_SESSION["id"]);
                                        while($dadosIdosos = mysqli_fetch_assoc($sqlIdosos)){
                                            $idIdoso = $dadosIdosos["id_idoso"];
                                            $nomeIdoso = $dadosIdosos["nome"];
                                            
                                            ?>
                                            <td><p class="idosoContrato"><?php echo$nomeIdoso; ?></p>
                                            <input class="idosoContratoCheckbox" type="checkbox" name="contratoIdoso[]" value="<?php echo$idIdoso; ?>"/></td>
                                       <?php } ?>
                                        
                                    </tr>
                            <?php
                            }
                    ?>
                </table>
                <?php
                }
            ?>

            <style>
                .idosoContrato, .idosoContratoCheckbox{
                    visibility: hidden;
                }
            </style>

            <script>
                // Função para mostrar ou ocultar os itens relacionados à mesma linha
                function toggleRelatedItems(checkbox) {
                    const row = checkbox.closest('tr');
                    const itemsToShow = row.querySelectorAll('.idosoContrato, .idosoContratoCheckbox');

                    if (checkbox.checked) {
                        itemsToShow.forEach(item => {
                            item.style.visibility = 'visible';
                        });
                    } else {
                        itemsToShow.forEach(item => {
                            item.style.visibility = 'hidden';
                            item.checked = false;
                        });
                    }
                }

                // Função para permitir a seleção de apenas um checkbox de idoso por linha
                function allowSingleSelection(checkbox) {
                    const row = checkbox.closest('tr');
                    const idosoCheckboxes = row.querySelectorAll('.idosoContratoCheckbox');

                    idosoCheckboxes.forEach(idosoCheckbox => {
                        if (idosoCheckbox !== checkbox) {
                            idosoCheckbox.checked = false;
                        }
                    });
                }

                const checkboxesTurno = document.querySelectorAll('.turnoContrato');
                checkboxesTurno.forEach(checkbox => {
                    checkbox.addEventListener('change', function() {
                        toggleRelatedItems(this);
                    });
                });

                const checkboxesIdoso = document.querySelectorAll('.idosoContratoCheckbox');
                checkboxesIdoso.forEach(checkbox => {
                    checkbox.addEventListener('change', function() {
                        allowSingleSelection(this);
                    });
                });
            </script>

            <center><button id="btnEnviar" type="submit">Confirmar!</button></center>
        </div>

    </body>
</html>