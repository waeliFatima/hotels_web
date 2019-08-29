<?php
//Class dbObj{
//    /* Database connection start */
//    var $dbhost = "localhost";
//    var $username = "root";
//    var $password = "";
//    var $dbname = "Tourism_i";
//    var $conn;
//    function getConnstring() {
//        $con = mysqli_connect($this->dbhost, $this->username, $this->password, $this->dbname) or die("Connection failed: " . mysqli_connect_error());
//
//        /* check connection */
//        if (mysqli_connect_errno()) {
//            printf("Connect failed: %s\n", mysqli_connect_error());
//            exit();
//        } else {
//            $this->conn = $con;
//        }
//        return $this->conn;
//    }
//}
//
//
//
//
//
//
//
//
//
////include connection file
//include_once('fpdf181/fpdf.php');
//
//class PDF extends FPDF
//{
//// Page header
//    function Header()
//    {
//        // Logo
//        $this->Image('logo.png',10,-1,70);
//        $this->SetFont('Arial','B',13);
//        // Move to the right
//        $this->Cell(80);
//        // Title
//        $this->Cell(80,10,'Employee List',1,0,'C');
//        // Line break
//        $this->Ln(20);
//    }
//
//// Page footer
//    function Footer()
//    {
//        // Position at 1.5 cm from bottom
//        $this->SetY(-15);
//        // Arial italic 8
//        $this->SetFont('Arial','I',8);
//        // Page number
//        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
//    }
//}
//
//$db = new dbObj();
//$connString =  $db->getConnstring();
//$display_heading = array('id'=>'ID', 'employee_name'=> 'Name', 'employee_age'=> 'Age','employee_salary'=> 'Salary',);
//
//$result = mysqli_query($connString, "SELECT id, employee_name, employee_age, employee_salary FROM employee") or die("database error:". mysqli_error($connString));
//$header = mysqli_query($connString, "SHOW columns FROM employee");
//
//$pdf = new PDF();
////header
//$pdf->AddPage();
////foter page
//$pdf->AliasNbPages();
//$pdf->SetFont('Arial','B',12);
//foreach($header as $heading) {
//    $pdf->Cell(40,12,$display_heading[$heading['Field']],1);
//}
//foreach($result as $row) {
//    $pdf->Ln();
//    foreach($row as $column)
//        $pdf->Cell(40,12,$column,1);
//}
//$pdf->Output();
//?>

<?php
//
//require_once('fpdf181/fpdf.php');
//class PDF extends FPDF
//{
//// Page header
//    function Header()
//    {
//        // Logo
////        $this->Image('logo.png',10,6);
////        $this->SetFont('Arial','B',14);
//        // Move to the right
//        $this->Cell(255,5,'EMPLOY DOYMENT',0,0,'C');
//        // Title
//        $this->Ln();
////        $this->SetFont('Times','',14);
//
//        $this->Cell(225,10,'Employee List',1,0,'C');
//        // Line break
//        $this->Ln(20);
//    }
//
//// Page footer
//    function Footer()
//    {
//        // Position at 1.5 cm from bottom
//        $this->SetY(-15);
//        // Arial italic 8
////        $this->SetFont('Arial','',8);
//        // Page number
//        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
//    }
//}
//
////$db = new dbObj();
////$connString =  $db->getConnstring();
////$display_heading = array('id'=>'ID', 'employee_name'=> 'Name', 'employee_age'=> 'Age','employee_salary'=> 'Salary',);
////
////$result = mysqli_query($connString, "SELECT id, employee_name, employee_age, employee_salary FROM employee") or die("database error:". mysqli_error($connString));
////$header = mysqli_query($connString, "SHOW columns FROM employee");
//
//$pdf = new PDF();
////header
//$pdf->AddPage();
////foter page
//$pdf->AliasNbPages();
////$pdf->SetFont('Arial','B',12);
//$pdf->addPage('L','A4',0);
////foreach($header as $heading) {
////    $pdf->Cell(40,12,$display_heading[$heading['Field']],1);
////}
////foreach($result as $row) {
////    $pdf->Ln();
////    foreach($row as $column)
////        $pdf->Cell(40,12,$column,1);
////}
//$pdf->Output();
//?>
<?php
require_once('fpdf18/fpdf.php');

Class dbObj
{
    /* Database connection start */
    var $dbhost = "localhost";
    var $username = "root";
    var $password = "";
    var $dbname = "Tourism_i";
    var $conn;

    function getConnstring()
    {
        $con = mysqli_connect("localhost", "root", "", "Tourism_i");
        $con->set_charset("utf8");
//        set_charset('utf8', $con);
        header("Content-Type: text/html;charset=UTF-8");


        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        } else {
            $this->conn = $con;
        }
        return $this->conn;
    }


}

class PDF extends FPDF
{
// Page header
    function Header()
    {
        // Logo
//        $this->Image('logo.png',10,-1,70);
        $this->SetFont('Arial','B',13);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(80,10,'List',1,0,'C');
        // Line break
        $this->Ln(20);
    }

// Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

$db = new dbObj();
$connString =  $db->getConnstring();
$get_user = @mysqli_query($con, "SET NAMES utf8");
$get_user = @mysqli_query($con, "SET CHARACTER SET utf8");
$get_user = @mysqli_query($con, $connString);
//$display_heading = array('id_user'=>'ID', 'id_parent'=> 'Name', 'email'=> 'Age','phone'=> 'Salary',);


$display_heading = array('id_user'=>'id_user', 'id_parent'=> 'id_parent', 'email'=> 'email','phone'=> 'phone','password'=> 'password', 'firstname'=> 'firstname','lastname'=> 'lastname','homephone'=> 'homephone', 'personailynum'=> 'personailynum','shabnumcart'=> 'shabnumcart','gender'=> 'gender','birhtdy'=> 'birhtdy', 'numcirditcart'=> 'numcirditcart','numcountcart'=> 'numcountcart');
$display_heading3 = array('id_hotel'=>'id_hotel', 'name_hotel'=> 'name_hotel', 'photo_hotel'=> 'photo_hotel','phone_hotel'=> 'phone_hotel','email_hotel'=> 'email_hotel', 'address'=> 'address','logo'=> 'logo','kind_of_hotel'=> 'kind_of_hotel', 'star_hotels'=> 'star_hotels','id_city'=> 'id_city','discription_hotels'=> 'discription_hotels','map'=> 'map', 'deaction'=> 'deaction');
$display_heading2 = array('id_rez'=>'id_rez', 'id_user'=> 'id_user', 'id_room'=> 'id_room','id_hotel'=> 'id_hotel','date_in'=> 'date_in', 'date_out'=> 'date_out','date_payment'=> 'date_payment','price'=> 'price', 'authority'=> 'authority','refid'=> 'refid');
$display_heading4 = array('id_room'=>'id_room', 'black'=> 'black', 'price'=> 'price','id_hotel'=> 'id_hotel','num_adobt_person'=> 'num_adobt_person', 'num_child_person'=> 'num_child_person','discription'=> 'discription','image'=> 'image', 'deaction'=> 'deaction');
//$display_heading = array('id_user'=>'id_user', 'id_parent'=> 'id_parent', 'email'=> 'email','phone'=> 'phone','password'=> 'password', 'firstname'=> 'firstname','lastname'=> 'lastname','homephone'=> 'homephone', 'personailynum'=> 'personailynum','shabnumcart'=> 'shabnumcart');
//
$result = mysqli_query($connString, "SELECT `id_user`, `id_parent`, `email`, `phone`,`password`,`firstname`,`lastname`,`homephone`,`personailynum`, `gender`,`shabnumcart`,`birhtdy`,`numcirditcart`,`numcountcart`  FROM `users` WHERE 1") ;

$result2 = mysqli_query($connString, "SELECT `id_rez`, `id_user`, `id_room`, `id_hotel`, `date_in`, `date_out`, `date_payment`, `price`, `authority`, `refid` FROM `rezerve` WHERE 1") or die("database error:". mysqli_error($connString));

$result3 = mysqli_query($connString, "SELECT `id_hotel`, `name_hotel`, `photo_hotel`, `phone_hotel`, `email_hotel`, `address`, `logo`, `kind_of_hotel`, `star_hotels`, `id_city`, `discription_hotels`, `map`, `deaction` FROM `hotels` WHERE 1") or die("database error:". mysqli_error($connString));
$result4 = mysqli_query($connString, "SELECT `id_room`, `black`, `price`, `id_hotel`, `num_adobt_person`, `num_child_person`, `discription`, `image`, `deaction` FROM `rooms` WHERE 1") or die("database error:". mysqli_error($connString));


//$result = mysqli_query($connString, "SELECT `id_user`, `id_parent`, `email`, `phone` FROM `users` WHERE 1") or die("database error:". mysqli_error($connString));
$header = mysqli_query($connString, "SHOW columns FROM employee");
$header2 = mysqli_query($connString, "SHOW columns FROM employee");
$header3 = mysqli_query($connString, "SHOW columns FROM employee");
$header4 = mysqli_query($connString, "SHOW columns FROM employee");

$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',8);
if(isset($_GET['ue'])) {
foreach($header as $heading) {
    $pdf->Cell(14,12,$display_heading[$heading['Field']],1);
}
foreach($result as $row) {
    $pdf->Ln();
    foreach($row as $column)
        $pdf->Cell(14,12,$column,1);
}
}
if(isset($_GET['re'])) {

    foreach ($header2 as $heading) {
        $pdf->Cell(19, 12, $display_heading[$heading['Field']], 1);
    }
    foreach ($result2 as $row) {
        $pdf->Ln();
        foreach ($row as $column)
            $pdf->Cell(19, 12, $column, 1);
    }
}
if(isset($_GET['ho'])) {

    foreach ($header3 as $heading) {
        $pdf->Cell(15, 6, $display_heading[$heading['Field']], 1);
    }
    foreach ($result3 as $row) {
        $pdf->Ln();
        foreach ($row as $column)
            $pdf->Cell(15, 6, $column, 1);
    }
}
if(isset($_GET['ro'])) {
    foreach ($header4 as $heading) {
        $pdf->Cell(22, 6, $display_heading[$heading['Field']], 1);
    }
    foreach ($result4 as $row) {
        $pdf->Ln();
        foreach ($row as $column)
            $pdf->Cell(22, 6, $column, 1);
    }
}
$pdf->Output();
?>



