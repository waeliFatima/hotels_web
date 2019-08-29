<?php

$con = mysqli_connect("localhost", "root", "", "Tourism_i");

if (isset($_POST['action'])) {

    $get_hotels = "SELECT DISTINCT hotels.*,cities.city,cities.country FROM hotels,cities WHERE hotels.id_city=cities.id_city AND hotels.deaction=0 ";

    if (isset($_POST['search'])) {
        $search = $_POST['search'];

        $get_hotels .= "AND hotels.name_hotel LIKE '%" . $search . "%' ";
    }
    if (isset($_POST['star'])) {
        $star_filter = implode("','", $_POST['star']);
        $get_hotels .= "AND hotels.star_hotels=('" . $star_filter . "')
                ";
    }

    if (isset($_POST['kind'])) {
        $kind_of_hotel_filter = implode("','", $_POST['kind']);
        $get_hotels .= "AND hotels.kind_of_hotel IN ('" . $kind_of_hotel_filter . "')
";
    }


    if (isset($_POST['facility'])) {
        $facility = implode("','", $_POST['facility']);
//        $get_hotels .= "AND faci_and_hotel.id_faci IN ('" . $facility . "') AND hotels.id_hotel=faci_and_hotel.id_hotel
//    ";

    }
    if (isset($_POST['city'])) {
        $city = implode("','", $_POST['city']);
        $get_hotels .= "AND cities.city IN ('" . $city . "') AND hotels.id_city=cities.id_city
    ";

    }
    if (isset($_POST['country'])) {
        $country = implode("','", $_POST['country']);
        $get_hotels .= "AND cities.country IN ('" . $country . "') AND hotels.id_city=cities.id_city
    ";

    }
    $get_hotels.=" GROUP BY hotels.id_hotel";
    $output = '';
    $get_hotel = @mysqli_query($con, "SET NAMES utf8");
    $get_hotel = @mysqli_query($con, "SET CHARACTER SET utf8");
    $get_hotel = @mysqli_query($con, $get_hotels);
    $count_result = $get_hotel->num_rows;


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
      <th scope="col">آدرس ایمیل</th>
      <th scope="col">شماره ارتباط</th>
      <th scope="col">نوع اقامتگاه</th>
      <th scope="col">تعداد ستاره ها</th>
      <th scope="col">شهرستان</th>
      <th scope="col">کشور</th>
      <th scope="col">نام هتل</th>
      <th scope="col">#</th>
    </tr>
  </thead>
  <tbody>
   
    ';
        $i=1;
        while ($row =mysqli_fetch_array($get_hotel)) {
            $output .= '
 <tr>
      <td style="font-size: 16px;padding: 10px">
      <a onclick="return confirm(\' آیا میخواهید   '. $row['name_hotel'].'  را حذف کنید  !\')"    
       href="hotellist.php?delete='. $row['id_hotel'].'" style="text-decoration: none;padding: 3px;color: red;"><i class="glyphicon glyphicon-remove"></i></a>
      <a  href="hotellist.php?edit='. $row['id_hotel'].'" style="text-decoration: none;padding: 3px;margin: 9px"><i class="glyphicon glyphicon-pencil"></i></a>
      </td>
      <td>'. $row['email_hotel'].'</td>
      <td>'. $row['phone_hotel'].'</td>
      <td>'. $row['kind_of_hotel'].'</td>
      <td>'. $row['star_hotels'].'</td>
      <td>'. $row['city'].'</td>
      <td>'. $row['country'].'</td>
      <td>'. $row['name_hotel'].'</td>
      <td>'. $i.'</td>
    </tr>
   ';
        $i++;
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