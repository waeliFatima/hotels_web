<?php
include 'config.php';
include 'header.php';


$MerchantID = 'XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX';
$Amount = 1000; //Amount will be based on Toman
$Authority = $_GET['Authority'];

$email = $_GET['user'];
//$order_id=	$_GET['order_id_for_verify'];
$id_payment = $_GET["id_payment"];
if ($_GET['Status'] == 'OK') {

    $client = new SoapClient('https://sandbox.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);



    $result = $client->PaymentVerification(
        [
            'MerchantID' => $MerchantID,
            'Authority' => $Authority,
            'Amount' => $Amount,
        ]
    );


//echo $id_payment;

?>
<body style="background-color:#f1f1f1;font-size: 17px" dir="rtl">
    <div style="margin:auto; ">
        <div style="margin: 70px"></div>
        <div style="width: 900px;margin: auto">
            <div style="height: 200px;background-color: white">
                <div style="color:white;margin: 20px">عملیات بانکی</div>

<?php
    if ($result->Status == 100) {
//        echo "<script>window.open('hotels.php','_self')</script>";
$date = date("Y-m-d H:i:s");
        $RefID=$result->RefID;
        mysqli_query($con,"UPDATE `rezerve` SET `refid`=$RefID WHERE `id_rez`=$id_payment ");
        echo "<p style='margin-top: 20px;padding: 7px' class='bg-success'>از  شما متشکریم کد RefID برای پیگیری های بعدی شما :".$result->RefID."می باشد.</p>";
        $message = "
				شما $Amount پرداخت کردی در تاریخ $date شماره تراکنش. $RefID 
				با تشکر از شما .";
        mail($email, "ازسایت جزیره برای رزور : ", $message, "Form:fatiagaingit@gmail.com");


//
//        if ($result->Status == 100) {
//        echo 'Transation success. RefID:'.$result->RefID;
    }
    else {
echo "<p class='bg-danger' style='margin-top: 20px;padding: 7px'>  تراکنش انجام نشد یا در صورت از قبل انجام داده شده حتما شماره رزور به شما ایمیل شده است 
    :".$result->Status."</p>";
        $del = mysqli_query($con, "DELETE t2 FROM rezerve_and_costomer as t2 inner join rezerve as t1 on t2.id_rezerve = t1.id_rez AND t1.id_rez='$id_payment' AND t1.refid ='0'");
        $delete = mysqli_query($con, "DELETE t1 FROM rezerve as t1 WHERE t1.id_rez='$id_payment'");

//        echo 'Transation failed. Status:'.$result->Status;
    }
} else {
echo "<p class='bg-danger' style='margin-top: 20px;padding: 7px'> تراکنش توسط کاربر انجام نشد </p>";
    $del = mysqli_query($con, "DELETE t2 FROM rezerve_and_costomer as t2 inner join rezerve as t1 on t2.id_rezerve = t1.id_rez AND t1.id_rez='$id_payment' AND t1.refid ='0'");
    $delete = mysqli_query($con, "DELETE t1 FROM rezerve as t1 WHERE t1.id_rez='$id_payment'");


 //   echo 'Transaction canceled by user';
}?>

            </div>
        </div>
    </div>
</body>