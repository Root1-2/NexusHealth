<?php

include '../Database/connection.php';

// Add Donor
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
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $donorname = $_POST['dname'];
    $bloodgroup = $_POST['bloodGroup'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $status = $_POST['availability_status'];

    $update_query = "UPDATE `donor_list` SET `Name`='$donorname',`BloodGroup`='$bloodgroup',
        `Phone number`='$phone',`Address`='$address',`status`='$status' WHERE id = '$id'";

    if (!mysqli_query($conn, $update_query)) {
        echo "<script>alert('Not Updated!')</script>";
        echo "<script>location.href='blood-donorList.php'</script>";
    } else {
        echo "<script>alert('Information Updated Successfully!')</script>";
        echo "<script>location.href='blood-donorList.php'</script>";
    }
} else {
    echo "<script>alert('Not Accessible!')</script>";
    echo "<script>location.href='../index.php'</script>";
}

?>