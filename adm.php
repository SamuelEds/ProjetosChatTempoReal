<?php 
session_start();
include("php/conexao.php");

$sql = "SELECT * FROM usuarios";
$result = mysqli_query($con,$sql);

$sql2 = "SELECT * FROM report";
$result2 = mysqli_query($con,$sql2);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Tela de Administração</title>
	<meta charset="utf-8">

	<link rel="shortcut icon" href="img/logoF.png" />
	<link rel="stylesheet" href="css/bootstrap.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<style type="text/css">

		.minhafoto {
			width: 50px;
			height: 50px;
			border-radius: 50%;

		}

	</style>

</head>
<body>

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

	<table class="table">
		<thead class="thead-dark">
			<tr>
				<th scope="col">ID</th>
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
					<th scope="row"><?php echo $row['id']; ?></th>
					<td><?php echo $row['nomecompleto']; ?></td>
					<td><?php echo $row['nomeusuario']; ?></td>
					<td><?php echo $row['pais']; ?></td>
					<td><?php echo $row['genero']; ?></td>
					<td><?php echo $row['email']; ?></td>
					<td><div class="btn-group" role="group"><a href="php/_exclui_usu.php?email=<?php echo $row['email']; ?>" class="btn btn-danger">Excluir</a> <a href="editar.php?email=<?php echo $row['email']; ?>" class="btn btn-success">Atualizar</a></div></td>
				</tr>

			<?php } ?>

		</tbody>
	</table>

	<br>
	<br>

	<div class="alert alert-danger" role="alert">
		<h3 style="font-family: 'Arial Black';">LISTA DE USUÁRIOS REPORTADOS</h3>
	</div>

	<table class="table table-striped">
		<thead>
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
					<th scope="row"><?php echo $row['id']; ?></th>
					<td><?php echo $row['nomecompleto']; ?></td>
					<td><?php echo $row['nomeusuario']; ?></td>
					<td><?php echo $row['pais']; ?></td>
					<td><?php echo $row['genero']; ?></td>
					<td><?php echo $row['email']; ?></td>
					<td><?php echo $row['motivo']; ?></td>
					<td><img class="minhafoto" src="<?php if($row['foto'] != null){echo('/ProjetosChatTempoReal/uploads/'.$row['foto']);}else{ echo('/ProjetosChatTempoReal/img/login.png');} ?>"></td>
					<td><div class="btn-group" role="group"><a href="php/_exclui_usu.php?email=<?php echo $row['email']; ?>" class="btn btn-danger">Excluir</a></div></td>
				</tr>

			<?php } ?>
		</tbody>
	</table>


	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>