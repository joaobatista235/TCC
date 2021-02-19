<?php
	
include 'funcoes.php';
include ('conexao/connect.php');
//session_start();

		$consulta = "SELECT ProdId,ProdImg,ProdTipo,ProdDesc,ProdEmail,ProdRegiao,ProdStatus FROM produtos ORDER BY ProdId desc ";
		$registros = $conn -> query($consulta);
?> 

<html>
	<head>
		<title>Painel de Controle - Admin</title>
		<link href="bootstrap-4.5.0-dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://kit.fontawesome.com/ed2313115b.js" crossorigin="anonymous"></script>

		<style>
		img {
		  border: 1px solid #ddd;
		  border-radius: 4px;
		  padding: 5px;
		  width: 150px;
		}

		img:hover {
		  box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
		}

		#tipo, #id, #descricao,
		#email, #regiao, #status,
		#deletar, #editar
		{
			padding-bottom: 60px;
		}

		</style>
 
	</head>
	<body>


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

		        <th id="tipo"><?php echo $row['ProdTipo'] ?></th>
		        <th id="descricao"><?php echo $row['ProdDesc'] ?></th>
		        <th id="email"><?php echo $row['ProdEmail'] ?></th>
		        <th id="regiao"><?php echo $row['ProdRegiao'] ?></th>
		        <th id="status"><?php echo $row['ProdStatus'] ?></th>

		        <th id="deletar"><!-- Delete -->
		        	<a href="excluirproduto.php?id=<?php echo criptId($row['ProdId']); ?>">
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
	</body>
</html>

