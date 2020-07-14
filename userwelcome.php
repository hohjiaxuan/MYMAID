<!DOCTYPE html>
<html>
<head>
  <title> MYMAID | ADMIN </title>
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

  .btn:hover 
  {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
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
    color: #666600;
    text-align: center;
    background-color: #ffff99;
  }

  td
    {
      text-align: center;
      background-color: #cc9933;
    }

  .without::-webkit-datetime-edit-ampm-field 
  {
   display: none;
  }
</style>
<SCRIPT SRC="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></SCRIPT>
</head>

<body style="background-color: #ff9393;">
  <?php include_once('userheader1.php'); ?>

  <center>
    <?php
    echo "<img src='img/MYMAID.png' alt='MYMAID' />";
    ?>

    <h1 style="font-family:Fonthead Designe; color: #fffbc1;">MAIDS OF MYMAID</h1>
    <p style="font-family:monospace; color: #990066;">Booking maid services!!!</p>
    <br>
    <br>
    <table border=3" cellspacing="9">
            <tr>
              <th>No.</th>
              <th>Profile Picture</th>
              <th>Firstname</th>
              <th>Lastname</th>
              <th>Gender</th>
              <th>Work Type</th>
              <th>Date</th>
              <th>Hour(s)</th>
              <th></th>
            </tr>

            <?php
            include("connection.php");
            error_reporting(0);
            $query = "SELECT * FROM maid ";
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
                    <td id='email$num' style='display:none'>".$result['Email']."</td>
                    <td id='maidID$num' >".$num."</td>
                    ";
                echo '<td> <img id="Pic'.$num.'" src="'.$result['Pic'].'" width="100"/></td>';
                echo "
                  <td id='fname$num' >".$result['Firstname']."</td>
                  <td id='lname$num' >".$result['Lastname']."</td>
                  <td id='gender$num' >".$result['Gender']."</td>
                  <td id='worktype$num' >".$result['Worktype']."</td>
                  ";
                  echo '<td>
                        <input id="date'.$num.'" type="date"/><br>
                      </td>';
                  echo '<td >
                    <input id="time1'.$num.'" type="time"/>
                    <br>
                    <label style="text-align:center;">to</label>
                    <br>
                    <input id="time2'.$num.'" type="time"/>
                    </td>
                  ';
                  
                  echo "
                  
                    <td > <a href='javascript:void(0)' id=$num onclick='call_function(this)'> BOOKING </a></td>
                    </tr>
                  ";
                  $num++;
              }
            } else {
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
function call_function (value) {
  console.log(value.id);
  var userEmail = "<?php echo $_SESSION['email'] ?>";
  var maidEmail = document.getElementById("email"+value.id).innerHTML;
  var fname = document.getElementById("fname"+value.id).innerHTML;
  var lname = document.getElementById("lname"+value.id).innerHTML;
  var gender = document.getElementById("gender"+value.id).innerHTML;
  var worktype = document.getElementById("worktype"+value.id).innerHTML;
  var date = document.getElementById("date"+value.id).value;
  var time1 = document.getElementById("time1"+value.id).value;
  var time2 = document.getElementById("time2"+value.id).value;
  console.log(userEmail);
  console.log(maidEmail);
  console.log(fname);
  console.log(lname);
  console.log(gender);
  console.log(worktype);
  if(date == "" || time1 == "" || time2 == "") {
    console.log("can not null");
  }
  // console.log(date);
  // console.log(time1);
  // console.log(time2);
  console.log('booking.php?userEmail='+userEmail +'&maidEmail='+maidEmail+'&fname='+fname +'&lname='+lname +'&gender='+gender +'&date='+date+ '&time1='+time1 +'&time2='+time2 +'&action=BOOKING');
  $.get({
      url: 'booking.php?userEmail='+userEmail +'&maidEmail='+maidEmail+'&fname='+fname +'&lname='+lname +'&gender='+gender +'&date='+date+ '&time1='+time1 +'&time2='+time2 +'&action=BOOKING', 
      success: function(result){
          console.log(result);
      }
    }
  );
  return false;
}
</script>
</body>
</html>

