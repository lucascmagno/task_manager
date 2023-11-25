<?php
    require_once(__DIR__ . '/../../Controllers/materiaController.php');
    
    $action = !empty($_GET['a'])? $_GET['a'] : 'getAll';

    $controller = new MateriaController(); // Corrigindo o nome da classe

    $data = $controller->{$action}(); // Obtendo os dados do método correspondente

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materias</title>
    <style>
        tr, td{
            border: 1px solid black;
        }
        table{
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <h1>Materias List</h1>
    <div class="content">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Data de Criação</th>
                    <th>Data de Atualização</th>
                    <th>ID do Usuário</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row): ?>
                    <tr>
                        <td><?= $row['idmateria']?></td>
                        <td><?= $row['nome_materia']?></td>
                        <td><?= $row['data_criacao']?></td>
                        <td><?= $row['data_atualizacao']?></td>
                        <td><?= $row['usuario_idusuario']?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>