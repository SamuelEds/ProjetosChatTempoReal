<?php 
session_start();
include("conexao.php");

//SELECIONAR MODERADOR
$sql = $con->prepare("SELECT * FROM moderador WHERE email = ?");
$sql->bind_param("s", $_POST['email']);
$sql->execute();
$get = $sql->get_result();

$email = $_POST['email'];

//$nome_usu = $_SESSION['nome'];

if((isset($_POST['email'])) && (isset($_POST['senha']))){

	$usuario = mysqli_real_escape_string($con,$_POST['email']); //Escapar Caracteres especiais do email
	$senha = mysqli_real_escape_string($con,$_POST['senha']); //Escapar Caracteres especiais do senha

	//$senha = md5($senha);

	$sql = "SELECT * FROM usuarios WHERE email = '$usuario'";
	$result_usuario = mysqli_query($con,$sql);

	//VERIFICAR USUÁRIOS
	while ($rows = mysqli_fetch_assoc($result_usuario)) {

		$nomeu = $rows['nomeusuario'];
		$senha1 = $rows['senha'];
		

	}

	//VERIFICAR MODERADORES
	while($dados = $get->fetch_assoc()){
		$nomeM = $dados['email'];
		$senhaM = $dados['senha'];
	}

	if(isset($nomeu) && password_verify($senha, $senha1)){

		$_SESSION['email'] = $email;
		$_SESSION['nome']  = $nomeu;

		header("Location: /ProjetosChatTempoReal/chat.php");

	}else if(isset($nomeM) && isset($senhaM)){

		echo "<script>alert('SEJA BEM VINDO MODERADOR(A)');</script>";
		echo "<script>javascript:window.location='/ProjetosChatTempoReal/moderador.php';</script>";
		
	}else if($usuario == "adm@gmail.com" && $senha == "123"){

		echo "<script>alert('SEJA BEM VINDO ADMINISTRADOR(A)!');</script>";
		echo "<script>javascript:window.location='/ProjetosChatTempoReal/adm.php';</script>";

	}else if(!(isset($nomeu) && isset($senha1)) || !(isset($nomeM) && isset($senhaM))){

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