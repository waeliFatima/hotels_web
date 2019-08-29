<?php
/**
 * Created by PhpStorm.
 * User: Fatima
 * Date: 7/31/2019
 * Time: 11:33 PM
 */

echo "hidasfkldsf";
$con=mysqli_connect("localhost","root","","Tourism_i");

if(isset($_POST['action'])){
    $get_hotels = "  SELECT  * FROM hotels WHERE id_city='1'";
//            if(isset($_POST['five'])){
//                $get_hotels = "AND hotels.star_hotels=$_POST['five_stars']";
//            }

    if (isset($_POST['brand'])) {
        $star_filter = implode("','", $_POST['brand']);
        $get_hotels .= "AND hotels.star_hotels IN ('" . $star_filter . "')
                ";
//                $get_hotels = "AND hotels.star_hotels=$_POST['five_stars']";
    }
    $get_hotel = @mysqli_query($con, "SET NAMES utf8");
    $get_hotel = @mysqli_query($con, "SET CHARACTER SET utf8");
    $get_hotel = @mysqli_query($con, $get_hotels);
    $count_result = $get_hotel->num_rows;
    echo $count_result;

    $output='';

    while ($row_city = @mysqli_fetch_array($get_hotel)) {
        $output.='
        
        <div class="col-sm-4 col-lg-3 col-md-3">
        <div style="border:1px solid #ccc;margin-bottom: 16px;height: 450px;">
        <p>'.$row_city['name_hotel'].'</p>
</div>        
</div>
        ';
    }
    echo $output;

    }