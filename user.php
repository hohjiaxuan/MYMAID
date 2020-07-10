<!--
Into this file, we create a layout for welcome page.
-->

<?php
// include_once('link.php');
// include_once('adminheader1.php');
// require_once('connection.php');
//
// $id = $_SESSION['id'];
// $fname = $lname = $email = $gender = '';
// $sql = "SELECT * FROM admin WHERE ID='$id'";
// $result = mysqli_query($conn, $sql);
// if(mysqli_num_rows($result) > 0)
// {
// 	while($row = mysqli_fetch_assoc($result))
// 	{
// 		$fname = $row["Firstname"];
// 		$lname = $row["Lastname"];
// 		$email = $row["Email"];
// 		$gender = $row["Gender"];
// 	}
// }

?>
<!-- <div class="jumbotron">
	<center>
		<h1>Welcome <?php echo $fname." ".$lname; ?></h1>

	</center>
</div> -->
<!DOCTYPE html>
<html>
<head>
  <title> MYMAID | ADMIN </title>
<style type="text/css">

  body{
    background-color: #ff9393;
  }

  h1{
    color: #fffbc1;
  }

  #editbtn{
    background-color: #fffbc1;
    color:#362511;
    text-align: center;
    font-size: 25px;
    margin: 4px 2px;
    cursor: pointer;
    width: 250px;
  }

  #deletebtn{
    background-color: #fffbc1;
    color:#362511;
    text-align: center;
    font-size: 25px;
    margin: 4px 2px;
    cursor: pointer;
    width: 250px;
  }

  .btn:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}

  table{
      border-collapse: collapse;
      width: 100%;
      color: #eb4034;
      font-family: monospace;
      font-size: 25px;
      text-align: left;
      }

    th{
    background-color: #eb4034;
    color: yellow;
    }

    tr:nth-child(even) {background-color: #ededed}

</style>
</head>

<body>
  <?php include_once('userheader1.php'); ?>

  <center>
    <?php
    echo "<img src='img/MYMAID.png' alt='MYMAID' />";
    ?>
    <h1>ADMIN OF MYMAID</h1>
    <p>It display users' details.</p>
    <br>
    <br>
    <table border="2" cellspacing="8">
            <tr>
              <th>ID</th>
              <th>Profile Picture</th>
              <th>Firstname</th>
              <th>Lastname</th>
              <th>Gender</th>
              <th>Email</th>
              <th colspan="2" align="center" >Operation</th>
            </tr>

            <?php
            include("connection.php");
            error_reporting(0);
            $query = "SELECT * FROM maid ";
            $data = mysqli_query($conn, $query);
            $total = mysqli_num_rows($data);

            if($total != 0)
            {
              while($result=mysqli_fetch_assoc($data))
              {
                echo "
                <tr>
                  <td>".$result['ID']."</td>
                  ";
                  echo '<td><img src="'.$result['Pic'].'" width="100"/></td>';
                echo "
                  <td>".$result['Firstname']."</td>
                  <td>".$result['Lastname']."</td>
                  <td>".$result['Gender']."</td>
                  <td>".$result['Email']."</td>
                  <td><a href = 'adminedit.php?ID=$result[ID]' onclick='return checkedit()'> Edit / Update </td>
                  <td><a href = 'admindelete.php?ID=$result[ID]'onclick='return checkdelete()'> Delete </td>
                </tr>
                ";
              }
            }else{
              echo"No records found";
            }
            ?>
        </table>
  </center>

<script>
function checkdelete()
{
  return Confirm('Are you sure you want to Delete this Record');
}
</script>

</body>
</html>
