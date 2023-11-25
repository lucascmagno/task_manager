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
    }
?>