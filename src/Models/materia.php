<!--Consultas/Regras de negócios-->
<?php

    require_once(__DIR__ . '/../Configuration/connect.php');
    class MateriaModel extends Connect{
        private $table;

        function __construct()
        {
            parent::__construct();
            $this->table = 'materia';
        }

        function getAll()
        {
            $sqlSelect = $this->connection->query("SELECT * FROM $this->table");
            $resultQuery = $sqlSelect->fetchAll();
            return $resultQuery;
        }

        public function inserirMateria($nome_materia, $idusuario) {
            try {
                // Use instruções preparadas para evitar injeção de SQL
                $query = "INSERT INTO $this->table (nome_materia, data_criacao, data_atualizacao, usuario_idusuario)
                          VALUES (:nome_materia, NOW(), NOW(), :idusuario)";
                
                $stmt = $this->connection->prepare($query);
    
                // Bind dos parâmetros
                $stmt->bindParam(':nome_materia', $nome_materia);
                $stmt->bindParam(':idusuario', $idusuario);
    
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