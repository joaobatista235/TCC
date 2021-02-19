<?php
session_start();
include ('conexao/connect.php');
include 'funcoes.php';

$idpessoa = $_SESSION['PesId'];

$consulta = "select * from pessoas where PesId = '$idpessoa'";

$result = $conn -> query($consulta);
foreach($result as $row){}

$b = $row['PesRegiao'];

$regiao = "SELECT RegiaoNome
        FROM regiao 
        INNER JOIN pessoas ON PesRegiao = regiao.RegiaoId
        WHERE RegiaoId = '$b'";
$resultRegiao = $conn -> query($regiao);
foreach($resultRegiao as $regioes){}

$prod = "SELECT * FROM produtos where ProdProprietario = '$idpessoa'";
$ex = $conn -> query($prod);


?>
<!doctype html>
<html lang="pt-br">
  <head>
    <title>CCA &mdash; Catálogo para o comércio agrícola</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style>
    #titulo-listagem{
      text-align: center;
    }
    </style>
    <style>

    .circle {
      border-radius: 50%;
      width: 120px;
      height: 120px;
      overflow: hidden;
      position: relative;
    }

    .circle-img {
      position: relative;
      bottom: 0;
      width: 100%;
    }

    .cont:hover .image{
      opacity: 0.5;
      visibility: visible;
      -webkit-transform: scale(1.09);
      -ms-transform: scale(1.05);
      transform: scale(1.05);
      -webkit-transition: .3s all ease-in-out;
      -o-transition: .3s all ease-in-out;
      transition: .3s all ease-in-out;
    }


    </style>
  </head>

  <body>
    <?php
      include 'navbar.php';
    ?>
    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/imgFundo.jpg');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Perfil</h1>
          </div>
        </div>
      </div>
    </section>
    <section class="site-section">
      <div class="container">
          <div class="row align-items-center mb-5">
            <div class="col-lg-8 mb-4 mb-lg-0">
              <div class="d-flex align-items-center">
                <div class=" p-2 d-inline-block mr-3 rounded">
                  <div class="circle">
                      <?php
                      if($row['PesImagem'] != ''){
                      ?>
                      <img class="circle-img image"  src="<?php echo $row['PesImagem']; ?>">
                      <?php
                      }else{
                      ?>
                      <img class="circle-img image"  src="images/default.gif">
                      <?php
                      }
                      ?>
                  </div>
                </div>
                <div>
                  <h2><?php echo $row['PesNome']; ?></h2>
                  <div style="padding-left:800px;font-size:40px;">
                    <a href="chat.php">
                      <i id="ico" class="fas fa-inbox" style="font-size: 40;cursor:pointer;padding-right:400px;"></i>
                    </a>
                  </div>
                </div>
              </div>
              <div style="padding-top:40px;margin-left:20px;">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                  Alterar dados
                </button>
              </div>
            </div>
          </div>

        <form class="p-4 border rounded">
            <div id="titulo-listagem">
              <h2  class="font-weight-bold">Produtos Postados</h1>
            </div>
          <div>

          <ul class="job-listings mb-5">
            <?php foreach($ex as $produtos){ 
              
              $b = $produtos['ProdRegiao'];

              $regiao = "SELECT RegiaoNome
                       FROM regiao 
                       INNER JOIN produtos ON ProdRegiao = regiao.RegiaoId
                       WHERE RegiaoId = '$b'";
              $resultRegiao = $conn -> query($regiao);
              foreach($resultRegiao as $regioes){}
  
              $c = $produtos['ProdTipo'];
  
              $tipo = "SELECT TipoNome
                       FROM tipoprodutos 
                       INNER JOIN produtos ON ProdTipo = tipoprodutos.TipoId
                       WHERE TipoId = '$c'";
              $resultTipo = $conn -> query($tipo);
              foreach($resultTipo as $tipos){}
              
              ?>
              <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                <a href="produto.php?id=<?php echo criptId($produtos['ProdId']); ?>"></a>

                  <div class="job-listing-logo">
                    <img src="<?php echo $produtos['ProdImg']  ?>" alt="images/error.png" class="img-fluid">
                  </div>

                  <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                
                  <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                    <h2><?php echo $produtos['ProdTitulo'];  ?></h2>
                    <strong><?php echo $row['PesNome'];;  ?></strong>
                  </div>

                  <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                    <span class="icon-room"></span> <?php echo $regioes[0];;  ?>
                  </div>

                  <div class="job-listing-meta">
                    <span class="badge badge-success"><?php echo $tipos[0];  ?></span>
                  </div>
                  
                  </div>
                  
              </li>
            <?php } ?>
          </ul>

          </div>
        </form>
        </div>
    </section>

    <?php
      require 'form_modal.php';
    ?>
  
    <!-- SCRIPTS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/stickyfill.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="https://kit.fontawesome.com/ed2313115b.js" crossorigin="anonymous"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/quill.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

    <?php include 'footer.php'; ?>
  </body>
</html>