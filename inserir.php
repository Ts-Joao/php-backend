<?php
include('conexao.php');

$nome = $_POST['nome'];
$setor = $_POST['setor'];
$salario = $_POST['salario'];

$sql = "INSERT INTO funcionarios (nome, setor, salario) values ('$nome', '$setor', '$salario')";

if (mysqli_query($conexao, $sql)) {
    header("Location: index.php");
    exit();
} else {
    echo "Erro ao cadastrar: ". mysqli_error($conexao);
}

mysqli_close($conexao);