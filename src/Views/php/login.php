<?php
    include_once '../../Controllers/usuarioController.php';
    $userController = new UsuarioController();
    
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $nome_usuario = $_POST['nome_usuario'];
        $senha_usuario = $_POST['senha_usuario'];
        
        $resultado = $userController->login($nome_usuario, $senha_usuario);
        
        if ($resultado) {
            session_start();
            $dataUser = $userController->getUserByName($nome_usuario);
            
            $idusuario = $dataUser['idusuario'];
            $_SESSION['idusuario'] = $idusuario;
            $_SESSION['nome_usuario'] = $nome_usuario;
            header('Location: /src/Views/pages/materia.php?sucesso=true');   
        } else {
            header('Location: /src/Views/pages/login.php?sucesso=false');
        }
    }
?>