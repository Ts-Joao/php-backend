<?php
$server = 'localhost';
$user = 'root';
$password = '';
$db = 'crud';

$conexao = mysqli_connect($server, $user, $password, $db);

if (!$conexao) {
    die("Falha na conexão: " . mysqli_connect_error());
}

echo "Conectado com sucesso!";