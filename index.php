<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .checkout-container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
        }
        .step-content {
            display: none;
        }
        .step-content.active {
            display: block;
        }
    </style>
    <script>
        function showStep(step) {
            document.querySelectorAll('.step-content').forEach(content => content.classList.remove('active'));
            document.getElementById(step).classList.add('active');
        }
    </script>
</head>
<body>

<div class="checkout-container">
    <h2 class="text-center">Checkout</h2>

    <!-- Etapa 1: Revisão do Produto -->
    <div id="step1" class="step-content active">
        <h4>Revisão do Produto</h4>
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <div class="bg-light d-flex align-items-center justify-content-center" style="height: 100%; min-height: 120px;">
                        <h5 class="text-center">Produto</h5>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Registro de Domínio .CO</h5>
                        <p class="card-text">Renovação em janeiro de 2026 por R$ 199,99.</p>
                        <p class="card-text">
                            <small class="text-muted">Valor original: <del>R$ 199,99</del></small>
                            <strong class="text-success"> R$ 119,99</strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <h5>Opção de Upsell</h5>
            <div class="card">
                <div class="card-body">
                    <h6>Proteção de Domínio Completa</h6>
                    <p>Evite que hackers roubem seu domínio ou façam alterações não autorizadas. Proteja seu investimento.</p>
                    <p><strong>R$ 36,99/ano</strong></p>
                    <button class="btn btn-outline-primary">Adicionar ao Carrinho</button>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end mt-4">
            <button class="btn btn-primary" onclick="showStep('step2')">Próxima Etapa</button>
        </div>
    </div>

    <!-- Etapa 2: Informações Pessoais -->
    <div id="step2" class="step-content">
        <h4>Informações Pessoais</h4>
        <form>
            <div class="mb-3">
                <label for="name" class="form-label">Nome Completo</label>
                <input type="text" class="form-control" id="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Endereço</label>
                <input type="text" class="form-control" id="address" required>
            </div>
            <div class="d-flex justify-content-between">
                <button class="btn btn-secondary" onclick="showStep('step1')">Voltar</button>
                <button class="btn btn-primary" onclick="showStep('step3')">Próxima Etapa</button>
            </div>
        </form>
    </div>

    <!-- Etapa 3: Informações de Pagamento -->
    <div id="step3" class="step-content">
        <h4>Informações de Pagamento</h4>
        <form>
            <div class="mb-3">
                <label for="payment-method" class="form-label">Forma de Pagamento</label>
                <select class="form-select" id="payment-method" required>
                    <option value="">Selecione</option>
                    <option value="pix">PIX</option>
                    <option value="boleto">Boleto</option>
                    <option value="cartao">Cartão de Crédito</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="card-number" class="form-label">Número do Cartão</label>
                <input type="text" class="form-control" id="card-number" placeholder="Somente para cartões" disabled>
            </div>
            <div class="d-flex justify-content-between">
                <button class="btn btn-secondary" onclick="showStep('step2')">Voltar</button>
                <button class="btn btn-success">Finalizar Compra</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>