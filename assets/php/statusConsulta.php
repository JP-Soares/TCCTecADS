<?php

include_once("conexao.php");

//Mudar o status da consulta

if($_GET["status"] == 1){//faz o update aceitando a consulta
    $sqlUpdateStatus = mysqli_query($con, "UPDATE consulta SET statusConsulta='".$_GET["status"]."' WHERE id_consulta=".$_GET["idConsulta"]);
}else{//faz o update negando a consulta
    $sqlUpdateStatus = mysqli_query($con, "DELETE FROM consulta WHERE id_consulta=".$_GET["idConsulta"]);
}

header('Location: ../../perfilPessoal.php');

?>