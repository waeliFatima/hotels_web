<?php
$host = "localhost";
$username = "root";
$password = "";
$database_name = "Tourism_i";

$con = mysqli_connect($host, $username, $password, $database_name);
$con->set_charset("utf8");
function databaseOutput() {
    $host = "localhost";
    $username = "root";
    $password = "";
    $database_name = "Tourism_i";

    $con = mysqli_connect($host, $username, $password, $database_name);
    $con->set_charset("utf8");
    $dbQuery = $con->prepare("select * from users");
    $dbQuery->execute();

    while ($dbRow = $dbQuery->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <tr>
            <td><?php echo $dbRow['id_user']; ?></td>
            <td><?php echo $dbRow['id_parent']; ?></td>
            <td><?php echo $dbRow['email']; ?></td>
            <td><?php echo $dbRow['Email']; ?></td>
            <td><?php echo $dbRow['phone']; ?></td>
            <td><?php echo $dbRow['password']; ?></td>
            <td><?php echo $dbRow['firstname']; ?></td>
            <td><?php echo $dbRow['firstname']; ?></td>
            <td><?php echo $dbRow['firstname']; ?></td>
        </tr>
        <?php

    }

} // end of function databaseOutput()

//if ($_POST['submit_docs']) { // word output

    header("Content-Type:application/msword");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("content-disposition: attachment;filename=test.docx");

    ?>
    <html>
    <body>
    <h1>Students</h1>
    <table>
        <tr>
            <th>ID</th><th>Forename</th><th>Surname</th><th>Email</th><th>B Number</th><th>School</th><th>Campus</th><th>Research Institute</th><th>FT/PT</th>
        </tr>
        <?php databaseOutput(); ?>
    </table>
    </body>
    </html>
    <?php

    exit; // end of word output

//}
?>
<html>
<head>
    <title>Students</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"   href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://dunluce.infc.ulst.ac.uk/cw11ba/project/Project/mycss.css">
</head>
<body>
<form name="export_form" action="<?php echo($_SERVER['PHP_SELF']);?>" method="post">
    <input type="submit" name="submit_docs" value="Export as MS Word" class="input-button" /> <a href="https://dunluce.infc.ulst.ac.uk/cw11ba/project/Project/admin.php"><button type="button" class= "btn btn-block">Go back to Admin Area</button></a>
</form>
<table class="table table-striped" id="student">
    <tr>
        <th>ID</th><th>Forename</th><th>Surname</th><th>Email</th><th>B Number</th><th>School</th><th>Campus</th><th>Research Institute</th><th>FT/PT</th>
    </tr>
    <?php databaseOutput(); ?>
</table>
</body>
</html>