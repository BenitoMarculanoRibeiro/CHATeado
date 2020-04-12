<?php
session_start();
$id_amigo = isset($_GET['id']) ? $_GET['id'] : 0;
if (!isset($_SESSION["email"])) {
    header("Location: Chat.php?erro=1");
}
require_once('php/db.class.php');
require_once('php/Usuario.class.php');
require_once('php/criarConversa.php');
$usuario = new Usuario;
//$mensagem = new Mensagem;
?>

<!DOCTYPE html>
<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            setInterval(function() {
                $.post("criarTabela.php?", {
                        id_usuario: "2",
                    },
                    function(data) {
                        $("#setTimeAmigos").html(data);
                        //console.log(data);
                    });
            }, 1000);
        });
        $(document).ready(function() {
            setInterval(function() {
                $.post("criarConversa.php?id=" + '<?php echo $id_amigo ?>', {},
                    function(data) {
                        $("#setTimeConversa").html(data);
                        //console.log(data);
                    });
            }, 1000);
        });

        toastr["success"]("Nova amizade", "Notificação")

        toastr.options = {
            "closeButton": false,
            "debug": false,
            "latestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CHATeado</title>
    <link href="css/toastr.css" rel="stylesheet" />
    <link rel="sortcut icon" href="fotos_perfil/sad.png" type="image/png" />
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/demo.css">
    <link rel="stylesheet" href="scss/estilos.scss">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="css/adminlte.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body style="background-color: #343a40;" class="hold-transition sidebar-dark-primary">
    <div class="main-header">
        <section class="content sidebar-dark-primary">
            <div class="container-fluid ">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-prirary cardutline direct-chat direct-chat-primary">
                            <?php
                            $foto = $usuario->retornaFoto($id_amigo);
                            $nome = $usuario->retornaNome($id_amigo);
                            echo criarCabecalho($foto, $nome, $id_amigo, $_SESSION['id_usuario']);
                            ?>
                            <div id="setTimeConversa" class="sidebar-dark-primary direct-chat-messages" style="height:10%!important;" style="position:fixed!important;">
                                <?php
                                echo criarConversa($foto, $nome, $id_amigo, $_SESSION['id_usuario']);
                                ?>
                            </div>
                            <div class="card-footer sidebar-dark-primary">
                                <div class="dropdown-divider"></div>
                                <form action="php/EnviaMensagem.php" method="POST">
                                    <div class="input-group">
                                        <input type="text" id="mensagem" name="mensagem" placeholder="Mensagem ..." class="form-control">
                                        <span class="input-group-append">
                                            <input type="hidden" id="id_amigo" name="id_amigo" value="<?php echo $id_amigo ?>">
                                            <button type="submit" class="btn btn-primary">Enviar</button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
                        <div id="setTimeAmigos"><?php $usuario->criarTabela($_SESSION['id_usuario']); ?></div>
                    </ul>
                </nav>
            </div>
        </div>
    </aside>
    <script src="js/toastr.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/adminlte.min.js"></script>
    <script src="js/OverlayScrollbars.min.js"></script>
    <script src="js/OverlayScrollbars.js"></script>
    <script src="js/demo.js"></script>
</body>

</html>