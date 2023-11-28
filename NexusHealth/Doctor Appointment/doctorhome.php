<?php
session_start();
if(!isset($_SESSION['userName'])) {
    echo "<script>alert('Please Login First!')</script>";
    echo "<script>location.href='../Homepage/index.php'</script>";
}
include "../Database/connection.php";
include "../Database/sessionUserData.php";

unset($_SESSION['doctorList']);
unset($_SESSION['appointmentlist']);
$_SESSION['doctorHome'] = 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Appointment</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
        integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">

    <link rel="stylesheet" href="styles.css">
    <style>
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
        <div class="d-flex flew-row">
            <?php include 'sidebar.php'; ?>

            <!-- Dashboard Section -->
            <div class="px-5 py-3" style="width: 100%;">
                <div>
                    <i class="bi bi-speedometer dashicon display-6 me-2"></i>
                    <span class="display-5 slide-in-from-left">Dashboard Overview</span>
                    <hr class="bg-primary">
                </div>

                <!-- Welcome Card -->
                <div class="row">
                    <div class="col-lg-5 ms-3 me-5 p-5 rounded" style="background-color: #1c325a;">
                        <span class="fs-2 text-light slide-in-from-bottom">Good Morning,
                            <?php echo $row['lastName'] ?>
                        </span>
                        <p class="fs-5 my-4 text-light">Appointment Statistics</p>
                        <div class="row">
                            <div class="col-lg-6 card rounded rounded-dark p-3" style="background-color: #1c325a;">
                                <p class=" text-light">Total Appointments</p>
                                <p class="display-2 text-secondary">24</p>
                            </div>
                            <div class="col-lg-6 card rounded rounded-dark p-3" style="background-color: #1c325a;">
                                <p class="text-light">Upcoming Appointments</p>
                                <p class="display-2 text-secondary">11</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 p-5 card border border-none rounded">
                        <span class="fs-2">Closest Appointment</span>
                        <div class="rounded p-3 my-3" style="background-color: #f2f5fa">
                            <div class="row">
                                <div class="col-lg-8">
                                    <h3>Dr. Arafat Hossain</h3>
                                    <h4>Cardiology</h4>
                                </div>
                                <div class="col-lg-4 d-flex justify-content-end">
                                    <p class="fs-4 mt-4 me-2">11-11:20 AM</p>
                                </div>
                            </div>
                            <h2></h2>
                        </div>
                        <p class="fs-4 m-0">Address Information</p>
                        <p class="fs-5">Al-Haramain Hospital</p>
                        <div>
                            <i class="bi bi-telephone-plus dashicon fs-4 me-2"></i>
                            <span> +88 019 3122 5555</span>
                        </div>
                    </div>
                </div>


            </div>



        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>
