<?php 
if(!isset($_SESSION)){

	session_start();

}

include 'conexao.php';

$msg = trim($_POST["mensagem"]);

if(empty($msg) || is_null($msg)){
	//alert("DIGITE UMA mensagem");
}else{
	$sql = $con->prepare("INSERT INTO amigos (email_de, email_para, mensagens, foto) VALUES (?,?,?,?)");
	$sql->bind_param("ssss",$_SESSION['email'], $_GET['email'], $_POST['mensagem'], $_GET['foto']);
	$sql->execute();
}
?>
