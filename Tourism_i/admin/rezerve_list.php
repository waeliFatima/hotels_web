<?php
include 'headeradmin.php';
if(isset($_SESSION['admin_email'])) {
    ?>

    ?>

    <div style="margin: 40px"></div>
    <div style="width: 1000px;margin-right: 26%;margin-left: 16%;color: #504e58;text-align: center">
        <div style="background-color: #3a3f48">
            <div style="width: 100%;margin: auto">
                <label style="width: 100px;height: 35px;margin: 15px;color: white;padding-right: 16px"><i
                        class="fa fa-search" style="margin: 12px"></i>سرچ
                    با </label>
                <input id="search" class="search" type="text" style="width: 130px;height: 35px;margin: 15px"
                       placeholder="اسم هتل">

                <input id="id_payment" class="id_payment" type="text" style="width: 130px;height: 35px;margin: 15px"
                       placeholder="شماره سفارش">
                <input id="user" class="user" type="text" style="width: 140px;height: 35px;margin: 15px"
                       placeholder="کاربر">

<label></label>
                <input id="price" class="price" type="text" style="width: 140px;height: 35px;margin: 15px" autocomplete="off"
                       placeholder="مبلغ"><br>
                <label>تاریخ روزو : </label>
                <input type="date" style="width:width: 50px;height: 35px;margin: 15px " value="تاریخ روزو" id="datepicker">
                <label>تاریخ ورود : </label>

                <input type="date" style="width:width: 50px;height: 35px;margin: 15px " value="تاریخ ورود" id="date_in">
                <label>تاریخ خروج : </label>

                <input type="date" style="width:width: 50px;height: 35px;margin: 15px " value="تاریخ خروج" id="date_out">


            </div>


        </div>
        <div style="margin: 50px"></div>
        <div class="filter_data" dir="ltr"></div>


        <script>

            filter_data();

            function filter_data() {

                $('.filter_data').html('<div></div>');
                var action = 'detail_rezerve_list';



                $.ajax({
                    url: "details/detail_rezerve_list.php",
                    method: "POST",

                    data: {
                        action: action

                    },
                    success: function (data) {
                        $('.filter_data').html(data);
                    }
                });
            }

            //this function will do search hotel without press enter or button

            $('#id_payment').keyup(function () {
                var id_payment = $(this).val();

                $('.filter_data').html('<div></div>');
                var action = 'detail_rezerve_list';
                $.ajax({
                    url: "details/detail_rezerve_list.php",
                    method: "POST",
                    data: {
                        action: action,
                        id_payment: id_payment

                    },
                    success: function (data) {
                        $('.filter_data').html(data);
                    }
                });

            });

            $('#datepicker').keyup(function () {
                var datepicker = $(this).val();

                $('.filter_data').html('<div></div>');
                var action = 'detail_rezerve_list';
                $.ajax({
                    url: "details/detail_rezerve_list.php",
                    method: "POST",
                    data: {
                        action: action,
                        datepicker: datepicker

                    },
                    success: function (data) {
                        $('.filter_data').html(data);
                    }
                });

            });
            $('#user').keyup(function () {
                var user = $(this).val();

                $('.filter_data').html('<div></div>');
                var action = 'detail_rezerve_list';
                $.ajax({
                    url: "details/detail_rezerve_list.php",
                    method: "POST",
                    data: {
                        action: action,
                        user: user

                    },
                    success: function (data) {
                        $('.filter_data').html(data);
                    }
                });

            });
            $('#price').keyup(function () {
                var price = $(this).val();

                $('.filter_data').html('<div></div>');
                var action = 'detail_rezerve_list';
                $.ajax({
                    url: "details/detail_rezerve_list.php",
                    method: "POST",
                    data: {
                        action: action,
                        price: price

                    },
                    success: function (data) {
                        $('.filter_data').html(data);
                    }
                });

            });
            $('#date_in').keyup(function () {
                var date_in = $(this).val();

                $('.filter_data').html('<div></div>');
                var action = 'detail_rezerve_list';
                $.ajax({
                    url: "details/detail_rezerve_list.php",
                    method: "POST",
                    data: {
                        action: action,
                        date_in: date_in

                    },
                    success: function (data) {
                        $('.filter_data').html(data);
                    }
                });

            });
            $('#date_out').keyup(function () {
                var date_out = $(this).val();

                $('.filter_data').html('<div></div>');
                var action = 'detail_rezerve_list';
                $.ajax({
                    url: "details/detail_rezerve_list.php",
                    method: "POST",
                    data: {
                        action: action,
                        date_out: date_out

                    },
                    success: function (data) {
                        $('.filter_data').html(data);
                    }
                });

            });
   $('#search').keyup(function () {
                var search = $(this).val();

                $('.filter_data').html('<div></div>');
                var action = 'detail_rezerve_list';
                $.ajax({
                    url: "details/detail_rezerve_list.php",
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




        </script>


    </div>





<?php

include 'footeradmin.php';
}else{
    echo "<script>window.open('login.php','_self')</script>";

}
?>