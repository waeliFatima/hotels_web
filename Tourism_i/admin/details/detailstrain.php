<?php

$con = mysqli_connect("localhost", "root", "", "Tourism_i");

if (isset($_POST['action'])) {
    $get_hotels = "SELECT DISTINCT train_company.*,train.* FROM train,train_company WHERE train.id_com_train=train_company.id_com_train ";

    if (isset($_POST['search'])) {
        echo $_POST['search'];
        $search = $_POST['search'];

        $get_hotels .= " AND train_company.name_com_train LIKE '%" . $search . "%' ";
    }

    if (isset($_POST['stars'])) {
        $stars = implode("','", $_POST['stars']);
//        echo $city;
        $get_hotels .= " AND train.stars IN ('" . $stars . "') 
    ";

    }
    if (isset($_POST['secer_num_train'])) {
        $secer_num_train = implode("','", $_POST['secer_num_train']);
//        echo $country;
        $get_hotels .= " AND train.secer_num_train IN ('" . $secer_num_train . "') 
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
      <th scope="col">تعداد ستاره ها</th>
      <th scope="col">شماره قطار</th>
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
      <td>'. $row['secer_num_train'].'</td>
      <td>'. $row['stars'].'</td>
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