<?php
    $host = "mysql.ouroverdeguindastes.com.br";
    $usuario = "ouroverdeguind";
    $senha = "fatcred101010";
    $banco = "Ov103456";
    $porta = "";

    // $host = "localhost";
    // $usuario = "root";
    // $senha = "";
    // $banco = "gm_3";
    // $porta = "";
    
    $conexao = new PDO("mysql:host=$host;dbname=".$banco, $usuario, $senha);

?>