<?php
// We connect to the database
include("header.php");
include 'config.php';
//We start the session
//session_start();
$email = $_SESSION['user_email'];
//Initialization to variables
$id_payment=$_SESSION["id_payment"];
//$order_id_for_zarinpal='12000';
$Amount='1000'; //Amount will be based on Toman - Required
//$Amount=$_SESSION["order_total_price"]; //Amount will be based on Toman - Required
$MerchantID = 'XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX'; //Required
$Description = " تست درگاه زرین پال "; // Required
$Email = "fatigitagain@gmail.com"; // Optional
$Mobile = '09024945661'; // Optional
    $CallbackURL = "http://d5a7407e.ngrok.io/Tourism_i/parts/verify.php?Amount=$Amount&id_payment=$id_payment&user=$email"; // Required

$client = new SoapClient('https://sandbox.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

$result = $client->PaymentRequest(
    [
        'MerchantID' => $MerchantID,
        'Amount' => $Amount,
        'Description' => $Description,
        'Email' => $Email,
        'Mobile' => $Mobile,
        'CallbackURL' => $CallbackURL,
    ]
);

//Enter the Authority field value in the order table
$au=$result->Authority;
//echo $au;
$sql="UPDATE `rezerve` SET `authority`='zarinpal_$au' WHERE `id_rez`=$id_payment";
mysqli_query($con,$sql);

//Redirect to URL You can do it also by creating a form
if ($result->Status == 100) {
//    echo 'dfddfdfffffffffff';
    echo "<script>window.open('https://sandbox.zarinpal.com/pg/StartPay/".$au."','_self')</script>";

//    echo '<script></script>';
//    Header('Location: https://sandbox.zarinpal.com/pg/StartPay/'.$result->Authority);
} else {
    echo'ERR: '.$result->Status;
}?>