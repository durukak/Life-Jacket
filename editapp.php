<?php
$con = new mysqli("localhost","root","1234","lifejacket");
$db = mysqli_select_db($con, 'lifejacket');
$appID = $_GET['x'];
if(isset($_POST['savedata']))
{
    $status = $_POST['status'];
    $remarks = $_POST['remarks'];

    $query = "UPDATE application SET status='$status', remarks='$remarks'
    WHERE appID=$appID";
    $query_run= mysqli_query($con, $query);

    if($query_run)
    {
        echo "<script>alert('Update Saved ');location.href='viewapp.php';</script>";
    }
    else
    {
        echo "<script>alert('Update Not Saved ');location.href='viewapp.php';</script>";
    }
}
?>
