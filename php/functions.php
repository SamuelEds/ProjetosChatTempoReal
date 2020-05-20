<?php 

function carregar_pagina($con){
	$pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 'inicio';
	$dir = '../paginas/sub-paginas/';
	$ext = ".php";


	if(file_exists($dir.$pagina.$ext)){
		include($dir.$pagina.$ext);
	}else{
		echo("<div class='alert alert-danger'>Página não encontrada</div>");
	}
}

function pegar_usuario($con, $email){
	$sql = $con->prepare("SELECT * FROM usuarios WHERE email = ?");
	$sql->bind_param("s",$email);
	$sql->execute();
	$get = $sql->get_result();
	$total = $get->num_rows;

	if($total > 0){
		while($dados = $get->fetch_assoc()){

			?>

			<head>

				<style type="text/css">
				.container{
					text-align: center;
					padding-top: 60px;
				}
			</style>
		</head>

		<div class="container">
			<img src ='<?php echo('../uploads/'.$dados['foto']); ?> ' style='width: 200px;
			height: 200px;
			border-radius: 50%;'>

			<h1><a href='?pagina=perfil&&email=<?php echo($dados['email']); ?>'> <?php echo($dados['nomeusuario']); ?> </a></h1><h2><?php echo $dados['nomecompleto'] ; ?></h2>
		</div>

		<?php
	}
}
}

function pegar_perfil($con, $email){
	$sql = $con->prepare("SELECT * FROM usuarios WHERE email = ?");
	$sql->bind_param("s", $email);
	$sql->execute();
	$get = $sql->get_result();
	$total = $get->num_rows;

	if($total > 0){
		$dados = $get->fetch_assoc();

		?>

		<head>
			<style type="text/css">
			.dados{
				padding-left: 200px;
			}

			.botoes{
				padding-left: 70%;	
			}
		</style>
	</head>

	<div class="container jumbotron">

		<div class="perfil-usuario  row">

			<div class="col-md-2">
				<img src ='<?php echo('../uploads/'.$dados['foto']); ?> ' style='width: 300px;
				height: 300px;
				border-radius: 50%;'>
			</div>

			<div class="col-md-9 dados">
				<h1><u> USUÁRIO:</u> <?php echo $dados['nomeusuario']; ?></h1>
				<br>
				<h2><u>NOME COMPLETO:</u> <?php echo $dados['nomecompleto']; ?> </h2>
				<br>
				<h3><u>ORIGEM:</u> <?php echo $dados['pais']; ?></h3>


			</div>
		</div>

		<div class="row">
			<div class="col-sm-12 botoes">
				<?php  verificar_solicitacao($con, $_SESSION['email'], $email); ?>
			</div>
		</div>

	</div>

	<?php



}
}

function enviar_solicitacao($con,$email_para){



	$sql = $con->prepare("INSERT INTO solicitacao(email_de,email_para) VALUES (?,?)");
	$sql->bind_param("ss", $_SESSION['email'], $email_para);
	$sql->execute();

	if($sql->affected_rows > 0){
        	//echo "SOLICITAÇÃO ENVIADA";


		redireciona("?pagina=perfil&email={$email_para}");
	}else{
		echo "SOLICITAÇÃO NÃO FOI ENVIADA";
	}

}

function verificar_solicitacao($con, $email_de, $email_para){
	$sql = $con->prepare("SELECT * FROM solicitacao WHERE (email_de = ? AND email_para = ?) OR (email_para = ? AND email_de = ?)");
	$sql->bind_param("ssss", $email_de, $email_para, $email_de, $email_para);
	$sql->execute();
	$get = $sql->get_result(); 
	$total = $get->num_rows;

	if($total > 0){
		$dados = $get->fetch_assoc();

		if($dados['amigo'] == 1 && $_SESSION['email'] != $email_para){
			echo("<a href='?pagina=deletar_solicitacao&id={$dados['id']}' class='btn btn-danger btn-lg'>Desfazer Amizade</a>");

		}

		if($dados['email_para'] == $email_para && $dados['email_de'] == $email_de && $dados['amigo'] == 0){
			echo("<a href='?pagina=cancelar_solicitacao&email={$dados['email_para']}' class='btn btn-warning btn-lg'>Cancelar Solicitação</a>");
		}

		/*if($dados['email_de'] == $email_para && $dados['email_para'] == $email_de && $dados['amigo'] == 0){
			echo("<a href='?pagina=aceitar_solicitacao&email={$dados['email_de']}' class='btn btn-success btn-lg'>Aceitar Solicitação</a>");
			echo("<a href='?pagina=recusar_solicitacao&id={$dados['id']}' class='btn btn-danger btn-lg'>Recusar Solicitação</a>");
		}*/

	}else if($total <= 0 && $email_para != $email_de){
		echo("<a href='?pagina=enviar-solicitacao&email={$email_para}' class='btn btn-success btn-lg'>Adicionar Amigo</a>");
	}
}

function deletar_solicitacao($con, $id){
	$sql1 = $con->prepare("SELECT * FROM solicitacao WHERE id = ?"); 
	$sql1->bind_param("s",$id);
	$sql1->execute();
	$get1 = $sql1->get_result();
	$dados = $get1->fetch_assoc();

	$sql = $con->prepare("DELETE FROM solicitacao WHERE id = ?");
	$sql->bind_param("s",$id);
	$sql->execute();
	$get = $sql->get_result();

	if($sql->affected_rows > 0){

		if($_SESSION['email'] != $dados['email_para']){
			redireciona("?pagina=inicio&email={$dados['email_para']}");
		}else{
			redireciona("?pagina=inicio&email={$dados['email_de']}");
		}
		
	}else{
		echo "ERRO AO DESFAZER AMIZADE";
		echo($sql->affected_rows);
	}
}

function cancelar_solicitacao($con, $email_de){
	$sql = $con->prepare("DELETE FROM solicitacao WHERE email_de = ? AND email_para = ?");
	$sql->bind_param("ss", $_SESSION['email'], $email_de);
	$sql->execute();

	if($sql->affected_rows > 0){
		redireciona("?pagina=perfil&email={$email_de}");
	}else{
		echo "ERRO AO CANCELAR AMIZADE";
		echo($sql->affected_rows);
	}
}

function aceitar_solicitacao($con, $email_de){
	$sql = $con->prepare("SELECT * FROM solicitacao WHERE email_de = ? AND email_para = ? AND amigo = 0");
	$sql->bind_param("ss",$email_de, $_SESSION['email']);
	$sql->execute();
	$get = $sql->get_result();
	$total = $get->num_rows;

	if($total > 0){
		$dados = $get->fetch_assoc();

		if($dados['email_para'] == $_SESSION['email']){
			if(atualizar_solicitacao($con,$email_de, $_SESSION['email']) > 0){
				redireciona("?pagina=perfil&email={$email_de}");
			}else{
				echo "ERRO AO ATUALIZAR";
			}
		}
	}
}

function recusar_solicitacao($con, $id){
	$sql1 = $con->prepare("SELECT * FROM solicitacao WHERE id = ?"); 
	$sql1->bind_param("s",$id);
	$sql1->execute();
	$get1 = $sql1->get_result();
	$dados = $get1->fetch_assoc();

	$sql = $con->prepare("DELETE FROM solicitacao WHERE id = ?");
	$sql->bind_param("s", $id);
	$sql->execute();

	if($sql->affected_rows > 0){
		redireciona("?pagina=perfil&email={$dados['email_de']}");
		//redireciona("?pagina=solicitacoes");
	}else{
		echo("ERRO");
		echo($sql->affected_rows);
	}
}

function atualizar_solicitacao($con, $email_de, $email_para){
	$sql = $con->prepare("UPDATE solicitacao SET amigo = 1 WHERE email_de = ? AND email_para = ?");
	$sql->bind_param("ss", $email_de, $email_para);
	$sql->execute();

	return $sql->affected_rows;
}

function redireciona($dir){
	echo("<meta http-equiv='Refresh' content='0; url={$dir}' />");
}

function solicitacoes($con){
	if(isset($_SESSION['email'])){

		

		$sql = $con->prepare("SELECT * FROM solicitacao WHERE email_para = ? AND amigo = 0");
		$sql->bind_param("s", $_SESSION['email']);
		$sql->execute();
		$get = $sql->get_result();
		$total = $get->num_rows;

		

		if($total > 0){

			?>	

			<div class="container">
				<h1>SOLICITAÇÕES PENDENTES</h1><br>

				<div class="row">


					<div class="col-md-7">

						<?php

						while($dados = $get->fetch_assoc()){

							$sql1 = $con->prepare("SELECT * FROM usuarios WHERE email = ?");
							$sql1->bind_param("s", $dados['email_de']);
							$sql1->execute();
							$get1 = $sql1->get_result();
							$dados1 = $get1->fetch_assoc();


							?>

							<head>
								<style type="text/css">
								.container{
									padding-top: 50px;
								}
							</style>
						</head>

						<div class="row">
							<div class="col-sm-4">

								<img src="<?php echo('../uploads/'.$dados1['foto']); ?> " style='width: 100px;
								height: 100px;
								border-radius: 50%;'>
								<br>
								<br>

								<?php echo("<ul>
									<li style='list-style:none;'><a href='?pagina=perfil&email={$dados['email_de']}' target='_blank'>

									<a href='?pagina=aceitar_solicitacao&email={$dados['email_de']}' class='btn btn-success btn-lg'>Aceitar Solicitação</a>

									<br>
									<br>

									<a href='?pagina=deletar_solicitacao&id={$dados['id']}' class='btn btn-danger btn-lg'>Recusar Solicitação</a> 

									</a>

									</li>

									</ul>"); ?>
								</div>

								<div class="col-md-4">
									<h4>USUÁRIO: <b><?php echo $dados1['nomeusuario']; ?></b> </h4><br>
									<h4>NOME: <b><?php echo $dados1['nomecompleto']; ?></b></h4>
								</div>
							</div>



							<hr>


							<?php


						}

						?>
					</div>

					<?php listar_amigos($con); ?>

				</div>

			</div>

			<?php

		}else{
			listar_amigos($con); 
		}
	}else{
		exit();
	}
}

function total_amizade($con){
	$sql = $con->prepare("SELECT * FROM solicitacao WHERE email_para = ? AND amigo = 0");
	$sql->bind_param("s",$_SESSION['email']);
	$sql->execute();
	$get = $sql->get_result();
	$total = $get->num_rows;

	if($total > 0){
		return $get->num_rows;
	}

}

function listar_amigos($con){

	$sql = $con->prepare("SELECT * FROM solicitacao WHERE (email_de = ? AND amigo = 1) OR (email_para = ? AND amigo = 1)");
	$sql->bind_param("ss", $_SESSION['email'],$_SESSION['email'] );

	$sql->execute();
	$get = $sql->get_result();
	$total = $get->num_rows;

	if($total > 0){

		?>
		<div class="col-md-5">
			<h1 style="">AMIGOS</h1><br>
			<div class="row">
				<?php

				while ($dados = $get->fetch_assoc()) {
			//echo "AMIGOS ENCONTRADO";

					if($_SESSION['email'] == $dados['email_de']){
						$sql1 = $con->prepare("SELECT * FROM usuarios WHERE email = ?");
						$sql1->bind_param("s", $dados['email_para']);
						$sql1->execute();
						$get1 = $sql1->get_result();
						$dados1 = $get1->fetch_assoc();
					}else{
						$sql1 = $con->prepare("SELECT * FROM usuarios WHERE email = ?");
						$sql1->bind_param("s", $dados['email_de']);
						$sql1->execute();
						$get1 = $sql1->get_result();
						$dados1 = $get1->fetch_assoc();
					}
					

					?>


					<div class="col-sm-3">
						<img src="<?php echo('../uploads/'.$dados1['foto']); ?> " style='width: 100px;
						height: 100px;
						border-radius: 50%;'>
					</div>

					<div class="col-sm-8">
						<h3>USUÁRIO: <b><?php echo $dados1['nomeusuario'];?></b></h3>
						<br>
						<h3>NOME COMPLETO: <b><?php echo $dados1['nomecompleto'];?></b> </h3>
						
						<a href="?pagina=deletar_solicitacao&id=<?php echo($dados['id']); ?>" class='btn btn-danger btn-lg'>Desfazer Amizade</a>
						
						<hr color="black" width="300px" style="border: 4px solid black;">
						
						

					</div>

					
					<br>



					<?php

				}

				?>

			</div>
			
		</div>

		<?php

	}else{
		?>	

		<div class="alert alert-danger">NENHUM AMIGO ENCONTRADO :(</div>

		<?php
	}
}

?>