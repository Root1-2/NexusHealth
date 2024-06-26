<?php
session_start();
if (!isset($_SESSION['userName']) || $_SESSION['userName'] !== 'admin') {
    echo "<script>alert('You have to Login First!!!')</script>";
    echo "<script>location.href='../Authentication/login.php'</script>";
}
include '../Database/connection.php';

$medcorners = 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                            <th>Category</th>
                            <th>Company</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $meddata = mysqli_query($conn, "SELECT * FROM `medcorner`");

                        while ($row = mysqli_fetch_array($meddata)) {
                            echo "
                                <tr>
                                    <td>
                                        <p>" . $row['id'] . "</p>
                                    </td>
                                    <td>
                                        <div class='d-flex align-items-center'>
                                            <div class='d-flex'>
                                                <img class='rounded-pill' src='" . $row['medpic'] . "' height='60' width='60'>
                                                <div class='ms-4'>
                                                    <p class='fw-bold mb-1'>" . $row['medname'] . " </p>
                                                    <p class='badge text-bg-primary fw-normal mb-0'>" . $row['medgroup'] . " </p>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class='fw-normal mt-3 badge text-bg-success rounded-pill'>" . $row['medcategory'] . " </p>
                                    </td>
                                    <td>" . $row['medcompany'] . "</td>
                                    <td>
                                        <span class=''>৳" . $row['medprice'] . "</span>
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
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Medicine</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <p>Are You Sure You Want To Delete?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                            <form action="med-Action.php" METHOD="POST">
                                <input type="hidden" id="deleteID" name="deleteID" value="">
                                <button type="submit" name="deleteMed" class="btn btn-danger">Yes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Popup -->
            <div class="modal fade" id="editModal">
                <div class="modal-dialog modal-dialog-centered" style="max-width: 50%;">
                    <div class="modal-content p-3 border border-success" id="popupForm">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 text-success" id="exampleModalLabel">Edit Medicine Details</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="med-Action.php" method="POST">
                                <div class="d-flex justify-content-around">
                                    <div class="col-6 mt-4 d-flex justify-content-center">
                                        <img class="rounded-pill" src="" alt="pew" id="medImage" height="150" width="150">
                                    </div>
                                    <div class="col-6 ms-3">
                                        <div class="col-12">
                                            <label class="form-label">Medicine Name</label>
                                            <input type="text" class="form-control" name="mname" required>
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label">Medicine Group</label>
                                            <input type="text" class="form-control" name="medgroup" required>
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label">Medicine Category</label>
                                            <input type="tel" class="form-control" name="medcategory" required>
                                        </div>
                                    </div>

                                </div>
                                <div class="row g-3">
                                    <div class="col-6">
                                        <label class="form-label">Med Company</label>
                                        <input type="address" class="form-control" name="medcompany" required>
                                    </div>

                                    <div class="col-6">
                                        <label class="form-label">Price</label>
                                        <input type="digit" class="form-control" name="price" required>
                                    </div>
                                </div>

                                <hr class="my-4">
                                <div class="d-flex justify-content-center">
                                    <button class="w-25 btn btn-outline-success" type="submit"
                                        name="update">Update</button>
                                </div>

                                <input type="hidden" id="id" name="id" value="">
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

        // Edit Profile Popup
        function openPopup(medId) {
            $.ajax({
                type: "POST",
                url: "medDataFetch.php",
                data: { medId: medId },
                success: function (response) {
                    if (response && response.error) {
                        console.error("Error from server:", response.error);
                    } else {
                        console.log("Medicine Data:", response);

                        // Set values in the form fields based on the response
                        $("#popupForm [name=mname]").val(response.medname);
                        $("#popupForm [name=medgroup]").val(response.medgroup);
                        $("#popupForm [name=medcategory]").val(response.medcategory);
                        $("#popupForm [name=medcompany]").val(response.medcompany);
                        $("#popupForm [name=price]").val(response.medprice);
                        $("#medImage").attr("src", response.medpic);
                        $("#id").val(response.id);
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