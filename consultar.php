<?php
include("conexao.php");

$nome = $_POST['nome'] ?? '';

if ($nome) {
    $sql = "SELECT * FROM funcionarios WHERE nome LIKE '%$nome%'";
    $resultado = $mysqli->query($sql);
} else {
    $sql = "SELECT * FROM funcionarios";
    $resultado = $mysqli->query($sql);
}

if ($resultado && $resultado->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Nome</th><th>Setor</th><th>Salário</th></tr>";
    while ($linha = $resultado->fetch_assoc()) {
        echo "<tr><td>" . $linha['nome'] . "</td><td>" . $linha['setor'] . "</td><td>" . $linha['salario'] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum funcionário encontrado.";
}

$mysqli->close();
