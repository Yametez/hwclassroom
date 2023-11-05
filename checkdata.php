<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydatabase1";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check if the form was submitted
if(isset($_POST['txtUsername']) && isset($_POST['txtPassword'])) {
    $username = mysqli_real_escape_string($conn, $_POST['txtUsername']);
    $password = mysqli_real_escape_string($conn, $_POST['txtPassword']);

    $sql = "SELECT * FROM member WHERE username='$username' AND password='$password'";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($query, MYSQLI_ASSOC);

    if ($result) {
        // User is authenticated
        $_SESSION["UserID"] = $result["UserID"];
        $_SESSION["Status"] = $result["Status"];
        session_write_close();
        if ($result["Status"] == "ADMIN") {
            header("location: admin.php");
            exit(); // Make sure to exit to prevent further execution
        } else {
            header("location: user.php");
            exit(); // Make sure to exit to prevent further execution
        }
    } else {
        echo "Username or password is incorrect.";
    }
}

mysqli_close($conn);
?>
