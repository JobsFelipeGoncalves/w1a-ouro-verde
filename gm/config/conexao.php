<?php
    $host = "mysql.ouroverdeguindastes.com.br";
    $usuario = "ouroverdeguind";
    $senha = "Ov103456";
    $banco = "ouroverdeguind";
    $porta = "";

    // $host = "localhost";
    // $usuario = "root";
    // $senha = "";
    // $banco = "gm_3";
    // $porta = "";
    
    $conexao = new PDO("mysql:host=$host;dbname=".$banco, $usuario, $senha);

?>