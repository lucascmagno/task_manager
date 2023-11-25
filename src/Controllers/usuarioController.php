<?php
    require_once(__DIR__ . '/../Models/usuario.php');

    class UsuarioController{
        private $model;

        function __construct()
        {
            $this->model = new Usuario();
        }

        function getAll(){
            $resultData = $this->model->getAll();
            require_once(__DIR__ . '/../Views/pages/usuario.php');
            return $resultData;
        }

        function adicionarUsuario() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nome_usuario = $_POST['nome_usuario'];
                $email_usuario = $_POST['email_usuario'];
                $senha_usuario = $_POST['senha_usuario'];
    
                // Valide os dados conforme necessário
    
                $usuarioModel = new Usuario();
                $usuarioModel->inserirUsuario($nome_usuario, $email_usuario, $senha_usuario);
                //armazena o resultado da execução do método inserirMateria na variável $ok para ser usado no if abaixo 
                $ok = $usuarioModel;
                //verifica se a variável $ok é true ou false
                if($ok){
                    header('Location: ../pages/usuario.php?sussesso=true');
                }else{
                    header('Location: ../pages/usuario.php?sussesso=false');
                }
    
                exit();
            }
        }

        function login(){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nome_usuario = $_POST['nome_usuario'];
                $senha_usuario = $_POST['senha_usuario'];
    
                // Valide os dados conforme necessário
    
                $usuarioModel = new Usuario();
                $usuarioModel->login($nome_usuario, $senha_usuario);
                //armazena o resultado da execução do método inserirMateria na variável $ok para ser usado no if abaixo 
                $ok = $usuarioModel;
                //verifica se a variável $ok é true ou false
                if($ok){
                    header('Location: ../pages/materia.php?sussesso=true');
                }else{
                    header('Location: ../pages/login.php?sussesso=false');
                }
    
                exit();
            }
        }

        function getUserNameById($idusuario){
            $resultData = $this->model->getUserNameById($idusuario);
            return $resultData;
        }
    }

?>