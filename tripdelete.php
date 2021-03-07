<!DOCTYPE html>
<html>
<style>
a {
text-decoration:none; 
color:black;'
}
</style>
<body>
<?php
header("Content-Type: text/html; charset=UTF-8");
session_start();
$con = new mysqli("localhost","root","1234","lifejacket");
mysqli_query($con,'SET NAMES utf8');
if(isset($_GET['tripID'])){
    $tripID = $_GET['tripID']; 
$sql = "SELECT *from trip where tripID = '$tripID'";
$res = $con->query($sql);
$sql2 = "DELETE FROM trip where tripID='$tripID'";
$res2 = $con->query($sql2);
echo "<script>alert('Success deleted');location.href='trips.php';</script>";
}

?>
</body>
</html>