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
session_start();
$con = new mysqli("localhost", "root", "1234", "lifejacket"); // connect to database
mysqli_query($con, 'SER NAMES uft8');
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
            <li><a href="trips.php">Trip</a></li>
            <Li><a href="search.php">Members</a></li>
            <li><a href="mypage.html">My Page</a></li>
            <li><a href="login.html"><span class="glyphicon glyphicon-log-in"></span>Login</a></li>
         </ul>
      </nav>
   </div>
   <?php
    if (isset($_POST['submit-search'])) {
        $search = mysqli_real_escape_string($con, $_POST['search']);
        $sql = "SELECT * FROM volunteer WHERE name LIKE '%$search%' OR username LIKE '%$search'";
        $res = mysqli_query($con, $sql);
        $qres = mysqli_num_rows($res);
        // set pages of trips board
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        if (isset($_GET['pagination'])) {
            $pagination = $_GET['pagination'];
        } else {
            $pagination = 1; // default page number
        }
        $sql2 = "select * from volunteer";
        $res2 = $con->query($sql2);
        $totaltripID = mysqli_num_rows($res2); // number of posts
        $totalpagenum = ceil($totaltripID / 10); // numberof pages = number of posts / number of posts per page
        $totalblocknum = ceil($totalpagenum / 5); // number of blocks = number of pages / number of pages per block
        $currentpagenum = (($page - 1) * 10); // current page number = (page number -1)*1
        $sql3 = "select name, username, phone from volunteer limit $currentpagenum,10"; // display 10 posts in page
        $res3 = $con->query($sql3);
        $num2 = (($page - 1) * 10) + 1;
    }
    ?>
   <div class="mainBoard" style="padding-bottom: 50px;">
      <table class="table">
         <colgroup>
            <col width="30%">
         </colgroup>

         <thead>
             <tr>
                <th style="text-align: center;">name</th>
                <th style="text-align: center;">username</th>
             </tr>
         </thead>
  <?php

while ($row = mysqli_fetch_assoc($res)) {
        $num = $row['name'];
        $title = str_replace(">", "&gt", str_replace("<", "&lt", str_replace($row['username'], mb_substr($row['username'], 0, 40, "utf-8") . "...", $row['username']))); // allow 0~40 strings, if input more than 40 strings display as '...'
        $title2 = str_replace(">", "&gt", str_replace("<", "&lt", $row['username']));
        ?>
  <tr style="cursor: pointer;"
            onClick="location.href='/member.php?x=<?php echo $num;?>'">
            <th><?php echo $num2;?></th>
            <th><?php if(mb_strlen($row['name'],"utf-8") > 30) {echo $title;} else {echo $title2;}?></th>
         </tr>
  <?php

$num2 ++;
    } // give No for each post
    ?>
  </table>
  <div class="container" style="text-align: center;">
      <ul class="pagination" style="text-align: center;">
      <?php
    $before = $pagination - 1; // current location of block -1
    $after = $pagination + 1;
    $before2 = $before * 5;
    $after2 = $after * 5 - 4; // return current location of block
    if ($pagination > 1) {
        echo "<li><a href='/sch.php?pagination=$before&page=$before2'>&laquo;</a></li>";
    }
    for ($i = $pagination * 5 - 4; $i <= $pagination * 5; $i ++) {
        if ($i <= $totalpagenum) {
            echo "<li><a href='/sch.php?pagination=$pagination&page=$i'>[$i]</a></li>";
        } else {
            break;
        }
    }
    if ($pagination < $totalblocknum) {
        echo "<li><a href='/sch.php?pagination=$after&page=$after2'>&raquo;</a></li>";
    }
    ?>
    </ul>
    </div>
  </div>


  <?php } else {?>

     <div style="padding: 100px;">
      <div class="navbar-header">
         <a class="navbar-brand" href="lifejacket.php">LIFE JACKET</a>
      </div>
      <nav nav class="nav navbar-nav navbar-right">
         <ul class="nav navbar-nav">
            <li><a href="about.html">About Us</a></li>
            <li><a href="trips.php">Trip</a></li>
            <li><a href="search.php">Members</a></li>
            <li><a href="mypage.html">My Page</a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
         </ul>
      </nav>
   </div>

   <?php
    if (isset($_POST['submit-search'])) {
        $search = mysqli_real_escape_string($con, $_POST['search']);
        $sql = "SELECT * FROM volunteer WHERE name LIKE '%$search%' OR username LIKE '%$search'";
        $res = mysqli_query($con, $sql);
        $qres = mysqli_num_rows($res);
        // set pages of trips board
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        if (isset($_GET['pagination'])) {
            $pagination = $_GET['pagination'];
        } else {
            $pagination = 1; // default page number
        }
        $sql2 = "select * from volunteer";
        $res2 = $con->query($sql2);
        $totaltripID = mysqli_num_rows($res2); // number of posts
        $totalpagenum = ceil($totaltripID / 10); // numberof pages = number of posts / number of posts per page
        $totalblocknum = ceil($totalpagenum / 5); // number of blocks = number of pages / number of pages per block
        $currentpagenum = (($page - 1) * 10); // current page number = (page number -1)*1
        $sql3 = "select name, username, phone from volunteer limit $currentpagenum,10"; // display 10 posts in page
        $res3 = $con->query($sql3);
        $num2 = (($page - 1) * 10) + 1;
    }
    ?>
   <div class="mainBoard" style="padding-bottom: 50px;">
      <table class="table">
         <colgroup>
            <col width="30%">
         </colgroup>

         <thead>
             <tr>
                <th style="text-align: center;">name</th>
                <th style="text-align: center;">username</th>
             </tr>
         </thead>
  <?php

while ($row = mysqli_fetch_assoc($res)) {
        $num = $row['name'];
        $title = str_replace(">", "&gt", str_replace("<", "&lt", str_replace($row['username'], mb_substr($row['username'], 0, 40, "utf-8") . "...", $row['username']))); // allow 0~40 strings, if input more than 40 strings display as '...'
        $title2 = str_replace(">", "&gt", str_replace("<", "&lt", $row['username']));
        ?>
  <tr style="cursor: pointer;"
            onClick="location.href='/member.php?x=<?php echo $num;?>'">
            <th><?php echo $num2;?></th>
            <th><?php if(mb_strlen($row['name'],"utf-8") > 30) {echo $title;} else {echo $title2;}?></th>
         </tr>
  <?php

$num2 ++;
    } // give No for each post
    ?>
  </table>
  <div class="container" style="text-align: center;">
      <ul class="pagination" style="text-align: center;">
      <?php
    $before = $pagination - 1; // current location of block -1
    $after = $pagination + 1;
    $before2 = $before * 5;
    $after2 = $after * 5 - 4; // return current location of block
    if ($pagination > 1) {
        echo "<li><a href='/sch.php?pagination=$before&page=$before2'>&laquo;</a></li>";
    }
    for ($i = $pagination * 5 - 4; $i <= $pagination * 5; $i ++) {
        if ($i <= $totalpagenum) {
            echo "<li><a href='/sch.php?pagination=$pagination&page=$i'>$i</a></li>";
        } else {
            break;
        }
    }
    if ($pagination < $totalblocknum) {
        echo "<li><a href='/sch.php?pagination=$after&page=$after2'>&raquo;</a></li>";
    }
    ?>
    </ul>
    </div>
  </div>

  <?php } ?> 
  </body>
</html>