<!--
Into this file, we create a layout for registration page.
-->
<?php
include_once('maidheader.php');
include_once('link.php');
?>

<div id="frmRegistration">
<form class="form-horizontal" action="maidregistration_code.php" method="POST">
	<h1>Maid Registration</h1>
	<div class="form-group">
    <label class="control-label col-sm-2" for="firstname">First Name:</label>
    <div class="col-sm-6">
      <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Enter Firstname" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="lastname">Last Name:</label>
    <div class="col-sm-6">
      <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Enter Lastname" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="gender">Gender:</label>
    <div class="col-sm-6">
      <label class="radio-inline"><input type="radio" name="gender" value="Male">Male</label>
	  <label class="radio-inline"><input type="radio" name="gender" value="Female">Female</label>
    </div>
  </div><br>
  <div class="form-group">
    <label class="control-label col-sm-2" for="lastname">Work Type:</label>
    <div class="col-sm-6">
        <select name="Worktype">
              <option  value="Full-Time">Full-Time</option>
              <option value="Part-Time">Part-Time</option>
        </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-6">
      <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Password:</label>
    <div class="col-sm-6">
      <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter password" required>
    </div>
  </div>
	<div class="form-group">
    <label class="control-label col-sm-2" for="pic">Profile Picture:</label>
    <div class="col-sm-6">
      <input type="file" name="pic" class="form-control" id="pic" accept="image/*" required>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="create" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>
</div>
