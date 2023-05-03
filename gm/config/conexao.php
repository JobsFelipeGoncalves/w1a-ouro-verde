<?php
    $host = "mysql.fatcred.com.br";
    $usuario = "fatcred";
    $senha = "fatcred101010";
    $banco = "fatcred";
    $porta = "";
    
    $conexao = new PDO("mysql:host=$host;dbname=".$banco, $usuario, $senha);

?>