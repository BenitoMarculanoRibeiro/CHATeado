<?php
session_start();
if (!isset($_SESSION["email"])) {
    header("Location: Chat.php?erro=1");
}
require_once('php/Usuario.class.php');
$usuario = new Usuario;
$erro = isset($_GET['erro']) ? $_GET['erro'] : 0;
?>

<!DOCTYPE html>
<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        window.onload = function() {
            <?php
            if ($erro == 5) {
                echo 'notifique();';
            }
            ?>
        }

        function notifique() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 2000
            })
            Toast.fire({
                type: 'success',
                title: 'Amigo Adicionado Com Sucesso'
            })
        }
    </script>
    <script>
        $(document).ready(function() {
            setInterval(function() {
                $.post("criarTabela.php?" + new Date().getTime(), {
                        id_usuario: "2",
                    },
                    function(data) {
                        $("#setTime").html(data);
                    });
            }, 1000);
        });
    </script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CHATeado</title>
    <link rel="sortcut icon" href="fotos_perfil/sad.png" type="image/png" />
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/adminlte.min.css">
    <link rel="stylesheet" href="css/demo.css">
    <link rel="stylesheet" href="scss/estilos.scss">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="adminlte.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body style="background-color: #343a40; margin-top: 15%;" class="sidebar-dark-primary">
    <div class="main-header">
        <section class="sidebar-dark-primary">
            <div class="col-md-12 sidebar-dark-primary">
                <h2 class="text-center sidebar-dark-primary" style="color: #c2c7d0!important; font-size: 100px;">Chateado?<br> Inicie um Chat!</h2>
            </div>
        </section>
    </div>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <nav class="mt-2">
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="alteraPerfil.php" class="nav-link">
                        <table border="0">
                            <tr>
                                <td><img src="fotos_perfil/<?php echo $_SESSION['foto_perfil']; ?>" class="align-content-center img-circle" style="Width: 80px; Height: 80px; margin-top: 2px;"></td>
                                <td><span class="brand-text font-weight-light"><?php echo $_SESSION['nome']; ?></span></td>
                            </tr>
                        </table>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="dropdown-divider"></div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Opções
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="addAmigo.php" class="nav-link">
                                <i class="fas fa-users" style="color: gray"> Adicionar Amigo</i>
                            </a>
                        </li>
                        <!--li class="nav-item">
                            <div class="dropdown-divider"></div>
                            <a href="criarGrupos.php" class="nav-link">
                                <i class="fas fa-users" style="color: gray"> Criar grupos</i>
                            </a>
                        </li-->
                        <li class="nav-item">
                            <div class="dropdown-divider"></div>
                            <a href="sair.php" class="nav-link">
                                <i class="fas fa-users" style="color: gray"> Sair</i>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div class="dropdown-divider"></div>
        <div id="testeF" class="sidebar os-host os-theme-light os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition os-host-overflow os-host-overflow-y" style="height:480px!important;">
            <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
                <div class="os-scrollbar-track">
                    <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div>
                </div>
            </div>
            <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">
                <div class="os-scrollbar-track">
                    <div class="os-scrollbar-handle" style="height: 68.6927%; transform: translate(0px, 0px);"></div>
                </div>
            </div>
            <div class="os-scrollbar-corner"></div>
            <div class="os-resize-observer-host">
                <div class="os-resize-observer observed" style="left: 0px; right: auto;"></div>
            </div>
            <div class="os-size-auto-observer" style="height: calc(100% + 1px); float: left;">
                <div class="os-resize-observer observed"></div>
            </div>

            <div class="os-padding" style="height:80%!important;">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu">
                        <div id="setTime"><?php $usuario->criarTabela($_SESSION['id_usuario']); ?></div>
                    </ul>
                </nav>
            </div>
        </div>
    </aside>
    <script src="sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/adminlte.min.js"></script>
    <script src="OverlayScrollbars.min.js"></script>
    <script src="OverlayScrollbars.js"></script>
    <script src="demo.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</body>

</html>