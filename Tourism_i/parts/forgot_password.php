<?php
require_once 'config.php';
include 'header.php';
?>
<body style="background-color: #f4f0fe;font-size: 16px;color: #64616d" dir="rtl">
<div style="width: 1140px;margin: auto">
    <div style="margin: 60px"></div>
    <h2 >بازیابی رمز عبور</h2>

    <form action="" method="post">

        <div style="width: 600px;margin: auto;background-color:#ffffff;height: 300px;padding: 10px">
            <?php
            if(isset($_GET['location'])) {
//            echo htmlspecialchars($_GET['location']);
//            $location1 = htmlspecialchars($_GET['location']);
                $path_parts = explode('location=', $_SERVER['REQUEST_URI']);
                $location = $path_parts[1];
//            echo $location;
            }else $location = '=hotels.php';

            if(isset($_POST['returnpass'])){
                if($_POST['email'] and $_POST['email'] != '') {
                    $email = trim($_POST['email']);
                    $code = md5(uniqid(true));//random alphernumeric charachter store in $code variable

                    if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                        $checkmail = mysqli_query($con, "SET NAMES utf8");
                        $checkmail = mysqli_query($con, "SET CHARACTER SET utf8");
                        $checkmail = mysqli_query($con, "SELECT `email` FROM `users` WHERE `email` = '$email'");
                        $count = mysqli_num_rows($checkmail);
                        if ($count == 1) {
                            $insertedcode = mysqli_query($con, "UPDATE `users` SET `lose`='$code' WHERE `email`='$email'");

                            $message = "
				این لینک به منظور بازیابی رمز عبور به شما ارسال شده ، لطفا آن را فشار دهید و مراحل بصورت کامل انجام دهید. باتشکر از شما .
				http://localhost/Tourism_i/parts/updateforgotpass.php?email=$email&code=$code&location=$location";
                            mail($email, "لینک بازیبابی رمز عبور", $message, "Form:fatiagaingit@gmail.com");

                            if ($insertedcode){
                                echo "<script>alert(' ما لینک بازیابی برای شما ارسال کرده ایم، لطفا به ایمیلتون مراجعه کنید   ')</script>";
                                echo "<script>window.open('hotels.php','_self')</script>";


                            }

                        }else{
                            echo "<script>alert(' شما ثبت نام نکرده اید .لطفا به صفحه ی ثبت نام مراجعه بفرمایید . ')</script>";

                        }

                    }else{
                        echo "<script>alert(' ایمیل که وارد کرده اید  معتبر نمی باشد .  ')</script>";

                    }
                }else{
                    echo "<p class='bg-danger' style='margin: 20px'>ایمیل خود وارد کنید </p>";
                }
            }
            ?>
            <h2 style="width: 97%;margin: auto;background-color: #ff5295;color: white;padding: 5px"> ایمیل خود را وارد کنید .</h2>
            <span style="float: right;margin-top: 45px">

     <label> ایمیل خود را وارد کنید : </label>
     <input name="email" type="email" style="width: 290px;height: 35px;margin: 4px"><br>
 </span>
            <div style="padding: 10px">
                <input type="submit" name="returnpass" class="chan"  value="بازیابی">
            </div>
        </div>
    </form>
</div>


</body>
<style>

    input.chan {
        width: 120px;
        height: 45px;
        color: #ff5295;;
        background-color: white;
        border: 1px solid #ff5295;
        float: left;
        font-size: 19px;
        margin-top: 170px;
    }

    input.chan:hover {
        color: white;
        background-color: #ff5295;
    }
</style>