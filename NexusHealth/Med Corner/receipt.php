<?php
session_start();
if (!isset($_SESSION['userName'])) {
    echo "<script>alert('Please Login First!')</script>";
    echo "<script>location.href='../Homepage/index.php'</script>";
}
include "../Database/connection.php";
include "../Database/sessionUserData.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipt</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
        integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <!-- DataTable -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" />
    <style>
        .custom-container {
            outline: 1px solid;
            padding: 10px;
            display: inline-block;
        }

        .custom-container i {
            font-size: 1.5rem;
            vertical-align: middle;
            margin-right: 5px;
        }

        .dashicon {
            color: #0d6efd;
        }

        body {
            background-color: #f2f5fa;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <header class="p-3 position-relative">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-between justify-content-lg-start">

                    <div class="">
                        <a href="../Med Corner/medhome.php">
                            <img src="../logo/reglogo.png" alt="logo1" style="width: 250px;">
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <div class="px-5 py-3" style="width: 100%;">
            <div>
                <span class="display-5 ms-5 px-3">Recipts</span>
                <i class="bi bi-receipt dashicon display-6 me-2"></i>
                <hr class="bg-primary">
            </div>

            <div class="container mt-3">
                <table id="dataTable" class="table align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th>Order ID</th>
                            <th>Order Item</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $buyerUsername = $_SESSION['userName'];
                        $receiptdata = mysqli_query($conn, "SELECT * FROM `receipt` WHERE `orderBuyer` = '$buyerUsername'");

                        while ($row2 = mysqli_fetch_array($receiptdata)) {
                            $items = json_decode($row2['items'], true);
                            echo "<tr>";
                            echo "<td><p class='fw-medium mb-1'>" . $row2['orderID'] . "</p></td>";
                            echo "<td>";
                            foreach ($items as $key => $item) {
                                $medName = $item['medName'];
                                $quantity = $item['quantity'];
                                $medPrice = $item['medPrice'];
                                echo "
                                    <div class='mb-2'>
                                        <p class='fw-medium mb-1'>" . ($key + 1) . ". Medicine Name: $medName</p>
                                        <p class='text-muted mb-0'>Quantity: $quantity</p>
                                        <p class='text-muted mb-0'>Price: $medPrice</p>
                                    </div>";
                            }
                            echo "</td>";
                            echo "</tr>";
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- DataTable -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>

    <script>
        // DataTable Initialization
        $(document).ready(function () {
            $('#dataTable').DataTable({
                "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
                "pageLength": 5 
            });
        });
    </script>
</body>

</html>