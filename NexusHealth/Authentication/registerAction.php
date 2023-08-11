<?php

include '../Database/connection.php';

if (isset($_POST['signup'])) {
    $reg_firstName = ucwords($_POST['fname']);
    $reg_lastName = ucfirst($_POST['lname']);
    $reg_userName = $_POST['uname'];
    $reg_email = $_POST['email'];
    $reg_dob = $_POST['dob'];
    $reg_gender = $_POST['sex'];
    $reg_phoneNumber = $_POST['mobile'];
    $reg_pass = $_POST['pass'];
    $reg_conPass = $_POST['con_pass'];
    $reg_address = $_POST['address'];
    $reg_city = $_POST['city'];
    $reg_weight = $_POST['weight'] . "kg";
    $reg_height = $_POST['ftheight'] . "ft" . $_POST['inheight'] . "in";
    $reg_blood = $_POST['blood'];
    $verifytoken = md5(rand());
    
    $firstName_pattern = "/^[A-Za-z .]{2,}$/";
    $lastName_pattern = "/^[A-Za-z]{2,}$/";
    $userName_pattern = "/^(?=.*[a-z])[a-z!@#$%^&*_\-]{5,10}$/";
    $phoneNumber_pattern = "/(\+88)?-?01[3-9]\d{8}/";
    $email_pattern = "/^[a-z0-9_.+-]+@(gmail\.com|yahoo\.com|hotmail\.com|outlook\.com|icloud\.com|zoho\.com|lus\.ac\.bd)$/";
    $pass_pattern = "/(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%&*()]).{6,20}/";

    $insert_query = "INSERT INTO `register`(`firstName`,`lastName`,`userName`,`email`,`pass`,`pNumber`,`dob`,`weight`,`height`,`sex`,`bloodGroup`,`address`,`city`,`verifytoken`) 
        VALUES ('$reg_firstName','$reg_lastName','$reg_userName','$reg_email','$reg_pass','$reg_phoneNumber','$reg_dob','$reg_weight','$reg_height','$reg_gender','$reg_blood','$reg_address','$reg_city','$verifytoken')";

    $dupe_userName = mysqli_query($conn, "SELECT * FROM `register` WHERE userName = '$reg_userName'");
    $dupe_email = mysqli_query($conn, "SELECT * FROM `register` WHERE email = '$reg_email'");

    if (!preg_match($firstName_pattern, $reg_firstName)) { //firstName Match
        echo "<script>alert('Invalid Firstname!!')</script>";
        echo "<script>location.href='register.php'</script>";
    }else if (!preg_match($lastName_pattern, $reg_lastName)) { //lastName Match
        echo "<script>alert('Invalid Lastname!!')</script>";
        echo "<script>location.href='register.php'</script>";                                                      
    }else if (!preg_match($userName_pattern, $reg_userName)) { //userName Match
        echo "<script>alert('Invalid Username!!')</script>";
        echo "<script>location.href='register.php'</script>";
    } else if (!preg_match($email_pattern, $reg_email)) { //Email Match
        echo "<script>alert('Invalid Email. Please Try Again..!!')</script>";
        echo "<script>location.href='register.php'</script>";
    } else if (!preg_match($phoneNumber_pattern, $reg_phoneNumber)) { //PhoneNumber Match
        echo "<script>alert('Invalid Phone Number.')</script>";
        echo "<script>location.href='register.php'</script>";
    } else if (!preg_match($pass_pattern, $reg_pass)) { //Password check
        echo "<script>alert('Invalid Password..!!')</script>";
        echo "<script>location.href='register.php'</script>";
    } else if ($reg_pass !== $reg_conPass) { //confirm password check
        echo "<script>alert('Password & Confirm Password do not match..!!')</script>";
        echo "<script>location.href='register.php'</script>";
    } else if (mysqli_num_rows($dupe_userName) > 0) { //duplicate username check from db
        echo "<script>alert('This Username is already taken..!!')</script>";
        echo "<script>location.href='register.php'</script>";
    } else if (mysqli_num_rows($dupe_email) > 0) { //duplicate email check from db
        echo "<script>alert('This email is already taken..!!')</script>";
        echo "<script>location.href='register.php'</script>";
    } else {
        if (!mysqli_query($conn, $insert_query)) {
            die("Not Inserted!!");
        } else {
            include 'sendmail.php';
            echo "<script>alert('Account Created Successfully!')</script>";
            echo "<script>location.href='login.php'</script>";
        }
    }
} else {
    echo "<script>alert('Not Accessible!')</script>";
    echo "<script>location.href='register.php'</script>";
}

?>
