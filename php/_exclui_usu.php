<?php 
session_start();

include("conexao.php");


if(isset($_GET['email'])){
	$_SESSION['email'] = $_GET['email']; 
}

$email = $_SESSION['email'];

/*$sql2 = "SELECT * FROM usuarios WHERE email = '$email'";
$result2 = mysqli_query($con,$sql2);

while ($row = mysqli_fetch_assoc($result2)) {
	$nome = $row['nomeusuario'];
}*/



$sql3 = "DELETE FROM mensagens WHERE email = '$email'"; 
$result3 = mysqli_query($con,$sql3);

$sql4 = "DELETE FROM report WHERE email = '$email'"; 
$result4 = mysqli_query($con,$sql4);

$sql = "DELETE FROM usuarios WHERE email = '$email'"; 
$result = mysqli_query($con,$sql);

if(mysqli_affected_rows($con) && !isset($_GET['adm'])){
	$_SESSION['nome'] = null;
	echo "<script>alert('Conta Excluída com Sucesso!!');</script>";
	echo "<script>javascript:window.location='/ProjetosChatTempoReal/login.php';</script>";
}else if(mysqli_affected_rows($con) && isset($_GET['adm'])){
	$_SESSION['nome'] = null;
	echo "<script>alert('Conta Excluída com Sucesso!!');</script>";
	echo "<script>javascript:window.location='/ProjetosChatTempoReal/adm.php';</script>";
}else{
	$_SESSION['nome'] = null;
	echo "<script>alert('Algo deu Errado!!');</script>";
	echo "<script>javascript:window.location='/ProjetosChatTempoReal/login.php';</script>";
}






?>