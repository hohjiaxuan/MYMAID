<?php
$conn = mysqli_connect("localhost","root","","Mymaid");
// require_once('connection.php');
if($_GET && $_GET['action'] == "EDIT_PROFILE")
{
    $id=$_GET["ID"];
    $fname=$_GET["Firstname"];
    $lname=$_GET["Lastname"];
    $gender=$_GET["Gender"];
    $email=$_GET["Email"];
    $pic= $_GET['Pic'];
    
    if($pic != 'none') {
        $query = "UPDATE `admin` SET Firstname='$fname', Lastname='$lname', Gender='$gender', Email='$email', Pic='$pic' WHERE `Email`='$id' ";
    } else {
        $query = "UPDATE `admin` SET Firstname='$fname', Lastname='$lname', Gender='$gender', Email='$email' WHERE `Email`='$id' ";
    }
    $result = mysqli_query($conn, $query) or die("Error");
    
    if($result) 
    {
        echo "sussess";
          
    } else {
        echo "Failed to Updated Record";
    }
}

?>