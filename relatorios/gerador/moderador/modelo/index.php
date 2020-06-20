
<?php 

function pegarModelo($moderador){

$hoje = date('d/m/Y');
$modelo = '<body>
  <head>
    <meta charset="utf-8">
  </head>
  <header class="clearfix">
    <div id="logo">
      <img src="img/logoF.png" width="78" height="78">
    </div>
    <h1>GLOBAL CHAT</h1>
    <div id="company" class="clearfix">
      <div>DATA '. $hoje .'</div>
    </div>
    <div>
      <p>Relatório de Moderador</p>
    </div>
  </header>
  <main>
    <table>
      <thead>
        <tr>
          <th class="service">#</th>
          <th class="desc">NOME</th>
          <th>SENHA</th>
        </tr>
      </thead>
      <tbody>';

      foreach ($moderador as $m) {

        $modelo .= '<tr>
          <td class="service">'.$m['id'].'</td>
          <td class="desc">'.$m['nome'].'</td>
          <td class="unit">'.$m['senha'].'</td>
        </tr>';

         }
        
      $modelo .= '</tbody>
    </table>
  </main>
  <footer>
    &copy; Todos os direitos reservados - GlobalChat.net 2020
  </footer>
</body>';

return $modelo;

 } ?>