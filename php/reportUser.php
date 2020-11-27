
<?php 
include("conexao.php");

$id = $_GET['id'];
$nomec = $_GET['nomec'];
$nomeu = $_GET['nomeu'];
$pais = $_GET['pais'];
$genero = $_GET['genero'];
$email = $_GET['email'];
$motivo = $_POST['motivo'];
$foto = $_GET['foto'];

if(isset($motivo) && (isset($_GET['id']) && isset($_GET['nomec']) && isset($_GET['nomeu']) && isset($_GET['pais']) && isset($_GET['genero']) && isset($_GET['email']))){

	$sql = "INSERT INTO report(id, nomecompleto, nomeusuario, pais, genero, email, motivo, foto) VALUES ('$id', '$nomec', '$nomeu', '$pais', '$genero', '$email', '$motivo', '$foto')";

	$result = mysqli_query($con,$sql);

	if(mysqli_insert_id($con)){
		echo "<script>alert('Usuário Reportado!');</script>";
		echo "<script>javascript:window.location='/ProjetosChatTempoReal/moderador.php';</script>";
	}else{
		echo "<script>alert('Ocorreu um erro! Talvez você ja tenha reportado esse usuário');</script>";
		echo "<script>javascript:window.location='/ProjetosChatTempoReal/moderador.php';</script>";
	}

}else if(!(isset($_GET['id']) && isset($_GET['nomec']) && isset($_GET['nomeu']) && isset($_GET['pais']) && isset($_GET['genero']) && isset($_GET['email']))){
	echo "<script>alert('Erro ao reportar usuário!');</script>";
	echo "<script>javascript:window.location='/ProjetosChatTempoReal/moderador.php';</script>";
}else if(!isset($motivo)){
	echo "<script>alert('É preciso de um motivo para o Report!');</script>";
	echo "<script>javascript:window.location='/ProjetosChatTempoReal/moderador.php';</script>";
}


?>