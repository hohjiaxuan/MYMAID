<!--
Here, we write code for signin.
-->
<?php
require_once('connection.php');
session_start();


$email = $password = $pwd = '';

$email = $_POST['email'];
$_SESSION['email'] = $email;
echo "<script type='text/javascript'>alert('$email');</script>";
$pwd = $_POST['password'];
$user_type = $_POST['user_type'];
$password = MD5($pwd);
$head = "";

if($user_type == 'Admin') {
	$sql = "SELECT * FROM `admin` WHERE `Email` = '$email' and `Password`= '$password'";
	$head = "Location: adminwelcome.php";
} else if($user_type == 'Customer') { 
	$sql = "SELECT * FROM `user` WHERE `Email` = '$email' and `Password`= '$password'";
	$head = "Location: userwelcome.php";
} else if ($user_type == 'Maid') {
	$sql = "SELECT * FROM `maid` WHERE `Email` = '$email' and `Password`= '$password'";
	$head = "Location: maidaccount.php";
} else {
	echo "Invalid email or password";
}
// echo $head;
$result = mysqli_query($conn, $sql)or die("Error");
$total = mysqli_num_rows($result);
if($total != 0)
{
	echo $head;
    header($head);
}

?>
