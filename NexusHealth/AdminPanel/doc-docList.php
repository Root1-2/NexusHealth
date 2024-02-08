<?php

session_start();
if (!isset($_SESSION['userName'])) {
    echo "<script>alert('You have to Login First!!!')</script>";
    echo "<script>location.href='../Authentication/login.php'</script>";
}
include '../Database/connection.php';

$doctorappointment = 1;

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
    <!-- DataTable -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" />
    <!-- Animate CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

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

        /* Blurred Background Overlay */
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

        /* Popup Form*/
        .popupForm {
            background-color: #fff;
            transform: scale(0.01);
            visibility: hidden;
            position: absolute;
            top: 5%;
            left: 20%;
            z-index: 100;
            transition: all 0.3s;
        }

        .open-popup {
            visibility: visible;
            transform: scale(1);
        }

        /* Popup Delete */
        .popupDel {
            background-color: #fff;
            position: absolute;
            visibility: hidden;
            top: 33%;
            left: 38%;
            z-index: 100;
            transform: scale(0.01);
            transition: all 0.3s;
        }

        .open-popupDel {
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
                            $doctorsdata = mysqli_query($conn, "SELECT * FROM `doctorlist`");

                            while ($row = mysqli_fetch_array($doctorsdata)) {
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
                                            <button class='btn btn-outline-primary rounded-pill me-3' onclick='openProfile(" . $row['id'] . ")'><i class='fa-solid fa-user'></i></button>
                                            <button class='btn btn-outline-success rounded-pill me-3' onclick='openPopup(" . $row['id'] . ")'><i class='fa-solid fa-pen-to-square'></i></button>
                                            <button class='btn btn-outline-danger rounded-pill' onclick='openDelete(" . $row['id'] . ")'><i class='fa-solid fa-trash-can'></i></button>
                                        </div>
                                    </td>
                                </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- Profile Section -->
                <div class="col-lg-4 col-md-8 rounded-2 mt-5 p-3 container-fluid ms-0" id="profile"
                    style="background-color: #fff; height: 40rem; width: 30rem; overflow-y: auto; display: none;">

                    <div class="d-flex justify-content-between">
                        <p class="">Doctor Name</p>
                        <i class="fa-solid fa-ellipsis"></i>
                    </div>

                    <div class="d-flex justify-content-center">
                        <div class="text-center">
                            <img src="<?php echo $response['doctorPhoto']; ?>" class="rounded img-fluid" alt="..."
                                style="height: 5rem; width: 5rem;">
                        </div>
                    </div>
                    <div>
                        <table class="table table-sm mt-5 mb-4">
                            <tbody>
                                <tr>
                                    <th>Name</th>
                                    <td id="profileName"></td>
                                </tr>
                                <tr>
                                    <th>Department</th>
                                    <td id="profileDepartment"></td>
                                </tr>
                                <tr>
                                    <th class="text-truncate">Qualification</th>
                                    <td id="profileQualification"></td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td id="profilePhone"></td>
                                </tr>
                                <tr>
                                    <th>Slot 1</th>
                                    <td><span id="profileSlot1"></span></td>
                                </tr>
                                <tr>
                                    <th>Slot 2</th>
                                    <td><span id="profileSlot2"></span></td>
                                </tr>
                                <tr>
                                    <th>Slot 3</th>
                                    <td><span id="profileSlot3"></span></td>
                                </tr>
                                <tr>
                                    <th>Slot 4</th>
                                    <td><span id="profileSlot4"></span></td>
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

    <!-- Popup Edit Form -->
    <div>
        <br><br>
        <div class="justify-content-center my-5 col-lg-7 container-fluid border border-1 border-success-subtle rounded p-4 shadow-lg popupForm"
            id="popupForm">
            <div class="d-flex justify-content-end">
                <button class="btn" onclick="closePopup()"><i class="fa-solid fa-xmark"></i></button>
            </div>

            <form action="doc-docAction.php" method="POST">
                <div class="row g-3">
                    <div class="col-12">
                        <label for="Name" class="form-label">Doctor Name</label>
                        <input type="text" class="form-control" name="dname" required>
                    </div>

                    <input type="hidden" id="selectedDepartment" name="department" value="">
                    <input type="hidden" id="id" name="id" value="">
                    <div class="col-6 btn-group shadow-0">
                        <button type="button" class="btn dropdown-toggle" data-bs-toggle='dropdown'>
                            <span id="selectDepartment"></span>
                        </button>
                        <ul class="dropdown-menu" style="max-height: 20rem; overflow-y: auto;">
                            <li><a class="dropdown-item" data-value="Anesthesiology">Anesthesiology</a></li>
                            <li><a class="dropdown-item" data-value="Cardiac surgery">Cardiac surgery</a></li>
                            <li><a class="dropdown-item" data-value="Cardiology">Cardiology</a></li>
                            <li><a class="dropdown-item" data-value="Hematology">Hematology</a></li>
                            <li><a class="dropdown-item" data-value="Colorectal Surgery">Colorectal Surgery</a></li>
                            <li><a class="dropdown-item" data-value="Dental">Dental</a></li>
                            <li><a class="dropdown-item" data-value="Dermatology">Dermatology</a></li>
                            <li><a class="dropdown-item" data-value="Diabetes">Diabetes</a></li>
                            <li><a class="dropdown-item" data-value="ENT">ENT</a></li>
                            <li><a class="dropdown-item" data-value="Gastroenterology">Gastroenterology</a></li>
                            <li><a class="dropdown-item" data-value="General & Laparoscopic Surgery">General &
                                    Laparoscopic Surgery</a></li>
                            <li><a class="dropdown-item" data-value="Neurology">Neurology</a></li>
                            <li><a class="dropdown-item" data-value="Neurosurgery">Neurosurgery</a></li>
                            <li><a class="dropdown-item" data-value="Gynecology">Gynecology</a></li>
                            <li><a class="dropdown-item" data-value="Orthopedics">Orthopedics</a></li>
                            <li><a class="dropdown-item" data-value="Pediatrics">Pediatrics</a></li>
                            <li><a class="dropdown-item" data-value="Pediatric Surgery">Pediatric Surgery</a></li>
                            <li><a class="dropdown-item" data-value="Physical Medicine">Physical Medicine</a></li>
                            <li><a class="dropdown-item" data-value="Plastic Surgery">Plastic Surgery</a></li>
                            <li><a class="dropdown-item" data-value="Psychiatry">Psychiatry</a></li>
                            <li><a class="dropdown-item" data-value="Rheumatology">Rheumatology</a></li>
                            <li><a class="dropdown-item" data-value="Medicine">Medicine</a></li>
                            <li><a class="dropdown-item" data-value="Urology">Urology</a></li>
                        </ul>
                    </div>

                    <div class="col-6">
                        <label for="phone" class="form-label">Contact Number</label>
                        <input type="tel" class="form-control" name="phone" required>
                    </div>

                    <div class="col-12">
                        <label for="hospital" class="form-label">Hospital/Chamber</label>
                        <input type="hospital" class="form-control" name="hospital" required>
                    </div>

                    <div class="col-12">
                        <label for="address" class="form-label">Qualification</label>
                        <input type="text" class="form-control" name="qual" required>
                    </div>

                    <div class="col-3">
                        <label for="slots" class="form-label">Slot 1</label>
                        <input type="text" class="form-control" name="slot1" required>
                    </div>
                    <div class="col-3">
                        <label for="slots" class="form-label">Slot 2</label>
                        <input type="text" class="form-control" name="slot2" required>
                    </div>
                    <div class="col-3">
                        <label for="slots" class="form-label">Slot 3</label>
                        <input type="text" class="form-control" name="slot3" required>
                    </div>
                    <div class="col-3">
                        <label for="slots" class="form-label">Slot 4</label>
                        <input type="text" class="form-control" name="slot4" required>
                    </div>

                </div>
                <hr class="my-4">
                <div class="d-flex justify-content-center">
                    <button class="w-25 btn btn-outline-success" type="submit" name="update">Update</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Popup -->
    <div class="col-lg-3 container-fluid border border-1 border-danger-subtle rounded-5 p-4 shadow-lg popupDel"
        id="popupDel">
        <div class="d-flex justify-content-center">
            <i class="p-3 fa-solid fa-x rounded rounded-pill animate__animated"
                style="background-color: #cf3834; color: #fff; font-size: 2rem;"></i>
        </div>
        <div class="mt-3 d-flex justify-content-center">
            <p class="h4">Are You Sure You Want to Delete?</p>
        </div>
        <p class="h4 text-center text-info" id="idshow">ID</p>

        <div class="mt-5 gap-5 d-flex justify-content-center">
            <button class="btn btn-outline-danger" onclick="deleteDoctor()">Yes</button>
            <button class="btn btn-outline-primary" onclick="closeDelete()">No</button>
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
        // Dropdown Item Selected
        $(document).ready(function () {
            $(document).ready(function () {
                $(".dropdown-item").click(function (e) {
                    e.preventDefault();

                    var selectedDepartment = $(this).attr('data-value');
                    $(".btn.dropdown-toggle").text($(this).text());

                    // Set the value of the hidden input
                    $("#selectedDepartment").val(selectedDepartment);
                });
            });
        });

        // Profile Open/Close
        let profile = document.getElementById("profile");
        function openProfile(rowId) {
            $.ajax({
                type: "POST",
                url: "docDataFetch.php",
                data: { rowId: rowId },
                success: function (response) {
                    if (response && response.error) {
                        console.error("Error from server:", response.error);
                    } else {
                        console.log("Doctor Data:", response);

                        // Set profile data
                        $("#profileName").text(response.doctorName);
                        $("#profileDepartment").text(response.department);
                        $("#profileQualification").text(response.qualification);
                        $("#profilePhone").text(response.phoneNumber);
                        $("#profileSlot1").text(response.time1);
                        $("#profileSlot2").text(response.time2);
                        $("#profileSlot3").text(response.time3);
                        $("#profileSlot4").text(response.time4);
                        $("#profile img").attr("src", response.doctorPhoto);
                    }
                }, error: function (xhr, status, error) {
                    console.error(error);
                }
            });

            profile.style.display = "block";
        }

        // Popup open/close
        let popup = document.getElementById("popupForm");
        let overlay = document.getElementById("popupOverlay");
        function openPopup(rowId) {
            $.ajax({
                type: "POST",
                url: "docDataFetch.php",
                data: { rowId: rowId },
                success: function (response) {
                    if (response && response.error) {
                        console.error("Error from server:", response.error);
                    } else {
                        console.log("Doctor Data:", response);

                        $("#popupForm [name=dname]").val(response.doctorName);
                        $("#id").val(response.id);
                        $("#selectDepartment").text(response.department);
                        $("#popupForm [name=hospital]").val(response['hospital/chamber']);
                        $("#popupForm [name=department]").val(response.department);
                        $("#popupForm [name=qual]").val(response.qualification);
                        $("#popupForm [name=phone]").val(response.phoneNumber);
                        $("#popupForm [name=slot1]").val(response.time1);
                        $("#popupForm [name=slot2]").val(response.time2);
                        $("#popupForm [name=slot3]").val(response.time3);
                        $("#popupForm [name=slot4]").val(response.time4);
                    }
                }, error: function (xhr, status, error) {
                    console.error(error);
                }
            });

            popup.classList.add("open-popup");
            overlay.style.display = "block";

            console.log("Doctor ID:", rowId);
        }
        function closePopup() {
            popup.classList.remove("open-popup");
            overlay.style.display = "none";
        }

        // Delete Popup
        let popupDel = document.getElementById("popupDel");
        var deleteRowId;
        function openDelete(rowId) {
            popupDel.classList.add("open-popupDel");
            popupDel.querySelector('.fa-x').classList.add("animate__bounce");
            $("#idshow").text(rowId);
            overlay.style.display = "block";
            deleteRowId = rowId;

            console.log("Doctor ID:", rowId);
        }
        function closeDelete() {
            popupDel.classList.remove("open-popupDel");
            popupDel.querySelector('.fa-x').classList.remove("animate__bounce");
            overlay.style.display = "none";
            console.log("Closed");
        }
        // If pressed yes
        function deleteDoctor() {
            window.location.href = "doc-docAction.php?deleteid=" + deleteRowId;
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