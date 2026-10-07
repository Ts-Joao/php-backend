<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <!-- CSS do Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Dados do Funcionário</h5>
                    </div>
                    <div class="card-body">
                        
                        <!-- Coloque o nome do seu arquivo PHP no action -->
                        <form action="inserir.php" method="POST">
                            
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome completo" required>
                            </div>

                            <div class="mb-3">
                                <label for="setor" class="form-label">Setor</label>
                                <input type="text" class="form-control" id="setor" name="setor" placeholder="Ex: TI, RH, Vendas" required>
                            </div>

                            <div class="mb-4">
                                <label for="salario" class="form-label">Salário</label>
                                <div class="input-group">
                                    <span class="input-group-text">R$</span>
                                    <input type="number" step="0.01" min="0" class="form-control" id="salario" name="salario" placeholder="0.00" required>
                                </div>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Enviar Dados</button>
                            </div>
                            
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>