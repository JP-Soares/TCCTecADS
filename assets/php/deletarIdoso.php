<?php

    include_once("conexao.php");

    $idIdoso = $_GET["idIdoso"];

    $sqlDelete = "DELETE FROM idoso WHERE id_idoso=".$idIdoso;

    if($con->query($sqlDelete)){
        header('Location: ../../idosos.php');
    }

?>