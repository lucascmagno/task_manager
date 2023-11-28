<?php
    include_once '../../Controllers/usuarioController.php';
    $userController = new UsuarioController();
    
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $nome_usuario = $_POST['nome_usuario'];
        $senha_usuario = $_POST['senha_usuario'];
        
        $resultado = $userController->login($nome_usuario, $senha_usuario);
        
        $_SESSION['nome_usuario'] = $nome_usuario;
        if ($resultado) {
            header('Location: /src/Views/pages/materia.php?username=' . $nome_usuario . '&sucesso=true');
        } else {
            header('Location: /src/Views/pages/login.php?sucesso=false');
        }
    }
?>