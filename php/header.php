
<?php 

if(!isset($_SESSION)) 
{ 
	session_start(); 

}


$email = $_SESSION['email'];

include("conexao.php");

include("includes.php");

$sql = "SELECT * FROM usuarios WHERE email = '$email'";
$result = mysqli_query($con,$sql);

?>

<header>

	<head>
		<style type="text/css">

		#foto1{

			position: relative;
			width: 50px;
			height: 50px;
			border-radius: 50%;

		}
	</style>
</head>
<link rel="stylesheet" href="css/bootstrap.css">

<nav class="navbar navbar-expand-lg fixed-top navbar-light" style="background-color: #e3f2fd;">
	<img src="/ProjetosChatTempoReal/img/logo.png" style="width: 5%;">
	<a class="btn " href="/ProjetosChatTempoReal/index.php">Home</a>
	<?php if(isset($_SESSION['nome'])){ ?><a class="btn " href="/ProjetosChatTempoReal/chat.php">Chat</a><?php } ?>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item dropdown">
				<a style="color: black;" class="btn" href="/ProjetosChatTempoReal/paginas/solicitacao.php?pagina=amigos" id="navbarDropdown" role="button">Amigos <?php if(total_amizade($con) > 0){
					echo("(".total_amizade($con).")");
				}else{
					echo("(0)");
				} ?> </a>

			</div>
			<a href="/ProjetosChatTempoReal/formulario.php" role="button" class="btn">Inscreva-se</a>

			<a href="/ProjetosChatTempoReal/perfil.php" class="btn " role="button" ><?php while($rows_usu = mysqli_fetch_assoc($result)){ $foto = $rows_usu['foto']; $nome_usu = $rows_usu['nomeusuario']; }  ?> <?php if(isset($foto)){ ?> <img id="foto1" src="/ProjetosChatTempoReal/uploads/<?php echo($foto);?>"> <?php }else if(isset($nome_usu)){ echo $nome_usu; }else{ echo ""; } ?> </a>
		</nav>
	</header>