<?php
header("Content-Type: text/html; charset=UTF-8");
session_start();
$con = new mysqli("localhost", "root", "1234", "lifejacket");
mysqli_query($con,'SET NAMES utf8');
$username = $_POST['username'];
$password = $_POST['password'];
$sql= "select * from volunteer where username = '$username' and password = '$password'";
$res = $con->query($sql);
$row = mysqli_fetch_array($res);
if($res -> num_rows > 0) {
    $_SESSION['username'] = $username;
    $_SESSION['name'] = $row["name"];
    $_SESSION['phone'] = $row["phone"];
    if(isset($_SESSION['username'])&& isset($_SESSION['name']) && isset($_SESSION['phone']))
    {
    echo"<script>alert('login successfully');location.href='lifejacket.php';</script>";
} else {
    echo "<script>alert('invalid input, please try again');location.href='login.html';</script>";
}
} else {
    echo "<script>alert('invalid input, please try again');location.href='login.html';</script>";
}
?>
