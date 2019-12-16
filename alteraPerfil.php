<?php
session_start();
if (!isset($_SESSION["nome"])) {
    header("Location: alteraPerfil.php?erro=1");
}
?>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CHATeado</title>
    <link rel="sortcut icon" href="fotos_perfil/sad.png" type="image/png" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body style="background-color: #343a40;" class="hold-transition lockscreen">
    <div class="lockscreen-wrapper">
        <div class="lockscreen-name"><?php echo $_SESSION['nome']; ?></div>
       <!-- <form method="POST" action="proc_upload.php" enctype="multipart/form-data">
            Imagem: <input name="arquivo" type="file"><br><br>
            Id do Usuario<input id="id_usuario" name="id_usuario" type="text" />
            <input type="submit" value="Cadastrar">

            <form method="POST" action="proc_upload.php" enctype="multipart/form-data">
                Imagem: <input name="arquivo" type="file"><br><br>
                Id do Usuario<input id="id_usuario" name="id_usuario" type="text"/>
                <input type="submit" value="Cadastrar">
            </form>
        </form>-->
        <form method="POST" action="php/proc_upload.php" enctype="multipart/form-data">
            <div class="btn btn-default btn-file" style="background-color: #343a40; margin-left: 37%;">
            <img src="fotos_perfil/<?php echo $_SESSION['foto_perfil']; ?>" class="align-content-center img-circle" style="Width: 80px; Height: 80px; margin-top: 2px;"><input type="file" name="arquivo"></img>
            </div>
            </br>
            <button type="submit" class="btn btn-info btn-flat" style="background-color: #343a40;  margin-left: 32%;">Alterar Foto Perfil</button>
        </form>
        <form action="php/alteraNome.php" method="POST">
            <div class="input-group mb-3">
                <input id="nome" name="nome" type="text" class="form-control rounded-0 font-weight-light!important" style="background-color: #343a40;" placeholder="Novo nome de Usuario">
                <button type="submit" class="btn btn-info btn-flat" style="background-color: #343a40;"> Alterar Nome de Usuario</button>
            </div>
        </form>
        <div class="text-center">
            <a href="Chat.php">Cancelar</a>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>