<?php 

include('conexao.php');

$sql = $con->prepare("DELETE FROM report WHERE email = ?");
$sql->bind_param("s", $_GET['email']);
$sql->execute();

if(mysqli_affected_rows($con) && isset($_GET['adm'])){
	echo "<script>alert('Report Retirado');</script>";
	echo "<script>javascript:window.location='/ProjetosChatTempoReal/adm.php';</script>";
}else{
	echo "<script>alert('UM ERRO ACONTECEU');</script>";
	echo "<script>javascript:window.location='/ProjetosChatTempoReal/adm.php';</script>";
}

?>