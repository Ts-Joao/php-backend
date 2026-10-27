<?php
require_once __DIR__ . "/../config/database.php";

function inserir_funcionario($nome, $setor, $salario) {
    global $conexao;
    if (!$conexao) {
        return false;
    }
    $sql = "INSERT INTO funcionarios (nome, setor, salario) VALUES ('$nome', '$setor', $salario)";
    $resultado = mysqli_query($conexao, $sql);
    
    if (!$resultado) {
        return false;
    }
    return $resultado;
}

function buscar_funcionario($nome = '') {
    global $conexao;
    if (!$conexao) {
        return [];
    }
    $sql = "SELECT * FROM funcionarios WHERE nome LIKE '%$nome%' ORDER BY id DESC";
    $resultado = mysqli_query($conexao, $sql);
    $funcionarios = [];
    
    if ($resultado) {
        while ($row = mysqli_fetch_assoc($resultado)) {
            $funcionarios[] = $row;
        }
    }
    return $funcionarios;
}
