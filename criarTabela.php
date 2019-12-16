<?php
session_start();
require_once('php/Usuario.class.php');
$usuario = new Usuario;


$usuario->criarTabela($_SESSION['id_usuario']); 

?>