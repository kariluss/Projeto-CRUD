<?php
    require_once "database.php";
    $dbo = new Database(); //objeto de conexão com a database

    //executando os comados SQL
    $cmd = "SELECT * FROM aluno_detalhes"; //versão string do comando
    $stm = $dbo -> conn -> prepare($cmd); //comando preparado
    $stm -> execute(); //executa o comando
    $rv = $stm -> fetchAll(PDO::FETCH_ASSOC); //pega os resultados
    print_r($rv); // mostra os resultados
?>