<!DOCTYPE html>
<html lang="en">
<head>
    <title>รับค่าแก้ไขข้อมูล</title>
    <meta http-equiv="refresh" content="1;URL=showdatamember.php">
</head>
<body>
<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mydatabase1";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $sql = "UPDATE member SET Username = '".trim($_POST['Username'])."', 
                            Password = '".trim($_POST['Password'])."' ,
                            Name = '".trim($_POST['Name'])."' where UserID = '".$_POST['UserID']."'";
    $query = mysqli_query($conn, $sql);
    echo "แก้ไขข้อมูลเรีบยร้อย";
    mysqli_close($conn);
?>
</body>
</html>