<?php 
session_start();
include("conexao.php");

$email = $_POST['email'];

//$nome_usu = $_SESSION['nome'];

if((isset($_POST['email'])) && (isset($_POST['senha']))){

	$usuario = mysqli_real_escape_string($con,$_POST['email']); //Escapar Caracteres especiais do email
	$senha = mysqli_real_escape_string($con,$_POST['senha']); //Escapar Caracteres especiais do senha

	//$senha = md5($senha);



	$sql = "SELECT * FROM usuarios WHERE email = '$usuario' and senha = '$senha' ";
	$result_usuario = mysqli_query($con,$sql);

	while ($rows = mysqli_fetch_assoc($result_usuario)) {

		$nomeu = $rows['nomeusuario'];
		$senha1 = $rows['senha'];
		

	}

	if(isset($nomeu) && isset($senha1)){

		$_SESSION['email'] = $email;
		$_SESSION['nome']  = $nomeu;

		header("Location: /ProjetosChatTempoReal/chat.php");

	}else if($usuario == "mod@gmail.com" && $senha == "123"){

		echo "<script>alert('Email ou Senha inválido!');</script>";
		echo "<script>javascript:window.location='/ProjetosChatTempoReal/moderador.php';</script>";
		
	}else if($usuario == "adm@gmail.com" && $senha == "123"){

		echo "<script>alert('Email ou Senha inválido!');</script>";
		echo "<script>javascript:window.location='/ProjetosChatTempoReal/adm.php';</script>";

	}else if(!isset($nomeu) && !isset($senha1)){

		echo "<script>alert('Email ou Senha inválido!');</script>";
		echo "<script>javascript:window.location='/ProjetosChatTempoReal/login.php';</script>";

	}

	/*if(empty($result_usuario)){

		echo "Deu errado";
	}else if(!empty($result_usuario)){

		$_SESSION['email'] = $email;
		//$_SESSION['nome']  = $nomeu;

		
		echo $nomeu;

		echo "Sla";

		//header("Location: /ProjetosChatTempoReal/index.php");
	}else{
		echo "Deu errado denovo";
	}*/

}else{
	echo "Deu errado";
}

?>