
<?php 

function pegarModelo($usuarios){
$hoje = date('d/m/Y');

 
$modelo = '
<body>
  <header class="clearfix">
    <div id="logo">
      <img src="img/logoF.png" width="78" heigth="78">
    </div>
    <h1>GLOBAL CHAT</h1>
    <div id="company" class="clearfix">
      <div>DATA: '.$hoje.'</div>
    </div>
    <div>
      <p>RELATÓRIO DE USUÁRIOS</p>
    </div>
  </header>
  <main>
    <table>
      <thead>
        <tr>
          <th class="service">#</th>
          <th class="desc">NOME COMPLETO</th>
          <th>NOME DE USUÁRIO</th>
          <th>PAÍS</th>
          <th>GENERO</th>
          <th>EMAIL</th>
        </tr>
      </thead>
      <tbody>';

      foreach ($usuarios as $u) {
      

          $modelo .= '<tr>
            <td class="service">'.$u['id'].'</td>
            <td class="desc">'.$u['nomecompleto'].'</td>
            <td class="unit">'.$u['nomeusuario'].'</td>
            <td class="qty">'.$u['pais'].'</td>
            <td class="total">'.$u['genero'].'</td>
            <td>'.$u['email'].'</td>
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