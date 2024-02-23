<?php
session_start();
include "../Database/connection.php";
include '../Database/sessionUserData.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <!-- Add these lines in the head section -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.bundle.min.css" rel="stylesheet" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">


    <style>
        /* Styling for custom switch button */
        .custom-switch .form-check-input {
            display: none;
        }

        .custom-switch .form-check-label {
            position: relative;
            cursor: pointer;
            padding-left: 35px;
        }

        .custom-switch .form-check-label:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 50px;
            /* Adjust the width as needed */
            height: 25px;
            /* Adjust the height as needed */
            background-color: #ddd;
            border-radius: 15px;
            transition: background-color 0.3s ease;
            display: block;
        }

        .custom-switch .form-check-input:checked+.form-check-label:before {
            background-color: #007bff;
            /* Change to desired color when checked */
        }

        .custom-switch .form-check-input:checked+.form-check-label:after {
            content: '';
            position: absolute;
            top: 3px;
            left: 27px;
            /* Adjust the position as needed */
            width: 20px;
            /* Adjust the width as needed */
            height: 20px;
            /* Adjust the height as needed */
            background-color: #fff;
            border-radius: 50%;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        /* Styling for switch label text */
        .custom-switch .form-check-label {
            color: #333;
            /* Change to desired color */
            font-weight: bold;
            /* Change to desired font weight */
        }

        .hidden {
            display: none;
        }
    </style>


</head>

<body>
    <section style="background-color: #eee;">
        <!-- Modal -->
        <div class="modal" id="editProfileModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- Modal Body -->
                    <div class="modal-body">
                        <!-- Inside the card body where you display user information -->
                        <form form method="post" action="update_profile.php" id="editProfileForm">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label for="firstName">First Name:</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="firstName" name="firstName" class="form-control" value="<?php echo $row['firstName']; ?>">
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-sm-3">
                                    <label for="lastName">Last Name:</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="lastName" name="lastName" class="form-control" value="<?php echo $row['lastName']; ?>">
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-sm-3">
                                    <label for="email">Email:</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="email" id="email" name="email" class="form-control" value="<?php echo $row['email']; ?>">
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-sm-3">
                                    <label for="phone">Phone:</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="number" id="phone" name="phone" class="form-control" value="<?php echo $row['pNumber']; ?>">
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-sm-3">
                                    <label for="dob">Date of Birth:</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="date" id="dob" name="dob" class="form-control" value="<?php echo $row['dob']; ?>">
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-sm-3">
                                    <label for="weight">Weight:</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="number" id="weight" name="weight" class="form-control" value="<?php echo $row['weight']; ?>">
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-sm-3">
                                    <label for="height">Height:</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="number" id="height" name="height" class="form-control" value="<?php echo $row['height']; ?>">
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-sm-3">
                                    <label for="address">Address:</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="address" name="address" class="form-control" value="<?php echo $row['address']; ?>">
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-sm-3">
                                    <label for="city">City:</label>
                                </div>
                                <select class="form-select" name="city">
                                    <option value="<?php echo $row['city']; ?>"><?php echo $row['city']; ?></option>
                                    <option value="Dhaka">Dhaka</option>
                                    <option value="Sylhet">Sylhet</option>
                                    <option value="Khulna">Khulna</option>
                                    <option value="Rajshahi">Rajshahi</option>
                                    <option value="Chottogram">Chottogram</option>
                                    <option value="Rangpur">Rangpur</option>
                                    <option value="Barishal">Barishal</option>
                                </select>
                            </div>


                        </form>
                    </div>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" form="editProfileForm" class="btn btn-primary">Save changes</button>
                    </div>

                </div>
            </div>
        </div>

        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="<?php echo $row['profilepic'] ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3"><?php echo $row['userName'] ?></h5>


                            <div class=" justify-content-center mb-2">
                                <button type="button" class="btn btn-outline-primary ms-1">Upload Profile</button>
                                <button type="button" class="btn btn-outline-primary ms-1" data-bs-toggle="modal" data-bs-target="#editProfileModal">Edit Profile</button>

                            </div>
                        </div>
                    </div>
                    <div class="card mb-4 mb-lg-0">
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush rounded-3">
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fas fa-globe fa-lg text-warning"></i>
                                    <p class="mb-0">https://nexushealth.com</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                                    <p class="mb-0">nexushealth</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                                    <p class="mb-0">@nexushealth</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                                    <p class="mb-0">nexushealth</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                                    <p class="mb-0">nexushealth</p>
                                </li>
                            </ul>
                        </div>
                    </div>


                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Full Name</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?php echo $row['firstName'] . ' ' . $row['lastName'] ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?php echo $row['email'] ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Phone</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?php echo $row['pNumber'] ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Date of birth</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?php echo $row['dob'] ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Weight</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?php echo $row['weight'] ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Height</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?php echo $row['height'] ?>"</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Bload Group</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?php echo $row['bloodGroup'] ?></p>
                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Gender</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?php echo $row['sex'] ?></p>
                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Address</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?php echo $row['address'] ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">City</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?php echo $row['city'] ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="col-md-12">
                                <!-- Switch button -->
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="notificationSwitch">
                                    <label class="form-check-label" for="notificationSwitch">Me available for donate blood.</label>
                                </div>




                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-4 mb-md-0">
                                <div class="card-body">
                                    <p class="mb-4"><span class="text-primary font-italic me-1">Statistic</span> (Work in progress)
                                    </p>
                                    <p class="mb-1" style="font-size: .88rem;">Blood donated: </p>
                                    <!-- <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 80%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div> -->
                                    <p class="mt-4 mb-1" style="font-size: .88rem;">Last blood donated date: </p>
                                    <!-- <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 72%"
                                            aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div> -->
                                    <p class="mt-4 mb-1" style="font-size: .88rem;">Doctor appointment </p>
                                    <!-- <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 89%"
                                            aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div> -->
                                    <p class="mt-4 mb-1" style="font-size: .88rem;">Self-diagnosis report</p>
                                    <!-- <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 55%"
                                            aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div> -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Add this line at the bottom of the body section -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>


    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!-- Bootstrap JS (Make sure you have included Bootstrap JS in your project) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <script>
        function toggleEditProfileForm() {
            var form = document.getElementById("editProfileForm");
            if (form.classList.contains("hidden")) {
                form.classList.remove("hidden");
            } else {
                form.classList.add("hidden");
            }
        }
    </script>
</body>

</html>