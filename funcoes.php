<script src="sweetalert.js"></script>
<script type='text/javascript'>
			function confirmarEscolha(registro){
				const swalWithBootstrapButtons = Swal.mixin({
					customClass: {
					confirmButton: 'btn btn-success',
					cancelButton: 'btn btn-danger'
					},
					buttonsStyling: false
				})

				swalWithBootstrapButtons.fire({
					title: 'Você tem certeza?',
					text: "Essa ação não poderá ser revertida!",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonText: 'Sim, deletar registro!',
					cancelButtonText: 'Cancelar!',
					reverseButtons: true
				}).then((result) => {
					if (result.isConfirmed) {
					setTimeout(function() {window.location.href = "excluir.php?id="+registro},1500);
					swalWithBootstrapButtons.fire(
						'Deletado!',
						'O registro foi deletado com sucesso.',
						'success'
					)
					} else if (
					result.dismiss === Swal.DismissReason.cancel
					) {
					swalWithBootstrapButtons.fire(
						'Cancelado',
						'O registro permanece.',
						'error'
					)
					}
				})
				}
</script>
<script type='text/javascript'>
			function confirmarEscolhaProduto(registro){
				const swalWithBootstrapButtons = Swal.mixin({
					customClass: {
					confirmButton: 'btn btn-success',
					cancelButton: 'btn btn-danger'
					},
					buttonsStyling: false
				})

				swalWithBootstrapButtons.fire({
					title: 'Você tem certeza?',
					text: "Essa ação não poderá ser revertida!",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonText: 'Sim, deletar registro!',
					cancelButtonText: 'Cancelar!',
					reverseButtons: true
				}).then((result) => {
					if (result.isConfirmed) {
					setTimeout(function() {window.location.href = "excluirproduto.php?id="+registro},1500);
					swalWithBootstrapButtons.fire(
						'Deletado!',
						'O registro foi deletado com sucesso.',
						'success'
					)
					} else if (
					result.dismiss === Swal.DismissReason.cancel
					) {
					swalWithBootstrapButtons.fire(
						'Cancelado',
						'O registro permanece.',
						'error'
					)
					}
				})
				}
</script>
<script type="text/javascript" src="jquery-1.10.1.js"></script>

  <?php
  if (!function_exists('confirmarEscolha')) {
  function confirmarEscolha(){
  echo "<script type='text/javascript'>
        Swal.fire({
        title: 'Você tem certeza?',
        text: 'Essa ação não poderá ser revertida',
        icon: 'warning',
        showCancelButton: 'true',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, deletar!'
      }).then((result) => {
        
      if (result.value) {
        Swal.fire(
          'Deletado!',
          'O registro foi deletado.',
          'success'
          )
        }
      })

    </script>";
  }
}
    

if (!function_exists('apagarProduto')) {
 function apagarProduto($id){
    include ('conexao/connect.php');
    $consulta = "DELETE FROM produtos WHERE ProdId = $id";
    $result = $conn -> query($consulta);
  }
}

if (!function_exists('apagarRegistro')) {
 function apagarRegistro($id){
    include ('conexao/connect.php');
    $consulta = "DELETE FROM pessoas WHERE PesId = $id";
    $result = $conn -> query($consulta);
  }
}

if (!function_exists('alerta')) {
function alerta($type, $title){
      echo 
      "<script type='text/javascript'>
      Swal.fire({
        icon: '$type',
        title: '$title',
        showConfirmButton: true,
        
      });
      </script>";
    }
}

if (!function_exists('criptId')) {
	function criptId($id)
	{
		$chave = date('dmY') . '|cca|' . $id;
		$result = base64_encode($chave);
		return $result;
	}
}

if (!function_exists('descriptId')) {
	function descriptId($id)
	{
		$chave = explode("|", base64_decode($id));
		$result = $chave[2];
		return $result;
	}
}

if(!function_exists('anti_injection')){
	function anti_injection($sql){
		/*$usuario= mysql_real_escape($usuario);
		$senha= mysql_real_escape($senha);*/
   	$sql = preg_replace("/(from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/", "" ,$sql);
   	$sql = trim($sql);
   	$sql = strip_tags($sql);
   	$sql = (get_magic_quotes_gpc()) ? $sql : addslashes($sql);
   	return $sql;
	}

}

if (!function_exists('validaCPF')){

	function validaCPF($cpf) {
 
    // Extrai somente os números
    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
     
    // Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {
        return false;
    }

    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    // Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }
    return true;
    }
}

if (!function_exists('validaemail')){
function validaemail($email){
	//verifica se e-mail esta no formato correto de escrita
	if (!preg_match("/^([a-zA-Z0-9.-_])*([@])([a-z0-9]).([a-z]{2,3})/",$email)){
	return false;
	}
	else{
	//Valida o dominio
	$dominio=explode("@",$email);
	if(!checkdnsrr($dominio[1],"A")){
	return false;
	}
	else{return true;} // Retorno true para indicar que o e-mail é valido
	}
	}
}
?>