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
    $password=$_GET["Password"];
    $pic='img/'.$_GET["Pic"];
    $query = "INSERT INTO user (Firstname,Lastname,Gender,Email,Password,Pic) VALUES ('$fname','$lname','$gender','$email','$password','$pic')";
    $data = mysqli_query($conn, $query);
    if($data)
    {
      header("Location: user.php");
    }else {
      echo "Failed to Updated Record";
    }
  }

?>

 <html>
 <head>
   <title>MYMAID</title>

   <style>
      table
      {
        color: #fffbc1;
        width:400px;
        border-radius:20px;
        table-layout: fixed;
      }

        .button
        {
          background-color: #fffbc1;
          color: #362511;
          height: 32px;
          width: 125px;
          border-radius: 25px;
          font-size: 16px;
        }

        body
        {
          background-color: #eb4034;
        }
   </style>
 </head>

 <body>
   <div align=center>
     <?php
     echo "<img src='img/MYMAID.png' alt='MYMAID' width='320' height='285' />";
     $id=$_GET["ID"];
     $query = "SELECT * FROM `user` WHERE ID=".$id;
     $data = mysqli_query($conn, $query);
     $total = mysqli_num_rows($data);
     // echo $total;
     while($result=mysqli_fetch_assoc($data))
     {
       $fname=$result['Firstname'];
       $lname=$result['Lastname'];
       $gender=$result['Gender'];
       $email=$result['Email'];
       $pic=$result['Pic'];
     }
    ?>
  </div>
  <h1 style="font-size:80px; font-family:Fonthead Designe; color: #fffbc1; text-align: center;">MYMAID</h1>
  <p style="font-size:32px; font-family:monospace; font-weight: bold; color: #ffcc00; text-align: center;">USER | ADD PROFILE</p>
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
         <td><input type="radio" name="Gender" value="Male">Male</td>
         <td><input type="radio" name="Gender" value="Female">Female</td>
       </tr>
       <tr>
         <td>Email</td>
         <td><input type="text" value="<?php echo "$email" ?>" name="Email" required></td>
       </tr>
       <tr>
         <td>Password</td>
         <td><input type="text" value="<?php echo "$password" ?>" name="Password" required></td>
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
 </body>
 </html>

?>
