<?php
session_start();
include ('conexao/connect.php');
include 'navbar.php';

    $limite = 6;

    # Se pg não existe atribui 1 a variável pg
    $pg = (isset($_GET['pg'])) ? (int)$_GET['pg'] : 1;

    # Atribui a variável inicio o inicio de onde os registros vão ser
    # mostrados por página, exemplo 0 à 10, 11 à 20 e assim por diante
    $inicio = ($pg * $limite) - $limite;

        $sql_Total = 'SELECT ProdId FROM produtos';
        $query_Total = $conn->prepare($sql_Total);
        $query_Total->execute();

        $query_result = $query_Total->fetchAll(PDO::FETCH_ASSOC);

        # conta quantos registros tem no banco de dados
        $query_count =  $query_Total->rowCount(PDO::FETCH_ASSOC);

        # calcula o total de paginas a serem exibidas
        $qtdPag = ceil($query_count/$limite);

    # seleciona os registros do banco de dados pelo inicio e limitando pelo limite da variável limite
    $sql = "SELECT * FROM produtos ORDER BY ProdId DESC LIMIT ".$inicio. ", ". $limite;

    $registros = $conn -> query($sql);

?>

<!doctype html>
<html lang="pt-br">
  <head>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CCA &mdash; Catálogo para o comércio agrícola</title>
  </head>
    
    <!-- HOME -->
    <section class="home-section section-hero overlay bg-image" style="background-image: url('images/imgFundo.jpg');" id="home-section">

      <div class="container">
       

    </section>

    <section class="site-section">
      <div class="container">

        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-2">Lista de Produtos</h2>
          </div>
        </div>
        
        <ul class="job-listings mb-5">

          <?php

          foreach($registros as $row){ 
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

            $c = $row['ProdTipo'];

            $tipo = "SELECT TipoNome
                     FROM tipoprodutos 
                     INNER JOIN produtos ON ProdTipo = tipoprodutos.TipoId
                     WHERE TipoId = '$c'";
            $resultTipo = $conn -> query($tipo);
            foreach($resultTipo as $tipos){}

            

          ?>

          <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
            <a href="produto.php?id=<?php echo $row['ProdId']; ?>"></a>

              <div class="job-listing-logo">
                <img src="<?php echo $row['ProdImg']  ?>" alt="images/error.png" class="img-fluid">
              </div>

              <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
            
              <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                <h2><?php echo $row['ProdTitulo'];  ?></h2>
                <strong><?php echo @$nomes[0];  ?></strong>
              </div>

              <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                <span class="icon-room"></span> <?php echo @$regioes[0];  ?>
              </div>

              <div class="job-listing-meta">
                <span class="badge badge-success"><?php echo @$tipos[0];  ?></span>
              </div>
            </div>
          </li>

          <?php
            }
          ?>

        </ul>

        <div class="row pagination-wrap">
          <div class="col-md-6 text-center text-md-right">
            <div class="custom-pagination ml-auto">
              
              <a  href="index.php?pg=1" class="prev">Anterior</a>
              <div class="d-inline-block">
                  <?php
                  if($qtdPag > 1 && $pg <= $qtdPag){

                    for($i = 1; $i <= $qtdPag; $i++){

                            if($i == $pg){ 
                              ?>
                  <a href="#" class="active">1</a>
                  <?php
                  } else {
                    ?>
                <a href="index.php?pg=<?php echo $i; ?>'" class="active"><?php echo $i; ?></a>
                      <?php
                    }
                  }
                }
                    ?>
              </div>
              <a href="index.php?pg=<?php echo $qtdPag; ?>" class="next">Próximo</a>
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