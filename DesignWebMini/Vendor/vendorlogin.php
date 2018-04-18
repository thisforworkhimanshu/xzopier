<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    session_start();
    if(isset($_SESSION['vid'])|| isset($_SESSION['vname'])){
        header("Location: http://localhost/DesignWebMini/Vendor/VendorIndexPage.php");
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="../css/vendorheadercss.css">
        <link rel="stylesheet" type="text/css" href="../css/vendorlogincss.css">
    </head>
    <body>
        <div class="header">
            <?php
                require_once './VendorHeader.php';
            ?>
        </div>
        <div style="float: right; margin-right: 10px;"><a href="../index.php">Go Back</a></div>
        <center>
            <div class="logindiv" style="width: 50%; margin-top: 10%;">
                <form action="CheckVendor.php" method="post">
                    <hr/>
                    <input id="uname" type="text" name="uname" required placeholder="Enter your username">
                    <hr/>
                    <input  id="upass" type="password" name="upass" required placeholder="Enter your password">
                    <hr/>
                    <input id="submitbtn" type="submit" value="Login">
                </form>
            </div>
        </center>
    </body>
</html>
