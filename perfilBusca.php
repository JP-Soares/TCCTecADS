<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HelpOlder||Perfil</title>
    </head>
    <body>
        <h1>Perfil do Cuidador</h1>

        <?php
            include_once("assets/php/conexao.php");

            $id = $_GET["idCuidador"];

            echo$id;

            //pegando os dados pessoais do cuidador
            $sqlDados = mysqli_query($con, "SELECT cuidador.* FROM cuidador WHERE cuidador.id_cuidador");


            while($dados = mysqli_fetch_assoc($sqlDados)){
                $nome = $dados["nome"];
                
                //pegando a idade por meio da data de nascimento
                $idade = $dados["dtNasc"];
                $dataAtual = new DateTime();
                $idade = new DateTime($idade);
                $idade = $dataAtual->diff($idade)->y;

                $registroProfissional = $dados["registroProfissional"];
            }

            ?>

        <div>
            <h3><?php echo$nome; ?></h3>
            <p><?php echo"".$idade; ?></p>
            <p><?php echo$registroProfissional; ?></p>
            <br><br> <?php

            //pegando os dados de agenda do cuidador
            $sqlAgenda = mysqli_query($con, "SELECT * FROM agenda WHERE id_cuidador = $id");

            if(mysqli_num_rows($sqlAgenda) == 0){
                echo"Este cuidador não possui uma agenda!";
            }else{
                ?>
                <table border="1">
                    <form method="POST" name="" action="assets/php/contratar.php">
                    <tr>
                        <td><p>Dia da semana:</p></td>
                        <td><p>Turno:</p></td>
                        <td><p>Hora de início:</p></td>
                        <td><p>Hora de saída:</p></td>
                        <td><p>Preço:</p></td>
                        <td><p>Selecione o turno que deseja:</p></td>
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