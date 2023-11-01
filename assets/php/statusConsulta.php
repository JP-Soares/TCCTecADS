<?php

include_once("conexao.php");

//Mudar o status da consulta


$sqlUpdateStatus = mysqli_query($con, "UPDATE consulta SET statusConsulta='".$_GET["status"]."' WHERE id_consulta=".$_GET["idConsulta"]);

$_SESSION["msg"] = "Contrato com sucesso!";
header('Location: ../../perfilPessoal.php');

?>