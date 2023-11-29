<?php
    $_SESSION['idusuario'] = null;
    $_SESSION['nome_usuario'] = null;
    session_destroy();
    header('Location: /src/Views/pages/login.php?user_logout=true');
?>