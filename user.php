<!DOCTYPE html>
<html>
<head>
  <title> MYMAID | USER </title>

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
      color: #996633;
      font-size: 25px;
      text-align: center;
      font-family: monospace;
      border-collapse: collapse;
    }

    th
    {
      width: 100px;
      height: 95px;
      color: #ffffcc;
      text-align: center;
      background-color: #003300;
    }

    td
    {
      text-align: center;
      background-color: #cccc33;
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
<SCRIPT SRC="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></SCRIPT>
</head>

<body style="background-color: #ff9393;">
    <?php include_once('adminheader1.php'); ?>
  <center>
    <?php
    echo "<img src='img/MYMAID.png' alt='MYMAID' />";
    ?>
    <h1 style="font-family:Fonthead Designe; color: #fffbc1;">USER OF MYMAID</h1>
    <p style="font-family:monospace; color: #990066;">It display users' details.</p>
    <br>
    <button name="add" onclick="location.href='useradd.php'" class="add"> Add </button>
    <br><br><br>
    <table border="3" cellspacing="15">
            <tr>
              <th>No.</th>
              <th>Profile Picture</th>
              <th>Firstname</th>
              <th>Lastname</th>
              <th>Gender</th>
              <th>Email</th>
              <th colspan="3" align="center" >Operation</th>
            </tr>

            <?php
            include("connection.php");
            error_reporting(0);
            $query = "SELECT * FROM user ";
            $data = mysqli_query($conn, $query);

            $total = mysqli_num_rows($data);
            $per = 5; //每頁顯示項目數量
            $pages = ceil($total/$per);

            if (!isset($_GET["page"])){ //假如$_GET["page"]未設置
              $page=1; //則在此設定起始頁數
            } else {
                $page = intval($_GET["page"]); //確認頁數只能夠是數值資料
            }
            $start = ($page-1)*$per; //每一頁開始的資料序號
            $data2 = mysqli_query($conn,$query.' LIMIT '.$start.', '.$per) or die("Error");

            if($total != 0)
            {
              $num = 1;
              while($result=mysqli_fetch_assoc($data2))
              {
                echo "
                <tr>
                <td id='userID$num' >".$num."</td>
                ";
                echo '<td> <img id="Pic'.$num.'" src="'.$result['Pic'].'" width="100"/></td>';
                echo "
                <td id='fname$num' >".$result['Firstname']."</td>
                <td id='lname$num' >".$result['Lastname']."</td>
                <td id='gender$num' >".$result['Gender']."</td>
                <td id='email$num' >".$result['Email']."</td>
                <td><a href = 'useredit.php?ID=$result[ID]' onclick='return checkedit()'> Edit / Update </td>
                <td><a href = 'userdelete.php?ID=$result[ID]'onclick='return checkdelete()'> Delete </td>
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
function checkdelete()
{
  return Confirm('Are you sure you want to Delete this Record');
}
</script>
</body>
</html>
