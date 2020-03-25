
<?php 
session_start();
include("php/conexao.php");

if(isset($_GET['email'])){
  $_SESSION['email'] = $_GET['email'];
}

$email = $_SESSION['email'];

$sql = "SELECT * FROM usuarios WHERE email = '$email'";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_assoc($result)){

 ?>
 <!DOCTYPE html>
 <html>
 <head>
  <title>Formulário de Cadastro</title>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="img/logoF.png" />
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/css.css">

  <style type="text/css">
  body{
    background:url("./img/back.jpg");
    background-size:100%;
    background-repeat:no-repeat;
    background-attachment: fixed;
  }
  
</style>

</head>
<body>
  <script type="text/javascript" src="js/bootstrap.js"></script>

  <?php require_once("php/header.php") ?>

  <div class="container" id="tamanhoContainer">
    <br>
    <br>
    <br>
    <br>
    <div class="jumbotron">
      <center><h4 class="form">Editar Conta</h4></center> 
      
      <p class="form"><b>Campos com * são obrigatórios</b></p>
      <form method="post" action="php/_edita_usu.php">

        <div class="form-group">
          <div class="form-row">
            <div class="col-md-7 mb-3">
              <label class="form">Nome Completo </label>
              <input type="text" class="form-control"   name="nome" placeholder="Digite seu nome de usuário: " value="<?php echo($row['nomecompleto']);?>" autocomplete="off">
              <div class="valid-feedback">
                Tudo Certo!!
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="validationDefaultUsername">Nome de Usuário *</label>
              <div class="input-group">
                <input type="text" class="form-control" id="validationDefaultUsername" placeholder="Digite seu nome de Usuário *" value="<?php echo($row['nomeusuario']);?>" name="nomeu" aria-describedby="inputGroupPrepend2" required>
              </div>
            </div>
          </div>
        </div>

        <div class="form-row">

          <div class="col-md-6 mb-3">
            <label for="validationDefault03">País</label>
            <select class="custom-select" id="validationDefault04" name="pais" >

              <option selected disabled ></option>
              <option>Brasil</option>
              <option>Argentina</option>
              <option>Uruguai</option>
              <option>Paraguai</option>
              <option>Cuba</option>
              <option>Peru</option>
              <option>Chile</option>
              <option>Bolívia</option>
              <option>País da América do Sul</option>
              <option>País da América Central</option>
              <option>País da América do Norte</option>
            </select>

          </div>

          <div class="col-md-3 mb-3">
            <label for="validationDefault04">Gênero *</label>
            <select class="custom-select" id="validationDefault04" name="genero" required>
              <option selected disabled ></option>
              <option>M</option>
              <option>F</option>
              <option>Outro</option>
            </select>
          </div>


        </div>
        <div class="form-group">
          <label class="form">E-mail *</label>
          <input type="email" class="form-control" name="email" placeholder="Insira seu melhor E-mail: * " value="<?php echo($row['email']);?>" required  readonly=“true”>
        </div>

        <div class="form-group">
          <label class="form">Senha *</label>
          <input type="password" class="form-control" name="senha" placeholder="Insira sua Senha *" value="<?php echo($row['senha']);?>" required autocomplete="off">
        </div>

        <div class="form-group">
          <label class="form">Repita sua Senha *</label>
          <input type="password" class="form-control" name="repitasenha" placeholder="Repita sua Senha:*" required autocomplete="off">
        </div>


        <div>
          <div style="text-align: right;">


            <a href="perfil.php" role="button" class="btn btn-lg btn-outline-dark">Voltar</a>
            <!---<button type="submit" id="botao" class="btn btn-lg btn-outline-success">Atualizar</button>-->

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-lg btn-outline-success" data-toggle="modal" data-target="#exampleModal">
              Atualizar
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmar Edição</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body" style="text-align: center; font-size: 20px;">
                    Deseja salvar as alterações ?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                  </div>
                </div>
              </div>
            </div>

          </form>

        </div>
      </div>
    </form>

  <?php } ?>

</div>
</form>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>