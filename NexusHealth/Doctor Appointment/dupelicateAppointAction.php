<?php
// include "../Database/connection.php";

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $doctorId = $_POST['doctorId'];
//     $selectedDate = $_POST['selectedDate'];

//     $result = mysqli_query($conn, "SELECT appointmentTime FROM appointments WHERE doctorID = '$doctorId' AND appointmentDate = '$selectedDate'");
    
//     if (!$result) {
//         http_response_code(500);
//         echo "Error executing the query: " . mysqli_error($conn);
//         exit();
//     }

//     $existingAppointments = [];
//     while ($row = mysqli_fetch_assoc($result)) {
//         $existingAppointments[] = $row['appointment_time'];
//     }

//     echo json_encode($existingAppointments);
// } else {
//     // Handle invalid request
//     http_response_code(400);
//     echo "Invalid Request";
// }
?>