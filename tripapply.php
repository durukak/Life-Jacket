<?php
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);
$con = new mysqli("localhost", "root", "1234", "lifejacket");
mysqli_query($con,'SET NAMES utf8');
$locat = addslashes($obj->locat);
$descr = addslashes($obj->descr);
$numVolunteers = addslashes($obj->numVolunteers);
$crisis = addslashes($obj->crisis);
$stmt = $con->prepare("INSERT INTO $obj->table(descr, locat, numVolunteers, crisis) VALUES ('$descr','$locat','$numVolunteers', '$crisis')");
$stmt->execute();
$sql = "select * from trip where locat ='$locat' and descr ='$descr'and numVolunteers = '$numVolunteers'  and crisis = '$crisis' ";
$res = $con->query($sql);
if($res->num_rows > 0) {
    echo json_encode('1');
    exit();
} else {
    echo json_encode('0');
}
?>