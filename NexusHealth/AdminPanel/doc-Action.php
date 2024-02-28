<?php

include '../Database/connection.php';

// Doctor Add
if (isset($_POST['doctor_add'])) {
    $doctorName = $_POST['doctorName'];
    $phone = $_POST['phoneNumber'];
    $address = $_POST['hospital'];
    $department = $_POST['department'];
    $qualification = $_POST['qualification'];
    $time1 = $_POST['time1'];
    $time2 = $_POST['time2'];
    $time3 = $_POST['time3'];
    $time4 = $_POST['time4'];

    $tempLoc = $_FILES['photo']['tmp_name'];
    $imgName = $_FILES['photo']['name'];
    $imageDestination = "../DoctorPhotos/" . $imgName;
    move_uploaded_file($tempLoc, $imageDestination);

    $insert_query="INSERT INTO `doctorlist`( `doctorName`, `department`, `hospital/chamber`, `qualification`, `phoneNumber`, `time1`, `time2`, `time3`, `time4`,`doctorPhoto`) VALUES ('$doctorName','$department','$address',
    '$qualification','$phone','$time1','$time2','$time3','$time4','$imageDestination')";

   
    if (!mysqli_query($conn, $insert_query)) {
        die("Not Inserted!!");
    } else {
        echo "<script>alert('Information Stored Successfully!')</script>";
        echo "<script>location.href='doctor_add.php'</script>";
    }
}

// Doctor Details Update
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $docname = $_POST['dname'];
    $department = $_POST['department'];
    $phone = $_POST['phone'];
    $hospital = $_POST['hospital'];
    $qual = $_POST['qual'];
    $slot1 = $_POST['slot1'];
    $slot2 = $_POST['slot2'];
    $slot3 = $_POST['slot3'];
    $slot4 = $_POST['slot4'];

    echo $id;

    $update_query = "UPDATE `doctorlist` SET `doctorName`='$docname',`department`='$department',`hospital/chamber`='$hospital',`qualification`='$qual',
        `phoneNumber`='$phone',`time1`='$slot1',`time2`='$slot2',`time3`='$slot3',`time4`='$slot4' WHERE id = '$id'";
    if (!mysqli_query($conn, $update_query)) {
        die("Not Update. Please Try Again!!");
    } else {
        echo "<script>alert('Information Updated Successfully!')</script>";
        echo "<script>location.href='doc-docList.php'</script>";
    }
}

// Doctor Delete
if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $deleteQuery = "DELETE FROM `doctorlist` WHERE id = '$id'";
    if (!mysqli_query($conn, $deleteQuery)) {
        die("Not Update. Please Try Again!!");
    } else {
        echo "<script>alert('Deleted Successfully!')</script>";
        echo "<script>location.href='doc-docList.php'</script>";
    }

} else {
    echo "<script>alert('Not Accessible!')</script>";
    echo "<script>location.href='doc-docList.php'</script>";
}

?>
