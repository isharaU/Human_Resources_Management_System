<?php
if(!isset($_COOKIE["uname"]))// $_COOKIE is a variable and login is a cookie name 

	header("location:login.php"); 

?>
<?php
    $username=$_COOKIE['uname'];
    $userpassword=$_COOKIE['pass'];

include('user_config.php');
include('db_connector.php');

try {
    $conn = mysqli_connect($sname, $uname, $password, $db_name);
} catch (Exception $e) {
    echo "<p style='color:red;'>Database Connection Failed !</p>";
    exit();
}
?>

<?php
if(empty($_POST['xdate'])){
    header("location:leaveform.php?date=1");
}
echo $_POST['xleave_type'];
if(preg_match("/\b(Leave)\b/",$_POST['xleave_type'] )){
    header("location:leaveform.php?err=1");
}
?>

<?php
$date = (new DateTime("now", new DateTimeZone('Asia/Colombo') ))->format('Y-m-d');
$sql2 = mysqli_query($conn, "SELECT * FROM user WHERE user_name = '$username' AND password = '$userpassword'");
$row2 = mysqli_fetch_array($sql2);
$id=$row2['id'];
$row=mysqli_query($conn,"SELECT * FROM leave_requests WHERE id = '$id'  AND status in ('approved','Pending') AND date_of_leave = '".$_POST['xdate']."'");
if(0<(mysqli_num_rows($row))){
    header("location:leaveform.php?err=1");
}

mysqli_query($conn,"INSERT INTO leave_requests (id,type,date_of_leave,date_requested,status) VALUES ('$id','".$_POST['xleave_type']."','".$_POST['xdate']."','$date','Pending')");
header("Location: homepage.php");
?>