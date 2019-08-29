<?php
include "headeradmin.php";
if(isset($_SESSION['admin_email'])) {
?>
<div style="margin: 40px"></div>
<div style="width: 1140px;margin-right: 23%;margin-left: 30%;color: #8a8893;font-size: 14px">
    <div style="background-color: #3a3f48">
        <div style="width: 100%;margin: auto">
            <label style="width: 170px;height: 35px;margin: 15px;color: white;padding-right: 16px"><i class="fa fa-search" style="margin: 12px"></i>سرچ
                با </label>
            <input id="search" class="search" type="text" style="width: 230px;height: 35px;margin: 15px"
                   placeholder="اسم شرکت">


            <select  class="secer_num_train" style="width: 170px;height: 35px;margin: 15px">
                <option value="" disabled selected>شماره قطار</option>
                <?php
                $num_of_stars = "SELECT DISTINCT secer_num_train From train  ORDER BY secer_num_train ASC ";
                $num_of_star = @mysqli_query($con, "SET NAMES utf8");
                $num_of_star = @mysqli_query($con, "SET CHARACTER SET utf8");
                $num_of_star = @mysqli_query($con, $num_of_stars);

                while ($row_of_star = @mysqli_fetch_array($num_of_star)) {
                    ?>

                    <option class="secer_num_train" value="<?= $row_of_star['secer_num_train'] ?>"><?= $row_of_star['secer_num_train'] ?></option>
                    <?php
                }
                ?>
            </select>
            <select name="stars" class="stars" style="width: 170px;height: 35px;margin: 15px">
                <option value="" disabled selected>ستاره ها</option>
                <?php
                $num_of_stars = "SELECT DISTINCT stars From train  ORDER BY stars ASC ";
                $num_of_star = @mysqli_query($con, "SET NAMES utf8");
                $num_of_star = @mysqli_query($con, "SET CHARACTER SET utf8");
                $num_of_star = @mysqli_query($con, $num_of_stars);

                while ($star = @mysqli_fetch_array($num_of_star)) {
                    ?>

                    <option class="stars" value="<?= $star['stars'] ?>"><?= $star['stars'] ?></option>
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
            var action = 'detailstrain';

            var secer_num_train = get_filter('secer_num_train');
            var stars = get_filter('stars');

            $.ajax({
                url: "details/detailstrain.php",
                method: "POST",

                data: {
                    action: action,
                    secer_num_train: secer_num_train,
                    stars: stars

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
            var action = 'detailstrain';
            var secer_num_train = get_filter('secer_num_train');
            var stars = get_filter('stars');


            $.ajax({
                url: "details/detailstrain.php",
                method: "POST",
                data: {
                    action: action,
                    search: search,
                    secer_num_train: secer_num_train,
                    stars: stars


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

        $('.stars').click(function () {
            filter_data();
        });
        $('.secer_num_train').click(function () {
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
