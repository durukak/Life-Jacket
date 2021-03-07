<!DOCTYPE html>
<html lang="en">
<head>
    <title>LIFEJACKET</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="body">
<?php 
header("Content-Type: text/html; charset=UTF-8");
$con = new mysqli("localhost", "root", "1234", "lifejacket"); //conect to database
mysqli_query ($con,'SER NAMES uft8');
session_start();
$name=$_GET['name'];
$cookie_name = $name; //cookie name is name
$cookie_value = "1"; //default cookie value
setcookie($cookie_name, $cookie_value, time() + (86400), "/"); // maintain cookie
$sql = "select * from volunteer where name='$name'";
$res = $con->query($sql);
$row=mysqli_fetch_array($res);
$username = $row['username'];
$password = $row['password'];
$name = $row['name'];
$phone = $row['phone'];
$sql2 = "select * from volunteer where username = '$username'";
$res2 = $con->query($sql2);
$row2 =mysqli_fetch_array($res2);
$res3 = $con->prepare("INSERT INTO staff(username, password, name, phone, position, dateJoined) VALUES ('$username','$password','$name', '$phone', 'staff', SYSDATE())");
$res3->execute();
echo "<script>alert('Success added'); location.href='search.php';</script>";
if($res->num_rows!=1) {
echo "<script>alert('Undefined way'); location.href='sch.php';</script>";
exit();
}
?>
</body>
</html>
