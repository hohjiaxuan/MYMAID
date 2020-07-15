<!--
Into this file, we write a code for display user information.
-->

<?php
include_once('link.php');
include_once('adminheader1.php');
include("connection.php");

$query = "SELECT * FROM admin where `Email` = '".$_SESSION['email']."'";
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

<!DOCTYPE html>
<html>
<head>
  <title> MYMAID | ADMIN </title>
<style type="text/css">
</style>
<SCRIPT SRC="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></SCRIPT>
</head>

<body>
<div id="account">
<div class="col-lg-6 col-sm-6">
    <div class="card hovercard">
        <div class="card-background">
            <img class="card-bkimg" alt="" src="">
        </div>
        <div class="useravatar" style="width:950px;">
            <img alt="" id="pic" src="<?php echo $pic ?>">
        </div>
        <div class="card-info"> <span class="card-title"><?php echo $fname." ".$lname; ?> </span>

        </div>
    </div>
    <div class="btn-pref btn-group btn-group-justified btn-group-lg" style="width:1000px;" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="hidden-xs">Profile</div>
            </button>
        </div>

    </div>

    <script>
        function editAcc(persion) {
            let fname = document.getElementById("fname");
            let lname = document.getElementById("lname");
            let gender = document.getElementById("gender");
            let email = document.getElementById("email");

            let textFname = document.getElementById("textFname");
            let textLname = document.getElementById("textLname");
            let textGender = document.getElementById("textGender");
            let textEmail = document.getElementById("textEmail");
            let inputPic = document.getElementById("inputPic");
            let textPic = document.getElementById("textPic");
            let resultPic = "none";
            let pic = "<?php echo $pic ?>";
            let img = document.getElementById("pic");
            
            if(img.src != pic) {
                resultPic = img.getAttribute("src");
            }

            if(persion.innerHTML == "Confirm") {
                console.log("omg");
                persion.innerHTML = "Edit Profile";
                fname.style.display = "block";
                lname.style.display = "block";
                gender.style.display = "block";
                email.style.display = "block";

                textFname.style.display = "none";
                textLname.style.display = "none";
                textGender.style.display = "none";
                textEmail.style.display = "none";
                inputPic.style.display = "none";

                if(img.src != pic) {
                    textPic.innerHTML = img.getAttribute("src");
                }

                console.log('adminprofileedit.php?ID='+email.innerHTML+'&Firstname='+textFname.value +'&Lastname='+textLname.value+'&Gender='+textGender.value +'&Email='+textEmail.value+"&Pic="+resultPic+"&action=EDIT_PROFILE");
                $.get({
                    url: 'adminprofileedit.php?ID='+email.innerHTML+'&Firstname='+textFname.value +'&Lastname='+textLname.value+'&Gender='+textGender.value +'&Email='+textEmail.value+"&Pic="+resultPic+"&action=EDIT_PROFILE", 
                    success: function(result) {
                        console.log(result);
                        if(result == "sussess") {
                            location.reload();
                        }
                    }
                });
            } else {
                persion.innerHTML = "Confirm";
                fname.style.display = "none";
                lname.style.display = "none";
                gender.style.display = "none";
                email.style.display = "none";

                textFname.style.display = "block";
                textLname.style.display = "block";
                textGender.style.display = "block";
                textEmail.style.display = "block";
                inputPic.style.display = "block";
            }  
        }
        function changePic(pic) {
            console.log(pic)
            let img = document.getElementById("pic");
            img.src = 'img/'+pic.files[0].name;
            console.log('img/'+pic.files[0].name);
        }
    </script>

    <div class="well" style="width:1000px;">
      <div class="tab-content">
        <div class="tab-pane fade in active" id="tab1">
        <table class="table">
            <?php
                if($total != 0)
                {
                    echo "
                        <tr>
                            <td>First Name</td>
                            <td id=\"fname\" style=display:block>".$fname."</td>
                            <td><input id=\"textFname\" type=\"text\" value='".$fname."' style=display:none></td>
                        </tr>
                        <tr>
                            <td>Last Name</td>
                            <td id=\"lname\" style=display:block>".$lname."</td>
                            <td><input id=\"textLname\" type=\"text\" value='".$lname."' style=display:none></td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td id=\"gender\" style=display:block>".$gender."</td>
                            <td><input id=\"textGender\" type=\"text\" value='".$gender."' style=display:none></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td id=\"email\" style=display:block>".$email."</td>
                            <td><input id=\"textEmail\" type=\"text\" value='".$email."' style=display:none></td>
                        </tr>
                        <tr>
                            <td>Profile Picture</td>
                            <td><div> <div id=\"textPic\" style=\"float:left;\"> ".$pic." &nbsp;&nbsp;&nbsp;</div>  <div  style=\"float:left; \" > <input onchange=\"changePic(this)\" id=\"inputPic\" style=\"display:none;\" type=\"file\" accept=\"image/*\" value=\"'$pic'\"> </div></div></td>
                        </tr>
                    ";
                }else {
                    echo"No records found";
                }
            ?>
          </table>
          <?php 

          ?>
            <div style="text-align: center;">      
                <button onclick="editAcc(this)" style="width:150px; height:85; background-color:#fffbc1; color:#362511; border-color:#362511; font-size:20px; font-weight: bold;"> Edit Profile </button>
            </div>
        </div>
      </div>
    </div>
</div>
</body>

</html>
