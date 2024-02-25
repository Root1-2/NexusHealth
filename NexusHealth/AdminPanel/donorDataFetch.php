<?php

include '../Database/connection.php';

if (isset($_POST['donorId'])) {
    $donorId = $_POST['donorId'];

    $donordata = mysqli_query($conn, "SELECT * FROM `donor_list` WHERE id = '$donorId'");

    if ($donordata) {
        $data = mysqli_fetch_assoc($donordata);

        // Set the content type to JSON
        header('Content-Type: application/json');

        // Output the JSON data
        echo json_encode($data);
    } else {
        // Handle the case where the query fails
        header('HTTP/1.1 500 Internal Server Error');
        echo json_encode(['error' => 'Failed to fetch data']);
    }
} else {
    // Handle the case where rowId is not set
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(['error' => 'rowId not provided in the request.']);
}

?>