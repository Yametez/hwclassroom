<?php
session_start();
if ($_SESSION['UserID'] == "") {
    echo "กรุณา login";
    exit();
}
if ($_SESSION['Status'] != "USER") {
    echo "หน้านี้สำหรับ admin กรุณา login เข้ามาใหม่";
    exit();
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydatabase1";
$conn = mysqli_connect($servername, $username, $password, $dbname);
$sql = "select * from member where UserID = '" . $_SESSION['UserID'] . "'";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_array($query, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าแสดงข้อมูลของ admin</title>
</head>
<body>
    <center>
        <table border="1" width="300px">
            <tr>
                <th>ชื่อเข้าสู่ระบบ</th>
                <td><?php echo $result["username"];?></td>
            </tr>
            <tr>
                <th>ชื่อ</th>
                <td><?php echo $result["name"];?></td>
            </tr>
            <tr>
                <th>ยศ</th>
                <td><?php echo $result["Status"];?></td>
            </tr>
        </table>
    </center>
    <a href="logout.php">ออกจากระบบ</a>
</body>
</html>
<?php
mysqli_close($conn);
?>
