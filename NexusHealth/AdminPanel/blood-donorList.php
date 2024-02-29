<?php
session_start();
if (!isset($_SESSION['userName']) || $_SESSION['userName'] !== 'admin') {
    echo "<script>alert('You have to Login First!!!')</script>";
    echo "<script>location.href='../Authentication/login.php'</script>";
}
include '../Database/connection.php';

$bloodbank = 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor List</title>
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
    <style>
        body {
            background-color: #f5f7fb;
        }
    </style>
</head>

<body>
    <div class='d-flex flex-nowrap' style="height: 100vh;">

        <?php include 'adminSideBar.php'; ?>

        <div class="" style="width: 100%; overflow-y: auto;">
            <button class="btn open-btn"><i class="fa-solid fa-bars-staggered"></i></button>

            <!-- Table Section -->
            <div class="col-lg-9 container-fluid" style="background-color: #f5f7fb;">
                <table id="dataTable" class="table border border-1 border-secondary-subtle p-3 shadow-lg">
                    <thead class="bg-light">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Blood Group</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $doctorsdata = mysqli_query($conn, "SELECT * FROM `donor_list`");

                        while ($row = mysqli_fetch_array($doctorsdata)) {
                            echo "
                                <tr>
                                    <td>
                                        <p>" . $row['id'] . "</p>
                                    </td>
                                    <td>
                                        <div class='d-flex align-items-center'>
                                            <div>
                                                <p class='fw-bold mb-1'>" . $row['Name'] . " </p>
                                                <p class='text-muted mb-0'>" . $row['Phone number'] . " </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class='fw-normal badge text-bg-danger rounded-pill d-inline mb-1'>" . $row['BloodGroup'] . " </p>
                                    </td>
                                    <td>" . $row['Address'] . "</td>
                                    <td>
                                        <span class='badge text-bg-" . ($row['status'] == 'Available' ? 'success' : 'danger') . " rounded-pill d-inline'>" . $row['status'] . "</span>
                                    </td>

                                    <td>
                                        <div class='d-flex'>
                                            <button class='btn btn-outline-success rounded-pill me-3' onclick='openPopup(" . $row['id'] . ")' data-bs-toggle='modal' data-bs-target='#editModal'>
                                                <i class='fa-solid fa-pen-to-square'></i></button>
                                            <button class='btn btn-outline-danger rounded-pill' onclick='openDelete(" . $row['id'] . ")' data-bs-toggle='modal' data-bs-target='#deleteModal'>
                                                <i class='fa-solid fa-trash-can'></i></button>
                                        </div>
                                    </td>
                                </tr>";

                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- Delete Popup -->
            <div class="modal fade" id="deleteModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Donor</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <p>Are You Sure You Want To Delete?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                            <form action="blood-Action.php" METHOD="POST">
                                <input type="hidden" id="deleteID" name="deleteID" value="">
                                <button type="submit" name="deleteDonor" class="btn btn-danger">Yes</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Popup -->
            <div class="modal fade" id="editModal">
                <div class="modal-dialog modal-dialog-centered" style="max-width: 50%;">
                    <div class="modal-content p-3 border border-danger" id="popupForm">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 text-danger" id="exampleModalLabel">Edit Donor Details</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="blood-Action.php" method="POST">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label for="Name" class="form-label">Donor Name</label>
                                        <input type="text" class="form-control" name="dname" required>
                                    </div>

                                    <input type="hidden" id="bloodGroup" name="bloodGroup" value="">
                                    <div class="col-6 btn-group shadow-0">
                                        <button type="button" class="btn dropdown-toggle"
                                            data-bs-toggle='dropdown'><span id="selectBlood" value=""></span></button>
                                        <ul class="dropdown-menu" style="max-height: 20rem; width: 15rem;">
                                            <li><a class="dropdown-item" data-value="A+">A+</a></li>
                                            <li><a class="dropdown-item" data-value="A-">A-</a></li>
                                            <li><a class="dropdown-item" data-value="B+">B+</a></li>
                                            <li><a class="dropdown-item" data-value="B-">B-</a></li>
                                            <li><a class="dropdown-item" data-value="AB+">AB+</a></li>
                                            <li><a class="dropdown-item" data-value="AB-">AB-</a></li>
                                        </ul>
                                    </div>

                                    <div class="col-6">
                                        <label for="phone" class="form-label">Contact Number</label>
                                        <input type="tel" class="form-control" name="phone" required>
                                    </div>

                                    <div class="col-12">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="address" class="form-control" name="address" required>
                                    </div>

                                </div>

                                <div class="mt-3 form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="switchCheck">
                                    <label class="form-check-label" for="switchCheck">Available
                                        Status</label>
                                </div>

                                <hr class="my-4">
                                <div class="d-flex justify-content-center">
                                    <button class="w-25 btn btn-outline-success" type="submit"
                                        name="update">Update</button>
                                </div>

                                <input type="hidden" id="id" name="id" value="">
                                <input type="hidden" name="availability_status" id="availability_status" value="">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- DataTable -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>

    <script>
        // DataTable Initialization
        $(document).ready(function () {
            $('#dataTable').DataTable({
            });
        });

        // BloodGroup Dropdown Item Selected
        $(document).ready(function () {
            $(document).ready(function () {
                $(".dropdown-item").click(function (e) {
                    e.preventDefault();

                    var bloodGroup = $(this).attr('data-value');
                    $(".btn.dropdown-toggle").text($(this).text());
                    // Set the value of the hidden input
                    $("#bloodGroup").val(bloodGroup);
                });
            });
        });

        // Edit Profile Popup
        function openPopup(donorId) {
            $.ajax({
                type: "POST",
                url: "donorDataFetch.php",
                data: { donorId: donorId },
                success: function (response) {
                    if (response && response.error) {
                        console.error("Error from server:", response.error);
                    } else {
                        console.log("Donor Data:", response);

                        // Set values in the form fields based on the response
                        $("#popupForm [name=dname]").val(response.Name);
                        $("#popupForm [name=phone]").val(response['Phone number']);
                        $("#popupForm [name=address]").val(response.Address);
                        $("#id").val(response.id);
                        $("#bloodGroup").val(response.BloodGroup);
                        $("#selectBlood").text(response.BloodGroup);
                        if (response.status === "Available") {
                            $("#switchCheck").prop("checked", true);
                            $("#availability_status").val("Available"); // Set value for the hidden input
                        } else {
                            $("#switchCheck").prop("checked", false);
                            $("#availability_status").val("Unavailable"); // Set value for the hidden input
                        }

                        // Event listener for switch button change
                        $("#switchCheck").change(function () {
                            if ($(this).is(":checked")) {
                                $("#availability_status").val("Available");
                            } else {
                                $("#availability_status").val("Unavailable");
                            }
                        });
                    }
                }, error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        }

        // Delete Function
        function openDelete(ID) {
            $("#deleteID").val(ID);
        }
    </script>
</body>

</html>