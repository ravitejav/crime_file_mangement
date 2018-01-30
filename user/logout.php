<?php
session_start();
unset($_SESSION['name']);
unset($_SESSION['passvalue']);
session_destroy();
header('location:index.php');
?>
