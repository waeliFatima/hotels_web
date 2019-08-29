<?php
require_once 'config.php';
// function to get the sity --------------------------------------------------------------------------------------------
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
//some data to post and get--------------------------------------------------------------------------------------------
$goal = ((isset($_POST['lname'])) && !empty($_POST['lname']) ? $_POST['lname'] : '');
$adout_room = ((isset($_POST['numb'])) ? $_POST['numb'] : '1');
$child_room = ((isset($_POST['numbs'])) ? $_POST['numbs'] : '0');
?>
<?php
include 'header.php';

?>

<body dir="rtl" style="font-size: 18px;background-color: #f4f4f4">
<?php
//if geting ------------------------------------------------------------------------------------------------------------
?>
<?php
if (isset($_GET ['lname']) && isset($_GET['dateIn']) && isset($_GET['dateOuts']))  {
    $city = $_GET['lname'];
    $dateIn = $_GET['dateIn'];
    $dateOut = $_GET['dateOuts'];
    $person_adobt = $_GET['numb'];
    $person_child = $_GET['numbs'];

//count the days betweent star and end----------------------------------------------------------------------------------
    $date1 = new DateTime($dateIn);
    $date2 = new DateTime($dateOut);
    $interval = $date1->diff($date2);
    $differ_days = $interval->days;

//not important and get city for hidden input---------------------------------------------------------------------------
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

    <div style="height: 140px;background: linear-gradient(292deg, rgba(150, 150, 150, 0.03) 0%, rgba(150, 150, 150, 0.03) 20%, rgba(151, 151, 151, 0.03) 20%, rgba(151, 151, 151, 0.03) 40%, rgba(215, 215, 215, 0.03) 40%, rgba(215, 215, 215, 0.03) 60%, rgba(254, 254, 254, 0.03) 60%, rgba(254, 254, 254, 0.03) 80%, rgba(112, 112, 112, 0.03) 80%, rgba(112, 112, 112, 0.03) 100%), linear-gradient(62deg, rgba(34, 34, 34, 0.03) 0%, rgba(34, 34, 34, 0.03) 20%, rgba(171, 171, 171, 0.03) 20%, rgba(171, 171, 171, 0.03) 40%, rgba(206, 206, 206, 0.03) 40%, rgba(206, 206, 206, 0.03) 60%, rgba(210, 210, 210, 0.03) 60%, rgba(210, 210, 210, 0.03) 80%, rgba(69, 69, 69, 0.03) 80%, rgba(69, 69, 69, 0.03) 100%), linear-gradient(314deg, rgba(235, 235, 235, 0.03) 0%, rgba(235, 235, 235, 0.03) 20%, rgba(254, 254, 254, 0.03) 20%, rgba(254, 254, 254, 0.03) 40%, rgba(178, 178, 178, 0.03) 40%, rgba(178, 178, 178, 0.03) 60%, rgba(211, 211, 211, 0.03) 60%, rgba(211, 211, 211, 0.03) 80%, rgba(73, 73, 73, 0.03) 80%, rgba(73, 73, 73, 0.03) 100%), linear-gradient(32deg, rgba(182, 182, 182, 0.01) 0%, rgba(182, 182, 182, 0.01) 12.5%, rgba(208, 208, 208, 0.01) 12.5%, rgba(208, 208, 208, 0.01) 25%, rgba(178, 178, 178, 0.01) 25%, rgba(178, 178, 178, 0.01) 37.5%, rgba(143, 143, 143, 0.01) 37.5%, rgba(143, 143, 143, 0.01) 50%, rgba(211, 211, 211, 0.01) 50%, rgba(211, 211, 211, 0.01) 62.5%, rgba(92, 92, 92, 0.01) 62.5%, rgba(92, 92, 92, 0.01) 75%, rgba(56, 56, 56, 0.01) 75%, rgba(56, 56, 56, 0.01) 87.5%, rgba(253, 253, 253, 0.01) 87.5%, rgba(253, 253, 253, 0.01) 100%), linear-gradient(247deg, rgba(103, 103, 103, 0.02) 0%, rgba(103, 103, 103, 0.02) 12.5%, rgba(240, 240, 240, 0.02) 12.5%, rgba(240, 240, 240, 0.02) 25%, rgba(18, 18, 18, 0.02) 25%, rgba(18, 18, 18, 0.02) 37.5%, rgba(38, 38, 38, 0.02) 37.5%, rgba(38, 38, 38, 0.02) 50%, rgba(246, 246, 246, 0.02) 50%, rgba(246, 246, 246, 0.02) 62.5%, rgba(9, 9, 9, 0.02) 62.5%, rgba(9, 9, 9, 0.02) 75%, rgba(167, 167, 167, 0.02) 75%, rgba(167, 167, 167, 0.02) 87.5%, rgba(86, 86, 86, 0.02) 87.5%, rgba(86, 86, 86, 0.02) 100%), linear-gradient(90deg, rgb(26, 26, 26), rgb(26, 26, 26));">
        <?php
        include 'hotels/hotel_search.php'
        ?>
    </div>

    <div style="margin-top: 50px "></div>
    <div style="color: #d0ccdc">


        <div style="float: right; margin-right: 130px; flex-direction:column;width: 300px;font-size: 16px">

            <div class="px-0 col-md-5 col-7" style="width: 300px;
                background: white;
                padding: 10px;
                height: auto;
                margin-bottom: 20px;
                margin-top: 20px;
                margin-left: 2px; border: 1px solid;
                box-shadow: 5px 10px 18px #888888;
               ">
                <div style="margin: 11px">
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
            <div class="px-0 col-md-5 col-7" style="width: 300px;
                background: white;
                padding: 10px;
                height: auto;
                margin-bottom: 30px;
                margin-top: 30px;
                margin-left: 2px;
                box-shadow: 5px 10px 18px #888888;
               ">
                <div style="margin: 11px">
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
            <div class="px-0 col-md-5 col-7" style="width: 300px;
                padding: 10px;
                background: white;
                height: auto;
                margin-bottom: 30px;
                margin-top: 30px;
                margin-left: 2px; border: 1px solid;
                box-shadow: 5px 10px 18px #888888;
               ">
                <div style="margin: 11px">
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
            <div class="px-0 col-md-5 col-7" style="width: 300px;
                background: white;
                padding: 10px;
                height: auto;
                margin-bottom: 30px;
                margin-top: 30px;
                margin-left: 2px; border: 1px solid;
                box-shadow: 5px 10px 18px #888888;
               ">
                <div style="margin: 11px">
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
                                        <input type="checkbox" class="common_selector kind_of_hotel" value="<?= $kind_rows['kind_of_hotel'] ?>" id="kind1"><?= $kind_rows['kind_of_hotel'] ?></label>
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
            <div class="row filter_data" style="">

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
    <?php
    include 'footer.php';
    ?>
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


