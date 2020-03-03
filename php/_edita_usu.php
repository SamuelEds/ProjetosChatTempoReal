
<?php 

include("conexao.php");

$nome 		 = $_POST['nome'];
$nomeu		 = $_POST['nomeu'];
$pais 		 = $_POST['pais'];
$genero 	 = $_POST['genero'];
$email  	 = $_POST['email'];
$senha  	 = $_POST['senha'];
$repitasenha = $_POST['repitasenha'];

if($senha == $repitasenha  ) {


	$sql = "UPDATE usuarios SET nomecompleto = '$nome', nomeusuario = '$nomeu', pais = '$pais', genero = '$genero', senha = '$senha' WHERE email = '$email'"; 

	$result = mysqli_query($con,$sql);

  if(mysqli_affected_rows($con)){
   echo "<script>alert('Conta Atualizada com Sucesso!!');</script>";
   echo "<script>javascript:window.location='/ProjetosChatTempoReal/perfil.php';</script>";

 }else{
   echo "<script>alert('Algo deu Errado!!');</script>";
   echo "<script>javascript:window.location='/ProjetosChatTempoReal/perfil.php';</script>";
 }
}else{
  echo "<script>alert('Senhas não coincidem!!');</script>";
  echo "<script>javascript:window.location='/ProjetosChatTempoReal/perfil.php';</script>";
}

?>