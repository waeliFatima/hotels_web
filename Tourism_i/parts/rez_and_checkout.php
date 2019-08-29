<?php

require_once 'config.php';


//start sesstion........................................................................................................
if (isset($_SESSION['user_email'])) {
    $user=$_SESSION['user_email'];
    $finduser = "SELECT * FROM `users` WHERE `email`='$user'";
    $find = mysqli_query($con,$finduser);
    $id_use= mysqli_fetch_assoc($find);
    $id_user = $id_use['id_user']

?>

<?php
include "header.php";
//......................................................................................................................
?>
<body style="background-color: #f7f7f7;width: 100%;margin: auto" dir="rtl">


<div style="margin-top: 5%;"></div>
<?php
//geting data form url..................................................................................................
    $id_room =  $_GET['id_room'];
    $id_hotel = $_GET['id_hotel'];
    $date1 =  $_GET['dateIn'];
    $dateIn = date("Y-m-d", strtotime($date1));
    $date2 = $_GET['dateOut'];
    $dateOut = date("Y-m-d", strtotime($date2));
    $price = $_GET['price'];
    $_SESSION['price'] = $price;
//......................................................................................................................
?>
<form method="post" action="">
    <div class="container" style="width: 100%;font-size: 20px;color: #56555d">
        <div class="row-md-2">
            <div class="col-md-2" style="background-color: #f7f7f7;left:11%;margin-right: 280px ">
                <div style="height: 70px"></div>
                <div style="background-color: white;height: 500px;width: 320px;align-items: center;
                        margin: 0 auto;
                        padding: 40px;border-color: #8a8893;
                        position: relative;" dir="rtl">
                    <div>
                        <div class="" style="float: right"><span
                                    style="color: #3686f2;font-size: 24px">تاریخ ورود</span><br>
                            <span style="font-size: 18px;color: black"><?= $_GET['dateIn'] ?></span>
                        </div>
                        <div class="" style="float: left"><span
                                    style="color: #3686f2;font-size: 24px">تاریخ خروج</span><br><span
                                    style="font-size: 18px;color: black">
                        <?= $_GET['dateOut'] ?>
                        </span></div>
                    </div>
                        <br><br><br>
                        <hr>
                    <div>
                        <?php
                        $per = (int)($_GET['person_child']);
                        $cj = (int)( $_GET['person_adobt']);
                        $res = $per + $cj;
                        ?>
                        <span style="font-size: 18px"> <span class="fa fa-bed"> </span><i>  </i> مشخصات اتاق </span><br>
                        <span style="color: #4b4b4b">اتاق <?= (int)($res) ?>
                            تخته </span><br>

                        <?php

                        //get facility of room......................................................................
                        $myq="SELECT room_faci.*,faci_and_room.* FROM rooms,faci_and_room,room_faci WHERE room_faci.id_room_faci=faci_and_room.id_faci AND faci_and_room.id_room=$id_room GROUP BY id_faci";
                        $ql = @mysqli_query($con, "SET NAMES utf8");
                        $ql = @mysqli_query($con, "SET CHARACTER SET utf8");
                        $ql = @mysqli_query($con, $myq);
                        $i=1;
                        while ($re= mysqli_fetch_array($ql) and $i <4){

                            ?>
                            <span style="background-color: #6cb8ff ;font-size: 18px ;color:#1461aa;padding: 6px;border:1px solid dodgerblue "><?=$re['title']?></span>
                            <?php
                            $i++; }
                        ?>
                            </div>
                            <hr>

                    <div>
                        <span><span class="fa fa-user"></span><i> </i>تعداد مسافرین اتاق  </span><br><br>
                                <div class="" style="float: right"><span class="fa fa-male"></span><span
                                    style="margin: 3px"><?= $_GET['person_adobt'] ?></span>
                             <span>بزرگسال</span>
                            </div>
                                 <div class="" style="float: left"><span class="fa fa-child"></span><span
                                    style="margin: 3px"><?php if (isset($_GET['person_child'])) {
                                    echo $_GET['person_child'];
                                } else echo 0 ?></span><span>کودک</span></div>
                        <br>
                        <hr>
                    </div>

                    <div>
                <span style="margin: 0 auto;padding: 5px">شروع قیمت کل <span
                            style="color: dodgerblue;font-size: 20px"> <?= $_GET['price']
                        ?></span> ریال</span>
                        <!--                <input type="submit" style="" value="مشاهد اتاق و رزور">-->
                    </div>
                </div>
            </div>
            <?php
            //..........................................................................................................
            ?>

            <div class="col-md-7" style="background-color:#ffffff;right:2%;margin-left: 20px;height: 600px"
                 dir="rtl">
                <div style="margin-top: 20px"></div>
                <?php
                //get map-------------------------------------------------
                ?>
                <div style="color: #424242">
                    <div style="float:left; width: 50%;height: 470px">
                        <iframe style="width: 100%;height: 470px" id="gmap_canvas"
                                src="https://www.google.com.qa/maps/d/embed?mid=1lraKeDHRBbIV0ZmekzXQvwVd-BAqp2a0"
                                frameborder="0"
                                scrolling="no" marginheight="0" marginwidth="0">

                        </iframe>
                    </div>

<?php
                    $getroomsss= mysqli_query($con,"SELECT * FROM `rooms` WHERE id_room='$id_room'");
                    $photoss=mysqli_fetch_assoc($getroomsss);
                    ?>

                    <div style="float: right; width: 50%;padding-left: 10px;height: 470px">
                        <img src='../public/image/image_room/<?=$photoss['image']?>'
                             style="height: 340px;width: 100%">


                        <?php
                        //information of hotel------------------------------id_hotel
                        $id_hotelsss= $_GET['id_hotel'];
                        $get_hotel = "SELECT * FROM `hotels` WHERE id_hotel='$id_hotelsss'";

                        $get_hotels = @mysqli_query($con, "SET NAMES utf8");
                        $get_hotels = @mysqli_query($con, "SET CHARACTER SET utf8");
                        $get_hotels = @mysqli_query($con, $get_hotel);
                        while ($row_hotel = @mysqli_fetch_array($get_hotels)) {
                        $glod_star = $row_hotel['star_hotels'];
                        $rest_sta = 5 - $glod_star;
                        ?>
                        <div style="margin: 35px"></div>
                        <span style="font-size: 14px"><strong
                                    style="font-size: 20px">هتل <?= $row_hotel['name_hotel'] ?></strong>
                            <?php
                            for ($i = 0; $i < $rest_sta; $i++) {
                                ?>
                                <span class="fa fa-star"></span>
                                <?php
                            }
                            for ($i = 0; $i < $glod_star; $i++) {
                                ?>
                                <span class="fa fa-star checked_star"></span>
                                <?php
                            }


                            ?>
                        </span><br>
                        <span><strong style="font-size: 15px">آدرس : </strong></span><br>
                        <span style="font-size: 18px"><span><?= $row_hotel['address'] ?> <span>

                                <?php
                                }
                                ?>


                                    <br>

                    </div>
                    <span style="background-color: #f1f1f1 ;float: right;padding: 24px;margin-top: 30px;width: 100%;color: #d10000"><strong>غیر قابل استرداد</strong></span>

                </div>
                <div style="margin-top: 20px; "></div>

                <div style="margin-top: 30px;background-color: #2e252b "></div>
            </div>


        </div>
    </div>
    <div style="margin: 5%"></div>
    <div style="width: 77%;margin: auto;padding: 20px;background-color: white;font-size: 20px;color: #695666"
         dir="rtl">
        <span class="fa fa-user "></span> مشخصات مسافران را وارد کنید
    </div>
    <h3 style="width: 77%;margin: auto;padding: 40px;font-size: 24px;color: #695666">
        اتاق 3 تخته
    </h3>

    <?php
    //check if errors happen--------------------------------------
    $errors = [];

    if (isset($_POST['continue'])) {
    if (empty($_POST['pphone0'])) {
        array_push($errors, "لطفا تلفن سرپرست را وارد کنید");
    }
    //for adobt person---------------------------------------------
    for ($j = 0;
         $j < $_GET['person_adobt'];
         $j++) {
    $pname = 'pname' . $j;
    $pfamily = 'pfamily' . $j;
    $ppersonalitynum = (string)('ppersonalitynum' . $j);
    $pse = 'pse' . $j;


    if (empty($_POST[$pname]) || empty($_POST[$pfamily]) || empty($_POST[$ppersonalitynum]) || empty($_POST[$pse])) {
    ?>
    <div class="b-danger" style="width: 77%;margin: auto;font-size: large">
        <?php array_push($errors, 'لطفا تمام فلید های بزرگسال' . ($j + 1) . ' را وارد کنید');
        }
        } ?>
        <?php
        //for child person------------------------------------------
        for ($j = 1;$j <= $_GET['person_child'];$j++) {
        $pname = 'gname' . $j;
        $pfamily = 'gfamily' . $j;
        $ppersonalitynum = (string)('gpersonalitynum' . $j);
        $pse = 'gse' . $j;


        if (empty($_POST[$pname]) || empty($_POST[$pfamily]) || empty($_POST[$ppersonalitynum]) || empty($_POST[$pse])) {
        ?>
        <div class="b-danger" style="width: 77%;margin: auto;font-size: large">
            <?php array_push($errors, 'لطفا تمام فلید های کودک' . ($j) . ' را وارد کنید');
                 }
            }

            $role = ((isset($_POST['rule']) && $_POST['rule'] != '') ? $_POST['rule'] : 'no');
            if ($role != 'Yes'){
            array_push($errors,'شما بدون تایید قوانین نمیوانید مراحل را ادمه دهید');
            }
            ?>
    </div>
    <?php
    //return the errors------------------------------------------------
    if (count($errors) >= 0) : ?>
        <div class="b-danger" style="margin: auto;font-size: large">
            <?php
            foreach ($errors as $err) :?>
                <p class="bg-danger"><?php echo $err ?></p>

            <?php endforeach; ?>
        </div>
    <?php endif; ?>
        <div dir="ltr">
        </div>
        </div>


    <?php

    if (count($errors) == 0) {
        ?>
        </div>

        <?php
        // inster the data of customer in reserve table -------------------------
        $payment = mysqli_query($con, "INSERT INTO `rezerve` (`id_user`, `id_room`,`id_hotel`, `date_in`, `date_out`, `price`, `authority`, `refid`) VALUES ('$id_user', '$id_room','$id_hotel', '$dateIn', '$dateOut', '$price','0','0')");
        $id_payment =  $con->insert_id;
        $_SESSION['id_payment']=$id_payment;
        echo $_SESSION['id_payment'];
        $phone = $_POST['pphone0'];
        for ($j = 0; $j < $_GET['person_adobt']; $j++) {
            $pname = 'pname' . $j;
            $pfamily = 'pfamily' . $j;
            $who = 'بزرگسال';
            $ppersonalitynum = (string)('ppersonalitynum' . $j);
            $pse = 'pse' . $j;
            //check is the customer in ouer data base-------------------------------
            $countperad = "SELECT * FROM `customers` WHERE `personilty_cus`='$_POST[$ppersonalitynum]'";
            $checountad = mysqli_query($con, $countperad);
            $check_adobt = mysqli_num_rows($checountad);
            $countperchi = "SELECT * FROM `customers` WHERE `personilty_cus`='$_POST[$ppersonalitynum]'";
            $checountch = mysqli_query($con, $countperchi);
            $check_adobtt = mysqli_num_rows($checountch);
            //if there are new customer inster it in database-----------------------
            if ($check_adobtt == 0) {
                $query = "INSERT INTO `customers`(`first_name_cus`, `last_name_cus`, `gender`, `phone`, `personilty_cus`,`age`) VALUES (N'$_POST[$pname]',N'$_POST[$pfamily]',N'$_POST[$pse]', '$phone' ,N'$_POST[$ppersonalitynum]',N'$who')";
                $inster = mysqli_query($con, $query);
                $countperchi = "SELECT * FROM `customers` WHERE `personilty_cus`='$_POST[$ppersonalitynum]'";
                $checountch = mysqli_query($con, $countperchi);
            }
            //check if the customer have relashenship with users--------------------
            $er = mysqli_fetch_assoc($checountch);
            $id_customer = $er['id_customers'];
            $ueandcos = "SELECT * FROM `user_customer` WHERE id_user='$id_user' and id_customer='$id_customer'";
            $user_and_costomer = mysqli_query($con, $ueandcos);
            $user_and_cos = mysqli_num_rows($user_and_costomer);
            //if don't have an old relashin inster user and customer-----------------
            if ($user_and_cos == 0) {
                $myinsert = "INSERT INTO `user_customer`(`id_user`, `id_customer`) VALUES ('$id_user','$id_customer')";
                $insteruser_co = mysqli_query($con, $myinsert);
            } else {
                echo 'no';
            }
            //make relashinship between customer and rezerve--------------------------
            $creater = mysqli_query($con, "INSERT INTO `rezerve_and_costomer`(`id_rezerve`, `id_costomer`) VALUES ('$id_payment','$id_customer')");

        }
        //make the same operation for child person.....................................................................

        for ($j = 1; $j <= $_GET['person_child']; $j++) {
            $pname = 'gname' . $j;
            $pfamily = 'gfamily' . $j;

            $ppersonalitynum = ('gpersonalitynum' . $j);
            $countperchi = "SELECT * FROM `customers` WHERE `personilty_cus`='$_POST[$ppersonalitynum]'";
            $checountch = mysqli_query($con, $countperchi);
            $check_child = mysqli_num_rows($checountch);
            $child = 'کودک';
            //------------------------------------------------------
            if ($check_child == 0) {
                $query = "INSERT INTO `customers`(`first_name_cus`, `last_name_cus`, `gender`, `phone`, `personilty_cus`,`age`) VALUES (N'$_POST[$pname]',N'$_POST[$pfamily]',N'$_POST[$pse]', '$phone' ,N'$_POST[$ppersonalitynum]',N'$child')";
                $inster = mysqli_query($con, $query);
                $countperchi = "SELECT * FROM `customers` WHERE `personilty_cus`='$_POST[$ppersonalitynum]'";
                $checountch = mysqli_query($con, $countperchi);
            }
            //-----------------------------------------------------
            $er = mysqli_fetch_assoc($checountch);
            $id_customer = $er['id_customers'];
            $ueandcos = "SELECT * FROM `user_customer` WHERE id_user='$id_user' and id_customer='$id_customer'";
            $user_and_costomer = mysqli_query($con, $ueandcos);
            $user_and_cos = mysqli_num_rows($user_and_costomer);
            //------------------------------------------------------
            if ($user_and_cos == 0) {
                $myinsert = "INSERT INTO `user_customer`(`id_user`, `id_customer`) VALUES ('$id_user','$id_customer')";
                $insteruser_co = mysqli_query($con, $myinsert);
            } else {
                echo 'lest';
            }
            //------------------------------------------------------
            $creater = mysqli_query($con, "INSERT INTO `rezerve_and_costomer`(`id_rezerve`, `id_costomer`) VALUES ('1','$id_customer')");

        }

            echo "<script>window.open('request.php','_self')</script>";

    }
    }
    //..................................................................................................................
     //that style for god of family-------------------------------------------------
        ?>
    <div class="person0"
         style="width: 77%;height: 230px;margin: auto;background-color: white;font-size: 16px;color: #6a5f66"
         dir="rtl">
        <div style="width: 100%;margin: auto;padding: 15px;background-color: white;font-size: 16px;color: #695666"
             dir="rtl">
            بزرگسال 1 <span style="color: #8a8893;font-size: small">(سرپرست)</span>
            <hr>
        </div>


        <div class='col-md-3'>
            <div class="form-group">
                <div class='input-group'>
                    <label style="margin: 5px">نام</label>
                    <input style="width: 170px" name="pname0" type='text' class="form-control"

                           autocomplete="off" value="<?php if (isset($_POST['pname0'])) {
                        echo $_POST['pname0'];
                    } ?>"/>

                </div>
            </div>
        </div>
        <div class='col-md-3'>
            <div class="form-group">
                <div class='input-group'>
                    <label style="margin: 5px">نام خانوادگی</label>
                    <input style="width: 170px" type='text' class="form-control" name="pfamily0"
                           autocomplete="off" value="<?php if (isset($_POST['pfamily0'])) {
                        ($_POST['pfamily0']);
                    } ?>"/>

                </div>
            </div>
        </div>
        <div class='col-md-3'>
            <div class="form-group">
                <div class='input-group'>
                    <label style="margin: 5px">کد ملی</label>
                    <input style="width: 170px" type='text' class="form-control"
                           name="<?= (string)('ppersonalitynum' . 0) ?>"
                           autocomplete="off" value="<?php if (isset($_POST['ppersonalitynum0'])) {
                        ($_POST['ppersonalitynum0']);
                    } ?>"/>

                </div>
            </div>
        </div>
        <div class='col-md-3'>
            <div class="form-group">
                <div class='input-group'>
                    <label style="margin: 5px">تلفن همراه</label>
                    <input style="width: 170px" type='text' class="form-control" autocomplete="off" name="pphone0"
                           value="<?php if (isset($_POST['pphone0'])) {
                               ($_POST['pphone0']);
                           } ?>"/>

                </div>
            </div>
        </div>
        <div class='col-md-3'>
            <div class="form-group">
                <div class='input-group'>
                    <label style="margin: 5px">جنسیت</label>
                    <select style="width: 170px;height: 30px" name="pse0">
                        <option><?php if (isset($_POST['pes0'])) {
                                echo $_POST['pse0'];
                            } ?></option>
                        <option>مرد</option>
                        <option>زن</option>
                    </select>

                </div>
            </div>
        </div>


    </div>


    <?php
    //this design for the other member adobt of family---------------------------------------
    $per = $_GET['person_adobt'];
    $i = 2;
    while ($i <= $per) {
        ?>
        <div style="margin: 50px"></div>

        <div class="person<?= $i ?>"
             style="width: 77%;height: 230px;margin: auto;background-color: white;font-size: 16px;color: #6a5f66"
             dir="rtl">
            <div style="width: 100%;margin: auto;padding: 15px;background-color: white;font-size: 20px;color: #695666"
                 dir="rtl">
                بزرگسال <?= $i ?>
                <hr>
            </div>


            <div class='col-md-3'>
                <div class="form-group">
                    <div class='input-group'>
                        <label style="margin: 5px">نام</label>
                        <input style="width: 220px" name="<?= (string)('pname' . ($i - 1)) ?>" type='text'
                               class="form-control"

                               autocomplete="off" value="<?php if (isset($_POST['pname' . ($i - 1)])) {
                            echo $_POST['pname' . ($i - 1)];
                        } ?>"/>

                    </div>
                </div>
            </div>
            <div class='col-md-3'>
                <div class="form-group">
                    <div class='input-group'>
                        <label style="margin: 5px">نام خانوادگی</label>
                        <input style="width: 220px" type='text' class="form-control"
                               name="<?= (string)('pfamily' . ($i - 1)) ?>"
                               autocomplete="off" value="<?php if (isset($_POST['pfamily' . ($i - 1)])) {
                            echo $_POST['pfamily' . ($i - 1)];
                        } ?>"/>

                    </div>
                </div>
            </div>
            <div class='col-md-3'>
                <div class="form-group">
                    <div class='input-group'>
                        <label style="margin: 5px">کد ملی</label>
                        <input style="width: 220px" type='text' class="form-control"
                               name="<?= (string)('ppersonalitynum' . ($i - 1)) ?>"
                               autocomplete="off" value="<?php if (isset($_POST['ppersonalitynum' . ($i - 1)])) {
                            echo $_POST['ppersonalitynum' . ($i - 1)];
                        } ?>"/>

                    </div>
                </div>
            </div>

            <div class='col-md-3'>
                <div class="form-group">
                    <div class='input-group'>
                        <label style="margin: 5px">جنسیت</label>
                        <select style="width: 200px;height: 30px" name="<?= (string)('pse' . ($i - 1)) ?>">
                            <option><?php if (isset($_POST['pse' . ($i - 1)])) {
                                    echo $_POST['pse' . ($i - 1)];
                                } ?></option>
                            <option>مرد</option>
                            <option>زن</option>
                        </select>

                    </div>
                </div>
            </div>


        </div>
        <?php
        $i++;
    }
    ?>



    <?php
    //this degsin for child member -------------------------------------------------------------------------------------------------

    $chi = $_GET['person_child'];
    $i = 1;
    while ($i <= $chi) {
        ?>
        <div style="margin: 50px"></div>

        <div class="child<?= $i ?>"
             style="width: 77%;height: 230px;margin: auto;background-color: white;font-size: 16px;color: #6a5f66"
             dir="rtl">
            <div style="width: 100%;margin: auto;padding: 20px;background-color: white;font-size: 20px;color: #695666"
                 dir="rtl">
                کودک <?= $i ?>
                <hr>
            </div>


            <div class='col-md-3'>
                <div class="form-group">
                    <div class='input-group'>
                        <label style="margin: 5px">نام</label>
                        <input style="width: 220px" name="gname<?= $i ?>" type='text' class="form-control"

                               autocomplete="off" value="<?php if (isset($_POST['gname' . $i])) {
                            echo $_POST['gname' . $i];
                        } ?>"/>

                    </div>
                </div>
            </div>
            <div class='col-md-3'>
                <div class="form-group">
                    <div class='input-group'>
                        <label style="margin: 5px">نام خانوادگی</label>
                        <input style="width: 220px" type='text' class="form-control" name="gfamily<?= $i ?>"
                               autocomplete="off" value="<?php if (isset($_POST['gfamily' . $i])) {
                            echo $_POST['gfamily' . $i];
                        } ?>"/>

                    </div>
                </div>
            </div>
            <div class='col-md-3'>
                <div class="form-group">
                    <div class='input-group'>
                        <label style="margin: 5px">کد ملی</label>
                        <input style="width: 220px" type='text' class="form-control" name="gpersonalitynum<?= $i ?>"
                               autocomplete="off" value="<?php if (isset($_POST['gpersonalitynum' . $i])) {
                            echo $_POST['gpersonalitynum' . $i];
                        } ?>"/>

                    </div>
                </div>
            </div>

            <div class='col-md-3'>
                <div class="form-group">
                    <div class='input-group'>
                        <label style="margin: 5px">جنسیت</label>
                        <select style="width: 200px;height: 30px" name="gse<?= $i ?>">
                            <option><?php if (isset($_POST['gse' . $i])) {
                                    echo $_POST['gse' . $i];
                                } ?></option>
                            <option>مرد</option>
                            <option>زن</option>
                        </select>

                    </div>
                </div>
            </div>


        </div>
        <?php
        $i++;
    }
//go to the nex step
    ?>


    <div style="margin: 50px"></div>

    <div class="rule"
         style="width: 77%;height: 130px;margin: auto;background-color: white;font-size: 20px;color: #6a5f66"
         dir="rtl">
        <div style="width: 100%;margin: auto;padding: 20px;background-color: white;font-size: 20px;color: #695666"
             dir="rtl">
            <div style="margin: 20px;font-size: 24px;float: right"><input name="rule" class="" style="margin: 20px"
                                                                          type="checkbox" value="Yes"><a
                        style="text-decoration: none">قوانیین سایت </a> و <a> هتل داخلی </a>را می پذیرم
            </div>
            <input type="submit" name="continue" readonly
                   style="width: 270px;font-size: 22px;float: left;margin: 20px" class="btn btn-primary"
                   value="ادامه فرایند خرید">
        </div>
    </div>

</form>

<div style="margin: 60px"></div>
<div>d</div>
</body>


<?php
} else {
    ob_start();
//take url to save to the user after login --------------------------------------------------------------------------------

    header("Location:login.php?location=" . urlencode($_SERVER['REQUEST_URI']));
    ob_end_flush();
}
?>



