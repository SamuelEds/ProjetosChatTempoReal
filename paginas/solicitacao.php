
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<title>PÁGINA DE SOLICITAÇÕES DE AMIZADE</title>
	<meta charset="utf-8">

	<link rel="shortcut icon" href="/ProjetosChatTempoReal/img/logoF.png" />

	<link rel="stylesheet" type="text/css" href="/ProjetosChatTempoReal/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/ProjetosChatTempoReal/js/bootstrap.js">

	<style type="text/css">
		
		.container{
			padding-top: 130px;
		}

	</style>
</head>
<body>

	<div class="container">
		<?php
		 
			include("../php/header.php");
			include("../php/includes.php");

			carregar_pagina($con);

		?>
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>