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
    <h1>USER OF MYMAID</h1>
    <p>It display users' details.</p>
    <br>
    <button name="add" onclick="location.href='useradd.php'" > Add</button>
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
            $query = "SELECT * FROM user ";
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
                  <td><a href = 'useredit.php?ID=$result[ID]' onclick='return checkedit()'> Edit / Update </td>
                  <td><a href = 'userdelete.php?ID=$result[ID]'onclick='return checkdelete()'> Delete </td>
                </tr>
                ";
                // echo '<td><img src="'.$result['Pic'].'"/></td>';
                // echo $result['Pic'];
                // echo '<img src="img\VLOG2.png"/>';
                // echo "<td> <img src="/uploads/' alt='MYMAID' /> </td>";
                // echo "<td> <img src='.$result['Pic'].' alt='MYMAID' /> </td>";
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
