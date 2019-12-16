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
                <p class="login-box-msg">Faça login para iniciar sua sessão</p>
                <form action="Controler/validar_acesso.php" method="post">
                    <div class="input-group mb-3">
                        <input id="email" name="email" style="background-color: #343a40;" type="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="senha" name="senha" style="background-color: #343a40;" type="password" class="form-control" placeholder="Senha">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row center">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
                    </div>
                </form>
                <?php
                    if (isset($_GET["erro"]) && $_GET["erro"]==1) {
                    echo '<font color = "#FF0000" >Usuario e ou senha invalido(s)';
                    }
                ?>
                <p class="mb-0">
                    <a href="cadastro.php" class="text-center">Cadastre-se</a>
                </p>
            </div>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>