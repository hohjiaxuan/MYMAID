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
			<a href="index.html" class="navbar-brand">MY MAID</a>
		</div>

		<div class="dropdown navbar-right" id="right">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><?php echo $email;?>
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
		<li><a href="maidaccount.php">Account</a></li>
    <li><a href="maidlogout.php">Logout</a></li>
  </ul>
</div>
	</div>
</nav>
