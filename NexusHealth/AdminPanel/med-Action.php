<?php

include '../Database/connection.php';

// Add Medicine
if (isset($_POST['submit'])) {

    $medname = $_POST['mname'];
    $category = $_POST['category'];
    $company = $_POST['company'];
    $group = $_POST['group'];
    $price = $_POST['price'];

    $photo = $_FILES['photo'];
    $imageLoc = $_FILES['photo']['tmp_name'];
    $imageName = $_FILES['photo']['name'];
    $imageDestination = "../MedPhotos/" . $imageName;
    // Change the path to appropriate location from your computer, Aiman.
    move_uploaded_file($imageLoc, $imageDestination);

    $insert_query = "INSERT INTO `medcorner`(`medname`,`medgroup`,`medcompany`,`medcategory`,`medprice`,`medpic`) 
        VALUES ('$medname','$group','$company','$category','$price','$imageDestination')";

    if (!mysqli_query($conn, $insert_query)) {
        echo "<script>alert('Not Inserted!')</script>";
        echo "<script>location.href='med-medList.php'</script>";
    } else {
        echo "<script>alert('Medicine Added Successfully!')</script>";
        echo "<script>location.href='med-addMed.php'</script>";
    }

}

// Update Medicine
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $medname = $_POST['mname'];
    $category = $_POST['medcategory'];
    $company = $_POST['medcompany'];
    $group = $_POST['medgroup'];
    $price = $_POST['price'];

    $updateQuery = mysqli_query($conn, "UPDATE `medcorner` SET `medname`='$medname',`medgroup`='$group',
        `medcategory`='$category',`medcompany`='$company',`medprice`='$price' WHERE id = '$id'");

    if ($updateQuery) {
        echo "<script>alert('Medicine Updated Successfully!')</script>";
        echo "<script>location.href='med-medList.php'</script>";
    } else {
        echo "<script>alert('Medicine Added Successfully!')</script>";
        echo "<script>location.href='med-medList.php'</script>";
    }
}

// Delete Medicine
if(isset($_POST['deleteMed'])) {
    $id = $_POST['deleteID'];

    $deleteQuery = "DELETE FROM `medcorner` WHERE id = '$id'";
    if (!mysqli_query($conn, $deleteQuery)) {
        echo "<script>alert('Not Delete!')</script>";
        echo "<script>location.href='med-medList.php'</script>";
    } else {
        echo "<script>alert('Data Deleted!')</script>";
        echo "<script>location.href='med-medList.php'</script>";
    }
}

else {
    echo "<script>alert('Not Accessible!')</script>";
    echo "<script>location.href='index.php'</script>";
}

?>
