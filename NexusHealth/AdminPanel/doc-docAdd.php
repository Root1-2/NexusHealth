<?php

session_start();
if (!isset($_SESSION['userName']) || $_SESSION['userName'] !== 'admin') {
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
    <title>Add Doctor</title>
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
                    <form action="doc-docAction.php" method="POST"   enctype="multipart/form-data">
                        <div class="mb-4">
                            <p>Doctor Name</p>
                            <input type="text" name="doctorName" class="form-control" required>
                        </div>
                        <div class="mb-4">
                            <div class="form-group col-sm-12 flex-column d-flex">
                                <label class="form-label">Department</label>
                                <select class="form-select" name="department" required="">
                                    <option value="">Choose...</option>
                                    <option value="">Anesthesiology</option>

                                    <option value="Cardiac surgery">Cardiac surgery</option>
                                    <option value="Cardiology">Cardiology</option>
                                    <option value="Hematology">Hematology</option>
                                    <option value="Colorectal Surgery">Colorectal Surgery</option>
                                    <option value="Dental">Dental</option>
                                    <option value="Dermatology">Dermatology</option>
                                    <option value="Diabetes">Diabetes</option>
                                    <option value="ENT">ENT</option>
                                    <option value="Gastroenterology">Gastroenterology</option>
                                    <option value="General & Laparoscopic Surgery">General & Laparoscopic Surgery
                                    </option>
                                    <option value="Neurology">Neurology</option>
                                    <option value="Neurosurgery">Neurosurgery</option>
                                    <option value="Gynecology">Gynecology</option>
                                    <option value="Orthopedics">Orthopedics</option>
                                    <option value="Pediatrics">Pediatrics</option>
                                    <option value="Pediatric Surgery">Pediatric Surgery</option>
                                    <option value="Physical Medicine">Physical Medicine</option>
                                    <option value="Plastic Surgery">Plastic Surgery</option>
                                    <option value="Psychiatry">Psychiatry</option>
                                    <option value="Rheumatology">Rheumatology</option>
                                    <option value="Medicine">Medicine</option>
                                    <option value="Urology">Urology</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-4">
                            <p>Hospital/Champber</p>
                            <input type="text" name="hospital" class="form-control" required>
                        </div>

                        <div class="mb-4">
                            <p>Qualification</p>
                            <input type="text" name="qualification" class="form-control" required>
                        </div>
                        <div class="mb-4">
                            <p>Phone Number</p>
                            <input type="tel" pattern="(\+88)?-?01[3-9]\d{8}" name="phoneNumber" class="form-control"
                                required>
                        </div>
                        <div class="mb-4">
                            <p>Time 1</p>
                            <input type="text" name="time1" class="form-control" required>
                        </div>

                        <div class="mb-4">
                            <p>Time 2</p>
                            <input type="text" name="time2" class="form-control" required>
                        </div>
                        <div class="mb-4">
                            <p>Time 3</p>
                            <input type="text" name="time3" class="form-control" required>
                        </div>
                        <div class="mb-4">
                            <p>Time 4</p>
                            <input type="text" name="time4" class="form-control" required>
                        </div>


                        <div class="mb-4">
                            <p>Doctor Photo</p>
                            <input type="file" name="photo" class="form-control" required>
                        </div>


                        <div class="d-flex justify-content-center">
                            <button type="submit" name="doctor_add" class="btn btn-outline-success"> Submit</button>
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

</body>

</html>