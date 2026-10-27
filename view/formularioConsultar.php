<?php
$rota_index = (basename(dirname($_SERVER['PHP_SELF'] ?? '')) === 'view') ? '../index.php' : 'index.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Funcionários - Gestão</title>
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
                        <a class="nav-link" href="<?= $rota_index ?>"><i class="bi bi-house-door me-1"></i>Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $rota_index ?>?acao=cadastrar"><i class="bi bi-person-plus me-1"></i>Cadastrar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= $rota_index ?>?acao=consultar"><i class="bi bi-search me-1"></i>Consultar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Conteúdo Principal -->
    <main class="container my-5 flex-grow-1">

        <h1 class="mb-2 fw-bold text-dark">Consultar Funcionários</h1>
        <p class="text-muted mb-4">Digite o nome do funcionário para buscar no sistema.</p>

        <!-- Formulário de Pesquisa -->
        <form action="<?= $rota_index ?>" method="GET" class="row g-2 align-items-center mb-4">
            <input type="hidden" name="acao" value="consultar">
            <div class="col-sm-6 col-md-5">
                <input type="text" 
                       id="nome" 
                       name="nome" 
                       class="form-control" 
                       placeholder="Nome do funcionário..." 
                       value="<?= htmlspecialchars($nome ?? '') ?>">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Pesquisar</button>
                <a href="<?= $rota_index ?>?acao=consultar" class="btn btn-secondary">Limpar</a>
            </div>
        </form>

        <!-- Tabela de Resultados -->
        <table class="table table-striped table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Setor</th>
                    <th>Salário</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($funcionarios) && count($funcionarios) > 0): ?>
                    <?php foreach ($funcionarios as $func): ?>
                        <tr>
                            <td><?= $func['id'] ?></td>
                            <td><?= htmlspecialchars($func['nome'] ?? '') ?></td>
                            <td><?= htmlspecialchars($func['setor'] ?? '') ?></td>
                            <td>R$ <?= number_format(floatval($func['salario'] ?? 0), 2, ',', '.') ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">Nenhum funcionário encontrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

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