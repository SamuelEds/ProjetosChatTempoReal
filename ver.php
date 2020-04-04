
<?php 
session_start();
include('php/conexao.php');

$email = $_SESSION['email'];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Carregando...</title>
	<meta charset="utf-8">

	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<style>

	.balao{
		background-color: #fff;
		padding: 10px;
		position: relative;
		margin-right: 2000px;
		border-radius: 20px;
	}

	.balao:before{
		content: '';
		position: absolute;
		width: 15px;
		height: 15px;
		left: -4px;
		bottom: 10px;
		background: #fff;
		-webkit-transform: rotate(40deg);
	}

	.perfil{
		position: relative;
		width: 100%;
		height: 100%;
		border-radius: 40%;
		padding: 1px;
	}

	.chat{
		display: flex;
		flex-flow: row wrap;
		align-items: flex-start;
	}

	.chat .chat-message{
		width: 80%;
		padding: 15px;
		margin: 5px 10px;
		color: black;
		font-size: 15px;
		font-family: Arial;
	}

	.chat .user-photo{
		width: 60px;
		height: 60px;
		background: #ccc;
		border-radius: 50%;
		overflow: hidden;
	}

	.nome-usu{
		font-size: 20px; 
		margin-top: 10px;
		color: black;
		font-family: tahoma;
		padding: 5px;
	}

	.linha{
		border-top: 1px dashed black;
		border-bottom: 1px solid black;
		color: #fff;
		background-color: #fff;
		height: 4px;

	}

</style>
</head>
<body>

	<?php
	include 'config.php';


	if(isset($_COOKIE['nome'])){
		$nomec=$_COOKIE['nome'];
		$buscar=$con->prepare('SELECT * FROM mensagens');
		$buscar->execute();
		$size=$buscar->rowCount();

		?>
		<div class="container">
			<div class='alert alert-success' role='alert'>
				<center> Seja bem vindo(a) <strong><?php echo $nomec; ?></strong>.</center>
			</div>
			<div class="alert alert-warning" role='alert'><p style='color: black; font-size: 15px;'>Use o chat com moderação!!</p></div>
		

		<?php

		
		if($size > 0){
			while ($linha=$buscar->fetch(PDO::FETCH_ASSOC)) {
				$nome=$linha['nome'];
				$mensagem=$linha['mensagem'];
				$email=$linha['email'];
				$foto=$linha['foto'];
				$hora=$linha['hora'];
				$ip=$linha['ip'];


				?>

				<hr class="linha">

				<div class="chat container">
					<div class="user-photo"><img src="uploads/<?php if(!isset($foto)){ echo('login.png');}else{ echo($foto);} ?>" class="perfil"></div><div class="nome-usu"><h2><?php echo $nome; ?></h2></div>
					<p class="mensagens chat-message"><?php echo $mensagem; ?></p>
				</div>

				<br>
				<?php

			}



		}else{
			echo "<p style='color: black;'>Sem mensagens até o momento...</p>";
		}

	}

	?>

</div>
	
</body>
</html>
