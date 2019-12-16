<?php
    session_destroy();
    unset($_SESSION['id_usuario']);
    $_SESSION['id_usuario'] = null;
    header('Location: index.php');
    session_commit();
?>