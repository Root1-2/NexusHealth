<?php

session_start();
if (!isset($_SESSION['userName']) || $_SESSION['userName'] !== 'admin') {
    echo "<script>alert('You have to Login First!!!')</script>";
    echo "<script>location.href='../Authentication/login.php'</script>";
}
include '../Database/connection.php';

// Total User
$users = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM register"));
// Total Donor
$donor = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM donor_list"));
// Total Donor
$avail = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM donor_list WHERE `status` = 'Available'"));
// Total Donor
$unavail = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM donor_list WHERE `status` ='Unavailable'"));
// Total Doctors
$doctors = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM doctorlist"));
// Total Appointments
$appointments = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM appointments"));
// Total Medicines
$medicines = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM medcorner"));
// Total Purchases
$purchases = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM receipt"));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Fontawesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <title>Admin Home</title>
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
            <div class="d-flex">
                <button class="btn open-btn"><i class="fa-solid fa-bars-staggered"></i></button>

                <h3 class="mt-1 ms-2 text-primary">Dashboard</h3>
            </div>

            <!-- Dashboard Body -->
            <div class="row p-5 ms-1">
                <!-- Card -->
                <div class="col-xl-3 col-lg-3 p-0 card shadow">
                    <div class="p-3">
                        <h4 class="text-info">Total Users:
                            <?php echo $users; ?>
                        </h4>
                    </div>

                    <img src="download.png" alt="" width="100%" style="position: relative; bottom: 0;">
                </div>

                <div class="col-xl-3 col-lg-3 p-0 card shadow ms-5">
                    <div class="p-3">
                        <h4 class="text-primary">Total Doctor:
                            <?php echo $doctors; ?>
                        </h4>
                    </div>

                    <img src="download.png" alt="" width="100%" style="position: relative; bottom: 0;">
                </div>

                <div class="col-xl-3 col-lg-3 p-0 card shadow ms-5">
                    <div class="p-3">
                        <h4 class="text-primary">Total Appointment:
                            <?php echo $appointments; ?>
                        </h4>
                    </div>

                    <img src="download.png" alt="" width="100%" style="position: relative; bottom: 0;">
                </div>

                <div class="col-xl-3 col-lg-3 p-0 card shadow mt-5">
                    <div class="p-3">
                        <h4 class="text-danger">Total Donor:
                            <?php echo $donor; ?>
                        </h4>
                    </div>

                    <img src="download.png" alt="" width="100%" style="position: relative; bottom: 0;">
                </div>

                <div class="col-xl-3 col-lg-3 p-0 card shadow mt-5 ms-5">
                    <div class="p-3">
                        <h4 class="text-danger">Total Available Donor:
                            <?php echo $avail; ?>
                        </h4>
                    </div>

                    <img src="download.png" alt="" width="100%" style="position: relative; bottom: 0;">
                </div>

                <div class="col-xl-3 col-lg-3 p-0 card shadow mt-5 ms-5">
                    <div class="p-3">
                        <h4 class="text-danger">Total Unavailable Donor:
                            <?php echo $unavail; ?>
                        </h4>
                    </div>

                    <img src="download.png" alt="" width="100%" style="position: relative; bottom: 0;">
                </div>

                <div class="col-xl-3 col-lg-3 p-0 card shadow mt-5">
                    <div class="p-3">
                        <h4 class="text-success">Total Medicine:
                            <?php echo $medicines;?>
                        </h4>
                    </div>

                    <img src="download.png" alt="" width="100%" style="position: relative; bottom: 0;">
                </div>

                <div class="col-xl-3 col-lg-3 p-0 card shadow mt-5 ms-5">
                    <div class="p-3">
                        <h4 class="text-success">Total Purchases:
                            <?php echo $purchases;?>
                        </h4>
                    </div>

                    <img src="download.png" alt="" width="100%" style="position: relative; bottom: 0;">
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>