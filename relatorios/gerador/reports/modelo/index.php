
<?php 

function pegarModelo($reports){

$hoje = date('d/m/Y');

$modelo = '<body>
  <header class="clearfix">
    <div id="logo">
      <img src="img/logoF.png" width="78" height="78">
    </div>
    <h1>GLOBAL CHAT</h1>
    <div id="company" class="clearfix">
      <div>DATA: '.$hoje.'</div>
    </div>
    </div>
      <p>Relatório de Reports</p>
    </div>
  </header>
  <main>
    <table>
      <thead>
        <tr>
          <th class="service">#</th>
          <th class="desc">NOME COMPLETO</th>
          <th>NOME USUÁRIO</th>
          <th>PAIS</th>
          <th>GENERO</th>
          <th>EMAIL</th>
          <th>MOTIVO</th>
        </tr>
      </thead>';

      foreach ($reports as $r) {
        
      
      $modelo .= '<tbody>
          <tr>
            <td class="service">'.$r['id'].'</td>
            <td class="desc">'.$r['nomecompleto'].'</td>
            <td class="unit">'.$r['nomeusuario'].'</td>
            <td class="qty">'.$r['pais'].'</td>
            <td class="total">'.$r['genero'].'</td>
            <td class="total">'.$r['email'].'</td>
            <td class="total">'.$r['motivo'].'</td>
          </tr>
        </tbody>';
      }

    $modelo .= '</table>
  </main>
  <footer>
    &copy; Todos os direitos reservados - GlobalChat.net 2020
  </footer>
</body>';

return $modelo;

 } ?>