<style>
    #side_nav p,
    #side_nav a,
    #side_nav span {
        color: #fff;
        font-size: 0.9rem;
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
</style>

<div class="ps-3 py-3 border-end sidebar" id="side_nav"
    style="width: 16rem; min-height: 100vh; max-height: auto; background-color: #222e3c;">
    <div class="pb-3 mb-3 link-body-emphasis text-decoration-none border-bottom">
        <div class="d-flex flex-wrap">
            <i class="fa-solid fa-user-gear fs-4"></i>
            <p class="ms-3 fs-5 fw-semibold">Admin Panel</p>
        </div>
        <p>admin@gmail.com</p>
    </div>
    <div>
        <ul class="list-unstyled ps-0">
            <li class="mb-1">
                <a href="index.php">
                    <div class="p-2">
                        <i class="fa-solid fa-house"></i>
                        <button class="btn btn-toggle d-inline-flex rounded border-0 collapsed">
                            <span>Home</span>
                        </button>
                    </div>
                </a>
            </li>

            <li class="border-top mb-3"></li>

            <li class="mb-1">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                    data-bs-toggle="collapse" data-bs-target="#blood-collapse">
                    <span><i class="fa-solid fa-droplet me-3"></i>Blood Bank</span>
                </button>
                <div class="collapse <?php if (isset($bloodbank))
                    echo "show"; ?>" id="blood-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal px-4 small">
                        <li><a href="blood-donorList.php"
                                class="link-body-emphasis d-inline-flex p-1 text-decoration-none rounded"><span>Donor
                                    List</span></a></li>
                        <li><a href="blood-addBlood.php"
                                class="link-body-emphasis d-inline-flex p-1 text-decoration-none rounded"><span>Add
                                    Donor</span></a></li>
                    </ul>
                </div>
            </li>

            <li class="mb-1">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                    data-bs-toggle="collapse" data-bs-target="#orders-collapse">
                    <span><i class="fa-solid fa-user-doctor me-3"></i>Doctor Appointment</span>
                </button>
                <div class="collapse <?php if (isset($doctorappointment))
                    echo "show"; ?>" id="orders-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal px-4 small">
                        <li><a href="doc-docList.php"
                                class="link-body-emphasis d-inline-flex p-1 text-decoration-none rounded"><span>Doctor
                                    List</span></a></li>
                        <li><a href="doc-appList.php"
                                class="link-body-emphasis d-inline-flex p-1 text-decoration-none rounded"><span>Appointments
                                    List</span></a></li>
                        <li><a href="doc-docAdd.php"
                                class="link-body-emphasis d-inline-flex p-1 text-decoration-none rounded"><span>Add
                                    Doctors</span></a></li>
                    </ul>
                </div>
            </li>

            <li class="mb-1">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                    data-bs-toggle="collapse" data-bs-target="#med-collapse">
                    <span><i class="fa-solid fa-pills me-3"></i>Med Corner</span>
                </button>
                <div class="collapse <?php if (isset($medcorners))
                    echo "show"; ?>" id="med-collapse" style="">
                    <ul class="btn-toggle-nav list-unstyled fw-normal px-4 small">
                        <li><a href="med-addMed.php"
                                class="link-body-emphasis d-inline-flex p-1 text-decoration-none rounded"><span>Add
                                    Medicine</span></a></li>
                        <li><a href="med-medList.php"
                                class="link-body-emphasis d-inline-flex p-1 text-decoration-none rounded"><span>Medicine
                                    List</span></a></li>
                    </ul>
                </div>
            </li>

            <li class="border-top my-3"></li>

            <li class="mb-1">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                    data-bs-toggle="collapse" data-bs-target="#users-collapse">
                    <span><i class="fa-solid fa-users-rays me-3"></i>Users</span>
                </button>
                <div class="collapse  <?php if (isset($profile))
                    echo "show"; ?>" id="users-collapse" style="">
                    <ul class="btn-toggle-nav list-unstyled fw-normal px-4 small">
                        <li><a href="#"
                                class="d-inline-flex p-1 text-decoration-none"><span>Profiles</span></a></li>
                    </ul>
                </div>
            </li>

            <li class="border-top my-3"></li>

            <li class="mb-1">
                <a href="../Homepage/" class="text-decoration-none">
                    <button class="btn rounded border-0">
                        <span><i class="fa-solid fa-users-rays me-3"></i>NexusHealth</span>
                    </button>
                </a>
            </li>

            <li class="border-bottom" style="position: absolute; bottom: 0px; width: 13rem;">
                <a href="../Authentication/logout.php" class="text-decoration-none">
                    <button class="btn rounded border-0">
                        <p><i class="d-inline-flex fa-solid fa-users-rays"></i>Log Out</p>
                    </button>
                </a>
            </li>
            <hr>
        </ul>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script>
    // Sidebar toggle
    $(document).ready(function () {
        $('.open-btn').on('click', function () {
            $('.sidebar').toggleClass('active');
        });
    });
</script>