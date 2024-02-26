<?php
session_start();

if (isset($_SESSION['userName'])) {
    session_unset();
    session_destroy();

    echo "<script>alert('Logout successfully!')</script>";
    echo "<script>location.href='../Homepage/index.php'</script>";
} else {
    echo "<script>alert('You Are Not Logged In!')</script>";
    echo "<script>location.href='../Homepage/index.php'</script>";
}

?>