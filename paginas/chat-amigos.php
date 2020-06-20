<?php 

if(!isset($_SESSION)){
	session_start();
}

include("../php/conexao.php");


//PEGAR NOME DO USUÁRIO
$sql = $con->prepare("SELECT * FROM usuarios WHERE email = ?");
$sql->bind_param("s", $_GET['email']);
$sql->execute();
$get = $sql->get_result();
$dados = $get->fetch_assoc();


//PEGAR O EMAIL DO USUÁRIO DE DESTINO
$_SESSION['email_para'] = $_GET['email'];


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
	
	<link rel="shortcut icon" href="../img/logoF.png">
	<link rel="stylesheet" type="text/css" href="../css/chat-amigos.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">

	<script type="text/javascript" src="../js/jquery-3.4.1.js"></script>
	<script type="text/javascript" src="../js/js.js"></script>
	<script type="text/javascript" src="../js/jquery-form.js"></script>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Conversa com <?php echo $dados['nomeusuario']; ?></title>
</head>
<body onload="Rolar();">

	<?php include("../php/header.php"); ?>

	<br><br><br><br>

	<center>
		<header class="alert alert-light" role="alert">
			<div class="row destinatario">
				<div class="col-md-12">
					<p><img src="../uploads/<?php echo($dados['foto']); ?>" style="width: 200px; height: 200px; border-radius: 50%;"> <h3 style="font-family: Arial Black; text-transform: uppercase;"> CONVERSAR COM <?php echo $dados['nomeusuario']; ?></h3></p>
				</div>
			</div>
		</header>
	</center>
	
	<div class="row corpo">
		<div class="col-md-12 conteudo">
			<div class="chatbox">
				<div class="chat-logs" id="mensagens" onmouseover="Parar();">
					<p class="mensagens" style="word-wrap: break-word;">
					</p>
				</div>

				<div class="form-chat" id="form">
					<form method="post" action="../php/enviar-bate-papo-amigo.php?email=<?php echo($_GET['email']); ?>&&foto=<?php echo($_GET['foto']); ?>">
						<p >
							<textarea  name="mensagem" placeholder="O que é que há velhinho?" required class="texto" id="mensagem"  wrap="hard" rows="2" autocomplete="off"></textarea>

							<button onclick="Rolar();" type="submit" class="btn btn-outline-light" ><img src="../img/iconeEnviar.png" style="width: 40px;
							height: 20px;"></button>

						</p>
					</form>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		let caixaTexto = document.getElementById('mensagem');

		$(document).ready(function(){
			$("#form").ajaxForm({
				target: '.mensagens', //MANDARÁ A MENSAGEM PARA A DIV COM A CLASSE 'mensagens'
				success: function(retorno){
					$(".mensagens").html(retorno);
					caixaTexto.value = "";
					caixaTexto.focus();
				}
			});
		});

		$(document).ready(
			function() {
				$('.mensagens').load('../php/ver-amigos.php');

				var refresh = setInterval(function() {
					$('.mensagens').load('../php/ver-amigos.php');
				}, 500);

				$.ajaxSetup({cache:false});
			}
			);

		




		</script>

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