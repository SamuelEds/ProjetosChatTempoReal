
<!DOCTYPE html>
<html>
<head>
	<title>Carregando...</title>
	<meta charset="utf-8">

	<style>

	.balao{
		background-color: #fff;
		padding: 10px;
		position: relative;
		margin-right: 1000px;
		border-radius: 20px;
	}

	.balao:before{
		content: '';
		position: absolute;
		width: 15px;
		height: 15px;
		left: -4px;
		bottom: 10px;
		background: #fff;
		-webkit-transform: rotate(40deg);
	}

</style>
</head>
<body>

</body>
</html>
<?php

include 'config.php';


if(isset($_COOKIE['nome'])){
	$nomec=$_COOKIE['nome'];
	$buscar=$con->prepare('SELECT * FROM mensagens');
	$buscar->execute();
	$size=$buscar->rowCount();

	echo "<p>Seja bem-vindo ".$nomec.", use o chat com moderação</p><br>";
	if($size > 0){
		while ($linha=$buscar->fetch(PDO::FETCH_ASSOC)) {
			$nome=$linha['nome'];
			$mensagem=$linha['mensagem'];
			$email=$linha['email'];
			$hora=$linha['hora'];
			$ip=$linha['ip'];

			$im = strlen($mensagem);
			$in = strlen($nome);

			if($im < 10){
				$im = $im * 20 * $in;
			}else if($im > 100){
				$im = $im * 10;
			}else{
				$im = $im * 20;
			}


			echo "<div class='balao' style='width: ".$im."px;'><p style='color: black;'><b>".$hora." ".$nome."</b>: ".$mensagem. "</p></div>";
			echo "<br />";
		}


	}else{
		echo "<p>Sem mensagens até o momento...</p>";
	}

}

?>