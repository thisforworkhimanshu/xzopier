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
        <link rel="stylesheet" type="text/css" href="mystyle.css">
        <link rel="stylesheet" type="text/css" href="css/aboutuscss.css">
        <title></title>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <?php 
                    require_once './headerpage.php';
                ?>
            </div>
            <div class="topnav">
                <a href="index.php">Home</a>
                <a href="User/userlogin.php">User</a>
                <a href="Vendor/vendorlogin.php">Vendor</a>
                <a href="contactus.php">Contact Us</a>
                <a href="aboutus.php">About Us</a>
            </div>
            <div class="aboutusdiv">
                <div style="float: left; margin-top: 15%; margin-left: 28%;">
                    <label sty>We as a ZXOPIER provide you best service for printing your valuable document.</label>
                </div>
            </div>
            <div class="footer">
                <?php
                    require_once './footerpage.php';
                ?>
            </div>
        </div>
    </body>
</html>
