<?php 

	aceitar_solicitacao($con, $_GET['email']);

	$_SESSION['emailPara'] = $_GET['email'];

 ?>