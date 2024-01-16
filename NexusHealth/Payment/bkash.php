<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Design with Logo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }
        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    

    <div class="container">
        <!-- Placeholder logo -->
        <img src="../logo/Bkash.png" alt="Logo" style="width:170px">

        <form id="myForm">
            <label for="mobileNumber">Mobile Number:</label>
            <input type="text" id="mobileNumber" name="mobileNumber" placeholder="e.g., 01234567890" pattern="^01[3-9]\d{8}$" required>

            
            <label for="PIN">PIN:</label>
            <input type="text" id="pin" name="pin" placeholder=" 4 digit pin" pattern="^\d{4}$" required>

            <button type="button" onclick="validateAndSubmit()">Submit</button>
        </form>
    </div>

    <script>
        function submitForm() {
            // You can perform additional actions here if needed
            alert("Form submitted successfully!");
        }
    </script>

</body>
</html>
