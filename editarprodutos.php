<?php
include 'funcoes.php';
include ('conexao/connect.php');

@$id = descriptId($_GET['id']);

  if(@$_POST['alterar'] == 1){

    if(isset($_POST['Status'])){
       $_POST['Status'] = 'S';
    }else{
       $_POST['Status'] = 'N';
    }

    $data = array(
        ':mProdId'            => $_POST['ProdId'],
        ':mProdEmail'         => $_POST['Email'],
        ':mProdTitulo'        => $_POST['Titulo'],
        ':mProdEndereco'      => $_POST['Endereco'],
        ':mProdRegiao'        => $_POST['Regiao'],
        ':mProdTipo'          => $_POST['Tipo'],
        ':mProdDescricao'     => $_POST['Descricao'],
        ':mProdStatus'        => $_POST['Status'],
        ':mHorarioDePostagem' =>  date('Y-m-d') . ' ' .date('H:i:s')
        );



    $consulta = "UPDATE produtos SET ProdEmail    = :mProdEmail,
                                     ProdTitulo   = :mProdTitulo,
                                     ProdEndereco = :mProdEndereco,
                                     ProdRegiao   = :mProdRegiao,
                                     ProdTipo     = :mProdTipo,
                                     ProdDesc     = :mProdDescricao,
                                     ProdStatus   = :mProdStatus,
                                     HorarioDePostagem = :mHorarioDePostagem
                 WHERE ProdId = :mProdId";

    $stmt = $conn->prepare($consulta);
    $stmt->execute($data);
      
  }

  $consulta = "SELECT ProdId,ProdImg,ProdTitulo,ProdTipo,ProdDesc,ProdEndereco,ProdEmail,ProdRegiao FROM produtos WHERE ProdId= $id ";
  
  $registros = $conn -> query($consulta);
  foreach($registros as $row){}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Editar dados do produto</title>

	 <link rel="stylesheet" href="css/custom-bs.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/bootstrap-select.min.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="fonts/line-icons/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/quill.snow.css">

    <!-- MAIN CSS -->
  <link rel="stylesheet" href="css/style.css"> 

  <style type="text/css">
	    #btnpost{
	      width: 230px;
	    }
	    img {
		  border: 1px solid #ddd;
		  border-radius: 4px;
		  padding: 5px;
		  width: 150px;
  		}
  		img:hover {
  		  box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
  		}
  </style>
  <style type="text/css">
    .switch {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 34px;
    }

    /* Hide default HTML checkbox */
    .switch input {
      opacity: 0;
      width: 0;
      height: 0;
    }

    /* The slider */
    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
    }

    .slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }

    input:checked + .slider {
      background-color: green;
    }

    input:focus + .slider {
      box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
      border-radius: 34px;
    }

    .slider.round:before {
      border-radius: 50%;
    }
  </style>
 
</head>
<body>

<section id="section" class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 mb-5">
        <h2 class="mb-4">Cadastrar no CCA</h2>

<form class="p-4 p-md-5 border rounded" id="formprod" name="formprod" method="post" action="">
  <h3 class="text-black mb-5 border-bottom pb-2">Detalhes do Produto</h3>

              <div class="form-group">
                <div class="job-listing-logo">
                  <img src="<?php echo $row['ProdImg']  ?>" alt="images/error.png" class="img-fluid">
                </div>
                <label for="company-website-tw d-block">Escolha uma imagem</label> <br>
                <label class="btn btn-primary btn-md btn-file">
                  Buscar<input name="Imagem" type="file">
                </label>
              </div>

              <div class="form-group">
                <label for="email">Email</label>
                <input name="Email" type="text" class="form-control" id="email" placeholder="Inserir Email" value="<?php echo $row['ProdEmail']; ?>">
              </div>
              <div class="form-group">
                <label for="prod-title">Título do Produto</label>
                <input name="Titulo" type="text" class="form-control" id="prod-title" placeholder="Produto" value="<?php echo $row['ProdDesc']; ?>">
              </div>
              <div class="form-group">
                <label for="prod-location">Localização</label>
                <input name="Endereco" type="text" class="form-control" id="prod-location" placeholder="Endereço" value="<?php echo $row['ProdEndereco']; ?>">
              </div>

              <div class="form-group">
                <label for="prod-region">Produto da Região</label>
                <select name="Regiao" class="selectpicker border rounded" id="prod-region" data-style="btn-black" data-width="100%" data-live-search="true" title="Selecione Região" >

                      <option value="1" 
                      <?php if($row['ProdRegiao'] == 1){
                        echo 'Selected';
                      }
                       ?> >
                       Itapeva
                      </option>

                      <option value="2" 
                      <?php if($row['ProdRegiao'] == 2){
                        echo 'Selected';
                      } 
                      ?> >
                       Buri
                      </option>


                      <option value="3" 
                      <?php if($row['ProdRegiao'] == 3){
                        echo 'Selected';
                      } 
                      ?> >
                      Riberão
                      </option>

                    </select>
              </div>

              <div class="form-group">
                <label for="prod-type">Tipo de Produto</label>
                <select name="Tipo" class="selectpicker border rounded" id="prod-type" data-style="btn-black" data-width="100%" data-live-search="true" title="Selecione tipo de Produto"value="<?php echo $row['ProdTipo']; ?>">

                  <option value=""></option>

                  <?php
                  $consultatipo = "SELECT TipoId, TipoNome from tipoprodutos";
                  $result = $conn -> query($consultatipo);

                  foreach($result as $rowtipo){
                  ?>

                  <option value="<?php echo $rowtipo['TipoId']; ?>" 
                    <?php if($row['ProdRegiao'] == $rowtipo['TipoId']){
                      echo 'Selected';
                    } 
                    ?>>
                    <?php echo $rowtipo['TipoNome']; ?>
                  </option>

                  <?php
                  }
                  ?>

                </select>
              </div>

              <div class="form-group">
                  <label for="prod-desc">Descrição do produto</label>
                  <textarea name="Descricao" class="form-control" placeholder="Digite aqui" title="Descrição do produto" rows="10" style="resize: none" value="<?php echo $row['ProdDesc']; ?>"></textarea>
              </div>

              <div>
                <label class="switch">
                  <input type="checkbox" name="Status">
                  <span class="slider round"></span>
                </label>
              </div>

              <div class="row align-items-center mb-5">
                <div class="col-lg-4 ml-auto">
                  <div class="row">
                    <div class="col-6">
                      <div style="padding-bottom:30px;">
                        <button id="btnpost" type="submit" class="btn btn-block btn-primary btn-md">Salvar Alterações</button>
                      </div>
                      <input type="hidden" name="alterar" value="1">
                      <input type="hidden" name="ProdId" value="<?php echo $row['ProdId']; ?>">
                      
                        <button id="btnpost" class="btn btn-block btn-primary btn-md"><a style="color:white;" href="admin.php">Cancelar</a></button>
                      
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </form>

      </div>
    </div>
  </div>
</section>

            <script src="js/jquery.min.js"></script>
			<script src="js/bootstrap.bundle.min.js"></script>
			<script src="js/isotope.pkgd.min.js"></script>
			<script src="js/stickyfill.min.js"></script>
			<script src="js/jquery.fancybox.min.js"></script>
			<script src="js/jquery.easing.1.3.js"></script>
			    
			<script src="js/jquery.waypoints.min.js"></script>
			<script src="js/jquery.animateNumber.min.js"></script>
			<script src="js/owl.carousel.min.js"></script>
			<script src="js/quill.min.js"></script>
			  
			<script src="js/bootstrap-select.min.js"></script>
			    
			<script src="js/custom.js"></script>

</body>
</html>