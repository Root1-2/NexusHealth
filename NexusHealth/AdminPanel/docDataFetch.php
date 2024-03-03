<?php

include '../Database/connection.php';

if (isset($_POST['rowId'])) {
    $docId = $_POST['rowId'];

    $doctorsdata = mysqli_query($conn, "SELECT * FROM `doctorlist` WHERE id = '$docId'");

    if ($doctorsdata) {
        $data = mysqli_fetch_assoc($doctorsdata);

        // Set the content type to JSON
        header('Content-Type: application/json');

        // Output the JSON data
        echo json_encode($data);
    } else {
        // Handle the case where the query fails
        header('Server Error');
        echo json_encode(['error' => 'Failed to fetch data']);
    }
} else {
    // Handle the case where rowId is not set
    header('Server Error');
    echo json_encode(['error' => 'rowId not provided in the request.']);
}

?>