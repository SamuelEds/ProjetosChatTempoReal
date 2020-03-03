<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Global Chat - Sala de Bate-papo online</title>
	<link rel="shortcut icon" href="img/logoF.png" />
	<link rel="stylesheet" type="text/css" href="css/css2.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>
      <link href="main.css?version=12" />
</head>
<body>
<style type="text/css">
	body{
		background:url("./img/back.jpg");
		background-repeat:no-repeat;
		background-attachment: fixed;
	}
      .container{
            margin-right: 0px;
            height: 100px;
            flex-shrink: 0;
            padding: -900px;
            margin-top: 0px;
      }
      .col{
            width: 40vw;
            margin: 0px;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0px 4px 0px lightgray;
            background-color: white;

      }

	footer{
            background: #363636;
            color: white;
      }
      .credits{
      	text-align: center;
            float: right;
            border: 1px solid #fff;
            width: 340px;
            height: 150px;
            margin-right: 0px;
            margin-top: -80px;

      }      
       .footer {
            height: 100px;
            flex-shrink: 0;
            padding: 100px;
            margin-top: 100px;
      }

      .copyright{
      	text-align: center;
            float: left;
            border: 1px solid #fff;
            width: 340px;
            height: 150px;
            margin-left: 0px;
            margin-top: -80px;
      }

      .logoF{

            margin-top: -50px;
            height: 90px;

      }

      .logoFooter{
      		text-align: center;
            margin-top: -20px;

      }

      .mail{
            width: 20px;
      }
      /*Scrollbar*/
      ::-webkit-scrollbar {
      width: 5px;
      }
      ::-webkit-scrollbar-track {
      background-color: rgba(255, 255, 255, 0.1);
      border-radius: 10px;
      }
      ::-webkit-scrollbar-thumb {
      background-color: #11171a;
      border-radius: 10px;
      }
</style>

<?php require_once("php/header.php") ?>

	<div class="container2">
	<center><img class="img" src="img/logo.png"><br><br></center>
	<center><h4> Sala de Bate-papo mundial, conecte-se de qualquer lugar do mundo e venha conversar com a gente.</h4></center><br>
	<center><a href="formulario.php" class="botao"> Cadastre-se </a>
	<a href="login.php" class="botao"> Login </a></center>
	</div> 
      <div class="container">
      <div class="col">
      <div class="embed-responsive embed-responsive-4by3">
      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/9t4dc4il8i0" allowfullscreen></iframe>
      </div>
      </div>
      </div>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <div class="sobre">
      <div style="transform: translateY(80px); margin-right: -89px;">
      <h1>O que somos?</h1>
      <p>Global Chat é um site que tem como objetivo oferecer um lugar agradável, dinâmico e de fácil uso onde você pode se comunicar com qualquer pessoa do mundo, quando quiser!  Desenvolvido por Denis Braga, João Victor, Samuel Edson e Yara Karen para você :) 
      </p>
      </div>
      <div class="imagem">
            <!--<img src="./img/pc2.jpg" class="img2">-->
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="img/pc2.jpg" class="d-block w-100">
            </div>
            <div class="carousel-item">
            <img src="img/pc3.jpg" class="d-block w-100">
            </div>
            <div class="carousel-item">
            <img src="img/pc4.jpg" class="d-block w-100">
            </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
            </div>

            </div>
      
</div>

    </div>

    <?php require_once("footer.php")?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>