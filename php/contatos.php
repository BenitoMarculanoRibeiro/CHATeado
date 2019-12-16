<?php 
if (!class_exists('Database')) {
  require('Database.class.php');
}
if (!class_exists('db')) {
  require('db.class.php');
}
if (!isset($_SESSION["email"])) {
  header("Location: Chat.php");
}
require_once('../php/Usuario.class.php');
function criarTabela($id)
{

echo '
<table id="minhaTabela" class="table table-striped table-bordered" style="width:100%">
  <thead>
    <tr>
      <th>Propriedade</th>
      <th>Lavoura</th>
      <th>Produto</th>
      <th>Embalagem</th>
      <th>Ação</th>
    </tr>
  </thead>
  <tbody>';



    $sql = "SELECT DISTINCT `id_conversa` from conversa INNER JOIN mensagem ON mensagem.id_convers = conversa.id_conversa WHERE (`id_usuario1` = ".$_SESSION['id_usuario']." OR `id_usuario2` = ".$_SESSION['id_usuario'].") ORDER By `hora_data` ASC";

    $this->db = new Database;


    $resultado = $this->db->mysqli->query($sql);
    while ($row_etiqueta = $resultado->fetch_array(MYSQLI_ASSOC)) {
    echo '
    <tr>
      <td>' . utf8_encode($row_etiqueta['nomepropriedade']) . '</td>
      <td>' . utf8_encode($row_etiqueta['identificacao']) . '</td>
      <td>' . utf8_encode($row_etiqueta['descricao']) . '</td>
      <td>' . utf8_encode($row_etiqueta['datacolheita']) . '</td>
      <td align="center">

        <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#editaetiqueta" data-dadoid="' . $row_etiqueta['idetiqueta'] . '" data-dadolote="' . utf8_encode($row_etiqueta['lote']) . '" data-dadopeso="' . utf8_encode($row_etiqueta['peso']) . '" data-dadodatacolheita="' . utf8_encode($row_etiqueta['datacolheita']) . '" data-dadonotafiscal="' . utf8_encode($row_etiqueta['notafiscal']) . '" data-dadolavoura_idlavoura="' . utf8_encode($row_etiqueta['lavoura_idlavoura']) . '">Editar</button>

        <a href="geraetiqueta.php?cod='.$row_etiqueta['idetiqueta'].'"><button type="button" class="btn btn-xs btn-secondary">Imprimir</button></a>




      </td>';
      }
      echo '
      <li class="nav-item  ">
                            <a href="/docs/3.0/index.html" class="nav-link ">
                                <img src="sad.png" alt="Message User Image" class="brand-image img-circle elevation-2">
                                <p>
                                    Lucas ALberto
                                </p>
                            </a>
                        </li>
      '
      echo '
  </tbody>
</table>';
}
