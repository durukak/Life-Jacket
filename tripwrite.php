<!DOCTYPE html>
<html lang="en">
<head>
    <title>LIFEJACKET</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body class="body">
<?php 
header("Content-Type: text/html; charset=UTF-8");
session_start();
?>
<?php
if((!isset($_SESSION['username'])) && (!isset($_SESSION['name'])) && (!isset($_SESSION['phone']))) {?>
  <header>
    <div class="navbar-header">
      <a class="navbar-brand" href="lifejacket.php">LIFE JACKET</a>
    </div>
    <nav nav class="nav navbar-nav navbar-right"><ul class="nav navbar-nav">
      <li class="active"><a href="about.html">About Us</a></li>
      <li><a href="trips.php">Trips</a></li>
      <Li><a href="member.Html">Members</a></li>
      <li><a href="mypage.html">My Page</a></li>
      <li><a href="login.html"><span class="glyphicon glyphicon-log-in"></span>Login</a></li>
    </ul></nav>
  </header>

  <?php } else {?>
    <?php
    if((!isset($_SESSION['username'])) && (!isset($_SESSION['name'])) && (!isset($_SESSION['phone']))) ?>
    <header>
    <div class="navbar-header">
      <a class="navbar-brand" href="lifejacket.php">LIFE JACKET</a>
    </div>
    <nav nav class="nav navbar-nav navbar-right"><ul class="nav navbar-nav">
      <li class="active"><a href="about.html">About Us</a></li>
      <li><a href="trips.php">Trips</a></li>
      <li><a href="member.html">Members</a></li>
      <li><a href="mypage.html">My Page</a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
    </ul></nav>
  </header>
  <?php } ?> 
<body>
    Location<textarea id="locat"></textarea><br>
    Number of volunteers<textarea id="numVolunteers"></textarea><br>
    Crisis<textarea id="crisis"></textarea><br>
    Description
    <textarea id="descr"></textarea>
    <div id="demo"></div>
    <button style="border:1px solid;" onclick="apply();">Post</button>
    <script>
        function apply(){
            var x1 = document.getElementById("locat").value.replace("+","＋").replace(/#/g,"＃").replace(/&/g,"＆").replace(/=/g,"＝").replace(/\\/g,"＼");
            var x2 = document.getElementById("descr").value.replace("+","＋").replace(/#/g,"＃").replace(/&/g,"＆").replace(/=/g,"＝").replace(/\\/g,"＼");
            var x3 = document.getElementById("numVolunteers").value.replace("+","＋").replace(/#/g,"＃").replace(/&/g,"＆").replace(/=/g,"＝").replace(/\\/g,"＼");
            var x4 = document.getElementById("crisis").value.replace("+","＋").replace(/#/g,"＃").replace(/&/g,"＆").replace(/=/g,"＝").replace(/\\/g,"＼");
            var obj, dbParam, xmlhttp, myObj, x;

            obj = {"table":"trip","locat":x1,"descr":x2,"numVolunteers":x3,"crisis":x4};
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
                    xmlhttp.open("POST","tripapply.php",true);
                    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xmlhttp.send("x=" + dbParam);
               }
            }
            </script>
        
  </body>
  </html>
