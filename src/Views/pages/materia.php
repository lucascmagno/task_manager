<?php
require_once(__DIR__ . '/../../Controllers/materiaController.php');
require_once(__DIR__ . '/../../Controllers/usuarioController.php');

$materiaController = new MateriaController(); //Inclusão da classe Materia
$usuarioController = new UsuarioController(); //Inclusão da classe Usuario

session_start();

$id_usuario = $_SESSION['idusuario'];

$dataUser = $usuarioController->getUserById($id_usuario);
if($dataUser == null){
    header('Location: ../pages/login.php?materia_cadastro=false');
    exit();
}

$nome_usuario = $dataUser['nome_usuario'];

if(SESSION_STATUS() === PHP_SESSION_NONE){
    header('Location: ../pages/login.php?materia_cadastro=false');
    exit();
}

$data = $materiaController->getAllByIdUser($id_usuario);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materias</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
   
    <style>
        .message {
            margin-top: 20px;
            padding: 10px;
            font-weight: bold;
        }

        .success {
            color: green;
        }

        .failure {
            color: red;
        }

        .custom-list {
            list-style: none;
            padding: 0;
        }

        .custom-list-item {
            border: 1px solid #ddd;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .custom-btn {
            margin-right: 10px;
        }
        .Container{
            margin: auto;
            
        }
        span{
            font-weight: 600;
            font-size: .8rem;
        }

        .botoes{
            display: flex;
            flex-direction: row;
            justify-content: end;
            gap: 10px;
        }
        a:hover{
            text-decoration: none;
            opacity: 0.7;
        }
        h1{
            text-align: center;
        }
        .btn-add-materia{
            display: flex;
            justify-content: end;
            align-items: flex-end;
            align-content: flex-end;
            margin-bottom: 20px;
            margin-right: 40px;
        }
        .btn-add-materia button{
            font-size: 1.2em;
        }
    </style>
</head>
<body>
    <h1 class="mt-3">Matérias</h1>
    <div class="Container">
        <p>Olá <span><?= $nome_usuario ?></span></p>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Menu
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a style="color: red;" class="dropdown-item" href="../php/logout.php">Sair</a></li>
            </ul>
        </div>
    </div>

    <div class="Container w-50">
        <ul class="custom-list mt-3">
            <?php foreach ($data as $row): ?>
                <a class="link-dark link-offset-2 link-underline link-underline-opacity-0" href="./tarefas.php?idmateria=<?=$row['idmateria']?>">
                <li class="custom-list-item">
                    <h5><?= $row['nome_materia'] ?></h5>
                    <div>
                        <span>Criado em: <?= (new DateTime($row['data_criacao']))->format('d/m/Y H:i:s') ?></span>
                        <span>Atualizado em: <?= (new DateTime($row['data_atualizacao']))->format('d/m/Y H:i:s') ?></span>
                        <!-- Botões Editar e Apagar -->
                    </div>
                </li>
                </a>
                <div class="botoes">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Editar" data-id="<?=$row['idmateria']?>">Editar</button>
                    <form method="post" action="../php/deleteMateria.php">
                        <input type="hidden" name="id_materia" value="<?=$row['idmateria']?>">
                         <button type="submit" onclick="return confirm('Tem certeza que deseja apagar?')" class="btn btn-danger custom-btn">Apagar</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </ul>
    </div>

    <!-- Modal Para Editar Uma Materia -->
  
    <div class="modal fade" id="Editar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Matéria</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editarForm" method="post" action="../php/editarMateria.php">
                        <div class="form-floating">
                            <input id="materiaNome" type="text" class="form-control" placeholder="Matemática" name="nome_materia" required>
                            <label for="materiaNome">Nome da Matéria</label>
                        </div>
                        <input id="materiaId" type="hidden" name="id_materia">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-outline-success">Salvar Edição</button>
                </div>
                </form>
            </div>
        </div>
    </div>



    <!-- Modal para Adicionar uma Matéria-->
    <!-- Button trigger modal -->
<div class="fixed-bottom btn-add-materia">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AdicionarMateria">
     <img width="50"  height="50" src="../../../public/assets/icons/plus-circle.svg" alt="">  Adicionar Matéria Nova
    </button>
</div>

<!-- Modal -->
<div class="modal fade" id="AdicionarMateria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar Matéria</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="../php/insertMateria.php">
            <div class="form-floating">
                <input type="text" class="form-control" placeholder="Matemática" id="materiaNome" name="nome_materia" required>
                <label for="materiaNome">Nome da Matéria</label>
            </div>
            
            <input type="hidden" value="<?=$id_usuario?>" name="idusuario" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-outline-primary">Adicionar Matéria</button>
            </div>
      </form>
    </div>
  </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {

    // Adicionar ouvinte de evento para o modal de edição
    var editarModal = new bootstrap.Modal(document.getElementById('Editar'));
    editarModal._element.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var materiaId = button.getAttribute('data-id');

        // Fazer solicitação AJAX usando JavaScript puro
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'listaMateria.php?id=' + materiaId, true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    try {
                        var data = JSON.parse(xhr.responseText);
                        document.getElementById('materiaNome').value = data.nome_materia;
                        document.getElementById('materiaId').value = data.idmateria;
                    } catch (e) {
                        console.error('Erro ao analisar resposta JSON:', e);
                    }
                } else {
                    console.error('Erro ao obter dados da matéria:', xhr.status, xhr.statusText);
                }
            }
        };
        xhr.send();
    });
});

</script>

</body>
</html>
