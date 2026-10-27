<?php
require_once __DIR__ . "/../model/funcionario.php";

/**
 * Exibe a página inicial
 */
function controller_home() {
    require_once __DIR__ . "/../view/home.php";
}

/**
 * Exibe o formulário de cadastro e processa o envio dos dados
 */
function controller_cadastrar() {
    $mensagem_sucesso = "";
    $mensagem_erro = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nome    = trim($_POST["nome"] ?? "");
        $setor   = trim($_POST["setor"] ?? "");
        $salario = $_POST["salario"] ?? "";

        // Validação básica dos dados recebidos
        if (empty($nome) || empty($setor) || $salario === "" || !is_numeric($salario) || floatval($salario) < 0) {
            $mensagem_erro = "Por favor, preencha todos os campos corretamente com valores válidos.";
        } else {
            if (inserir_funcionario($nome, $setor, floatval($salario))) {
                $mensagem_sucesso = "Funcionário '{$nome}' cadastrado com sucesso!";
            } else {
                $mensagem_erro = "Erro ao salvar funcionário no banco de dados. Verifique a tabela e a conexão.";
            }
        }
    }

    require_once __DIR__ . "/../view/formularioInserir.php";
}

/**
 * Consulta e lista os funcionários
 */
function controller_consultar() {
    $nome = trim($_GET["nome"] ?? $_POST["nome"] ?? "");
    $funcionarios = buscar_funcionario($nome);
    $mensagem_sucesso = "";

    if (isset($_GET["msg"]) && $_GET["msg"] === "excluido") {
        $mensagem_sucesso = "Funcionário excluído com sucesso!";
    }

    require_once __DIR__ . "/../view/formularioConsultar.php";
}

/**
 * Exclui um funcionário e redireciona de volta para a lista
 */
function controller_excluir() {
    $id = $_GET["id"] ?? null;

    if ($id && is_numeric($id)) {
        excluir_funcionario(intval($id));
    }

    header("Location: index.php?acao=consultar&msg=excluido");
    exit;
}