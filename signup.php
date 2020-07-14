<?php
require_once('connection.php');
$email = $password = $pwd = '';


// if($_POST) {
//     $email = $_POST['email'];
//     $pwd = $_POST['password'];
//     $password = MD5($pwd);
//     $sql = "SELECT * FROM user WHERE Email='$email' AND Password='$password'";
//     $result = mysqli_query($conn, $sql);
//     if(mysqli_num_rows($result) > 0)
//     {
//         while($row = mysqli_fetch_assoc($result))
//         {
//             $id = $row["ID"];
//             $email = $row["Email"];
//             session_start();
//             $_SESSION['id'] = $id;
//             $_SESSION['email'] = $email;
//         }
//         header("Location: userwelcome.php");
//     }
//     else
//     {
//         echo "Invalid email or password";
//     }
// }

?>

<!DOCTYPE html>
<html lang="zxx">

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
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class=" fa fa-envelope"></i>
                        MYMAID@gmail.com
                    </div>
                    <div class="phone-service">
                        <i class=" fa fa-phone"></i>
                        +603-9988-4554
                    </div>
                </div>
                <div class="ht-right">
                    <a href="./asking.html" class="login-panel"><i class="fa fa-user">Join Now!</i></a>
                    <div class="lan-selector">
                        <select class="language_drop" name="countries" id="countries" style="width:300px;">
                            <option value='yt' data-image="img/flag-1.jpg" data-imagecss="flag yt"
                                data-title="English">English</option>
                            <option value='yu' data-image="img/flag-2.jpg" data-imagecss="flag yu"
                                data-title="Bangladesh">B.Malaysia</option>
                        </select>
                    </div>
                    <div class="top-social">
                        <a href="#"><i class="ti-facebook"></i></a>
                        <a href="#"><i class="ti-twitter-alt"></i></a>
                        <a href="#"><i class="ti-linkedin"></i></a>
                        <a href="#"><i class="ti-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="./index.html">
                                <img src="img/MYMAID.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="advanced-search">
                            <div class="input-group">
                                <input type="text" placeholder="What are you searching for?">
                                <button type="button"><i class="ti-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 text-right col-md-3">
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li class="active"><a href="./index.html">Home</a></li>
                        <li><a href="./index.html">Services</a>
                            <ul class="dropdown">
                                <li><a href="./full-time.html">Full-Time</a></li>
                                <li><a href="./part-time.html">Part-Time</a></li>
                            </ul>
                        </li>
                        <li><a href="./about.html">About MYMAID</a></li>
                        <li><a href="./contact.html">Contact</a></li>
                        <li><a href="./faq.html">FAQ</a></li>
                        <li><a href="./signup.php">Sign Up</a></li>
                        <li><a href="./signin.php">Sign In</a></li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->


    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <span>SIGN UP</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->


    <div>
        <!-- <form class="contact-form"> -->
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <h1>SIGNUP</h1>
                        <p>WHAT ARE YOU WAITING FOR???</p>
                        <hr class="mb-3">
                        <p>JOIN US NOW!!!</p> <br>
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
                                    <select class="type" id="usertype" onChange="showTest(this)" >
                                        <option value="Customer"  style="font-size:45px;text-align: center; ">Customer</label>
                                        <option value="Maid" style="font-size:45px; text-align: center;">Maid</label>
                                    </select>
                                </div><br><br>

                                <div id="worktype">
                                    <label class="inform" >Work Type:</label>

                                </div>
                                <script>
                                    function showTest(value) {
                                        let e = document.getElementById(value.id);
                                        console.log(value.options[e.selectedIndex].value)
                                        if(value.options[e.selectedIndex].value == "Maid") {
                                            document.getElementById("worktype").write("<div>");
                                            // document.write("<select class=""type"">");
                                            //     document.write("<option  name=""worktype"" value=""Full-Time"" style=""font-size:45px;text-align: center; "">Full-Time</label>");
                                            //     document.write("<option  name=""worktype"" value=""Part-Time"" style=""font-size:45px; text-align: center;"">Part-Time</label>");
                                            // document.write("</select>");
                                            document.write("</div><br><br>");
                                        }
                                    }
                                    // let e = document.getElementById("usertype");
                                    
                                    
                                    // if(document.getElementById("usertype").options[e.selectedIndex].value == "Maid") {
                                    //     document.write("<div>");
                                    //         document.write("<select class=""type"">");
                                    //             document.write("<option  name=""worktype"" value=""Full-Time"" style=""font-size:45px;text-align: center; "">Full-Time</label>");
                                    //             document.write("<option  name=""worktype"" value=""Part-Time"" style=""font-size:45px; text-align: center;"">Part-Time</label>");
                                    //         </select>
                                    //     document.write("</div><br><br>");
                                    // }
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
                </div>
            </div>
        <!-- </form> -->
    </div>






    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <a href="#"><img src="img/MYMAID.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: 18 WEST WING THE ICON OFF, JALAN TUN RAZAK 5500 KUALA LUMPUR, WILAYAH PERSEKUTUAN.</li>
                            <li>Phone: +603-9988-4554</li>
                            <li>Email: MYMAID@gmail.com</li>
                        </ul>
                        <div class="footer-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Explore link</h5>
                        <ul>
                            <li><a href="./index.html">Home</a></li>
                            <li><a href="./about.html">About Us</a></li>
                            <li><a href="./contact.html">Contact</a></li>
                            <li><a href="./faq.html">FAQ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>My Account</h5>
                        <ul>
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Shopping Cart</a></li>
                            <li><a href="#">Shop</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="newslatter-item">
                        <h5>Join Our Newsletter Now</h5>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#" class="subscribe-form">
                            <input type="text" placeholder="Enter Your Mail">
                            <button type="button">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </div>
                        <div class="payment-pic">
                            <img src="img/payment-method.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/jquery.dd.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
