

<!DOCTYPE html>
<html>
<head>
	<title>Entrar em uma conta</title>
	<meta charset="utf-8">

	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="shortcut icon" href="img/logoF.png" />
	<style type="text/css">

	body{
		background-repeat:no-repeat;
		background-attachment: fixed;
	}
</style>

</head>
<body background="img/back.jpg">
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<?php require_once("php/header.php") ?>
	<center>
	

	<div id="tamanhoContainer" style="margin-top: 100px; background-color: #696969; border-radius: 20px; height: 45%; width: 40%" class="container">
		<img src="img/logo.png" style="width: 60%; margin-top: 5%">
		<br>
		<h4><b style="color: white;">Desmentindo Distâncias</b></h4>
		<div  style=" width: 70%;">
			<form class="px-4 py-3" method="post" action="php/valida.php">

				<div class="form-group">
					<center><label  style="color: white; "><img src="img/email.png" style="height: 50px; width: 50px; transform: translateX(-70px);">E-mail</label></center>
					<input type="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="E-mail:" name="email">

				</div>

				<div class="slogan" style="position: absolute;"><b></b></div>
				<div class="form-group">
					<center><label for="exampleDropdownFormPassword1"  style="color: white;"><img src="img/senha.png" style="height: 50px; width: 50px;  transform: translateX(-70px);">Senha</label></center>
					<input type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Senha" name="senha">

				</div>

				<button type="submit" class="btn btn-primary" style="width: 70%;">Entrar</button>
			</form>
			</center>
			<br>
				

		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>