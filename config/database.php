<?php
$server = 'localhost';
$user = 'root';
$password = '';
$db = 'crud';

if (function_exists('mysqli_connect')) {
    $conexao = @mysqli_connect($server, $user, $password, $db);
    if ($conexao) {
        mysqli_set_charset($conexao, "utf8mb4");
    }
} else {
    $conexao = false;
}