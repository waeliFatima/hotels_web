<?php
$con = mysqli_connect("localhost", "root", "", "Tourism_i");
$qurey = "SELECT * FROM users";
$result =mysqli_query($con,$qurey);

while ($row= mysqli_fetch_array($result)){
    $subdata['id_user']=$row['id_user'];
    $subdata['id_parent']=$row['id_parent'];
    $subdata['email']=$row['email'];
    $data[] =$subdata;
}
foreach ($data as $key=>&$value){
     $output[$value['id_user']] =&$value;
}
foreach ($data as $key=>&$value){
    if($value['id_parent'] && isset($output[$value['id_parent']])) {
        $output[$value['id_parent']]['node'][] =& $value;
    }

}

foreach ($data as $key=>&$value){
    if($value['id_parent'] && isset($output[$value['id_parent']])) {
        unset($data[$key]);
    }
}
echo json_encode($data);
