<?php
session_start();
include "../Database/connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    // Repeat similar lines to get other form fields

    // Prepare the SQL statement
    $update_profile = "UPDATE `register` SET `firstName`='$firstName',`lastName`='$lastName',`email`='$email',`pNumber`='$phone',`dob`='$dob',`weight`='$weight',`height`='$height',`address`='$address',`city`='$city' WHERE userName='{$_SESSION['userName']}'";

    // Execute the SQL statement
    if (mysqli_query($conn, $update_profile)) {
        // Profile updated successfully
        header("Location: profile.php"); // Redirect back to profile page
        exit();
    } else {
        // Error occurred while updating profile
        echo "Error: " . mysqli_error($conn);
    }
}
?>
