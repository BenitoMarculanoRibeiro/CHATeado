<?php
$erro = isset($_GET['erro']) ? $_GET['erro'] : 0;
session_start();
if (!isset($_SESSION["email"])) {
    header("Location: Chat.php");
}
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
    <link rel="stylesheet" href="css/adminlte.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body style="background-color: #343a40;" class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a><b>CHATeado</a>
        </div>
        <div class="card">
            <div class="card-body register-card-body" style="background-color: #343a40;">
                <p class="login-box-msg">Adicionar Amigo</p>
                <form method="POST" action="Controler/registraAmigo.php" action="../CHATeado" id=formLogin>
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" style="background-color: #343a40;" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <?php
                    if ($erro == 1) {
                        echo '<font color = "#FF0000" >O email informado é o seu, portanto não pode ser feita a amizade!</font>';
                    } elseif ($erro == 2) {
                        echo '<font color = "#FF0000" >O usuario já é seu amigo!</font>';
                    } elseif ($erro == 3) {
                        echo '<font color = "#FF0000" >O usuario não existe!</font>';
                    }
                    ?>
                    <div class="row center">
                        <button class="btn btn-block btn-primary">Adicionar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>
