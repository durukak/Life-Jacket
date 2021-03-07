<!DOCTYPE html>
<html lang="en">
<head>
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
$tripID = $_GET['x'];
$cookie_name = $tripID; // cookie name is tripID
$cookie_value = "1"; // default cookie value
setcookie($cookie_name, $cookie_value, time() + (86400), "/"); // maintain cookie
$sql = "select * from trip where tripID='$tripID'";
$res = $con->query($sql);
$row = mysqli_fetch_array($res);
if ($res->num_rows != 1) {
    echo "<script>alert('Undefined way'); location.href='trips.php';</script>";
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
      <table class="table table-hover">
          <?php $locat=str_replace(">","&gt",str_replace("<","&lt",$row['locat'])); echo $locat; ?>
         <colgroup>
            <col width="30%">
         </colgroup>
         <tr>
            <td>
               Location
            </td>
            <td>
               <?php $locat=str_replace(">","&gt;",str_replace("<","&lt;",$row['locat'])); echo $locat; ?>
            </td>
         </tr>
         <tr>
            <td>
               Trip Date
            </td>
            <td>
               <?php echo $row['tripDate']; ?>
            </td>
         </tr>
         <tr>
            <td>
               Number of volunteers
            </td>
            <td>
               <?php echo $row['numVolunteers']; ?>
            </td>
         </tr>
         <tr>
            <td>
               Crisis
            </td>
            <td>
               <?php echo $row['crisis']; ?>
            </td>
         </tr>
         <tr>
         </tr>
         <tr>
            <td style="text-align: center;" colspan="2">
               Description
            </td>
         </tr>
      </table>
      <textarea rows="7" cols="75" id="descr"readonly="readonly"><?php  echo str_replace("＆","&",$row['descr']); ?></textarea>
    <?php
    if (isset($_SESSION['username'])) {
        echo "<button><a href='tripupdate.php?tripID=" . $row['tripID'] . "'>Edit</a></button>";
        echo "<button><a href='tripdelete.php?tripID=".$row['tripID']."'>Delete</a></button>";
    } ?>
   </div>

  </body>
</html>