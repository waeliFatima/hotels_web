<?php

$con = mysqli_connect("localhost", "root", "", "Tourism_i");

if (isset($_POST['action'])) {
    $get_users = "SELECT customers.*, users.id_user,users.email,user_customer.* FROM customers,user_customer,users WHERE customers.id_customers=user_customer.id_customer AND user_customer.id_user=users.id_user ";

    if (isset($_POST['search'])) {
        $search = $_POST['search'];
//        echo $search;
        $get_users .= " AND users.email LIKE '%" . $search . "%' ";
    }
    if (isset($_POST['personilty_cus'])) {
        $search1 = $_POST['personilty_cus'];
//        echo $search1;
        $get_users .= " AND customers.personilty_cus LIKE '%" . $search1 . "%' ";
    }
    if (isset($_POST['phone'])) {
        $search2 = $_POST['phone'];
//        echo $search2;
        $get_users .= " AND customers.phone LIKE '%" . $search2 . "%' ";
    }
    if (isset($_POST['lastname'])) {
        $search2 = $_POST['lastname'];
//        echo $search2;
        $get_users .= " AND customers.last_name_cus LIKE '%" . $search2 . "%' ";
    }
    if (isset($_POST['gender'])) {
//        $country = implode("','", $_POST['country']);
        $search3 = implode("','", $_POST['gender']);
//        echo $search2;
        $get_users .= " AND customers.gender  IN ('" . $search3 . "') ";

    }
    if (isset($_POST['age'])) {
//        $country = implode("','", $_POST['country']);
        $search3 = implode("','", $_POST['age']);
//        echo $search2;
        $get_users .= " AND customers.age IN ('" . $search3 . "') ";

    }
    $get_users .= "GROUP BY customers.id_customers";
    $output = '';
    $get_user = @mysqli_query($con, "SET NAMES utf8");
    $get_user = @mysqli_query($con, "SET CHARACTER SET utf8");
    $get_user = @mysqli_query($con, $get_users);
    $count_result = $get_user->num_rows;
//    echo $count_result;

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
      <th scope="col">جنسیت </th>
      <th scope="col">سن  </th>
      <th scope="col">کد ملی </th>
      <th scope="col">شماره تماس</th>
      <th scope="col">نام خانوادکی مسافر</th>
      <th scope="col">نام مسافر</th>
      <th scope="col">کاربر </th>
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
    
      <td>' . $row['gender'] . '</td>
      <td>' . $row['age'] . '</td>
      <td>' . $row['personilty_cus'] . '</td>
      <td>' . $row['phone'] . '</td>
      <td>' . $row['last_name_cus'] . '</td>
      <td>' . $row['first_name_cus'] . '</td>
      <td>' . $row['email'] . '</td>
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