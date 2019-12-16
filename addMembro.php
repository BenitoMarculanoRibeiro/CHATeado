<?php
session_start();
if (!isset($_SESSION["email"])) {
    header("Location: Chat.php?erro=1");
}
require_once('php/Usuario.class.php');
$grupo = new Grupo;
//$mensagem = new Mensagem;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CHATeado</title>
    <link rel="sortcut icon" href="fotos_perfil/sad.png" type="image/png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="icheck-bootstrap.min.css">
    <link rel="stylesheet" href="adminlte.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body style="background-color: #343a40;" class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a><b>CHATeado</a>
        </div>
        <div class="card">
            <div class="card-body register-card-body" style="background-color: #343a40;">
                <p class="login-box-msg">Adicionar Membro</p>
                <form action="grupoMembros.html" method="post">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" style="background-color: #343a40;" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row center">
                        <button class="btn btn-block btn-primary" onclick="return confirm('Tem certeza que deseja adicionar essa pessoa neste grupo?')">Adicionar</button>
                    </div>
                </form>
                <br>
                <form action="Chat.php">
                    <div class="row center">
                        <button class="btn btn-block btn-primary">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>