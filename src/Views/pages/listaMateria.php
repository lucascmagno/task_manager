<?php
// listaMateria.php
require_once(__DIR__ . '/../../Controllers/materiaController.php');

// Verifica se a requisição é do tipo GET e se o parâmetro 'id' está presente
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id_materia = $_GET['id'];

    // Cria uma instância da classe MateriaController
    $materiaController = new MateriaController();

    // Obtém os detalhes da matéria pelo ID
    $detalhesMateria = $materiaController->getMateriaById($id_materia);

    // Verifica se os detalhes foram obtidos com sucesso
    if ($detalhesMateria !== null) {
        // Retorna os detalhes em formato JSON
        header('Content-Type: application/json');
        echo json_encode($detalhesMateria);
    } else {
        // Retorna uma resposta de erro em formato JSON (pode ser ajustada conforme necessário)
        header('Content-Type: application/json');
        http_response_code(500); // Código HTTP 500 - Internal Server Error
        echo json_encode(['error' => 'Erro ao obter detalhes da matéria.']);
    }
} else {
    // Retorna uma resposta de erro em formato JSON se a requisição não for válida
    header('Content-Type: application/json');
    http_response_code(400); // Código HTTP 400 - Bad Request
    echo json_encode(['error' => 'Requisição inválida.']);
}
?>
