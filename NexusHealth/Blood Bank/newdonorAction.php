<?php

include '../Database/connection.php';

if (isset($_POST['submit'])) {

    $fullname = $_POST['fname'];
    $phone = $_POST['phonenumber'];
    $address = $_POST['address'];
    $blood = $_POST['blood'];
    
    $Name_pattern = "/^[A-Za-z .]{2,}$/";
    $phoneNumber_pattern = "/(\+88)?-?01[3-9]\d{8}/";

    $insert_query = "INSERT INTO `donor_list`(`Name`,`BloodGroup`,`Phone number`,`Address`) 
        VALUES ('$fullname','$blood','$phone','$address')";

    if (!preg_match($Name_pattern, $fullname)) { //Name Match
        echo "<script>alert('Invalid Name!!')</script>";
        echo "<script>location.href='newdonor.php'</script>";
    } else if (!preg_match($phoneNumber_pattern, $phone)) { //PhoneNumber Match
        echo "<script>alert('Invalid Phone Number.')</script>";
        echo "<script>location.href='newdonor.php'</script>";
    } 
    else {
        if (!mysqli_query($conn, $insert_query)) {
            die("Not Inserted!!");
        } else {
            echo "<script>alert('Information Stored Successfully!')</script>";
            echo "<script>location.href='newdonor.php'</script>";
        }
    }
} else {
    echo "<script>alert('Not Accessible!')</script>";
    echo "<script>location.href='newdonor.php'</script>";
}

?>