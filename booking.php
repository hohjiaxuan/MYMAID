<?php
    // include_once('link.php');
    // includee('connection.php');
    if($_GET['action'] == "BOOKING") {
        echo "123123123";
        // $query = "SELECT * FROM employment WHERE `maidID` = ".$_GET['email']."";
        $conn = mysqli_connect("localhost","root","","Mymaid") or die("Error: ". mysql_error());
        $query = "SELECT * FROM employment WHERE `maidID` = '".$_GET['maidEmail']."' AND  `date` = ".$_GET['date']." AND  `work_start_hour` = '".$_GET['time1']."' AND  `work_end_hour` = '".$_GET['time2']."'";
        // echo $query;
        $data = mysqli_query($conn, $query);
        $total = mysqli_num_rows($data);

        if($total <= 0)
        {
            // echo "123";
            // echo "INSERT INTO employment (userID, maidID, date, work_start_hour, work_end_hour) VALUES ('".$_GET['userEmail']."','".$_GET['maidEmail']."','".$_GET['date']."','".$_GET['time1']."','".$_GET['time2']."')";
            $insert = "INSERT INTO employment (userID, maidID, date, work_start_hour, work_end_hour) VALUES ('".$_GET['userEmail']."','".$_GET['maidEmail']."','".$_GET['date']."','".$_GET['time1']."','".$_GET['time2']."')";
            echo $insert;
            $data = mysqli_query($conn, $insert);
            if($data)
            {
                echo "susses";
            }else {
                echo "Failed to Updated Record";
            }
            // echo $insert;
            // echo $_GET['userEmail'].' '. $_GET['maidEmail'].' '. $_GET['fname'].' '. $_GET['lname'].' '. $_GET['gender'].' '. $_GET['date'].' '. $_GET['lname'].' '. $_GET['time1'].' '. $_GET['time2'];
        }




        // // echo $data ;
        // if(!$data) {
        //     // echo "Error: ";
        //     echo("Error: ".mysql_error();
        //     exit();
        // } else {
        //     $total = mysqli_num_rows($data);

        //     if($total <= 0) {
        //         echo $_GET['email'].' '. $_GET['fname'].' '. $_GET['lname'].' '. $_GET['gender'].' '. $_GET['date'].' '. $_GET['lname'].' '. $_GET['time1'].' '. $_GET['time2'];
        //     }
        // }
        
        // INSERT INTO `maid` (`ID`, `Firstname`, `Lastname`, `Gender`, `Email`, `Password`, `Pic`, `Worktype`) VALUES ('6', 'json', 'lee', 'Male', 'json@gmail.com', '202cb962ac59075b964b07152d234b70', 'img/customer-b.jpg', '0');
    }
?>