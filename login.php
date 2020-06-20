<!DOCTYPE html>
<html>
<head>
	<title>Entrar em uma conta</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="shortcut icon" href="img/logoF.png" />
	<style type="text/css">

	.row{
		background-image:url(https://img.freepik.com/free-vector/modern-city-night-skyline-neon-cartoon_1441-3160.jpg?size=626&ext=jpg); 
		background-size: 100%; 
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

	input[type="text"] {
		width: 100%;
		border: 2px solid #aaa;
		border-radius: 4px;
		margin: 8px 0;
		outline: none;
		padding: 8px;
		box-sizing: border-box;
		transition: 0.3s;
	}

	input[type="text"]:focus {
		border-color: dodgerBlue;
		box-shadow: 0 0 8px 0 dodgerBlue;
	}

	.inputWithIcon input[type="email"] {
		padding-left: 40px;
	}

	.inputWithIcon input[type="password"] {
		padding-left: 40px;
	}

	.inputWithIcon {
		position: relative;
	}

	.inputWithIcon i {
		position: absolute;
		left: 0px;
		top: 1px;
		padding: 9px 8px;
		color: #aaa;
		transition: 0.3s;
	}

	.inputWithIcon input[type="email"]:focus + i {
		color: dodgerBlue;
	}

	.inputWithIcon input[type="password"]:focus + i {
		color: dodgerBlue;
	}

	.inputWithIcon.inputIconBg i {
		background-color: #aaa;
		color: #fff;
		padding: 9px 4px;
		border-radius: 4px 0 0 4px;
	}

	.inputWithIcon.inputIconBg input[type="text"]:focus + i {
		color: #fff;
		background-color: dodgerBlue;
	}

</style>

</head>
<body style=" overflow-x: hidden;"
>
<script type="text/javascript" src="js/bootstrap.js"></script>

<div class="row">
	<div class="col-md-6 tela1">


		<center>
			<br>
			<div style="border: 3px black solid; border-radius: 10px; margin-left: 30px; background-color: white; height: 650px;">

				<br>
				<h1>GLOBAL CHAT</h1>
				<img src="./img/logoF.png" width="100px">
				<br>
				<br>
				<h3><b>Novidades e Atualizações</b></h3>
				<br>

				<div style="border: 3px black solid; border-radius: 5px; background-color: lightgrey; overflow-y: scroll !important; overflow-x: hidden; height: 340px;">
					<br>
					<ul style="float: left; text-align: left;">
						<b>
							- [06/04/20 - 14:21] Novo Look para a tela principal
							<br>
							- [19/06/20 - 15:34] Novo Look para o chat
							<br>
							- [20/06/20 - 12:36] Novo Look para o Login
						</b>

					</ul>

				</div>
				<br>
			</div>

		</center>

	</div>

	<div class="col-md-6">

		<center>

			<br>

			<form class="px-4 py-3" method="post" action="php/valida.php" style=" background-color: white; border: 3px black solid; border-radius: 3px; margin-top: 200px; margin-right: 20px;">

				<div class="tittle" style="background-color: lightblue;"><h1><b>LOGIN</b></h1></div>
				<br>
				<div class="inputWithIcon inputIconBg">

					<input type="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="Email: " name="email">
					<i class="fa fa-envelope fa-lg fa-fw" aria-hidden="true" style="width: 35px; height:36px; "></i>

				</div>

				<div class="slogan" style="position: absolute;"><b></b></div>

				<br>

				<div class="inputWithIcon inputIconBg">

					<input type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Senha" name="senha">
					<i class="fa fa-lock fa-lg fa-fw" aria-hidden="true" style="width: 35px; height:36px; "></i>

				</div>
				<br>
				<button type="submit" class="btn btn-primary btn-lg" style="width: 70%;">Entrar</button>

			</form>

		</center>

	</div>

</div>	
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>