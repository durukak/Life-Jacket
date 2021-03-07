<!DOCTYPE html>
<html lang="en">
<head>
<title>LIFEJACKET</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet"
   href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<style type="text/css">
input {
   height: 39px;
   font-size: 14px;
   color: #333;
   padding: 0px 10px;
   border: 1px solid #d2d7e0;
   border-radius: 3px;
   width: 300px;
   -moz-border-radius: 3px;
   -webkit-border-radius: 3px;
}

.mainBoard {
   width: 800px;
   margin: 50px auto 0px;
}

body {
   font-size: 20px;
}

.navbar-brand {
   font-size: 30px;
}
</style>
</head>
<script
   src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<body class="body">
<?php
header("Content-Type: text/html; charset=UTF-8");
$con = new mysqli("localhost", "root", "1234", "lifejacket"); // conect to database
mysqli_query($con, 'SER NAMES uft8');
session_start();
$name = $_GET['x'];
$cookie_name = $name; // cookie name is name
$cookie_value = "1"; // default cookie value
setcookie($cookie_name, $cookie_value, time() + (86400), "/"); // maintain cookie
$sql = "select * from volunteer where name='$name'";
$res = $con->query($sql);
$row = mysqli_fetch_array($res);
if ($res->num_rows != 1) {
    echo "<script>alert('Undefined way'); location.href='sch.php';</script>";
    exit();
}
?>


<?php
if ((! isset($_SESSION['username'])) && (! isset($_SESSION['name'])) && (! isset($_SESSION['phone']))) {
    ?>
   <div style="padding: 100px;">
      <div class="navbar-header">
         <a class="navbar-brand" href="lifejacket.php">LIFE JACKET</a>
      </div>
      <nav nav class="nav navbar-nav navbar-right">
         <ul class="nav navbar-nav">
            <li><a href="about.html">About Us</a></li>
            <li><a href="trips.php">Trips</a></li>
            <Li><a href="search.php">Members</a></li>
            <li><a href="mypage.html">My Page</a></li>
            <li><a href="login.html"><span class="glyphicon glyphicon-log-in"></span>Login</a></li>
         </ul>
      </nav>
   </div>

  <?php } else {?>
    <?php
    if ((! isset($_SESSION['username'])) && (! isset($_SESSION['name'])) && (! isset($_SESSION['phone'])))?>
     <div style="padding: 100px;">
      <div class="navbar-header">
         <a class="navbar-brand" href="lifejacket.php">LIFE JACKET</a>
      </div>
      <nav nav class="nav navbar-nav navbar-right">
         <ul class="nav navbar-nav">
            <li><a href="about.html">About Us</a></li>
            <li><a href="trips.php">Trips</a></li>
            <li><a href="search.php">Members</a></li>
            <li><a href="mypage.html">My Page</a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
         </ul>
      </nav>
   </div>

  <?php } ?>
  <div class="mainBoard" style="padding-bottom: 50px;">
      <table class="table">
        <?php $name=str_replace(">","&gt",str_replace("<","&lt",$row['name'])); echo $name; ?>
        <tr>
             <th colspan="3">Name : <?php $name=str_replace(">","&gt;",str_replace("<","&lt;",$row['name'])); echo $name; ?></th>
          <tr>
          <tr>
             <th>User Name : <?php echo $row['username']; ?></th>
          <tr>
          <tr>
             <th>Phone : <?php echo $row['phone']; ?></th>
          <tr>
       </table>
   </div>
<?php

if (isset($_SESSION['username'])) {
    echo "<a href='memberupdate.php?name=" . $row['name'] . "'>Record Staff</a>";
} ?>

  </body>
</html>