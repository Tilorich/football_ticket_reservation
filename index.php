<?php
session_start();

include("loginpage/dbengine/dbconnect.php");


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Football Reservation System</title>
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <header>
        <div class="container">
            <div class="centernav">
                <h5>WELCOME TO AKANU IBIAM STADIUM</h5>
            </div>

            <ul>
                <li><a href="index.html" class="active-nav" >HOME</a></li> 
                <li><a href="about-us.html">ABOUT US</a></li>
            </ul>

        </div>

        <div class="content">
            <h1>Akanu Ibiam Stadium Reservation System</h1>
            <h5>Here at Akanu Ibiam Statium, we make your reservation process as stress-free as possible. We aim at eliminating
            the stress of actually coming to the stadium for reservation of a seat and enable you do it at the comfort of
            your home.<br><br> <b>REGISTER BELOW TO GET STARTED </b> </h5>
                    <?php if (isset($_GET['error'])) {  ?>
            <h3 class="error"><?php echo $_GET['error']; ?></h3>

        <?php }  ?>
            

            <div class="header-button">
                <button onclick="document.getElementById('id01').style.display='block'">REGISTER </button>
                <button class="btn" onclick="document.getElementById('id02').style.display='block'">LOGIN HERE</button>
            </div>

        </div>

    </header>

    <div id="id01" class="modal">

    <form action="validate.php"  method="post" class="register-container">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        <div class="register-content">
            <h1>Sign Up</h1>
            <p>Please fill in this form to create an account.</p>
            <hr>

            <label for="Name"><b>Name</b></label>
            <input type="text" placeholder="Enter Full Name" name="name" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw"  id="pass" required>
        <div class="password"> <input type="checkbox" onclick="myFunction()">Show Password</div>

            <!-- <label for="psw-repeat"><b>Repeat Password</b></label>
            <input type="password" placeholder="Repeat Password" name="psw-repeat" id="pass1" required> 
            
            <div class="password"><input type="checkbox" onclick="myFunction1()">Show Password</div> -->

            <label>
                <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
            </label>


            <div class="clearfix">
                <button type="button" class="cancelbtn" onclick="document.getElementById('id01').style.display='none'">Cancel</button>
                <button type="submit" class="signupbtn">Sign Up</button>
            </div>
            <div class="signin">
                <p>Already have an account? <a href="#" onclick="openLogin()">Sign in</a>.</p>
            </div>
        </div>
    </form>

    </div>

    <div class="modal" id="id02">

    <form method="post" action="login.php" class="login-container" id="login-container">
        <span onclick="document.getElementById('id02').style.display='none'" class="close close1" title="Close Modal">&times;</span>
        <div class="login-content">
            <h1>Login</h1>
            <label for="uname"><b>Name</b></label>
            <input type="text" placeholder="Enter Full Name" name="uname" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <button type="submit" class="submit">Login</button><br><br>
            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
        </div>

        <div class="login-button" >
            <button type="button" class="cancelbtn" onclick="document.getElementById('id02').style.display='none'">Cancel</button>
            <span class="psw">Forgot <a href="#">password?</a></span>
        </div>
    </form>
    </div>

    <script>
        // Get the modal
        var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        let close = document.getElementById('id02');

            window.onclick = function (event) {
                if (event.target == close) {
                    close.style.display = "none";
                }
            }

        function myFunction() {
                var x = document.getElementById("pass");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }

        function myFunction1() {
            var z = document.getElementById("pass1");
            if (z.type === "password") {
                z.type = "text";
            } else {
                z.type = "password";
            }
        }

        function openLogin(){
            document.getElementById('id01').style.display='none';
            document.getElementById('id02').style.display = 'block';
        }

    </script>
    
</body>
</html>