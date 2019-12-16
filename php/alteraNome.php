<?php
session_start();
require_once('db.class.php');
require_once('Usuario.class.php');
$nome = $_POST['nome'];
$usuario = new Usuario;
$usuario->updateNome($_SESSION['id_usuario'], $nome);
$_SESSION['nome'] = $nome; 
header('Location: ../Chat.php');
