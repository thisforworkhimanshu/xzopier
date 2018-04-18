<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
    if (isset($_POST['usertype'])){
        $stype = $_POST['usertype'];
        if($stype==="user"){
            header("Location: signupuser.php");
        }else if($stype==="vendor"){
            header("Location: signupvendor.php");
        }
    }else{
        ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="../css/userheader.css">
        <style type="text/css">
            #usertype{
                margin-left: 33.33%;
                margin-top: 18%;
                width: 30%;
                height: 50px;
                border: none;
                font-size: 1.5vw;
            }
            #submitbtn{
                background-color: #f5fa5c; /* Green */
                border: none;
                border-radius: 5%;
                color: #023fcb;
                padding: 10px 20px;
                text-align: center;
                font-size: 2vw;
            }
        </style>
    </head>
    <body>
       <div class="header">
            <?php
                require_once '../User/UserHeader.php';
            ?>
        </div>
        <div class="stypediv">
            <form action="signup.php" method="post">
                <select required name="usertype" id="usertype">
                    <option value="" selected disabled>Select Signup Type</option>
                    <option value="user">User</option>
                    <option value="vendor">Vendor</option>
                </select>
                <input id="submitbtn" type="submit" value="Submit" name="submitbtn">
            </form>
        </div>
    </body>
</html>
<?php
    }
