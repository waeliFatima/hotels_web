<?php
include 'headeradmin.php';
if(isset($_SESSION['admin_email'])) {
?>
?>
<?php
$title_hotel = ((isset($_POST['title_hotel']) && $_POST['title_hotel'] != '') ? $_POST['title_hotel'] : '');
if (isset($_GET['delete_hotel'])) {
    $delete_hotele = $_GET['delete_hotel'];
    $ers = mysqli_query($con, "DELETE t2 FROM faci_and_hotel as t2 inner join hotels as t1 on t2.id_hotel = t1.id_hotel AND t2.id_faci='$delete_hotele'");
    if ($ers) {
        $delete_ho = mysqli_query($con, "DELETE FROM `hotel_facility` WHERE id_faci=$delete_hotele");
        echo "<script>window.open('facility_hotel','_self')</script>";

    }


}
if (isset($_GET['edit_hotel'])) {
    $edit_hotel = $_GET['edit_hotel'];
    $Resul = "SELECT * FROM `hotel_facility` WHERE id_faci = '$edit_hotel'";

    $query = @mysqli_query($con, "SET NAMES utf8");
    $query = @mysqli_query($con, "SET CHARACTER SET utf8");
    $Result = @mysqli_query($con, $Resul);
    $hotelEdit = mysqli_fetch_assoc($Result);
    $title_hotel = ((isset($_POST['title_hotel']) and $_POST['title_hotel'] != '') ? $_POST['title_hotel'] : $hotelEdit['title']);

    if (isset($_POST['add_hotel'])) {
        if ($title_hotel == '') {
            echo '<p class="bg-danger" style="">لطفا اطلاع مورد خود ابتدا پر کنید ! </p>';
        } else {
            $edit_faci_hotel = mysqli_query($con, " UPDATE `hotel_facility` SET `title`=N'$title_hotel' WHERE id_faci = '$edit_hotel'");
            if ($edit_faci_hotel) {
                echo "<script>alert('امکانات هتل با موفقیت ویرایش شده.')</script>";
                echo "<script>window.open('facility_hotel','_self')</script>";
            }
        }
    }

} else {
    if (isset($_POST['add_hotel']) and !isset($_GET['edit_hotel'])) {
        $title_hotel = ((isset($_POST['title_hotel']) and $_POST['title_hotel'] != '') ? $_POST['title_hotel'] : '');
        if ($title_hotel == '') {
            echo '<p class="bg-danger">لطفا اطلاع مورد خود ابتدا پر کنید ! </p>';
        } else {
            $add_faci_hotel = mysqli_query($con, "INSERT INTO `hotel_facility`(`title`) VALUES (N'$title_hotel')");
            if ($add_faci_hotel) {
                echo "<script>alert('امکانات هتل با موفقیت درج شده   .')</script>";
                echo "<script>window.open('facility_hotel','_self')</script>";
            }
        }
    }
}
?>
<form method="post">
    <div style="width: 1140px;height: 100%;margin-right: 22%;font-size: 15px;color: #31353D;padding: 10px;margin-top: 40px" dir="rtl">

        <div style="width:555px;float: left;background-color: #d7d7d7;height: 100%;padding: 10px;">

            <div style="width: 455px;height: 150px;background-color: #ffffff;margin-top: 50px;margin-right: 50px">
                <h3 style="background-color: #31353D;padding: 3px;color: #d7d7d7;text-align: right">امکانات هتل</h3>
                <span style="padding:10px">
                <label style="text-align: right"">اسم امکانات هتل :</label>
            <input autocomplete="off" value="<?= $title_hotel ?>" name="title_hotel" type="text" style="width: 290px;height: 35px">
                <input name="add_hotel" value="<?php if (isset($_GET['edit_hotel'])) {
                    echo 'ویرایش کن';
                } else {
                    echo 'اضافه کن';
                } ?>" type="submit" class="btn btn-primary" style="width: 80px;height: 35px;float: left;margin: 25px">

            </span>

            </div>
            <div style="margin: 150px"></div>
            <h3 style="background-color: #31353D;padding: 3px;color: #d7d7d7;text-align: right"">لیست امکانات هتل</h3>
            <div>
                <table class="table table-striped" style="font-size: 14px;background-color: white">
                    <thead style="color: #5f6472;padding: 10px;background-color: #dcddff">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">آدرس ایمیل</th>

                        <th scope="col" style="">عملیات</th>

                    </tr>
                    </thead>
                    <tbody>

                    <?php

                    $hotel_faci = "SELECT * FROM `hotel_facility` WHERE 1";

                    $query = @mysqli_query($con, "SET NAMES utf8");
                    $query = @mysqli_query($con, "SET CHARACTER SET utf8");
                    $Result_hotel = @mysqli_query($con, $hotel_faci);
                    $i = 1;
                    while ($hotel = mysqli_fetch_array($Result_hotel)) {
                        ?>
                        <tr>
                            <!--                        onclick="return confirm(\' آیا میخواهید   '. $row['name_hotel'].'  را حذف کنید  !\')"-->

                            <td><?= $i ?></td>
                            <td><?= $hotel['title'] ?></td>
                            <td style="font-size: 16px;padding: 10px">
                                <a onclick="return confirm('حذف <?= $hotel['title'] ?>  باعث حدفش از تمام هتل ها میشود ')"
                                   href="facility_hotel.php?delete_hotel=<?= $hotel['id_faci'] ?>"
                                   style="text-decoration: none;padding: 3px;color: red;"><i
                                            class="glyphicon glyphicon-remove"></i></a>
                                <a href="facility_hotel.php?edit_hotel=<?= $hotel['id_faci'] ?>"
                                   style="text-decoration: none;padding: 3px;margin: 9px"><i
                                            class="glyphicon glyphicon-pencil"></i></a>
                            </td>
                        </tr>
                        <?php
                        $i++;
                    }
                    ?>
                    </tbody>
                </table>

            </div>

        </div>
</form>
<?php
$title_room = ((isset($_POST['title_room']) && $_POST['title_room'] != '') ? $_POST['title_room'] : '');
if (isset($_GET['delete_room'])) {
    $delete_room = $_GET['delete_room'];
    $ersr = mysqli_query($con, "DELETE t2 FROM faci_and_room as t2 inner join rooms as t1 on t2.id_room = t1.id_room AND t2.id_faci='$delete_room'");
    if ($ersr) {
        $delete_ro = mysqli_query($con, "DELETE FROM `room_faci` WHERE id_room_faci=$delete_room");
        if ($delete_ro) {
            echo "<script>window.open('facility_hotel','_self')</script>";
        }
    }


}
if (isset($_GET['edit_room'])) {
    $edit_room = $_GET['edit_room'];
    $Resul1 = "SELECT * FROM `room_faci` WHERE id_room_faci = '$edit_room'";

    $query = @mysqli_query($con, "SET NAMES utf8");
    $query = @mysqli_query($con, "SET CHARACTER SET utf8");
    $Result1 = @mysqli_query($con, $Resul1);
    $roomEdit = mysqli_fetch_assoc($Result1);
    $title_room = ((isset($_POST['title_room']) and $_POST['title_room'] != '') ? $_POST['title_room'] : $roomEdit['title']);

    if (isset($_POST['add_room'])) {
        if ($title_room == '') {
            echo '<p class="bg-danger">لطفا اطلاع مورد خود ابتدا پر کنید ! </p>';
        } else {
            $edit_faci_room = mysqli_query($con, " UPDATE `room_faci` SET `title`=N'$title_room' WHERE id_room_faci = '$edit_room'");
            if ($edit_faci_room) {
                echo "<script>alert('امکانات اتاق با موفقیت ویرایش شده.')</script>";
                echo "<script>window.open('facility_hotel','_self')</script>";
            }
        }
    }

} else {
    if (isset($_POST['add_room']) and !isset($_GET['edit_room'])) {
//        $title_hotel = ((isset($_POST['title_hotel']) and $_POST['title_hotel'] != '') ? $_POST['title_hotel'] : '');
        if ($title_room == '') {
            echo '<p class="bg-danger">لطفا اطلاع مورد خود ابتدا پر کنید ! </p>';
        } else {
            $add_faci_room = mysqli_query($con, "INSERT INTO `room_faci`(`title`) VALUES (N'$title_room')");
            if ($add_faci_room) {
                echo "<script>alert('امکانات اتاق با موفقیت درج شده   .')</script>";
                echo "<script>window.open('facility_hotel','_self')</script>";
            }
        }
    }
}
?>



<form method="post">
    <div style="width:555px;float: right;background-color: #31353D;height: 100%;padding: 10px">
        <div style="width: 455px;height: 150px;background-color: #ffffff;margin-top: 50px;margin-right: 50px">
            <h3 style="background-color: #d7d7d7;padding: 3px;color: #31353D;text-align: right"">مکانات اتاق</h3>
            <span style="padding:10px">
                <label>اسم امکانات اتاق :</label>
            <input autocomplete="off" name="title_room"  value="<?=$title_room?>" type="text" style="width: 290px;height: 35px">
                <input name="add_room" value="<?php if(isset($_GET['edit_room'])){echo 'ویراش کن';}else{echo 'اضافه کن';}?>" type="submit" class="btn btn-primary" style="width: 80px;height: 35px;float: left;margin: 25px">
            </span>

        </div>
        <div style="margin: 150px"></div>
        <h3 style="background-color: #d7d7d7;padding: 3px;color: #31353D;text-align: right"">لیست امکانات اتاق</h3>
        <div>
            <table class="table table-striped" style="font-size: 14px;background-color: white">
                <thead style="color: #5f6472;padding: 10px;background-color: #dcddff">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">آدرس ایمیل</th>
                    <th scope="col" style="">عملیات</th>

                </tr>
                </thead>
                <tbody>
                <?php

                $room_faci = "SELECT * FROM `room_faci` WHERE 1";

                $query = @mysqli_query($con, "SET NAMES utf8");
                $query = @mysqli_query($con, "SET CHARACTER SET utf8");
                $Result_room = @mysqli_query($con, $room_faci);
                $i = 1;
                while ($room = mysqli_fetch_array($Result_room)) {
                    ?>
                    <tr>

                        <td><?= $i ?></td>
                        <td><?= $room['title'] ?></td>
                        <td style="font-size: 16px;padding: 10px">
                            <a onclick="return confirm('حذف <?= $room['title'] ?>  باعث حدفش از تمام اتاق ها میشود ')"href="facility_hotel.php?delete_room=<?= $room['id_room_faci'] ?>"
                               style="text-decoration: none;padding: 3px;color: red;"><i
                                        class="glyphicon glyphicon-remove"></i></a>
                            <a href="facility_hotel.php?edit_room=<?= $room['id_room_faci'] ?>"
                               style="text-decoration: none;padding: 3px;margin: 9px"><i
                                        class="glyphicon glyphicon-pencil"></i></a>
                        </td>
                    </tr>
                    <?php
                    $i++;
                }
                ?>

                </tbody>
            </table>


        </div>


    </div>
</form>
</div>


<?php include 'footeradmin.php';
}else {
    echo "<script>window.open('login.php','_self')</script>";

}?>
