<?php

include '../Database/connection.php';

if (isset($_POST['addBlood'])) {
    $fullname = $_POST['fullname'];
    $phone = $_POST['phoneNumber'];
    $address = $_POST['address'];
    $blood = $_POST['blood'];

    $insert_query = "INSERT INTO `donor_list`(`Name`,`BloodGroup`,`Phone number`,`Address`) 
        VALUES ('$fullname','$blood','$phone','$address')";

    if (!mysqli_query($conn, $insert_query)) {
        die("Not Inserted!!");
    } else {
        echo "<script>alert('Information Stored Successfully!')</script>";
        echo "<script>location.href='blood-addBlood.php'</script>";
    }
} else {
    echo "<script>alert('Not Accessible!')</script>";
    echo "<script>location.href='index.php'</script>";
}
?>