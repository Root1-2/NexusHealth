<?php

session_start();
if (!isset($_SESSION['userName']) && $_SESSION['userName'] !== 'admin') {
    echo "<script>alert('You have to Login First!!!')</script>";
    echo "<script>location.href='../Authentication/login.php'</script>";
}
include '../Database/connection.php';

$medcorners = 1;

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
    <title>Add Medicine</title>
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
                <div class="justify-content-center my-5 col-lg-7 container-fluid border border-1 border-success-subtle rounded p-4 shadow-lg">
                    <form action="med-Action.php" method="POST" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="Name" class="form-label">Medicine Name</label>
                                <input type="text" class="form-control" name="mname" required>
                            </div>

                            <div class="form-group col-sm-12 flex-column d-flex">
                                <select class="form-select" name="category" required="">
                                    <option value="">Select Category.....</option>
                                    <option value="OTC Medicine">OTC Medicine</option>
                                    <option value="Sexual Wellness">Sexual Wellness</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Medicine Company</label>
                                <input type="tel" class="form-control" name="company" required>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Medicine Group</label>
                                <input type="text" class="form-control" name="group" required>
                            </div>

                            <div class="col-6">
                                <label class="form-label">Price</label>
                                <input type="text" class="form-control" name="price" required>
                            </div>

                            <div class="col-6">
                                <label class="form-label">Medicine Photo</label>
                                <input type="file" class="form-control" name="photo" required>
                            </div>
                        </div>

                        <hr class="my-4">
                        <div class="d-flex justify-content-center">
                            <button class="w-25 btn btn-outline-success" type="submit" name="signup">Add
                                Medicine</button>
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
        // Dropdown Item Selected
        $(document).ready(function () {
            $(".dropdown-item").click(function (e) {
                e.preventDefault();

                var selectedDepartment = $(this).attr('value');
                $(".btn.dropdown-toggle").text($(this).text());
            });
        });
    </script>

</body>

</html>