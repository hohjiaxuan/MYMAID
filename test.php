<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> MYMAID </title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <style>
             .inform
            {
                color: #4a2512;
                font-size: 38px;
                font-weight: bold;
                font-family: "Fonthead Designe";
            } 
            .sign-up-inform
            {
                width:300px;
                height:80px;
            }
            .type
            {
                width: 300px;
                height: 30px;
                color: #4a2512;       
                font-family: fantasy;
                background-color: #fffbc1;
            }
            .sign-up-inform-gender
            {
                font-size: 32px;
                font-family: fantasy;
            }

    </style>

</head>

<body>

<div id="frmRegistration">
                    <form class="form-horizontal" action="registration_code.php" method="POST">
                            <div class="form-group">

                                <label class="inform" for="firstname">First Name:</label>
                                <div class="sign-up-inform">
                                    <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Enter Firstname" required>
                                </div>
                                <label class="inform" for="lastname">Last Name:</label>
                                <div class="sign-up-inform">
                                    <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Enter Lastname" required>
                                </div>

                                <label class="inform" for="lastname">Gender:</label>

                                <div class="sign-up-inform">
                                    <label class="sign-up-inform-gender"><input type="radio" name="gender" value="Male">Male</label><br>
                                    <label class="sign-up-inform-gender"><input type="radio" name="gender" value="Female">Female</label><br>
                                </div><br><br><br>

                                <label class="inform" for="usertype">User Type:</label>
                                <div>
                                    <select class="type" id="usertype" onChange="selectUserType(this)" name="user_type">
                                        <option value="Customer"  style="font-size:45px;text-align: center; ">Customer</label>
                                        <option value="Maid" style="font-size:45px; text-align: center;">Maid</label>
                                    </select>
                                </div><br><br>

                                <div id="worktype" style="display:none">
                                    <label class="inform" >Work Type:</label>
                                    <select class="type" name="worktype">
                                        <option value="Full-Time"  style="font-size:45px;text-align: center; ">Full-Time</label>
                                        <option value="Part-Time" style="font-size:45px; text-align: center;">Part-Time</label>
                                    </select>
                                </div>
                                <script>
                                    function selectUserType(value) {
                                        document
                                        let e = document.getElementById(value.id);
                                        console.log(value.options[e.selectedIndex].value)
                                        if(value.options[e.selectedIndex].value == "Maid") {
                                            document.getElementById("worktype").style.display = "inline";
                                        } else {
                                            document.getElementById("worktype").style.display = "none";
                                        }
                                    }
                                </script>

                                
                                    <label class="inform" for="email">Email:</label>
                                <div class="sign-up-inform">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required>
                                </div>
                                    <label class="inform" for="pwd">Password:</label>
                                <div class="sign-up-inform">
                                    <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter password" required>
                                </div>
                                    <label class="inform" for="pic">Profile Picture:</label>
                                <div class="sign-up-inform">
                                    <input type="file" name="pic" class="form-control" id="pic" accept="image/*" required>
                                </div> <br>
                                <div> 
                                    <button type="submit" name="create" class="btn btn-primary" style="width:285px; height:50px;">Submit</button>
                                </div>
                            </div>
                    </form>
                    </div>

                    </body>

</html>
