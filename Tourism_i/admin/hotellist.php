<?php
include 'headeradmin.php';

if(isset($_SESSION['admin_email'])) {
?>


<?php
//......................................................................................................................

//edit and delete and adding part
//change and add hotel, :)


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

    //post or get the data..................................................................................................
    $name = ((isset($_POST['name']) && $_POST['name'] != '') ? $_POST['name'] : '');
    $email = ((isset($_POST['email']) && $_POST['email'] != '') ? $_POST['email'] : '');
    $map = ((isset($_POST['map']) && $_POST['map'] != '') ? $_POST['map'] : '');
    $address = ((isset($_POST['address']) && $_POST['address'] != '') ? $_POST['address'] : '');
    $phone = ((isset($_POST['phone']) && ($_POST['phone'] != '')) ? $_POST['phone'] : '');
    $facility = ((isset($_POST['facility'])) && !empty($_POST['facility']) ? $_POST['facility'] : '');
    $kind_of_hotel = ((isset($_POST['kind_of_hotel'])) && !empty($_POST['kind_of_hotel']) ? $_POST['kind_of_hotel'] : '');
    $star = ((isset($_POST['star'])) && !empty($_POST['star']) ? $_POST['star'] : '');
    $city = ((isset($_POST['city'])) && !empty($_POST['city']) ? $_POST['city'] : '');
//    $facility = ((isset($_POST['facility'])) && !empty($_POST['facility']) ? $_POST['city'] : '');
    $description = ((isset($_POST['description']) && $_POST['description'] != '') ? $_POST['description'] : '');
    $image = '';
    $logo = '';

    //get edit..............................................................................................................
    if (isset($_GET['edit'])) {
        $edit_id = $_GET['edit'];

        //delete image of hotel------------------------------------
        if (isset($_GET['delete_image'])) {
            $de_image = mysqli_query($con, "UPDATE `hotels` SET `photo_hotel`='' WHERE `id_hotel`=$edit_id");

            if ($de_image) {
                echo "<script>window.open('hotellist.php?edit=$edit_id','_self')</script>";
            }
            $image = '';


        }
        //delete image of gallery-----------------------------------
        if (isset($_GET['delete_gallery'])) {
            $img = $con->query("SELECT * FROM `images_hotels` WHERE id_hotel = '$edit_id'");

            $gallery_id = $_GET['delete_gallery'];
//            $image_url = '../public/image/image_hotel_fornt' . $img['address_image'];
//            unset($image_url);

            $de_image = $con->query("DELETE FROM `images_hotels` WHERE id_image=$gallery_id");
            echo "<script>window.open('hotellist.php?edit=$edit_id','_self')</script>";

        }
        //return the data of x id for edit----------------------------
        $Resul = "SELECT * FROM `hotels` WHERE id_hotel = '$edit_id'";

        $query = @mysqli_query($con, "SET NAMES utf8");
        $query = @mysqli_query($con, "SET CHARACTER SET utf8");
        $Result = @mysqli_query($con, $Resul);
        $hotelEdit = mysqli_fetch_assoc($Result);
        $name = ((isset($_POST['name']) && $_POST['name'] != '') ? $_POST['name'] : $hotelEdit['name_hotel']);
        $email = ((isset($_POST['email']) && $_POST['email'] != '') ? $_POST['email'] : $hotelEdit['email_hotel']);
        $map = ((isset($_POST['map']) && $_POST['map'] != '') ? $_POST['map'] : $hotelEdit['map']);
        $address = ((isset($_POST['address']) && $_POST['address'] != '') ? $_POST['address'] : $hotelEdit['address']);
        $phone = ((isset($_POST['phone']) && ($_POST['phone'] != '')) ? $_POST['phone'] : $hotelEdit['phone_hotel']);
        $kind_of_hotel = ((isset($_POST['kind_of_hotel'])) && !empty($_POST['kind_of_hotel']) ? $_POST['kind_of_hotel'] : $hotelEdit['kind_of_hotel']);
        $star = ((isset($_POST['star'])) && !empty($_POST['star']) ? $_POST['star'] : $hotelEdit['star_hotels']);
        $city = ((isset($_POST['city'])) && !empty($_POST['city']) ? $_POST['city'] : $hotelEdit['id_city']);
        $description = ((isset($_POST['description']) && $_POST['description'] != '') ? $_POST['description'] : $hotelEdit['discription_hotels']);
        $image = ((isset($_POST['image']) && $_POST['image'] != '') ? $_POST['image'] : $hotelEdit['photo_hotel']);
        //..................................................................................................................
    }
    //add data----------------------------------------------------------
    if (isset($_POST['add_hotel'])) {

        $errors = array();
        $required = array('name', 'email', 'map', 'star', 'city', 'kind_of_hotel', 'phone', 'address', 'description');
        foreach ($required as $field) {
            if ($_POST[$field] == '') {
                $errors[] = 'لطفا تمام اطلاعات هتل پر کنید .(به جز لوکا و امکانات الزامی نمیباشند)';
                break;
            }
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
        //--------------------------------------------------------------
        if (isset($_GET['edit']) and $image != '') {


        } // if not edit get a photo of any where and loaded in folder....................................................
        else {
            if (!empty($_FILES)) {

                $Allowextension = array("gif", "jpeg", "jpg", "png", "PNG", "GIF", "JPEG", "JPG");
                $FileExtension = explode('.', $_FILES["image"]["name"]);

                $FileExtensionl = explode('.', $_FILES["logo"]["name"]);
                $image = $_FILES["image"]["name"];

                $logo = $_FILES["logo"]["name"];
                $extension = end($FileExtension);
                $extensionl = end($FileExtension);
                if (in_array($extension, $Allowextension) && ($_FILES["image"]["size"] <= 20971520)) {
                    if ($_FILES["image"]["error"] == 0) {
                        $address_image = 'C:\wamp64\www\Tourism_i\public\image\image_hotel_front/' . $_FILES["image"]["name"];
                        move_uploaded_file($_FILES["image"]["tmp_name"], $address_image);
                    } else {
                        echo 'Error in uploading File image!';
                    }
                }
                if (in_array($extensionl, $Allowextension) && ($_FILES["logo"]["size"] <= 20971520)) {
                    if ($_FILES["logo"]["error"] == 0) {
                        $address_image = 'C:\wamp64\www\Tourism_i\public\image\image_hotel_front/' . $_FILES["image"]["name"];
                        move_uploaded_file($_FILES["logo"]["tmp_name"], $address_image);
                    }
                }
                if (empty($image)) {
                    array_push($errors, 'عکس هتل الزامی میباشد.');
                }

            }
        }
    }

    //..................................................................................................................

    //if not errors-----------------------------------------------------
    if (!empty($errors)) {
        echo display_errors($errors);

    } else {
        //edit----------------------------------------------------------
        if (isset($_GET['edit'])) {

            if (isset($_POST['add_hotel'])) {
                //change a facility to hotel----------------------------
                if (isset($_POST["facility"])) {
                    $er = mysqli_query($con, "DELETE t2 FROM faci_and_hotel as t2 inner join hotels as t1 on t2.id_hotel = t1.id_hotel AND t1.id_hotel=$edit_id");
                    if ($er) {
                        foreach ($_POST['facility'] as $subject) {
                            mysqli_query($con, "INSERT INTO `faci_and_hotel`( `id_hotel`, `id_faci`) VALUES ('$edit_id','$subject')");
                            $_POST['facility'] = '';
                            unset($_POST['facility']);
                        }
                    }
                }

                $edit = mysqli_query($con, "UPDATE `hotels` SET `name_hotel`=N'$name',`photo_hotel`=N'$image',`phone_hotel`=N'$phone',`email_hotel`=N'$email',`address`=N'$address',`logo`='$logo',`kind_of_hotel`=N'$kind_of_hotel',`star_hotels`='$star',`id_city`='$city',`discription_hotels`=N'$description',`map`='$map' WHERE id_hotel='$edit_id'");
//                $edit = mysqli_query($con, "UPDATE `hotels` SET `name_hotel`=N'$name',`photo_hotel`=N'$image',`phone_hotel`=N'$phone',`email_hotel`=N'$email',`address`=N'$address',`logo`='$logo',`kind_of_hotel`=N'$kind_of_hotel',`star_hotels`='$star',`id_city`='$city',`discription_hotels`=N'$description',`map`='$map' WHERE id_hotel='$edit_id'");
                if ($edit) {
                    echo "<script>window.open('hotellist.php','_self')</script>";
//                    echo '<p style="margin-right: 26%;font-size: 17px" class="bg-success">Edit it successfully</p>';
                }
            }
            //..........................................................................................................
        } else {


            //add data------------------------------------------------------
            if (isset($_POST['add_hotel'])) {


                $Add = mysqli_query($con, "INSERT INTO `hotels`(`name_hotel`, `photo_hotel`, `phone_hotel`, `email_hotel`, `address`, `logo`, `kind_of_hotel`, `star_hotels`, `id_city`, `discription_hotels`,`map`) VALUES (N'$name',N'$image',N'$phone',N'$email',N'$address','$logo',N'$kind_of_hotel','$star','$city',N'$description','$map')");


                if ($Add) {
                    $lastid = mysqli_insert_id($con);
                    if (isset($_POST["facility"])) {

                        foreach ($_POST['facility'] as $subject) {
                            mysqli_query($con, "INSERT INTO `faci_and_hotel`( `id_hotel`, `id_faci`) VALUES ('$lastid','$subject')");
                            $_POST['facility'] = '';
                            unset($_POST['facility']);
                        }
                    }

                    echo "<script>alert('هتل با موفقیت اضافه شد.حال میتوانید در صورت نیاز تصاویر هتل را اضافه کنید  .')</script>";
                    echo "<script>window.open('hotellist.php?add=$lastid','_self')</script>";
                }
            }
        }
    }
    //..................................................................................................................
    ?>


    <div style="margin: 50px"></div>
    <form enctype="multipart/form-data" method="post"
          action="hotellist.php?<?= ((isset($_GET['edit'])) ? 'edit=' . $edit_id : 'add=0') ?>">
        <div style="width: 970px;height: 470px;background-color: #ffffff;margin-right: 14%;font-size: 15px;color: #31353D"
             dir="rtl">
            <h3 style="background-color: #31353D;color: white;padding: 4px;text-align: right">+ <?php
                if (isset($_GET['edit'])) echo ' ویراش '; else {
                    echo 'اضافه';
                } ?>کردن هتل </h3>

            <div style="float: right;width: 300px;padding: 15px">
                <label style="margin-top: 20px">اضافه لوکو</label>
                <input type="file" name="logo" style="margin-bottom: 10px;">
                <?php if ($image != '' and isset($_GET['edit'])) : ?>
                    <img src="../public/image/image_hotel_front/<?= $image ?>"
                         style="height: 240px;max-width: 100%">
                    <a href="hotellist.php?delete_image=1&edit=<?= $edit_id ?>" class="text-danger">Delete_Photo</a>
                <?php else : ?>
                    <label style="margin-top: 20px">عکس هتل</label>
                    <input type="file" name="image" style="margin-bottom: 10px;">
                <?php endif; ?>

                <!--                <img name="logo" src="../public/image/m33_brc_lrgb_ha_1024Pivato.jpg"-->
                <!--                     style="width: 65px;height: 65px;margin-bottom: 10px;float: left; border-radius:50% 50% 50% 50%;  ">-->

                <input type="submit" name="add_hotel" class="btn btn-primary"
                       style="margin-top: 20px;float: left;padding: 5px;width: 170px;height: 35px"
                       value="<?= ((isset($_GET['edit'])) ? 'ویرایش ' : 'اضافه ') ?>هتل">
            </div>
            <div style="float: left;padding: 15px">
                <div style="margin-top: 20px" dir="rtl"></div>

                <span style="margin: 5px">
                    <label> نام هتل :</label>
                    <input name="name" type="text" style="width: 173px;height: 35px" value="<?= $name ?>">
                </span>
                <span style="margin: 19px">
                    <label>شماره تماس : </label>
                    <input name="phone" type="text" style="width: 173px;height: 35px" value="<?= $phone ?>">
                </span><br><br>
                <span style="margin: 5px">
                    <label>آدرس : </label>
                    <input name="address" type="text" style="width: 490px;height: 35px" value="<?= $address ?>">
                </span>
                <span style="margin: 5px;"><br><Br>
                    <label>امکانات </label>

               <select name="facility[]" class="selectpicker facility" multiple data-live-search="true">
                   <option value="<?=$facility?>"><?=$facility?></option>
                   <option>
                       <?php
                       //find all facility------------------------------------------------------------------------------
                       if (isset($_GET['edit'])){
                       $facili = "SELECT DISTINCT faci_and_hotel.id_hotel,hotel_facility.* FROM faci_and_hotel,hotel_facility WHERE faci_and_hotel.id_faci=hotel_facility.id_faci AND faci_and_hotel.id_hotel='$edit_id'
";
                       $facili1 = @mysqli_query($con, $facili);

                       while ($faEdit = mysqli_fetch_array($facili1)){
                       ?>

                     <option class="facility" selected="selected"
                             value="<?= $faEdit['id_faci'] ?>"><?= $faEdit['title'] ?></option>
                   <?php
                   }

                   $what = "SELECT DISTINCT faci_and_hotel.id_faci,hotel_facility.title,hotel_facility.id_faci FROM faci_and_hotel,hotel_facility WHERE faci_and_hotel.id_faci=hotel_facility.id_faci AND faci_and_hotel.id_faci NOT IN( SELECT id_faci FROM `faci_and_hotel`WHERE id_hotel ='$edit_id')";
                   $result = @mysqli_query($con, $what);
                   while ($row = mysqli_fetch_array($result)) {
                       ?>
                       <option class="facility"
                               value="<?= $row['id_faci'] ?>"><?= $row['title'] ?></option>
                       <?php

                   }
                   } else {

                       $facilitys = "SELECT * FROM `hotel_facility` WHERE 1 GROUP BY `title`";
                       $facility = @mysqli_query($con, "SET NAMES utf8");
                       $facility = @mysqli_query($con, "SET CHARACTER SET utf8");
                       $facility = @mysqli_query($con, $facilitys);


                       while ($faci = @mysqli_fetch_array($facility)) {
                           ?>
                           <option class="facility"
                                   value="<?= $faci['id_faci'] ?>"><?= $faci['title'] ?></option>
                           <?php
                       }
                       //...............................................................................................
                   } ?>

                </select>
                    <script>
                        $('select').selectpicker();

                    </script>

                </span>
                <?php
                //......................................................................................................
                ?>

                <span style="margin: 5px">
                    <label>شهر : </label>
                    <select name="city" class="selectpicker" data-live-search="true" style="width: 80px;height: 35px">
                        <option value="<?=$city?>"><?=$city?></option>
                        <?php
                        $num_of_stars = "SELECT * FROM `cities` WHERE 1";

                        $num_of_star = @mysqli_query($con, "SET NAMES utf8");
                        $num_of_star = @mysqli_query($con, "SET CHARACTER SET utf8");
                        $num_of_star = @mysqli_query($con, $num_of_stars);

                        while ($row_of_stars = @mysqli_fetch_array($num_of_star)) {
                            ?>

                            <option  name="city" class="city"
                                    value="<?=$row_of_stars['id_city']?>"><?= $row_of_stars['city']?></option>
                            <?php
                        }
                        //..............................................................................................
                        ?>

                    </select>
                </span><br><br>
                <span style="margin: 5px">
                    <label>تعداد ستاره ها :</label>
                    <select name="star" style="width: 175px;height: 35px">
                        <option value="<?= $star ?>"><?= $star ?></option>
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </span>
                <?php
                //......................................................................................................
                ?>
                <span style="margin: 5px;">
                    <label>نوع اقامتگاه :</label>
                    <select name="kind_of_hotel" style="width: 172px;height: 35px">
                        <option value="<?= $kind_of_hotel ?>"><?= $kind_of_hotel ?></option>
                        <option>هتل</option>
                        <option>متل</option>
                        <option>مهمانسرا</option>
                        <option>ویلاه</option>
                        <option>کاروان</option>
                        <option>هاستل</option>
                        <option>شَله </option>
                    </select>
                </span>
                <?php
                //......................................................................................................
                ?>
                <br><br>
                <span style="margin: 10px">
                    <label>ادرس روی نقشه :</label>
                    <input type="text" name="map" style="width: 174px;height: 35px;font-size: 13px"
                           value="<?= $map ?>">
                </span>
                <?php
                //......................................................................................................
                ?>
                <span style="margin: 10px">
                    <label>پست الکترونی</label>
                    <input type="email" name="email" style="width: 150px;height: 35px;font-size: 13px"
                           value="<?= $email ?>">
                </span><br><br>
                <?php
                //......................................................................................................
                ?>
                <span>
                    <label>توضیح : </label><br>
                <textarea name="description" style="width: 560px;height: 60px"><?= $description ?></textarea>
                </span>
            </div>
            <?php
            //..........................................................................................................
            ?>

        </div>
    </form>
    <div style="margin: 50px;"></div>
    <div style="width: 970px;height:auto;margin-right: 14%;font-size: 15px;color: #31353D"
         dir="rtl">
        <form method="post" enctype="multipart/form-data">
            <?php

            //adding image for gallery..................................................................................

            if (isset($_GET['add'])) {

                ?>
                <h3 style="background-color: #31353D;color: white;padding: 4px">+ اضافه عکس برای اخرین هتل </h3>
            <?php
            if ($_GET['add'] > 0){
            $getid = $_GET['add'];
            ?>
            <input type="submit" name="add_for_new_gallery" value="اپلود تصاویر" class="btn btn-primary"
                   style="float: left">
            <input type="file" name="filess[]" multiple style="float: right">
            <?php
            if (isset($_POST['add_for_new_gallery']))
            {
            $valuefldr = 'C:\wamp64\www\Tourism_i\public\image\image_hotel_gallery';
            foreach ($_FILES['filess']['tmp_name'] as $key => $tmp_name){
            $file_name = $_FILES['filess']['name'][$key];
            $file_size = $_FILES['filess']['size'][$key];
            $file_tmp = $_FILES['filess']['tmp_name'][$key];
            $file_type = $_FILES['filess']['type'][$key];
            $desired_dir = $valuefldr;
            if (move_uploaded_file($file_tmp, "$desired_dir/" . $file_name))
            {
            $query = "INSERT INTO  `images_hotels` (`id_hotel`, `address_image`) VALUES ( '$getid', '$file_name')";
            $result = mysqli_query($con, $query);
            if ($result) {
                echo "<script>window.location.href = 'hotellist.php';
                                        </script>";
            }
            if (!$result) {
            ?>
                <p class="bg-danger">متاسفانه عکس به کالی اضافه نشده است</p>
            <?php
            }
            }
            else
            {
            ?>
                <script>
                    alert('error while uploading file');
                    window.location.href = '#';
                </script>
            <?php
            }

            }
            }
            }
            //----------------------------------------------------------------------------------------------------------

            }elseif ($_GET['edit']) {

            ?>
                <h3 style="background-color: #31353D;color: white;padding: 4px">+ عکس گالری هتل </h3>
                <div style="margin: 10px"></div>
            <input type="submit" name="edit_for_new_gallery" value="اپلود تصاویر" class="btn btn-primary"
                   style="float: left">
            <input type="file" name="files[]" multiple style="float: right">
            <?php
            if (isset($_POST['edit_for_new_gallery'])){
            $valuefldr = 'C:\wamp64\www\Tourism_i\public\image\image_hotel_gallery';
            foreach ($_FILES['files']['tmp_name'] as $key => $tmp_name){
            $file_name = $_FILES['files']['name'][$key];
            $file_size = $_FILES['files']['size'][$key];
            $file_tmp = $_FILES['files']['tmp_name'][$key];
            $file_type = $_FILES['files']['type'][$key];
            $desired_dir = $valuefldr;
            if (move_uploaded_file($file_tmp, "$desired_dir/" . $file_name))
            {
            //                    $er = "INSERT INTO `images_hotels` (`id_hotel`, `address_image`) SELECT MAX(`id_hotel`) FROM `hotles`;
            //";
            $query = "INSERT INTO  `images_hotels` (`id_hotel`, `address_image`) VALUES ( '$edit_id', '$file_name')";
            $result = mysqli_query($con, $query);
            echo "<script>window.location.href = 'hotellist.php?edit=$edit_id';
</script>";
            if (!$result) {
            ?>
                <p class="bg-danger">متاسفانه عکس به کالی اضافه نشده است</p>
            <?php
            }
            }
            else
            {
            ?>
                <script>
                    alert('error while uploading file');
                    window.location.href = '#';
                </script>
            <?php
            }

            }
            }
            ?>
                <div style="margin: 20px;color: #f9f3fc">`</div>
                <table class="table table-striped" style="font-size: 14px;background-color: white">
                    <thead style="color: #5f6472;padding: 10px;background-color: #dcddff">

                    </thead>
                    <tbody>
                    <?php
                    //--------------------------------------------------------------------------------------------------
                    $img = mysqli_query($con, "SELECT * FROM `images_hotels` WHERE id_hotel='$edit_id'");
                    while ($row_of_gallery = mysqli_fetch_array($img)) {
                        ?>

                        <tr>
                            <td style="float: right">
                                <img src='../public/image/image_hotel_gallery/<?=$row_of_gallery['address_image']?>'
                                     style="width: auto;height:100px">
                            </td>
                            <td style="font-size: 17px;padding: 40px;float: left">
                                <a onclick="return confirm('آیا میخواهید این عکس از گالری حذف کنید !')"
                                   href="hotellist.php?delete_gallery=<?= $row_of_gallery['id_image'] ?>&edit=<?= $edit_id ?>"
                                   style="text-decoration: none;padding: 1px;color: red;"><span
                                            class="">delete</span></a>

                            </td>

                        </tr>
                        <?php
                    }
                    ?>


                    </tbody>
                </table>
                <?php
            }
            ?>
        </form>
        <div style="margin: 70px"></div>
    </div>


    <?php

    //for delete--------------------------------------------------------------------------------------------------------
    } elseif (isset($_GET['delete'])) {
        $de = $_GET['delete'];
//        $del2 = mysqli_query($con, " UPDATE rezerve SET id_room=NULL WHERE id_hotel = $de");
//        if($del2) {
        $mu = mysqli_query($con, "SELECT * FROM rooms WHERE id_hotel=$de");
        while ($ro = mysqli_fetch_array($mu)) {
            $rom = $ro['id_room'];
//                echo $rom;
//                mysqli_query($con, "UPDATE rezerve SET id_room=NULL WHERE id_room='$rom'");
            mysqli_query($con, "DELETE t2 FROM faci_and_room as t2 inner join rooms as t1 on t2.id_room = t1.id_room AND t1.id_room='$rom'");
        }
//
        mysqli_query($con, "UPDATE `rooms` SET `deaction`=1 WHERE id_hotel=$de");

//            $del1 = mysqli_query($con, "UPDATE `rezerve` SET id_hotel=NULL WHERE id_hotel=$de");

//            if($del1) {

//                $del = mysqli_query($con, "DELETE t2 FROM rooms as t2 inner join hotels as t1 on t2.id_hotel = t1.id_hotel AND t1.id_hotel='$de'");

//                $dele = mysqli_query($con, "DELETE t2 FROM image  s_hotels as t2 inner join hotels as t1 on t2.id_hotel = t1.id_hotel AND t1.id_hotel='$de'");
        $delet = mysqli_query($con, "DELETE t2 FROM faci_and_hotel as t2 inner join hotels as t1 on t2.id_hotel = t1.id_hotel AND t1.id_hotel='$de'");
//                $delete = mysqli_query($con, "DELETE t1 FROM hotels as t1 WHERE t1.id_hotel='$de'");
        $delete = mysqli_query($con, "UPDATE `hotels` SET `deaction`=1 WHERE id_hotel=$de");

        if ($delete) {
            echo "<script>window.open('hotellist.php','_self')</script>";
        }
//            }


//        }


    } else {

        //................................................................................................
        //.....................................................................
        // that part for list of hotel ...


        ?>
        <div style="margin: 40px"></div>
        <div style="width: 1140px;margin-right: 23%;margin-left: 30%;color: #8a8893;font-size: 14px">
            <div style="background-color: #3a3f48">
                <div style="width: 100%;margin: auto">
                    <label style="width: 100px;height: 35px;margin: 15px;color: white;padding-right: 10px"><i
                                class="fa fa-search" style="margin: 3px"></i>سرچ
                        با </label>
                    <input id="search" class="search" type="text" style="width: 200px;height: 35px;margin: 15px"
                           placeholder="اسم هتل">
                    <?php
                    //......................................................................................................
                    ?>

                    <select name="star" class="star" style="width: 120px;height: 35px;margin: 15px">
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
                    <?php
                    //......................................................................................................
                    ?>
                    <select name="kind" class="kind" style="width: 120px;height: 35px;margin: 15px">
                        <option value="" disabled selected>نوع اقامتگاه</option>
                        <?php
                        $num_of_stars = "SELECT DISTINCT kind_of_hotel From hotels  ORDER BY star_hotels ASC ";
                        $num_of_star = @mysqli_query($con, "SET NAMES utf8");
                        $num_of_star = @mysqli_query($con, "SET CHARACTER SET utf8");
                        $num_of_star = @mysqli_query($con, $num_of_stars);

                        while ($row_of_stars = @mysqli_fetch_array($num_of_star)) {
                            ?>

                            <option class="kind"
                                    value="<?= $row_of_stars['kind_of_hotel'] ?>"><?= $row_of_stars['kind_of_hotel'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <?php
                    //......................................................................................................
                    ?>
<!--                    <select name="facility" class="facility" style="width: 120px;height: 35px;margin: 15px">-->
<!--                        <option value="" disabled selected>امکانات</option>-->
<!---->
<!--                        --><?php
//                        $num_of_stars = "SELECT * FROM `hotel_facility`";
//                        $num_of_star = @mysqli_query($con, "SET NAMES utf8");
//                        $num_of_star = @mysqli_query($con, "SET CHARACTER SET utf8");
//                        $num_of_star = @mysqli_query($con, $num_of_stars);
//
//                        while ($row_of_stars = @mysqli_fetch_array($num_of_star)) {
//                            ?>
<!---->
<!--                            <option class="facility"-->
<!--                                    value="--><?//= $row_of_stars['id_faci'] ?><!--">--><?//= $row_of_stars['title'] ?><!--</option>-->
<!--                            --><?php
//                        }
//                        ?>
<!--                    </select>-->
                    <?php
                    //......................................................................................................
                    ?>
                    <select class="country" style="width: 120px;height: 35px;margin: 15px">
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
                    <?php
                    //......................................................................................................
                    ?>
                    <select class="city" data-live-search="true" style="width: 120px;height: 35px;margin: 15px">
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

                <?php
                //......................................................................................................
                ?>
            </div>
            <div style="margin: 50px"></div>
            <div class="filter_data" dir="ltr"></div>


            <script>
                filter_data();

                function filter_data() {

                    $('.filter_data').html('<div></div>');
                    var action = 'detailhotellist';

                    var kind = get_filter('kind');
                    var country = get_filter('country');
                    var city = get_filter('city');
//                    var facility = get_filter('facility');
                    var star = get_filter('star');

                    $.ajax({
                        url: "details/detailhotellist.php",
                        method: "POST",

                        data: {
                            action: action,
                            star: star,
                            kind: kind,
                            country: country,
                            city: city,
//                            facility: facility

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
                    var action = 'detailhotellist';
                    var kind = get_filter('kind');
                    var country = get_filter('country');
                    var city = get_filter('city');
//                    var facility = get_filter('facility');
                    var star = get_filter('star');


                    $.ajax({
                        url: "details/detailhotellist.php",
                        method: "POST",
                        data: {
                            action: action,
                            search: search,

                            star: star,
                            kind: kind,
                            country: country,
                            city: city,
//                            facility: facility


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
                $('.kind').click(function () {
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
