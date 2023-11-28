<?php
    include_once(__DIR__ . '/../../Controllers/tarefaController.php');
    $tarefaController = new TarefaController();
    $id_tarefa = $_GET['idtarefa'];
    $id_materia = $_GET['idmateria'];

    $resultado = $tarefaController->deleteTarefa($id_tarefa);
    if ($resultado) {
        header('Location: /src/Views/pages/tarefas.php?idmateria=' . $id_materia . '&sucesso=true');
    } else {
        header('Location: /src/Views/pages/tarefas.php?idmateria=' . $id_materia . '&sucesso=false');
    }
?>