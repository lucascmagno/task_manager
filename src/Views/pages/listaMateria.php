<?php
require_once(__DIR__ . '/../../Controllers/materiaController.php');

$materiaController = new MateriaController();

$id_materia = $_GET['id_materia'];

// Obtém os dados
$data = $materiaController->getMateriaById($id_materia);

if(isset($_GET['id_materia'])){ // corrigindo o nome do campo
    $id_materia = $_GET['id_materia'];

    $dados_materia = $materiaController->getMateriaById($id_materia);
    echo json_encode($dados_materia);
    header('Location: ../pages/materia.php?success=true'); // corrigindo a variável na URL
} else {
    echo json_encode(array('error' => 'ID da matéria não fornecido.'));
    header('Location: ../pages/materia.php?success=false'); // corrigindo a variável na URL
}
?>
