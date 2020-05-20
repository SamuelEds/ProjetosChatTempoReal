<?php 

session_start();
unset($_COOKIE["nome"]);
session_destroy();

header("Location: /ProjetosChatTempoReal/index.php");


 ?>