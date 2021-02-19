<?php
  session_start();
  include 'funcoes.php';
  include ('conexao/connect.php');
  include 'navbar.php';

  if(@$_SESSION['categoria'] != 1 && @$_SESSION['categoria'] != 2){
    ?>
      <meta http-equiv="refresh" content="0;url=login.php">
    <?php
  } else{
?>


<!doctype html>
<html lang="en">
  <head>
    <title>CCA &mdash; Catálogo para o comércio agrícola</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <style type="text/css">
    #btnpost{
      width: 230px;
    }
  </style>

    <body>
    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/imgFundo.jpg');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Poste Produtos</h1>
            <div class="custom-breadcrumbs">
              <a href="#">Início</a> <span class="mx-2 slash">/</span>
              <a href="#">Produtos</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>Poste Produtos</strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <section class="site-section">
      <div class="container">

        <div class="row align-items-center mb-5">
          <div class="col-lg-8 mb-4 mb-lg-0">
            <div class="d-flex align-items-center">
              <div>
                <h2>Poste um Produto</h2>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="row">
            </div>
          </div>
        </div>
        <div class="row mb-5">
          <div class="col-lg-12">
            <form class="p-4 p-md-5 border rounded" id="formprod" name="formprod" method="post" action="incluiproduto.php" enctype="multipart/form-data">
              <h3 class="text-black mb-5 border-bottom pb-2">Detalhes do Produto</h3>
              
              <div class="form-group">
                <label for="company-website-tw d-block">Escolha uma imagem</label> <br>
                <label class="btn btn-primary btn-md btn-file">
                  Buscar<input name="Imagem" type="file">
                </label>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input name="Email" type="text" class="form-control" id="email" placeholder="Inserir Email">
              </div>
              <div class="form-group">
                <label for="prod-title">Título do Produto</label>
                <input name="Titulo" type="text" class="form-control" id="prod-title" placeholder="Produto">
              </div>
              <div class="form-group">
                <label for="prod-location">Localização</label>
                <input name="Endereco" type="text" class="form-control" id="prod-location" placeholder="Endereço">
              </div>
              <div class="form-group">
                <label for="prod-region">Produto da Região</label>
                <select name="Regiao" class="selectpicker border rounded" id="prod-region" data-style="btn-black" data-width="100%" data-live-search="true" title="Selecione Região">
                
                 <option value=""></option>

                 <?php
                  $consultaregiao = "SELECT RegiaoId, RegiaoNome from regiao";
                  $result = $conn -> query($consultaregiao);

                  foreach($result as $rowregiao){
                  ?>

                  <option value="<?php echo $rowregiao['RegiaoId']; ?>">
                    <?php echo $rowregiao['RegiaoNome']; ?>
                  </option>

                  <?php
                  }
                  ?>

                </select>
              </div>
              <div class="form-group">
                <label for="prod-type">Tipo de Produto</label>
                <select name="Tipo" class="selectpicker border rounded" id="prod-type" data-style="btn-black" data-width="100%" data-live-search="true" title="Selecione tipo de Produto">

                  <option value=""></option>

                  <?php
                  $consultatipo = "SELECT TipoId, TipoNome from tipoprodutos";
                  $result = $conn -> query($consultatipo);

                  foreach($result as $rowtipo){
                  ?>

                  <option value="<?php echo $rowtipo['TipoId']; ?>">
                    <?php echo $rowtipo['TipoNome']; ?>
                  </option>

                  <?php
                  }
                  ?>

                </select>
              </div>
              <div class="form-group">
                  <label for="prod-desc">Descrição do produto</label>
                  <textarea name="Descricao" class="form-control" placeholder="Digite aqui" title="Descrição do produto" rows="10" style="resize: none"></textarea>
              </div>
              <div class="row align-items-center mb-5">
                <div class="col-lg-4 ml-auto">
                  <div class="row">
                    <div class="col-6">
                      <button id="btnpost" type="submit" class="btn btn-block btn-primary btn-md">Salvar Produto</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>   
        </div>
      </div>
    </section>

    <?php include 'footer.php'; ?>
  
  </div>

    <!-- SCRIPTS -->
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
<?php
}
?>