<?php
    require_once "database.php";

    class CursosDB {
        public function getAllCursos($dbo) {
            $cmd = "SELECT
                cd.id AS cursoid,
                cd.nome AS curso
            FROM
                curso_detalhes AS cd
            ";
            $stm = $dbo -> conn -> prepare($cmd);
            $stm -> execute();
            $rv = $stm -> fetchAll(PDO::FETCH_ASSOC);
            return ($rv);
        }
    }
?>