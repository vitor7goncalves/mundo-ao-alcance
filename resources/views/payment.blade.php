<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #eaeaea;
            font-family: Arial, sans-serif;
        }
        .payment-wrapper {
            max-width: 700px;
            margin: 50px auto;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            padding: 30px 40px;
        }
        .payment-wrapper h2 {
            font-size: 28px;
            color: #4c4c4c;
            text-align: center;
            margin-bottom: 30px; /* Maior espaçamento abaixo do título */
        }
        .form-label {
            font-weight: bold;
            color: #333;
        }
        .form-control, .form-select {
            margin-top: 10px; /* Espaço entre o label e o input */
        }
        .form-group {
            margin-bottom: 25px; /* Espaço razoável entre cada grupo de campos */
        }
        .btn-payment {
            background-color: #28a745;
            color: white;
            border: none;
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border-radius: 5px;
            margin-top: 20px; /* Espaçamento entre o botão e o último campo */
        }
        .btn-payment:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="payment-wrapper">
        <h2>Finalize Seu Pagamento</h2>
        <form action="{{ route('processPayment') }}" method="POST">
            @csrf
            <!-- Nome no Cartão -->
            <div class="form-group">
                <label for="cardholder-name" class="form-label">Nome no Cartão</label>
                <input type="text" id="cardholder-name" name="cardholder_name" class="form-control" placeholder="Ex.: João da Silva" required>
            </div>

            <!-- Número do Cartão -->
            <div class="form-group">
                <label for="card-number" class="form-label">Número do Cartão</label>
                <input type="text" id="card-number" name="card_number" class="form-control" placeholder="0000 0000 0000 0000" maxlength="16" required>
            </div>

            <!-- Bandeira do Cartão -->
            <div class="form-group">
                <label for="card-brand" class="form-label">Bandeira</label>
                <select id="card-brand" name="card_brand" class="form-select" required>
                    <option value="" selected disabled>Selecione a bandeira</option>
                    <option value="visa">Visa</option>
                    <option value="mastercard">MasterCard</option>
                    <option value="amex">American Express</option>
                    <option value="elo">Elo</option>
                </select>
            </div>

            <!-- Data de Validade -->
            <div class="form-group">
                <label for="expiry-date" class="form-label">Data de Validade</label>
                <input type="text" id="expiry-date" name="expiry_date" class="form-control" placeholder="MM/AA" maxlength="5" required>
            </div>

            <!-- CVV -->
            <div class="form-group">
                <label for="cvv" class="form-label">Código de Segurança (CVV)</label>
                <input type="text" id="cvv" name="cvv" class="form-control" placeholder="123" maxlength="3" required>
            </div>

            <!-- Botão de Pagamento -->
            <button type="submit" class="btn-payment">Pagar Agora</button>
        </form>
    </div>
</body>
</html>