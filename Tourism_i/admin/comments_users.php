<?php
include 'headeradmin.php';

if(isset($_SESSION['admin_email'])) {
?>
<?php
if(isset($_POST['read'])){
    $id = $_POST['check'];
//    echo $id;
    $ap = mysqli_query($con,"UPDATE `commnets` SET `state`='0' WHERE `id_comment`='$id'");
    echo "<script>window.open('comments_users.php','_self')</script>";


}

?>
    <div dir="rtl" style="width: 900px;height: 100%;margin-right: 30%;">
<?php
$comments = "SELECT commnets.*,users.email FROM `commnets`,`users` WHERE commnets.id_users=users.id_user AND `state` =1";

$comment = @mysqli_query($con, "SET NAMES utf8");
$comment = @mysqli_query($con, "SET CHARACTER SET utf8");
$comment = @mysqli_query($con, $comments);
$count_result = $comment->num_rows;
if($count_result>0) {
    ?>
    <form method="post">

            <h3 style="text-align: right;background-color: #54dc43;color: white;height: 35px ;width: 900px;padding: 4px">
                نظرات جدید </h3>
            <br>
            <br>
            <?php

            while ($row1 = mysqli_fetch_array($comment)) {
                ?>
                <div style="margin: 30px"></div>
                <div>
                    <div style="height: auto">
                        <div style="background-color: white;height: 180px;margin: auto;text-align: right;">
                            <span style="background-color: #54dc43;color:#54dc43">``</span><span
                                    style="padding: 10px"><strong>کاربر :<?= $row1['email'] ?>  </strong></span>
                            <hr>
                            <p style="font-size: 11px;padding: 10px"><strong style="font-size: 14px">نظر
                                    : </strong><?= $row1['comment'] ?> </p>

                            <span style="padding: 10px;font-size: 12px;float:left;"><?= $row1['date'] ?></span><br>
                            <span>
               <br>
               <label style="float: left;font-size: 14px;padding: 4px">این نظر را خودم</label>
           <input name="read" style="float:left;text-align: left;margin: 8px;height: 17px" type="submit"
                  class="btn btn-danger" value="">
                        <input type="hidden" name="check" value="<?= $row1['id_comment']; ?>">
           </span>

                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
    </form>
    <?php
}
    ?>
<div style="margin: 50px"></div>

    <h3 style="text-align: right;background-color: #2e252b;color: white;height: 35px ;width: 900px;padding: 4px"> کل نظرات</h3>
    <br>
    <br>
    <?php
$comments = "SELECT commnets.*,users.email FROM `commnets`,`users` WHERE commnets.id_users=users.id_user AND `state` =0";

$comment = @mysqli_query($con, "SET NAMES utf8");
$comment = @mysqli_query($con, "SET CHARACTER SET utf8");
$comment = @mysqli_query($con, $comments);
while ($row1 = mysqli_fetch_array($comment)) {
    ?>
    <div style="margin: 30px"></div>
    <div>
        <div style="height: auto">
            <div style="background-color: white;height: 180px;margin: auto;text-align: right;">
                <span style="background-color: #2E252B;color:#2E252B">``</span><span style="padding: 10px"><strong>کاربر :<?=$row1['email']?>  </strong></span>
                <hr>

                <p style="font-size: 11px;padding: 10px"><strong style="font-size: 14px">نظر : </strong><?=$row1['comment']?> </p>

                <span style="padding: 10px;font-size: 12px;float:left;"><?=$row1['date']?></span><br>
                <span>


           </span>

            </div>
        </div>
    </div>
    <?php
}
    ?>
</div>
<?php
include 'footeradmin.php';
}else {
    echo "<script>window.open('login.php','_self')</script>";

}
?>