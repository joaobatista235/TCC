<?php
session_start();
include 'navbar.php';
include ('conexao/connect.php');
include 'funcoes.php';

$id = descriptId($_GET['id']);

if(!isset($id)){
  ?>
  <meta http-equiv="refresh" content="index.php">
  <?php
}else{

    $consulta = "SELECT ProdId,ProdImg,ProdTipo,ProdTitulo,ProdDesc,ProdEmail,ProdRegiao,ProdStatus,ProdProprietario,HorarioDePostagem FROM produtos WHERE ProdId = '$id' ";
		$registros = $conn -> query($consulta);

    foreach($registros as $row){}
    $a = $row['ProdProprietario'];

    $nome = "SELECT PesNome
            FROM pessoas 
            INNER JOIN produtos ON ProdProprietario = pessoas.PesId
            WHERE PesId = '$a'";
    $resultNome = $conn -> query($nome);
    foreach($resultNome as $nomes){}

    $b = $row['ProdRegiao'];

    $regiao = "SELECT RegiaoNome
            FROM regiao 
            INNER JOIN produtos ON ProdRegiao = regiao.RegiaoId
            WHERE RegiaoId = '$b'";
    $resultRegiao = $conn -> query($regiao);
    foreach($resultRegiao as $regioes){}

    $foto = "SELECT PesImagem
            FROM pessoas 
            INNER JOIN produtos ON ProdProprietario = pessoas.PesId
            WHERE PesId = '$a'";
    $resultFoto = $conn -> query($foto);
    foreach($resultFoto as $img){}

?>

<!doctype html>
<html lang="en">
  <head>
    <title>CCA &mdash; Catálogo para o comércio agrícola</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
    </style>

    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/imgFundo.jpg');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Vendedor</h1>
            <div class="custom-breadcrumbs">
              <a href="#">Início</a> <span class="mx-2 slash">/</span>
              <a href="#">Vendas</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>Sementes</strong></span>
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
                 <div class="circle">
                    <img class="circle-img image" src="<?php echo $img[0]; ?>" alt="Image">
                  </div>
              <div>
                <h2 style="margin-left:20;"><?php echo @$nomes[0]; ?></h2>
                <div  style="margin-left:20;">
                  <span class="m-2"><span class="icon-room mr-2"></span><?php echo @$regioes[0]; ?></span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="row">
              <div class="col-6">
                <a href="#" class="btn btn-block btn-light btn-md"><span class="icon-heart-o mr-2 text-danger"></span>Favoritar</a>
              </div>
              <div class="col-6">
                <a 
                <?php if(@$_SESSION['categoria'] == 1 || @$_SESSION['categoria'] == 2){ ?>
                href="chat.php?id=<?php echo criptId($row['ProdProprietario']); ?>"
                <?php }else{ ?>
                onclick="alert('Faça login para contatar vendedores')"
                <?php } ?>
                style="color:white; cursor:pointer"
                class="btn btn-block btn-primary btn-md">Contatar vendedor</a>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8">
            <div class="mb-5">
            <h2 style="color: rgba(0,0,0,.8);font-size:30;font-weight: 600;"></h2>
              <figure class="mb-5"><?php
                if($row['ProdImg'] != ''){
                  ?>
                    <img src="<?php echo $row['ProdImg']; ?>" width="600px" style="border: 5px solid #555;">
                    <?php
                    }else{
                    ?>
                  <img src="images/error.png" height="100px" width="100px">
                <?php } ?>
              </figure>
              <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-align-left mr-3"></span>Descrição do produto</h3>
              <p style="font-size:20px;"><?php echo $row['ProdDesc']; ?></p>
            </div>
           
            <div class="row mb-5">
              <div class="col-6">
                <a href="#" class="btn btn-block btn-light btn-md"><span class="icon-heart-o mr-2 text-danger"></span>Favoritar</a>
              </div>
              <div class="col-6">
              <a 
                <?php if(@$_SESSION['categoria'] == 1 || @$_SESSION['categoria'] == 2){ ?>
                href="chat.php?id=<?php echo criptId($row['ProdProprietario']); ?>"
                <?php }else{ ?>
                onclick="alert('Faça login para contatar vendedores')"
                <?php } ?>
                style="color:white; cursor:pointer"
                class="btn btn-block btn-primary btn-md">Contatar vendedor</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="bg-light p-3 border rounded mb-4">
              <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Especificações</h3>
              <ul class="list-unstyled pl-3 mb-0">
                <li class="mb-2"><strong class="text-black">Publicado em:</strong> <?php echo $row['HorarioDePostagem']; ?></li>
                <li class="mb-2"><strong class="text-black">Favoritados:</strong> 3</li>
                <li class="mb-2"><strong class="text-black">Localização:</strong> <?php echo @$regioes[0]; ?></li>
              </ul>
            </div>

            <div class="bg-light p-3 border rounded">
              <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Compartilhar</h3>
              <div class="px-3">
                <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-facebook"></span></a>
                <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
                <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-pinterest"></span></a>
              </div>
            </div>

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
    
    <script src="js/bootstrap-select.min.js"></script>
    
    <script src="js/custom.js"></script>


  </body>
</html>
<?php } ?>