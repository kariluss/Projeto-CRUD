<?php
    require_once "database.php";
    $dbo = new Database(); //objeto de conexão com a database

    //cmd de insert
    $nm = 'Psicologia';
    $cmd = "INSERT INTO curso_detalhes (nome) VALUES (:nomex)";
    $stm = $dbo -> conn -> prepare($cmd);

    try {
        $stm -> execute([":nomex"=>$nm]);
    } catch(Exception $ee) {
        echo ($ee -> getMessage()."<br>");
    } // tratamento de erro
    
    //cmd de mostrar
    $cmd = "SELECT nome FROM curso_detalhes";
    $stm = $dbo -> conn -> prepare($cmd);
    $stm -> execute();
    $rv = $stm -> fetchAll(PDO::FETCH_ASSOC);
    print_r($rv);
?>