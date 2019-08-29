<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>


<form method="post">

    <select name="te[]" class="selectpicker" multiple data-live-search="true">
        <option class="de" selected="selected">یبیب</option>
        <option value="M">Mustard</option>
        <option value="3">Ketchup</option>
        <option value="5">Relish</option>
    </select>
    <input type="submit" name="suv">
</form>
<script>$('select').selectpicker();
</script>
<?php
if (isset($_POST['suv'])) {
    if(isset($_POST["facility"]))
    {
        // Retrieving each selected option
        foreach ($_POST['facility'] as $subject) {
            mysqli_query($con, "INSERT INTO `faci_and_hotel`( `id_hotel`, `id_faci`) VALUES (1,2)");
            print "You selected $subject<br/>";
        }

    }
    else
        echo "Select an option first !!";
//    $arrer = [];
//    $terer = [];
//    $terd = ['Mustard'];
//    print_r($_POST['te']);
//    $arrer = ($_POST['te']);
//    echo $arrer[0];
////    echo $arrer[1];
//    if ($_POST['te'][0] != $terd[0]) {
//        array_push($terer, $_POST['te'][0]);
//    }
//    print_r($terer);
} ?><html>
<body>
<!--name.php to be called on form submission-->
<form method = 'post'>
    <h4>SELECT SUJECTS</h4>

    <select name = 'subject[]' multiple size = 6>
        <option value = '1'>ENGLISH</option>
        <option value = '2'>MATHS</option>
        <option value = '3'>COMPUTER</option>
        <option value = '4'>PHYSICS</option>
        <option value = '5'>CHEMISTRY</option>
        <option value = 'hindi'>HINDI</option>
    </select>
    <input type = 'submit' name = 'submit' value = Submit>
</form>
</body>
</html>
<?php

// Check if form is submitted successfully
if(isset($_POST["submit"]))
{
    // Check if any option is selected
    if(isset($_POST["subject"]))
    {
        // Retrieving each selected option
        foreach ($_POST['subject'] as $subject)
            print "You selected $subject<br/>";
    }
    else
        echo "Select an option first !!";
}
?>