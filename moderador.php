<?php 
include("php/conexao.php");

$sql = "SELECT * FROM usuarios";
$result = mysqli_query($con,$sql);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Tela de Moderação</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<link rel="shortcut icon" href="img/logoF.png" />
	<link rel="stylesheet" href="css/bootstrap.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<style type="text/css">
	body{
		margin-left: 5vh;
		margin-right: 5vh;
		background:url("./img/back3.jpg");
		background-color: #e3f2fd;
		background-repeat:no-repeat;
		background-attachment: fixed;
		background-size: 100%;
	}
	nav{

		margin-left: 95vh;

	}
	th{
		text-align: center;
	}
	td{
		background-color: white;
		text-align: center;
	}
</style>
</head>
<body>
	<br>
	<div class="card" style="width: 100%; text-align: center;">
		<div class="card-body">
			<h5 class="card-title">Este Painel está permitido apenas aos <b>Moderadores</b> do Sistema. Qualquer ato de desrespeito (Usuários - Staff ou Staff - Usuários) poderá ser reportado ao ADM do Sistema</h5>
			<p class="card-text">Abaixo estão listados todos os usuários do site, é permitido os moderadores apenas visualizarem todos os dados dos usuários e podem reportar ao ADM</p>
			<a href="index.php" class="btn btn-primary">Voltar para a Tela de Início</a>
		</div>
	</div>
	<br>
	<table class="table">
		<thead class="thead-dark">
			<tr>
				<th scope="col">ID</th>
				<th scope="col">NOME COMPLETO</th>
				<th scope="col">NOME USUÁRIO</th>
				<th scope="col">EMAIL</th>
				<th scope="col">PAIS</th>
				<th scope="col">GENERO</th>
				<th scope="col">AÇÃO</th>
			</tr>
		</thead>
		<tbody>
			<?php 

			$pagina_a = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);
			$pagina = (!empty($pagina_a)) ? $pagina_a : 1;

			$qnt_result = 4;

			$inicio = ($qnt_result * $pagina) - $qnt_result;

			$resul_u = "SELECT * FROM usuarios LIMIT $inicio, $qnt_result";
			$resultado = mysqli_query($con, $resul_u);
			while ($row_usuario = mysqli_fetch_assoc($resultado)){
				echo "
				<tr>
				<td>". $row_usuario['id'] ."</td>
				<td>". $row_usuario['nomecompleto'] ."</td>
				<td>". $row_usuario['nomeusuario']."</td>
				<td>". $row_usuario['email'] ."</td>
				<td>". $row_usuario['pais'] ."</td>
				<td>". $row_usuario['genero'] . "</td>";

				


				?>

				<td>

					<p>
						<button class='btn btn-danger' type='button' data-toggle='collapse' data-target='#collapseExample' aria-expanded='false' aria-controls='collapseExample'>
							Reportar
						</button>
					</p>

					<form action='php/reportUser.php?id=<?php echo $row_usuario['id'];?>&&nomec=<?php echo $row_usuario['nomecompleto'];?>&&nomeu=<?php echo $row_usuario['nomeusuario'];?>&&email=<?php echo $row_usuario['email'];?>&&pais=<?php echo $row_usuario['pais'];?>&&genero=<?php echo $row_usuario['genero'];?>&&foto=<?php echo($row_usuario['foto']); ?>' method='post'>

						<div class='collapse' id='collapseExample'>
							<div class='card card-body'>
								<div class='form-group'>
									<input type='text' class='form-control' id='exampleFormControlInput1' name='motivo' required placeholder='Motivo aqui...'>

								</div> 
								<button class='bnt btn-sm btn-danger' type='submit'> Enviar </button>
							</div>
						</div>

					</form>


				</td>
			</tr>

			<?php 

		};

  //paginação
		$result_p = "SELECT COUNT(id) AS num_result FROM usuarios";
		$result_pg = mysqli_query($con, $result_p);
		$row_p = mysqli_fetch_assoc($result_pg);
		/*echo $row_p['num_result'];*/
		$quantipg = ceil($row_p['num_result']/$qnt_result);

  //Limitar
		$max_links = 2; ?>


	</tbody>
</table>

<?php 

echo "
<nav aria-label='Page navigation example'>
<ul class='pagination'>
<li class='page-item'>
<a class='page-link' href='moderador.php?pagina=1'><span aria-hidden='true'>&laquo;</span></a>";

for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
	if ($pag_ant >= 1) {
		echo "<li class='page-item'><a class='page-link' href='moderador.php?pagina=$pag_ant'> $pag_ant </a>";
	}
}

echo "<li class='page-item'><a class='page-link'>$pagina</a></li>";

for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
	if ($pag_dep <= $quantipg) {
		echo "<li class='page-item'><a class='page-link' href='moderador.php?pagina=$pag_dep'> $pag_dep </a> </div>";
	}
}

echo"<li class='page-item'><a class='page-link' href='moderador.php?pagina=$quantipg'><span aria-hidden='true'>&raquo;</span></a></div>";

?>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>