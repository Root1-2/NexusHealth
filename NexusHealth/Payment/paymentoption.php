<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Now</title>
    <style>
        /* Add your styles here */
        body {
            font-family: Arial, sans-serif;
        }
        #payment-dialog {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 9999;
        }
    </style>
</head>
<body>

    <div id="payment-dialog">
        <p>How do you want to pay?</p>
        <button onclick="redirectToBkash()">Bkash</button>
        <button onclick="redirectToCard()">Credit Card</button>
        <button onclick="closePaymentDialog()">Cancel</button>
    </div>

    <script>
        function showPaymentDialog() {
            document.getElementById('payment-dialog').style.display = 'block';
        }

        function closePaymentDialog() {
            document.getElementById('payment-dialog').style.display = 'none';
            window.location.href = '../Med Corner/medhome.php'

        }

        function redirectToBkash() {
            // Redirect to Bkash.php
            window.location.href = 'bkash.php';
        }

        function redirectToCard() {
            // Redirect to Card.php
            window.location.href = 'card.php';
        }

        // Call the function to show the payment dialog on page load
        window.onload = showPaymentDialog;
    </script>
</body>
</html>
