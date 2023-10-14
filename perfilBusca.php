<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HelpOlder||Perfil</title>

        <link rel="icon" href="assets/img/icon.png" type="image/x-icon">

        <link rel="stylesheet" href="assets/style/stylePerfilBusca.css" />

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Agdasima&family=M+PLUS+Rounded+1c:wght@900&family=Mitr:wght@300&display=swap" rel="stylesheet">
    </head>
    <body>
        <h1>Perfil do Cuidador</h1>

        <?php
            include_once("assets/php/conexao.php");

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
                $cidade = $dados["cidade"];
                $telefone = $dados["telefone"];
            }

            ?>

            <div class="profile-card">
                <div class="profile-image">
                    <img src="<?php=$foto; ?>" alt="Imagem de perfil">
                </div>
                <div class="profile-data">
                    <p><span>Nome:</span> <?php echo$nome ?></p>
                    <p><span>Estado:</span> <?php echo$estado ?></p>
                    <p><span>Cidade:</span> <?php echo$cidade ?></p>

                    <?php //pegando os dados de agenda do cuidador
                        $sqlAgenda = mysqli_query($con, "SELECT * FROM agenda WHERE id_cuidador = $id");

                        if(mysqli_num_rows($sqlAgenda) == 0){
                            echo"Este cuidador não possui uma agenda!";
                        }else{
                            ?>
                            <table border="1">
                                <form method="POST" name="" action="assets/php/contratar.php">
                                <tr>
                                    <td><p class="title-table">Dia da semana:</p></td>
                                    <td><p class="title-table">Turno:</p></td>
                                    <td><p class="title-table">Hora de início:</p></td>
                                    <td><p class="title-table">Hora de saída:</p></td>
                                    <td><p class="title-table">Preço:</p></td>
                                    <td><p class="title-table">Selecione o turno que deseja:</p></td>
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
                                        <td><input type="checkbox" name="contratoTurno[]" value="<?php echo$idAgenda; ?>"/></td>
                                    </tr>
                            <?php
                            }
                    ?>
                </table>
                <?php
                }
            
            ?>

            <button id="btnEnviar" type="submit">Confirmar!</button>
        </div>

    </body>
</html>