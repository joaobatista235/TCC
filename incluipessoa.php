<?php
  include ('conexao/connect.php');
  include 'funcoes.php';

/*	
$variavel="1";
$variavel=$variavel."|2";

$erro=explode("|",$variavel);	1º parâmetro= caractere usado para sparação dos valores.  2º parâmetro = variavel usada
echo $erro[0];
foreach ($erro as $row_erro) {
	if ($row_erro==1) {

	}
}*/
$erro = 1;

$s = false;
$c = false;

	$senha = $_POST['Senha'];
	$confirmasenha = $_POST['ConfirmaSenha'];
	$validasenha;
	if($senha != $confirmasenha){
		$s=true; 
		$erro++;
	}

	$cpf = $_POST['CPF'];
	if(validaCPF($cpf) == false){
		$c=true;
		$erro++;
	}
	
  	if($erro == 1){
//	37872595893
	$data = [
		'PesId'        => '',
		'PesCategoria' => '2',
	    'PesNome'      => $_POST['Nome'],
	    'PesTelefone'  => $_POST['Telefone'],
	    'PesEmail'     => $_POST['Email'],
	    'PesSenha'     => $_POST['Senha'],
	    'PesCPF'       => $_POST['CPF']
	];

	$sql = "INSERT INTO pessoas (PesId, PesCategoria, PesNome, PesTelefone, PesEmail, PesSenha, PesCPF) VALUES (:PesId, :PesCategoria, :PesNome, :PesTelefone, :PesEmail, :PesSenha, :PesCPF)";

	$stmt = $conn->prepare($sql);
	$stmt->execute($data);
}
	?>
	<meta http-equiv="refresh" content="0;url=login.php?id=<?php echo criptId($erro); ?>&s=<?php echo criptId($s); ?>&c=<?php echo criptId($c); ?>">
