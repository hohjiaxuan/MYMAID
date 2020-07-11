<!--
this is second header file which is visible after login.
-->

<?php
include_once('link.php');
session_start();
$email = $_SESSION['email'];
?>


<nav class="navbar navbar-default">
	<div class="container-fluid">
		<?php
		echo "<img src='img/MYMAID.png' alt='MYMAID' width='50' height='45' />";
		?>
		<div class="navbar-header">
			<a href="UserRegistration.php" class="navbar-brand">Registration</a>
			<a href="userlogin.php" class="navbar-brand">Login</a>
		</div>

		<div class="dropdown navbar-right" id="right">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><?php echo $email;?>
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
  	<!-- <li><a href="admindetail.php">MYMAID</a></li> -->
		<li><a href="maiddetail.php">Maid</a></li>
		<li><a href="useraccount.php">Account</a></li>
    <li><a href="userlogout.php">Logout</a></li>
  </ul>
</div>
	</div>
</nav>
