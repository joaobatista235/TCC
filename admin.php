<?php
include ('conexao/connect.php');
include 'funcoes.php';

session_start();
	if(@$_SESSION['categoria'] != 1){
?>
	<meta http-equiv="refresh" content="0;url=login.php">
	<script type="text/javascript">alert("Página indisponível");</script>
<?php
	}else{
	@$pagina = descriptId(@$_GET['pagina']);
?>
 
<style type="text/css">
	#titulo{
		font-size: 25;
		font-family: sans-serif;
	}
	h1{
		padding:100px;
	}
	#principal{
		position: relative;
		height: 100vh;
		min-height: 900px;
		background-size: cover;
	}
</style>
<style type="text/css">
.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}
.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}
.sidenav a:hover {
  color: #f1f1f1;
}
.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>


<html>
	<head>
		<title>Painel de Controle - Admin</title>
		<link href="bootstrap-4.5.0-dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://kit.fontawesome.com/ed2313115b.js" crossorigin="anonymous"></script>
		
	</head>
	<body id="principal" style="background-image: url('images/imgFundo.jpg');overflow: hidden;">
		<div id="mySidenav" class="sidenav">
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		<a class="navbar-brand" href="admin.php">Home</a>
		<a class="nav-link" href="admin.php?pagina=<?php echo criptId('peslista'); ?>">Pessoas</a>
		<a class="nav-link" href="admin.php?pagina=<?php echo criptId('prodlista'); ?>">Produtos</a>
		<a href="#">Categorias</a>
		</div>

		<header style="height:100px;" class="site-navbar mt-3">
		<nav class="navbar navbar-expand-md bg-dark navbar-dark" style="height:100px;">
		<span style="font-size:30px;cursor:pointer;padding-right:25px;color:white;" onclick="openNav()">&#9776; Controle</span>
              <a href="index.php" class="nav-link active" style="color:white;font-size:25px">Início</a>
			  <a href="logout.php" class="btn btn-primary border-width-2 d-none d-lg-inline-block" style="position: absolute;
  right: 80px;font-size:20;padding:8px 20px 8px 20px;">Sair</a>
		</nav>
		</header>

		<div  class="container p-4 my-4 bg-dark text-white col-lg-11">
		  	<div id="titulo">CCA - Painel de controle</div>
		</div>

		<?php 

		if($pagina != ''){
			include $pagina.'.php';
		}else{
			?>
	
		<div>
			<h1 align='center' style="font-size:60;padding-top:150;padding-bottom:240;">Seja Bem Vindo!</h1>
		</div>
		<footer style="background: #212529;" class="site-footer"><h1>asd</h1></footer>

		<?php
			
		}
	}
		
		?>

	</body>
	<script>
		function openNav() {
		document.getElementById("mySidenav").style.width = "250px";
		}

		function closeNav() {
		document.getElementById("mySidenav").style.width = "0";
		}
</script>
</html>

