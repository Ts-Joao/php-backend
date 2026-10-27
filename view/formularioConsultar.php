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
                        <a class="nav-link" href="index.php?acao=cadastrar"><i class="bi bi-person-plus me-1"></i>Cadastrar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?acao=consultar"><i class="bi bi-search me-1"></i>Consultar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Conteúdo Principal -->
    <main class="container my-5 flex-grow-1">

        <!-- Mensagens de Sucesso -->
        <?php if (!empty($mensagem_sucesso)): ?>
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                <?= htmlspecialchars($mensagem_sucesso) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
            </div>
        <?php endif; ?>

        <!-- Cabeçalho e Barra de Pesquisa -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body p-4">
                <div class="row align-items-center g-3">
                    <div class="col-md-6">
                        <h4 class="mb-1 fw-bold text-dark">
                            <i class="bi bi-list-task me-2 text-primary"></i>Lista de Funcionários
                        </h4>
                        <p class="text-muted small mb-0">Pesquise por nome ou gerencie os funcionários cadastrados.</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <a href="index.php?acao=cadastrar" class="btn btn-primary">
                            <i class="bi bi-person-plus me-1"></i> Novo Funcionário
                        </a>
                    </div>
                </div>

                <hr class="my-3">

                <!-- Formulário de Consulta -->
                <form action="index.php" method="GET" class="row g-2 align-items-center">
                    <input type="hidden" name="acao" value="consultar">
                    <div class="col-sm-8 col-md-9">
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="bi bi-search text-muted"></i></span>
                            <input type="text" name="nome" class="form-control" placeholder="Digite o nome do funcionário para buscar..." value="<?= htmlspecialchars($nome ?? '') ?>">
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-3 d-flex gap-2">
                        <button type="submit" class="btn btn-primary flex-grow-1">
                            Buscar
                        </button>
                        <?php if (!empty($nome)): ?>
                            <a href="index.php?acao=consultar" class="btn btn-outline-secondary" title="Limpar busca">
                                <i class="bi bi-x-lg"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tabela de Resultados -->
        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <?php if (!empty($funcionarios) && count($funcionarios) > 0): ?>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4" style="width: 80px;">#ID</th>
                                    <th>Nome Completo</th>
                                    <th>Setor</th>
                                    <th>Salário</th>
                                    <th class="text-end pe-4" style="width: 140px;">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($funcionarios as $func): ?>
                                    <tr>
                                        <td class="ps-4 text-muted fw-semibold">
                                            #<?= htmlspecialchars($func['id'] ?? '') ?>
                                        </td>
                                        <td>
                                            <div class="fw-semibold text-dark">
                                                <?= htmlspecialchars($func['nome'] ?? '') ?>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-secondary-subtle text-secondary border">
                                                <?= htmlspecialchars($func['setor'] ?? '') ?>
                                            </span>
                                        </td>
                                        <td class="fw-medium text-success">
                                            R$ <?= number_format(floatval($func['salario'] ?? 0), 2, ',', '.') ?>
                                        </td>
                                        <td class="text-end pe-4">
                                            <a href="index.php?acao=excluir&id=<?= $func['id'] ?? '' ?>" 
                                               class="btn btn-sm btn-outline-danger" 
                                               title="Excluir funcionário"
                                               onclick="return confirm('Tem certeza de que deseja excluir o funcionário <?= htmlspecialchars(addslashes($func['nome'] ?? '')) ?>?');">
                                                <i class="bi bi-trash3"></i> Excluir
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer bg-white border-top py-3 px-4 d-flex justify-content-between align-items-center">
                        <span class="text-muted small">
                            Total de registros: <strong><?= count($funcionarios) ?></strong>
                        </span>
                    </div>
                <?php else: ?>
                    <div class="text-center py-5">
                        <div class="text-muted mb-3">
                            <i class="bi bi-inbox fs-1"></i>
                        </div>
                        <h5 class="fw-semibold text-dark">Nenhum funcionário encontrado</h5>
                        <p class="text-muted small mb-4">
                            <?= !empty($nome) ? "Nenhum resultado corresponde à busca '<strong>" . htmlspecialchars($nome) . "</strong>'." : "Ainda não existem funcionários cadastrados no sistema." ?>
                        </p>
                        <?php if (!empty($nome)): ?>
                            <a href="index.php?acao=consultar" class="btn btn-outline-primary btn-sm me-2">
                                <i class="bi bi-arrow-left me-1"></i> Ver todos
                            </a>
                        <?php endif; ?>
                        <a href="index.php?acao=cadastrar" class="btn btn-primary btn-sm">
                            <i class="bi bi-plus-circle me-1"></i> Cadastrar Primeiro Funcionário
                        </a>
                    </div>
                <?php endif; ?>
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