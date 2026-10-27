<?php
require_once __DIR__ . "/controller/funcionarioController.php";

// Roteador Front-Controller
$acao = $_GET["acao"] ?? "home";

switch ($acao) {
    case "cadastrar":
        controller_cadastrar();
        break;

    case "consultar":
    case "buscar":
        controller_consultar();
        break;

    case "excluir":
        controller_excluir();
        break;

    case "home":
    default:
        controller_home();
        break;
}