<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <style>
        .font {
            font-family: 'Dancing Script', cursive;
        }
    </style>
</head>

<body class="bg-body-tertiary">
    <div class="container-fluid">
        <main>
            <div class="py-5 text-center">
                <img src="../logo/reglogo.jpg" alt="Logo" style="width: 400px;">
                <h1 class="font" class="my-4 display-6">Sign-Up</h1>
            </div>

            <div class="row justify-content-center g-5">
                <div class="col-md-6 col-lg-6">
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
                                <input type="email" class="form-control" name="email" placeholder="you@example.com"
                                    required>
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
                            <div class="col-md-3">
                                <label class="form-label">Weight</label>
                                <input type="number" class="form-control" name="weight" required>
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">Height</label>
                                <input type="text" class="form-control" name="height" required>
                            </div>

                            <div class="col-md-6">
                                <label for="cc-name" class="form-label">Mobile Number</label>
                                <input type="text" class="form-control" name="mobile" required>
                            </div>

                            <div class="col-md-6">
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

                        <button class="w-100 btn btn-outline-primary btn-lg" type="submit" name="signup">Sign-Up
                        </button>
                    </form>
                    <h5 class="text-center mt-4">Already Have an Account?</h5>
                    
                    <a href="login.php"><button class="w-100 btn btn-outline-light btn-lg" type="submit" name="signin">Sign-In</button></a>
                </div>
            </div>
        </main>

        <footer class="my-5 pt-5 text-body-secondary text-center text-small">
            <p class="mb-1">© 2023 Nexus Health</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Privacy</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Support</a></li>
            </ul>
        </footer>
    </div>
    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>



</body>

</html>