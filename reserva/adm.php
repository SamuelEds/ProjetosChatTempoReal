<?php 
session_start();
include("php/conexao.php");

//SELECIONAR USUÁRIOS
$sql = "SELECT * FROM usuarios";
$result = mysqli_query($con,$sql);

//SELECIONAR USUÁRIOS REPORTADOS
$sql2 = "SELECT * FROM report";
$result2 = mysqli_query($con,$sql2);


//SELECIONAR LISTA DE MODERADORES
$comando = $con->prepare("SELECT * FROM moderador");
$comando->execute();
$get = $comando->get_result();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Tela de Administração</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<link rel="shortcut icon" href="img/logoF.png" />
	<link rel="stylesheet" href="css/bootstrap.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>

	<style type="text/css">
	body{
		margin-left: 2vh;
		margin-right: 2vh;
		background:url("./img/back3.jpg");
		background-color: #e3f2fd;
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover;
	}
	.minhafoto {
		width: 50px;
		height: 50px;
		border-radius: 50%;

	}
	th{
		text-align: center;
	}
	td{
		text-align: center;
		background-color: white;
	}
	/* navbar */
	.sidebar {
		height: 100vh;
		background:url("./img/cor.jpg");
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover;

	}

	.bottom-border {
		border-bottom: 1px groove #eee;
	}

	.sidebar-link {
		transition: all .4s;
	}

	.sidebar-link:hover {
		background-color: #808080; 
		border-radius: 5px;
		color: #fffafa;
		opacity:  0.8;

	}
	.current {
		background-color: #6495ED;
		border-radius: 7px;
		box-shadow: 2px 5px 10px #111;
		transition: all .3s;
		
	}

	.current:hover {
		background-color: #ADD8E6;
		
	}

	@media (max-width: 768px) {
		.sidebar {
			position: static;
			height: auto;
		}

		.top-navbar {
			position: static;
		}
		
	</style>

</head>
<body>
	<!-- navbar -->
	<nav class="navbar navbar-expand-md navbar-light">
		<button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#myNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="myNavbar">
			
			<div class="row">
				<!-- sidebar -->
				<div class="col-xl-2 col-lg-3 col-md-4 sidebar fixed-top">
					<div class="bottom-border pb-3">
						<p class="text-white" style="margin-top: 5vh; text-align: center;"> Página do Administrador</p>
					</div>
					<ul class="navbar-nav flex-column mt-4">
						<!--<li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 current"><i class="fas fa-home text-light fa-lg mr-3"></i>Chat</a></li>-->
						<li class="nav-item"><a href="login.php" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fas fa-user text-light fa-lg mr-3"></i>Login</a></li>	

						<li class="nav-item"><a href="./relatorios/gerador/reports/reportRELATORIO.php" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fas fa-archive text-light fa-lg mr-3"></i>Reportados</a></li>
						<li class="nav-item"><a href="./relatorios/gerador/moderador/relatorioMODERADOR.php" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fas fa-archive text-light fa-lg mr-3"></i>Moderadores</a></li>
						<li class="nav-item"><a href="./relatorios/gerador/usuarios/relatorioUSUARIOS.php" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fas fa-archive text-light fa-lg mr-3"></i>Usuários</a></li>
						<li class="nav-item"><a href="paginas/cadastro/cadastro.html" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fas fa-archive text-light fa-lg mr-3"></i>Cadastro de moderadores</a></li>
					</ul>
				</div>
			</div>
		</div>
	</nav>
	<br>
	<div class="container-fluid">
		<div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
			<div class="col-12">
				<div class="card" style="width: 100%; text-align: center;">
					<div class="card-body">

						<h5 class="card-title">Este Painel está permitido apenas aos <b>Administradores</b> do Sistema. Está de direito os ADM pela modificação de dados que são inseridos no banco de dados do site</h5>
						<p class="card-text">Abaixo estão listados todos os usuários do site, moderadores e mensagens que são inseridos no banco de dados. É permitido os administradores modificarem dados de todos os usuários cadastrados e moderadores</p>
						<a href="index.php" class="btn btn-primary">Voltar para a Tela de Início</a>
					</div>
				</div>
				<br>
				<br>

				<div class="alert alert-secondary" role="alert">
					<h3 style="font-family: 'Arial Black';">LISTA DOS USUÁRIOS CADASTRADOS NO SITE</h3>
				</div>
				<div class="table-responsive">
					<table class="table">
						<thead class="thead-dark">
							<tr class="text-muted">
								<th scope="col">ID</td>
									<th scope="col">NOME COMPLETO</th>
									<th scope="col">NOME USUÁRIO</th>
									<th scope="col">PAÍS</th>
									<th scope="col">GENERO</th>
									<th scope="col">EMAIL</th>
									<th scope="col">AÇÃO</th>
								</tr>
							</thead>
							<tbody>

								<?php while($row = mysqli_fetch_assoc($result)){ ?>


									
									<tr>
										<td scope="row"><?php echo $row['id']; ?></td>
										<td><?php echo $row['nomecompleto']; ?></td>
										<td><?php echo $row['nomeusuario']; ?></td>
										<td><?php echo $row['pais']; ?></td>
										<td><?php echo $row['genero']; ?></td>
										<td><?php echo $row['email']; ?></td>
										<td><div class="btn-group" role="group"><a href="php/_exclui_usu.php?email=<?php echo $row['email']; ?>&&adm=1" class="btn btn-danger">Excluir</a> <a href="editar.php?email=<?php echo $row['email']; ?>" class="btn btn-success">Atualizar</a></div></td>
									</tr>

								<?php }; ?>

							</tbody>
						</table>
					</div>
					<br>

					<div class="alert alert-danger" role="alert">
						<h3 style="font-family: 'Arial Black';">LISTA DE USUÁRIOS REPORTADOS</h3>
					</div>
					<div class="table-responsive">
						<table class="table table-striped">
							<thead class="thead-dark">
								<tr>
									<th scope="col">ID</th>
									<th scope="col">NOME COMPLETO</th>
									<th scope="col">NOME USUÁRIO</th>
									<th scope="col">PAÍS</th>
									<th scope="col">GENERO</th>
									<th scope="col">EMAIL</th>
									<th scope="col">MOTIVO</th>
									<th scope="col">FOTO</th>
									<th scope="col">AÇÃO</th>
								</tr>
							</thead>
							<tbody>
								<?php while($row = mysqli_fetch_assoc($result2)){ ?>


									
									<tr>
										<td scope="row"><?php echo $row['id']; ?></td>
										<td><?php echo $row['nomecompleto']; ?></td>
										<td><?php echo $row['nomeusuario']; ?></td>
										<td><?php echo $row['pais']; ?></td>
										<td><?php echo $row['genero']; ?></td>
										<td><?php echo $row['email']; ?></td>
										<td><?php echo $row['motivo']; ?></td>
										<td><img class="minhafoto" src="<?php if($row['foto'] != null){echo('/ProjetosChatTempoReal/uploads/'.$row['foto']);}else{ echo('/ProjetosChatTempoReal/img/login.png');} ?>"></td>
										<td><div class="btn-group" role="group"><a href="php/_exclui_usu.php?email=<?php echo $row['email']; ?>&&adm=1" class="btn btn-danger">Excluir</a><a href="php/retirarReport.php?email=<?php echo $row['email']; ?>&&adm=1" class="btn btn-warning">Retirar</a></div></td>
									</tr>

								<?php } ?>
							</tbody>
						</table>
					</div>

					<div class="alert alert-warning" role="alert">
						<h3 style="font-family: 'Arial Black';">LISTA DE MODERADORES DO SISTEMA</h3>
					</div>
					<div class="table-responsive">
						<table class="table table-striped">
							<thead class="thead-dark">
								<tr>
									<th scope="col">ID</th>
									<th scope="col">NOME</th>
									<th scope="col">EMAIL</th>
									<th scope="col">SENHA</th>
									<th scope="col">AÇÃO</th>
								</tr>
							</thead>
							<tbody>
								<?php while($dados = $get->fetch_assoc()){ ?>


									
									<tr>
										<td scope="row"><?php echo $dados['id']; ?></td>
										<td><?php echo $dados['nome']; ?></td>
										<td><?php echo $dados['email']; ?></td>
										<td><?php echo $dados['senha']; ?></td>
										<td><a class="btn btn-danger" href="paginas/cadastro/php/excluirMod.php?id=<?php echo($dados['id']) ?>&&adm=1">Excluir</a></td>
									</tr>

								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>




	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script src="js/script.js"></script>
</body>
</html>