<?php
session_start();

if (isset($_POST['btn_signIn'])) {
    include '../Database/connection.php';

    $log_username = $_POST['l_userName'];
    $log_password = $_POST['l_pass'];

    $result = mysqli_query($conn, "SELECT * FROM `register` 
            WHERE userName = '$log_username' AND BINARY pass = '$log_password' AND verifystatus = '1'");

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['userName'] = $log_username;
        echo "<script>location.href='../Homepage/index.php'</script>";
    } else {
        $result1 = mysqli_query($conn, "SELECT * FROM `register` 
                WHERE username = '$log_username' AND BINARY pass = '$log_password' AND verifystatus = '0'");
        if (mysqli_num_rows($result1) > 0) {
            echo "<script>alert('Your Account has not been verified yet. A verification link has been sent to your registered email address!')</script>";
            echo "<script>location.href='login.php'</script>";
        } else {
            echo "<script>alert('Invalid Username or Password.Please Try Again!')</script>";
            echo "<script>location.href='login.php'</script>";
        }
    }
} else {
    echo "<script>alert('Not Accessible!')</script>";
    echo "<script>location.href='login.php'</script>";
}

?>