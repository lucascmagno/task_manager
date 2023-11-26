<?php
require_once(__DIR__ . '/../../Controllers/materiaController.php');
require_once(__DIR__ . '/../../Controllers/usuarioController.php');

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

$controller = new MateriaController(); //Inclusão da classe Materia
$usuarioController = new UsuarioController(); //Inclusão da classe Usuario

$data = $controller->{$action}();

$message = '';
if (isset($_GET['success'])) {
    $message = ($_GET['success'] === 'true') ? "Matéria inserida com sucesso!" : "Falha ao inserir a matéria.";
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
    <h1 class="mt-3">Materias List</h1>
    <p>Olá <span><?= $nome_usuario ?></span></p>

    <?php if (!empty($message)): ?>
        <div class="message <?php echo ($_GET['success'] === 'true') ? 'success' : 'failure'; ?>">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>

    <div class="Container d-flex w-50">
        <ul class="custom-list mt-3">
            <?php foreach ($data as $row): ?>
                <li class="custom-list-item">
                    <h5><?= $row['nome_materia'] ?></h5>
                    <div>
                        <span>Criado em: <?= (new DateTime($row['data_criacao']))->format('d/m/Y H:i:s') ?></span>
                        <span>Atualizado em: <?= (new DateTime($row['data_atualizacao']))->format('d/m/Y H:i:s') ?></span>
                        <!-- Botões Editar e Apagar -->
                        <div class="botoes">
                            <a href="./editarMateria.php?id_materia=<?=$row['idmateria']?>" class="btn btn-primary custom-btn">Editar</a>
                            <button class="btn btn-danger custom-btn" onclick="<?=$controller->deleteMaterialById($row['idmateria'])?>">Apagar</button>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>
