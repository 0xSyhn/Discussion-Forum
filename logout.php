<?php
session_start();
session_unset();
session_destroy();
echo "<script>alert('Logout successfull!')</script>";
echo "<script>window.open('login.php','_self')</script>";
?>