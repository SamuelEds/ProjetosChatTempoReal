<?php
session_start();

include('php/conexao.php');

$emailF = $_SESSION['email'];
$sql = "SELECT * FROM usuarios WHERE email = '$emailF'";
$result = mysqli_query($con,$sql);


include 'config.php';

date_default_timezone_set('America/Sao_Paulo');

if(isset($_COOKIE['nome'])){

	$mensagem=htmlspecialchars($_POST['mensagem']);
	$msg = trim($_POST['mensagem']);

	if(isset($mensagem) && !($mensagem == "") && !empty($msg)){

		$nome=strip_tags($_COOKIE['nome']);


		$mensagem = nl2br($mensagem);

		$hora=date('H:i:s');
		$ip=$_SERVER['REMOTE_ADDR'];
		$email = $_SESSION['email'];
		//$foto = $_SESSION['nomeFoto'];

		while($linha = mysqli_fetch_assoc($result)){
			$foto = $linha['foto']; 
		}


		$sql=$con->prepare('INSERT INTO mensagens(nome,mensagem,email,foto,hora,ip) VALUES(:n, :m, :e, :f, :h, :i)');
		$sql->bindValue(':n', $nome);
		$sql->bindValue(':m', $mensagem);
		$sql->bindValue(':e', $email);
		$sql->bindValue(':f', $foto);
		$sql->bindValue(':h', $hora);
		$sql->bindValue(':i', $ip);
		$sql->execute();
	}

}

?>