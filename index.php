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
            max-width: 900px;
            margin: auto;
            padding: 20px;
        }
        .step-content {
            display: none;
        }
        .step-content.active {
            display: block;
        }
        .product-list {
            max-height: 200px;
            overflow-y: auto;
        }
    </style>
    <script>
        let cart = [];
        let total = 0;

        function showStep(step) {
            document.querySelectorAll('.step-content').forEach(content => content.classList.remove('active'));
            document.getElementById(step).classList.add('active');
        }

        function addToCart(name, price) {
            cart.push({ name, price });
            total += price;
            updateCartDisplay();
        }

        function updateCartDisplay() {
            const cartList = document.getElementById('cart-items');
            const totalPrice = document.getElementById('total-price');
            cartList.innerHTML = '';
            cart.forEach(item => {
                const li = document.createElement('li');
                li.className = 'list-group-item d-flex justify-content-between align-items-center';
                li.textContent = item.name;
                const span = document.createElement('span');
                span.textContent = `R$ ${item.price.toFixed(2)}`;
                li.appendChild(span);
                cartList.appendChild(li);
            });
            totalPrice.textContent = `R$ ${total.toFixed(2)}`;
        }
    </script>
</head>
<body>

<div class="checkout-container">
    <h2 class="text-center">Checkout</h2>

    <!-- Etapa 1: Revisão do Produto -->
    <div id="step1" class="step-content active">
        <h4>Revisão do Produto</h4>
        <div class="row">
            <!-- Coluna Esquerda: Produtos -->
            <div class="col-md-8">
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
                                <button class="btn btn-outline-primary" onclick="addToCart('Registro de Domínio .CO', 119.99)">Adicionar ao Carrinho</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <h5>Produtos que podem ser adicionados</h5>
                    <div class="product-list">
                        <div class="card mb-2">
                            <div class="card-body">
                                <h6>Proteção de Domínio Completa</h6>
                                <p>Evite que hackers roubem seu domínio ou façam alterações não autorizadas. Proteja seu investimento.</p>
                                <p><strong>R$ 36,99/ano</strong></p>
                                <button class="btn btn-outline-primary btn-sm" onclick="addToCart('Proteção de Domínio Completa', 36.99)">Adicionar ao Carrinho</button>
                            </div>
                        </div>
                        <div class="card mb-2">
                            <div class="card-body">
                                <h6>Email Profissional</h6>
                                <p>Tenha um email com seu domínio. Mostre profissionalismo e segurança para seus clientes.</p>
                                <p><strong>R$ 59,99/ano</strong></p>
                                <button class="btn btn-outline-primary btn-sm" onclick="addToCart('Email Profissional', 59.99)">Adicionar ao Carrinho</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Coluna Direita: Resumo do Carrinho -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Resumo do Carrinho</h5>
                    </div>
                    <ul class="list-group list-group-flush" id="cart-items">
                        <li class="list-group-item text-muted">Nenhum item no carrinho</li>
                    </ul>
                    <div class="card-body">
                        <h6>Total: <span id="total-price">R$ 0.00</span></h6>
                        <button class="btn btn-primary w-100" onclick="showStep('step2')">Próxima Etapa</button>
                    </div>
                </div>
            </div>
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
