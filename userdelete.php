<?php
include("connection.php");
error_reporting(0);

$id = $_GET['ID'];
$query = "DELETE FROM user WHERE ID = '$id' ";

$data = mysqli_query($conn, $query);

if($data)
{
  echo "<script>alert('Record has been Deleted from Database')</script>";
  ?>
  <META HTTP-EQUIV="Refresh" CONTENT = "0; URL= http://localhost/xuan/MYMAID/user.php">
  <?php
}else{
  echo "<script>Failed to delete Record from Database</script>";
}
 ?>
