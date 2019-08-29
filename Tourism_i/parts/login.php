<?php
include 'header.php';
require_once 'config.php';


?>

<body style="background-color: #dbd9e4 ">


<input type='hidden' name='location' value='<?php
if (isset($_GET['location'])) {
   htmlspecialchars($_GET['location']);
    $location = (($_GET['location']));
} ?>'>;

<form method="post">
    <div style="margin: auto">
    <div style="width: 50%;margin: auto;;font-size: 22px;color: #606060 ;background-color: white"
         dir="rtl">
        <?php
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
//            if(isset($email_valid)){
//                echo $email_valid;
//            }
        if((isset($email)) && (isset($password))){
            $sel_c ="SELECT * FROM `users` WHERE `email`='$email' AND `password`='$password'";


            $run_c = @mysqli_query($con, "SET NAMES utf8");
            $run_c = @mysqli_query($con, "SET CHARACTER SET utf8");
            $run_c = @mysqli_query($con, $sel_c);
            $check_user = $run_c->num_rows;


            if($check_user == 0 ){

                echo "<script>alert('ایمیل با پاسورت شما اشتباه وارد کردید، لطفا دوباره امتحان کنید')</script>";
            }else {
                $sel_login = "SELECT * FROM `users` WHERE `email`='$email_valid' AND `password`='$password'";

                $run_login = mysqli_query($con, "SET NAMES utf8");
                $run_login = mysqli_query($con, "SET CHARACTER SET utf8");
                $run_login = mysqli_query($con, $sel_login);

                while ($row = @mysqli_fetch_array($run_login)) {
                    $confirmed = $row['confirmed'];
//                    echo $confirmed;


                    if ($confirmed == 1) {
                        $_SESSION['user_email'] = $email_valid;
                        htmlspecialchars($_GET['location']);
                        $location1 = ($_GET['location']);

                        echo "<script>window.open('$location1','_self')</script>";

                    } else {
                        echo "<script>alert('شما ایمیل خود تایید نکرده اید .لطفا ایمیل خود با کد که براتون ایمیل کرده تایید کنید ')</script>";
                    }
                }
            }


        }


        ?>
        <div class="container">
            <div class="col-md-7" style="background-color: #ffffff">
                <input type="button" value="ورود" id="login"
                       style="width: 200px ;height: 130px;border: 1px solid #c4c4c4 ;background-color: #ffe9ef;color: #ff5295">
                <input name="login_with_temptory"
                       style="margin: 30px;width: 200px ;height: 130px;border: 1px solid #c4c4c4 ;background-color: white;color: #a0a0a0"
                       type="submit" value="ورود بارمز موقت">

                <div style="margin: 20px"></div>
                <label>ایمیل خود را وارد کنید</label><br>
                <input name="email"
                       style="border: 1px solid #b6b6b6 ;background-color: #ffe9ef;color: #ff5295;width: 500px;height: 55px"><Br><br>
                <label>رمز عبور</label><br><br>
                <input name="password"
                     type="password"  style="border: 1px solid #b6b6b6 ;background-color: #ffe9ef;color: #ff5295;width: 500px;height: 55px"><br><br>
                <input name="login" type="submit" value="وارد شوید" style="width: 500px;height: 55px;font-size: 24px"
                       class="btn btn-primary"><br><br>
                <span style="width: 500px;height: 55px;font-size: 24px;"><a
                            style="margin-right: 190px;text-decoration: none"
                            href="forgot_password.php?location=<?php if (isset($_GET['location'])){
                                echo $location;
                            }?>">بازیابی رمز عبور</a></span><br><br>
                <hr>
                <input name="register" type="submit" value="ثبت نام" style="width: 500px;height: 55px;font-size: 24px"
                       class="btn btn-success"><br><br>


            </div>
            <div class="col-md-3" style="background-color: white;padding: 11px ;left: 18%">
                <div style="margin: 150px;"></div>
                <h4 style="font-size: 16px;"><strong>برای ایمنی لطفا اطلاعات زیر را مطالعه بفرمایید</strong></h4>
                <ul style="font-size: 15px;width: 470px">
                    <li>نام کاربری و رمز خود را در اختیار سایرین قرار ندهید.</li>
                    <br>
                    <li>از رمز عبوری استفاده کنید که حدس زدن آن برای دیگران غیر ممکن باشد.</li>
                    <br>
                    <li>پس از خرید بلیط در فضاهای اشتراکی مثل کافی‌نت‌ها، حتما از حساب خود خارج شوید.</li>
                    <br>
                </ul>
                <div style="margin: 100px"></div>
            </div>
        </div>

    </div>
    </div>
    <div style="margin: 70px"></div>
    <div>d</div>

    <?php if (isset($_POST['login_with_temptory'])) {
//        echo("<script>location.href = 'login_with_temprory.php?location=$location';</script>");
    }
    ?>

    <?php if (isset($_POST['register'])) {
        echo("<script>location.href = 'register.php?location=$location';</script>");
    }
    ?>
</form>
</body>