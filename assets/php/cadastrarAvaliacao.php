<?php

include_once("conexao.php");


$id_cuidador = $_GET["id_cuidador"];
$id_responsavel = $_GET["id_responsavel"];
$comentario = mysqli_real_escape_string($con, trim($_POST['comment']));
$qteEstrelas = mysqli_real_escape_string($con, trim($_POST['rating']));


$sql = "INSERT INTO avaliacao (id_cuidador, id_responsavel, qtde_estrela, comentario) VALUES ('$id_cuidador', '$id_responsavel', '$qteEstrelas', '$comentario')";

if($con->query($sql) == true){
    header('Location: ../../perfilPessoal.php');
}

?>