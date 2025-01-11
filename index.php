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
            max-width: 1100px;
            margin: auto;
            padding: 20px;
        }
        .step-content {
            display: none;
        }
        .step-content.active {
            display: block;
        }
        .cart-summary {
            position: sticky;
            top: 20px;
        }
        .product-list {
            max-height: 300px;
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
    <h2 class="text-center mb-4">Checkout</h2>
    <div class="row">
        <!-- Coluna Esquerda: Conteúdo Principal -->
        <div class="col-md-8">
            <!-- Etapa 1: Revisão do Produto -->
            <div id="step1" class="step-content active">
                <h4>Revisão do Produto</h4>
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Registro de Domínio .CO</h5>
                        <p>Renovação em janeiro de 2026 por R$ 199,99.</p>
                        <p>
                            <small class="text-muted">Valor original: <del>R$ 199,99</del></small>
                            <strong class="text-success"> R$ 119,99</strong>
                        </p>
                        <button class="btn btn-primary" onclick="addToCart('Registro de Domínio .CO', 119.99)">Adicionar ao Carrinho</button>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5>Produtos Adicionais</h5>
                        <div class="product-list">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h6>Proteção de Domínio Completa</h6>
                                    <p>Evite alterações não autorizadas no seu domínio.</p>
                                    <strong>R$ 36,99/ano</strong>
                                    <button class="btn btn-outline-primary btn-sm float-end" onclick="addToCart('Proteção de Domínio Completa', 36.99)">Adicionar</button>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h6>Email Profissional</h6>
                                    <p>Mostre profissionalismo com um email personalizado.</p>
                                    <strong>R$ 59,99/ano</strong>
                                    <button class="btn btn-outline-primary btn-sm float-end" onclick="addToCart('Email Profissional', 59.99)">Adicionar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 d-flex justify-content-end">
                    <button class="btn btn-primary" onclick="showStep('step2')">Próxima Etapa</button>
                </div>
            </div>

            <!-- Etapa 2: Informações Pessoais -->
            <div id="step2" class="step-content">
                <h4>Informações Pessoais</h4>
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Nome Completo</label>
                            <input type="text" class="form-control" id="name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cpf" class="form-label">CPF ou CNPJ</label>
                            <input type="text" class="form-control" id="cpf" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="phone" class="form-label">Telefone</label>
                            <input type="tel" class="form-control" id="phone" required>
                        </div>
                    </div>

                    <h5 class="mt-4">Endereço</h5>
                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <label for="street" class="form-label">Rua</label>
                            <input type="text" class="form-control" id="street" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="number" class="form-label">Número</label>
                            <input type="text" class="form-control" id="number" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="neighborhood" class="form-label">Bairro</label>
                            <input type="text" class="form-control" id="neighborhood" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="complement" class="form-label">Complemento</label>
                            <input type="text" class="form-control" id="complement">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="city" class="form-label">Cidade</label>
                            <input type="text" class="form-control" id="city" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="state" class="form-label">Estado</label>
                            <input type="text" class="form-control" id="state" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="zip" class="form-label">CEP</label>
                            <input type="text" class="form-control" id="zip" required>
                        </div>
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

        <!-- Coluna Direita: Resumo do Carrinho -->
        <div class="col-md-4">
            <div class="card cart-summary">
                <div class="card-header">
                    <h5>Resumo do Carrinho</h5>
                </div>
                <ul class="list-group list-group-flush" id="cart-items">
                    <li class="list-group-item text-muted">Nenhum item no carrinho</li>
                </ul>
                <div class="card-body">
                    <h6>Total: <span id="total-price">R$ 0.00</span></h6>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
