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
            padding: 20px;
        }
        .checkout-form {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<div class="checkout-form">
    <h2 class="text-center">Finalize Sua Compra</h2>
    <form action="process_checkout.php" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Nome Completo</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Endereço</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>

        <div class="mb-3">
            <label for="city" class="form-label">Cidade</label>
            <input type="text" class="form-control" id="city" name="city" required>
        </div>

        <div class="mb-3">
            <label for="zip" class="form-label">CEP</label>
            <input type="text" class="form-control" id="zip" name="zip" required>
        </div>

        <div class="mb-3">
            <label for="card" class="form-label">Número do Cartão</label>
            <input type="text" class="form-control" id="card" name="card" pattern="\d{13,16}" required>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="expiry" class="form-label">Data de Expiração (MM/AA)</label>
                <input type="text" class="form-control" id="expiry" name="expiry" pattern="(0[1-9]|1[0-2])/[0-9]{2}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="cvv" class="form-label">CVV</label>
                <input type="password" class="form-control" id="cvv" name="cvv" pattern="\d{3,4}" required>
            </div>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Finalizar Compra</button>
        </div>
    </form>
</div>

<script>
    // Simples validação para garantir o formato correto do CVV e do cartão
    document.querySelector('form').addEventListener('submit', function (e) {
        const card = document.getElementById('card').value;
        const expiry = document.getElementById('expiry').value;
        const cvv = document.getElementById('cvv').value;

        if (!/^\d{13,16}$/.test(card)) {
            e.preventDefault();
            alert('Número do cartão inválido.');
        } else if (!/^(0[1-9]|1[0-2])\/[0-9]{2}$/.test(expiry)) {
            e.preventDefault();
            alert('Data de expiração inválida.');
        } else if (!/^\d{3,4}$/.test(cvv)) {
            e.preventDefault();
            alert('CVV inválido.');
        }
    });
</script>

</body>
</html>
