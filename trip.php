<!DOCTYPE html>
<html lang="en">
<head>
    <title>HomePage</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="body">
<?php 
header("Content-Type: text/html; charset=UTF-8");
session_start();
?>
<?php
if((!isset($_SESSION['username'])) && (!isset($_SESSION['name'])) && (!isset($_SESSION['phone']))) {?>
<script>alert('No access exept for staffs');
location.href='trips.php';</script>

  
  <?php } else {?>
    <header class="mainHeader">
    <nav><ul>
      <li class="active"><a href="lifejacket.php">LIFE JACKET</a></li>
      <li><a href="about.html">About Us</a></li>
      <li><a href="trips.php">Trips</a></li>
      <li><a href="member.html">Members</a></li>
      <li><a href="mypage.html">My Page</a></li>
    </ul></nav>
  </header>
    <a href="logout.php">Logout</a><br>

    <table><tr><th>No</th><th>Title</th><th>Writer</th><th>Date</th><th>Views</th></tr></table>
    <button onclick="location.href='tripwrite.php'">Add</button>
  <?php } ?>
  </body>
  </html>
