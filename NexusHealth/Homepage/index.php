<?php

session_start();
include "../Database/connection.php";
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
        integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
</head>

<body>

    <!-- Heroes Section -->
    <section>
        <div style="background-color: #212529;">
            <header class="p-3">
                <div class="container">
                    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                        <a href="index.php"
                            class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                            <img src="../logo/1.png" alt="logo1" style="width: 210px;">
                        </a>

                        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                            <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
                            <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
                            <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
                            <li><a href="#" class="nav-link px-2 text-white">About</a></li>
                        </ul>

                        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                            <input type="search" class="form-control form-control-dark text-bg-dark"
                                placeholder="Search..." aria-label="Search">
                        </form>

                        <!-- Login-Signup visible when there is no session. -->
                        <?php
                        if (!isset($_SESSION['userName'])) {
                            echo "<div class='text-end'>
                            <a href='../Authentication/login.php'><button type='button'
                                    class='btn btn-outline-light me-2'>Login</button></a>
                            <a href='../Authentication/register.php'><button type='button' class='btn btn-warning'>Sign-up</button></a>
                        </div>";
                            // Profile Section appear when there is session.
                        } else {
                            include "../Database/sessionUserData.php";
                            echo "
                            <div class='dropdown text-end'>
                                <a href='#' class='d-block link-body-emphasis text-decoration-none dropdown-toggle'
                                    data-bs-toggle='dropdown' aria-expanded='false'>
                                <img src='" . $row['profilepic'] . "' alt='' width='32' height='32' class='rounded-circle'>
                                </a>
                                <ul class='dropdown-menu text-small'>
                                    <li><a class='dropdown-item' href='#'>Settings</a></li>
                                    <li><a class='dropdown-item' href='#'>Profile</a></li>
                                    <li>
                                    <hr class='dropdown-divider'>
                                    </li>
                                    <li><a class='dropdown-item' href='../Authentication/logout.php'>Sign out</a></li>
                                </ul>
                             </div>
                            ";
                        }
                        ?>
                    </div>
                </div>
            </header>

            <!-- Welcome Section -->
            <div class="container col-xxl-8 px-4 py-5">
                <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                    <div class="col-10 col-sm-8 col-lg-6">
                        <img src="../logo/2.png" alt="Bootstrap Themes" width="700">
                    </div>
                    <div class="col-lg-6">
                        <h4 class="fw-bold text-body-emphasis lh-1 mb-3">Welcome to NexusHealth, your
                            one-stop destination for comprehensive healthcare services.</h4>
                        <p class="fs-6 lead" style="text-align: justify;">
                            Discover a world of convenience at your fingertips, where you can seamlessly
                            book doctor appointments, access a well-stocked pharmacy, and find vital support from our
                            blood bank. Our user-friendly platform is designed to simplify your healthcare journey,
                            ensuring prompt and reliable care. Trust in our commitment to providing top-notch medical
                            services, expert guidance, and a seamless user experience.
                        </p>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                            <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Primary</button>
                            <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Features Section -->
            <div class="d-flex justify-content-center">
                <div class="container-fluid align-items-center p-5" style="background-color: #212539;">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="card">
                                <img src="../logo/3.avif" class="card-img-top" alt="Image 1">
                                <div class="card-body">
                                    <h5 class="card-title">Card 2</h5>
                                    <p class="card-text">Text for Card 2 goes here.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="card">
                                <img src="../logo/4.avif" class="card-img-top" alt="Image 2">
                                <div class="card-body">
                                    <h5 class="card-title">Card 2</h5>
                                    <p class="card-text">Text for Card 2 goes here.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="card">
                                <img src="../logo/5.jpg" class="card-img-top" alt="Image 3">
                                <div class="card-body">
                                    <h5 class="card-title">Card 3</h5>
                                    <p class="card-text">Text for Card 3 goes here.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="card">
                                <img src="../logo/6.jpg" class="card-img-top" alt="Image 4">
                                <div class="card-body">
                                    <h5 class="card-title">Card 4</h5>
                                    <p class="card-text">Text for Card 4 goes here.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>