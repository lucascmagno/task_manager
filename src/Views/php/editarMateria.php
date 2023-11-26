<?php
require_once(__DIR__ . '/../../Controllers/materiaController.php');

$materiaController = new MateriaController();

$id_materia = $_POST['id_materia']; // Alterado para usar $_GET
$nome_materia = $_POST['nome_materia']; // Alterado para usar $_GET

// Obtém os dados
$materiaController->editarMateria($id_materia, $nome_materia);

?>
