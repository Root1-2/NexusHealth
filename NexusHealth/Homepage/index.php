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

    <style>
        .carousel-item {
            height: 60vh;
            min-height: 350px;
            /* Optional: you can set a minimum height */
            max-height: 600px;
            /* Optional: you can set a maximum height */
            overflow: hidden;
        }

        .carousel-item img {
            position: absolute;
            top: 0;
            left: 0;
            min-height: 100%;
            min-width: 100%;
            height: 100%;
            object-fit: contain;
        }
    </style>

</head>

<body>

    <!-- Heroes Section -->
    <section>
        <div style="background-color: #2e68eb;">
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
                        <img src="../logo/7.png" alt="Bootstrap Themes" width="700">
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
                    </div>
                </div>
            </div>

            <!-- Features Section -->
            <div class="container-fluid align-items-center p-5" style="background-color: #212539;">
                <div class="row justify-content-center">
                    <div class="col-md-2">
                        <div class="card">
                            <img src="../logo/3.jpg" class="card-img-top" alt="Image 1">
                            <div class="card-body">
                                <h5 class="card-title">Doctor Appoinments</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card">
                            <img src="../logo/4.jpg" class="card-img-top" alt="Image 2">
                            <div class="card-body">
                                <h5 class="card-title">Blood Bank</h5><br>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card">
                            <img src="../logo/5.jpg" class="card-img-top" alt="Image 3">
                            <div class="card-body">
                                <h5 class="card-title">Pharmacy</h5><br>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card">
                            <img src="../logo/6.jpg" class="card-img-top" alt="Image 4">
                            <div class="card-body">
                                <h5 class="card-title">Self-Diagnosis</h5><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Carousel Section -->
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../logo/7.jpg" class="d-block w-100" alt="..."
                            style="object-fit: cover; height: 60%;">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="../logo/8.jpg" class="d-block w-100" alt="..."
                            style="object-fit: cover; height: 60%;">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="../logo/9.jpg" class="d-block w-100" alt="..."
                            style="object-fit: cover; height: 60%;">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <!-- Footer Section -->
            <footer class="text-center text-lg-start text-white" style="background-color: rgba(0, 0, 0, 0.2)">
                <div class="container p-4 pb-0">
                    <section class="">
                        <div class="row">
                            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                                <h6 class="text-uppercase mb-4 font-weight-bold">
                                    NexusHealth
                                </h6>
                                <p>
                                    Here you can use rows and columns to organize your footer
                                    content. Lorem ipsum dolor sit amet, consectetur adipisicing
                                    elit.
                                </p>
                            </div>

                            <hr class="w-100 clearfix d-md-none" />

                            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                                <h6 class="text-uppercase mb-4 font-weight-bold">Products</h6>
                                <p>
                                    <a class="text-white">MDBootstrap</a>
                                </p>
                                <p>
                                    <a class="text-white">MDWordPress</a>
                                </p>
                                <p>
                                    <a class="text-white">BrandFlow</a>
                                </p>
                                <p>
                                    <a class="text-white">Bootstrap Angular</a>
                                </p>
                            </div>

                            <hr class="w-100 clearfix d-md-none" />

                            <hr class="w-100 clearfix d-md-none" />

                            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                                <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
                                <p><i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
                                <p><i class="fas fa-envelope mr-3"></i> info@gmail.com</p>
                                <p><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
                                <p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
                            </div>

                            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                                <h6 class="text-uppercase mb-4 font-weight-bold">Follow us</h6>

                                <a class="btn btn-primary btn-floating m-1" style="background-color: #3b5998" href="#!"
                                    role="button"><i class="fab fa-facebook-f"></i></a>

                                <a class="btn btn-primary btn-floating m-1" style="background-color: #55acee" href="#!"
                                    role="button"><i class="fab fa-twitter"></i></a>

                                <a class="btn btn-primary btn-floating m-1" style="background-color: #dd4b39" href="#!"
                                    role="button"><i class="fab fa-google"></i></a>

                                <a class="btn btn-primary btn-floating m-1" style="background-color: #ac2bac" href="#!"
                                    role="button"><i class="fab fa-instagram"></i></a>

                                <a class="btn btn-primary btn-floating m-1" style="background-color: #0082ca" href="#!"
                                    role="button"><i class="fab fa-linkedin-in"></i></a>

                                <a class="btn btn-primary btn-floating m-1" style="background-color: #333333" href="#!"
                                    role="button"><i class="fab fa-github"></i></a>
                            </div>
                        </div>
                    </section>
                </div>

                <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
                    © 2023 Copyright:
                    <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
                </div>
            </footer>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>