<!--
this is header file which is visible in registration and login page.
-->
<?php
include_once('link.php');

?>

<nav class="navbar navbar-default">
	<div class="container-fluid">
		<?php
		echo "<img src='img/MYMAID.png' alt='MYMAID' width='50' height='45' />";
		?>
		<div class="navbar-header">
			<a href="#" class="navbar-brand">MY MAID | Registration Login</a>
		</div>
		<ul class="nav navbar-nav">
			<li><a href="index.html">Home</a></li>
			<li><a href="adminregistration.php">Registration</a></li>
			<li><a href="adminlogin.php">Login</a></li>
		</ul>
	</div>
</nav>
