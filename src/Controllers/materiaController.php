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

        function adicionarMateria() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nome_materia = $_POST['nome_materia'];
                $idusuario = $_POST['idusuario'];
    
                // Valide os dados conforme necessário
    
                $materiaModel = new MateriaModel();
                $materiaModel->inserirMateria($nome_materia, $idusuario);
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
    }
?>