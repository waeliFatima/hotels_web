<?php
$con = mysqli_connect("localhost", "root", "", "test1");
$con->set_charset("utf8");

$filename = 'backup.sql';
$handle = fopen($filename,"r+");
$contents = fread($handle,filesize($filename));

$sql = explode(';',$contents);
foreach ($sql as $query){
    $result = mysqli_query($con,$query);
    if($result){
        echo '<tr><td><br></td></tr>';
       echo '<tr><td>'.$query.'<br>SUCCESS</td></tr>';
       echo '<tr><td><br></td></tr>';

    }
}
fclose($handle);
echo "Successfully imported";

