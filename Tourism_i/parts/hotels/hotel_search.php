<?php
// desing of the html page for search----------------------------------------------------------------------------------
?>
<form class="pa-" style="color: white" >
    <div style="float: right">
        <div style="margin-top: 50px;width: 1200px; margin-right: 130px;float: right" >

            <div style="margin: 0 auto">
                <div style=";float: left ;width: 180px">
                    <input id='btn' class="btn btn-danger" style="color: #fefbff;width: 180px;height: 40px;float: left" name="submit1" type='submit' value='جستجو'  >
                </div>
                <div class='col-md-3' dir="ltr" style="width:170px " >
                    <div class="form-group">
                        <div class='input-group'>
                            <input type='text'placeholder="تاریخ خروج" class="form-control" id="datepicker2" name="dateOuts"
                                   autocomplete="off" value="<?php if(isset($_POST['dateOuts'])) {
                                echo  $_POST['dateOuts'] ; } elseif (isset($_GET['dateOuts'])){echo $_GET['dateOuts'];}?>"/>
                            <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                        </div>
                    </div>
                </div>

                <div class='col-md-3' dir="ltr" style="width: 180px">
                    <div class="form-group">
                        <div class='input-group'>
                            <input type='text' placeholder="تاریخ ورود" class="form-control" id="datepicker1" name="dateIn"
                                   value="<?php if(isset($date_in)) {
                                       echo $date_in;
                                   }elseif(isset($_GET['dateIn'])){echo $_GET['dateIn'];}?>"   autocomplete="off"/> <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                         </span>
                        </div>
                    </div>
                </div>






                <div class='col-md-3' dir="ltr">
                    <div class="form-group">
                        <div class='input-group'>

                            <select style="width: 180px" id="city" class="form-control"
                                    name="lname">
                                <option>

                                    <?php
                                    if(isset($_POST['lname'])){
                                        echo $_POST['lname'];
                                    }elseif (isset($_GET['lname'])){echo $_GET['lname'];}else{echo' ';}?> </option>
                                <?php
                                get_Iran_city();
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" style="color: #4e4c57;width: 180px "  >
                    <div class="form-gorup">
                        <div class='input-group'>
                            <input readonly autocomplete="off" id="mylink" onclick="myfunction();" style="width: auto" placeholder= "بزرکسالان<?php if(isset($_POST['numb'])) {
                                echo $_POST['numb'];}elseif(isset($_GET['numb'])){echo $_GET['numb'] ;}else echo 1; ?>کودکان<?php if(isset($_POST['numbs'])){echo $_POST['numbs'];}elseif (isset($_GET['numbs'])){echo $_GET['numbs'];}else {echo 0;} ?> اتاق 1">
                            <div dir="rtl" id="numform" style="display:none;font-size: 15;
                                        width: 320px;
                                        background: white;
                                        padding: 5px;
                                        height: auto;
                                        border-color: #8a8893;
                                        margin-bottom: 20px;
                                        margin-left: 2px; border: 1px solid;
                                                        border-radius: 10px 40px 20px;
                                        margin-top: 10px;
                                        box-shadow: 3px 7px 7px #d9a7a6;">

                                <div class="dropdown">
                                    <div style="margin: 2px;font-size: 17px">
                                        <h3 style="color: #ff5295"><strong>اتاق اول</strong></h3>
                                        <div style="margin: 5px">
                                            <label style="float: right"><strong style="font-size: 20px">بزرگسال</strong> <small style="color: #8a8893">(12 به بالا)</small> </label>
                                            <div style="float: left;margin: 5px">
                                                <!--                                <button onclick="decrementValue()"  class="btn btn-default btn-xs" name="plus_g"><span style="color: #ff5295" class="glyphicon glyphicon-plus"></span></button>-->
                                                <input  type="button" onclick="decrementValue()" class="decrement" value="-" style="color: #ff5295;border-color: #ff5295;font-size: 30px;background-color:#fff;
                                                                                       border:1px solid #ff5295;
                                                                                       height:40px;
                                                                                       margin-top: 2px;
                                                                                       border-radius:50%;
                                                                                       -moz-border-radius:50%;
                                                                                       -webkit-border-radius:50%;
                                                                                       width:40px;" />
                                                <input readonly type="text" name="numb" id="numb" value="<?php if(isset($_POST['numb'])) {
                                                    echo $_POST['numb'];} elseif(isset($_GET['numb'])) {echo $_GET['numb'] ;} else echo 0; ?>  " style="border: none;border-color: transparent;width: 22px;font-size: 20px"/>

                                                <input type="button" class="increment" onclick="incrementValue()" style="color: #ff5295;border-color: #ff5295;font-size: 30px;background-color:#fff;
                                                                               border:1px solid #ff5295;
                                                                               height:40px;
                                                                               margin-top: 2px;
                                                                               border-radius:50%;
                                                                               -moz-border-radius:50%;
                                                                               -webkit-border-radius:50%;
                                                                               width:40px;" value="+" /><!--                                <button onclick="incrementValue()" name="minus_g" class="btn btn-default btn-xs"><span style="color: #ff5295" class="glyphicon glyphicon-minus"></span></button>-->
                                            </div>
                                            <br>
                                        </div>





                                        <br>




                                        <div style="margin: 5px">

                                            <label style="float: right"><strong style="font-size: 20px">کودک</strong><small style="color: #8a8893">(0 سال تا 12 )</small></label>
                                            <div style="float:left;margin:5px;">
                                                <input type="button" onclick="decrementValue1()" class="decrement" value="-" style="color: #ff5295;border-color: #ff5295;font-size: 30px;background-color:#fff;
                                                       border:1px solid #ff5295;
                                                       height:40px;
                                                       margin-top: 2px;
                                                       border-radius:50%;
                                                       -moz-border-radius:50%;
                                                       -webkit-border-radius:50%;
                                                       width:40px;" />
                                                <input readonly type="text" name="numbs" id="numbs" value="  <?php if(isset($_POST['numbs'])) {
                                                    echo $_POST['numbs'];}elseif (isset($_GET['numbs'])){echo $_GET['numbs'];} ?>  " style="border: none;border-color: transparent;width: 22px;font-size: 20px"/>

                                                <input type="button" class="increment" onclick="incrementValue1()" style="color: #ff5295;border-color: #ff5295;font-size: 30px;background-color:#fff;
                                                           border:1px solid #ff5295;
                                                           height:40px;
                                                           margin-top: 2px;
                                                           border-radius:50%;
                                                           -moz-border-radius:50%;
                                                           -webkit-border-radius:50%;
                                                           width:40px;" value="+" /><br>

                                            </div>
                                        </div>
                                        <br><br><br>
                                        <div style="margin: 5px">
                                        </div><hr>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
//doing the search-----------------------------------------------------------------------------------------------------
    if (isset($_POST['submit1'])) {
    $date_in = $_POST['dateIn'];
    $date_out = $_POST['dateOuts'];

    if ($date_in != '' && $date_out != '' && $goal != '') {
        echo("<script>location.href = 'hotels.php?lname=$goal&&dateIn=$date_in&&dateOuts=$date_out&&numb=$adout_room&&numbs=$child_room';</script>");

    } else {

    ?>
    <div>
        <?php
        //return the errors---------------------------------------------------------------------------------------------
        $error = "کاربر محترم به تمام فیلدها توجه کنید";
        $display = '<ul class="bg-danger" style="background-color: #ff5295;width: 300px;height: 40px;">';
        $display .= '<li class=>' . $error . '</li>';
        echo $display;

        }
        }
        ?>

    </div>
</form>






