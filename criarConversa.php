<?php
session_start();
$id_amigo = isset($_GET['id']) ? $_GET['id'] : 0;
require_once('php/db.class.php');
require_once('php/Usuario.class.php');
require_once('php/criarConversa.php');
$usuario = new Usuario;
$foto = $usuario->retornaFoto($id_amigo);
$nome = $usuario->retornaNome($id_amigo);
echo criarConversa($foto, $nome, $id_amigo, $_SESSION['id_usuario']);
?>