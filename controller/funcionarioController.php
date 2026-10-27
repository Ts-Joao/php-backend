<?php
require_once __DIR__ . "/../model/funcionario.php";

function controller_home() {
    require_once __DIR__ . "/../view/home.php";
}

function controller_cadastrar() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"] ?? "";
        $setor = $_POST["setor"] ?? "";
        $salario = $_POST["salario"] ?? 0;

        if (inserir_funcionario($nome, $setor, floatval($salario))) {
            echo "<script>alert('Funcionário cadastrado com sucesso!'); window.location.href='index.php?acao=consultar';</script>";
        } else {
            echo "<script>alert('Erro ao cadastrar funcionário.'); window.location.href='index.php?acao=cadastrar';</script>";
        }
    }

    require_once __DIR__ . "/../view/formularioInserir.php";
}

function controller_consultar() {
    $nome = $_GET["nome"] ?? "";
    $funcionarios = buscar_funcionario($nome);

    require_once __DIR__ . "/../view/formularioConsultar.php";
}
