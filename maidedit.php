<?php
include("connection.php");
error_reporting(0);
$id=$_GET["ID"];
  if($_GET['submit'])
  {
    $id=$_GET["ID"];
    $fname=$_GET["Firstname"];
    $lname=$_GET["Lastname"];
    $gender=$_GET["Gender"];
    $email=$_GET["Email"];
    $pic='img/'.$_GET["Pic"];
    $worktype=$_GET["Worktype"] == "Full-Time"?0 : 1;
    $query = "UPDATE `maid` SET Firstname = '$fname', Lastname = '$lname', Gender = '$gender', Email = '$email', Pic = '$pic', Worktype = '$worktype'  WHERE ID =' $id' ";
    $data = mysqli_query($conn, $query);
    
    if($data)
    {
      header("Location: maid.php");
    } else {
      echo "Failed to Updated Record";
    }
  }
 ?>

 <html>
 <head>
   <title>MYMAID</title>

   <style>
      table{
            color: #fffbc1;
            width:400px;
            border-radius:20px;
            table-layout: fixed;
            }

        .button{
            background-color: #fffbc1;
            color: #362511;
            height: 32px;
            width: 125px;
            border-radius: 25px;
            font-size: 16px;
        }

   </style>
 </head>

 <body style="background-color: #eb4034;">
   <div align=center>
     <?php
     echo "<img src='img/MYMAID.png' alt='MYMAID' width='320' height='285' />";
     $id=$_GET["ID"];
     $query = "SELECT * FROM `maid` WHERE ID=".$id;
     $data = mysqli_query($conn, $query);
     $total = mysqli_num_rows($data);
     while($result=mysqli_fetch_assoc($data))
     {
       $fname=$result['Firstname'];
       $lname=$result['Lastname'];
       $gender=$result['Gender'];
       $email=$result['Email'];
       $pic=$result['Pic'];
       $worktype=$result['Worktype'];
     }
    ?>
  </div>
   <h1 style="font-size:80px; font-family:Fonthead Designe; color: #fffbc1; text-align: center;">MYMAID</h1>
   <p style="font-size:32px; font-family:monospace; font-weight: bold; color: #ffcc00; text-align: center;">MAID | EDIT/UPDATE PROFILE</p>
   <form action="" method="GET">
     <center>
     <table border="0" bgcolor="#362511 align="center" cellspacing="20">
       <tr>
         <td>ID</td>
         <td><input type="text" value="<?php echo "$id" ?>" name="ID" required></td>
       </tr>
       <tr>
         <td>Firstname</td>
         <td><input type="text" value="<?php echo "$fname" ?>" name="Firstname" required></td>
       </tr>
       <tr>
         <td>Lastname</td>
         <td><input type="text" value="<?php echo "$lname" ?>" name="Lastname" required></td>
       </tr>
       <tr>
         <td>Gender</td>
         <td><input type="text" value="<?php echo "$gender" ?>" name="Gender" required></td>
       </tr>
       <tr>
         <td>Work Type</td>
            <td><select id="workType" name="Worktype">
                <option value="Full-Time">Full-Time</option>
                <option value="Part-Time">Part-Time</option>
            </select></td>
       </tr>
       <tr>
         <td>Email</td>
         <td><input type="text" value="<?php echo "$email" ?>" name="Email" required></td>
       </tr>
       <tr>
         <td>Profile Picture</td>
         <td><input type="file" name="Pic" class="form-control" id="pic" accept="image/*" required></td>
       </tr>
       <tr>
         <td colspan="2" align="center"><input type="submit" id="btn" name="submit" value="Update Details"></a></td>
       </tr>
     </table>
     <label style="font-weight:bold; font-size:30px;"><a href="<?php echo $_SERVER['HTTP_REFERER'];?>"> BACK </a></label>
   </center>
   </form>
   <script> 
      let workType = "<?php echo $worktype ?>"
      let e = document.getElementById("workType");
      console.log(e.options[e.selectedIndex].value)
      if(workType == 0) {
        e.selectedIndex=0;
      } else {
        e.selectedIndex=1;
      }
   </script>
 </body>
 </html>