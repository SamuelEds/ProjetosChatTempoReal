var toque = 0;
function verSenha(){
  let imagem = document.getElementById('img');
  let campo = document.getElementById('s');

  

  if(toque == 0){
    campo.setAttribute('type','text');
    toque = 1;
  }else{
    campo.setAttribute('type','password');
    toque = 0;
  }
}