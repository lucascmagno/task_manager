<?php
    include_once(__DIR__ . '/../../Controllers/usuarioController.php');
    $userController = new UsuarioController();

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $nome_usuario = $_POST['nome_usuario'];
        $email_usuario = $_POST['email_usuario'];
        $senha_usuario = $_POST['senha_usuario'];

        $resultado = $userController->inserirUsuario($nome_usuario, $email_usuario, $senha_usuario);

        if ($resultado) {
            header('Location: /src/Views/pages/login.php?cadastro=true');
        } else {
            header('Location: /src/Views/pages/cadastro.php?cadastro=false');
        }
    }
?>