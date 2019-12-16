<?php
if (!class_exists('Database')) {
    require('Database.class.php');
}

class Grupo
{
    public $idgrupo;
    public $idautor;
    public $nome_grupo;
    public $fotogrupo;

    function __construct()
    { }

    function criar($a, $n)
    {
        $this->idautor = $a;
        $this->nome_grupo = $n;
    }

    function salvar()
    {
        $objDb = new db();
        $link = $objDb->conecta_mysql();
        $sql = "INSERT INTO `grupo` (`id_grupo`, `id_autor`, `nome_grupo`, `foto_grupo`) VALUES (NULL, '$this->idautor', '$this->nome_grupo', 'sad.png');";
        $stmt = mysqli_query($link, $sql);
        $id_grupo = mysqli_insert_id($link);
        $sql = "INSERT INTO `membro_grupo` (`id_grupo`, `id_membro`) VALUES ('$id_grupo', '$this->idautor');";
        $stmt = mysqli_query($link, $sql);
        if ($stmt) {
            return ('Location: ../Chat.php');
        } else {
            echo "Erro ao registrar o usuário!";
        }
    }

    function criarGrupo($nome_grupo)
    {
        $id_usuario =  $_SESSION['id_usuario'];
        $objDb = new db();
        $link = $objDb->conecta_mysql();
        $sql = "INSERT INTO `grupo` (`id_grupo`, `id_autor`, `nome_grupo`, `foto_grupo`) VALUES (NULL, '$id_usuario', '$nome_grupo', NULL);";
        header('Location: Chat.php?');
    }
    
    function addMembro($id_grupo, $id_usuario)
    {
        $id_usuario =  $_SESSION['id_usuario'];
        $objDb = new db();
        $link = $objDb->conecta_mysql();
        $sql = "INSERT INTO `grupo` (`id_grupo`, `id_autor`, `nome_grupo`, `foto_grupo`) VALUES (NULL, '$id_usuario', '$id_grupo', NULL);";
        header('Location: Chat.php?');
    }
}
