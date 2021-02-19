<?php
session_start();
include 'navbar.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <title>CCA &mdash; Catálogo para o comércio agrícola</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    <style>
      #telefones, #email, #endereco{
        color:#89ba16;
      }
    </style>
   
    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/imgFundo.jpg');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Contato</h1>
            <div class="custom-breadcrumbs">
              <a href="#">Início</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>Contato</strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="site-section" id="next-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <form action="#" class="">

              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Nome</label>
                  <input type="text" id="fname" class="form-control">
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="lname">Sobrenome</label>
                  <input type="text" id="lname" class="form-control">
                </div>
              </div>

              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="email">Email</label> 
                  <input type="email" id="email" class="form-control">
                </div>
              </div>

              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="subject">Assunto</label> 
                  <input type="subject" id="subject" class="form-control">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="message">Menssagem</label> 
                  <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Escreva um comentário"></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Enviar" class="btn btn-primary btn-md text-white">
                </div>
              </div>

  
            </form>
          </div>
          <div class="col-lg-5 ml-auto">
            <div class="p-4 mb-3 bg-white">
              <p class="mb-0 font-weight-bold">Endereço</p>
              <p id="endereco" class="mb-4">Av. Europa, 1097 - Jardim Europa, Itapeva - SP, 18406-460</p>

              <p class="mb-0 font-weight-bold">Telefone</p>
              <p id="telefones" class="mb-4">
              +55 (15)9 9839-4854 <br>
              +55 (15)9 8124-0037 <br>
              +55 (15)9 9696-4473</p>

              <p class="mb-0 font-weight-bold">Endereço de Email</p>
              <p id="email" class="mb-0">suportecca558@gmail.com</p>

            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="site-section bg-light">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center" data-aos="fade">
            <h2 class="section-title mb-3">Os Usuários Felizes Dizem</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="block__87154 bg-white rounded">
              <blockquote>
                <p>&ldquo;O site me ajudou muito e realizar a venda dos meus produtos, além de ter uma resposta rápida, todo o processo de compra foi muito seguro e organizado.&rdquo;</p>
              </blockquote>
              <div class="block__91147 d-flex align-items-center">
                <figure class="mr-4"><img src="images/empresas.jpg" alt="Image" class="img-fluid"></figure>
                <div>
                  <h3>Elisabeth Smith</h3>
                  <span class="position">Comprador</span>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="block__87154 bg-white rounded">
              <blockquote>
                <p>&ldquo;Estava com problemas pra vender meus produtos, mas graças a esse site eu pude organizar minhas vendas e evitar perdas.&rdquo;</p>
              </blockquote>
              <div class="block__91147 d-flex align-items-center">
                <figure class="mr-4"><img src="images/plantacao.jpg" alt="Image" class="img-fluid"></figure>
                <div>
                  <h3>Chris Peter</h3>
                  <span class="position">Comprador</span>
                </div>
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
    <script src="js/quill.min.js"></script>
    
    
    <script src="js/bootstrap-select.min.js"></script>
    
    <script src="js/custom.js"></script>
   
   
     
  </body>
</html>