<?php 

session_start();
unset($_COOKIE["nome"]);
unset($_COOKIE["email_para"]);
session_destroy();

header("Location: ../index.php");


 ?>