<?php
include "headeradmin.php";

if(isset($_SESSION['admin_email'])) {

    ?>
    <div style="margin: 40px"></div>
    <div style="width: 1140px;margin-right: 23%;margin-left: 30%;color: #8a8893;font-size: 14px">
        <div style="background-color: #3a3f48">
            <div style="width: 100%;margin: auto">
                <label style="width: 170px;height: 35px;margin: 15px;color: white;padding-right: 16px"><i
                            class="fa fa-search" style="margin: 12px"></i>سرچ
                    با </label>
                <input id="search" class="search" type="text" style="width: 230px;height: 35px;margin: 15px"
                       placeholder="اسم شرکت">

                <select class="country" style="width: 230px;height: 35px;margin: 15px">
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
                <select class="selectpicker city" data-live-search="true"
                        style="width: 230px;height: 35px;margin: 15px">
                    <option value="" disabled selected>شهرستان</option>

                    <?php
                    $num_of_stars = "SELECT DISTINCT `city` FROM `cities` WHERE 1";

                    $num_of_star = @mysqli_query($con, "SET NAMES utf8");
                    $num_of_star = @mysqli_query($con, "SET CHARACTER SET utf8");
                    $num_of_star = @mysqli_query($con, $num_of_stars);

                    while ($row_of_stars = @mysqli_fetch_array($num_of_star)) {
                        ?>

                        <option class="city" value="<?= $row_of_stars['city'] ?>"><?= $row_of_stars['city'] ?></option>
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
                var action = 'detailcompany_train_list';

                var country = get_filter('country');
                var city = get_filter('city');

                $.ajax({
                    url: "details/detailcompany_train_list.php",
                    method: "POST",

                    data: {
                        action: action,
                        country: country,
                        city: city

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
                var action = 'detailcompany_train_list';
                var country = get_filter('country');
                var city = get_filter('city');


                $.ajax({
                    url: "details/detailcompany_train_list.php",
                    method: "POST",
                    data: {
                        action: action,
                        search: search,
                        country: country,
                        city: city


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

            $('.city').click(function () {
                filter_data();
            });
            $('.country').click(function () {
                filter_data();
            });

        </script>


    </div>


    <?php
    include 'footeradmin.php';
}else{
    echo "<script>window.open('login.php','_self')</script>";

}
?>
