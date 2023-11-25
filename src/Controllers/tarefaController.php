<?php

    require_once(__DIR__ . '/../Models/tarefa.php');

    class TarefaController{
        private $model;

        function __construct()
        {
            $this->model = new TarefaModel();
        }

        function getAll(){
            $resultData = $this->model->getAll();
            require_once(__DIR__ . '/../Views/pages/tarefas.php');
            return $resultData;
        }
    }
?>