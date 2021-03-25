<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet"
   href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <!-- Basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Site Metas -->
      <title>LIFEJACKET</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link rel="icon" href="images/fevicon.png" type="image/png" />
      <!-- Bootstrap core CSS -->
      <link href="css/bootstrap.css" rel="stylesheet">
      <!-- FontAwesome Icons core CSS -->
      <link href="css/font-awesome.min.css" rel="stylesheet">
      <!-- Custom animate styles for this template -->
      <link href="css/animate.css" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="style.css" rel="stylesheet">
      <!-- Responsive styles for this template -->
      <link href="css/responsive.css" rel="stylesheet">
      <!-- Colors for this template -->
      <link href="css/colors.css" rel="stylesheet">
      <!-- light box gallery -->
      <link href="css/ekko-lightbox.css" rel="stylesheet">
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
   width: 1000px;
   margin: -100px auto 0px;
}

body {
   font-size: 30px;
   color: #000;
}

.navbar-brand {
   font-size: 30px;
}
</style>
</head>
<body class="body">
<?php
header("Content-Type: text/html; charset=UTF-8");
session_start();
$con = new mysqli("localhost", "root", "1234", "lifejacket"); // connect to database
mysqli_query($con, 'SER NAMES uft8');
// set pages of viewapp board
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
$sql = "select * from application";
$res = $con->query($sql);
$totaltripID = mysqli_num_rows($res); // number of posts
$totalpagenum = ceil($totaltripID / 5); // numberof pages = number of posts / number of posts per page
$totalblocknum = ceil($totalpagenum / 5); // number of blocks = number of pages / number of pages per block
$currentpagenum = (($page - 1) * 5); // current page number = (page number -1)*1
$sql2 = "select appID, username, status from application order by appID asc limit $currentpagenum,5"; // display 10 posts in page
$res2 = $con->query($sql2);
$num2 = (($page - 1) * 5) + 1;
?>
<?php
if ((! isset($_SESSION['username'])) && (! isset($_SESSION['name'])) && (! isset($_SESSION['phone']))) {
    ?>
      <!-- header -->
      <header class="header">

        <div class="header_top_section">
           <div class="container">
              <div class="row">
               <div class="col-lg-3">
                  <div class="full">
                     <div class="logo">
                        <a href="lifejacket.php"><img src="images/logo.png" alt="#" /></a>
                     </div>
                  </div>
               </div>
               <div class="col-lg-9 site_information">
                  <div class="full">
                     <div class="main_menu">
                        <nav class="navbar navbar-inverse navbar-toggleable-md">
                           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#cloapediamenu" aria-controls="cloapediamenu" aria-expanded="false" aria-label="Toggle navigation">
                           <span class="float-left">Menu</span>
                           <span class="float-right"><i class="fa fa-bars"></i> <i class="fa fa-close"></i></span>
                           </button>
                           <div class="collapse navbar-collapse justify-content-md-center" id="cloapediamenu">
                              <ul class="navbar-nav">
                                 <li class="nav-item active">
                                    <a class="nav-link" href="lifejacket.php">HOME</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link color-aqua-hover" href="#">ABOUT</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link color-aqua-hover" href="viewapp.php">TRIP</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link color-grey-hover" href="search.php">MEMBER</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link color-grey-hover" href="#.html">MYPAGE</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link color-grey-hover" href="login.html">LOGIN</a>
                                 </li>
                              </ul>
                           </div>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
           </div>
        </div>

      </header>
            <!-- section -->
            <section class="main_full banner_section_top">
        <div class="container-fluid">
          <div class="row">
             <div class="full">
                  <div class="slider_banner">
                    <img class="img-responsive" src="images/social-work-2356026.jpg" alt="#" />
                      <div class="slide_cont">
                        <div class="slider_cont_inner">
                        <div class="mainBoard" style="padding-bottom: 50px;">
      <table class="table">
         <colgroup>
            <col width="15%">
         </colgroup>

         <thead>
             <tr>
                <th style="text-align: center;">No</th>
                <th style="text-align: center;">Username</th>
                <th style="text-align: center;">Status</th>
             </tr>
         </thead>
                        
                        </div>
                      </div>
                  </div>
                </div>
          </div>
        </div>
      </section>
      <!-- end section -->

  <?php

    while ($row = mysqli_fetch_array($res2)) {
        $num = $row['appID']; 
        $title = str_replace(">", "&gt", str_replace("<", "&lt", str_replace($row['username'], mb_substr($row['username'], 0, 40, "utf-8") . "...", $row['username']))); // allow 0~40 strings, if input more than 40 strings display as '...'
        $title2 = str_replace(">", "&gt", str_replace("<", "&lt", $row['username'])); 
        $title3 = str_replace(">", "&gt", str_replace("<", "&lt", $row['status'])); 
        ?>
  
         
         
         
         
         
         <tr style="cursor: pointer;"
            onClick="location.href='/application.php?x=<?php echo $num;?>'">
            <th style="text-align: center;"><?php echo $num2;?></th>
            <th style="text-align: center;"><?php if(mb_strlen($row['username'],"utf-8") > 30) {echo $title;} else {echo $title2;}?></th>
            <th style="text-align: center;"><?php echo $title3;?></th>
         </tr>
  <?php

        $num2 ++;
    } // give No for each post
    ?>
  </table>
      <ul class="pagination">
  <?php
    $before = $pagination - 1; // current location of block -1
    $after = $pagination + 1;
    $before2 = $before * 5;
    $after2 = $after * 5 - 4; // return current location of block
    if ($pagination > 1) {
        echo "<li><a href='/viewapp.php?pagination=$before&page=$before2'>&laquo;</a></li>";
    }
    for ($i = $pagination * 5 - 4; $i <= $pagination * 5; $i ++) {
        if ($i <= $totalpagenum) {
            echo "<li><a href='/viewapp.php?pagination=$pagination&page=$i'>[$i]</a></li>";
        } else {
            break;
        }
    }
    if ($pagination < $totalblocknum) {
        echo "<li><a href='/viewapp.php?pagination=$after&page=$after2'>&raquo;</a></li>";
    }
    ?>
    </ul>
   </div>
  

   <?php } else {?>
        <!-- header -->
      <header class="header">

<div class="header_top_section">
   <div class="container">
      <div class="row">
       <div class="col-lg-3">
          <div class="full">
             <div class="logo">
                <a href="lifejacket.php"><img src="images/logo.png" alt="#" /></a>
             </div>
          </div>
       </div>
       <div class="col-lg-9 site_information">
          <div class="full">
             <div class="main_menu">
                <nav class="navbar navbar-inverse navbar-toggleable-md">
                   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#cloapediamenu" aria-controls="cloapediamenu" aria-expanded="false" aria-label="Toggle navigation">
                   <span class="float-left">Menu</span>
                   <span class="float-right"><i class="fa fa-bars"></i> <i class="fa fa-close"></i></span>
                   </button>
                   <div class="collapse navbar-collapse justify-content-md-center" id="cloapediamenu">
                      <ul class="navbar-nav">
                         <li class="nav-item active">
                            <a class="nav-link" href="lifejacket.php">LIFEJACKET</a>
                         </li>
                         <li class="nav-item">
                            <a class="nav-link color-aqua-hover" href="#">ABOUT</a>
                         </li>
                         <li class="nav-item">
                            <a class="nav-link color-aqua-hover" href="viewapp.php">TRIP</a>
                         </li>
                         <li class="nav-item">
                            <a class="nav-link color-grey-hover" href="search.php">MEMBER</a>
                         </li>
                         <li class="nav-item">
                            <a class="nav-link color-grey-hover" href="#.html">MYPAGE</a>
                         </li>
                         <li class="nav-item">
                            <a class="nav-link color-grey-hover" href="logout.php">LOGOUT</a>
                         </li>
                      </ul>
                   </div>
                </nav>
             </div>
          </div>
       </div>
    </div>
   </div>
</div>

</header>
            <!-- section -->
            <section class="main_full banner_section_top">
        <div class="container-fluid">
          <div class="row">
             <div class="full">
                  <div class="slider_banner">
                    <img class="img-responsive" src="images/social-work-2356026.jpg" alt="#" />
                      <div class="slide_cont">
                        <div class="slider_cont_inner">
                        <div class="mainBoard" style="padding-bottom: 50px;">
      <table class="table">
         <colgroup>
            <col width="15%">
         </colgroup>

         <thead>
             <tr>
                <th style="text-align: center;">No</th>
                <th style="text-align: center;">Username</th>
                <th style="text-align: center;">Status</th>
             </tr>
         </thead>
                        
                        </div>
                      </div>
                  </div>
                </div>
          </div>
        </div>
      </section>
      <!-- end section -->

  <?php

while ($row = mysqli_fetch_array($res2)) {
    $num = $row['appID']; 
    $title = str_replace(">", "&gt", str_replace("<", "&lt", str_replace($row['username'], mb_substr($row['username'], 0, 40, "utf-8") . "...", $row['username']))); // allow 0~40 strings, if input more than 40 strings display as '...'
    $title2 = str_replace(">", "&gt", str_replace("<", "&lt", $row['username'])); 
    $title3 = str_replace(">", "&gt", str_replace("<", "&lt", $row['status'])); 
    ?>

     
     
     
     
     
     <tr style="cursor: pointer;"
        onClick="location.href='/application.php?x=<?php echo $num;?>'">
        <th style="text-align: center;"><?php echo $num2;?></th>
        <th style="text-align: center;"><?php if(mb_strlen($row['username'],"utf-8") > 30) {echo $title;} else {echo $title2;}?></th>
        <th style="text-align: center;"><?php echo $title3;?></th>
     </tr>
    <?php $num2++;}?>
  </table>
      <ul class="pagination">
  <?php
    $before = $pagination - 1; // current location of block -1
    $after = $pagination + 1;
    $before2 = $before * 5;
    $after2 = $after * 5 - 4;
    if ($pagination > 1) {
        echo "<li><a href='/viewapp.php?pagination=$before&page=$before2'>&laquo;</a></li>";
    }
    for ($i = $pagination * 5 - 4; $i <= $pagination * 5; $i ++) {
        if ($i <= $totalpagenum) {
            echo "<li><a href='/viewapp.php?pagination=$pagination&page=$i'>[$i]</a></li>";
        } else {
            break;
        }
    }
    if ($pagination < $totalblocknum) {
        echo "<li><a href='/viewapp.php?pagination=$after&page=$after2'>&raquo;</a></li>";
    }
    ?>
  <?php } ?> 
  </ul>
   </div>
   <script src="js/jquery.min.js"></script>
      <script src="js/tether.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/parallax.js"></script>
      <script src="js/animate.js"></script>
      <script src="js/ekko-lightbox.js"></script>
      <script src="js/custom.js"></script>
</body>
</html>