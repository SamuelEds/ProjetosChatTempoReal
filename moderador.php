<?php 
include("php/conexao.php");

$sql = "SELECT * FROM usuarios";
$result = mysqli_query($con,$sql);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Tela de Moderação</title>
	<meta charset="utf-8">

	<link rel="shortcut icon" href="img/logoF.png" />
	<link rel="stylesheet" href="css/bootstrap.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>

</head>
<body>

	<div class="card" style="width: 80rem; text-align: center;">
		<div class="card-body">
			<h5 class="card-title">Este Painel está permitido apenas aos moderadores do Sistema. Qualquer ato de desrespeito (Usuários - Staff ou Staff - Usuários) poderá ser reportado ao ADM do Sistema</h5>
			<p class="card-text">Abaixo estão listados todos os usuários do site, é permitido os moderadores apenas visualizarem todos os dados dos usuários e podem reportar ao ADM</p>
			<a href="index.php" class="btn btn-primary">Voltar para a Tela de Inicío</a>
		</div>
	</div>

	<table class="table">
		<thead class="thead-dark">
			<tr>
				<th scope="col">ID</th>
				<th scope="col">NOME COMPLETO</th>
				<th scope="col">NOME USUÁRIO</th>
				<th scope="col">PAIS</th>
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
					<td><a href="php/reportUser.php" class="btn btn-danger">Reportar</a></td>
				</tr>

			<?php } ?>

		</tbody>
	</table>


	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>