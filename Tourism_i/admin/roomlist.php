<?php
include 'headeradmin.php';
if(isset($_SESSION['admin_email'])) {
?>

<?php
//..................................................................................
//............................................................

//edit and delete and adding part
//change and add room, :)


if (isset($_GET['add']) || isset($_GET['edit'])) {
?>
<div style="width: 800px;margin-right: 19%;font-size: 15px;" dir="rtl">
    <?php

    function display_errors($errors)
    {
        $display = '<ul class="bg-danger">';
        foreach ($errors as $error) {
            $display .= '<li class=>' . $error . '</li>';
        }
        $display .= '</ul>';
        return $display;
    }
//post the data----------------------------------------------------

    $adobt_person = ((isset($_POST['adobt_person']) && $_POST['adobt_person'] != '') ? $_POST['adobt_person'] : '');
    $child_num = ((isset($_POST['child_num']) && $_POST['child_num'] != '') ? $_POST['child_num'] : '');
    $black = ((isset($_POST['black']) && ($_POST['black'] != '')) ? $_POST['black'] : '');
    $price = ((isset($_POST['price']) && ($_POST['price'] != '')) ? $_POST['price'] : '');
    $name = ((isset($_POST['name'])) && !empty($_POST['name']) ? $_POST['name'] : '');
    $description = ((isset($_POST['description']) && $_POST['description'] != '') ? $_POST['description'] : '');
    $image = '';


    //if edit--------------------------------------------------------

    if (isset($_GET['edit'])) {
        $edit_id = $_GET['edit'];

        if (isset($_GET['delete_image'])) {
            $de_image = mysqli_query($con, "UPDATE `rooms` SET `image`='' WHERE `id_rooms`=$edit_id");

            if ($de_image) {
                echo "<script>window.open('roomlist.php?edit=$edit_id','_self')</script>";
            }
            $image = '';
        }

        $Resul ="SELECT rooms.*,hotels.name_hotel FROM `rooms`,hotels WHERE id_room = '$edit_id'";

        $query=@mysqli_query($con,"SET NAMES utf8");
        $query=@mysqli_query($con,"SET CHARACTER SET utf8");
        $Result=@mysqli_query($con,$Resul);
        $hotelEdit = mysqli_fetch_assoc($Result);

        //get or post data-----------------------------------------------
        $name = ((isset($_POST['name']) && $_POST['name'] != '') ? $_POST['name'] : $hotelEdit['name_hotel']);
        $child_num = ((isset($_POST['child_num']) && $_POST['child_num'] != '') ? $_POST['child_num'] : $hotelEdit['num_child_person']);
        $adobt_person = ((isset($_POST['adobt_person']) && $_POST['adobt_person'] != '') ? $_POST['adobt_person'] : $hotelEdit['num_adobt_person']);
        $black = ((isset($_POST['black']) && ($_POST['black'] != '')) ? $_POST['black'] : $hotelEdit['black']);
        $price = ((isset($_POST['price']) && ($_POST['price'] != '')) ? $_POST['price'] : $hotelEdit['price']);
        $description =((isset($_POST['description']) && $_POST['description'] != '') ? $_POST['description'] : $hotelEdit['discription']);
        $image = ((isset($_POST['image']) && $_POST['image'] != '') ? $_POST['image'] : $hotelEdit['image']);


    }
    //adding----------------------------------------------------------

    if (isset($_POST['add_room'])) {

        $errors = array();
        $required = array('name', 'child_num', 'price', 'black', 'adobt_person','description');
        foreach ($required as $field) {
            if ($_POST[$field] == '') {
                $errors[] = 'لطفا تمام اطلاعات اتاق پر کنید .(به جز لوکا و امکانات الزامی نمیباشند)';
                break;
            }
        }
        if($price<1000000){
            array_push($errors,'قیمت کمتر از 1000000 امکان پذیر نسیت ');
        }
//--------------------------------------------------------------------
        if (isset($_GET['edit']) and $image != '') {

            //change image and upload---------------------------------
        } else {
            if (!empty($_FILES)) {

                $Allowextension = array("gif", "jpeg", "jpg", "png", "PNG", "GIF", "JPEG", "JPG");
                $FileExtension = explode('.', $_FILES["image"]["name"]);

                $image = $_FILES["image"]["name"];

                $extension = end($FileExtension);
                $extensionl = end($FileExtension);
                if (in_array($extension, $Allowextension) && ($_FILES["image"]["size"] <= 20971520)) {
                    if ($_FILES["image"]["error"] == 0) {
                        $address_image = 'C:\wamp64\www\Tourism_i\public\image\image_room/' . $_FILES["image"]["name"];
                        move_uploaded_file($_FILES["image"]["tmp_name"], $address_image);
                    } else {
                        echo 'Error in uploading File image!';
                    }
                }
                if (empty($image)) {
                    array_push($errors, 'عکس اتاق الزامی میباشد.');
                }

            }
        }
    }
//......................................................................................................................

    if (!empty($errors)) {
        echo display_errors($errors);

    } else {
        //change facility-----------------------------------------------------------------------------------------------

        if (isset($_GET['edit'])) {
            if (isset($_POST['add_room'])) {
                if(isset($_POST["facility"])) {
                    $er = mysqli_query($con, "DELETE t2 FROM faci_and_room as t2 inner join rooms as t1 on t2.id_room = t1.id_room AND t1.id_room=$edit_id");
                    if ($er) {

                        foreach ($_POST['facility'] as $subject) {
                            mysqli_query($con, "INSERT INTO `faci_and_room`( `id_room`, `id_faci`) VALUES ('$edit_id','$subject')");
                            $_POST['facility'] = '';
                            unset($_POST['facility']);
                        }
                    }
                }


                $edit = mysqli_query($con, "UPDATE `rooms` SET `black`=N'$black',`num_adobt_person`=$adobt_person,`image`=N'$image',`num_child_person`='$child_num',`discription`=N'$description',`price`='$price' WHERE `id_room`=$edit_id");
                if ($edit) {
                    echo "<script>window.open('roomlist.php','_self')</script>";
                    echo '<p style="margin-right: 26%;font-size: 17px" class="bg-success">Edit it successfully</p>';
                }
            }
            //----------------------------------------------------------
        } else {
            if (isset($_POST['add_room'])) {
                $Add = mysqli_query($con, "INSERT INTO `rooms`(`black`, `price`, `id_hotel`, `num_adobt_person`, `num_child_person`, `discription`, `image`) VALUES  (N'$black',N'$price',N'$name',N'$adobt_person','$child_num',N'$description','$image')");

                if ($Add) {

                    $lastid = mysqli_insert_id($con);
                    foreach ($_POST['facility'] as $subject) {
//                            print "You selected $subject<br/>";
                        mysqli_query($con, "INSERT INTO `faci_and_room`( `id_room`, `id_faci`) VALUES ('$lastid','$subject')");
                        $_POST['facility'] = '';
                        unset($_POST['facility']);
//                        }
                    }
                    echo "<script>alert('اتاق با موفقیت اضافه شد .')</script>";
                    echo "<script>window.open('roomlist.php?add=0','_self')</script>";
                }

            }
        }
    }
    //..................................................................................................................
    ?>


    <div style="margin: 50px"></div>
    <form enctype="multipart/form-data" method="post"
          action="roomlist.php?<?= ((isset($_GET['edit'])) ? 'edit=' . $edit_id : 'add=0') ?>">
        <div style="width: 990px;height: 440px;background-color: #ffffff;margin-right: 24%;font-size: 15px;color: #31353D"
             dir="rtl">
            <h3 style="background-color: #31353D;color: white;padding: 4px;text-align: right">+ اضافه کردن اتاق </h3>
            <div style="float: left;width: 300px;padding: 15px">
                <?php
                //......................................................................................................
                ?>
                <?php if ($image != '' and isset($_GET['edit'])) : ?>
                    <img src="../public/image/image_room/<?= $image ?>"
                         style="height: 240px;max-width: 100%">
                    <a href="roomlist.php?delete_image=1&edit=<?= $edit_id ?>" class="text-danger">Delete_Photo</a>
                <?php else : ?>
                    <label style="margin-top: 20px">عکس اتاق</label>
                    <input type="file" name="image" style="margin-bottom: 10px;">
                <?php endif; ?>
                <input type="submit" name="add_room" class="btn btn-primary"
                       style="margin-top: 20px;float: left;padding: 5px;width: 170px;height: 35px"
                       value="<?= ((isset($_GET['edit'])) ? 'ویرایش ' : 'اضافه ') ?>اتاق">
            </div>
            <?php
            //..........................................................................................................
            ?>
            <div style="float: right;padding: 15px">
                <div style="margin-top: 20px"></div>

                <span style="margin: 5px">
                    <label> نام هتل :
                        <select  name="name"  style="width: 140px;height: 35px" class="selectpicker"  >

                        <?php
                        $num_of_stars = "SELECT DISTINCT `name_hotel`,`id_hotel` FROM `hotels` WHERE deaction=0 GROUP BY `name_hotel`";

                        $num_of_star = @mysqli_query($con, "SET NAMES utf8");
                        $num_of_star = @mysqli_query($con, "SET CHARACTER SET utf8");
                        $num_of_star = @mysqli_query($con, $num_of_stars);

                        while ($row_of_stars = @mysqli_fetch_array($num_of_star)) {
                            ?>

                            <option class="name"
                                    value="<?=$row_of_stars['id_hotel']?>"><?=$row_of_stars['name_hotel']?></option>
                            <?php
                        }
                        ?>
                        </select>

                </span>
                <?php
                //......................................................................................................
                ?>
                <span style="margin: 19px">
                    <label>شماره بلوک : </label>
                    <input name="black" type="text" style="width: 140px;height: 35px" value="<?= $black ?>">
                </span><br><br>
                <?php
                //......................................................................................................
                ?>
                <span style="margin: 5px">
                    <label>تعداد بزرگسال : </label>
                    <input name="adobt_person" type="number" max="14" min="1"autocomplete="off" style="width: 150px;height: 35px" value="<?= $adobt_person ?>">

                </span>
                <?php
                //......................................................................................................
                ?>
                <span style="margin: 19px">
                    <label>تعداد کودک </label>
                    <input type="number" min="0" max="6" name="child_num" autocomplete="off" style="width: 137px;height: 35px;font-size: 13px"
                           value="<?= $child_num ?>">
                </span><br><br>
                <?php
                //......................................................................................................
                ?>
                <script>
                    $("[type='number']").keypress(function (evt) {
                        evt.preventDefault();
                    });
                </script>
                <span style="margin: 5px">
                    <label>قیمت اتاق با ریال:  </label>
                      <input name="price" type="text" style="width: 140px;height: 35px" value="<?= $price ?>">

                </span>

                <span style="margin: 5px;">
                    <label>امکانات </label>
                    <?php
                    //......................................................................................................
                    ?>
                     <select name="facility[]" class="selectpicker facility" multiple data-live-search="true">
                   <option></option>
                   <option>
                       <?php
                       //change facility--------------------------------------

                       if (isset($_GET['edit'])){
                       $facili = "SELECT DISTINCT faci_and_room.id_room,room_faci.* FROM faci_and_room,room_faci WHERE faci_and_room.id_faci=room_faci.id_room_faci AND faci_and_room.id_room='$edit_id'";
                       $facili1 = @mysqli_query($con, $facili);

                       while ($faEdit = mysqli_fetch_array($facili1)){
                       ?>

                     <option class="facility" selected="selected"
                             value="<?= $faEdit['id_room_faci'] ?>"><?= $faEdit['title'] ?></option>
                         <?php
                         }
                         $what = "SELECT DISTINCT faci_and_room.id_faci,room_faci.title,room_faci.id_room_faci FROM faci_and_room,room_faci WHERE faci_and_room.id_faci-room_faci.id_room_faci AND faci_and_room.id_faci NOT IN( SELECT id_faci FROM `faci_and_room`WHERE id_room ='$edit_id')";
                         $result = @mysqli_query($con, $what);
                         while ($row = mysqli_fetch_array($result)) {
                             ?>
                             <option class="facility"
                                     value="<?= $row['id_room_faci'] ?>"><?= $row['title'] ?></option>
                             <?php

                         }
                         }else {

                             $facilitys = "SELECT * FROM `room_faci` WHERE 1 GROUP BY `title`";
                             $facility = @mysqli_query($con, "SET NAMES utf8");
                             $facility = @mysqli_query($con, "SET CHARACTER SET utf8");
                             $facility = @mysqli_query($con, $facilitys);


                             while ($faci = @mysqli_fetch_array($facility)) {
                                 ?>
                                 <option class="facility"
                                         value="<?= $faci['id_room_faci'] ?>"><?= $faci['title'] ?></option>
                                 <?php
                             }
                         }?>

                </select>
                    <?php
                    //...................................................................................................
                    ?>

                </span><br><br>
                <span>
                    <label>توضیح : </label><br>
                <textarea name="description" style="width: 440px;height: 60px"><?= $description ?></textarea>
                </span>
            </div>


        </div>
    </form>
    <?php
    //..................................................................................................................
    ?>
    <div style="margin: 50px;"></div>
    <div style="width: 870px;height:auto;margin-right: 24%;font-size: 15px;color: #31353D"
         dir="rtl">
        <form method="post" enctype="multipart/form-data">
            <?php
            if (isset($_GET['add'])) {

                ?>
                <?php
            }


            ?>


            <div style="margin: 70px"></div>
    </div>
    <?php
    //......................................................................................................
    ?>

    <?php
    } elseif (isset($_GET['delete'])) {
        $de = $_GET['delete'];
//        $del = mysqli_query($con, "DELETE t2 FROM rooms as t2 inner join hotels as t1 on t2.id_hotel = t1.id_hotel AND t1.id_hotel='$de'");
        $dele = mysqli_query($con, "DELETE t2 FROM faci_and_room as t2 inner join rooms as t1 on t2.id_room = t1.id_room AND t1.id_room='$de'");
//        $delet = mysqli_query($con, "DELETE t2 FROM rezerve as t2 inner join rooms as t1 on t2.id_room = t1.id_room AND t1.id_room='$de'");
        $delete = mysqli_query($con, "UPDATE `rooms` SET `deaction`=1 WHERE id_room='$de'");
        if ($delete) {
            echo "<script>window.open('roomlist.php','_self')</script>";

        }


    } else { ?>
        <div style="margin: 40px"></div>
        <div style="width: 1140px;margin-right: 23%;margin-left: 30%;color: #8a8893;font-size: 14px">
            <div style="background-color: #3a3f48">
                <div style="width: 100%;margin: auto">
                    <label style="width: 100px;height: 35px;margin: 15px;color: white;padding-right: 16px"><i
                                class="fa fa-search" style="margin: 12px"></i>سرچ
                        با </label>
                    <input id="search" class="search" type="text" style="width: 130px;height: 35px;margin: 15px"
                           placeholder="اسم هتل">

                    <select name="star" class="star" style="width: 80px;height: 35px;margin: 15px">
                        <option value="" disabled selected>ستاره ها</option>
                        <?php
                        $num_of_stars = "SELECT DISTINCT star_hotels From hotels  ORDER BY star_hotels ASC ";
                        $num_of_star = @mysqli_query($con, "SET NAMES utf8");
                        $num_of_star = @mysqli_query($con, "SET CHARACTER SET utf8");
                        $num_of_star = @mysqli_query($con, $num_of_stars);

                        while ($star = @mysqli_fetch_array($num_of_star)) {
                            ?>

                            <option class="star"
                                    value="<?= $star['star_hotels'] ?>"><?= $star['star_hotels'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <select name="num_adobt_person" class="num_adobt_person"
                            style="width: 80px;height: 35px;margin: 15px">
                        <option value="" disabled selected>تعداد بزرگسال</option>
                        <?php
                        $num_of_stars = "SELECT DISTINCT num_adobt_person From rooms  ORDER BY num_adobt_person ASC ";
                        $num_of_star = @mysqli_query($con, "SET NAMES utf8");
                        $num_of_star = @mysqli_query($con, "SET CHARACTER SET utf8");
                        $num_of_star = @mysqli_query($con, $num_of_stars);

                        while ($row_of_stars = @mysqli_fetch_array($num_of_star)) {
                            ?>

                            <option class="num_adobt_person"
                                    value="<?= $row_of_stars['num_adobt_person'] ?>"><?= $row_of_stars['num_adobt_person'] ?></option>
                            <?php
                        }
                        ?>
                    </select>

                    <select name="num_child_person" class="num_child_person"
                            style="width: 80px;height: 35px;margin: 15px">
                        <option value="" disabled selected>تعداد کودک</option>
                        <?php
                        $num_of_stars = "SELECT DISTINCT num_child_person From rooms  ORDER BY num_child_person ASC ";
                        $num_of_star = @mysqli_query($con, "SET NAMES utf8");
                        $num_of_star = @mysqli_query($con, "SET CHARACTER SET utf8");
                        $num_of_star = @mysqli_query($con, $num_of_stars);

                        while ($row_of_stars = @mysqli_fetch_array($num_of_star)) {
                            ?>

                            <option class="num_child_person"
                                    value="<?= $row_of_stars['num_child_person'] ?>"><?= $row_of_stars['num_child_person'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <select name="facility" class="facility" style="width: 130px;height: 35px;margin: 15px">
                        <option value="" disabled selected>امکانات</option>

                        <?php
                        $num_of_stars = "SELECT * FROM `room_faci`";
                        $num_of_star = @mysqli_query($con, "SET NAMES utf8");
                        $num_of_star = @mysqli_query($con, "SET CHARACTER SET utf8");
                        $num_of_star = @mysqli_query($con, $num_of_stars);

                        while ($row_of_stars = @mysqli_fetch_array($num_of_star)) {
                            ?>

                            <option class="facility"
                                    value="<?= $row_of_stars['id_room_faci'] ?>"><?= $row_of_stars['title'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <select class="country" style="width: 130px;height: 35px;margin: 15px">
                        <option value="" disabled selected>کشور</option>
                        <?php
                        $num_of_stars = "SELECT DISTINCT `country` FROM `cities` WHERE 1";
                        $num_of_star = @mysqli_query($con, "SET NAMES utf8");
                        $num_of_star = @mysqli_query($con, "SET CHARACTER SET utf8");
                        $num_of_star = @mysqli_query($con, $num_of_stars);

                        while ($row_of_star = @mysqli_fetch_array($num_of_star)) {
                            ?>

                            <option class="country"
                                    value="<?= $row_of_star['country'] ?>"><?= $row_of_star['country'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <select class="city"
                            style="width: 130px;height: 35px;margin: 15px">
                        <option value="" disabled selected>شهرستان</option>

                        <?php
                        $num_of_stars = "SELECT DISTINCT `city` FROM `cities` WHERE 1";

                        $num_of_star = @mysqli_query($con, "SET NAMES utf8");
                        $num_of_star = @mysqli_query($con, "SET CHARACTER SET utf8");
                        $num_of_star = @mysqli_query($con, $num_of_stars);

                        while ($row_of_stars = @mysqli_fetch_array($num_of_star)) {
                            ?>

                            <option class="city"
                                    value="<?= $row_of_stars['city'] ?>"><?= $row_of_stars['city'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>


            </div>
            <div style="margin: 50px"></div>
            <div class="filter_data" dir="ltr"></div>


            <script>
                filter_data();

                function filter_data() {

                    $('.filter_data').html('<div></div>');
                    var action = 'detailroomlist';

                    var num_adobt_person = get_filter('num_adobt_person');
                    var num_child_person = get_filter('num_child_person');
                    var country = get_filter('country');
                    var city = get_filter('city');
                    var facility = get_filter('facility');
                    var star = get_filter('star');

                    $.ajax({
                        url: "details/detailroomlist.php",
                        method: "POST",

                        data: {
                            action: action,
                            star: star,
                            num_adobt_person: num_adobt_person,
                            num_child_person: num_child_person,
                            country: country,
                            city: city,
                            facility: facility

                        },
                        success: function (data) {
                            $('.filter_data').html(data);
                        }
                    });
                }

                //this function will do search hotel without press enter or button

                $('#search').keyup(function () {
                    var search = $(this).val();

                    $('.filter_data').html('<div></div>');
                    var action = 'detailroomlist';
                    var num_adobt_person = get_filter('num_adobt_person');
                    var num_child_person = get_filter('num_child_person');
                    var country = get_filter('country');
                    var city = get_filter('city');
                    var facility = get_filter('facility');
                    var star = get_filter('star');


                    $.ajax({
                        url: "details/detailroomlist.php",
                        method: "POST",
                        data: {
                            action: action,
                            search: search,
                            num_child_person: num_child_person,
                            star: star,
                            num_adobt_person: num_adobt_person,
                            country: country,
                            city: city,
                            facility: facility


                        },
                        success: function (data) {
                            $('.filter_data').html(data);
                        }
                    });

                });

                function get_filter(class_name) {
                    var filter = [];
                    $('.' + class_name + ':checked').each(function () {
                        filter.push($(this).val());
                    });
                    return filter;
                }

                $('.star').click(function () {
                    filter_data();
                });
                $('.num_adobt_person').click(function () {
                    filter_data();
                });
                $('.num_child_person').click(function () {
                    filter_data();
                });
                $('.city').click(function () {
                    filter_data();
                });
                $('.country').click(function () {
                    filter_data();
                });
                $('.facility').click(function () {
                    filter_data();
                });

            </script>


        </div>


        <?php
    }
    include 'footeradmin.php';
    }else {
        echo "<script>window.open('login.php','_self')</script>";

    }

    ?>
