<?php 

	if(isset($_GET['email'])){
		pegar_usuario($con, $_GET['email']);

?>


<?php
	}else{
	//header("Location: ./solicitacao?pagina=perfil&email=");
		echo "DESFEITA A AMIZADE";
}


 ?>