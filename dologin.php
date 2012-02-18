<?php

$user = $_POST['username'];
$pass = $_POST['password'];

session_start();
if (strtoupper(trim($user)) == 'ADMIN'
        && strtoupper(trim($pass)) == 'ADMIN') {

    $_SESSION['user'] = trim($user);
    header("Location: http://localhost/bootcampm2/mobile.php");
} else {
    session_destroy();
    $_SESSION['user'] = '';
    header("Location: http://localhost/bootcampm2/login.php");
}

if ($_GET['a'] == 'logout') {
    session_destroy();
    $_SESSION['user'] = '';
    header("Location: http://localhost/bootcampm2/");
}

exit();
?>