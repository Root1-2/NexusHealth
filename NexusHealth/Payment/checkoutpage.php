<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Fontawesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        /* Custom Styles */
        body {
            font-family: Arial, sans-serif;
        }

        .page-section {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            height: 14rem;
        }

        .section-head {
            border-bottom: 1px solid #dee2e6;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .section-head h2 {
            font-size: 1.5rem;
            color: #333;
        }

        .form-group label {
            font-weight: bold;
            color: #555;
        }

        .checkout-data td {
            padding: 8px;
        }

        .checkout-data .name a {
            color: #007bff;
            text-decoration: none;
        }

        .checkout-data .price span {
            font-weight: bold;
        }

        .checkout-data .total td {
            font-weight: bold;
        }

        @media (max-width: 768px) {
            .page-section {
                padding: 10px;
            }

            .checkout-data td {
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="p-4">
            <h1 class="fs-3 mb-4">Checkout</h1>
            <div class="d-flex">
                <!-- Billing Information -->
                <div class="col-md-4 col-sm-12">
                    <div class="page-section" style="height: auto;">
                        <div class="section-head">
                            <h2><span>1</span> Customer Information</h2>
                        </div>
                        <form>
                            <div class="mb-3">
                                <label for="input-firstname" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="input-firstname" placeholder="First Name">
                            </div>
                            <div class="mb-3">
                                <label for="input-lastname" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="input-lastname" placeholder="Last Name">
                            </div>
                            <div class="mb-3">
                                <label for="input-address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="input-address" placeholder="Address">
                            </div>
                            <div class="mb-3">
                                <label for="input-telephone" class="form-label">Mobile</label>
                                <input type="tel" class="form-control" id="input-telephone" placeholder="Mobile">
                            </div>
                            <div class="mb-3">
                                <label for="input-email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="input-email" placeholder="Email">
                            </div>
                            <div class="mb-3">
                                <label for="input-city" class="form-label">City</label>
                                <input type="text" class="form-control" id="input-city" placeholder="City">
                            </div>
                            <div class="mb-3">
                                <label for="input-zone" class="form-label">Zone</label>
                                <select class="form-select" id="input-zone">
                                    <option selected>Dhaka City</option>
                                    <option>Khulna City</option>
                                    <option>Rajshahi City</option>
                                    <option>Rangpur City</option>
                                    <option>Chittagong City</option>
                                    <option>Gazipur City</option>
                                    <option>Others</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="input-comment" class="form-label">Comment</label>
                                <textarea class="form-control" id="input-comment" rows="3"
                                    placeholder="Comment"></textarea>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="container ms-3">
                    <div class="row">
                        <!-- Payment Method -->
                        <div class="col-md-6">
                            <div class="page-section">
                                <div class="section-head">
                                    <h2><span>2</span> Payment Method</h2>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="payment_method" id="payment-cod"
                                        value="cod" checked>
                                    <label class="form-check-label" for="payment-cod">
                                        Cash on Delivery
                                    </label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="payment_method" id="payment-cod"
                                        value="cod" checked>
                                    <label class="form-check-label" for="payment-cod">
                                        Bkash
                                    </label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="payment_method" id="payment-cod"
                                        value="cod" checked>
                                    <label class="form-check-label" for="payment-cod">
                                        Card
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Delivery Method -->
                        <div class="col-md-6">
                            <div class="page-section">
                                <div class="section-head">
                                    <h2><span>3</span> Delivery Method</h2>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="shipping_method"
                                        id="shipping-home" value="flat.flat" checked>
                                    <label class="form-check-label" for="shipping-home">
                                        Home Delivery - 60৳
                                    </label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="shipping_method"
                                        id="shipping-home" value="flat.flat" checked>
                                    <label class="form-check-label" for="shipping-home">
                                        Express Delivery - 120৳
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order Overview -->
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="page-section" style="height: auto;">
                                <div class="section-head">
                                    <h2><span>4</span> Order Overview</h2>
                                </div>
                                <table class="table checkout-data">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th class="text-right">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="name">
                                                <a href="#">Starex 19" NB Wide Led TV Monitor</a>
                                            </td>
                                            <td class="price"><span>7,800৳</span> <span> x </span> <span>2</span></td>
                                            <td class="price text-right">15,600৳ </td>
                                        </tr>
                                        <tr class="total">
                                            <td colspan="2" class="text-right"><strong>Sub-Total:</strong></td>
                                            <td class="text-right"><span class="amount">15,600৳</span></td>
                                        </tr>
                                        <tr class="total">
                                            <td colspan="2" class="text-right"><strong>Home Delivery:</strong></td>
                                            <td class="text-right"><span class="amount">60৳</span></td>
                                        </tr>
                                        <tr class="total">
                                            <td colspan="2" class="text-right"><strong>Total:</strong></td>
                                            <td class="text-right"><span class="amount">15,660৳</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-2">
                        <button class="btn btn-outline-primary">Confirm Order</button>
                    </div>

                </div>



            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>