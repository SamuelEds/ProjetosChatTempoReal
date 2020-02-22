<?php 
session_start();
include("conexao.php");
$email = $_POST['email'];
$nomeu = $_POST['nomeu'];
$nome_usu = $_SESSION['nome'];

if((isset($_POST['email'])) && (isset($_POST['senha']))){
	$usuario = mysqli_real_escape_string($con,$_POST['email']); //Escapar Caracteres especiais do email
	$senha = mysqli_real_escape_string($con,$_POST['senha']); //Escapar Caracteres especiais do senha

	$senha = md5($senha);

	$sql = "SELECT * FROM usuarios WHERE email = '$usuario' and senha = '$senha'";
	$result_usuario = mysqli_query($con,$sql);
	$resultado = mysqli_fetch_assoc($result_usuario);

	if(empty($result_usuario)){
		
		echo "Deu errado";
	}else if(!empty($result_usuario)){

		$_SESSION['email'] = $email;
		$_SESSION['nome']  = $nomeu;
		header("Location: /ProjetosChatTempoReal/index.php");
	}else{
		echo "Deu errado denovo";
	}
}else{
	echo "Deu errado";
}

 ?>