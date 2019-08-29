<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
<!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css'
          integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>



</head>
<body>
<?php
$con=mysqli_connect("localhost","root","","Tourism_i");

?>



<?php
//$to       = 'fatiagaingit@gmail.com';
//$subject  = 'fatiagaingit@gmail.com';
//$message  = 'hi,jahangir pachkam ';
//$headers  = 'From: fatiagaingit@gmail.com' . "\r\n" .
//    'MIME-Version: 1.0' . "\r\n" .
//    'Content-type: text/html; charset=utf-8';
//if(mail($to, $subject, $message, $headers))
//    echo "Email sent";
//else
//    echo "Email sending failed";
?>
<!--<form>-->
<!--<div class="container">-->
<!--    <div class="row">-->
<!--        <br>-->
<!--        <h2 align="center">product x </h2>-->
<!--        <br>-->
<!--        <div class="col-md-3">-->
<!--            <div class="list-group">-->
<!--                <h3>price</h3>-->
<!--                --><?php
//                $num_of_stars = "SELECT DISTINCT hotels.star_hotels FROM hotels WHERE hotels.id_city=1  ORDER BY hotels.star_hotels DESC ";
//                $num_of_star = @mysqli_query($con, "SET NAMES utf8");
//                $num_of_star = @mysqli_query($con, "SET CHARACTER SET utf8");
//                $num_of_star = @mysqli_query($con, $num_of_stars);
////                $statment = $con->prepare($num_of_stars);
////                $statment->execute();
////                $result = $statment->fetchAll();
////                foreach($result as $row)
//                while ($row_of_stars = @mysqli_fetch_array($num_of_star))
//                    //                    $glod_star = $row_of_stars['star_hotels'];
//                    //                    $rest_sta = 5 - $glod_star;
//                    {
//                        ?>
<!--                        <div class="list-group-item checkbox">-->
<!--                            <label>-->
<!--                                <input type="checkbox" class="common_selector brand"-->
<!--                                       value="--><?//= $row_of_stars['star_hotels'] ?><!--">-->
<!--                                --><?//= $row_of_stars['star_hotels'] ?>
<!--                            </label>-->
<!--                        </div>-->
<!---->
<!--                        --><?php
//                    }
//
////
////                }
//                ?>
<!--            </div>-->
<!--        </div>-->
<!---->
<!--        <div class="col-md-9">-->
<!--            <br>-->
<!--            <div class="row filter_data">-->
<!---->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--</form>-->
<!--<style>-->
<!--    #louding{-->
<!--        text-align: center;-->
<!--        height: 150px;-->
<!--    }-->
<!--</style>-->
<!--<script>-->
<!--     filter_data();-->
<!--        function filter_data() {-->
<!--            $('.filter_data').html('<div></div>');-->
<!--            var action = 'fetch_data';-->
<!--            var brand = get_filter('brand');-->
<!--            $.ajax({-->
<!--                url:"fetch_data.php",-->
<!--                method:"POST",-->
<!--                data:{action:action,brand:brand},-->
<!--                    success:function (data) {-->
<!--                        $('.filter_data').html(data);-->
<!--                    }-->
<!--            });-->
<!--        }-->
<!--        function get_filter(class_name) {-->
<!--            var filter = [];-->
<!--            $('.'+class_name+':checked').each(function () {-->
<!--                filter.push($(this).val());-->
<!--            });-->
<!--            return filter;-->
<!--        }-->
<!---->
<!---->
<!---->
<!--</script>-->
</body>
</html>