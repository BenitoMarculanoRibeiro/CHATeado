
<?php
session_start();
if (!isset($_SESSION["nome"])) {
	header("Location: ../alteraPerfil.php?erro=1");
}
$id_usuario =  $_SESSION['id_usuario'];
include_once("db.class.php");
include_once("Database.class.php");
$arquivo = $_FILES['arquivo']['name'];

//Pasta onde o arquivo vai ser salvo
$_UP['pasta'] = '../fotos_perfil/';

//Tamanho máximo do arquivo em Bytes
$_UP['tamanho'] = 1024 * 1024 * 100; //5mb

//Array com a extensões permitidas
$_UP['extensoes'] = array('png', 'jpg', 'jpeg', 'gif', 'jfif');

//Renomeiar
$_UP['renomeia'] = true;

//Array com os tipos de erros de upload do PHP
$_UP['erros'][0] = 'Não houve erro';
$_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
$_UP['erros'][4] = 'Não foi feito o upload do arquivo';


//Primeiro verifica se deve trocar o nome do arquivo
$nome_final = $id_usuario . '.png';
echo 'nome final é aojcsnoi'.$nome_final;
//Verificar se é possivel mover o arquivo para a pasta escolhida
if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
	//Upload efetuado com sucesso, exibe a mensagem
	echo 'a';echo 'a';echo 'a';echo 'a';echo 'a';
	$nome_final = $id_usuario . '.png';
	$objDb = new db();
	$link = $objDb->conecta_mysql();
	$query = mysqli_query($link, "UPDATE `usuario` SET `foto_perfil` = '$nome_final' WHERE `usuario`.`id_usuario` = $id_usuario;");
	
	$sql = "UPDATE `usuario` SET `foto_perfil` = '$nome_final' WHERE `usuario`.`id_usuario` = $id_usuario;";
	if (mysqli_query($link, $sql)) {
	} else {
		echo "Erro ao enviar foto!<br>".$sql;
	}
	$_SESSION['foto_perfil']=$nome_final;
	echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Projetos/Chateado/Chat.php'>
					<script type=\"text/javascript\">
						alert(\"Imagem cadastrada com Sucesso.\");
					</script>
				";
} else {
	//Upload não efetuado com sucesso, exibe a mensagem
	echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Projetos/Chateado/Chat.php'>
					<script type=\"text/javascript\">
						alert(\"Imagem não foi cadastrada com Sucesso.\");
					</script>
				";
}



//Verifica se houve algum erro com o upload. Sem sim, exibe a mensagem do erro
if ($_FILES['arquivo']['error'] != 0) {
	die("Não foi possivel fazer o upload, erro: <br />" . $_UP['erros'][$_FILES['arquivo']['error']]);
	exit; //Para a execução do script
}

//Faz a verificação da extensao do arquivo
/*$extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
if (array_search($extensao, $_UP['extensoes']) === false) {
	echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Projetos/Chateado/Chat.php'>
					<script type=\"text/javascript\">
						alert(\"A imagem não foi cadastrada extesão inválida.\");
					</script>
				";
}
*/
//Faz a verificação do tamanho do arquivo
else if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
	echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Projetos/Chateado/Chat.php'>
					<script type=\"text/javascript\">
						alert(\"Arquivo muito grande.\");
					</script>
				";
}
//O arquivo passou em todas as verificações, hora de tentar move-lo para a pasta foto
else {
	
}
?>