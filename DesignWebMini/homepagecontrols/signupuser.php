<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <link rel="stylesheet" type="text/css" href="../css/userheader.css">
        <link rel="stylesheet" type="text/css" href="../css/signupdivcss.css">
        <script type="text/javascript">
            function validateForm(){
                var upass = document.getElementById('upass').value;
                var ucpass = document.getElementById('ucpass').value;
                
                if(upass!==ucpass){
                    document.getElementById('upass').value="";
                    document.getElementById('ucpass').value="";
                    document.getElementById('upass').focus();
                    alert('Password Must be Same');
                    return false;
                }
                return true;
            }
        </script>
    </head>
    <body>
        <div class="header">
            <?php
                require_once '../User/UserHeader.php';
            ?>
        </div>
        <?php
            session_start();
            if(isset($_SESSION['signup_status'])){
                if($_SESSION['signup_status']){
                    $_SESSION['signup_status']=false;
                    ?>
        
                    <center>
                        <label>Successfully Added! Redirecting... Please Login</label>
                    </center>
                    <script>
                            setTimeout("location.href = 'http://localhost/DesignWebMini/index.php';",1000);
                    </script>
                    <?php
                }
            }
        ?>
        <form action="user_signup_db.php" method="post" onsubmit="return validateForm()">
            <div class="signupdiv">
                <hr/>
                <input id="uname" type="text" name="uname" required placeholder="Username">
                <hr/>
                <input id="upass" type="password" name="upass" required placeholder="Password">
                <hr/>
                <input id="ucpass" type="password" name="ucpass" required placeholder="Confirm Password">
                <hr/>
                <input id="uemail" type="email" name="uemail" required placeholder="Email Address">
                <hr/>
                <input id="umobile" type="tel" name="umobile" required pattern="[0-9]{10}" placeholder="Mobile Number">
                <hr/>
            </div>
            <div class="signupdivadd">
                <hr/>
                <input id="addressone" type="text" name="addressone" required placeholder="Address Line 1 eg. House/Flat Number">
                <hr/>
                <input id="addresstwo" type="text" name="addresstwo" required placeholder="Address Line 2 eg. House Name/Flat Name">
                <hr/>
                <input id="addressthree" type="text" name="addressthree" required placeholder="Address Line 3 eg. Society Name/Landmark">
                <hr/>
                <input id="city" type="text" name="city" required placeholder="City">
                <hr/>
                <input id="state" type="text" name="state" required placeholder="State">
                <hr/>
            </div>
            <br/>
            <div class="signupbtn">
                <input id="submitbtn" type="submit" name="btnsubmit" value="Signup">
            </div>
        </form>
    </body>
</html>
