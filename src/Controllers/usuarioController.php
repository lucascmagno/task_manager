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

        function inserirUsuario($nome_usuario, $email_usuario, $senha_usuario){
            $resultData = $this->model->inserirUsuario($nome_usuario, $email_usuario, $senha_usuario);
            return $resultData;
        }

        function login($nome_usuario, $senha_usuario){
            $resultData = $this->model->login($nome_usuario, $senha_usuario);
            return $resultData;
        }

        function getUserNameById($idusuario){
            $resultData = $this->model->getUserNameById($idusuario);
            return $resultData;
        }

        function getUserByName($nome_usuario){
            $resultData = $this->model->getUserByName($nome_usuario);
            return $resultData;
        }
    }

?>