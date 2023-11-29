<?php
    require_once('../../Controllers/tarefaController.php');
    
    $tarefaController = new TarefaController();

    $idmateria = $_GET['idmateria'];
    //var_dump($idmateria);

    $data = $tarefaController->getTarefaByIdMateria($idmateria);
    //var_dump($data);
    if(isset($_GET['sucesso'])){
        $sucesso = $_GET['sucesso'];
    } else {
        $sucesso = '';
    }
    
    if($sucesso == 'true'){
        echo "<script>alert('Tarefa editada com sucesso!')</script>";
    } elseif($sucesso == 'false'){
        echo "<script>alert('Erro ao editar tarefa!')</script>";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <style>
        .form-container{
            width: 30%;
        }
        .container{
            display: flex;
            margin: auto;
            justify-content: space-evenly;
            flex-wrap: wrap;
        }
    </style>
</head>
<body>
    <a href="./materia.php" class="btn btn-link">< Back</a>
    <div class="text-center">
        <h1 class="mt-3">Tarefas</h1>
    </div>
    <div class="container w-100">
        <?php foreach ($data as $row): ?>
            <form action="../php/editarTarefa.php" method="post" class="card mt-4 form-container">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="nomeTarefa" class="form-label">Nome Tarefa:</label>
                        <input type="text" class="form-control" id="nomeTarefa" name="nome_tarefa" value="<?= $row['nome_tarefa']?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="descricaoTarefa" class="form-label">Descrição Tarefa:</label>
                        <textarea class="form-control" id="descricaoTarefa" name="descricao_tarefa" rows="3" required><?= $row['descricao_tarefa']?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="tempoLembrete" class="form-label">Tempo Lembrete:</label>
                        <input type="datetime-local" class="form-control" id="tempoLembrete" name="tempo_lembrete" value="<?= date('Y-m-d\TH:i', strtotime($row['tempo_lembrete']))?>" required>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <input type="hidden" name="id_tarefa" value="<?= $row['idtarefa']?>">
                    <input type="hidden" name="id_materia" value="<?= $idmateria?>">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a onclick="return confirm('Tem certeza que deseja apagar?')" href="../php/deleteTarefa.php?idtarefa=<?=$row['idtarefa']?>&idmateria=<?=$idmateria?>" class="btn btn-danger">Deletar</a>
                </div>
            </form>
        <?php endforeach; ?>
    </div>

    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AdicionarTarefaModal">
  Adicionar Tarefa Nova
</button>

<!-- Modal -->
<div class="modal fade" id="AdicionarTarefaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar Tarefa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="../php/insertTarefa.php">
            <div class="mb-3">
                <label for="nomeTarefaModal" class="form-label">Nome Tarefa:</label>
                <input type="text" class="form-control" id="nomeTarefaModal" name="nome_tarefa" required>
            </div>
            <div class="mb-3">
                <label for="descricaoTarefaModal" class="form-label">Descrição Tarefa:</label>
                <textarea class="form-control" id="descricaoTarefaModal" name="descricao_tarefa" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="tempoLembreteModal" class="form-label">Tempo Lembrete:</label>
                <input type="datetime-local" class="form-control" id="tempoLembreteModal" name="tempo_lembrete" required>
                <input type="hidden" name="id_materia" value="<?=$idmateria?>">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-outline-primary">Adicionar Tarefa</button>
      </div>
        </form>
    </div>
  </div>
</div>

</body>
</html>
