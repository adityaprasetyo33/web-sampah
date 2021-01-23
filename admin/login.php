<?php
$user = $_POST['user'];
$pass = $_POST['pass'];
include 'connection.php';
$conn = connect();
$sql = "SELECT * FROM `admin` WHERE `username` = '$user' && `password` = '$pass'";
$result = mysqli_query($conn, $sql);
$cek = mysqli_num_rows($result);
if ($cek > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $nama = $row['nama'];
    }
    session_start();
    $_SESSION['username'] = $user;
    $_SESSION['nama'] = $nama;
    $_SESSION['status'] = "login";
    header("location:index.php");
} else {
    header("location:../login.html");
}
