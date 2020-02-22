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
			$hora=$linha['hora'];
			$ip=$linha['ip'];

			echo "<p><b>".$hora." ".$nome."</b>: ".$mensagem. "</p>";
		}
	}else{
		echo "<p>Sem mensagens até o momento...</p>";
	}

}

?>