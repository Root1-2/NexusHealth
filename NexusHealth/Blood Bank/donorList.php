<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <?php include 'header.php' ?>

    <?php include '../Database/connection.php' ?>
    <?php include '../Database/donordata.php' ?>

    <!-- Blood Group Category -->
    <section class="p-5 mt-2 ms-2 d-flex flex-wrap gap-3">
        <button type="button" class="btn btn-outline-danger rounded-pill">A+</button>
        <button type="button" class="btn btn-outline-danger rounded-pill">A-</button>
        <button type="button" class="btn btn-outline-danger rounded-pill">B+</button>
        <button type="button" class="btn btn-outline-danger rounded-pill">B-</button>
        <button type="button" class="btn btn-outline-danger rounded-pill">AB+</button>
        <button type="button" class="btn btn-outline-danger rounded-pill">AB-</button>
        <button type="button" class="btn btn-outline-danger rounded-pill">O+</button>
        <button type="button" class="btn btn-outline-danger rounded-pill">O-</button>
    </section>

    <div class="p-5">
        <table class="table align-middle mb-0 bg-white">
            <thead class="bg-light">
                <tr>
                    <th>Name</th>
                    <th>Blood Group</th>
                    <th>Address</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($donordata)) {
                    echo "<tr>
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
                        <span class='badge text-bg-success rounded-pill d-inline'>" . $row['Address'] . "</span>
                    </td>
                    
                </tr> ";
                }

                ?>

            </tbody>
        </table>
    </div>


    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>