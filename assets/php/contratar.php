<?php

include_once("conexao.php");

session_start();

$id_cuidador = $_GET["id_cuidador"];

$idAgenda = $_POST["contratoTurno"];
$idAgendaString = implode(", ",$idAgenda);


$idIdoso = $_POST["contratoIdoso"];


for($i = 0; $i < count($idAgenda); $i++){//Quantidade de registros -> Para cada turno selecionado, um registro novo no banco de dados
    $idAgendaArray = $idAgenda[$i];
    $idIdosoArray = $idIdoso[$i];

    echo"IdAgenda:".$idAgendaArray."<br> Registro: ".$i. "<br> IdResponsavel: ".$_SESSION["id"]."<br> IdCuidador: ".$id_cuidador."<br>IdIdoso: ".$idIdosoArray."<br><br><br><br>";

    
    //Fazendo a inserção no banco de dados
    $sql = "INSERT INTO consulta(id_cuidador, id_responsavel, id_idoso, id_agenda) VALUES ('$id_cuidador', '".$_SESSION["id"]."', '$idIdosoArray', '$idAgendaArray')";

    if($con->query($sql) == true){
        $_SESSION["msg"] = "Contrato com sucesso!";
        header('Location: ../../perfilBusca.php?idCuidador='.$id_cuidador);
    }
    
}

?>