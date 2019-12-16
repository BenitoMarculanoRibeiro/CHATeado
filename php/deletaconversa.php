<?php
session_start();
$idconversa = isset($_GET['id']) ? $_GET['id'] : 0;
require_once('db.class.php');
require_once('Conversa.class.php');
require_once('Mensagem.class.php');
$mensagem = new Mensagem;
$mensagem->limpaMensagens($idconversa);
$conversa = new Conversa;
$conversa->deletaConversa($idconversa);
