<?php
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);
$con = new mysqli("localhost", "root", "1234", "lifejacket");
mysqli_query($con,'SET NAMES utf8');
$locat = addslashes($obj->locat);
$descr = addslashes($obj->descr);
$numVolunteers = addslashes($obj->numVolunteers);
$crisis = addslashes($obj->crisis);
$tripDate = addslashes($obj->tripDate);
$tripID = $obj->tripID;
$stmt = $con->prepare("UPDATE $obj->table SET 
descr='$descr',
locat='$locat',
numVolunteers='$numVolunteers',
crisis='$crisis', tripDate='$tripDate'
WHERE tripID='$tripID'");
$stmt->execute();
$sql = "select * 
from trip 
where locat ='$locat' 
and descr ='$descr'
and numVolunteers = '$numVolunteers' 
and crisis = '$crisis' 
and tripDate = '$tripDate'
and tripID = '$tripID";
$res = $con->query($sql);
if($res->num_rows > 0) {
    echo json_encode('1');
    exit();
} else {
    echo json_encode('0');
}
?>