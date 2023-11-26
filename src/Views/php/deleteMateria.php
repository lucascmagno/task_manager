<?php
require_once(__DIR__ . '/../../Controllers/materiaController.php');
session_start();

$materiaController = new MateriaController();

if(isset($_POST['id_materia'])){ // corrigindo o nome do campo
    $id_materia = $_POST['id_materia']; // corrigindo o nome do campo
    $materiaController->deletarMaterialById($id_materia);
    header('Location: ../pages/materia.php?success=true'); // corrigindo a variável na URL
} else {
    header('Location: ../pages/materia.php?success=false'); // corrigindo a variável na URL
}
?>
