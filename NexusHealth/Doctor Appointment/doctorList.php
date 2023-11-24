<?php
session_start();
if (!isset($_SESSION['userName'])) {
    echo "<script>alert('Please Login First!')</script>";
    echo "<script>location.href='../Homepage/index.php'</script>";
}
include "../Database/connection.php";
include "../Database/sessionUserData.php";

unset($_SESSION['doctorHome']);
$_SESSION['doctorList'] = 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor List</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
        integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">

    <link rel="stylesheet" href="styles.css">
    <style>
        .custom-container {
            outline: 1px solid;
            /* Add outline to the entire div */
            padding: 10px;
            /* Add some padding for better appearance */
            display: inline-block;
            /* Keep the div inline with its contents */
        }

        .custom-container i {
            font-size: 1.5rem;
            vertical-align: middle;
            /* Align the icon vertically in the middle */
            margin-right: 5px;
            /* Add some space between the icon and the button */
        }

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
        <div class="d-flex flex-row">
            <?php include 'sidebar.php'; ?>

            <div class="px-5 py-3" style="width: 100%;">
                <div>
                    <i class="bi bi-activity dashicon display-6 me-2"></i>
                    <span class="display-5 slide-in-from-left">Doctor List</span>
                    <hr class="bg-primary">
                </div>

                <!-- Select Department -->
                <div class="custom-container mb-5">
                    <i class="bi bi-hospital"></i>
                    <div class="btn-group shadow-0">
                        <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle='dropdown'
                            aria-expanded='false'>
                            Select Department
                        </button>
                        <ul class="dropdown-menu" style="max-height: 30rem; overflow-y: auto;">
                            <li><a class="dropdown-item" href="#">Anaesthesia</a></li>
                            <li><a class="dropdown-item" href="#">Blood Bank</a></li>
                            <li><a class="dropdown-item" href="#">Breast, Colorectal & Laparoscopic Surgery</a></li>
                            <li><a class="dropdown-item" href="#">Cardiac surgery</a></li>
                            <li><a class="dropdown-item" href="#">Cardiology</a></li>
                            <li><a class="dropdown-item" href="#">Clinical Hematology</a></li>
                            <li><a class="dropdown-item" href="#">Colorectal Surgery</a></li>
                            <li><a class="dropdown-item" href="#">Corporate Affairs Department</a></li>
                            <li><a class="dropdown-item" href="#">Dental and Maxillofacial Surgery</a></li>
                            <li><a class="dropdown-item" href="#">Dermatology</a></li>
                            <li><a class="dropdown-item" href="#">Diabetes & Endocrinology</a></li>
                            <li><a class="dropdown-item" href="#">EMERGENCY</a></li>
                            <li><a class="dropdown-item" href="#">ENT, Head & Neck Surgery</a></li>
                            <li><a class="dropdown-item" href="#">Gastroenterology & Hepatology</a></li>
                            <li><a class="dropdown-item" href="#">General & Laparoscopic Surgery</a></li>
                            <li><a class="dropdown-item" href="#">Health Check Up</a></li>
                            <li><a class="dropdown-item" href="#">Hepatobiliary & Pancreatic Surgery</a></li>
                            <li><a class="dropdown-item" href="#">ICU</a></li>
                            <li><a class="dropdown-item" href="#">Internal Medicine</a></li>
                            <li><a class="dropdown-item" href="#">Laboratory Medicine</a></li>
                            <li><a class="dropdown-item" href="#">MRD SERVICES</a></li>
                            <li><a class="dropdown-item" href="#">Nephrology Neurology</a></li>
                            <li><a class="dropdown-item" href="#">Neurosurgery</a></li>
                            <li><a class="dropdown-item" href="#">NICU</a></li>
                            <li><a class="dropdown-item" href="#">Nutrition & Dietetic Department</a></li>
                            <li><a class="dropdown-item" href="#">Obstetrics & Gynecology</a></li>
                            <li><a class="dropdown-item" href="#">Oncology</a></li>
                            <li><a class="dropdown-item" href="#">Orthopedics, Arthoscopy & Joint Replacement</a>
                            </li>
                            <li><a class="dropdown-item" href="#">Pediatric & Neonatology</a></li>
                            <li><a class="dropdown-item" href="#">Pediatric Surgery</a></li>
                            <li><a class="dropdown-item" href="#">Physical Medicine</a></li>
                            <li><a class="dropdown-item" href="#">Plastic & Aesthetic Surgery</a></li>
                            <li><a class="dropdown-item" href="#">Psychiatry</a></li>
                            <li><a class="dropdown-item" href="#">Radiology & Imaging</a></li>
                            <li><a class="dropdown-item" href="#">Respiratory Medicine</a></li>
                            <li><a class="dropdown-item" href="#">Rheumatology</a></li>
                            <li><a class="dropdown-item" href="#">Surgical Oncology</a></li>
                            <li><a class="dropdown-item" href="#">Thoracic Surgery</a></li>
                            <li><a class="dropdown-item" href="#">Urology</a></li>
                            <li><a class="dropdown-item" href="#">Vaccination Center</a></li>
                            <li><a class="dropdown-item" href="#">Vascular Surgery</a></li>
                        </ul>
                    </div>
                </div>

                <div class="d-flex flex-wrap">
                    <!-- Doctor List -->
                    <div class="me-5">
                        <a href="#">
                            <div class="card mb-3 rounded-5" style="width: 30rem;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="../logo/4.jpg" class="img-fluid rounded-start" alt="..."
                                            style="object-fit: cover; height: 100%;">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title text-primary">Doctor Name</h5>
                                            <p class="card-text">Qualification Name</p>
                                            <p class="card-text">Department Name</p>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".dropdown-item").click(function () {
                var selectedDepartment = $(this).text();
                $(".btn.dropdown-toggle").text(selectedDepartment);
            });
        });
    </script>
</body>

</html>