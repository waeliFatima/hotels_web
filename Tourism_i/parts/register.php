<?php
include '../parts/header.php';
include 'config.php';
?>

<body style="background-color: #dbd9e4">

<input type='hidden' name='location' value='<?php
if(isset($_GET['location'])){

//    echo $user;

    echo htmlspecialchars($_GET['location']);$location1 =htmlspecialchars($_GET['location']);
    $path_parts= explode('location=/', $_SERVER['REQUEST_URI']);
    $location = $path_parts[1];

//    echo $location;

//    $message = "
//				به منظور تکمیل کردن ثبت‌نام خود، لطفا با کلیک کردن روی لینک زیر آدرس ایمیل خود را تائید کنید.
//				http://be8567bc.ngrok.io/Tourism_i/parts/emailconfirm.php?location$location";
//    mail('waeli.icsf.1996@gmail.com', "ازسایت جزیره برای رزور", $message, "Form:fatiagaingit@gmail.com");
//
//    echo "<script>alert('با تشکر از ثبت نام شما. برای تکمیل فرآیند ثبت نام لطفا بر روی لینک فعال سازی که از طریق ایمیل برای شما ارسال شده است، کلیک کنید. ')</script>";
//    echo "<script>window.open('emailconfirm.php','_self')</script>";

}?>'>;

<div style="width: 57%;margin-left: 30%;margin-top: 10%;font-size: 20px;color: #7a7a7a ;background-color: white"
     dir="rtl">

    <form method="post" action="">
        <div class="container">
            <?php

//            echo $location;
            ?>
            <div style="margin: 30px"></div>
            <span style="font-size: 24px;padding: 40px;margin: 20px"><strong>ایجاد حساب کاربری</strong></span><br>
            <hr>
            <?php
            if (isset($_POST['register'])){
            $errors = [];
            $phone = mysqli_real_escape_string($con, $_POST['phone']);
            $password = mysqli_real_escape_string($con, $_POST['password']);
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $re_password = mysqli_real_escape_string($con, $_POST['re_password']);
            $rule = isset($_POST['rule']) ? 'Yes' : 'No';



            if (empty($email)) {
                array_push($errors, "لطفا ایمیل خود را وارد کنید");
            } else {
                $email_validate = $email;
                if (filter_var($email_validate, FILTER_VALIDATE_EMAIL) == true) {
                    $c_email = $email_validate;



                    $query_exist_email="select * from users where email='$email'";
                    $run_exist_email=mysqli_query($con,$query_exist_email);
                    $check_email = mysqli_num_rows($run_exist_email);
                    if($check_email == 0)
                    {
                        $c_email=$email;

                    }else{

                        array_push($errors, "با این ایمیل قبلا ثبت نام انجام شده است؛ لطفا ایمیل جدیدی وارد نمایید");

                    }


                } else {
                    array_push($errors, "ایمیل نادرستی  وارد کرده اید.لطفا ایمیل درستی وارد کنید.");
                }
            }
            if ($rule == 'No') {
                array_push($errors, "قوانین و مقررات تایید کنید");
            } else {
                $rule_validate = $rule;

            }

            if (empty($phone)) {
                array_push($errors, "تلفن خود را وارد نکردید");
            } else {
                if (preg_match("/^[0]{1}[9]{1}\d{9}$/", $phone)) {
                    // phone is valid
                    $c_phone = $phone;
                } else {
                    array_push($errors, "تلفنی که وارد کردید صحیح نمی باشد");
                }
            }
            if (empty($password)) {
                array_push($errors, "پسورد خود را وارد نکرده اید!");
            } else {
                if (preg_match("/^(?=.*\d).{6,20}$/", $password)) {
                    // phone is valid
                    $c_password_1 = $password;
                } else {
                    array_push($errors, "پسوردی که وارد کرده اید، طبق الگو نیست.لطفا دوباره پسورد را وارد نمایید .رمز عبور باید انگلسی, دارای کاراکترهای رقمی و تعداد کارکتر ها حداقل 6 می باشد. ");
                }
            }
            if (empty($re_password)) {
                array_push($errors, "پسورد دوم را وارد نکرده اید!!!");
            }

            if ((!empty($password)) && (!empty($re_password))) {

                if ($password != $re_password) {
                    array_push($errors, "پسورد های وارد شده یکسان نیستند");
                }
            }
//            if (isset($_COOKIE["ipUserIsland"])) {
//                $ip = $_COOKIE["ipUserIsland"];
//            } else {
//                $ip = getIp();
//                setcookie('ipUserIsland', $ip, time() + 1206900);
//            }


            ?>
            <div>
                <?php
                if (count($errors) >= 0) : ?>
                    <div class="b-danger">
                        <?php
                        foreach ($errors as $err) :?>
                            <p class="bg-danger"><?php echo $err ?></p>

                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php

                    if (count($errors) == 0) {
                        $confirmcode = rand();
                        $query = "INSERT INTO users(email, phone, password,confirmed,confirm_code) VALUES (N'$c_email',N'$phone',N'$password','0',$confirmcode)";

                        $run_c = mysqli_query($con , $query);
//                        $run_c = $con->exec($query);
//                        echo "New record created successfully";
                        if ($run_c) {
                            echo 'hi';

                            $message = "
				به منظور تکمیل کردن ثبت‌نام خود، لطفا با کلیک کردن روی لینک زیر آدرس ایمیل خود را تائید کنید.
				http://localhost/Tourism_i/parts/emailconfirm.php?email=$email&code=$confirmcode&location$location";
                            mail($email, "ازسایت جزیره برای رزور", $message, "Form:fatiagaingit@gmail.com");

                            echo "<script>alert('با تشکر از ثبت نام شما. برای تکمیل فرآیند ثبت نام لطفا بر روی لینک فعال سازی که از طریق ایمیل برای شما ارسال شده است، کلیک کنید. ')</script>";
                            echo "<script>window.open('emailconfirm.php?email=$email','_self')</script>";

                        }

                    }

                }
                ?>
            </div>


            <div class='col-md-6' dir="rtl">
                <div class="form-group">
                    <div class='input-group'>
                        <label>تلفن همراه (الزامی)</label><br>
                        <input name="phone" style="width: 400px;" type='text' value="<?php if(isset($_POST['phone'])){echo $_POST['phone'];} ?>">
                    </div>
                </div>
            </div>
            <div class='col-md-6' dir="rtl">
                <div class="form-group">
                    <div class='input-group'>
                        <label>ایمیل (الزامی)</label><br>
                        <input name="email" style="width: 400px;" type='text' value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>">
                    </div>
                </div>
            </div>


            <div class='col-md-6' dir="rtl">
                <div class="form-group">
                    <div class='input-group'>
                        <label>تکرار رمز عبور (الزامی)</label><br>
                        <input name="re_password" style="width: 400px;" type='password'>
                    </div>
                </div>
            </div>

            <div class='col-md-6' dir="rtl">
                <div class="form-group">
                    <div class='input-group'>
                        <label>رمز عبور (الزامی)</label><br>
                        <input name="password" style="width: 400px;" type='password'>
                    </div>
                </div>
            </div>

            <div style="margin: 20px;font-size: 24px"><input name="rule" class="" style="margin: 20px" type="checkbox"
                                                             value="Yes"><a style="text-decoration: none">قوانیین و
                    مقررات</a> سفر را می پذیرم
            </div>
            <input name="register" type="submit" style="width: 100% ;font-size: 22px" value="ثبت نام"
                   class="btn btn-primary"><br>
            <hr>
            <br>
            <?php
            $path_parts1= explode('location=', $_SERVER['REQUEST_URI']);
            $location1 = $path_parts1[1];
            ?>
            <span style="font-size: 24px">قبلا ثبت نام کرده اید ؟ <a href="login.php?location="<?=$location1?> style="text-decoration: none">وارد شوید</a></span>
            <div style="margin: 30px"></div>

        </div>
    </form>

</body>

<!--
                </div>


            </form>
        </div>

</body>