<?php
$rota_index = (basename(dirname($_SERVER['PHP_SELF'] ?? '')) === 'view') ? '../index.php' : 'index.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Funcionários - Painel</title>
    <!-- Bootstrap 5.3 & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body class="bg-light min-vh-100 d-flex flex-column">

    <!-- Barra de Navegação -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="<?= $rota_index ?>">
                <i class="bi bi-people-fill me-2"></i>Gestão de Funcionários
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= $rota_index ?>"><i class="bi bi-house-door me-1"></i>Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $rota_index ?>?acao=cadastrar"><i class="bi bi-person-plus me-1"></i>Cadastrar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $rota_index ?>?acao=consultar"><i class="bi bi-search me-1"></i>Consultar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Conteúdo Principal -->
    <main class="container my-5 flex-grow-1">
        <div class="text-center mb-5">
            <h1 class="fw-bold text-dark">Sistema de Gestão de Funcionários</h1>
            <p class="text-muted lead">Gerencie os registros da sua equipe de forma rápida, simples e segura.</p>
        </div>

        <div class="row g-4 justify-content-center">
            <!-- Card Inserir -->
            <div class="col-md-5 col-lg-4">
                <div class="card h-100 border-0 shadow-sm text-center p-4">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <div class="rounded-circle bg-primary-subtle text-primary d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                                <i class="bi bi-person-plus-fill fs-2"></i>
                            </div>
                            <h4 class="card-title fw-semibold">Cadastrar Funcionário</h4>
                            <p class="card-text text-muted">Adicione novos membros à equipe informando nome, setor e remuneração.</p>
                        </div>
                        <div class="mt-4">
                            <a href="<?= $rota_index ?>?acao=cadastrar" class="btn btn-primary w-100 py-2">
                                <i class="bi bi-plus-circle me-1"></i> Ir para Cadastro
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Consultar -->
            <div class="col-md-5 col-lg-4">
                <div class="card h-100 border-0 shadow-sm text-center p-4">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <div class="rounded-circle bg-success-subtle text-success d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                                <i class="bi bi-person-lines-fill fs-2"></i>
                            </div>
                            <h4 class="card-title fw-semibold">Consultar Registros</h4>
                            <p class="card-text text-muted">Pesquise por nome, filtre registros e visualize todos os funcionários cadastrados.</p>
                        </div>
                        <div class="mt-4">
                            <a href="<?= $rota_index ?>?acao=consultar" class="btn btn-success w-100 py-2">
                                <i class="bi bi-search me-1"></i> Consultar Lista
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Rodapé -->
    <footer class="bg-white border-top py-3 text-center text-muted mt-auto">
        <div class="container small">
            &copy; <?= date('Y') ?> Gestão de Funcionários &bull; Sistema CRUD em PHP MVC
        </div>
    </footer>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
