
<?php
include '../header.php';
include '../config.php';
if (isset($_GET['id_hotel']) && isset($_GET['person_adobt']) && isset($_GET['person_child']) && isset($_GET['dateIn']) && isset($_GET['dateOut'])){
?>
<link rel="stylesheet" href="../hotels/style/style.css">

<body style="background-color: #f7f7f7">
<div style="margin-top: 5%;"></div>
<?php
$id_room = ((isset($_POST['id_room']) && $_POST['id_room'] != '') ? $_POST['id_room'] : $_GET['id_room']);
$dateIn = ((isset($_POST['dateIn']) && $_POST['dateIn'] != '') ? $_POST['dateIn'] : $_GET['dateIn']);

$dateOut = ((isset($_POST['dateOut']) && $_POST['dateOut'] != '') ? $_POST['dateOut'] : $_GET['dateOut']);
$person_adobt = ((isset($_POST['person_adobt']) && $_POST['person_adobt'] != '') ? $_POST['person_adobt'] : $_GET['person_adobt']);
$person_child = ((isset($_POST['person_child']) && $_POST['person_child'] != '') ? $_POST['person_child'] : $_GET['person_child']);
$price = ((isset($_POST['price']) && $_POST['price'] != '') ? $_POST['price'] : $_GET['price']);
$id_hotel =$_GET['id_hotel'];
$date1 = new DateTime($dateIn);
$date2 = new DateTime($dateOut);
$interval = $date1->diff($date2);
$differ_day = $interval->days;
if(!empty($person_adobt) && !empty($differ_day)) {
    $allprice = $price * $differ_day;
}

//-------------------------------------------------------------------------------------------------------------------

$get_hotels = "SELECT DISTINCT * FROM hotels WHERE hotels.id_hotel= '" . $_GET['id_hotel'] . "'";
$get_hotel = @mysqli_query($con, "SET NAMES utf8");
$get_hotel = @mysqli_query($con, "SET CHARACTER SET utf8");
$get_hotel = @mysqli_query($con, $get_hotels);


?>


<div class="container" style="width: 100%;font-size: 15px;color: #56555d">

    <div class="col-md-2" style="background-color: #f7f7f7;left:7%;margin-right: 280px ">
        <div style="width: 290px;height: 92px;background: url('resoures/image_hotel/map.jpg');align-items: center;
    margin: 0 auto;
    padding: 40px;border:solid #bdbac6 ;
    position: relative; ">
            <div style="background-color: white;height: 25px;text-align: center"><a id="map" onclick="mapshow(<?= $id_hotel?>)"
                                                                                    style="color: #1e90ff;font-size: 16px;	text-decoration: none;">نمایش
                    روی نقشه <i class="glyphicon glyphicon-map-marker"></i></a>
            </div>
        </div>
        <div style="height: 50px"></div>
        <div style="background-color: white;height: 450px;width: 290px;align-items: center;
                        margin: 0 auto;
                        padding: 30px;border-color: #8a8893;
                        position: relative;" dir="rtl">
            <div>
                <div class="" style="float: right"><span style="color: #3686f2;font-size: 24px">تاریخ ورود</span><br>
                    <span style="font-size: 16px;color: black"><?= $dateIn ?></span>
                </div>
                <div class="" style="float: left"><span
                            style="color: #3686f2;font-size: 24px">تاریخ خروج</span><br><span
                            style="font-size: 16px;color: black">
                        <?= $dateOut ?>
                    </span></div>
            </div>
            <br><br><br>
            <hr>
            <div>
                <span style="font-size: 13px"> <span class="fa fa-bed"> </span><i>  </i> مشخصات اتاق </span><br>
                <span style="color: #4b4b4b">اتاق <?= $person_adobt ?> تخته </span><br>
                <span
                <?php
                $myq="SELECT room_faci.*,faci_and_room.* FROM rooms,faci_and_room,room_faci WHERE room_faci.id_room_faci=faci_and_room.id_faci AND faci_and_room.id_room=$id_room GROUP BY id_faci";
                $ql = @mysqli_query($con, "SET NAMES utf8");
                $ql = @mysqli_query($con, "SET CHARACTER SET utf8");
                $ql = @mysqli_query($con, $myq);
                $count_result = mysqli_num_rows($ql);
                if($count_result > 0) {
                    $i = 1;
                    while ($re = mysqli_fetch_array($ql) and $i < 3) {

                        ?>
                        <span style="background-color: #6cb8ff ;font-size: 12px ;color:#1461aa;padding: 2px;border:1px solid dodgerblue "><?= $re['title'] ?></span>
                        <?php
                        $i++;
                    }
                }else{
                    ?>
                    <span style="background-color: #6cb8ff ;font-size: 12px ;color:#1461aa;padding: 2px;border:1px solid dodgerblue ">0</span>
                    <?php
                }
                ?>
            </div>
            <hr>

            <div>
                <span><span class="fa fa-user"></span><i> </i>تعداد مسافرین اتاق  </span><br><br>
                <div class="" style="float: right"><span class="fa fa-male"></span><span
                            style="margin: 3px"><?= $person_adobt ?></span>
                    <span>بزرگسال</span>
                </div>
                <div class="" style="float: left"><span class="fa fa-child"></span><span
                            style="margin: 3px"><?= $person_child ?></span><span>کودک</span></div>
                <br>
                <hr>
            </div>

            <div>
                <span style="margin: 0 auto;padding: 5px">شروع قیمت از <span style="color: dodgerblue;font-size: 20px"> <?php
                        echo $price * $differ_day
                        ?></span> ریال</span>
            </div>
        </div>
    </div>

    <div class="col-md-7" style="right: 2%;margin-left: 30px" dir="rtl">
        <div style="color: #424242">
            <?php
            while ($row_hotel = @mysqli_fetch_array($get_hotel)) {
            $glod_star = $row_hotel['star_hotels'];

            $rest_sta = 5 - $glod_star;
            ?>
            <h3><strong>هتل <?= $row_hotel['name_hotel'] ?></strong></h3>
            <span style="font-size: 17px"><span><?= $row_hotel['address'] ?></span><span
                        style="margin: 8px">|</span><span><?php
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

                    ?></span></span><br>

        </div>
        <div style="margin-top: 20px; "></div>

        <div class="gallery" dir="ltr" style="height: 800px">
            <?php
            $mygul=mysqli_query($con,"SELECT * FROM `images_hotels` WHERE id_hotel='$id_hotel'");
            $count_image = mysqli_num_rows($mygul);
            if($count_image ==0) {
                for ($p = 1; $p < $count_image; $p++) {
                    ?>
            <div class="gallery__item gallery__item--<?=$p?>">
                    <img src="../../public/image/noimage2.jfif" class="gallery__img"
                         alt="Image <?=$p?>">
            </div>

                    <?php
                }
            }
            $g=1;
            while ($img=mysqli_fetch_array($mygul) and $g<8) {

                ?>
                <div class="gallery__item gallery__item--<?=$g?>">
                    <img src="../../public/image/image_hotel_gallery/<?=$img['address_image']?>" class="gallery__img"
                         alt="Image <?=$g?>">
                </div>
                <?php
                $g++;
            }
            ?>

        </div>

    </div>
</div>
<div class="container" style="width: auto" dir="rtl">

    <div style="width: 100%;height: 80px;background-color:#e1e1e1;padding: 10px">
        <ul style="font-size: 18px;padding: 20px;margin-right: 11%">
            <li style="margin: 10px "><a style="text-decoration: none;">درباره هتل</a></li>
            <li style="margin: 10px"><a style="text-decoration: none;">قیمت و رزور اتاق</a></li>
            <li style="margin: 10px"><a style="text-decoration: none;">هزینه های جانبی</a></li>
        </ul>
    </div>
    <div style="margin-top: 40px"></div>
    <div style="width: 80%;margin-right: 12%">
        <div class="discription" style="font-size: 20px;margin: auto">
            <h2><span class="fa fa-hotel" style="margin: 9px"></span>درباره هتل</h2>
            <p style="color: #505050;font-size: 16px;margin-right: 60px">
                <?php
                echo $row_hotel['discription_hotels'];
                ?>
            </p>
        </div>
        <?php
        }
        ?>

        <div style="margin: 90px"></div>
        <form method="post">

            <div class="rezerv" style="font-size: 20px;margin: auto" dir="rtl">
                <h2><span class="fa fa-bed" style="margin: 9px"></span>قیمت و رزور اتاق</h2>
                <div style="width: 96% ;height: 170px;background-color: white; margin: 0 auto;padding: 30px;font-size: 20px;color: #7f7f7f">

                    <div class="col-xs-3 search-item">
                        <br>
                        <button value="مشاهده اتاق های موجود" class="bt-sear btn btn-danger" type="submit" name="bt-sear"
                                style="padding: 11px;border-radius: 20px;font-size: 16px;color:white;">
                            مشاهده اتاق های موجود
                        </button>
                    </div>

                    <div class="col-xs-3 search-item" style="padding: 5px">تاریخ خروج
                        <br><span class="glyphicon glyphicon-calendar"></span>

                        <input type='text' placeholder="تاریخ خروج" id="datepicker2" name="dateOut" readonly
                               autocomplete="off" value="<?= $dateOut ?>"/>


                    </div>

                    <div class="col-xs-3 search-item" style="padding: 5px">تاریخ ورود
                        <br><span class="glyphicon glyphicon-calendar"></span>

                        <input type='text' placeholder="تاریخ ورود" id="datepicker1" name="dateIn" readonly
                               autocomplete="off" value="<?= $dateIn ?>"/>

                    </div>
                    <div class="col-xs-3 search-item" style="padding: 5px" >کودک
                        <input name="person_child" max="6" min="0" type="number" style="width: 50px" value="<?php echo 'child' . $person_child;?>">
                    </div>
                    <div class="col-xs-3 search-item" style="padding: 5px">بزرگسال
                        <input name="person_adobt" max="14" min="1" type="number" style="width: 50px" value="<?php echo 'adobt' . $person_adobt ?>" >
                    </div>
                </div>
            </div>
        </form>
        <div style="margin: 70px"></div>
        <?php
        $get_rooms = "SELECT DISTINCT * FROM rooms WHERE id_hotel='" . $_GET['id_hotel'] . "'  AND num_adobt_person='" . $person_adobt . "' AND num_child_person='" . $person_child . "' AND rooms.deaction=0  AND id_room NOT IN(SELECT rezerve.id_room FROM rezerve WHERE rezerve.date_in BETWEEN ('" . $dateIn . "')  AND ('" . $dateOut . "') AND rezerve.date_out BETWEEN ('" . $dateIn . "')  AND ('" . $dateOut . "')) ORDER by rooms.price ASC ";
        $get_room = @mysqli_query($con, "SET NAMES utf8");
        $get_room = @mysqli_query($con, "SET CHARACTER SET utf8");
        $get_room = @mysqli_query($con, $get_rooms);

        if (isset($_POST['bt-sear']) || isset($_GET['id_room'])) {
            while ($row_room = @mysqli_fetch_array($get_room)) {


                ?>
                <form method="post">
                    <div class="result" style="font-size: 25px;margin: auto" dir="rtl">
                        <div style="margin-top:30px "></div>
                        <div style="width: 96% ;height: 140px;background-color: white; margin: 0 auto;padding: 20px;font-size: 16px;color: #555555">
                            <h4 style="font-size: 22px">اتاق دو تخته</h4>
                            <!--                    <i class="fa fa-coffee"></i> صبحانه-->
                            <!--                    <span style="margin: 7px"> | </span>-->
                            <?php
                            $ro= $row_room['id_room'];
                            $myq="SELECT room_faci.*,faci_and_room.* FROM rooms,faci_and_room,room_faci WHERE room_faci.id_room_faci=faci_and_room.id_faci AND faci_and_room.id_room=$ro GROUP BY id_faci";
                            $ql = @mysqli_query($con, "SET NAMES utf8");
                            $ql = @mysqli_query($con, "SET CHARACTER SET utf8");
                            $ql = @mysqli_query($con, $myq);

                            $i=1;
                            while ($re= mysqli_fetch_array($ql) and $i < 4){
                                if ($re['title'] == 'صبحانه') {

                                    ?>
                                    <SPAN>
                                    <i class="fa fa-coffee">
                                    <?php
                                }
                                ?>
                                </i> <?= $re['title'] ?></SPAN>
                                <span style="margin: 7px"> | </span>
                                <?php
                                $i++;
                            }

                            ?>


                            <i class="fa fa-user">
                    <span><?= $row_room['num_adobt_person'] ?> بزرگسال ، <?= $row_room['num_child_person'] ?>
                        کودک</span></i>
                            <span style="margin: 7px"> | </span>

                            <i class="fa fa-money"></i>قیمت به ازای یک شب
                            <span name="price"><strong><?= $row_room['price'] ?></strong>   ریال</span>
                            <span style="margin: 7px"> | </span>
                            <span style="font-size: 21px;color: #b90000"><strong>غیرقابل استرداد</strong></span>
                            <div style="float: left;margin-left:190px;">
                                <input name="rez" style="width: 90px;height: 40px;font-size: 16px" type="submit" value="رزور"
                                       class="btn btn-primary" >
                            </div>

                        </div>

                        <div style="margin: 20px"></div>
                    </div>
                </form>
                <?php
                if (isset($_POST['rez']))
                {

                    echo "<script>window.open('../rez_and_checkout.php?id_room=$id_room&dateIn=$dateIn&dateOut=$dateOut&person_adobt=$person_adobt&person_child=$person_child&price=1255&id_hotel=$id_hotel','_self')</script>";

                    ?>


                    <?php
                }
            }
        }
        ?>

    </div>
</div>
<div style="margin: 140px"></div>

<div class="discription" style="font-size: 20px;width: 96% ;height: 170px; margin: 0 auto;padding: 30px;color: #7f7f7f;float: right" dir="rtl">
    <h2><span class="fa fa-comment" style="margin: 9px"></span>هزینه های جانبی</h2>
    <p style="color: #505050;font-size: 16px;margin-right: 60px">
        هزینه اقامت کودکان خردسال از دو تا شش سال طبق قانون هر هتل محاسبه خواهد شد.
    </p>
</div>

<?php
$maps= mysqli_query($con,"SELECT * FROM `hotels` WHERE id_hotel='$id_hotel'");
$map = mysqli_fetch_assoc($maps)?>
<div style="margin: 170px"></div>
<div class="modal fade map-modal" id="map-modal" role="dialog" tabindex="-1" aria-hidden="true" style="margin-top: 50px">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span> </button>

            </div>
            <div class="modal-body">
                <div class="container-fluid" style="height: 400px">
                    <div style="float:left; width: 100%;height: 400px">
                        <iframe style="width: 100%;height: 400px" id="gmap_canvas"
                                src="<?=$map['map']?>"
                                frameborder="0"
                                scrolling="no" marginheight="0" marginwidth="0">

                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    }
    ?>

</body>
<style>
    ul li {
        display: inline;
        color: #9e8b9b;
    }

    li :hover {
        text-underline-mode: 1px;
        color: white;
    }

    .gallery {
        display: grid;
        grid-template-columns: repeat(8, 1fr);
        grid-template-rows: repeat(8, 5vw);
        grid-gap: 15px;
    }

    .gallery__img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .gallery__item--2 {
        grid-column-start: 1;
        grid-column-end: 4;
        grid-row-start: 1;
        grid-row-end: 3;
    }

    .gallery__item--1 {
        grid-column-start: 4;
        grid-column-end: 9;
        grid-row-start: 1;
        grid-row-end: 6;
    }

    .gallery__item--3 {
        grid-column-start: 1;
        grid-column-end: 4;
        grid-row-start: 3;
        grid-row-end: 6;
    }

    .gallery__item--4 {
        grid-column-start: 1;
        grid-column-end: 3;
        grid-row-start: 6;
        grid-row-end: 8;
    }

    .gallery__item--5 {
        grid-column-start: 3;
        grid-column-end: 5;
        grid-row-start: 6;
        grid-row-end: 8;
    }

    .gallery__item--6 {
        grid-column-start: 5;
        grid-column-end: 7;
        grid-row-start: 6;
        grid-row-end: 8;
    }

    .gallery__item--7 {
        grid-column-start: 7;
        grid-column-end: 9;
        grid-row-start: 6;
        grid-row-end: 8;

    }

    .centered {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .tem {

    }

</style>

<script>
    $("#datepicker1").datepicker({
//        dateFormat: "dd-M-yy",
        minDate: 1,
        maxDate: 90,
        onSelect: function (date) {
            var date2 = $('#datepicker1').datepicker('getDate');
            date2.setMonth(date2.getMonth() + 3);
//            $('#to').datepicker('setDate', date2);
            $('#datepicker2').datepicker('option', 'maxDate', date2);

            //date be one day more than the first date
            var date1 = $('#datepicker1').datepicker('getDate');
            var date = new Date(Date.parse(date1));
            date.setDate(date.getDate() + 1);
            var newDate = date.toDateString();
            newDate = new Date(Date.parse(newDate));
            $('#datepicker2').datepicker("option", "minDate", newDate);


        }
    });
    $('#datepicker2').datepicker({
//        dateFormat: "dd-M-yy",
        maxDate: 91,
        minDate: 2

    });
    function mapshow(id) {
//        alert(id);
        var data = {"id" :id};
        $.ajax({
//           url:<?//ma;?>//+'parts/hotels/map.php',
            url:'map.php',
            method:"post",
            data:data,
            success:function (data) {
//                       alert('232323');
//               $('.filter_data').html(data)
                $('.map-modal').modal('toggle');
            },
            error:function () {
                alert("خطا رخ داده است !");
            }
        });
    }
</script>

</html>