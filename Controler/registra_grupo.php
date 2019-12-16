<?php
    session_start();
    if (!isset($_SESSION["email"])) {
        header("Location: ../Chat.php");
    }
    require_once('../php/db.class.php');
    require_once('../php/Grupo.class.php');
    $nome_grupo = $_POST['nomeGrupo'];
    $id_usuario =  $_SESSION['id_usuario'];
    $objDb = new db();
    $link = $objDb->conecta_mysql();
    $grupo = new Grupo;
    $grupo->criar($id_usuario, $nome_grupo);
    header($grupo->salvar());
?>