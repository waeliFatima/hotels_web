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
            <input id="search" class="search" type="text" style="width: 150px;height: 35px;margin: 15px"
                   placeholder="ایمیل کاربر">
            <input id="personilty_cus" class="personilty_cus" type="text" style="width: 150px;height: 35px;margin: 15px"
                   placeholder="شماره ملی مسافر">
            <select name="gender" class="gender"
                    style="width: 80px;height: 35px;margin: 15px">
                <option value="" disabled selected>gender</option>
                <option class="gender" value="<?= 'زن' ?>"><?= 'زن' ?></option>
                <option class="gender" value="<?= 'مرد' ?>"><?= 'مرد' ?></option>

            </select>
            <select name="age" class="age"
                    style="width: 80px;height: 35px;margin: 15px">
                <option value="" disabled selected>سن</option>
                <option class="age" value="<?= 'کودک' ?>"><?= 'کودک' ?></option>
                <option class="age" value="<?= 'بزرگسال' ?>"><?= 'بزرگسال' ?></option>

            </select>
            <input id="lastname" class="lastname" type="text" style="width: 150px;height: 35px;margin: 15px"
                   placeholder="فامیل کاربر">
            <input id="phone" class="phone" type="text" style="width: 150px;height: 35px;margin: 15px"
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
        var action = 'detail_customer';
        var gender = get_filter('gender');
        var age = get_filter('age');




        $.ajax({
            url: "details/detail_customer.php",
            method: "POST",

            data: {
                action: action,
                gender:gender,
                age:age

            },
            success: function (data) {
                $('.filter_data').html(data);
            }
        });
    }

    $('#search').keyup(function () {
        var search = $(this).val();
        $('.filter_data').html('<div></div>');
        var action = 'detail_customer';
        var gender = get_filter('gender');
        var age = get_filter('age');
        $.ajax({
            url: "details/detail_customer.php",
            method: "POST",
            data: {
                action: action,
                search: search,
                gender:gender,
                age:age


            },
            success: function (data) {
                $('.filter_data').html(data);
            }
        });
    });
    $('#phone').keyup(function () {
        var phone = $(this).val();
        $('.filter_data').html('<div></div>');
        var action = 'detail_customer';
        var gender = get_filter('gender');
        var age = get_filter('age');
        $.ajax({
            url: "details/detail_customer.php",
            method: "POST",
            data: {
                action: action,
                phone: phone,
                gender:gender,
                age:age


            },
            success: function (data) {
                $('.filter_data').html(data);
            }
        });
    });
    $('#personilty_cus').keyup(function () {
        var personilty_cus = $(this).val();
        $('.filter_data').html('<div></div>');
        var action = 'detail_customer';
        var gender = get_filter('gender');
        var age = get_filter('age');
        $.ajax({
            url: "details/detail_customer.php",
            method: "POST",
            data: {
                action: action,
                personilty_cus: personilty_cus,
                gender:gender,
                age:age


            },
            success: function (data) {
                $('.filter_data').html(data);
            }
        });
    }); $('#lastname').keyup(function () {
        var lastname = $(this).val();
        $('.filter_data').html('<div></div>');
        var action = 'detail_customer';
        var gender = get_filter('gender');
        var age = get_filter('age');
        $.ajax({
            url: "details/detail_customer.php",
            method: "POST",
            data: {
                action: action,
                lastname: lastname,
                gender:gender,
                age:age


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

    $('.gender').click(function () {
        filter_data();
    });
    $('.age').click(function () {
        filter_data();
    });
</script>
<?php
include 'footeradmin.php';
}else{
    echo "<script>window.open('login.php','_self')</script>";

}

?>
