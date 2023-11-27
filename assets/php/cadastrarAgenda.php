<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HelpOlder||Agenda</title>

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
        <style>
            h1{
                font-family: 'Agdasima', sans-serif;
                font-family: 'M PLUS Rounded 1c', sans-serif;
                font-family: 'Mitr', sans-serif;
            }
        </style>
    </body>

</html>

<?php

//cada turno é um novo registro na tabela

include("conexao.php");
session_start();


$sqlVerify = "SELECT * FROM agenda WHERE id_cuidador =" . $_SESSION['id'];

$resultVerify = $con->query($sqlVerify);

while($dadosAgenda = mysqli_fetch_assoc($resultVerify)){
    $id_agenda = $dadosAgenda["id_agenda"];


    if ($resultVerify) {
        if ($resultVerify->num_rows > 0) {
            $sqlDelete = "DELETE FROM agenda WHERE id_cuidador = " . $_SESSION['id'] . " AND id_agenda NOT IN (SELECT id_agenda FROM consulta WHERE id_agenda =".$id_agenda. ")";

            if ($con->query($sqlDelete)) {
                echo "deletou";
            } else {
                echo "<h1>Há consultas agendas no momento! Confira sua disponibilidade e tente novamente!</h1>";
            }
        } else {
            echo "Nenhum registro para deletar.";
        }
    } else {
        echo "Erro na verificação: " . $con->error;
    }
}



$dia_semana = $_POST['diaSemana'];//Seg(segunda)/ Ter(terça)/ Qua(quarta)/ Qui(quinta)/ Sex(sexta)/ Sab(sábado)/ Dom(domingo)
$turno = $_POST['turnoTrabalho'];//M(manhã)/T(tarde)/N(noite)
$hora_inicio = $_POST['horaInicio'];//hh:mm
$hora_saida = $_POST['horaSaida'];//hh:mm
$preco = $_POST['preco'];


$diaSemanaString = implode(', ',$dia_semana);
$turnoString = implode(', ',$turno);
$hora_inicio_string = implode(', ',$hora_inicio);
$hora_saida_string = implode(', ',$hora_saida);

//Organiza os precos digitados
for($i = 0; $i <= count($preco); $i++){
    if (!empty($preco[$i])) {
        $precoArray[] = $preco[$i]; // Adicione apenas valores não vazios ao array $precoArray
    }
}


//Organiza os horarios de inicio digitados
for($i = 0; $i <= count($hora_inicio); $i++){
    if (!empty($hora_inicio[$i])) {
        $hora_inicio_array[] = $hora_inicio[$i];
    }
}

//Organiza os horarios de saida digitados
for($i = 0; $i <= count($hora_saida); $i++){
    if (!empty($hora_saida[$i])) {
        $hora_saida_array[] = $hora_saida[$i];
    }
}

for($a = 0; $a < count($turno); $a++){
    $diaSemana = substr($turno[$a] , -1);
    $turnoSigla = substr($turno[$a], 0, 1);
    
    switch($diaSemana){
        case 0:
            $dia = "dom";
            break;
        case 1:
            $dia = "seg";
            break;
        case 2:
            $dia = "ter";
            break;

        case 3:
            $dia = "qua";
            break;

        case 4:
            $dia = "qui";
            break;
        case 5:
            $dia = "sex";
            break;
    
        case 6:
            $dia = "sab";
            break;
    }
    // echo"Registro: ".$a."<br>Dia Semana: ".$dia."<br>Turno: ".$turnoSigla."<br>Hora inicio: ".$hora_inicio[$a]."<br>Hora saida: ".$hora_saida[$a]."<br>Preco: ".$precoArray[$a];
    // echo"<br><br>";

    $sql = "INSERT INTO agenda (id_cuidador, hora_inicio, hora_saida, turno, dia_semana, preco_turno) VALUES ('".$_SESSION['id']."', '".$hora_inicio[$a]."', '".$hora_saida[$a]."', 
    '$turnoSigla', '$dia', '".$precoArray[$a]."')";

    if($con->query($sql) == true){
        header('Location: ../../perfilPessoal.php');
    }
}

?>