<?php
if (!class_exists('Database')) {
    require('Database.class.php');
}

class Mensagem
{
    public $idmensagem;
    public $idconversa;
    public $idautor;
    public $mensagem;
    public $horadata;

    function __construct()
    { }

    function criar($c, $a, $m)
    {
        $this->idconversa = $c;
        $this->idautor = $a;
        $this->mensagem = $m;
    }

    function salvar()
    {
        $objDb = new db();
        $link = $objDb->conecta_mysql();
        $sql = "INSERT INTO `mensagem` (`id_mensagem`, `id_convers`, `id_autor`, `mensagem`, `hora_data`) VALUES (NULL, '.$this->idconversa.', '.$this->idautor.', '.$this->mensagem.', current_timestamp());";
        if (mysqli_query($link, $sql)) {
            header('Location: ../index.php');
        } else {
            echo "Erro ao registrar o usuário!";
        }
    }

    function limpaMensagens($idconversa){
        $objDb = new db();
        $link = $objDb->conecta_mysql();
        $sql = "DELETE FROM `mensagem` WHERE `id_convers`= ". $idconversa .";";
        if (mysqli_query($link, $sql)) {
            header('Location: ../Chat.php');
        } else {
            echo "Erro ao limpar mensagens!<br>".$sql;
        }
    }

    function enviarMensagem($idconversa, $mensagem, $idamigo)
    {   
        $final = "'".$mensagem."'";
        $objDb = new db();
        $link = $objDb->conecta_mysql();
        $sql = "INSERT INTO `mensagem` (`id_mensagem`, `id_convers`, `id_autor`, `mensagem`, `hora_data`) VALUES (NULL, " . $idconversa . ", " . $_SESSION['id_usuario'] . ", " . $final . ", current_timestamp());";
        if (mysqli_query($link, $sql)) {
            header('Location: ../Chat1.php?id='.$idamigo);
        } else {
            echo "Erro ao enviar mensagem!<br>".$sql;
        }
    }

    function criarTabela($id)
    {
        $sql = "SELECT DISTINCT `id_conversa` from conversa INNER JOIN mensagem ON mensagem.id_convers = conversa.id_conversa WHERE (`id_usuario1` = " . $_SESSION['id_usuario'] . " OR `id_usuario2` = " . $_SESSION['id_usuario'] . ") ORDER By `hora_data` ASC";
        $this->db = new Database;
        $resultado = $this->db->mysqli->query($sql);
        while ($row_conversa = $resultado->fetch_array(MYSQLI_ASSOC)) {
            $sql = "SELECT `id_usuario1`,`id_usuario2` FROM `conversa` WHERE `id_conversa` = " . utf8_encode($row_conversa['id_conversa']) . "";
            $resultado_id_usuario = $this->db->mysqli->query($sql);
            $row_id_usuario = $resultado_id_usuario->fetch_array(MYSQLI_ASSOC);
            if ($row_id_usuario['id_usuario1'] == $_SESSION['id_usuario']) {
                $sql = "SELECT * FROM `usuario` WHERE `id_usuario` =" . utf8_encode($row_id_usuario['id_usuario2']) . "";
                $resultado_usuario = $this->db->mysqli->query($sql);
                $row_usuario = $resultado_usuario->fetch_array(MYSQLI_ASSOC);
                echo '
        <li class="nav-item  ">
            <a href="/docs/3.0/index.html" class="nav-link ">
                <table border="0">
                    <tr>
                        <td><img src="fotos_perfil/' . utf8_encode($row_usuario['foto_perfil']) . '" class="align-content-center img-circle" style="Width: 30px!important; Height: 30px!important; margin-top: 2px;"></td>
                        <td><span class="brand-text font-weight-light">' . utf8_encode($row_usuario['nome']) . '</span></td>
                    </tr>
                </table> 
            </a>
        </li>';
            } else {
                $sql = "SELECT * FROM `usuario` WHERE `id_usuario` =" . utf8_encode($row_id_usuario['id_usuario1']) . "";
                $resultado_usuario = $this->db->mysqli->query($sql);
                $row_usuario = $resultado_usuario->fetch_array(MYSQLI_ASSOC);
                echo '
        <li class="nav-item  ">
            <a href="/docs/3.0/index.html" class="nav-link ">
                <table border="0">
                    <tr>
                        <td><img src="fotos_perfil/' . utf8_encode($row_usuario['foto_perfil']) . '" class="align-content-center img-circle" style="Width: 30px!important; Height: 30px!important; margin-top: 2px;"></td>
                        <td><span class="brand-text font-weight-light">' . utf8_encode($row_usuario['nome']) . '</span></td>
                    </tr>
                </table> 
            </a>
        </li>';
            }
        }
    }
}
