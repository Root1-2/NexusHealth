<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Credit Card Form</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            max-width: 400px;
            width: 100%;
            margin: 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .input-group {
            display: flex;
            gap: 16px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        .credit-card-image {
            width: 100%;
            max-width: 200px;
            height: auto;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <!-- Credit Card Image -->
        <img class="credit-card-image" src="../logo/card.png" alt="Credit Card">

        <form id="creditCardForm">
            <label for="cardNumber">Credit Card Number:</label>
            <input type="text" id="cardNumber" name="cardNumber" placeholder="Enter card number" pattern="^\d{16}$"
                required>

            <div class="input-group">
                <label for="expirationDate">Expiration Date (MM/YY):</label>
                <input type="text" id="expirationDate" name="expirationDate" placeholder="MM/YY"
                    pattern="^(0[1-9]|1[0-2])\/\d{2}$" required>
            </div>

            <div class="input-group">
                <label for="cvv">CVV:</label>
                <input type="text" id="cvv" name="cvv" placeholder="Enter CVV" pattern="^\d{3}$" required>

                <label for="pin">PIN:</label>
                <input type="text" id="pin" name="pin" placeholder=" 4 digit pin" pattern="^\d{4}$" required>
            </div>

            <button type="button" onclick="submitCreditCardForm()">Submit</button>
        </form>
    </div>

    <script>
        function submitCreditCardForm() {
            // You can perform additional actions here if needed
            alert("Credit card information submitted successfully!");
        }
    </script>

</body>

</html>
