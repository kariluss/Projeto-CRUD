<?php
    require_once "database.php";
    require_once "AlunosDB.php";
    require_once "CursosDB.php";

    $dbo = new Database();
    //$pdo = new AlunosDB();
    $cdo = new CursosDB();

    $rv = $cdo -> getAllCursos($dbo);
    print_r($rv);

    /*$rv = $pdo -> getAllAlunos($dbo);
    print_r($rv);
    echo("<br>");
    echo("--------------------------------------------------");
    echo("<br>");

    $rv = $pdo -> getAlunoByCurso($dbo, 1);
    print_r($rv);
    echo("<br>");
    echo("--------------------------------------------------");
    echo("<br>");

    $rv = $pdo -> updateAluno($dbo, 2, "gato", 33, "teste2@teste.com", 8, "Avenida Bairro", 1);
    print_r($rv);
    echo("<br>");
    echo("--------------------------------------------------");
    echo("<br>");

    $rv = $pdo -> getAlunoByCurso($dbo, 1);
    print_r($rv);

    $rv = $pdo -> createNewAluno($dbo, "Catarina Limoeiro", 19, "teste7@teste.com", 1, "Rua Exemplo", 1);
    echo($rv);
    echo("<br>");
    echo("--------------------------------------------------");
    echo("<br>");

    $rv = $pdo -> getAlunoByCurso($dbo, 1);
    print_r($rv);

    $rv = $pdo -> getAllAlunos($dbo);
    print_r($rv);*/
?>