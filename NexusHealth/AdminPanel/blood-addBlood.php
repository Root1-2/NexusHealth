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
    <title>Add Blood</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Fontawesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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
            <!-- Form Section -->
            <div>
                <br><br>
                <div class="my-5 col-lg-7 container-fluid border border-danger-subtle rounded p-4 shadow-lg">
                    <form action="blood-Action.php" method="POST">
                        <div class="mb-4">
                            <p>Full Name</p>
                            <input type="text" name="fullname" class="form-control" required>
                        </div>
                        <div class="mb-4">
                            <p>Phone Number</p>
                            <input type="tel" pattern="(\+88)?-?01[3-9]\d{8}" name="phoneNumber" class="form-control" required>
                        </div>
                        <div class="mb-4">
                            <p>Address</p>
                            <input type="text" name="address" class="form-control" required>
                        </div>
                        <div class="mb-4">
                            <div class="form-group col-sm-12 flex-column d-flex">
                                <label class="form-label">Blood Group</label>
                                <select class="form-select" name="blood" required="">
                                    <option value="">Choose...</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" name="addBlood" class="btn btn-outline-success"> Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>

    <script>
        // Sidebar toggle
        $(document).ready(function () {
            $('.open-btn').on('click', function () {
                $('.sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>