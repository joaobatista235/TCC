<?php
include 'funcoes.php';
include ('conexao/connect.php');
session_start();

$id = descriptId($_GET['id']);

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
            
    } else if(move_uploaded_file($temporario, "Pessoas/$arquivo_nome")){
            
        $data = [
            ':mPesNome'        => $_POST['Nome'],
            ':mPesTelefone'    => $_POST['Telefone'],
            ':mPesImagem'       	=> 'Pessoas/'. $arquivo_nome,
            ':mPesEmail'       => $_POST['Email'],
            ':mPesSenha'       => $_POST['Senha'],
            ':mPesCPF'         => $_POST['CPF']
        ];

           $consulta = "UPDATE pessoas SET PesNome      = :mPesNome,
                                            PesTelefone = :mPesTelefone,
                                            PesImagem   = :mPesImagem,
                                            PesEmail    = :mPesEmail,
                                            PesSenha    = :mPesSenha,
                                            PesCPF      = :mPesCPF
                        WHERE PesId = '$id'";

        $stmt = $conn->prepare($consulta);
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

/*


$data = array(
    ':mPesNome'        => $_POST['Nome'],
    ':mPesTelefone'    => $_POST['Telefone'],
    ':mPesEmail'       => $_POST['Email'],
    ':mPesSenha'       => $_POST['Senha'],
    ':mPesCPF'         => $_POST['CPF']
    );

 
$consulta = "UPDATE pessoas SET PesNome      = :mPesNome,
                                 PesTelefone = :mPesTelefone,
                                 PesEmail    = :mPesEmail,
                                 PesSenha    = :mPesSenha,
                                 PesCPF      = :mPesCPF
             WHERE PesId = '$id'";

$stmt = $conn->prepare($consulta);
$stmt->execute($data);

*/
 
?>
	<meta http-equiv="refresh" content="0;url=perfil.php">

