<?php

include ('conexao/connect.php');
include 'funcoes.php';
session_start();

$meuid = $_SESSION['PesId'];
$sql = "SELECT * FROM mensagens WHERE id_de OR id_para = '$meuid'";
$resultado = $conn -> query($sql);

?>