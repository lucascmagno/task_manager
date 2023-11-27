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

        function adicionarTarefa() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nome_tarefa = $_POST['nome_tarefa'];
                $descricao_tarefa = $_POST['descricao_tarefa'];
                $tempo_lembrete = $_POST['tempo_lembrete'];
                $materia_idmateria = $_POST['idmateria'];
    
                // Valide os dados conforme necessário
    
                $tarefaModel = new TarefaModel();
                $tarefaModel->inserirTarefa($nome_tarefa, $descricao_tarefa, $tempo_lembrete, $materia_idmateria);
               //armazena o resultado da execução do método inserirMateria na variável $ok para ser usado no if abaixo
                $ok = $tarefaModel;
                //verifica se a variável $ok é true ou false
                if($ok){
                    header('Location: ../pages/tarefas.php?sussesso=true');
                }else{
                    header('Location: ../pages/tarefas.php?sussesso=false');
                }
                exit();
            }
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