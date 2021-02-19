<?php
  include ('conexao/connect.php');
  include 'funcoes.php';
  session_start();
 
  	$arquivo_nome = $_FILES['Imagem']['name'];
	$temporario = $_FILES['Imagem']['tmp_name'];
	$fileSize = $_FILES["Imagem"]["size"];

	$ext = strtolower(strrchr($arquivo_nome,"."));
	$arquivo_nome = $_SESSION['PesId']."_".md5(uniqid(time())).$ext;
	 
	if(($ext<>'.jpg') and ($ext<>'.jpeg') and ($ext !='.png')) {
		echo "<script type='text/javascript'> 
		Swal.fire({
				icon: 'error',
				title: 'Erro...',
				text: 'Permitido somente imagens.',
		})
		</script>";
		 
	} else if ($fileSize>2000000) {
		echo "<script type='text/javascript'> 
					Swal.fire({
							icon: 'error',
							title: 'Erro...',
							text: 'Permitido somente arquivos com tamanho máximo de 2MB!',
				})
				</script>";
                
		} else if(move_uploaded_file($temporario, "Produtos/$arquivo_nome")){
				
				$data = [
					'ProdId'        	=> '',
					'ProdImg'       	=> 'Produtos/'. $arquivo_nome,
					'ProdEmail' 		=> $_POST['Email'],
				    'ProdTitulo'    	=> $_POST['Titulo'],
				    'ProdEndereco'  	=> $_POST['Endereco'],
				    'ProdRegiao'    	=> $_POST['Regiao'],
				    'ProdTipo'     	    => $_POST['Tipo'],
				    'ProdDesc' 			=> $_POST['Descricao'],
				    'ProdStatus'		=> 'S',
				    'ProdProprietario'  => $_SESSION['PesId'],
				    'HorarioDePostagem' =>  date('Y-m-d') . ' ' .date('H:i:s')
				];

				$sql = "INSERT INTO produtos (ProdId, ProdImg, ProdEmail, ProdTitulo, ProdEndereco, ProdRegiao, ProdTipo, ProdDesc, ProdStatus, ProdProprietario, HorarioDePostagem) VALUES (:ProdId, :ProdImg, :ProdEmail, :ProdTitulo, :ProdEndereco, :ProdRegiao, :ProdTipo, :ProdDesc, :ProdStatus, :ProdProprietario, :HorarioDePostagem)";

				$stmt = $conn->prepare($sql);
				$stmt->execute($data);

			} else {
				echo "<script type='text/javascript'> 
				Swal.fire({
						icon: 'error',
						title: 'Erro...',
						text: 'Erro ao enviar arquivo. Tente novamente.',
				})
				</script>";
				
				}
?>

<meta http-equiv="refresh" content="0;url=perfil.php">