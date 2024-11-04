<?php
session_start();
require_once 'dbConnection.php';

if (isset($_SESSION['userid'])) {
    $userid   = $_SESSION['userid'];

    if ($_GET["sout"] == $userid) {
        session_unset();
        echo "<script>alert('Logging out from User')</script>";
        echo '<script>window.location="login.php"</script>';
    }
}else{
    $adminid   = $_SESSION['adminid'];

    if ($_GET["sout"] == $adminid) {
        session_unset();
        echo "<script>alert('Logging out from Admin')</script>";
        echo '<script>window.location="login.php"</script>';
    }
}
