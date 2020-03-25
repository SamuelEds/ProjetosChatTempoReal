<?php
session_start();

include 'config.php';
date_default_timezone_set('America/Sao_Paulo');

if(isset($_COOKIE['nome'])){
	$mensagem=htmlspecialchars($_POST['mensagem']);

	if(isset($mensagem) && !($mensagem == "")){

		$nome=strip_tags($_COOKIE['nome']);


		$mensagem = nl2br($mensagem);

		$hora=date('H:i:s');
		$ip=$_SERVER['REMOTE_ADDR'];
		$email = $_SESSION['email'];

		$sql=$con->prepare('INSERT INTO mensagens(nome,mensagem,email,hora,ip) VALUES(:n, :m,:e, :h, :i)');
		$sql->bindValue(':n', $nome);
		$sql->bindValue(':m', $mensagem);
		$sql->bindValue(':e', $email);
		$sql->bindValue(':h', $hora);
		$sql->bindValue(':i', $ip);
		$sql->execute();
	}

}

?>