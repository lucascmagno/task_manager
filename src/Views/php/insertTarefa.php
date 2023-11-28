<?php
    require_once(__DIR__ . '/../../Controllers/tarefaController.php');
    $tarefaController = new TarefaController();
    
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $nome_tarefa = $_POST['nome_tarefa'];
        $descricao_tarefa = $_POST['descricao_tarefa'];
        $tempo_lembrete = $_POST['tempo_lembrete'];
        $id_materia = $_POST['id_materia'];

        $resultado = $tarefaController->inserirTarefa($nome_tarefa, $descricao_tarefa, $tempo_lembrete, $id_materia);

        if ($resultado) {
            header('Location: /src/Views/pages/tarefas.php?idmateria=' . $id_materia . '&sucesso=true');
        } else {
            header('Location: src/Views/pages/tarefas.php?idmateria=' . $id_materia . '&sucesso=false');
        }
    }

?>