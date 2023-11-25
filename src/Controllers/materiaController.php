<?php

    require_once(__DIR__ . '/../Models/materia.php');

    class MateriaController{
        private $model;

        function __construct()
        {
            $this->model = new MateriaModel();
        }

        function getAll(){
            $resultData = $this->model->getAll();
            require_once(__DIR__ . '/../Views/pages/materia.php');
            return $resultData;
        }
    }
?>