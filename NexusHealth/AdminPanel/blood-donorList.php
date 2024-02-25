<?php

session_start();
if (!isset($_SESSION['userName']) && $_SESSION['userName'] !== 'admin') {
    echo "<script>alert('You have to Login First!!!')</script>";
    echo "<script>location.href='../Authentication/login.php'</script>";
}
include '../Database/connection.php';

$bloodbank = 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Fontawesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- DataTable -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" />
    <!-- Animate CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        body {
            background-color: #f5f7fb;
        }
    </style>
</head>

<body>
    <div class='d-flex flex-nowrap'>

        <?php include 'adminSideBar.php'; ?>

        <div class="" style="width: 100%;">
            <button class="btn open-btn"><i class="fa-solid fa-bars-staggered"></i></button>

            <!-- Table Section -->
            <div class="col-lg-9 container-fluid" style="background-color: #f5f7fb;">
                <table id="dataTable" class="table border border-1 border-secondary-subtle p-3 shadow-lg">
                    <thead class="bg-light">
                        <tr>
                            <th>Name</th>
                            <th>Blood Group</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $doctorsdata = mysqli_query($conn, "SELECT * FROM `donor_list`");

                        while ($row = mysqli_fetch_array($doctorsdata)) {
                            echo "
                                <tr>
                                    <td>
                                        <div class='d-flex align-items-center'>
                                            <div>
                                                <p class='fw-bold mb-1'>" . $row['Name'] . " </p>
                                                <p class='text-muted mb-0'>" . $row['Phone number'] . " </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class='fw-normal badge text-bg-danger rounded-pill d-inline mb-1'>" . $row['BloodGroup'] . " </p>
                                    </td>
                                    <td>" . $row['Address'] . "</td>
                                    <td>
                                        <span class='badge text-bg-" . ($row['status'] == 'Available' ? 'success' : 'danger') . " rounded-pill d-inline'>" . $row['status'] . "</span>
                                    </td>

                                    <td>
                                        <div class='d-flex'>
                                            <button class='btn btn-outline-primary rounded-pill me-3' onclick='openProfile(" . $row['id'] . ")'><i class='fa-solid fa-user'></i></button>
                                            <button class='btn btn-outline-success rounded-pill me-3' onclick='openPopup(" . $row['id'] . ")'><i class='fa-solid fa-pen-to-square'></i></button>
                                            <button class='btn btn-outline-danger rounded-pill' onclick='openDelete(" . $row['id'] . ")'><i class='fa-solid fa-trash-can'></i></button>
                                        </div>
                                    </td>
                                </tr>";

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
            });
        });
    </script>
</body>

</html>