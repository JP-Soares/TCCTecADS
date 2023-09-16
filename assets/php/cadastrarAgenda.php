<?php

//cada turno é um novo registro na tabela

include("conexao.php");
session_start();


//Se houver registros deste cuidador, deleta-os
$sqlVerify = "SELECT * FROM agenda WHERE id_cuidador =". $_SESSION['id'];

if($con->query($sqlVerify)){
    $sqlDelete = mysqli_query($con, "DELETE FROM agenda WHERE id_cuidador =". $_SESSION['id']);//deleta os registros antigos deste cuidador
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
    echo"Registro: ".$a."<br>Dia Semana: ".$dia."<br>Turno: ".$turnoSigla."<br>Hora inicio: ".$hora_inicio[$a]."<br>Hora saida: ".$hora_saida[$a]."<br>Preco: ".$precoArray[$a];
    echo"<br><br>";


    $sql = "INSERT INTO agenda (id_cuidador, hora_inicio, hora_saida, turno, dia_semana, preco_turno) VALUES ('".$_SESSION['id']."', '".$hora_inicio[$a]."', '".$hora_saida[$a]."', 
    '$turnoSigla', '$dia', '".$precoArray[$a]."')";

    if($con->query($sql) == true){
        header('Location: ../../perfilPessoal.php');
    }
}

?>