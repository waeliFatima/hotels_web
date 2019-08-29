<?php
require_once 'config.php';
include 'header.php';
?>

<body style="background-color: #f1effc;font-size: 16px;color: #655862" dir="rtl">
<div style="width: 1140px;margin: auto">

    <div>
        <h1 style="">به سایت جریزه خوش آمدید </h1>

        <?php
        if (isset($_GET['email']) && ($_GET['code']!="")) {
            # code...
            $path_parts= explode('parts/', $_SERVER['REQUEST_URI']);
            $j=0;
            foreach($path_parts as $i =>$key) {

                $j++;
            }
            if($j==3) {
                $location = $path_parts[2];
            }
            else{
               $location='users/account.php';
            }
            $code=$_GET['code'];

            $email=$_GET['email'];
            $checkmail = mysqli_query($con,"SET NAMES utf8");
            $checkmail = mysqli_query($con,"SET CHARACTER SET utf8");
            $checkmail=mysqli_query($con,"SELECT `email` FROM `users` WHERE `email`='$email' AND lose='$code' AND lose!='' ");
            $count=mysqli_num_rows($checkmail);
            if ($count > 0) {

                if (isset($_POST['password'])){
                    $c_password_validate=mysqli_real_escape_string($con ,$_POST['password']);
                    if (empty($c_password_validate))
                    {
                        echo "<script>alert('پسورد خود را وارد نکرده اید!')</script>";
                    }else{
                        if(preg_match("/^(?=.*\d).{6,20}$/", $c_password_validate))
                        {
                            // password is valid
                            $password = $c_password_validate;
                            $repassword=$_POST['repassword'];
                            if ($password===$repassword) {
                                $inserted=mysqli_query($con,"UPDATE `users` SET lose='', `password`='$password' WHERE email='$email' ");
                                if ($inserted) {
                                    echo "<script>alert('پسورد شما با موفقیت تغییر کرد! اکنون با این پسورد جدید وارد سایت شوید!!!')</script>";
                                    echo "<script>window.open('$location','_self')</script>";
                                }

                            }
                            else
                            {
                                echo "<script>alert('پسوردهای شما با هم منطبق نیستند؟ لطفا مجددا وارد نمایید.')</script>";
                            }
                        }else{
                            echo "<script>alert('پسوردی که وارد کرده اید، طبق الگو نیست. لطفا مجددا را وارد نمایید')</script>";
                        }
                    }



                }
                # code...
                ?>
                <div style="background-color: white;height: 300px;width: 900px;margin: auto;padding: 20px">
                    <h2 style="width: 95%;margin: auto;background-color: #ff5295;color: white;padding: 5px">&nbsp&nbsp&nbsp پسورد جدید خودتان را ایجاد نمایید.</h2>

                    <form method="post" action="" style="padding: 17px" >
                        <p><label style="font-size: 19px">پسورد جدید را وارد کنید : </label><input style="height: 35px;width: 270px;margin: 10px;float: " type="password" name="password"/></p>
                        <p><label style="font-size: 19px"> دوباره پسورد جدید را وارد کنید : </label><input style="height: 35px;width: 270px;margin: 10px" type="password" name="repassword" size="50"/></p>
                        <p><input  class="chan" style="height: 45px;width: 130px;margin: 10px;float: left;font-size: 20px" type="submit" name="create" value="تغییر کن" /></p>
                    </form>
                </div>
                <?php


            }else{
                echo "<script>alert('There is an errors,check a gain the last email That we send it for you. :) ')</script>";
                echo "<script>window.open('hotels.php','_self')</script>";

            }


        }

        ?>

    </div>
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