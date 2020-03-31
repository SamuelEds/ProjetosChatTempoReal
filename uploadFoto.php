<?php 
session_start();
$email = $_SESSION['email'];

$nome = $_FILES['img']['name'];
$temp = $_FILES['img']['tmp_name'];

$_SESSION['nome-foto'] = $nome;
$_SESSION['caminho'] = $temp;


$banco = new mysqli("localhost","root","","chat");

$sql = "UPDATE usuarios SET foto = '$nome' WHERE email = '$email'";

$banco->query($sql);
$banco->close();

if(move_uploaded_file($temp,"uploads/".$nome)){
	header("Location: perfil.php");
}else{
	header("Location: perfil.php");
}


 ?>