<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Funcionário - Gestão</title>
    <!-- Bootstrap 5.3 & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body class="bg-light min-vh-100 d-flex flex-column">

    <!-- Barra de Navegação -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php?acao=home">
                <i class="bi bi-people-fill me-2"></i>Gestão de Funcionários
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?acao=home"><i class="bi bi-house-door me-1"></i>Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?acao=cadastrar"><i class="bi bi-person-plus me-1"></i>Cadastrar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?acao=consultar"><i class="bi bi-search me-1"></i>Consultar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Conteúdo Principal -->
    <main class="container my-5 flex-grow-1">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">

                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white py-3">
                        <h5 class="mb-0 fw-semibold">
                            <i class="bi bi-person-plus me-2"></i>Cadastro de Funcionário
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="index.php?acao=cadastrar" method="POST">
                            <div class="mb-3">
                                <label for="nome" class="form-label fw-medium">Nome Completo</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Ex: Maria Silva" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="setor" class="form-label fw-medium">Setor</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-building"></i></span>
                                    <input type="text" class="form-control" id="setor" name="setor" placeholder="Ex: TI, Recursos Humanos, Financeiro" required>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="salario" class="form-label fw-medium">Salário</label>
                                <div class="input-group">
                                    <span class="input-group-text">R$</span>
                                    <input type="number" step="0.01" min="0" class="form-control" id="salario" name="salario" placeholder="0.00" required>
                                </div>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary py-2 fw-semibold">
                                    <i class="bi bi-check-lg me-1"></i>Salvar Funcionário
                                </button>
                            </div>
                        </form>
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