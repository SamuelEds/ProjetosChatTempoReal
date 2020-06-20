<?php 

if(!isset($_SESSION)){
	session_start();
}


include('php/conexao.php');

$email = $_SESSION['email'];
$sql = "SELECT * FROM usuarios WHERE email = '$email'";
$result = mysqli_query($con,$sql);

while($linha = mysqli_fetch_assoc($result)){
	$perfil = $linha['foto'];
}

$nome = $_SESSION['nome'];

setcookie('nome',$nome);
?>
<!DOCTYPE html >
<html>
<head>
	
	<title>Chat</title>
	<link rel="shortcut icon" href="img/logoF.png" />

	<meta charset="utf-8">


	<script type="text/javascript" src="js/jquery-3.4.1.js"></script>
	<script type="text/javascript" src="js/js.js"></script>
	<script type="text/javascript" src="js/jquery-form.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<link rel="stylesheet" type="text/css" href="css/chat.css">

	<style type="text/css">

	.wrapper{

		width: 100%;
		margin-top: 10%;
		display: flex;
		align-items: stretch;

	}

	#content{

		width: 100%;
		padding: 20px;
		min-height: 100vh;
		transition: all 0.3s;
	}
	
</style>

</head>
<body onload="Rolar();">

	<?php include("php/header.php"); ?>

	<!---Todo o Conteúdo é circundado pela div class='wrapper'-->
	<center>
		<div class="wrapper row ">

			<div class="content col-md-12">

				<!-- CORPO DO CHAT COMECA AQUI...-->

				<div class="chatbox ">

					<div class="chatlogs" id="mensagens"  onmouseover="Parar();">
						<p class="mensagens" style="word-wrap: break-word;"></p>
					</div>

				</div>

				<div class="form-group row" style="transform: translateY(-200%);
				border-radius: 10px; margin-bottom: -100%;">

				<div class="col-md-12">

					<form method="POST" action="enviar.php" style=" position: absolute; margin-left: 140px; margin-bottom: 10px;" id="meufrm">

						<div class="input-group chat-form " >
							
							<textarea name="mensagem" placeholder="O que é que há velhinho?" autocomplete="off" required id="texto" class="texto" cols="100" wrap="hard" rows="2"></textarea>

							<button class="btn btn-outline-light" onclick="Rolar();"><img src="img/iconeEnviar.png" style="width: 40px;
							height: 20px;"></button>

						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
</center>

<script type="text/javascript">

				//VISUALIZAR MENSAGENS NA TELA EM TEMPO REAL
				$(document).ready(function(){
					$('.mensagens').load('ver.php');
					var RefreshId = setInterval(function(){
						$('.mensagens').load('ver.php');
					}, 500);
					$.ajaxSetup({cache:false});
				});

				//ENVIAR MENSAGENS
				
				$(document).ready(function(){
					$("#meufrm").ajaxForm({
						target: '.mensagens',
						success: function(retorno){
							$(".mensagens").html(retorno);
							$(".mensagens").show();

							let caixaTexto = document.getElementById('texto');
							caixaTexto.value = "";
							caixaTexto.focus();
						}
					});
				});

			</script>

			<!--SCRIPT PARA BARRA DE ROLAGEM NO SITE-->
			<script type="text/javascript">

				var i = 99999;
				var tempo = 120;
	    	var tamanho = 826; // tamanho da barra de rolagem
	    	var t;

	    	function Rolar() {
	    		document.getElementById('mensagens').scrollTop = i;
	    		t = setTimeout("Rolar()", tempo);
	    	}
	    	function Parar() {
	    		clearTimeout(t);
	    	}

	    </script>

	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


	</body>
	</html>