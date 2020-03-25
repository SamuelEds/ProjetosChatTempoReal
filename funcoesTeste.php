

<!DOCTYPE html>
<html>
<head>
	<title>Balão Texto</title>
	<meta charset="utf-8">
	<style type="text/css">
	body{
		padding: 100px;
		background: white;
	}
	.balao{
		background-color: black;
		padding: 10px;
		position: relative;
		width: 300px;
	}

	.balao:before{
		content: '';
		position: absolute;
		width: 15px;
		height: 15px;
		left: -5px;
		bottom: 10px;
		background: black;
		-webkit-transform: rotate(40deg);

	}
</style>
</head>
<body>
	<div class="balao">
		<p style="color: white;"><?php 

		$acao = $_GET['acao'];
		if($acao == "validar"){
			$msg = $_POST['msg'];

	//Deixar maiúsculo
	//$msg = strtoupper($msg);
	//$i = strlen($msg);

			echo nl2br(trim($msg, ".\t"));


		}


		?></p>
	</div>

	<br>

	<form action="?acao=validar" method="post">
		<textarea name="msg" cols="52" maxlength="5"></textarea>
		<input type="submit" name="Enviar" value="Enviar">
	</form>
</body>
</html>