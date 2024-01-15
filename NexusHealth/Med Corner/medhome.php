<?php
session_start();
if (!isset($_SESSION['userName'])) {
    echo "<script>alert('Please Login First!')</script>";
    echo "<script>location.href='../Homepage/index.php'</script>";
}
include "../Database/connection.php";
include "../Database/sessionUserData.php";
$meddata = mysqli_query($conn, "SELECT * FROM `medcorner`");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Med corner</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
        integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <!-- Fontawesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Lemon&family=Oswald:wght@500&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <style>
        .dashicon {
            color: #0d6efd;
        }

        body {
            background-color: #f2f5fa;
        }

        .bigger-currency {
            font-size: 1.7rem;
            /* Adjust the font size as needed */
        }

        body {
            font-family: 'Dancing Script', cursive;
            font-family: 'Lemon', serif;
            font-family: 'Oswald', sans-serif;
        }

        .category-box {
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .category-box:hover {
            background-color: #3498db;
            cursor: pointer;
        }

        .category-box a {
            text-decoration: none;
            color: #333;
        }

        .category-box i {
            margin-right: 8px;
        }



        .sidebar {
            width: 400px;
            height: 100%;
            position: fixed;
            top: 0;
            right: -400px;
            background-color: #f9f9f9;
            padding: 20px;
            transition: left 0.3s ease;
            z-index: 10;
        }

        .show-sidebar {
            right: 0;
        }

        #cartContainer {
            position: relative;
            /* To position the count badge relative to the container */
        }

        #cartCount {
            position: absolute;
            /* To position the count badge absolute to the container */
            top: 0px;
            /* Adjust the top position as needed */
            right: 0px;
            /* Adjust the right position as needed */
        }

        #searchInput {
            display: none;
            transition: width 0.3s ease;
            width: 0;
            padding: 0;
            border: none;
            outline: none;
        }

        #searchButton:hover+#searchInput {
            display: inline-block;
            width: 150px;
            /* Adjust the width as needed */
            padding: 5px;
            /* Adjust the padding as needed */
            border: 1px solid #ccc;
            /* Add border style as needed */
            border-radius: 4px;
            /* Add border-radius as needed */
            margin-right: 5px;
            /* Adjust the margin-right as needed */
        }
    </style>


</head>

<body>
    <div class="container-fluid">
        <div class="d-flex flex-row">
            <?php include 'sidebar.php'; ?>

            <!-- Dashboard Section -->
            <div class="px-5 py-3" style="width: 100%;">
                <div>


                    <div class="d-flex justify-content-between">
                        <div>
                            <i class="bi bi-capsule-pill dashicon display-6 me-2"></i>
                            <span class="display-5 slide-in-from-left">Medicine Corner</span>
                        </div>

                        <div id="cartContainer" class="d-flex align-items-center">
                            <button id="searchButton" class="btn"><i
                                    class="fa-solid fa-magnifying-glass fa-fw"></i></button>
                            <button id="cartButton" class="btn"><i class="fa-solid fa-cart-shopping ms-2"></i></button>
                            <span id="cartCount" class="badge bg-danger">0</span>
                            <input type="text" id="searchInput" class="search-input" placeholder="Search">
                        </div>









                        <div id="sidebar" class="sidebar">
                            <p class="d-flex justify-content-center">Your Medicine</p>
                            <hr>
                            <!-- Add any other sidebar content here -->
                            <h5>Work in progress</h5>
                        </div>



                    </div>

                    <hr class="bg-primary">
                </div>

                <!-- Card Section -->
                <div class="row med-list-container">
                    <?php
                    if (isset($_POST['selectedcategory'])) {
                        $selectedcategory = $_POST['selectedcategory'];
                        $meddata = mysqli_query($conn, "SELECT * FROM `medcorner` WHERE `medcategory` = '$selectedcategory'");
                    } else {
                        $meddata = mysqli_query($conn, "SELECT * FROM `medcorner`");
                    }

                    while ($row = mysqli_fetch_array($meddata)) {
                        echo "
                            <div class='col-md-3 mb-4'>
                                <div class='card rounded custom-card' style='height: 400px;'> <!-- Set a fixed height -->
                                    <img src='" . $row['medpic'] . "' class='img-fluid' alt='...' style='object-fit: cover; height: 60%;'> <!-- Set height for image -->
                                    <div class='card-body'>
                                        <h5 class='card-text fw-bold'>" . $row['medname'] . "</h5>
                                        <p class='card-title text-primary'>" . $row['medgroup'] . "</p>
                                        <p class='card-title text-success'>" . $row['medcompany'] . "</p>
                                        <div class='d-flex justify-content-between'>
                                            <p class='card-text fw-semibold bigger-currency'>" . $row['medprice'] . '৳' . "</p>
                                            <button class='btn' title='Add to Cart'><i class='fa-solid fa-cart-plus fa-fw'></i></button>

                                        </div>
                                        
                                    </div>
                                </div>
                            </div>";
                    }
                    ?>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>

    <script>
        let cartCount = 0;

        document.addEventListener('DOMContentLoaded', function () {
            const sidebar = document.getElementById('sidebar');
            const cartButton = document.getElementById('cartButton');
            const cartCountSpan = document.getElementById('cartCount');

            cartButton.addEventListener('click', function () {
                sidebar.classList.toggle('show-sidebar');
            });

            document.addEventListener('click', function (e) {
                const isClickInsideSidebar = sidebar.contains(e.target);
                const isClickOnCartButton = cartButton.contains(e.target);

                if (!isClickInsideSidebar && !isClickOnCartButton) {
                    sidebar.classList.remove('show-sidebar');
                }
            });

            // Event listener for the "Add to Cart" button in each card
            document.querySelectorAll('.card button').forEach(button => {
                button.addEventListener('click', function () {
                    cartCount++;
                    cartCountSpan.innerText = cartCount;
                });
            });

            // Your existing event listeners
            document.getElementById('searchButton').addEventListener('click', function () {
                // Handle search button click here
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            const searchButton = document.getElementById('searchButton');
            const searchInput = document.getElementById('searchInput');

            searchButton.addEventListener('click', function () {
                searchInput.classList.toggle('show-search-input');
                if (searchInput.classList.contains('show-search-input')) {
                    searchInput.focus(); // Optionally focus on the input when it's displayed
                }
            });
        });
    </script>

</body>

</html>