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
    <!-- DataTable -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" />

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

        p,
        a,
        span {
            font-size: 0.9rem;
        }

        .timeline p,
        .timeline span {
            font-size: 0.8rem;
        }

        #side_nav {
            transition: all 0.3s;
        }

        #side_nav.active {
            margin-left: -16rem;
            /* position: absolute; */
            min-height: 100vh;
            z-index: 2;
        }

        #side_nav {
            margin-left: 0;
        }

        /* Timeline */
        .timeline {
            border-left: 1px solid #0388fc;
            position: relative;
            list-style: none;
        }

        .timeline .timeline-item {
            position: relative;
        }

        .timeline .timeline-item:after {
            position: absolute;
            display: block;
            top: 0;
        }

        .timeline .timeline-item:after {
            background-color: #0388fc;
            left: -38px;
            border-radius: 50%;
            height: 11px;
            width: 11px;
            content: "";
        }

        /* Popup */
        .popupOverlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 99;
            display: none;
            backdrop-filter: blur(5px);
        }

        .popupForm {
            background-color: #fff;
            transform: scale(0.01);
            visibility: hidden;
            position: absolute;
            top: 0%;
            left: 20%;
            z-index: 100;
            transition: all 0.3s;
        }

        .open-popup {
            visibility: visible;
            transform: scale(1);
        }
    </style>
</head>

<body>
    <div class='d-flex flex-nowrap'>
        <div>
            <?php include 'adminSideBar.php'; ?>
        </div>
        <div class="" style="width: 100%;">
            <button class="btn open-btn position-fixed"><i class="fa-solid fa-bars-staggered"></i></button> <br>
            <div class="d-flex flex-wrap">
                <!-- Table Section -->
                <div class="col-lg-8 px-5">
                    <table id="dataTable"
                        class="table align-middle mb-0 bg-white border border-1 border-secondary-subtle rounded p-4 shadow-lg">
                        <thead class="bg-light">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Chamber</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../Database/connection.php';
                            $doctorsdata = mysqli_query($conn, "SELECT * FROM `doctorlist`");

                            while ($row = mysqli_fetch_array($doctorsdata)) 
                            {
                                $words = str_word_count($row['qualification']);
                                $phoneNumbers = $row['phoneNumber'];
                                echo "
                                <tr>
                                    <td>
                                        <p>" . $row['id'] . "</p>
                                    </td>
                                    <td>
                                        <div class='d-flex align-items-center'>
                                            <div>
                                                <p class='fw-bold mb-1'>" . $row['doctorName'] . " </p>
                                                <p class='fw-bold text-muted mb-0'>" . $row['department'] . " </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td><p>" . $row['hospital/chamber'] . "</p></td>
                                    <td>";

                                    $matches = preg_split('/\s+/', $phoneNumbers);
                                    foreach ($matches as $number) {
                                        echo "<span class='badge text-bg-success rounded-pill d-block mb-1'>$number</span>";
                                    }

                                    echo "</td>
                                    <td>
                                        <div class='d-flex'>
                                            <button class='btn btn-outline-primary rounded-pill me-3'><i class='fa-solid fa-user'></i></button>
                                            <button class='btn btn-outline-success rounded-pill me-3' onclick='openPopup(<?php echo $row["id"]; ?>)'><i class='fa-solid fa-pen-to-square'></i></button>
                                            <button class='btn btn-outline-danger rounded-pill'><i class='fa-solid fa-trash-can'></i></button>
                                        </div>
                                    </td>
                                </tr>";   
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- Profile Section -->
                <div class="col-lg-4 col-md-8 rounded-2 mt-5 p-3 container-fluid ms-0"
                    style="background-color: #fff; height: 40rem; width: 30rem; overflow-y: auto;">

                    <div class="d-flex justify-content-between">
                        <p class="">Doctor Name</p>
                        <i class="fa-solid fa-ellipsis"></i>
                    </div>

                    <div class="d-flex justify-content-center">
                        <div class="text-center">
                            <img src="../logo/4.jpg" class="rounded img-fluid" alt="..."
                                style="height: 5rem; width: 5rem;">
                        </div>
                    </div>
                    <div>
                        <table class="table table-sm mt-5 mb-4">
                            <tbody>
                                <tr>
                                    <th>Name</th>
                                    <td> Pew Pew
                                        <?php ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Department</th>
                                    <td>The Wiz</td>
                                </tr>
                                <tr>
                                    <th>Chamber</th>
                                    <td>angelica@ramos.com</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>+1234123123123</td>
                                </tr>
                                <tr>
                                    <th>Time Active</th>
                                    <td><span>Active</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <p class="fw-bold">Appointments</p>
                        <ul class="timeline">
                            <li class="timeline-item mb-1">
                                <p class="fw-bold m-0">Appointee Name</p>
                                <p class="text-muted fw-bold">Appointment Date</p>
                            </li>

                            <li class="timeline-item mb-1">
                                <p class="fw-bold m-0">Appointee Name</p>
                                <p class="text-muted fw-bold">Appointment Date</p>
                            </li>
                            <li class="timeline-item mb-1">
                                <p class="fw-bold m-0">Appointee Name</p>
                                <p class="text-muted fw-bold">Appointment Date</p>
                            </li>
                            <li class="timeline-item mb-1">
                                <p class="fw-bold m-0">Appointee Name</p>
                                <p class="text-muted fw-bold">Appointment Date</p>
                            </li>
                            <li class="timeline-item mb-1">
                                <p class="fw-bold m-0">Appointee Name</p>
                                <p class="text-muted fw-bold">Appointment Date</p>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Blurred overlay -->
    <div class="popupOverlay" id="popupOverlay"></div>

    <!-- Change Form -->
    <div>
        <br><br>
        <div class="justify-content-center my-5 col-lg-7 container-fluid border border-1 border-success-subtle rounded p-4 shadow-lg popupForm"
            id="popupForm">
            <div class="d-flex justify-content-end">
                <button class="btn" onclick="closePopup()"><i class="fa-solid fa-xmark"></i></button>
            </div>

            <form action="registerAction.php" method="POST">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="firstName" class="form-label">First name</label>
                        <input type="text" class="form-control" name="fname" required>
                    </div>

                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">Last name</label>
                        <input type="text" class="form-control" name="lname" required>
                    </div>

                    <div class="col-12">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="uname" required>
                    </div>

                    <div class="col-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="you@example.com" required>
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="pass" required>
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="con_pass" required>
                    </div>

                    <div class="col-12">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" placeholder="Sylhet, Bangladesh" name="address"
                            required>
                    </div>

                    <div class="col-md-6">
                        <label for="country" class="form-label">City</label>
                        <select class="form-select" name="city" required="">
                            <option value="">Choose...</option>
                            <option value="Dhaka">Dhaka</option>
                            <option value="Sylhet">Sylhet</option>
                            <option value="Khulna">Khulna</option>
                            <option value="Rajshahi">Rajshahi</option>
                            <option value="Chottogram">Chottogram</option>
                            <option value="Rangpur">Rangpur</option>
                            <option value="Barishal">Barishal</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="state" class="form-label">Date of Birth</label>
                        <input type="date" name="dob" class="form-control">
                        <div class="invalid-feedback">
                            Please provide a valid state.
                        </div>
                    </div>
                </div>

                <h5 class="my-3">Gender</h5>

                <div class="d-flex my-3">
                    <div class="form-check">
                        <input name="sex" type="radio" class="form-check-input" value="Male" required>
                        <label class="form-check-label">Male</label>
                    </div>
                    <div class="form-check mx-4">
                        <input name="sex" type="radio" class="form-check-input" value="Female" required>
                        <label class="form-check-label">Female</label>
                    </div>
                    <div class="form-check">
                        <input name="sex" type="radio" class="form-check-input" value="Other" required>
                        <label class="form-check-label">Other...</label>
                    </div>
                </div>

                <div class="row gy-3">
                    <div class="col-lg-3">
                        <label class="form-label">Weight</label>
                        <input type="number" class="form-control" name="weight" required>
                    </div>

                    <div class="col-lg-1">
                        <label class="form-label">Height</label>
                        <input type="number" class="form-control" name="ftheight" placeholder="ft" required>
                    </div>

                    <div class="col-lg-1">
                        <br>
                        <input type="number" class="form-control mt-2" name="inheight" placeholder="in" required>
                    </div>

                    <div class="col-lg-6" style="margin-left: 4.2rem;">
                        <label for="cc-name" class="form-label">Mobile Number</label>
                        <input type="text" class="form-control" name="mobile" required>
                    </div>

                    <div class="col-lg-6">
                        <label for="cc-number" class="form-label">Blood Group</label>
                        <select class="form-select" name="blood" required="">
                            <option value="">Choose...</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                    </div>
                </div>

                <hr class="my-4">
                <div class="d-flex justify-content-center">
                    <button class="w-25 btn btn-outline-success" type="submit" name="signup">Update</button>
                </div>

            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <!-- DataTable -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
        // Popup open/close
        let popup = document.getElementById("popupForm");
        let overlay = document.getElementById("popupOverlay");

        function openPopup() {
            popup.classList.add("open-popup");
            overlay.style.display = "block";

            console.log("Doctor ID:", doctorId);
        }
        function closePopup() {
            popup.classList.remove("open-popup");
            overlay.style.display = "none";
        }

        // Sidebar toggle
        $(document).ready(function () {
            $('.open-btn').on('click', function () {
                $('.sidebar').toggleClass('active');
            });
        });

        // DataTable Initialization
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>
</body>

</html>