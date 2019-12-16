<?php
session_start();
require_once('db.class.php');
require_once('Mensagem.class.php');
require_once('Conversa.class.php');
require_once('criarConversa.php');
$conversa = new Conversa;
$idconversa = $conversa->idConversa($_SESSION['id_usuario'], $_POST['id_amigo']);
$texto = $_POST['mensagem'];
$mensagem = new Mensagem;
$mensagem->enviarMensagem($idconversa, $texto, $_POST['id_amigo']);
