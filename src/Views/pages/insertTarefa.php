<?php
    require_once(__DIR__ . '/../../Controllers/tarefaController.php');
    $tarefaController = new TarefaController();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Tarefa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</head>
<body>
    <form method="post">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingNome" placeholder="lista de exercício" name="nome_tarefa">
            <label for="floatingNome">Título da Tarefa</label>
        </div>

        <div class="form-floating">
            <textarea class="form-control" id="floatingDescricao" placeholder="Descrição da tarefa" name="descricao_tarefa"></textarea>
            <label for="floatingDescricao">Descrição da Tarefa</label>
        </div>
        <div class="form-floating">
            <input type="datetime-local" class="form-control" id="floatingDescricao" placeholder="Descrição da tarefa" name="tempo_lembrete"></textarea>
            <label for="floatingDescricao">Data de lembrete</label>
        </div>
        <input type="hidden" value="1" name="idmateria">
        <button onclick="<?= $tarefaController->adicionarTarefa()?>" class="btn btn-primary" type="submit">Criar Matéria</button>
    </form>
</body>
</html>