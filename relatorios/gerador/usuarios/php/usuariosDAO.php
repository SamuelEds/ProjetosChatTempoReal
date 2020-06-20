<?php 

$usuarios = array();

$con = mysqli_connect('localhost','root','','chat');

$sql = $con->prepare("SELECT * FROM usuarios");
$sql->execute();
$get = $sql->get_result();

while($dados = $get->fetch_assoc()){
	$usuarios[] = $dados;
}


 ?>