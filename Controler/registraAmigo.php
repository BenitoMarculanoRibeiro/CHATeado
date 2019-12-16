<?php
session_start();
if (!isset($_SESSION["email"])) {
    header("Location: ../Chat.php");
}
require_once('../php/db.class.php');
require_once('../php/Conversa.class.php');
require_once('../php/Usuario.class.php');
$objDb = new db();
$link = $objDb->conecta_mysql();
$conversa = new Conversa();
$idusuario1 = $conversa->getId($_POST['email']);
$idusuario2 = $_SESSION['id_usuario'];
$usuario = new Usuario;
if (!$usuario->retornaId($_POST['email'])) {
    if (!$conversa->isMeuId($_POST['email'])) {
        if (!$conversa->isMeuAmigo($conversa->getId($_POST['email']))) {
            $conversa->criar($idusuario1, $idusuario2);
            $conversa->salvar();
        } else {
            header('Location: ../addAmigo.php?erro=2');
        }
    } else {
        header('Location: ../addAmigo.php?erro=1');
    }
} else {
    header('Location: ../addAmigo.php?erro=3');
}
