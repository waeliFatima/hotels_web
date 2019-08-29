<?php
/**
 * Created by PhpStorm.
 * User: Fatima
 * Date: 8/13/2019
 * Time: 1:13 PM
 */

$con = mysqli_connect("localhost", "root", "", "Tourism_i");
session_start();
if(isset($_SESSION['admin_email'])){

    $email = $_SESSION['admin_email'];
}
//session_destroy();
?>