<!DOCTYPE html>
<html>
<head>
  <title> MYMAID | MAID </title>

<style type="text/css">

  #editbtn
  {
    background-color: #fffbc1;
    color:#362511;
    text-align: center;
    font-size: 25px;
    margin: 4px 2px;
    cursor: pointer;
    width: 250px;
  }

  #deletebtn
  {
    background-color: #fffbc1;
    color:#362511;
    text-align: center;
    font-size: 25px;
    margin: 4px 2px;
    cursor: pointer;
    width: 250px;
  }

  table
    {
      width: 100%;
      height: 100px;
      color: #362511;
      font-size: 25px;
      text-align: center;
      font-family: monospace;
      border-collapse: collapse;
    }

    th
    {
      width: 100px;
      height: 95px;
      color: #ffff99;
      text-align: center;
      background-color: #996633;
    }

    td
    {
      background-color: #99cc66;
    }

    .add
    {
      color: #362511;
      width:150px;
      height: 40px;
      font-weight:bold;
      background-color: #fffbc1;
    }

</style>
</head>

<body style="background-color: #ff9393;">
    <?php include_once('adminheader1.php'); ?>
  <center>
    <?php
    echo "<img src='img/MYMAID.png' alt='MYMAID' />";
    ?>
    <h1 style="font-family:Fonthead Designe; color: #fffbc1;">MAID OF MYMAID</h1>
    <p style="font-family:monospace; color: #990066;">It display maids' details.</p>
    <br>
    <button name="add" onclick="location.href='maidadd.php'" class="add"> Add</button>
    <br><br><br>
    <script>
        function deleteRecord(persion) {
            // console.log("Are you want to Delete?");
            if (confirm("Press a button!")) {
              // console.log(persion.id);
              // console.log('admindelete.php?ID='+persion.id);
              $.get({
                  url: 'maiddelete.php?ID='+persion.id, 
                  success: function(result){
                    location.reload();
                  }
                }
              );
            }
        }
    </script>
    <table border="3" cellspacing="9">
            <tr>
              <th>No.</th>
              <th>Profile Picture</th>
              <th>Firstname</th>
              <th>Lastname</th>
              <th>Gender</th>
              <th>Work Type</th>
              <th>Email</th>
              <th colspan="3" align="center" >Operation</th>
            </tr>

            <?php
            include("connection.php");
            error_reporting(0);
            $query = "SELECT * FROM maid ";
            $data = mysqli_query($conn, $query);
            $total = mysqli_num_rows($data);
            $per = 5;
            $pages = ceil($total/$per);

            if (!isset($_GET["page"])){ 
              $page=1; 
            } else {
                $page = intval($_GET["page"]); 
            }
            $start = ($page-1)*$per;
            $data2 = mysqli_query($conn,$query.' LIMIT '.$start.', '.$per) or die("Error");

            if($total != 0)
            {
              $num = 1;
              while($result=mysqli_fetch_assoc($data2))
              {
                $workType = $result['Worktype']==0?'Full-Time':'Part-Time';
                echo "
                <tr>
                  <td id='maidID$num' >".$num."</td>
                  ";
                  echo '<td> <img id="Pic'.$num.'" src="'.$result['Pic'].'" width="100"/></td>';
                  echo "
                    <td id='fname$num' >".$result['Firstname']."</td>
                    <td id='lname$num' >".$result['Lastname']."</td>
                    <td id='gender$num' >".$result['Gender']."</td>
                    <td id='worktype$num' >".$workType."</td>
                    <td id='email$num' >".$result['Email']."</td>
                    <td><a href = 'maidedit.php?ID=$result[ID]'> Edit / Update </td>
                    <td><a id='$result[ID]' onclick='deleteRecord(this)' > Delete </td>
                    </tr>
                  ";
                $num++;
              }
            }else{
              echo"No records found";
            }
            ?>
        </table>

        <?php
          echo 'Total '.$total.' Collection of Data - On Page '.$page.' - Total '.$pages.' Pages';
          echo "<br /><a href=?page=1>First Page</a> ";
          echo "No. ";
          for( $i=1 ; $i<=$pages ; $i++ ) {
              if ( $page-3 < $i && $i < $page+3 ) {
                  echo "<a href=?page=".$i.">".$i."</a> ";
              }
          } 
          echo " Page <a href=?page=".$pages.">LastPage</a><br /><br />";
        ?>
        
  </center>

<script>
function check_delete(value)
{
  var x = confirm("Are you sure you want to delete?");
  if (x){
    return true;
  }
  else{
    return false;
  }
}
</script>
</body>
</html>
