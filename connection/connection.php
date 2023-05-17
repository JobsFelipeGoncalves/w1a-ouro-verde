<?php
    // $host = "localhost";
    // $usuario = "root";
    // $senha = "";
    // $banco = "gm_3";
    // $porta = "";

    $host = "mysql.ouroverdeguindastes.com.br";
    $usuario = "ouroverdeguind";
    $senha = "Ov103456";
    $banco = "ouroverdeguind";
    $porta = "";
    
    $conexao = new PDO("mysql:host=$host;dbname=".$banco, $usuario, $senha);

?>