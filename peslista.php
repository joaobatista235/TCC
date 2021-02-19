<?php
include 'funcoes.php';
include ('conexao/connect.php');
//session_start();

		if(@$_SESSION['categoria'] != 1){
			?>
			<meta http-equiv="refresh" content="0;url=login.php">
			<script type="text/javascript">alert("Página indisponível");</script>
			<?php
		}else{
		$consulta = "SELECT PesId, PesNome, PesCPF, PesCategoria FROM pessoas";
		$registros = $conn -> query($consulta);
?>
<style type="text/css">
	#titulo{
		font-size: 20;
		font-family: sans-serif;
	}
	#del{cursor: pointer;}
</style>
<style>
	#table-scroll {
		height:420px;
		overflow:auto;  
		margin-right:60px;
		margin-left:50px;
	}
</style>

<!DOCTYPE html>
<html>
	<head>
		<title>Painel de Controle - Admin</title>
		<link href="bootstrap-4.5.0-dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://kit.fontawesome.com/ed2313115b.js" crossorigin="anonymous"></script>
	</head>
	<body>

		<div id="table-wrapper">
		<div id="table-scroll">
				<table align="center" class="table table-dark table-striped col-lg-11">
				
					<thead>
					<tr>
						<th>ID</th>
						<th>Nome</th>
						<th>CPF</th>
						<th>Categoria</th>
					</tr>

					<?php
					foreach($registros as $row){
						?>
					<tr>
						<th><?php echo $row['PesId'] ?></th>
						<th><?php echo $row['PesNome'] ?></th>
						<th><?php echo $row['PesCPF'] ?></th>
						<th><?php echo $row['PesCategoria'] ?></th>
						
						
						<th><!-- Delete -->
							<a id="del" onclick="return confirmarEscolha(<?php echo $row['PesId']; ?>);" >
								<i class="far fa-trash-alt" style="color:white; font-size:22px;">
								</i>
							</a>
						</th>

						<th><!-- Edit  -->
							<a>
								<i class="far fa-edit" style="color:white; font-size:22px;">
								</i>
							</a>
						</th>
					</tr>

					<?php
						}
					?>

					</thead>
				</table>
			</div>
		</div>
	</body>
</html>
 

<?php
	}
?>
