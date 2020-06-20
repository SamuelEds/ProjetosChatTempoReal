<?php 

$reports = array();

$con = mysqli_connect('localhost','root','','chat');

$sql = $con->prepare("SELECT * FROM report");
$sql->execute();
$get = $sql->get_result();

while($dados = $get->fetch_assoc()){
	$reports[] = $dados;
}


 ?>