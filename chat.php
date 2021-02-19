
<?php
session_start();
include 'navbar.php';
include ('conexao/connect.php');
include 'funcoes.php';

$meuid = $_SESSION['PesId'];

$consulta = "SELECT * FROM pessoas";
$registros = $conn -> query($consulta);

@$pagina = descriptId($_GET['id']);

$PesImg = "SELECT PesImagem FROM pessoas WHERE PesId = '$pagina'";
$result = $conn -> query($PesImg);
foreach($result as $imagem){}

$minhaImg = "SELECT PesImagem FROM pessoas WHERE PesId = '$meuid'";
$result = $conn -> query($minhaImg);
foreach($result as $minhaImagem){}

?>

<style>

.circle {
  border-radius: 50%;
  width: 45px;
  height: 45px;
  overflow: hidden;
  position: relative;
}

.circle-img {
  position: relative;
  bottom: 0;
  width: 100%;
}

</style>

<!doctype html>
<html lang="pt-br">
  <head>
    <title>CCA &mdash; Catálogo para o comércio agrícola</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/imgFundo.jpg');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Conversas</h1>
            <div class="custom-breadcrumbs">
              <a href="#">Início</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>Conversas</strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="site-section">

      <div class="container" style="border-style:solid;height=500px;border-width:3px;border-radius:10px;">
      
        <div class="row col-12">
          <div class="col-4" style="height:420px;
		overflow:auto;">
            <ul style="list-style-type:none;padding-top:15px;">
              <li><a href=""></a></li>
              <?php
              foreach($registros as $row){
              ?>
               <li style="padding-bottom:30px;">
                  <a class="nav-link" href="#/<?php echo $row['PesId']; ?>" style="cursor:pointer;">
                    <div class="circle" style="margin-left:20px;height:100px;width:100px;">
                      <?php
                        if($row['PesImagem'] != ''){
                      ?>
                         <img class="circle-img" src="<?php echo $row['PesImagem']; ?>">
                      <?php
                      }else{
                      ?>
                        <img class="circle-img" src="images/default.gif">
                      <?php } ?>
                    </div>
                    <?php echo $row['PesNome']; ?>
                  </a>
                </li>
                <hr>
              <?php } ?>
            </ul>
          </div>
          
          <div class="col-8" style="border-left-style:solid;border-width:3px;">
              <form id="form-chat" action="" method="POST" enctype="multipart/form-data">

              <?php if($pagina != ''){ ?>
              
                <div style="height:350px;overflow:auto;overflow-x: hidden;">

                  <div class="row" id="msg" align="right" style="margin-right:10px;padding-bottom:10px;padding-top:20px;text-align: justify;">
                    <div class="col-11" align="right">
                        <p>Bom dia, me chamo Manuela e tenho interesse em comprar pêssego.</p>
                    </div>
                    <div class="circle">
                        <img class="circle-img" src="<?php echo $minhaImagem[0]; ?>">
                    </div>
                    </div><hr>

                  <div id="resp" class="row" id="resp" align="left" style="text-align: justify;">
                      <div class="circle" style="margin-left:20px;">
                          <img class="circle-img" src="<?php echo $imagem[0]; ?>">
                      </div>
                      <div class="col-10" align="left">
                          <p>Bom dia!</p>
                      </div>
                  </div><hr>

                  <div id="resp" class="row" id="resp" align="left" style="text-align: justify;">
                      <div class="circle" style="margin-left:20px;">
                      <img class="circle-img" src="<?php echo $imagem[0]; ?>">
                      </div>
                      <div class="col-10" align="left">
                          <p>Me passa seu endereço que eu entrego, com o valor de uma taxa, tudo bem?</p>
                      </div>
                  </div><hr>

                  <div class="row" id="msg" align="right" style="margin-right:10px;padding-bottom:10px;padding-top:20px;text-align: justify;">
                    <div class="col-11" align="right">
                        <p>Moro na chácara Água Doce número 213, fica na Vila Velha em Itapeva.</p>
                    </div>
                    <div class="circle">
                    <img class="circle-img" src="<?php echo $minhaImagem[0]; ?>">
                    </div>
                    </div><hr>

                    <div id="resp" class="row" id="resp" align="left" style="text-align: justify;">
                      <div class="circle" style="margin-left:20px;">
                      <img class="circle-img" src="<?php echo $imagem[0]; ?>">
                      </div>
                      <div class="col-10" align="left">
                          <p>Certo, calculando aqui deu ao todo R$215,20 sendo R$169,00 o saco com 5 kg, e R$46,00 o frete, pode ser?</p>
                      </div>
                  </div><hr>

                  <div class="row" id="msg" align="right" style="margin-right:10px;padding-bottom:10px;padding-top:20px;text-align: justify;">
                    <div class="col-11" align="right">
                        <p>Pode sim.</p>
                    </div>
                    <div class="circle">
                    <img class="circle-img" src="<?php echo $minhaImagem[0]; ?>">
                    </div>
                    </div><hr>

                    <div id="resp" class="row" id="resp" align="left" style="text-align: justify;">
                      <div class="circle" style="margin-left:20px;" align="left">
                      <img class="circle-img" src="<?php echo $imagem[0]; ?>">
                      </div>
                      <div class="col-10">
                          <p>Confirmado, qual é o melhor dia para levar?</p>
                      </div>
                  </div><hr>

                  <div class="row" id="msg" align="right" style="margin-right:10px;padding-bottom:10px;padding-top:20px;text-align: justify;">
                    <div class="col-11" align="right">
                        <p>Pode ser na Terça-Feira a tarde?</p>
                    </div>
                    <div class="circle">
                    <img class="circle-img" src="<?php echo $minhaImagem[0]; ?>">
                    </div>
                    </div><hr>

                    <div id="resp" class="row" id="resp" align="left" style="text-align: justify;">
                      <div class="circle" style="margin-left:20px;" align="left">
                      <img class="circle-img" src="<?php echo $imagem[0]; ?>">
                      </div>
                      <div class="col-10">
                          <p>Confirmado então Manuela, a empresa Seu Zé agradece.</p>
                      </div>
                  </div><hr>

                </div>

              <?php }else{ ?>

              <div style="margin-left:150px;margin-top:170px;font-size:25;"> Selecione alguém para iniciar a conversa.</div>

              <?php } ?>

                  <div class="input-group" style="position: absolute;bottom:20px;left:10px;">
                    <input type="text" name="mensagem" id="mensagem" placeholder="Digite sua mensagem" class="form-control" style="border-radius:10px;"/>
                    <span class="input-group-btn">
                      <input type="submit" value="&rang;&rang;" class="btn btn-success">
                      <input type="hidden" name="env" value="envMsg"/>
                    </span>
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
    <script>
      let form = document.getElementById('form-chat');
      form.addEventListener("submit", function(event){ 
        event.preventDefault();
        });
    </script>


  </body>
</html>