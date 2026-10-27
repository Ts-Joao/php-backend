<?php
require_once __DIR__ . "/controller/funcionarioController.php";

// Roteador Front-Controller
$acao = $_GET["acao"] ?? "home";

switch ($acao) {
    case "cadastrar":
        controller_cadastrar();
        break;

    case "consultar":
        controller_consultar();
        break;

    case "index":
    case "home":
    default:
        controller_home();
        break;
}