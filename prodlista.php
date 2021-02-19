<?php
include 'funcoes.php';
include ('conexao/connect.php');
//session_start();

		if
		(@$_SESSION['categoria'] != 1)
		{
			?>
			<meta http-equiv="refresh" content="0;url=login.php">
			<script type="text/javascript">alert("Página indisponível");</script>
			<?php
		}

		else
		{
		$consulta = "SELECT ProdId,ProdImg,ProdTipo,ProdDesc,ProdEmail,ProdRegiao,ProdStatus FROM produtos";
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

	<div id="table-scroll">
		<table align="center" class="table table-dark table-striped col-lg-11">
				<thead>
				<tr>
					<th>ID</th>
					<th>Imagem</th>
					<th>Tipo</th>
					<th>Descrição</th>
					<th>Email</th>
					<th>Região</th>
					<th>Status</th>
				</tr>

				<?php
				 
				foreach($registros as $row){
					$b = $row['ProdRegiao'];

					$regiao = "SELECT RegiaoNome
							 FROM regiao 
							 INNER JOIN produtos ON ProdRegiao = regiao.RegiaoId
							 WHERE RegiaoId = '$b'";
					$resultRegiao = $conn -> query($regiao);
					foreach($resultRegiao as $regioes){}
		
					$c = $row['ProdTipo'];
		
					$tipo = "SELECT TipoNome
							 FROM tipoprodutos 
							 INNER JOIN produtos ON ProdTipo = tipoprodutos.TipoId
							 WHERE TipoId = '$c'";
					$resultTipo = $conn -> query($tipo);
					foreach($resultTipo as $tipos){}
					?>

				<tr>
					<th id="id"><?php echo $row['ProdId'] ?></th>

					<?php
					if($row['ProdImg'] != ''){
					?>
					<th> <img src="<?php echo $row['ProdImg']; ?>" width="100px"> </th>
					<?php
					}else{
					?>
					<th> <img src="images/error.png" height="100px" width="100px"> </th>
					<?php } ?>

					<th id="tipo"><?php echo $tipos[0] ?></th>
					<th id="descricao"><?php echo $row['ProdDesc'] ?></th>
					<th id="email"><?php echo $row['ProdEmail'] ?></th>
					<th id="regiao"><?php echo $regioes[0] ?></th>
					<th id="status"><?php echo $row['ProdStatus'] ?></th>

					<th><!-- Delete -->
						<a id="del" onclick="return confirmarEscolhaProduto(<?php echo $row['ProdId']; ?>);" >
							<i class="far fa-trash-alt" style="color:white; font-size:22px;">
							</i>
						</a>
					</th>

					<th id="editar"><!-- Edit -->
						<a href="editarprodutos.php?id=<?php echo criptId($row['ProdId']); ?>">
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
	</body>
</html>

<?php
	}
?>