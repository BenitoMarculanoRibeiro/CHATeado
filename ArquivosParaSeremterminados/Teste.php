<?php
session_start();
if (!isset($_SESSION["nome"])) {
    header("Location: Teste.php?erro=1");
}
?>
<html>

<body>
    <?php
    echo $_SESSION['nome'];
    ?>
    <br>
    <?php
    echo $_SESSION['id_usuario'];
    ?>
    <br>
    <?php
    echo $_SESSION['email'];
    ?>
</body>

</html>