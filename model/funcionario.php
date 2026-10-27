<?php
require_once __DIR__ . "/../config/database.php";

/**
 * Insere um novo funcionário no banco de dados com prepared statement
 */
function inserir_funcionario($nome, $setor, $salario) {
    global $conexao;
    $sql = "INSERT INTO funcionarios (nome, setor, salario) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);
    
    if (!$stmt) {
        return false;
    }
    
    // "ssd" -> string (nome), string (setor), double (salario)
    $salarioFloat = floatval($salario);
    mysqli_stmt_bind_param($stmt, "ssd", $nome, $setor, $salarioFloat);
    $resultado = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    return $resultado;
}

/**
 * Busca funcionários pelo nome (ou lista todos se nome vazio)
 */
function buscar_funcionario($nome = '') {
    global $conexao;
    $sql = "SELECT * FROM funcionarios WHERE nome LIKE ? ORDER BY id DESC";
    $stmt = mysqli_prepare($conexao, $sql);
    
    if (!$stmt) {
        return [];
    }
    
    $param = "%" . trim($nome) . "%";
    mysqli_stmt_bind_param($stmt, "s", $param);
    mysqli_stmt_execute($stmt);
    
    $resultado = mysqli_stmt_get_result($stmt);
    $funcionarios = [];
    
    if ($resultado) {
        while ($row = mysqli_fetch_assoc($resultado)) {
            $funcionarios[] = $row;
        }
    }
    
    mysqli_stmt_close($stmt);
    return $funcionarios;
}

/**
 * Exclui um funcionário pelo ID
 */
function excluir_funcionario($id) {
    global $conexao;
    $sql = "DELETE FROM funcionarios WHERE id = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    
    if (!$stmt) {
        return false;
    }
    
    $idInt = intval($id);
    mysqli_stmt_bind_param($stmt, "i", $idInt);
    $resultado = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    return $resultado;
}