<?php

//cada turno é um novo registro na tabela

include("conexao.php");
session_start();

$dia_semana = $_POST['diaSemana'];//Seg(segunda)/ Ter(terça)/ Qua(quarta)/ Qui(quinta)/ Sex(sexta)/ Sab(sábado)/ Dom(domingo)
$turno = $_POST['turnoTrabalho'];//M(manhã)/T(tarde)/N(noite)
$hora_inicio = $_POST['horaInicio'];//hh:mm
$hora_saida = $_POST['horaSaida'];//hh:mm
$preco = $_POST['preco'];


$diaSemanaString = implode(', ',$dia_semana);
$turnoString = implode(', ',$turno);

echo"<p>".$diaSemanaString."</p>";
echo"<p>".$turnoString."</p>";

echo"<br><br><br>";

 
// for($a = 0; $a < count($turno); $a++){
//     for($i = count($turno); $i > count($dia_semana); $i--){
//         echo"Registro: ".$a."<br>Dia Semana: ".$dia_semana[$i]."<br>Turno: ".$turno[$a];
//         echo"<br><br>";
//     }
// }

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

    echo"Registro: ".$a."<br>Dia Semana: ".$dia."<br>Turno: ".$turnoSigla."Hora inicio: ".$hora_inicio[$a]."<br>Hora saida: ".$hora_saida[$a]."<br>Preco: ".$preco[$a];
    echo"<br><br>";


    $sql = "INSERT INTO agenda (id_cuidador, hora_inicio, hora_saida, turno, dia_semana, preco_turno) VALUES ('".$_SESSION['id']."', '".$hora_inicio[$a]."', '".$hora_saida[$a]."', 
    '$turnoSigla', '$dia', '".$preco[$a]."')";

    if($con->query($sql) == true){
        header('Location: ../../perfilPessoal.php');
    }
}

?>