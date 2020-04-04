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
	<link rel="shortcut icon" href="img/logoF.png" />
	<meta charset="utf-8">

	<script type="text/javascript" src="js/jquery-3.4.1.js"></script>
	<script type="text/javascript" src="js/js.js"></script>
	<script type="text/javascript" src="js/jquery-form.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<link rel="stylesheet" type="text/css" href="/ProjetosChatTempoReal/css/chat.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Titan+One&display=swap" rel="stylesheet">

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
	<body onload="Rolar();">

		<div class="wrapper">

			<nav id="sidebar">
				<div class="sidebar-header">
					<img src="img/logo.png" class="logo-sidebar"><h3>GLOBAL CHAT</h3>
				</div>


				<ul class="list-unstyled components" >
					<p><a href="perfil.php" style="text-decoration: none; color: white;"><img src="uploads/<?php if(!isset($perfil)){echo('login.png');}else{echo($perfil);} ?>" /><h4><?php echo $nome; ?></h4></a></p>
					<li class="active">
						<a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Início</a>
						<ul class="collapse list-unstyled" id="homeSubmenu">
							<li>
								<a href="#">Voltar à página principal</a>
							</li>
							<li>
								<a href="#">Acessar outro servidor</a>
							</li>
							<li>
								<a href="#">Coming Soon...</a>
							</li>
						</ul> 
					</li>

					<li>
						<a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Social</a>
						<ul class="collapse list-unstyled" id="pageSubmenu">
							<li>
								<a href="#">Lista de amigos (Coming Soon..)</a>
							</li>
							<li>
								<a href="#">Coming Soon...</a>
							</li>
							<li>
								<a href="#">Coming Soon..</a>
							</li>
						</ul> 
					</li>
					<li>
						<a href="#">Feed de Notícias</a>
					</li>
					<li>
						<a href="#">Entre em contato conosco</a>
					</li>
				</ul>

				<ul class="list-unstyled CTAs">
					<li>
						<a href="#" class="suporte">SUPORTE</a>
					</li>
				</ul>
			</nav>

			<div class="content">
				<nav class="navbar navbar-expand-lg navbar-light bg-light">

					<button type="button" id="sidebarCollapse" class="btn btn-info">
						<i class="fa fa-align-justify"></i> <span>MENU</span>
					</button>

					<!--<a class="navbar-brand" href="#">Navbar</a> -->
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarNav">
						<ul class="navbar-nav ml-auto">
							<li class="nav-item active">
								<a class="nav-link" href="#"><i class="fas fa-bell"></i><span class="sr-only">(current)</span></a>
							</li>
						</ul>
					</div>
				</nav>



				<center>
					<!--<div class="mensagens" onmouseover="Parar()" onmouseout="Rolar()"></div>-->

					<div class="chatbox container" style="width: 900px;">
						<div class="chatlogs" id="mensagens"  onmouseover="Parar();">
							<p class="mensagens" style="word-wrap: break-word;"></p>
						</div>
						<br>
						<br>

						<div class="form-group">

							<form method="POST" action="enviar.php" id="meufrm">

								<div class="input-group chat-form" style="margin-left: 10px;">

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

	</center>

</div>
</div>

<br>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script>
	$(document).ready(function(){
		$('#sidebarCollapse').on('click',function(){
			$('#sidebar').toggleClass('active');
		});
	});  
</script>


</body>
</html>