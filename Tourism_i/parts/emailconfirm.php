<?php

include('header.php');

require_once 'config.php';
?>
<!-- end of Header -->

<body  style="background-color: #dbd9e4">
<!-- start of content -->
<div id="templatemo_content">

    <!-- start of left ocntent -->
    <div id="templatemo_content_left">
        <div class="cleaner_with_height">&nbsp;</div>
        <?php

        if(isset($_GET["code"])) {

//            $con = mysqli_connect("localhost", "root", "", "Tourism_i");

            if (mysqli_connect_errno()) {
                echo "ارتباط با پایگاه داده برقرار نیست . شماره خطا :" . mysqli_connect_errno();
            }

            $code = $_GET["code"];
            $email = $_GET["email"];

                $path_parts= explode('parts/', $_SERVER['REQUEST_URI']);
                $location = $path_parts[2];


            $query = "SELECT * FROM `users` WHERE `confirm_code` = '$code'";
            $result = mysqli_query($con, $query);

            while ($row = mysqli_fetch_array($result)) {
                $confirm_code = $row['confirm_code'];

            }
//            echo $confirm_code;
            if( $confirm_code == $_GET['code']){
                $_SESSION['user_email'] = $_GET['email'];

                mysqli_query($con,"update users set confirmed='1' ");

                mysqli_query($con,"update users set confirm_code='0' ");

                echo "<script>alert(' ایمیل آدرس شما تایید و ثبت نام شما تکمیل شد. ')</script>";
//                login($email);
                echo "<script>window.open('$location','_self')</script>";

//                $_SESSION['customer_email'] = $_GET['email'];
//                if(isset($_SESSION['customer_email'])){
//                    echo "<script>window.open('$location','_self')</script>";
//
//                }

            }else{

                echo "<script>alert('ایمیل با کد تایید مطابقت ندارد.')</script>";
                echo "<script>window.open('register.php','_self')</script>";

            }


        }else{
            ?>
            <div style="width: 60%;margin: 15%" dir="rtl">
                <div style="background-color: white;padding: 60px">
                <p style="font-size: 21px">لینکی به آدرس ایمیل<?=$_GET["email"]  ?>
                    ارسال شده است، لطفا روی ان  کلیک کنید و رمز عبور جدید برای حساب کاربری خود انتخاب کنید.</p>
            </div>
            </div>

        <?php
        }



        ?>

        <div class="cleaner_with_height">&nbsp;</div>
    </div>
    <!-- end of left content  -->


    <div class="cleaner">&nbsp;</div>
</div>
</body>