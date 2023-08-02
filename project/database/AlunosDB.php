<?php
    require_once "database.php";

    class AlunosDB {
        public function getAllAlunos($dbo) {
            $cmd = "SELECT
                ad.id AS alunoid,
                ad.nome AS nome,
                ad.idade AS idade,
                ad.semestre AS semestre,
                ad.email AS email,
                ad.endereço AS endereço,
                ad.curso_id AS cursoid,
                cd.nome AS curso
            FROM
                aluno_detalhes AS ad,
                curso_detalhes AS cd
            WHERE
                ad.curso_id = cd.id";
            $stm = $dbo -> conn -> prepare($cmd);
            $stm -> execute();
            $rv = $stm -> fetchAll(PDO::FETCH_ASSOC);
            return ($rv);
        }

        public function getAlunoByID($dbo, $id){
            $cmd = "SELECT
                ad.id AS alunoid,
                ad.nome AS nome,
                ad.idade AS idade,
                ad.semestre AS semestre,
                ad.email AS email,
                ad.endereço AS endereço,
                ad.curso_id AS cursoid,
                cd.nome AS curso
            FROM
                aluno_detalhes AS ad,
                curso_detalhes AS cd
            WHERE
                ad.curso_id = cd.id
            AND
                ad.id=:id";
            $stm = $dbo -> conn -> prepare($cmd);
            $stm -> execute([":id"=>$id]);
            $rv = $stm -> fetchAll(PDO::FETCH_ASSOC);
            return ($rv);
        }

        public function getAlunoByCurso($dbo, $cid){
            $cmd = "SELECT
                ad.id AS alunoid,
                ad.nome AS nome,
                ad.idade AS idade,
                ad.semestre AS semestre,
                ad.email AS email,
                ad.endereço AS endereço,
                ad.curso_id AS cursoid,
                cd.nome AS curso
            FROM
                aluno_detalhes AS ad,
                curso_detalhes AS cd
            WHERE
                ad.curso_id = cd.id
            AND
                ad.curso_id=:cid";
            $stm = $dbo -> conn -> prepare($cmd);
            $stm -> execute([":cid"=>$cid]);
            $rv = $stm -> fetchAll(PDO::FETCH_ASSOC);
            return ($rv);
        }

        public function createNewAluno($dbo, $nome, $idade, $email, $semestre, $end, $cursoid) {
            $cmd = "INSERT INTO aluno_detalhes(
                nome,
                idade,
                semestre,
                email,
                endereço,
                curso_id
            )
            VALUES(
                :nome,
                :idade,
                :semestre,
                :email,
                :endereco,
                :curso_id
            )";

            $stm = $dbo -> conn -> prepare($cmd);

            try {
                $stm -> execute([
                    ":nome" => $nome,
                    ":idade" => $idade,
                    ":semestre" => $semestre,
                    ":email" => $email,
                    ":endereco" => $end,
                    ":curso_id" => $cursoid,
                ]);
                return 1;
            } catch(Exception $ee) {
                return 0;
            }
        }

        public function updateAluno($dbo, $id, $nome, $idade, $email, $semestre, $end, $cursoid){
            $cmd = "UPDATE
                aluno_detalhes
            SET
                nome = :nome,
                idade = :idade,
                email = :email,
                semestre = :semestre,
                endereço = :endereco,
                curso_id = :cursoid
            WHERE
                id = :id
            ";

            $stm = $dbo -> conn -> prepare($cmd);

            try{
                $stm -> execute([
                    ":nome" => $nome,
                    ":idade" => $idade,
                    ":email" => $email,
                    ":semestre" => $semestre,
                    ":endereco" => $end,
                    ":cursoid" => $cursoid,
                    ":id" => $id,
                ]);
                return 1;
            } catch(Exception $ee){
                return 0;
            }
        }

        public function removeAluno($dbo, $id){
            $cmd = "DELETE 
            FROM
                aluno_detalhes
            WHERE
                id = :id
            ";

            $stm = $dbo -> conn -> prepare($cmd);

            try{
                $stm -> execute([
                    ":id" => $id,
                ]);
                return 1;
            } catch(Exception $ee){
                return 0;
            }
        }
    }
?>