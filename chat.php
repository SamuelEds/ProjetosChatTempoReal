<?php 
session_start();

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
	<link rel="shortcut icon" href="/ProjetosChatTempoReal/img/logoF.png" />

	<meta charset="utf-8">


	<script type="text/javascript" src="js/jquery-3.4.1.js"></script>
	<script type="text/javascript" src="js/js.js"></script>
	<script type="text/javascript" src="js/jquery-form.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>

	
	
	<link rel="stylesheet" type="text/css" href="/ProjetosChatTempoReal/css/sidebar.css">
	<link rel="stylesheet" type="text/css" href="/ProjetosChatTempoReal/css/chat.css">

	<style type="text/css">
	.wrapper{
		margin-top: 80px;
		display: flex;
		width: 100%;
		align-items: stretch;

	}

	#content{
		width: 100%;
		padding: 20px;
		min-height: 100vh;
		transition: all 0.3s;
	}
</style>

<script type="text/javascript">

	$(document).ready(function(){
		$('.mensagens').load('ver.php');
		var RefreshId = setInterval(function(){
			$('.mensagens').load('ver.php');
		}, 500);
		$.ajaxSetup({cache:false});
	});

	$(document).ready(function(){
		$("#meufrm").ajaxForm({
			target: '.mensagens',
			success: function(retorno){
				$(".mensagens").html(retorno);
				$(".mensagens").show();
			}
		});
	});


</script>

<script type="text/javascript">

	var i = 99999;
	var tempo = 120;
	    	var tamanho = 826; // tamanho da barra de rolagem  >> Ver arquivo Leiame.txt
	    	var t;

	    	function Rolar() {
	    		document.getElementById('mensagens').scrollTop = i;
	    		t = setTimeout("Rolar()", tempo);
	    	}
	    	function Parar() {
	    		clearTimeout(t);
	    	}
	    	
	    	

	    </script>
	</head>
<body onload="Rolar();" style="background: url('img/back.jpg');">

	<?php include("php/header.php"); ?>

		<!---Todo o Conteúdo é circundado pela div class='wrapper'-->
		
		<div class="wrapper ">

			<div class="content">

				<!-- CORPO DO CHAT COMECA AQUI...-->
				
					<center>

					<div class="row">
						<div class="chatbox container col-md-11" style="width: 900px;">

							<div class="chatlogs" id="mensagens"  onmouseover="Parar();">
								<p class="mensagens" style="word-wrap: break-word;"></p>
							</div>


							<br>
							<br>

							<div class="form-group" >

								<form method="POST" action="enviar.php" id="meufrm">

									<div class="input-group chat-form col-md-12" style="margin-left: 10px;">

										<textarea name="mensagem" placeholder="O que é que há velhinho?" autocomplete="off" required class="texto" cols="100" wrap="hard" rows="2"></textarea>

										<button class="btn btn-outline-light" onmouseup="Rolar();"><img src="img/iconeEnviar.png" style="width: 40px;
										height: 20px;"></button>

									</div>


								</form>

							</div>

						</div>

						<!--<div class="input-group-prepend">
							<a class="btn btn-outline-dark dropdown-toggle" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
								REGRAS DE USO
							</a>
						</div>

						<div class="collapse" id="collapseExample">
							<div class="card card-body">
								Aqui vai as regras de uso do chat...
							</div>
						</div>-->
				</div>
					</center>
				
			</div>
		</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


</body>
</html>