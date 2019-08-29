<?php

session_start();
//session_unset();
$_SESSION =array();
session_destroy();
echo "<script>window.open('hotels.php','_self')</script>";

?>