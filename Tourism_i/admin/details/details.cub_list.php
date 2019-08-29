<?php

$con = mysqli_connect("localhost", "root", "", "Tourism_i");

if (isset($_POST['action'])) {
    $get_hotels = "SELECT DISTINCT train_company.*,train_cub.*,train.*,cities.* FROM train_cub,train_company,train,cities WHERE train_company.id_city=cities.id_city AND train_cub.id_train=train.id_train GROUP BY train_cub.id_cub ";

    if (isset($_POST['search'])) {
        echo $_POST['search'];
        $search = $_POST['search'];

        $get_hotels .= " AND train_company.name_com_train LIKE '%" . $search . "%' ";
    }

    if (isset($_POST['city'])) {
        $city = implode("','", $_POST['city']);
//        echo $city;
        $get_hotels .= " AND cities.city IN ('" . $city . "') AND train_company.id_city=cities.id_city
    ";

    }
    if (isset($_POST['country'])) {
        $country = implode("','", $_POST['country']);
//        echo $country;
        $get_hotels .= " AND cities.country IN ('" . $country . "') AND train_company.id_city=cities.id_city
    ";

    }

    $output = '';
    $get_hotel = @mysqli_query($con, "SET NAMES utf8");
    $get_hotel = @mysqli_query($con, "SET CHARACTER SET utf8");
    $get_hotel = @mysqli_query($con, $get_hotels);
//    $count_result = 1;
    $count_result = $get_hotel->num_rows;
//    echo $count_result;


    $output .= '
     <div style="width: 1140px;margin-right: 335px;color: #8a8893;font-size: 14px;padding: 10px">
              
    ';
    if ($count_result == 0) {
        $output .= '
        <div style="margin-left: 370px;width: 100%;">
        <img src="../public/image/fe48541.svg">
        <div style="margin-left: 130px;padding: 10px">متاسفانه نتیجه ای  یافت نشد</div>
</div>
        ';
    } else {
        $output .= '
        <table class="table table-striped" style="font-size: 14px;background-color: white">
  <thead style="color: #5f6472;padding: 10px;background-color: #dcddff">
    <tr>
      <th scope="col" style="">عملیات</th>
      <th scope="col">آدرس </th>
      <th scope="col">پست الکترونی</th>
      <th scope="col">شماره تماس</th>
      <th scope="col">شهرستان</th>
      <th scope="col">کشور</th>
      <th scope="col">نام شرکت</th>
    </tr>
  </thead>
  <tbody>
   
    ';
        while ($row =mysqli_fetch_array($get_hotel)) {
            $output .= '
 <tr>
      <td style="font-size: 16px;padding: 10px">
      <a href="#" style="text-decoration: none;padding: 3px;color: red;"><i class="glyphicon glyphicon-remove"></i></a>
      <a href="#" style="text-decoration: none;padding: 3px;margin: 9px"><i class="glyphicon glyphicon-pencil"></i></a>
      </td>
      <td>'. $row['address_com_train'].'</td>
      <td>'. $row['email_com_train'].'</td>
      <td>'. $row['phone_com_train'].'</td>
      <td>'. $row['city'].'</td>
      <td>'. $row['country'].'</td>
      <td>'. $row['name_com_train'].'</td>
    </tr>
   ';
        }
        $output.='
  </tbody>
</table>
        ';
    }
    $output .= '
    </div>';
    echo $output;
}
?>