<?php
    require_once('../php/db.class.php');
    require_once('../php/Usuario.class.php');
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);
    $objDb = new db();
    $link = $objDb->conecta_mysql();
    $pessoa = new Usuario();
    if ($pessoa->retornaId($_POST['email'])) {
        $pessoa->criar($nome, $email , $senha);
        $pessoa->salvar();
    }else{
        header('Location: ../cadastro.php?erro=1');
    }
    
?>