<?php


include 'config.php';
date_default_timezone_set('America/Sao_Paulo');

if(isset($_COOKIE['nome'])){
	$nome=strip_tags($_COOKIE['nome']);
	$mensagem=htmlspecialchars($_POST['mensagem']);
	$hora=date('H:i:s');
	$ip=$_SERVER['REMOTE_ADDR'];

	$sql=$con->prepare('INSERT INTO mensagens(nome,mensagem,hora,ip) VALUES(:n, :m, :h, :i)');
	$sql->bindValue(':n', $nome);
	$sql->bindValue(':m', $mensagem);
	$sql->bindValue(':h', $hora);
	$sql->bindValue(':i', $ip);
	$sql->execute();

}

?>