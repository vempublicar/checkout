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

        function handlePaymentMethodChange() {
            const paymentMethod = document.getElementById('payment-method').value;
            const cardFields = document.getElementById('card-fields');
            if (paymentMethod === 'cartao') {
                cardFields.style.display = 'block';
            } else {
                cardFields.style.display = 'none';
            }
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
                <div class="mt-4 d-flex justify-content-end">
                    <button class="btn btn-primary" onclick="showStep('step2')">Próxima Etapa</button>
                </div>
            </div>

            <!-- Etapa 3: Informações de Pagamento -->
            <div id="step3" class="step-content">
                <h4>Informações de Pagamento</h4>
                <form>
                    <div class="mb-3">
                        <label for="payment-method" class="form-label">Forma de Pagamento</label>
                        <select class="form-select" id="payment-method" onchange="handlePaymentMethodChange()" required>
                            <option value="">Selecione</option>
                            <option value="pix">PIX</option>
                            <option value="boleto">Boleto</option>
                            <option value="cartao">Cartão de Crédito</option>
                        </select>
                    </div>

                    <div id="card-fields" style="display: none;">
                        <div class="mb-3">
                            <label for="card-number" class="form-label">Número do Cartão</label>
                            <input type="text" class="form-control" id="card-number">
                        </div>
                        <div class="mb-3">
                            <label for="card-expiry" class="form-label">Validade</label>
                            <input type="text" class="form-control" id="card-expiry" placeholder="MM/AA">
                        </div>
                        <div class="mb-3">
                            <label for="card-cvv" class="form-label">CVV</label>
                            <input type="text" class="form-control" id="card-cvv">
                        </div>
                        <div class="mb-3">
                            <label for="installments" class="form-label">Parcelamento</label>
                            <select class="form-select" id="installments">
                                <option value="1">À vista</option>
                                <option value="2">2x</option>
                                <option value="3">3x</option>
                                <option value="4">4x</option>
                                <option value="5">5x</option>
                                <option value="6">6x</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button class="btn btn-secondary" onclick="showStep('step2')">Voltar</button>
                        <button class="btn btn-primary" onclick="showStep('step4')">Finalizar Compra</button>
                    </div>
                </form>
            </div>

            <!-- Etapa 4: Resposta da API -->
            <div id="step4" class="step-content">
                <h4>Status da Transação</h4>
                <div class="alert alert-success" role="alert">
                    <strong>Sucesso!</strong> Sua transação foi concluída com êxito.
                </div>
                <div class="alert alert-danger" role="alert" style="display: none;">
                    <strong>Erro!</strong> Algo deu errado com sua transação. Tente novamente.
                </div>
                <div class="d-flex justify-content-center mt-4">
                    <button class="btn btn-primary" onclick="showStep('step1')">Voltar ao Início</button>
                </div>
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
