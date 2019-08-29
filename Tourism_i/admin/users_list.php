<?php
    include 'headeradmin.php';
if(isset($_SESSION['admin_email'])) {

    ?>


    <div style="margin: 40px"></div>
    <div style="width: 1140px;margin-right: 23%;margin-left: 30%;color: #8a8893;font-size: 14px;text-align: right">
        <div style="background-color: #3a3f48">
            <div style="width: 100%;margin: auto">
                <label style="width: 100px;height: 35px;margin: 15px;color: white;padding-right: 10px"><i
                            class="fa fa-search" style="margin: 3px"></i>سرچ
                    با </label>
                <input id="search" class="search" type="text" style="width: 200px;height: 35px;margin: 15px"
                       placeholder="ایمیل کاربر">
                <input id="personaliy" class="personaliy" type="text" style="width: 200px;height: 35px;margin: 15px"
                       placeholder="شماره ملی کاربر">
                <input id="lastname" class="lastname" type="text" style="width: 200px;height: 35px;margin: 15px"
                       placeholder="فامیل کاربر">
                <input id="phone" class="phone" type="text" style="width: 200px;height: 35px;margin: 15px"
                       placeholder="شماره تماس">

            </div>
        </div>
        <div style="margin: 50px"></div>
        <div class="filter_data" dir="ltr"></div>

    </div>
    <script>
        filter_data();

        function filter_data() {

            $('.filter_data').html('<div></div>');
            var action = 'detail_users_list';


            $.ajax({
                url: "details/detail_users_list.php",
                method: "POST",

                data: {
                    action: action

                },
                success: function (data) {
                    $('.filter_data').html(data);
                }
            });
        }

        $('#search').keyup(function () {
            var search = $(this).val();
            $('.filter_data').html('<div></div>');
            var action = 'detail_users_list';
            $.ajax({
                url: "details/detail_users_list.php",
                method: "POST",
                data: {
                    action: action,
                    search: search

                },
                success: function (data) {
                    $('.filter_data').html(data);
                }
            });
        });
        $('#phone').keyup(function () {
            var phone = $(this).val();
            $('.filter_data').html('<div></div>');
            var action = 'detail_users_list';
            $.ajax({
                url: "details/detail_users_list.php",
                method: "POST",
                data: {
                    action: action,
                    phone: phone

                },
                success: function (data) {
                    $('.filter_data').html(data);
                }
            });
        });
        $('#personaliy').keyup(function () {
            var search1 = $(this).val();
            $('.filter_data').html('<div></div>');
            var action = 'detail_users_list';
            $.ajax({
                url: "details/detail_users_list.php",
                method: "POST",
                data: {
                    action: action,
                    search1: search1

                },
                success: function (data) {
                    $('.filter_data').html(data);
                }
            });
        });

        $('#lastname').keyup(function () {
            var search2 = $(this).val();
            $('.filter_data').html('<div></div>');
            var action = 'detail_users_list';
            $.ajax({
                url: "details/detail_users_list.php",
                method: "POST",
                data: {
                    action: action,
                    search2: search2

                },
                success: function (data) {
                    $('.filter_data').html(data);
                }
            });
        });
    </script>
    <?php
    include 'footeradmin.php';
}else{
    echo "<script>window.open('login.php','_self')</script>";

}
?>
