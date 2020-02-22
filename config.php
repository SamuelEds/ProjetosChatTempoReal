<?php 

$dbusername = "root";
$dbpassword = "";
$dbhost = "localhost";
$dbname = "chat";

$var = 'mysql:host=' .$dbhost. ';dbname=' .$dbname;
$con = new PDO($var,$dbusername,$dbpassword);
 
 ?>