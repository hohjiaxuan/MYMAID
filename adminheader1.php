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
			<a href="adminwelcome.php" class="navbar-brand">MYMAID</a>
		</div>

		<div class="dropdown navbar-right" id="right">
		<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><?php echo $email;?>
  		<span class="caret"></span></button>
  		<ul class="dropdown-menu">
		  <li><a href="adminwelcome.php">Admin</a></li>
			<li><a href="maid.php">Maid</a></li>
			<li><a href="user.php">User</a></li>
			<li><a href="adminaccount.php">Account</a></li>
    		<li><a href="adminlogout.php">Logout</a></li>
  		</ul>
		</div>
	</div>
</nav>
