<?php
    require_once('../../Controllers/tarefaController.php');
    
    $action = !empty($_GET['a'])? $_GET['a'] : 'getAll';

    $controller = new TarefaController(); // Corrigindo o nome da classe

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
    <h1>Tarefas List</h1>
    <div class="content">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome Tarefa</th>
                    <th>Descricao tarefa</th>
                    <th>Tempo Lembrete</th>
                    <th>Data de Criação</th>
                    <th>Data de Atualização</th>
                    <th>ID do Matéria</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row): ?>
                    <tr>
                        <td><?= $row['idtarefa']?></td>
                        <td><?= $row['nome_tarefa']?></td>
                        <td><?= $row['descricao_tarefa']?></td>
                        <td><?= $row['tempo_lembrete']?></td>
                        <td><?= $row['data_criacao']?></td>
                        <td><?= $row['data_atualizacao']?></td>
                        <td><?= $row['materia_idmateria']?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>