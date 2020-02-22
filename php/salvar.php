<?php 
session_start();
include("conexao.php");

$nome 		 = $_POST['nome'];
$nomeu		 = $_POST['nomeu'];
$pais 		 = $_POST['pais'];
$genero 	 = $_POST['genero'];
$email  	 = $_POST['email'];
$senha  	 = $_POST['senha'];
$repitasenha = $_POST['repitasenha'];

if($senha == $repitasenha){

	$pegaEmail = mysqli_query($con,"SELECT * FROM usuarios WHERE email = '$email'");

	if(mysqli_num_rows($pegaEmail) > 0){

		echo "<script>alert('E-mail já existe, cadastre outro email!');</script>";
		echo "<script>javascript:window.location='/ProjetosChatTempoReal/formulario.php';</script>";

	}else{

		$sql = "INSERT INTO usuarios (nomecompleto,nomeusuario,pais,genero,email,senha) VALUES ('$nome','$nomeu','$pais','$genero','$email',$senha)";

		$result = mysqli_query($con,$sql);
		if(mysqli_insert_id($con)){

			$_SESSION['email'] = $email;
			$_SESSION['nome']  = $nomeu;

			echo "<script>alert('Seja Bem Vindo(a)!');</script>";
			echo "<script>javascript:window.location='/ProjetosChatTempoReal/index.php';</script>";
		}else{
			echo "<script>alert('Erro na conexão');</script>";
			echo "<script>javascript:window.location='/ProjetosChatTempoReal/formulario.php';</script>";
		}
	}

}else if($nomeu = "" && $email = "" && $senha  	 = "" && $repitasenha = ""){
	echo "<script>alert('Alguns campos não foram preenchidos/Campos incorretos');</script>";
	echo "<script>javascript:window.location='/ProjetosChatTempoReal/formulario.php';</script>";
}

?>