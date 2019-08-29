<!--<!doctype html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport"-->
<!--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">-->
<!--    <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
<!--    <title>Document</title>-->
<!--</head>-->
<!--<body>-->
<!--<form id='myform' method='POST' action='#'>-->
<!--    <input type='button' value='-' class='qtyminus' field='quantity' />-->
<!--    <input type='text' name='quantity' value='0' class='qty' />-->
<!--    <input type='button' value='+' class='qtyplus' field='quantity' />-->
<!---->
<!--    <input type="number" size="2" name="qty" id="upcart">-->
<!--</form>-->

<!--<form method="post"  action="hotel_city.php">-->
<!--<input type="submit" name="submit_button" value="Vote Up!" />-->
<!--<input type="submit" name="submit_button" value="Vote Down =(" />-->
<!--<input type="hidden" name="person" value="A" />-->
<!--</form>-->
<!---->
<!---->
<!--</body>-->
<!--</html>-->
<?php
//$rate = $row['rate'];
//function incvar(){
//    global $rate;
//    if(isset($rate) || $rate>0){
//        return $rate++;
//    }
//}
//
//function decvar(){
//    global $rate;
//    if(isset($rate) || $rate>0){
//        return $rate--;
//    }
//}


//if(isset($_POST['submit_button'])){
//    // They submit the form
//
//    $add = ($_POST['submit_button'] == 'Vote Up!') ? 1 : -1;
//
//    $person = $_POST['person'];
//
//    $link = mysql_connect('localhost', 'user', 'password');
//    //mysql_select_db('database', $link);
//    //mysql_query("UPDATE table SET value=value+$add WHERE person=$person");
//} else {
//    die("You didn't submit the form =(");
//}

//include 'header.php';

?>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css'
      integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!--<body>-->
<!---->
<!---->
<!---->
<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>-->
<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>-->
<!---->





<div>
    <div id="navbar">
    <nav style="font-size: 18px" class="navbar navbar-expand-lg navbar-light bg-light">


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown" style="font-size: large">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="glyphicon glyphicon-earphone"> 021-43900000</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item"  href="#"><strong>پشتبانی <i style="color: #ff5295">24</i>ساعته</strong></a>
                        <a class="dropdown-item" href="#"><h4>021<i style="color: #ff5295">-</i>43900000</h4></a>
                        <hr class="dropdown-divider" style="color: #ff5295">
                        <a class="dropdown-item" href="#">راهنمای خرید بلیط</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">راهنمای استراد بلیط</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">تماس با ما</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">قوانین و مقرارت</a>
                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="#">اطلاعات فرودگاهی</a>
                    </div>
                </li>


                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="glyphicon glyphicon-user"> ورود-ثبت نام  </span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>

            </ul>
            <form class="form-inline my-2 my-lg-0">






                <ul class="navbar-nav mr-auto">

                    <a class="nav-link" href="hotels.php"><i class='fas fa-hotel'></i>  هتل  </a>
                    <a class="nav-link" href="#"><i class="fa fa-subway"></i>  قطار  </a>
                    <a class="nav-link" href="#"><i class="fa fa-bus"></i>   اتوبوس   </a>
                    <a class="nav-link" href="#"><i class='fas fa-suitcase'></i>  تور  </a>

                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-plane"></i>  هواپیما
                        </a>
                        <div style="width: 100px" class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">پرواز داخلی </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">پرواز خارجی </a>
                        </div>
                    </li>



                </ul>

                <img style="width: 100px ;height: auto" src="../public/image/logo3.png" alt=" ">
            </form>
        </div>
    </nav>
    </div>
</div>

<?php
require_once '../config.php';
//session_start();


function get_Iran_city()
{
    global $con;
    $get_city = "select * from cities WHERE `country`='ایران'";

    $run_city = @mysqli_query($con, "SET NAMES utf8");
    $run_city = @mysqli_query($con, "SET CHARACTER SET utf8");
    $run_city = @mysqli_query($con, $get_city);
    while ($row_city = @mysqli_fetch_array($run_city)) {
        $cat_id = $row_city['id_city'];
        $cat_title = $row_city['city'];
        echo "<option id='$cat_id'>$cat_title</option>";
    }


}

$goal = ((isset($_POST['lname'])) && !empty($_POST['lname']) ? $_POST['lname'] : '');
$adout_room = ((isset($_POST['numb'])) ? $_POST['numb'] : '1');
$child_room = ((isset($_POST['numbs'])) ? $_POST['numbs'] : '0');
?>
<?php
//include 'hotels/header.php';

?>

<body dir="rtl" style="font-size: 18px;background-color: #f4f4f4">


<?php
//require_once 'hotels/hotel_city.php';

?>
<?php
if (isset($_GET ['lname']) && isset($_GET['dateIn']) && isset($_GET['dateOuts']))  {
    $city = $_GET['lname'];
    $dateIn = $_GET['dateIn'];
    $dateOut = $_GET['dateOuts'];
    $person_adobt = $_GET['numb'];
    $person_child = $_GET['numbs'];

//count the days betweent star and end
    $date1 = new DateTime($dateIn);
    $date2 = new DateTime($dateOut);
    $interval = $date1->diff($date2);
    $differ_days = $interval->days;


    $get_cit = "select id_city from cities WHERE `city`='$city'";
    $run_cit = @mysqli_query($con, "SET NAMES utf8");
    $run_cit = @mysqli_query($con, "SET CHARACTER SET utf8");
    $run_cit = @mysqli_query($con, $get_cit);
    while ($row_city = @mysqli_fetch_array($run_cit)) {
        $city_id = $row_city['id_city'];
        ?>
        <input type="hidden" value="<?= $city_id ?>" class="run_cit">
        <?php
    }
    ?>
    <input type="hidden" value="<?= $dateIn ?>" class="dateIn">
    <input type="hidden" value="<?= $dateOut ?>" class="dateOut">
    <input type="hidden" value="<?= $person_adobt ?>" class="person_adobt">
    <input type="hidden" value="<?= $person_child ?>" class="person_child">
    <input type="hidden" value="<?= $differ_days ?>" class="differ_days">

    <div style="background: linear-gradient(292deg, rgba(150, 150, 150, 0.03) 0%, rgba(150, 150, 150, 0.03) 20%, rgba(151, 151, 151, 0.03) 20%, rgba(151, 151, 151, 0.03) 40%, rgba(215, 215, 215, 0.03) 40%, rgba(215, 215, 215, 0.03) 60%, rgba(254, 254, 254, 0.03) 60%, rgba(254, 254, 254, 0.03) 80%, rgba(112, 112, 112, 0.03) 80%, rgba(112, 112, 112, 0.03) 100%), linear-gradient(62deg, rgba(34, 34, 34, 0.03) 0%, rgba(34, 34, 34, 0.03) 20%, rgba(171, 171, 171, 0.03) 20%, rgba(171, 171, 171, 0.03) 40%, rgba(206, 206, 206, 0.03) 40%, rgba(206, 206, 206, 0.03) 60%, rgba(210, 210, 210, 0.03) 60%, rgba(210, 210, 210, 0.03) 80%, rgba(69, 69, 69, 0.03) 80%, rgba(69, 69, 69, 0.03) 100%), linear-gradient(314deg, rgba(235, 235, 235, 0.03) 0%, rgba(235, 235, 235, 0.03) 20%, rgba(254, 254, 254, 0.03) 20%, rgba(254, 254, 254, 0.03) 40%, rgba(178, 178, 178, 0.03) 40%, rgba(178, 178, 178, 0.03) 60%, rgba(211, 211, 211, 0.03) 60%, rgba(211, 211, 211, 0.03) 80%, rgba(73, 73, 73, 0.03) 80%, rgba(73, 73, 73, 0.03) 100%), linear-gradient(32deg, rgba(182, 182, 182, 0.01) 0%, rgba(182, 182, 182, 0.01) 12.5%, rgba(208, 208, 208, 0.01) 12.5%, rgba(208, 208, 208, 0.01) 25%, rgba(178, 178, 178, 0.01) 25%, rgba(178, 178, 178, 0.01) 37.5%, rgba(143, 143, 143, 0.01) 37.5%, rgba(143, 143, 143, 0.01) 50%, rgba(211, 211, 211, 0.01) 50%, rgba(211, 211, 211, 0.01) 62.5%, rgba(92, 92, 92, 0.01) 62.5%, rgba(92, 92, 92, 0.01) 75%, rgba(56, 56, 56, 0.01) 75%, rgba(56, 56, 56, 0.01) 87.5%, rgba(253, 253, 253, 0.01) 87.5%, rgba(253, 253, 253, 0.01) 100%), linear-gradient(247deg, rgba(103, 103, 103, 0.02) 0%, rgba(103, 103, 103, 0.02) 12.5%, rgba(240, 240, 240, 0.02) 12.5%, rgba(240, 240, 240, 0.02) 25%, rgba(18, 18, 18, 0.02) 25%, rgba(18, 18, 18, 0.02) 37.5%, rgba(38, 38, 38, 0.02) 37.5%, rgba(38, 38, 38, 0.02) 50%, rgba(246, 246, 246, 0.02) 50%, rgba(246, 246, 246, 0.02) 62.5%, rgba(9, 9, 9, 0.02) 62.5%, rgba(9, 9, 9, 0.02) 75%, rgba(167, 167, 167, 0.02) 75%, rgba(167, 167, 167, 0.02) 87.5%, rgba(86, 86, 86, 0.02) 87.5%, rgba(86, 86, 86, 0.02) 100%), linear-gradient(90deg, rgb(26, 26, 26), rgb(26, 26, 26));">
        <?php

//        include 'hotels/hotel_search.php'
        ?>
    </div>

    <div style="margin-top: 50px "></div>
    <div style="color: #d0ccdc">


        <div style="float: right; margin-right: 10%; flex-direction:column">

            <div class="px-0 col-md-5 col-7" style="width: 400px;
                background: white;
                padding: 10px;
                height: auto;
                margin-bottom: 30px;
                margin-top: 30px;
                margin-left: 2px; border: 1px solid;
                padding: 10px;
                box-shadow: 5px 10px 18px #888888;
               ">
                <div style="margin: 16px">
                    <fieldset>
                        <div class="some-class" style="color: #8a8893;">
                            <h3>جستجوی هتل</h3>
                            <input name="search" type="text" id="search" class="search"
                                   style="width: 250px;height: 40px">

                            <!--                                <input type="text" >-->

                        </div>
                </div>
            </div>
            <br>
            <div class="px-0 col-md-5 col-7" style="width: 400px;
                background: white;
                padding: 10px;
                height: auto;
                margin-bottom: 30px;
                margin-top: 30px;
                margin-left: 2px;
                padding: 10px;
                box-shadow: 5px 10px 18px #888888;
               ">
                <div style="margin: 16px">
                    <fieldset>
                        <div class="" style="color: #8a8893;">

                            <h2><strong>براساس قیمت</strong></h2>
                            <hr>
                            <label for="b"> <input type="checkbox" class=" common_selector price" name="price1"
                                                   value="1000000-2500000" id="price1"/>
                                1000000 ریال تا 2500000 ریال
                            </label><br>
                            <label for="c">
                                <input type="checkbox" class=" common_selector price" name="price2"
                                       value="2500000-5000000" id="price2"/>
                                2500000 ریال تا 5000000 ریال</label><br>
                            <label for="d">
                                <input type="checkbox" class=" common_selector price" name="price3"
                                       value="5000000-7500000" id="price3"/>
                                5000000 ریال تا 7500000 ریال

                            </label><br>
                            <label for="e">
                                <input type="checkbox" class=" common_selector price" name="price4"
                                       value="7500000-10000000" id="price4"/>
                                7500000 ریال تا 10000000 ریال
                            </label><br>
                            <label for="f">
                                <input type="checkbox" class=" common_selector price" name="price5"
                                       value="11000000-1000000000" id="price5"/>
                                10000000 به بالا

                            </label><br>
                        </div>
                    </fieldset>
                </div>
            </div>
            <br>
            <div class="px-0 col-md-5 col-7" style="width: 400px;
                padding: 10px;
                background: white;
                height: auto;
                margin-bottom: 30px;
                margin-top: 30px;
                margin-left: 2px; border: 1px solid;
                padding: 10px;
                box-shadow: 5px 10px 18px #888888;
               ">
                <div style="margin: 16px">
                    <fieldset>
                        <div class="some-class" style="color: #8a8893;">
                            <div class="list-group">
                                <h2><strong>درجه هتل</strong></h2>
                                <hr>
                                <?php
                                $num_of_stars = "SELECT DISTINCT hotels.star_hotels FROM hotels WHERE hotels.id_city=$city_id  ORDER BY hotels.star_hotels DESC ";
                                $num_of_star = @mysqli_query($con, "SET NAMES utf8");
                                $num_of_star = @mysqli_query($con, "SET CHARACTER SET utf8");
                                $num_of_star = @mysqli_query($con, $num_of_stars);

                                while ($row_of_stars = @mysqli_fetch_array($num_of_star)) {
                                    $glod_star = $row_of_stars['star_hotels'];
                                    $rest_sta = 5 - $glod_star;
                                    ?>
                                    <div class="stars">
                                        <label><input type="checkbox" class="common_selector stars"
                                                      value="<?php echo $row_of_stars['star_hotels'] ?>">
                                            <?php
                                            if ($glod_star > 0) {
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
                                            } else {

                                                ?>
                                                رتبه بندی نشده

                                                <?php
                                            }
                                            ?>
                                        </label><br><br>

                                    </div>
                                    <?php
                                }

                                ?>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            <br>
            <div class="px-0 col-md-5 col-7" style="width: 400px;
                background: white;
                padding: 10px;
                height: auto;
                margin-bottom: 30px;
                margin-top: 30px;
                margin-left: 2px; border: 1px solid;
                padding: 10px;
                box-shadow: 5px 10px 18px #888888;
               ">
                <div style="margin: 16px">
                    <fieldset>
                        <div class="some-class" style="color: #8a8893;">

                            <h2><strong>نوع اقامتگاه</strong></h2>
                            <hr>
                            <?php
                            $kind_of_hotel = "SELECT DISTINCT hotels.kind_of_hotel FROM hotels WHERE 1";
                            $Kind_ho = @mysqli_query($con, "SET NAMES utf8");
                            $Kind_ho = @mysqli_query($con, "SET CHARACTER SET utf8");
                            $Kind_ho = @mysqli_query($con, $kind_of_hotel);
                            while ($kind_rows = @mysqli_fetch_array($Kind_ho)) {
                                ?>
                                <div class="kind_of_hotel">
                                    <label>
                                        <input type="checkbox" class="radio common_selector kind_of_hotel"
                                               value="<?= $kind_rows['kind_of_hotel'] ?>"
                                               id="kind1"><?= $kind_rows['kind_of_hotel'] ?></label><br>
                                </div><br>
                                <?php

                            } ?>

                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
        <div style="float: left;margin-left: 10%;">مرتب کردن براساس
            <select class="store" style="color: dodgerblue;border: none;background-color: #f4f4f4" name="store">
                <option class="store" style="background-color: white" value="exil">بالاترین امتیاز</option>
                <option class="store" style="background-color: white" value="most_price"> بشترین قیمت</option>
                <option class="store" style="background-color: white" value="min_price"> کمترین قیمت</option>
            </select>
        </div>

        <input type="hidden" value="<?= $dateIn ?>" class="dateIn">
        <input type="hidden" value="<?= $dateOut ?>" class="dateOut">
        <input type="hidden" value="<?= $person_adobt ?>" class="person_adobt">
        <input type="hidden" value="<?= $person_child ?>" class="person_child">
        <input type="hidden" value="<?= $differ_days ?>" class="differ_days">
        <input type="hidden" value="" class="">
        <div class="">
            <br>
            <div class="row filter_data">

            </div>

        </div>

    </div>
    <?php

}
else {
?>

<div class="bg-ho-pa">
    <div class="sh">

        <form id="myform" method="post" name="myform">
            <div class="row">
                <div style="margin-top: 26%"></div>
                <div>
                    <?php
                    include 'hotels/hotel_search.php';
                    ?>

                    <?php
                    }
                    ?>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    filter_data();

    function filter_data() {

        $('.filter_data').html('<div></div>');
        var action = 'fetch_data_result_hotels';
        var stars = get_filter('stars');
        var kind_of_hotel = get_filter('kind_of_hotel');
        var price = get_filter('price');
        var store = get_filter('store');
        var dateIn = $('.dateIn').val();
        var dateOut = $('.dateOut').val();
        var person_adobt = $('.person_adobt').val();
        var person_child = $('.person_child').val();
        var differ_days = $('.differ_days').val();
        var run_cit = $('.run_cit').val();

        $.ajax({
            url: "hotels/fetch_data_result_hotels.php",
            method: "POST",

            data: {
                action: action,
                stars: stars,
                kind_of_hotel: kind_of_hotel,
                price: price,
                store: store,
                dateIn: dateIn,
                dateOut: dateOut,
                person_adobt: person_adobt,
                person_child: person_child,
                differ_days: differ_days,
                run_cit: run_cit
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
        var action = 'fetch_data_result_hotels';
        var stars = get_filter('stars');
        var kind_of_hotel = get_filter('kind_of_hotel');
        var price = get_filter('price');
        var store = get_filter('store');
        var dateIn = $('.dateIn').val();
        var dateOut = $('.dateOut').val();
        var person_adobt = $('.person_adobt').val();
        var person_child = $('.person_child').val();
        var differ_days = $('.differ_days').val();
        var run_cit = $('.run_cit').val();

        $.ajax({
            url: "hotels/fetch_data_result_hotels.php",
            method: "POST",
            data: {
                action: action,
                stars: stars,
                kind_of_hotel: kind_of_hotel,
                price: price,
                store: store,
                dateIn: dateIn,
                dateOut: dateOut,
                person_adobt: person_adobt,
                person_child: person_child,
                differ_days: differ_days,
                run_cit: run_cit,
                search: search


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

    $('.common_selector').click(function () {
        filter_data();

    });
    $('.store').click(function () {
        filter_data();
    })

</script>


</body>

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


    $(document).ready(function () {
        $("#mylink").click(function () {
            $("#numform").toggle();
        });
    });

    function incrementValue() {
        var value = parseInt(document.getElementById('numb').value, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 14) {
            value++;
            document.getElementById('numb').value = value;
        }
    }

    function decrementValue() {
        var value = parseInt(document.getElementById('numb').value, 10);//10 یتعنی در یازه ی ده ها نه دودمی با چیزی دیگری
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            document.getElementById('numb').value = value;
        }
    }

    function incrementValue1() {
        var value = parseInt(document.getElementById('numbs').value, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 6) {
            value++;
            document.getElementById('numbs').value = value;
        }
    }

    function decrementValue1() {
        var value = parseInt(document.getElementById('numbs').value, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 0) {
            value--;
            document.getElementById('numbs').value = value;
        }
    }

</script>








<!--<div class="form-group">-->
<!--    <form action="post" name="add_name" id="add_name">-->
<!--        <table class="table table-bordered" id="dynamic_field">-->
<!--            <tr>-->
<!--                <td>-->
<!--                    <input type="text" name="name[]" id="name" class="form-control name-list" placeholder="Enter Name">-->
<!--                </td>-->
<!--                <td><button name="add" id="add"></button></td>-->
<!--            </tr>-->
<!---->
<!--        </table>-->
<!--        <input type="button" name="submit" value="submit" id="submit">-->
<!--    </form>-->
<!--</div>-->

<!--<script>-->
<!--    $(document).ready(function () {-->
<!--        var i = 1;-->
<!--        $('#add').click(function () {-->
<!--            i++;-->
<!--            $('#dynamic_field').append(' <td>\n' +-->
<!--                '                    <input type="text" name="name[]" id="name" class="form-control name-list" placeholder="Enter Name">\n' +-->
<!--                '                </td>\n' +-->
<!--                '                <td><button name="add" id="add"></button></td>')-->
<!--        });-->
<!--        $(document).on('click','.btn_romove',function () {-->
<!--            var button_id = $(this).attr("id");-->
<!--            $('#row' + button_id +'').remove();-->
<!---->
<!--        });-->
<!---->
<!--        $('#submit'.click(function () {-->
<!--            $.ajax({-->
<!--                url:"test.php",-->
<!--                method:"POST",-->
<!--                data:$('#add_name').serialize(),-->
<!--                success:function (data) {-->
<!--                    alert(data);-->
<!--                    $('#add_name')[0].reset();-->
<!--                }-->
<!--            })-->
<!---->
<!--        }))-->
<!--    })-->
<!--</script>-->