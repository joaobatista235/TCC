    <link rel="stylesheet" href="css/custom-bs.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/bootstrap-select.min.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="fonts/line-icons/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/quill.snow.css">
    <link rel="stylesheet" href="css/btns.css">
    <link href="https://panel.chatcompose.com/static/PT/global/export/css\main.1b3f9fb9.css" rel="stylesheet">    
    <script async type="text/javascript" src="https://panel.chatcompose.com/static/PT/global/export/js\main.c9ea3138.js" user="Juniorbatista04-cca"></script>

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">
        
  </head>
  <body id="top">

  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Carregando...</span>
    </div>
  </div>
    

<div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    

    <!-- NAVBAR -->
    <header class="site-navbar mt-3">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="site-logo col-6"><a href="index.php">CCA</a></div>

          <nav class="mx-auto site-navigation">
            <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
              <li><a href="index.php" class="nav-link active">Início</a></li>
              <li><a href="sobrenos.php">Sobre Nós</a></li>
              <li class="has-children">
                <a>Produtos Listados</a>
                <ul class="dropdown">
                  <li><a href="portfolio.php">Produtos</a></li>
                  <li><a href="postar-produtos.php">Poste Produtos</a></li>
                </ul>
              </li>
              <li class="has-children">
                <a>Páginas</a>
                <ul class="dropdown">
                <?php if(@$_SESSION['categoria'] == 1 || @$_SESSION['categoria'] == 2){ ?>
                <li><a href="perfil.php">Meu Perfil</a></li>
                <?php } ?>
                  <li><a href="faq.php">Perguntas Frequentes</a></li>
                  <?php if(@$_SESSION['categoria'] == 1){ ?>
                  <li><a href="admin.php">Administrador</a></li>
                  <?php } ?>
                </ul>
              </li>
              <li><a href="contato.php">Contato</a></li>
              <li class="d-lg-none"><a href="postar-produtos.php"><span class="mr-2">+</span> Poste Produtos</a></li>
              <li class="d-lg-none"><a href="login.php">Entrar</a></li>
            </ul>
          </nav>
          
          <div id="botoes" class="right-cta-menu text-right d-flex aligin-items-center col-6">
            <div class="ml-auto">
              <a id="bt1" href="postar-produtos.php" class="btn btn-outline-white border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-add"></span>Poste Produtos</a>

              <?php
                if(@$_SESSION['categoria'] == ''){

              ?>
              <a href="login.php" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-lock_outline"></span>Entrar</a>
              <?php
              }else{
              ?>
              <a href="logout.php" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><i class="fas fa-sign-out-alt" style="padding-right:15;"></i>Sair</a>

              <?php } ?>
            </div>
            <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span class="icon-menu h3 m-0 p-0 mt-2"></span></a>
          </div>

        </div>
      </div>
    </header>
    
   </body>
</html>
<script src="https://kit.fontawesome.com/ed2313115b.js" crossorigin="anonymous"></script>