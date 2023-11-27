<div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary" style="width: 280px; height: 100px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <a href="../Homepage/index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-decoration-none">
            <img src="../logo/reglogo.png" alt="logo1" style="width: 200px;">
        </a>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="doctorhome.php" class="nav-link <?php if (isset($_SESSION['doctorHome']))
                echo "active" ?>" aria-current="page">
                    <i class="bi bi-speedometer me-2" width="16" height="16"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="appointmentlist.php" class="nav-link link-body-emphasis <?php if (isset($_SESSION['appointmentlist']))
                echo "active" ?>">
                    <i class="bi bi bi-calendar3 me-2" width="16" height="16"></i>
                    Appointments
                </a>
            </li>
            <li>
                <a href="doctorList.php" class="nav-link link-body-emphasis <?php if (isset($_SESSION['doctorList']))
                echo "active" ?>">
                    <i class="bi bi-file-medical me-2" width="16" height="16"></i>
                    Doctors
                </a>
            </li>
        </ul>
        <hr>
        <div class="dropdown">
            <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle='dropdown'
                aria-expanded='false'>
                <img src=" <?php echo $row['profilepic'] ?>  " alt="" width="32" height="32" class="rounded-circle">
        </a>
        <ul class="dropdown-menu text-small">
            <li><a class="dropdown-item" href="../Homepage/profile.php">Profile</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="../Authentication/logout.php">Sign out</a></li>
        </ul>
    </div>
</div>