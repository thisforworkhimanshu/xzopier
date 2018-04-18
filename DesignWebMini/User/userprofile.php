<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
if(isset($_SESSION['uid']) || isset($_SESSION['uname'])){
    $conn = mysqli_connect("localhost", "root", "", "phpminizerox");
    if(!$conn){
        die("Connection Failed ".mysqli_connect_error());
    }
    $sql = "select * from user_sigup_tb where user_id = '".$_SESSION['uid']."'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            $username = $row['user_name'];
            $userpass = $row['user_pass'];
        }
        $query = "select * from user_detail where user_id = '".$_SESSION['uid']."'";
        $resultquery = mysqli_query($conn, $query);
        if(mysqli_num_rows($resultquery)>0){
            while($rowq = mysqli_fetch_assoc($resultquery)){
                $email = $rowq['email'];
                $mobile = $rowq['mobile'];
                $addressone = $rowq['address_one'];
                $addresstwo = $rowq['address_two'];
                $addressthree = $rowq['address_three'];
                $city = $rowq['city'];
                $state = $rowq['state'];
            }
        }
    }
    ?>
    <html>
        <head>
            <meta charset="UTF-8">
            <title></title>
        </head>
        <body>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" type="text/css" href="../css/userheader.css">
            <link rel="stylesheet" type="text/css" href="../css/userprofilecss.css">
            <script type="text/javascript">
                function readonlyfunc(){
                    document.getElementById('uname').setAttribute('readonly','readonly');
                    document.getElementById('upass').setAttribute('readonly','readonly');
                    document.getElementById('uemail').setAttribute('readonly','readonly');
                    document.getElementById('umobile').setAttribute('readonly','readonly');
                    document.getElementById('addressone').setAttribute('readonly','readonly');
                    document.getElementById('addresstwo').setAttribute('readonly','readonly');
                    document.getElementById('addressthree').setAttribute('readonly','readonly');
                    document.getElementById('city').setAttribute('readonly','readonly');
                    document.getElementById('state').setAttribute('readonly','readonly');
                }
            </script>
        </head>
        <body onload="readonlyfunc()">
             <div class="header">
                <?php 
                    require_once '../User/UserHeader.php';
                ?>
            </div>
            <div class="topnav">
                <?php require_once '../User/usernavbar.php';?>
            </div>
            <div class="container">
                 <?php
                if(isset($_SESSION['update_status'])){
                    if($_SESSION['update_status']){
                        $_SESSION['update_status']=false;
                        ?>
                        <center>
                            <label>Successfully Updated!</label>
                        </center>
<!--                        <script>
                                setTimeout("location.href = 'http://localhost/DesignWebMini/index.php';",500);
                        </script>-->
                        <?php
                        }
                    }
                ?>
                <div class="profile">
                    <form action="updateuser.php" method="post">
                    <hr/>
                    <input id="uname" type="text" name="uname" required placeholder="Username" value="<?php echo $username; ?>">
                    <hr/>
                    <input id="upass" type="password" name="upass" required placeholder="Password" value="<?php echo $userpass; ?>">
                    <hr/>
                    <input id="uemail" type="email" name="uemail" required placeholder="Email Address" value="<?php echo $email; ?>">
                    <hr/>
                    <input id="umobile" type="tel" name="umobile" required pattern="[0-9]{10}" placeholder="Mobile Number" value="<?php echo $mobile; ?>">
                    <hr/>
                    <input id="addressone" type="text" name="addressone" required placeholder="Address Line 1 eg. House/Flat Number" value="<?php echo $addressone; ?>">
                    <hr/>
                    <input id="addresstwo" type="text" name="addresstwo" required placeholder="Address Line 2 eg. House Name/Flat Name" value="<?php echo $addresstwo; ?>">
                    <hr/>
                    <input id="addressthree" type="text" name="addressthree" required placeholder="Address Line 3 eg. Society Name/Landmark" value="<?php echo $addressthree; ?>">
                    <hr/>
                    <input id="city" type="text" name="city" required placeholder="City" value="<?php echo $city;?>">
                    <hr/>
                    <input id="state" type="text" name="state" required placeholder="State" value="<?php echo $state;?>">
                    <hr/>
                    <input type="submit" id="submitbtn" value="Submit" style="display: none;">
                    <input type="button" id="btnedit" value="Edit" onclick="makeeditable()">
                    </form>
                    <script type="text/javascript">
                        function makeeditable(){
                            document.getElementById("uname").removeAttribute('readonly');
                            document.getElementById('upass').removeAttribute('readonly');
                            document.getElementById('uemail').removeAttribute('readonly');
                            document.getElementById('umobile').removeAttribute('readonly');
                            document.getElementById('addressone').removeAttribute('readonly');
                            document.getElementById('addresstwo').removeAttribute('readonly');
                            document.getElementById('addressthree').removeAttribute('readonly');
                            document.getElementById('city').removeAttribute('readonly');
                            document.getElementById('state').removeAttribute('readonly');
                            document.getElementById('btnedit').style.display='none';
                            document.getElementById('submitbtn').style.display='block';
                        }
                    </script>
                </div>
            </div>
        </body>
    </html>
    <?php
}else{
    header("Location: http://localhost/DesignWebMini/index.php");
}

