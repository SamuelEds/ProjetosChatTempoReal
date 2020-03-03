
<?php 

if(!isset($_SESSION)) 
{ 
	session_start(); 
}

include("conexao.php");

$email = $_SESSION['email'];

$sql = "SELECT * FROM usuarios WHERE email = '$email'";
$result = mysqli_query($con,$sql);

?>

<header>

	<head>
		<style type="text/css">
			a:hover{
				background-color: lightgreen;
			}
		</style>
	</head>
	<link rel="stylesheet" href="css/bootstrap.css">

	<nav class="navbar navbar-expand-lg fixed-top navbar-light" style="background-color: #e3f2fd;">
		<img src="img/logo.png" style="width: 5%;">
		<?php if(isset($_SESSION['nome'])){ ?><a class="btn " href="index.php">Home</a><?php } ?>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item dropdown">
					<a style="color: black;" class="btn" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Amigos</a>

				</div>
				<a href="/ProjetosChatTempoReal/formulario.php" role="button" class="btn">Inscreva-se</a>
				<a href="perfil.php" class="btn " role="button"><?php while($rows_usu = mysqli_fetch_assoc($result)){ echo $rows_usu['nomeusuario'];  }  ?></a>
			</nav>
		</header>