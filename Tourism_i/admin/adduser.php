<?php
include 'headeradmin.php';

//retrun error----------------------------------------------------------------------------------------------------------
function display_errors($errors)
{
    $display = '<ul class="bg-danger" style="width: 640px;color: #ffffff;margin-right: 39%;text-align: right" >';
    foreach ($errors as $error) {
        $display .= '<li class=>' . $error . '</li>';
    }
    $display .= '</ul>';
    return $display;
}
//post data.............................................................................................................
$name = ((isset($_POST['firstname']) && $_POST['firstname'] != '') ? $_POST['firstname'] : '');
$email = ((isset($_POST['email']) && $_POST['email'] != '') ? $_POST['email'] : '');
$phone = ((isset($_POST['phone']) && ($_POST['phone'] != '')) ? $_POST['phone'] : '');
$lastname = ((isset($_POST['lastname']) && ($_POST['lastname'] != '')) ? $_POST['lastname'] : '');
$password = ((isset($_POST['password']) && ($_POST['password'] != '')) ? $_POST['password'] : '');
$kind_of_user = ((isset($_POST['id_parent'])) && !empty($_POST['id_parent']) ? $_POST['id_parent'] : '');
$gender = ((isset($_POST['gender'])) && !empty($_POST['gender']) ? $_POST['gender'] : '');

//adding................................................................................................................
if(isset($_POST['add_user'])) {
//if admin all information is require-----------------------------------------------
    if(isset($_POST['id_parent']) and $_POST['id_parent'] == 2){
        $errors = array();
        $required = array('firstname', 'email', 'lastname', 'id_parent', 'phone', 'id_parent', 'password');
        foreach ($required as $field) {
            if ($_POST[$field] == '') {
                $errors[] = 'لطفا تمام اطلاعات مدیر جدید وارد کنید ';
                break;
            }
        }

    }
    //if user------------------------------------------------------------------------
    if(isset($_POST['id_parent']) and $_POST['id_parent'] == 1){
        $errors = array();
        $required = array('email','password','phone');
        foreach ($required as $field) {
            if ($_POST[$field] == '') {
                $errors[] = 'لطفا پاسپورت و شماره تماس  و ایمیل کاربر وارد نمیاید  وارد کنید ';
                break;
            }
        }

    }
    //check information---------------------------------------------------
    if (empty($email)) {
        array_push($errors, "لطفا ایمیل خود را وارد کنید");
    } else {
        $email_validate = $email;
        if (filter_var($email_validate, FILTER_VALIDATE_EMAIL) == true) {
            $c_email = $email_validate;

            //check if the email is uesed befor---------------------------
            $query_exist_email="select * from users where email='$email'";
            $run_exist_email=mysqli_query($con,$query_exist_email);
            $check_email = mysqli_num_rows($run_exist_email);
            if($check_email == 0)
            {
                $c_email=$email;

            }else{

                array_push($errors, "با این ایمیل قبلا ثبت نام انجام شده است؛ لطفا ایمیل جدیدی وارد نمایید");

            }

            //than check if email not true----------------------------------
        } else {
            array_push($errors, "ایمیل نادرستی  وارد کرده اید.لطفا ایمیل درستی وارد کنید.");
        }
    } if (empty($phone)) {
        array_push($errors, "تلفن خود را وارد نکردید");
    } else {
        if (preg_match("/^[0]{1}[9]{1}\d{9}$/", $phone)) {
            // phone is valid
            $c_phone = $phone;
        } else {
            array_push($errors, "تلفنی که وارد کردید صحیح نمی باشد");
        }
    }
    if (empty($password)) {
        array_push($errors, "پسورد خود را وارد نکرده اید!");
    } else {
        if (preg_match("/^(?=.*\d).{6,20}$/", $password)) {
            // phone is valid
            $c_password_1 = $password;
        } else {
            array_push($errors, "پسوردی که وارد کرده اید، طبق الگو نیست.لطفا دوباره پسورد را وارد نمایید .رمز عبور باید انگلسی, دارای کاراکترهای رقمی و تعداد کارکتر ها حداقل 6 می باشد. ");
        }
    }

    //.................................................................................................................
    if (!empty($errors)) {
        echo display_errors($errors);

    }else{
        if ($kind_of_user == 2) {
            $kind = 'مدیر';
        }else{
            $kind = 'کاربر';
        }//        $query = mysqli_query($con,"INSERT INTO `users`(`id_parent`, `email`, `phone`, `password`, `firstname`, `lastname`,`gender`,`confirmed`,`confirm_code`) VALUES ('1','sddasss  2@gmial.com','454545','123344','fata','wadd','ww','1','0')");
        $query = mysqli_query($con,"INSERT INTO `users`(`id_parent`, `email`, `phone`, `password`, `firstname`, `lastname`, `gender`,`confirmed`,`confirm_code`) VALUES ('$kind_of_user','$email','$phone','$password',N'$name',N'$lastname',N'$gender','1','0')");
        if($query){
            $message = "
				مدیر شما را در سایت جزیره بعنوان $kind ثبت نام کرده با بسورد
				 $password با پسورد 
				  و ایمیل  $email 
				 و شماره همراه   $phone
				  .لطفا در اسرع وقت به حساب کاربری مراجعه نمایید و اطلاعات خود تکمیل نمایید .
				";
            mail($email, "ازسایت جزیره برای رزور", $message, "Form:fatiagaingit@gmail.com");

            echo "<script>alert('$kind جدید اضافه شده است .')</script>";
            echo "<script>window.open('adduser.php','_self')</script>";


        }
    }
    //------------------------------------------------------------------------------------------------------------------
}?><div style="margin: 50px"></div>
<form method="post" action="adduser.php">
    <div style="width: 640px;height: 370px;background-color: #ffffff;margin-right: 39%;font-size: 15px;color: #31353D;text-align: right"
         dir="rtl">
        <h3 style="background-color: #31353D;color: white;text-align: right;padding: 10px"> +  اضافه کردن عضو </h3>





<div style="float: right;padding: 15px">
    <div style="margin-top: 20px" dir="rtl"></div>

    <span style="margin: 5px">


    <label> نام :</label>
    <input name="firstname" type="text" style="width: 173px;height: 35px" value="<?= $name ?>">

    </span>
    <span style="margin: 5px">
         <label>نام خانوادگی :</label>
                    <input name="lastname" type="text" style="width: 173px;height: 35px" value="<?= $lastname ?>">
    </span><br><br>
    <span style="margin: 19px">
                    <label>شماره تماس : </label>
                    <input name="phone" type="text" style="width: 173px;height: 35px" value="<?= $phone ?>">
                </span>
    <span style="margin: 19px">
                    <label>رمز ورود : </label>
                    <input name="password" type="text" style="width: 173px;height: 35px" value="<?= $password ?>">
                </span><br><br>

    <span style="margin: 5px;">
        <label>نوع دسترسی کاربر: </label>
        <select name="id_parent" style="width: 173px;height: 35px" value="<?= $kind_of_user ?>">
            <option value="1">کاربر </option>
            <option value="2"> مدیر</option>
        </select>
        <label>جنست : </label>
        <select name="gender" style="width: 173px;height: 35px" value="<?= $gender ?>">
            <option value="مرد">مرد </option>
            <option value="زن"> زن</option>
        </select>


    </span><br><br>

    <span style="margin: 19px">
                    <label>ایمیل : </label>
                    <input name="email" type="text" style="width: 173px;height: 35px" value="<?= $email ?>">

    <input type="submit" name="add_user" class="btn btn-primary"
           style="margin: 20px;float: left;padding: 5px;width: 170px;height: 35px"
           value="اضافه عضو">
    </span>
</div>
    </div>
</form>

<div style="margin-top: 50px"></div>
<div style="width: 640px;margin-right: 39%;font-size: 15px;color: #31353D;text-align: right">
    <h2>مدیران سایت جزیره</h2>
    <table class="table table-striped" style="font-size: 14px;background-color: white">
        <thead style="color: #5f6472;padding: 10px;background-color: #dcddff">
        <tr>
            <th scope="col" style="">#</th>
            <th scope="col">کد ملی </th>
            <th scope="col">جنسیت </th>
            <th scope="col">تاریخ تولد </th>
            <th scope="col">شماره تماس</th>
            <th scope="col">ایمیل</th>
            <th scope="col">نام خوادکی</th>
            <th scope="col">نام </th>
        </tr>
        </thead>
        <tbody>

     <?php
     $get_users = "SELECT * FROM `users` WHERE id_parent=2 ";

     $get_user = @mysqli_query($con, "SET NAMES utf8");
     $get_user = @mysqli_query($con, "SET CHARACTER SET utf8");
     $get_user = @mysqli_query($con, $get_users);
        $i=1;
        while ($row = mysqli_fetch_array($get_user)) {
        //            $id_rom = $row['id_room'];
 ?>
        <tr>
            <td style="font-size: 16px;padding: 10px">
                <?= $i ?>
            </td>
            <td><?= $row['personailynum'] ?></td>
            <td><?= $row['gender'] ?></td>
            <td><?=$row['birhtdy']?></td>
            <td><?= $row['phone']?></td>
            <td><?= $row['email']?></td>
            <td><?= $row['lastname'] ?></td>
            <td><?= $row['firstname'] ?></td>
        </tr>
  <?php
        $i++;
        }
        //..............................................................................................................
    ?>
        </tbody>
    </table>

</div>
<div style="margin-top: 50px"></div>
<div style="width: 640px;margin-right: 39%;font-size: 15px;color: #31353D;text-align: left">
    <h2 style="text-align: right">کارهای دیتا بیس : </h2>
    <a href="export.php">Export</a>
    <br>
    <hr>
    <a href="import.php">Import</a>
</div>
    <div style="margin-top: 50px"></div>
    <div style="width: 640px;margin-right: 39%;font-size: 15px;color: #31353D;text-align: right">
        <p>ساختار درختی  </p>
        <a href="details/tree.php">مشاهد ساختار به صورت json</a>
        <div id="treeview"><br>

<h4>گزارشات pdf</h4>
        </div><hr>
        <a href="pdf.php?re=0" type="submit" id="pdf" name="generate_pdf" class="btn btn-primary"><i class="fa fa-pdf" aria-hidden="true"></i>
            روزها </a>
        <a href="pdf.php?ue=0" type="submit" id="pdf" name="generate_pdf" class="btn btn-primary"><i class="fa fa-pdf" aria-hidden="true"></i>
            کابران </a>
        <a href="pdf.php?ro=0" type="submit" id="pdf" name="generate_pdf" class="btn btn-primary"><i class="fa fa-pdf" aria-hidden="true"></i>
            اتاق ها </a>
        <a href="pdf.php?ho=0" type="submit" id="pdf" name="generate_pdf" class="btn btn-primary"><i class="fa fa-pdf" aria-hidden="true"></i>
            هتل ها </a>
    </div>

<script>
    $.ajax({
        url:"details/tree.php",
        method:"POST",
        dataType:"json",
        success:function (data) {
            $("#treeview").treeview({data:data});

        }
    });
</script>


<?php
include 'footeradmin.php';
?>

