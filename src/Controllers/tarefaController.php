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

        function inserirTarefa($nome_tarefa, $descricao_tarefa, $tempo_lembrete, $materia_idmateria){
            $resultData = $this->model->inserirTarefa($nome_tarefa, $descricao_tarefa, $tempo_lembrete, $materia_idmateria);
            return $resultData;
        }

        public function updateTarefa($id_tarefa, $nome_tarefa, $descricao_tarefa, $tempo_lembrete){
            $resultData = $this->model->updateTarefa($id_tarefa, $nome_tarefa, $descricao_tarefa, $tempo_lembrete);
            return $resultData;
        }

        public function deleteTarefa($id_tarefa){
            $resultData = $this->model->deleteTarefa($id_tarefa);
            return $resultData;
        }

        public function getTarefaByIdMateria($id_materia){
            require_once(__DIR__ . '/../Views/pages/tarefas.php');
            $resultData = $this->model->getTarefaByIdMateria($id_materia);
            return $resultData;
        }
    }
?>