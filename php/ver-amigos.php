
<head>
	<style type="text/css">

	.aviso{
		font-family: Arial Black;
		text-align: center;
		text-transform: uppercase;
		font-size: 20px;
	}

	.foto{
		width: 100px;
		height: 100px;
		border-radius: 50%;
	}

	.mensagens{
		margin-top: 20px;
		margin-left: 10px;
		font-family:  Arial;
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

<?php

if(!isset($_SESSION)){
	session_start();
}


include('conexao.php');

//PEGAR O NOME DO USUÁRIO
$sql1 = $con->prepare("SELECT * FROM usuarios WHERE email = ?");
$sql1->bind_param("s",$_SESSION['email_para']);
$sql1->execute();
$get1 = $sql1->get_result();
$dados1 = $get1->fetch_assoc();

//PEGAR AS MENSAGENS DO BANCO
$sql = $con->prepare("SELECT * FROM amigos WHERE (email_de = ? and email_para = ?) or (email_de = ? and email_para = ?)");
$sql->bind_param("ssss", $_SESSION['email'], $_SESSION['email_para'], $_SESSION['email_para'], $_SESSION['email']);
$sql->execute();
$get = $sql->get_result();
$total = $get->num_rows;

if($total > 0){

	//SE TIVER MENSAGENS
	?>

	<?php while($dados = $get->fetch_assoc()){ ?>

		<hr class="linha">

		<div class="container">
			<div class="row">
				<div class="col-md-10">
					
					<?php if($dados['email_de'] == $_SESSION['email']){

						?>
						<p style="font-family: Arial Black; color: black; width: 60px;" >VOCÊ</p>
						<p><img class="foto" style=" border: 7px red solid; box-shadow: 2px 4px red; " src="../uploads/<?php echo($dados['foto']); ?>">&nbsp; &nbsp;
						<?php echo $dados['mensagens']; ?></p>


						<?php

					}else{
						?>
						<p style="font-family: Arial Black; color: black; width: 400px;" >SEU AMIGO</p>
						<p><img class="foto" style=" border: 7px rgb(135,206,235) solid; box-shadow: 2px 4px rgb(135,206,235);" src="../uploads/<?php echo($dados['foto']); ?>">&nbsp; &nbsp;
							<?php echo $dados['mensagens']; ?></p>



							<?php
						} ?>

					</div>
				</div>
			</div>

			<hr class="linha">

		<?php } ?>


		<?php

	}else{
	//SENÃO TIVER MENSAGENS
		?>
		<div class="alert alert-light aviso" role="alert" >
			Que lugar vazio :(<br> Inicie uma conversa com seu camarada <b><a href="#" class="alert-link"> <?php echo $dados1['nomeusuario']; ?></a></b>
		</div>
		<?php
	}

	?>