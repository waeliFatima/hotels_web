<?php
require_once '../config.php';
if (isset($_SESSION['user_email'])) {
    $email = $_SESSION['user_email'];
    $getid = mysqli_query($con,"SET NAMES utf8");
    $getid = mysqli_query($con,"SET CHARACTER SET utf8");
    $getid=mysqli_query($con,"SELECT `id_user` FROM `users` WHERE `email`='$email'");
    while ($row = mysqli_fetch_array($getid)){
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
        <a href="mypassengers.php" style="text-decoration: none"><span class="fa fa-list "></span> لیست مسافران </a><span
                style="margin: 20px">|</span>
        <a href="cridet.php" style="text-decoration: none"><span class="fa fa-credit-card "></span> افزایش اعتبار</a>
    </div>


    <div style="margin:80px"></div>


    <div style="width: 1040px;height: 260px;margin: auto;padding: 20px;background-color: white;font-size: 16px;color: #857f88;text-align: center">
        <form method="post">
            <h3 style="float: right;background-color:#54dc43;width: 98%;margin: 20px;color: #f3f0ff;padding: 5px">
                مشکلات، انتقاد، پشنهاد و نظرات خود در مورد سایت ارسال کنید.</h3><br><br><br>

            <textarea  style="float: right;width: 700px;margin-right: 30px" name="com" cols="40" rows="5"></textarea>

            <input style="float: left;margin-top: 78px" class="comment" name="comment" type="submit" value="ثبت نظر">
            <?php
            if(isset($_POST['comment'])){
               if(isset($_POST['com']) and $_POST['com'] != '') {
                   $comment = $_POST['com'];
                   $today = date("Y-m-d H:i:s");
                   $query = "INSERT INTO `commnets`(`id_users`, `comment`, `date`) VALUES (N'$id',N'$comment',N'$today')";
                   $com = mysqli_query($con , $query);
                   echo "<script>window.open('comment.php','_self')</script>";

               }else{
                   echo '<div class="bg-danger" style="margin: 10px; float: left" >شما نظر ثبت نکرده اید</div>';
               }
            }
            ?>
        </form>
    </div>
    <div style="margin: 50px"></div>
    <form method="post">
    <div style="width: 1040px;margin: auto;height: 70px;padding: 9px;background-color: white;font-size: 18px;color: #857f88;text-align: center">
        <span style="float: right;margin: 10px">مشاهده نظرات دیکران : <input  name="showall" type="submit" class="btn btn-success" value="مشاهد کل نظرات"><span style="margin-right: 30px"></span>
        <span style="float: left;margin-right: 250px">مشاهده نظرات خودم : <input  name="showme" type="submit" class="btn btn-success" value="مشاهد کل نظرات">

        </span>
    </div>
    </form>
    <?php
    $getcom = mysqli_query($con,"SET NAMES utf8");
    $getcom = mysqli_query($con,"SET CHARACTER SET utf8");
    if(isset($_POST['showall'])){
        $getcom = mysqli_query($con,"SELECT * FROM `commnets`");

    }elseif (isset($_POST['showme'])){
        $getcom = mysqli_query($con, "SELECT * FROM `commnets` WHERE `id_users`='$id'");

    }
    else {
        $getcom = mysqli_query($con, "SELECT * FROM `commnets` WHERE `id_users`='$id'");


    }
    while ($row = mysqli_fetch_array($getcom)) {
        $state = $row['state'];
        ?>
        <div style="margin: 50px"></div>

        <div style="width: 1040px;height: 200px;margin: auto;background-color: white;font-size: 16px;color: #857f88;text-align: center">
            <span style="height:200px;background-color:#54dc43;float: right;color: #54dc43  ">R</span>
            <?php
            if($row['id_users']== $id) {
                ?>
                <h3 style="float: right;margin: 10px">نظر شما</h3><br>
                <?php
            }else {
                ?>

                <h3 style="float: right;margin: 10px">نظر دیگران</h3><br>

                <?php
            }
                ?>
            <hr>
            <p style="margin: 10px;float: right;font-size: 17px"><?=$row['comment']?></p>
            <div style="margin: 120px"></div>
            <div style="margin-right: 5px">
                <?php
                if($row['id_users'] == $id) {
                    if ($state == 0) {
                        ?>

                        <i class="fa fa-check" style="color: #54dc43;float: right" aria-hidden="true"></i><i
                                class="fa fa-check"
                                style="color: #54dc43;float: right" aria-hidden="true"></i><span
                                style="float: right">نظر شما توسط کروه جزیره خوانده شده و حتما مورد بررسی خواهم شد. </span>
                        <?php
                    } else {

                        ?>

                        <i class="fa fa-check" style="color: #dc0000;float: right;margin: 5px" aria-hidden="true"></i>
                        <span
                                style="float: right">نظر شما برای ما ارسال شد .</span>
                        <?php
                    }
                }
                    ?>

            </div>
            <span style="float: left;margin: 5px"><?= $row['date'] ?></span>
        </div>
        <?php
    }
        ?>
    </body>


    <style>

        input.comment {
            width: 160px;
            height: 40px;
            margin: 8px;
            color: #54dc43;;
            background-color: white;
            border: 1px solid #54dc43
        }

        input.comment:hover {
            color: white;
            background-color: #54dc43;
        }
    </style>
    <?php
}else{
    echo "<script>window.open('../login.php?location=users/account.php','_self')</script>";

}