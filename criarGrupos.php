<?php
session_start();
if (!isset($_SESSION["email"])) {
    header("Location: Chat.php?erro=1");
}
require_once('php/Grupo.class.php');
$grupo = new Grupo;
//$mensagem = new Mensagem;
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CHATeado</title>
    <link rel="sortcut icon" href="sad.png" type="image/gif" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="css/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body style="background-color: #343a40;" class="hold-transition register-page">
    <div class="sidebar-dark-primary card card-primary card-outline">
        <form method="POST" action="Controler/registra_grupo.php">
            <br>
            <input id="nomeGrupo" name="nomeGrupo" type="text" style="background-color: #343a40;" class="form-control rounded-0 font-weight-light!important" placeholder="Nome do Grupo">
            <br>
            <button type="submit" class="btn btn-primary btn-block btn-flat">Criar Grupo</button>
        </form>
        <br>
        <form action="Chat.php">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Cancelar</button>
        </form>
    </div>

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>