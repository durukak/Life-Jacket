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
   .mainBoard{
       width: 800px;
       margin: 50px auto 0px;
   }
   
   body{
      font-size : 20px;
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
