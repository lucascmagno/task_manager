<?
    include_once '../../Controllers/TarefaController.php';
    $tarefaController = new TarefaController();
    $tarefaController->deleteTarefa($_GET['id']);
    header('Location: ../../Views/php/tarefas.php');
?>