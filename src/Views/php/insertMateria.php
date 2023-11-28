<?php
require_once(__DIR__ . '/../../Controllers/materiaController.php');

$materiaController = new MateriaController();

if(isset($_POST['nome_materia'])){ // corrigindo o nome do campo
    $nome_materia = $_POST['nome_materia']; // corrigindo o nome do campo
    $idusuario = $_POST['idusuario'];
    $materiaController->inserirMateria($nome_materia, $idusuario);
    header('Location: ../pages/materia.php?success=true'); // corrigindo a variável na URL
} else {
    header('Location: ../pages/materia.php?success=false'); // corrigindo a variável na URL
}

?>
