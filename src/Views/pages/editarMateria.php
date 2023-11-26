<?php
require_once(__DIR__ . '/../../Controllers/materiaController.php');

$materiaController = new MateriaController();

$id_materia = $_GET['id_materia'];

// Obtém os dados
$data = $materiaController->getMateriaById($id_materia);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <title>Editar Matéria</title>
</head>
<body>
    <form method="post" action="">
        <div class="form-floating">
            <input value="<?= $data['nome_materia'] ?>" type="text" class="form-control" placeholder="Matemática" id="materiaNome" name="nome_materia" required>
            <label for="materiaNome">Nome da Matéria</label>
        </div>
            <input type="hidden" value="<?=$data['idmateria']?>" name="id_materia">
        <button class="btn btn-primary" type="submit" onclick="<?=$materiaController->editarMateria()?>">Editar Matéria</button>
    </form>
</body>
</html>
