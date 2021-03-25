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
   .mainBoard{
       width: 800px;
       margin: -100px auto 0px;
   }
   
   body{
      font-size : 20px;
      color : black;
   }
   .navbar-brand{
      font-size: 30px;
   }
   </style>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<body class="body">
<?php
header("Content-Type: text/html; charset=UTF-8");
session_start();
?>
<?php
if ((! isset($_SESSION['username'])) && (! isset($_SESSION['name'])) && (! isset($_SESSION['phone']))) {
    ?>
<script>alert('No access exept for staffs');
location.href='trips.php';</script>

  <?php } else {?>
    <?php
    if ((! isset($_SESSION['username'])) && (! isset($_SESSION['name'])) && (! isset($_SESSION['phone'])))?>
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
                            <a class="nav-link color-aqua-hover" href="trips.php">TRIP</a>
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
                    <img class="img-responsive" src="images/day-planner-828611.jpg" alt="#" />
                      <div class="slide_cont">
                        <div class="slider_cont_inner">
                        <div class="mainBoard" style="padding-bottom: 50px;">
                        <div class="mainBoard" style="padding-bottom: 50px;">
      <table class="table table-hover">
         <colgroup>
            <col width="30%">
         </colgroup>
         <tr>
            <td>
               Location
            </td>
            <td>
               <input type="text" id="locat">
            </td>
         </tr>
         <tr>
            <td>
               Number of volunteers
            </td>
            <td>
               <input type="text" id="numVolunteers">
            </td>
         </tr>
         <tr>
            <td>
               Crisis
            </td>
            <td>
               <input type="text" id="crisis">
            </td>
         </tr>
         <tr>
            <td>
               Trip Date
            </td>
            <td>
               <input type="text" id="tripDate">
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
      <textarea rows="7" cols="75" id="descr"></textarea>
      <button class="btn btn-default btn-sm btn-block" style="font-size: 20px; font-weight: bolder;" onclick="apply();">Post</button>
   </div>
                        </div>
                      </div>
                  </div>
                </div>
          </div>
        </div>
      </section>
      <!-- end section -->
  <?php } ?> 
 
   <script>
        function apply(){
            var x1 = document.getElementById("locat").value.replace("+","＋").replace(/#/g,"＃").replace(/&/g,"＆").replace(/=/g,"＝").replace(/\\/g,"＼");
            var x2 = document.getElementById("descr").value.replace("+","＋").replace(/#/g,"＃").replace(/&/g,"＆").replace(/=/g,"＝").replace(/\\/g,"＼");
            var x3 = document.getElementById("numVolunteers").value.replace("+","＋").replace(/#/g,"＃").replace(/&/g,"＆").replace(/=/g,"＝").replace(/\\/g,"＼");
            var x4 = document.getElementById("crisis").value.replace("+","＋").replace(/#/g,"＃").replace(/&/g,"＆").replace(/=/g,"＝").replace(/\\/g,"＼");
            var x5 = document.getElementById("tripDate").value.replace("+","＋").replace(/#/g,"＃").replace(/&/g,"＆").replace(/=/g,"＝").replace(/\\/g,"＼");
            var obj, dbParam, xmlhttp, myObj, x;

            obj = {"table":"trip","locat":x1,"descr":x2,"numVolunteers":x3,"crisis":x4,"tripDate":x5};
            dbParam = JSON.stringify(obj);
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
                if (this.readyState == 4 && this.status ==200) {
                    myObj = JSON.parse(dbParam);
                    for (x in dbParam) {
                        if(myObj[x] != '') {
                            location.href='trips.php';
                            return false;
                            } else {
                                document.getElementById("demo").innerHTML = 'fail posting';
                            }
                        }
                    }
                };
                if((x2.trim() == "<br>"||x2.trim()=="")||(x1.trim() == "")) {
                    alert("Please enter your text");
                    return false;
                } else {
                    document.getElementById("descr").innerHTML = "";
                    xmlhttp.open("POST","tripadd.php",true);
                    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xmlhttp.send("x=" + dbParam);
               }
            }
   </script>
</body>
</html>
