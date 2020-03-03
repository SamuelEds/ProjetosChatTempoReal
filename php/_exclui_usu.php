<?php 
session_start();

include("conexao.php");


$email = $_SESSION['email'];
$sql = "DELETE FROM usuarios WHERE email = '$email'"; 

$result = mysqli_query($con,$sql);

if(mysqli_affected_rows($con)){
	$_SESSION['nome'] = null;
	echo "<script>alert('Conta Excluída com Sucesso!!');</script>";
	echo "<script>javascript:window.location='/ProjetosChatTempoReal/login.php';</script>";
}else{
	echo "<script>alert('Algo deu Errado!!');</script>";
	echo "<script>javascript:window.location='/ProjetosChatTempoReal/login.php';</script>";
}






?>