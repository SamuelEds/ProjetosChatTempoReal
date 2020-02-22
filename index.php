<?php 
session_start();
$nome = $_SESSION['nome'];

setcookie('nome',$nome);
?>
<!DOCTYPE html >
<html>
<head>
	
	<title>Chat</title>
	<link rel="shortcut icon" href="img/logoF.png" />

	<link rel="stylesheet" type="text/css" href="css/estilo.css">

	<script type="text/javascript" src="js/jquery-3.4.1.js"></script>
	<script type="text/javascript" src="js/js.js"></script>
	<script type="text/javascript" src="js/jquery-form.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<style>

	body{

		background:url("./img/back.jpg");
		background-size:100%;
		background-repeat:no-repeat;
		background-attachment: fixed;

	}

	#mensagens{
		width: 950px;
		height: 400px;
		max-height: 400px;
		overflow: auto;
		overflow-x: hidden;
		border: 7px solid #aaa;
		border-radius: 5px;
		padding: 8px;
		margin: 4px;
		color: white;
		background:url("./img/chatbg.jpg");
		background-repeat: no-repeat;
		background-size: 100%;
		background-attachment: unset;

	}

	input[type='text']{
		display: block;
		width: 850px;
		font-size: 14px;
		padding: 6px;
		border: 7px solid #aaa;
		border-radius: 5px;
		outline: 0;
		color: white;
	}

	p{
		color: white;
		text-align: left;
		word-wrap: break-all;
		margin-top: 5px;
		font-family: arial,sans-serif;
	}

	b{
		cursor: pointer;
	}

	.enviar{

		transform: translateX(385px) translateY(-62.5px);

	}

	html {
		height: 100%;
	}
	body {
		display: flex;
		flex-direction: column;
		height: 100vh;
	}
	.content {
		flex: 1 0 auto; 

		padding: 20px;
	}
	.footer {
		height: 100px;
		flex-shrink: 0;
		padding: 100px;
	}
	* {
		box-sizing: border-box;
	}
	body {
		margin: 0;
		font: 16px Sans-Serif;
	}
	h1 {
		margin: 0 0 20px 0;
	}
	p {
		margin: 0 0 20px 0;
	}
	footer {
		background: #363636;
		color: white;
	}

	.credits{

		float: right;
		border: 1px solid #fff;
		width: 340px;
		height: 150px;
		margin-right: 0px;
		margin-top: -80px;

	}

	.copyright{

		float: left;
		border: 1px solid #fff;
		width: 340px;
		height: 150px;
		margin-left: 0px;
		margin-top: -80px;
	}

	.logoF{

		margin-top: -50px;
		height: 90px;

	}

	.logoFooter{

		margin-top: -20px;

	}

	.mail{
		width: 20px;
	}

	.regras{
		float: left;
		margin-right: 0px;
		border: 1px solid #fff;
		border-radius: 10px;
		width: 200px;
		height: 400px;
		position: absolute;
		background-color: #90EE90;
		background-size: 100%;
	}

</style>

<script type="text/javascript">
	$(document).ready(function(){
		$('#mensagens').load('ver.php');
		var RefreshId = setInterval(function(){
			$('#mensagens').load('ver.php');
		}, 500);
		$.ajaxSetup({cache:false});
	});

	$(document).ready(function(){
		$("#meufrm").ajaxForm({
			target: '#mensagens',
			success: function(retorno){
				$("#mensagens").html(retorno);
				$("#mensagens").show();
			}
		});
	});


</script>

<script type="text/javascript">
	<!--
		var i = 9999;
		var tempo = 10;
      var tamanho = 826; // tamanho da barra de rolagem  >> Ver arquivo Leiame.txt
      var t;

      function Rolar() {
      	document.getElementById('mensagens').scrollTop = i;
      	t = setTimeout("Rolar()", tempo);
      }
      function Parar() {
      	clearTimeout(t);
      }
      //-->
  </script>
</head>
<body onload="Rolar();">

	<?php require_once("./php/header.php")?>
	<br>
	<br>
	<br>
	<center>
		<img src="./img/logo.png" width="250px">
		<br>
		<div class="regras">
			<center>
				<h3>REGRAS</h3>
				<i>
					1- Respeitar os membros (penalidade = MUTE)
					<br>
					<br>
					2- Sem flood no chat (penalidade = MUTE)
					<br>
					<br>
					3- Nada de comercio (penalidade = PERMA BAN)
					<br>
					<br>
					4- não passe informações pessoais a desconhecidos
					<br>
					<br>
					5- sem conteudo +18 (penalidade = PERMA BAN)
				</i>
			</center>
		</div>
		<div id="mensagens" onmouseover="Parar()" onmouseout="Rolar()"></div>
		<br>

		<form method="POST" action="enviar.php" id="meufrm">
			<input type="text" name="mensagem" id="mensagem" placeholder="Digite uma mensagem..." maxlength="54" autocomplete="off" style="background-color: black;" />
			<br>
			<input type="submit" name="enviar" value="Enviar">
		</form>

		<?php require_once("footer.php")?>

	</center>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>