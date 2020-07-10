<!--
Into this file, we write a code for display user information.
-->

<?php
include_once('link.php');
include_once('maidheader1.php');
include("connection.php");

$query = "SELECT * FROM maid where `ID` = ".$_SESSION['id'];
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
            <img alt="" src="img/user.svg">
        </div>
        <div class="card-info"> <span class="card-title"> <?php echo $fname." ".$lname; ?> </span>

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
                    }else {
                        echo"No records found";
                    }
                ?>
            </table>
        </div>
        <div class="tab-pane fade in active" id="tab2">
            <table border="2" cellspacing="8">
                <tr>
                    <th>no</th>
                    <th>Profile Picture</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Gender</th>
                    <th>Option</th>
                    <th>Hour(s)</th>
                    <th></th>
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
                            ";
                            echo'<td>
                                    <input type="datetime-local"/><br>
                                </td>';
                            echo'<td>
                                    <input type="time"/><br>
                                </td>';
                            echo"
                                <td><a href = 'adminedit.php?ID=$result[ID]' onclick='return checkedit()'> Cancel Bocking </td>
                                </tr>
                            ";
                        }
                    } else{
                        echo"No records found";
                    }
                ?>
            </table>
        </div>
      </div>
    </div>

    </div>
</div>
