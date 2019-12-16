<?php
$erro = isset($_GET['erro']) ? $_GET['erro'] : 0;
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

<body style="background-color: #343a40;" class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a><b>CHATeado</a>
        </div>

        <div class="card">
            <div style="background-color: #343a40;" class="card-body register-card-body">
                <p class="login-box-msg">Registrar uma nova conta</p>
                <!--script>
                    function confere() {
                        document.getElementById('ck_incluir').disabled = !document.getElementById('ck_permissao').checked;
                    }
                </script-->
                <form method="POST" action="Controler/registra_usuario.php" action="../CHATeado" id=formLogin>
                    <div class="input-group mb-3">
                        <input id="nome" name="nome" style="background-color: #343a40;" type="text" class="form-control" placeholder="Nome Minimo 6 Caracteres" pattern="[A-Za-z]{4,255}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="email" name="email" style="background-color: #343a40;" type="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <?php
                    if ($erro == 1) {
                        echo '<font color = "#FF0000" >O email informado já está vinculado à um usuario!</font>';
                    }
                    ?>
                    <div class="input-group mb-3">
                        <input id="senha" name="senha" style="background-color: #343a40;" type="password" class="form-control" placeholder="Senha Maiuscula, Minuscula, Numero" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,254}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row center">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Cadastrar</button>
                    </div>
                </form>
                <a href="index.php" class="text-center">Login</a>
            </div>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>