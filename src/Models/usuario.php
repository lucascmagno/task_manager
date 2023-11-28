<?php
    require_once(__DIR__ . '/../Configuration/connect.php');

    class Usuario extends Connect{
        private $table;

        function __construct()
        {
            parent::__construct();
            $this->table = 'usuario';
        }

        function getAll()
        {
            $sqlSelect = $this->connection->query("SELECT * FROM $this->table");
            $resultQuery = $sqlSelect->fetchAll();
            return $resultQuery;
        }

        public function inserirUsuario($nome_usuario, $email_usuario, $senha_usuario) {
            try {
                // Use instruções preparadas para evitar injeção de SQL
                $query = "INSERT INTO $this->table (nome_usuario, email, senha)
                          VALUES (:nome_usuario, :email_usuario, :senha_usuario)";
                
                $stmt = $this->connection->prepare($query);
    
                // Bind dos parâmetros
                $stmt->bindParam(':nome_usuario', $nome_usuario);
                $stmt->bindParam(':email_usuario', $email_usuario);
                $stmt->bindParam(':senha_usuario', $senha_usuario);
    
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

        function login($nome_usuario, $senha_usuario){
            try {
                $query = "SELECT * FROM $this->table WHERE nome_usuario = :nome_usuario AND senha = :senha_usuario";
                
                $stmt = $this->connection->prepare($query);
    
                // Bind dos parâmetros
                $stmt->bindParam(':nome_usuario', $nome_usuario);
                $stmt->bindParam(':senha_usuario', $senha_usuario);
    
                // Execução da consulta
                $stmt->execute();
    
                // Retorna o resultado da consulta
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
                return true; // Retorna o nome do usuário ou null se não encontrado
            } catch (PDOException $e) {
                // Trate exceções aqui (log, exibição de mensagem, etc.)
                echo "Erro: " . $e->getMessage();
                return false;
            }
        }

        public function getUserNameById($id_usuario)
        {
            try {
                $query = "SELECT nome_usuario FROM $this->table WHERE idusuario = :id_usuario";
                
                $stmt = $this->connection->prepare($query);
    
                // Bind dos parâmetros
                $stmt->bindParam(':id_usuario', $id_usuario);
    
                // Execução da consulta
                $stmt->execute();
    
                // Retorna o resultado da consulta
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
                return $result['nome_usuario'] ?? null; // Retorna o nome do usuário ou null se não encontrado
            } catch (PDOException $e) {
                // Trate exceções aqui (log, exibição de mensagem, etc.)
                echo "Erro: " . $e->getMessage();
                return null;
            }
        
        }

        function getUserById($id_usuario){
            try {
                $query = "SELECT * FROM $this->table WHERE idusuario = :id_usuario";
                
                $stmt = $this->connection->prepare($query);
    
                // Bind dos parâmetros
                $stmt->bindParam(':id_usuario', $id_usuario);
    
                // Execução da consulta
                $stmt->execute();
    
                // Retorna o resultado da consulta
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
                return $result ?? null; // Retorna o nome do usuário ou null se não encontrado
            } catch (PDOException $e) {
                // Trate exceções aqui (log, exibição de mensagem, etc.)
                echo "Erro: " . $e->getMessage();
                return null;
            }
        }

        public function getUserByName($nome_usuario)
        {
            try {
                $query = "SELECT * FROM $this->table WHERE nome_usuario = :nome_usuario";
                
                $stmt = $this->connection->prepare($query);
    
                // Bind dos parâmetros
                $stmt->bindParam(':nome_usuario', $nome_usuario);
    
                // Execução da consulta
                $stmt->execute();
    
                // Retorna o resultado da consulta
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
                return $result ?? null; // Retorna o nome do usuário ou null se não encontrado
            } catch (PDOException $e) {
                // Trate exceções aqui (log, exibição de mensagem, etc.)
                echo "Erro: " . $e->getMessage();
                return null;
            }
        
        }
            
    }

?>