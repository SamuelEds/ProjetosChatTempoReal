<?php
session_start();
include("php/conexao.php");
$email = $_SESSION['email'];

$sql = "SELECT nomecompleto,nomeusuario,genero,pais,email,foto FROM usuarios WHERE email = '$email'";
$result = mysqli_query($con, $sql);


while($row = mysqli_fetch_assoc($result)){



	?>

	<!DOCTYPE html>
	<html>
	<head>
		
		<title>Perfil</title>
		<meta charset="utf-8">

		<link rel="shortcut icon" href="img/logoF.png" />
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
		rel="stylesheet">

		<link rel="stylesheet" href="css/bootstrap.css">
		<script type="text/javascript" src="js/bootstrap.js"></script>

		<style type="text/css">
		body{
			background:url("./img/back.jpg");
			background-size:100%;
			background-repeat:no-repeat;
			background-attachment: fixed;
		}

		.header{
			text-align: center;
			height: 300px;
			padding: 12px;
			background-image: url("img/imagens.jfif");
			background-repeat: no-repeat;
			background-size: 100%;
		}
		.minhafoto {
			width: 200px;
			height: 200px;
			border-radius: 50%;

		}
		.user-name{
			font-size: 18px;
			margin-top: 14px;
			color: #fff;
		}
		.redesociais{
			list-style: none;
			text-align: center;
			padding: 0;

		}
		.sociais{
			display: inline-block;
			margin: 5px;
		}
		a{
			text-decoration: none;
			color: #ad0000;
		}
		a:hover{
			color: #dd1919;
		}
		.icon{
			width: 16px;
			height: 16px;
			display: inline-block;
			background-size: cover;

		}

		.gmail{
			background-image: url("icons/gmail.png");
		}
		.about {
			padding: 10px;
		}
		.about h3{
			color: #545454;
			font-size: 16px;
		}

		input[type="file"]{
			display: none;
		}


		label{
			color: white;
			width: 250px;
			height: 30px;
			background-color: #f5af09;
			position: absolute;
			margin: auto;
			left: 0;
			right: 0;
			display: flex;
			align-items: center;
			font-size: 20px;
			justify-content: center;

		}

		#botaoEnviarFoto{
			position: absolute;
			right: 460px;
			background-color: lightblue;
		}

		::-webkit-scrollbar{
			width: 10px;
		}

		::-webkit-scrollbar-track{
			background-color: rgba(255,255,255,0.1);
		}

		::-webkit-scrollbar-thumb{
			background-color: #11171a;
			border-radius: 10px;
		}

	</style>
</head>
<body>
	<?php
	require('php/header.php');
	?>
	<br>
	<br>
	<center>
	</center>
	<center>
		<div class="card">
			<div class="card-header" style="background-color: black;"><center><h4></h4></center></div>


			<div class="card-body" style="background-color: black;">
				<h5 class="card-title" style="color: white;"></h5>
				<p class="card-text" style="color: white;">
					<img class="minhafoto" src="<?php if($row['foto'] != null){echo('/ProjetosChatTempoReal/uploads/'.$row['foto']);}else{ echo('/ProjetosChatTempoReal/img/login.png');} ?>">
					<br>
					<h2 style="color: white;"><?php if($row['nomecompleto'] != ""){ echo $row['nomecompleto'];} else{ echo "-";} ?></h2>
					<form method="post" action="uploadFoto.php" enctype="multipart/form-data">
						<input type="file" id="file" name="img">
						<label for="file" style="width: 200px;">
							<i class="material-icons">
							</i> &nbsp;
							Mudar Imagem
						</label>
						<input type="submit" value="Salvar Foto" id="botaoEnviarFoto">
					</form>
				</p>
				<br>
				<br>
			</div>


		</div>

		<div class="card-header" style="background-color: black; color: darkgrey; text-align: left;">
			<h3 style="color: white;">
				Nome Completo: <?php if($row['nomecompleto'] != ""){ echo $row['nomecompleto'];} else{ echo "-";} ?>
				<br>
				Nome Usuário: <?php echo $row['nomeusuario']; ?>
				<br>
				Sexo: <?php if($row['genero'] != ""){ echo $row['genero'];} else{ echo "-";} ?>
				<br>
				Localização: <?php if($row['pais'] != ""){ echo $row['pais'];} else{ echo "-";} ?>
				<br>
				Email: <?php if($row['email'] != ""){ echo $row['email'];} else{ echo "-";} ?>
				<br>
				<br>
				<a href="editar.php"><input type="button" name="editar" class="btn btn-dark" value="Editar sua Conta"></a>
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalExemplo">
					Exluir dados da Conta
				</button>

			</h3>
		</div>

		

		<!-- Modal -->
		<div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Confirmacão de Exclusão da conta</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						Tem certeza? (Não terá mais volta)
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
						<a href="php/_exclui_usu.php"> <button type="button" class="btn btn-danger">Confirmar</button></a>
					</div>
				</div>
			</div>
		</div>




	</center>


<?php } ?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="./js/confirm.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>