<?php
include_once '../../Controllers/TarefaController.php';
include_once '../../Controllers/materiaController.php';

$tarefaController = new TarefaController();
$materiaController = new MateriaController();

$id_tarefa = $_POST['id_tarefa'];
$nome_tarefa = $_POST['nome_tarefa'];
$descricao_tarefa = $_POST['descricao_tarefa'];
$tempo_lembrete = $_POST['tempo_lembrete'];
$id_materia = $_POST['id_materia'];

// Certifique-se de que o método updateTarefa existe no seu controlador
$resultado = $tarefaController->updateTarefa($id_tarefa, $nome_tarefa, $descricao_tarefa, $tempo_lembrete);


if ($resultado) {
    header('Location: ../../Views/pages/tarefas.php?idmateria=' . $id_materia . '&sucesso=true');
} else {
    header('Location: ../../Views/pages/tarefas.php?idmateria=' . $id_materia . '&sucesso=false');
}

exit();
?>
