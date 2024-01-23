<?php

session_start();
if (!isset($_SESSION['userName'])) {
    echo "<script>alert('You have to Login First!!!')</script>";
    echo "<script>location.href='../Authentication/login.php'</script>";
}
include '../Database/connection.php';
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

        #side_nav p,
        #side_nav a,
        #side_nav span {
            color: rgba(233, 236, 239, 1);
        }

        #side_nav {
            transition: all 0.3s;
        }

        #side_nav.active {
            margin-left: -16rem;
            /* position: absolute; */
            min-height: 100vh;
            z-index: 1;
        }

        #side_nav {
            margin-left: 0;
        }
    </style>
</head>

<body>

    <div class='d-flex flex-nowrap'>
        <div>
            <?php include 'adminSideBar.php'; ?>
        </div>
        <div class="" style="width: 100%;">
            <button class="btn open-btn"><i class="fa-solid fa-bars-staggered"></i></button>
            <!-- Table Section -->

        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            $('.open-btn').on('click', function () {
                $('.sidebar').toggleClass('active');
            });
        });
    </script>

</body>

</html>