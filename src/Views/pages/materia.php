<?php
require_once(__DIR__ . '/../../Controllers/materiaController.php');
require_once(__DIR__ . '/../../Controllers/usuarioController.php');

$controller = new MateriaController(); //Inclusão da classe Materia
$usuarioController = new UsuarioController(); //Inclusão da classe Usuario

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $materiaController->adicionarMateria();
}

// Inicia a sessão para verificar se o usuário está logado antes de acessar a página de matérias
session_start();
// Verifica se o usuário está autenticado antes de acessar o ID
/*
if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
    $id_usuario = $_SESSION['user_id'];
    // Restante do código
} else {
    // Redireciona ou executa outra lógica para usuários não autenticados
    $_SESSION['message'] = 'Você precisa fazer login para acessar esta página.';
    header('Location: ./materia.php');
    exit();
}
*/
$action = !empty($_GET['a']) ? $_GET['a'] : 'getAll';


$data = $controller->{$action}();

$message = '';
if (isset($_GET['success'])) {
    $message = ($_GET['success'] === 'true') ? "Sucesso!" : "Error!";
}

// Obtém o nome do usuário logado
$id_usuario = 1;
$nome_usuario = $usuarioController->getUserNameById($id_usuario);

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
        }
    </style>
</head>
<body>
    <h1 class="mt-3">Ma</h1>
    <p>Olá <span><?= $nome_usuario ?></span></p>

    <?php if (!empty($message)): ?>
            <script>alert('<?php echo $message; ?>')</script>
    <?php endif; ?>

    <div class="Container w-50">
        <ul class="custom-list mt-3">
            <?php foreach ($data as $row): ?>
                <li class="custom-list-item">
                    <h5><?= $row['nome_materia'] ?></h5>
                    <div>
                        <span>Criado em: <?= (new DateTime($row['data_criacao']))->format('d/m/Y H:i:s') ?></span>
                        <span>Atualizado em: <?= (new DateTime($row['data_atualizacao']))->format('d/m/Y H:i:s') ?></span>
                        <!-- Botões Editar e Apagar -->
                        <div class="botoes">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Editar" data-id="<?=$row['idmateria']?>">Editar</button>

                            <form method="post" action="../php/deleteMateria.php">
                                <input type="hidden" name="id_materia" value="<?=$row['idmateria']?>">
                                 <button type="submit" onclick="return confirm('Tem certeza que deseja apagar?')" class="btn btn-danger custom-btn">Apagar</button>
                            </form>
                        </div>
                    </div>
                </li>
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
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AdicionarMateria">
  Adicionar Matéria Nova
</button>

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
            
            <input type="hidden" value="1" name="idusuario" required>
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
    var editarModal = new bootstrap.Modal(document.getElementById('Editar'));

    // Adiciona um ouvinte de evento quando o modal de edição é exibido
    editarModal._element.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget; // Botão que acionou o modal
        var materiaId = button.getAttribute('data-id'); // Obtém o ID da matéria do botão

        // Faz a solicitação AJAX para obter os detalhes da matéria com base no ID
        $.ajax({
            url: 'listaMateria.php',
            type: 'GET',
            data: { id: materiaId },
            dataType: 'json',
            success: function (data) {
                // Preenche os campos do formulário no modal com os dados recebidos
                document.getElementById('materiaNome').value = data.nome_materia;
                document.getElementById('materiaId').value = data.idmateria;
            },
            error: function (xhr, status, error) {
                console.error('Erro ao obter dados da matéria:', status, error);
                // Adicione aqui a lógica para lidar com erros, se necessário
            }
        });
    });
});

</script>
</body>
</html>
