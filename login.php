<?php
  session_start();
  include 'funcoes.php';
  include 'navbar.php';

?>
<style>

  .alert {
  margin-top:15px;
  padding: 20px;
  background-color: #f44336; 
  color: white;
  margin-bottom: 15px; 
}
</style>
<!doctype html>
<html lang="pt-br">
  <head>
    <title>CCA &mdash; Catálogo para o comércio agrícola</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/imgFundo.jpg');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Cadastrar/Entrar</h1>
            <div class="custom-breadcrumbs">
              <a href="#">Início</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>Entrar</strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="section" class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5">
            <h2 class="mb-4">Cadastrar no CCA</h2>
            

            <form id="form1" name="form1" method="post" action="incluipessoa.php" class="p-4 border rounded">

              <div class="row form-group">
                
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="nome">Nome</label>
                  <input autocomplete="off" type="text" name="Nome" id="nome" class="form-control" placeholder="Nome Completo" minlength="3" required>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="telefone">Telefone</label>
                  <input autocomplete="off" type="text" name="Telefone" id="telefone" class="form-control" maxlength="14" minlength="14" placeholder="Ex: (99)99999-9999" onkeypress="$(this).mask('(00)00000-0000');" required>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="email">Email</label>
                  <input autocomplete="off" type="text" name="Email" id="email" class="form-control" placeholder="Endereço de email" required>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="senha">Senha</label>
                  <input type="password" name="Senha" id="senha1" class="form-control" placeholder="Senha" required>
                </div>
              </div>
              <div class="row form-group mb-4">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="confirmasenha">Confirmar senha</label>
                  <input type="password" name="ConfirmaSenha" id="confirmasenha" class="form-control" placeholder="Confirmar senha" required>
                </div>
              </div>
              <div class="row form-group mb-4">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="vcpf">CPF</label>
                  <input autocomplete="off" type="text" name="CPF" id="vcpf" class="form-control" maxlength="14" minlength="14" placeholder="Ex: 999.999.999-99" onkeypress="$(this).mask('000.000.000-00');" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Cadastrar" class="btn px-4 btn-primary text-white">

                  <?php
                    @$erro = descriptId($_GET['id']);
                    @$s = descriptId($_GET['s']);
                    @$c = descriptId($_GET['c']);

                    if(@$erro == 1){
                      alerta("success", "Cadastro realizado com sucesso");
                    }
                    
                    if($s == 1){
                      echo "<br><div class='alert'>Senhas não coincidem</div>";
                    }
                    if($c == 1){
                      echo "<br><div class='alert'>CPF inválido</div>";
                    }

                  ?>
                </div>
              </div>
            </form>
          </div>
          <div class="col-lg-6">
            <h2 class="mb-4"><i class="fas fa-sign-in-alt" style="padding-right:20px;"></i>Entrar no CCA</h2>

            <form id="form2" name="form2" method="post" action="validalogin.php" class="p-4 border rounded">

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="cpf">CPF</label>
                  <input autocomplete="off" type="text" name="PesCPF" id="cpf" class="form-control" placeholder="CPF Cadastrado" onkeypress="$(this).mask('000.000.000-00');">
                </div>
              </div>
              <div class="row form-group mb-4">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="senha">Senha</label>
                  <input type="password" name="PesSenha" id="senha" class="form-control" placeholder="Senha">
                </div>
              </div>
              
              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Entrar" class="btn px-4 btn-primary text-white">
                  <div class="col" align="right"><a href="recuperarsenha.php" target="_blank">Esqueceu sua senha?</a></div>
                  
                  <br>

                  <?php
                    @$erro = descriptId($_GET['idlogin']);

                    if(@$erro == 1){
                    echo "<div class='alert'>Senha incorreta</div>";

                    }else if(@$erro == 2){
                    echo "<div class='alert'>Usuário não encontrado</div>";
                    }
                  ?>
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
    <script src="https://kit.fontawesome.com/ed2313115b.js" crossorigin="anonymous"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/quill.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
                    
  </body>
</html>