<?php

// to use filter infor of hotel
$con = mysqli_connect("localhost", "root", "", "Tourism_i");

//if action happen
if (isset($_POST['action'])) {
    $date1 = $_POST['dateIn'];
    $dateIn = date("Y-m-d", strtotime($date1));
    $date2 = $_POST['dateOut'];
    $dateOut = date("Y-m-d", strtotime($date2));

    $differ_days = $_POST['differ_days'];
    $person_adobt = $_POST['person_adobt'];
    $person_child = $_POST['person_child'];
    $city = $_POST['run_cit'];

//qurey of find all hotels that have x num person and in y city
//    $get_hotels = "SELECT DISTINCT * FROM hotels,rooms WHERE hotels.id_hotel=rooms.id_hotel AND rooms.num_adobt_person='" . $_POST['person_adobt'] . "' AND rooms.num_child_person='" . $_POST['person_child'] . "' AND hotels.id_city='" . $_POST['run_cit'] . "'";
    $get_hotels = "SELECT DISTINCT * FROM hotels,rooms WHERE hotels.id_hotel=rooms.id_hotel AND hotels.deaction=0 AND rooms.deaction=0 AND rooms.num_adobt_person='" . $_POST['person_adobt'] . "' AND rooms.num_child_person='" . $_POST['person_child'] . "' AND hotels.id_city='" . $_POST['run_cit'] . "' AND rooms.id_room NOT IN(SELECT rezerve.id_room FROM rezerve WHERE rezerve.date_in BETWEEN ('" . $dateIn . "')  AND ('" . $dateOut . "') OR rezerve.date_out BETWEEN ('" . $dateIn . "')  AND ('" . $dateOut . "') ) ";
//............................................................................................
    if (isset($_POST['search'])) {
        $search = $_POST['search'];
        $get_hotels .= " AND hotels.name_hotel LIKE '%" . $search . "%' ";
    }
//.............................................................................................
    if (isset($_POST['stars'])) {
        $star_filter = implode("','", $_POST['stars']);
        $get_hotels .= " AND hotels.star_hotels IN ('" . $star_filter . "')
                ";
    }
//..............................................................................................
    if (isset($_POST['kind_of_hotel'])) {
        $kind_of_hotel_filter = implode("','", $_POST['kind_of_hotel']);
        $get_hotels .= " AND hotels.kind_of_hotel IN ('" . $kind_of_hotel_filter . "')
                ";
    }
// that code for find price between some range
    //............................................................................................
    if (isset($_POST['price'])) {
        $price = implode(",", $_POST['price']);
        $str_arr = preg_split("/\-/", $price);
        $f = (int)$str_arr[0];
        $n = (int)$str_arr[1];
        $get_hotels .= " AND ( price BETWEEN ('" . $f . "') and  ('" . $n . "')
             ";//------------------------------------------------------
        if (substr_count($price, ",") >= 1) {
            $str_arrs = preg_split("/\,/", $price);
            $tow = $str_arrs[1];

            $than = preg_split("/\-/", $str_arrs[1]);
            $t = (int)$than[0];
            $o = (int)$than[1];
            $get_hotels .= "OR price BETWEEN ('" . $t . "') and  ('" . $o . "')
             ";//-------------------------------------------------------
        }
        if (substr_count($price, ",") >= 2) {

            $str_arrss = preg_split("/\,/", $price);
            $tows = $str_arrss[2];
            $thans = preg_split("/\-/", $tows);
            $ts = (int)$thans[0];
            $os = (int)$thans[1];
            $get_hotels .= "OR price BETWEEN ('" . $ts . "') and  ('" . $os . "')
             ";//-------------------------------------------------------
        }
        if (substr_count($price, ",") >= 3) {
            $str_arrss = preg_split("/\,/", $price);
            $tows = $str_arrss[3];
            $thans = preg_split("/\-/", $tows);
            $ts = (int)$thans[0];
            $os = (int)$thans[1];
            $get_hotels .= "OR price BETWEEN ('" . $ts . "') and  ('" . $os . "')
             ";//--------------------------------------------------------
        }
        if (substr_count($price, ",") > 4) {
            $str_arrss = preg_split("/\,/", $price);
            $tows = $str_arrss[4];
            $thans = preg_split("/\-/", $tows);
            $ts = (int)$thans[0];
            $os = (int)$thans[1];
            $get_hotels .= "OR price BETWEEN ('" . $ts . "') and  ('" . $os . "')
             ";//-------------------------------------------------------
        }


        $get_hotels .= " )";

    }
//............................................................................................................finished price

    if (isset($_POST['store'])) {
        $store = implode("','", $_POST['store']);
        if ($store == 'exil') {
            $get_hotels .= "ORDER by hotels.star_hotels DESC  ;
        
                ";//------------------------------------------
        } elseif ($store == 'most_price') {
            $get_hotels .= "ORDER by rooms.price DESC  ;
        
                ";//------------------------------------------
        } elseif ($store == 'min_price') {
            $get_hotels .= "ORDER by rooms.price ASC  ;
        
                ";//------------------------------------------
        }
    }
//    $get_hotels.="GROUP BY hotels.id_hotel";
    $output = '';

    $get_hotel = @mysqli_query($con, "SET NAMES utf8");
    $get_hotel = @mysqli_query($con, "SET CHARACTER SET utf8");
    $get_hotel = @mysqli_query($con, $get_hotels);
    $count_result = $get_hotel->num_rows;
    $cityn = mysqli_query($con, "SELECT * FROM `cities` WHERE id_city =$city");
    $cm = mysqli_fetch_assoc($cityn);
    $ci = $cm['city'];

//.....................................................................................................................
    //that code is for showing map
    $output .= '
<div class="modal fade map-modal" id="map-modal" role="dialog" tabindex="-1" aria-hidden="true" style="margin-top: 50px">
   <div class="modal-dialog modal-lg">
       <div class="modal-content">
           <div class="modal-header">
               <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
          
           </div>
                <div class="modal-body">
                    <div class="container-fluid" style="height: 400px">
                           <div style="float:left; width: 100%;height: 400px">
                                 <iframe style="width: 100%;height: 400px" id="gmap_canvas"
                                    src="https://www.google.com.qa/maps/d/embed?mid=1lraKeDHRBbIV0ZmekzXQvwVd-BAqp2a0"
                                    frameborder="0"
                                    scrolling="no" marginheight="0" marginwidth="0">

                                     </iframe>
                                    </div>
                           </div>
                    </div>
                </div>
            </div>
        </div>

     <div style="float: right; margin-right: 100px;width: 800px;font-size: 14px">
            <div style="color: #8f8b8b;font-size: 20px;margin-bottom: 10px">
                <div style="float: right;margin-right: 2%"> ' . $count_result . '
                    <span>هتل در ' . $ci . ' یافته شده</span>
                </div>
                 </div>

   
    ';
    //..............................................................................................................................
    if ($count_result == 0) {
        $output .= '
           <div style="margin-left: 370px;width: 100%;">
        <img src="../public/image/fe48541.svg">
        <div style="">متاسفانه نتیجه ای  یافت نشد</div>
        ';
    }
    while ($row_hotel = @mysqli_fetch_array($get_hotel)) {
//--------------------------------------------------------------
        $output .= '
        <form action="hotels/details_hotel.php">
<input type="hidden" value=' . $row_hotel['id_room'] . '>
                   <div style="padding: 4px">

                <div class="main2 inline-block">

                    <div class="container" style="width: 860px;margin: auto;padding: 5px;">
                        <div class="panel panel-primary" style="margin-top: 30px">
                            <div class="panel-body">

                                <div>
                                    <div class="form" style="margin: 2px">
                                        <div style="float: left; margin: auto;">
                                            <div style="margin-left: 13px;">
                                                <a id="map" onclick="mapshow(' . $row_hotel['id_hotel'] . ')"
                                                   style="color: #1e90ff;font-size: 16px;	text-decoration: none;">نمایش          
                                                                                                                             روی نقشه <i class="glyphicon glyphicon-map-marker"></i></a>                                              
                                                                                      <div style="font-size: 16px;color: #adabb7">
  
                                        <input type="hidden" class="id_hotel" value="' . $row_hotel['id_hotel'] . '" id="id_hotel" name="id_hotel">
                                        <input type="hidden" class="rooms" value="' . $row_hotel['id_room'] . '" id="id_room" name="id_room">
                                        <input type="hidden" class="rooms" value="' . $dateIn . '" id="dateIn" name="dateIn">
                                        <input type="hidden" class="rooms" value="' . $dateOut . '" id="dateOut" name="dateOut">
                                        <input type="hidden" class="rooms" value="' . $person_adobt . '" id="person_adobt" name="person_adobt">
                                        <input type="hidden" class="rooms" value="' . $person_child . '" id="person_child" name="person_child">
                                        <input type="hidden" class="rooms" value="' . $row_hotel['price'] . '" id="price" name="price">
 

</div>

  
                                                <div style="margin-bottom: 100px;"></div>
                                                <hr style="width: 300px">
                                                <div><span style="color: #8c848c"> شروع  برای ' . $differ_days . ' شب از <span
                                                            style="color: #1e90ff;font-size: 20px"> ' . $row_hotel['price'] * $differ_days . '
                                                            ریال</span></span>
                                                    <button  type="submit" style="background-color:#1e90ff ;border: none;width: 170px;height: 35px;font-size: 16px;color: white" name="submit_d_ho" id="submit_d_ho">مشاهد اتاق های موجود</button>
                                                 </div>
                                            </div>
                                        </div>
                                        <div style="float: right">
                                            <img src="../public/image/image_hotel_front/' . $row_hotel['photo_hotel'] . '"
                                                 align="middle" width="210" height="160"
                                                 style="float:right; margin:10px"/>
                                        </div>
                                        <div style="margin: auto;float:right;">
                                            <h4 style="color: #56555b">
                                                <span>' . $row_hotel['name_hotel'] . '</span>
                                            </h4>
                                             <label style="font-size: 12px;height: 20px;width: 20px;color: #ffffff;background-color: #4b4b4b;"> 7 </label>
                                                <label style="margin-left: 10px"> | </label>
                                             ';
        $rest_star = 5 - $row_hotel['star_hotels'];
        $stars_hotel = $row_hotel['star_hotels'];
        for ($i = 0; $i < $rest_star; $i++) {
            $output .= '
                                                       <span class="fa fa-star"></span>';
        }
        for ($i = 0; $i < $stars_hotel; $i++) {
            $output .= '
                                                       <span class="fa fa-star checked_star"></span>
                                                       ';

        }//..................................................................................................................
        $output .= '
                                                                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
     </form>

                       ';
    }
    echo $output;
}
//......................................................................................................................................
?>
<script>
    function mapshow(id) {
        var data = {"id": id};
        $.ajax({
            url: 'hotels/map.php',
            method: "post",
            data: data,
            success: function (data) {

                $('.map-modal').modal('toggle');
            },
            error: function () {
                alert("خطا رخ داده است !");
            }
        });
    }


</script>
