<?php

session_start();
if (!isset($_SESSION['userName'])) {
    echo "<script>alert('You have to Login First!!!')</script>";
    echo "<script>location.href='../Authentication/login.php'</script>";
}
include '../Database/connection.php'
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Bank</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        body {
            background: rgb(1, 9, 28);
            background: linear-gradient(90deg, rgba(1, 9, 28, 1) 8%, rgba(0, 23, 64, 1) 31%, rgba(6, 54, 100, 1) 65%, rgba(2, 11, 26, 1) 88%);
        }
    </style>
</head>

<body>

    <!-- Heroes Section -->
    <div class="bg-image img-fluid " style="
        background-image: url('../logo/Blood-Donation-1.jpg');
        background-size: 100% auto;
        height: 100vh;
    ">
        <?php include 'header.php' ?>

    </div>

    <!-- Benefits Section -->
    <div class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="../logo/Benefits-of-blood-donation-removebg-preview.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="1000"
                    height="500" loading="lazy">
            </div>
            <div class="col-lg-6">
                <h1 class="display-5 text-info fw-bold lh-1 mb-3">Responsive left-aligned hero with image</h1>
                <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s
                    most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid
                    system, extensive prebuilt components, and powerful JavaScript plugins.</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Primary</button>
                    <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Donor List -->
    <?php include '../Database/registerdata.php'; ?>

    <div class="m-5 rounded">
        <table class="table table-dark table-striped border border-secondary rounded">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Blood Group</th>
                    <th scope="col">Address</th>
                    <th scope="col">Contact Number</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($alldata)) {
                    echo "<tr>
                <td>" . $row['firstName'] . " " . $row['lastName'] . "</td>
                <td>" . $row['bloodGroup'] . "</td>
                <td>" . $row['city'] . "</td>
                <td>" . $row['pNumber'] . "</td>
            </tr>";
                }

                ?>
            </tbody>
        </table>
    </div>


</body>

</html>