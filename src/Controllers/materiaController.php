<?php

    require_once(__DIR__ . '/../Models/materia.php');

    class MateriaController{
        private $model;

        function __construct()
        {
            $this->model = new MateriaModel();
        }

        function getAll(){
            $resultData = $this->model->getAll();
            require_once(__DIR__ . '/../Views/pages/materia.php');
            return $resultData;
        }

        function inserirMateria($nome_materia, $idusuario){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Valide os dados conforme necessário
    
                $materiaModel = $this->model->inserirMateria($nome_materia, $idusuario);
                //armazena o resultado da execução do método inserirMateria na variável $ok para ser usado no if abaixo 
                $ok = $materiaModel;
                //verifica se a variável $ok é true ou false
                if($ok){
                    header('Location: ../pages/materia.php?sussesso=true');
                }else{
                    header('Location: ../pages/materia.php?sussesso=false');
                }

                exit();
            }
        }

        function editarMateria($id_materia, $nome_materia){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Valide os dados conforme necessário
    
                $materiaModel = $this->model->editarMateria($id_materia, $nome_materia);
                //armazena o resultado da execução do método inserirMateria na variável $ok para ser usado no if abaixo 
                $ok = $materiaModel;
                //verifica se a variável $ok é true ou false
                if($ok){
                    header('Location: ../pages/materia.php?sussesso=true');
                }else{
                    header('Location: ../pages/materia.php?sussesso=false');
                }

                exit();
            }
        }

        function getMateriaById($id_materia){
            require_once(__DIR__ . '/../Views/pages/materia.php');
            $resultData = $this->model->getMateriaById($id_materia);
            return $resultData;
        }

        function deletarMateriaById($id_materia){
            $resultData = $this->model->deletarMateriaById($id_materia);
            return $resultData;
        }
    }
?>