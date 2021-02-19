<?php 
include 'funcoes.php';

$idpessoa = $_SESSION['PesId'];

$consulta = "SELECT * FROM pessoas WHERE PesId = '$idpessoa'";
$result = $conn -> query($consulta);

foreach($result as $row){}

?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="alterardados.php?id=<?php echo criptId($_SESSION['PesId']); ?>" method="post" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Dados da conta</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> 
        </div>
        <div class="modal-body">

        <div class="row form-group" style="padding-left:180px;">
          <div class="circle">
            <div class="cont">
              <label for="files" style="cursor:pointer;">
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
              </label>
            </div>  
          </div>
          
          <input id="files" name="Imagem" style="visibility:hidden;" type="file">

        </div>
        
        <div class="row form-group">
          <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="nome">Nome</label>
                <input autocomplete="off" type="text" name="Nome" id="nome" class="form-control" placeholder="Nome" value="<?php echo $row['PesNome']; ?>">
            </div>
          </div>

          <div class="row form-group">
            <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="telefone">Telefone</label>
                <input autocomplete="off" type="text" name="Telefone" id="telefone" class="form-control" placeholder="Número de telefone ou celular" value="<?php echo $row['PesTelefone']; ?>" onkeypress="$(this).mask('(00)00000-0000');">
            </div>
          </div>

          <div class="row form-group">
            <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="email">Email</label>
                <input autocomplete="off" type="text" name="Email" id="email" class="form-control" placeholder="Endereço de email" value="<?php echo $row['PesEmail']; ?>">
            </div>
          </div>

          <div class="row form-group">
            <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="senha">Nova Senha</label>
                <input autocomplete="off" type="password" name="Senha" id="senha" class="form-control" placeholder="Senha" value="<?php echo $row['PesSenha']; ?>" required>
            </div>
          </div>

          <div class="row form-group mb-4">
          <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="confSenha">Confirmar senha</label>
                <input autocomplete="off" type="password" name="ConfirmaSenha" id="confSenha" class="form-control" placeholder="Confirmar senha" required>
            </div>
          </div>

          <div class="row form-group mb-4">
            <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="cpf">CPF</label>
                <input autocomplete="off" type="text" name="CPF" id="cpf" class="form-control" placeholder="CPF" value="<?php echo $row['PesCPF']; ?>" onkeypress="$(this).mask('000.000.000-00');">
            </div>
          </div>   
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Cancelar
          </button>
          <button type="submit" class="btn btn-primary">
            Salvar
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

