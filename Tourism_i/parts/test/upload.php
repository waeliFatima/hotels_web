<?php
//
//?>
<!---->
<!---->
<?php
//if (!empty($_FILES)) {
//
//    $Allowextension = array("gif", "jpeg", "jpg", "png", "PNG", "GIF", "JPEG", "JPG");
//    $FileExtension = explode('.', $_FILES["image"]["name"]);
//    $extension = end($FileExtension);
//    echo $extension;
//    if (in_array($extension, $Allowextension) && ($_FILES["image"]["size"] <= 20971520)) {
//        if ($_FILES["image"]["error"] == 0) {
////            echo 'File upload successfuly!';
//            $address_image = 'C:\wamp64\www\Tourism_i\public\image\image_hotel_front/' . $_FILES["image"]["name"];
//            move_uploaded_file($_FILES["image"]["tmp_name"], $address_image);
//            echo $address_image;
//        } else {
//            echo 'Error in uploading File!';
//        }
//    }
//}
//else{
//    echo 'dsffds';
//}
//?>
<!--<div-->
<!--<form enctype="multipart/form-data" method="POST">-->
<!--            <input type="file" name="image"/>-->
<!--            <br>-->
<!--                  <input type="submit" name="submit" value="Upload">-->
<!---->
<!---->
<!---->
<!--    </form>-->
<!---->
<?php
////if(isset($_POST['submit'])) {
////
////    $Allowextension = array("gif" , "jpeg" , "jpg" , "png","PNG","GIF","JPEG","JPG");
////    $FileExtension=explode(".",$_FILES["image"]["name"]);
////    print_r($FileExtension);
////    $extension=end($FileExtension);
////    if(in_array($extension,$Allowextension )&&($_FILES["image"]["size"]<=20971520))
////    {
////        if($_FILES["image"]["error"]==0)
////        {
//////            echo 'File upload successfuly!';
////            $address_image = 'C:\wamp64\www\Tourism_i\public\image\image_hotel_front/'.$_FILES["image"]["name"];
////            move_uploaded_file($_FILES["image"]["tmp_name"],$address_image);
////            echo $address_image;
////        }
////        else
////        {
////            echo'Error in uploading File!';
////        }
////    }
////    else
////    {
////        echo 'Invalid file';
////    }
////}
//?>





<?php
require_once '../config.php';
//?>
    <!---->
    <!---->
<?php
//if (!empty($_FILES)) {
//
//    $Allowextension = array("gif", "jpeg", "jpg", "png", "PNG", "GIF", "JPEG", "JPG");
//    $FileExtension = explode('.', $_FILES["image"]["name"]);
//    $extension = end($FileExtension);
//    echo $extension;
//    if (in_array($extension, $Allowextension) && ($_FILES["image"]["size"] <= 20971520)) {
//        if ($_FILES["image"]["error"] == 0) {
////            echo 'File upload successfuly!';
//            $address_image = 'C:\wamp64\www\Tourism_i\public\image\image_hotel_front/' . $_FILES["image"]["name"];
//            move_uploaded_file($_FILES["image"]["tmp_name"], $address_image);
//            echo $address_image;
//        } else {
//            echo 'Error in uploading File!';
//        }
//    }
//}
//else{
//    echo 'dsffds';
//}
//?>
    <!--<div-->
    <!--<form enctype="multipart/form-data" method="POST">-->
    <!--            <input type="file" name="image"/>-->
    <!--            <br>-->
    <!--                  <input type="submit" name="submit" value="Upload">-->
    <!---->
    <!---->
    <!---->
    <!--    </form>-->
    <!--->
    <form action="" method="post" enctype="multipart/form-data">
        <label>اضاقه کالری تصاویر هتل</label>
        <input type="file" name="files[]" multiple >
        <input type="submit" name="submit" value="UPLOAD">
    </form>


<?php


if(isset($_POST['submit'])){
    $valuefldr = 'C:\wamp64\www\Tourism_i\parts\test';
    foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
        $file_name = $_FILES['files']['name'][$key];
        $file_size =$_FILES['files']['size'][$key];
        $file_tmp =$_FILES['files']['tmp_name'][$key];
        $file_type=$_FILES['files']['type'][$key];
        $desired_dir= $valuefldr;
        if(move_uploaded_file($file_tmp,"$desired_dir/".$file_name))
        {
            $query="INSERT INTO  `images_hotels` (`id_hotel`, `address_image`) VALUES ( 1, '$file_name')";
            $result=mysqli_query($con,$query);
            if(!$result) {
                ?>
                <p class="bg-danger">متاسفانه عکس به کالی اضافه نشده است</p>
                <?php
            }
        }
        else
        {
            ?>
            <script>
                alert('error while uploading file');
                window.location.href='#';
            </script>
            <?php
        }

    }
}
//if(isset($_POST['submit'])){
//    // Include the database configuration file
//
//    // File upload configuration
//    $targetDir = 'C:\wamp64\www\Tourism_i\parts\test/';
//    $allowTypes = array("gif", "jpeg", "jpg", "png", "PNG", "GIF", "JPEG", "JPG");
//
//    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
//    if(!empty(array_filter($_FILES['files']['name']))){
//        foreach($_FILES['files']['name'] as $key=>$val){
//            // File upload path
//            $fileName = basename($_FILES['files']['name'][$key]);
//            $targetFilePath = $targetDir . $fileName;
//
//            // Check whether file type is valid
//            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
//            if(in_array($fileType, $allowTypes)){
//                // Upload file to server
//                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){
//                    echo $fileName;
//                    // Image db insert sql
//                    $insertValuesSQL .= ".$fileName. ";
//                    echo $insertValuesSQL;
//                }else{
//                    $errorUpload .= $_FILES['files']['name'][$key].', ';
//                }
//            }else{
//                $errorUploadType .= $_FILES['files']['name'][$key].', ';
//            }
//        }
//
//        if(!empty($insertValuesSQL)){
////            $insertValuesSQL = trim($insertValuesSQL,',');
//            // Insert image file name into database
//            $insert = $con->query("INSERT INTO  `images_hotels` (`id_hotel`, `address_image`) VALUES ('1','jdkfjsdf')");
//            if($insert){
//                $errorUpload = !empty($errorUpload)?'Upload Error: '.$errorUpload:'';
//                $errorUploadType = !empty($errorUploadType)?'File Type Error: '.$errorUploadType:'';
//                $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType;
//                $statusMsg = "Files are uploaded successfully.".$errorMsg;
//            }else{
//                $statusMsg = "Sorry, there was an error uploading your file.";
//            }
//        }
//    }else{
//        $statusMsg = 'Please select a file to upload.';
//    }
//
//    // Display status message
//    echo $statusMsg;
//}
?>


<?php













//if(isset($_POST['submit'])) {
//
//    $Allowextension = array("gif" , "jpeg" , "jpg" , "png","PNG","GIF","JPEG","JPG");
//    $FileExtension=explode(".",$_FILES["image"]["name"]);
//    print_r($FileExtension);
//    $extension=end($FileExtension);
//    if(in_array($extension,$Allowextension )&&($_FILES["image"]["size"]<=20971520))
//    {
//        if($_FILES["image"]["error"]==0)
//        {
////            echo 'File upload successfuly!';
//            $address_image = 'C:\wamp64\www\Tourism_i\public\image\image_hotel_front/'.$_FILES["image"]["name"];
//            move_uploaded_file($_FILES["image"]["tmp_name"],$address_image);
//            echo $address_image;
//        }
//        else
//        {
//            echo'Error in uploading File!';
//        }
//    }
//    else
//    {
//        echo 'Invalid file';
//    }
//}
?>




    <!--<form enctype="multipart/form-data" method="POST">-->
    <!--	<input type="file" name="file"/>-->
    <!--	<br>-->
    <!--	<input type="submit" name="submit" value="Upload">-->
    <!--</form>-->
<?php
//	if(isset($_POST['submit'])) {
//
//        $Allowextension = array("gif" , "jpeg" , "jpg" , "png","PNG");
//        $FileExtension=explode(".",$_FILES["file"]["name"]);
//        $extension=end($FileExtension);
//        if(in_array($extension,$Allowextension ))
//        {
//            if($_FILES["file"]["error"]==0)
//            {
//                echo 'File upload successfuly!';
//            }
//            else
//            {
//                echo'Error in uploading File!';
//            }
//        }
//        else
//        {
//            echo 'Invalid file';
//        }
//    }
//?>










<!--<form enctype="multipart/form-data" method="POST">-->
<!--	<input type="file" name="file"/>-->
<!--	<br>-->
<!--	<input type="submit" name="submit" value="Upload">-->
<!--</form>-->
<?php
//	if(isset($_POST['submit'])) {
//
//        $Allowextension = array("gif" , "jpeg" , "jpg" , "png","PNG");
//        $FileExtension=explode(".",$_FILES["file"]["name"]);
//        $extension=end($FileExtension);
//        if(in_array($extension,$Allowextension ))
//        {
//            if($_FILES["file"]["error"]==0)
//            {
//                echo 'File upload successfuly!';
//            }
//            else
//            {
//                echo'Error in uploading File!';
//            }
//        }
//        else
//        {
//            echo 'Invalid file';
//        }
//    }
//?>