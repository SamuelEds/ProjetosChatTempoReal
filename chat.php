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
	<meta charset="utf-8">

	<script type="text/javascript" src="js/jquery-3.4.1.js"></script>
	<script type="text/javascript" src="js/js.js"></script>
	<script type="text/javascript" src="js/jquery-form.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<link rel="stylesheet" type="text/css" href="/ProjetosChatTempoReal/css/chat.css">

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
		<div id="mensagens" onmouseover="Parar()" onmouseout="Rolar()"></div>
		<br>

		<form method="POST" action="enviar.php" id="meufrm">

			<div class="input-group" style="margin-left: 100px;">
				<div class="input-group-prepend">
					<a class="btn btn-outline-dark dropdown-toggle" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
						REGRAS DE USO
					</a>
				</div>
				<textarea name="mensagem" placeholder="Digite uma mensagem..." autocomplete="off" required style="background-color: white;" cols="100" rows="2" maxlength="118"></textarea>
				
				<button class="btn btn-outline-light"><img src="img/iconeEnviar.png" style="width: 40px; height: 20px;"></button>
				
			</div>

			<div class="collapse" id="collapseExample">
				<div class="card card-body">
					Aqui vai as regras de uso do chat...
				</div>
			</div>

			
			
		</form>



		<?php require_once("footer.html")?>

	</center>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>