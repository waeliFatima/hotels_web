<?php
include '../parts/header.php'
?>

<body style="background-color: #dbd9e4">
<input type='hidden' name='location' value='<?php
if(isset($_GET['location'])){  echo htmlspecialchars($_GET['location']);$location =htmlspecialchars($_GET['location']);
}?>'>;
        <div style="width: 50%;margin-left: 35%;margin-top: 10%;font-size: 22px;color: #606060 ;background-color: white"
             dir="rtl">

            <form method="post" action="">
                <div class="container">
                    <div class="col-md-7" style="background-color: #ffffff">


                        <input name="login" style="margin: 30px;width: 200px ;height: 130px;border: 1px solid #c4c4c4 ;background-color: white;color: #a0a0a0" type="submit" value="ورود">

                        <input type="button" value="ورود بارمز موقت" id="login_with_temptory" name="login_with_temptory"
                               style="margin: 30px;width: 200px ;height: 130px;border: 1px solid #c4c4c4 ;background-color: #ffe9ef;color: #ff5295">

                        <div style="margin: 18px"></div>
                        <label>آدرس ایمیل حساب کاربری خود وارد کنید تا کد تایید به شما ارسال شود.</label><br><br>
                        <input
                            style="border: 1px solid #b6b6b6 ;background-color: #ffe9ef;color: #ff5295;width: 500px;height: 55px"><Br><br>

                        <input type="button" value="ارسال کد تایید" style="width: 500px;height: 55px;font-size: 24px"
                               class="btn btn-primary"><br><br>
                        <span style="width: 500px;height: 55px;font-size: 24px;"><a
                                style="margin-right: 190px;text-decoration: none"
                                href="#">بازیابی رمز عبور</a></span><br><br>
                        <hr>
                        <input name="register" type="submit" value="ثبت نام" style="width: 500px;height: 55px;font-size: 24px" class="btn btn-success" ><br><br>



                    </div>
                    <div class="col-md-4" style="background-color: white;padding: 10px">
                        <div style="margin: 140px"></div>
                        <ul>
                            <li>نام کاربری و رمز خود را در اختیار سایرین قرار ندهید.</li>
                            <li>از رمز عبوری استفاده کنید که حدس زدن آن برای دیگران غیر ممکن باشد.</li>
                            <li>پس از خرید بلیط در فضاهای اشتراکی مثل کافی‌نت‌ها، حتما از حساب خود خارج شوید.</li>
                        </ul>
                        <div style="margin: 100px"></div>
                    </div>
                </div>


            </form>


        </div>
        <?php if(isset($_POST['login'])) {
            echo("<script>location.href = 'login.php?location=$location';</script>");
        }

        ?>
        <?php if(isset($_POST['register'])) {
            echo("<script>location.href = 'register.php?location=$location';</script>");
        }
        ?>

</body>