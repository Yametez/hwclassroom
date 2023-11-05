<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mydatabase1";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("เชื่อมต่อล้มเหลว: " . mysqli_connect_error());
    }   
    $sql = "insert into member(Username, Password, Name) values('".$_POST["Username"]."','".$_POST["Password"]."','".$_POST["Name"]."')";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo "success";
    }
    mysqli_close($conn);
?>
<!--<meta http-equiv="refresh" content="1;URL=showdatamember.php" />-->