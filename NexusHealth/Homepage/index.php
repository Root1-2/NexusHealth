<?php

session_start();
include "../Database/connection.php";
?>

<!DOCTYPE html>
<html lang="en">

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

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Oswald:wght@500&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="styles.css">
    <style>
        .carousel-image {
            object-fit: contain;
            height: 500px;
            padding: 2% 5%;
        }

        .transparent-input {
            background-color: transparent;
            outline: none;
        }

        .font {
            font-family: 'Dancing Script', cursive;
            font-family: 'Oswald', sans-serif;
        }

        .card {
            opacity: .8;
        }
    </style>

</head>

<body>
    <!-- Heroes Section -->
    <section>
        <div id="heroes">
            <header class="p-3">
                <div class="container">
                    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                        <a href="index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-decoration-none">
                            <img src="../logo/reglogo.png" alt="logo1" style="width: 250px;">
                        </a>

                        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                            <li><a href="#features" class="nav-link px-2 text-dark">Features</a></li>
                            <li><a href="#" class="nav-link px-2 text-dark">Pricing</a></li>
                            <li><a href="#" class="nav-link px-2 text-dark">FAQs</a></li>
                            <li><a href="#" class="nav-link px-2 text-dark">About</a></li>
                        </ul>

                        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                            <input type="search" class="form-control transparent-input" placeholder="Search..."
                                aria-label="Search">
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
                                    <li><a class='dropdown-item' href='profile.php'>Profile</a></li>
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
            <div class="container my-5">
                <div class="row pb-0 pe-lg-0 pt-lg-5 align-items-center">
                    <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
                        <h1 class="font slide-in-from-left">Welcome to NexusHealth, your one-stop destination for
                            comprehensive healthcare services</h1>

                        <p class="lead slide-in-from-bottom">Discover a world of convenience at your fingertips, where
                            you can seamlessly
                            book doctor appointments, access a well-stocked pharmacy, and find vital support from our
                            blood bank. Our user-friendly platform is designed to simplify your healthcare journey,
                            ensuring prompt and reliable care. Trust in our commitment to providing top-notch medical
                            services, expert guidance, and a seamless user experience.</p>
                    </div>
                    <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden">
                        <img class="rounded-lg-3" src="../logo/17715715-removebg.png" alt="" width="400">
                    </div>
                </div>
            </div>
    </section>
    <hr>

    <!-- Feature Section v2 -->
    <section id="features">
        <div class="d-flex justify-content-center features">
            <!-- Horizontal Cards -->
            <div class="p-5">
                <a href="../Doctor Appointment/doctorhome.php">
                    <div class="card horizontal-card mb-3 rounded-5" style="width: 35rem;">
                        <div class="row g-0">
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="cardh card-title text-primary">Doctor Appointment</h5>
                                    <p class="cardp card-text">This is a wider card with supporting text below
                                        as a
                                        natural lead-in to additional content. This content is a little bit
                                        longer.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="../logo/3.jpg" class="img-fluid rounded-start" alt="...">
                            </div>
                        </div>

                </a>
            </div>
            <a href="../Blood Bank/bloodhome.php">
                <div class="card horizontal-card mb-3 rounded-5" style="width: 35rem;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="../logo/4.jpg" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="cardh bloodh card-title text-danger">Blood Bank</h5>
                                <p class="cardp bloodp card-text">This is a wider card with supporting text
                                    below as a natural lead-in to additional content. This content is a little bit
                                    longer.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>

        </div>
        <!-- Vertical Cards -->
        <div class="d-flex px-3 py-5">
            <div class="card vertical-card rounded-5" style="width: 16rem;">
                <img src="../logo/5.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="cardh card-title text-success">Med Corner</h5>
                    <p class="cardp card-text">Some quick example text to build on the card title and make
                        up the
                        bulk of the card's content.</p>
                </div>
            </div>
            <div class="card vertical-card ms-5 rounded-5" style="width: 16rem;">
                <img src="../logo/6.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="cardh card-title text-primary">Self-Diagnosis</h5>
                    <p class="cardp card-text">Some quick example text to build on the card title and make
                        up the
                        bulk of the card's content.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Carousel Section -->
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100 carousel-image" src="../logo/7.jpg" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 carousel-image" src="../logo/8.jpg" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 carousel-image" src="../logo/9.jpg" alt="...">
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
    <hr>
    <!-- Footer Section -->
    <div class="container">
        <footer class="py-3 my-4">
            <div class="row justify-content-center pb-3 mb-3">
                <img src="../logo/reglogo.png" alt="" style="width: 250px;">
            </div>
            <p class="text-center text-body-secondary">© 2023 NexusHealth, Inc</p>
        </footer>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>