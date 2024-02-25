<?php

include '../Database/connection.php';

if (isset($_POST['submit'])) {

    $medname = $_POST['mname'];
    $category = $_POST['category'];
    $company = $_POST['company'];
    $group = $_POST['group'];
    $price = $_POST['price'];

    $photo = $_FILES['photo'];
    $imageLoc = $_FILES['photo']['tmp_name'];
    $imageName = $_FILES['photo']['name'];
    $imageDestination = "../MedicinePhoto/" . $imageName;
    // Change the path to appropriate location from your computer, Aiman.
    move_uploaded_file($imageLoc, $imageDestination);

    $insert_query = "INSERT INTO `medcorner`(`medname`,`medgroup`,`medcompany`,`medcategory`,`medprice`,`medpic`) 
        VALUES ('$medname','$group','$company','$category','$price','$imageDestination')";


    if (!mysqli_query($conn, $insert_query)) {
        die("Not Inserted!!");
    } else {
        echo "<script>alert('Medicine Added Successfully!')</script>";
        echo "<script>location.href='med-addMed.php'</script>";
    }

} else {
    echo "<script>alert('Not Accessible!')</script>";
    echo "<script>location.href='med-addMed.php'</script>";
}
