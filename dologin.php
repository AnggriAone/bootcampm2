<?php
    $user = $POST['username'];
    $pass = $POST['password'];
    
    session_start();
    
    if (strtoupper(trim($user) == 'ADMIN') && strtoupper(trim($pass) == 'ADMIN') ){
        $__SESSION('user') = trim($user);
        header("Location: http://localhost/bootcampm2/mobile.php");
    }else{
        session_destroy();
        $__SESSION('user') = '';
        header("Location: http://localhost/bootcampm2/login.php");
    }
    
    if ($_GET['a'] == 'logout' ){
        session_destroy();
        $__SESSION('user') = '';
        header("Location: http://localhost/bootcampm2/");
    }
?>