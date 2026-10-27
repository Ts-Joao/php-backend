<?php
$server = 'localhost';
$user = 'root';
$password = '';
$db = 'crud';

$conexao = mysqli_connect($server, $user, $password, $db);

if (!$conexao) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

mysqli_set_charset($conexao, "utf8mb4");