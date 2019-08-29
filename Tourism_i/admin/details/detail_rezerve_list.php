<?php
$con = mysqli_connect("localhost", "root", "", "Tourism_i");

if(isset($_POST['action'])) {
    $reserve = "SELECT rezerve.*,rezerve_and_costomer.*,customers.*,rooms.id_room,rooms.black,hotels.id_hotel,hotels.id_city,hotels.name_hotel,users.*,cities.id_city,cities.city FROM cities,hotels,rezerve_and_costomer,rezerve,customers,users,rooms WHERE  cities.id_city=hotels.id_city AND rezerve.id_rez=rezerve_and_costomer.id_rezerve AND users.id_user=rezerve.id_user AND rezerve_and_costomer.id_costomer=customers.id_customers AND rooms.id_room=rezerve.id_room AND hotels.id_hotel=rezerve.id_hotel AND rezerve.refid='1'";


    if (isset($_POST['search'])) {
        $search = $_POST['search'];

        $reserve .= "AND hotels.name_hotel LIKE '%" . $search . "%' ";
    }
    if (isset($_POST['datepicker'])) {
        $search = date("Y-m-d", strtotime($_POST['datepicker']));
        $reserve .= "AND rezerve.date_payment LIKE '%" . $search . "%' ";
    }
    if (isset($_POST['id_payment'])) {
        $search = $_POST['id_payment'];
        $reserve .= "AND rezerve.id_rez LIKE '%" . $search . "%' ";
    }
    if (isset($_POST['user'])) {
        $search = $_POST['user'];
        $reserve .= "AND users.email LIKE '%" . $search . "%' ";
    }
    if (isset($_POST['price'])) {
        $search = $_POST['price'];
        $reserve .= "AND rezerve.price LIKE '%" . $search . "%' ";
    }
    if (isset($_POST['date_in'])) {
        $search = date("Y-m-d", strtotime($_POST['date_in']));
        $reserve .= "AND rezerve.date_in LIKE '%" . $search . "%' ";
    }
    if (isset($_POST['date_out'])) {
        $search = date("Y-m-d", strtotime($_POST['date_out']));
        $reserve .= "AND rezerve.date_out LIKE '%" . $search . "%' ";
    }
    $reserve .= "GROUP by rezerve.id_rez";


    $reserves = @mysqli_query($con, "SET NAMES utf8");
    $reserves = @mysqli_query($con, "SET CHARACTER SET utf8");
    $reserves = @mysqli_query($con, $reserve);
    $count_result = $reserves->num_rows;


    if ($count_result == 0) {
        ?>
        <div style="margin-left: 30px;width: 100%;">
            <img src="../public/image/fe48541.svg">
            <div style="padding: 10px">متاسفانه نتیجه ای یافت نشد</div>
        </div>
        <?php
    } else {
        ?>
        <div style="width: 800px;margin-left: 8%;text-align: center;color: #504e58;font-size: 14px" dir="rtl">
            <?php while ($row = mysqli_fetch_array($reserves)) {
                ?>
                <div style="width:800px;height:auto;background-color: white;text-align: center">
                    <div style="background-color: #fffa74;font-size: 14px;padding: 11px;color: black">
                        <span style="margin: 11px">شماره رزور : <?= $row['id_rez'] ?></span>
                        <span style="margin: 11px">توسط کاربر  :<?= $row['email'] ?></span>
                        <span style="margin: 11px"> تاریخ رزور :<?= $row['date_payment'] ?></span>
                        <span style="margin: 11px">هتل :<?= $row['name_hotel'] ?> </span>
                        <div style="margin: 10px"></div>
                        <span style="margin: 11px">شهر هتل :<?= $row['city'] ?> </span>
                        <span style="margin: 11px">اتاق :<?= $row['black'] ?></span>
                        <span style="margin: 11px">تاریخ ورود :<?= $row['date_in'] ?></span>
                        <span style="margin: 11px">تاریخ خروج :<?= $row['date_out'] ?></span>
                        <span style="margin: 11px">مبلغ پرداخت شده :<?= $row['price'] ?></span>
                    </div>
                    <?php
                    $id_payment = $row['id_rez'];
                    $payment = "SELECT customers.*,rezerve_and_costomer.* FROM customers,rezerve_and_costomer WHERE customers.id_customers=rezerve_and_costomer.id_costomer AND rezerve_and_costomer.id_rezerve='$id_payment'";
                    $payments = @mysqli_query($con, "SET NAMES utf8");
                    $payments = @mysqli_query($con, "SET CHARACTER SET utf8");
                    $payments = @mysqli_query($con, $payment);
                    while ($ros = mysqli_fetch_array($payments)) {
                        ?>

                        <div style="padding: 17px;text-align: right">
                            <span> مسافر : <?= $ros['age'] ?> : <?= $ros['gender'] ?>
                                : <?= $ros['first_name_cus'] ?>  <?= $ros['last_name_cus'] ?> </span>
                            <span style="margin: 29px"> شماره ملی  : <?= $ros['personilty_cus'] ?> </span><span> شماره همراه  :<?= $ros['phone'] ?></span>
                        </div>
                        <div style="margin: 8px;color: white">`</div>
                        <hr>
                        <?php
                    }
                    ?>
                    <div style="margin: 10px;color: white">`</div>
                </div>

                <?php
            }
            ?>
        </div>
        <?php
    }
}
?>