<?php
$erro = isset($_GET['id']) ? $_GET['id'] : 0;
require_once('Database.class.php');
require_once('db.class.php');
require_once('Usuario.class.php');
require_once('Conversa.class.php');

function criarConversa($foto_perfil, $nome, $id, $id_user)
{
    $db = new db();
    $link = $db->conecta_mysql();
    $id_conversa = new Conversa;
    $result =  $id_conversa->idConversa($id, $id_user);
    $sql = "SELECT * FROM `mensagem` WHERE `id_convers` = '$result' ORDER BY `mensagem`.`hora_data` ASC";
    $resultado = mysqli_query($link, $sql);
    while ($row_conversa = $resultado->fetch_array(MYSQLI_ASSOC)) {
        if ($row_conversa['id_autor'] == $id) {

            echo '
                <div class="direct-chat-msg right">
                    <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name float-right">Você</span>
                        <span class="direct-chat-timestamp float-left">' . utf8_encode($row_conversa['hora_data']) . '</span>
                    </div>
                    <img class="direct-chat-img" src="fotos_perfil/' . utf8_encode($_SESSION['foto_perfil']) . '" alt="Message User Image">
                    <div class="direct-chat-text">
                        ' . utf8_encode($row_conversa['mensagem']) . '
                    </div>
                </div>';
        } else {
            echo '
            <div class="direct-chat-msg">
            <div class="direct-chat-infos clearfix">
                <span class="direct-chat-name float-left">' . utf8_encode($nome) . '</span>
                <span class="direct-chat-timestamp float-right">' . utf8_encode($row_conversa['hora_data']) . '</span>
            </div>
            <img class="direct-chat-img" src="fotos_perfil/' . $foto_perfil . '" alt="Message User Image">
            <div class="direct-chat-text">
            ' . utf8_encode($row_conversa['mensagem']) . '
            </div>
        </div>';
        }
    }
}

function criarCabecalho($foto_perfil, $nome, $id, $id_user)
{
    $id_conversa = new Conversa;
    $result =  $id_conversa->idConversa($id, $id_user);
    return '
        <div class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu">
            <li class="nav-item sidebar-dark-primary">
                <!--Usuario Online-->
                <a href="limpar_deletar_user.php?id=' . $result . '" class="nav-link">
                    <img src="fotos_perfil/' . utf8_encode($foto_perfil) . '" alt="User Image" class="brand-image img-circle elevation-2" style="height: 45px!important;">
                    <i class="far fa-circle text-success"></i> ' . utf8_encode($nome) . '
                </a>
                <!--Usuario Off-line
                <a href="limpar_deletar_user.php?id="' . $result . ' class="nav-link">
                    <img src="fotos_perfil/' . utf8_encode($foto_perfil) . '" alt="User Image" class="brand-image img-circle elevation-2" style="height: 45px!important;">
                    <i class="far fa-circle text-danger"></i> ' . utf8_encode($nome) . '
                </a>
                -->
                <div class="dropdown-divider"></div>
            </li>
        </div>
        ';
}
