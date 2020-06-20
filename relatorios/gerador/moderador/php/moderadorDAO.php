<?php 

$moderador = array();

$con = mysqli_connect('localhost','root','','chat');

$sql = $con->prepare("SELECT * FROM moderador");
$sql->execute();
$get = $sql->get_result();

while($dados = $get->fetch_assoc()){
	$moderador[] = $dados;
}

 ?>