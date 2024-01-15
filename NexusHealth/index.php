<?php

session_start();

if(isset($_SESSION['username'])) {
    if($_SESSION['username'] == 'admin') {
        echo "<script>location.href='AdminPanel/'</script>";
    } else {
        echo "<script>location.href='Homepage/'</script>";
    }
} else {
    echo "<script>location.href='Authentication/login.php'</script>";
}

?>