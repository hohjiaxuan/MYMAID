<!--
Here, we write code for signup.
-->
<?php
require_once('connection.php');
$fname = $lname = $gender = $email = $password = $pwd = '';

$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$gender = $_POST['gender'];
$user_type = $_POST['user_type'];
$email = $_POST['email'];
$pwd = $_POST['password'];
$pic = 'img/'.$_POST['pic'];
$password = MD5($pwd);

if($user_type == 'Customer') {
	$sql = "INSERT INTO user (Firstname,Lastname,Gender,Email,Password,Pic) VALUES ('$fname','$lname','$gender','$email','$password','$pic')";
} else {
	$worktype = $_POST['worktype'] == 'Full-Time'? 0 : 1;
	$sql = "INSERT INTO maid (Firstname,Lastname,Gender,Email,Password,Pic,Worktype) VALUES ('$fname','$lname','$gender','$email','$password','$pic', '$worktype')";
}


$result = mysqli_query($conn, $sql) or die("Error");
if($result)
{
	header("Location: signin.php");
}
else
{
	echo "Error :".$sql;
}
?>
