<?php

$con = mysqli_connect("localhost", "root", "", "Tourism_i");

if (isset($_POST['action'])) {
//    $get_users = "SELECT t1.* FROM
//users AS t1 LEFT JOIN users as t2
//ON t1.id_user = t2.id_parent
//WHERE t1.id_parent= 1 )";
    $get_users ="SELECT * FROM `users` WHERE id_user NOT IN (1) AND id_user NOT IN (2)";

    if (isset($_POST['search'])) {
        $search = $_POST['search'];
        $get_users .= " AND email LIKE '%" . $search . "%' ";
    }
    if (isset($_POST['search1'])) {
        $search1 = $_POST['search1'];
        $get_users .= " AND personailynum LIKE '%" . $search1 . "%' ";
    }
    if (isset($_POST['search2'])) {
        $search2 = $_POST['search2'];
        $get_users .= " AND lastname LIKE '%" . $search2 . "%' ";
    }
 if (isset($_POST['phone'])) {
     $search2 = $_POST['phone'];
        echo $search2;
     $get_users .= " AND phone LIKE '%" . $search2 . "%' ";
 }

    $output = '';
    $get_user = @mysqli_query($con, "SET NAMES utf8");
    $get_user = @mysqli_query($con, "SET CHARACTER SET utf8");
    $get_user = @mysqli_query($con, $get_users);
    $count_result = $get_user->num_rows;
?>

    <style>
        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu .dropdown-menu {
            top: 0;
            left: 100%;
            margin-top: -1px;
        }
    </style>
    <body>

    <?php
    $output .= '
     <div style="width: 1140px;margin-right: 335px;color: #8a8893;font-size: 14px;padding: 10px;">
              
    ';
    if ($count_result == 0) {
        $output .= '
        <div style="margin-left: -343px;width: 100%;">
        <img src="../public/image/fe48541.svg">
        <div style="margin-left: 130px;padding: 10px">متاسفانه نتیجه ای  یافت نشد</div>
</div>
        ';
    } else {
        $output .= '
        <table class="table table-striped" style="font-size: 14px;background-color: white">
  <thead style="color: #5f6472;padding: 10px;background-color: #dcddff">
    <tr>
      <th scope="col" style="">#</th>
      <th scope="col">کد ملی </th>
      <th scope="col">جنسیت </th>
      <th scope="col">تاریخ تولد </th>
      <th scope="col">شماره تماس</th>
      <th scope="col">ایمیل</th>
      <th scope="col">نام خوادکی</th>
      <th scope="col">نام </th>
    </tr>
  </thead>
  <tbody>
   
    ';
        $i=1;
        while ($row = mysqli_fetch_array($get_user)) {
//            $id_rom = $row['id_room'];
            $output .= '
 <tr>
      <td style="font-size: 16px;padding: 10px">
      '. $i .'
      </td>
      <td>' . $row['personailynum'] . '</td>
      <td>' . $row['gender'] . '</td>
      <td>' . $row['birhtdy'] . '</td>
      <td>' . $row['phone'] . '</td>
      <td>' . $row['email'] . '</td>
      <td>' . $row['lastname'] . '</td>
      <td>' . $row['firstname'] . '</td>
    </tr>
   ';
            $i++;
        }
        $output .= '
  </tbody>
</table>
        ';
    }
    $output .= '
    </div>';
    echo $output;
}

//      <a onclick="return confirm(\' آیا میخواهید   ' . $row['email'] . '  را حذف کنید  !\')"
//      href="users_list.php?delete=' . $row['id_user'] . '" style="text-decoration: none;padding: 3px;color: red;"><i class="glyphicon glyphicon-remove"></i></a>