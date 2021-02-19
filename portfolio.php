<?php
session_start();
include 'navbar.php';
include ('conexao/connect.php');
include 'funcoes.php';
    $consulta = "SELECT ProdId,ProdImg, ProdTipo FROM produtos";
		$registros = $conn -> query($consulta);
?>
<!doctype html>
<html lang="en">
  <head>
    <title>CCA &mdash; Catálogo para o comércio agrícola</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/imgFundo.jpg');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Categorias (Produtos)</h1>
            <div class="custom-breadcrumbs">
              <a href="#">Início</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>Produtos categorizados</strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="site-section block__62272" id="next-section">
      
      <div class="container">

        <div class="row justify-content-center mb-5" data-aos="fade-up">
          <div id="filters" class="filters text-center button-group col-md-7">
            <button class="btn btn-primary active" data-filter="*">Todos</button>
            
            <button class="btn btn-primary" data-filter=".sementes">Sementes</button>
            <button class="btn btn-primary" data-filter=".ferramentas">Ferramentas</button>
            <button class="btn btn-primary" data-filter=".colhidos">Colhidos</button>
          </div>
        </div>  

        <div id="posts" class="row no-gutter">
        <?php foreach($registros as $row){ 
          if($row['ProdTipo'] == 1){ ?>

            <div class="item sementes col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">  
              <a href="produto.php?id=<?php echo criptId($row['ProdId']); ?>" class="item-wrap">
                <img class="img-fluid" src="<?php echo $row['ProdImg']; ?>">
              </a>
            </div>
        
            <?php }else if($row['ProdTipo'] == 2){ ?>

            
            <div class="item ferramentas col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
              <a href="produto.php?id=<?php echo criptId($row['ProdId']); ?>" class="item-wrap">
                <img class="img-fluid" src="<?php echo $row['ProdImg']; ?>">
              </a>
            </div>
            <?php }else{ ?>

            <div class="item colhidos col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
              <a href="produto.php?id=<?php echo criptId($row['ProdId']); ?>" class="item-wrap">
                <img class="img-fluid" src="<?php echo $row['ProdImg']; ?>">
              </a>
            </div>

        <?php }} ?>
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