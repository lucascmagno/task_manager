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
        tr, td {
            border: 1px solid black;
        }

        table {
            border-collapse: collapse;
        }

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
    </style>
</head>
<body>
    <h1>Materias List</h1>
    <p>ola <span><?php foreach ($nome_usuario as $nome): ?>
                <?= $nome["nomeusuario"]?>
             <?php endforeach; ?>
            </span>
    </p>
    <?php if (!empty($message)): ?>
        <div class="message <?php echo ($_GET['success'] === 'true') ? 'success' : 'failure'; ?>">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>

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
                        <td><?= $row['idmateria'] ?></td>
                        <td><?= $row['nome_materia'] ?></td>
                        <td><?= $row['data_criacao'] ?></td>
                        <td><?= $row['data_atualizacao'] ?></td>
                        <td><?= $row['usuario_idusuario'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script>
        alert(<?= print_r($message)?>);
    </script>
</body>
</html>
