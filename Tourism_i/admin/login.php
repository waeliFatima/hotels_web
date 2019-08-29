<!DOCTYPE html>

<html>
<head>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>admin menu</title>

        <!--    <link href="css/bootstrap.min.css" rel="stylesheet" />-->
        <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
        <link type="text/css" href="css/style.css" rel="stylesheet"/>

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <!--    <link rel="stylesheet" href="/resources/demos/style.css">-->
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
        <!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
        <!--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css'
              integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    </head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>صفحه ی ورود مدیریت</title>
</head>

<body>

<div class="login">

    <h1>ورود به مدیریت سایت</h1>
    <form method="post">
        <input type="text" name="email" placeholder="لطفا ایمیل خود را وارد نمایید" required="required" />
        <input type="password" name="password" placeholder="لطفا پسورد خود را وارد نمایید" required="required" />
        <button type="submit" name="login" class="btn btn-primary btn-block btn-large" style="font-size: 16px" >ادامه</button>
    </form>
</div>
</body>
</html>

<?php
//isesson_start();
require('config.php');

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
//            echo $email;

    $password = mysqli_real_escape_string($con, $_POST['password']);
//            echo $password;
    if (empty($email)) {
        if (empty($password)) {
            echo "<script>alert('ایمیل و پاسورت خود وارد نکرده اید .لطفا وارد کنید')</script>";
        } else {
            echo "<script>alert('ایمیل خود وارد نکرده اید .لطفا وارد کنید')</script>";

        }
    } else {
        if (empty($password)) {
            echo "<script>alert('پسورد خود وارد نکرده اید .لطفا وارد کنید')</script>";
        } else {
            $email_valid = $email;
            if (filter_var($email_valid, FILTER_VALIDATE_EMAIL) == true) {


            } else echo "<script>alert('ایمیل شما صحیح نمی باشد. لطفا مچددا وارد کنید')</script>";

        }
    }

}
if(isset($email_valid)){
    echo $email_valid;
}
if((isset($email)) && (isset($password))){
    $sel_c ="SELECT * FROM `users` WHERE `email`='$email_valid' AND `password`='$password' AND `id_parent`= 2";


    $run_c = @mysqli_query($con, "SET NAMES utf8");
    $run_c = @mysqli_query($con, "SET CHARACTER SET utf8");
    $run_c = @mysqli_query($con, $sel_c);
    $check_user = $run_c->num_rows;
    echo $check_user;


    if($check_user == 0 ){

        echo "<script>alert('ایمیل با پاسورت شما اشتباه وارد کردید، لطفا دوباره امتحان کنید')</script>";
    }else {
        $sel_login = "SELECT * FROM `users` WHERE `email`='$email_valid' AND `password`='$password'AND `id_parent`= 2";

        $run_login = mysqli_query($con, "SET NAMES utf8");
        $run_login = mysqli_query($con, "SET CHARACTER SET utf8");
        $run_login = mysqli_query($con, $sel_login);

        while ($row = @mysqli_fetch_array($run_login)) {
            $confirmed = $row['confirmed'];
//            echo $confirmed;
            $date = date("Y-m-d h:i:sa");

            if ($confirmed == 1) {
                $_SESSION['admin_email'] = $email_valid;
                $se = $_SESSION['admin_email'];
                $message = "
  سلام مدیر شما در تاریخ '. $date.' وارد پنل مدیریت شدید .
                 ";
                mail($email, "سایت جزیره", $message, "Form:fatiagaingit@gmail.com");

                echo "<script>window.open('home.php','_self')</script>";

            } else {
                echo "<script>alert('شما ایمیل خود تایید نکرده اید .لطفا ایمیل خود با کد که براتون ایمیل کرده تایید کنید ')</script>";
            }
        }
    }


}


?>
<style>

    html { width: 100%; height:100%; overflow:hidden; }

    body {
        width: 100%;
        height:100%;
        /* Permalink - use to edit and share this gradient: https://colorzilla.com/gradient-editor/#292a35+5,5005ff+17,5005ff+17,71ceef+32,21b4e2+67,b7deed+86 */
        /* Permalink - use to edit and share this gradient: https://colorzilla.com/gradient-editor/#292a35+5,5005ff+17,5005ff+17,71ceef+32,21b4e2+67,f2f6f7+87 */
        background: #292a35; /* Old browsers */
        background: -moz-linear-gradient(-45deg,  #292a35 5%, #5005ff 17%, #5005ff 17%, #71ceef 32%, #21b4e2 67%, #f2f6f7 87%); /* FF3.6-15 */
        background: -webkit-linear-gradient(-45deg,  #292a35 5%,#5005ff 17%,#5005ff 17%,#71ceef 32%,#21b4e2 67%,#f2f6f7 87%); /* Chrome10-25,Safari5.1-6 */
        background: linear-gradient(135deg,  #292a35 5%,#5005ff 17%,#5005ff 17%,#71ceef 32%,#21b4e2 67%,#f2f6f7 87%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#292a35', endColorstr='#f2f6f7',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */

    }
    .login {
        position: absolute;
        top: 50%;
        left: 50%;
        margin: -150px 0 0 -150px;
        width:300px;
        height:300px;
    }
    .login h1 { font:35px b nazanin;text-align:center; }
    input {
        width: 100%;
        margin-bottom: 10px;
        border: none;
        padding: 10px;
        font-size: 15px;
        color: #fff;

        border-radius: 4px;

        text-align:center;
    }
</style>
