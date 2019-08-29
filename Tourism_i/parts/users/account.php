<?php
require_once '../config.php';
if (isset($_SESSION['user_email'])){
    $email = $_SESSION['user_email'];

    function _custom_check_national_code($code)
    {


    }
//    echo 'hlod'    ?>
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
          integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
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
    <a style="text-decoration: none"><span class="fa fa-star "></span> امتیاز ها</a><span style="margin: 20px">|</span>
    <a style="text-decoration: none"><span class="fa fa-behance "></span> سفارشات و استرادات</a><span
            style="margin: 20px">|</span>
    <a href="comment.php" style="text-decoration: none"><span class="glyphicon glyphicon-envelope "></span> ثبت نظر </a><span
            style="margin: 20px">|</span>
    <a href="mypassengers.php" style="text-decoration: none"><span class="fa fa-list "></span> لیست مسافران </a><span
            style="margin: 20px">|</span>
    <a href="cridet.php" style="text-decoration: none"><span class="fa fa-credit-card "></span> افزایش اعتبار</a>
</div>


<div style="margin:80px"></div>
<div
        style="width: 1140px;margin: auto;padding:18px;background-color: white;font-size: 16px;color: #87818a; height: 65px"
        dir="rtl">
    <div style="float: right">موجودی حساب : 0 ریال</div>
    <div style="float: left"><input name="increase_cridit" class="btn btn-primary" type="submit"
                                    style="width: 170px;font-size:17px" value="افزایش اعتبار"></div>
</div>

<form method="post">
    <div style="margin:80px"></div>

    <div style="width: 1140px;margin: auto;font-size: 16px;color: #87818a" dir="rtl">

        <div style="width: 49.5%;height:580px;background-color: #f6f2ff;float: left;;padding: 20px">برای امتیاز</div>
        <div style="width: 49.5%;height:580px;background-color: white;float: right;padding: 10px;">
            <?php

            if (isset($_GET['changepassemail'])){
            $errors = [];
            $changequery = "SELECT * FROM `users` WHERE `email`='$email'";
            $run_login = mysqli_query($con, "SET NAMES utf8");
            $run_login = mysqli_query($con, "SET CHARACTER SET utf8");
            $run_login = mysqli_query($con, $changequery);
            if (isset($_POST['changepa'])) {
                if (!empty($_POST['old_password']) and (!empty($_POST['newpass'])) and (!empty($_POST['connewpass']))) {
                    $password = $_POST['old_password'];
                    if (preg_match("/^(?=.*\d).{6,20}$/", $_POST['newpass'])) {
                        $newpassword = $_POST['newpass'];
                        $confirmnewpassword = $_POST['connewpass'];

                        if ($newpassword != $confirmnewpassword) {
                            array_push($errors, 'رمز عبور جدید و تکرارش تکرارش یگسان نیستند.لطفا مجددا وارد کنید.');
                        } else {
                            $query = "SELECT * FROM `users` WHERE `email`='$email'";
                            $result = mysqli_query($con, $query);

                            while ($row = mysqli_fetch_array($result)) {
                                $currntpass = $row['password'];
                                if ($password == $currntpass) {
                                    mysqli_query($con, "update users set `password`='$newpassword' ");
                                    echo "<script>window.open('account.php','_self')</script>";


                                } else {
                                    array_push($errors, 'پاسورت فعلی شما درست وارد نکرده اید .لطفا مجددا وارد کنید');

                                }

                            }
                        }

                    } else {
                        array_push($errors, "پسوردی که وارد کرده اید، طبق الگو نیست.لطفا دوباره پسورد را وارد نمایید .رمز عبور باید انگلسی, دارای کاراکترهای رقمی و تعداد کارکتر ها حداقل 6 می باشد. ");
                    }

                } else {
                    array_push($errors, 'کاربر محترم برای تغییر رمز خود باید تمام فلید های زیر را پر کنید.');


                }
                if (count($errors) > 0) : ?>
                    <div class="b-danger">
                        <?php
                        foreach ($errors as $err) :?>
                            <p class="bg-danger"><?php echo $err ?></p>

                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php
            }

            ?>

            <div style="width: 95%;margin: auto;color: #857482;font-size: 16px">
                <div style="margin-top: 50px">
                    <label>رمز عبور قبلی (الزامی)</label><br>
                    <input name="old_password" type="password" style="width: 100%;height: 40px">
                </div>
                <div style="margin: 50px"></div>
            </div>
            <span style="float: right">
                    <label>رمز عبور جدید (الزامی)</label><br>
                        <input name="newpass" type="password" style="width: 240px;height: 40px"><br></span>
            <span style="float: left">
                    <label>
                        تکرار رمز عبور جدید (الزامی)</label><br>
                        <input name="connewpass" type="password" style="width: 240px;height: 40px"></span>

            <div style="margin: 160px"></div>
            <input name="cancel" class="cancel" type="submit" value=" لغو ">
            <input name="changepa" class="btn btn-primary" type="submit" style=" width: 240px;height: 40px;float: left"
                   value="تغییر رمز عبور">
            <?php
            if (isset($_POST['cancel'])) {
                echo "<script>window.open('account.php','_self')</script>";
            }
            ?>

        </div>


        <?php

        } elseif (isset($_GET['edit_profid'])) {

                $infuser = "SELECT  * FROM `users` WHERE `email`='$email'";

                $edituser = @mysqli_query($con, "SET NAMES utf8");
                $edituser = @mysqli_query($con, "SET CHARACTER SET utf8");
                $edituser = @mysqli_query($con, $infuser);
                while ($row = mysqli_fetch_array($edituser)) {
                    if(isset($_POST['editmyifor'])) {
                        if (isset($_POST['day']) and isset($_POST['month']) and isset($_POST['year'])) {
                            $birhtdayset = $_POST['month'] . '/' . $_POST['day'] . '/' . $_POST['year'];
                        }
//                        $birhtdays = (isset($_POST[$birhtdayset])? $_POST[$birhtdayset] : '');

                        $errors = [];
                        $phone = mysqli_real_escape_string($con, $_POST['phone']);

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

                        if(!$_POST['personailynum']){
                            $personailynum = '';
                        }else {
                            if (!preg_match('/^[0-9]{10}$/', $_POST['personailynum'])) {
                                array_push($errors,'شماره ملی که وارد کردی درست نمی باشد ');
                            } else {
                                for ($i = 0; $i < 10; $i++)
                                    if (preg_match('/^' . $i . '{10}$/', $_POST['personailynum']))
                                        array_push($errors,'شماره ملی که وارد کردی درست نمی باشد ');
                                for ($i = 0, $sum = 0; $i < 9; $i++)
                                    $sum += ((10 - $i) * intval(substr($_POST['personailynum'], $i, 1)));
                                $ret = $sum % 11;
                                $parity = intval(substr($_POST['personailynum'], 9, 1));
                                if (($ret < 2 && $ret == $parity) || ($ret >= 2 && $ret == 11 - $parity)) {
                                    $personailynum = $_POST['personailynum'];

                                } else {
                                    array_push($errors,'شماره ملی که وارد کردی درست نمی باشد ');

                                }
                            }
                        }

                        $firstname = (isset($_POST['firstname']) ? $_POST['firstname'] : '');
                        $lastname = (isset($_POST['lastname']) ? $_POST['lastname'] : '');
                        $homephone = (isset($_POST['homephone']) ? $_POST['homephone'] : '');
//                        _custom_check_national_code($_POST['personailynum']);
//                        $personailynum = (isset($_POST['personailynum']) ? $_POST['personailynum'] : '');
                        $numcirditcart = (isset($_POST['numcirditcart']) ? $_POST['numcirditcart'] : '');
                        $numcountcart = (isset($_POST['numcountcart']) ? $_POST['numcountcart'] : '');
                        $shabnumcart = (isset($_POST['shabnumcart']) ? $_POST['shabnumcart'] : '');
                        $gender = (isset($_POST['gender']) ? $_POST['gender'] : '');
                        if (count($errors) == 0) {
                            mysqli_query($con, "UPDATE `users` SET `phone`='$c_phone',`firstname`='$firstname',`lastname`='$lastname',`homephone`='$homephone',`gender`='$gender',`personailynum`='$personailynum',`birhtdy`='$birhtdayset',`numcirditcart`='$numcirditcart',`numcountcart`='$numcountcart',`shabnumcart`='$shabnumcart' WHERE  `email`='$email' ");
                            echo "<script>window.open('account.php','_self')</script>";

                        }


                        ?>
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
                    }
                        ?>
                    <div style="margin-top: 30px"></div>
                    <span style="float: right">
                     <label>حنسیت</label><br>
                <select name="gender" style="width: 80px;height: 40px">
                    <option><?= $row['gender'] ?></option>
                    <option>مرد</option>
                    <option>زن</option>
                </select>
                    <span>
                    <label>اسم</label>
                        <?php


                        ?>
                        <input  name="firstname" type="text" style="width: 140px;height: 40px"
                               value="<?= $row['firstname'] ?>"><br>
                    </span>
                </span>

                    <span style="float: left">
                    <label>نام خانوادگی</label><br>
                        <input name="lastname" type="text" style="width: 240px;height: 40px" value="<?= $row['lastname'] ?>"></span>

                    <span style="float: right;margin-top: 25px">
                    <label>ایمیل</label><br>
                        <input readonly name="email" type="email" style="width: 240px;height: 40px;background-color: #f2effb"
                               value="<?= $row['email'] ?>"><br></span>
                    <span style="float: left;margin-top: 25px;">
                    <label>تلفن همراه</label><br>
                        <input name="phone" type="text" style="width: 240px;height: 40px" value="<?= $row['phone'] ?>"></span>

                    <span style="float: right;margin-top: 25px">
                    <label>شماره تلفن</label><br>
                        <input name="homephone" type="text" style="width: 240px;height: 40px" placeholder="021-88888888"
                               value="<?= $row['homephone'] ?>"><br></span>
                    <span style="float: left;margin-top: 25px">
                    <label>کد ملی</label><br>
                        <input name="personailynum" type="text" style="width: 240px;height: 40px" value="<?= $row['personailynum'] ?>"></span>

                    <span style="float: right;margin-top: 25px">
                    <label>تاریخ تولد</label><br>
                        <?php
                    if ($row['birhtdy'] != '') {
                        $birhtday = $row['birhtdy'];
                        $myArraybithdaty = explode('/', $birhtday);
                        $day = $myArraybithdaty[0];
                        $month = $myArraybithdaty[1];
                        $year = $myArraybithdaty[2];
                    } else {
                        $birhtday = date("Y/m/d");
                        $myArraybithdaty = explode('/', $birhtday);
                        $day = $myArraybithdaty[2];
                        $month = $myArraybithdaty[1];
                        $year = $myArraybithdaty[0];
                    }
                    ?>
                        <select name="year" style="height: 40px;width: 80px">
                            <option><?= $year ?></option><?php for ($i = 2018; $i >= 1950; $i--) { ?>
                            <option><?= $i ?></option><?php } ?></select>
                    <select name="day" style="height: 40px;width: 80px"><option><?= $day ?></option><?php for ($i = 1; $i <= 31; $i++) { ?>
                            <option><?= $i ?></option><?php } ?></select>
                    <select name="month" style="height: 40px;width: 80px"><option><?= $month ?></option><?php for ($i = 1; $i <= 12; $i++) { ?>
                            <option><?= $i ?></option><?php } ?></select>

                </span>
                    <span style="float: left;margin-top: 25px">
                    <label>شماره کارت</label><br>
                        <input name="numcirditcart" type="text" style="width: 240px;height: 40px" value="<?=$row['numcirditcart']?>"></span>
                    <span style="float: right;margin-top: 25px">
                    <label>شماره حساب</label><br>
                        <input name="numcountcart" type="text" style="width: 240px;height: 40px" value="<?=$row['numcountcart']?>"><br></span>
                    <span style="float: left;margin-top: 25px;">
                    <label>شماره شبا</label><br>
                        <input name="shabnumcart" type="text" style="width: 240px;height: 40px" placeholder="IR" dir="ltr" value="<?=$row['shabnumcart']?>"></span>

                    <input name="cancel" class="cancel" type="submit" value=" لغو " style="margin-top: 25px">
                    <input name="editmyifor" class="btn btn-primary" type="submit"
                           style=" width: 240px;height: 40px;float: left;margin-top: 25px"
                           value="ویرایش اطلاعات">
                    <?php
                    if (isset($_POST['cancel'])) {
                        echo "<script>window.open('account.php','_self')</script>";
                    }
                }

            ?>


            <?php
        } else {

            $infuser = "SELECT  * FROM `users` WHERE `email`='$email'";

            $infouser = @mysqli_query($con, "SET NAMES utf8");
            $infouser = @mysqli_query($con, "SET CHARACTER SET utf8");
            $infouser = @mysqli_query($con, $infuser);
            while ($row = mysqli_fetch_array($infouser)) {


                ?>
                <div style="height:40px;background-color: #f4f4f4;padding: 9px"><span
                            style="float: left"><?=$row['firstname']?></span><span
                            style="float: right">نام:</span></div>
                <div style="height:40px;background-color: #ffffff;padding: 9px"><span
                            style="float: left"><?=$row['lastname']?></span><span
                            style="float: right">نام خانوادگی:</span></div>
                <div style="height:40px;background-color: #f4f4f4;padding: 9px"><span
                            style="float: left"><?=$row['email']?></span><span
                            style="float: right">ایمیل:</span></div>
                <div style="height:40px;background-color: #ffffff;padding: 9px"><span
                            style="float: left"><?=$row['phone']?></span><span
                            style="float: right">شماره همراه:</span></div>
                <div style="height:40px;background-color: #f4f4f4;padding: 9px"><span
                            style="float: left"><?=$row['homephone']?></span><span
                            style="float: right">شماره تلفن:</span></div>
                <div style="height:40px;background-color: #ffffff;padding: 9px"><span
                            style="float: left"><?=$row['personailynum']?></span><span
                            style="float: right">کد ملی:</span></div>
                <div style="height:40px;background-color: #f4f4f4;padding: 9px"><span
                            style="float: left"><?=$row['birhtdy']?></span><span
                            style="float: right">تاریخ تولد:</span></div>
                <div style="height:40px;background-color: #ffffff;padding: 9px"><span
                            style="float: left"><?=$row['gender']?></span><span
                            style="float: right">جنسیت :</span></div>
                <div style="height:40px;background-color: #f4f4f4;padding: 9px"><span
                            style="float: left"><?=$row['numcirditcart']?></span><span
                            style="float: right">شماره کارت:</span></div>
                <div style="height:40px;background-color: #ffffff;padding: 9px"><span
                            style="float: left"><?=$row['numcountcart']?></span><span
                            style="float: right">شماره حساب:</span></div>
                <div style="height:40px;background-color: #f4f4f4;padding: 9px"><span
                            style="float: left"><?=$row['shabnumcart']?></span><span
                            style="float: right">شماره شبا:</span></div>
                <div style="margin: 20px"></div>
                <div style="margin: auto;font-size: 16px">
                <?php
            }
                ?>
                <input name="btn_logout" class="btn_logout" type="submit" value="خروج از حساب کاربری">
                <input name="change_pass" class="change_pass" type="submit" value="تغییر رمز عبور">
                <input name="edit_profile" class="edit_profile" type="submit" value="ویرایش اطلاعات ">

            </div>
            <?php
            if (isset($_POST['btn_logout'])) {
                echo "<script>window.open('../logout.php','_self')</script>";
            }

            if (isset($_POST['change_pass'])) {
                echo "<script>window.open('account.php?changepassemail=$email','_self')</script>";
            }
            if (isset($_POST['edit_profile'])) {
                echo "<script>window.open('account.php?edit_profid=$email','_self')</script>";
            }
        }
        ?>
    </div>

    </div>
</form>

<h3 style="color:#f2f0fb ">$</h3>


</body>
<style>
    input.btn_logout {
        width: 160px;
        height: 40px;
        margin: 8px;
        color: #dc0000;;
        background-color: white;
        border: 1px solid #dc0000
    }

    input.btn_logout:hover {
        color: white;
        background-color: #dc0000;
    }

    input.change_pass {
        width: 160px;
        height: 40px;
        margin: 8px;
        color: #4663ff;;
        background-color: white;
        border: 1px solid #4663ff
    }

    input.change_pass:hover {
        color: white;
        background-color: #4663ff;
    }

    input.edit_profile {
        width: 160px;
        height: 40px;
        margin: 8px;
        color: #54dc43;;
        background-color: white;
        border: 1px solid #54dc43
    }

    input.edit_profile:hover {
        color: white;
        background-color: #54dc43;
    }

    input.cancel {
        width: 240px;
        height: 40px;
        color: #fe741d;;
        background-color: white;
        border: 1px solid #fe741d
    }

    input.cancel:hover {
        color: white;
        background-color: #fe741d;
    }
</style>
    <?php
}else{
    echo "<script>window.open('../login.php?location=users/account.php','_self')</script>";

}