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
require_once('Usuario.class.php');
class Conversa
{
    public $idusuario1;
    public $idusuario2;

    function __construct()
    { }

    function criar($c, $s)
    {
        $this->idusuario1 = $c;
        $this->idusuario2 = $s;
    }

    function salvar()
    {
        $objDb = new db();
        $link = $objDb->conecta_mysql();
        $sql = "INSERT INTO `conversa` (`id_conversa`, `id_usuario1`, `id_usuario2`) VALUES (NULL, '$this->idusuario1', '$this->idusuario2')";
        if (mysqli_query($link, $sql)) {
            header('Location: ../Chat.php?erro=5');
        } else {
            echo "Erro ao registrar o usuário!";
        }
    }

    function deletaConversa($idconversa)
    {
        $objDb = new db();
        $link = $objDb->conecta_mysql();
        $sql = "DELETE FROM `conversa` WHERE `conversa`.`id_conversa` = " . $idconversa . ";";
        if (mysqli_query($link, $sql)) {
            header('Location: ../Chat.php');
        } else {
            echo "Erro ao apagar amigos!<br>" . $sql;
        }
    }

    function getEmail($id)
    {
        $sql = "SELECT * FROM conversa WHERE id_conversa = '$id'";
        $objDb = new db();
        $link = $objDb->conecta_mysql();
        $resultado_id  = mysqli_query($link, $sql);
        $row_proprietario = $resultado_id->fetch_array(MYSQLI_ASSOC);
        echo $row_proprietario['email'];
    }

    function getId($email)
    {
        $sql = "SELECT `id_usuario` FROM `usuario` WHERE `email` = '$email'";
        $objDb = new db();
        $link = $objDb->conecta_mysql();
        $resultado_id  = mysqli_query($link, $sql);
        $row_id_usuario = $resultado_id->fetch_array(MYSQLI_ASSOC);
        return $row_id_usuario['id_usuario'];
    }

    function isMeuId($email)
    {
        $sql = "SELECT `id_usuario` FROM `usuario` WHERE `email` = '$email'";
        $objDb = new db();
        $link = $objDb->conecta_mysql();
        $resultado_id  = mysqli_query($link, $sql);
        $row_id_usuario = $resultado_id->fetch_array(MYSQLI_ASSOC);

        if ($row_id_usuario['id_usuario'] == $_SESSION['id_usuario']) {
            return true;
        } else {
            return false;
        }
    }
    function usuarioExiste($email)
    {
        $objDb = new db();
        $link = $objDb->conecta_mysql();
        $sql = "SELECT `id_usuario` FROM `usuario` WHERE `email` LIKE '$email'";
        $resultado_id  = mysqli_query($link, $sql);
        $row_id_usuario = $resultado_id->fetch_array(MYSQLI_ASSOC);
        //echo $row_id_usuario['id_usuario'];
        $usario = new Usuario;
        $usario->retornaId($_POST['email']);
        if ($usario == '' || $usario == NULL) {
            return false;
        } else {
            return true;
        }
    }

    function idConversa($id, $id_user)
    {
        $objDb = new db();
        $link = $objDb->conecta_mysql();
        $sql = "SELECT `id_conversa` FROM `conversa` WHERE ((`id_usuario2` = '$id' AND `id_usuario1` = " . $id_user . ") OR (`id_usuario1` = '$id' AND `id_usuario2` = " . $id_user . "))";
        $resultado_id  = mysqli_query($link, $sql);
        $row_id_usuario = $resultado_id->fetch_array(MYSQLI_ASSOC);
        return $row_id_usuario['id_conversa'];
    }
    function isMeuAmigo($id)
    {
        $objDb = new db();
        $link = $objDb->conecta_mysql();
        $sql = "SELECT `id_usuario1`,`id_usuario2` FROM `conversa` WHERE ((`id_usuario2` = '$id' AND `id_usuario1` = " . $_SESSION['id_usuario'] . ") OR (`id_usuario1` = '$id' AND `id_usuario2` = " . $_SESSION['id_usuario'] . "))";
        $resultado_id  = mysqli_query($link, $sql);

        return ($resultado_id->num_rows == 0) ? false : true;
    }
}
