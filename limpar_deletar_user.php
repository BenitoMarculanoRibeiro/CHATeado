<?php
session_start();
$idconversa = isset($_GET['id']) ? $_GET['id'] : 0;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CHATeado</title>
    <link rel="sortcut icon" href="fotos_perfil/sad.png" type="image/png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="css/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="css/adminlte.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body style="background-color: #343a40;" class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a><b>CHATeado</a>
        </div>
        <div class="card">
            <div style="background-color: #343a40;" class="card-body login-card-body">
                <form action="php/deletaconversa.php?id=<?php echo $idconversa ?>" method="POST">
                    <div class="row center">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Desfaser Amizade</button>
                    </div>
                </form>
                <br>
                <form action="php/limparconversa.php?id=<?php echo $idconversa ?>" method="POST">
                    <div class="row center">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Limpar Conversa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>