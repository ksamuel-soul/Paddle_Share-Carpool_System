<?php
    session_start();
    session_unset();
    // header('location:login.php');
    echo "<script>window.location.href = '../' ;</script>";
?>