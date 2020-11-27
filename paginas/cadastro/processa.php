<?php
session_start();
include("conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

$pegaEmail = mysqli_query($conn,"SELECT * FROM moderador WHERE email = '$email'");
$pegaEmailU = mysqli_query($conn,"SELECT * FROM usuarios WHERE email = '$email'");


if(mysqli_num_rows($pegaEmail) > 0 || mysqli_num_rows($pegaEmailU) > 0){

	echo "<script>alert('Email já está registrado no banco ou Email de usuário detectado [ERRO]');</script>";
	echo "<script>javascript:window.location='/ProjetosChatTempoReal/paginas/cadastro/cadastro.html';</script>";

}else{

	//$senha = password_hash();

	$result_usuario = "INSERT INTO moderador (nome, email, senha) VALUES ('$nome','$email', '$senha')";
	$resultado_usuario = mysqli_query($conn, $result_usuario);

	if(mysqli_insert_id($conn)){
		$_SESSION['msg'] = "Usuário cadastrado com sucesso";
		header("Location: cadastro.html");
	}else{
		header("Location: cadastro.html");
	}
}



