<?php
include 'headeradmin.php';
if(isset($_SESSION['admin_email'])) {
?>
?>
<div style="margin: 40px"></div>
<div style="width: 1140px;margin-right: 23%;margin-left: 30%;color: #8a8893;font-size: 14px">
    <div style="background-color: #3a3f48">
        <div style="width: 100%;margin: auto">
            <label style="width: 170px;height: 35px;margin: 15px;color: white;padding-right: 16px"><i class="fa fa-search" style="margin: 12px"></i>سرچ
                با </label>
            <input id="search" class="search" type="text" style="width: 180px;height: 35px;margin: 15px"
                   placeholder="اسم شرکت">

            <select  class="secer_num_train" style="width: 180px;height: 35px;margin: 15px">
                <option value="" disabled selected>شماره قطار</option>
                <?php
                $secer_num_trains = "SELECT DISTINCT `secer_num_train` FROM `train` WHERE 1";
                $secer_num_train = @mysqli_query($con, "SET NAMES utf8");
                $secer_num_train = @mysqli_query($con, "SET CHARACTER SET utf8");
                $secer_num_train = @mysqli_query($con, $secer_num_trains);

                while ($row_num_train = @mysqli_fetch_array($secer_num_train)) {
                    ?>

                    <option class="secer_num_train" value="<?= $row_num_train['secer_num_train'] ?>"><?= $row_num_train['secer_num_train'] ?></option>
                    <?php
                }
                ?>
            </select>


            <select class="seat_room" data-live-search="true" style="width: 180px;height: 35px;margin: 15px">
                <option value="" disabled selected>شماره سالن</option>

                <?php
                $num_of_stars = "SELECT DISTINCT `seat_room` FROM `train_cub` WHERE 1";

                $num_of_star = @mysqli_query($con, "SET NAMES utf8");
                $num_of_star = @mysqli_query($con, "SET CHARACTER SET utf8");
                $num_of_star = @mysqli_query($con, $num_of_stars);

                while ($row_of_stars = @mysqli_fetch_array($num_of_star)) {
                    ?>

                    <option class="seat_room" value="<?= $row_of_stars['seat_room'] ?>"><?= $row_of_stars['seat_room'] ?></option>
                    <?php
                }
                ?>
            </select>
            <select class="selectpicker city" data-live-search="true" style="width: 180px;height: 35px;margin: 15px">
                <option value="" disabled selected>تعداد صندلی های کوبه</option>

                <?php
                $num_of_stars = "SELECT DISTINCT `salon` FROM `train_cub` WHERE 1";

                $num_of_star = @mysqli_query($con, "SET NAMES utf8");
                $num_of_star = @mysqli_query($con, "SET CHARACTER SET utf8");
                $num_of_star = @mysqli_query($con, $num_of_stars);

                while ($row_of_stars = @mysqli_fetch_array($num_of_star)) {
                    ?>

                    <option class="city" value="<?= $row_of_stars['salon'] ?>"><?= $row_of_stars['salon'] ?></option>
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
            var action = 'details.cub_list.php';

            var secer_num_train = get_filter('secer_num_train');
            var seat_room = get_filter('seat_room');
            var salon = get_filter('salon');

            $.ajax({
                url: "details/details.cub_list.php",
                method: "POST",

                data: {
                    action: action,
                    secer_num_train: secer_num_train,
                    seat_room: seat_room,
                    salon: salon

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
            var action = 'details.cub_list.php';
            var secer_num_train = get_filter('secer_num_train');
            var seat_room = get_filter('seat_room');
            var salon = get_filter('salon');


            $.ajax({
                url: "details/details.cub_list.php",
                method: "POST",
                data: {
                    action: action,
                    search: search,
                    secer_num_train: secer_num_train,
                    seat_room: seat_room,
                    salon: salon


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

        $('.seat_room').click(function () {
            filter_data();
        });
        $('.secer_num_train').click(function () {
            filter_data();
        });
        $('.salon').click(function () {
            filter_data();
        });

    </script>


</div>


<?php
include 'footeradmin.php';
}else {
    echo "<script>window.open('login.php','_self')</script>";

}
?>
