<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Etapa 1</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }
        .checkout-step {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .product-card {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }
        .product-image {
            width: 100px;
            height: 100px;
            background-color: #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: bold;
            border-radius: 8px;
        }
        .upsell {
            margin-top: 20px;
            padding: 15px;
            background: #f0f8ff;
            border-radius: 8px;
            border: 1px solid #d1e7ff;
        }
    </style>
</head>
<body>

<div class="checkout-step">
    <h2 class="text-center">Confira seu Produto</h2>

    <!-- Produto -->
    <div class="product-card">
        <div class="product-image">WWW</div>
        <div>
            <h4>Registro de Domínio .CO</h4>
            <p>Renovação em janeiro de 2026 por R$ 199,99</p>
            <p>
                <span style="text-decoration: line-through; color: #999;">R$ 199,99</span>
                <span style="color: #28a745; font-weight: bold;">R$ 119,99</span>
            </p>
        </div>
    </div>

    <!-- Upsell -->
    <div class="upsell">
        <h5>Proteção de Domínio Completa <span class="badge bg-success">Recomendado</span></h5>
        <p>Evite que hackers roubem seu domínio ou façam alterações não autorizadas. Proteja seu investimento.</p>
        <p><strong>R$ 36,99/ano</strong></p>
        <button class="btn btn-primary btn-sm">Adicionar ao Carrinho</button>
    </div>

    <!-- Botão Próxima Etapa -->
    <div class="d-grid mt-4">
        <button class="btn btn-primary">Ir para Revisão do Pedido</button>
    </div>
</div>

</body>
</html>