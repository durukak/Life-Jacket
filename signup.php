<?php
$errors = array();

//connect to database, set db user and password
header("Content-Type: text/html; charset=UTF-8");
$con = new mysqli("localhost", "root", "1234", "lifejacket");
mysqli_query($con,'SET NAMES utf8');

//input data on register form
$username = $_POST['username'];
$password = $_POST['password'];
$name= $_POST['name'];
$phone = $_POST['phone'];

//check validate that the form is appropriate
if(empty($username)) {array_push($errors, "Username is required");}
if(empty($password)) {array_push($errors, "password is required");}
if(empty($name)) {array_push($errors, "Name is required");}
if(empty($phone)) {array_push($errors, "Phone number is required");}


$sql= "insert into volunteer (username,password,name,phone) values('$username','$password', '$name', '$phone')";
$res = $con->query($sql);
echo"<script>location.href='login.html';</script>"
?>