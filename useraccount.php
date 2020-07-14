<!--
Into this file, we write a code for display user information.
-->

<?php
include_once('link.php');
include_once('userheader1.php');
include("connection.php");

if($_GET && $_GET["ID"]) {
    $id = $_GET["ID"];
    $date = $_GET["date"];
    $workStart = $_GET["workStart"];
    $workEnd = $_GET["workEnd"];
    // echo $id;

    $query = "DELETE FROM employment WHERE maidID = '$id' and date = '$date' and work_start_hour = '$workStart' and work_end_hour = '$workEnd'";
    // echo  $query;
    $data = mysqli_query($conn, $query);
    if($data)
    {
        echo "<script>alert('Record has been Deleted from Database')</script>";
        ?>
            <META HTTP-EQUIV="Refresh" CONTENT = "0; URL=http://127.0.0.1/xuan/MYMAID/useraccount.php">
        <?php
    } else{
        echo "<script>Failed to delete Record from Database</script>";
    }
} 
$query = "SELECT * FROM user where `ID` = ".$_SESSION['id'];
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);

if($total != 0)
{
    while($result=mysqli_fetch_assoc($data))
    {
        $fname = $result["Firstname"];
		$lname = $result["Lastname"];
		$email = $result["Email"];
        $gender = $result["Gender"];
        $pic = $result["Pic"];
        
    }
}else{
    echo"No records found";
}
?>
<div id="account">
<div class="col-lg-6 col-sm-6">
    <div class="card hovercard">
        <div class="card-background">
            <img class="card-bkimg" alt="" src="">
        </div>
        <div class="useravatar">
            <img alt="" src="<?php echo $pic ?>">
        </div>
        <div class="card-info"> <span class="card-title"><?php echo $fname." ".$lname; ?> </span>

        </div>
    </div>
    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="hidden-xs">Profile</div>
            </button>
        </div>

    </div>

    <div class="well">
      <div class="tab-content">
        <div class="tab-pane fade in active" id="tab1">
        <table class="table">
            <?php
                if($total != 0)
                {
                    echo "
                        <tr>
                            <td>First Name</td>
                            <td>".$fname."</td>
                        </tr>
                        <tr>
                            <td>Last Name</td>
                            <td>".$lname."</td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>".$gender."</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>".$email."</td>
                        </tr>
                        
                    ";
                }else{
                    echo"No records found";
                }
            ?>
          </table>
          <?php 

          ?>
          <form action="" method="post">
            <div style="text-align: center;">      
                <button style="width:150px; height:85; background-color:#fffbc1; color:#362511; border-color:#362511; font-size:20px; font-weight: bold;" onclick="edit-acc()"> Edit Profile </button>
            </div>
            </form>
        </div>
      </div>
    </div>
    <div class="tab-pane fade in active" id="tab2" style="height:450px; width:850px; text-align:center;">
            <table border="1" cellspacing="25" style="table-layout:fixed; text-align:center; height:100px; width:850px; " >
                <tr>
                    <th>No.</th>
                    <th>Profile Picture</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Gender</th>
                    <th>working time</th>
                    <th></th>
                </tr>

                <?php
                    include("connection.php");
                    error_reporting(0);
                    
                    // echo $_SESSION['email'];
                    $query = "SELECT * FROM `employment` WHERE `userID` = '".$_SESSION['email']."'";
                    // echo $query;
                    $data = mysqli_query($conn, $query);
                    $total = mysqli_num_rows($data);
                    // echo $total;
                    if($total != 0)
                    {
                        $count = 1;
                        while($result=mysqli_fetch_assoc($data))
                        {
                            $maidID = $result['maidID'];
                            $date = $result['date'];
                            $workStart = $result['work_start_hour'];
                            $workEnd = $result['work_end_hour'];

                            $query = "SELECT * FROM `maid` WHERE `Email` = '".$maidID."'";
                            $data2 = mysqli_query($conn, $query);
                            echo "<tr>";
                            // echo $maidID;
                            while($result=mysqli_fetch_assoc($data2))
                            {
                                echo "
                                    <td>".($count)."</td>
                                ";
                                echo '<td><img src="'.$result['Pic'].'" width="100"/></td>';
                                echo "
                                    <td>".$result['Firstname']."</td>
                                    <td>".$result['Lastname']."</td>
                                    <td>".$result['Gender']."</td>
                                ";
                                
                                echo "<td><div id = ".$date.">".$date."</div>
                                     from 
                                     <div id = ".$workStart.">".$workStart."</div>
                                     to 
                                     <div id = ".$workEnd.">".$workEnd."</div>
                                     </td>";
                                echo"
                                    <td><a href = 'useraccount.php?ID=$maidID&date=$date&workStart=$workStart&workEnd=$workEnd'> Cancel Bocking </td>
                                ";
                                $count++;
                            }
                            echo "</tr>";
                        }
                    } else{
                        echo"  No Records Found";
                    }
                ?>
            </table>
        </div>
    </div>
    </div>
