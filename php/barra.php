<?php 

if(!isset($_SESSION)){
	session_start();
}

?>

<header>

	<head>

		<link rel="stylesheet" href="css/bootstrap.css">

		<style type="text/css">
		.link-chat{
			font-family: Arial Black;

		}

		.link-chat a:hover{
			text-decoration: none;
		}

		.link-chat p{
			color: rgb(54,54,54);
		}
	</style>
</head>


<nav class=" nav fixed-top navbar-light" style="background-color: white; height: 70px; position: relative;">

	<ul class="nav">
		<li class="nav-item">
			<img src="img/logoF.png" style="height: 65px; width: 65px;">
		</li>

		<li class="nav-item">
			<h3 style="margin-left: 20px; font-family: candara; font-size: 40px; color: grey; opacity: 0.5; margin-top: 7%; ">GLOBAL CHAT</h3>
		</li>

		<li class="nav-item">
			<p> <?php if (isset($_SESSION['email'])) {
				echo "<h3 class='link-chat'><a href='chat.php' class='nav-link'><p>Ir para o Chat</p></a></h3>";
			} ?> </p>
		</li>
	</ul>

</nav>
</header>