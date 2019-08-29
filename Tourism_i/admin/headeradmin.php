
<html lang="en">
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
<?php
require_once 'config.php';
if(isset($_SESSION['admin_email'])){
    $emailadmin = $_SESSION['admin_email'];
}else{
    echo "<script>window.open('login.php','_self')</script>";
}
?>
<body dir="rtl" style="font-size: 16px;background-color: #f9f3fc">


<div class="page-wrapper chiller-theme toggled">

    <div class="navbar">
        <div id="nav" style="background-color: #31353D;float: left;width: 100%" dir="ltr">

            <a href="#"> <img src="../public/image/logo1.png" style="width: 100px;height: 63px;margin-left: 10px;"></a>
        </div>
    </div>

    <nav id="sidebar" class="sidebar-wrapper">
        <div style='width: 100%;background-image: url("../public/image/m33_brc_lrgb_ha_1024Pivato.jpg");background-repeat: no-repeat, repeat; background-size: auto;margin: auto;'>
            <div class="sidebar-content" style="margin:auto; width:160px;display:block">
                <!--            <-->
                <!--            <div class="sidebar-brand">-->
                <!---->
                <!--            </div>-->

                <!--            margin-right: 75px;margin-left: 60px;margin-top: 30px;-->
                <div class="sidebar-header1" style="padding: 20px" >
                    <img src="../public/image/600_97d118b7a6f8f87d18f7b1385ea7665e.png" style="width: 120px;height: 120px;">
                    <div style="margin: 10px"></div>
                    <?php
                    $admin= "SELECT * FROM `users` WHERE email='$emailadmin'";
                    $admins = @mysqli_query($con, "SET NAMES utf8");
                    $admins = @mysqli_query($con, "SET CHARACTER SET utf8");
                    $admins = @mysqli_query($con, $admin);

                    $data = mysqli_fetch_assoc($admins);
                    ?>
                    <span class="user-name" style="color: white;margin-right:0"><?=$data['firstname']?> <?=$data['lastname']?></span>

                </div>
            </div>
        </div>
        <!-- sidebar-header  -->

        <div class="sidebar-menu">
            <ul>
                <li class="sidebar-dropdown active">
                    <a href="#">

                        <span style="margin: 5px">هتل ها</span>
                        <i class="fa fa-hotel" style="float:right"></i>

                    </a>
                    <div class="sidebar-submenu" style="display:block;">
                        <ul>
                            <li>
                                <a href="hotellist.php"> لیست هتل ها  </a>
                            </li>
                            <li>
                                <a href="hotellist.php?add">اضافه ی هتل</a>
                            </li>

                            <li>
                                <a href="roomlist.php"> لیست اتاق ها </a>
                            </li>
                            <li>
                                <a href="roomlist.php?add">اضافه کردن اتاق</a>
                            </li>
                            <li>
                                <a href="facility_hotel.php">اضافه کردن امکانات جدید</a>
                            </li>
                            <li>
                                <a href="customer.php">لیست مسافرین</a>
                            </li>
                            <li>
                                <a href="rezerve_list.php">لیست رزور ها </a>
                            </li>


                        </ul>
                    </div>
                </li>

                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="fa fa-plane" style="float:right"></i>
                        <span style="margin: 5px">هواپیما ها</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="#">لیست شرکت ها</a>
                            </li>
                            <li>
                                <a href="#">لیست هواپیما</a>
                            </li>
                            <li>
                                <a href="#">اضافه کردن هواپیما</a>
                            </li>
                            <li>
                                <a href="#">اضافه کردن هواپیمای آماده مسافرت</a>
                            </li>
                            <li>
                                <a href="#">مشاهد بلیط ها</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="fa fa-subway" style="float:right"></i>
                        <span style="margin: 5px">قطار ها</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="company_train_list.php">لیست شرکت ها</a>
                            </li>
                            <li>
                                <a href="train.php">لیست قطار ها</a>
                            </li>
                            <li>
                                <a href="cub_list.php">کوبه ها</a>
                            </li>
                            <li>
                                <a href="trains_depart.php">لیست قطار ها آماده ی مسافرت</a>
                            </li>
                            <li>
                                <a href="#">اضافه کردن قطار</a>
                            </li>
                            <li>
                                <a href="#">اضافه کردن قطار آماده مسافرت</a>
                            </li>

                            <li>
                                <a href="#">مشاهد بلیط ها</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="users_list.php">
                        <i class="fa fa-users" style="float:right"></i>
                        <span style="margin: 5px">لیست کاربران</span>
                    </a>
                </li>
                <li>
                    <a href="comments_users.php">
                        <i class="fa fa-book" style="float:right"></i>
                        <span style="margin: 5px">نظرات کاربران</span>
                        <?php

                        $countcoms = @mysqli_query($con, "SELECT * FROM `commnets` WHERE `state`='1'");
                        $count_result = $countcoms->num_rows;
                        if($count_result > 0) {
                            ?>
                            <span class="badge badge-pill badge-primary"
                                  style="background-color: #3cac28"><?= $count_result ?></span>
                            <?php
                        }else {
                            ?>
                            <span class="badge badge-pill badge-primary"><?= $count_result ?></span>
                            <?php
                        }
                        ?>
                    </a>
                </li>

                <li>
                    <a href="adduser.php">
                        <i class="fa fa-list" style="float:right"></i>
                        <span style="margin: 5px">اضافه عضو جدید </span>
                    </a>
                </li>
                <li>
                    <a href="home.php">
                        <i class="fa fa-chart-line" style="float:right"></i>
                        <span style="margin: 5px">صفحه نخست</span>
                    </a>

                    <a href="logout.php">
                        <i class="fa fa-door" style="float:right"></i>
                        <span style="margin: 5px">خروج</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- sidebar-menu  -->
</div>
<!-- sidebar-content  -->


<!-- sidebar-wrapper  -->
<main class="page-content">