<?php
include 'funcoes.php';
include ('conexao/connect.php');
	apagarRegistro($_GET['id']);
?>
<meta http-equiv="refresh" content="0;url=admin.php">
