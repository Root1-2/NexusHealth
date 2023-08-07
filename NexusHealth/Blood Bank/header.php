<header class="p-3 position-relative">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-between justify-content-lg-start">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="../Homepage/index.php" class="nav-link px-2 text-danger">Home</a></li>
                <li><a href="#" class="nav-link px-2 text-danger">Features</a></li>
                <li><a href="#" class="nav-link px-2 text-danger">FAQs</a></li>
                <li><a href="#" class="nav-link px-2 text-danger">About</a></li>
            </ul>

            <div class="position-absolute top-50 start-50 translate-middle">
                <a href="../Homepage/index.php">
                    <img src="../logo/reglogo.png" alt="logo1" style="width: 250px;">
                </a>
            </div>


            <!-- Login-Signup visible when there is no session. -->
            <?php
            if (!isset($_SESSION['userName'])) {
                echo "<div class='text-end'>
                            <a href='../Authentication/login.php'><button type='button'
                                    class='btn me-2' style='background-color: #2fbfbf;'>Login</button></a>
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
