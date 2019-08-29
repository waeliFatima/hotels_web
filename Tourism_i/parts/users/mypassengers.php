<?php
require_once '../config.php';
if (isset($_SESSION['user_email'])) {
    $email = $_SESSION['user_email'];
    $getid = mysqli_query($con, "SET NAMES utf8");
    $getid = mysqli_query($con, "SET CHARACTER SET utf8");
    $getid = mysqli_query($con, "SELECT `id_user` FROM `users` WHERE `email`='$email'");
    while ($row = mysqli_fetch_array($getid)) {
        $id = $row['id_user'];
    }
    ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta charset="UTF-8">
        <title>Hotel</title>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css'
              integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ'
              crossorigin='anonymous'>
        <!--    <link rel="stylesheet" href="hotels/style/style.css">-->
    </head>
    <!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->


    <body style="background-color: #f2f0fb" dir="rtl">

    <div style="margin:80px"></div>
    <div
        style="width: 1140px;margin: auto;padding: 20px;background-color: white;font-size: 19px;color: #c6c0c9;text-align: center"
        dir="rtl">
        <a href="account.php" style="text-decoration: none"><span class="fa fa-user "></span> حساب کاربری</a><span
            style="margin: 20px">|</span>
        <a style="text-decoration: none"><span class="fa fa-star "></span> امتیاز ها</a><span
            style="margin: 20px">|</span>
        <a style="text-decoration: none"><span class="fa fa-behance "></span> سفارشات و استرادات</a><span
            style="margin: 20px">|</span>
        <a href="comment.php" style="text-decoration: none"><span class="glyphicon glyphicon-envelope "></span> ثبت نظر
        </a><span
            style="margin: 20px">|</span>
        <a href="mypassengers.php" style="text-decoration: none"><span class="fa fa-list "></span> لیست مسافران
        </a><span
            style="margin: 20px">|</span>
        <a href="cridet.php" style="text-decoration: none"><span class="fa fa-credit-card "></span> افزایش اعتبار</a>
    </div>
    <div style="margin:90px"></div>

    <?php
    $getr = mysqli_query($con,"SELECT users.*,user_customer.*,customers.* FROM user_customer,users,customers WHERE user_customer.id_customer=customers.id_customers AND users.id_user=user_customer.id_user AND users.id_user=5 GROUP BY customers.id_customers");
    while ($row = mysqli_fetch_array($getr)){
        ?>

    <div style="margin:30px"></div>

    <div style="width: 1140px;margin: auto;padding: 20px;background-color: white;font-size: 18px;color: #c6c0c9;text-align: center ">

        <span style="color: #4f4f4f;padding: 14px;margin: 13px"><strong>نام مسافر:</strong> <?=$row['first_name_cus']?></span>
        <span style="color: #4f4f4f;padding: 14px;margin: 13px"><strong>شماره ملی :</strong> <?=$row['personilty_cus']?></span>
        <span style="color: #4f4f4f;padding: 14px;margin: 13px"><strong>فامیل :</strong><?=$row['last_name_cus']?></span>
        <span style="color: #4f4f4f;padding: 14px;margin: 13px"><strong>جنسیت:</strong><?=$row['gender']?></span>
        <span style="color: #4f4f4f;padding: 14px;margin: 13px"><strong>سن :</strong><?=$row['age']?></span>
        <span style="color: #4f4f4f;padding: 14px;margin: 13px"><strong>شماره تماس :</strong><?=$row['phone']?></span>
    </div>
    <?php
    }
    ?>
    </body>
    <?php
}
?>
