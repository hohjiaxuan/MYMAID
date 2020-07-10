<!--
Here, we write code for registration.
-->
<?php
require_once('connection.php');
$fname = $lname = $gender = $email = $password = $pwd = '';

$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$pwd = $_POST['password'];
$pic = $_POST['pic'];
$password = MD5($pwd);

$sql = "INSERT INTO admin (Firstname,Lastname,Gender,Email,Password,Pic) VALUES ('$fname','$lname','$gender','$email','$password','$pic')";
$result = mysqli_query($conn, $sql);
if($result)
{
	header("Location: adminlogin.php");
}
else
{
	echo "Error :".$sql;
}
?>
