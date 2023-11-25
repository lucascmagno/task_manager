<!--Consultas/Regras de negócios-->
<?php

    require_once(__DIR__ . '/../Configuration/connect.php');

    class TarefaModel extends Connect{
        private $table;
        
        function __construct()
        {
            parent::__construct();
            $this->table = 'tarefa';
        }

        function getAll()
        {
            $sqlSelect = $this->connection->query("SELECT * FROM $this->table");
            $resultQuery = $sqlSelect->fetchAll();
            return $resultQuery;
        }

        public function inserirTarefa($nome_tarefa, $descricao_tarefa, $tempo_lembrete, $materia_idmateria) {
            try {
                // Use instruções preparadas para evitar injeção de SQL
                $query = "INSERT INTO tarefa (nome_tarefa, descricao_tarefa, tempo_lembrete, data_criacao, data_atualizacao, materia_idmateria)
                          VALUES (:nome_tarefa, :descricao_tarefa, :tempo_lembrete, NOW(), NOW(), :materia_idmateria)";
                
                $stmt = $this->connection->prepare($query);
    
                // Bind dos parâmetros
                $stmt->bindParam(':nome_tarefa', $nome_tarefa);
                $stmt->bindParam(':descricao_tarefa', $descricao_tarefa);
                $stmt->bindParam(':tempo_lembrete', $tempo_lembrete);
                $stmt->bindParam(':materia_idmateria', $materia_idmateria);
    
                // Execução da consulta
                $stmt->execute();
    
                // Retorna o ID da última inserção, se necessário
                //return $this->connection->lastInsertId();
                return true;    
            } catch (PDOException $e) {
                // Trate exceções aqui (log, exibição de mensagem, etc.)
                echo "Erro: " . $e->getMessage();
                return false;
            }
        }
    }
?>