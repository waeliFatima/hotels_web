<?php

$con = mysqli_connect("localhost", "root", "", "Tourism_i");

if (isset($_POST['action'])) {

    $get_hotels = "SELECT DISTINCT hotels.*,rooms.*,cities.* FROM hotels,rooms,cities WHERE hotels.id_city=cities.id_city AND hotels.id_hotel=rooms.id_hotel AND rooms.deaction=0 ";

    if (isset($_POST['search'])) {
        echo $_POST['search'];
        $search = $_POST['search'];
        $get_hotels .= " AND hotels.name_hotel LIKE '%" . $search . "%' ";
    }
    if (isset($_POST['star'])) {
        $star_filter = implode("','", $_POST['star']);
        $get_hotels .= " AND hotels.star_hotels=('" . $star_filter . "')
                ";
    }

    if (isset($_POST['num_adobt_person'])) {
        $num_adobt_person = implode("','", $_POST['num_adobt_person']);
        $get_hotels .= " AND rooms.num_adobt_person=('" . $num_adobt_person . "')
";
    }
    if (isset($_POST['num_child_person'])) {
        $num_child_person = implode("','", $_POST['num_child_person']);
        $get_hotels .= " AND rooms.num_child_person=('" . $num_child_person  . "')
";
    }

    if (isset($_POST['facility'])) {
        $facility = implode("','", $_POST['facility']);
        echo $facility;
//        $get_hotels .= " AND faci_and_room.id_faci=('" . $facility . "') AND rooms.id_room=faci_and_room.id_room
//    ";

    }
    if (isset($_POST['city'])) {
        $city = implode("','", $_POST['city']);
        $get_hotels .= " AND cities.city IN ('" . $city . "') AND hotels.id_city=cities.id_city
    ";

    }
    if (isset($_POST['country'])) {
        $country = implode("','", $_POST['country']);
        $get_hotels .= " AND cities.country IN ('" . $country . "') AND hotels.id_city=cities.id_city
    ";

    }
    $get_hotels.="GROUP BY rooms.id_room";
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
      <th scope="col">تعداد کودک</th>
      <th scope="col">تعداد بزرگسال </th>
      <th scope="col">امکانات</th>
      <th scope="col">بلوک</th>
      <th scope="col">شهرستان</th>
      <th scope="col">کشور</th>
      <th scope="col">نام هتل</th>
    </tr>
  </thead>
  <tbody>
   
    ';
        while ($row =mysqli_fetch_array($get_hotel)) {
            $id_rom = $row['id_room'];
            $output .= '
 <tr>
      <td style="font-size: 16px;padding: 10px">
      <a onclick="return confirm(\' آیا میخواهید   '. $row['black'].'  را حذف کنید  !\')" 
      href="roomlist.php?delete='. $row['id_room'].'" style="text-decoration: none;padding: 3px;color: red;"><i class="glyphicon glyphicon-remove"></i></a>
      <a href="roomlist.php?edit='. $row['id_room'].'" style="text-decoration: none;padding: 3px;margin: 9px"><i class="glyphicon glyphicon-pencil"></i></a>
      </td>
      <td>'. $row['num_child_person'].'</td>
      <td>'. $row['num_adobt_person'].'</td>
      <td>'. $row['id_room'].'</td>
      <td>'. $row['black'].'</td>
      <td>'. $row['city'].'</td>
      <td>'. $row['country'].'</td>
      <td>'. $row['name_hotel'].'</td>
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