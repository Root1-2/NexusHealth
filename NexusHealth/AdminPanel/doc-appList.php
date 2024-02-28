<?php

session_start();
if (!isset($_SESSION['userName']) && $_SESSION['userName'] !== 'admin') {
    echo "<script>alert('You have to Login First!!!')</script>";
    echo "<script>location.href='../Authentication/login.php'</script>";
}
include '../Database/connection.php';

$doctorappointment = 1;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment List</title>
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

    <title>Admin Home</title>
    <style>
        body {
            background-color: #f5f7fb;
        }

        /* Timeline */
        .timeline {
            border-left: 1px solid #0388fc;
            position: relative;
            list-style: none;
        }

        .timeline p,
        .timeline span {
            font-size: 0.8rem;
        }

        .timeline .timeline-item {
            position: relative;
        }

        .timeline .timeline-item:after {
            position: absolute;
            display: block;
            top: 0;
        }

        .timeline .timeline-item:after {
            background-color: #0388fc;
            left: -38px;
            border-radius: 50%;
            height: 11px;
            width: 11px;
            content: "";
        }

        /* Blurred Background Overlay */
        .popupOverlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 99;
            display: none;
            backdrop-filter: blur(5px);
        }

        /* Popup Form*/
        .popupForm {
            background-color: #fff;
            transform: scale(0.01);
            visibility: hidden;
            position: absolute;
            top: 5%;
            left: 20%;
            z-index: 100;
            transition: all 0.3s;
        }

        .open-popup {
            visibility: visible;
            transform: scale(1);
        }

        /* Popup Delete */
        .popupDel {
            background-color: #fff;
            position: absolute;
            visibility: hidden;
            top: 33%;
            left: 38%;
            z-index: 100;
            transform: scale(0.01);
            transition: all 0.3s;
        }

        .open-popupDel {
            visibility: visible;
            transform: scale(1);
        }
    </style>
</head>

<body>
    <div class='d-flex flex-nowrap'>

        <?php include 'adminSideBar.php'; ?>

        <div class="" style="width: 100%;">
            <button class="btn open-btn position-fixed"><i class="fa-solid fa-bars-staggered"></i></button> <br>
            <div class="d-flex flex-wrap">
                <!-- Table Section -->
                <div class="container mt-5">
                    <table id="appointTable" class="table align-middle mb-0 bg-white">
                        <thead class="bg-light">
                            <tr>
                                <th>ID</th>
                                <th>Doctor Name</th>
                                <th>Patient Name</th>
                                <th>Appointment date</th>
                                <th>Appointmet Time</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $appointdata = mysqli_query($conn, "SELECT * FROM `appointments`");

                            while ($row2 = mysqli_fetch_array($appointdata)) {
                                echo
                                    "
                                    <tr>
                                        <td>
                                            <p>" . $row2['id'] . "</p>
                                        </td>
                                        <td>
                                            <div class='d-flex align-items-center'>
                                                <div>
                                                    <p class='fw-medium mb-1'>" . $row2['doctorName'] . " </p>
                                                
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class='d-flex align-items-center'>
                                                <div>
                                                    <p class='fw-medium mb-1'>" . $row2['patientName'] . " </p>
                                                
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                        <p class='text-muted mb-0'>" . $row2['appointmentDate'] . " </p>
                                        
                                        </td>
                                    
                                        <td>                          
                                            <p class='fw-normal mb-1'>" . $row2['appointmentTime'] . " </p>
                                        </td>
                                    
                                    </tr> 
                                ";
                            }

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <!-- DataTable -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
        // DataTable Initialization
        $(document).ready(function () {
            $('#appointTable').DataTable();
        });
    </script>
</body>

</html>