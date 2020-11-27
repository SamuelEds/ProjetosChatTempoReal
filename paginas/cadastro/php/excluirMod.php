<?php 

include('../conexao.php');

$sql = $conn->prepare("DELETE FROM moderador WHERE id = ?");
$sql->bind_param("s", $_GET['id']);
$sql->execute();

if(mysqli_affected_rows($conn) && isset($_GET['adm'])){
	echo "<script>alert('MODERADOR EXCLUÍDO COM SUCESSO!!');</script>";
	echo "<script>javascript:window.location='/ProjetosChatTempoReal/adm.php';</script>";
}

?>